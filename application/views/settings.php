<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">

		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>Settings</h1>
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
					<a href="<?=site_url("signin/dashboard");?>">Home</a><i class="fa fa-circle"></i>
				</li>

				<li class="active">
					 Settings
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
											<i class="fa fa-gift"></i>Edit Settings
										</div>
									</div>
									<div class="portlet-body form">
                                    	<div class="clearfix"></div>

<!-- BEGIN FORM-->
   <form name="frm_settings" id="frm_settings" class="form-horizontal" action="<?=site_url("Settings/update_settings");?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="db_orig_img" id="db_orig_img" value="<?=$record->orig_img?>" />
        <input type="hidden" name="db_top_adv_orgimg" id="db_top_adv_orgimg" value="<?=$record->top_adv_orgimg?>" />
        <input type="hidden" name="db_left_footer_adv_orgimg" id="db_left_footer_adv_orgimg" value="<?=$record->left_footer_adv_orgimg?>" />
        <input type="hidden" name="db_right_footer_adv_orgimg" id="db_right_footer_adv_orgimg" value="<?=$record->right_footer_adv_orgimg?>" />
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
                    <label class="control-label col-md-3">Organization Name</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="organization" id="organization" value="<?=$record->organization?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Address</label>
                    <div class="col-md-4">
                            <textarea class="form-control" name="address" id="address"><?=$record->address?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" name="contact_email" id="contact_email" value="<?=$record->contact_email?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">Contact No.</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="<?=$record->contact_phone?>">
                    </div>
                </div>
                
                <div class="form-group" style="display:none;">
                  <label class="col-md-3 control-label">Sorting (default)</label>
                  <div class="col-md-4">
                  <select class="form-control select2me" name="tag" id="tag">
                    <option value="">Select</option>
                    <option value="Newly Added" <?php if($record->tag == "Newly Added"){?> selected="selected" <?php }?>>Newly Added</option>
                    <option value="Best Seller" <?php if($record->tag == "Best Seller"){?> selected="selected" <?php }?>>Best Seller</option>
                 </select>
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

                 <div class="form-group" style="display:none;">
                  <label class="col-md-3 control-label">Advertisment Show</label>
                  <div class="col-md-4">
                  <select class="form-control select2me" name="tag" id="tag">
                    <option value="">Select</option>
                    <option value="Newly Added" <?php if($record->tag == "Newly Added"){?> selected="selected" <?php }?>>Newly Added</option>
                    <option value="Best Seller" <?php if($record->tag == "Best Seller"){?> selected="selected" <?php }?>>Best Seller</option>
                 </select>
                  </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label class="col-md-3 control-label">Facebook Link</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="<?=$record->facebook_link?>">
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label class="col-md-3 control-label">Twitter Link</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="<?=$record->twitter_link?>">
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label class="col-md-3 control-label">You Tube Link</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="youtube_link" id="youtube_link" value="<?=$record->youtube_link?>">
                    </div>
                </div>
                <div class="form-group" style="display: none;">
                    <label class="col-md-3 control-label">Printinterest Link</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="printinterest_link" id="printinterest_link" value="<?=$record->printinterest_link?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Copyright Notice</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="copyright" id="copyright" value="<?=$record->copyright?>">
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                  <label class="col-md-3 control-label">Top Advertisment <br />(JPG/PNG/JPEG Only)</label>
                  <div class="col-md-4">
                      <input type="file" id="top_adv_orgimg" name="top_adv_orgimg" value="" />
                  </div>
                </div>
                
                <?php if($record->top_adv_orgimg != ""){?>
                <div class="form-group" style="display: none;">
                    <label class="control-label col-md-3">Preview&nbsp;&nbsp;</label>
                    <div class="col-md-4">
                    <img src="<?=site_url("uploads/advertisment/".$record->top_adv_orgimg);?>" alt="<?=$record->top_adv_orgimg?>" class="logo-default">
                    </div>
                </div>
                <?php }?>

                <div class="form-group" style="display: none;">
                  <label class="col-md-3 control-label">Footer Left Advertisment <br />(JPG/PNG/JPEG Only)</label>
                  <div class="col-md-4">
                      <input type="file" id="left_footer_adv_orgimg" name="left_footer_adv_orgimg" value="" />
                  </div>
                </div>
                
                <?php if($record->left_footer_adv_orgimg != ""){?>
                <div class="form-group" style="display: none;">
                    <label class="control-label col-md-3">Preview&nbsp;&nbsp;</label>
                    <div class="col-md-4">
                    <img src="<?=site_url("uploads/advertisment/".$record->left_footer_adv_orgimg);?>" alt="<?=$record->left_footer_adv_orgimg?>" class="logo-default">
                    </div>
                </div>
                <?php }?>

                <div class="form-group" style="display: none;">
                  <label class="col-md-3 control-label">Footer Right Advertisment <br />(JPG/PNG/JPEG Only)</label>
                  <div class="col-md-4">
                      <input type="file" id="right_footer_adv_orgimg" name="right_footer_adv_orgimg" value="" />
                  </div>
                </div>
                
                <?php if($record->right_footer_adv_orgimg != ""){?>
                <div class="form-group" style="display: none;">
                    <label class="control-label col-md-3">Preview&nbsp;&nbsp;</label>
                    <div class="col-md-4">
                    <img src="<?=site_url("uploads/advertisment/".$record->right_footer_adv_orgimg);?>" alt="<?=$record->right_footer_adv_orgimg?>" class="logo-default">
                    </div>
                </div>
                <?php }?>

                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">Update</button>
                            <!--<button type="button" class="btn default" id="btn_cancel">Cancel</button>-->
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

