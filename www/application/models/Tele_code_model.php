<?php

/**
 * Created by PhpStorm.
 * User: HoangLeHuy
 * Date: 7/10/15
 * Time: 6:45 PM
 */

//require APPPATH . '/libraries/REST_Controller.php';

//require APPPATH . '/libraries/MY_Model.php';

class Tele_code_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
         $this->load->database();
        $this -> table = 'tel_code';
		$this -> result_mode = 'object';
		$this -> primary_key = 'id';
       
    }
}