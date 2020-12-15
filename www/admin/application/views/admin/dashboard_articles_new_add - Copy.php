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

    <div id="page-wrapper" style="min-height: 220px;">    

			<br/>
			
			<h3 align="center">PHP - Sending multiple forms data through jQuery Ajax</a></h3><br />
			<br />
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<br />
			<form method="post" id="user_form">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="user_data">
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Details</th>
							<th>Remove</th>
						</tr>
					</table>
				</div>
				<div align="center">
					<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				</div>
			</form>

			<br />
		
		<div id="user_dialog" title="Add Data">
			<div class="form-group">
				<label>Enter First Name</label>
				<input type="text" name="first_name" id="first_name" class="form-control" />
				<span id="error_first_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Last Name</label>
				<input type="text" name="last_name" id="last_name" class="form-control" />
				<span id="error_last_name" class="text-danger"></span>
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
		</div>
		<div id="action_alert" title="Action">

		</div>
         
               
                <!-- /.row -->
            </div>
        </div>
   

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
                                                                                                          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--<link rel="stylesheet" href="bootstrap.min.css" />-->
		<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
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
		$('#first_name').val('');
		$('#last_name').val('');
		$('#error_first_name').text('');
		$('#error_last_name').text('');
		$('#first_name').css('border-color', '');
		$('#last_name').css('border-color', '');
		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_first_name = '';
		var error_last_name = '';
		var first_name = '';
		var last_name = '';
		if($('#first_name').val() == '')
		{
			error_first_name = 'First Name is required';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '#cc0000');
			first_name = '';
		}
		else
		{
			error_first_name = '';
			$('#error_first_name').text(error_first_name);
			$('#first_name').css('border-color', '');
			first_name = $('#first_name').val();
		}	
		if($('#last_name').val() == '')
		{
			error_last_name = 'Last Name is required';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '#cc0000');
			last_name = '';
		}
		else
		{
			error_last_name = '';
			$('#error_last_name').text(error_last_name);
			$('#last_name').css('border-color', '');
			last_name = $('#last_name').val();
		}
		if(error_first_name != '' || error_last_name != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';
				output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
				output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();
				output = '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+row_id+'" class="first_name" value="'+first_name+'" /></td>';
				output += '<td>'+last_name+' <input type="hidden" name="hidden_last_name[]" id="last_name'+row_id+'" value="'+last_name+'" /></td>';
				output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">View</button></td>';
				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			$('#user_dialog').dialog('close');
		}
	});

	$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr("id");
		var first_name = $('#first_name'+row_id+'').val();
		var last_name = $('#last_name'+row_id+'').val();
		$('#first_name').val(first_name);
		$('#last_name').val(last_name);
		$('#save').text('Edit');
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
	
});  </script>
                                                                                                            </body>

                                                                                                            </html>
