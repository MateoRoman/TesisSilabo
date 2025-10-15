<?php
/**
 * Extract text content from PDF file - IMPROVED VERSION.
 *
 * @param string $filepath Full path to the PDF file
 * @return string Extracted text content
 */
function local_silabo_extract_pdf_text($filepath) {
    global $CFG;

   $python_script = 'C:/MoodleSilabo/server/moodle/local/silabo/extract_pdf.py';
   $xml_dir = 'C:/MoodleSilabo/server/moodledata/local_silabo/xml_output';

    if (!file_exists($xml_dir)) {
        mkdir($xml_dir, 0755, true);
    }

    $xml_filename = basename($filepath, '.pdf') . '.xml';
    $xml_filepath = $xml_dir . '/' . $xml_filename;

    // Ejecutar el script Python para extraer texto y generar el XML
    $command = escapeshellcmd("python $python_script") . ' ' . escapeshellarg($filepath) . ' ' . escapeshellarg($xml_filepath);
    exec($command, $output, $returnvar);
    error_log("Comando ejecutado: $command");
error_log("Código de salida: $returnvar");
error_log("Salida del script Python:\n" . implode("\n", $output));
echo "<pre>CMD: $command\nRETURN: $returnvar\nOUTPUT:\n" . implode("\n", $output) . "</pre>";


    if ($returnvar !== 0 || !file_exists($xml_filepath)) {
        error_log("Error al ejecutar el script Python: " . implode("\n", $output));
        return false; // Retornar false si la extracción falla
    }

    return $xml_filepath; // Retornar la ruta del archivo XML generado
}

/**
 * Simple PDF text extraction (basic method).
 *
 * @param string $filepath Path to PDF file
 * @return string Extracted text
 */
function local_silabo_simple_pdf_text_extract($filepath) {
    $content = file_get_contents($filepath);
    
    if (!$content) {
        return '';
    }
    
    // Basic PDF text extraction - look for text between parentheses and brackets
    $text = '';
    
    // Method 1: Extract text between parentheses
    if (preg_match_all('/\((.*?)\)/', $content, $matches)) {
        foreach ($matches[1] as $match) {
            // Filter out control characters and binary data
            $cleaned = preg_replace('/[^\x20-\x7E\x0A\x0D]/', ' ', $match);
            if (strlen(trim($cleaned)) > 2) { // Only include meaningful text
                $text .= $cleaned . ' ';
            }
        }
    }
    
    // Method 2: Extract text between brackets
    if (preg_match_all('/\[(.*?)\]/', $content, $matches)) {
        foreach ($matches[1] as $match) {
            $cleaned = preg_replace('/[^\x20-\x7E\x0A\x0D]/', ' ', $match);
            if (strlen(trim($cleaned)) > 2) {
                $text .= $cleaned . ' ';
            }
        }
    }
    
    // Method 3: Look for stream objects containing text
    if (preg_match_all('/stream\s*(.*?)\s*endstream/s', $content, $matches)) {
        foreach ($matches[1] as $stream) {
            // Try to extract readable text from stream
            $streamtext = preg_replace('/[^\x20-\x7E\x0A\x0D]/', ' ', $stream);
            $words = explode(' ', $streamtext);
            foreach ($words as $word) {
                if (strlen(trim($word)) > 3 && ctype_alpha(substr($word, 0, 1))) {
                    $text .= $word . ' ';
                }
            }
        }
    }
    
    // Clean up the extracted text
    $text = preg_replace('/\s+/', ' ', $text); // Normalize whitespace
    
    return trim($text);
}

/**
 * Clean extracted text.
 *
 * @param string $text Raw extracted text
 * @return string Cleaned text
 */
function local_silabo_clean_text($text) {
    // Remove control characters except newlines and tabs
    $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $text);
    
    // Normalize line endings
    $text = str_replace(["\r\n", "\r"], "\n", $text);
    
    // Remove multiple consecutive newlines
    $text = preg_replace('/\n{3,}/', "\n\n", $text);
    
    // Remove excessive whitespace
    $text = preg_replace('/[ \t]+/', ' ', $text);
    
    // Trim whitespace
    $text = trim($text);
    
    return $text;
}

/**
 * Save extracted text to file - IMPROVED VERSION.
 *
 * @param string $text The extracted text
 * @param string $originalfilename Original PDF filename
 * @return string|false The saved filename or false on failure
 */
function local_silabo_save_text_file($text, $originalfilename) {
    global $CFG;
    
    // Ensure we have actual text content
    if (empty(trim($text))) {
        $text = "=== ARCHIVO PROCESADO ===\n";
        $text .= "Archivo original: " . $originalfilename . "\n";
        $text .= "Estado: No se pudo extraer texto\n";
        $text .= "Fecha: " . date('Y-m-d H:i:s') . "\n";
        $text .= "Nota: El archivo PDF fue procesado pero no se pudo extraer texto legible automáticamente.";
    }
    
    // Create directory if it doesn't exist
    $textdir = $CFG->dataroot . '/local_silabo/extracted_text';
    if (!file_exists($textdir)) {
        mkdir($textdir, 0755, true);
    }
    
    // Generate unique filename
    $timestamp = time();
    $random = mt_rand(1000, 9999);
    $txtfilename = $timestamp . '_' . $random . '.txt';
    $filepath = $textdir . '/' . $txtfilename;
    
    // Add header to the text file
    $content = "=== SÍLABO - TEXTO EXTRAÍDO ===\n";
    $content .= "Archivo original: " . $originalfilename . "\n";
    $content .= "Fecha de extracción: " . date('Y-m-d H:i:s') . "\n";
    $content .= "Tamaño del texto: " . strlen($text) . " caracteres\n";
    $content .= "Palabras aproximadas: " . str_word_count($text) . "\n";
    $content .= "=====================================\n\n";
    $content .= $text;
    $content .= "\n\n=====================================\n";
    $content .= "Fin del documento extraído\n";
    
    // Save the file
    if (file_put_contents($filepath, $content) !== false) {
        return $txtfilename;
    }
    
    return false;
}

/**
 * Debug function to test PDF extraction methods.
 *
 * @param string $filepath Path to PDF file
 * @return string Debug information
 */
function local_silabo_debug_extraction($filepath) {
    $debug = "=== DEBUG EXTRACCIÓN PDF ===\n";
    $debug .= "Archivo: " . basename($filepath) . "\n";
    $debug .= "Tamaño: " . filesize($filepath) . " bytes\n";
    $debug .= "Fecha: " . date('Y-m-d H:i:s') . "\n\n";
    
    // Test pdftotext
    $debug .= "--- Probando pdftotext ---\n";
    $tempfile = tempnam(sys_get_temp_dir(), 'debug_');
    exec('pdftotext ' . escapeshellarg($filepath) . ' ' . escapeshellarg($tempfile) . ' 2>&1', $output, $returnvar);
    $debug .= "Código de retorno: $returnvar\n";
    $debug .= "Salida del comando: " . implode(', ', $output) . "\n";
    
    if (file_exists($tempfile)) {
        $content = file_get_contents($tempfile);
        $debug .= "Contenido extraído: " . strlen($content) . " caracteres\n";
        $debug .= "Primeros 200 caracteres: " . substr($content, 0, 200) . "\n\n";
        unlink($tempfile);
    } else {
        $debug .= "No se generó archivo temporal\n\n";
    }
    
    // Test simple extraction
    $debug .= "--- Probando extracción simple ---\n";
    $simple = local_silabo_simple_pdf_text_extract($filepath);
    $debug .= "Texto extraído: " . strlen($simple) . " caracteres\n";
    $debug .= "Primeros 200 caracteres: " . substr($simple, 0, 200) . "\n";
    
    return $debug;
}



/**
 * Get courses where user has teacher role.
 *
 * @param int $userid User ID
 * @return array Array of courses with course ID as key
 */
function local_silabo_get_teacher_courses($userid) {
    global $DB;
    
    $sql = "SELECT DISTINCT c.id, c.fullname, c.shortname, c.idnumber
            FROM {course} c
            JOIN {context} ctx ON ctx.instanceid = c.id AND ctx.contextlevel = :contextlevel
            JOIN {role_assignments} ra ON ra.contextid = ctx.id
            JOIN {role} r ON r.id = ra.roleid
            WHERE ra.userid = :userid 
            AND r.shortname IN ('editingteacher', 'teacher')
            AND c.id > 1
            ORDER BY c.fullname";
    
    $params = array(
        'contextlevel' => CONTEXT_COURSE,
        'userid' => $userid
    );
    
    $courses = $DB->get_records_sql($sql, $params);
    return $courses;
}

/**
 * Get silabo record for a specific course and user.
 *
 * @param int $courseid Course ID
 * @param int $userid User ID
 * @return object|false Silabo record or false if not found
 */
function local_silabo_get_user_silabo($courseid, $userid) {
    global $DB;
    
    return $DB->get_record('silabos', array(
        'curso_id' => $courseid,
        'profesor_id' => $userid
    ));
}

/**
 * Extends the course navigation with the silabo link.
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $course The course to object for the tool
 * @param context $context The context of the course
 */
function local_silabo_extend_navigation_course($navigation, $course, $context) {
    global $USER;
    
    // Only show for users with teacher capabilities
    if (has_capability('local/silabo:edit', $context)) {
        $url = new moodle_url('/local/silabo/index.php', array('courseid' => $course->id));
        $node = $navigation->add(
            get_string('silabo', 'local_silabo'),
            $url,
            navigation_node::TYPE_SETTING,
            null,
            'local_silabo',
            new pix_icon('i/document', '')
        );
        $node->showinflatnavigation = true;
    }
}

/**
 * Save uploaded PDF silabo file.
 *
 * @param array $fileinfo File upload information
 * @param int $courseid Course ID
 * @param int $userid User ID
 * @return array Result with success status and messages
 */
function local_silabo_save_uploaded_file($fileinfo, $courseid, $userid) {
    global $CFG, $DB;
    
    $result = array('success' => false, 'message' => '', 'fileid' => 0);
    
    try {
        // Validate file
        if ($fileinfo['error'] !== UPLOAD_ERR_OK) {
            $result['message'] = 'Error al subir el archivo: ' . $fileinfo['error'];
            return $result;
        }
        
        // Check file size
        $maxsize = get_config('local_silabo', 'max_file_size') ?: (20 * 1024 * 1024); // 20MB default
        if ($fileinfo['size'] > $maxsize) {
            $result['message'] = 'El archivo es demasiado grande. Máximo: ' . number_format($maxsize / 1024 / 1024, 1) . ' MB';
            return $result;
        }
        
        // Check file extension
        $allowed_extensions = explode(',', get_config('local_silabo', 'allowed_extensions') ?: 'pdf');
        $file_extension = strtolower(pathinfo($fileinfo['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $result['message'] = 'Tipo de archivo no permitido. Solo se permiten: ' . implode(', ', $allowed_extensions);
            return $result;
        }
        
        // Create file record
        $file_record = array(
            'contextid' => context_course::instance($courseid)->id,
            'component' => 'local_silabo',
            'filearea' => 'silabo',
            'itemid' => $courseid,
            'filepath' => '/',
            'filename' => $fileinfo['name'],
            'userid' => $userid
        );
        
        // Save file to Moodle file system
        $fs = get_file_storage();
        
        // Delete existing file if any
        $existing_files = $fs->get_area_files(
            $file_record['contextid'],
            $file_record['component'],
            $file_record['filearea'],
            $file_record['itemid'],
            'filename',
            false
        );
        foreach ($existing_files as $existing_file) {
            $existing_file->delete();
        }
        
        // Create new file
        $stored_file = $fs->create_file_from_pathname($file_record, $fileinfo['tmp_name']);
        
        if (!$stored_file) {
            $result['message'] = 'Error al guardar el archivo en el sistema';
            return $result;
        }
        
        // Extract text from PDF
        $extracted_text = local_silabo_extract_pdf_text($fileinfo['tmp_name']);
        
        // Save extracted text to file
        $txt_filename = local_silabo_save_text_file($extracted_text, $fileinfo['name']);
        
        // Calculate file hash
        $file_hash = sha1_file($fileinfo['tmp_name']);
        
        // Save to database
        $silabo_record = new stdClass();
        $silabo_record->nombre_archivo = $fileinfo['name'];
        $silabo_record->contenido = substr($extracted_text, 0, 65535); // Limit for TEXT field
        $silabo_record->estado = 'procesado';
        $silabo_record->fecha_subida = time();
        $silabo_record->curso_id = $courseid;
        $silabo_record->profesor_id = $userid;
        $silabo_record->archivo_txt = $txt_filename;
        $silabo_record->hash_archivo = $file_hash;
        
        // Check if record exists
        $existing = local_silabo_get_user_silabo($courseid, $userid);
        if ($existing) {
            $silabo_record->id = $existing->id;
            $DB->update_record('silabos', $silabo_record);
        } else {
            $silabo_record->id = $DB->insert_record('silabos', $silabo_record);
        }
        
        $result['success'] = true;
        $result['message'] = 'Sílabo subido exitosamente. Texto extraído: ' . strlen($extracted_text) . ' caracteres.';
        $result['fileid'] = $stored_file->get_id();
        $result['txt_file'] = $txt_filename;
        
    } catch (Exception $e) {
        $result['message'] = 'Error: ' . $e->getMessage();
    }
    
    return $result;
}

/**
 * Generate HTML for silabo display.
 *
 * @param object $silabo Silabo record
 * @param object $course Course object
 * @return string HTML content
 */
function local_silabo_generate_html($silabo, $course) {
    global $OUTPUT;
    
    $html = '';
    
    if ($silabo) {
        $html .= html_writer::start_tag('div', array('class' => 'silabo-container'));
        
        // Header
        $html .= html_writer::tag('h3', 'Sílabo - ' . $course->fullname, array('class' => 'silabo-title'));
        
        // File info
        $html .= html_writer::start_tag('div', array('class' => 'silabo-info'));
        $html .= html_writer::tag('p', '<strong>Archivo:</strong> ' . $silabo->nombre_archivo);
        $html .= html_writer::tag('p', '<strong>Fecha de subida:</strong> ' . date('d/m/Y H:i', $silabo->fecha_subida));
        $html .= html_writer::tag('p', '<strong>Estado:</strong> <span class="badge badge-success">' . ucfirst($silabo->estado) . '</span>');
        
        if (!empty($silabo->contenido)) {
            $caracteres = strlen($silabo->contenido);
            $palabras = str_word_count($silabo->contenido);
            $html .= html_writer::tag('p', '<strong>Contenido extraído:</strong> ' . $caracteres . ' caracteres, ' . $palabras . ' palabras aproximadas');
        }
        
        $html .= html_writer::end_tag('div');
        
        // Content preview
        if (!empty($silabo->contenido)) {
            $html .= html_writer::tag('h4', 'Vista previa del contenido:');
            $preview = substr($silabo->contenido, 0, 500);
            if (strlen($silabo->contenido) > 500) {
                $preview .= '...';
            }
            $html .= html_writer::tag('div', nl2br(htmlspecialchars($preview)), array('class' => 'silabo-preview well'));
        }
        
        $html .= html_writer::end_tag('div');
    }
    
    return $html;
}

/**
 * Guarda o actualiza un registro de sílabo en la base de datos.
 *
 * @param object $data Datos del sílabo a guardar
 * @return int ID del registro guardado/actualizado
 */
function local_silabo_save_silabo($data) {
    global $DB;
    
    // Si es una actualización (tiene ID)
    if (!empty($data->id)) {
        // Actualizar registro existente
        $DB->update_record('silabos', $data);
        return $data->id;
    } else {
        // Insertar nuevo registro
        return $DB->insert_record('silabos', $data);
    }
}

/**
 * Determina si una línea es un subtema válido según reglas heurísticas.
 *
 * @param string $line
 * @return bool
 */
function local_silabo_is_valid_subtema($line) {
    $line = trim($line);
    if ($line === '') return false;

    // Excluir encabezados típicos de actividades
    $excluir = [
        'tarea', 'proyecto', 'laboratorio', 'práctica', 'practica', 'examen', 'evaluación', 'evaluacion', 'trabajo', 'actividad',
        'aplicación', 'aplicacion', 'control', 'componentes', 'prácticas', 'practicas', 'resultado de aprendizaje', 'por unidad curricular',
        'actividades integradoras', 'alta a'
    ];
    foreach ($excluir as $palabra) {
        if (preg_match('/^' . preg_quote($palabra, '/') . '\b/i', $line)) return false;
    }

    // Excluir líneas con palabras comunes de autores/editoriales o palabras irrelevantes
    $irrelevantes = [
        'año', 'español', 'editorial', 'coordinador', 'director', 'autor', 'ediciones', 'spring boot', 'craig walls', 'trends and predictions',
        'firma de legalización', 'firma de legalizacion', 'no y', 'angel', 'juan', 'sonia', 'elizabeth', 'departamento'
    ];
    foreach ($irrelevantes as $palabra) {
        if (stripos($line, $palabra) !== false) return false;
    }

    // Excluir líneas completamente en mayúsculas (probablemente encabezados o autores)
    if (mb_strtoupper($line, 'UTF-8') === $line && mb_strtolower($line, 'UTF-8') !== $line) return false;

    // Excluir líneas con números o símbolos especiales
    if (preg_match('/[\d\(\)\[\]\{\}\=\+\*\%\/\\\_\@\#\$\¿\?\¡\!]/', $line)) return false;

    // Excluir líneas con punto, coma, dos puntos, punto y coma, o guion al final
    if (preg_match('/[.,:;\-]$/', $line)) return false;

    // Excluir líneas largas o muy cortas
    $numwords = str_word_count($line);
    if ($numwords < 2 || $numwords > 7) return false;

    // Excluir líneas que parecen oraciones completas (empiezan con mayúscula y tienen verbo)
    if (preg_match('/^[A-ZÁÉÍÓÚÑ][^.!?]*\s[a-záéíóúñ]+\s[a-záéíóúñ]+/', $line) && preg_match('/\b(son|es|está|están|fue|fueron|será|serán|se|hay|tiene|tienen|puede|pueden|debe|deben|incluye|incluyen|describe|describen|explica|explican|realiza|realizan|aplica|aplican|analiza|analizan)\b/i', $line)) {
        return false;
    }

    // Solo letras y espacios (conceptos/títulos)
    if (!preg_match('/^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+$/u', $line)) return false;

    // Si no contiene signos de puntuación y cumple con la longitud, aceptarlo
    if (!preg_match('/[.!?,:;]/', $line)) {
        return true;
    }

    return false;
}

/**
 * Parsea el texto extraído del PDF para obtener unidades, temas y subtemas.
 * Aplica reglas para filtrar subtemas válidos.
 *
 * @param string $text Texto extraído del PDF
 * @return array Array de arrays con claves: unidad, tema, subtema, estado
 */
function local_silabo_parse_pdf_content($text) {
    $lines = preg_split('/\r\n|\r|\n/', $text);
    $data = [];
    $current_unidad = '';
    $current_tema = '';
    $orden = 1;
    $in_contenidos = false;

    foreach ($lines as $line) {
        $line = trim($line);

        // Detectar inicio de contenidos
        if (preg_match('/^CONTENIDOS$/i', $line)) {
            $in_contenidos = true;
            continue;
        }
        if (!$in_contenidos) {
            continue;
        }

        // Detectar unidad
        if (preg_match('/^Unidad\s*\d+/i', $line)) {
            $current_unidad = $line;
            $current_tema = '';
            continue;
        }

        // Detectar tema (primera línea relevante después de unidad)
        if ($current_unidad && !$current_tema && $line !== '' && stripos($line, 'Horas') === false && stripos($line, 'TRABAJO') === false) {
            $current_tema = $line;
            continue;
        }

        // Saltar líneas irrelevantes
        if ($line === '' || stripos($line, 'Horas') !== false || stripos($line, 'TRABAJO') !== false || stripos($line, 'Prácticas') !== false) {
            continue;
        }

        // Si ya tenemos unidad y tema, las siguientes líneas no vacías son subtemas válidos
        if ($current_unidad && $current_tema && $line !== '' && local_silabo_is_valid_subtema($line)) {
            $data[] = [
                'orden' => $orden++,
                'unidad' => $current_unidad,
                'tema' => $current_tema,
                'subtema' => $line,
                'estado' => 'Incumplido'
            ];
        }
    }
    return $data;
}

/**
 * Procesa un archivo XML y lo convierte en un archivo TXT estructurado.
 *
 * @param string $xml_filepath Ruta del archivo XML
 * @param string $txt_filepath Ruta del archivo TXT de salida
 * @return bool Retorna true si el procesamiento fue exitoso, false en caso contrario
 */
function local_silabo_process_xml_to_txt($xml_filepath, $txt_filepath) {
    $python_script = 'C:/MoodleSilabo/server/moodle/local/silabo/parse_xml.py';
    $command = escapeshellcmd("python $python_script") . ' ' . escapeshellarg($xml_filepath) . ' ' . escapeshellarg($txt_filepath);
    exec($command, $output, $returnvar);

    error_log("Comando ejecutado: $command");
    error_log("Código de salida: $returnvar");
    error_log("Salida del script Python:\n" . implode("\n", $output));

    return $returnvar === 0;
}