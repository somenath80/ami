<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plant extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
		// SESSION CHECK
		if($this->session->userdata('b_site_type') != "BACKEND" && $this->session->userdata('b_username') != "admin") 
		{
            redirect('signin/login/');
        }
		$this->load->model('model_signin');
		$this->load->model( 'model_plant');
		$this->load->model( 'model_customers');
		
		if(!in_array(3, $this->session->userdata('b_permission'))){
			redirect('accessdenied');
		}
    }

	public function index()
	{
		$data['status'] = 'Active';
		$data['num_tag'] = $this->model_plant->get_num_data($data);
		$data['record'] = $this->model_plant->get_data($data);
		$data['customer'] = $this->model_customers->get_data($data);
// 		echo "<pre>";
// 		print_r($data['record']);exit;
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data["page_mode"] = "LISTINGS";

		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('plant',$data);
		$this->load->view('footer',$data);			

	}
	public function ajaxgetPlantbyCompany()
	{
	    
		$data['customer_id'] = $this->input->post('customer_id');
		$data['record'] = $this->model_plant->get_data1($data);
		?>
		    <?php $cnt = 1;?>
              <?php foreach($data['record'] as $value) {?>
              <tr class="odd gradeX">
                  <td><?=$value->plant_name?></td>
                  <td><?=$value->name?></td>
                  <td><?=$value->address?></td>
                  <td><?=$value->program_name?></td>
                  <td>
                      <a href="javascript:edit_record('<?=site_url('plant/edit/'.$value->plant_id);?>')" class="btn btn-xs green">
                      <i class="fa fa-edit"></i> Edit
                      </a>
                      <a href="javascript:delete_record('<?=site_url('plant/delete/'.$value->plant_id);?>')" class="btn btn-xs red">
                      <i class="fa fa-trash"></i> Delete
                      </a>
                  </td>
              </tr>
              <?php }?>
		                
		<?php
	}

	public function add()
	{

		$data['customer'] = $this->model_customers->get_data($data);
		$data['program'] = $this->model_plant->get_program_data($data);
		// echo "<pre>";
		// print_r($data['customer']);
		// exit;
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "ADD";
		
		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('plant',$data);
		$this->load->view('footer',$data);			
	}
	public function edit($id)
	{
		$data['plant_id'] 	= $id;
		$data['result'] = $this->model_plant->get_single_data($data);
		$data['customer'] = $this->model_customers->get_data($data);
		$data['program'] = $this->model_plant->get_program_data($data);
		//$data['num_permission'] = $this->model_plant->get_permission_num_data($data);
		//$data['record'] = $this->model_plant->get_single_permission_data($data);
		$data['result_copyright'] = $this->model_signin->get_copyright_data();
		$data['result_logo'] = $this->model_signin->get_logo_data();
		
		$data['page_mode'] 	= "EDIT";
		
		$this->load->view('header.php');
		$this->load->view('menu.php',$data);
		$this->load->view('plant',$data);
		$this->load->view('footer',$data);			
	}

	public function update()
	{
		foreach($_POST as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		
		
// 		echo "<pre>";
// 		print_r($data);
// 		exit;
		
		if($data['page_mode'] == "ADD_RECORD"){
			$result = $this->model_plant->add_data($data);
			if($result == "No"){
			  $this->session->set_flashdata('admin_errmsg', 'plant already exists !');
			  redirect('plant');
			}else{
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('plant'.$result);
			}
		}
		if($data['page_mode'] == "UPDATE_RECORD"){
			$result = $this->model_plant->update_data($data);
			$data['plant_id'] = $result;
			if($data['plant_id'] == "No"){
			  $this->session->set_flashdata('admin_errmsg', 'plant already exists !');
			  redirect('plant');
			}else{
			  $this->session->set_flashdata('admin_msg', 'Information updated successfully !');
			  redirect('plant');
			}
		}
	}
	
	public function editstatus($id)
	{
		
		$data['status'] = $this->input->post('status');
		if($data['status'] == "Active"){
			$data['plant_id'] = $id;
			$data['status'] = "Inactive";
			$result = $this->model_plant->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('plant');
		}
		if($data['status'] == "Inactive"){
			$data['plant_id'] = $id;
			$data['status'] = "Active";
			$result = $this->model_plant->change_status($data);
			$this->session->set_flashdata('admin_msg', 'Status updated successfully !');
			redirect('plant');
		}
	}
	
	public function delete($id)
	{
		$data['plant_id'] = $id;
		$result = $this->model_plant->delete($data);
		if($result == 1){
			$this->session->set_flashdata('admin_errmsg', 'Cannot delete this information. Other information is associated with it.');
			redirect('plant');
		}else{
			$this->session->set_flashdata('admin_msg', 'Information deleted successfully !');
			redirect('plant');
		}

	}

	

	

}//END CLASS



/* End of file plant.php */

/* Location: ./application/controllers/plant.php */