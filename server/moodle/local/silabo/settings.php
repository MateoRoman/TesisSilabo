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
 * Plugin administration pages.
 *
 * @package    local_silabo
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_silabo', get_string('pluginname', 'local_silabo'));

    // Add a setting for enabling/disabling the plugin.
    $settings->add(new admin_setting_configcheckbox(
        'local_silabo/enabled',
        'Habilitar plugin',
        'Activar o desactivar la funcionalidad del plugin de sílabos',
        1
    ));

    // Add setting for maximum file size.
    $settings->add(new admin_setting_configtext(
        'local_silabo/max_file_size',
        'Tamaño máximo de archivo (bytes)',
        'Tamaño máximo permitido para archivos PDF. Por defecto: 20MB (20971520 bytes)',
        20971520,
        PARAM_INT
    ));

    // Add setting for allowed file extensions.
    $settings->add(new admin_setting_configtext(
        'local_silabo/allowed_extensions',
        'Extensiones de archivo permitidas',
        'Extensiones de archivo permitidas, separadas por comas. Solo PDF es recomendado.',
        'pdf',
        PARAM_TEXT
    ));

    // Add setting for text extraction method.
    $options = array(
        'auto' => 'Automático (probar todos los métodos)',
        'pdftotext' => 'pdftotext (comando del sistema)',
        'parser' => 'PDF Parser (librería PHP)',
        'basic' => 'Método básico (menos confiable)'
    );
    $settings->add(new admin_setting_configselect(
        'local_silabo/extraction_method',
        'Método de extracción de texto',
        'Método preferido para extraer texto de archivos PDF',
        'auto',
        $options
    ));

    // Add setting for keeping original files.
    $settings->add(new admin_setting_configcheckbox(
        'local_silabo/keep_originals',
        'Conservar archivos originales',
        'Mantener los archivos PDF originales en el sistema de archivos de Moodle',
        1
    ));

    // Add setting for text file retention.
    $settings->add(new admin_setting_configtext(
        'local_silabo/text_retention_days',
        'Días de retención de archivos de texto',
        'Número de días para conservar los archivos .txt extraídos. 0 = permanente',
        0,
        PARAM_INT
    ));

    // Information about system tools.
    $pdftotext_available = false;
    if (function_exists('exec')) {
        $output = array();
        $return_var = 0;
        @exec('pdftotext -v', $output, $return_var);
        $pdftotext_available = ($return_var === 0 || $return_var === 1); // pdftotext returns 1 when showing version
    }

    $info_text = '<div class="alert alert-info">';
    $info_text .= '<h5>Estado de herramientas del sistema:</h5>';
    $info_text .= '<p><strong>pdftotext:</strong> ' . ($pdftotext_available ? '✅ Disponible' : '❌ No disponible') . '</p>';
    $info_text .= '<p><strong>Función exec():</strong> ' . (function_exists('exec') ? '✅ Habilitada' : '❌ Deshabilitada') . '</p>';
    
    if (!$pdftotext_available) {
        $info_text .= '<div class="alert alert-warning mt-2">';
        $info_text .= '<strong>Recomendación:</strong> Instale poppler-utils para mejor extracción de texto:<br>';
        $info_text .= '<code>apt-get install poppler-utils</code> (Ubuntu/Debian)<br>';
        $info_text .= '<code>yum install poppler-utils</code> (CentOS/RHEL)';
        $info_text .= '</div>';
    }
    $info_text .= '</div>';

    $settings->add(new admin_setting_heading(
        'local_silabo/system_info',
        'Información del sistema',
        $info_text
    ));

    $ADMIN->add('localplugins', $settings);
}
