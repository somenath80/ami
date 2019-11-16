<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_myaccount extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	function get_settings_data($data)
	{
		$get_query = "SELECT am.*,ty.typename FROM rs_admin_master am,rs_usertype ty WHERE ty.type_id = am.user_type AND am.admin_id = '".$data['admin_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	function update_settings_data($data)
	{
		$update_query = "UPDATE  rs_admin_master SET
						admin_username = '".$data['admin_username']."',
						admin_email = '".$data['admin_email']."',
						admin_phone = '".$data['admin_phone']."',
						admin_password = '".$data['admin_password']."'
						WHERE admin_id = '".$data['admin_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}
		
}//END CLASS
?>