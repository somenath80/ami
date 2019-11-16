<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
  <!-- BEGIN PAGE HEAD -->
  <div class="page-head">
    <div class="container">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Company Management
        </h1>
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
          <a href="<?=site_url("signin/dashboard");?>">Home
          </a>
          <i class="fa fa-circle">
          </i>
        </li>
        <li class="active">Company Management
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
                <i class="fa fa-gift">
                </i>Company Listings
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
                        Add New 
                        <i class="fa fa-plus">
                        </i>
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
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  </button>
                  <strong>Success&nbsp;!&nbsp;
                  </strong> 
                  <?=$this->session->flashdata('user_msg');?>
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('user_errmsg') != "") { ?>
                <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                  </button>
                  <strong>Error&nbsp;!&nbsp;
                  </strong> 
                  <?=$this->session->flashdata('user_errmsg');?>
                </div>
                <?php } ?>
                <table class="table table-bordered table-hover" 
                       <?php if($num_tag > 0){?> id="sample_2" 
                <?php }?>>
                <thead>
                  <tr>
                    <th>Sl No.
                    </th>
                    <th>Company Name
                    </th>
                    <!--<th>Order Details</th>-->
                    <th>Status
                    </th>
                    <th>Edit
                    </th>
                    <th>Delete
                    </th>
                  </tr>
                </thead>
                <?php if($num_tag > 0){?>
                <tbody>
                  <?php $cnt = 1;?>
                  <?php foreach($record as $value) {?>
                  <tr class="odd gradeX">
                    <!--<td><input type="checkbox" class="checkboxes" value="1"/></td>-->
                    <td>
                      <?=$cnt++?>
                    </td>
                    <td><?=$value->name?>
                      <!--<a href="<?=site_url('plant/'.$value->customer_id);?>"><?=$value->name?></a>-->
                    </td>
                    <!--<td>
<a onclick="view_orderdetails('<?=$value->customer_id?>');" class="btn btn-xs green">
View
</a>
</td>-->
                    <td class="center">
                      <?php if($value->status == "Active"){ ?>
                      <a href="javascript:edit_status('<?=site_url('customers/editstatus/'.$value->customer_id);?>','<?=$value->status?>')" class="btn btn-xs green">
                        Active
                      </a>
                      <?php }else{ ?>
                      <a href="javascript:edit_status('<?=site_url('customers/editstatus/'.$value->customer_id);?>','<?=$value->status?>')" class="btn btn-xs red">
                        Inactive
                      </a>
                      <?php }?>    
                    </td>
                    <td>
                      <a href="javascript:edit_record('<?=site_url('customers/edit/'.$value->customer_id);?>')" class="btn btn-xs green">
                        <i class="fa fa-edit">
                        </i> Edit
                      </a>
                    </td>
                    <td>
                      <a href="javascript:delete_record('<?=site_url('customers/delete/'.$value->customer_id);?>')" class="btn btn-xs red">
                        <i class="fa fa-trash">
                        </i> Delete
                      </a>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
                <?php }else{?>
                <tbody>
                  <tr class="odd gradeX">
                    <td colspan="7">No customer found
                    </td>
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
                    <i class="fa fa-gift">
                    </i>
                    <?php if($page_mode == "EDIT"){ ?> Edit 
                    <?php }else{?> Add 
                    <?php }?> Company
                  </div>
                </div>
                <div class="portlet-body form">
                  <!-- BEGIN FORM-->
                  <form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="customer_id" id="customer_id" value="<?=($page_mode == "EDIT") ? $record->customer_id : "";?>" />
                    <input type="hidden" id="page_mode" name="page_mode" value="" />
                    <div class="form-body">
                      <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert">
                        </button>
                        You have some form errors. Please check below.
                      </div>
                      <?php if($this->session->flashdata('user_msg') != "") { ?>
                      <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        </button>
                        <strong>Success&nbsp;!&nbsp;
                        </strong> 
                        <?=$this->session->flashdata('user_msg');?>
                      </div>
                      <?php } ?>
                      <?php if($this->session->flashdata('user_errmsg') != "") { ?>
                      <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        </button>
                        <?=$this->session->flashdata('user_errmsg');?>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Company Name
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="name" id="name" value="<?=($page_mode == "EDIT") ? $record->name : "";?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Contact Email
                          <?php if($page_mode != "EDIT"){?>
                          <span class="required">* 
                          </span>
                          <?php }?>
                        </label>
                        <div class="col-md-4">
                          <div class="input-group">
                            <span class="input-group-addon">
                              <i class="fa fa-envelope">
                              </i>
                            </span>
                            <input type="email" class="form-control" name="email" id="email" value="<?=($page_mode == "EDIT") ? $record->email : "";?>" 
                                   <?php if($page_mode == "EDIT"){?> readonly="readonly"
                            <?php }?>>
                          </div>
                        </div>   
                      </div>
                      <!--<div class="form-group">
<label class="control-label col-md-3">Password <?php //if($page_mode != "EDIT"){?><span class="required">* </span><?php //}?> </label>
<input type="hidden" name="db_pass" id="db_pass" value="<?php //if(isset($record->password) && $record->password != ""){ echo $record->password;}else{ echo "";}?>" />
<div class="col-md-4">
<input type="password" class="form-control" rows="10" name="password" id="password" value="<?php //($page_mode == "EDIT") ? "" : "";?>" />
</div>
</div>-->
                      <div class="form-group">
                        <label class="col-md-3 control-label">Phone #
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4">
                          <input type="number" class="form-control" name="phone" id="phone" value="<?=($page_mode == "EDIT") ? $record->phone : "";?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Street Address
                        </label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="street_address" id="street_address" value="<?=($page_mode == "EDIT") ? $record->street_address : "";?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">City
                        </label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="city" id="city" value="<?=($page_mode == "EDIT") ? $record->city : "";?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">State
                        </label>
                        <div class="col-md-4">
                          <select class="form-control" name="state" id="state">
                            	<option value="AL" <?php if($record->state == "AL"){?> selected <?php } ?>>Alabama</option>
                            	<option value="AK" <?php if($record->state == "AK"){?> selected <?php } ?>>Alaska</option>
                            	<option value="AZ" <?php if($record->state == "AZ"){?> selected <?php } ?>>Arizona</option>
                            	<option value="AR" <?php if($record->state == "AR"){?> selected <?php } ?>>Arkansas</option>
                            	<option value="CA" <?php if($record->state == "CA"){?> selected <?php } ?>>California</option>
                            	<option value="CO" <?php if($record->state == "CO"){?> selected <?php } ?>>Colorado</option>
                            	<option value="CT" <?php if($record->state == "CT"){?> selected <?php } ?>>Connecticut</option>
                            	<option value="DE" <?php if($record->state == "DE"){?> selected <?php } ?>>Delaware</option>
                            	<option value="DC" <?php if($record->state == "DC"){?> selected <?php } ?>>District Of Columbia</option>
                            	<option value="FL" <?php if($record->state == "FL"){?> selected <?php } ?>>Florida</option>
                            	<option value="GA" <?php if($record->state == "GA"){?> selected <?php } ?>>Georgia</option>
                            	<option value="HI" <?php if($record->state == "HI"){?> selected <?php } ?>>Hawaii</option>
                            	<option value="ID" <?php if($record->state == "ID"){?> selected <?php } ?>>Idaho</option>
                            	<option value="IL" <?php if($record->state == "IL"){?> selected <?php } ?>>Illinois</option>
                            	<option value="IN" <?php if($record->state == "IN"){?> selected <?php } ?>>Indiana</option>
                            	<option value="IA" <?php if($record->state == "IA"){?> selected <?php } ?>>Iowa</option>
                            	<option value="KS" <?php if($record->state == "KS"){?> selected <?php } ?>>Kansas</option>
                            	<option value="KY" <?php if($record->state == "KY"){?> selected <?php } ?>>Kentucky</option>
                            	<option value="LA" <?php if($record->state == "LA"){?> selected <?php } ?>>Louisiana</option>
                            	<option value="ME" <?php if($record->state == "ME"){?> selected <?php } ?>>Maine</option>
                            	<option value="MD" <?php if($record->state == "MD"){?> selected <?php } ?>>Maryland</option>
                            	<option value="MA" <?php if($record->state == "MA"){?> selected <?php } ?>>Massachusetts</option>
                            	<option value="MI" <?php if($record->state == "MI"){?> selected <?php } ?>>Michigan</option>
                            	<option value="MN" <?php if($record->state == "MN"){?> selected <?php } ?>>Minnesota</option>
                            	<option value="MS" <?php if($record->state == "MS"){?> selected <?php } ?>>Mississippi</option>
                            	<option value="MO" <?php if($record->state == "MO"){?> selected <?php } ?>>Missouri</option>
                            	<option value="MT" <?php if($record->state == "MT"){?> selected <?php } ?>>Montana</option>
                            	<option value="NE" <?php if($record->state == "NE"){?> selected <?php } ?>>Nebraska</option>
                            	<option value="NV" <?php if($record->state == "NV"){?> selected <?php } ?>>Nevada</option>
                            	<option value="NH" <?php if($record->state == "NH"){?> selected <?php } ?>>New Hampshire</option>
                            	<option value="NJ" <?php if($record->state == "NJ"){?> selected <?php } ?>>New Jersey</option>
                            	<option value="NM" <?php if($record->state == "NM"){?> selected <?php } ?>>New Mexico</option>
                            	<option value="NY" <?php if($record->state == "NY"){?> selected <?php } ?>>New York</option>
                            	<option value="NC" <?php if($record->state == "NC"){?> selected <?php } ?>>North Carolina</option>
                            	<option value="ND" <?php if($record->state == "ND"){?> selected <?php } ?>>North Dakota</option>
                            	<option value="OH" <?php if($record->state == "OH"){?> selected <?php } ?>>Ohio</option>
                            	<option value="OK" <?php if($record->state == "OK"){?> selected <?php } ?>>Oklahoma</option>
                            	<option value="OR" <?php if($record->state == "OR"){?> selected <?php } ?>>Oregon</option>
                            	<option value="PA" <?php if($record->state == "PA"){?> selected <?php } ?>>Pennsylvania</option>
                            	<option value="RI" <?php if($record->state == "RI"){?> selected <?php } ?>>Rhode Island</option>
                            	<option value="SC" <?php if($record->state == "SC"){?> selected <?php } ?>>South Carolina</option>
                            	<option value="SD" <?php if($record->state == "SD"){?> selected <?php } ?>>South Dakota</option>
                            	<option value="TN" <?php if($record->state == "TN"){?> selected <?php } ?>>Tennessee</option>
                            	<option value="TX" <?php if($record->state == "TX"){?> selected <?php } ?>>Texas</option>
                            	<option value="UT" <?php if($record->state == "UT"){?> selected <?php } ?>>Utah</option>
                            	<option value="VT" <?php if($record->state == "VT"){?> selected <?php } ?>>Vermont</option>
                            	<option value="VA" <?php if($record->state == "VA"){?> selected <?php } ?>>Virginia</option>
                            	<option value="WA" <?php if($record->state == "WA"){?> selected <?php } ?>>Washington</option>
                            	<option value="WV" <?php if($record->state == "WV"){?> selected <?php } ?>>West Virginia</option>
                            	<option value="WI" <?php if($record->state == "WI"){?> selected <?php } ?>>Wisconsin</option>
                            	<option value="WY" <?php if($record->state == "WY"){?> selected <?php } ?>>Wyoming</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Zipcode
                        <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4">
                          <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?=($page_mode == "EDIT") ? $record->zipcode : "";?>" maxlength="5">
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <?php if($page_mode == "ADD"){?>
                            <button type="button" class="btn green" id="btn_submit">Update
                            </button>
                            <?php }else{?>
                            <button type="button" class="btn green" id="btn_submit">Update
                            </button>
                            <?php }?>
                            <button type="button" class="btn default" id="btn_cancel">Cancel
                            </button>
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
