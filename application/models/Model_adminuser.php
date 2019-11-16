<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_adminuser extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT am.*, ut.typename FROM rs_admin_master am, rs_usertype ut WHERE am.user_type = ut.type_id ";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	
	function get_usertype_data($data)
	{
		$get_query = "SELECT * FROM rs_usertype WHERE status = 'Active' AND type_id != 1";
		$query = $this->db->query($get_query);
		return $query->result();
	}

	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_admin_master";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT * FROM rs_admin_master WHERE admin_id = '".$data['admin_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}

	function add_data($data)
	{
		$valid_query = "SELECT * FROM rs_admin_master WHERE admin_username = '".$data['admin_username']."'";
		$query = $this->db->query($valid_query);
		$num = $query->num_rows();

		if($num == 0){

			$add_query = "INSERT INTO rs_admin_master SET
                            admin_fname = '".$data['admin_fname']."',
                            admin_lname = '".$data['admin_lname']."',
                            admin_username = '".$data['admin_username']."',
                            admin_email = '".$data['admin_email']."',
                            admin_phone = '".$data['admin_phone']."',
                            admin_password = '".$data['admin_password']."',
                            user_type = '".$data['user_type']."',
                            admin_last_login = '',
                            admin_last_ip = '',
                            status = 'Active'";

			$query = $this->db->query($add_query);
			$this->db->insert_id();
			return $this->db->insert_id();
		}else{
			$value = "No";
			return $value;
		}

	}

	function update_data($data)
	{
		$valid_query = "SELECT * FROM rs_admin_master 
						WHERE admin_username = '".$data['admin_username']."' 
						AND admin_id <> '".$data['admin_id']."'";
		$query = $this->db->query($valid_query);
		$num = $query->num_rows();

		if($num == 0){
		$update_query = "UPDATE  rs_admin_master SET
		                admin_fname = '".$data['admin_fname']."',
                        admin_lname = '".$data['admin_lname']."',
						admin_username = '".$data['admin_username']."',
						admin_email = '".$data['admin_email']."',
						admin_phone = '".$data['admin_phone']."',
						user_type = '".$data['user_type']."',
						admin_last_login = '',
						admin_last_ip = ''
						WHERE admin_id = '".$data['admin_id']."'";

		$query = $this->db->query($update_query);
		$value = $data['admin_id'];
		return $value;
		}else{
			$value = "No";
			return $value;
		}

	}


	function update_Password_data($data)
	{
		 $update_query = "UPDATE  rs_admin_master SET
						  admin_password = '".$data['admin_password']."'
						  WHERE admin_id = '".$data['admin_id']."'";
		  $query = $this->db->query($update_query);
		return true;
	}
	
	function change_status($data)
	{
		  $update_query = "UPDATE  rs_admin_master SET
						  status = '".$data['status']."'
						  WHERE admin_id = '".$data['admin_id']."'";
		  $query = $this->db->query($update_query);
		  return true;
	}

	function delete($data)
	{	  
		  $delete_query = "DELETE FROM rs_admin_master WHERE admin_id = '".$data['admin_id']."'";
		  $del_query = $this->db->query($delete_query);
		  return 1;
	}

	

		

}//END CLASS

?>