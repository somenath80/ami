<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_permission extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	function get_data($data)
	{
		$get_query = "SELECT DISTINCT u.*, p.* FROM bp_usertype u, bp_permission p 
					  WHERE u.type_id = p.usertype_id 
					  AND p.usertype_id != '1' GROUP BY p.usertype_id";
		$query = $this->db->query($get_query);
		if ($query->num_rows()) 
		{
			return $query->result();
		}
	}

	function get_num_data($data)
	{
		$get_query = "SELECT DISTINCT u.*, p.* FROM bp_usertype u, bp_permission p 
					  WHERE u.type_id = p.usertype_id 
					  AND p.usertype_id != '1' GROUP BY p.usertype_id";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}
	
	function get_usertype_data($data)
	{
		$get_query = "SELECT * FROM bp_usertype WHERE type_id NOT IN(SELECT DISTINCT usertype_id FROM bp_permission) AND type_id != '1'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		
		return $query->result();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT m.menu, p.menu_id FROM bp_menus m, bp_permission p 
					  WHERE m.id = p.menu_id 
					  AND p.usertype_id = '".$data['usertype_id']."'";

		$query = $this->db->query($get_query);

		if ($query->num_rows()) 
		{
			return $query->result();
		}
	}
	
	function get_usertypeid_data($data)
	{
		$get_query = "SELECT * FROM bp_usertype WHERE type_id = '".$data['usertype_id']."' AND type_id != '1'";
		$query = $this->db->query($get_query);
		return $query->result();
	}
	
	function add_data($data)
	{
		if($data['dashboard'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['dashboard']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_settings'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_settings']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_users'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_users']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_books'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_books']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_customers'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_customers']."'";
			$query = $this->db->query($add_query);
		}
		if($data['general_settings'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['general_settings']."'";
			$query = $this->db->query($add_query);
		}
		if($data['permission'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['permission']."'";
			$query = $this->db->query($add_query);
		}
		if($data['user_group'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['user_group']."'";
			$query = $this->db->query($add_query);
		}
		if($data['users'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['users']."'";
			$query = $this->db->query($add_query);
		}
		if($data['category'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['category']."'";
			$query = $this->db->query($add_query);
		}
		if($data['sub_category'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['sub_category']."'";
			$query = $this->db->query($add_query);
		}
		if($data['books'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['books']."'";
			$query = $this->db->query($add_query);
		}
		if($data['codegenerator'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['codegenerator']."'";
			$query = $this->db->query($add_query);
		}
		if($data['codesearch'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['codesearch']."'";
			$query = $this->db->query($add_query);
		}
		if($data['customers'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['customers']."'";
			$query = $this->db->query($add_query);
		}
		if($data['orders'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['orders']."'";
			$query = $this->db->query($add_query);
		}
		
			$value = $data['usertype_id'];
			return $value;
	}
	
	function update_data($data)
	{
		$delete_query = "DELETE FROM bp_permission 
						 WHERE usertype_id = '".$data['usertype_id']."'";
		$del_query = $this->db->query($delete_query);
		  
			if($data['dashboard'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['dashboard']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_settings'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_settings']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_users'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_users']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_books'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_books']."'";
			$query = $this->db->query($add_query);
		}
		if($data['main_customers'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['main_customers']."'";
			$query = $this->db->query($add_query);
		}
		if($data['general_settings'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['general_settings']."'";
			$query = $this->db->query($add_query);
		}
		if($data['permission'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['permission']."'";
			$query = $this->db->query($add_query);
		}
		if($data['user_group'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['user_group']."'";
			$query = $this->db->query($add_query);
		}
		if($data['users'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['users']."'";
			$query = $this->db->query($add_query);
		}
		if($data['category'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['category']."'";
			$query = $this->db->query($add_query);
		}
		if($data['sub_category'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['sub_category']."'";
			$query = $this->db->query($add_query);
		}
		if($data['books'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['books']."'";
			$query = $this->db->query($add_query);
		}
		if($data['codegenerator'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['codegenerator']."'";
			$query = $this->db->query($add_query);
		}
		if($data['codesearch'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['codesearch']."'";
			$query = $this->db->query($add_query);
		}
		if($data['customers'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['customers']."'";
			$query = $this->db->query($add_query);
		}
		if($data['orders'] != ""){
			$add_query = "INSERT INTO bp_permission SET 
						  usertype_id = '".$data['usertype_id']."',
						  menu_id = '".$data['orders']."'";
			$query = $this->db->query($add_query);
		}

			$value = $data['usertype_id'];

		return $value;

	}

	function delete($data)
	{
		  $delete_query = "DELETE FROM bp_books_option WHERE category_id = '".$data['cat_id']."' 
						   AND subcategory_id = '".$data['subcat_id']."' AND book_id = '".$data['book_id']."'";
		  $del_query = $this->db->query($delete_query);
		  return true;
	}

		

}//END CLASS

?>