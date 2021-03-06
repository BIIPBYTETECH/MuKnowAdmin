<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . '/core/Admin_Controller.php';
require APPPATH . '/libraries/MY_Model.php';

class Dashboard_payment extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->original_path = 'assets/uploads/category_image';
        $this->load->library('upload');
        $this->load->library('image_lib');
        $this->load->model('Image_upload_model');
        $this->load->model('Category_model');
        $this->load->library('smiles_file');
        $this->load->model('Articles_model');
        $this->load->model('Articles_view_model');
        $this->load->model('Payment_model');
    }

    public function index() {
        
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');

        //$this->db->order_by('id','desc');
//        $this->data['payment'] = $this->Payment_model->get_all();
        
           $this->db->select('`u`.*,ug.*');
           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');

       // $this->db->select('u.*,g.name as group_name,ug.group_id');
        $this->db->from('stripe_payment u');   
        $this->data['payment'] =   $this->db->get()->result();

//        print_r('j');exit;
//echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment', $this->data, FALSE);
    }
	public function telenor() {
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');
            $this->db->select('`u`.*,ug.*,mku.*,mkuref.full_name as ref_user_name');
           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');
             $this->db->join('mk_users mku', 'mku.user_id = ug.user_id');

             
                 $this->db->join('mk_users mkuref', 'u.ref_used_by_user_id = mkuref.user_id');
       // $this->db->select('u.*,g.name as group_name,ug.group_id');
        $this->db->from('stripe_payment_user_cash_back_details u');   
        $this->data['payment'] =   $this->db->get()->result();
        
//echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment_telenor', $this->data, FALSE);
    }
    
    
    
    
    
    public function cash_bach_revenue() {
        
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');

        //$this->db->order_by('id','desc');
//        $this->data['payment'] = $this->Payment_model->get_all();
        
           $this->db->select('`u`.*,ug.*');
           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');

       // $this->db->select('u.*,g.name as group_name,ug.group_id');
        $this->db->from('stripe_payment u');   
        $this->data['payment'] =   $this->db->get()->result();

//        print_r('j');exit;
//echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment_cashback_revenu', $this->data, FALSE);
    }
    public function view_scratchcard($id){
          if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');
            $this->db->select('`u`.*,ug.*,mku.*,mkuref.full_name as ref_user_name,mkuref.email_id as ref_user_email');
           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');
             $this->db->join('mk_users mku', 'mku.user_id = ug.user_id');

             
                 $this->db->join('mk_users mkuref', 'u.ref_used_by_user_id = mkuref.user_id');
       // $this->db->select('u.*,g.name as group_name,ug.group_id');
        $this->db->from('stripe_payment_user_cash_back_details u');   
          $this->db->where('u.user_id='.$id);
        $this->data['payment'] =   $this->db->get()->result();

//        print_r('j');exit;
//echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment_cashback_revenue_view_details', $this->data, FALSE);
    }
}
