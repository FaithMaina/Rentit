<?php 

class Get_data_model extends CI_Model
{

    public function index()
    {

    }

    public function get_units($username)
    {
        $query = "SELECT * FROM blocks WHERE landlord_name ='" . $username . "'";
        $units = $this->db->query($query)->result_array();
        return $units;

    }

    public function get_occupied($username)
    {
        $query = "SELECT * FROM block_details WHERE landlord_name ='" . $username . "' and occupied = '1'";
        $occupied = $this->db->query($query)->result_array();
        return $occupied;

    }

     public function get_all_payments()
    {
        $query = "SELECT * FROM payments";
        $all_payments = $this->db->query($query)->result_array();
        return $all_payments;

    }

    public function get_all_views()
    {
        $query = "SELECT * FROM views";
        $all_views = $this->db->query($query)->result_array();
        return $all_views;

    }


    public function get_all_units()
    {
        $query = "SELECT * FROM blocks";
        $all_units = $this->db->query($query)->result_array();
        return $all_units;

    }

    public function get_all_occupied()
    {
        $query = "SELECT * FROM block_details WHERE occupied = '1'";
        $all_occupied = $this->db->query($query)->result_array();
        return $all_occupied;

    }

    public function get_all_vacant()
    {
        $query = "SELECT * FROM block_details WHERE occupied = '0'";
        $all_vacant = $this->db->query($query)->result_array();
        return $all_vacant;

    }

    public function get_all_tenants()
    {
        $query = "SELECT * FROM tenants";
        $all_tenants = $this->db->query($query)->result_array();
        return $all_tenants;

    }

    public function get_all_landlords()
    {
        $query = "SELECT * FROM landlords";
        $all_landlords = $this->db->query($query)->result_array();
        return $all_landlords;

    }


}

