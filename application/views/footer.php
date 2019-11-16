<?php 
	$alert_confirm = "Confirm";
	$alert_cancel = "Cancel";
	$alert_edit_admin = "This User Group can not be edited.";
	$alert_edit = "Are you sure to edit this record?";
	$alert_delete = "Are you sure want to delete this?";
	$alert_delete_admin = "This User Group can not be deleted.";
	$alert_csvexport_admin = "Are you sure to export the csv file?";
	$alert_status = "Are you sure to change this record status?";
	$alert_status_admin = "This User Group can not be deactivated.";
	$alert_complete = "Proceed to view the completed calls for this Caller.";
    $alert_password = "Are you sure that you want to reset password?";
?>
<style>
.signup-error {
	border:1px solid #A94441 !important;
}
</style>

	<!-- ADMIN EDITING DIALOG BOX -->

    <div class="modal fade" id="admin_editing_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_edit_admin;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
    <!-- ADMIN EDITING DIALOG BOX -->
	<!-- EDITING DIALOG BOX -->
    <div class="modal fade" id="editing_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_edit;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                <button type="button" class="btn green" id="btn_editconfirm"><?=$alert_confirm;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
	<!-- EDITING DIALOG BOX -->
    <!-- Completed Calls DIALOG BOX -->
    <div class="modal fade" id="completed_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_complete;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                <button type="button" class="btn green" id="btn_editconfirm"><?=$alert_confirm;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
	<!-- Completed Calls DIALOG BOX -->
	<!-- DELETING DIALOG BOX -->
    <div class="modal fade" id="deleting_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title"><?=$alert_delete;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                <button type="button" class="btn green" id="btn_deleteconfirm"><?=$alert_confirm;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
    <!-- DELETING DIALOG BOX -->  
    <!-- ADMIN STATUS DIALOG BOX -->
    <div class="modal fade" id="admin_changestatus_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   <h4 class="modal-title"><?=$alert_status_admin;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                </div>
            </div>
           <!-- /.modal-content -->
       </div>
        <!-- /.modal-dialog -->
	</div>
	<!-- ADMIN STATUS DIALOG BOX -->
	<!-- STATUS DIALOG BOX -->
    <div class="modal fade" id="changestatus_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_status;?></h4>
                </div>
               <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                <button type="button" class="btn green" id="btn_changestatusconfirm"><?=$alert_confirm;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
       <!-- /.modal-dialog -->
	</div>
	<!-- STATUS DIALOG BOX -->
    <!-- ADMIN DELETE DIALOG BOX -->
    <div class="modal fade" id="admin_deleting_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_delete_admin;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
	</div>
    <!-- ADMIN DELETE DIALOG BOX -->
    <!-- ADMIN CSV EXPORT DIALOG BOX -->
    <div class="modal fade" id="admin_csvexport_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_csvexport_admin;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
       <!-- /.modal-dialog -->
	</div>
   <!-- ADMIN CSV EXPORT DIALOG BOX -->
   <!-- ADMIN RESET PASSWORD DIALOG BOX -->
    <div class="modal fade" id="reset_password_dialogbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$alert_password;?></h4>
                </div>
                <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn red"><?=$alert_cancel;?></button>
                <button type="button" class="btn green" id="btn_resetfirm">Yes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
       <!-- /.modal-dialog -->
    </div>
   <!-- ADMIN RESET PASSWORD DIALOG BOX -->
    <!-- AJAX CONTENT -->
    <div id="ajax-modal" class="modal fade" tabindex="-1" width="100%"></div>
    <div id="ajax-image-modal" class="modal fade" tabindex="-1"></div>
    <!-- AJAX CONTENT -->
    <!-- AJAX CONTENT -->
    <div id="ajax-modal-review" class="modal fade" tabindex="-1"></div>
    <div id="ajax-image-modal-review" class="modal fade" tabindex="-1"></div>
    <!-- AJAX CONTENT -->

<script type="application/javascript">
var FormValidation = function () {
    // advance validation
    var handleValidation3 = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
			<?php if($this->uri->segment(1) == "settings"){?>
			var form3 = $('#frm_settings');
			<?php }?>
            <?php if($this->uri->segment(1) == "content"){?>
            var form3 = $('#frm_add');
            <?php }?>
            <?php if($this->uri->segment(1) == "plant"){?>
            var form3 = $('#frm_add');
            <?php }?>
            <?php if($this->uri->segment(1) == "customers"){?>
            var form3 = $('#frm_add');
            <?php }?>
            <?php if($this->uri->segment(1) == "work"){?>
            var form3 = $('#frm_add');
            <?php }?>
			<?php if($this->uri->segment(1) == "myaccount"){?>
			var form3 = $('#frm_settings');
			<?php }?>
			<?php if($this->uri->segment(1) == "permission"){?>
			var form3 = $('#frm_add');
			<?php }?>
			<?php if($this->uri->segment(1) == "usertype"){?>
			var form3 = $('#frm_add');
			<?php }?>
			<?php if($this->uri->segment(1) == "adminuser"){?>
			var form3 = $('#frm_add');
			<?php }?>
            
 
            var error3 = $('.alert-danger', form3);
            var success3 = $('.alert-success', form3);
            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            form3.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })

            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "", // validate all fields including form hidden input
                rules: {

				<?php if($this->uri->segment(1) == "settings"):?>
					organization: {
                        required: true
                    },
					contact_email: {
                        required: true,
                        email: true
                    },
					copyright: {
                        required: true
                    }
				<?php endif;?>
				<?php if($this->uri->segment(1) == "permission"):?>
					usertype_id: {
                        required: true
                    }
				<?php endif;?>
				<?php if($this->uri->segment(1) == "myaccount"):?>
					admin_username: {
                        required: true
                    },
					admin_email: {
                        required: true,
                        email: true
                    }
				<?php endif;?>
				<?php if($this->uri->segment(1) == "usertype"):?>
					typename: {
                        required: true
                    }
				<?php endif;?>			
				
				<?php if($this->uri->segment(1) == "adminuser"):?>
					user_type: {
                        required: true
                    },
					admin_email: {
                        required: true,
                        email: true
                    },
                    admin_fname: {
                        required: true
                    },
                    admin_lname: {
                        required: true
                    },
    				<?php if($this->uri->segment(1) == "adminuser" && $this->uri->segment(2) == "add"):?>	
    					admin_password: {
                            minlength: 5,
                            required: true
                        },
    					admin_username: {
                            required: true
                        }
    				<?php endif;?>
                    <?php if($this->uri->segment(1) == "adminuser" && $this->uri->segment(2) == "reset_password"):?>   
                        admin_password: {
                            minlength: 5,
                            required: true
                        },
                        cadmin_password : {
                            minlength : 5,
                            equalTo : "#admin_password"
                        }
                    <?php endif;?>
				<?php endif;?>
				<!--  END USER -->
				
				<?php if($this->uri->segment(1) == "customers"):?>
					name: {
                        required: true
                    },
					phone: {
                        required: true
                    },
					zipcode: {
                        required: true
                    },
    				<?php if($this->uri->segment(2) == "add"):?>	
    					password: {
                            minlength: 5,
                            required: true
                        },
    					email: {
                            required: true,
                            email: true
                        }
    				<?php endif;?>
				<?php endif;?>
				<?php if($this->uri->segment(1) == "plant"):?>
					plant_name: {
                        required: true
                    },
					program_id: {
                        required: true
                    },
					address: {
                        required: true
                    },
				<?php endif;?>
                <?php if($this->uri->segment(2) == "creatework"):?>
                   /* customer_id: {
                        required: true
                    },*/
                    plant_id: {
                        required: true
                    },
                    program_id: {
                        required: true
                    },
                    type_id: {
                        required: true
                    },
                    orig_img: {
                        required: true
                    },
                <?php endif;?>
                <?php if($this->uri->segment(2) == "uploadDetails"):?>
                    orig_img: {
                        required: true
                    },
                <?php endif;?>
				
                },
				
                messages: { // custom messages for radio buttons and checkboxes
                    membership: {
                        required: "Please select a Membership type"
                    },
                    service: {
                        required: "Please select  at least 1 types of Service",
                        minlength: jQuery.validator.format("Please select  at least {0} types of Service")
                    },
					publication_year: {
						number: 'The value must be a number'
					},
					orig_img: {
						extension: 'Please enter a file with a valid extension.'
					},
					demo_file_path: {
						extension: 'Please enter a file with a valid extension.'
					},
					chapter_path: {
						extension: 'Please enter a file with a valid extension.'
					},
					num_code: {
						number: 'The value must be a number',
						min: jQuery.validator.format("Less than 1 code can not be generate"),
						max: jQuery.validator.format("Maximum 5000 codes generate at once")
					}
					
                },
                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit   
                    success3.hide();
                    error3.show();
					Metronic.scrollTo(error3, -100);
                },
                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
						
                },
                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
						
                },
            });
    }

    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
           return;
        }
        if ($('.wysihtml5').size() > 0) {
           $('.wysihtml5').wysihtml5({
                "stylesheets": ["../../assets/global/plugins/bootstrap-wysihtml5/wysiwyg-plant.css"]
            });
        }
    }
   return {
        //main function to initiate the module
        init: function () {
            handleWysihtml5();
            handleValidation3();
        }
    };
}();

</script>
<!-- BEGIN FOOTER -->

<div class="page-footer">
	<div class="container">
	    <?php echo $result_copyright->copyright; ?>
		 <!--Copyright &copy; 1016 . All Rights Reserved.-->
	</div>
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-migrate.min.js");?>"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap/js/bootstrap.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.blockui.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.cokie.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/uniform/jquery.uniform.min.js");?>"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-validation/js/jquery.validate.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery-validation/js/additional-methods.min.js");?>"></script>
<!-- <script type="text/javascript" src="<?=site_url("assets/global/plugins/select1/select1.min.js");?>"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/ckeditor/ckeditor.js");?>"></script>
<!--<script type="text/javascript" src="<?=site_url("assets/global/plugins/datatables/media/js/jquery.dataTables.min.js");?>"></script>-->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/datatables/media/js/jquery.dataTables.js");?>"></script>
<!--<script type="text/javascript" src="//cdn.datatables.net/1.10.1/js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/dropzone/dropzone.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap-daterangepicker/moment.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js");?>"></script>
<script src="<?=site_url("assets/pages/scripts/components-pickers.js");?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script type="text/javascript" src="<?=site_url("assets/global/plugins/morris/morris.min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/morris/raphael-min.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/global/plugins/jquery.sparkline.min.js");?>"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="<?=site_url("assets/global/scripts/metronic.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/layout3/scripts/layout.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/layout3/scripts/demo.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/pages/scripts/form-validation.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/pages/scripts/table-managed.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/pages/scripts/index3.js");?>"></script>
<script type="text/javascript" src="<?=site_url("assets/pages/scripts/tasks.js");?>"></script>
<!-- <script type="text/javascript" src="<?=site_url("assets/pages/scripts/jsplant.js");?>"></script>
 --><!-- END PAGE LEVEL SCRIPTS -->

<script type="application/javascript">
function edit_admin_record(URL) {
	var result=URL.split('/');
    var id = result[result.length-1];
	if(id != 1){
	$('#editing_dialogbox').modal('show');
	$("#editing_dialogbox #btn_editconfirm").click(function() {
		$('#editing_dialogbox').modal('hide');
		$("#formlisting input[name=page_mode]").val("EDIT");
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});

	}else{
		$('#admin_editing_dialogbox').modal('show');
	}
}

function edit_record(URL) {
	$('#editing_dialogbox').modal('show');
	$("#editing_dialogbox #btn_editconfirm").click(function() {
		$('#editing_dialogbox').modal('hide');
		$("#formlisting input[name=page_mode]").val("EDIT");
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
}

function edit_completed(URL) {
	$('#completed_dialogbox').modal('show');
	$("#completed_dialogbox #btn_editconfirm").click(function() {
		$('#completed_dialogbox').modal('hide');
		$("#formlisting input[name=page_mode]").val("EDIT");
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
}

function admin_edit_status(URL, STATUS) {
	var result=URL.split('/');
    var id = result[result.length-1];	
	if(id != 1){
	$('#changestatus_dialogbox').modal('show');
	$("#changestatus_dialogbox #btn_changestatusconfirm").click(function() {
		$('#changestatus_dialogbox').modal('hide');
		$("#formlisting input[name=status]").val(STATUS);
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
	}else{
		$('#admin_changestatus_dialogbox').modal('show');
	}
}

function edit_status(URL, STATUS) {
	$('#changestatus_dialogbox').modal('show');
	$("#changestatus_dialogbox #btn_changestatusconfirm").click(function() {
		$('#changestatus_dialogbox').modal('hide');
		$("#formlisting input[name=status]").val(STATUS);
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});

}



function delete_admin_record(URL) {
	var result=URL.split('/');
    var id = result[result.length-1];
	if(id != 1){
	$('#deleting_dialogbox').modal('show');
	$("#deleting_dialogbox #btn_deleteconfirm").click(function() {
		$('#deleting_dialogbox').modal('hide');
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
	}else{
		$('#admin_deleting_dialogbox').modal('show');
	}
}

function reset_password(URL) {
    var result=URL.split('/');
    var id = result[result.length-1];
    if(id != 1){
    $('#reset_password_dialogbox').modal('show');
    $("#reset_password_dialogbox #btn_resetfirm").click(function() {
        $('#reset_password_dialogbox').modal('hide');
        $("#formlisting").attr("action" , URL);
        $("#formlisting").submit();
    });
    }else{
        $('#reset_password_dialogbox').modal('show');
    }
}



function delete_record(URL) {
	var result=URL.split('/');
    var id = result[result.length-1];
	$('#deleting_dialogbox').modal('show');
	$("#deleting_dialogbox #btn_deleteconfirm").click(function() {
		$('#deleting_dialogbox').modal('hide');
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
}

function discount_percent(){
	$("#discount_amount").val('0.00');
}

function discount_amt(){
	$("#discount_percentage").val('0.00');
}



function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
function order1Status(ID,VAL)
{
     $.post("<?=site_url("order/ajaxUpdateStatus");?>",{ ID : ID,VAL : VAL },
        function(data){
            location.reload();
        });
}
</script>
<!-- END JAVASCRIPTS -->
<script type="application/javascript">
<!--  START SIGNIN MANAGEMENT -->
<?php if($this->uri->segment(1) == "signin"):?>
jQuery(document).ready(function() {  
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo(theme settings page)
   FormValidation.init();
});
<?php endif;?>
<!--  END SIGNIN MANAGEMENT -->
<!--  START SETTINGS -->
<?php if($this->uri->segment(1) == "settings"):?>
jQuery(document).ready(function() { 
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("settings/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("signin/dashboard");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("settings/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("settings/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END SETTINGS -->
<!--  START CONTENT -->
<?php if($this->uri->segment(1) == "content"):?>
jQuery(document).ready(function() {
    //jQuery("#load_image").fadeOut();
    //jQuery("#load_product").fadeOut("slow");
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});
$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("content/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("content");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=page_id]").val();
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("content/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("content/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END CONTENT -->
<!--  START BANNER MANAGEMENT -->
<?php if($this->uri->segment(1) == "banner"):?>
jQuery(document).ready(function() {       
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});


$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("banner/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("banner");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=banner_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("banner/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("banner/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END BANNER MANAGEMENT -->
<!--  START PLANT MANAGEMENT -->
<?php if($this->uri->segment(1) == "plant"):?>
jQuery(document).ready(function() {       
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});


$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("plant/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("plant");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=plant_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("plant/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("plant/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END PLANT MANAGEMENT -->
<!--  START CATEGORY MANAGEMENT -->
<?php if($this->uri->segment(1) == "category"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
         
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    //Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("category/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("category");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=category_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("category/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("category/update");?>");
    }
    $("#frm_add").submit();
});

function AjaxSubcat(ID)
{
     $.post("<?=site_url("category/ajaxCategory");?>",{ ID : ID },
        function(data){
            $("#pcat").html(data);
        });
}
<?php endif;?>
<!--  END CATEGORY MANAGEMENT -->
<!--  START USER MANAGEMENT -->
<?php if($this->uri->segment(1) == "adminuser"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
        
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});
$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("adminuser/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("adminuser");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=admin_id]").val();
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("adminuser/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("adminuser/update");?>");
    }
    $("#frm_add").submit();
});
$("#btn_submit1").click(function(){
    var id = $("#frm_reset input[name=admin_id]").val();
    $("#frm_reset").attr("action", "<?=site_url("adminuser/restPassword");?>");
    $("#frm_reset").submit();
});
<?php endif;?>
<!--  END USER MANAGEMENT -->
<!--  START CUSTOMER -->
<?php if($this->uri->segment(1) == "customers"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

// function view_activecodes(ID)
// {
//     $modal = $('#ajax-modal');
//     <?php $modal_url = site_url("ajax/activecodes");?>
//     setTimeout(function(){
//         $modal.load('<?=$modal_url;?>/'+ID, function(){
//             $modal.modal({
//                     backdrop: 'static',
//                     keyboard: false
//                 }).addClass('modal-ajax');
//         });
//     }, 1000);
    
// }

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?php echo site_url("customers/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("customers");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=customer_id]").val();
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("customers/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("customers/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END CUSTOMER -->
<!--  START WORK -->
<?php if($this->uri->segment(1) == "work"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});


$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?php echo site_url("work/creatework");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("work");?>";
});
$("#btn_cancel1").click(function(){
    window.location.href="<?=site_url("work/assigned");?>";
});

$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=customer_id]").val();
    // if(id == "") {
    //     $("#frm_add input[name=page_mode]").val("ADD_RECORD");
    //     $("#frm_add").attr("action", "<?=site_url("settings/update1");?>");
    // } else {
    //     $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
    //     $("#frm_add").attr("action", "<?=site_url("settings/update1");?>");
    // }
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("work/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("work/update");?>");
    }
    $("#frm_add").submit();
}); 
function SelectStatus(WID,VAL){
    var work_id = WID;
    var status_change = VAL;
        $.post("<?=site_url("work/updateworkstatus");?>",{ work_id : work_id, status_change : status_change },
        function(data){
            if(data == 2){
                alert("Inpector do not upload from.");
                location.reload();
            }else{
                location.reload();
            }   
        });
};
function chooseInspector(INSID,WORKID){
    
    $.post("<?=site_url("work/assignedInspector");?>",{ work_id : WORKID, inspector_id : INSID },
        function(data){
            //alert(data);
                location.reload();
        });
    
}
// $(".in_id").change(function(){
//     var work_id = $('#work_id').val();
//     var inspector_id = $(this).children("option:selected").val();
//         $.post("<?=site_url("work/assignedInspector");?>",{ work_id : work_id, inspector_id : inspector_id },
//         function(data){
//             alert(data);
//                 location.reload();
//         });
// });
$(".choseplant").change(function(){
    var customer_id = $(this).children("option:selected").val();
        $.post("<?=site_url("work/getplant");?>",{ customer_id : customer_id },
        function(data){
            if(data != ""){
                $('.getplant').html(data);
            }
        });
});
function  getprogram(VAL){
    var plant_name = VAL;
    
        $.post("<?=site_url("work/getprogram");?>",{ plant_name : plant_name },
        function(data){
            if(data != ""){
                $('#program_id').html(data);
            }
        });
    
        
};
$(".selectForm").change(function(){
    var type_id = $(this).children("option:selected").val();
        
        if(type_id == 1){
            $("#Quarterly").show();
            $("#Bi-Weekly").hide();

        }else{
            $("#Bi-Weekly").show();
            $("#Quarterly").hide();
        }

});
<?php endif;?>
<!--  END WORK -->
<!--  START ASSIGN -->
<?php if($this->uri->segment(1) == "assignwork"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?php echo site_url("assignwork/creatework");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("assignwork");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=customer_id]").val();
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("assignwork/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("assignwork/update");?>");
    }
    $("#frm_add").submit();
});
$("#upload_file").click(function(){
    alert(111);
   	$('#Upload_modal').modal('show');
	$("#Upload_modal #btn_editconfirm").click(function() {
		$('#Upload_modal').modal('hide');
		$("#formlisting input[name=page_mode]").val("EDIT");
		$("#formlisting").attr("action" , URL);
		$("#formlisting").submit();
	});
});
<?php endif;?>
<!--  END ASSIGN -->











































<!-- START SHIPPING -->
<?php if($this->uri->segment(1) == "shipping"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
         
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    //Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("shipping/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("shipping");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=shipping_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("shipping/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("shipping/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!-- END SHIPPING -->
<!-- START TAX -->
<?php if($this->uri->segment(1) == "tax"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
         
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    //Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("tax/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("tax");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=tax_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("tax/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("tax/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END CATEGORY -->
<!--  START CLASS -->
<?php if($this->uri->segment(1) == "classes"):?>
jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
         
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    //Demo.init(); // init demo features
    TableManaged.init();
    FormValidation.init();
});

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("classes/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("classes");?>";
});
$("#btn_submit").click(function(){  
    var id = $("#frm_add input[name=class_id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("classes/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("classes/update");?>");
    }
    $("#frm_add").submit();
});
<?php endif;?>
<!--  END CLASS -->


<!--  START BOOKS -->
<?php if($this->uri->segment(1) == "books"):?>

jQuery(document).ready(function() {
    jQuery("#load_image").fadeOut();
    jQuery("#load_product").fadeOut("slow");
    
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Demo.init(); // init demo features
    
        var table = $('#sample_1');
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n

            "language": {

                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },

                "emptyTable": "No data available in table",

                "info": "Showing _START_ to _END_ of _TOTAL_ entries",

                "infoEmpty": "No entries found",

                "infoFiltered": "(filtered1 from _MAX_ total entries)",

                "lengthMenu": "Show _MENU_ entries",

                "search": "Search:",

                "zeroRecords": "No matching records found"

            },

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout

            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 

            // So when dropdowns used the scrollable div should be removed. 

            //"dom": "<'row'<'col-md-6 col-sm-11'l><'col-md-6 col-sm-11'f>r>t<'row'<'col-md-5 col-sm-11'i><'col-md-7 col-sm-11'p>>",

            "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

            "lengthMenu": [
                [5, 15, 10, -1],
                [5, 15, 10, "All"] // change per page values here
            ],

            // set the initial value

            "pageLength": 15,

            "language": {
                "lengthMenu": "Display _MENU_ record(s)",

                "paging": {
                    "previous": "Prev",
                    "next": "Next"
                }
            },

            "columnDefs": [{  // set default column settings

                'orderable': true,
                'targets': [0]

            }, {

                "searchable": true,
                "targets": [0]

            }],

            "order": [

            ] // set first column as a default sort by asc

        });

        var tableWrapper = jQuery('#sample_1_wrapper');

        table.find('.group-checkable').change(function () {

            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");

            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });

            jQuery.uniform.update(set);

        });

        tableWrapper.find('.dataTables_length select').select1(); // initialize select1 dropdown
FormValidation.init();
});

function getUpd() {
    //$('#file_path').val('');
    //$('#file_path-error').html('');
    var upd_type = $('#upd_type').val();
    //alert(upd_type);
    if(upd_type != ''){
        if(upd_type != 'Book'){
            $('#chapter').show();
            $('#chapter_title').show();
            $('#getFilesupload').show();
            $('#getFileupload').hide();
        }else{
            $('#chapter').hide();
            $('#chapter_title').hide();
            $('#getFilesupload').hide();
            $('#getFileupload').show();
        }
    }else{
        $('#chapter').hide();
        $('#chapter_title').hide();
        $('#getFilesupload').hide();
        $('#getFileupload').hide();
    }
}

function getFiles() {
    var chapter_no = $('#chapter_no').val();
    //if(chapter_no != ""){
    $.post("<?=site_url("ajax/getfilesupload");?>",{ chapter_no : chapter_no },
        function(data){
            if(data != ""){
                //alert(data);
                $('#getFilesupload').html(data);
            }
        });
    //}else{
        //alert("This field requires a 16 digit product code");
    //}
}

function rmvChapter(book_id, chapter_id, chapter_no) {
    $.post("<?=site_url("ajax/remvchapter");?>",{ chapter_id : chapter_id, book_id : book_id, chapter_no : chapter_no },
        function(){
            location.reload();
        });
}

$("#btn_add").click(function(){
    $("#formlisting").attr("action", "<?=site_url("books/add");?>");
    $("#formlisting").submit();
});
$("#btn_cancel").click(function(){
    window.location.href="<?=site_url("books");?>";
});
$("#btn_submit").click(function(){
    var id = $("#frm_add input[name=id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("books/update");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("books/update");?>");
    }
    $("#frm_add").submit();
});


/*$("#btn_backchapters").click(function(){
    var book_id = $("#books_id").val();
    alert(book_id);
    window.location.href="<?=site_url("books/edit");?>" + "/" + book_id;
});*/
$("#btn_addchapters").click(function(){
    $("#formlisting").attr("action", "<?=site_url("books/addchapters");?>");
    $("#formlisting").submit();
});
$("#btn_cancelchapters").click(function(){
    var book_id = $("#frm_add input[name=book_id]").val();
    if(book_id == "") {
        window.history.back();
    }else {
        window.location.href="<?=site_url("books/chapters");?>" + "/" + book_id;
    }
});
$("#btn_submitchapters").click(function(){
    var id = $("#frm_add input[name=id]").val();
    
    if(id == "") {
        $("#frm_add input[name=page_mode]").val("ADD_RECORD");
        $("#frm_add").attr("action", "<?=site_url("books/updatechapters");?>");
    } else {
        $("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
        $("#frm_add").attr("action", "<?=site_url("books/updatechapters");?>");
    }
    $("#frm_add").submit();
});

/*var loaderImage = "<div style='position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-plant: #EFF3F8; z-index: 99; height: 100%;'>
                    <img src='<?=site_url("assets/global/img/loading.gif");?>' align='center' style='position: absolute; left: 55%; top: 40%; background-repeat: no-repeat; background-position: center; margin: -100px 0 0 -100px;' />
                  </div>";*/
/*$(function() {
     $("input:file").change(function (){
       var ext = $('#file_path').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['epub']) == -1) {
            alert('invalid extension!');
            $("#file_path").val('');
        }
     });
  });*/               
/*function testFun() {
    alert(113);
var ext = $('#file_path').val().split('.').pop().toLowerCase();
if($.inArray(ext, ['epub']) == -1) {
    alert('invalid extension!');
}
}*/
<?php endif;?>
<!--  END BOOKS -->

<!-- START CSVIMPORT -->
<?php if($this->uri->segment(1) == "csvimport"):?>
jQuery(document).ready(function() {       
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("csvimport/add");?>");
	$("#formlisting").submit();
});
$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("csvimport");?>";
});
$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=question_id]").val();
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("csvimport/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("csvimport/update");?>");
	}
	$("#frm_add").submit();
});
<?php endif;?>
<!-- END CSVIMPORT -->














































<!--  START PERMISSION -->
<?php if($this->uri->segment(1) == "permission"):?>
jQuery(document).ready(function() {       
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("permission/add");?>");
	$("#formlisting").submit();
});
$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("permission");?>";
});
$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=usertype_id]").val();
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("permission/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("permission/update");?>");
	}
	$("#frm_add").submit();
});
<?php endif;?>
<!--  END PERMISSION -->

<!--  START PERMISSION -->
<?php if($this->uri->segment(1) == "question"):?>
jQuery(document).ready(function() {       
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("question/add");?>");
	$("#formlisting").submit();
});
$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("question");?>";
});
$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=question_id]").val();
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("question/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("question/update");?>");
	}
	$("#frm_add").submit();
});
<?php endif;?>
<!--  END PERMISSION -->










<!--  START CODE GENERATOR -->
<?php if($this->uri->segment(1) == "codegenerator"):?>
jQuery(document).ready(function() {
	jQuery("#load_image").fadeOut();
	jQuery("#load_product").fadeOut("slow");
	
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

function getSubcategory(ID) {
	$.post("<?=site_url("ajax/getsubcategory");?>",{ parent_id : ID },
		function(data){
			if(data != ""){
				//alert(data);
				$('#category_id').html(data);
			}
		});
}
function getBooks(ID) {
	$.post("<?=site_url("ajax/getbooks");?>",{ category_id : ID },
		function(data){
			if(data != ""){
				//alert(data);
				$('#book_id').html(data);
                
			}
		});
}


$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("codegenerator/add");?>");
	$("#formlisting").submit();
});
$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("codegenerator");?>";
});
$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=book_id]").val();
	//alert(id);
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("codegenerator/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("codegenerator/update");?>");
	}
	$("#frm_add").submit();
});
<?php endif;?>
<!--  END CODE GENERATOR -->

<!--  START CODE SEARCH -->
<?php if($this->uri->segment(1) == "codesearch"):?>
jQuery(document).ready(function() {       
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

function getCodesearch() {
	var product_code = $('#product_code').val();
	//alert(product_code);
	if(product_code != ""){
	$.post("<?=site_url("ajax/getcode");?>",{ product_code : product_code },
		function(data){
			if(data != ""){
				//alert(data);
				$('#code_details').html(data);
			}
		});
	}else{
		alert("This field requires a 16 digit product code");
	}
}

$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("codesearch");?>";
});
<?php endif;?>
<!--  END CODE SEARCH -->

<!--  START USERTYPE -->
<?php if($this->uri->segment(1) == "usertype"):?>
jQuery(document).ready(function() {
	jQuery("#load_image").fadeOut();
	jQuery("#load_product").fadeOut("slow");
	
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});

$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("usertype/add");?>");
	$("#formlisting").submit();

});

$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("usertype");?>";
});

$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=type_id]").val();
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("usertype/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("usertype/update");?>");
	}
	$("#frm_add").submit();

});
<?php endif;?>
<!--  END USERTYPE -->

<!--  START ORDER -->
<?php if($this->uri->segment(1) == "order"):?>
jQuery(document).ready(function() {
	jQuery("#load_image").fadeOut();
	jQuery("#load_product").fadeOut("slow");
	
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Demo.init(); // init demo features
	TableManaged.init();
	FormValidation.init();
});


function view_orderdetails(ID)
{
	$modal = $('#ajax-modal');
	<?php $modal_url = site_url("order/orderdetails");?>
	setTimeout(function(){
		$modal.load('<?=$modal_url;?>/'+ID, function(){
			$modal.modal({
					backdrop: 'static',
					keyboard: false
				}).addClass('modal-ajax');
		});
	}, 1000);
	
}

$("#btn_add").click(function(){
	$("#formlisting").attr("action", "<?=site_url("order/add");?>");
	$("#formlisting").submit();

});

$("#btn_cancel").click(function(){
	window.location.href="<?=site_url("order");?>";
});

$("#btn_submit").click(function(){
	var id = $("#frm_add input[name=type_id]").val();
	if(id == "") {
		$("#frm_add input[name=page_mode]").val("ADD_RECORD");
		$("#frm_add").attr("action", "<?=site_url("order/update");?>");
	} else {
		$("#frm_add input[name=page_mode]").val("UPDATE_RECORD");
		$("#frm_add").attr("action", "<?=site_url("order/update");?>");
	}
	$("#frm_add").submit();

});
<?php endif;?>
<!--  END ORDER -->


function addCategory()
{
    $('#addcategory_dialogbox').modal('show');
}
function addCtegoryModal()
{
    var addCategory = $('#add_category_name').val();
    $.post("<?=site_url("schools/addCtegorySchools");?>",{ addCategory : addCategory },
        function(data){
            if(data != ""){
                if(data == "No"){
                    $('#crror_details').html('<plant="red"><b>Category name already exist.</b></plant>');
                }else{
                    location.reload();
                }
            }
        });
}
function addSubject()
{
    $('#addsubject_dialogbox').modal('show');
}
function addSubjectModal()
{
    var addSubject = $('#add_subject_name').val();
    $.post("<?=site_url("schools/addSubjectSchools");?>",{ addSubject : addSubject},
        function(data){
            if(data != ""){
                if(data == "No"){
                    $('#crror_sub_details').html('<plant="red"><b>Subject name already exist.</b></plant>');
                }else{
                    location.reload();
                }
            }
        });
}
function addClass()
{
    $('#addClass_dialogbox').modal('show');
}
function addClassModal()
{
    var addClass = $('#add_class_name').val();
    $.post("<?=site_url("schools/addClassSchools");?>",{ addClass : addClass },
        function(data){
            if(data != ""){
                if(data == "No"){
                    $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                }else{
                    location.reload();
                }
            }
        });
}

</script>

<script type="text/javascript">
$('.text001').click(function() {
    if( $(this).is(':checked')) {
        $("#addID_1").show();
        $("#addID_1").show();
        $("#addID_3").show();
        $("#addID_4").show();
        $("#addID_5").show();
        $("#addID_6").show();
    } else {
        $("#addID_1").hide();
        $("#addID_1").hide();
        $("#addID_3").hide();
        $("#addID_4").hide();
        $("#addID_5").hide();
        $("#addID_6").hide();
    }
}); 

$('.text001').click(function() {
    if( $(this).is(':checked')) {
        $("#minID").show();
        $("#maxID").show();
    } else {
        $("#minID").hide();
        $("#maxID").hide();
    }
});

$("#btn_report").click(function(){
    var s_date = $('#s_date').val();
    var e_date = $('#e_date').val();
    var c_name = $('#c_name').val();
    var s_invoice = $('#s_invoice').val();
    var o_status = $('#o_status').val();

     $.post("<?=site_url("report/reportgenarte");?>",{ s_date : s_date,  e_date : e_date, c_name : c_name, s_invoice : s_invoice, o_status : o_status},
        function(data){
            alert(data);
            
        });



    //$("#frm_add").attr("action", "<?=site_url("report/reportgenarte");?>");
    //$("#frm_add").submit();
}); 

$( function(){
    $( "#s_date" ).datepicker();
});

$( function(){
    $( "#e_date" ).datepicker();
});



</script>



</body>

<!-- END BODY -->

</html>