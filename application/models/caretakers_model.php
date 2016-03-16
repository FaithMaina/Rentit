<?php 

class Caretakers_model extends CI_Model {

public function check_caretaker($caretaker_name){
		$this->db->where('name', $caretaker_name);
        $query = $this->db->get('caretakers');
        
        if($query->num_rows >= 1){
          
          

			return TRUE; 	
		
		}

			 else {

			 	
			 	return FALSE;
			 }
}

public function insert_new_caretaker($caretaker_name, $landlord_name, $password, $username){

	$this->db->where('name', $caretaker_name);
 	$this->db->where('username', $username);
 	$this->db->where('landlord', $landlord_name);
	$query = $this->db->get('caretakers');

 	  if($query->num_rows == 0){
          $data = array(
        		'name'=>$caretaker_name,
				'username' => $username,
				'password' => $password,
				'landlord' => $landlord_name
				
				);
			$this->db->insert("caretakers", $data); 
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_complains($value){
		$query = "SELECT * FROM complains WHERE blockname ='" . $value . "'";
        $all_complains = $this->db->query($query)->result_array();
            
          return $all_complains;  
	}
	public function get_notices($value){
		$query = "SELECT * FROM notices WHERE blockname ='" . $value . "'";
        $all_notices = $this->db->query($query)->result_array();
            
          return $all_notices;  
      
	}


}