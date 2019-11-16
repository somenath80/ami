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
                <i class="fa fa-gift">
                </i>Work Assigment Listings
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
                  <div class="col-md-4">
                    <div class="btn-group">
                      <?php if($this->session->userdata('b_user_type') != 3){?>
                      <button id="btn_add" class="btn green">
                        Add New 
                        <i class="fa fa-plus">
                        </i>
                      </button>
                      <?php }?>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <label>Select Duration :</label>  
                    <div class="btn-group">
                      <select class="form-control" name="duration" id="duration" onchange="getDuration(this.value);">
                        <option value="">Select Duration</option>
                        <option value="1" <?php if(isset($val_id) && $val_id == 1){?> selected <?php } ?>>7 days</option>
                        <option value="2" <?php if(isset($val_id) && $val_id == 2){?> selected <?php } ?> >30 days</option>
                        <option value="3" <?php if(isset($val_id) && $val_id == 3){?> selected <?php } ?>>90 days</option>
                      </select>
                  </div>
                </div>
                </div>
              </div>
              <form id="formDate" name="formDate" action="" method="post">
                  <input type="hidden" name="val" id="val" value="" />
              </form>      
              <script>
                  function getDuration(VAL)
                  {
                    $('#val').val(VAL);
                    $("#formDate").attr("action", "<?php echo site_url("work");?>");
                    $('#formDate').submit();
                  }
                </script>
              <form id="formlisting" name="formlisting" action="" method="post">
                <input type="hidden" name="page_mode" id="page_mode" value="" />
                <input type="hidden" name="status" id="status" value="" />
                <input type="hidden" name="url" id="url" value="<?php echo $url;?>" />
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
                    <!--<th>Sl No.</th>-->
                    <th>Company
                    </th>
                    <th>Plant
                    </th>
                    <th>Program
                    </th>
                    <th>Inspection Type
                    </th>
                    <th>Inspector
                    </th>
                    <th>Date
                    </th>
                    <?php if($_SESSION['b_user_type'] == 3){?>
                    <th>Status
                    </th>
                    <?php } ?>
                    <th>Template
                    </th>
                    <?php if($_SESSION['b_user_type'] != 3){?>
                    <th>Status
                    </th>
                    <?php } ?>
                    <th>Inspection Report
                    </th>
                    <!-- <th>Delete</th> -->
                  </tr>
                </thead>
                <?php if($num_tag > 0){?>
                <tbody>
                  <?php $cnt = 1;?>
                  <?php foreach($record as $value) {
?>
                    <input type="hidden" name="work_id" id="work_id" value="<?php echo $value->work_id;?>" />
                  <tr class="odd gradeX">
                    <!--<td><input type="checkbox" class="checkboxes" value="1"/></td>-->
                    <!--<td><?=$cnt++?></td>-->
                    <td>
                      <?php echo $value->customername; ?>
                    </td>
                    <td>
                      <?php echo $value->plantname;?>
                    </td>
                    <td>
                      <?php if(isset($value->program_id) &&  $value->program_id == 1 ){ echo "Environmental"; }else{ echo "Health & Safty"; }?>
                    </td>
                    <td>
                      <?php if(isset($value->type_id) && $value->type_id == 1 ){ echo "Monthly"; }else{ echo "Bi-Weekly"; }?>
                    </td>
                    <td>
                        <select class="in_id" name="inspector_id" id="inspector_id" onchange="chooseInspector(this.value,'<?php echo $value->work_id;?>');">
                            <option value="">Select Inspector</option>		
                            <?php foreach($inspector as $val){?>
                                <option value="<?php echo $val->admin_id;?>" <?php if($val->admin_id == $value->inspector_id){?> selected <?php }?> >
                                <?php echo $val->admin_fname."".$val->admin_lname;?>
                                </option>
                            <?php }?>
                          </select>
                    </td>
                    <td>
                      <?php echo date("d/m/Y",strtotime($value->before_work_date));?>
                    </td>
                    <?php if($_SESSION['b_user_type'] == 3){?>
                    <td class="center">
                      <?php if(isset($value->status)){ echo $value->status; }?>
                    </td>
                    <?php }?>
                    <td>
                      <?php if(isset($value->pm_upload_templete_name) && $value->pm_upload_templete_name != ""){?>
                      <a href="<?=site_url('uploads/pdf_upload/'.$value->pm_upload_templete_name);?>">
                        <button type="button" class="btn btn-default btn-xs">
                          <i class="fa fa-download" aria-hidden="true"></i> Download
                        </button>
                      </a>
                      <?php }?>
                      <!-- <a href="javascript:edit_record('<?=site_url('work/edit/'.$value->customer_id);?>')" class="btn btn-xs green">
<i class="fa fa-edit"></i> Edit
</a> -->
                    </td>
                    <?php if($_SESSION['b_user_type'] != 3){?>
                    <td>
                      <input type="hidden" name="work_id" id="work_id" value="<?php echo $value->work_id; ?>">
                      <select name="status_change" id="status_change" onchange="SelectStatus('<?php echo $value->work_id; ?>',this.value)">
                        <option value="0">Select Work Status
                        </option>
                        <option value="New" 
                                <?php if(isset($value->status) && $value->status == "New" ){?> selected 
                        <?php } ?>>WIP
                        </option>
                      <option value="Review" 
                              <?php if(isset($value->status) && $value->status == "Review" ){?> selected 
                      <?php } ?>>Review
                </option>
                  <option value="Complete" 
                          <?php if(isset($value->status) && $value->status == "Complete" ){?> selected 
                  <?php } ?>>Complete
                </option>
              </select>
            </td>
          <?php } ?>
          <td>
            <?php if(isset($value->ins_upload_templete_name) && $value->ins_upload_templete_name != ""){?>
            <a href="<?=site_url('uploads/pdf_upload/'.$value->ins_upload_templete_name);?>" target="_blank">
              <button type="button" class="btn btn-default btn-xs">
                <i class="fa fa-download" aria-hidden="true"></i> Download
              </button>
            </a>
            <?php if(isset($value->status) && $value->status == "Complete"){?>
            <button type="button" class="btn btn-success btn-xs btnup">Complete</button>
            <?php } ?>
            <?php }else{?>
                    <?php if(isset($value->status) && $value->status == "Complete"){?>
                        <button type="button" class="btn btn-success btn-xs btnup">Complete</button>
                    <?php }else{?>
                        <a href="<?=site_url('work/uploadDetails/'.$value->work_id);?>" target="_blank">
                          <button type="button" class="btn btn-default btn-xs btnup">
                            <i class="fa fa-upload" aria-hidden="true"></i> Upload
                          </button>
                        </a>
                    <?php }?>
            
            <?php }?>
          </td>
          <!-- <td>
<a href="javascript:delete_record('<?php //site_url('work/delete/'.$value->customer_id);?>')" class="btn btn-xs red">
<i class="fa fa-trash"></i> Delete
</a>
</td> -->
          </tr>
        <?php }?>
        </tbody>
      <?php }else{?>
      <tbody>
        <tr class="odd gradeX">
          <td colspan="9">No Work found
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
                <?php }?> work
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
                    <label class="col-md-3 control-label">Customer
                      <span class="required">* 
                      </span>
                    </label>
                    <div class="col-md-4">
                      <select class="form-control" name="customer_id" id="customer_id">
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
                  <label class="col-md-3 control-label">Customer
                    <span class="required">* 
                    </span>
                  </label>
                  <div class="col-md-4">
                    <select class="form-control" name="customer_id" id="customer_id">
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
                <label class="col-md-3 control-label">Customer
                  <span class="required">* 
                  </span>
                </label>
                <div class="col-md-4">
                  <select class="form-control" name="customer_id" id="customer_id">
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
              <label class="col-md-3 control-label">Customer
                <span class="required">* 
                </span>
              </label>
              <div class="col-md-4">
                <select class="form-control" name="customer_id" id="customer_id">
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
            <label class="col-md-3 control-label">Customer
              <span class="required">* 
              </span>
            </label>
            <div class="col-md-4">
              <select class="form-control" name="customer_id" id="customer_id">
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
          <label class="col-md-3 control-label">Logo Upload 
            <br />(JPG/PNG/JPEG Only)
          </label>
          <div class="col-md-4">
            <input type="file" id="orig_img" name="orig_img" value="" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Logo Upload 
            <br />(JPG/PNG/JPEG Only)
          </label>
          <div class="col-md-4">
            <input type="file" id="orig_img" name="orig_img" value="" />
          </div>
        </div>
        <?php if($record->orig_img != ""){?>
        <div class="form-group">
          <label class="control-label col-md-3">Preview&nbsp;&nbsp;
          </label>
          <div class="col-md-4">
            <img src="<?=site_url("uploads/logo_upload/".$record->orig_img);?>" alt="<?=$record->orig_img?>" class="logo-default">
          </div>
        </div>
        <?php }?>
        <div class="form-group">
          <label class="col-md-3 control-label">Customer
            <span class="required">* 
            </span>
          </label>
          <div class="col-md-4">
            <select class="form-control" name="customer_id" id="customer_id">
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
<?php }?>
<?php if($page_mode == "UPLOAD" ) { ?>
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
                </i>Upload work
              </div>
            </div>
            <div class="portlet-body form">
              <!-- BEGIN FORM-->
              <form name="frm_add" id="frm_add" class="form-horizontal" action="<?=site_url('work/update_work/');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="work_id" id="work_id" value="<?=$work_id?>" />
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
                    <label class="col-md-3 control-label">Upload Report
                    </label>
                    <div class="col-md-4">
                      <input type="file" id="orig_img" name="orig_img" value="" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Update
                        </button>
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
  <?php if($page_mode == "UPLOADINSPECTOR" ) { ?>
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
                </i>Upload work
              </div>
            </div>
            <div class="portlet-body form">
              <!-- BEGIN FORM-->
              <form name="frm_add" id="frm_add" class="form-horizontal" action="<?=site_url('work/update_work1/');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="work_id" id="work_id" value="<?=$work_id?>" />
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
                    <label class="col-md-3 control-label">Upload Report
                    </label>
                    <div class="col-md-4">
                      <input type="file" id="orig_img" name="orig_img" value="" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Update
                        </button>
                        <button type="button" class="btn default" id="btn_cancel1">Cancel
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
