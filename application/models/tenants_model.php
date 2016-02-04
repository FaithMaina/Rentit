<?php 

class Tenants_model extends CI_Model
{


    public function get_unit($email)
    {
        $query = "SELECT * FROM tenants WHERE email ='" . $email . "'";
        return $this->db->query($query)->result_array();
    }

//function to get the tenants rent from table block_details
    public function get_rent($email)
    {

        $blocks = "SELECT block_name  FROM tenants WHERE email ='" . $email . "'";
        $units = "SELECT unitname  FROM tenants WHERE email ='" . $email . "'";
        $blockname = $this->db->query($blocks)->result_array();
        $unitname = $this->db->query($units)->result_array();
        $unit = $unitname[0]['unitname'];
        $block = $blockname[0]['block_name'];
         $query = "SELECT rent FROM block_details WHERE block_name ='" . $block . "'AND unit_name ='" . $unit . "' ";
        return $this->db->query($query)->result_array();

    }

}