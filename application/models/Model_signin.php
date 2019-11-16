<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_signin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


	function get_admin_login($data)
	{
		$get_query = "SELECT * FROM rs_admin_master WHERE 
					  admin_username = '".$data['username']."' 
					  AND admin_password = '".SHA1($data['password'])."'
					  AND status = 'Active'";

		$query = $this->db->query($get_query);

		if ($query->num_rows()) 
		{
			return $query->row();
		}
	}

	function get_settings_data()
	{
		$get_query = "SELECT * FROM rs_admin_master WHERE admin_id = '".$this->session->userdata('b_user_id')."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	
	function get_copyright_data()
	{
		$get_query = "SELECT * FROM rs_settings";
		$query = $this->db->query($get_query);
		$num = $query->num_rows();
		
		if($num > 0){
			//$organization = $result->organization;
			$result = $query->row();
		}else{
			//$organization = "";
			$result = $query->row();
		}
		
		return $result;
	}
	
	function get_logo_data()
	{
		$get_query = "SELECT orig_img FROM rs_settings";
		$query = $this->db->query($get_query);
		$num = $query->num_rows();
		$result = $query->row();
		if($num > 0){
			$logo = $result->orig_img;
		}else{
			$logo = "";
		}
		return $logo;
	}

	function forget_password($data)
	{
		$get_query = "SELECT * FROM rs_admin_master WHERE admin_email = '".$data['email']."'";
		$query = $this->db->query($get_query);
		$num = $query->num_rows();
		$result = $query->row();
		
		if($num > 0){
			return $result;
		}
	}
	function get_admin_permission($data)
	{
		$get_query = "SELECT p.menu_id FROM rs_menus m, rs_permission p 
					  WHERE m.id = p.menu_id 
					  AND p.usertype_id = '".$data['user_type']."'";

		$query = $this->db->query($get_query);
		$num = $query->num_rows();
		$result = $query->result();
		
		for($i = 0; $i < $num; $i++){
			$result[$i] = $result[$i]->menu_id;
		}
		
			return $result;
	}
		

}//END CLASS

?>