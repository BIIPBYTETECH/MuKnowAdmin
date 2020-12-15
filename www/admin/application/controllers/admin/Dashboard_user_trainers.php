<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . '/core/Admin_Controller.php';
require APPPATH . '/libraries/MY_Model.php';

class Dashboard_user_trainers extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Register_user_model');
        $this->load->model('Register_user_group_model');
        $this->load->library('Aes');
    }

   public function index($id,$logintype='') {
         if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
         $this->db->select('`u`.about,`u`.id,`u`.username,`u`.user_type,`u`.email,`u`.created_on,`u`.mobile_verify,`u`.status,`u`.email_verify,`u`.first_name,`u`.last_name,`u`.telcode,`u`.phone,`u`.status,`u`.login_type,img.raw_name as raw_name,img.file_ext as file_ext');
        $this->db->from('users u');
     
        $this->db->join(' image_files img', 'img.user_id = u.id AND img.type = 1', 'left');
        $this->db->where("u.user_type='$id'");
        if(!empty($logintype) && $id!='trainer')
        {
           $this->db->where("u.login_type='fb_login'"); 
        }
        elseif($id !='trainer') { 
           $this->db->where('u.login_type =',NULL); 
        }
		$this->db->order_by('u.created_on', 'DESC');
        $data['register_user'] = $this->db->get()->result();
		
       // echo '<pre>'; print_r($data['register_user']); exit;
     
        $this->load->view('admin/dashboard_users_trainers', $data);
    }

}
