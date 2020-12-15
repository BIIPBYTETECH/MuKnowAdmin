<?php require_once('includes/head.php') ?>



<body>



    <div id="wrapper">



        <?php require_once('includes/nav.php') ?>

        <?php //print_r($tbldata);?>



        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12">

                    <h2 class="page-header"><i class="fa fa-money" id="sidemenuicon"></i> <?php echo project_name . ' ' . $lang_menu_addsubscription; ?></h2>

                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="alert alert-success"> 
                            <button type="button" class="close" data-dismiss="alert">X</button>		
                            <?php echo $this->session->flashdata('message') ?>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger fade in block-inner"> 
                            <button type="button" class="close" data-dismiss="alert">X</button>		
                            <?php echo $this->session->flashdata('error') ?>
                        </div>
                    <?php } ?>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default table-responsive">

                        <div class="panel-heading table-responsive">

                            <!--<?php //echo $lang_menu_addsubscription . " List"; ?>-->
                            <div style="float:left;"><a href="<?php echo site_url('/admin/Dashboard_tier_settings/index')?>" role="button"  class="align-left" title="Add Subscription">
                                    <button type="button"  class="btn smile-primary  ">
                                        Click here to Tier Settings</button></a></div>

                            <div style="float:right;"><a role="button"  class="align-left" title="Add Subscription"><button type="button"  data1="builder_0" class="model_form1 btn smile-primary animated bounceIn">Add <?php echo $lang_menu_addsubscription; ?> <i class="fa fa-plus" style="color:#FFF;"></i></button></a></div>

                        </div>



                        <!-- /.panel-heading -->

                        <div class="panel-body">

                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>                                        
                                    <!--<th>ID</th>-->
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price(SG)</th>
                                    <th>Processing Fee</th>
                                    <!--<th>Total Fee</th>-->
                                    <th>Referral Code</th>
                                    <th>Validity</th> 
                                    <th>Created On</th> 
                                    <th>Action</th> 
                                    </thead>

                                    <?php foreach ($subscription as $subscript) {
                                        ?>
                                        <tr>
                                            <td><?php echo $subscript->name; ?></td>
                                            <td><?php echo $subscript->description; ?></td>
                                            <td><?php echo $subscript->price; ?></td>
                                           <td><?php echo $subscript->stripe_processing_fee; ?></td>
                                           <!--<td><?php // echo $subscript->total_stripe_fee; ?></td>-->
                                           <td><?php if($subscript->referral_code_flag=='0'){echo 'No Referral Code ';}else{echo 'Referral Code Available'; }?></td>
                                           <td><?php echo $subscript->validity; ?></td>
                                           <td><?php  $transaction_date=date("Y-m-d H:i:s", strtotime($subscript->created_on." +8 hours"));
                                           echo $transaction_date; ?></td>
                                        <td>  <a href="javascript:;" data-toggle="modal" onclick="deleteData(<?php echo $subscript->id; ?>)" 
data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a> </td> 
                                        </tr>
                                        <?php
                                    }
                                    ?>





                                </table>



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
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
   <div class="modal-dialog ">
     <!-- Modal content-->
     <form action="" id="deleteForm" method="post">
         <div class="modal-content">
             <div class="modal-header bg-danger">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
             </div>
             <div class="modal-body">
              
                 <p class="text-center">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <input type="hidden" id="del_mod"> <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteformSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
    <!-- Form modal -->
    <div id="form_modal1" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header smile-primary" style="border-radius:0px !important;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#fff;">&times;</button>
                    <h4 class="modal-title"><i class="icon-paragraph-justify2"></i>Add <?php echo $lang_menu_addsubscription; ?> </h4>
                </div>
                <!-- Form inside modal -->
                <?php echo form_open_multipart(site_url() . '/admin/Dashboard_subscription/add_subscription', 'id="cat_form1"  enctype="multipart/form-data"  onsubmit="return myFunction()"'); ?>
                <div class="modal-body with-padding">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>* Plan Name :</label><span style="color:#194c83"><i></i></span>
                                <input type="text" id="name" name="name" class="form-control required" maxlength="100" value="">
                                <input type="hidden" id="stripe_processing_fee" name="stripe_processing_fee" class="form-control required" maxlength="100" value="">
                            </div>
                        </div>
                    </div> 
                   
                    <p id="err_name" style="color:red; margin-top:-10px;"></p>
                    <!--                    <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Name(In Chinese language):</label>
                                                    <input type="text" id="ch_lang_name" name="ch_lang_name" class="form-control required" maxlength="100" value="">
                                                </div>
                                            </div>
                                        </div> -->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>* Price :</label><span style="color:#194c83"><i>(Only SG)</i></span>
                                <input type="text" id="price" name="price" class="form-control required" maxlength="50" value="" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                    </div> 
                    <p id="err_price" style="color:red; margin-top:-10px;"></p>
<!--                   <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Cash Back :</label><span style="color:#194c83"><i></i></span>
                                <input type="text" id="cash_back" name="cash_back" class="form-control required" maxlength="50" value="" onkeypress="return isNumberKey(event)">
                            </div>
                        </div>
                    </div> 
                      <p id="err_cash_back" style="color:red; margin-top:-10px;"></p>-->

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>* Description :</label>
                                <input type="text" id="description" name="description" class="form-control required" maxlength="200" value="">
                            </div>
                        </div>
                    </div> 
                    <p id="err_description" style="color:red; margin-top:-10px;"></p>

                    <div class="form-group">
                        <div class="row">
                            <div class="">
                                <div class="col-md-12"><label>* Validity :</label></div>

                                <div class="col-md-6">
                                    <select name="duration" id="duration" class="form-control required" onChange="changecat(this.value);">
                                        <option value="">--- Please Select ---</option>
                                        <option value="days">Days</option>
                                        <option value="week">Week</option>
                                        <option value="month">Month</option>
                                        <option value="year">Year</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <select name="total" id="total" class="form-control required">
										<option value="" disabled selected>Select</option>
									</select>
                                </div>

                            </div>
                        </div>
                    </div> 
                    <p id="err_validity" style="color:red; margin-top:-10px;"></p>

                       <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Referral code:</label><span style="color:#194c83"><i></i></span>
                                <input type="checkbox" lass="form-control" id="referral_code" name="referral_code" >
                                <input type="hidden" value='' name="referral_code_flag"   id="referral_code_flag">
                            </div>
                        </div>
                    </div> 
                      <!--<p id="err_cash_back" style="color:red; margin-top:-10px;"></p>-->

                </div>            
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning closebtn" data-dismiss="modal">Close</button>
                    <span id="add">
                        <button type="submit" class="btn btn-primary subbtn" id="add_city">Submit</button>
                    </span><!-- 
                    <span id="edit">

                      <button type="submit" class="btn btn-primary" id="update_city" >Update Categories</button>
                    </span> -->
                </div>
                </form>
            </div>
        </div>
    </div>

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



    <!-- For Editor -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/editor/nicEdit-latest.js">"></script>

    <script type="text/javascript">

//<![CDATA[

                bkLib.onDomLoaded(function () {
                    nicEditors.allTextAreas()
                });

        //]]>

        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                "pagingType": "full_numbers",
				'aaSorting': [[4, 'desc']]
            });
        });


        $(document).on('click', '.model_form1', function () {
            $('#form_modal1').modal({
                keyboard: false,
                show: true,
                backdrop: 'static'
            });
        });



    </script>

    <script type="text/javascript">
        function myFunction() {
            var referral_code,err_cash_back,cash_back,name, price, description, total, duration, err_name, err_price, err_description, err_validity;

            // Get the value of the input field with id="numb"
            name = document.getElementById("name").value;
            price = document.getElementById("price").value;
          description = document.getElementById("description").value;
            total = document.getElementById("total").value;
            duration = document.getElementById("duration").value;
	    referral_code= document.getElementById("referral_code").checked;// $("#referral_code_flag").is('checked');//document.getElementById("referral_code_flag").value;	
//          alert(referral_code);
         var num =(price / 100) * 3.4 ;
          var tnum = num + 0.50;
          document.getElementById("stripe_processing_fee").value= tnum.toFixed(2);
            if(referral_code==true){
                $('#referral_code_flag').val(1);  
            }
            else{
                $('#referral_code_flag').val(0);  
            }
        var pattern=/^([A-Z]{2})+[\W]([A-Z]{2})+[\W]([A-Z]{2})/;
//           alert(duration);

            if (name === '') {
                err_name = "Please Enter Subscription Name.";
                document.getElementById("err_name").innerHTML = err_name;
                document.getElementById("name").focus();
                document.getElementById("err_price").innerHTML = '';
                document.getElementById("err_description").innerHTML = '';
                document.getElementById("err_validity").innerHTML = '';
                return false;
            }
			
//	if(!pattern.test(name)){         
//		err_name = "Please Enter Valid Subscription Name.";
//                document.getElementById("err_name").innerHTML = err_name;
//                document.getElementById("name").focus();
//                document.getElementById("err_price").innerHTML = '';
//                document.getElementById("err_description").innerHTML = '';
//                document.getElementById("err_validity").innerHTML = '';
//                return false;
//			}
	
//            if (name.length < 5 || name.length > 20) {
//                err_name = "Please Enter Subscription Name Between 5 to 20 Character.";
//                document.getElementById("err_name").innerHTML = err_name;
//                document.getElementById("name").focus();
//                document.getElementById("err_price").innerHTML = '';
//                document.getElementById("err_description").innerHTML = '';
//                document.getElementById("err_validity").innerHTML = ''; 
//                document.getElementById("err_cash_back").innerHTML = '';
//                return false;
//            }

            if (price === '') {
                err_price = "Please Enter Price for Subscription.";
                document.getElementById("err_price").innerHTML = err_price;
                document.getElementById("price").focus();
              //  document.getElementById("err_name").innerHTML = '';
                document.getElementById("err_description").innerHTML = '';
                document.getElementById("err_validity").innerHTML = '';
                return false;
            }

//            if (cash_back === '')
//            {
//                err_cash_back= "Please Enter Cash Back for Subscription.";
//                document.getElementById("err_cash_back").innerHTML = err_cash_back;
//                document.getElementById("cash_back").focus();
////                document.getElementById("err_name").innerHTML = '';
//                document.getElementById("err_price").innerHTML = '';
////                document.getElementById("err_description").innerHTML = '';
//                document.getElementById("err_validity").innerHTML = '';
//                return false;
//            }
            if (description === '') {
                err_description = "Please Enter Description.";
                document.getElementById("err_description").innerHTML = err_description;
                document.getElementById("description").focus();
                document.getElementById("err_name").innerHTML = '';
                document.getElementById("err_price").innerHTML = '';
                document.getElementById("err_validity").innerHTML = ''; 
//                document.getElementById("err_cash_back").innerHTML = '';
                return false;
            }

            if ( duration === '') {
                err_validity = "Please Enter Validity for Subscription.";
                document.getElementById("err_validity").innerHTML = err_validity;
               // if (total === '') {
                  //  document.getElementById("total").focus();
               // } else {
                    document.getElementById("duration").focus();
               // }
                document.getElementById("err_name").innerHTML = '';
                document.getElementById("err_price").innerHTML = '';
                document.getElementById("err_description").innerHTML = '';
                return false;
            }
            return true;
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31
                    && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
		
		var mealsByCategory = {
			days: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27],
			week: [1,2,3],
			month:[1,2,3,4,5,6,7,8,9,10,11],
			year: [1,2,3,4,5]
		}

			function changecat(value) {
				if (value.length == 0) document.getElementById("total").innerHTML = "<option></option>";
				else {
					var catOptions = "";
					for (categoryId in mealsByCategory[value]) {
						catOptions += "<option>" + mealsByCategory[value][categoryId] + "</option>";
					}
					document.getElementById("total").innerHTML = catOptions;
				}
			}
                        
                        
      function deleteData(id)
     {
         var id = id; 
         $('#del_mod').val(id);
            $('#deleteForm').modal({
                keyboard: false,
                show: true,
                backdrop: 'static'
            });
//         $("#deleteForm").attr('action', url);
     }
function deleteformSubmit(){
//    alert( $('#del_mod').val());
var id=$('#del_mod').val();
 url = "<?php echo site_url() ?>/admin/Dashboard_subscription/delete_subscription";

                                            //alert(url);
                                            $.ajax({
                                                type: "POST",
                                                url: url,
                                                data: {ct_id:id},
                                                success: function (data)
                                                {

                                                    if (data) {

                                                        alert("Successfully Deleted");
                                                        location.reload();

                                                    } else
                                                    {
                                                        alert("You cant delete this topic.");
                                                        //location.reload();
                                                    }
                                                    //alert("Successfully Deleted");
                                                    //location.reload();

                                                }
                                            });
}
		
    </script>


</body>



</html>

