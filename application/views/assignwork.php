<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">
		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>Work Assigment</h1>
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
					 Work Assigment
				</li>
			</ul>

			<!-- END PAGE BREADCRUMB -->

            <?php if($page_mode == "LISTINGS") { ?>

			<!-- BEGIN PAGE CONTENT INNER -->

			<div class="row">

				<div class="col-md-12">

					<!-- BEGIN EXAMPLE TABLE PORTLET-->

					<div class="portlet box blue-hoki">
						<div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Work Assigment Listings
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
											<button id="btn_add" class="btn green">
												Add New <i class="fa fa-plus"></i>
											</button>
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
                                <th>Status</th>
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
                                <td><?php if(isset($value->program_id) &&  $value->program_id == 1 ){ echo "Environmental"; }else{ echo "Health & Safty"; }?></td>
                                <td><?php if(isset($value->type_id) && $value->type_id == 1 ){ echo "Monthly"; }else{ echo "Bi-Weekly"; }?></td>
                                <td><?=$value->inspector_id?></td>
                                <td><?php echo date("d/m/Y",strtotime($value->before_work_date));?></td>
                                <td class="center"><?php if(isset($value->status)){ echo $value->status; }?></td>

								<td>
                                    <a href="<?=site_url('uploads/pdf_upload/'.$value->pm_upload_templete_name);?>">
                                    <button type="button" class="btn btn-default btn-xs">
							          <span class="glyphicon glyphicon-download"></span> Download
							        </button>
                                    </a>
								</td>
								<td>
								    <?php if($value->status != "Complete"){?>
                                    <a href="#">
                                    <button type="button" class="btn btn-default btn-xs upload_file">
							          <span class="glyphicon glyphicon-upload"></span> Upload
							        </button>
                                    </a>
                                    <?php }else{ ?>
                                    <?php echo "This assignment completed.";?>
                                    <?php }?>
								</td>
								<?php if($_SESSION['b_user_type'] != 3){?>
								<td><?php echo $value->status;?></td>
								<?php } ?>
							</tr>

                            <?php }?>

							</tbody>

                            <?php }else{?>

                            <tbody>
							<tr class="odd gradeX">
								<td colspan="10">No Work found</td>
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

            <?php }?>

            

            <?php if($page_mode == "ADD" || $page_mode == "EDIT") { ?>

			<!-- BEGIN PAGE CONTENT INNER -->

			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i><?php if($page_mode == "EDIT"){ ?> Edit <?php }else{?> Add <?php }?> work
										</div>
									</div>

									<div class="portlet-body form">

										<!-- BEGIN FORM-->

										<form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                          <input type="hidden" name="customer_id" id="customer_id" value="<?=($page_mode == "EDIT") ? $record->customer_id : "";?>" />
                                          <input type="hidden" id="page_mode" name="page_mode" value="" />

											<div class="form-body">

                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>

												<?php if($this->session->flashdata('user_msg') != "") { ?>

                                                <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('user_msg');?>
                                                </div>

                                                <?php } ?>

                                                <?php if($this->session->flashdata('user_errmsg') != "") { ?>

                                                <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <?=$this->session->flashdata('user_errmsg');?>
                                                </div>

                                                <?php } ?>

                                                <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>

						                        <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>

						                        <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>


						                        <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>


						                        <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>

						                        <div class="form-group">
								                  <label class="col-md-3 control-label">Logo Upload <br />(JPG/PNG/JPEG Only)</label>
								                  <div class="col-md-4">
								                      <input type="file" id="orig_img" name="orig_img" value="" />
								                  </div>
								                </div>

						                        <div class="form-group">
								                  <label class="col-md-3 control-label">Logo Upload <br />(JPG/PNG/JPEG Only)</label>
								                  <div class="col-md-4">
								                      <input type="file" id="orig_img" name="orig_img" value="" />
								                  </div>
								                </div>
								                
								                <?php if($record->orig_img != ""){?>
								                <div class="form-group">
								                    <label class="control-label col-md-3">Preview&nbsp;&nbsp;</label>
								                    <div class="col-md-4">
								                    <img src="<?=site_url("uploads/logo_upload/".$record->orig_img);?>" alt="<?=$record->orig_img?>" class="logo-default">
								                    </div>
								                </div>
								                <?php }?>

								                <div class="form-group">
						                            <label class="col-md-3 control-label">Customer<span class="required">* </span></label>
						                            <div class="col-md-4">
						                                <select class="form-control" name="customer_id" id="customer_id">
						                                  <?php foreach($customer as $value){?>
						                                  <option value="<?php echo $value->customer_id;?>" <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected <?php }?> ><?php echo $value->name;?></option>
						                                  <?php }?>
						                                </select>
						                            </div>
						                        </div>



											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
                                                    	<?php if($page_mode == "ADD"){?>
														<button type="button" class="btn green" id="btn_submit">Submit</button>
                                                        <?php }else{?>
                                                        <button type="button" class="btn green" id="btn_submit">Update</button>
                                                        <?php }?>
														<button type="button" class="btn default" id="btn_cancel">Cancel</button>
													</div>
												</div>
											</div>

										</form>

										<!-- END FORM-->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- END PAGE CONTENT INNER -->

            <?php }?>


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



