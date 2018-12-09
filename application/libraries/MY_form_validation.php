<?php

class MY_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();
    }

    public function clear_field_data() {

        $this->_field_data = array();
        return $this;
    }
}