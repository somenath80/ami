<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">

	<!-- BEGIN PAGE HEAD -->

	<div class="page-head">
		<div class="container">

			<!-- BEGIN PAGE TITLE -->

			<div class="page-title">
				<h1>Permission</h1>
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
					<a href="<?=site_url("admin/signin/dashboard");?>">Home</a><i class="fa fa-circle"></i>
				</li>

				<li class="active">
					 Permission
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
                                <i class="fa fa-gift"></i>Permission
                            </div>
						</div>

						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="btn_add" class="btn green">
												Set Permission <i class="fa fa-plus"></i>
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


							<table class="table table-bordered table-hover" <?php if($num_tag > 0){?> id="sample_2" <?php }?>>

							<thead>
							<tr>
                                <th>Sl No.</th>
								<th>User Type</th>
                                <th>Edit</th>
                                <!--<th>Delete</th>-->
							</tr>
							</thead>

                            <?php if($num_tag > 0){?>

							<tbody>
							<?php $cnt = 1;?>
							<?php foreach($record as $value) {?>

							<tr class="odd gradeX">

								<!--<td><input type="checkbox" class="checkboxes" value="1"/></td>-->
                                
                                <td><?=$cnt++?></td>

								<td><?=$value->typename?></td>
                                
                                <td>
                                    <a href="javascript:edit_record('<?=site_url('admin/permission/edit/'.$value->usertype_id);?>')" class="btn btn-xs green">
                                    <i class="fa fa-edit"></i> Edit
                                    </a>
								</td>

                                <!--<td>
                                    <a href="javascript:delete_record('<?=site_url('admin/permission/delete/'.$value->category_id.'/'.$value->subcategory_id.'/'.$value->book_id);?>')" class="btn btn-xs red">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>
								</td>-->

							</tr>

                            <?php }?>

							</tbody>

                            <?php }else{?>

                            <tbody>
                              <tr class="odd gradeX">
                                  <td colspan="7">No permission found</td>
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
											<i class="fa fa-gift"></i><?php if($page_mode == "EDIT"){ ?> Edit <?php }else{?> Set <?php }?> Permission
										</div>
									</div>

                <div class="portlet-body form">
    
                    <!-- BEGIN FORM-->
    
                    <form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="usertype_id" id="usertype_id" value="<?=($page_mode == "EDIT") ? $usertype_id : "";?>" />
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
                        
                        <div class="form-group">
                          <label class="col-md-3 control-label">User Type<span class="required">* </span></label>
                          <div class="col-md-4">
                          <?php if($page_mode == "ADD"){?>
                              <select class="form-control select2me" name="usertype_id" id="usertype_id">
                              <option value="">Select</option>
                              <?php foreach($record as $value) {?>
                              <option value="<?=$value->type_id;?>"><?=$value->typename;?></option>
                              <?php }?>
                              </select>
						  <?php }elseif($page_mode == "EDIT"){?>
                              <select class="form-control select2me" name="usertype_id" id="usertype_id">
                              <option value="">Select</option>
                              <?php foreach($usertype as $val) {?>
                              <option value="<?=$val->type_id;?>" <?php if($val->type_id == $usertype_id){?> selected="selected" <?php }?>><?=$val->typename?></option>
                              <?php }?>
                              </select>
                          <?php }?>
                          </div>
                        </div>
                        
                        <div class="caption">
                            <i class="fa fa-server"></i>&nbsp;&nbsp;Main Menus
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Dashboard</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="dashboard" id="dashboard" value="1" />
                            <?php }else{?>
                              <input type="checkbox" name="dashboard" id="dashboard" value="1" <?php foreach($record as $value) { if($value->menu_id == '1'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Settings</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="main_settings" id="main_settings" value="2" />
                            <?php }else{?>
                              <input type="checkbox" name="main_settings" id="main_settings" value="2" <?php foreach($record as $value) { if($value->menu_id == '2'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Users</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="main_users" id="main_users" value="3" />
                            <?php }else{?>
                              <input type="checkbox" name="main_users" id="main_users" value="3" <?php foreach($record as $value) { if($value->menu_id == '3'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Books</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="main_books" id="main_books" value="4" />
                            <?php }else{?>
                              <input type="checkbox" name="main_books" id="main_books" value="4" <?php foreach($record as $value) { if($value->menu_id == '4'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Customers</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="main_customers" id="main_customers" value="5" />
                            <?php }else{?>
                              <input type="checkbox" name="main_customers" id="main_customers" value="5" <?php foreach($record as $value) { if($value->menu_id == '5'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="caption">
                            <i class="fa fa-server"></i>&nbsp;&nbsp;Sub Menus
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">General Settings</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="general_settings" id="general_settings" value="6" />
                            <?php }else{?>
                              <input type="checkbox" name="general_settings" id="general_settings" value="6" <?php foreach($record as $value) { if($value->menu_id == '6'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Permission</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="permission" id="permission" value="16" />
                            <?php }else{?>
                              <input type="checkbox" name="permission" id="permission" value="16" <?php foreach($record as $value) { if($value->menu_id == '16'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">User Group</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="user_group" id="user_group" value="7" />
                            <?php }else{?>
                              <input type="checkbox" name="user_group" id="user_group" value="7" <?php foreach($record as $value) { if($value->menu_id == '7'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Users</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="users" id="users" value="8" />
                            <?php }else{?>
                              <input type="checkbox" name="users" id="users" value="8" <?php foreach($record as $value) { if($value->menu_id == '8'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="category" id="category" value="9" />
                            <?php }else{?>
                              <input type="checkbox" name="category" id="category" value="9" <?php foreach($record as $value) { if($value->menu_id == '9'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sub Category</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="sub_category" id="sub_category" value="10" />
                            <?php }else{?>
                              <input type="checkbox" name="sub_category" id="sub_category" value="10" <?php foreach($record as $value) { if($value->menu_id == '10'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Books</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="books" id="books" value="11" />
                            <?php }else{?>
                              <input type="checkbox" name="books" id="books" value="11" <?php foreach($record as $value) { if($value->menu_id == '11'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Code Generator</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="codegenerator" id="codegenerator" value="12" />
                            <?php }else{?>
                              <input type="checkbox" name="codegenerator" id="codegenerator" value="12" <?php foreach($record as $value) { if($value->menu_id == '12'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Code Search</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="codesearch" id="codesearch" value="13" />
                            <?php }else{?>
                              <input type="checkbox" name="codesearch" id="codesearch" value="13" <?php foreach($record as $value) { if($value->menu_id == '13'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Customers</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="customers" id="customers" value="14" />
                            <?php }else{?>
                              <input type="checkbox" name="customers" id="customers" value="14" <?php foreach($record as $value) { if($value->menu_id == '14'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Orders</label>
                            <div class="col-md-4">
                            <label class="col-md-3 control-label">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" name="orders" id="orders" value="15" />
                            <?php }else{?>
                              <input type="checkbox" name="orders" id="orders" value="15" <?php foreach($record as $value) { if($value->menu_id == '15'){?> checked="checked" <?php }}?> />
                            <?php }?>
                            </label>
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

