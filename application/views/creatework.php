<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
  <!-- BEGIN PAGE HEAD -->
  <div class="page-head">
    <div class="container">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Work Assigment
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
        <li class="active">
          Assign Work
        </li>
      </ul>
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
                      </i>Assign Work
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
                        <label class="col-md-3 control-label">Company
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4" >
                          <select class="form-control choseplant" name="customer_id" id="customer_id">
                              <option value="">Select Company
                              </option>		
                              <?php foreach($customer as $value){?>
                              <option value="<?php echo $value->customer_id;?>" 
                                      <?php if($page_mode == "EDIT" && $value->customer_id == $result->customer_id){?> selected 
                              <?php }?> >
                              <?php echo $value->name;?>
                              </option>
                            <?php }?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Plant
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4 getplant" >
                          <select class="form-control" name="plant_id" id="plant_id">
                            <option value="">Select Plant
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Program
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4">
                          <select class="form-control" name="program_id" id="program_id">
                            <option value="">Select Program
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Type
                          <span class="required">* 
                          </span>
                        </label>
                        <div class="col-md-4">
                          <select class="form-control" name="type_id" id="type_id">
                            <option value="">Select Type
                            </option>		
                            <?php foreach($type as $val){?>
                            <option value="<?php echo $val->type_id;?>" 
                                    <?php if($page_mode == "EDIT" && $val->type_id == $result->type_id){?> selected 
                            <?php }?> >
                            <?php echo $val->type_name;?>
                            </option>
                          <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">Inspector
                        </label>
                        <div class="col-md-4">
                          <select class="form-control" name="inspector_id" id="inspector_id">
                            <option value="">Select Inspector
                            </option>		
                            <?php foreach($inspector as $value){?>
                            <option value="<?php echo $value->admin_id;?>" 
                                    <?php if($page_mode == "EDIT" && $value->admin_id == $result->inspector_id){?> selected 
                            <?php }?> >
                            <?php echo $value->admin_fname."".$value->admin_lname;?>
                            </option>
                          <?php }?>
                          </select>
                      </div>
                      </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Form Templete 
                        <span class="required">* 
                        </span>
                      </label>
                      <div class="col-md-4">
                        <input type="file" id="orig_img" name="orig_img" value="" />
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <?php if($page_mode == "ADD"){?>
                          <button type="button" class="btn green" id="btn_submit">Submit
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
  </div>
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
