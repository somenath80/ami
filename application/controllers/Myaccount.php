<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myaccount extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		
		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 									
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_myaccount' );
    }

	public function index()
	{
		$data['admin_id'] = $this->session->userdata('b_user_id');
		$data['record'] = $this->model_myaccount->get_settings_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('myaccount',$data);
		$this->load->view('footer',$data);			
	}

	public function update_settings()
	{
		$data['admin_id'] = $this->input->post('admin_id');
		$data['admin_username'] = $this->input->post('admin_username');
		$data['admin_phone'] = $this->input->post('admin_phone');
		$data['admin_email'] = $this->input->post('admin_email');

		if($this->input->post('admin_password') == ""){
			$data['admin_password'] = $this->input->post('db_pass');
		}else{
			$data['admin_password'] = SHA1($this->input->post('admin_password'));				
		}

		$result = $this->model_myaccount->update_settings_data($data);
		$this->session->set_flashdata('user_msg', 'Information updated successfully !');

		redirect('myaccount');
	}

	

}//END CLASS



/* End of file Myaccount.php */

/* Location: ./application/controllers/Myaccount.php */