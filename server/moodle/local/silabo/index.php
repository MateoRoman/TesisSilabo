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
 * Main page for the local_silabo plugin - Teacher silabo upload interface.
 *
 * @package    local_silabo
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/local/silabo/lib.php');
require_once($CFG->libdir . '/filelib.php');

// Get course id parameter (optional for main interface).
$courseid = optional_param('courseid', 0, PARAM_INT);
$action = optional_param('action', 'view', PARAM_ALPHA);

// Check login.
require_login();

global $USER, $DB, $OUTPUT, $PAGE;

// Check if user is a teacher in any course.
$teachercourses = local_silabo_get_teacher_courses($USER->id);
if (empty($teachercourses)) {
    print_error('nopermissions', 'error', '', 'No tiene permisos de profesor en ningún curso');
}

// If courseid is provided, validate access.
if ($courseid > 0) {
    $course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
    $context = context_course::instance($course->id);
    require_login($course);
    
    // Check if user is teacher in this course.
    if (!array_key_exists($courseid, $teachercourses)) {
        print_error('nopermissions', 'error', '', 'No tiene permisos de profesor en este curso');
    }
    
    $PAGE->set_url('/local/silabo/index.php', array('courseid' => $courseid));
    $PAGE->set_context($context);
    $PAGE->set_title(get_string('silabo', 'local_silabo'));
    $PAGE->set_heading($course->fullname);
} else {
    // Main interface - show course selection.
    $PAGE->set_url('/local/silabo/index.php');
    $PAGE->set_context(context_system::instance());
    $PAGE->set_title(get_string('silabo', 'local_silabo'));
    $PAGE->set_heading(get_string('silabo', 'local_silabo'));
}

// Add breadcrumb.
$PAGE->navbar->add(get_string('silabo', 'local_silabo'));

echo $OUTPUT->header();

// Check if plugin is enabled.
if (!get_config('local_silabo', 'enabled')) {
    echo $OUTPUT->notification('Plugin deshabilitado', 'error');
    echo $OUTPUT->footer();
    exit;
}

if ($action == 'upload' && $courseid > 0) {
    // Handle file upload.
    require_sesskey();
    
    // Check if silabo already exists for this course and user.
    $existing = local_silabo_get_user_silabo($courseid, $USER->id);
    $overwrite = optional_param('overwrite', false, PARAM_BOOL);
    
    if ($existing && !$overwrite) {
        echo $OUTPUT->notification('Ya existe un sílabo para este curso. Use la opción de sobrescribir si desea reemplazarlo.', 'warning');
        echo '<a href="index.php?courseid=' . $courseid . '" class="btn btn-secondary">Volver</a>';
        echo $OUTPUT->footer();
        exit;
    }
    
    if (!empty($_FILES['silabo_file']['name'])) {
        $uploadedfile = $_FILES['silabo_file'];
        
        // Validate file type - only PDF.
        $fileext = strtolower(pathinfo($uploadedfile['name'], PATHINFO_EXTENSION));
        
        if ($fileext !== 'pdf') {
            echo $OUTPUT->notification('Solo se permiten archivos PDF', 'error');
        } elseif ($uploadedfile['size'] > 20 * 1024 * 1024) { // 20MB limit.
            echo $OUTPUT->notification('El archivo es demasiado grande. Tamaño máximo: 20MB', 'error');
        } elseif ($uploadedfile['error'] !== UPLOAD_ERR_OK) {
            echo $OUTPUT->notification('Error al subir el archivo', 'error');
        } else {
            try {
                // Calculate file hash for duplicate detection.
                $filehash = sha1_file($uploadedfile['tmp_name']);
                
                // Check for duplicate files by hash.
                $duplicate = $DB->get_record('silabos', array('hash_archivo' => $filehash));
                if ($duplicate && !$overwrite) {
                    echo $OUTPUT->notification('Este archivo ya ha sido subido anteriormente', 'warning');
                    echo '<a href="index.php?courseid=' . $courseid . '" class="btn btn-secondary">Volver</a>';
                    echo $OUTPUT->footer();
                    exit;
                }
                
                // Extract text from PDF.
                echo '<div class="alert alert-info">Iniciando extracción de texto del PDF...</div>';
                $xml_filepath = local_silabo_extract_pdf_text($uploadedfile['tmp_name']);
                if ($xml_filepath) {
                    $txt_filename = $CFG->dataroot . '/local_silabo/extracted_text/' . basename($uploadedfile['name'], '.pdf') . '.txt';
                    $success = local_silabo_process_xml_to_txt($xml_filepath, $txt_filename);

                    if ($success) {
                        echo '<p><strong>Respaldo de texto:</strong> ' . s($txt_filename) . '</p>';
                        
                        // Leer contenido del archivo TXT
                        $txt_content = file_get_contents($txt_filename);
                        $lines = explode("\n", $txt_content);
                        
                        if (!empty($lines)) {
                            echo '<h4>Tabla de información extraída</h4>';
                            echo '<div class="table-responsive"><table class="table table-bordered">';
                            echo '<thead><tr><th>Orden</th><th>Unidad</th><th>Tema</th><th>Subtema</th><th>Estado</th></tr></thead><tbody>';
                            
                            foreach ($lines as $line) {
                                $line = trim($line);
                                if (empty($line)) {
                                    continue;
                                }
                                
                                // Parsear la línea para extraer datos
                                preg_match('/Orden: (\d+), Unidad: (.*?), Tema: (.*?), Subtema: (.*?), Estado: (.*)/', $line, $matches);
                                if (count($matches) === 6) {
                                    echo '<tr>';
                                    echo '<td>' . htmlspecialchars($matches[1]) . '</td>';
                                    echo '<td>' . htmlspecialchars($matches[2]) . '</td>';
                                    echo '<td>' . htmlspecialchars($matches[3]) . '</td>';
                                    echo '<td>' . htmlspecialchars($matches[4]) . '</td>';
                                    echo '<td>' . htmlspecialchars($matches[5]) . '</td>';
                                    echo '</tr>';
                                }
                            }
                            
                            echo '</tbody></table></div>';
                        } else {
                            echo '<div class="alert alert-warning">No se detectaron unidades, temas o subtemas en el archivo TXT.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Error al procesar el archivo XML.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Error al extraer texto del archivo PDF.</div>';
                }
                
                // Prepare data for database.
                $data = new stdClass();
                $data->curso_id = $courseid;
                $data->profesor_id = $USER->id;
                $data->nombre_archivo = clean_filename($uploadedfile['name']);
                $data->contenido = $extractedtext;
                $data->estado = 'procesado';
                $data->fecha_subida = time();
                $data->archivo_txt = $txtfilename;
                $data->hash_archivo = $filehash;
                
                if ($existing && $overwrite) {
                    $data->id = $existing->id;
                }
     




// POR ESTO (usa el objeto $data que ya preparaste antes):
$silaboid = local_silabo_save_silabo($data);
                
// Save file to Moodle file system.
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
                
                // Delete existing file if overwriting.
                if ($existing && $overwrite) {
                    $fs->delete_area_files($context->id, 'local_silabo', 'silabo_files', $existing->id);
                }
                
                // Save the uploaded file.
                if ($fs->create_file_from_pathname($filerecord, $uploadedfile['tmp_name'])) {
                    $message = $overwrite ? 'Sílabo actualizado exitosamente' : 'Sílabo subido exitosamente';
                    echo $OUTPUT->notification($message, 'success');
                    echo '<p><strong>Archivo:</strong> ' . s($data->nombre_archivo) . '</p>';
                    echo '<p><strong>Texto extraído:</strong> ' . strlen($extractedtext) . ' caracteres</p>';
                    if ($txtfilename) {
                        echo '<p><strong>Respaldo de texto:</strong> ' . s($txtfilename) . '</p>';
                    }
                    
                    // Mostrar tabla con la información estructurada
                    $parsed = local_silabo_parse_pdf_content($extractedtext);
                    if (!empty($parsed)) {
                        echo '<h4>Tabla de información extraída</h4>';
                        echo '<div class="table-responsive"><table class="table table-bordered">';
                        echo '<thead><tr><th>Orden</th><th>Unidad</th><th>Tema</th><th>Subtema</th><th>Estado</th></tr></thead><tbody>';
                        foreach ($parsed as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['orden'] . '</td>';
                            echo '<td>' . htmlspecialchars($row['unidad']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['tema']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['subtema']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table></div>';
                    } else {
                        echo '<div class="alert alert-warning">No se detectaron unidades, temas o subtemas en el archivo PDF. Verifique que el archivo contenga texto legible.</div>';
                    }
                } else {
                    echo $OUTPUT->notification('Error al guardar el archivo en el sistema', 'error');
                }
                
            } catch (Exception $e) {
                echo $OUTPUT->notification('Error al procesar el archivo: ' . $e->getMessage(), 'error');
            }
        }
    } else {
        echo $OUTPUT->notification('No se seleccionó ningún archivo', 'error');
    }
    
    echo '<div class="mt-3">';
    echo '<a href="index.php?courseid=' . $courseid . '" class="btn btn-primary">Volver al curso</a>';
    echo '</div>';
    
} elseif ($courseid > 0) {
    // Show course-specific interface.
    echo $OUTPUT->heading('Gestión de Sílabo - ' . format_string($course->fullname));
    
    // Check if silabo already exists.
    $existing = local_silabo_get_user_silabo($courseid, $USER->id);
    
    if ($existing) {
        // Show existing silabo information.
        echo '<div class="alert alert-info">';
        echo '<h4>Sílabo existente</h4>';
        echo '<p><strong>Archivo:</strong> ' . s($existing->nombre_archivo) . '</p>';
        echo '<p><strong>Fecha de subida:</strong> ' . date('d/m/Y H:i', $existing->fecha_subida) . '</p>';
        echo '<p><strong>Estado:</strong> ' . ucfirst($existing->estado) . '</p>';
        if ($existing->archivo_txt) {
            echo '<p><strong>Respaldo de texto:</strong> ' . s($existing->archivo_txt) . '</p>';
        }
        echo '</div>';
        
        // Show overwrite form.
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<h5>Reemplazar sílabo</h5>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<div class="alert alert-warning">';
        echo 'Ya existe un sílabo para este curso. Si sube un nuevo archivo, se reemplazará el anterior.';
        echo '</div>';
        
        echo '<form method="post" action="index.php?courseid=' . $courseid . '&action=upload" enctype="multipart/form-data">';
        echo '<input type="hidden" name="sesskey" value="' . sesskey() . '">';
        echo '<input type="hidden" name="overwrite" value="1">';
        
        echo '<div class="form-group">';
        echo '<label for="silabo_file">Nuevo archivo PDF del sílabo:</label>';
        echo '<input type="file" name="silabo_file" id="silabo_file" class="form-control" accept=".pdf" required>';
        echo '<small class="form-text text-muted">Solo archivos PDF. Tamaño máximo: 20MB</small>';
        echo '</div>';
        
        echo '<button type="submit" class="btn btn-warning">Reemplazar sílabo</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        
        // Mostrar tabla con la información estructurada del sílabo existente
        $parsed = local_silabo_parse_pdf_content($existing->contenido);
        if (!empty($parsed)) {
            echo '<h4>Tabla de información extraída</h4>';
            echo '<div class="table-responsive"><table class="table table-bordered">';
            echo '<thead><tr><th>Orden</th><th>Unidad</th><th>Tema</th><th>Subtema</th><th>Estado</th></tr></thead><tbody>';
            foreach ($parsed as $row) {
                echo '<tr>';
                echo '<td>' . $row['orden'] . '</td>';
                echo '<td>' . htmlspecialchars($row['unidad']) . '</td>';
                echo '<td>' . htmlspecialchars($row['tema']) . '</td>';
                echo '<td>' . htmlspecialchars($row['subtema']) . '</td>';
                echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo '<div class="alert alert-warning">No se detectaron unidades, temas o subtemas en el archivo PDF. Verifique que el archivo contenga texto legible.</div>';
        }
    } else {
        // Show upload form for new silabo.
        echo '<div class="card">';
        echo '<div class="card-header">';
        echo '<h5>Subir sílabo del curso</h5>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<p><strong>Curso:</strong> ' . format_string($course->fullname) . '</p>';
        if (!empty($course->idnumber)) {
            echo '<p><strong>NRC:</strong> ' . s($course->idnumber) . '</p>';
        }
        
        echo '<form method="post" action="index.php?courseid=' . $courseid . '&action=upload" enctype="multipart/form-data">';
        echo '<input type="hidden" name="sesskey" value="' . sesskey() . '">';
        
        echo '<div class="form-group">';
        echo '<label for="silabo_file">Archivo PDF del sílabo:</label>';
        echo '<input type="file" name="silabo_file" id="silabo_file" class="form-control" accept=".pdf" required>';
        echo '<small class="form-text text-muted">Solo archivos PDF. Tamaño máximo: 20MB</small>';
        echo '</div>';
        
        echo '<button type="submit" class="btn btn-primary">Subir sílabo</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    
} else {
    // Show course selection interface.
    echo $OUTPUT->heading('Seleccionar curso para gestionar sílabo');
    
    echo '<div class="alert alert-info">';
    echo 'Seleccione el curso para el cual desea subir o gestionar el sílabo.';
    echo '</div>';
    
    echo '<div class="card">';
    echo '<div class="card-header">';
    echo '<h5>Mis cursos como profesor</h5>';
    echo '</div>';
    echo '<div class="card-body">';
    
    echo '<form method="get" action="index.php">';
    echo '<div class="form-group">';
    echo '<label for="courseid">Seleccionar curso:</label>';
    echo '<select name="courseid" id="courseid" class="form-control" required>';
    echo '<option value="">-- Seleccione un curso --</option>';
    
    foreach ($teachercourses as $tcourse) {
        $existing = local_silabo_get_user_silabo($tcourse->id, $USER->id);
        $status = $existing ? ' (Sílabo subido)' : ' (Sin sílabo)';
        $displayname = format_string($tcourse->fullname);
        if (!empty($tcourse->idnumber)) {
            $displayname .= ' [NRC: ' . $tcourse->idnumber . ']';
        }
        $displayname .= $status;
        
        echo '<option value="' . $tcourse->id . '">' . s($displayname) . '</option>';
    }
    
    echo '</select>';
    echo '</div>';
    
    echo '<button type="submit" class="btn btn-primary">Continuar</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    
    // Show summary table.
    echo '<div class="mt-4">';
    echo '<h4>Resumen de sílabos</h4>';
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Curso</th>';
    echo '<th>NRC</th>';
    echo '<th>Estado del sílabo</th>';
    echo '<th>Fecha de subida</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($teachercourses as $tcourse) {
        $existing = local_silabo_get_user_silabo($tcourse->id, $USER->id);
        
        echo '<tr>';
        echo '<td>' . format_string($tcourse->fullname) . '</td>';
        echo '<td>' . s($tcourse->idnumber ?? '-') . '</td>';
        
        if ($existing) {
            echo '<td><span class="badge badge-success">Subido</span></td>';
            echo '<td>' . date('d/m/Y H:i', $existing->fecha_subida) . '</td>';
        } else {
            echo '<td><span class="badge badge-warning">Pendiente</span></td>';
            echo '<td>-</td>';
        }
        
        echo '<td>';
        echo '<a href="index.php?courseid=' . $tcourse->id . '" class="btn btn-sm btn-primary">Gestionar</a>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
}

echo $OUTPUT->footer();
