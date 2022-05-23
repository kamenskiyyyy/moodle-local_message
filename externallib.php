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
 * ${PLUGINNAME} file description here.
 *
 * @package    ${PLUGINNAME}
 * @copyright  2022 mac <${USEREMAIL}>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use local_message\manager;

require_once($CFG->libdir . '/externallib.php');

class local_message_external extends external_api {
    /**
     * The function itself
     * @return string
     */
    public static function delete_message($messageid): string {
        $params = self::validate_parameters(self::delete_message_parameters(), ['messageid' => $messageid]);

        $manager = new manager();
        return $manager->delete_message($messageid);
    }

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function delete_message_parameters() {
        return new external_function_parameters(['messageid' => new external_value(PARAM_INT, 'id of message')],);
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function delete_message_returns() {
        return new external_value(PARAM_BOOL, 'True if the message was successfully deleted');
    }
}
