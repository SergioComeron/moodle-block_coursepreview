<?php

class block_coursepreview_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block_coursepreview'));
        $mform->addElement('text', 'config_title', get_string('title', 'block_coursepreview'));
        $mform->setDefault('config_title', get_string('pluginname', 'block_coursepreview'));
        $mform->setType('config_title', PARAM_TEXT);
        $options = array('multiple' => false, 'includefrontpage' => true);
        $mform->addElement('course', 'config_course', get_string('course', 'block_coursepreview'), $options);
        $mform->addElement('editor', 'config_text', get_string('content', 'block_coursepreview'), array('enable_filemanagement' => false));
        $mform->setType('config_text', PARAM_RAW);
    }
}
