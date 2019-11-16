<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_settings extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	function get_settings_data($data)
	{
	
		$get_query = "SELECT * FROM rs_settings WHERE id = '1'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	function update_settings_data($data)
	{
		$update_query = "UPDATE  rs_settings SET
						organization = '".$data['organization']."',
						address = '".$data['address']."',
						contact_email = '".$data['contact_email']."',
						contact_phone = '".$data['contact_phone']."',
						tag = '".$data['tag']."',
						orig_img = '".$data['image']."',
						facebook_link = '".$data['facebook_link']."',
						twitter_link = '".$data['twitter_link']."',
						youtube_link = '".$data['youtube_link']."',
						printinterest_link = '".$data['printinterest_link']."',
						copyright = '".$data['copyright']."',
						top_adv_orgimg = '".$data['top_adv_orgimg']."',
						left_footer_adv_orgimg = '".$data['left_footer_adv_orgimg']."',
						right_footer_adv_orgimg = '".$data['right_footer_adv_orgimg']."'
						WHERE id = '1'";
		$query = $this->db->query($update_query);
		return true;
	}
		
}//END CLASS
?>