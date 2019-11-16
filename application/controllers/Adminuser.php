<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminuser extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		
		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_adminuser');
		
		if(!in_array(3, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{
		$data['status'] = 'Active';
		$data['num_tag'] = $this->model_adminuser->get_num_data($data);
		$data['record'] = $this->model_adminuser->get_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('adminuser',$data);
		$this->load->view('footer',$data);			
	}

	public function add()
	{
		$data['page_mode'] 	= "ADD";
		$data['usertype'] = $this->model_adminuser->get_usertype_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('adminuser',$data);
		$this->load->view('footer',$data);			
	}

	public function reset_password($id)
	{
		$data['page_mode'] 	= "RESETPASSWORD";
		$data['admin_id'] 	= $id;
		$data['usertype'] = $this->model_adminuser->get_usertype_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('adminuser',$data);
		$this->load->view('footer',$data);			
	}

	public function edit($id)
	{
		$data['page_mode'] 	= "EDIT";
		$data['admin_id'] 	= $id;
		$data['usertype'] = $this->model_adminuser->get_usertype_data($data);
		$data['record'] = $this->model_adminuser->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();

		/*echo "<pre>";
		print_r($data);exit;*/

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('adminuser',$data);
		$this->load->view('footer',$data);			
	}

	public function update()
	{
		$data['page_mode'] 	= $this->input->post('page_mode');
        //$data['name'] = $this->input->post('name');
        $data['name'] = '';
        $data['admin_fname'] = $this->input->post('admin_fname');
        $data['admin_lname'] = $this->input->post('admin_lname');
		$data['admin_username'] = strtolower($this->input->post('admin_username'));
		$data['user_type'] = $this->input->post('user_type');
		$data['admin_email'] = $this->input->post('admin_email');
		$data['admin_phone'] = $this->input->post('admin_phone');
		$data['admin_gender'] = $this->input->post('admin_gender');
		$data['admin_id'] = $this->input->post('admin_id');
		if($this->input->post('admin_password') == ""){
			$data['admin_password'] = $this->input->post('db_pass');
		}else{
			$data['admin_password'] = SHA1($this->input->post('admin_password'));				
		}
		
		if($data['page_mode'] == "ADD_RECORD"){
			$result = $this->model_adminuser->add_data($data);
			if($result == "No"){
			  $this->session->set_flashdata('admin_errmsg', 'Username already exists !');
			  redirect('adminuser');
			}else{
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('adminuser');
			}
		}
		if($data['page_mode'] == "UPDATE_RECORD"){
			$result = $this->model_adminuser->update_data($data);
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('adminuser');
		}
	}

	public function restPassword($id)
	{
	    //echo $id;
		$data['admin_id'] = $this->input->post('admin_id');
		$data['admin_password'] = SHA1($this->input->post('admin_password'));
		$result = $this->model_adminuser->update_Password_data($data);
		$this->session->set_flashdata('admin_msg1', 'Password updated successfully !');
		redirect('adminuser');
	}
	
	public function editstatus($id)
	{
	    //echo $id;
		$data['status'] = $this->input->post('status');
		if($data['status'] == "Active"){
			$data['admin_id'] = $id;
			$data['status'] = "Inactive";
			$result = $this->model_adminuser->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('adminuser');
		}
		if($data['status'] == "Inactive"){
			$data['admin_id'] = $id;
			$data['status'] = "Active";
			$result = $this->model_adminuser->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('adminuser');
		}
	}

	public function delete($id)
	{
		$data['admin_id'] = $id;
		$result = $this->model_adminuser->delete($data);
		//echo $result;exit;
		if($result == 1){
			$this->session->set_flashdata('admin_msg', 'Information deleted successfully !');
			redirect('adminuser');
		}	
	}
	

}//END CLASS



/* End of file Adminuser.php */

/* Location: ./application/controllers/Adminuser.php */