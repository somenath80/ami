<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accessdenied extends CI_Controller {
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
		
    }

	public function index()
	{
		$data['id'] = $this->session->userdata('b_user_id');
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$this->load->view('header.php',$data);
		$this->load->view('menu.php',$data);
		$this->load->view('accessdenied',$data);
		$this->load->view('footer',$data);			
	}
		
}//END CLASS

/* End of file Settings.php */
/* Location: ./application/controllers/admin/Settings.php */