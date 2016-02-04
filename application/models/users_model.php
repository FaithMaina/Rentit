<?php defined('BASEPATH') or exit('Access denied');

class Users_model extends CI_Model {

	function validate_landlord($username, $password) {
        $this->db->where('Username', $username);
        $this->db->where('Password',$password);
        $query = $this->db->get('landlords');
        
        if($query->num_rows == 1){
            return TRUE;
        }
	}

	function validate_admin($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password',$password);
        $query = $this->db->get('administrators');
        
        if($query->num_rows == 1){
            return TRUE;
        }
	}

    function validate_tenant($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password',$password);
        $query = $this->db->get('tenants');

        if($query->num_rows == 1){
            return TRUE;
        }
    }
}