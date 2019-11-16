<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
  <!-- BEGIN PAGE HEAD -->
  <div class="page-head">
    <div class="container">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>Plant
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
        <li class="active">Plant
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
                </i>Plant Management
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-4">
                    <div class="btn-group">
                      <button id="btn_add" class="btn green">
                        Add New 
                        <i class="fa fa-plus">
                        </i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="col-md-8">
                    <label>Select Company :</label>  
                    <div class="btn-group">
                      <select class="form-control" name="customer_id" id="customer_id" onchange="getPlantbyCompany(this.value);">
                        <option value="0">Select Company
                        </option>
                        <?php foreach($customer as $value){?>
                        <option value="<?php echo $value->customer_id;?>" 
                                <?php if($value->customer_id == $result->customer_id){?> selected 
                        <?php }?> >
                        <?php echo $value->name;?>
                        </option>
                      <?php }?>
                      </select>
                  </div>
                </div>
                <script>
                  function getPlantbyCompany(ID)
                  {
                    //alert(ID);
                    $.post("<?=site_url("plant/ajaxgetPlantbyCompany");?>",{
                           customer_id : ID }
                           ,
                           function(data){
                      //alert(data);
                      if(data != ""){
                        $('.det').html(data);
                      }
                    }
                    );
                  }
                </script>
              </div>
            </div>
            <form id="formlisting" name="formlisting" action="" method="post">
              <input type="hidden" name="page_mode" id="page_mode" value="" />
              <input type="hidden" name="status" id="status" value="" />
              <?php if($this->session->flashdata('admin_msg') != "") { ?>
              <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                </button>
                <strong>Success&nbsp;!&nbsp;
                </strong> 
                <?=$this->session->flashdata('admin_msg');?>
              </div>
              <?php } ?>
              <?php if($this->session->flashdata('admin_errmsg') != "") { ?>
              <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                </button>
                <strong>Error&nbsp;!&nbsp;
                </strong> 
                <?=$this->session->flashdata('admin_errmsg');?>
              </div>
              <?php } ?>
              <table class="table table-bordered table-hover" 
                     <?php if($num_tag > 0){?> id="sample_2" 
              <?php }?>>
              <thead>
                <tr>
                  <!--<th>Sl No.</th>-->
                  
                  <th>Plant Name
                  </th>
                  <th>Company Name</th>
                  <th>Plant Address
                  </th>
                  <th>Program
                  </th>
                  <!--<th>Status</th>-->
                  <!--<th>Edit</th>-->
                  <th>Action
                  </th>
                </tr>
              </thead>
              <?php if($num_tag > 0){?>
              <tbody class="det">
                <?php $cnt = 1;?>
                <?php foreach($record as $value) {?>
                <tr class="odd gradeX">
                  <!--<td><?php //$cnt++?></td>-->
                  <!--<td><?php //$value->plant_name?></td>-->
                  
                  <td>
                    <?=$value->plant_name?>
                  </td>
                  <td><?=$value->name?></td>
                  <td>
                    <?=$value->address?>
                  </td>
                  <td>
                    <?=$value->program_name?>
                  </td>
                  <!--            <td class="center">-->
                  <!--<?php //if($value->status == "Active"){ ?>-->
                  <!--                <a href="javascript:edit_status('<?=site_url('plant/editstatus/'.$value->plant_id);?>','<?=$value->status?>')" class="btn btn-xs green">-->
                  <!--                    Active-->
                  <!--                </a>-->
                  <!--            <?php //}else{ ?>-->
                  <!--                <a href="javascript:edit_status('<?=site_url('plant/editstatus/'.$value->plant_id);?>','<?=$value->status?>')" class="btn btn-xs red">-->
                  <!--                    Inactive-->
                  <!--                </a>-->
                  <!--            <?php //}?>    -->
                  <!--            </td>-->
                  <td>
                    <a href="javascript:edit_record('<?=site_url('plant/edit/'.$value->plant_id);?>')" class="btn btn-xs green">
                      <i class="fa fa-edit">
                      </i> Edit
                    </a>
                    <a href="javascript:delete_record('<?=site_url('plant/delete/'.$value->plant_id);?>')" class="btn btn-xs red">
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
                  <td colspan="5">No user plant found
                  </td>
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
                  <i class="fa fa-gift">
                  </i>
                  <?php if($page_mode == "EDIT"){ ?> Edit 
                  <?php }else{?> Add 
                  <?php }?> Plant
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form name="frm_add" id="frm_add" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="plant_id" id="plant_id" value="<?=($page_mode == "EDIT") ? $result->plant_id : "";?>" />
                  <input type="hidden" id="page_mode" name="page_mode" value="" />
                  <div class="form-body">
                    <div class="alert alert-danger display-hide">
                      <button class="close" data-close="alert">
                      </button>
                      You have some form errors. Please check below.
                    </div>
                    <?php if($this->session->flashdata('admin_msg') != "") { ?>
                    <div class="alert alert-success alert-dismissable" style="margin-top:10px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      </button>
                      <strong>Success&nbsp;!&nbsp;
                      </strong> 
                      <?=$this->session->flashdata('admin_msg');?>
                    </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('admin_errmsg') != "") { ?>
                    <div class="alert alert-danger alert-dismissable" style="margin-top:10px;">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      </button>
                      <?=$this->session->flashdata('admin_errmsg');?>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Company Name
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
                    <label class="col-md-3 control-label">Plant Name
                      <span class="required">* 
                      </span>
                    </label>
                    <div class="col-md-4">
                      <input type="text"class="form-control" name="plant_name" id="plant_name" value="<?=($page_mode == "EDIT") ? $result->plant_name : "";?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Program
                    </label>
                    <div class="col-md-4">
                      <select class="form-control" name="program_id" id="program_id">
                        <?php foreach($program as $value){?>
                        <option value="<?php echo $value->id;?>" 
                                <?php if($page_mode == "EDIT" && $value->id == $result->program_id){?> selected 
                        <?php }?> >
                        <?php echo $value->program_name;?>
                        </option>
                      <?php }?>
                      </select>
                  </div>
                  </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Address
                    <span class="required">* 
                    </span>
                  </label>
                  <div class="col-md-4">
                    <input type="text"class="form-control" name="address" id="address" value="<?=($page_mode == "EDIT") ? $result->address : "";?>">
                  </div>
                </div>
                <div class="clearfix">
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
              </div>
              </form>
            <!-- END FORM-->
            <div class="clearfix">
            </div>
          </div>
        </div>
        <div class="clearfix">
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
