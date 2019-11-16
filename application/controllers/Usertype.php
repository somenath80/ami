<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Usertype extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_usertype');
		
		if(!in_array(2, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{
		$data['status'] = 'Active';
		$data['num_tag'] = $this->model_usertype->get_num_data($data);
		$data['record'] = $this->model_usertype->get_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('usertype',$data);
		$this->load->view('footer',$data);			
	}

	public function add()
	{
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "ADD";
		
		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('usertype',$data);
		$this->load->view('footer',$data);			
	}

	public function edit($id)
	{
		$data['type_id'] 	= $id;
		$data['result'] = $this->model_usertype->get_single_data($data);
		$data['num_permission'] = $this->model_usertype->get_permission_num_data($data);
		$data['record'] = $this->model_usertype->get_single_permission_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "EDIT";
		
		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('usertype',$data);
		$this->load->view('footer',$data);			
	}

	

	public function update()
	{
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}

		if($data['page_mode'] == "ADD_RECORD"){
			
			$result = $this->model_usertype->add_data($data);
			if($result == "No"){
			  $this->session->set_flashdata('admin_errmsg', 'Usertype already exists !');
			  redirect('usertype');
			}else{
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('usertype/edit/'.$result);
			}
		}

		if($data['page_mode'] == "UPDATE_RECORD"){
		    
            $result = $this->model_usertype->update_data($data);
            $this->session->set_flashdata('user_msg', 'Information updated successfully !');
            redirect('usertype');

		}

	}
	
	public function editstatus($id)
	{
		$data['status'] = $this->input->post('status');
		if($data['status'] == "Active"){
			$data['type_id'] = $id;
			$data['status'] = "Inactive";
			$result = $this->model_usertype->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('usertype');
		}
		if($data['status'] == "Inactive"){
			$data['type_id'] = $id;
			$data['status'] = "Active";
			$result = $this->model_usertype->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('usertype');
		}
	}

	public function delete($id)
	{
		$data['type_id'] = $id;
		$result = $this->model_usertype->delete($data);
		//echo $result;exit;
		
		if($result == 1){
			$this->session->set_flashdata('admin_errmsg', 'Cannot delete this information. Other information is associated with it.');
			redirect('usertype');
		}else{
			$this->session->set_flashdata('admin_msg', 'Information deleted successfully !');
			redirect('usertype');
		}
	}

	

	

}//END CLASS



/* End of file Customers.php */

/* Location: ./application/controllers/Customers.php */