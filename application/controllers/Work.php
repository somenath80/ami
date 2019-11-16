<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Work extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_work');		
		$this->load->model( 'model_customers');

		// if(!in_array(4, $this->session->userdata('b_permission'))){
		// 	redirect('accessdenied');
		// }
    }

	public function index()
	{
	    $data['val'] = $this->input->post('val');
	    $data['url'] = current_url();
		$data['status'] = 'Active';
		if(isset($data['val']) && $data['val'] != ""){
		    $data['val_id'] = $data['val'];
		    $data['num_tag'] = $this->model_work->get_num_data($data);
		    $data['record'] = $this->model_work->get_data($data);
		}else{
		    $data['val_id'] = "";
		    $data['num_tag'] = $this->model_work->get_num_data($data);
		    $data['record'] = $this->model_work->get_data($data);
		}
		
		$data['inspector'] = $this->model_work->get_inspector_data($data);
		
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('work',$data);
		$this->load->view('footer',$data);			
	}

	public function creatework()
	{
		$data['customer'] = $this->model_customers->get_data($data);
		$data['inspector'] = $this->model_work->get_inspector_data($data);
		$data['type'] = $this->model_work->get_type_data($data);
		//print_r($data['type']);exit;
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "ADD";

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('creatework',$data);
		$this->load->view('footer',$data);			
	}

	public function getplant()
	{
		$customer_id = $this->input->post('customer_id');
		
		
		$plan = $this->model_work->get_plan_data($customer_id);
		$num = count($plan);
		?>
        <select class="form-control choseprogram" name="plant_id" id="plant_id" onchange="getprogram(this.value);">
        <?php if($num > 0){ ?>
          <option value="">Select</option>	
			<?php foreach($plan as $value){?>
	          <option value="<?=$value->plant_name?>"><?=ucwords(strtolower($value->plant_name))?></option>
	        <?php }?>
		<?php }else{ ?>	
          <option value="">Select</option>
		<?php }?>
        </select>
		<?php
	}
	
	public function getprogram()
	{
		$plant_name = $this->input->post('plant_name');
		
		
		$program = $this->model_work->get_program_data1($plant_name);
		$num = count($program);
		?>
        <select class="form-control choseprogram" name="plant_id" id="plant_id" onchange="getprogram(this.value);">
        <?php if($num > 0){ ?>
          <option value="">Select</option>	
			<?php foreach($program as $value){?>
	          <option value="<?=$value->id?>"><?=$value->program_name?></option>
	        <?php }?>
		<?php }else{ ?>	
          <option value="">Select</option>
		<?php }?>
        </select>
		<?php
	}
	
	public function updateworkstatus()
	{
		$data['work_id'] = $this->input->post('work_id');
		$data['status_change'] = $this->input->post('status_change');
	
		if($data['status_change'] == "Complete"){
		    $check_inspector_upload = $this->model_work->check_inspector_upload($data);
		    if($check_inspector_upload[0]->ins_upload_templete_name != ""){
		       $plan = $this->model_work->updatet_work_status($data);
		       echo 1; 
		    }else{
		       echo 2;
		    }
		}else{
		    $plan = $this->model_work->updatet_work_status($data);
		    echo 1;
		    
		}
		
		
		
	}
	
	public function assignedInspector()
	{
		$data['work_id'] = $this->input->post('work_id');
		$data['inspector_id'] = $this->input->post('inspector_id');
		
		
		$inspector = $this->model_work->assigned_inspector($data);
		echo 1;
	}

	public function uploadDetails($id)
	{
		$data['page_mode'] 	= "UPLOAD";
		$data['work_id'] = $id;
		$data['record'] = $this->model_work->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('work',$data);
		$this->load->view('footer',$data);			
	}
	
	public function uploadinspectorDetails($id)
	{
		$data['page_mode'] 	= "UPLOADINSPECTOR";
		$data['work_id'] = $id;
		$data['record'] = $this->model_work->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('work',$data);
		$this->load->view('footer',$data);			
	}

	public function edit($id)
	{
		$data['page_mode'] 	= "EDIT";
		$data['customer_id'] = $id;
		$data['record'] = $this->model_work->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		

		/*echo "<pre>";
		print_r($data);exit;*/

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('work',$data);
		$this->load->view('footer',$data);			
	}

	

	public function update()
	{
	    
	    
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		
		if($_FILES['orig_img']['name'] != ""){
			$upload_path = './uploads/pdf_upload/';
			$templete_link = "";
			$width = "";
			$height = '';
			$input_name = "orig_img";
			$orig_img = $this->upload_logo1($data['orig_img'],$upload_path,$width,$height,$input_name,$data['customer_id'],$data['plant_id'],$data['program_id'],$data['type_id']);
			
			if($orig_img != "") {
				$data['image'] = $orig_img;
				$data['pm_upload_templete_name'] = $orig_img;
 				$data['pm_upload_templete_link'] = $templete_link;
			}
		}else{
			$data['pm_upload_templete_name'] = $data['db_pm_upload_templete_name'];
 			$data['pm_upload_templete_link'] = $data['db_pm_upload_templete_link'];
		}

		if($data['page_mode'] == "ADD_RECORD"){
			
			$result = $this->model_work->add_data($data);

			// if($result == "No"){
			//   $this->session->set_flashdata('user_errmsg', 'Email already exists !');
			//   redirect('work');
			// }else{
			  $this->session->set_flashdata('user_msg', 'Information updated successfully !');
			  redirect('work');
			//}
		}

		if($data['page_mode'] == "UPDATE_RECORD"){			
			$result = $this->model_work->update_data($data);
			  $this->session->set_flashdata('user_msg', 'Information updated successfully !');
			  redirect('work');

		}

	}

	public function upload_logo1($orig_img,$upload_path,$width,$height,$input_name,$customer_id,$plant_id,$program_id,$type_id) {
		$config['upload_path'] = $upload_path;
		//$config['allowed_types'] = 'jpg|png|jpeg';
		$config['allowed_types'] = '*';
		
		$this->upload->initialize($config);
		$field_name = $input_name;
			
		if ($this->upload->do_upload($field_name)) {
			
			if($orig_img != "") {
				@unlink($upload_path.$orig_img);
			}
			
			$data[$field_name] = $this->upload->data();	
			
			$current_timestamp = time();

			$upload_name = $customer_id."-".$plant_id."-".$program_id."-".$type_id."-".$current_timestamp."-";
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'].$data[$field_name]['file_name'];
			$config['new_image'] = $upload_name.$data[$field_name]['file_name'];
			$config['create_thumb'] = FALSE; // FOR RENAME THE THUMB SET IT TO FALSE OR IT WILL NAMED AS "thumb_ORIGINAL_NAME"
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			@unlink($upload_path.$data[$field_name]['file_name']);
			return $config['new_image'];
		}
	}

	public function update_work()
	{
	    
	    
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		
		if($_FILES['orig_img']['name'] != ""){
			$upload_path = './uploads/pdf_upload/';
			$templete_link = "";
			$width = "";
			$height = '';
			$input_name = "orig_img";
			$orig_img = $this->upload_logo2($data['orig_img'],$upload_path,$width,$height,$input_name,$data['work_id']);
			
			if($orig_img != "") {
				$data['image'] = $orig_img;
				$data['ins_upload_templete_name'] = $orig_img;
 				$data['ins_upload_templete_link'] = $templete_link;
			}
		}

		$result = $this->model_work->update_data1($data);
		$this->session->set_flashdata('user_msg', 'Information updated successfully !');
		redirect('work');

	}
	
	public function update_work1()
	{
	    
	    
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		
		if($_FILES['orig_img']['name'] != ""){
			$upload_path = './uploads/pdf_upload/';
			$templete_link = "";
			$width = "";
			$height = '';
			$input_name = "orig_img";
			$orig_img = $this->upload_logo2($data['orig_img'],$upload_path,$width,$height,$input_name,$data['work_id']);
			
			if($orig_img != "") {
				$data['image'] = $orig_img;
				$data['ins_upload_templete_name'] = $orig_img;
 				$data['ins_upload_templete_link'] = $templete_link;
			}
		}

		$result = $this->model_work->update_data1($data);
		$this->session->set_flashdata('user_msg', 'Information updated successfully !');
		redirect('work/assigned');

	}
	
	public function upload_logo2($orig_img,$upload_path,$width,$height,$input_name,$work_id) {
		$config['upload_path'] = $upload_path;
		//$config['allowed_types'] = 'jpg|png|jpeg';
		$config['allowed_types'] = '*';
		
		$this->upload->initialize($config);
		$field_name = $input_name;
			
		if ($this->upload->do_upload($field_name)) {
			
			if($orig_img != "") {
				@unlink($upload_path.$orig_img);
			}
			
			$data[$field_name] = $this->upload->data();	
			
			$current_timestamp = time();

			$upload_name = $work_id."-";
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'].$data[$field_name]['file_name'];
			$config['new_image'] = $upload_name.$data[$field_name]['file_name'];
			$config['create_thumb'] = FALSE; // FOR RENAME THE THUMB SET IT TO FALSE OR IT WILL NAMED AS "thumb_ORIGINAL_NAME"
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			@unlink($upload_path.$data[$field_name]['file_name']);
			return $config['new_image'];
		}
	}
	
	
	

// 	public function editstatus($id)
// 	{
// 		$data['status'] = $this->input->post('status');
// 		if($data['status'] == "Active"){
// 			$data['customer_id'] = $id;
// 			$data['status'] = "Inactive";
// 			$result = $this->model_work->change_status($data);
// 			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
// 			redirect('work');
// 		}
// 		if($data['status'] == "Inactive"){
// 			$data['customer_id'] = $this->uri->segment(4);
// 			$data['status'] = "Active";
// 			$result = $this->model_work->change_status($data);
// 			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
// 			redirect('work');
// 		}
// 	}

// 	public function delete($id)
// 	{
// 		$data['customer_id'] = $id;
// 		$result = $this->model_work->delete($data);
// 		//echo $result;exit;

// 		if($result){
// 			$this->session->set_flashdata('user_msg', 'Information deleted successfully !');
// 			redirect('work');
// 		}
// 	}
	
	public function assigned()
	{
	   
		
		$data['num_tag'] = $this->model_work->get_assigned_num_data($data);
		
		$data['record'] = $this->model_work->get_assigned_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('assigned',$data);
		$this->load->view('footer',$data);			
	}

	

	

}//END CLASS



/* End of file Work.php */

/* Location: ./application/controllers/work.php */