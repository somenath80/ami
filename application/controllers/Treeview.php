<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treeview extends CI_Controller {

	function __construct()
    {
        parent::__construct();

        if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }

		$this->load->model('model_treeview');
        $this->load->model('model_signin');

        if(!in_array(5, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{

		$data['customers'] = $this->model_treeview->get_data();


	    $data['record'] = $this->model_signin->get_settings_data();
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();




		/*echo "<pre>";
		print_r($data);*/
		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('treeview',$data);
		$this->load->view('footer',$data);
	}

	public function ajaxgetCustomerdetails()
	{
		$data['customer_id'] = $this->input->post('customer_id');
		$customers = $this->model_treeview->get_customer_data($data);
		$plants = $this->model_treeview->get_plant_data($data);
		?>
		                                        
		                                        <div class="form-group">
													<div class="col-md-8"></div>
													<!--<div class="col-md-4"><a href="<?php echo base_url('customers/add');?>"><button type="button" class="btn btn-xs green" id="btn_submit">Add New Company</button></a></a>
													</div>-->
												</div>
		                                        <div class="form-group">
													<label class="col-md-2 control-label">Name</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="name" id="name" value="<?=$customers->name?>" readonly>
													</div>
												</div>

                                                <div class="form-group">
													<label class="col-md-2 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <div class="input-group">
                                                                <span class="input-group-addon">
                                                                <i class="fa fa-envelope"></i>
                                                                </span>
                                                            <input type="text" class="form-control" name="email" id="email" value="<?=$customers->email?>" readonly>
                                                        </div>
                                                    </div>   
    
                                                </div>
                                                
                                                <div class="form-group">
													<label class="col-md-2 control-label">Phone</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="phone" id="phone" value="<?=$customers->phone?>" readonly>
													</div>
												</div>
                                                
                                                <div class="form-group">
													<label class="col-md-2 control-label">Address</label>
													<div class="col-md-6">
														<input type="text" class="form-control" name="address" id="address" value="<?=$customers->address?>" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-9"></div>
													<!--<div class="col-md-3">	<a href="<?php echo base_url('plant/add');?>"><button type="button" class="btn btn-xs green" id="btn_submit">Add Plant</button></a>
													</div>-->
    											</div>


							<table class="table table-bordered table-hover">

							<thead>
							<tr>
                                <th>Plant Name</th>
                                <th>Address</th>
                                <!--<th>Action</th>-->
							</tr>
							</thead>
							<tbody>
							<?php foreach($plants as $value) {?>
							<tr class="odd gradeX">
                                <td><?php if($_SESSION['b_user_type'] != 3){?><a href="<?php echo base_url('plant/edit').'/'.$value->plant_id;?>"><?php } ?><?=$value->plant_name?><?php if($_SESSION['b_user_type'] != 3){?></a><?php } ?></td>
								<td><?=$value->address?></td>
								<!--<td><a href="<?php //echo base_url('plant/edit').'/'.$value->plant_id;?>" class="btn btn-xs green">
                                    <i class="fa fa-edit"></i> 
                                    </a></td>-->
							</tr>
                            <?php }?>
							</tbody>
							</table>




		<?php
	}

	public function ajaxgetPlantdetails()
	{
	    
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');
		//$plants = $this->model_treeview->get_single_plant_data($data);
		//$data['plant_id'] = 3;
        $plant_name = $this->model_treeview->get_single_plant_name_data($data);
        $data['plant_name'] = $plant_name->plant_name;
		//$data['customer_id'] = 2;
		$plants = $this->model_treeview->get_single_plant_data($data);
		?>
		                <div class="row" style="padding-left:20px;padding-right:20px;">
                                <div class="form-group">
                        			<label class="col-md-3 control-label" style="font-weight:600;">Plant : <b><?=$data['plant_name']?></b></label>
                        			<label class="col-md-9 control-label" style="font-weight:600;">Address :<b><?=$plants[0]->address?></b></label>
                        		</div>
                                            		
                            		<?php
                            		foreach($plants as $val){
                            		   $data['program_id'] = $val->program_id;
                            		    $work = $this->model_treeview->get_work_data1($data);
                            		?>
                            		    <div class="form-group">
                                		    <div class="col-md-9" style="font-weight:600;"><b><?php echo $val->program_name ?> : </b></div>
                                            <!--<div class="col-md-3 control-label" style="margine-bottom:20px;"><a href="<?php echo base_url('work/creatework');?>"><button type="button" class="btn btn-xs green" id="btn_submit">Add Form</button></a>-->
                                			<!--<label class="col-md-3 control-label"></label>-->
                                		</div>
                                		
                                		<table class="table table-bordered table-hover">
                                    				<thead>
                                    				<tr>
                                                        <th>Form Type</th>
                                                        <th>Template</th>
                                    				</tr>
                                    				</thead>
                                    				
                                    				<tbody>
                                    				    <?php
                                    				    if(count($work) > 0){
                                                		    foreach($work as $vals){
                                                		?>
                                                		<tr>
                                                        		<td><?=$vals->type_name?></td>
				                                                <td>
				                                                    <?php if(isset($vals->pm_upload_templete_name) && $vals->pm_upload_templete_name != ""){?>
				                                                    <a href="<?=site_url('uploads/pdf_upload/'.$vals->pm_upload_templete_name);?>">
                                                                    <button type="button" class="btn btn-default btn-xs">
                                							          <span class="glyphicon glyphicon-download-alt"></span>
                                							        </button>
                                                                    </a><?php echo $vals->pm_upload_templete_name?>
                                                                    <?php }?>
                                                                </td>
                                                        		
                                                		<?php } }else{?>
                                                		    <td colspan="2">No data found</td>
                                                		</tr>    
                                                		<?php } ?>
                                    				
                                    				</tbody>
                                    	</table>
                            </div>        	
                                    <?php }?>
		<?php
	}
	
	public function ajaxgetPlantdetails1()
	{
	    
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');
        $plant_name = $this->model_treeview->get_single_plant_name_data($data);
        $data['plant_name'] = $plant_name->plant_name;
		$data['program_id'] = $this->input->post('program_id');
		$plants = $this->model_treeview->get_single_plant_data1($data);
		?>
		                <div class="row" style="padding-left:20px;padding-right:20px;">
                                <div class="form-group">
                        			<label class="col-md-3 control-label" style="font-weight:600;">Plant : <b><?=$data['plant_name']?></b></label>
                        			<label class="col-md-9 control-label" style="font-weight:600;">Address :<b><?=$plants[0]->address?></b></label>
                        		</div>
                                            		
                            		<?php
                            		foreach($plants as $val){
                            		   $data['program_id'] = $val->program_id;
                            		    $work = $this->model_treeview->get_work_data1($data);
                            		?>
                            		    <div class="form-group">
                                		    <div class="col-md-9" style="font-weight:600;"><b><?php echo $val->program_name ?> : </b></div>
                                            <!--<div class="col-md-3 control-label"><a href="<?php echo base_url('work/creatework');?>"><button type="button" class="btn btn-xs green" id="btn_submit">Add Form</button></a></div>-->
                                			<!--<label class="col-md-3 control-label"></label>-->
                                		</div>
                                		
                                		<table class="table table-bordered table-hover">
                                    				<thead>
                                    				<tr>
                                                        <th>Form Type</th>
                                                        <th>Template</th>
                                    				</tr>
                                    				</thead>
                                    				
                                    				<tbody>
                                    				    <?php
                                    				    if(count($work) > 0){
                                                		    foreach($work as $vals){
                                                		?>
                                                		<tr>
                                                        		<td><?=$vals->type_name?></td>
				                                                <td>
				                                                    <?php if(isset($vals->pm_upload_templete_name) && $vals->pm_upload_templete_name != ""){?>
				                                                    <a href="<?=site_url('uploads/pdf_upload/'.$vals->pm_upload_templete_name);?>">
                                                                    <button type="button" class="btn btn-default btn-xs">
                                							          <span class="glyphicon glyphicon-download-alt"></span>
                                							        </button>
                                                                    </a><?php echo $vals->pm_upload_templete_name?>
                                                                    <?php }?>
                                                                </td>
                                                        		
                                                		<?php } }else{?>
                                                		    <td colspan="2">No data found</td>
                                                		</tr>    
                                                		<?php } ?>
                                    				
                                    				</tbody>
                                    	</table>
                            </div>        	
                                    <?php }?>
		<?php
	}
	
	public function ajaxgetPlantdetails2()
	{
	    
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');
        $plant_name = $this->model_treeview->get_single_plant_name_data($data);
        $data['plant_name'] = $plant_name->plant_name;
		$data['program_id'] = $this->input->post('program_id');
		$data['type_id'] = $this->input->post('type_id');
		$plants = $this->model_treeview->get_single_plant_data1($data);
		?>
		                <div class="row" style="padding-left:20px;padding-right:20px;">
                                <div class="form-group">
                        			<label class="col-md-3 control-label" style="font-weight:600;">Plant : <b><?=$data['plant_name']?></b></label>
                        			<label class="col-md-9 control-label" style="font-weight:600;">Address :<b><?=$plants[0]->address?></b></label>
                        		</div>
                                            		
                            		<?php
                            		foreach($plants as $val){
                            		   $data['program_id'] = $val->program_id;
                            		    $work = $this->model_treeview->get_work_data2($data);
                            		?>
                            		    <div class="form-group">
                                		    <div class="col-md-9" style="font-weight:600;"><b><?php echo $val->program_name ?> : </b></div>
                                           <!-- <div class="col-md-3 control-label" style="margine-bottom:20px;"><a href="<?php //echo base_url('work/creatework');?>"><button type="button" class="btn btn-xs green" id="btn_submit">Add Form</button></a></div>-->
                                			<!--<label class="col-md-3 control-label"></label>-->
                                		</div>
                                		
                                		<table class="table table-bordered table-hover">
                                    				<thead>
                                    				<tr>
                                                        <th>Form Type</th>
                                                        <th>Template</th>
                                    				</tr>
                                    				</thead>
                                    				
                                    				<tbody>
                                    				    <?php
                                    				    if(count($work) > 0){
                                                		    foreach($work as $vals){
                                                		?>
                                                		<tr>
                                                        		<td><?=$vals->type_name?></td>
				                                                <td>
				                                                    <?php if(isset($vals->pm_upload_templete_name) && $vals->pm_upload_templete_name != ""){?>
				                                                    <a href="<?=site_url('uploads/pdf_upload/'.$vals->pm_upload_templete_name);?>">
                                                                    <button type="button" class="btn btn-default btn-xs">
                                							          <span class="glyphicon glyphicon-download-alt"></span>
                                							        </button>
                                                                    </a><?php echo $vals->pm_upload_templete_name?>
                                                                    <?php }?>
                                                                </td>
                                                        		
                                                		<?php } }else{?>
                                                		    <td colspan="2">No data found</td>
                                                		</tr>    
                                                		<?php } ?>
                                    				
                                    				</tbody>
                                    	</table>
                            </div>        	
                                    <?php }?>
		<?php
	}

	public function ajaxgetPlantList()
	{
		$data['customer_id'] = $this->input->post('customer_id');

		$plants = $this->model_treeview->get_plant_data($data);
		$num = count($plants);
		?>
								
        	<ul class="plant_list">
		        <?php if($num > 0){ ?>	
					<?php foreach($plants as $value){?>
						<li><a href="javascript:setProgramList('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>'),getPlantdetails('<?php echo $value->plant_id;?>','<?php echo $data['customer_id'];?>')"><i class="fa fa-leaf" aria-hidden="true"></i><?=ucwords(strtolower($value->plant_name))?></a>
								<div id="Program_<?php echo $value->plant_id;?>">
								</div>

						</li>

			        <?php }?>
				<?php }else{ ?>

				<?php }?>
			</ul>
		<?php
	}

	public function ajaxProgramList()
	{
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');

		$program = $this->model_treeview->get_proram_data($data);
		$num = count($program);
		?>
								
        	<ul class="Program_list">
		        <?php if($num > 0){ ?>	
					<?php foreach($program as $value){?>
						<?php //if($value->program_id == 2){?>
							<!--<li><a href="javascript:setTypeList('<?php echo $value->program_id;?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails('<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')">&#9679; <?php echo "Health & Safty";?></a>-->
							<!--	<div id="type_<?php echo $value->program_id;?>">-->
							<!--	</div>-->
							<!--</li>-->
						<?php //}else{?>
							<li><a href="javascript:setTypeList('<?php echo $value->program_id;?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails1('<?php echo $value->program_id;?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')"><i class="fa fa-tasks" aria-hidden="true"></i> <?php echo $value->program_name;?></a>
								<div id="type_<?php echo $value->program_id;?>">
								</div>
							</li>
						<?php //}?>	
						
			        <?php }?>
				<?php }else{ ?>

				<?php }?>
			</ul>
		<?php
	}


	public function ajaxTypeList()
	{
		$data['program_id'] = $this->input->post('program_id');
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');

		$type = $this->model_treeview->get_type_data($data);
		$num = count($type);
		?>
								
        	<ul class="type_list">
		        <?php if($num > 0){ ?>	
					<?php foreach($type as $value){?>
						<?php //if($value->type_id == 1){?>
							<!--<li><a href="javascript:setWorkList('<?php echo $value->type_id;?>','<?php echo $data['program_id'];?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails('<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')">&#9679; <?php echo "Monthly";?></a>-->
							<!--	<div id="work_<?php echo $value->type_id;?>">-->
							<!--	</div>-->
							<!--</li>-->
						<?php //}else{?>
							<li><a href="javascript:setWorkList('<?php echo $value->type_id;?>','<?php echo $data['program_id'];?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>'),getPlantdetails2('<?php echo $value->type_id;?>','<?php echo $data['program_id'];?>','<?php echo $data['plant_id'];?>','<?php echo $data['customer_id'];?>')"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $value->type_name;?></a>
								<div id="work_<?php echo $value->type_id;?>_<?php echo $data['program_id'];?>_<?php echo $data['plant_id'];?>_<?php echo $data['customer_id'];?>">
								</div>
							</li>
						<?php// }?>	
						
			        <?php }?>
				<?php }else{ ?>

				<?php }?>
			</ul>
		<?php
	}


	public function ajaxWorkList()
	{
		$data['type_id'] = $this->input->post('type_id');
		$data['program_id'] = $this->input->post('program_id');
		$data['plant_id'] = $this->input->post('plant_id');
		$data['customer_id'] = $this->input->post('customer_id');

		$work = $this->model_treeview->get_work_data($data);
		
		$num = count($work);
		?>
								
        	<ul class="work_list">
		        <?php if($num > 0){ ?>	
					<?php foreach($work as $value){?>
							<li><a href="#"><i class="fa fa-building" aria-hidden="true"></i> <?php echo $value->admin_fname."      ".$value->before_work_date;?></a></li>
			        <?php }?>
				<?php }else{ ?>

				<?php }?>
			</ul>
		<?php
	}
	
	
	public function treeajax()
	{

		$data['customers'] = $this->model_treeview->get_data();


	    $data['record'] = $this->model_signin->get_settings_data();
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();




		/*echo "<pre>";
		print_r($data);*/
		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('treeview1',$data);
		$this->load->view('footer',$data);
	}

	

	

}//END CLASS



/* End of file tree.php */

/* Location: ./application/controllers/admin/tree.php */