<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . '/core/Admin_Controller.php';
require APPPATH . '/libraries/MY_Model.php';

class Dashboard_tier_settings extends Admin_Controller {

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
        $this->load->model('Subscription_model'); $this->load->model('Tier_settings_model');
    }

    public function index() {
        
        if ($this->session->userdata('session_data'))
            $this->data = $this->session->userdata('session_data');

        $this->db->order_by('id','desc');
         $this->db->where("deleted=0");
        $this->data['subscription'] = $this->Tier_settings_model->get_all();
        $this->load->view('admin/dashboard_tier_settings', $this->data, FALSE);
    }

    function add_tier_settings() {
       
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $duration = $this->input->post('duration');        
        $alldt=$this->Tier_settings_model->get_all(array('tier_type_flag' => $duration));
        $this->form_validation->set_rules('price', 'Price', 'required', array('required' => 'Please Enter %s.'));
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[20]', array('required' => 'Please Enter %s.'));
      if ($this->session->userdata('session_data'))
            $template_data = $this->session->userdata('session_data');

        if ($this->form_validation->run() == FALSE) :
            $message = strip_tags(validation_errors());
            $this->session->set_flashdata('error', $message);
elseif(count($alldt)>0):
    $message = "TierType'".$duration."' Already exist.";
            $this->session->set_flashdata('error', $message);

        else:
            $data_subscription = array(
                'tier_type' => $name,
                'cash_back' => $price,
                'tier_type_flag' => $duration,
              
            );

            $this->Tier_settings_model->insert($data_subscription);
            $this->session->set_flashdata('message', "Subscription Added Successfully.");
            redirect(site_url() . 'admin/Dashboard_tier_settings');
        endif;
        redirect(site_url() . 'admin/Dashboard_tier_settings');   
     
    }
 public function delete_tier_setting() {
     
    echo   $id = $this->input->post('ct_id');
       $update_category = array(
                'deleted' => '1'
            );
            $this->data['categories'] =$this->Tier_settings_model->delete(array('id' => $id));// $this->Tier_settings_model->update($id, $update_category);
 }
}
