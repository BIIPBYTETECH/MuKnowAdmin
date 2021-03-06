<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . '/core/Admin_Controller.php';
require APPPATH . '/libraries/MY_Model.php';

class Dashboard_subscription extends Admin_Controller {

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
        $this->load->model('Subscription_model');
    }

    public function index() {
        
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');

        $this->db->order_by('id','desc');
        $this->db->where("deleted=0");
        $this->data['subscription'] = $this->Subscription_model->get_all();
        $this->load->view('admin/dashboard_subscription', $this->data, FALSE);
    }

    function add_subscription() {
//        print_r($_POST);exit();
        $stripe_processing_fee = $this->input->post('stripe_processing_fee');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $description = $this->input->post('description');
        $total = $this->input->post('total');
        $duration = $this->input->post('duration');        
        $referral_code_flag = $this->input->post('referral_code_flag');
         $cash_back = '0';
         
         
         $total_stripe_fee=$stripe_processing_fee+$price;
        $validity = $total.' '.$duration;
		
		$check = $this->Subscription_model->get_all(array('name' => $name));
		
		if(!empty($check)){
			$this->session->set_flashdata('error', " $name Subscription Code already exists.");
			redirect(site_url() . '/admin/Dashboard_subscription');
		}
		else {
       
        $this->form_validation->set_rules('price', 'Price', 'required', array('required' => 'Please Enter %s.'));
        $this->form_validation->set_rules('description', 'Description', 'required', array('required' => 'Please Enter %s.'));

        if ($this->session->userdata('session_data'))
            $template_data = $this->session->userdata('session_data');

        if ($this->form_validation->run() == FALSE) :
            $message = strip_tags(validation_errors());
            $this->session->set_flashdata('error', $message);

        else:
            $data_subscription = array(
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'validity' => $validity,
                'cash_back' => $cash_back,
                'referral_code_flag'=>$referral_code_flag,
                'stripe_processing_fee'=>$stripe_processing_fee,
                'total_stripe_fee'=>$price
            );

            $this->Subscription_model->insert($data_subscription);
          
            $this->session->set_flashdata('message', "Subscription Added Successfully.");
            redirect(site_url() . 'admin/Dashboard_subscription');
        endif;
        redirect(site_url() . 'admin/Dashboard_subscription');
		}
    }
public function delete_subscription() {
     
       echo $id = $this->input->post('ct_id');
      
            $this->data['categories'] =  $this->Subscription_model->delete(array('id' => $id));
 }
}
