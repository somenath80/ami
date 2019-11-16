<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_work extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_data($data)
	{
		if(isset($data['val']) && $data['val'] != ""){
		    if(isset($data['val']) && $data['val'] == "1"){
		        $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,typ.type_name,pr.program_name  
        	                FROM rs_work wk,rs_customer cust,rs_plant pl, rs_type typ,rs_program pr 
        	                WHERE wk.customer_id = cust.customer_id 
        	                AND wk.plant_id = pl.plant_id
        	                AND wk.type_id = typ.type_id
        	                AND wk.program_id = pr.id
        	                AND wk.before_work_date >= DATE(NOW()) - INTERVAL 7 DAY
        	                ORDER BY wk.before_work_date DESC";
		    }elseif(isset($data['val']) && $data['val'] == "2"){
		        $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,typ.type_name,pr.program_name  
        	                FROM rs_work wk,rs_customer cust,rs_plant pl, rs_type typ,rs_program pr 
        	                WHERE wk.customer_id = cust.customer_id 
        	                AND wk.plant_id = pl.plant_id
        	                AND wk.type_id = typ.type_id
        	                AND wk.program_id = pr.id
        	                AND wk.before_work_date >= DATE(NOW()) - INTERVAL 30 DAY
        	                ORDER BY wk.before_work_date DESC";
		    }elseif(isset($data['val']) && $data['val'] == "3"){
		        $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,typ.type_name,pr.program_name  
        	                FROM rs_work wk,rs_customer cust,rs_plant pl, rs_type typ,rs_program pr 
        	                WHERE wk.customer_id = cust.customer_id 
        	                AND wk.plant_id = pl.plant_id
        	                AND wk.type_id = typ.type_id
        	                AND wk.program_id = pr.id
        	                AND wk.before_work_date >= DATE(NOW()) - INTERVAL 90 DAY
        	                ORDER BY wk.before_work_date DESC";
		    }else{
		        $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,typ.type_name,pr.program_name  
        	                FROM rs_work wk,rs_customer cust,rs_plant pl, rs_type typ,rs_program pr 
        	                WHERE wk.customer_id = cust.customer_id 
        	                AND wk.plant_id = pl.plant_id
        	                AND wk.type_id = typ.type_id
        	                AND wk.program_id = pr.id
        	                ORDER BY wk.before_work_date DESC";
		        
		    }
		    
		}else{
		    $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,typ.type_name,pr.program_name  
        	                FROM rs_work wk,rs_customer cust,rs_plant pl, rs_type typ,rs_program pr 
        	                WHERE wk.customer_id = cust.customer_id 
        	                AND wk.plant_id = pl.plant_id
        	                AND wk.type_id = typ.type_id
        	                AND wk.program_id = pr.id
        	                ORDER BY wk.before_work_date DESC";
		}
	   
	    

		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_num_data($data)
	{
		$get_query = "SELECT * FROM rs_work";
		$query = $this->db->query($get_query);
		return $query->num_rows();
	}

	function get_single_data($data)
	{
		$get_query = "SELECT * FROM rs_work WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($get_query);
		return $query->row();
	}
	function check_inspector_upload($data)
	{
		$get_query = "SELECT * FROM rs_work WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($get_query);
		return $query->result();
	}

	function get_inspector_data()
	{

		$get_query = "SELECT * FROM rs_admin_master  WHERE user_type = '3' AND status = 'Active'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	function get_type_data()
	{

		$get_query = "SELECT * FROM rs_type";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_plan_data($customer_id)
	{

		$get_query = "SELECT * FROM rs_plant  WHERE customer_id = '".$customer_id."' group by plant_name";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	
	function get_program_data1($plant_name)
	{

		$get_query = "SELECT pr.* FROM rs_plant pl, rs_program pr  WHERE pr.id=pl.program_id  AND plant_name = '".$plant_name."'";
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}
	
	function updatet_work_status($data)
	{

		$update_query = "UPDATE rs_work SET status = '".$data['status_change']."' WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($update_query);

		return true;
	}
	function assigned_inspector($data)
	{

		$update_query = "UPDATE rs_work SET inspector_id = '".$data['inspector_id']."' WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($update_query);

		return true;
	}
	

	function add_data($data)
	{
		$valid_query = "SELECT * FROM rs_plant WHERE plant_name = '".$data['plant_id']."' AND customer_id = '".$data['customer_id']."' AND program_id = '".$data['program_id']."'";
		$query = $this->db->query($valid_query);
		$row = $query->row();
		
		
			
			$add_query = "INSERT INTO rs_work SET 
						  customer_id = '".$data['customer_id']."',
						  plant_id = '".$row->plant_id."',
						  program_id = '".$data['program_id']."',
						  type_id = '".$data['type_id']."',
						  inspector_id = '".$data['inspector_id']."',
						  before_work_date = NOW(),
						  after_work_date = '',
						  pm_upload_templete_name = '".$data['pm_upload_templete_name']."',
						  pm_upload_templete_link = '".$data['pm_upload_templete_link']."',
						  ins_upload_templete_name = '',
						  ins_upload_templete_link = '',
						  add_date = NOW(),
						  edit_date = '',
						  status = 'New'";

			$query = $this->db->query($add_query);
			$value = $this->db->insert_id();
			
			
			
			
			//$customer_code = "BP".str_pad($value, 6, "0", STR_PAD_LEFT);
			
			/*$update_query = "UPDATE rs_work SET
							customer_code = '".$customer_code."'
							WHERE work_id = '".$value."'";
							
			$query = $this->db->query($update_query);*/
			
		//}
		return $value;
	}

	function update_data($data)
	{
		  $update_query = "UPDATE  rs_work SET
						  customer_id = '".$data['customer_id']."',
						  plant_id = '".$data['plant_id']."',
						  program_id = '".$data['program_id']."',
						  type_id = '".$data['type_id']."',
						  inspector_id = '".$data['inspector_id']."',
						  before_work_templete = '".$data['before_work_templete']."',
						  after_work_templete = '".$data['after_work_templete']."',
						  edit_date = NOW()
						  WHERE work_id = '".$data['work_id']."'";

		  $query = $this->db->query($update_query);

		return true;
	}

	function update_data1($data)
	{
		  $update_query = "UPDATE  rs_work SET
						  ins_upload_templete_name = '".$data['ins_upload_templete_name']."',
						  ins_upload_templete_link = '".$data['ins_upload_templete_link']."'
						  WHERE work_id = '".$data['work_id']."'";

		  $query = $this->db->query($update_query);

		return true;
	}
	
	function get_orderdetails_num($data)
	{
		$get_query = "SELECT * FROM rs_order WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($get_query);
		$result = $query->num_rows();
		
		return $result;
	}
	
	function get_orderdetails_data($data)
	{
		$get_query = "SELECT * FROM rs_order WHERE work_id = '".$data['work_id']."'";
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
		$update_query = "UPDATE  rs_work SET
						status = '".$data['status']."'
						WHERE work_id = '".$data['work_id']."'";
		$query = $this->db->query($update_query);
		return true;
	}

	function delete($data)
	{
		  $delete_query = "DELETE FROM  rs_work WHERE work_id = '".$data['work_id']."'";
		  $query = $this->db->query($delete_query);
		  return true;
	}

	function get_edit_data($data)
	{
		  $get_query = "SELECT * FROM rs_work WHERE work_id = '".$data['work_id']."'";
		  $query = $this->db->query($get_query);
		  $result = $query->row();
		  return $result;
	}
	
	
	function get_assigned_data($data)
	{
		
		if($this->session->userdata('b_user_type') == 3){
// 			$get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname  FROM rs_work wk,rs_customer cust,rs_plant pl WHERE 
// 		wk.customer_id = cust.customer_id AND wk.plant_id = pl.plant_id AND wk.inspector_id = '".$this->session->userdata('b_user_id')."' ORDER BY work_id DESC";
		
            $get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,am.admin_fname,am.admin_lname,typ.type_name,pr.program_name  
    		                FROM rs_work wk,rs_customer cust,rs_plant pl,rs_admin_master am, rs_type typ,rs_program pr 
    		                WHERE wk.customer_id = cust.customer_id 
    		                AND wk.plant_id = pl.plant_id
    		                AND wk.type_id = typ.type_id
    		                AND wk.program_id = pr.id
    		                AND am.admin_id = wk.inspector_id 
    		                AND wk.inspector_id = '".$this->session->userdata('b_user_id')."' 
    		                ORDER BY work_id DESC";
		}else{
			$get_query = "SELECT wk.*,cust.name as customername,pl.plant_name as plantname,am.admin_fname,am.admin_lname,typ.type_name,pr.program_name  
    		                FROM rs_work wk,rs_customer cust,rs_plant pl,rs_admin_master am, rs_type typ,rs_program pr 
    		                WHERE wk.customer_id = cust.customer_id 
    		                AND wk.plant_id = pl.plant_id
    		                AND wk.type_id = typ.type_id
    		                AND wk.program_id = pr.id
    		                AND am.admin_id = wk.inspector_id 
    		                AND wk.inspector_id != 0 
    		                ORDER BY work_id DESC";

		}
		$query = $this->db->query($get_query);
		$result = $query->result();
		return $result;
	}

	function get_assigned_num_data($data)
	{
	    if($this->session->userdata('b_user_type') == 3){
	        $get_query = "SELECT * FROM rs_work WHERE inspector_id = '".$this->session->userdata('b_user_id')."' ORDER BY work_id DESC";
	    }else{
		   $get_query = "SELECT * FROM rs_work ORDER BY work_id DESC";
		
	    }
	    $query = $this->db->query($get_query);
		return $query->num_rows();
	}

	

		

}//END CLASS

?>