<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		// SESSION CHECK

		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('admin/signin/login/');
        }
		$this->load->model('admin/model_signin');
		$this->load->model( 'admin/model_permission');
    }

	public function index()
	{
		$data['status'] = 'Active';
		$data['record'] = $this->model_permission->get_data($data);
		$data['num_tag'] = $this->model_permission->get_num_data($data);
		$data['result_permission'] = $this->model_signin->get_admin_permission();
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		/*echo "<pre>";
		print_r($data['record']);exit;*/
		$data["page_mode"] = "LISTINGS";

		$this->load->view('admin/header.php');
		$this->load->view('admin/menu.php',$data);
		$this->load->view('admin/permission',$data);
		$this->load->view('admin/footer');			
	}
	
	public function add()
	{
		$data['page_mode'] 	= "ADD";
		
		$data['result_permission'] = $this->model_signin->get_admin_permission();
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		$data['record'] = $this->model_permission->get_usertype_data($data);
		/*echo "<pre>";
		print_r($data);exit;*/
		$this->load->view('admin/header.php');
		$this->load->view('admin/menu.php',$data);
		$this->load->view('admin/permission',$data);
		$this->load->view('admin/footer');			
	}

	public function edit($id)
	{
		$data['usertype_id'] = $id;
		$data['record'] = $this->model_permission->get_single_data($data);
		$data['usertype'] = $this->model_permission->get_usertypeid_data($data);
		$data['result_permission'] = $this->model_signin->get_admin_permission();
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "EDIT";

		/*echo "<pre>";
		print_r($data);exit;*/

		$this->load->view('admin/header.php');
		$this->load->view('admin/menu.php',$data);
		$this->load->view('admin/permission',$data);
		$this->load->view('admin/footer',$data);			

	}

	public function update()
	{
		$data['page_mode'] = $this->input->post('page_mode');
		
		$data['usertype_id'] = $this->input->post('usertype_id');
		$data['dashboard'] = $this->input->post('dashboard');
		$data['main_settings'] = $this->input->post('main_settings');
		$data['main_users'] = $this->input->post('main_users');
		$data['main_books'] = $this->input->post('main_books');
		$data['main_customers'] = $this->input->post('main_customers');
		$data['general_settings'] = $this->input->post('general_settings');
		$data['permission'] = $this->input->post('permission');
		$data['user_group'] = $this->input->post('user_group');
		$data['users'] = $this->input->post('users');
		$data['category'] = $this->input->post('category');
		$data['sub_category'] = $this->input->post('sub_category');
		$data['books'] = $this->input->post('books');
		$data['codegenerator'] = $this->input->post('codegenerator');
		$data['codesearch'] = $this->input->post('codesearch');
		$data['customers'] = $this->input->post('customers');
		$data['orders'] = $this->input->post('orders');
		
		if($data['page_mode'] == "ADD_RECORD"){

			$result = $this->model_permission->add_data($data);
			
			/*if($result == "No"){
			  $this->session->set_flashdata('admin_errmsg', 'Permission already exists !');
			  redirect('admin/permission');
			}else{*/
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('admin/permission/edit/'.$result);
			//}

		}

		if($data['page_mode'] == "UPDATE_RECORD"){
			
			/*echo "<pre>";
			print_r($data);exit;*/

			$result = $this->model_permission->update_data($data);
			$data['usertype_id'] = $result;
			
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('admin/permission/edit/'.$data['usertype_id']);

		}	

	}
	
	public function delete($cat_id, $subcat_id, $book_id)
	{
		$data['cat_id'] = $cat_id;
		$data['subcat_id'] = $subcat_id;
		$data['book_id'] = $book_id;
		$result = $this->model_permission->delete($data);

		//echo $result;exit;

		if($result){
			$this->session->set_flashdata('admin_msg', 'Information deleted successfully !');
			redirect('admin/permission');
		}

	}
	

}//END CLASS



/* End of file Permission.php */

/* Location: ./application/controllers/admin/Permission.php */