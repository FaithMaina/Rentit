<?php 

class Blocks_model extends CI_Model {

public function index(){

		

}

public function insert_new_block($block_name, $block_number,$landlord_name, $caretaker_name, $total_units,$location){
		$this->db->where('block_name', $block_name);
        $this->db->where('block_number',$block_number);
        $this->db->where('landlord_name',$landlord_name);

        $query = $this->db->get('blocks');
        
        if($query->num_rows == 0){
          $data = array(
				'block_name' => $block_name,
				'block_number' => $block_number,
				'landlord_name' => $landlord_name,
				'caretaker' => $caretaker_name,
				'totalunits'=> $total_units,
				'location' => $location,
				);
			$this->db->insert("blocks", $data); 


			return TRUE; 	
		
		}

			 else {

			 	
			 	return FALSE;
			 }

  }

  
  public function insert_new_block_details($total_units, $block_name,$landlord_name, $name, $type, $floor, $rent, $location){
  	for($i=1; $i<=$total_units ;$i++) {
 	$this->db->where('block_name', $block_name);
 	$this->db->where('unit_name', $name[$i]);
	$query = $this->db->get('block_details');

 	  if($query->num_rows == 0){
          $data = array(
                'landlord_name'=>$landlord_name,
				'block_name' => $block_name,
				'unit_name' => $name[$i],
				'type' => $type[$i],
				'floor' =>$floor[$i],
				'rent'=> $rent[$i],
                'location' => $location
				);
			$this->db->insert("block_details", $data); 
		} else {
			return FALSE;
		}
	}
	return TRUE;
  }

   public function occupy_unit($firstname, $lastname, $username, $pwd, $email, $telephone, $unitname, $blockname, $location){
   	//update the 'occupied' field to 1 in the table 'block_details' for the row with above parameters i 'unitname' and 'blockname' field
        $this->db->where('block_name',$blockname);
        $this->db->where('unitname',$unitname);

        $query = $this->db->get('tenants');
        
        if($query->num_rows == 0){

          $data = array(
          	'first_name' => $firstname, 
          	'last_name' => $lastname, 
          	'username'=>$username,
          	'password' => $pwd, 
          	'email'=> $email,
          	'telephone'=> $telephone,
          	'unitname'=> $unitname, 
          	'block_name'=> $blockname,
          	'location'=> $location
				
				);

   		$this->db->insert("tenants", $data); 
       	$this->db->query("UPDATE block_details SET OCCUPIED = '1' WHERE block_name = '$blockname' && unit_name = '$unitname'");

       	return TRUE;
       } 
       else{

       	return FALSE;
       }


   }
}
