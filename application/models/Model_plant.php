<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_plant extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT pl.*,cus.name ,pr.program_name FROM rs_plant pl, rs_customer cus, rs_program pr WHERE cus.customer_id = pl.customer_id AND pr.id = pl.program_id";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_data1($data)
	{
	    if($data['customer_id'] == 0){
	       $get_query = "SELECT pl.*,cus.name ,pr.program_name FROM rs_plant pl, rs_customer cus, rs_program pr WHERE cus.customer_id = pl.customer_id AND pr.id = pl.program_id"; 
	    }else{
	       $get_query = "SELECT pl.*,cus.name ,pr.program_name FROM rs_plant pl, rs_customer cus, rs_program pr WHERE cus.customer_id = pl.customer_id AND pr.id = pl.program_id AND pl.customer_id = '".$data['customer_id']."'"; 
	    }
		
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_program_data($data)
	{
		$get_query = "SELECT * FROM rs_program";
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
					  address = '".$data['address']."',
					  customer_id = '".$data['customer_id']."',
					  program_id = '".$data['program_id']."',
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
						address = '".$data['address']."',
					  	customer_id = '".$data['customer_id']."',
					  	program_id = '".$data['program_id']."'
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