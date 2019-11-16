<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Assigned Work</h1>
			</div>
			<!-- END PAGE TITLE -->
		</div>
	</div>

	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?=site_url("signin/dashboard");?>">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Assigned Work
				</li>
			</ul>

			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">

				<div class="col-md-12">

					<!-- BEGIN EXAMPLE TABLE PORTLET-->

					<div class="portlet box blue-hoki">
						<div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Assigned Work Listings
                            </div>
						</div>

						<div class="portlet-body">
                        <div id="load_product" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: #EFF3F8; z-index: 99; height: 100%;">
                        <div id="load_image" style="position: absolute; left: 55%; top: 350px; background-repeat: no-repeat; background-position: center; margin: -100px 0 0 -100px;">
                        <img src="<?=site_url("assets/global/img/loading.gif");?>" align="center" />
                        </div>
                        </div>
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<!--<button id="btn_add" class="btn green">-->
											<!--	Add New <i class="fa fa-plus"></i>-->
											<!--</button>-->
										</div>
									</div>
								</div>
							</div>

                            <form id="formlisting" name="formlisting" action="" method="post">

                                <input type="hidden" name="page_mode" id="page_mode" value="" />
                                <input type="hidden" name="status" id="status" value="" />

							<?php if($this->session->flashdata('user_msg') != "") { ?>

                            <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('user_msg');?>
                            </div>

                            <?php } ?>

                            <?php if($this->session->flashdata('user_errmsg') != "") { ?>

                            <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Error&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('user_errmsg');?>
                            </div>

                            <?php } ?>


							<table class="table table-bordered table-hover" <?php if($num_tag > 0){?> id="sample_2" <?php }?>>

							<thead>
							<tr>
                                <!--<th>Sl No.</th>-->
                                <th>Company</th>
                                <th>Plant</th>
                                <th>Program</th>
                                <th>Type</th>
                                <th>Inspector</th>
                                <th>Date</th>
								<th>Template</th>
								<th>Inspection Report</th>
								<th>Status</th>
                                <!-- <th>Delete</th> -->
							</tr>

							</thead>

                            <?php if($num_tag > 0){?>

							<tbody>
							<?php $cnt = 1;?>
							<?php foreach($record as $value) {?>

							<tr class="odd gradeX">

								<!--<td><input type="checkbox" class="checkboxes" value="1"/></td>-->
                                
                                <!--<td><?=$cnt++?></td>-->
                                <td><?php echo $value->customername; ?></td>
                                <td><?php echo $value->plantname;?></td>
                                <td><?php echo $value->program_name;?></td>
                                <td><?php echo $value->type_name;?></td>
                                <td><?php echo $value->admin_fname." ".$value->admin_lname;?></td>
                                <td><?php echo date("d/m/Y",strtotime($value->before_work_date));?></td>
								<td>
                                    <a href="<?=site_url('uploads/pdf_upload/'.$value->pm_upload_templete_name);?>">
                                    <button type="button" class="btn btn-default btn-xs">
							          <i class="fa fa-download" aria-hidden="true"></i> Download
							        </button>
                                    </a>
								</td>
								<td>
								        <?php if($value->status != "Complete"){?>
                                            <?php if(isset($value->ins_upload_templete_name) && $value->ins_upload_templete_name != ""){?>
        										<a href="<?=site_url('uploads/pdf_upload/'.$value->ins_upload_templete_name);?>">
        	                                    <button type="button" class="btn btn-default btn-xs">
        								          <i class="fa fa-download" aria-hidden="true"></i> Download
        								        </button>
        	                                    </a>
        									    
        	                                <?php }else{?>
        	                                	<a href="<?=site_url('work/uploadinspectorDetails/'.$value->work_id);?>">
        	                                    <button type="button" class="btn btn-default btn-xs">
        								          <i class="fa fa-upload" aria-hidden="true"></i> Upload
        								        </button>
        	                                    </a>
        	                                <?php }?>
        	                           <?php }else{?>
        	                                <button type="button" class="btn btn-success btn-xs btnup">Complete</button>
        	                                <a href="<?=site_url('work/uploadinspectorDetails/'.$value->work_id);?>">
        	                                    <button type="button" class="btn btn-default btn-xs">
        								          <i class="fa fa-upload" aria-hidden="true"></i> Upload
        								        </button>
        	                                    </a>
        	                           <?php }?>
        	                    </td>
								<td>
								<?php 
								if(isset($value->status) && $value->status == "New"){ 
								    echo  "WIP";
                                }else if(isset($value->status) && $value->status == "Review"){
                                    echo  "Review";
                                }else if(isset($value->status) && $value->status == "Complete"){
                                    echo  "Complete";
                                }
                                ?>
                                </td>
							</tr>

                            <?php }?>

							</tbody>

                            <?php }else{?>

                            <tbody>
							<tr class="odd gradeX">
								<td colspan="9">No Work found</td>
							</tr>
							</tbody>

                            <?php }?>

							</table>

                            </form>

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>

<!-- END PAGE CONTAINER -->

<!-- Completed Calls DIALOG BOX -->
    <div class="modal fade" id="Upload_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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



