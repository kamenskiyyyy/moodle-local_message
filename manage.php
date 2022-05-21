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
 * local_message file description here.
 *
 * @package    local_message
 * @copyright  2022 mac <${USEREMAIL}>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use local_message\manager;

require_once (__DIR__ . '/../../config.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('manage_messages', "local_message"));

$manager = new manager();
$messages = $manager->get_all_messages();

echo $OUTPUT->header();

$templatecontext = (object)['messages' => array_values($messages), 'editurl' => new moodle_url('/local/message/edit.php'), 'header_text' => get_string('manage_messages', "local_message"), 'button_submit_text' => get_string('button_submit_text', "local_message"),
];

echo $OUTPUT->render_from_template('local_message/manage', $templatecontext);
echo $OUTPUT->footer();
