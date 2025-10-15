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
 * Installation and upgrade functions for local_silabo plugin.
 *
 * @package    local_silabo
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Post installation procedure.
 */
function xmldb_local_silabo_install() {
    global $CFG;
    
    // Create directory for extracted text files.
    $textdir = $CFG->dataroot . '/local_silabo';
    if (!file_exists($textdir)) {
        mkdir($textdir, 0755, true);
    }
    
    $extractdir = $textdir . '/extracted_text';
    if (!file_exists($extractdir)) {
        mkdir($extractdir, 0755, true);
    }
    
    // Set default configuration.
    set_config('enabled', 1, 'local_silabo');
    set_config('max_file_size', 20 * 1024 * 1024, 'local_silabo'); // 20MB
    set_config('allowed_extensions', 'pdf', 'local_silabo');
    
    return true;
}

/**
 * Upgrade procedure.
 *
 * @param int $oldversion The old version
 * @return bool
 */
function xmldb_local_silabo_upgrade($oldversion) {
    global $CFG;
    
    if ($oldversion < 2025071601) {
        // Add new directories if needed.
        $textdir = $CFG->dataroot . '/local_silabo/extracted_text';
        if (!file_exists($textdir)) {
            mkdir($textdir, 0755, true);
        }
        
        upgrade_plugin_savepoint(true, 2025071601, 'local', 'silabo');
    }
    
    return true;
}

/**
 * Uninstall procedure.
 */
function xmldb_local_silabo_uninstall() {
    global $CFG;
    
    // Clean up configuration.
    unset_all_config_for_plugin('local_silabo');
    
    // Note: We don't delete the data directory or files as they might be needed
    // The admin can manually delete them if desired
    
    return true;
}
