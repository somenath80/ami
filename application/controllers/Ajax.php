<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'application/swift/swift_required.php';
class Ajax extends CI_Controller {
	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		// do nothing
	}
	
	public function getbooks()
	{
		$data['category_id'] = $this->input->post('category_id');
		
		$this->load->model('admin/model_codegenerator');
		$book = $this->model_codegenerator->get_book_data($data);
		$num = count($book);
		?>
        <select class="form-control select2me" name="book_id" id="book_id" >
        <?php if($num > 0){ ?>
          <option value="">Selectxxxx</option>	
		<?php foreach($book as $value){?>
          <option value="<?=$value->id?>"><?=ucwords(strtolower($value->title))?></option>
        <?php }?>
		<?php	
		}else{ ?>	
          <option value="">Select</option>
		<?php }?>
        </select>
		<?php
	}
	
	
	public function getcode()
	{
		$data['product_code'] = $this->input->post('product_code');
		$this->load->helper('date');
		$this->load->model('admin/model_codesearch');
		$data['record'] = $this->model_codesearch->get_code_data($data);
		/*echo "<pre>";
print_r($data);exit;*/
		$this->load->view('admin/get_code', $data);
	}
	
	
	
	
	public function customers() {

		// added datatables limit
        $limitData = '';
        $where_in = '';
        $startData = $this->input->get('start');
        $lengthData = $this->input->get('length');
		$searchArray = $this->input->get('search');

			$data['record'] = $this->model_customers->get_data($startData, $lengthData, $searchArray["value"]);
			$data['count'] = $this->model_customers->get_num_data($searchArray["value"]);
			
        $indexNum = 0;
        $subsR = array();

        foreach($data["record"] as $value){
			
			$subsR[$indexNum][] = $indexNum;
			$subsR[$indexNum][] = $value->customer_code;
			$subsR[$indexNum][] = $value->name;

				$status_url = site_url('admin/customer/editstatus/'.$value->customer_id);
				$edit_url = site_url('admin/customer/edit/'.$value->customer_id);
				$delete_url = site_url('admin/customer/delete/'.$value->customer_id);

				$activity_btn = "<a href=\"javascript:change_status('".$status_url."','".$value->status."');\" class=\"btn btn-sm ";

				if($value->status == "Active") {
					$activity_btn .= "green\">Active</a>";
				} else {
					$activity_btn .= "red\">Inactive</a>";
				}

			$subsR[$indexNum][] = $activity_btn;

			$subsR[$indexNum][] = "<a href=\"javascript:edit_record('".$edit_url."');\" class=\"btn btn-sm green\"><i class=\"icon-edit\"></i>EDIT</a>";
			$subsR[$indexNum][] = "<a href=\"javascript:delete_record('".$delete_url."');\" class=\"btn btn-sm red\"><i class=\"icon-trash\"></i>DELETE</a>";
			$indexNum++;
        }

        $retrieveData = array(
            "draw"            => intval( $this->input->get('draw') ),
            "recordsTotal"    => intval( $data["count"] ),
            "recordsFiltered" => intval( $data["count"] ),
            "data"            => $subsR
        );

        echo json_encode($retrieveData);
    }
	
	

    public function deleteImage()
	{
		$data['campusfacilities_option_id'] = $this->input->post('campusfacilities_option_id');
		$this->load->model('admin/model_codesearch');
		$data['record'] = $this->model_codesearch->get_code_data($data);
		/*echo "<pre>";
print_r($data);exit;*/
		$this->load->view('admin/get_code', $data);
	}
	
	






}//END CLASS

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */
?>