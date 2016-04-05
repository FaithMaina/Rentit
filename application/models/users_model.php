<?php defined('BASEPATH') or exit('Access denied');

class Users_model extends CI_Model {

	function validate_landlord($username, $password) {
        $query = "SELECT password FROM landlords WHERE Username = '" . $username . "'";
        $pwd =  $this->db->query($query)->result_array();
        $pwdhash = $pwd[0]['password'];

        if (password_verify($password, $pwdhash)) {
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
        $query = "SELECT password FROM tenants WHERE email = '" . $email . "'";
        $pwd =  $this->db->query($query)->result_array();
        $pwdhash = $pwd[0]['password'];

        if (password_verify($password, $pwdhash)) {
             return TRUE;
            }

    }
     function validate_caretaker($username, $password){
       $query = "SELECT password FROM caretakers WHERE username = '" . $username . "'";
        $pwd =  $this->db->query($query)->result_array();
        $pwdhash = $pwd[0]['password'];

        if (password_verify($password, $pwdhash)) {
             return TRUE;
            }

    }

    public function change_admin_pwd($username ,$oldpassword,$newpassword){
         $this->db->where('username', $username);
        $this->db->where('password',$oldpassword);
        $query = $this->db->get('administrators');

         if($query->num_rows == 1){
            $this->db->query("UPDATE administrators SET password = '" . $newpassword . "' WHERE username ='" . $username . "'");
            return TRUE;
         } else {
            return FALSE;
         }

    }
}