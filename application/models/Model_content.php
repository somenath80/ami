<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_content extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		$get_query = "SELECT * FROM rs_content";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_content";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT * FROM rs_content WHERE page_id = '".$data['page_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	
	function get_feature_option_data($data)
	{
		$get_query = "SELECT option_name FROM rs_content WHERE page_id = '".$data['page_id']."'";
		$query = $this->db->query($get_query);
		return $query->result();
	}

	function update_data($data)
	{
		
		$update_query = "UPDATE  rs_content SET
						title = '".addslashes($data['title'])."',
						content = '".mysql_real_escape_string($data['content'])."'
						WHERE page_id = '".$data['page_id']."'";

		$query = $this->db->query($update_query);
		return $data['page_id'];
	}
		
	function change_status($data)
	{
		$update_query = "UPDATE  rs_content SET
						status = '".$data['status']."'
						WHERE page_id = '".$data['page_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}

	function delete($data)
	{
		  $delete_query = "DELETE FROM  rs_content WHERE page_id = '".$data['page_id']."'";
		  $query = $this->db->query($delete_query);
		  return true;
	}
		

}//END CLASS

?>