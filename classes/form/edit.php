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
 * @copyright  2022 mac <kamenik1@icloud.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_message\form;
use moodleform;

require_once("$CFG->libdir/formslib.php");

class edit extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);
        $mform->addElement('text', 'messagetext', get_string('enter_message', "local_message")); // Add elements to your form.
        $mform->setType('messagetext', PARAM_NOTAGS);                   // Set type of element.
        $mform->setDefault('messagetext', get_string('enter_message_default', "local_message"));        // Default value.

        $choices = array();
        $choices['0'] = \core\notification::WARNING;
        $choices['1'] = \core\notification::INFO;
        $choices['2'] = \core\notification::SUCCESS;
        $choices['3'] = \core\notification::ERROR;
        $mform->addElement('select', "messagetype", get_string('message_type', "local_message"), $choices);
        $mform->setDefault('messagetype', '1');

        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}
