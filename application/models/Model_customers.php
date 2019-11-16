<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_customers extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT * FROM rs_customer";
		//$get_query = "SELECT cust.*, addr.* FROM rs_customer cust, rs_customer_address addr WHERE cust.customer_id = addr.customer_id";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_customer";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		//$get_query = "SELECT * FROM rs_customer WHERE customer_id = '".$data['customer_id']."'";
	   $get_query = "SELECT cust.*, addr.* FROM rs_customer cust, rs_customer_address addr WHERE  addr.customer_id = cust.customer_id AND cust.customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	

	function add_data($data)
	{
		$valid_query = "SELECT * FROM rs_customer WHERE email = '".$data['email']."' AND customer_id <> '".$data['customer_id']."'";
		$query = $this->db->query($valid_query);
		$num = $query->num_rows();

		if($num > 0){
			$value = "No";
		}else{
			
			$add_query = "INSERT INTO rs_customer SET 
						  name = '".$data['name']."',
						  email = '".$data['email']."',
						  phone = '".$data['phone']."',
						  status = 'Active'";

			$query = $this->db->query($add_query);
			$customer_id = $this->db->insert_id();
			
			$add_query1 = "INSERT INTO rs_customer_address SET 
			              customer_id = '".$customer_id."',  
						  street_address = '".$data['street_address']."',
						  city = '".$data['city']."',
						  state = '".$data['state']."',
						  zipcode = '".$data['zipcode']."'";

			$query1 = $this->db->query($add_query1);
		}
		return $value;
	}

	function update_data($data)
	{
		  $update_query = "UPDATE  rs_customer SET
						  name = '".$data['name']."',
						  email = '".$data['email']."',
						  phone = '".$data['phone']."'
						  WHERE customer_id = '".$data['customer_id']."'";

		  $query = $this->db->query($update_query);
		  
		  $update_query1 = "UPDATE  rs_customer_address SET
						  street_address = '".$data['street_address']."',
						  city = '".$data['city']."',
						  state = '".$data['state']."',
						  zipcode = '".$data['zipcode']."'
						  WHERE customer_id = '".$data['customer_id']."'";

		  $query1 = $this->db->query($update_query1);

		return true;
	}
	
	function get_orderdetails_num($data)
	{
		$get_query = "SELECT * FROM rs_order WHERE customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->num_rows();
		
		return $result;
	}
	
	function get_orderdetails_data($data)
	{
		$get_query = "SELECT * FROM rs_order WHERE customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		
		return $result;
	}
	
	function get_activecodes_num($data)
	{
		$get_query = "SELECT * FROM rs_books_option WHERE user_id = '".$data['user_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->num_rows();
		
		return $result;
	}
	
	function get_activecodes_data($data)
	{
		$get_query = "SELECT * FROM rs_books_option WHERE user_id = '".$data['user_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		
		return $result;
	}
	
	function change_status($data)
	{
		$update_query = "UPDATE  rs_customer SET
						status = '".$data['status']."'
						WHERE customer_id = '".$data['customer_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}

	function delete($data)
	{
		  $delete_query = "DELETE FROM  rs_customer WHERE customer_id = '".$data['customer_id']."'";
		  $query = $this->db->query($delete_query);
		  return true;
	}

	function get_edit_data($data)
	{
		  $get_query = "SELECT * FROM rs_customer WHERE customer_id = '".$data['customer_id']."'";
		  $query = $this->db->query($get_query);
		  $result = $query->row();
		  return $result;
	}

	

		

}//END CLASS

?>