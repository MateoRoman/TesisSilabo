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
 * Navigation hooks for local_silabo plugin.
 *
 * @package    local_silabo
 * @copyright  2025 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Add silabo tab to course navigation for teachers.
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $course The course object
 * @param context $context The course context
 */
function local_silabo_extend_navigation_course($navigation, $course, $context) {
    global $USER;
    
    // Only show for logged in users.
    if (!isloggedin() || isguestuser()) {
        return;
    }
    
    // Check if user is teacher in this course.
    $teachercourses = local_silabo_get_teacher_courses($USER->id);
    if (!array_key_exists($course->id, $teachercourses)) {
        return;
    }
    
    // Check if plugin is enabled.
    if (!get_config('local_silabo', 'enabled')) {
        return;
    }
    
    // Add the silabo navigation link.
    $url = new moodle_url('/local/silabo/index.php', array('courseid' => $course->id));
    $node = $navigation->add(
        get_string('silabo', 'local_silabo'),
        $url,
        navigation_node::TYPE_CUSTOM,
        null,
        'local_silabo',
        new pix_icon('i/files', '')
    );
    
    // Set the node to be active if we're on the silabo page.
    global $PAGE;
    if ($PAGE->url && $PAGE->url->get_path() == '/local/silabo/index.php') {
        $node->make_active();
    }
}
