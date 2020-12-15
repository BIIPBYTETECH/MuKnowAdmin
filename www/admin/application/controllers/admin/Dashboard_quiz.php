<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require APPPATH . '/core/Admin_Controller.php';
require APPPATH . '/libraries/MY_Model.php';

class Dashboard_quiz extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Register_user_model');
        $this->load->model('Register_user_group_model');
        $this->load->model('Category_model');
        $this->load->model('Ion_auth_model');
        $this->load->model('Articles_model');
        $this->load->model('Quiz_article_model');
        $this->load->library('upload');
        $this->load->model('Image_upload_model');
        $this->load->library('image_lib');
        $this->lang->load('auth');
        $this->load->library('Aes');
        $this->articleimage_original_path = 'assets/uploads/articles_image';
        $this->articlevideo_original_path = 'assets/uploads/articles_videos';
        $user_id = $this->ion_auth->user()->row()->id;
    }

    public function index() { 
        //print_r("Ddd");        die();
        $id = $this->uri->segment(5);
         if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
      
        $user_id = $this->ion_auth->user()->row()->id;
         
        //test
        if (empty($id) || $id =='subscriber' || $id =='non_subscriber' || $id == 'mini_certification' || $id == 'courses'):
            $data['mode'] = 'quiz_add';
        else:
            $data['mode'] = 'quiz_edit';
        endif;
            $data['arttype'] = $this->uri->segment('5'); 
           
        $this->load->view('admin/dashboard_articles_new_add', $data);
//        end
        
        
//        if (empty($id) || $id =='subscriber' || $id =='non_subscriber' || $id == 'mini_certification' || $id == 'courses'):
//            $data['mode'] = 'quiz_add';
//        else:
//            $data['mode'] = 'quiz_edit';
//        endif;
//            $data['arttype'] = $this->uri->segment('5'); 
//           
//        $this->load->view('admin/dashboard_articles', $data);
    }

    public function edit($id) {
        $user_id = $this->Quiz_article_model->get();
        $data['mode'] = 'quiz_add';
        $this->load->view('admin/dashboard_articles', $data);
    }

    public function add_edit() {
        extract($_POST);
      $article_id=$this->uri->segment('3');
        foreach ($_POST['hidden_question'] as  $row=>$question)
          {
           // $question;
             $option1 = $_POST['hidden_option1'][$row];
             $option2 = $_POST['hidden_option2'][$row];
             $option3 = $_POST['hidden_option3'][$row];
              $option4 = $_POST['hidden_option4'][$row];
             $article_id= $_POST['hidden_article_id'][$row];
             $answer_key= $_POST['hidden_answer_key'][$row];
            $quiz_data = array(
            'question' =>$question,// $this->input->post('question'),
            'article_id' => $article_id,
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'answer_key' => $answer_key,
            );
            $this->Quiz_article_model->insert($quiz_data);
            
        }
        //echo $article_id=$this->uri->segment('4');exit();
       $user_id = $this->ion_auth->user()->row()->id;
//        echo $article_type;exit();
//        if ($this->input->post('quiz_id') == '' ) { //echo '<pre>'; print_r($_POST); exit; 
//           if(($this->input->post('question'))){
//            $quiz_data = array(
//            'question' => $this->input->post('question'),
//            'article_id' => $article_id,
//            'option1' => $this->input->post('option1'),
//            'option2' => $this->input->post('option2'),
//            'option3' => $this->input->post('option3'),
//            'option4' => $this->input->post('option4'),
//            'answer_key' => $this->input->post('answer_key'),
//            );
//            
//            $this->Quiz_article_model->insert($quiz_data);
//            $this->session->set_flashdata('message', 'Successfully Added');
//        }
//        } else {
//            $quiz_data = array(
//                'name' => $this->input->post('name'),
//                'article_id' => $article_id,
//                'option2' => $this->input->post('question'),
//                'option1' => $this->input->post('option1'),
//                'option2' => $this->input->post('option2'),
//                'option2' => $this->input->post('option3'),
//                'option2' => $this->input->post('option4')
//            ); 
//            
//            $this->Quiz_article_model->update($this->input->post('quiz_id'), $quiz_data);
//            $this->session->set_flashdata('message', 'Successfully Updated');
//            //redirect(site_url() . '/admin/dashbord_category/maincategory');
//        }
     //   print_r($_POST);
           // exit();
        redirect(site_url() . '/admin/Dashboard_articles/index/' . $user_id);
    }
 public function add_edit_new() 
 {
//     print_r("ggg");
//      $id = $this->uri->segment(5);
//         if ($this->session->userdata('session_data'))
//            $data = $this->session->userdata('session_data');
//      
//        $user_id = $this->ion_auth->user()->row()->id;
//         
        if (empty($id) || $id =='subscriber' || $id =='non_subscriber' || $id == 'mini_certification' || $id == 'courses'):
            $data['mode'] = 'quiz_add';
        else:
            $data['mode'] = 'quiz_edit';
        endif;
            $data['arttype'] = $this->uri->segment('5'); 
           
        $this->load->view('admin/dashboard_articles_new_add', $data);
 }
 public function edit_quiz()
{
             $id = $this->uri->segment(4);
                        $data['article_microlearning'] = $this->Quiz_article_model->get_all(array('article_id' => $id));

//                        print_r($data);
            $this->load->view('admin/dashboard_articles_new_edit',$data);
//           die();
 }
 public function edit_quiz_save(){
         extract($_POST);
                $user_id = $this->ion_auth->user()->row()->id;
               // echo $article_id=$this->uri->segment('3');
               // print_r($_POST);die();
       foreach ($_POST['hidden_question'] as  $row=>$question)
      {
           // $question;
             $option1 = $_POST['hidden_option1'][$row];
             $option2 = $_POST['hidden_option2'][$row];
             $option3 = $_POST['hidden_option3'][$row];
              $option4 = $_POST['hidden_option4'][$row];
             $article_id= $_POST['hidden_article_id'][$row];
             $answer_key= $_POST['hidden_answer_key'][$row];
           $id= $_POST['quiz_id'][$row];   
           // echo $question;
           $quiz_data = array(
           
               
               'article_id' => $article_id,
               'question' =>$question,
               
            'option1' => $option1,
            'option2' => $option2,
            'option3' => $option3,
            'option4' => $option4,
            'answer_key' => $answer_key,
            );
           //$this->Quiz_article_model->update($id, $quiz_data);  
         // $this->db->update('article_quiz', $quiz_data, array('id' => $id));
        // $this->Quiz_article_model->update($id, $quiz_data);
         $this->db->set($quiz_data);   
         $this->db->where('id', $id);
         $this->db->update('article_quiz');
        //print_r($quiz_data);  
      }
            //  die();
       
       redirect(site_url() . 'admin/Dashboard_articles/index/' . $user_id . "/#" . $tab);
 }
}
