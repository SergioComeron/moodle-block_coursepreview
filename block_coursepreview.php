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
 * With this block installed, the courses that are enrolled and we are enrolled are shown in the profile of a user.
 *
 * @package    block_coursepreview
 * @copyright  2019 Sergio Comerón Sánchez-Paniagua
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_coursepreview extends block_list {

    /**
     * @var bool Flag to indicate whether the header should be hidden or not.
     */
    private $headerhidden = true;

    /**
     * Init function
     *
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_coursepreview');
    }

    /**
     * applicable_formats function
     *
     */
    public function applicable_formats() {
        // Only add at user-profile and other course-profiles (weeks & topics)
        return array('all' => true);
    }

    /**
     * get_content function
     *
     */
    public function get_content() {
        global $USER, $CFG;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            return '';
        }

        $this->content = new stdClass();
        $context = context_course::instance($this->config->course);

        if ((strpos($this->page->pagetype, 'my-index') === 0) && is_enrolled($context, $USER->id, '', true) == 1) {
          $this->content->items[] = $this->config->text['text'];
          $this->content->icons[] = '';
        } else {
          $this->content = '';
        }
        return $this->content;
    }

    public function specialization() {
    if (isset($this->config)) {
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_coursepreview');
        } else {
            $this->title = $this->config->title;
        }

        if (empty($this->config->text)) {
            $this->config->text = get_string('defaulttext', 'block_coursepreview');
        }
    }
}
}
