<?php require_once('includes/head.php') ?>
<?php require_once('includes/croppage_header.php') ?>
<?php require_once('includes/loader.php') ?>
<body>
    <div class="modal modal_load" style="display: none">
        <div class="center">
             <div class="loader"></div>
<!--            <img alt="" src="<?php base_url(); ?>/assets/loader.gif" />-->
        </div>
    </div>

    <div id="wrapper">

        <?php require_once('includes/nav.php') ?>

        <div id="page-wrapper">

            <?php if ($mode == 'add'): ?>
                <!--                <div class="row">
                                    <div class="col-lg-12">
                                        <h1 class="page-header">Enter below article details</h1>
                                    </div>
                                     /.col-lg-12 
                                </div>
                                 /.row 
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Article details
                                                <a style="margin-top: -6px;float: right;" href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>"> <button type="button" class="btn btn-info">Back</button></a>
                                            </div>
                <?php //echo form_open_multipart(site_url() . '/admin/Dashboard_articles/add_edit_article', 'id="cat_form" class=".validate"'); ?>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-9 validate" >
                                                        <form role="form" id="add_edit_form" >
                                                            <div class="form-group">
                                                                <label>Article title</label>
                                                                <input class="form-control required" name="title" maxlength="50">
                                                                    <p class="help-block">Article title here.</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Selects Main Category</label>
                <?php
                $main_category [''] = 'Choose category';
                $options = 'data-placeholder="Choose a category..." class="form-control category_id select-full required" tabindex="2"';
                echo form_dropdown('sp_id', $main_category, @$main_category->id, $options);
                ?>
                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select Sub Category11</label>
                                                                <select id="subcategory_id" name="cat_id" data-placeholder="Choose a Subcategory..." class="form-control select-full required" tabindex="2">
                                                                    <option value="">Choose a sub category</option>
                                                                </select>
                
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Type Of file To Upload:</label>
                
                                                                <select id="type" name="type" class="form-control type_file required">
                                                                    <option value="">Please select upload file type</option>
                                                                    <option value="3">Image</option>
                                                                    <option value="4">Video</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Youtube url link:</label>
                                                                <input type="text" name="youtube" class="required"/>
                                                            </div>
                                                            <div class="image_rows">
                                                                <div class="form-group">
                                                                    <label>Image to upload:</label>
                                                                    <span class="help-block">Accepted formats: jpg, png, gif.(450X250)  </span>
                                                                    <input id="imageupload" type="file" class="imageupload f2 styled form-control required" id="files4" name="image_files" ><br>
                                                                    <input id="imageupload1" type="file" class="imageupload f2 styled form-control " id="files4" name="image_files1" ><br>
                                                                    <input id="imageupload2" type="file" class="imageupload f2 styled form-control " id="files4" name="image_files2" >
                                                                    <div class="row">
                                                                        <div id="preview-image"></div>
                                                                        <div id="preview-image1"></div>
                                                                        <div id="preview-image2"></div>
                                                                    </div>
                                                                    <span class="help-block old_image4"></span>
                                                                </div>
                                                            </div>
                                                            <div class="video_row">
                                                                <div class="form-group">
                                                                    <label>video:</label>
                                                                    <input type="file" class="fl styled form-control required" id="fl" name="file_name">
                                                                    <span class="help-block">Accepted formats: mov,mpeg,avi,mp4.  </span>
                                                                    <span class="help-block old_image4"></span>
                                                                    <input type="hidden" name="adv_id" id="id" value="">
                                                                    <video width="100" hieght="100" controls width="500px" id="vid" ></video>  
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <textarea  class="ckeditor form-control "  id="decription" name="description"  ></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Short description</label>
                                                                <textarea class="form-control required" rows="3" name="short_description" maxlength="200"></textarea>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <button type="button" id="b1" class="add_edit_button btn smile-primary btn">Submit</button>
                                                            <a href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>" class="btn btn btn-warning">Canczzel</a>
                                                        </form>
                                                    </div>
                                                </div>
                                                 /.row (nested) 
                                            </div>
                                             /.panel-body 
                                        </div>
                                         /.panel 
                                    </div>
                                     /.col-lg-12 
                                </div>
                                 /.row 
                            </div> -->
            <?php endif;
            ?>
            <?php if ($mode == 'activate'): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> &nbsp;Activate Article : </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Article details
                                <a style="margin-top: -6px;float: right;" href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>"> <button type="button" class="btn btn-info">Back</button></a>
                            </div>
                            <?php //echo form_open_multipart(site_url() . '/admin/Dashboard_articles/add_edit_article', 'id="cat_form" class=".validate"');          ?>

                            <div class="panel-body">

                                <div class="row">
                                    <div class="alert alert-warning">
                                        <p style="font-size:15px;">Category assigned to this article doesn't exist,kindly assign category before activate.<a href="<?php echo site_url("/admin/Dashboard_articles/view_article/" . $article->id); ?>"  target="_blank" class="alert-link" style="text-decoration:none;font-size: 15px;"><i class="fa fa-eye" title="View" style="margin-right:2px;"></i> Click here to view the article details</a>&nbsp
                                            <a href="<?php echo site_url("admin/Dashboard_articles/add_edit_article/" . $article->id); ?>"  target="_blank" class="alert-link" style="text-decoration:none; font-size: 15px;"><i class="fa fa-pencil" title="Edit"></i> Click here to edit the article details</a>.</p>
                                    </div>
                                    <div class="col-lg-9 validate" >

                                        <?php echo form_open_multipart(site_url('admin/Dashboard_articles/activate_article'), ' id="activate_form" class="validate"'); ?>

                                        <div class="form-group">
                                            <h4><b>Title:</b> <?php echo ucfirst($article->title); ?></h4>

                                        </div>
                                        <form action="<?php echo site_url('admin/Dashboard_articles/activate_article') ?>" id="activate_form" class="validate">
                                            <div class="form-group">
                                                <label>Selects Main Category</label>
                                                <?php
                                                $main_category [''] = 'Choose category';
                                                $options = 'data-placeholder="Choose a category..." class="form-control category_id select-full required" tabindex="2"';
                                               // echo form_dropdown('sp_id', $main_category, @$main_category->id, $options);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Select Sub Category</label>
                                                <select id="subcategory_id" name="cat_id" data-placeholder="Choose a Subcategory..." class="form-control select-full get_sub_sub_cat required" tabindex="2">
                                                    <option value="">Choose a sub category</option>
                                                </select>

                                            </div>
                                            <input type="hidden" name="art_id" value="<?php echo ucfirst($article->id); ?>"/>
                                            <div class="sub_subcategory">
                                            </div>
                                            <div class="sub_sub_subcategory">
                                            </div>


                                            <br>
                                            <br>
                                            <button type="button" class="actvate_sub btn smile-primary btn">Activate</button>

                                            <a href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>" class="btn btn btn-warning">Cancel</a>
                                        </form>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row --> 
<?php endif;
?>
<?php if ($mode == 'quiz_add'): ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $lang_enterquiz; ?> </h1>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-success fade in block-inner">            
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger fade in block-inner">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error') ?> </div>
        <?php } ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <?php echo $lang_quizdetails; ?> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9 validate" >
                            <form role="form" id="quiz_add_edit_form" class="validate" method="post" action="<?php echo site_url() ?>admin/Dashboard_quiz/add_edit">
                                <div class=" form-group">
                                    <label><?php echo $lang_question; ?>:</label>
                                    <textarea class="form-control required" rows="3" name="question"  id="question" maxlength="200"></textarea>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label><?php echo $lang_option1; ?> :</label>
                                            <input type="text" id="option1" name="option1" class="form-control required" value="">
                                        </div>

                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label><?php echo $lang_option2; ?>:</label>
                                            <input type="text" id="option2" name="option2" class="form-control required" value="">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label><?php echo $lang_option3; ?>:</label>
                                            <input type="text" id="option3" name="option3" class="form-control required" value="">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label><?php echo $lang_option4; ?>:</label>
                                            <input type="text" id="option4" name="option4" class="form-control required" value="">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label><?php echo $lang_answer; ?>:</label>
                                            <select class="form-control" id="answer_key" name="answer_key">
                                                <option value="option1">
                                                    <?php echo $lang_option1; ?>
                                                </option>
                                                <option value="option2">
                                                    <?php echo $lang_option2; ?>
                                                </option>
                                                <option value="option3">
                                                    <?php echo $lang_option3; ?>
                                                </option>
                                                <option value="option4">
                                                    <?php echo $lang_option4; ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 


                                <br>
                                <br>
                                <input type="hidden" name="article_id" value="<?php echo $this->uri->segment('4') ?>"/>
                                <input type="hidden" name="quiz_id" value="" ">
                                <button type="button"  class="quiz_add_button btn smile-primary btn"><?php echo $lang_submit; ?></button>
                                <a href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>" style="float:right" type="reset" class="btn btn btn-warning"><?php echo $lang_cancel; ?></a>

                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    </div> 
<?php endif;
?>
<?php if ($mode == 'quiz_edit'): ?>
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Enter below quiz details</h1>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-success fade in block-inner">            
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger fade in block-inner">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error') ?> </div>
        <?php } ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quiz details
                    <a style="margin-top: -6px;float: right;" href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>"> <button type="button" class="btn btn-info">Back</button></a>
                </div>
                <?php //echo form_open_multipart(site_url() . '/admin/Dashboard_articles/add_edit_article', 'id="cat_form" class=".validate"');  ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9 validate" >
                            <form role="form" id="add_edit_form" method="post" action="<?php echo site_url() ?>admin/Dashboard_quiz/add_edit">
                                <div class=" form-group">
                                    <label>Question:</label>
                                    <textarea class="form-control required" rows="3" name="question"  id="question" maxlength="200"><?php ucfirst($quiz_row->question); ?></textarea>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>option 1:</label>
                                            <input type="text" id="option1" name="option1" class="form-control required" value="<?php ucfirst($quiz_row->option1); ?>">
                                        </div>

                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>option 2:</label>
                                            <input type="text" id="option2" name="option2" class="form-control required" value="<?php ucfirst($quiz_row->option2); ?>">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>option 3:</label>
                                            <input type="text" id="option3" name="option3" class="form-control required" value="<?php ucfirst($quiz_row->question3); ?>">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>option 4:</label>
                                            <input type="text" id="option4" name="option4" class="form-control required" value="<?php ucfirst($quiz_row->question4); ?>">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Answer:</label>
                                            <select class="form-control" id="answer_key" name="answer_key">
                                                <option value="option1">
                                                    option 1
                                                </option>
                                                <option value="option2">
                                                    option 2
                                                </option>
                                                <option value="option3">
                                                    option 3
                                                </option>
                                                <option value="option4">
                                                    option 4
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 


                                <br>
                                <br>
                                <input type="hidden" name="quiz_id" value="<?php ucfirst($quiz_row->id); ?>"/>
                                <button type="button" id="b1" class="add_edit_button btn smile-primary btn">Submit</button>
                                <button style="float:right" type="reset" class="btn btn btn-warning">Cancel</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php
endif;
if ($mode == 'edit'):
    ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $lang_edit ?> <?php echo $lang_menu_article; ?> :</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $lang_articlesdetails; ?>
                    <a style="margin-top: -6px;float: right;" href="<?php echo site_url("admin/Dashboard_articles/index/" . $this->ion_auth->user()->row()->id) ?>/#<?php echo $this->uri->segment(5) ?>"> <button type="button" class="btn btn-info">Back</button></a>
                </div>
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-success fade in block-inner">            
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message') ?> 
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger fade in block-inner">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error') ?> 
                    </div>
                <?php } ?>
                <?php //echo form_open_multipart(site_url() . '/admin/Dashboard_articles/edit_article', 'id="cat_form" class=".validate"');  ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9 validate" >
                            <?php echo form_open_multipart(site_url("admin/Dashboard_articles/edit_article/" . $this->uri->segment(5)), 'id="article_edit_form" class=".validate"'); ?>
    <!--                                    <form role="form"  id="artcle_edit_form" method="post" action="<?php //echo site_url("admin/Dashboard_articles/edit_article/" . $this->uri->segment(5))                                           ?>" enctype="multipart/form-data">-->
                            <div class="form-group" style="display:none">
                                <label><?php echo $lang_slectedlang; ?></label>
                                <select  name="language" data-placeholder="Choose a Subcategory..." class="form-control change_language select-full  required" tabindex="2">
                                    <option value="en"<?php if ($article->language_key == 'en') echo ' selected="selected"'; ?>><?php echo $lang_english; ?></option>
                                    <option value="zh"<?php if ($article->language_key == 'zh') echo ' selected="selected"'; ?>><?php echo $lang_chinese; ?></option>
                                    <option value="my"<?php if ($article->language_key == 'my') echo ' selected="selected"'; ?>><?php echo $lang_burmese; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><?php echo $lang_articletitle; ?></label>
                                <input class="form-control required" name="title" value="<?php echo $article->title ?>">
                                <p class="help-block">Article title here.</p>
                            </div>
                            

                            <!--                            <div class="form-group">
                                                            <label>Category</label>
                                                            <a  href="#" class="edit_cat">Click here to edit the category </a>|&nbsp;<a  href="#" class="edit_cat">Hide the category </a>
                                                        </div>
                            
                                                        <div id="cat_row">
                                                            <div class="form-group">
                                                                <label>Selects Main Category</label>
                            <?php                                print_r($main_category);
                            $main_category [''] = 'Choose category';
                            $options = 'data-placeholder="Choose a category..." class="form-control category_id select-full required" tabindex="2"';
                            echo form_dropdown('sp_id', $main_category, @$main_category->id, $options);
                            ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Select Sub Category</label>
                                                                <select id="subcategory_id" name="cat_id" data-placeholder="Choose a Subcategory..." class="form-control select-full get_sub_sub_cat required" tabindex="2">
                                                                    <option value="">Choose a sub category</option>
                                                                </select>
                            
                                                            </div>
                                                            <div class="sub_subcategory">
                                                            </div>
                                                            <div class="sub_sub_subcategory">
                                                            </div>
                                                        </div>-->
                            <?php
                            $cat_del = $this->Category_model->get($article->cat_id);

                            if ($cat_del->deleted == '0'):
                                ?>
                                <div class="form-group">
                                    <label><?php echo $lang_selectmain_category; ?></label>
                                    <?php
                                    $main_category [''] = $lang_choosecategory;
                                    $options = 'data-placeholder="' . $lang_choosecategory . '..." class="form-control category_id select-full required" tabindex="2"';
                                    echo form_dropdown('sp_id', $main_category, @$m_category, $options);
                                    ?>
                                </div>

                                <?php if (!empty($sub_category1)): ?>
                                    <div class="form-group">
                                        <label><?php echo $lang_selectsub_category; ?></label>
            <!--                                            <select id="subcategory_id" name="cat_id" data-placeholder="Choose a Subcategory..." class="form-control select-full get_sub_sub_cat required" tabindex="2">
                                            <option value="">Choose a sub category</option>
                                        </select>-->
                                        <?php
                                        $main_category [''] = $lang_choosesubcategory;
                                        $options = 'id="subcategory_id" data-placeholder="' . $lang_choosesubcategory . '..." class="form-control get_sub_sub_cat select-full required" tabindex="2"';
                                        echo form_dropdown('cat_id', $sub_category1, @$cat2, $options);
                                        ?>
                                    </div>
                                <?php endif;
                                ?>


                                <div class="sub_subcategory">
                                    <?php if (!empty($sub_category2)): ?>
                                        <div class="form-group">
                                            <label><?php echo $lang_selectmsub_subcategory; ?></label>
                                            <?php
                                            $main_category [''] = $lang_choosesub_subcategory;
                                            $options = 'data-placeholder="' . $lang_choosesub_subcategory . '..." class="form-control get_sub_sub_sub_cat select-full required" tabindex="2"';
                                            echo form_dropdown('cat_id1', $sub_category2, @$cat2, $options);
                                            ?>
                                        </div>
                                    <?php endif;
                                    ?>
                                </div>
                                <div class="sub_sub_subcategory">
                                    <?php if (!empty($sub_category3)): ?>
                                        <div class="form-group">
                                            <label><?php echo $lang_selectsub_subsubcategory; ?></label>
                                            <?php
                                            $main_category [''] = $lang_choosesub_subsubcategory;
                                            $options = 'data-placeholder="' . $lang_choosesub_subsubcategory . '..." class="form-control select-full required" tabindex="2"';
                                            echo form_dropdown('cat_id2', $sub_category3, @$cat3, $options);
                                            ?>
                                        </div>
                                    <?php endif;
                                    ?>
                                </div>

                            <?php else:
                                ?>
                                <div class="alert alert-info">
                                    <?php echo $lang_categordoesnotexitmessageedit; ?>.
                                </div>
                                <div class="form-group">
                                    <label><?php echo $lang_selectmain_category; ?></label>
                                    <?php
                                    $main_category [''] = $lang_choosecategory;
                                    $options = 'data-placeholder="' . $lang_choosecategory . '..." class="form-control category_id select-full required" tabindex="2"';
                                    echo form_dropdown('sp_id', $main_category, @$main_category->id, $options);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label><?php echo $lang_selectsub_category; ?></label>
                                    <select id="subcategory_id" name="cat_id" data-placeholder="<?php echo $lang_choosesubcategory; ?>..." class="form-control select-full get_sub_sub_cat required" tabindex="2">
                                        <option value=""><?php echo $lang_choosesubcategory; ?></option>
                                    </select>

                                </div>
                                <div class="sub_subcategory">
                                </div>
                                <div class="sub_sub_subcategory">
                                </div>
                            <?php endif;
                            ?> <div class="form-group">
                                                                                                <label><?php echo 'Trainee'; ?>:</label>

                                                                                                <select style="height:40px !important;" id="author_edit" name="author" class="form-control author_edit required valid">
                                                                                                    <option value=""><?php echo 'Please select Trainer'; ?></option>
                                                                                                    <?php foreach($authors as $author) {?>
                                                                                                    <option value="<?php echo $author->id;?>" <?php if(!empty($article->author_id) && $article->author_id==$author->id) echo 'selected';?>><?php if(!empty($author->username)) echo $author->username; ?></option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                            <?php 
                            if (!empty($imagefiles_type)):
                                if ($imagefiles_type->type == '2'):
                                    ?>
                                    <div class="form-group">
                                        <label><?php echo $lang_imageto_upload; ?>:</label>
                                        <span class="help-block old_image4"></span>
                                        <span class="help-block"><?php echo $lang_accepted_fromat; ?>: jpeg, jpg, png, gif.(400X200)</span>
                                        <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form">Upload</a><span id="img_name" style="font-weight: bold;margin-left: 5px;"></span>
                                        <?php $this->load->view('admin/article_img1_crop_modal'); ?>
                                        <input id="imageupload" type="hidden" class="required" name="image_files" >
                                        <br>
                                        <label><?php echo $lang_caption_image; ?>:</label>
                                        <input class="form-control" name="caption_image1" maxlength="20" value="<?php echo ($image_files[0]) ? $image_files[0]->caption : '' ?>"><br>
                                        <?php if (!empty($image_files[0])): ?>
                                            <label><?php echo $lang_previousimage ?></label>
                                            <div class="form-group"><image src="<?php echo base_url("assets/uploads/articles_image/" . $image_files[0]->raw_name . $image_files[0]->file_ext) ?>" height="80px" width="100px"/></div>
                                            <input type="hidden" name="image1_id" value="<?php echo $image_files[0]->id; ?>">

                                        <?php endif; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                        <!--                                                <input id="imageupload1" type="file" class="imageupload f2 styled form-control required" id="files4" name="image_files1" >-->
                                        <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form1">Upload</a><span id="img_name1" style="font-weight: bold;margin-left: 5px;"><b></span>
                                        <?php $this->load->view('admin/article_img1_crop_modal1'); ?>
                                        <input id="imageupload1" type="hidden" name="image_files1" ><br>
                                        <label><?php echo $lang_caption_image; ?>:</label>

                                        <?php if (!empty($image_files[1])): ?>
                                            <label><?php echo $lang_caption_image; ?>:</label>
                                            <input class="form-control" name="caption_image2" maxlength="20" value="<?php echo ($image_files[1]) ? $image_files[1]->caption : '' ?>"><br>

                                            <label><?php echo $lang_previousimage ?></label>
                                            <div class="form-group"><image src="<?php echo base_url("assets/uploads/articles_image/" . $image_files[1]->raw_name . $image_files[1]->file_ext) ?>" height="80px" width="100px"/></div>
                                            <input type="hidden" name="image2_id" value="<?php echo $image_files[1]->id; ?>">
                                        <?php else: ?>
                                            <input class="form-control" name="caption_image2" maxlength="20" value=""><br>

                                        <?php endif;
                                        ?>
                                                                                                                                                                                                                                                                                                                                    <!--                                                <input id="imageupload2" type="file" class="imageupload f2 styled form-control required" id="files4" name="image_files2" >-->
                                        <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form2">Upload</a><span id="img_name2" style="font-weight: bold;margin-left: 5px;"><b><b></span>
                                                    <?php $this->load->view('admin/article_img1_crop_modal2'); ?>
                                                    <input id="imageupload2" type="hidden" name="image_files2" ><br>

                                                    <?php if (!empty($image_files[2])): ?>
                                                        <label> <?php echo $lang_caption_image; ?>:</label>
                                                        <input class="form-control" name="caption_image3" maxlength="20" value="<?php echo ($image_files[2]->caption) ? $image_files[2]->caption : '' ?>">

                                                        <label><?php echo $lang_previousimage ?></label>
                                                        <div class="form-group"><image src="<?php echo base_url("assets/uploads/articles_image/" . $image_files[2]->raw_name . $image_files[2]->file_ext) ?>" height="80px" width="100px"/></div>
                                                        <input type="hidden" name="image3_id" value="<?php echo $image_files[2]->id; ?>">
                                                    <?php else: ?>
                                                        <label> <?php echo $lang_caption_image; ?>:</label>
                                                        <input class="form-control" name="caption_image3" maxlength="20" value="">
                                                    <?php endif; ?>
                                                    <!--                                                            <div class="row">
                                                                                                                    <div id="preview-image"></div>
                                                                                                                    <div id="preview-image1"></div>
                                                                                                                    <div id="preview-image2"></div>
                                                                                                                </div>-->
                                                    </div> 
                                                    <?php
                                                endif;
                                                if ($imagefiles_type->type == '3'):
                                                    ?>

                                                    <div class="form-group">

                                                        <label><?php echo $lang_video; ?>:</label></br>
                                                        <?php if (!empty($image_files)): ?>
                                                            <video width="100" hieght="100" controls width="500px" src="<?php echo base_url("assets/uploads/articles_videos/" . $image_files[0]->raw_name . $image_files[0]->file_ext); ?>" ></video>  
                                                            <input type="hidden" name="image1_id" value="<?php echo $image_files[0]->id; ?>">

                                                        <?php endif; ?>
                                                        <input type="file" class="fl styled form-control" id="fl" name="file_name">
                                                        <span class="help-block"><?php echo $lang_accepted_fromat; ?>: mov,mp4.  </span>

                                                        <span class="help-block old_image4"></span>
                                                        <input type="hidden" name="adv_id" id="id" value="">

                                                        <video width="100" hieght="100" controls width="500px" id="vid" ></video>  
                                                    </div>
                                                <?php endif;
                                                ?>
                                                </br>
                                                <input type="hidden" name="type" id="img_type" value="<?php echo $imagefiles_type->type ?>"/>
                                            <?php endif; ?>
                                                <?php if ($imagefiles_type->type == '5'): ?>
                                                    <div class="form-group">
                                                        <label><?php echo "PDF file"; ?>:</label></br>
							<a href="<?php echo base_url('assets/uploads/files/' . $image_files[0]->raw_name . $image_files[0]->file_ext) ?>" target="_blank">Download PDF<i class="fa fa-download" aria-hidden="true"></i></a>
                                                        <br/> <br/> <?php if (!empty($image_files)): ?>
                                                          <input type="hidden" name="pdf" value="<?php echo $image_files[0]->id; ?>">
                                                        <?php endif; ?>  
                                                        <input type="file" class="pd styled form-control" id="pdf"  name="pdf"  >
                                                      <p class="error" id="pdf_error_edit"></p>
                                                      <span class="help-block"><?php echo $lang_accepted_fromat; ?>: pdf.  </span>
                                                    </div>
                                                <input type="hidden" name="type" id="img_type" value="<?php echo $imagefiles_type->type ?>"/>
                                            <?php endif; ?>
                                               <?php if ($imagefiles_type->type == '6'): ?>
                                                    <div class="form-group">
                                                        <label><?php echo "PPT file"; ?>:</label></br>
							<a href="<?php echo base_url('assets/uploads/files/' . $image_files[0]->raw_name . $image_files[0]->file_ext) ?>" target="_blank">Download PPT<i class="fa fa-download" aria-hidden="true"></i></a>
                                                        <br/> <br/> <?php if (!empty($image_files)): ?>
                                                          <input type="hidden" name="ppt" value="<?php echo $image_files[0]->id; ?>">
                                                        <?php endif; ?>  
                                                        <input type="file" class="pd styled form-control" id="ppt"  name="ppt">
                                                        <p class="error" id="ppt_error_edit"></p>
                                                        <span class="help-block"><?php echo $lang_accepted_fromat; ?>: ppt,pptx.  </span>
                                                    </div>
                                                <input type="hidden" name="type" id="img_type" value="<?php echo $imagefiles_type->type ?>"/>
                                            <?php endif; ?>  
                                            <?php if ($article->url_link): ?>
                                                <div class="form-group">
                                                    <label>Youtube <?php echo $lang_link; ?>:</label>
                                                    <input class="form-control link" name="link" maxlength="100" value="<?php echo $article->url_link ?>">
                                                    <label style="display:none" class="error" id="link" ><?php echo $lang_valid_youtubeurl; ?></label>
                                                </div> 
                                            <?php endif; ?>
                                            <?php if (!empty($article_tag)): ?>   
                                                <div class="form-group">
                                                    <label><?php echo $lang_entertagname; ?></label>
                                                    <span class="help-block"><?php echo $lang_maximum_5tag; ?> </span> 
                                                    <?php foreach ($article_tag as $article_tag_row) { ?>
                                                        <label><?php echo $lang_tagname; ?></label>
                                                        <input type="text"  class="form-control" name="edit_tags[]" maxlength="20" value="<?php echo ucfirst($article_tag_row->tag_name); ?>"/> <br>
                                                        <input type="hidden" name="tag_id[]" value="<?php echo ucfirst($article_tag_row->id); ?>"
                                                        <?php
                                                    }
                                                    @$remaintag_count = 5 - count($article_tag);
                                                    if (!empty($remaintag_count)):
                                                        for ($i = 1; $i <= $remaintag_count; $i++) {
                                                            ?>
                                                                   <label><?php echo $lang_tagname; ?></label>
                                                            <input type="text"  class="form-control" name="tags[]" maxlength="20" value=""/> <br>
                                                            <?php
                                                        }
                                                    endif;
                                                    ?>

                                                </div>
                                            <?php else:
                                                ?>
                                                <div class="form-group">
                                                    <label><?php echo $lang_entertagname; ?></label>
                                                    <span class="help-block"><?php echo $lang_maximum_5tag; ?> </span>             
                                                    <select multiple="" data-role="tagsinput" class="check_tag" name="tags[]" style="display: none;">
                                                    </select>

                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                <label><?php echo $lang_description; ?></label>
                                                <textarea  class="ckeditor form-control "  id="decription" name="description"  ><?php echo $article->description; ?></textarea>
                                                <p id="sho_val_err" class="error" style="font-weight: bold;"></p>
                                            </div>
                                            <div class="form-group">
                                                <label><?php echo $lang_shortdescription; ?></label>

                                                <textarea class="form-control required" rows="3" name="short_description" maxlength="200"><?php echo $article->short_description; ?></textarea>
                                            </div>
                                            <br>
                                            <br>
                                            <?php if (!empty($quiz_row)): ?>

<!--                                                <h4><strong><u><?php echo $lang_microlearning; ?>:</u> </strong></h4><br>
                                                <div class=" form-group">


                                                    <label><?php echo $lang_question; ?>:</label>
                                                    <textarea class="form-control" rows="3" name="question"  id="question" maxlength="200"><?php echo ucfirst($quiz_row->question); ?></textarea>
                                                    <p class="error" id="question_error_edit"></p>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option1; ?> :</label>
                                                            <input type="text" id="option1" name="option1" class="form-control" value="<?php echo ucfirst($quiz_row->option1); ?>">
                                                            <p class="error" id="option1_error_edit"></p>
                                                        </div>

                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option2; ?> :</label>
                                                            <input type="text" id="option2" name="option2" class="form-control" value="<?php echo ucfirst($quiz_row->option2); ?>">
                                                            <p class="error" id="option2_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option3; ?>:</label>
                                                            <input type="text" id="option3" name="option3" class="form-control" value="<?php echo ucfirst($quiz_row->option3); ?>">
                                                            <p class="error" id="option3_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option4; ?>:</label>
                                                            <input type="text" id="option4" name="option4" class="form-control" value="<?php echo ucfirst($quiz_row->option4); ?>">
                                                            <p class="error" id="option4_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label><?php echo $lang_answer; ?>:</label>
                                                            <select class="form-control" id="answer_key" name="answer_key">
                                                                <option value="">Please select answer</option>
                                                                <option <?php echo ($quiz_row->answer_key == 'option1') ? ' selected="selected"' : ''; ?> value="option1">
                                                                    <?php echo $lang_option1; ?>
                                                                </option>
                                                                <option <?php echo ($quiz_row->answer_key == 'option2') ? ' selected="selected"' : ''; ?> value="option2">
                                                                    <?php echo $lang_option2; ?>
                                                                </option>
                                                                <option <?php echo ($quiz_row->answer_key == 'option3') ? ' selected="selected"' : ''; ?> value="option3">
                                                                    <?php echo $lang_option3; ?>
                                                                </option>
                                                                <option <?php echo ($quiz_row->answer_key == 'option4') ? ' selected="selected"' : ''; ?> value="option4">
                                                                    <?php echo $lang_option4; ?>
                                                                </option>
                                                            </select>
                                                            <p class="error" id="answer_key_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!--<input type="hidden" name="quiz_id" value="<?php echo $quiz_row->id ?>"/>-->
                                            <?php else: ?>
                                                <!--<h4><strong><u><?php echo $lang_microlearning; ?>:</u> </strong></h4><br>-->
<!--                                                <div class=" form-group">


                                                    <label><?php echo $lang_question; ?>:</label>
                                                    <textarea class="form-control" rows="3" name="question"  id="question" maxlength="200"></textarea>
                                                    <p class="error" id="question_error_edit"></p>
                                                </div>-->
<!--                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option1; ?> :</label>
                                                            <input type="text" id="option1" name="option1" class="form-control" value="">
                                                            <p class="error" id="option1_error_edit"></p>
                                                        </div>

                                                    </div>
                                                </div> -->
<!--                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option2; ?> :</label>
                                                            <input type="text" id="option2" name="option2" class="form-control" value="">
                                                            <p class="error" id="option2_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> -->
<!--                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option3; ?>:</label>
                                                            <input type="text" id="option3" name="option3" class="form-control" value="">
                                                            <p class="error" id="option3_error_edit"></p>
                                                        </div>

                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $lang_option4; ?>:</label>
                                                            <input type="text" id="option4" name="option4" class="form-control" value="">
                                                            <p class="error" id="option4_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> -->
<!--                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Answer:</label>
                                                            <select class="form-control" id="answer_key" name="answer_key">
                                                                <option value="">Please select answer</option>
                                                                <option  value="option1">
                                                                    <?php echo $lang_option1; ?>
                                                                </option>
                                                                <option  value="option2">
                                                                    <?php echo $lang_option2; ?>
                                                                </option>
                                                                <option  value="option3">
                                                                    <?php echo $lang_option3; ?>
                                                                </option>
                                                                <option  value="option4">
                                                                    <?php echo $lang_option4; ?>
                                                                </option>
                                                            </select>
                                                            <p class="error" id="answer_key_error_edit"></p>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <input type="hidden" name="quiz_id" value=""/>-->
                                            <?php endif; ?>
                                            <br>
                                            <br>
                                            <input type="hidden" name="id" value="<?php echo $article->id ?>"/>
                                            <input type="hidden" name="curl" value="<?php echo uri_string(); ?>">
                                            <button type="button" class="article_edit_button btn smile-primary btn"><?php echo $lang_submit; ?></button>
                                            <a href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>" class="btn btn btn-warning"><?php echo $lang_cancel; ?></a>
                                            <!--                                    </form>-->
                                            <?php echo form_close(); ?>
                                            </div>
                                            </div>
                                            <!-- /.row (nested) -->
                                            </div>
                                            <!-- /.panel-body -->
                                            </div>
                                            <!-- /.panel -->
                                            </div>
                                            <!-- /.col-lg-12 -->
                                            </div>
                                            <!-- /.row -->
                                        <?php endif; ?>
                                         <?php if ($mode == 'view'): ?>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h1 class="page-header"><?php echo $lang_articlesdetails; ?>: </h1>
                                                </div>
                                                <!-- /.col-lg-12 -->
                                            </div>
                                            <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                                <div class="panel-heading" style="margin:0px 15px 0px 15px;">
                                                    <?php echo $lang_articlesdetails; ?>
                                                    <a style="margin-top: -6px;float: right;" href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>"> <button type="button" class="btn btn-info"><?php echo $lang_back;?></button></a>
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="dataTable_wrapper">
                                                        <table width="80%" cellspacing="2" cellpadding="10" class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example">
                                                            <?php
                                                            if (isset($view_article) && count($view_article)):

                                                                foreach ($view_article as $row) {
                                                                    ?>
<!--                                                                    <tr>
                                                                        <th><?php echo $lang_slectedlang; ?></th>
                                                                        <td colspan="5"><?php if($row->language_key=='en')echo "English";if($row->language_key=='zh')echo "Chinese";if($row->language_key=='my')echo "Burmese"; ?></td>
                                                                    </tr>-->
                                                                    <tr>
                                                                        <th><?php echo $lang_articletitle; ?></th>
                                                                        <td colspan="5"><?php echo $row->title; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    $cat_del = $this->Category_model->get($row->cat_id);

                                                                    if ($cat_del->deleted == '0'):
                                                                        ?>
                                                                        <tr>
                                                                            <th><?php echo $lang_rootcategoryname;?></th>
                                                                            <td colspan="5"><?php echo $cat ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><?php echo $lang_subcategiryname;?> </th>
                                                                            <td colspan="5"><?php if($language=='en')echo $row->category_name;
                                                                            if($language=='zh')echo $row->category_ch_lang_name;
                                                                            if($language=='my')echo $row->category_bm_lang_name; ?></td>
                                                                        </tr>
                                                                    <?php else: ?>
                                                                        <tr>
                                                                            <th><?php echo $lang_subcategiryname;?>  </th>
                                                                            <td colspan="5">N/A</td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    <tr>
                                                                        <th><?php echo $lang_username; ?></th>
                                                                        <td colspan="5"><?php echo $row->username ?></td>
                                                                    </tr>

<!--                                                                    <tr>
                                                                        <th><?php echo $lang_tagname;?></th>
                                                                        <?php if (!empty($article_tag)): ?>
                                                                            <?php foreach ($article_tag as $article_tag_row) { ?>
                                                                                <td><?php echo ucfirst($article_tag_row->tag_name); ?></td>

                                                                            <?php } ?>
                                                                        <?php else: ?>
                                                                            <td><?php echo $lang_tagnotfound;?></td>
                                                                        <?php endif; ?>        
                                                                    </tr>-->

                                                                    <tr>
                                                                        <?php if (!empty($row->url_link)): ?>
                                                                            <th>Youtube <?php echo $lang_link;?></th>
                                                                            <td colspan="5">
                                                                                <div class="col-sm-4">
                                                                                    <?php
                                                                                    $url = $row->url_link;

                                                                                    $pattern = '%^# Match any youtube URL
    (?:https?://)?  # Optional scheme. Either http or https
    (?:www\.)?      # Optional www subdomain
    (?:             # Group host alternatives
      youtu\.be/    # Either youtu.be,
    | youtube\.com  # or youtube.com
      (?:           # Group path alternatives
        /embed/     # Either /embed/
      | /v/         # or /v/
      | .*v=        # or /watch\?v=
      )             # End path alternatives.
    )               # End host alternatives.
    ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
    ($|&).*         # if additional parameters are also in query string after video id.
    $%x'
                                                                                    ;
                                                                                    $result = preg_match($pattern, $url, $matches);
                                                                                    if (false !== $result) {
                                                                                        @$text = $matches[1];
                                                                                    }
                                                                                    ?>
                                                                                    <iframe width="420" height="315"
                                                                                            src="http://www.youtube.com/embed/<?php echo $text ?>">
                                                                                    </iframe>
                                                                                </div>
                                                                            </td>
                                                                            <?php
                                                                        else:
                                                                            ?>
                                                                            <th><?php echo 'File/Image/Video/Youtube Link'  ;?>	</th>
                                                                            <td colspan="5">
                                                                                <div class="col-md-12">
                                                                                    <?php if (!empty($image_files)): ?>
                                                                                        <?php foreach ($image_files as $image_files_row) { ?>
                                                                                            <?php if ($image_files_row->type == '2'): ?>
                                                                                                <div class="col-md-4">
                                                                                                    <image class="img-rounded" src="<?php echo base_url() ?>assets/uploads/articles_image/<?php echo $image_files_row->raw_name . $image_files_row->file_ext ?>"  width="100%">
                                                                                                    <?php if (!empty($image_files_row->caption)): ?>
                                                                                                        <figcaption style="border:2px solid black;background-color:#d2d2d2;border-radius:8px !important;padding:2px;margin-top:2px;"><?php echo ucfirst($image_files_row->caption); ?></figcaption>
                                                                                                    <?php else: ?>
                                                                                                        <figcaption style="border:2px solid black;background-color:#d2d2d2;border-radius:8px !important;padding:2px;margin-top:2px;">No Caption</figcaption>
                                                                                                    <?php endif; ?>
                                                                                                </div>
                                                                                            <?php endif; ?>
                                                                                            <?php if ($image_files_row->type == '3'): ?>
                            <!--                                                                                                <script type="text/javascript" src="<?php echo base_url('assets/js/player.js') ?>"></script> <script class="splayer"> var params = {"playlist": [{"video": [{"url": "<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>"}], "duration": 0, "posterUrl": "<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . "_thumb.jpg") ?>"}], "uiLanguage": "en", "width": "400", "height": "250"};
                                                                                                    player.embed(params);</script>-->
                                                                                                <!--<video id="example_video_1" class="video-js vjs-default-skin"
                                                                                                  controls preload="auto" width="auto" height="250"
                                                                                                  poster="<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . "_thumb.jpg") ?>"
                                                                                                  data-setup='{"example_option":true}'>
                                                                                                 <source src="<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>" type='video/mp4' />
                                                                                                 
                                                                                                </video>-->
                                                                                                <!--                                                                                                <video width="100%" height="20%" controls="" id="vid" src="<?php echo base_url() ?>assets/uploads/articles_videos/<?php echo $image_files_row->raw_name . $image_files_row->file_ext ?>"></video>                                                    -->
                                                                                                <video id="example_video_1" class="video-js vjs-default-skin"
                                                                                                       controls preload="auto" height="300px" width="auto"
                                                                                                       poster="<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . "_thumb.jpg") ?>"
                                                                                                       src="<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>" type='video/mp4' data-setup='{"example_option":true}'>
                                                                                                      <!--<source src="<?php echo base_url('assets/uploads/articles_videos/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>" type='video/mp4' />-->

                                                                                                </video>

                                                                                            <?php endif; ?>
                                            <?php if ($image_files_row->type == '6'): ?>
																							
																								<a href="<?php echo base_url('assets/uploads/files/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>" target="_blank">View Power point file<i class="fa fa-download" aria-hidden="true"></i></a>
																							<?php endif; ?>
																							<?php if ($image_files_row->type == '5'): ?>
																							
																								<a href="<?php echo base_url('assets/uploads/files/' . $image_files_row->raw_name . $image_files_row->file_ext) ?>" target="_blank">Download PPT<i class="fa fa-download" aria-hidden="true"></i></a>
																							<?php endif; ?>
                                                                                        <?php } ?>
                                                                                    <?php endif;
                                                                                    ?>
                                                                                </div>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>

                                                                    <tr>
                                                                        <th><?php echo $lang_description;?></th>
                                                                        <td colspan="5"><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $row->description ?></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th><?php echo $lang_shortdescription;?></th>
                                                                        <td colspan="5"><?php echo $row->short_description ?></td>
                                                                    </tr>
                                                                    <?php
                                                                    if (!empty($article_microlearning)):
                                                                        ?>
                                                                        <tr><td><h2><?php echo 'Quiz section';?></h2><td></tr>
                                                                        <tr> <form method="post" id="quiz_add_edit_form" class="validate" method="post" action="<?php echo site_url() ?>admin/Dashboard_quiz/add_edit">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="user_data">
						<tr>
							<th>Question</th>
							<th>option1</th>
                                                        <th>option2</th>
                                                        <th>option3</th>
                                                        <th>option4</th>
                                                        <th>Answer</th>
							
						</tr>
                                               <?php //print_r($article_microlearning); 
                                                                        foreach ($article_microlearning as $micro_arti){?>
                                                    <tr> 
                                                <td><?php echo $micro_arti->question; ?></td>
<td><?php echo $micro_arti->option1; ?></td><td><?php echo $micro_arti->option2; ?></td>
<td><?php echo $micro_arti->option3; ?></td><td><?php echo $micro_arti->option4; ?></td>
<td><?php echo $micro_arti->answer_key; ?></td>
                                                </tr>
                                                                        <?php }?>  
					</table>
				</div>
				<div align="center">
					<!--<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />-->
				      <!--<button type="button"  class="quiz_add_button btn smile-primary btn"><?php echo $lang_submit; ?></button>-->
                                </div>
                                                                        </tr>
			</form>
<!--                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_question;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->question; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_option1;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->option1; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_option2;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->option2; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_option3;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->option3; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_option4;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->option4; ?></div></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;"><?php echo $lang_answer;?></td>
                                                                            <td><div style="width:800px; max-height:200px; overflow-Y:auto"><?php echo $article_microlearning->answer_key; ?></div></td>
                                                                        </tr>-->
                                                                        <?php
                                                                    endif;
                                                                    if (!empty($sub_articles)):
                                                                        $i = 1;
                                                                        ?>
                                                                        <tr><td colspan="3"><h2>Sub Articles:</h2></td></tr>
                                                                        <tr>
                                                                            <td style="width:30%;font-weight: bold;">Title</td>
                                                                            <td style="width:30%;font-weight: bold;" colspan="2">Description</td>
                                                                        </tr>
                                                                        <?php foreach ($sub_articles as $sub_articles_row) { ?>
                                                                            <tr>
                                                                                <td style="width:30%;font-weight: bold;"><?php echo $i . "." . $sub_articles_row->title; ?></td>
                                                                                <td><div style="width:500px; max-height:200px; overflow-Y:auto"><?php echo $sub_articles_row->description; ?></div></td>
                                                                                <td><a  href="#" data="<?php echo $sub_articles_row->id ?>" class="status_delete_subarticle"><i    class="fa fa-remove" title="Delete"></i></a></td>

                                                                            </tr>
                                                                            <?php
                                                                            $i++;
                                                                        }
                                                                    endif;
                                                                }
                                                            endif;
                                                            ?>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($mode == 'all'): ?>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h1 class="page-header"><?php echo $lang_articlesdetails;?> </h1>
                                                </div>
                                                <!-- /.col-lg-12 -->
                                            </div>
                                            <?php if ($this->session->flashdata('message')) { ?>
                                                <div class="alert alert-success fade in block-inner">            
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('message') ?> 
                                                </div>
                                            <?php } ?>
                                            <?php if ($this->session->flashdata('error')) { ?>
                                                <div class="alert alert-danger fade in block-inner">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <i class="icon-checkmark-circle"></i> <?php echo $this->session->flashdata('error') ?> 
                                                </div>
                                            <?php } ?>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php $tab = (isset($_GET['tab'])) ? $_GET['tab'] : null; ?> 
                                                    <?php if (!empty($_GET['tab'])): ?>
                                                        <ul class="nav nav-tabs">
                                                            <li class="<?php echo ($tab == 'tab1') ? 'active' : ''; ?>"><a data-toggle="tab" href="#tab1"> <?php echo $lang_pendingarticles; ?></a>
                                                            </li>
                                                            <li class="<?php echo ($tab == 'tab2') ? 'active' : ''; ?>"><a data-toggle="tab" href="#tab2" ><?php echo $lang_approvedarticles; ?></a>
                                                            </li>
                                                            <li class="<?php echo ($tab == 'tab3') ? 'active' : ''; ?>"><a data-toggle="tab" href="#tab3" ><?php echo $lang_createarticle; ?></a>
                                                            </li>
                                                        </ul>
                                                    <?php else: ?>
                                                        <ul class="nav nav-tabs">

                                                            <li class="active"><a data-toggle="tab" href="#tab1"> <?php echo $lang_pendingarticles; ?></a>
                                                            </li>
                                                            <li class=""><a data-toggle="tab" href="#tab2" ><?php echo $lang_approvedarticles; ?></a>
                                                            </li>
                                                            <li class=""><a data-toggle="tab" href="#tab3" ><?php echo $lang_createarticle; ?></a>
                                                            </li>
                                                        </ul>
                                                    <?php endif; ?>

                                                    <div class="panel panel-default">
                                                        <div id="tab-content" class="tab-content">
                                                            <div id="tab1" class="tab-pane fade in active">
                                                                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                                                    <div class="panel-heading">
                                                                        <?php echo $lang_articlesdetails; ?>
                                                                    </div>
                                                                    <!-- /.panel-heading -->

                                                                    <div class="panel-body">
                                                                        <div class="dataTable_wrapper">
                                                                            <table width="100%" class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th><?php echo $lang_articletitle;?></th>
                                                                                        <th><?php echo $lang_subcategiryname;?></th>
                                                                                        <th><?php echo $lang_username;?></th>
                                                                                        <th><?php echo $lang_shortdescription;?></th>
                                                                                        <th><?php echo $lang_status;?></th>
                                                                                        <th><?php echo $lang_createdon;?></th>
                                                                                        <th><?php echo $lang_action;?></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    if (isset($notapprove_articles) && count($notapprove_articles)):
                                                                                        foreach ($notapprove_articles as $row) {
                                                                                            ?>
                                                                                            <tr class="odd gradeX">
                                                                                                <td><?php echo ucfirst($row->title) ?></td>
                                                                                                <?php
                                                                                                $cat_del = $this->Category_model->get($row->cat_id);

                                                                                                if ($cat_del->deleted == '0'):
                                                                                                    ?>
                                                                                                    <td><?php echo $row->category_name ?></td>
                                                                                                <?php else:
                                                                                                    ?>
                                                                                                    <td>N/A</td>

                                                                                                <?php endif; ?>
                                                                                                <td><?php echo ucfirst($row->username) ?></td>
                                                                                                <td><?php echo ucfirst($row->short_description) ?></td>
                                                                                                <td>
            <!--                                                                                                            <select class="form-control status_check_active" data="<?php echo $row->id; ?>">
                                                                                                        <option value="1" <?php echo ($row->active == '1') ? "selected=selected" : ""; ?>>Active</option>
                                                                                                        <option value="0" <?php echo ($row->active == '0') ? "selected=selected" : ""; ?>>Inactive</option>
                                                                                                    </select></td>-->
                                                                                                    <?php
                                                                                                    $cat_del = $this->Category_model->get($row->cat_id);
                                                                                                    if ($row->active == '0'):
                                                                                                        if ($cat_del->deleted == '0'):
                                                                                                            ?>

<input type="hidden" value="<?php echo $row->id;?>" name="active_id_status" id="active_id_status"/>
                                                                                                           <input type="hidden" value="1" name="active_status_status" id="active_status_status"/> <a role="button" class="btn btn-success status_check_active"  data="<?php echo $row->id; ?>" data_status="1">Make Active</a>     

                                                                                                        <?php else: ?>  
                                                                                                            <a href="<?php echo site_url(); ?>admin/Dashboard_articles/edit_article_activate/<?php echo $row->id; ?>" role="button" class="btn btn-success"><?php ?>Make Active</a>
                                                                                                        <?php
                                                                                                        endif;
                                                                                                    else:
                                                                                                        ?>
                                                                                                          
                                                                                                        <a role="button" class="btn btn-primary status_check_deactive" data="<?php echo $row->id; ?>" data_status="0">Make De active</a>
                                                                                                       <input type="hidden" value="<?php echo $row->id;?>" name="deactive_id_status" id="deactive_id_status"/>
                                                                                                           <input type="hidden" value="0" name="deactive_status_status" id="deactive_status_status"/>
                                                                                                    <?php endif; ?>
                                                                                                </td>
                                                                                                <!--<td><?php //echo ucfirst($row->created_on) ?></td>-->
                                                                                                <td><?php  $transaction_date=date("Y-m-d H:i:s", strtotime($row->created_on." +8 hours"));
                                           echo ucfirst($transaction_date); ?></td>   <td>
                                                                                                    <script>var builder_<?php echo $row->id; ?> = <?php echo json_encode($row); ?></script>
                                                                                                    <a  href="<?php echo site_url(); ?>admin/Dashboard_articles/add_edit_article/<?php echo $row->id; ?>/tab1" title="View" class="tip"><i  class="fa fa-pencil" title="Edit"></i></a>
                                                                                                    <a  href="<?php echo site_url(); ?>admin/Dashboard_articles/view_article/<?php echo $row->id; ?>" title="View" class="tip"><i  class="fa fa-eye" title="View"></i></a>
                                                                                                    <a  href="#"><i   data="<?php echo $row->id ?>" class="status_check fa fa-remove" title="Delete"></i></a></td>
                                                                                            </tr>
                                                                                            <?php
                                                                                        }
                                                                                    endif;
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.table-responsive -->

                                                                    </div>
                                                                    <!-- /.panel-body -->
                                                                </div>
                                                            </div>
                                                            
                                                            <div id="tab2" class="tab-pane fade">
                                                                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                                                    <div class="panel-heading" >
                                                                        Articles Details
                                                                    </div>
                                                                    <!-- /.panel-heading -->
                                                                    <div class="panel-body">

                                                                        <div class="dataTable_wrapper">
                                                                            <table width="100%" class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example">
                                                                                <thead>
                                                                                    <tr>

                                                                                        <th><?php echo $lang_articletitle;?></th>
                                                                                        <th><?php echo $lang_subcategiryname;?></th>
                                                                                        <th><?php echo $lang_username;?></th>
                                                                                        <th><?php echo $lang_shortdescription;?></th>
                                                                                        <th><?php echo $lang_status;?></th>
                                                                                        <th><?php echo $lang_createdon;?></th>
                                                                                        <th><?php echo $lang_action;?></th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    <?php
//                                                               print_r($approved_articles);
                                                                                    if (isset($approved_articles) && count($approved_articles)): 
                                                                                     $buttndisp = '';
                                                                                     $minicert = '';
                                                                                     //print_r($approved_articles);
                                                                                        foreach ($approved_articles as $row) { 
                                                                                       
                                                                                                //$minicert = $this->Articles_model->check_mini_cert($row->id);  
                                                                                               // $sequence_check = $this->Articles_model->check_sequence_cert($row->id); 
                                                                                  
                                                                                 // echo '<pre>'; print_r($minicert); exit;
                                                                                     if(!empty($minicert))
                                                                                     { //echo '<pre>'; print_r($minicert); exit;
                                                                                         $buttndisp = '';
                                                                                     }
                                                                                     else {
                                                                                          $buttndisp = '1';
                                                                                     }
                                                                                  //echo '<pre>'; print_r($minicert); 
                                                                                        
                                                                                            ?>
                                                                                            <tr class="odd gradeX">
                                                                                                <td><?php echo ucfirst($row->title) ?></td>
                                                                                                <td><?php echo $row->category_name ?></td>
                                                                                                <td><?php echo ucfirst($row->username) ?></td>
                                                                                                <td><?php echo ucfirst($row->short_description) ?></td>
                                                                                                <td>
            <!--                                                                                                    <select class="form-control status_check_active" data="<?php echo $row->id; ?>">
                                                                                                        <option value="1" <?php echo ($row->active == '1') ? "selected=selected" : ""; ?>>Active</option>
                                                                                                        <option value="0" <?php echo ($row->active == '0') ? "selected=selected" : ""; ?>>Inactive</option>
                                                                                                    </select>-->
                                                                                                    <?php if(!empty($buttndisp)) {?>
                                                                                                    <a role="button" class="btn btn-primary status_check_deactive" data="<?php echo $row->id; ?>" data_status="0">Make De active</a>
                                                                                                 <input type="hidden" value="<?php echo $row->id;?>" name="deactive_id_status" id="deactive_id_status"/>
                                                                                                           <input type="hidden" value="0" name="deactive_status_status" id="deactive_status_status"/><?php } else {
                                                                                                   echo 'Since this article is added in Assessment you cant deactivate';     
                                                                                                    }
                                                                                                    ?>
                                                                                                </td>
                                                                                                    
                                                                                                <!--<td><?php // echo ucfirst($row->created_on) ?></td>-->
                                                                                            <td><?php  $transaction_date=date("Y-m-d H:i:s", strtotime($row->created_on." +8 hours"));
                                           echo  ucfirst($transaction_date); ?></td>     
                                                                                                <td>
                                                                                                    <script>var builder_<?php echo $row->id; ?> = <?php echo json_encode($row); ?></script>
                                                    <!--                                                                                <a  href="#"><i  imagedata="image_dataclass<?php echo $row->id; ?>" data1="<?php echo 'builder_' . $row->id; ?>"class="model_form fa fa-pencil" title="Edit"></i></a>-->

                                                                                                    <a  href="<?php echo site_url(); ?>admin/Dashboard_articles/add_edit_article/<?php echo $row->id; ?>/tab2" title="View" class="tip"><i  class="fa fa-pencil" title="Edit"></i></a>

                                                                                                    <a  href="<?php echo site_url(); ?>admin/Dashboard_articles/view_article/<?php echo $row->id; ?>" title="View" class="tip"><i  class="fa fa-eye" title="View"></i></a>
                                                                                                         <?php if(!empty($buttndisp)) {?>
                                                                                                    <a  href="#"><i   data="<?php echo $row->id ?>" class="status_check fa fa-remove" title="Delete"></i></a>
                                                                                                <?php } ?> 
                                                                                                </td>
                                                                                                                                                                                                                  <!--                                                                                <a  href="#"><i   data="<?php echo $row->id ?>" class="status_check fa fa-remove" title="Delete"></i></a></td>-->
                                                                                            </tr>
                                                                                            <?php
                                                                                        }
                                                                                    endif;
                                                                                    ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <!-- /.table-responsive -->

                                                                    </div>
                                                                    <!-- /.panel-body -->
                                                                </div>
                                                            </div>

                                                            <div id="tab3" class="tab-pane fade">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <h1 class="page-header"> &nbsp;<?php echo $lang_addarticle; ?> : </h1>
                                                                    </div>
                                                                    <!-- /.col-lg-12 -->
                                                                </div>

                                                                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                                                    <div class="col-lg-12">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                <?php echo $lang_articlesdetails; ?>
                                                                                <a style="margin-top: -6px;float: right;" href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>"> <button type="button" class="btn btn-info"><?php echo $lang_back;?></button></a>
                                                                            </div>
                                                                            <?php //echo form_open_multipart(site_url() . '/admin/Dashboard_articles/add_edit_article', 'id="cat_form" class=".validate"');          ?>

                                                                            <div class="panel-body">

                                                                                <div class="row">
                                                                                    <div class="col-lg-9 validate" >
                                                                                        <form role="form" id="add_edit_form">
                                                                                            <div class="form-group" style="display:none">
                                                                                                <label><?php echo $lang_slectlang; ?></label>


                                                                                            </div>
                                                                                            <div class="form-group" >
                                                                                                <select  name="language" style="display:none" data-placeholder="Choose a Subcategory..." class="form-control change_language select-full  required" tabindex="2">
                                                                                                    <option value="en"<?php if ($language == 'en') echo ' selected="selected"'; ?>><?php echo $lang_english; ?></option>
                                                                                                    <option value="zh"<?php if ($language == 'zh') echo ' selected="selected"'; ?>><?php echo $lang_chinese; ?></option>
                                                                                                    <option value="my"<?php if ($language == 'my') echo ' selected="selected"'; ?>><?php echo $lang_burmese; ?></option>
                                                                                                </select>                                     
                                                                                                <label><?php echo $lang_articletitle; ?></label>
                                                                                                <input class="form-control required" name="title" maxlength="50">
                                                                                            </div>

                                                                                            <div class="row">
                                                                                                <div class="col-md-6 form-group">
                                                                                                    <label>* <?php echo $lang_selectmain_category; ?></label>
                                                                                                    <select  name="mincat" data-placeholder="' . $lang_choosecategory . '..." class="form-control category_id select-full required" tabindex="2"tabindex="2">
                                                                                                        <option value=""><?php echo $lang_choosecategory; ?></option>
                                                                                                        <?php
                                                                                                        if (!empty($main_category)):
                                                                                                            foreach ($main_category as $cat_row) {
                                                                                                                ?>                                                                                                     
                                                                                                                <option value="<?php echo $cat_row->id; ?>"><?php echo $cat_row->name; ?></option>
                                                                                                            <?php }endif; ?>
                                                                                                    </select>
                                                                                                    <?php
//                                                                                                $main_category [''] = $lang_choosecategory;
//                                                                                                $options = 'data-placeholder="' . $lang_choosecategory . '..." class="form-control category_id select-full required" tabindex="2"';
//                                                                                                echo form_dropdown('sp_id', $main_category, @$main_category->id, $options);
                                                                                                    ?>
                                                                                                </div>
                                                                                                <div class="col-md-6 form-group">
                                                                                                    <label>* <?php echo $lang_selectsub_category; ?></label>
                                                                                                    <select id="subcategory_id" name="cat_id" data-placeholder="Choose a Subcategory..." class="form-control select-full get_sub_sub_cat required" tabindex="2">
                                                                                                        <option value=""><?php echo $lang_choosesubcategory; ?></option>
                                                                                                    </select>

                                                                                                </div>
                                                                                            </div>
                                                                                                <div class="form-group">
                                                                                                <label><?php echo 'Trainee'; ?>:</label>

                                                                                                <select style="height:40px !important;" id="author_edit" name="author" class="form-control author_edit required valid">
                                                                                                    <option value=""><?php echo 'Please select Trainer'; ?></option>
                                                                                                    <?php foreach($authors as $author) { if (!$this->ion_auth->is_trainer() ){?>
                                                                                                    <option value="<?php echo $author->id;?>" <?php if(!empty($article->author_id) && $article->author_id==$author->id) echo 'selected';?>><?php if(!empty($author->username)) echo $author->username; ?></option>
                                                                                                    <?php }else{
                                                                                                        if($this->ion_auth->user()->row()->id==$author->id){?>
                                                                                                    <option value="<?php echo $author->id;?>" <?php if($this->ion_auth->user()->row()->id==$author->id) echo 'selected';?>><?php if(!empty($author->username)) echo $author->username; ?></option>

                                                                                                    <?php } }}?> </select>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-6 sub_subcategory">
                                                                                                </div>
                                                                                                <div class="col-md-6 sub_sub_subcategory">
                                                                                                </div></div>

                                                                                            <div class="form-group">
                                                                                                <label><?php echo $lang_typefile_upload; ?>:</label>

                                                                                                <select id="type" name="type" class="form-control type_file required">
                                                                                                    <option value=""><?php echo $lang_plsselect_file; ?></option>
                                                                                                    <option value="2"><?php echo $lang_image; ?></option>
                                                                                                    <option value="3"><?php echo $lang_video; ?></option>
                                                                                                    <option value="4"><?php echo $lang_link; ?></option>
                                                                                                    <option value="5"><?php echo "PDF"; ?></option>
                                                                                                    <option value="6"><?php echo "PPT"; ?></option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="image_rows ">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo $lang_imageto_upload; ?>:</label>
                                                                                                    <span class="help-block"><?php echo $lang_accepted_fromat; ?>: jpeg, jpg, png, gif.(400X200)</span>
                                                                                                    <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form">Upload</a><span id="img_name" style="font-weight: bold;margin-left: 5px;"></span>
                                                                                                    <?php $this->load->view('admin/article_img1_crop_modal'); ?>
                                                                                                    <input id="imageupload" type="hidden" class="required" name="image_files" >
                                                                                                    <br>
                                                                                                    <label><?php echo $lang_caption_image; ?>:</label>
                                                                                                    <input class="form-control" name="caption_image1" maxlength="20"><br>

                                                                                                    <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form1">Upload</a><span id="img_name1" style="font-weight: bold;margin-left: 5px;"><b></span>
                                                                                                    <?php $this->load->view('admin/article_img1_crop_modal1'); ?>
                                                                                                    <input id="imageupload1" type="hidden" name="image_files1" ><br>
                                                                                                    <label><?php echo $lang_caption_image; ?>:</label>
                                                                                                    <input class="form-control" name="caption_image2" maxlength="20"><br>

                                                                                                    <a class="btn smile-primary btn" href="javascript;" data-toggle="modal" data-target="#upload-logo-form2">Upload</a><span id="img_name2" style="font-weight: bold;margin-left: 5px;"><b><b></span>
                                                                                                                <?php $this->load->view('admin/article_img1_crop_modal2'); ?>
                                                                                                                <input id="imageupload2" type="hidden" name="image_files2" ><br>
                                                                                                                <label> <?php echo $lang_caption_image; ?>:</label>
                                                                                                                <input class="form-control" name="caption_image3" maxlength="20">
                                                                                                                <!--                                                                <div class="row">
                                                                                                                                                                                    <div id="preview-image"></div>
                                                                                                                                                                                    <div id="preview-image1"></div>
                                                                                                                                                                                    <div id="preview-image2"></div>
                                                                                                                                                                                </div>-->

                                                                                                                <span class="help-block old_image4"></span>
                                                                <!--                                                    <input type="hidden" name="adv_id" id="id" value="">-->
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                <div class="pdf">
                                                                                                                     <div class="form-group">
                                                                                                                        <label>Pdf upload:</label>
                                                                                                                        <input type="file" class="form-control required pdf" name="pdf" maxlength="100" id="pdfval">
                                                                                                                        <label style="display:none" class="error" id="pdf"><?php echo $lang_valid_youtubeurl; ?></label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                   <div class="ppt_row">
                                                                                                                    <div class="form-group">
                                                                                                                        <label>Ppt upload:</label>
                                                                                                                       <input type="file" class="form-control required ppt" name="ppt" maxlength="100" id="pptval">
                                                                                                                        <label style="display:none" class="error" id="ppt"><?php echo $lang_valid_youtubeurl; ?></label>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="video_row ">
                                                                                                                    <div class="form-group">

                                                                                                                        <label><?php echo $lang_video; ?>:</label>
                                                                                                                        <input type="file" class="fl styled form-control required" id="fl" name="file_name">
                                                                                                                        <span class="help-block"><?php echo $lang_accepted_fromat; ?>: mov,mp4.  </span>
                                                                                                                        <span class="help-block old_image4"></span>
                                                                                                                        <input type="hidden" name="adv_id" id="id" value="">

                                                                                                                        <video width="100" hieght="100" controls width="500px" id="vid" ></video>  
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="link_row">
                                                                                                                    <div class="form-group">
                                                                                                                        <label>Youtube <?php echo $lang_link; ?>:</label>
                                                                                                                        <input class="form-control required link" name="link" maxlength="100">
                                                                                                                        <label style="display:none" class="error" id="link"><?php echo $lang_valid_youtubeurl; ?></label>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div class="form-group">
                                                                                                                    <label><?php echo $lang_tagname; ?></label>
                                                                                                                    <span class="help-block"><?php echo $lang_maximum_5tag; ?> </span>             
                                                                                                                    <select multiple="" data-role="tagsinput" class="check_tag" name="tags[]" style="display: none;">
                                                                                                                    </select>

                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label><?php echo $lang_description; ?></label>
                                                                                                                    <textarea  class="ckeditor form-control required"  id="decription" name="description"  ></textarea> 
                                                                                                                         <p id="sho_val_err" class="error" style="font-weight: bold;"></p>                                                                                                                                                                                                                                                                                                                                                                                           <!--                                                <textarea class="ckeditor form-control" rows="3"></textarea>-->
                                                                                                                </div>
                                                                                                                <div class="form-group">
                                                                                                                    <label><?php echo $lang_shortdescription; ?></label>

                                                                                                                    <textarea class="form-control required" rows="3" name="short_description" maxlength="200"></textarea>
                                                                                                                </div>

                                                                                                                <br>
                                                                                                                <br>
                                                                                                                <button type="button" id="b1" class="add_edit_button btn smile-primary btn"><?php echo $lang_submit; ?></button>
                                                                                                                <a href="<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>" class="btn btn btn-warning"><?php echo $lang_cancel; ?></a>
                                                                                                                </form>            
                                                                                                                </div>
                                                                                                                <?php //echo form_close();          ?>
                                                                                                                </div>
                                                                                                                <!-- /.row (nested) -->
                                                                                                                </div>
                                                                                                                <!-- /.panel-body -->
                                                                                                                </div>
                                                                                                                <!-- /.panel -->
                                                                                                                </div>
                                                                                                                <!-- /.col-lg-12 -->
                                                                                                                </div>
                                                                                                                <!-- /.row -->
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                                <!-- /.panel -->
                                                                                                                </div>
                                                                                                                <!-- /.col-lg-12 -->
                                                                                                                </div>
                                                                                                                <!-- /.row -->

                                                                                                            <?php endif; ?>    
                                                                                                            <?php $this->load->view('admin/article_img1_upload_modal.php'); ?>
                                                                                                            <?php $this->load->view('admin/article_img1_upload_modal1.php'); ?>
                                                                                                            <?php $this->load->view('admin/article_img1_upload_modal2.php'); ?>
                                                                                                            <!-- /#page-wrapper -->
                                                                                                            <!-- /#wrapper -->
                                                                                                            <!-- Form modal -->
                                                                                                            <div id="form_modal" class="modal fade" tabindex="-1" role="dialog">
                                                                                                                <div class="modal-dialog modal-lg">
                                                                                                                    <div class="modal-content">
                                                                                                                        <div class="modal-header smile-primary">
                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                                                            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>Add/Edit</span> Quiz section </h4>
                                                                                                                        </div>
                                                                                                                        <!-- Form inside modal -->
                                                                                                                        <?php // echo form_open_multipart(site_url() . '/admin/dashbord_category/add_edit', 'id="quiz_form" class=".validate"');           ?>
                                                                                                                        <form id="quiz_form" class=".validate">
                                                                                                                            <div class="modal-body with-padding ">
                                                                                                                                <div class=" form-group">
                                                                                                                                    <label>Question:</label>
                                                                                                                                    <textarea class="form-control required" rows="3" name="question"  id="question" maxlength="200"></textarea>

                                                                                                                                </div>
                                                                                                                                <div class="form-group">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-12">
                                                                                                                                            <label>option 1:</label>
                                                                                                                                            <input type="text" id="option1" name="option1" class="form-control required" value="">
                                                                                                                                        </div>

                                                                                                                                    </div>
                                                                                                                                </div> 
                                                                                                                                <div class="form-group">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-12">
                                                                                                                                            <label>option 2:</label>
                                                                                                                                            <input type="text" id="option2" name="option2" class="form-control required" value="">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div> 
                                                                                                                                <div class="form-group">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-12">
                                                                                                                                            <label>option 3:</label>
                                                                                                                                            <input type="text" id="option3" name="option3" class="form-control required" value="">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div> 
                                                                                                                                <div class="form-group">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-12">
                                                                                                                                            <label>option 4:</label>
                                                                                                                                            <input type="text" id="option4" name="option4" class="form-control required" value="">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div> 
                                                                                                                                <div class="form-group">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-sm-6">
                                                                                                                                            <label>Answer:</label>
                                                                                                                                            <select class="form-control" id="answer_key" name="answer_key">
                                                                                                                                                <option value="option1">
                                                                                                                                                    option 1
                                                                                                                                                </option>
                                                                                                                                                <option value="option2">
                                                                                                                                                    option 2
                                                                                                                                                </option>
                                                                                                                                                <option value="option3">
                                                                                                                                                    option 3
                                                                                                                                                </option>
                                                                                                                                                <option value="option4">
                                                                                                                                                    option 4
                                                                                                                                                </option>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div> 
                                                                                                                            </div>            
                                                                                                                            <div class="modal-footer">
                                                                                                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                                                                                                <span id="add">
                                                                                                                                    <input type="hidden" name="art_id" value="" id="quiz_id">
                                                                                                                                    <input type="hidden" name="category_type" value="<?php echo $this->uri->segment(3) ?>" >
                                                                                                                                    <button type="button" class="btn btn-primary" id="add_quiz">Create quiz</button>
                                                                                                                                </span>
                                                                                                                            </div>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- /form modal -->
                                                                                                             
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">ACTIVE CONFIRMATION</h4>
             </div>
             <div class="modal-body">
              
                 <p class="text-center">Are You Sure Want To Active ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <input type="hidden" id="del_mod"> <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" id="deleteformSubmit" >Yes, Active</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
                                                                                                            
                                                                                                            
    <div id="DeleteModaldeactive" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">ACTIVE CONFIRMATION</h4>
             </div>
             <div class="modal-body">
              
                 <p class="text-center">Are You Sure Want To DeActive ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <input type="hidden" id="del_mod"> <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" id="deleteformSubmitdeactive" >Yes, DeActive</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
                                                                                                            <!-- Form modal view -->
                                                                                                            <div id="form_modal_view" class="modal fade" tabindex="-1" role="dialog">
                                                                                                                <div class="modal-dialog">
                                                                                                                    <div class="panel panel-default modal-content">
                                                                                                                        <div class=" modal-header btn-primary">
                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                                                            <h4 class="modal-title"><i class="icon-paragraph-justify2"></i> <span>View</span> posting details </h4>
                                                                                                                        </div>
                                                                                                                        <!-- Form inside modal -->
                                                                                                                        <?php echo form_open_multipart(site_url() . 'admin/dashbord_category/add_edit', 'id="cat_form" class=".validate"'); ?>
                                                                                                                        <div class="modal-body with-padding">
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">

                                                                                                                                        <p > <label >Profile Image:</label>
                                                                                                                                            <span class="append_img1"><img  style="display: inline-block;width: 150px;height: 150px;" class="thumbnail " src="<?php echo base_url(); ?>assets/upoads/profile_image/noimage.jpg">  </span>
                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div> 
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p > <label >Username:</label>
                                                                                                                                            <span id="view_username"> </span>
                                                                                                                                        </p>

                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p > <label >Phone:</label>
                                                                                                                                            <span id="view_phone"> </span>
                                                                                                                                        </p>

                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p> <label >Company:</label>
                                                                                                                                            <span id="view_company"></span>
                                                                                                                                        </p>
                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p> <label >Department:</label>
                                                                                                                                            <span id="view_department"></span>
                                                                                                                                        </p>
                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p > <label >Email:</label>
                                                                                                                                            <span id="view_email"> </span>
                                                                                                                                        </p>
                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-sm-12  ">
                                                                                                                                        <p > <label >Employee id:</label>
                                                                                                                                            <span id="view_empid"> </span>
                                                                                                                                        </p>
                                                                                                                                        <hr>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <?php echo form_close(); ?>
                                                                                                                        <div class="modal-footer">
                                                                                                                            <button type="button" class="btn btn-warning " data-dismiss="modal">Close</button>
                                                                                                                            <span id="add"></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <!-- /form modal view -->

                                                                                                            <!-- jQuery -->
                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
                                                                                                            <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>

                                                                                                            <!-- Bootstrap Core JavaScript -->
                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

                                                                                                            <!-- Metis Menu Plugin JavaScript -->

                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>


                                                                                                            <!-- DataTables JavaScript -->
                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

                                                                                                            <!-- Custom Theme JavaScript -->
                                                                                                            <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

                                                                                                            <!-- Page-Level Demo Scripts - Tables - Use for reference -->

                                                                                                            <!-- tags related script start here-->

                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/dist/bootstrap-tagsinput.min.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/dist/bootstrap-tagsinput-angular.min.js"></script>
                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
                                                                                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/tags/app.js"></script>
                                                                                                            <script src="<?php echo base_url(); ?>assets/tags/app_bs3.js"></script>
                                                                                                            <!-- Tags related script ends here -->
                                                                                                            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/ckeditor/ckeditor.js"></script>
                                                                                                            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
                                                                                                            <script src="<?php echo base_url() ?>assets/js/jquery.Jcrop.js"></script>
                                                                                                            <script>
                                                                                                        $(document).ready(function () {
                                                                                                            var hash = window.location.hash;
                                                                                                            //                                                                                                            $('#tabs > li').removeClass("active");
                                                                                                            //                                                                                                            $('#tabs').find('a[href=' + hash + ']').parent().addClass("active");
                                                                                                            $('ul.nav.nav-tabs a:first').tab('show'); // Select first tab
                                                                                                            $('ul.nav.nav-tabs a[href="' + window.location.hash + '"]').tab('show'); // Select tab by name if provided in location hash
                                                                                                            $('ul.nav.nav-tabs a[data-toggle="tab"]').on('shown', function (event) {    // Update the location hash to current tab
                                                                                                                window.location.hash = event.target.hash;
                                                                                                            })

                                                                                                            var jcrop_api1;
                                                                                                            $("#upload-logo-form-control1").show();
                                                                                                            $("#upload-logo-form-control1").submit(function (e)
                                                                                                            {
                                                                                                                var postData = new FormData($(this)[0]);
                                                                                                                $("#upload-logo-form-control1").hide();
                                                                                                                $(".upfrma").addClass('loader');
                                                                                                                var formURL = $(this).attr("action");
                                                                                                                $.ajax(
                                                                                                                        {
                                                                                                                            url: formURL,
                                                                                                                            type: "POST",
                                                                                                                            async: false,
                                                                                                                            cache: false,
                                                                                                                            contentType: false,
                                                                                                                            enctype: 'multipart/form-data',
                                                                                                                            processData: false,
                                                                                                                            data: postData,
                                                                                                                            success: function (data, textStatus, jqXHR)
                                                                                                                            {
                                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                                var obj = $.parseJSON(data);
                                                                                                                                if (obj.type == 'alert')
                                                                                                                                {
                                                                                                                                    $("#upload-logo-form-control1").show();
                                                                                                                                    $("#mailme-alert1").html(obj.msg);
                                                                                                                                    $("#mailme-alert1").show();
                                                                                                                                }
                                                                                                                                else if (obj.type == 'success') {
                                                                                                                                    $("#upload-logo-form-control1").hide();
                                                                                                                                    $("#mailme-alert1").hide();
                                                                                                                                    $("#imageupload1").val(data);
                                                                                                                                    $("#image-uploader1").val(obj.msg.orig_name);
                                                                                                                                    $("#img_name1").html(obj.msg.orig_name);
                                                                                                                                    $("#image-uploader-label1").html(obj.msg.orig_name);
                                                                                                                                    initJcrop2('/assets/uploads/articles_image/' + obj.msg.file_name);
                                                                                                                                    $("#upload-logo-form1").modal('hide');
                                                                                                                                    $("#crop-logo-form1").modal('show');
                                                                                                                                    $(".jcrop-keymgr").css("display", "none");
                                                                                                                                }
                                                                                                                                else {
                                                                                                                                    $("#mailme-alert1").hide();
                                                                                                                                    if (obj.url) {
                                                                                                                                        window.location.href = obj.url;
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            },
                                                                                                                            error: function (jqXHR, textStatus, errorThrown)
                                                                                                                            {
                                                                                                                                //$("#upload-logo-form-control").show();
                                                                                                                                $("#mailme-alert1").html('There was some problem with the server. Please try again.<a href="" class="close">?</a>');
                                                                                                                                $("#mailme-alert1").show();
                                                                                                                            }
                                                                                                                        });
                                                                                                                e.preventDefault(); //STOP default action
                                                                                                            });
                                                                                                            var jcrop_api2;
                                                                                                            $("#upload-logo-form-control2").show();
                                                                                                            $("#upload-logo-form-control2").submit(function (e)
                                                                                                            {
                                                                                                                var postData = new FormData($(this)[0]);
                                                                                                                $("#upload-logo-form-control2").hide();
                                                                                                                $(".upfrma").addClass('loader');
                                                                                                                var formURL = $(this).attr("action");
                                                                                                                $.ajax(
                                                                                                                        {
                                                                                                                            url: formURL,
                                                                                                                            type: "POST",
                                                                                                                            async: false,
                                                                                                                            cache: false,
                                                                                                                            contentType: false,
                                                                                                                            enctype: 'multipart/form-data',
                                                                                                                            processData: false,
                                                                                                                            data: postData,
                                                                                                                            success: function (data, textStatus, jqXHR)
                                                                                                                            {
                                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                                var obj = $.parseJSON(data);
                                                                                                                                if (obj.type == 'alert')
                                                                                                                                {
                                                                                                                                    $("#upload-logo-form-control2").show();
                                                                                                                                    $("#mailme-alert2").html(obj.msg);
                                                                                                                                    $("#mailme-alert2").show();
                                                                                                                                }
                                                                                                                                else if (obj.type == 'success') {
                                                                                                                                    $("#upload-logo-form-control2").hide();
                                                                                                                                    $("#mailme-alert2").hide();
                                                                                                                                    $("#imageupload2").val(data);
                                                                                                                                    $("#image-uploader2").val(obj.msg.orig_name);
                                                                                                                                    $("#img_name2").html(obj.msg.orig_name);

                                                                                                                                    $("#image-uploader-label2").html(obj.msg.orig_name);
                                                                                                                                    initJcrop3('/assets/uploads/articles_image/' + obj.msg.file_name);
                                                                                                                                    $("#upload-logo-form2").modal('hide');
                                                                                                                                    $("#crop-logo-form2").modal('show');
                                                                                                                                    $(".jcrop-keymgr").css("display", "none");
                                                                                                                                }
                                                                                                                                else {
                                                                                                                                    $("#mailme-alert2").hide();
                                                                                                                                    if (obj.url) {
                                                                                                                                        window.location.href = obj.url;
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            },
                                                                                                                            error: function (jqXHR, textStatus, errorThrown)
                                                                                                                            {
                                                                                                                                //$("#upload-logo-form-control").show();
                                                                                                                                $("#mailme-alert2").html('There was some problem with the server. Please try again.<a href="" class="close">?</a>');
                                                                                                                                $("#mailme-alert2").show();
                                                                                                                            }
                                                                                                                        });
                                                                                                                e.preventDefault(); //STOP default action
                                                                                                            });
                                                                                                            var jcrop_api;
                                                                                                            $("#upload-logo-form-control").show();
                                                                                                            $("#upload-logo-form-control").submit(function (e)
                                                                                                            {
                                                                                                                var postData = new FormData($(this)[0]);
                                                                                                                $("#upload-logo-form-control").hide();
                                                                                                                $(".upfrma").addClass('loader');
                                                                                                                var formURL = $(this).attr("action");
                                                                                                                $.ajax(
                                                                                                                        {
                                                                                                                            url: formURL,
                                                                                                                            type: "POST",
                                                                                                                            async: false,
                                                                                                                            cache: false,
                                                                                                                            contentType: false,
                                                                                                                            enctype: 'multipart/form-data',
                                                                                                                            processData: false,
                                                                                                                            data: postData,
                                                                                                                            success: function (data, textStatus, jqXHR)
                                                                                                                            {
                                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                                var obj = $.parseJSON(data);
                                                                                                                                if (obj.type == 'alert')
                                                                                                                                {
                                                                                                                                    $("#upload-logo-form-control").show();
                                                                                                                                    $("#mailme-alert").html(obj.msg);
                                                                                                                                    $("#mailme-alert").show();
                                                                                                                                }
                                                                                                                                else if (obj.type == 'success') {
                                                                                                                                    $("#upload-logo-form-control").hide();
                                                                                                                                    $("#mailme-alert").hide();
                                                                                                                                    $("#imageupload").val(data);
                                                                                                                                    $("#image-uploader").val(obj.msg.orig_name);
                                                                                                                                    $("#img_name").html(obj.msg.orig_name);
                                                                                                                                    $("#image-uploader-label").html(obj.msg.orig_name);
                                                                                                                                    initJcrop1('/assets/uploads/articles_image/' + obj.msg.file_name);
                                                                                                                                    $("#upload-logo-form").modal('hide');
                                                                                                                                    $("#crop-logo-form").modal('show');
                                                                                                                                    var ims = $('#dem81').attr('src');
                                                                                                                                    //alert(ims);
                                                                                                                                    $(".jcrop-keymgr").css("display", "none");
                                                                                                                                }
                                                                                                                                else {
                                                                                                                                    $("#mailme-alert").hide();
                                                                                                                                    if (obj.url) {
                                                                                                                                        window.location.href = obj.url;
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            },
                                                                                                                            error: function (jqXHR, textStatus, errorThrown)
                                                                                                                            {
                                                                                                                                //$("#upload-logo-form-control").show();
                                                                                                                                $("#mailme-alert").html('There was some problem with the server. Please try again.<a href="" class="close">?</a>');
                                                                                                                                $("#mailme-alert").show();
                                                                                                                            }
                                                                                                                        });
                                                                                                                e.preventDefault(); //STOP default action
                                                                                                            });
                                                                                                             function initJcrop1(img)
                                                                                                            {
                                                                                                                $('#dem81').attr("src", img);
                                                                                                                  $('#dem81').Jcrop({
                //setSelect:   [ 150, 150, 50, 50 ],
              aspectRatio: 1000 / 1000,
               minSize: [300,400],
            maxSize: [300,400],
                onSelect: updateCoords1
            }, 
            function () {
                jcrop_api = this;
                jcrop_api.animateTo([150, 150, 50, 50]);
            });
//                                                                                                                 $('#dem81').Jcrop({
//                                                                                                          setSelect: [0, 0, 500],
//                                                                                                                 
//                                                                                                            aspectRatio: 4/1,
//                                                                                                            onSelect: updateCoords1,
//                                                                                                            allowResize: false,
//                                                                                                            onChange: updateCoords1
//                                                                                                           });
//                                                                                                                jcrop_api = $.Jcrop('#dem81');
//                                                                                                                jcrop_api.setImage(img);
//                                                                                                                console.log(jcrop_api);
//                                                                                                                //jcrop_api.animateTo([150, 150, 400, 200]);
//                                                                                                                jcrop_api.setOptions({bgOpacity: .6, bgColor: 'white', setSelect: [150, 150, 50, 50],
//                                                                                                                    aspectRatio: 400 / 250,
//                                                                                                                    onSelect: updateCoords1
//                                                                                                                });

                                                                                                                return false;
                                                                                                            }
                                                                                                            ;
                                                                                                            function initJcrop2(img)
                                                                                                            {
                                                                                                                $('#dem82').attr("src", img);
                                                                                                                  $('#dem82').Jcrop({
                //setSelect:   [ 150, 150, 50, 50 ],
               // aspectRatio: 400 / 150,
                  aspectRatio: 1000 / 1000,
               minSize: [300,400],
            maxSize: [300,400],
            onSelect: updateCoords2
            }, function () {
                jcrop_api = this;
                jcrop_api.animateTo([150, 150, 50, 50]);
            });
//                                                                                                                $('#dem82').Jcrop({
//                                                                                                             setSelect: [0, 0, 1000],
//          minSize: [100, 150],maxSize: [100, 150],
//          aspectRatio: 4/2,
//                                                                                                              aspectRatio: 4/1,
//                                                                                                             allowResize: false,
//                                                                                                            onSelect: updateCoords2,
//                                                                                                            onChange: updateCoords2
//                                                                                                           });
//                                                                                                                jcrop_api1 = $.Jcrop('#dem82');
//                                                                                                                jcrop_api1.setImage(img);
//                                                                                                                console.log(jcrop_api1);
//                                                                                                                //jcrop_api.animateTo([150, 150, 400, 200]);
//                                                                                                                jcrop_api1.setOptions({bgOpacity: .6, bgColor: 'white', setSelect: [150, 150, 50, 50],
//                                                                                                                    aspectRatio: 400 / 250,
//                                                                                                                    onSelect: updateCoords2});

                                                                                                                return false;
                                                                                                            }
                                                                                                            ;
                                                                                                            function initJcrop3(img)
                                                                                                            {
                                                                                                                $('#dem83').attr("src", img);
                                                                                                                  $('#dem83').Jcrop({
                //setSelect:   [ 150, 150, 50, 50 ],
             //   aspectRatio: 400 / 150,
                  aspectRatio: 1000 / 1000,
               minSize: [300,400],
            maxSize: [300,400],
            onSelect: updateCoords3
            }, function () {
                jcrop_api = this;
                jcrop_api.animateTo([150, 150, 50, 50]);
            });
//                                                                                                                $('#dem83').Jcrop({
//                                                                                                            setSelect: [0, 0, 500],
//          minSize: [52, 140],
//           maxSize: [500, 500],
//                                                                                                              aspectRatio: 4/1,
//                                                                                                                allowResize: false,
//                                                                                                            onSelect: updateCoords3,
//                                                                                                            onChange: updateCoords3
//                                                                                                           });
//                                                                                                                jcrop_api2 = $.Jcrop('#dem83');
//                                                                                                                jcrop_api2.setImage(img);
//                                                                                                                console.log(jcrop_api2);
//                                                                                                                //jcrop_api.animateTo([150, 150, 400, 200]);
//                                                                                                                jcrop_api2.setOptions({bgOpacity: .6, bgColor: 'white', setSelect: [150, 150, 50, 50],
//                                                                                                                    aspectRatio: 400 / 250,
//                                                                                                                    onSelect: updateCoords3});

                                                                                                                return false;
                                                                                                            }
                                                                                                            ;
                                                                                                            function updateCoords1(c)
                                                                                                            {
                                                                                                                $('#crop1_x').val(c.x);
                                                                                                                $('#crop1_y').val(c.y);
                                                                                                                $('#crop1_w').val(c.w);
                                                                                                                $('#crop1_h').val(c.h);
                                                                                                            }
                                                                                                            ;
                                                                                                            function updateCoords2(c)
                                                                                                            {
                                                                                                                $('#crop2_x').val(c.x);
                                                                                                                $('#crop2_y').val(c.y);
                                                                                                                $('#crop2_w').val(c.w);
                                                                                                                $('#crop2_h').val(c.h);
                                                                                                            }
                                                                                                            ;
                                                                                                            function updateCoords3(c)
                                                                                                            {
                                                                                                                $('#crop3_x').val(c.x);
                                                                                                                $('#crop3_y').val(c.y);
                                                                                                                $('#crop3_w').val(c.w);
                                                                                                                $('#crop3_h').val(c.h);
                                                                                                            }
                                                                                                            ;
                                                                                                            $('#upload-logo-form').on('shown.bs.modal', function () {
                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                $("#upload-logo-form-control").show();
                                                                                                                $('#upload-logo-form-control').find("input[type=file]").val("");
                                                                                                                $("#mailme-alert").hide();
                                                                                                                $("#mailme-alert").html('');
                                                                                                                jcrop_api.destroy();
                                                                                                                return (false);
                                                                                                            });
                                                                                                            $('#upload-logo-form1').on('hidden.bs.modal', function () {
                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                $("#upload-logo-form-control1").show();
                                                                                                                $('#upload-logo-form-control1').find("input[type=file]").val("");
                                                                                                                $("#mailme-alert1").hide();
                                                                                                                $("#mailme-alert1").html('');

                                                                                                            });
                                                                                                            $('#upload-logo-form2').on('hidden.bs.modal', function () {
                                                                                                                $('.upfrma').removeClass('loader');
                                                                                                                $("#upload-logo-form-control2").show();
                                                                                                                $('#upload-logo-form-control2').find("input[type=file]").val("");
                                                                                                                $("#mailme-alert2").hide();
                                                                                                                $("#mailme-alert2").html('');

                                                                                                            });

                                                                                                            $('#crplogo').on('click', function () {

                                                                                                                $("#upload-logo-form").modal('hide');
                                                                                                                if (parseInt($('#crop1_w').val()))
                                                                                                                    $("#crop-logo-form").modal('hide');
                                                                                                                else
                                                                                                                    alert('Please select a crop region then press submit.');
                                                                                                                return false;

                                                                                                            });
                                                                                                            $('#crplogo1').on('click', function () {
                                                                                                                $("#upload-logo-form1").modal('hide');
                                                                                                                if (parseInt($('#crop2_w').val()))
                                                                                                                    $("#crop-logo-form1").modal('hide');
                                                                                                                else
                                                                                                                    alert('Please select a crop region then press submit.');
                                                                                                                return false;


                                                                                                            });
                                                                                                            $('#crplogo2').on('click', function () {
                                                                                                                //var t = parseInt($('#crop3_w').val());
                                                                                                                $("#upload-logo-form2").modal('hide');
                                                                                                                if (parseInt($('#crop3_w').val()))
                                                                                                                    $("#crop-logo-form2").modal('hide');
                                                                                                                else
                                                                                                                    alert('Please select a crop region then press submit.');
                                                                                                                return false;


                                                                                                            });
                                                                                                            //                                                                    var youtubePattern = /^http:\/\/(?:www\.)?youtube.com\/watch\?(?=.*v=\w+)(?:\S+)?$/i;
                                                                                                            //
                                                                                                            //                                                                    jQuery.validator.addMethod("youtubeVideo", function (value) {
                                                                                                            //                                                                        return youtubePattern.test(value);
                                                                                                            //                                                                    }, "Must be a valid Youtube video");
                                                                                                            $('.actvate_sub').on('click', function () {

                                                                                                                $("#activate_form").valid();


                                                                                                                $("#activate_form").submit();
                                                                                                            });


                                                                                                            $('#art_menu').addClass('active');
                                                                                                            //$("form").valid()
                                                                                                            $('.dataTables-example').DataTable({
                                                                                                                responsive: true,
                                                                                                                'columnDefs': [{'orderable': false, 'targets': -1}], // hide sort icon on this column
                                                                                                                'aaSorting': [[5, 'desc']] // start to sort data on this column
                                                                                                            });
                                                                                                            $(".fl").change(function (e)
                                                                                                            {
                                                                                                                
                                                                                                                var countFiles = $(this)[0].files.length;
                                                                                                                var imgPath = $(this)[0].value;
                                                                                                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                                                                                                if (extn == "mov"  ||  extn == "mp4") {
                                                                                                                    var file = e.currentTarget.files[0];
                                                                                                                    objectUrl = URL.createObjectURL(file);
                                                                                                                    $("#vid").prop("src", objectUrl);
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                       var input = $("input[name=file_name]");
                                                                                                                        input.val('');
                                                                                                                         $("#vid").removeAttr("src");
                                                                                                                        alert("Select Only video format mov,mp4");
                                                                                                                   // alert("Select Only video");
                                                                                                                }

                                                                                                            });
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            /*pdf validation*/
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            /**/
                                                                                                            $("#imageupload").on('change', function () {

                                                                                                                var countFiles = $(this)[0].files.length;
                                                                                                                var imgPath = $(this)[0].value;
                                                                                                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                                                                                                var image_holder = $("#preview-image");
                                                                                                                image_holder.empty();
                                                                                                                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                                                                                                    if (typeof (FileReader) != "undefined") {
                                                                                                                        if (countFiles > 3)
                                                                                                                        {
                                                                                                                            alert("please upload maximum 3 image");
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            for (var i = 0; i < countFiles; i++) {

                                                                                                                                var reader = new FileReader();
                                                                                                                                reader.onload = function (e) {
                                                                                                                                    $("<img />", {
                                                                                                                                        "src": e.target.result,
                                                                                                                                        "class": "thumbimage"
                                                                                                                                    }).appendTo(image_holder);
                                                                                                                                }

                                                                                                                                image_holder.show();
                                                                                                                                reader.readAsDataURL($(this)[0].files[i]);
                                                                                                                            }
                                                                                                                        }


                                                                                                                    } else {
                                                                                                                        alert("It doesn't supports");
                                                                                                                        $("#imageupload").val("");
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    alert("Select Only images");
                                                                                                                    $("#imageupload").val("");
                                                                                                                }
                                                                                                            });
                                                                                                            $("#imageupload1").on('change', function () {

                                                                                                                var countFiles = $(this)[0].files.length;
                                                                                                                var imgPath = $(this)[0].value;
                                                                                                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                                                                                                var image_holder = $("#preview-image1");
                                                                                                                image_holder.empty();
                                                                                                                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                                                                                                    if (typeof (FileReader) != "undefined") {
                                                                                                                        if (countFiles > 3)
                                                                                                                        {
                                                                                                                            alert("please upload maximum 3 image");
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            for (var i = 0; i < countFiles; i++) {

                                                                                                                                var reader = new FileReader();
                                                                                                                                reader.onload = function (e) {
                                                                                                                                    $("<img />", {
                                                                                                                                        "src": e.target.result,
                                                                                                                                        "class": "thumbimage"
                                                                                                                                    }).appendTo(image_holder);
                                                                                                                                }

                                                                                                                                image_holder.show();
                                                                                                                                reader.readAsDataURL($(this)[0].files[i]);
                                                                                                                            }
                                                                                                                        }


                                                                                                                    } else {
                                                                                                                        alert("It doesn't supports");
                                                                                                                        $("#imageupload1").val("");
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    alert("Select Only images");
                                                                                                                    $("#imageupload1").val("");
                                                                                                                }
                                                                                                            });
                                                                                                            $("#imageupload2").on('change', function () {

                                                                                                                var countFiles = $(this)[0].files.length;
                                                                                                                var imgPath = $(this)[0].value;
                                                                                                                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                                                                                                                var image_holder = $("#preview-image2");
                                                                                                                image_holder.empty();
                                                                                                                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                                                                                                                    if (typeof (FileReader) != "undefined") {
                                                                                                                        if (countFiles > 3)
                                                                                                                        {
                                                                                                                            alert("please upload maximum 3 image");
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            for (var i = 0; i < countFiles; i++) {

                                                                                                                                var reader = new FileReader();
                                                                                                                                reader.onload = function (e) {
                                                                                                                                    $("<img />", {
                                                                                                                                        "src": e.target.result,
                                                                                                                                        "class": "thumbimage"
                                                                                                                                    }).appendTo(image_holder);
                                                                                                                                }

                                                                                                                                image_holder.show();
                                                                                                                                reader.readAsDataURL($(this)[0].files[i]);
                                                                                                                            }
                                                                                                                        }


                                                                                                                    } else {
                                                                                                                        alert("It doesn't supports");
                                                                                                                        $("#imageupload2").val("");
                                                                                                                    }
                                                                                                                } else {
                                                                                                                    alert("Select Only images");
                                                                                                                    $("#imageupload2").val("");
                                                                                                                }
                                                                                                            });
                                                                                                            //                                                                                                                                                                                      }
                                                                                                            $('#b1').click(function () { 

                                                                                                                $("#add_edit_form").valid();
                                                                                                                var type_file = $('.type_file').val();
                                                                                                                var url_link = $('.link').val();
                                                                                                                 var author_edit = $('#author_edit').val();
                                                                                                                $(".modal_load").show();
                                                                                                                event.preventDefault();
                                                                                                                //var file_data = $("#imageupload").prop("files")[0];   // Getting the properties of file from file field

                                                                                                                for (instance in CKEDITOR.instances) {
                                                                                                                    CKEDITOR.instances[instance].updateElement();
                                                                                                                }
                                                                                                                var data = new FormData($('#add_edit_form')[0]);
                                                                                                                url = "<?php echo site_url() ?>admin/Dashboard_articles/add_article";
                                                                                                                var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                                                                                                                var messageLength = CKEDITOR.instances['decription'].getData().replace(/<[^>]*>/gi, '').length;     
                                                                                                                if (!messageLength) { 
                                                                                                                   
                                                                                                                    $('#sho_val_err').html('This fiels is required');
                                                                                                                }
                                                                                                                else {
                                                                                                                    $('#sho_val_err').html('');
                                                                                                                }
                                                                                                                if (type_file == '4') {
                                                                                                                    if (url_link.match(p)) {
                                                                                                                        $(".modal_load").hide();
                                                                                                                        //alert('youtube');
                                                                                                                        $.ajax({
                                                                                                                            type: 'post',
                                                                                                                            url: url,
                                                                                                                            data: data,
                                                                                                                            mimeType: "multipart/form-data",
                                                                                                                            contentType: false,
                                                                                                                            cache: false,
                                                                                                                            processData: false,
                                                                                                                            success: function (resp) {
                                                                                                                               // alert(resp);
                                                                                                                                $(".modal_load").hide(); 
                                                                                                                                if (resp == '0')
                                                                                                                                {
                                                                                                                                    alert('Sorry your article not uploaded , try again.');
                                                                                                                                    window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

                                                                                                                                } else if (resp == '')
                                                                                                                                {
                                                                                                                                    alert('Please enter mandatory fields.');
                                                                                                                                    //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                                }
                                                                                                                                else if (url_link == '')
                                                                                                                                {
                                                                                                                                    alert('Please enter youtube link.');
                                                                                                                                }
                                                                                                                                else if (author_edit == '')
                                                                                                                                {
                                                                                                                                    alert('Please enter mandatory fields.');
                                                                                                                                }
                                                                                                                                else if(resp == 'descrip') {
                                                                                                                                  alert( 'Please enter a description' );
                                                                                                                                 
                                                                                                                                  }
                                                                                                                                else
                                                                                                                                {

                                                                                                                                    //alert(resp);
                                                                                                                                    //alert('Article created successfully.')
                                                                                                                                    window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;

                                                                                                                                }
                                                                                                                            },
                                                                                                                            error: function (resp) {
                                                                                                                                //alert(JSON.stringify(resp));
                                                                                                                                console.log('Ajax request not recieved!');
                                                                                                                            }
                                                                                                                        });
                                                                                                                    }
                                                                                                                    else
                                                                                                                    {
                                                                                                                        $(".modal_load").hide();
                                                                                                                        //$('#link').show();
                                                                                                                        alert('Please enter correct youtube url');
                                                                                                                    }

                                                                                                                }
                                                                                                                else if (type_file == '3') {
                                                                                                                    var image_ip = document.getElementById('imageupload')
                                                                                                                    var seconds = $("#vid")[0].duration;

                                                                                                                    if (isNaN(seconds)) {
                                                                                                                        $.ajax({
                                                                                                                            type: 'post',
                                                                                                                            url: url,
                                                                                                                            data: data,
                                                                                                                            mimeType: "multipart/form-data",
                                                                                                                            contentType: false,
                                                                                                                            cache: false,
                                                                                                                            processData: false,
                                                                                                                            success: function (resp) {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                //alert(resp);
                                                                                                                                if (resp == '0')
                                                                                                                                {
                                                                                                                                    alert('Sorry your article not uploaded , try again.');
                                                                                                                                    //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

                                                                                                                                } else if (resp == '' || resp == '00')
                                                                                                                                {
                                                                                                                                    alert('Please enter mandatory fields.');
                                                                                                                                    //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                                }
                                                                                                                                else if (resp == 'image')
                                                                                                                                {
                                                                                                                                    alert('Please select any image.');
                                                                                                                                }
                                                                                                                                else if(resp == 'descrip') {
                                                                                                                                  alert( 'Please enter a description' );
                                                                                                                                 
                                                                                                                                  }
                                                                                                                                else
                                                                                                                                {

                                                                                                                                    //alert(resp);
                                                                                                                                    //alert('Article created successfully.');
                                                                                                                                    window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;
                                                                                                                                }


                                                                                                                            },
                                                                                                                            error: function (resp) {
                                                                                                                                //alert(JSON.stringify(resp));
                                                                                                                                console.log('Ajax request not recieved!');
                                                                                                                            }
                                                                                                                        });
                                                                                                                    }
                                                                                                                                                                                             
                                                                                                                                                                                                                                                                        
                                                                                                                    else
                                                                                                                    {
                                                                                                                        if (seconds <= 180)
                                                                                                                        {
                                                                                                                            $.ajax({
                                                                                                                                type: 'post',
                                                                                                                                url: url,
                                                                                                                                data: data,
                                                                                                                                mimeType: "multipart/form-data",
                                                                                                                                contentType: false,
                                                                                                                                cache: false,
                                                                                                                                processData: false,
                                                                                                                                success: function (resp) {
                                                                                                                                    $(".modal_load").hide();
                                                                                                                                    //alert(resp);
                                                                                                                                    if (resp == '0')
                                                                                                                                    {
                                                                                                                                        alert('Sorry your article not uploaded , try again.');
                                                                                                                                        //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

                                                                                                                                    } else if (resp == '' || resp == '00')
                                                                                                                                    {
                                                                                                                                        alert('Please enter mandatory fields.');
                                                                                                                                        //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                                    }
                                                                                                                                    else if (resp == 'image')
                                                                                                                                    {
                                                                                                                                        alert('Please select any image.');
                                                                                                                                    }
                                                                                                                                    else if(resp == 'descrip') {
                                                                                                                                  alert( 'Please enter a description' );
                                                                                                                                 
                                                                                                                                  }
                                                                                                                                    else
                                                                                                                                    {

                                                                                                                                        //alert(resp);
                                                                                                                                        //alert('Article created successfully.');
                                                                                                                                        window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;
                                                                                                                                    }


                                                                                                                                },
                                                                                                                                error: function (resp) {
                                                                                                                                    //alert(JSON.stringify(resp));
                                                                                                                                    console.log('Ajax request not recieved!');
                                                                                                                                }
                                                                                                                            });
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            $(".modal_load").hide();

                                                                                                                            alert('Video duration should not be more than 3 min');
                                                                                                                        }
                                                                                                                    }


                                                                                                                }
                                                                                                                 else if (type_file == '5') {
																																		 var valus = $('#pdfval').val();
																																		       
																																		  if(valus != ''){
																																		   var ext = $('#pdfval').val().split('.').pop().toLowerCase();
																																			//Allowed file types
																																			if($.inArray(ext, ['pdf']) == -1) {
																																				alert('Please upload the PDF file!');
																																			    // $('.pdf').val("");
																																				$(".modal_load").hide();
																																						return false;
																																			}
																																	 
																																			//Tested in Firefox and Google Chorme
																																			sizee = $("#pdfval")[0].files[0].size; //file size in bytes
																																			sizee = sizee / 1024; //file size in Kb
																																			sizee = sizee / 1024; //file size in Mb
																																			 
																																			//file size more than 10Mb
																																			if (sizee > 10) {
																																				alert("Maximum file size is 10Mb");
																																				$(".modal_load").hide();
																																			}  else {
																																			 //Ajax code to upload file to server
																																			}
																																		 
																																		 
																																		 
																																			//alert('pdf');
																																			$.ajax({
																																				type: 'post',
																																				url: url,
																																				data: data,
																																				mimeType: "multipart/form-data",
																																				contentType: false,
																																				cache: false,
																																				processData: false,
																																				success: function (resp) {
																																					//alert(resp);
																																					$(".modal_load").hide();
																																					if (resp == '0')
																																					{
																																						alert('Sorry your article not uploaded , try again.');
																																						window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

																																					} else if (resp == '' || resp == '00')
                                                                                                                                {
                                                                                                                                    alert('Please enter mandatory fields.');
                                                                                                                                    //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                                }
																																					else
																																					{
																																						//alert(resp);
																																						//alert('Article created successfully.')
																																						window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;

																																					}
																																				},
																																				error: function (resp) {
																																					//alert(JSON.stringify(resp));
																																					console.log('Ajax request not recieved!');
																																				}
																																			});
																																			
																																				}else{
																																				alert("Please upload the file");	
																																				$(".modal_load").hide();												
																																		 }
																																	 }     
                                                                                                                        else if (type_file == '6') {
																																		 var valus = $('#pptval').val();
																																		      var fileExtension = ['ppt', 'pptx']; 
																																		  if(valus != ''){
																																		   var ext = $('#pptval').val().split('.').pop().toLowerCase();
																																			//Allowed file types
																																			if($.inArray(ext, fileExtension) == -1) {
																																				alert('Please upload the PPT file!');
																																			    // $('.pdf').val("");
																																				$(".modal_load").hide();
																																						return false;
																																			}
																																	 
																																			//Tested in Firefox and Google Chorme
																																			sizee = $("#pptval")[0].files[0].size; //file size in bytes
																																			sizee = sizee / 1024; //file size in Kb
																																			sizee = sizee / 1024; //file size in Mb
																																			 
																																			//file size more than 10Mb
																																			if (sizee > 10) {
																																				alert("Maximum file size is 10Mb");
																																				$(".modal_load").hide();
																																			}  else {
																																			 //Ajax code to upload file to server
																																			}
																																		 
																																		 
																																		 
																																			//alert('pdf');
																																			$.ajax({
																																				type: 'post',
																																				url: url,
																																				data: data,
																																				mimeType: "multipart/form-data",
																																				contentType: false,
																																				cache: false,
																																				processData: false,
																																				success: function (resp) {
																																					//alert(resp);
																																					$(".modal_load").hide();
																																					if (resp == '0')
																																					{
																																						alert('Sorry your article not uploaded , try again.');
																																						//window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

																																					} 
																																					else if (resp == '' || resp == '00')
                                                                                                                                {
                                                                                                                                    alert('Please enter mandatory fields.');
                                                                                                                                    //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                                }else
																																					{
																																						//alert(resp);
																																						//alert('Article created successfully.')
																																						window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;

																																					}
																																				},
																																				error: function (resp) {
																																					//alert(JSON.stringify(resp));
																																					console.log('Ajax request not recieved!');
																																				}
																																			});
																																			
																																				}else{
																																				alert("Please upload the file");	
																																				$(".modal_load").hide();												
																																		 }
																																	 }       
                                                                                                                      else {
                                                                                                                    var image_ip = document.getElementById('imageupload')


                                                                                                                    $.ajax({
                                                                                                                        type: 'post',
                                                                                                                        url: url,
                                                                                                                        data: data,
                                                                                                                        mimeType: "multipart/form-data",
                                                                                                                        contentType: false,
                                                                                                                        cache: false,
                                                                                                                        processData: false,
                                                                                                                        success: function (resp) { 
                                                                                                                      //  alert(resp);
                                                                                                                            $(".modal_load").hide();
                                                                                                                            //alert(resp);
                                                                                                                            if (resp == '0')
                                                                                                                            {
                                                                                                                                alert('Sorry your article not uploaded , try again.');
                                                                                                                                //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

                                                                                                                            } else if (resp == '' || resp == '00')
                                                                                                                            {
                                                                                                                                alert('Please enter mandatory fields.');
                                                                                                                                //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                            }
                                                                                                                            else if (resp == 'image')
                                                                                                                            {
                                                                                                                                alert('Please select any image.');
                                                                                                                            }
                                                                                                                            else if(resp == 'descrip' ) {
                                                                                                                                  alert( 'Please enter a description' );
                                                                                                                                 
                                                                                                                                  }
                                                                                                                            else
                                                                                                                            {

                                                                                                                                //alert(resp);
                                                                                                                                //alert('Article created successfully.');
                                                                                                                                window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;
                                                                                                                            }


                                                                                                                        },
                                                                                                                        error: function (resp) {
                                                                                                                            //alert(JSON.stringify(resp));
                                                                                                                            console.log('Ajax request not recieved!');
                                                                                                                        }
                                                                                                                    });
                                                                                                                }




                                                                                                            });
                                                                                                            
                                                                                                            
                                                                                                        
                                                                                                            $(".article_edit_button").click(function (e)
                                                                                                            {
                                                                                                               // alert("oooo");
//                                                                                                                var question = $('#question').val();
//                                                                                                                    var option1 = $('#option1').val();
//                                                                                                                    var option2 = $('#option2').val();
//                                                                                                                    var option3 = $('#option3').val();
//                                                                                                                    var option4 = $('#option4').val();
//                                                                                                                    var answer_key = $('#answer_key').val();
                                                                                                                var messageLength = CKEDITOR.instances['decription'].getData().replace(/<[^>]*>/gi, '').length;
                                                                                                                if (!messageLength) {
                                                                                                                    $('#sho_val_err').html('This fiels is required');
                                                                                                                }
                                                                                                                else {
                                                                                                                    $('#sho_val_err').html('');
                                                                                                                }
                                                                                                                if ($("#article_edit_form").valid()) {
                                                                                                               //     alert(img_type);
                                                                                                                    var messageLength = CKEDITOR.instances['decription'].getData().replace(/<[^>]*>/gi, '').length;
                                                                                                                    if (!messageLength) {
                                                                                                                        $('#sho_val_err').html('This fiels is required');
                                                                                                                    }
                                                                                                                    else if ((answer_key !== '' && question !== '' && option1 !== '' && option2 !== '' && option3 !== '' && option4 !== '')) {
                                                                                                                            $('#sho_val_err').html('');

                                                                                                                            $(".modal_load").show();
                                                                                                                            //event.preventDefault();
                                                                                                                            var img_type = $('#img_type').val();

                                                                                                                            var url_link = $('.link').val();
                                                                                                                            var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                                                                                                                            if (img_type === '2') {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                            }
                                                                                                                            else if (img_type === '3') {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                var seconds = $("#vid")[0].duration;
                                                                                                                                if (isNaN(seconds)) {
                                                                                                                                    $("#article_edit_form").submit();
                                                                                                                                }
                                                                                                                               
                                                                                                                                else {
                                                                                                                                    if (seconds <= 180) {
                                                                                                                                        $("#article_edit_form").submit();
                                                                                                                                    }
                                                                                                                                    else
                                                                                                                                    {

                                                                                                                                        alert('Video duration should not be more than 3 min');
                                                                                                                                    }
                                                                                                                                }

                                                                                                                            }  
                                                                                                                      else if (img_type === '5') {
                                                                                                                               // alert("ji");
                                                                                                                        var valus = $('#pdf').val(); 
                                                                                                                        if(valus != '')
                                                                                                                       {
                                                                                                                        var ext = $('#pdf').val().split('.').pop().toLowerCase();
                                                                                                                       //Allowed file types
                                                                                                                         if($.inArray(ext, ['pdf']) == -1) 
                                                                                                                         {
                                                                                                                           alert('Please upload the PDF file!');
                                                                                                                           $('#pdf_error_edit').html('Please select the PDF file!');
                                                                                                                           $('#pdf_error_edit').focus();
                                                                                                                         // $('.pdf').val("");
                                                                                                                           $(".modal_load").hide();
                                                                                                                          return false;		
                                                                                                                         }
                                                                                                                     }
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                                
                                                                                                                            }
                                                                                                                        else if (img_type === '6') 
                                                                                                                        {
                                                                                                                                 var valus = $('#ppt').val(); 
                                                                                                                              if(valus != '')
                                                                                                                            {
                                                                                                                                    var ext = $('#ppt').val().split('.').pop().toLowerCase();
                                                                                                                                   var fileExtension = ['ppt', 'pptx']; 
                                                                                                                       //Allowed file types
                                                                                                                               if($.inArray(ext, fileExtension) == -1) {
                                                                                                                                   alert('Please upload the PPT file!');
                                                                                                                                    $('#ppt_error_edit').html('Please select the PPT,PPTX file!');
                                                                                                                                   $('#ppt_error_edit').focus();
                                                                                                                               // $('.pdf').val("");
                                                                                                                                $(".modal_load").hide();
                                                                                                                               return false;		
                                                                                                                            }
                                                                                                                     }
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                                
                                                                                                                            }
                                                                                                                            else {
                                                                                                                                if (url_link.match(p)) {
                                                                                                                                    $(".modal_load").hide();
                                                                                                                                    $('#link').hide();
                                                                                                                                    $("#article_edit_form").submit();
                                                                                                                                }
                                                                                                                                else
                                                                                                                                {
                                                                                                                                    $(".modal_load").hide();
                                                                                                                                    $('#link').show();
                                                                                                                                    alert('Please enter correct youtube url');
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
//                                                                                                                        else if ((answer_key !== '' || question !== '' || option1 !== '' || option2 !== '' || option3 !== '' || option4 !== '')) {
//                                                                                                                           // alert('hi');
//                                                                                                                            if (answer_key !== '') {
//                                                                                                                                //$('#question_error_edit').html('This field is required');
//                                                                                                                                if (question == '') {
//                                                                                                                                    $('#question_error_edit').html('If any one  of field is entered in quiz section, Quizt field should not be empty');
//                                                                                                                                    $('#question_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option1 == '') {
//                                                                                                                                    $('#option1_error_edit').html('If any one  of field is entered in quiz section, option1 should not be empty');
//                                                                                                                                    $('#option1_error_edit').focus();
//                                                                                                                                }
//
//                                                                                                                                if (option2 == '') {
//                                                                                                                                    $('#option2_error_edit').html('If any one  of field is entered in quiz section, option2 field should not be empty');
//                                                                                                                                    $('#option2_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option3 == '') {
//                                                                                                                                    $('#option3_error_edit').html('If any one  of field is entered in quiz section, option3 field should not be empty');
//                                                                                                                                    $('#option3_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option4 == '') {
//                                                                                                                                    $('#option4_error_edit').html('If any one  of field is entered in quiz section, option4 field should not be empty');
//                                                                                                                                    $('#option4_error_edit').focus();
//                                                                                                                                }
//
//                                                                                                                            }
//                                                                                                                            else if (question !== '') {
//                                                                                                                                //$('#question_error_edit').html('This field is required');
//                                                                                                                                if (option1 == '') {
//                                                                                                                                    $('#option1_error_edit').html('If any one  of field is entered in quiz section, option1 should not be empty');
//                                                                                                                                    $('#option1_error_edit').focus();
//                                                                                                                                }
//
//                                                                                                                                if (option2 == '') {
//                                                                                                                                    $('#option2_error_edit').html('If any one  of field is entered in quiz section, option2 field should not be empty');
//                                                                                                                                    $('#option2_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option3 == '') {
//                                                                                                                                    $('#option3_error_edit').html('If any one  of field is entered in quiz section, option3 field should not be empty');
//                                                                                                                                    $('#option3_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option4 == '') {
//                                                                                                                                    $('#option4_error_edit').html('If any one  of field is entered in quiz section, option4 field should not be empty');
//                                                                                                                                    $('#option4_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (answer_key == '') {
//                                                                                                                                    $('#answer_key_error_edit').html('If any one  of field is entered in quiz section, answer_ key field should not be empty');
//                                                                                                                                    $('#answer_key_error_edit').focus();
//                                                                                                                                }
//
//
//                                                                                                                            }
//                                                                                                                            else if (option1 !== '') {
//                                                                                                                                if (question == '') {
//                                                                                                                                    $('#question_error_edit').html('If any one  of field is entered in quiz section, Quizt field should not be empty');
//                                                                                                                                    $('#question_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option2 == '') {
//                                                                                                                                    $('#option2_error_edit').html('If any one  of field is entered in quiz section, option2 field should not be empty');
//                                                                                                                                    $('#option2_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option3 == '') {
//                                                                                                                                    $('#option3_error_edit').html('If any one  of field is entered in quiz section, option3 field should not be empty');
//                                                                                                                                    $('#option3_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option4 == '') {
//                                                                                                                                    $('#option4_error_edit').html('If any one  of field is entered in quiz section, option4 field should not be empty');
//                                                                                                                                    $('#option4_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (answer_key == '') {
//                                                                                                                                    $('#answer_key_error_edit').html('If any one  of field is entered in quiz section, answer key field should not be empty');
//                                                                                                                                    $('#answer_key_error_edit').focus();
//                                                                                                                                }
//                                                                                                                            }
//                                                                                                                            else if (option2 !== '') {
//                                                                                                                                // $('#option2_error_edit').show();
//                                                                                                                                if (question == '') {
//                                                                                                                                    $('#question_error_edit').html('If any one  of field is entered in quiz section, Quiz field should not be empty');
//                                                                                                                                    $('#question_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option1 == '') {
//                                                                                                                                    $('#option1_error_edit').html('If any one  of field is entered in quiz section, option1 field hould not be empty');
//                                                                                                                                    $('#option1_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option3 == '') {
//                                                                                                                                    $('#option3_error_edit').html('If any one  of field is entered in quiz section, option3 field should not be empty');
//                                                                                                                                    $('#option3_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option4 == '') {
//                                                                                                                                    $('#option4_error_edit').html('If any one  of field is entered in quiz section, option4 field should not be empty');
//                                                                                                                                    $('#option4_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (answer_key == '') {
//                                                                                                                                    $('#answer_key_error_edit').html('If any one  of field is entered in quiz section, answer key field should not be empty');
//                                                                                                                                    $('#answer_key_error_edit').focus();
//                                                                                                                                }
//                                                                                                                            }
//                                                                                                                            else if (option3 !== '') {
//                                                                                                                                // $('#option3_error_edit').show();
//
//                                                                                                                                if (question == '') {
//                                                                                                                                    $('#question_error_edit').html('If any one  of field is entered in quiz section, Quiz field should not be empty');
//                                                                                                                                    $('#question_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option1 == '') {
//                                                                                                                                    $('#option1_error_edit').html('If any one  of field is entered in quiz section, option1 field should not be empty');
//                                                                                                                                    $('#option1_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option2 == '') {
//                                                                                                                                    $('#option2_error_edit').html('If any one  of field is entered in quiz section, option2 field should not be empty');
//                                                                                                                                    $('#option2_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option4 == '') {
//                                                                                                                                    $('#option4_error_edit').html('If any one  of field is entered in quiz section, option4 field should not be empty');
//                                                                                                                                    $('#option4_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (answer_key == '') {
//                                                                                                                                    $('#answer_key_error_edit').html('If any one  of field is entered in quiz section, answer key field should not be empty');
//                                                                                                                                    $('#answer_key_error_edit').focus();
//                                                                                                                                }
//                                                                                                                            }
//                                                                                                                            else if (option4 !== '') {
//                                                                                                                                // $('#option4_error_edit').show();
//                                                                                                                                if (question == '') {
//                                                                                                                                    $('#question_error_edit').html('If any one  of field is entered in quiz section, Quiz field should not be empty');
//                                                                                                                                    $('#question_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option1 == '') {
//                                                                                                                                    $('#option1_error_edit').html('If any one  of field is entered in quiz section, option1 field should not be empty');
//                                                                                                                                    $('#option1_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option3 == '') {
//                                                                                                                                    $('#option3_error_edit').html('If any one  of field is entered in quiz section, option3 field should not be empty');
//                                                                                                                                    $('#option3_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (option2 == '') {
//                                                                                                                                    $('#option2_error_edit').html('If any one  of field is entered in quiz section, option2 field should not be empty');
//                                                                                                                                    $('#option2_error_edit').focus();
//                                                                                                                                }
//                                                                                                                                if (answer_key == '') {
//                                                                                                                                    $('#answer_key_error_edit').html('If any one  of field is entered in quiz section, answer key field should not be empty');
//                                                                                                                                    $('#answer_key_error_edit').focus();
//                                                                                                                                }
//                                                                                                                            }
//                                                                                                                        }
                                                                                                                    else {
                                                                                                                        $('#sho_val_err').html('');
                                                                                                                        event.preventDefault();
                                                                                                                        $(".modal_load").show();
                                                                                                                        var img_type = $('#img_type').val();

                                                                                                                        var url_link = $('.link').val();
                                                                                                                        var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                                                                                                                        if (img_type === '2') { 
                                                                                                                            $(".modal_load").hide();
                                                                                                                            $("#article_edit_form").submit();
                                                                                                                        }
                                                                                                                        else if (img_type === '3') {
                                                                                                                            $(".modal_load").hide();
                                                                                                                            var seconds = $("#vid")[0].duration;
                                                                                                                            if (isNaN(seconds)) {
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                            }
                                                                                                                            else {
                                                                                                                                if (seconds <= 180) {
                                                                                                                                    $("#article_edit_form").submit();
                                                                                                                                }
                                                                                                                                else
                                                                                                                                {

                                                                                                                                    alert('Video duration should not be more than 3 min');
                                                                                                                                }
                                                                                                                            }

                                                                                                                        }else if (img_type === '5') {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                                
                                                                                                                            } else if (img_type === '6') {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                                
                                                                                                                            }else {
                                                                                                                            if (url_link.match(p)) {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $('#link').hide();
                                                                                                                                $("#article_edit_form").submit();
                                                                                                                            }
                                                                                                                            else
                                                                                                                            {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                $('#link').show();
                                                                                                                                alert('Please enter correct youtube url');
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }


                                                                                                                }

                                                                                                            });

                                                                                                            $('#b11').click(function () {

                                                                                                                $("#add_edit_form").valid();
                                                                                                                $(".modal_load").show();
                                                                                                                event.preventDefault();
                                                                                                                //var file_data = $("#imageupload").prop("files")[0];   // Getting the properties of file from file field

                                                                                                                for (instance in CKEDITOR.instances) {
                                                                                                                    CKEDITOR.instances[instance].updateElement();
                                                                                                                }
                                                                                                                var data = new FormData($('#add_edit_form')[0]);
                                                                                                                url = "<?php echo site_url() ?>admin/Dashboard_articles/add_article";
                                                                                                                $.ajax({
                                                                                                                    type: 'post',
                                                                                                                    url: url,
                                                                                                                    data: data,
                                                                                                                    mimeType: "multipart/form-data",
                                                                                                                    contentType: false,
                                                                                                                    cache: false,
                                                                                                                    processData: false,
                                                                                                                    success: function (resp) {
                                                                                                                        $(".modal_load").hide();
                                                                                                                        
                                                                                                                        if (resp == '0')
                                                                                                                        {
                                                                                                                            alert('Sorry your article not uploaded , try again.');
                                                                                                                            //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"

                                                                                                                        } else if (resp == '00')
                                                                                                                        {
                                                                                                                            alert('Please enter mandatory fields.');
                                                                                                                            //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            //alert(resp);
                                                                                                                            alert('Article created successfully.')
                                                                                                                            window.location.href = "<?php echo site_url() ?>/admin/Dashboard_quiz/index/" + resp;
                                                                                                                        }


                                                                                                                    },
                                                                                                                    error: function (resp) {
                                                                                                                        //alert(JSON.stringify(resp));
                                                                                                                        console.log('Ajax request not recieved!');
                                                                                                                    }
                                                                                                                });
                                                                                                            });
                                                                                                            $('#b2').click(function () {
                                                                                                                $("#add_edit_form").valid();
                                                                                                                $(".modal_load").show();
                                                                                                                event.preventDefault();
                                                                                                                //var file_data = $("#imageupload").prop("files")[0];   // Getting the properties of file from file field

                                                                                                                for (instance in CKEDITOR.instances) {
                                                                                                                    CKEDITOR.instances[instance].updateElement();
                                                                                                                }
                                                                                                                var data = new FormData($('#add_edit_form')[0]);
                                                                                                                url = "<?php echo site_url() ?>admin/Dashboard_articles/add_article";
                                                                                                                var seconds = $("#vid")[0].duration;
                                                                                                                alert(seconds);
                                                                                                                if (seconds <= 180) {
                                                                                                                    $.ajax({
                                                                                                                        type: 'post',
                                                                                                                        url: url,
                                                                                                                        data: data,
                                                                                                                        mimeType: "multipart/form-data",
                                                                                                                        contentType: false,
                                                                                                                        cache: false,
                                                                                                                        processData: false,
                                                                                                                        success: function (resp) {alert(resp);
                                                                                                                            //window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/index/2";
                                                                                                                            //$('#container').html(resp);
                                                                                                                            //console.log(resp)
                                                                                                                            $(".modal_load").hide();
                                                                                                                            if (resp)
                                                                                                                            {
                                                                                                                                //$(".modal").hide();
                                                                                                                                alert(resp);
                                                                                                                                window.location.href = "<?php echo site_url() ?>admin/Dashboard_quiz/index/" + resp;
                                                                                                                            } else
                                                                                                                            {
                                                                                                                                //$(".modal").hide();
                                                                                                                                alert('Sorry your article not uploaded , try again.');
                                                                                                                                window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/add_edit_article"
                                                                                                                            }
                                                                                                                            //alert(resp);
                                                                                                                            // window.location.href = "<?php echo site_url() ?>admin/Dashboard_articles/index/<?php echo $this->ion_auth->user()->row()->id; ?>";
                                                                                                                        },
                                                                                                                        error: function (resp) {
                                                                                                                            //alert(JSON.stringify(resp));
                                                                                                                            //$(".modal").hide();
                                                                                                                            console.log('Ajax request not recieved!');
                                                                                                                        }
                                                                                                                    });
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                    alert('Video duration should not be more than 3 min');
                                                                                                                }

                                                                                                            });
                                                                                                            $('.image_rows').hide();
                                                                                                            $('.video_row').hide();
                                                                                                            $('.link_row').hide();
                                                                                                            $('.pdf').hide();
                                                                                                            $('.ppt').hide();$('.ppt_row').hide();
                                                                                                            //$('.demo11').hide();
                                                                                                            $(document).on('change', '.type_file', function () {
                                                                                                                $(".modal_load").show();
                                                                                                                var type = $('.type_file').val();
                                                                                                                if (type == '5')
                                                                                                                {
                                                                                                                    $(".modal_load").hide();
                                                                                                                    $('.video_row').hide();
                                                                                                                    $('.link_row').hide();
                                                                                                                    $('.image_rows').hide();
                                                                                                                    $('.pdf').show();
                                                                                                                    $('.ppt_row').hide();
                                                                                                                    $('.add_edit_button').attr('id', 'b1');
                                                                                                                }
                                                                                                                
                                                                                                                
                                                                                                                 if (type == '6')
                                                                                                                {
                                                                                                                    $('.ppt_row').show();
                                                                                                                    $('.ppt').show();
                                                                                                                    $(".modal_load").hide();
                                                                                                                    $('.video_row').hide();
                                                                                                                    $('.link_row').hide();
                                                                                                                    $('.image_rows').hide();
                                                                                                                    $('.pdf').hide();
                                                                                                                    $('.add_edit_button').attr('id', 'b1');
                                                                                                                }
                                                                                                                if (type == '2')
                                                                                                                {
                                                                                                                    $('.pdf').hide();
                                                                                                                    $(".modal_load").hide();
                                                                                                                    $('.video_row').hide();
                                                                                                                    $('.link_row').hide();
                                                                                                                    $('.image_rows').show();  $('.ppt_row').hide();
                                                                                                                    $('.add_edit_button').attr('id', 'b1');
                                                                                                                }

                                                                                                                if (type == '3')
                                                                                                                {
                                                                                                                    $('.pdf').hide();
                                                                                                                    $(".modal_load").hide();
                                                                                                                    $('.image_rows').hide();
                                                                                                                    $('.link_row').hide(); $('.ppt_row').hide();
                                                                                                                    $('.video_row').show();
                                                                                                                    $('.add_edit_button').attr('id', 'b2');
                                                                                                                }

                                                                                                                if (type == '4')
                                                                                                                {
                                                                                                                    $('.pdf').hide(); $('.ppt_row').hide();
                                                                                                                    $('.link_row').show();
                                                                                                                    $(".modal_load").hide();
                                                                                                                    $('.video_row').hide();
                                                                                                                    $('.image_rows').hide();
                                                                                                                    // $('.demo11').hide();
                                                                                                                    $('.add_edit_button').attr('id', 'b3');
                                                                                                                }
                                                                                                                
                                                                                                                 
                                                                                                            });
                                                                                                            $(document).on('click', '.model_form', function () {
                                                                                                                $('#form_modal').modal({
                                                                                                                    keyboard: false,
                                                                                                                    show: true,
                                                                                                                    backdrop: 'static'
                                                                                                                });
                                                                                                                $('label.error').hide();
                                                                                                                var data = eval($(this).attr('data1'));
                                                                                                                var iddata = data.id;
                                                                                                                if (!iddata)
                                                                                                                {
                                                                                                                    //$('.select_maincategory').show();
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                    //$('.select_maincategory').hide();
                                                                                                                }
                                                                                                                $('#option1').val(data.option1);
                                                                                                                $('#option2').val(data.option2);
                                                                                                                $('#option3').val(data.option3);
                                                                                                                $('#option4').val(data.option4);
                                                                                                                $('#answer_key').val(data.answer_key);
                                                                                                                $('#quiz_id').val(data.quiz_id);
                                                                                                            });
                                                                                                            $(document).on('click', '.model_form', function () {
                                                                                                                $('#form_modal').modal({
                                                                                                                    keyboard: false,
                                                                                                                    show: true,
                                                                                                                    backdrop: 'static'
                                                                                                                });
                                                                                                                $('label.error').hide();
                                                                                                                var data = eval($(this).attr('data1'));
                                                                                                                var iddata = data.id;
                                                                                                                if (!iddata)
                                                                                                                {
                                                                                                                    //$('.select_maincategory').show();
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                    //$('.select_maincategory').hide();
                                                                                                                }
                                                                                                                $('#name1').val(data.name);
                                                                                                                $('#id').val(data.id);
                                                                                                            });
                                                                                                            $(document).on('change', '.check_tag', function () {
                                                                                                                //var str = "";

                                                                                                                var foo = [];
                                                                                                                $('.check_tag :selected').each(function (i, selected) {
                                                                                                                    foo[i] = $(selected).text();
                                                                                                                });
                                                                                                                var get_val = foo.length;
                                                                                                                if (get_val == 4)
                                                                                                                {

                                                                                                                    $('.check_tag').attr('data-role', 'tagsinput1');
                                                                                                                }
                                                                                                                if (get_val > 5)
                                                                                                                {
                                                                                                                    // alert('You cant enter maximum  5 tags name');
                                                                                                                }
                                                                                                                else
                                                                                                                {
                                                                                                                    $('.check_tag').attr('data-role', 'tagsinput');
                                                                                                                }
                                                                                                            });
                                                                                                            $(document).on('click', '.model_form_view', function () {
                                                                                                                $('#image_view').hide();
                                                                                                                $('#form_modal_view').modal({
                                                                                                                    keyboard: false,
                                                                                                                    show: true,
                                                                                                                    backdrop: 'static'
                                                                                                                });
                                                                                                                var data = eval($(this).attr('data'));
                                                                                                                var id = data.id;
                                                                                                                var uploadpath = 'assets/uploads/profile_image';
                                                                                                                $('#view_username').html(data.username);
                                                                                                                //$('#view_email').html(data.email);
                                                                                                                $('#view_company').html(data.company);
                                                                                                                $('#view_department').html(data.department);
                                                                                                                //$('#view_empid').html(data.empid);
                                                                                                                $('#view_phone').html(data.phone);
                                                                                                                $('#id').val(data.id);
                                                                                                                var email = data.email
                                                                                                                var empid = data.empid

                                                                                                                var not_available = "<button type='button' class='btn btn-info'>N/A</button>";
                                                                                                                var raw_name1 = data.raw_name;
                                                                                                                if (email == '')
                                                                                                                {
                                                                                                                    $('#view_email').html(not_available);
                                                                                                                }
                                                                                                                else
                                                                                                                {

                                                                                                                    $('#view_email').html(data.email);
                                                                                                                }
                                                                                                                if (empid == '')
                                                                                                                {
                                                                                                                    $('#view_empid').html(not_available);
                                                                                                                }
                                                                                                                else
                                                                                                                {

                                                                                                                    $('#view_empid').html(data.empid);
                                                                                                                }
                                                                                                                if (raw_name1 !== "null")
                                                                                                                {

                                                                                                                    // var image = uploadpath + "/" + "noimage.jpg";
                                                                                                                    // htmlimage = "<img  style='display: inline-block;width: 140px;height: 150px;' class='thumbnail' src=" + "'<?php echo base_url(); ?>" + image + "'" + ">";
                                                                                                                    var raw_name = data.raw_name;
                                                                                                                    var file_ext = data.file_ext;
                                                                                                                    if (raw_name !== null)
                                                                                                                    {
                                                                                                                        var image = uploadpath + "/" + raw_name + file_ext;
                                                                                                                    }
                                                                                                                    else
                                                                                                                    {
                                                                                                                        var image = uploadpath + "/" + "noimage.png";
                                                                                                                    }

                                                                                                                    //var image = uploadpath + "/" + "noimage.png";
                                                                                                                    htmlimage = "<img  style='display: inline-block;width: 150px;height: 150px;' class='thumbnail' src=" + "'<?php echo base_url(); ?>" + image + "'" + ">";
                                                                                                                    $('.append_img1').html(htmlimage);
                                                                                                                }



                                                                                                            });
                                                                                                            $(document).on('click', '.status_check', function () {
                                                                                                                if (confirm("Are you sure to delete data")) {
                                                                                                                    $(".modal_load").show();
                                                                                                                    var current_element = $(this);
                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_articles/delete_article";
                                                                                                                    $.ajax({
                                                                                                                        type: "POST",
                                                                                                                        url: url,
                                                                                                                        data: {at_id: $(current_element).attr('data')},
                                                                                                                        success: function (data)
                                                                                                                        {
                                                                                                                            if (data) {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                alert("Successfully Deleted");
                                                                                                                                location.reload();
                                                                                                                            } else
                                                                                                                            {
                                                                                                                                alert("You cant delete this category.");
                                                                                                                                location.reload();
                                                                                                                            }
                                                                                                                            //alert("Successfully Deleted");
                                                                                                                            //location.reload();

                                                                                                                        }
                                                                                                                    });
                                                                                                                }

                                                                                                            });
                                                                                                            $(document).on('click', '.status_check1', function () {
                                                                                                                if (confirm("Are you sure to delete data")) {
                                                                                                                    $(".modal_load").show();
                                                                                                                    var current_element = $(this);
                                                                                                                    // alert ()
                                                                                                                    url = "<?php echo site_url() ?>admin/dashbord_category/delete_maincategory";
                                                                                                                    //alert(url);
                                                                                                                    $.ajax({
                                                                                                                        type: "POST",
                                                                                                                        url: url,
                                                                                                                        data: {ct_id: $(current_element).attr('data')},
                                                                                                                        success: function (data)
                                                                                                                        {
                                                                                                                            alert(data);
                                                                                                                            if (data) {
                                                                                                                                $(".modal_load").hide();
                                                                                                                                alert("Successfully Deleted");
                                                                                                                                //location.reload();
                                                                                                                            } else
                                                                                                                            {
                                                                                                                                alert("You cant delete this category.");
                                                                                                                                //location.reload();
                                                                                                                            }
                                                                                                                            //alert("Successfully Deleted");
                                                                                                                            //location.reload();

                                                                                                                        }
                                                                                                                    });
                                                                                                                }

                                                                                                            });
                                                                                                            $('#cat_row').hide();
                                                                                                            $('a.edit_cat').click(function () {
                                                                                                                $('#cat_row').toggle(400);
                                                                                                                $("#cat_row").load(location.href + " #cat_row");
                                                                                                            });
                                                                                                            $(document).on('change', '.category_id', function () {
                                                                                                                // $('.category_id').on('change', 'select', function() {
                                                                                                                $('.sub_subcategory').html('');
                                                                                                                $('.sub_sub_subcategory').html('');
                                                                                                                $('#subcategory_id').html('');
                                                                                                                $(".modal_load").show();
                                                                                                                var value = $(this).val();
                                                                                                                var url = "<?php echo site_url() ?>admin/Dashboard_articles/subcategory/" + value;
                                                                                                                $.ajax({
                                                                                                                    url: url,
                                                                                                                    success: function (data)
                                                                                                                    {

                                                                                                                        if (data)
                                                                                                                        {
                                                                                                                            $('.sub_subcategory').hide();
                                                                                                                            $('.sub_sub_subcategory').hide();
                                                                                                                            $('#subcategory_id').html(data);
                                                                                                                        } else
                                                                                                                        {
                                                                                                                            var result = '<option value="" selected="selected">Subcategory not found</option>';

                                                                                                                            $('#subcategory_id').html(result);
                                                                                                                            $('.sub_subcategory').hide();
                                                                                                                            $('.sub_sub_subcategory').hide();
                                                                                                                        }
                                                                                                                        $(".modal_load").hide();
                                                                                                                    }
                                                                                                                });
                                                                                                                $('#subcategory_id').select("val", "");
                                                                                                            });
                                                                                                            $(document).on('change', '.get_sub_sub_cat', function () {

                                                                                                                $(".modal_load").show();
                                                                                                                var value = $(this).val();
                                                                                                                var url = "<?php echo site_url() ?>admin/Dashboard_articles/sub_subcategory/" + value;
                                                                                                                $.ajax({
                                                                                                                    url: url,
                                                                                                                    success: function (data)
                                                                                                                    {

                                                                                                                        if (data)
                                                                                                                        {
                                                                                                                            $('.sub_subcategory').show();
                                                                                                                            $('.sub_subcategory').html(data);
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            $('.sub_subcategory').hide();
                                                                                                                            $('.sub_sub_subcategory').hide();
                                                                                                                        }

                                                                                                                        $(".modal_load").hide();
                                                                                                                    }
                                                                                                                });
                                                                                                                $('#sub_subcategory_id').select("val", "");
                                                                                                            });
                                                                                                            $(document).on('change', '.get_sub_sub_sub_cat', function () {
                                                                                                                $(".modal_load").show();
                                                                                                                var value = $(this).val();
                                                                                                                var url = "<?php echo site_url() ?>admin/Dashboard_articles/sub_sub_subcategory/" + value;
                                                                                                                $.ajax({
                                                                                                                    url: url,
                                                                                                                    success: function (data)
                                                                                                                    {

                                                                                                                        if (data)
                                                                                                                        {
                                                                                                                            $('.sub_sub_subcategory').show();
                                                                                                                            $('.sub_sub_subcategory').html(data);
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                            $('.sub_sub_subcategory').hide();
                                                                                                                        }

                                                                                                                        $(".modal_load").hide();
                                                                                                                    }
                                                                                                                });
                                                                                                                $('#sub_sub_subcategory_id').select("val", "");
                                                                                                            });
                                                                                                            $(document).on('click', '.approve_status', function () {
                                                                                                                if (confirm("Are you sure to do this action")) {
                                                                                                                    $(".modal_load").show();
                                                                                                                    var current_element = $(this).val();
                                                                                                                    //alert(current_element);
                                                                                                                    if ($(this).hasClass("btn-primary"))
                                                                                                                        var status = 1;
                                                                                                                    else
                                                                                                                        var status = 0;
                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_users/approve_status";
                                                                                                                    $.ajax({
                                                                                                                        type: "POST",
                                                                                                                        url: url,
                                                                                                                        data: {user_id: current_element, status: status},
                                                                                                                        success: function (data)
                                                                                                                        {
                                                                                                                            $(".modal_load").hide();
                                                                                                                            location.reload();
                                                                                                                            //if (status)
                                                                                                                            // $(current_element).addClass('fa-check-circle').removeClass('fa-times-circle');
                                                                                                                            // else
                                                                                                                            //$(current_element).removeClass('fa-check-circle').addClass('fa-times-circle');
                                                                                                                        }
                                                                                                                    });
                                                                                                                }

                                                                                                            });
                                                                                                            $(document).on('click', '.view_imagepopup', function () {
                                                                                                                var imagedata = eval($(this).attr('image_data'));
                                                                                                                var titledata = $(this).attr('title_data');
                                                                                                                var htmlimage1 = '';
                                                                                                                var imagedataArray = imagedata;
                                                                                                                // alert(imagedataArray[0].type);
                                                                                                                var arrayLength = imagedataArray.length;
                                                                                                                //alert(arrayLength);
                                                                                                                for (var i = 0; i < arrayLength; i++) {
                                                                                                                    if (imagedataArray[i].type == '2')
                                                                                                                        var uploadpath = 'assets/uploads/posting_videos';
                                                                                                                    else
                                                                                                                        var uploadpath = 'assets/uploads/posting_image';
                                                                                                                    var image = uploadpath + "/" + imagedataArray[i].raw_name + imagedataArray[i].file_ext;
                                                                                                                    if (imagedataArray[i].type == '2')
                                                                                                                    {
                                                                                                                        htmlimage = "<video width='80%'  controls ><source  src=" + "'<?php echo base_url(); ?>" + image + "'" + "type='video/mp4'></video>"
                                                                                                                        //htmlimage= "<iframe width='70%' height='350' src="+"'<?php echo base_url(); ?>"+image+"'"+ "</iframe>";
                                                                                                                    }
                                                                                                                    else
                                                                                                                    {
                                                                                                                        htmlimage = "<img  style='display: inline-block;width: 200px;height: 200px;' class='thumbnail' src=" + "'<?php echo base_url(); ?>" + image + "'" + ">";
                                                                                                                    }
                                                                                                                    //alert(htmlimage);
                                                                                                                    var htmlimage1 = htmlimage1 + htmlimage;
                                                                                                                }
                                                                                                                $('.img1').html(htmlimage1);
                                                                                                                $('.tit').html(titledata);
                                                                                                                $('#image_form').modal({
                                                                                                                    keyboard: false,
                                                                                                                    show: true,
                                                                                                                    backdrop: 'static'
                                                                                                                });
                                                                                                            });
                                                                                                            $('.quiz_add_button').click(function () {
                                                                                                                $('#quiz_add_edit_form').validate();
                                                                                                                $('#quiz_add_edit_form').submit();
                                                                                                            });
                                                                                                            $(document).on('click', '.status_check_active', function () {
                                                                                                                 $('#DeleteModal').modal({
                                            keyboard: false,
                                            show: true,
                                            backdrop: 'static'
                                        });
//                                                                                                                if (confirm("Are you sure want to perform this operation ?")) {
//                                                                                                                    $(".modal_load").show();
//                                                                                                                    var id = $(this).attr('data');
//                                                                                                                    var status = $(this).attr('data_status');
//                                                                                                                    // alert ($(current_element).attr('data'))
//                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_articles/active";
//                                                                                                                    //alert(url);
//                                                                                                                    $.ajax({
//                                                                                                                        type: "POST",
//                                                                                                                        url: url,
//                                                                                                                        data: {id: id, status: status},
//                                                                                                                        success: function (data)
//                                                                                                                        {
//
//                                                                                                                            alert("Successfully Deleted");
//                                                                                                                            $(".modal_load").hide();
//                                                                                                                           // location.reload();
//                                                                                                                        }
//                                                                                                                    });
//                                                                                                                }

                                                                                                            });
                                                                                                      
                                                                                                      
        $(document).on('click', '#deleteformSubmit', function () 
         {   $(".modal_load").show();
              var id = $('#active_id_status').val();
                 var status = $('#active_status_status').val();
                                                                                                                    // alert ($(current_element).attr('data'))
                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_articles/active";
                                                                                                                    //alert(url);
                                                                                                                    $.ajax({
                                                                                                                        type: "POST",
                                                                                                                        url: url,
                                                                                                                        data: {id: id, status: status},
                                                                                                                        success: function (data)
                                                                                                                        {

//                                                                                                                            alert("Successfully Deleted");
                                                                                                                            $(".modal_load").hide();
                                                                                                                            location.reload();
                                                                                                                        }
                                                                                                                    });
                   });                          
                                                                                                      
                                                                                                    
                                                                                                    
                    $(document).on('click', '.status_check_deactive', function () {
                                   
                                     $('#DeleteModaldeactive').modal({
                                            keyboard: false,
                                            show: true,
                                            backdrop: 'static'
                                        });
//                                                                                                                if (confirm("Are you sure want to perform this operation ?")) {
//                                                                                                                    $(".modal_load").show();
//                                                                                                                    var id = $(this).attr('data');
//                                                                                                                    var status = $(this).attr('data_status');
//                                                                                                                    // alert ($(current_element).attr('data'))
//                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_articles/active";
//                                                                                                                    //alert(url);
//                                                                                                                    $.ajax({
//                                                                                                                        type: "POST",
//                                                                                                                        url: url,
//                                                                                                                        data: {id: id, status: status},
//                                                                                                                        success: function (data)
//                                                                                                                        {
//
//                                                                                                                            alert("Successfully Deleted");
//                                                                                                                            $(".modal_load").hide();
//                                                                                                                           // location.reload();
//                                                                                                                        }
//                                                                                                                    });
//                                                                                                                }

                                                                                                            });                                                                                     
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                    
        $(document).on('click', '#deleteformSubmitdeactive', function () 
         {  // alert();
             $(".modal_load").show();
              var id = $('#deactive_id_status').val();
                 var status = $('#deactive_status_status').val();
                                                                                                                    // alert ($(current_element).attr('data'))
                                                                                                                    url = "<?php echo site_url() ?>admin/Dashboard_articles/active";
                                                                                                                    //alert(url);
                                                                                                                    $.ajax({
                                                                                                                        type: "POST",
                                                                                                                        url: url,
                                                                                                                        data: {id: id, status: status},
                                                                                                                        success: function (data)
                                                                                                                        {

//                                                                                                                            alert("Successfully Deleted");
                                                                                                                            $(".modal_load").hide();
                                                                                                                            location.reload();
                                                                                                                        }
                                                                                                                    });
                                  
                                                                                                     }); });
                                                                                                    
                                                                                                    
                                                                                                    
                                                                                                            </script>
                                                                                                                                                                                                                  
                                                                                                                                                                                                       </script>
  <style>
    .table-bordered
    {
          border: 1px solid #ddd;
          table-layout: fixed;
    }
    .table th,td
    {
          word-wrap: break-word;
    }    
    .table-responsive>.table>tbody>tr>td, .table-responsive>.table>tbody>tr>th, .table-responsive>.table>tfoot>tr>td, 
    .table-responsive>.table>tfoot>tr>th, .table-responsive>.table>thead>tr>td, .table-responsive>.table>thead>tr>th
     {
              white-space: normal; 
     }
  .ui-widget.ui-widget-content 
  {
    border: 1px solid #c5c5c5;
    z-index: 99999999999999999999;
  }
  </style>   </body>

                                                                                                            </html>
