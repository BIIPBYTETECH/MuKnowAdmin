<?php

class MkUsers_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'mk_users';
        $this->result_mode = 'object';
        $this->primary_key = 'id';
    }
}