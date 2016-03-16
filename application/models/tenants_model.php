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

        $blocks = "SELECT block_name FROM tenants WHERE email ='" . $email . "'";
        $units = "SELECT unitname  FROM tenants WHERE email ='" . $email . "'";
        $blockname = $this->db->query($blocks)->result_array();
        $unitname = $this->db->query($units)->result_array();
        $unit = $unitname[0]['unitname'];
        $block = $blockname[0]['block_name'];
         $query = "SELECT rent FROM block_details WHERE block_name ='" . $block . "'AND unit_name ='" . $unit . "' ";
        return $this->db->query($query)->result_array();

    }

     public function get_rent_due($email)
    {

        $rent_balance = "SELECT rent_balance FROM rent_details WHERE email ='" . $email . "'";
        return $this->db->query($rent_balance)->result_array();
        

    }
     public function get_rent_due_date($email)
    {

        $rent_due_date = "SELECT rent_due_date FROM rent_details WHERE email ='" . $email . "'";
        return $this->db->query($rent_due_date)->result_array();;
       

    }
     public function schedule_view($name, $email, $telephone, $blockname,$unitname, $date)
    {

       $this->db->where('name', $name);
        $this->db->where('email',$email);
        $this->db->where('telephone',$telephone);
        $this->db->where('block_name',$blockname);
        $this->db->where('unit_name',$unitname);
        $this->db->where('date',$date);
        $query = $this->db->get('views');
        
        if($query->num_rows == 0){
          
          $data = array(
            'name' => $name,
            'email' => $email,  
            'telephone' => $telephone, 
            'unit_name' => $unitname,               
            'block_name' => $blockname,
            'date' => $date,
       
                );

     
            $this->db->insert("views", $data); 


            return TRUE;    
        
        }

             else {

                
                return FALSE;
             }

    }

    public function submit_notice($tenant_detail, $notice){
       
        $this->load->helper('date');
        $datestring = "%Y-%m-%d ";
        $date = mdate($datestring);
         $insert = array(
        'tenant' => $tenant_detail[0]['first_name'] .' '. $tenant_detail[0]['last_name'],
        'blockname' => $tenant_detail[0]['block_name'],
        'unitname' => $tenant_detail[0]['unitname'],
        'date_to_vacate'=>$notice,
        'date' =>$date 
        );
        if( $this->db->insert("notices", $insert)){
            return TRUE;}
            else{
                return FALSE;
            }
        


    }

    public function submit_complaint($tenant_detail, $complaint){
       
      $this->load->helper('date');
        $datestring = "%Y-%m-%d ";
        $date = mdate($datestring);
         $insert = array(
        'tenant' => $tenant_detail[0]['first_name'] .' '. $tenant_detail[0]['last_name'],
        'blockname' => $tenant_detail[0]['block_name'],
        'unitname' => $tenant_detail[0]['unitname'],
        'complaint'=>$complaint,
        'date' =>$date 
        );
        if( $this->db->insert("complains", $insert)){
            return TRUE;}
            else{
                return FALSE;
            }
          
    }

    public function delete_tenant($id){
        $details = "SELECT * FROM tenants WHERE id ='" . $id . "'";
        $tenant_detail = $this->db->query($details)->result_array();
        $query = "DELETE FROM tenants WHERE id = " .$id;
       if ($this->db->query($query)) {
            return $tenant_detail;
        } else {
            return FALSE;
        }


    }


}