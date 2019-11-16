<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_treeview extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT * FROM rs_customer WHERE status = 'Active'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_customer_data($data)
	{
		$get_query = "SELECT * FROM rs_customer WHERE customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->row();
		return $result;
	}

	function get_plant_data($data)
	{
		$get_query = "SELECT * FROM rs_plant WHERE customer_id = '".$data['customer_id']."' AND status = 'Active' GROUP BY plant_name";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_single_plant_name_data($data)
	{
		$get_query = "SELECT plant_name FROM rs_plant WHERE plant_id = '".$data['plant_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->row();
		return $result;
	}
	
	function get_single_plant_data($data)
	{
		$get_query = "SELECT pl.*,pr.program_name FROM rs_plant pl,rs_program pr WHERE pr.id = pl.program_id AND pl.plant_name = '".$data['plant_name']."' AND pl.customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_single_plant_data1($data)
	{
		$get_query = "SELECT pl.*,pr.program_name FROM rs_plant pl,rs_program pr WHERE pr.id = pl.program_id AND pl.program_id = '".$data['program_id']."' AND pl.plant_name = '".$data['plant_name']."' AND pl.customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_work_data1($data)
	{
		$get_query = "SELECT wk.*,tp.type_name FROM rs_work wk,rs_type tp WHERE tp.type_id = wk.type_id AND wk.plant_id = '".$data['plant_id']."' AND wk.program_id = '".$data['program_id']."' AND wk.customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_work_data2($data)
	{
		$get_query = "SELECT wk.*,tp.type_name FROM rs_work wk,rs_type tp WHERE tp.type_id = wk.type_id AND wk.type_id = '".$data['type_id']."' AND wk.plant_id = '".$data['plant_id']."' AND wk.program_id = '".$data['program_id']."' AND wk.customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	
// 	function get_work_data($data)
// 	{
// 		echo $get_query = "SELECT wk.*,tp.type_name FROM rs_work wk,rs_type tp WHERE tp.type_id = wk.type_id AND wk.plant_id = '".$data['plant_id']."' AND wk.customer_id = '".$data['customer_id']."'";exit;
// 		$query = $this->db->query($get_query);
// 		$result = $query->result();
// 		return $result;
// 	}

    
	function get_proram_data($data)
	{
		$get_query = "SELECT pr.*,wk.* FROM rs_work wk, rs_program pr WHERE pr.id = wk.program_id AND  wk.customer_id = '".$data['customer_id']."' AND wk.plant_id = '".$data['plant_id']."' group by wk.program_id";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_type_data($data)
	{
		$get_query = "SELECT tp.* FROM rs_work wk, rs_type tp WHERE tp.type_id = wk.type_id AND wk.program_id = '".$data['program_id']."' AND wk.customer_id = '".$data['customer_id']."' AND wk.plant_id = '".$data['plant_id']."' group by wk.type_id ";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	// function get_plant_data($data)
	// {
	// 	$get_query = "SELECT * FROM rs_work WHERE program_id = '".$data['program_id']."' AND customer_id = '".$data['customer_id']."'";
	// 	$query = $this->db->query($get_query);
	// 	$result = $query->result();
	// 	return $result;
	// }

	function get_work_data($data)
	{
		$get_query = "SELECT wk.*,am.* FROM rs_work wk , rs_admin_master am WHERE wk.inspector_id = am.admin_id AND wk.type_id = '".$data['type_id']."' AND wk.program_id = '".$data['program_id']."' AND wk.customer_id = '".$data['customer_id']."' AND wk.plant_id = '".$data['plant_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}





	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_plant";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT * FROM rs_plant WHERE plant_id = '".$data['plant_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	
	function add_data($data)
	{
		
		 $add_query = "INSERT INTO rs_plant SET 
					  plant_name = '".$data['plant_name']."',
					  customer_id = '".$data['customer_id']."',
					  status = 'Active'";
		$query = $this->db->query($add_query);
		$value = $this->db->insert_id();
		return $value;
	}

	function update_data($data)
	{
		// $valid_query = "SELECT * FROM rs_plant WHERE plant_name = '".$data['plant_name']."' AND plant_id <> '".$data['plant_id']."'";
		// $query = $this->db->query($valid_query);
		// $num = $query->num_rows();
		// if($num > 0){
		// 	$value = "No";
		// }else{
		$update_query = "UPDATE  rs_plant SET
						plant_name = '".$data['plant_name']."',
					  	customer_id = '".$data['customer_id']."'
						WHERE plant_id = '".$data['plant_id']."'";
		$query = $this->db->query($update_query);
		$value = $data['plant_id'];
			
		//}
		return $value;
	}
	
	function change_status($data)
	{
		$update_query = "UPDATE  rs_plant SET
						status = '".$data['status']."'
						WHERE plant_id = '".$data['plant_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}

	function delete($data)
	{	  
		  
	  $delete_query = "DELETE FROM rs_plant WHERE plant_id = '".$data['plant_id']."'";
	  $del_query = $this->db->query($delete_query);
		
	}
}//END CLASS

?>