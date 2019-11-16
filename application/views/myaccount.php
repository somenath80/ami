<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">
		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>My Profile</h1>
			</div>

			<!-- END PAGE TITLE -->

		</div>
	</div>

	<!-- END PAGE HEAD -->

	<!-- BEGIN PAGE CONTENT -->

	<div class="page-content">

		<div class="container">

			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?=site_url("admin/signin/dashboard");?>">Home</a><i class="fa fa-circle"></i>
				</li>

				<li class="active">
					 My Profile
				</li>
			</ul>

			<!-- END PAGE BREADCRUMB -->

			<!-- BEGIN PAGE CONTENT INNER -->

			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">
								<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit My Profile
										</div>
									</div>

									<div class="portlet-body form">

                                    	<div class="clearfix"></div>

										<!-- BEGIN FORM-->

                                            <form name="frm_settings" id="frm_settings" class="form-horizontal" action="<?=site_url("myaccount/update_settings");?>" method="post" enctype="multipart/form-data">

                                                <input type="hidden" name="admin_id" value="<?=$record->admin_id?>" />

                                                <input type="hidden" id="mode" name="mode" value="Yes" />

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
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Name <span class="required">* </span></label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="full_name" id="full_name" value="<?=$record->admin_fname." ".$record->admin_lname;?>" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        

                                                        <div class="form-group">
                                                            <!--<label class="col-md-3 control-label">Organization </label>-->
                                                            <label class="control-label col-md-3">User Name <span class="required">* </span></label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="admin_username" id="admin_username" value="<?=$record->admin_username?>" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <!--<label class="col-md-3 control-label">Organization </label>-->
                                                            <label class="control-label col-md-3">Phone <span class="required">* </span></label>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" name="admin_phone" id="admin_phone" value="<?=$record->admin_phone?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Email<span class="required">* </span></label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                    <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                    <input type="email" class="form-control" name="admin_email" id="admin_email" value="<?=$record->admin_email?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                              <label class="control-label col-md-3">Password</label>
                                                              <input type="hidden" name="db_pass" id="db_pass" value="<?php if(isset($record->user_type) && $record->admin_password != ""){ echo $record->admin_password;}else{ echo "";}?>" />
                                                              <div class="col-md-4">
                                                                  <input type="password" class="form-control" rows="10" name="admin_password" id="admin_password" value="" />
                                                              </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                              <label class="control-label col-md-3">Confirm Password</label>
                                                              <div class="col-md-4">
                                                                  <input type="password" class="form-control" rows="10" name="admin_cpassword" id="admin_cpassword" value="" />
                                                              </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                              <label class="control-label col-md-3">Role</label>
                                                              <div class="col-md-4">
                                                                  <input type="text" class="form-control" name="role" id="role" value="<?=$record->typename?>" readonly/>
                                                              </div>
                                                        </div>

                                                <!--<div class="form-group">

                                                      <label class="control-label col-md-3">Confirm Password</label>

                                                      <div class="col-md-4">

                                                          <input type="text" class="form-control" rows="10" name="reseller_confirm_password" id="reseller_confirm_password" value="<?=($page_mode == "EDIT") ? stripslashes($record->admin_password) : "";?>" />

                                                      </div>

                                                  </div>-->

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">Update</button>
                                                                </div>
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

		</div>
	</div>

	<!-- END PAGE CONTENT -->

</div>

<!-- END PAGE CONTAINER -->
