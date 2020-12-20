<?php require_once('includes/head.php') ;
//print_r($article_microlearning);?>

<body>

    <div id="wrapper">

        <?php require_once('includes/nav.php') ?>
        <?php //print_r($tbldata);?>

 <div id="form_modal1" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
               
                <!-- Form inside modal -->
                <div class="modal-body with-padding">


                    <div class="form-group"> 
                        Please contact to this mobile number
                       <input type="text" class="mobstyl" value="" id="mobno" readonly="readonly">
                    </div>        
                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning closebtn" data-dismiss="modal">Close</button>
               </div>
            </div>
        </div>
    </div>

        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-header"><i class="fa fa-codepen" id="sidemenuicon"></i> <?php echo 'Edit Quiz';?></h2>

                    <?php if ($this->session->flashdata('message')) { ?>
<!--                        <div class="alert alert-success"> 
                            <button type="button" class="close" data-dismiss="alert">Ã—</button>		
                            <?php echo $this->session->flashdata('message') ?>
                        </div>-->
                    <?php } ?>

                    <?php if ($this->session->flashdata('error')) { ?>
<!--                        <div class="alert alert-danger fade in block-inner"> 
                            <button type="button" class="close" data-dismiss="alert">Ã—</button>		
                            <?php echo $this->session->flashdata('error') ?>
                        </div>-->
                    <?php } ?>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default table-responsive">

                        <div class="panel-heading table-responsive topbarheader">

                            <!--<?php //echo $lang_menu_promocode . " List"; ?>-->

<!--                            <div style="float:right;"><a role="button"  class="align-left" title="Add Promocode"><button type="button"  data1="builder_0" class="model_form1 btn smile-primary animated bounceIn">Add <?php echo $lang_menu_promocode; ?> <i class="fa fa-plus" style="color:#FFF;"></i></button></a></div>-->

                        </div>



                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="dataTable_wrapper">
                                 <!--<div align="right" style="margin-bottom:5px;">-->
				<!--<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>-->
			</div>
			<br />
			<form method="post" id="quiz_add_edit_form" class="validate" method="post" action="<?php echo site_url() ?>admin/Dashboard_quiz/edit_quiz_save">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="user_data">
                                            <tr style="background: #3c323273">
                                                <th style="text-align: center;">Question</th>
							<th style="text-align: center;">Option1</th>
                                                        <th style="text-align: center;">Option2</th>
                                                        <th style="text-align: center;">Option3</th>
                                                        <th style="text-align: center;">Option4</th>
                                                        <th style="text-align: center;">Answer</th>
							<th style="text-align: center;">Edit</th>
							
						</tr>
                                               <?php foreach($article_microlearning as $key=>$res){  ?> 
                                                <tr id="row_<?php echo $res->id?>">
                                                    <td><input type="hidden" name="hidden_question[]" id="question<?php echo $res->id?>" class="question" value="<?php echo $res->question?>" /><?php echo $res->question;?></td>
                                                    <td><input type="hidden" name="hidden_option1[]" id="option1<?php echo $res->id?>" value="<?php echo $res->option1?>" /><?php echo $res->option1?></td>
                                                    <td><input type="hidden" name="hidden_option2[]" id="option2<?php echo $res->id?>" value="<?php echo $res->option2?>" /><?php echo $res->option2?></td>
                                                    <td><input type="hidden" name="hidden_option3[]" id="option3<?php echo $res->id?>" value="<?php echo $res->option3?>" /><?php echo $res->option3?></td>
                                                    <td><input type="hidden" name="hidden_option4[]" id="option4<?php echo $res->id?>" value="<?php echo $res->option4?>" /><?php echo $res->option4?></td>
                                                    <td><input type="hidden" name="hidden_article_id[]" id="article_id<?php echo $res->id?>" value="<?php echo $res->article_id?>"/><input type="hidden" value="<?php echo $res->id?>" id="quiz_id<?php echo $res->id?>" name="quiz_id[]"><input type="hidden" name="hidden_answer_key[]" id="answer_key<?php echo $res->id?>" value="<?php echo $res->answer_key?>" /><?php echo $res->answer_key?></td>
                                                    <td style="text-align: center;"><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id='<?php echo $res->id?>'>Edit</button></td>
                                                </tr>
                                               <?php } ?>
					</table>
				</div>
				<div align="center">
					<!--<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />-->
				      <button type="button"  class="quiz_add_button btn smile-primary btn"><?php echo 'Submit'; ?></button>
                                </div>
			</form>

			<br/>
		
                        <div id="user_dialog" title="Add Data" >
			<div class="form-group">
				<label>Enter Question</label>
                                <textarea type="text" name="question" id="question" class="form-control" ></textarea>
				<span id="error_question" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter option1</label>
				<input type="text" name="option1" id="option1" class="form-control" />
				<span id="error_option1" class="text-danger"></span>
			</div>
                       <div class="form-group">
				<label>Enter option2</label>
				<input type="text" name="option2" id="option2" class="form-control" />
				<span id="error_option2" class="text-danger"></span>
			</div>
                      <div class="form-group">
				<label>Enter option3</label>
				<input type="text" name="option3" id="option3" class="form-control" />
				<span id="error_option3" class="text-danger"></span>
			</div>
                      <div class="form-group">
				<label>Enter option4</label>
				<input type="text" name="option4" id="option4" class="form-control" />
				<span id="error_option4" class="text-danger"></span>
			  <input type="hidden" id="article_id" name="article_id" value="<?php echo $this->uri->segment('4') ?>"/>
</div>
                    
                    <div class="form-group">
                         <label>Answer:</label>
                         <select class="form-control" id="answer_key" name="answer_key">
                                                                <option value="">Please select answer</option>
                                                                <option value="option1">
                                                                    option1                                                                </option>
                                                                <option value="option2">
                                                                    option2                                                                </option>
                                                                <option value="option3">
                                                                    option3                                                                </option>
                                                                <option value="option4">
                                                                    option4                                                                </option>
                           </select>
                        <p class="error" id="answer_key_error_edit"></p>

                    </div>
                    
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
                    
		</div>
		<div id="action_alert" title="Action">

		</div>  

                            </div>

                            <!-- /.table-responsive -->



                        </div>

                        <!-- /.panel-body -->

                    </div>

                    <!-- /.panel -->

                </div>

            </div>



        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->

    <!-- Form modal -->
    

    <!-- jQuery -->

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->

    <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->

    <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

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
                                                                                                          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      

    <!-- For Editor -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/editor/nicEdit-latest.js">"></script>

    <script type="text/javascript">

    </script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
                <script>
                $(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
		$('#question').val('');
		$('#option1').val('');
                
                $('#option2').val('');
                $('#option3').val('');
                $('#option4').val('');
                
		$('#error_question').text('');
		$('#error_option1').text('');
                
                $('#error_option2').text('');
		$('#error_option3').text('');
                $('#error_option4').text('');
                
		$('#question').css('border-color', '');
		$('#option1').css('border-color', '');
                
                $('#option2').css('border-color', '');
		$('#option3').css('border-color', '');
                $('#option4').css('border-color', '');
                
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_question = '';
		var error_option1 = '';
		var question = '';
		var option1 = '';
                var error_option2 = '';
		var error_option3 = '';
                var error_option4 = '';
		var option2 = '';
		var option3 = '';
                var option4 = '';
                var answer_key='';
                var article_id = $('#article_id').val();
//                alert(article_id);
		if($('#question').val() == '')
		{
			error_question = 'Question Name is required';
			$('#error_question').text(error_question);
			$('#question').css('border-color', '#cc0000');
			question = '';
		}
		else
		{
			error_question = '';
			$('#error_question').text(error_question);
			$('#question').css('border-color', '');
			question = $('#question').val();
		}	
		if($('#option1').val() == '')
		{
			error_option1 = 'option1 Name is required';
			$('#error_option1').text(error_option1);
			$('#option1').css('border-color', '#cc0000');
			option1 = '';
		}
		else
		{
			error_option1 = '';
			$('#error_option1').text(error_option1);
			$('#option1').css('border-color', '');
			option1 = $('#option1').val();
		}
              
              
              if($('#option2').val() == '')
		{
			error_option2 = 'option2 is required';
			$('#error_option2').text(error_option2);
			$('#option2').css('border-color', '#cc0000');
			option2 = '';
		}
		else
		{
			error_option2 = '';
			$('#error_option2').text(error_option2);
			$('#option2').css('border-color', '');
			option2 = $('#option2').val();
		}
                
                
                
                 if($('#option3').val() == '')
		{
			error_option3 = 'option3 is required';
			$('#error_option3').text(error_option3);
			$('#option3').css('border-color', '#cc0000');
			option3 = '';
		}
		else
		{
			error_option2 = '';
			$('#error_option3').text(error_option2);
			$('#option3').css('border-color', '');
			option3 = $('#option3').val();
		}
                
                
                
                
                if($('#option4').val() == '')
		{
			error_option4 = 'option4 is required';
			$('#error_option4').text(error_option4);
			$('#option4').css('border-color', '#cc0000');
			option3 = '';
		}
		else
		{
			error_option4 = '';
			$('#error_option4').text(error_option2);
			$('#option4').css('border-color', '');
			option4 = $('#option4').val();
		}
                   if($('#answer_key').val() == '')
		{
			error_answer_key= 'answer_key is required';
			$('#error_answer_key').text(error_option3);
			$('#answer_key').css('border-color', '#cc0000');
			answer_key = '';
		}
		else
		{
			error_answer_key = '';
			$('#error_answer_key').text(error_answer_key);
			$('#answer_key').css('border-color', '');
			answer_key = $('#answer_key').val();
		}
                //alert(answer_key);
		if(error_question != '' || error_option1  != '')
		{
			return false;
		}
		else
		{//
			if($('#save').text() == 'Save')
			{alert(answer_key);
				count = count + 1;
                                var row_id = $('#hidden_row_id').val();
				output = '<tr id="row_'+row_id+'">';
				output += '<td>'+question+' <input type="hidden" name="hidden_question[]" id="question'+row_id+'" class="question" value="'+question+'" /></td>';
				output += '<td>'+option1+' <input type="hidden" name="hidden_option1[]" id="option1'+row_id+'" value="'+option1+'" /></td>';
                                output += '<td>'+option2+' <input type="hidden" name="hidden_option2[]" id="option2'+row_id+'" value="'+option2+'" /></td>';
				output += '<td>'+option3+' <input type="hidden" name="hidden_option3[]" id="option3'+row_id+'" value="'+option3+'" /></td>';
                                output += '<td>'+option4+' <input type="hidden" name="hidden_option4[]" id="option4'+row_id+'" value="'+option4+'" /></td>';
                                output += '<td>'+answer_key+' <input type="hidden" name="hidden_answer_key[]" id="answer_key'+row_id+'" value="'+answer_key+'" /></td>';
                                output += '<td><input type="hidden" name="hidden_article_id[]" id="article_id'+count+'" value="'+article_id+'"/><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
                             //  alert(row_id);
				output = '<td>'+question+' <input type="hidden" name="hidden_question[]" id="question'+row_id+'" class="question" value="'+question+'" /></td>';
				output += '<td>'+option1+' <input type="hidden" name="hidden_option1[]" id="option1'+row_id+'" value="'+option1+'" /></td>';
				output += '<td>'+option2+' <input type="hidden" name="hidden_option2[]" id="option2'+row_id+'" value="'+option2+'" /></td>';
				output += '<td>'+option3+' <input type="hidden" name="hidden_option3[]" id="option3'+row_id+'" value="'+option3+'" /></td>';
                                output += '<td>'+option4+' <input type="hidden" name="hidden_option4[]" id="option4'+row_id+'" value="'+option4+'" /></td>';
                                output += '<td>'+answer_key+' <input type="hidden" name="hidden_answer_key[]" id="answer_key'+row_id+'" value="'+answer_key+'" /></td>';
                                output += '<td style="text-align: center;"><input type="hidden" value="'+row_id+'" name="quiz_id[]" id="quiz_id'+row_id+'"><input type="hidden" name="hidden_article_id[]" id="article_id'+row_id+'" value="'+article_id+'"/><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'" style="text-align: center;">Edit</button></td>';
				//output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
                                				

			}

			$('#user_dialog').dialog('close');
		}
	});

	$(document).on('click', '.view_details', function()
        {
		var row_id = $(this).attr("id");               
		var question = $('#question'+row_id+'').val();
		var option1 = $('#option1'+row_id+'').val();
                var option2 = $('#option2'+row_id+'').val();
                var option3 = $('#option3'+row_id+'').val();
                var option4 = $('#option4'+row_id+'').val();
                var answer_key = $('#answer_key'+row_id+'').val();
               //  alert(question);
		$('#question').val(question);
		$('#option1').val(option1);
                $('#option2').val(option2);
                $('#option3').val(option3);
                $('#option4').val(option4);
                $('#answer_key').val(answer_key);
                 
	        $('#save').text('Submit');                
		$('#hidden_row_id').val(row_id);
		$('#user_dialog').dialog('option', 'title', 'Edit Data');
		$('#user_dialog').dialog('open');
                
	});

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this row data?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
			return false;
		}
	});

	$('#action_alert').dialog({
		autoOpen:false
	});

	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var count_data = 0;
		$('.first_name').each(function(){
			count_data = count_data + 1;
		});
		if(count_data > 0)
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_data').find("tr:gt(0)").remove();
					$('#action_alert').html('<p>Data Inserted Successfully</p>');
					$('#action_alert').dialog('open');
				}
			})
		}
		else
		{
			$('#action_alert').html('<p>Please Add atleast one data</p>');
			$('#action_alert').dialog('open');
		}
	});
	
                                                              $('.quiz_add_button').click(function ()
                                                              {
                                                                           //  $('#quiz_add_edit_form').validate();
                                                                   $('#quiz_add_edit_form').submit();
                                                               });
                                                                                            
   });   </script>
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
  </style>
</body>

</html>

<?php?>