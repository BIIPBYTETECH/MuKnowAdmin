<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require APPPATH . '/core/Admin_Controller.php';

require APPPATH . '/libraries/MY_Model.php';

class Dashboard_articles extends Admin_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model('Register_user_model');

        $this->load->model('Register_user_group_model');

        $this->load->model('Category_model');

        $this->load->model('Ion_auth_model');

        $this->load->model('Articles_model');
        $this->load->model('Articles_tag_model');
        $this->load->model('Quiz_article_model');

        $this->load->model('Article_department_model');

        $this->load->library('upload');

        $this->load->model('Image_upload_model');

        $this->load->library('image_lib');
        $this->load->library('smiles_file');

        $this->lang->load('auth');

        $this->load->library('Aes');

        $this->articleimage_original_path = 'assets/uploads/articles_image';

        $this->articlevideo_original_path = 'assets/uploads/articles_videos';

        $user_id = $this->ion_auth->user()->row()->id;
//        $this->load->library('Gcm');
//		  $this->load->library('Fcm');
//        $this->load->model('Gcm_model');
        $this->load->model('Sub_articles_model');
        date_default_timezone_set('Asia/Rangoon');
    }

    public function index($id) {
      
        $user_id = $this->ion_auth->user()->row()->id;
        if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
        $data['mode'] = 'all';

        if (@$ch_language = $this->session->userdata('session_data')):


            if ($ch_language['language'] == 'zh'):

                $data ['main_category'] = $this->Category_model->dropdown_zh_maincategory();
            elseif ($ch_language['language'] == 'my'):
                $data ['main_category'] = $this->Category_model->dropdown_my_maincategory();

            else:
                $data ['main_category'] = $this->Category_model->dropdown_maincategory();


            endif;
        endif;

        $data ['all_category'] = $this->Category_model->get_all();
        if ($this->ion_auth->is_admin() ):

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.author_id');

            $this->db->join(' category c', 'c.id = a.cat_id');



            $this->db->where("a.active='1' AND a.deleted='0'");

            $this->db->order_by('a.id', 'DESC');

            $data['approved_articles'] = $this->db->get()->result();

            // echo $this->db->last_query();exit();

         // echo '<pre>';  print_r($data ['approved_articles']); exit;

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.user_id');

            $this->db->join(' category c', 'c.id = a.cat_id');



            $this->db->where("a.active='0' AND a.deleted='0'");

            $this->db->order_by('a.id', 'DESC');

            $data['notapprove_articles'] = $this->db->get()->result();

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.user_id');

            $this->db->join(' category c', 'c.id = a.cat_id');

            $this->db->where("a.deleted='0'");

            $this->db->order_by('a.id', 'DESC');

            $data['articles'] = $this->db->get()->result();
        // echo $this->db->last_query();exit();
        else:

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.user_id');

            $this->db->join(' category c', 'c.id = a.cat_id');

            $this->db->where("a.active='1' AND a.deleted='0' AND a.author_id=$user_id");

            $this->db->order_by('a.id', 'DESC');

            $data['approved_articles'] = $this->db->get()->result();

            //echo $this->db->last_query(); exit();



            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.user_id');

            $this->db->join(' category c', 'c.id = a.cat_id');



            $this->db->where("a.active='0' AND a.deleted='0' AND a.user_id=$user_id");

            $this->db->order_by('a.id', 'DESC');

            $data['notapprove_articles'] = $this->db->get()->result();

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.author_id');

            $this->db->join(' category c', 'c.id = a.cat_id');

            $this->db->where("a.deleted='0' AND a.user_id=$user_id");

            $this->db->order_by('a.id', 'DESC');

            $data['articles'] = $this->db->get()->result();

        endif;
         $data ['authors'] = $this->Register_user_model->get_trainer();
      
        $this->load->view('admin/dashboard_articles', $data);
    }

    function _callbacks($name, $params = array()) {
        $data = (isset($params[0])) ? $params[0] : FALSE;

        if (!empty($this->$name)) {
            foreach ($this->$name as $method) {
                $data = call_user_func_array(array($this, $method), $params);
            }
        }

        return $data;
    }

    //function :Add article

    
   public function add_edit_article() {

        $id = '';

        $id = $this->uri->segment(4);


      // die();
        if (empty($id)):

            $data['mode'] = 'add';

            $this->db->where("parent_id=0 AND deleted='0'");

            $data ['main_category'] = $this->Category_model->dropdown('id', 'name');

        //$this->session->set_flashdata('message', 'Successfully Added');

        else:

            if (!empty($id)):
                if ($this->session->userdata('session_data'))
                    $data = $this->session->userdata('session_data');
                $data['mode'] = 'edit';
              //  print_r($data['mode']);die();
                $data['mode'] = 'edit';
                //$data ['main_category'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => '0', 'deleted' => '0'));
                if (@$ch_language = $this->session->userdata('session_data')):


                    if ($ch_language['language'] == 'zh'):

                        $data ['main_category'] = $this->Category_model->custom_dropdown('id', 'ch_lang_name', array('parent_id' => '0', 'deleted' => '0'));
                    elseif ($ch_language['language'] == 'my'):
                        $data ['main_category'] = $this->Category_model->custom_dropdown('id', 'bm_lang_name', array('parent_id' => '0', 'deleted' => '0'));

                    else:
                        $data ['main_category'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => '0', 'deleted' => '0'));

                    endif;
                endif;
                $data ['article_tag'] = $this->Articles_tag_model->get_all('article_id', $id);
                
                $data ['article'] = $this->Articles_model->get($id);
                $get_cat_id = $this->Category_model->get($data ['article']->cat_id);

                $data ['get_parent_id'] = $this->Category_model->get(array('id' => $get_cat_id->parent_id, 'deleted' => '0'));

                if (!empty($data ['get_parent_id'])):
                    $data ['sub_category1'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $data ['get_parent_id']->parent_id, 'deleted' => '0'));

                    @$data ['cat1'] = $data ['get_parent_id']->id;

                    $data ['get_parent_id1'] = $this->Category_model->get(array('id' => $data ['get_parent_id']->parent_id, 'deleted' => '0'));
                    if (!empty($data ['get_parent_id1'])):


                        $data ['sub_category2'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $data ['get_parent_id1']->parent_id, 'deleted' => '0'));

                        @$data ['cat2'] = $data ['get_parent_id1']->id;

                        $get_parent_id2 = $this->Category_model->get(array('id' => $data ['get_parent_id1']->parent_id, 'deleted' => '0'));

                        $data ['get_parent_id2'] = $this->Category_model->get(array('id' => $data ['get_parent_id1']->parent_id, 'deleted' => '0'));

                        if (!empty($data ['get_parent_id2'])):
                            $data ['sub_category2'] = $data ['sub_category1'];
                            @$data ['cat2'] = @$data ['cat1'];

                            $data ['sub_category1'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $data ['get_parent_id1']->parent_id, 'deleted' => '0'));

                            @$data ['cat1'] = $data ['get_parent_id1']->id;

                            $data ['sub_category3'] = $this->Category_model->custom_dropdown('id', 'name', array('id' => $get_cat_id->id, 'deleted' => '0'));

                            @$data ['cat3'] = $get_cat_id->id;

                            $data ['main_cat'] = $data ['cat3'];

                        else:

                            $data ['main_cat'] = $data ['get_parent_id1']->id;

                            $data ['sub_category1'] = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $data ['get_parent_id']->parent_id, 'deleted' => '0'));

                            @$data ['cat1'] = $data ['get_parent_id']->id;

                            $data ['sub_category2'] = $this->Category_model->custom_dropdown('id', 'name', array('id' => $get_cat_id->id, 'deleted' => '0'));

                            @$data ['cat2'] = $get_cat_id->id;

                        endif;
                    else:
                        $data ['main_cat'] = $data ['cat1'];

                        $data ['sub_category1'] = $this->Category_model->custom_dropdown('id', 'name', array('id' => $get_cat_id->id, 'deleted' => '0'));

                        @$data ['cat1'] = $get_cat_id->id;

                    endif;


                endif;
                if (!empty($data ['cat1'])):
                    $get_parentcat_id = $this->Category_model->get($data ['cat1']);
                    $data ['m_category'] = $get_parentcat_id->parent_id;
                endif;

            endif;
 

            $data ['quiz_row'] = $this->Quiz_article_model->get('article_id', $id);

            $data ['image_files'] = $this->Image_upload_model->get_all(array('article_id' => $id));

            // echo $this->db->last_query();
            // exit();

            $this->db->select('type');

            $this->db->from('image_files');

            $this->db->where("article_id='$id' group by type");

            $data['imagefiles_type'] = $this->db->get()->row();


        endif;

         $data ['authors'] = $this->Register_user_model->get_trainer();



        $this->load->view('admin/dashboard_articles', $data);
    }


    public function edit_article_activate() {

        $id = '';
        if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
        $id = $this->uri->segment(4);

        $this->db->where("parent_id=0 AND deleted='0'");

        $data ['main_category'] = $this->Category_model->dropdown('id', 'name');

        $this->db->select('id,name');

        //$this->db->from('department_list');

        $data['dept'] = $this->db->get()->result();
        $data['selected_dept'] = $this->Article_department_model->get_all(array('article_id' => $id));

        if (!empty($id)):


            if (!empty($id)):

                $data['mode'] = 'activate';

                $data ['article'] = $this->Articles_model->get($id);

                //$data ['article'] = $this->Articles_model->get($id);

                $data ['quiz_row'] = $this->Quiz_article_model->get('article_id', $id);

                $data ['image_files'] = $this->Image_upload_model->get_all(array('article_id' => $id));

                // echo $this->db->last_query();
                // exit();

                $this->db->select('type');

                $this->db->from('image_files');

                $this->db->where("article_id='$id' group by type");

                $data['imagefiles_type'] = $this->db->get()->row();

          
            endif;


        endif;

        $this->load->view('admin/dashboard_articles', $data);
    }

     public function view_article() {

        $id = '';
        $data ['cat'] = '';
        $id = $this->uri->segment(4);
        if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
        //print_r($data);exit();
        if (!empty($id)):

            if ($this->session->userdata('session_data'))
                $data = $this->session->userdata('session_data');
            $data['mode'] = 'view';

            $this->db->select('a.*,u.username,c.name as category_name,c.ch_lang_name as category_ch_lang_name,c.bm_lang_name as category_bm_lang_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.author_id');

            $this->db->join(' category c', 'c.id = a.cat_id');

            $this->db->where("a.id=$id");

            $data['view_article'] = $this->db->get()->result();
           
            $data ['image_files'] = $this->Image_upload_model->get_all(array('article_id' => $id));

            $data ['article_tag'] = $this->Articles_tag_model->get_all(array('article_id' => $id));

            // $data['sub_articles'] = $this->Sub_articles_model->get_all(array('article_id' => $id));
             
            $data['article_microlearning'] = $this->Quiz_article_model->get_all(array('article_id' => $id));
            $get_cat_id = $this->Category_model->get($data['view_article'][0]->cat_id);
            $get_parent_id = $this->Category_model->get($get_cat_id->parent_id);
            if (!empty($get_parent_id)):

                if ($data['language'] == 'en'):
                    @$data ['cat'] .= $get_parent_id->name;
                    $get_parent_id1 = $this->Category_model->get($get_parent_id->parent_id);
                    if (!empty($get_parent_id1)):
                        $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id1->name;
                        // array_push($add_cat,$data['view_article ']['parent_name1']);
                        $get_parent_id2 = $this->Category_model->get($get_parent_id1->parent_id);
                        if (!empty($get_parent_id2)):
                            $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id2->name;
                        //array_push($add_cat,$data['view_article ']['parent_name2']);

                        endif;
                    endif;
                endif;
                if ($data['language'] == 'zh'):
                    @$data ['cat'] .= $get_parent_id->ch_lang_name;
                    $get_parent_id1 = $this->Category_model->get($get_parent_id->parent_id);
                    if (!empty($get_parent_id1)):
                        $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id1->ch_lang_name;
                        // array_push($add_cat,$data['view_article ']['parent_name1']);
                        $get_parent_id2 = $this->Category_model->get($get_parent_id1->parent_id);
                        if (!empty($get_parent_id2)):
                            $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id2->ch_lang_name;
                        //array_push($add_cat,$data['view_article ']['parent_name2']);

                        endif;
                    endif;
                endif;
                if ($data['language'] == 'my'):
                    @$data ['cat'] .= $get_parent_id->bm_lang_name;
                    $get_parent_id1 = $this->Category_model->get($get_parent_id->parent_id);
                    if (!empty($get_parent_id1)):
                        $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id1->bm_lang_name;
                        // array_push($add_cat,$data['view_article ']['parent_name1']);
                        $get_parent_id2 = $this->Category_model->get($get_parent_id1->parent_id);
                        if (!empty($get_parent_id2)):
                            $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id2->bm_lang_name;
                        //array_push($add_cat,$data['view_article ']['parent_name2']);

                        endif;
                    endif;
                endif;

            endif;
            $this->load->view('admin/dashboard_articles', $data);

        endif;
    }
        public function add_article_vimeo()
        {
            
require_once('/var/www/dedaabox/Vimeo/src/Vimeo/Vimeo.php');
//require_once('/var/www/DedaaBox_dev/Vimeo/src/Vimeo/Exceptions/VimeoUploadException.php');
//use Vimeo\Exceptions\VimeoUploadException;
$consumer_key = '139f3e6ed400e912ed04bedf50880d2fdd808afd';  
      $consumer_secret = 'L8H3LV0th3tiermH/uyT7rKgnz+j2PEYT9DXVKMKBUe883WGKjm0yUTCOl4ltHHv1NHaSsXkrzxzy/BqDSvaQQ9jYPguL7pULr159I0r7fHqE6M2qCRP52fPZoD0DoWE';  
      $oauth_access_token = '8b9c556efb7a6a4ffaad256a4a85b2bb';
//$config = require(__DIR__ . '/init.php');
if (empty($oauth_access_token)) {
    throw new Exception('You can not upload a file without an access token. You can find this token on your app page, or generate one using auth.php');
}
$lib = new Vimeo\Vimeo($consumer_key, $consumer_secret, $oauth_access_token);
//  Get the args from the command line to see what files to upload.
$files = $argv;
array_shift($files);
//   Keep track of what we have uploaded.
$uploaded = array();
//  Send the files to the upload script.
foreach ($files as $file_name) {
    //  Update progress.
    print 'Uploading ' . $file_name . "\n";
    try {
        //  Send this to the API library.
        $uri = $lib->upload($file_name);
        //  Now that we know where it is in the API, let's get the info about it so we can find the link.
        $video_data = $lib->request($uri);
        //  Pull the link out of successful data responses.
        $link = '';
        if($video_data['status'] == 200) {
            $link = $video_data['body']['link'];
        }
        //  Store this in our array of complete videos.
        $uploaded[] = array('file' => $file_name, 'api_video_uri' => $uri, 'link' => $link);
    }
    catch (VimeoUploadException $e) {
        //  We may have had an error.  We can't resolve it here necessarily, so report it to the user.
        print 'Error uploading ' . $file_name . "\n";
        print 'Server reported: ' . $e->getMessage() . "\n";
    }
}
//  Provide a summary on completion with links to the videos on the site.
print 'Uploaded ' . count($uploaded) . " files.\n\n";
foreach ($uploaded as $site_video) {
    extract($site_video);
    print "$file is at $link.\n";
}
            
        }

        public function add_article1() {  
             //  echo '<pre>'; print_r($_FILES); exit;
        // $this->load->library('Vimeo'); 
         require_once('/var/www/dedaabox/Vimeo/src/Vimeo/Vimeo.php');
        // require_once('/var/www/DedaaBox_dev/Vimeo/src/Vimeo/Exceptions/VimeoUploadException.php');
      // echo '<pre>'; print_r($_FILES['file_name']['tmp_name']); exit;
          // require_once(base_url('Vimeo/src/Vimeo/Vimeo.php'));  
 try  
 {  
      $consumer_key = '139f3e6ed400e912ed04bedf50880d2fdd808afd';  
      $consumer_secret = 'L8H3LV0th3tiermH/uyT7rKgnz+j2PEYT9DXVKMKBUe883WGKjm0yUTCOl4ltHHv1NHaSsXkrzxzy/BqDSvaQQ9jYPguL7pULr159I0r7fHqE6M2qCRP52fPZoD0DoWE';  
      $oauth_access_token = 'b23f2de1ffcadbe0162ee584bd2cd11e';  
      $oauth_request_token_secret = 'b23f2de1ffcadbe0162ee584bd2cd11e';  
      $vimeo = new Vimeo\Vimeo($consumer_key, $consumer_secret, $oauth_access_token);  
      $video_id = $vimeo->upload($_FILES['file_name']['tmp_name']);  
      $videotitle = 'VIDEO TITLE HERE !';  
      $videodesc = 'VIDEO DESCRIPTION HERE !';  
    //  echo '<pre>'; print_r($video_id); exit;
      if ($video_id) {  
       $sUploadResult = 'Your video has been uploaded and available <a href="http://vimeo.com/'.$video_id.'">here</a> !';  
       $vimeo->call('vimeo.videos.setTitle', array('title' => $videotitle, 'video_id' => $video_id));  
       $vimeo->call('vimeo.videos.setDescription', array('description' => $videodesc, 'video_id' => $video_id));  
                $videourl = 'http://vimeo.com/'.$video_id;  
                     $arry['data']['flag'] = true;  
                     $arry['data']['url'] = $videourl;  
                     $arry['data']['msg'] = "Video Uploaded Successfully.";  
                 }   
                 else   
                 {  
                      $arry['data']['flag'] = false;  
                      $arry['data']['msg'] = "Not able to retrieve the video status information yet. " ."Please try again later.\n";  
                 }  
 }  
 catch(Exception $e)  
 {  
      $arry['data']['flag'] = false;  
      $arry['data']['msg'] = $e->getMessage();  
 }       
      if($video_id)  
      {  
                $arry['data']['flag'] = true;  
                $arry['data']['url'] = $videourl;  
                $arry['data']['msg'] = 'Video Uploaded Successfully.';  
      }  
      else  
      {  
           $arry['data']['flag'] = false;  
      }  
      if($arry['data']['msg'] == 'Invalid signature')  
      {  
           $arry['data']['msg'] = 'Invalid Secret or oauth_request_token_secret';  
      }  
      if($arry['data']['msg'] == 'Permission Denied')  
      {  
           $arry['data']['msg'] = 'Invalid oauth_access_token';  
      }  
      echo "<pre>";  
      print_r($arry); 
        
    }
    
    function vimeo_url()
    {
          require_once('/var/www/dedaabox/Vimeo/src/Vimeo/Vimeo.php');
      
      $consumer_key = '139f3e6ed400e912ed04bedf50880d2fdd808afd';  
      $consumer_secret = 'L8H3LV0th3tiermH/uyT7rKgnz+j2PEYT9DXVKMKBUe883WGKjm0yUTCOl4ltHHv1NHaSsXkrzxzy/BqDSvaQQ9jYPguL7pULr159I0r7fHqE6M2qCRP52fPZoD0DoWE';  
      $oauth_access_token = 'b23f2de1ffcadbe0162ee584bd2cd11e';  
      $oauth_request_token_secret = 'b23f2de1ffcadbe0162ee584bd2cd11e';  
      $vimeo = new Vimeo\Vimeo($consumer_key, $consumer_secret, $oauth_access_token);  
      //$video_id = $vimeo->upload($_FILES['file_name']['tmp_name']);  
      $response = $vimeo->request('/videos/227689359');
      //echo'<pre>'; print_r($response['body']['pictures']['sizes']['0']['link']);

      $time = gmdate("H:i:s", $response['body']['duration']);
   echo '<pre>'; print_r($response); exit;
   $demo_file_name = 'https://player.vimeo.com/external/227689359.sd.mp4?s=0ef15130d5b6d73a41e3ef7d673ba62f644303a7&profile_id=165';
   $parts =  Explode('/', $demo_file_name);
   $parts1 =  Explode('.', $parts['4']); 
    }
    function get_youtube($url){
 $youtube = file_get_contents("https://player.vimeo.com/external/226548175.sd.mp4?s=7b5f4db27bcd3ab67234d0b1800128a01e560463&profile_id=165");

 $curl = curl_init($youtube);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 $return = curl_exec($curl);
 curl_close($curl);
 echo '<pre>'; print_r($youtube); exit;
 return json_decode($return, true);

 }
 
 
     public function add_article() {
        $upload_path = $this->articleimage_original_path;
        extract($_POST);
//print_r($_POST);
//die();
        $user_id = $this->ion_auth->user()->row()->id;
        if (!empty($cat_id2)):
            $cat_id = @$cat_id2;
        else:
            if (!empty($cat_id1)):
                $cat_id = @$cat_id1;
            else:
                $cat_id = @$cat_id;
            endif;
        endif;

        if (empty($cat_id)):
            echo FALSE;
            exit();
        endif;
        if (empty($title)):
            echo FALSE;
            exit();
        endif;
        
        if (empty($short_description)):
            echo FALSE;
            exit();
        endif;

        if (empty($type)):

            echo FALSE;
            exit();
        endif;
        if (empty($description)):
            echo 'descrip';
            exit();
        endif;

        if ($type == '2'):


            if (!empty($caption_image1))
                $caption_image1 = $caption_image1;
            else
                $caption_image1 = null;
            if (!empty($caption_image2))
                $caption_image2 = $caption_image2;
            else
                $caption_image2 = null;
            if (!empty($caption_image3))
                $caption_image3 = $caption_image3;
            else
                $caption_image3 = null;

           // echo $caption_image1; exit;


            if (!file_exists($upload_path)) {
                mkdir($upload_path);
            }

            $upload_error = array();

            if (!empty($image_files)) {
                $file_data[] = json_decode($image_files, true);
            }

            if (!empty($image_files1)) {
                $file_data[] = json_decode($image_files1, true);
            }

            if (!empty($image_files2)) {
                $file_data[] = json_decode($image_files2, true);
            }
            //print_r($file_data);
            if (empty($file_data)) {
                echo "image";
                exit();
            }
            $flag = 0;

            if (!empty($file_data) && count($file_data)):

                foreach ($file_data as $file_data_row) {
                    // print_r($file_data_row);
                    $flag = 1;
//                    if (array_key_exists("messge", $file_data_row)):
//                        $flag = 2;
//                        $message = $file_data_row['messge']['error'];
//                        $staus = 0;
//                        echo $staus;
//                    //$error_message=$file_data_row['messge']['error'];
//                    else:
//                        $flag = 1;
//                    endif;
                }
            else:
                $flag = 2;
            endif;

             $currentdate = date('Y-m-d h:i:s');
            $product_data = array(
                'title' => $title,
                'language_key' => $language,
                'cat_id' => $cat_id,
                'user_id' => $user_id,
                'description' => $description,
                'short_description' => $short_description,
                'active' => '0','author_id' => $author,
                'created_on' => $currentdate,
            );


            $start = 0;

            $db_result = $this->Articles_model->insert($product_data);

            //log_message('debug', "start query img ->");
            //log_message('debug', print_r($this->db->last_query(), true));

            $article_id = $this->db->insert_id();
            if ($article_id) {
                if ($flag == 1):
                    $i = 1;
                    foreach ($file_data as $file_data_row) {

                        $f_data = array();
                        $cropData = "";
                        $caption_image = "";
                        if ($i == 1) {
                            $caption_image = $caption_image1;
                            $cropData = $crop1;
                        }
                        if ($i == 2) {
                            $caption_image = $caption_image2;
                            $cropData = $crop2;
                        }
                        if ($i == 3) {
                            $caption_image = $caption_image3;
                            $cropData = $crop3;
                        }

                        $f_data = array(
                            'article_id' => $article_id,
                            'orig_name' => $file_data_row['msg']['orig_name'],
                            'file_type' => $file_data_row['msg']['file_type'],
                            'file_ext' => $file_data_row['msg']['file_ext'],
                            'file_size' => $file_data_row['msg']['file_size'],
                            'is_image' => $file_data_row['msg']['is_image'],
                            'image_type' => $file_data_row['msg']['image_type'],
                            'image_width' => $file_data_row['msg']['image_width'],
                            'image_height' => $file_data_row['msg']['image_height'],
                            'file_path' => $file_data_row['msg']['file_path'],
                            'full_path' => $file_data_row['msg']['full_path'],
                            'raw_name' => $file_data_row['msg']['raw_name'],
                            'type' => '2',
                            'caption' => $caption_image,           
                            'author_id' => $author,

                            'user_id' => $user_id
                        );
                        $upload_error = array();
                        $upload_con = array("allowed_types" => "jpeg|jpg|png", "upload_path" => $upload_path);
                        $thumb_dim = array("width" => 100);

                        $imagelast_id[] = $this->smiles_file->uploadandcrop($f_data, $user_id, $type, $upload_error, $upload_con, $cropData, $thumb_dim);

                        $i++;
                    }

                    //$imageupload_result = $this->db->insert_batch('image_files', $f_data);
                    if (!empty($tags)):
                        foreach ($tags as $tags_row) {
                            $articles_tag_data = array(
                                'article_id' => $article_id,
                                'tag_name' => $tags_row
                            );
                            $this->Articles_tag_model->insert($articles_tag_data);
                        }
                    endif;
                endif;
                echo $article_id;
            } else {
                echo "0";
            } 
            elseif ($type == '3'):

            $files = $_FILES['file_name'];

            $upload_path = $this->articlevideo_original_path;

            if (!file_exists($upload_path)) {

                mkdir($upload_path);
            }

            //echo "<pre>";
            //print_r($files);exit();

            $err_msgs = '';

            $db_result = '';

            $type = $this->input->post('type');

            $config['file_name'] = $files['name'];



            $config['upload_path'] = 'assets/uploads/articles_videos';

            $config['allowed_types'] = 'mov|mpeg|mp3|avi|mp4|3gp|quicktime|MOV';

            $config['max_size'] = '';

            $config['overwrite'] = FALSE;

            $config['remove_spaces'] = TRUE;

            $config['encrypt_name'] = TRUE;



            $this->upload->initialize($config);

            $this->load->library('upload', $config);



            if (!$this->upload->do_upload('file_name')) {

                // If there is any error

                $err_msgs .= 'Error in Uploading video ' . $this->upload->display_errors() . '<br />';

                $status = 0;

                echo $status;
            } else {

                $upload_data = $this->upload->data();

                $video_path = $upload_data['file_name'];


                exec("ffmpeg -i " . $upload_data['full_path'] . " " . $upload_data['file_path'] . $upload_data['raw_name'] . ".flv");

                if (isset($upload_data) && count($upload_data)):


                    $f_data = array(
                        'orig_name' => $upload_data['orig_name'],
                        'file_type' => $upload_data['file_type'],
                        'file_ext' => $upload_data['file_ext'],
                        'file_size' => $upload_data['file_size'],
                        'is_image' => $upload_data['is_image'],
                        'image_type' => $upload_data['image_type'],
//                                         'image_width'=>$upload_data['image_width'],
//                                         'image_height'=>$upload_data['image_height'],
                        'file_path' => $upload_data['file_path'],
                        'raw_name' => $upload_data['raw_name'],
                        'type' => '3',
                        //'product_id'=>$product_id,
                        //'user_id'=>$user_id,
                        'user_id' => $user_id
                    );

                    $ffmpeg = "ffmpeg";

                    //$videoFile = "/home/hygienewatch/www/admin/assets/uploads/articles_videos/" . $f_data['raw_name'] . $f_data['file_ext'];
                    //$imageFile = "/home/hygienewatch/www/admin/assets/uploads/articles_videos/" . $f_data['raw_name'] . "_thumb" . ".jpg";

                    $videoFile = $upload_path . "/" . $f_data['raw_name'] . $f_data['file_ext'];

                    $imageFile = $upload_path . "/" . $f_data['raw_name'] . "_thumb" . ".jpg";

                    $size = '400X400';

                    $interval = 2; // At what time the screenshot to be taken after video is started

                    $cmd = "$ffmpeg -i $videoFile -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $imageFile 2>&1";

                    shell_exec($cmd);

                    $imagelast_insert_id = $this->db->insert('image_files', $f_data);

                    $image_result = $this->db->insert_id();

                endif;
            }

            // echo $image_result;exit();

            if (empty($image_result)) {



                $message = strip_tags($this->upload->display_errors());

                echo $status = 0;

                //print json_encode(array("status" => "error", "message" => $message));
            } else {
                 $currentdate = date('Y-m-d h:i:s');
                $product_data = array(
                    'title' => $title,
                    'language_key' => $language,
                    'cat_id' => $cat_id,
                    'user_id' => $user_id,
                    'description' => $description,                'author_id' => $author,

                    'short_description' => $short_description,
                    'active' => '0','author_id' => $author,
                    'created_on' => $currentdate,
                );

                $db_result = $this->Articles_model->insert($product_data);

                $article_id = $this->db->insert_id();

                $image_get_result = $this->Image_upload_model->get($image_result);
                if (!empty($article_id)):
                    if (!empty($tags)):
                        foreach ($tags as $tags_row) {
                            $articles_tag_data = array(
                                'article_id' => $article_id,
                                'tag_name' => $tags_row
                            );
                            $this->Articles_tag_model->insert($articles_tag_data);
                        }
                    endif;
                endif;

                $this->Image_upload_model->update($image_get_result->id, array('article_id' => $article_id));



                $message = "Article created sucessfully.";

                echo $article_id;

                //print json_encode(array("status" => "success", "message" => $message));
            }
        else:
            
         $currentdate = date('Y-m-d h:i:s');
            $product_data = array(
                'title' => $title,
                'language_key' => $language,
                'cat_id' => $cat_id,
                'user_id' => $user_id,
                'url_link' => $link, 
                'author_id' => $author,
'video_type'=>$type,
                'description' => $description,
                'short_description' => $short_description,
                'active' => '0',
                'created_on' => $currentdate,
            );

            $db_result = $this->Articles_model->insert($product_data);

            $article_id = $this->db->insert_id();
            if (!empty($article_id)):
                if (!empty($tags)):
                    foreach ($tags as $tags_row) {
                        $articles_tag_data = array(
                            'article_id' => $article_id,
                            'tag_name' => $tags_row
                        );
                        $this->Articles_tag_model->insert($articles_tag_data);
                    }
                endif;
            endif;
            echo $article_id;

        endif;
if ($type == '5'):
		

                if (!empty($_FILES['pdf']['name'])) {
                    $upload_data = array();
                    $config['upload_path'] = $upload_paths = 'assets/uploads/files';
                    if (!file_exists($upload_paths)) {
                        mkdir($upload_paths);
                        chmod($upload_paths, 0777);
                    }
                    $config['file_name'] = $_FILES['pdf']['name'];
                    $config['allowed_types'] = 'pdf';
                    $config['encrypt_name'] = true;
                    $config['remove_spaces'] = true;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    //print_r($config); exit;
                    $upload_data = $this->upload->do_upload('pdf');
                    //print_r($upload_data); exit;
                    if (!$upload_data) {
                        //print_r($this->upload->display_errors()); exit;
                        $text = $this->upload->display_errors();
                        $text = str_ireplace('<p>', '', $text);
                        $text = str_ireplace('</p>', '', $text);

                        echo "Error" . " " . $text;
                    } else {
                        $file_data = $this->upload->data();

                        $f_data = array(
                            'user_id' => $user_id,
                            'article_id' => $article_id,
                            'orig_name' => $file_data['orig_name'],
                            'file_type' => $file_data['file_type'],
                            'file_ext' => $file_data['file_ext'],
                            'file_size' => $file_data['file_size'],
                            'is_image' => $file_data['is_image'],
                            'image_type' => $file_data['image_type'],
                            'file_path' => $file_data['file_path'],
                            'raw_name' => $file_data['raw_name'],
                            'type' => '5', //pdf
                        );

                        $db_result1 = $this->db->insert('image_files', $f_data);
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
                        }
                    }
                }

			endif;
if ($type == '6'):
		

                if (!empty($_FILES['ppt']['name'])) {
                    $upload_data = array();
                    $config['upload_path'] = $upload_paths = 'assets/uploads/files';
                    if (!file_exists($upload_paths)) {
                        mkdir($upload_paths);
                        chmod($upload_paths, 0777);
                    }
                    $config['file_name'] = $_FILES['ppt']['name'];
                    $config['allowed_types'] = 'ppt|pptx';
                    $config['encrypt_name'] = true;
                    $config['remove_spaces'] = true;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    //print_r($config); exit;
                    $upload_data = $this->upload->do_upload('ppt');
                    //print_r($upload_data); exit;
                    if (!$upload_data) {
                        //print_r($this->upload->display_errors()); exit;
                        $text = $this->upload->display_errors();
                        $text = str_ireplace('<p>', '', $text);
                        $text = str_ireplace('</p>', '', $text);

                        echo "Error" . " " . $text;
                    } else {
                        $file_data = $this->upload->data();

                        $f_data = array(
                            'user_id' => $user_id,
                            'article_id' => $article_id,
                            'orig_name' => $file_data['orig_name'],
                            'file_type' => $file_data['file_type'],
                            'file_ext' => $file_data['file_ext'],
                            'file_size' => $file_data['file_size'],
                            'is_image' => $file_data['is_image'],
                            'image_type' => $file_data['image_type'],
                            'file_path' => $file_data['file_path'],
                            'raw_name' => $file_data['raw_name'],
                            'type' => '6', //ppt
                        );

                        $db_result1 = $this->db->insert('image_files', $f_data);
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
                        }
                    }
                }
			endif;

        // $this->load->view('admin/dashboard_articles', $data);
    }

//Function : to edit atricle

    function edit_article() {

        extract($_POST);

        $tab = $this->uri->segment(4);

        $user_id = $this->ion_auth->user()->row()->id;

        
        if (!empty($id)):

            $user_id = $this->ion_auth->user()->row()->id;

            $get_article = $this->Articles_model->get($id);
          
            if (!empty($cat_id2)):
                $cat_id = @$cat_id2;
            elseif (!empty($cat_id1)):
                $cat_id = @$cat_id1;
            elseif (!empty($cat_id1)):
                $cat_id = @$cat_id;
            //else:
              //  $cat_id = $get_article->cat_id;
            endif;
         //  echo $cat_id; exit;
            if ($type == '2'):

                if (!empty($caption_image1))
                    $caption_image1 = $caption_image1;
                else
                    $caption_image1 = null;
                if (!empty($caption_image2))
                    $caption_image2 = $caption_image2;
                else
                    $caption_image2 = null;
                if (!empty($caption_image3))
                    $caption_image3 = $caption_image3;
                else
                    $caption_image3 = null;


               

                $upload_error = array();

                if (!empty($image_files)) {
                    $file_data1 = json_decode($image_files, true);
                }

                if (!empty($image_files1)) {
                    $file_data2 = json_decode($image_files1, true);
                }

                if (!empty($image_files2)) {
                    $file_data3 = json_decode($image_files2, true);
                }
               

                $upload_path = $this->articleimage_original_path;

                if (!file_exists($upload_path)) {

                    mkdir($upload_path);
                }

                $upload_error = array();

                $imageupload_result = array();

                if (!empty($file_data1) && count($file_data1)):




                    if ($file_data1['type'] == 'success'):
                        $f_data = array();
                        $cropData = "";
                        $caption_image = "";

                        $caption_image = $caption_image1;
                        $cropData = $crop1;

                        $f_data = array(
                            'article_id' => $id,
                            'orig_name' => $file_data1['msg']['orig_name'],
                            'file_type' => $file_data1['msg']['file_type'],
                            'file_ext' => $file_data1['msg']['file_ext'],
                            'file_size' => $file_data1['msg']['file_size'],
                            'is_image' => $file_data1['msg']['is_image'],
                            'image_type' => $file_data1['msg']['image_type'],
                            'image_width' => $file_data1['msg']['image_width'],
                            'image_height' => $file_data1['msg']['image_height'],
                            'file_path' => $file_data1['msg']['file_path'],
                            'full_path' => $file_data1['msg']['full_path'],
                            'raw_name' => $file_data1['msg']['raw_name'],
                            'type' => '2',        
                            'caption' => $caption_image1,
                            'article_id' => $id
                        );
                        $upload_error = array();
                        $upload_con = array("allowed_types" => "jpeg|jpg|png", "upload_path" => $upload_path);
                        $thumb_dim = array("width" => 100);

                        if (!empty($image1_id)):

                            //echo "hi";
                            // $filepath = "assets/uploads/category_image/";

                            $image_details = $this->Image_upload_model->get($image1_id);

                            $oldFile = $upload_path . "/" . $image_details->raw_name . $image_details->file_ext;

                            $oldFile_o = $upload_path . "/" . $image_details->raw_name . '_o' . $image_details->file_ext;

                            $oldFile_thumb = $upload_path . "/" . $image_details->raw_name . '_thumb' . $image_details->file_ext;

                            if (file_exists($oldFile))
                                unlink($oldFile);
                            if (file_exists($oldFile_o))
                                unlink($oldFile_o);
                            if (file_exists($oldFile_thumb))
                                unlink($oldFile_thumb);

                            //$imageup_result = $this->Image_upload_model->update($image1_id, $f_data);
                            $imageup_result = $this->smiles_file->update_uploadandcrop($f_data, $user_id, 2, $image1_id, $upload_error, $upload_con, $cropData, $thumb_dim);
                        else:
                            //$imageup_result = $this->Image_upload_model->insert($f_data);
                            $imageup_result = $this->smiles_file->uploadandcrop($f_data, $user_id, 2, $upload_error, $upload_con, $cropData, $thumb_dim);

                        endif;

                    else:
                        $this->session->set_flashdata('error', 'Image not uploded properly, try again');
                        redirect($curl);
                    endif;
                    
                    else:
                    $image_details = $this->Image_upload_model->get($image1_id);
                    if (!empty($image_details)):
                        $this->Image_upload_model->update($image1_id, array('caption' => $caption_image1));
                    endif;
                endif;

                if (!empty($file_data2) && count($file_data2)):


                    if ($file_data2['type'] == 'success'):
                        $f_data = array();
                        $cropData = "";
                        $caption_image = "";

                        $caption_image = $caption_image2;
                        $cropData = $crop2;

                        $f_data1 = array(
                            'article_id' => $id,
                            'orig_name' => $file_data2['msg']['orig_name'],
                            'file_type' => $file_data2['msg']['file_type'],
                            'file_ext' => $file_data2['msg']['file_ext'],
                            'file_size' => $file_data2['msg']['file_size'],
                            'is_image' => $file_data2['msg']['is_image'],
                            'image_type' => $file_data2['msg']['image_type'],
                            'image_width' => $file_data2['msg']['image_width'],
                            'image_height' => $file_data2['msg']['image_height'],
                            'file_path' => $file_data2['msg']['file_path'],
                            'full_path' => $file_data2['msg']['full_path'],
                            'raw_name' => $file_data2['msg']['raw_name'],
                            'type' => '2',  

                            'caption' => $caption_image2,
                            'article_id' => $id
                        );
                        $upload_error = array();
                        $upload_con = array("allowed_types" => "jpeg|jpg|png", "upload_path" => $upload_path);
                        $thumb_dim = array("width" => 100);
                        if (!empty($image2_id)):

                            $image_details = $this->Image_upload_model->get($image2_id);

                            $oldFile = $upload_path . "/" . $image_details->raw_name . $image_details->file_ext;

                            $oldFile_o = $upload_path . "/" . $image_details->raw_name . '_o' . $image_details->file_ext;

                            $oldFile_thumb = $upload_path . "/" . $image_details->raw_name . '_thumb' . $image_details->file_ext;

                            if (file_exists($oldFile))
                                unlink($oldFile);
                            if (file_exists($oldFile_o))
                                unlink($oldFile_o);
                            if (file_exists($oldFile_thumb))
                                unlink($oldFile_thumb);

                            $imageup_result = $this->smiles_file->update_uploadandcrop($f_data1, $user_id, 2, $image2_id, $upload_error, $upload_con, $cropData, $thumb_dim);

                        else:

                            $imageup_result = $this->smiles_file->uploadandcrop($f_data1, $user_id, 2, $upload_error, $upload_con, $cropData, $thumb_dim);

                        endif;


                    else:
                        $this->session->set_flashdata('error', 'Image not uploded properly, try again');
                        redirect($curl);
                    endif;

                    else:       
                    $image_details = $this->Image_upload_model->get($image2_id);
                    // print_r($image_details);echo $caption_image2;exit();
                    if ((($image_details))){
                        $this->Image_upload_model->update($image2_id, array('caption' => $caption_image2));
					}



                endif;

                if (!empty($file_data3) && count($file_data3)):
                    if ($file_data3['type'] == 'success'):
                        $f_data = array();
                        $cropData = "";
                        $caption_image = "";

                        $caption_image = $caption_image3;
                        $cropData = $crop3;

                        $f_data2 = array(
                            'article_id' => $id,
                            'orig_name' => $file_data3['msg']['orig_name'],
                            'file_type' => $file_data3['msg']['file_type'],
                            'file_ext' => $file_data3['msg']['file_ext'],
                            'file_size' => $file_data3['msg']['file_size'],
                            'is_image' => $file_data3['msg']['is_image'],
                            'image_type' => $file_data3['msg']['image_type'],
                            'image_width' => $file_data3['msg']['image_width'],
                            'image_height' => $file_data3['msg']['image_height'],
                            'file_path' => $file_data3['msg']['file_path'],
                            'full_path' => $file_data3['msg']['full_path'],
                            'raw_name' => $file_data3['msg']['raw_name'],
                            'type' => '2',                'author_id' => $author,

                            'caption' => $caption_image3,
                            'article_id' => $id
                        );
                        $upload_error = array();
                        $upload_con = array("allowed_types" => "jpeg|jpg|png", "upload_path" => $upload_path);
                        $thumb_dim = array("width" => 100);
                        if (!empty($image3_id)):

                            $image_details = $this->Image_upload_model->get($image3_id);

                            $oldFile = $upload_path . "/" . $image_details->raw_name . $image_details->file_ext;

                            $oldFile_o = $upload_path . "/" . $image_details->raw_name . '_o' . $image_details->file_ext;

                            $oldFile_thumb = $upload_path . "/" . $image_details->raw_name . '_thumb' . $image_details->file_ext;

                            if (file_exists($oldFile))
                                unlink($oldFile);
                            if (file_exists($oldFile_o))
                                unlink($oldFile_o);
                            if (file_exists($oldFile_thumb))
                                unlink($oldFile_thumb);

                            $imageup_result = $this->smiles_file->update_uploadandcrop($f_data2, $user_id, 2, $image3_id, $upload_error, $upload_con, $cropData, $thumb_dim);

                        else:

                            $imageup_result = $this->smiles_file->uploadandcrop($f_data2, $user_id, 2, $upload_error, $upload_con, $cropData, $thumb_dim);

                        endif;


                    else:
                        $this->session->set_flashdata('error', 'Image not uploded properly, try again');
                        redirect($curl);
                    endif;
                    else:  
                    $image_details = $this->Image_upload_model->get($image3_id);
                    // echo '<pre>';print_r($image3_id); exit;
                    if (!empty($image_details)):
                        $this->Image_upload_model->update($image3_id, array('caption' => $caption_image3));
                    endif;

                endif;




                 $currentdate = date('Y-m-d h:i:s');
                $update_data = array(
                    'title' => $title,
                    'description' => $description,
                    'short_description' => $short_description,
                    'cat_id' => $cat_id,
                    'updated_on' => $currentdate,'author_id' => $author
                );

                //$get_quiz=$this->Quiz_article_model->get()

                if (!empty($quiz_id)){

                    $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                        'updated_on' => $currentdate,
                    );
                    //print_r($update_quiz);exit();
                    $this->Quiz_article_model->update($quiz_id, $update_quiz); 
                }
                elseif(!empty($question))
                {
                   $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                       'article_id' => $id,
                       'created_on' => $currentdate,
                    );
                    //print_r($update_quiz);exit();
                    $this->Quiz_article_model->insert_quiz($update_quiz); 
                }
                

                if (!empty($edit_tags)):
                    $filtertag = array_values(array_filter($tags));

                    for ($i = 0; $i < count($edit_tags); $i++) {
                        $update_tag = array(
                            'tag_name' => $edit_tags[$i],
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->update($tag_id[$i], $update_tag);
                    }

                endif;
                if (!empty($tags)):
                    $filtertag = array_values(array_filter($tags));

                    foreach ($tags as $tags_row) {
                        $update_tag = array(
                            'tag_name' => $tags_row,
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->insert($update_tag);
                    }

                endif;


                $db_result = $this->Articles_model->update($id, $update_data);

                if ($db_result > 0):

                    $message = "Article updated sucessfully.";

                    $this->session->set_flashdata('message', $message);

                else:

                    $message = "Article updated successfully.";

                    $this->session->set_flashdata('message', $message);

                endif;





            elseif ($type == "3"):

                $files = $_FILES['file_name'];

                if (!empty($files['name'])):

                    $upload_path = $this->articlevideo_original_path;

                    if (!file_exists($upload_path)) {

                        mkdir($upload_path);
                    }

                    //echo "<pre>";
                    //print_r($files);exit();

                    $err_msgs = '';

                    $db_result = '';

                    $type = $this->input->post('type');

                    $config['file_name'] = $files['name'];



                    $config['upload_path'] = 'assets/uploads/articles_videos';

                    $config['allowed_types'] = 'mov|mpeg|mp3|avi|mp4|3gp|quicktime|MOV';

                    $config['max_size'] = '';

                    $config['overwrite'] = FALSE;

                    $config['remove_spaces'] = TRUE;

                    $config['encrypt_name'] = TRUE;



                    $this->upload->initialize($config);

                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload('file_name')) {

                        // If there is any error

                        $err_msgs .= 'Error i
                        ing video ' . $this->upload->display_errors() . '<br />';

                        $this->session->set_flashdata('error', $err_msgs);
                    } else {

                        $upload_data = $this->upload->data();

                        $video_path = $upload_data['file_name'];



                        // ffmpeg command to convert video

                        exec("ffmpeg -i " . $upload_data['full_path'] . " " . $upload_data['file_path'] . $upload_data['raw_name'] . ".flv");

                        // print_r($upload_data);exit();
                        /// In the end update video name in DB

                        if (isset($upload_data) && count($upload_data)):





                            $f_data = array(
                                'orig_name' => $upload_data['orig_name'],
                                'file_type' => $upload_data['file_type'],
                                'file_ext' => $upload_data['file_ext'],
                                'file_size' => $upload_data['file_size'],
                                'is_image' => $upload_data['is_image'],
                                'image_type' => $upload_data['image_type'],
//                                         'image_width'=>$upload_data['image_width'],
//                                         'image_height'=>$upload_data['image_height'],
                                'file_path' => $upload_data['file_path'],
                                'raw_name' => $upload_data['raw_name'],
                                'type' => '3',
                                //'product_id'=>$product_id,
                                //'user_id'=>$user_id,
                                'user_id' => $user_id
                            );



                            $ffmpeg = "ffmpeg";



                            //$videoFile = "/home/hygienewatch/www/admin/assets/uploads/articles_videos/" . $f_data['raw_name'] . $f_data['file_ext'];
                            //$imageFile = "/home/hygienewatch/www/admin/assets/uploads/articles_videos/" . $f_data['raw_name'] . "_thumb" . ".jpg";

                            $videoFile = $upload_path . "/" . $f_data['raw_name'] . $f_data['file_ext'];

                            $imageFile = $upload_path . "/" . $f_data['raw_name'] . "_thumb" . ".jpg";

                            $size = '80X80';

                            $interval = 2; // At what time the screenshot to be taken after video is started

                            $cmd = "$ffmpeg -i $videoFile -deinterlace -an -ss $interval -f mjpeg -t 1 -r 1 -y -s $size $imageFile 2>&1";

                            shell_exec($cmd);


                            if (!empty($image1_id)):



                                $image_details = $this->Image_upload_model->get($image1_id);

                                $oldFile = $upload_path . "/" . $image_details->raw_name . $image_details->file_ext;

                                $oldFile_thumb = $upload_path . "/" . $image_details->raw_name . '_thumb' . ".jpg";

                                if (file_exists($oldFile)) {



                                    unlink($oldFile);

                                    unlink($oldFile_thumb);
                                }

                                $imageup_result = $this->Image_upload_model->update($image1_id, $f_data);
                            //echo $this->db->last_query();exit();


                            else:

                                $imagelast_insert_id = $this->db->insert('image_files', $f_data);


                            endif;



                            $image_result = $this->db->insert_id();

                        endif;
                    }

                endif;


                $currentdate = date('Y-m-d h:i:s');
                $update_data = array(
                    'title' => $title,
                    'description' => $description,
                    'short_description' => $short_description,
                    'cat_id' => $cat_id,
                     'updated_on' => $currentdate,'author_id' => $author
                );

                if (!empty($quiz_id)){

                    $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                         'updated_on' => $currentdate,
                    );

                    $this->Quiz_article_model->update($quiz_id, $update_quiz);
    }
     elseif(!empty($question))
                {
                   $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                       'article_id' => $id,
                       'created_on' => $currentdate,
                    );
                    //print_r($update_quiz);exit();
                    $this->Quiz_article_model->insert_quiz($update_quiz); 
                }
                if (!empty($edit_tags)):
                    $filtertag = array_values(array_filter($tags));

                    for ($i = 0; $i < count($edit_tags); $i++) {
                        $update_tag = array(
                            'tag_name' => $edit_tags[$i],
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->update($tag_id[$i], $update_tag);
                    }

                endif;
                if (!empty($tags)):
                    $filtertag = array_values(array_filter($tags));

                    foreach ($tags as $tags_row) {
                        $update_tag = array(
                            'tag_name' => $tags_row,
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->insert($update_tag);
                    }

                endif;
                $db_result = $this->Articles_model->update($id, $update_data);

                $message = "Article updated sucessfully.";

                $this->session->set_flashdata('message', $message);
            else:
                $currentdate = date('Y-m-d h:i:s');
                $update_data = array(
                    'title' => $title,
                    'description' => $description,
                    'short_description' => $short_description,
                    'url_link' => $link,
                     'updated_on' => $currentdate,'author_id' => $author,
                );

                if (!empty($quiz_id)){

                    $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                        'updated_on' => $currentdate,
                    );

                    $this->Quiz_article_model->update($quiz_id, $update_quiz);

    }
                elseif(!empty($question))
                {
                   $update_quiz = array(
                        'question' => $question,
                        'option1' => $option1,
                        'option2' => $option2,
                        'option3' => $option3,
                        'option4' => $option4,
                        'answer_key' => $answer_key,
                       'article_id' => $id,
                       'created_on' => $currentdate,
                    );
                    //print_r($update_quiz);exit();
                    $this->Quiz_article_model->insert($update_quiz); 
                }
                if (!empty($edit_tags)):
                    $filtertag = array_values(array_filter($tags));

                    for ($i = 0; $i < count($edit_tags); $i++) {
                        $update_tag = array(
                            'tag_name' => $edit_tags[$i],
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->update($tag_id[$i], $update_tag);
                    }

                endif;
                if (!empty($tags)):
                    $filtertag = array_values(array_filter($tags));

                    foreach ($tags as $tags_row) {
                        $update_tag = array(
                            'tag_name' => $tags_row,
                            'article_id' => $id
                        );
                        $this->Articles_tag_model->insert($update_tag);
                    }

                endif;
              
//                
//                $update_quiz = array(
//                        'question' => $question,
//                        'option1' => $option1,
//                        'option2' => $option2,
//                        'option3' => $option3,
//                        'option4' => $option4,
//                        'answer_key' => $answer_key,
//                       'article_id' => $id,
//                       'created_on' => $currentdate,
//                    );
//                    print_r($update_quiz);
//                    $this->Quiz_article_model->insert($update_quiz); 
                
                $db_result = $this->Articles_model->update($id, $update_data);

                $message = "Article updated sucessfully.";

                $this->session->set_flashdata('message', $message);
            endif;
            if ($type == '5'):
		 
                if (!empty($_FILES['pdf']['name'])) {
                    
                  //  echo "<pre>";  print_r($_FILES['pdf']['name']);  die();
                  $upload_data = array();
                    $config['upload_path'] = $upload_paths = 'assets/uploads/files';
                    if (!file_exists($upload_paths)) {
                        mkdir($upload_paths);
                        chmod($upload_paths, 0777);
                    }
                    $config['file_name'] = $_FILES['pdf']['name'];
                    $config['allowed_types'] = 'pdf';
                    $config['encrypt_name'] = true;
                    $config['remove_spaces'] = true;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    //print_r($config); exit;
                    $upload_data = $this->upload->do_upload('pdf');
                    //print_r($upload_data); exit;
                    if(!$upload_data) 
                    {
                        //print_r($this->upload->display_errors()); exit;
                        $text = $this->upload->display_errors();
                        $text = str_ireplace('<p>', '', $text);
                        $text = str_ireplace('</p>', '', $text);

                        $this->session->set_flashdata('error', $text);
					   redirect(site_url() . 'admin/Dashboard_articles/add_edit_article/'.$id.'/'.$tab);
                    } else {
                        $file_data = $this->upload->data();

                        $f_data = array(
                            'user_id' => $user_id,
                            'article_id' => $id,
                            'orig_name' => $file_data['orig_name'],
                            'file_type' => $file_data['file_type'],
                            'file_ext' => $file_data['file_ext'],
                            'file_size' => $file_data['file_size'],
                            'is_image' => $file_data['is_image'],
                            'image_type' => $file_data['image_type'],
                            'file_path' => $file_data['file_path'],
                            'raw_name' => $file_data['raw_name'],
                            'type' => '5', //pdf
                        );
						if(!empty($image1_id)):
							//$db_result1 = $this->db->update('image_files', $f_data);
						    $db_result1 = $this->Image_upload_model->update($image1_id, $f_data);
						 else:
                            $db_result1 = $this->Image_upload_model->update_pptpdf('image_files', $f_data);
							$db_result1 = 1;
					   endif;
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
							$flag = 1;
                        }
                    }
                }

			endif;
                        
                        
                        
         if ($type == '6'):
		
                if (!empty($_FILES['ppt']['name'])) {
                    
                    echo "<pre>";  print_r($_FILES['pdf']['name']);  die();
                  $upload_data = array();
                    $config['upload_path'] = $upload_paths = 'assets/uploads/files';
                    if (!file_exists($upload_paths)) {
                        mkdir($upload_paths);
                        chmod($upload_paths, 0777);
                    }
                    $config['file_name'] = $_FILES['ppt']['name'];
                    $config['allowed_types'] = 'ppt';
                    $config['encrypt_name'] = true;
                    $config['remove_spaces'] = true;

                    $this->upload->initialize($config);
                    $this->load->library('upload', $config);
                    //print_r($config); exit;
                    $upload_data = $this->upload->do_upload('ppt');
                    //print_r($upload_data); exit;
                    if(!$upload_data) 
                    {
                        //print_r($this->upload->display_errors()); exit;
                        $text = $this->upload->display_errors();
                        $text = str_ireplace('<p>', '', $text);
                        $text = str_ireplace('</p>', '', $text);

                        $this->session->set_flashdata('error', $text);
					   redirect(site_url() . 'admin/Dashboard_articles/add_edit_article/'.$id.'/'.$tab);
                    } else {
                        $file_data = $this->upload->data();

                        $f_data = array(
                            'user_id' => $user_id,
                            'article_id' => $id,
                            'orig_name' => $file_data['orig_name'],
                            'file_type' => $file_data['file_type'],
                            'file_ext' => $file_data['file_ext'],
                            'file_size' => $file_data['file_size'],
                            'is_image' => $file_data['is_image'],
                            'image_type' => $file_data['image_type'],
                            'file_path' => $file_data['file_path'],
                            'raw_name' => $file_data['raw_name'],
                            'type' => '6', //pdf
                        );
						if(!empty($image1_id)):
							//$db_result1 = $this->db->update('image_files', $f_data);
						    $db_result1 = $this->Image_upload_model->update($image1_id, $f_data);
						 else:
                            $db_result1 = $this->Image_upload_model->update_pptpdf('image_files', $f_data);
							$db_result1 = 1;
					   endif;
                        if ($this->db->trans_status() === FALSE) {
                            $this->db->trans_rollback();
                        } else {
                            $this->db->trans_commit();
							$flag = 1;
                        }
                    }
                }

			endif;
        else:

            $this->session->set_flashdata('message', "Try again");
        endif;



        redirect(site_url() . 'admin/Dashboard_articles/index/' . $user_id . "/#" . $tab);
    }

//Function: To upload the image

    function Upload($fieldname, &$return_message = NULL, $upload_path) {

        $files = $_FILES[$fieldname];

        $upload_config = array(
            "file_name" => $files['name'],
            'allowed_types' => 'jpeg|jpg|png',
            "upload_path" => $upload_path,
            'max_size' => 81929,
            'max_width' => 1500,
            'max_height' => 1500,
            'encrypt_name' => TRUE,
            'remove_spaces' => TRUE
        );

        $resize_dim = array("width" => 300, "height" => 300);

        $thumb_dim = array("width" => 80, "height" => 80);

        if ($upload_config && is_array($upload_config)) {

            if (isset($upload_config['max_size']))
                $my_config['max_size'] = $upload_config['max_size'];

            if (isset($upload_config['max_width']))
                $my_config['max_width'] = $upload_config['max_width'];

            if (isset($upload_config['max_height']))
                $my_config['max_height'] = $upload_config['max_height'];

            if (isset($upload_config['allowed_types']))
                $my_config['allowed_types'] = $upload_config['allowed_types'];
        }

        $this->upload->initialize(array(
            "file_name" => $files['name'],
            'allowed_types' => 'jpeg|jpg|png',
            "upload_path" => $upload_path,
            'max_size' => 81929,
            'max_width' => 1500,
            'max_height' => 1500,
            'encrypt_name' => TRUE,
            'remove_spaces' => TRUE
        ));

        if (!$this->upload->do_upload($fieldname)) {

            $data['response'] = [

                'messge' => array('error' => $this->upload->display_errors()),
                'status' => 0
            ];

            return $data['response'];
        } else {

            $file_data = $this->upload->data();

            $thumb_path = NULL;

            if ($file_data['is_image']) {

                $original_path = $file_data['file_path'] . $file_data['raw_name'] . "_o" . $file_data['file_ext'];



                $this->load->library('image_lib');



                $img_proc_config = array(
                    "image_library" => "GD2",
                    "maintain_ratio" => TRUE
                );



                $img_proc_errors = array();

                // create thumbnail if requested

                if ($thumb_dim && is_array($thumb_dim)) {

                    $this->image_lib->clear();

                    $thumb_path = $file_data['file_path'] . $file_data['raw_name'] . "_thumb" . $file_data['file_ext'];

                    $img_proc_config['source_image'] = $file_data['full_path'];

                    $img_proc_config['new_image'] = $thumb_path;

                    if (isset($thumb_dim['width']))
                        $img_proc_config['width'] = $thumb_dim['width'];

                    if (isset($thumb_dim['height']))
                        $img_proc_config['height'] = $thumb_dim['height'];

                    $this->image_lib->initialize($img_proc_config);

                    if (!$this->image_lib->resize())
                        $img_proc_errors = array_merge($img_proc_errors, array($this->image_lib->display_errors('', '')));
                }

                $copy_result = copy($file_data['full_path'], $original_path);



                if ($resize_dim && is_array($resize_dim) && $copy_result) {

                    $this->image_lib->clear();

                    $img_proc_config['source_image'] = $original_path;

                    $img_proc_config['new_image'] = $file_data['full_path'];

                    if (isset($resize_dim['width']))
                        $img_proc_config['width'] = $resize_dim['width'];

                    if (isset($resize_dim['height']))
                        $img_proc_config['height'] = $resize_dim['height'];

                    $this->image_lib->initialize($img_proc_config);

                    $this->image_lib->resize();

                    if (!$this->image_lib->resize())
                        $img_proc_errors = array_merge($img_proc_errors, array($this->image_lib->display_errors('', '')));
                }

                if ($return_message !== NULL)
                    $return_message = $img_proc_errors;
            }



            return $file_data;
        }
    }

 
 
    public function subcategory($id) {

        if (@$ch_language = $this->session->userdata('session_data')):


            if ($ch_language['language'] == 'zh'):
                $options = $this->Category_model->custom_dropdown('id', 'ch_lang_name', array('parent_id' => $id, 'deleted' => '0'));
            elseif ($ch_language['language'] == 'my'):
                $options = $this->Category_model->custom_dropdown('id', 'bm_lang_name', array('parent_id' => $id, 'deleted' => '0'));


            else:
                $options = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $id, 'deleted' => '0'));
            endif;
        endif;
        //echo $this->db->last_query();exit();
        //print_r($options);

        if (!empty($options)):

            $result = '<option value="" selected="selected">' . $ch_language['lang_choosesubcategory'] . '</option>';

            foreach ($options as $key => $value) {

                $result.='<option value="' . $key . '">' . $value . '</option>';
            }
            echo $result;
        else:
            //echo 0;
            echo $result = '<option value="" selected="selected">' . $ch_language['lang_subsubcategory_notfound'] . '</option>';

        endif;


        //echo $result;
    }

    public function sub_subcategory($id = '') {
        if (!empty($id)):
            if ($this->session->userdata('session_data'))
                $data = $this->session->userdata('session_data');
            if (@$ch_language = $this->session->userdata('session_data')):


                if ($ch_language['language'] == 'zh'):
                    $options = $this->Category_model->custom_dropdown('id', 'ch_lang_name', array('parent_id' => $id, 'deleted' => '0'));
                elseif ($ch_language['language'] == 'my'):
                    $options = $this->Category_model->custom_dropdown('id', 'bm_lang_name', array('parent_id' => $id, 'deleted' => '0'));


                else:
                    $options = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $id, 'deleted' => '0'));
                endif;
            endif;

          
            $result = '';
            $result .= '<div class = "form-group">
        <label>' . $ch_language['lang_selectmsub_subcategory'] . '</label>
        <select style="height:40px !important;" id="sub_subcategory_id" name = "cat_id1" data-placeholder = ' . $ch_language['lang_choosesub_subcategory'] . '... class = "form-control select-full get_sub_sub_sub_cat required" tabindex = "2">';

            if (!empty($options)):

                $result .= '<option value="" selected="selected">' . $ch_language['lang_choosesub_subcategory'] . '</option>';

                foreach ($options as $key => $value) {

                    $result.='<option value="' . $key . '">' . $value . '</option>';
                }
                $result .= '</select>
            </div>';
            else:

                $result = '';

            endif;



            echo $result;
        endif;
    }

    public function sub_sub_subcategory($id = '') {
        if (!empty($id)):
            if (@$ch_language = $this->session->userdata('session_data')):


                if ($ch_language['language'] == 'zh'):
                    $options = $this->Category_model->custom_dropdown('id', 'ch_lang_name', array('parent_id' => $id, 'deleted' => '0'));
                elseif ($ch_language['language'] == 'my'):
                    $options = $this->Category_model->custom_dropdown('id', 'bm_lang_name', array('parent_id' => $id, 'deleted' => '0'));


                else:
                    $options = $this->Category_model->custom_dropdown('id', 'name', array('parent_id' => $id, 'deleted' => '0'));
                endif;
            endif;

          
            $result = '';
            $result .= '<div class = "form-group">
        <label>' . $ch_language['lang_selectsub_subsubcategory'] . '</label>
        <select style="height:40px !important;" id="sub_sub_subcategory_id" name = "cat_id2" data-placeholder = ' . $ch_language['lang_choosesub_subsubcategory'] . '"..." class = "form-control select-full required" tabindex = "2">';

            if (!empty($options)):

                $result .= '<option value="" selected="selected">' . $ch_language['lang_choosesub_subsubcategory'] . '</option>';

                foreach ($options as $key => $value) {

                    $result.='<option value="' . $key . '">' . $value . '</option>';
                }
                $result .= '</select>
            </div>';
            else:

                $result = '';

            endif;



            echo $result;
        endif;
    }

    public function delete_article() {

        $id = $this->input->post('at_id');

       
        if (!empty($id)):

            $update_data = array(
                'deleted' => '1',
            );

            $this->Quiz_article_model->delete(array('article_id' => $id));

            $this->Articles_model->update($id, $update_data);

            echo TRUE;

        else:

            echo FALSE;

        endif;
    }

       public function active() {

        $id = $this->input->post('id');

        $this->db->select('user_id');

        $this->db->from('articles');

        $this->db->where("id=$id");

        $user_id = $this->db->get()->result();

        $status = $this->input->post('status');

        if (!empty($id)) {

            $update_art = array(
                'active' => $status,
            );

            $act_status = $this->Articles_model->update($id, $update_art);
            if(!empty($act_status) && $status=='1')
                { 
                    $get_article = $this->Articles_model->get(array('id' => $id));
                    $update_not = array(
                'notification' => 'no',
                     );
                     if($get_article->article_type=='subscriber' && $get_article->notification == 'yes')
                    { 
                         
                     $arttyp = array('subscriber');
                    $this->article_send_pushnotification_fcm($get_article->title,$arttyp);
                    $this->article_send_ios($get_article->title,$arttyp);
                    $update_notify = $this->Articles_model->update($id, $update_not);
                    }
                    elseif($get_article->article_type =='non_subscriber' && $get_article->notification == 'yes')
                    { 
                        $arttyp = array('subscriber','non_subscriber');
                   $this->article_send_pushnotification_fcm($get_article->title,$arttyp);
                   $this->article_send_ios($get_article->title,$arttyp);  
                     $update_notify = $this->Articles_model->update($id, $update_not);
                    }
                }
        
            echo TRUE;
        }
    }
    public function activate_article() {
        $id = $this->input->post('art_id');
        $user = $this->ion_auth->user()->row()->id;
        extract($_POST);

        if (!empty($cat_id2)):
            $cat_id = @$cat_id2;
        else:
            if (!empty($cat_id1)):
                $cat_id = @$cat_id1;
            else:
                $cat_id = @$cat_id;
            endif;
        endif;
        $this->db->select('user_id');

        $this->db->from('articles');

        $this->db->where("id=$id");

        $user_id = $this->db->get()->result();

        $status = $this->input->post('status');

     
        if (!empty($id)):

//          

            $acttivate_data = array(
                'cat_id' => $cat_id,
                'active' => '1'
            );
            $activate_article = $this->Articles_model->update($id, $acttivate_data);
          
            if (($activate_article > 0) && ($dept_article > 0)):
                $this->session->set_flashdata('message', 'Article is activated successfully.');
                $this->send_pushnotification($user_id[0]->user_id, "1");
                $this->send_ios($user_id[0]->user_id, "1");
            else:

                $this->session->set_flashdata('message', 'Article is already activated.');
            endif;

            redirect(site_url('admin/Dashboard_articles/index/' . $user));

        else:

            show_404();
        endif;
        redirect(site_url('admin/Dashboard_articles/edit_article_activate/' . $id));
    }

    public function send_pushnotification($all_user_id, $status) {
        $title = project_name;
        if ($status == '1'):
            @$approved = "approved";

        else:
            @$approved = "deactivated";

        endif;
        $response = "Your article has been $approved by admin";

        $this->db->select('*');
        $this->db->from('gcm_users ');
        //$this->db->join(' users u', 'u.id = gu.user_id');
        $this->db->where("user_id ='$all_user_id' AND type='android'");
        $androidresult = $this->db->get()->result();
       
        if (isset($androidresult) && count($androidresult)):
            foreach ($androidresult as $row) {
                $this->gcm->addRecepient($row->gcm_regid);
            }
            //$this->gcm->setMessage($message.date('d.m.Y H:s:i'));
            $this->gcm->setMessage($response);

            $this->gcm->setData(array(
                'title' => $title,
                'response' => $response,
            ));
            $this->gcm->setTtl(500);
            $this->gcm->setTtl(false);
            //$ee=$this->gcm->send();
            //print_r($ee);exit();
            if ($this->gcm->send()):

                return 1;



            else:

                return 0;
           
            endif;


        else:
            return 0;
        endif;
    }

    function send_ios($all_user_id, $status) {
        $this->db->select('*');
        $this->db->from('gcm_users ');
        //$this->db->join(' users u', 'u.id = gu.user_id');
        $this->db->where("user_id = '$all_user_id' AND type='ios'");

        $ios_results = $this->db->get()->result();

        // print_r($androidresult);exit();
        $title2 = project_name;
        if ($status == '1'):
            @$approved = "approved";

        else:
            @$approved = "deactivated";

        endif;
        $message1 = "Your article has been $approved by admin";
        // $rr=$this->apn->setData($title);
        if (isset($ios_results) && count($ios_results)):
            foreach ($ios_results as $row) {
              
                $device = $row->gcm_regid;
                $last_id = $this->Gcm_model->insert_pushnotification($device, $title2, $message1);
                
                if (!empty($last_id))
                    if ($this->sendnotification_ios($last_id))
                        $flag = TRUE;
                    else
                        $flag = FALSE;
            }
            if ($flag == TRUE) {
                $message = "sucess for all messages";
                $status = 1;
            } else {
                echo $message = "Some messages have errors";
                $status = 0;
            }


        endif;
    }

    function sendnotification_ios($id) {


        $data_notification = $this->Gcm_model->get_pushnotification($id);


        if (!empty($data_notification)) {
            $badge_count = $this->Gcm_model->get_budgecount($data_notification->gcm_regid);
            $sound = 'chime'; // string - sound name
            $development = IOS_GCM_DEV_MODE; // boolean
            //echo $this->setapnbadge();

            $payload = array();
            $payload['aps'] = array('alert' => $data_notification->message, 'badge' => intval($badge_count->badgecount), 'sound' => $sound);
            $payload = json_encode($payload);

            $apns_url = NULL; // Set Later
            $apns_cert = NULL; // Set Later
            $apns_port = 2195;

            if ($development) {
                $apns_url = 'gateway.sandbox.push.apple.com';
                $apns_cert = APPPATH . 'apn/' . IOS_PEM_FILE; // relative address to an App Specific Certificate     file 
            } else {
                $apns_url = 'gateway.push.apple.com';
                $apns_cert = APPPATH . 'apn/' . IOS_PEM_FILE;
            }

            $stream_context = stream_context_create();
            stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);

            $apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);

            $device_tokens = array($data_notification->gcm_regid); // tokens!!!


            foreach ($device_tokens as $device_token) {
                $apns_message = chr(0) . chr(0) . chr(32) . pack('H*', str_replace('    ', '', $device_token)) . chr(0) . chr(strlen($payload)) . $payload;
                fwrite($apns, $apns_message);
            }
            @$badgedata = $badgedata + 1;

            @socket_close($apns);
            @fclose($apns);
            return TRUE;
        } else
            return FALSE;
    }

    public function add_picture() {

        $return_message = "";
        $config = array(
            'upload_path' => "assets/uploads/articles_image",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE
        );
        $upload_error = array();
        $resize_dim = array("width" => 700, "height" => 600);
        $this->load->library('smiles_file');
        $data['file_input_params'] = array(
            'name' => 'picture_file'
        );

        $file_data = $this->smiles_file->uploadforcrop($data['file_input_params']['name'], $upload_error, $config, $resize_dim);

        if (!empty($file_data)) {
            $returndata = array("type" => "success", "msg" => $file_data);
        } else {

            if (!$upload_error)
                $returndata = array("type" => "alert", "msg" => "Please select a file to upload");
            else
                $returndata = array("type" => "alert", "msg" => $upload_error);
        }

        echo json_encode($returndata);
    }

    public function preview_article() {

        $id = '';
        $data ['cat'] = '';
        $id = $this->uri->segment(4);
        if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
        if (!empty($id)):

            if ($this->session->userdata('session_data'))
                $data = $this->session->userdata('session_data');
            $data['mode'] = 'preview';

            $this->db->select('a.*,u.username,c.name as category_name');

            $this->db->from('articles a');

            $this->db->join(' users u', 'u.id = a.author_id');

            $this->db->join(' category c', 'c.id = a.cat_id');

            $this->db->where("a.id=$id");

            $data['view_article'] = $this->db->get()->result();

            $data ['image_files'] = $this->Image_upload_model->get_all(array('article_id' => $id));

            $data ['article_tag'] = $this->Articles_tag_model->get_all(array('article_id' => $id));


            $data['article_microlearning'] = $this->Quiz_article_model->get(array('article_id' => $id));
            $get_cat_id = $this->Category_model->get($data['view_article'][0]->cat_id);
            $get_parent_id = $this->Category_model->get($get_cat_id->parent_id);
            if (!empty($get_parent_id)):
                @$data ['cat'] .= $get_parent_id->name;
                $get_parent_id1 = $this->Category_model->get($get_parent_id->parent_id);
                if (!empty($get_parent_id1)):
                    $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id1->name;
                    // array_push($add_cat,$data['view_article ']['parent_name1']);
                    $get_parent_id2 = $this->Category_model->get($get_parent_id1->parent_id);
                    if (!empty($get_parent_id2)):
                        $data ['cat'] .= "<i class='fa fa-arrow-right'></i>" . $get_parent_id2->name;
                    //array_push($add_cat,$data['view_article ']['parent_name2']);

                    endif;
                endif;
            endif;
            $this->load->view('admin/dashboard_articlepreview', $data);

        endif;
    }
    
    
    
    public function article_send_pushnotification($titles='',$article_type) {
        $title = "New video $titles has been added.";
        $response = "New video $titles has been added.";

        $this->db->select('gcm_users.*');
        $this->db->from('gcm_users');
        $this->db->join('users', 'users.id = gcm_users.user_id','left');
        $this->db->where('gcm_users.type','android');
        $this->db->where_in('users.user_type',$article_type);
        $androidresult = $this->db->get()->result();
     
        if (isset($androidresult) && count($androidresult)):
            foreach ($androidresult as $row) {
                $this->gcm->addRecepient($row->gcm_regid);
            }
            //$this->gcm->setMessage($message.date('d.m.Y H:s:i'));
            $this->gcm->setMessage($response);

            $this->gcm->setData(array(
                'title' => $title,
                'response' => $response,
            ));
          $this->gcm->setTtl(500);
           $this->gcm->setTtl(false);
            //$ee=$this->gcm->send();
            //print_r($ee);exit();
            if ($this->gcm->send()):

                return 1;



            else:

                return 0;
          
            endif;


        else:
            return 0;
        endif;
    }
	function article_send_pushnotification_fcm($titles='',$article_type) {  
        
         $json = '';
        $response = '';
        
        $title = "New video $titles has been added.";
        $message = "New video $titles has been added.";
        
            $this->fcm->setTitle($title);

                 $this->db->select('gcm_users.*');
        $this->db->from('gcm_users');
        $this->db->join('users', 'users.id = gcm_users.user_id','left');
        $this->db->where('gcm_users.type','android');
        $this->db->where_in('users.user_type',$article_type);
        $this->db->order_by('gcm_users.id','DESC');
        //$this->db->limit('100');
        $result = $this->db->get()->result();
            if (!empty($result)) :
                foreach ($result as $res) {

                    $token = $res->gcm_regid; //token here
                    if ($res->type == 'android'):
              
                        $this->fcm->setMessage($message);
                       
                        $json = $this->fcm->getPush();
                    //   echo '<pre>';PRINT_R($json);EXIT();
                        $response = $this->fcm->send($token, $json);
                        echo $response;
                    endif;
          
                }
            else:
                echo "no data";
            endif;


    }
    function article_send_ios($title2='',$article_type) {
         $this->db->select('gcm_users.*');
        $this->db->from('gcm_users');
        $this->db->join('users', 'users.id = gcm_users.user_id','left');
        $this->db->where('gcm_users.type','ios');
        $this->db->where_in('users.user_type',$article_type);
        

        $ios_results = $this->db->get()->result();

     
        $title2 = $title2;
        
        $message1 = "New video $title2 has been added.";
      
        if (isset($ios_results) && count($ios_results)):
            foreach ($ios_results as $row) {
                //$this->apn->sendMessage($row->gcm_regid,$title.$message1);
                $device = $row->gcm_regid;
              
                if (!empty($device))
                    if ($this->article_sendnotification_ios($device,$message1,$title2))
                        $flag = TRUE;
                    else
                        $flag = FALSE;
            }
            if ($flag == TRUE) {
                $message = "sucess for all messages";
                $status = 1;
            } else {
                echo $message = "Some messages have errors";
                $status = 0;
            }


        endif;
    }

    function article_sendnotification_ios($id,$message,$title) {


    


        if (!empty($id)) {
            $badge_count = $this->Gcm_model->get_budgecount($id);
            $sound = 'chime'; // string - sound name
            $development = IOS_GCM_DEV_MODE; // boolean
            //echo $this->setapnbadge();

            $payload = array();
            $payload['aps'] = array('alert' => $message, 'badge' => intval($badge_count->badgecount), 'sound' => $sound);
            $payload = json_encode($payload);

            $apns_url = NULL; // Set Later
            $apns_cert = NULL; // Set Later
            $apns_port = 2195;

            if ($development) {
                $apns_url = 'gateway.sandbox.push.apple.com';
                $apns_cert = APPPATH . 'apn/' . IOS_PEM_FILE; // relative address to an App Specific Certificate     file 
            } else {
                $apns_url = 'gateway.push.apple.com';
                $apns_cert = APPPATH . 'apn/' . IOS_PEM_FILE;
            }

            $stream_context = stream_context_create();
            stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);

            $apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);

            $device_tokens = array($id); // tokens!!!


            foreach ($device_tokens as $device_token) {
                $apns_message = chr(0) . chr(0) . chr(32) . pack('H*', str_replace('    ', '', $device_token)) . chr(0) . chr(strlen($payload)) . $payload;
                fwrite($apns, $apns_message);
            }
            @$badgedata = $badgedata + 1;

            @socket_close($apns);
            @fclose($apns);
            return TRUE;
        } else
            return FALSE;
    }
    
    
    function change_url()
    {
        $change = $this->Articles_model->get_change();
    }
    
    function delete_mini()
    {
        $change = $this->Articles_model->delete_mini();
    }
    
       public function view_user_comments($id='') {
     
         if ($this->session->userdata('session_data'))
            $data = $this->session->userdata('session_data');
         
     $data['user_comments'] = $this->Articles_model->get_article_user_comments($id);    
       // echo '<pre>'; print_r($data['user_comments']);exit;
          $this->load->view('admin/dashboard_article_user_comment', $data);
          
       
         
     }

}
