<?php

class Tier_settings_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'tier_settings_cashback';
        $this->result_mode = 'object';
        $this->primary_key = 'id';
    }
}