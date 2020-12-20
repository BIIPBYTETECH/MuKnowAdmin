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

            
           $this->db->select('`u`.*,(select full_name from mk_users where u.user_id=mk_users.user_id) as strip_customer_name');
//           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');

         $this->db->from('stripe_payment u');   
        $this->data['payment'] =   $this->db->get()->result();
// print_r($this->db->last_query()); exit;
       //echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment', $this->data, FALSE);
    }
	public function telenor() {
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');
        $this->db->select('`u`.*,(select full_name from mk_users where u.user_id=mk_users.user_id) as strip_customer_name,(select email_id from mk_users where u.user_id=mk_users.user_id) as strip_customer_email,(select mobile_num from mk_users where u.user_id=mk_users.user_id) as mobile_num');
            $this->db->select('mkuref.full_name as ref_user_name');
////           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');
//             $this->db->join('mk_users mku', 'mku.user_id = u.user_id','left');
            $this->db->join('mk_users mkuref', 'u.ref_used_by_user_id = mkuref.user_id','left');
          $this->db->from('stripe_payment_user_cash_back_details u');   
          $this->data['payment'] =   $this->db->get()->result();
        
        //echo '<pre>'; print_r($this->data['payment']); 
      //  print_r($this->db->last_query()); exit;
        $this->load->view('admin/dashboard_payment_telenor', $this->data, FALSE);
    }
    
    
    
    public function cash_bach_revenue() {
        
       if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');

       
           $this->db->select('`ug`.user_id,`ug`.`strip_customer_name`,`ug`.`strip_customer_email`,`u`.`user_id`');
          // $this->db->group_by("u.user_id");
           $this->db->group_by("`ug`.`user_id`,`ug`.`strip_customer_name`,`ug`.`strip_customer_email`");

           $this->db->join('user_stripe_details ug', 'u.user_id = ug.user_id');

        $this->db->from('stripe_payment u');   
        $this->data['payment'] =   $this->db->get()->result();

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
        $this->db->from('stripe_payment_user_cash_back_details u');   
          $this->db->where('u.user_id='.$id);
       $this->db->group_by('u.transaction_id');
       $this->data['payment'] =   $this->db->get()->result();

       //echo '<pre>'; print_r($this->data['payment']); exit;
        $this->load->view('admin/dashboard_payment_cashback_revenue_view_details', $this->data, FALSE);
    }
}
