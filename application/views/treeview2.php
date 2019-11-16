<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">
		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>Dashboard</h1>
			</div>

			<!-- END PAGE TITLE -->

		</div>
	</div>

	<!-- END PAGE HEAD -->

	<!-- BEGIN PAGE CONTENT -->

	<div class="page-content">
		<div class="container">			<!-- BEGIN PAGE BREADCRUMB -->

			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?=site_url("signin/dashboard");?>">Home</a><i class="fa fa-circle"></i>
				</li>

				<li class="active">
					 Dashboard
				</li>
			</ul>

			<!-- END PAGE BREADCRUMB -->

			<!-- BEGIN PAGE CONTENT INNER -->

			<div class="row">
				<div class="col-md-6">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Company
                            </div>
						</div>

						<div class="portlet-body1">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
									</div>
								</div>
							</div>

                            <div style='font-size: 1.4rem; font-weight:700;'></div>
									<ul id='f1combined' class='jslists'>
										<li>
											<ul style="font-weight: 600; font-size: 16px;margin: 20px; text-decoration: none;">
												<?php 
												$i=0;
												foreach($customers as $value) { ?>
												<li class="com_class_<?php echo $value->customer_id;?>"><a href="javascript:setPlantList('<?php echo $value->customer_id;?>'),getCustomerdetails('<?php echo $value->customer_id;?>')"><span id="minus_<?php echo $value->customer_id;?>"><i class="fa fa-plus" aria-hidden="true"></i></span><?php echo $value->name;?></a>
													<div id="plant_<?php echo $value->customer_id;?>">
													    <?php
													    if($i == 0){
													    ?>
													    <input type="hidden" name="customerID" id="customerID" value="<?php echo $value->customer_id;?>">
													    <?php
													    $data['customer_id'] = $value->customer_id;
                                                		$plants = $this->model_treeview->get_plant_data($data);
                                                		$num = count($plants);
                                                		?>
                                                		<ul class="plant_list">
                                            		        <?php if($num > 0){ ?>	
                                            					<?php foreach($plants as $value){?>
                                            						<li><a href="javascript:setProgramList('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>'),getPlantdetails('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>')"><i class="fa fa-leaf" aria-hidden="true"></i> <?=ucwords(strtolower($value->plant_name))?></a>
                                            								<div id="Program_<?php echo $value->plant_id;?>">
                                            								</div>
                                            
                                            						</li>
                                            
                                            			        <?php }?>
                                            				<?php }else{ ?>
                                            
                                            				<?php }?>
                                            			</ul>
                                            			<?php }?>
													    
													</div>
												</li>
											<?php $i++; }?>
											</ul>
										</li>
									</ul>

						</div>
					</div>

					<!-- END EXAMPLE TABLE PORTLET-->

				</div>
			
				<div class="col-md-6 frm">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<!--<div class="tab-content">-->
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box blue-hoki">
									<div class="portlet-title">
									</div>

									<div class="portlet-body1 form">
										<!-- BEGIN FORM-->

										<form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
											<div class="form-body" id="frm_put_data">
											   

											</div>

											

										</form>

										<!-- END FORM-->

									</div>
								</div>
							</div>
						<!--</div>-->
					</div>
				</div>
			</div>

			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>

	<!-- END PAGE CONTENT -->

</div>

<!-- END PAGE CONTAINER -->
<script>

window.onload = function() {
    var ID = $('#customerID').val();
    $.post("<?=site_url("treeview/ajaxgetCustomerdetails");?>",{ customer_id : ID },
        function(data){
        	//alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
            	$('#minus_'+ID).html('<i class="fa fa-minus" aria-hidden="true"></i>');
            	
            	
            	
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}



function getCustomerdetails(ID)
{
	$.post("<?=site_url("treeview/ajaxgetCustomerdetails");?>",{ customer_id : ID },
        function(data){
        	//alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
            	$('#minus_'+ID).html('<i class="fa fa-minus" aria-hidden="true"></i>');
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}
function getPlantdetails(PLANTID,CUSTID)
{
    //alert(111);
	$.post("<?=site_url("treeview/ajaxgetPlantdetails");?>",{ plant_id : PLANTID , customer_id : CUSTID},
        function(data){
        	//alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}
function getPlantdetails1(PROGRAMID,PLANTID,CUSTID)
{
    //alert(111);
	$.post("<?=site_url("treeview/ajaxgetPlantdetails1");?>",{ program_id : PROGRAMID, plant_id : PLANTID , customer_id : CUSTID},
        function(data){
        	//alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}
function getPlantdetails2(TYPEID,PROGRAMID,PLANTID,CUSTID)
{
    //alert(111);
	$.post("<?=site_url("treeview/ajaxgetPlantdetails2");?>",{ type_id : TYPEID,program_id : PROGRAMID, plant_id : PLANTID , customer_id : CUSTID},
        function(data){
        	//alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}
function setPlantList(ID)
{
	//alert(ID);
    $.post("<?=site_url("treeview/ajaxgetPlantList");?>",{ customer_id : ID },
        function(data){
        	//alert(data);
            if(data != ""){
            	 $('#plant_'+ID).html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#plant_'+ID).html('No Data Found.');
            }
        });
}

function setProgramList(ID,CUSID)
{
	//alert(ID);
    $.post("<?=site_url("treeview/ajaxProgramList");?>",{ plant_id : ID,customer_id : CUSID },
        function(data){
        	//alert(data);
            if(data != ""){
            	 $('#Program_'+ID).html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }else{
            	$('#Program_'+ID).html('No Data Found.');
            }
        });
}

function setTypeList(ID,PLANTID,CUSID)
{
	//alert(ID);
    $.post("<?=site_url("treeview/ajaxTypeList");?>",{ program_id : ID,plant_id : PLANTID,customer_id : CUSID },
        function(data){
        	//alert(data);
            if(data != ""){
            	 $('#type_'+ID).html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }
        });
}

function setWorkList(ID,PROGID,PLANTID,CUSID)
{
	//alert(ID);
    $.post("<?=site_url("treeview/ajaxWorkList");?>",{ type_id : ID,program_id : PROGID,plant_id : PLANTID,customer_id : CUSID },
        function(data){
        	//alert(data);
            if(data != ""){
            	 $('#work_'+ID+'_'+PROGID+'_'+PLANTID+'_'+CUSID).html(data);
                // if(data == "No"){
                //     $('#crror_class_details').html('<plant="red"><b>Applicable standard already exist.</b></plant>');
                // }else{
                //     location.reload();
                // }
            }
        });
}
</script>

