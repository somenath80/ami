<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('admin/signin/login/');
        }
		$this->load->model('admin/model_signin');
		$this->load->model('admin/model_content');
		if(!in_array(4, $this->session->userdata('b_permission'))){
			redirect('admin/accessdenied');
		}
    }


	public function index()
	{
		$data['status'] = 'Active';
		$data['num_tag'] = $this->model_content->get_num_data($data);
		$data['record'] = $this->model_content->get_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$data["page_mode"] = "LISTINGS";

		$this->load->view('admin/header.php');
		$this->load->view('admin/menu.php',$data);
		$this->load->view('admin/content',$data);
		$this->load->view('admin/footer',$data);			
	}

	public function edit($id)
	{
		$data['page_mode'] 	= "EDIT";
		$data['page_id'] = $id;
		$data['record'] = $this->model_content->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$this->load->view('admin/header.php');
		$this->load->view('admin/menu.php',$data);
		$this->load->view('admin/content',$data);
		$this->load->view('admin/footer',$data);			
	}

	

	public function update()
	{
		$data['page_mode'] 	= $this->input->post('page_mode');
		
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}

		if($data['page_mode'] == "UPDATE_RECORD"){
			
		  if($data['page_id'] == "3"){
			  if($_FILES['thumb_img']['name'] != ""){
				  $thumb_img = $this->upload_img();
				  if($thumb_img != "") {
					  $data['file'] = $thumb_img;
				  }
			  }else{
				  $data['file'] = $data['thumb_img'];
			  }
		  }else if($data['page_id'] == "4"){
			  if($_FILES['thumb_img']['name'] != ""){
				  $thumb_img = $this->upload_img();
				  if($thumb_img != "") {
					  $data['file'] = $thumb_img;
				  }
			  }else{
				  $data['file'] = $data['thumb_img'];
			  }
		  }
			$result = $this->model_content->update_data($data);
			$this->session->set_flashdata('user_msg', 'Information updated successfully !');
			redirect('admin/content/edit/'.$result);

		}

	}
	
	public function editstatus($id)
	{
		$data['status'] = $this->input->post('status');
		if($data['status'] == "Active"){
			$data['page_id'] = $id;
			$data['status'] = "Inactive";
			$result = $this->model_content->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('admin/content');
		}
		if($data['status'] == "Inactive"){
			$data['page_id'] = $this->uri->segment(4);
			$data['status'] = "Active";
			$result = $this->model_content->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('admin/content');
		}
	}

	public function delete($id)
	{
		$data['page_id'] = $id;
		$result = $this->model_content->delete($data);
		if($result){
			$this->session->set_flashdata('user_msg', 'Information deleted successfully !');
			redirect('admin/content');
		}
	}
	
	// UPLOAD IMAGE
	public function upload_img() {
		$config['upload_path'] = './logo_upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		
		$this->upload->initialize($config);
		$field_name = "thumb_img";
			
		if ($this->upload->do_upload($field_name)) {
			
			if($field_name != "") {
				@unlink('./logo_upload/'.$field_name);
			}
			
			$data = array('upload_data' => $this->upload->data());	
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'].$field_name;
			$config['new_image'] = $field_name;
			$config['create_thumb'] = FALSE; // FOR RENAME THE THUMB SET IT TO FALSE OR IT WILL NAMED AS "thumb_ORIGINAL_NAME"
			$config['maintain_ratio'] = FALSE;
			$config['width'] = "";
			$config['height'] = "";
			
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			@unlink('./logo_upload/'.$field_name);
			return $data['upload_data']['file_name'];
		}
	}
	
	// UPLOAD IMAGE
	
	/*public function upload_image() {
		$config['upload_path'] = './logo_upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		
		$this->upload->initialize($config);
		$field_name = "thumb_img";
			
		if ($this->upload->do_upload($field_name)) {
			
			if($field_name != "") {
				@unlink('./logo_upload/'.$field_name);
			}
			
			$data = array('upload_data' => $this->upload->data());	
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'].$field_name;
			$config['new_image'] = $field_name;
			$config['create_thumb'] = FALSE; // FOR RENAME THE THUMB SET IT TO FALSE OR IT WILL NAMED AS "thumb_ORIGINAL_NAME"
			$config['maintain_ratio'] = FALSE;
			$config['width'] = "";
			$config['height'] = "";
			
			$this->image_lib->initialize($config); 
			$this->image_lib->resize();
			
			@unlink('./logo_upload/'.$field_name);
			return $data['upload_data']['file_name'];
		}
	}*/
	


	

}//END CLASS



/* End of file Content.php */

/* Location: ./application/controllers/admin/Content.php */