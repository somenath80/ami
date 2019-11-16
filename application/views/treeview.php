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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous">
</script>
<script src="<?=site_url("assets/dist/jquery-simple-tree.js");?>"></script>
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
<style>
    a:focus, a:hover {
    text-decoration: none !important;
    }
</style>
						<div class="portlet-body1">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
									</div>
								</div>
							</div>

                            <div style='font-size: 1.4rem; font-weight:700;'></div>             
<ul id="basic">
    <?php $j=1;$i=0;foreach($customers as $value) { ?>
        <li data-node-id="<?php echo $j;?>"  class="com_class_<?php echo $value->customer_id;?>">
            <span>
                <a href="javascript:setPlantList('<?php echo $value->customer_id;?>'),getCustomerdetails('<?php echo $value->customer_id;?>')">
                    <?php echo $value->name;?>
                </a>
                <input type="hidden" name="customerID" id="customerID" value="<?php echo $value->customer_id;?>">
            </span>
            <?php
		    $data['customer_id'] = $value->customer_id;
    		$plants = $this->model_treeview->get_plant_data($data);
    		$num = count($plants);
    		?>
            <ul>
                <?php $k=1;foreach($plants as $value){?>
                  <li data-node-id="<?php echo $j;?>.<?php echo $k;?>">
                    <span>
                        <a href="javascript:setProgramList('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>'),getPlantdetails('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>')">
                            <?=ucwords(strtolower($value->plant_name))?>
                        </a>
                    </span>
                    <!--<div id="Program_<?php //echo $value->plant_id;?>"></div>-->
                    <?php
        		    $data['plant_id'] = $value->plant_id;
            		$program = $this->model_treeview->get_proram_data($data);
            		$num = count($program);
            		?>
                    <ul>
                      <?php $l=1;foreach($program as $val){?>        
                      <li data-node-id="<?php echo $j;?>.<?php echo $k;?>.<?php echo $l;?>">
                        <span>
                            <a href="javascript:setTypeList('<?php echo $val->program_id;?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails1('<?php echo $val->program_id;?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')">
                            <?=ucwords(strtolower($val->program_name))?>
                            </a>
                        </span>
                        <?php
            		    $data['program_id'] = $value->program_id;
                		$type = $this->model_treeview->get_type_data($data);
                		$num = count($type);
                		?>
                            <ul>
                                <?php $m=1;foreach($type as $value){?>
                                  <li data-node-id="<?php echo $j;?>.<?php echo $k;?>.<?php echo $l;?>.<?php echo $m;?>">
                                    <span>
                                        <a href="javascript:javascript:setWorkList('<?php echo $value->type_id;?>','<?php echo $data['program_id'];?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails2('<?php echo $value->type_id;?>','<?php echo $data['program_id'];?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')">
                                        <?=ucwords(strtolower($value->type_name))?>
                                        </a>
                                    </span>
                                     <?php
                        		    $data['type_id'] = $value->type_id;
                            		$work = $this->model_treeview->get_work_data($data);
                            		$num = count($work);
                            		?>
                                        <ul>
                                            <?php $n=1;foreach($work as $value){?>
                                              <li data-node-id="<?php echo $j;?>.<?php echo $k;?>.<?php echo $l;?>.<?php echo $m;?>.<?php echo $n;?>">
                                                <span><a><?php echo $value->admin_fname."      ".$value->before_work_date;?></a></span>
                                              </li>
                                              <?php $n++;} ?> 
                                        </ul>
                                    
                                  </li>
                                <?php $m++;} ?>  
                            </ul>
                      </li>
                      <?php $l++;} ?>
                    </ul>
                  </li>
                <?php $k++;} ?>
            </ul>
        </li>
  <?php $j++;$i++;} ?>
</ul>
<script>
    $('#basic').simpleTree({
      storeState: false,
      storeType: 'session', // or 'local'
      opened: [1,1.1]
    });
</script>


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
    //alert(ID);
    $.post("<?=site_url("treeview/ajaxgetCustomerdetails");?>",{ customer_id : ID },
        function(data){
        //	alert(data);
            if(data != ""){
            	$('.frm').css('display','block');            	
            	$('#frm_put_data').html(data);
            	$('#minus_'+ID).html('<i class="fa fa-minus" aria-hidden="true"></i>');
            	
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

