<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * File upload handler for local_silabo plugin.
 *
 * @package    local_silabo
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/local/silabo/lib.php');
require_once($CFG->libdir . '/filelib.php');

// Get parameters.
$courseid = required_param('courseid', PARAM_INT);

// Get course and context.
$course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
$context = context_course::instance($course->id);

// Check login and capabilities.
require_login($course);
require_capability('local/silabo:edit', $context);

// Handle file upload via AJAX or form submission.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_sesskey();
    
    $response = array('success' => false, 'message' => '');
    
    if (!empty($_FILES['silabo_file']['name'])) {
        $uploadedfile = $_FILES['silabo_file'];
        
        // Validate file.
        $allowedtypes = array('pdf', 'doc', 'docx', 'txt');
        $fileext = strtolower(pathinfo($uploadedfile['name'], PATHINFO_EXTENSION));
        
        if (!in_array($fileext, $allowedtypes)) {
            $response['message'] = 'Tipo de archivo no permitido. Use PDF, DOC, DOCX o TXT.';
        } else if ($uploadedfile['size'] > 10 * 1024 * 1024) { // 10MB limit.
            $response['message'] = 'El archivo es demasiado grande. Tamaño máximo: 10MB.';
        } else if ($uploadedfile['error'] !== UPLOAD_ERR_OK) {
            $response['message'] = 'Error al subir el archivo.';
        } else {
            // Save file information to database.
            $data = new stdClass();
            $data->curso_id = $courseid;
            $data->nombre_archivo = clean_filename($uploadedfile['name']);
            $data->estado = 'pendiente';
            $data->contenido = optional_param('contenido', '', PARAM_RAW);
            
            try {
                // Save to database.
                $silaboid = local_silabo_save_silabo($data);
                
                // Here you would typically save the actual file to Moodle's file system.
                // For demonstration purposes, we'll simulate file processing.
                
                // Create file record in Moodle's file system.
                $filerecord = array(
                    'contextid' => $context->id,
                    'component' => 'local_silabo',
                    'filearea' => 'silabo_files',
                    'itemid' => $silaboid,
                    'filepath' => '/',
                    'filename' => $data->nombre_archivo,
                    'timecreated' => time(),
                    'timemodified' => time()
                );
                
                $fs = get_file_storage();
                
                // Save the uploaded file.
                if ($fs->create_file_from_pathname($filerecord, $uploadedfile['tmp_name'])) {
                    $response['success'] = true;
                    $response['message'] = 'Archivo subido exitosamente.';
                    $response['silaboid'] = $silaboid;
                    
                    // Mark as processed for demonstration.
                    // In a real scenario, this would be done by a background task.
                    local_silabo_update_estado($silaboid, 'procesado');
                } else {
                    $response['message'] = 'Error al guardar el archivo.';
                }
                
                // Extract and process text from PDF.
                $extractedtext = local_silabo_extract_pdf_text($uploadedfile['tmp_name']);
                // Save extracted text to .txt file.
                $txtfilename = local_silabo_save_text_file($extractedtext, $uploadedfile['name']);
                // Parse the extracted text.
                $parsed = local_silabo_parse_pdf_content($extractedtext);

                $data = new stdClass();
                $data->curso_id = $courseid;
                $data->profesor_id = $USER->id;
                $data->nombre_archivo = clean_filename($uploadedfile['name']);
                $data->contenido = $extractedtext;
                $data->estado = 'procesado';
                $data->fecha_subida = time();
                $data->archivo_txt = $txtfilename;
                $data->hash_archivo = sha1_file($uploadedfile['tmp_name']);

                // Guardar en la base de datos
                $silaboid = local_silabo_save_silabo($data);
                
            } catch (Exception $e) {
                $response['message'] = 'Error al procesar el archivo: ' . $e->getMessage();
            }
        }
    } else {
        $response['message'] = 'No se seleccionó ningún archivo.';
    }
    
    // Return JSON response for AJAX requests.
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        // Redirect back to main page with message.
        $redirecturl = new moodle_url('/local/silabo/index.php', array('courseid' => $courseid));
        if ($response['success']) {
            redirect($redirecturl, $response['message'], null, \core\output\notification::NOTIFY_SUCCESS);
        } else {
            redirect($redirecturl, $response['message'], null, \core\output\notification::NOTIFY_ERROR);
        }
    }
} else {
    // Redirect to main page if accessed directly.
    $redirecturl = new moodle_url('/local/silabo/index.php', array('courseid' => $courseid));
    redirect($redirecturl);
}
