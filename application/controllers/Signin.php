<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		$this->load->model('model_signin');
    }

	public function index()
	{
		
		if($this->session->userdata('b_logged_in') != TRUE){			
			$this->login();
		}else{		
			$this->dashboard();
		}
	}

	public function dashboard()
	{
		//if($this->session->userdata('b_user_type') == 1 || $this->session->userdata('b_user_type') == 2){
			$data['record'] = $this->model_signin->get_settings_data();
			$data['result_copyright'] = $this->model_signin->get_copyright_data();
			$data['result_logo'] = $this->model_signin->get_logo_data();
			/*echo "<pre>";
			print_r($data);*/
			redirect('treeview', 'refresh');
			// $this->load->view('header.php',$data);
			// $this->load->view('menu.php',$data);
			// $this->load->view('dashboard',$data);
			// $this->load->view('footer',$data);			
		/*}else{
			redirect('signin/login/', 'refresh');
		}*/
	}

	public function login()
	{
		$data = array();

		$data['session'] = $this->session->all_userdata('admindata');	
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();	
		
		if(!isset($data['session']['admindata']['logged_in'])){

			$this->load->view('signin_header.php',$data);	
			$this->load->view('signin',$data);
			$this->load->view('signin_footer',$data);			

		}else{
			redirect('signin/dashboard/', 'refresh');
		}
	}

	public function authorization(){

		$data['username'] 	= $this->input->post('username');
		$data['password'] 	= $this->input->post('password');

		$result = $this->model_signin->get_admin_login($data);
		
		$data['user_type'] = $result->user_type;
		
		$data['result_permission'] = $this->model_signin->get_admin_permission($data);
			
		if($result)
		{
			$session_data = array(

								"b_username"  => "$result->admin_username",
								"b_fname"  => "$result->admin_fname",
								"b_lname"  => "$result->admin_lname",
								"b_user_id"  => "$result->admin_id",
								"b_user_type"  => "$result->user_type",
								"b_permission"  => $data['result_permission'],
								"b_name"  => "$result->name",
								"b_site_type"  => "BACKEND",
								"b_logged_in" => "TRUE"

								);	

								
			$this->session->set_userdata($session_data);

			redirect('signin/dashboard');

		}
		else
		{
			$this->session->set_flashdata('user_ermsg', 'Invalid username / password !');
			//redirect('signin/login/');
			redirect('signin');
		}

	}
	
	function forgetpassword()
	{
		   $data['email'] = $this->input->post('email');
		   
		   $result = $this->model_signin->forget_password($data);
		   
		   if($result != ""){
			    $this->resetpassword($result);
			    $this->session->set_flashdata('user_msg', 'Password has been reset and has been sent to email id: '. $result->admin_email);
				redirect('signin');
		   }else{
				$this->session->set_flashdata('user_ermsg', 'The email id you entered not found on our database');
				redirect('signin');
				
		   } 
	}
	
	private function resetpassword($user)
	{
		date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password = random_string('alnum', 6);
		$this->db->where('admin_id', $user->admin_id);
		$this->db->update('admin_master',array('admin_password'=>SHA1($password)));
		$this->load->library('email');
		$this->email->from('ranjan@codesive.com', 'Your name');
		$this->email->to($user->admin_email); 	
		$this->email->subject('Password reset');
		$this->email->message('You have requested the new password, Here is you new password:'. $password);	
		$this->email->send();
	} 

	function logout()
	{
		$this->session->unset_userdata('b_username');
		$this->session->unset_userdata('b_user_id');
		$this->session->unset_userdata('b_user_type');
		$this->session->unset_userdata('b_f_name');
		$this->session->unset_userdata('b_l_name');
		$this->session->unset_userdata('b_logged_in');
		$this->session->unset_userdata('b_site_type');

		redirect('signin');
	}

	

}//END CLASS



/* End of file signin.php */

/* Location: ./application/controllers/admin/signin.php */