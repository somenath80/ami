<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
	function __construct()
    {
        parent::__construct();
		
		// SESSION CHECK
		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 									        
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_settings');

		
		if(!in_array(2, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{
		$data['id'] = $this->session->userdata('b_user_id');
		$data['record'] = $this->model_settings->get_settings_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('settings',$data);
		$this->load->view('footer',$data);			
	}
	public function update_settings()
	{
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		
		if($_FILES['orig_img']['name'] != ""){
			$upload_path = './uploads/logo_upload/';
			$width = "";
			$height = '';
			$input_name = "orig_img";
			$orig_img = $this->upload_logo($data['orig_img'],$upload_path,$width,$height,$input_name);
			
			if($orig_img != "") {
				$data['image'] = $orig_img;
			}
		}else{
			$data['image'] = $data['db_orig_img'];
		}

		if($_FILES['top_adv_orgimg']['name'] != ""){
			$upload_path = './uploads/advertisment/';
			$width = "";
			$height = '';
			$input_name = "top_adv_orgimg";
			$top_adv_orgimg = $this->upload_logo($data['top_adv_orgimg'],$upload_path,$width,$height,$input_name);
			if($top_adv_orgimg != "") {
				$data['top_adv_orgimg'] = $top_adv_orgimg;
			}
		}else{
			$data['top_adv_orgimg'] = $data['db_top_adv_orgimg'];
		}

		if($_FILES['left_footer_adv_orgimg']['name'] != ""){
			$upload_path = './uploads/advertisment/';
			$width = "";
			$height = '';
			$input_name = "left_footer_adv_orgimg";
			$left_footer_adv_orgimg = $this->upload_logo($data['left_footer_adv_orgimg'],$upload_path,$width,$height,$input_name);
			if($left_footer_adv_orgimg != "") {
				$data['left_footer_adv_orgimg'] = $left_footer_adv_orgimg;
			}
		}else{
			$data['left_footer_adv_orgimg'] = $data['db_left_footer_adv_orgimg'];
		}

		if($_FILES['right_footer_adv_orgimg']['name'] != ""){
			$upload_path = './uploads/advertisment/';
			$width = "";
			$height = '';
			$input_name = "right_footer_adv_orgimg";
			$right_footer_adv_orgimg = $this->upload_logo($data['right_footer_adv_orgimg'],$upload_path,$width,$height,$input_name);
			if($right_footer_adv_orgimg != "") {
				$data['right_footer_adv_orgimg'] = $right_footer_adv_orgimg;
			}
		}else{
			$data['right_footer_adv_orgimg'] = $data['db_right_footer_adv_orgimg'];
		}
		
		$result = $this->model_settings->update_settings_data($data);
		$this->session->set_flashdata('user_msg', 'Information updated successfully !');
		redirect('settings');
		
	}
	
	// UPLOAD LOGO
	
	public function upload_logo($orig_img,$upload_path,$width,$height,$input_name) {
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		
		$this->upload->initialize($config);
		$field_name = $input_name;
			
		if ($this->upload->do_upload($field_name)) {
			
			if($orig_img != "") {
				@unlink($upload_path.$orig_img);
			}
			
			$data[$field_name] = $this->upload->data();			
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $config['upload_path'].$data[$field_name]['file_name'];
			$config['new_image'] = 'thumb_'.$data[$field_name]['file_name'];
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
	
}//END CLASS

/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */