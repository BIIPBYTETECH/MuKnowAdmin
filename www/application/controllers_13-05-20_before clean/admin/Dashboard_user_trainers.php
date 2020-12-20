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
        //echo '<pre>'; print_r($logintype); exit;
       $this->db->select('`u`.about,`u`.id,`u`.username,`u`.user_type,`u`.email,`u`.created_on,`u`.mobile_verify,`u`.status,`u`.email_verify,`u`.first_name,`u`.last_name,`u`.telcode,`u`.phone,`u`.status,`u`.login_type,img.raw_name as raw_name,img.file_ext as file_ext');
       // $this->db->select('u.*,g.name as group_name,ug.group_id');
        $this->db->from('users u');
       // $this->db->join(' users_groups ug', 'u.id = ug.user_id');
       // $this->db->join(' groups g', 'g.id = ug.group_id');
        //$this->db->join(' department_list d', 'd.id = u.department');
        //$this->db->join(' company_list c', 'c.id = u.company');
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
        //$fbusers = $this->Register_user_model->get_fbuser_all($id);
        // $data['register_user'] = $fbusers;
//        echo '<pre>'; print_r($data); exit;
        $this->load->view('admin/dashboard_users_trainers', $data);
    }

}
