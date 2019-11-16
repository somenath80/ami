<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Customers extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_customers');
		
		if(!in_array(2, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{
		$data['status'] = 'Active';
		$data['num_tag'] = $this->model_customers->get_num_data($data);
		$data['record'] = $this->model_customers->get_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('customers',$data);
		$this->load->view('footer',$data);			
	}

	public function add()
	{
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "ADD";

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('customers',$data);
		$this->load->view('footer',$data);			
	}

	public function edit($id)
	{
		$data['page_mode'] 	= "EDIT";
		$data['customer_id'] = $id;
		$data['record'] = $this->model_customers->get_single_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		

		/*echo "<pre>";
		print_r($data);exit;*/

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('customers',$data);
		$this->load->view('footer',$data);			
	}

	

	public function update()
	{
// 		foreach($_POST as $key => $value) {
// 			$data[$key] = $this->input->post($key);
// 		}
		
// 		if($this->input->post('password') == ""){
// 		  $data['password'] = $this->input->post('db_pass');
// 		}else{
// 		  $data['password'] = SHA1($this->input->post('password'));				
// 		}
        $data['page_mode'] = $this->input->post('page_mode');
        $data['customer_id'] = $this->input->post('customer_id');
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['street_address'] = $this->input->post('street_address');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['zipcode'] = $this->input->post('zipcode');

		if($data['page_mode'] == "ADD_RECORD"){
			$result = $this->model_customers->add_data($data);
			if($result == "No"){
			  $this->session->set_flashdata('user_errmsg', 'Email already exists !');
			  redirect('customers');
			}else{
			  $this->session->set_flashdata('user_msg', 'Information updated successfully !');
			  redirect('customers'.$result);
			}
		}

		if($data['page_mode'] == "UPDATE_RECORD"){
			
            $result = $this->model_customers->update_data($data);
            $this->session->set_flashdata('user_msg', 'Information updated successfully !');
            redirect('customers');

		}

	}
	
	public function editstatus($id)
	{
		$data['status'] = $this->input->post('status');
		if($data['status'] == "Active"){
			$data['customer_id'] = $id;
			$data['status'] = "Inactive";
			$result = $this->model_customers->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('customers');
		}
		if($data['status'] == "Inactive"){
			$data['customer_id'] = $id;
			$data['status'] = "Active";
			$result = $this->model_customers->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('customers');
		}
	}

	public function delete($id)
	{
		$data['customer_id'] = $id;
		$result = $this->model_customers->delete($data);
		//echo $result;exit;

		if($result){
			$this->session->set_flashdata('user_msg', 'Information deleted successfully !');
			redirect('customers');
		}
	}

	

	

}//END CLASS



/* End of file Customers.php */

/* Location: ./application/controllers/Customers.php */