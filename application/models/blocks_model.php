<?php 

class Blocks_model extends CI_Model {

public function index(){

		

}

public function insert_new_block($block_name,$landlord_name, $caretaker_name, $total_units,$location){
		    
        $this->db->where('block_name', $block_name);
        $this->db->where('landlord_name',$landlord_name);
        $query = $this->db->get('blocks');
        
        if($query->num_rows == 0){
          
          $data = array(
				'block_name' => $block_name,
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

   public function occupy_unit($firstname, $lastname, $username, $pwdhash, $email, $telephone, $unitname, $blockname, $location, $date){
   	//update the 'occupied' field to 1 in the table 'block_details' for the row with above parameters i 'unitname' and 'blockname' field
      
        $this->db->where('block_name',$blockname);
        $this->db->where('unitname',$unitname);

        $query = $this->db->get('tenants');
        
        if($query->num_rows == 0){

          $data = array(
          	'first_name' => $firstname, 
          	'last_name' => $lastname, 
          	'username'=>$username,
          	'password' => $pwdhash, 
          	'email'=> $email,
          	'telephone'=> $telephone,
          	'unitname'=> $unitname, 
          	'block_name'=> $blockname,
          	'location'=> $location,
             'occupation_date' => $date,
				
				);

   		     $this->db->insert("tenants", $data); 
       	    $this->db->query("UPDATE block_details SET OCCUPIED = '1' WHERE block_name = '$blockname' && unit_name = '$unitname'");

        
       	return TRUE;
       } 
       else{

       	return FALSE;
       }
   }
   public function unoccupy_unit($blockname , $unitname){
    $query = "UPDATE block_details SET OCCUPIED = '0' WHERE block_name = '$blockname' && unit_name = '$unitname'";
    $this->db->query($query);
   }
   
   public function update_rent($unit_id, $rent){
    $query = "UPDATE block_details SET rent = '$rent' WHERE id = '$unit_id' ";
    $this->db->query($query);
    $unit = "SELECT unit_name FROM block_details WHERE id = '$unit_id'" ;
    $unit_name = $this->db->query($unit)->result_array();
    $unit = $unit_name[0]['unit_name'];
    $rent = "UPDATE rent_details SET rent = '$rent' WHERE unitname = '$unit' ";
    $this->db->query($rent);
    $quer = "SELECT block_name FROM block_details WHERE id = '$unit_id'" ;
    $block_name = $this->db->query($quer)->result_array();
     return $block_name[0]['block_name'];

   }

   public function rent_sum($block_name){
    $query = "SELECT rent FROM block_details WHERE block_name = '$block_name'" ;
   $rent = $this->db->query($query)->result_array();
   $total = 0;
   foreach ($rent as $key => $rent_value) {
    $total = $total + $rent_value['rent'];
     # code...
   }
      $this->load->helper('date');
      $now = now();
      $date = date('Y-m-d', $now);
      $data = array(
            'block_name' => $block_name, 
            'date' => $date, 
            'expected_rent_sum'=>$total,
            
        
        );

           $this->db->insert("rent_sum", $data); 
   
    
    
   }

}
