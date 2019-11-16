<!-- BEGIN PAGE CONTAINER -->

<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>User Role</h1>
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
				<li class="active"> User Role Management</li>
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
                                <i class="fa fa-gift"></i>User Role Management
                            </div>
						</div>
						<div class="portlet-body">
							<!-- <div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<button id="btn_add" class="btn green">
												Add New <i class="fa fa-plus"></i>
											</button>
										</div>
									</div>
								</div>
							</div> -->
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
              <table class="table table-bordered table-hover" >
              <thead>
              <tr>
                  <!--<th>Sl No.</th>-->
                  <th>Role Name</th>
                  <th>Access Level</th>
                  <!--<th>Status</th>-->
                  <th>Edit</th>
                  <!--<th>Delete</th>-->
              </tr>
              </thead>
              <?php if($num_tag > 0){?>
              <tbody>
              <?php $cnt = 1;?>
              <?php foreach($record as $value) {?>
              <tr class="odd gradeX">
                  <!--<td><?php //$cnt++?></td>-->
                  <td><?=$value->typename?></td>
                  <td>
                      <?php
                      $get_query = "SELECT menu_id FROM rs_permission
					  WHERE usertype_id = '".$value->type_id."'";
		               $query = $this->db->query($get_query);
		               $result = $query->result();
		               foreach($result as $val) {
                              if($val->menu_id == '1'){
                                echo "General Settings, ";
                              }
                              if($val->menu_id == '2'){
                                echo "Company Management, ";
                              }
                              if($val->menu_id == '3'){
                                echo "Plant Management,";
                              }
                              if($val->menu_id == '4'){
                                echo "Forms Management, ";
                                                        }
                              if($val->menu_id == '5'){
                                echo "Dashboard ";
                              }
		               }
                      ?>
                  </td>
      <!--            <td class="center">-->
				  <!--<?php //if($value->status == "Active"){ ?>-->
      <!--                <a href="javascript:admin_edit_status('<?php //site_url('usertype/editstatus/'.$value->type_id);?>','<?php //$value->status?>')" class="btn btn-xs green">-->
      <!--                    Active-->
      <!--                </a>-->
      <!--            <?php //}else{ ?>-->
      <!--                <a href="javascript:edit_status('<?php //site_url('usertype/editstatus/'.$value->type_id);?>','<?php//$value->status?>')" class="btn btn-xs red">-->
      <!--                    Inactive-->
      <!--                </a>-->
      <!--            <?php //}?>    -->
      <!--            </td>-->
                  
                  <td>
                      <a href="javascript:edit_admin_record('<?=site_url('usertype/edit/'.$value->type_id);?>')" class="btn btn-xs green">
                      <i class="fa fa-edit"></i> Edit
                      </a>
                  </td>
                  <!--<td>
                      <a href="javascript:delete_admin_record('<?php //site_url('usertype/delete/'.$value->type_id);?>')" class="btn btn-xs red">
                      <i class="fa fa-trash"></i> Delete
                      </a>
                  </td>-->
              </tr>
              <?php }?>
              </tbody>
              <?php }else{?>
              <tbody>
              <tr class="odd gradeX">
                  <td colspan="5">No user group found</td>
              </tr>
              </tbody>
              <?php }?>
              </table>
              </form>
						</div>

					</div>

					<!-- END EXAMPLE TABLE PORTLET -->

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
											<i class="fa fa-gift"></i><?php if($page_mode == "EDIT"){ ?> Edit <?php }else{?> Add <?php }?> User Role
										</div>
									</div>

                <div class="portlet-body form">
                <!-- BEGIN FORM-->
                
                <form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="type_id" id="type_id" value="<?=($page_mode == "EDIT") ? $result->type_id : "";?>" />
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
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Role Name<span class="required">* </span></label>
                            <div class="col-md-4">
                                <input type="text"class="form-control" name="typename" id="typename" value="<?=($page_mode == "EDIT") ? $result->typename : "";?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" style="font-weight:bold;">PERMISSIONS</label>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="form-group">
                        <label class="col-md-3 control-label" style="font-weight:bold;">Settings</label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="general_settings" id="general_settings" value="1" /> General Settings
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="general_settings" id="general_settings" value="1" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '1'){?> checked="checked" <?php }}}?> /> General Settings
                            <?php }?>
                            </label>
                            <label class="checkbox-inline my-checkbox">
                             <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="customer" id="customer" value="2" /> Company Management
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="customer" id="customer" value="2" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '2'){?> checked="checked" <?php }}}?> /> Company Management
                            <?php }?>
                            </label>
                            <label class="checkbox-inline my-checkbox">
                             <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="plant" id="plant" value="3" /> Plant Management
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="plant" id="plant" value="3" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '3'){?> checked="checked" <?php }}}?> /> Plant Management
                            <?php }?>
                            </label>
                            <label class="checkbox-inline my-checkbox">
                             <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="work" id="work" value="4" /> Forms Management
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="work" id="work" value="4" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '4'){?> checked="checked" <?php }}}?> /> Forms Management
                            <?php }?>
                            </label>
                            <label class="checkbox-inline my-checkbox">
                             <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="assignment" id="assignment" value="5" /> Dashboard
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="assignment" id="assignment" value="5" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '5'){?> checked="checked" <?php }}}?> /> Dashboard
                            <?php }?>
                            </label>
                            
                          </label>
                        </div>
                        
                        <div class="form-group">
                        <label class="col-md-3 control-label" style="font-weight:bold;">Users</label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="user_group" id="user_group" value="6" /> User Group
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="user_group" id="user_group" value="6" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '6'){?> checked="checked" <?php }}}?> /> User Group
                            <?php }?>
                          </label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="users" id="users" value="7" /> Users
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="users" id="users" value="7" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '7'){?> checked="checked" <?php }}}?> /> Users
                            <?php }?>
                          </label>
                        </div>
                        
                        <!-- <div class="form-group">
                        <label class="col-md-3 control-label" style="font-weight:bold;">Books</label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="category" id="category" value="8" /> Category
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="category" id="category" value="8" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '8'){?> checked="checked" <?php }}}?> /> Category
                            <?php }?>
                          </label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="subject" id="subject" value="9" /> Subject
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="subject" id="subject" value="9" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '9'){?> checked="checked" <?php }}}?> /> Sub Category
                            <?php }?>
                          </label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="books" id="books" value="10" /> Books
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="books" id="books" value="10" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '10'){?> checked="checked" <?php }}}?> /> Books
                            <?php }?>
                          </label>
                          <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="bulk_upload_books" id="bulk_upload_books" value="15" /> Bulk Upload Books
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="bulk_upload_books" id="bulk_upload_books" value="15" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '15'){?> checked="checked" <?php }}}?> /> Bulk Upload Books
                            <?php }?>
                          </label>
                        </div> -->
                        
                        <!-- <div class="form-group">
                        <label class="col-md-3 control-label" style="font-weight:bold;">Schools</label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="grades" id="grades" value="11" /> Grades
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="grades" id="grades" value="11" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '11'){?> checked="checked" <?php }}}?> /> Grades
                            <?php }?>
                          </label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="schools" id="schools" value="12" /> Schools
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="schools" id="schools" value="12" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '12'){?> checked="checked" <?php }}}?> /> Schools
                            <?php }?>
                          </label>
                        </div> -->
                        
                        <!-- <div class="form-group">
                        <label class="col-md-3 control-label" style="font-weight:bold;">Customers</label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="customers" id="customers" value="13" /> Customers
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="customers" id="customers" value="13" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '13'){?> checked="checked" <?php }}}?> /> Customers
                            <?php }?>
                          </label>
                            <label class="checkbox-inline my-checkbox">
                            <?php if($page_mode == "ADD"){?>
                              <input type="checkbox" class="form-control" name="orders" id="orders" value="14" /> Orders
                            <?php }else{?>
                              <input type="checkbox" class="form-control" name="orders" id="orders" value="14" <?php if($num_permission > 0){ foreach($record as $value) { if($value->menu_id == '14'){?> checked="checked" <?php }}}?> /> Orders
                            <?php }?>
                          </label>
                        </div> -->
                    <div class="clearfix"></div>
                     <div class="clearfix"></div>
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
                                       <div class="clearfix"></div>
								</div>
							</div>
                            <div class="clearfix"></div>
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
