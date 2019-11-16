<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">

		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>Users Management</h1>
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
					 Users Management
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
                                <i class="fa fa-gift"></i>Users Management 
                            </div>
						</div>

						<div class="portlet-body">
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

							<?php if($this->session->flashdata('admin_msg') != "") { ?>
                            <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('admin_msg');?>
                            </div>
                            <?php } ?>
                            <?php if($this->session->flashdata('admin_errmsg') != "") { ?>
                            <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Error&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('admin_errmsg');?>
                            </div>
                            <?php } ?>

							<table class="table table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
                                
								<th>Name</th>
								<th>Role</th>
								<th>Username</th>
                                <th>Status</th>
								<th>Action</th>
                                <!--<th>Delete</th>-->
							</tr>
							</thead>
                            <?php if($num_tag > 0){?>

							<tbody>
							<?php $cnt = 1;?>
							<?php foreach($record as $value) {?>

							<tr class="odd gradeX">
								<!--<td><input type="checkbox" class="checkboxes" value="1"/></td>-->
                                <!--<td><?php //echo $cnt++?></td>-->
								<td><?=$value->admin_fname." ".$value->admin_lname?></td>
								<td><?=$value->typename?></td>
								<td><?=$value->admin_username?></td>
                                <td class="center">
								<?php if($value->status == "Active"){ ?>
									<a href="javascript:admin_edit_status('<?=site_url('adminuser/editstatus/'.$value->admin_id);?>','<?=$value->status?>')" class="btn btn-xs green">
                                        Active
                                    </a>
                                <?php }else{ ?>
                                    <a href="javascript:edit_status('<?=site_url('adminuser/editstatus/'.$value->admin_id);?>','<?=$value->status?>')" class="btn btn-xs red">
                                    	Inactive
                                    </a>
                                <?php }?>    
                                </td>
								<td>
                                    <a href="javascript:edit_admin_record('<?=site_url('adminuser/edit/'.$value->admin_id);?>')" class="btn btn-xs green">
                                    <i class="fa fa-edit"></i> Edit 
                                    </a>
                                    <a href="javascript:reset_password('<?=site_url('adminuser/reset_password/'.$value->admin_id);?>')" class="btn btn-xs blue">
                                    <!-- <i class="fa fa-trash"></i> --> Reset Password 
                                    </a>
                                    <a href="javascript:delete_admin_record('<?=site_url('adminuser/delete/'.$value->admin_id);?>')" class="btn btn-xs red">
                                    <i class="fa fa-trash"></i> Delete 
                                    </a>
								</td>

                                <!-- <td>
                                    <a href="javascript:delete_admin_record('<?=site_url('adminuser/delete/'.$value->admin_id);?>')" class="btn btn-xs red">
                                    <i class="fa fa-trash"></i> Delete 
                                    </a>
								</td>-->

							</tr>

                            <?php }?>

							</tbody>

                            <?php }else{?>

                            <tbody>
							<tr class="odd gradeX">
								<td colspan="5">No user found</td>
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
			<script type= text/javascript>
			$( document ).ready(function() {
                //$('#sample_2_length').css('display','none');
                $('#sample_2_length').css('display','none');
            });
			</script>

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
											<i class="fa fa-gift"></i><?php if($page_mode == "EDIT"){ ?> Edit <?php }else{?> Add <?php }?> User
										</div>
									</div>

									<div class="portlet-body form">

										<!-- BEGIN FORM-->

										<form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="admin_id" value="<?=($page_mode == "EDIT") ? $record->admin_id : "";?>" />
                                            <input type="hidden" id="page_mode" name="page_mode" value="" />

											<div class="form-body">
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>

												<?php if($this->session->flashdata('admin_msg') != "") { ?>

                                                <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('admin_msg');?>
                                                </div>

                                                <?php } ?>

                                                <?php if($this->session->flashdata('admin_errmsg') != "") { ?>

                                                <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <?=$this->session->flashdata('admin_errmsg');?>
                                                </div>

                                                <?php } ?>
                                                <!--<div class="form-group">
													<label class="col-md-3 control-label">Name <?php //if($page_mode != "EDIT"){?><span class="required">* </span><?php //}?></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_name" id="admin_name" value="<?=($page_mode == "EDIT") ? $record->admin_name : "";?>" <?php if($page_mode == "EDIT"){?> readonly="readonly"<?php }?>>
													</div>
												</div>-->
												
												<div class="form-group">
													<label class="col-md-3 control-label">First Name <span class="required">* </span></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_fname" id="admin_fname" value="<?=($page_mode == "EDIT") ? $record->admin_fname : "";?>" >
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label">Last Name <span class="required">* </span></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_lname" id="admin_lname" value="<?=($page_mode == "EDIT") ? $record->admin_lname : "";?>" >
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-3 control-label">Username <?php if($page_mode != "EDIT"){?><span class="required">* </span><?php }?></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_username" id="admin_username" value="<?=($page_mode == "EDIT") ? $record->admin_username : "";?>" <?php if($page_mode == "EDIT"){?> readonly="readonly"<?php }?>>
													</div>
												</div>
                                                <?php if(isset($page_mode) && $page_mode != "EDIT"){ ?>                
                                                <div class="form-group">
                                                      <label class="control-label col-md-3">Password <span class="required">* </span></label>
                                                      <input type="hidden" name="db_pass" id="db_pass" value="<?php if(isset($record->user_type) && $record->admin_password != ""){ echo $record->admin_password;}else{ echo "";}?>" />
                                                      <div class="col-md-4">
                                                          <input type="password" class="form-control" rows="10" name="admin_password" id="admin_password" value="" />
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label class="control-label col-md-3">Confirm Password <span class="required">* </span></label>
                                                      <div class="col-md-4">
                                                          <input type="password" class="form-control" rows="10" name="confirm_password" id="confirm_password" value="" />
                                                      </div>
                                                </div>
                                                <?php }?>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                            <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                            </span>
                                                        <input type="text" class="form-control" name="admin_email" id="admin_email" value="<?=($page_mode == "EDIT") ? $record->admin_email : "";?>">
                                                    </div>
                                                </div>   
                                                </div>
                                                
                                                <div class="form-group">
													<label class="col-md-3 control-label">Phone </label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_phone" id="admin_phone" value="<?=($page_mode == "EDIT") ? $record->admin_phone : "";?>" >
													</div>
												</div>

                                                <div class="form-group">
                                                  <label class="col-md-3 control-label">Role<span class="required">* </span></label>
                                                  <div class="col-md-4">
                                                      <?php if($page_mode == "ADD"){?>
                                                      <select class="form-control" name="user_type" id="user_type">
                                                      <option value="">Select</option>
                                                      <?php 
                                                      foreach($usertype as $value) {?>
                                                      <option value="<?=$value->type_id;?>"><?=$value->typename;?></option>
                                                      <?php }?>
                                                      </select>
                                                      <?php }elseif($page_mode == "EDIT"){?>
                                                      <select class="form-control" name="user_type" id="user_type">
                                                      <option value="">Select</option>
                                                      <?php foreach($usertype as $value) {?>
                                                      <option value="<?=$value->type_id;?>" <?php if($value->type_id == $record->user_type){?> selected="selected" <?php }?>><?=$value->typename;?></option>
                                                      <?php } ?>
                                                      </select>
                                                      <?php }?>
                                                  </div>
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

            <?php if($page_mode == "RESETPASSWORD" ) { ?>

			<!-- BEGIN PAGE CONTENT INNER -->

			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Reset Password
										</div>
									</div>

									<div class="portlet-body form">

										<!-- BEGIN FORM-->

										<form name="frm_reset" id="frm_reset" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="admin_id" value="<?=$admin_id?>" />
                                            <input type="hidden" id="page_mode" name="page_mode" value="" />

											<div class="form-body">
                                                <div class="alert alert-danger display-hide">
                                                    <button class="close" data-close="alert"></button>
                                                    You have some form errors. Please check below.
                                                </div>

												<?php if($this->session->flashdata('admin_msg1') != "") { ?>

                                                <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Success&nbsp;!&nbsp;</strong> <?=$this->session->flashdata('admin_msg');?>
                                                </div>

                                                <?php } ?>

                                                <?php if($this->session->flashdata('admin_errmsg') != "") { ?>

                                                <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <?=$this->session->flashdata('admin_errmsg');?>
                                                </div>

                                                <?php } ?>
                                                <!--<div class="form-group">
													<label class="col-md-3 control-label">Name <?php //if($page_mode != "EDIT"){?><span class="required">* </span><?php //}?></label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="admin_name" id="admin_name" value="<?=($page_mode == "EDIT") ? $record->admin_name : "";?>" <?php if($page_mode == "EDIT"){?> readonly="readonly"<?php }?>>
													</div>
												</div>-->
												
												                
                                                <div class="form-group">
                                                      <label class="control-label col-md-3">New Password <span class="required">* </span></label>
                                                      <div class="col-md-4">
                                                          <input type="password" class="form-control" rows="10" name="admin_password" id="admin_password" value="" />
                                                      </div>
                                                </div>

                                                <div class="form-group">
                                                      <label class="control-label col-md-3">Confirm Password <span class="required">* </span></label>
                                                      <div class="col-md-4">
                                                          <input type="password" class="form-control" rows="10" name="cadmin_password" id="cadmin_password" value=""/>
                                                          <span id="err_ms" style="font-weight: 600;color: red;"></span>
                                                      </div>

                                                </div>
 											</div>

											<div class="form-actions">
												<div class="row">

													<div class="col-md-offset-3 col-md-9">
                                                        <button type="button" class="btn green" id="btn_submit1">Update</button>
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

