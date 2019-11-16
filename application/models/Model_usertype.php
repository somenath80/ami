<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_usertype extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT * FROM rs_usertype";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_usertype";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT * FROM rs_usertype WHERE type_id = '".$data['type_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	
	function get_permission_num_data($data)
	{
		$get_query = "SELECT m.menu, p.menu_id FROM rs_menus m, rs_permission p 
					  WHERE m.id = p.menu_id 
					  AND p.usertype_id = '".$data['type_id']."'";

		$query = $this->db->query($get_query);
		return $query->num_rows();
	}
	
	function get_single_permission_data($data)
	{
		$get_query = "SELECT m.menu, p.menu_id FROM rs_menus m, rs_permission p 
					  WHERE m.id = p.menu_id 
					  AND p.usertype_id = '".$data['type_id']."'";

		$query = $this->db->query($get_query);

		if ($query->num_rows()) 
		{
			return $query->result();
		}
	}

	function add_data($data)
	{
		$valid_query = "SELECT * FROM rs_usertype WHERE typename = '".$data['typename']."'";
		$query = $this->db->query($valid_query);
		$num = $query->num_rows();
		if($num > 0){
			$value = "No";
		}else{
			$add_query = "INSERT INTO rs_usertype SET 
						  typename = '".ucwords($data['typename'])."',
						  status = 'Active'";
			$query = $this->db->query($add_query);
			$value = $this->db->insert_id();
			
			if($data['general_settings'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['general_settings']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['tax'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['tax']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['shipping'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['shipping']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['web_content'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['web_content']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['banners'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['banners']."'";
				$query = $this->db->query($add_query);
			}
			if($data['user_group'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['user_group']."'";
				$query = $this->db->query($add_query);
			}
			if($data['users'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['users']."'";
				$query = $this->db->query($add_query);
			}
			if($data['category'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['category']."'";
				$query = $this->db->query($add_query);
			}
			if($data['subject'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['subject']."'";
				$query = $this->db->query($add_query);
			}
			if($data['books'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['books']."'";
				$query = $this->db->query($add_query);
			}
			if($data['bulk_upload_books'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['bulk_upload_books']."'";
				$query = $this->db->query($add_query);
			}
			if($data['grades'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['grades']."'";
				$query = $this->db->query($add_query);
			}
			if($data['schools'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['schools']."'";
				$query = $this->db->query($add_query);
			}
			if($data['customers'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['customers']."'";
				$query = $this->db->query($add_query);
			}
			if($data['orders'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['orders']."'";
				$query = $this->db->query($add_query);
			}
			
		}
			return $value;
	}

	function update_data($data)
	{
		$valid_query = "SELECT * FROM rs_usertype WHERE typename = '".$data['typename']."' AND type_id <> '".$data['type_id']."'";
		$query = $this->db->query($valid_query);
		$num = $query->num_rows();
		if($num > 0){
			$value = "No";
		}else{
			$update_query = "UPDATE  rs_usertype SET
							typename = '".ucwords($data['typename'])."'
							WHERE type_id = '".$data['type_id']."'";
			$query = $this->db->query($update_query);
			$value = $data['type_id'];
			
		     $delete_query = "DELETE FROM rs_permission 
							 WHERE usertype_id = '".$data['type_id']."'";
			$del_query = $this->db->query($delete_query);
			
			
			if($data['general_settings'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['general_settings']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['customer'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['customer']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['plant'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['plant']."'";
				$query = $this->db->query($add_query);
			}
			
			if($data['work'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['work']."'";
				$query = $this->db->query($add_query);
			}
			if($data['assignment'] != ""){
				$add_query = "INSERT INTO rs_permission SET 
							  usertype_id = '".$value."',
							  menu_id = '".$data['assignment']."'";
				$query = $this->db->query($add_query);
			}
			
			
		}
		return $value;
	}
	
	function change_status($data)
	{
		$update_query = "UPDATE  rs_usertype SET
						status = '".$data['status']."'
						WHERE type_id = '".$data['type_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}

	function delete($data)
	{	  
		  $get_del_query = "SELECT * FROM  rs_admin_master WHERE user_type = '".$data['type_id']."'";
		  $query = $this->db->query($get_del_query);
		  $num = $query->num_rows();
		  
		  if($num > 0){
			return 1;	
		  }else{
		  $delete_query = "DELETE FROM rs_usertype WHERE type_id = '".$data['type_id']."'";
		  $del_query = $this->db->query($delete_query);
		  
		  $del_query = "DELETE FROM rs_permission 
						   WHERE usertype_id = '".$data['type_id']."'";
		  $dl_query = $this->db->query($del_query);
		  return 2;
		  }
	}

}//END CLASS

?>