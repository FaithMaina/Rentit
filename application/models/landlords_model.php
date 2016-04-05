<?php

class Landlords_model extends CI_Model
{
    public function register_landlord($firstname, $lastname, $username, $pwdhash, $email, $telephone)
    {
        $this->db->where('First_name',$firstname);
        $this->db->where('Last_name',$lastname);
        $this->db->where('Username',$username);

        $query = $this->db->get('landlords');

        if($query->num_rows == 0){

            $data = array(
                'first_name' => $firstname,
                'last_name' => $lastname,
                'username'=>$username,
                'password' => $pwdhash,
                'email'=> $email,
                'telephone_no'=> $telephone,

            );

            $this->db->insert("landlords", $data);

            return TRUE;
        }
        else{

            return FALSE;
        }


    }

    public function get_rent_remmitted($value)
    {
        $query = "SELECT * FROM payments WHERE block_name ='" . $value . "'";
        $rent = $this->db->query($query)->result_array();
            
          return $rent;  
      
    }

    public function get_views($value)
    {
        $query = "SELECT * FROM views WHERE block_name ='" . $value . "'";
        $all_views = $this->db->query($query)->result_array();
            
          return $all_views;  
      
    }

}
