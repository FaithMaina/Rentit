<?php 

class Payments_model extends CI_Model
{

	 public function rent_detail($rent, $email ,$date)

    {
    	$date=date_create($date);
		date_add($date,date_interval_create_from_date_string("30 days"));
		$rent_due_date = date_format($date,"Y-m-d");

    	
        $data = array( 
          	'email'=> $email,
          	'rent'=> $rent[0]['rent'],
          	'rent_due'=> '', 
          	'rent_balance'=>'',
          	'rent_due_date'=>$rent_due_date
				
				);

   		$this->db->insert("rent_details", $data); 
    }


    public function record_payment($data)

    {
        $this->load->helper('date');
        $datestring = "%Y-%m-%d ";
        $date = mdate($datestring);
    	$this->db->where('invoice_num',$data['invoice_number']);
      $query = $this->db->get('payments');
          if($query->num_rows == 0){
    	
       $insert = array(
       		'email' => $data['email'],
       		'amount' => $data['amount_paid'],
	 		    'date'=> $date,
	 		    'invoice_num' => $data['invoice_number'],
          'block_name' => $data['blockname'],
          'unit_name' => $data['unitname']
       	); 
        $this->db->insert("payments", $insert);
        $email = $data['email'];
        $amount = $data['amount_paid'];
        $query = $this->db->query("SELECT rent_balance FROM rent_details WHERE email = '" . $email . "'")->result_array();
  
    	foreach ($query as $key){
    		$rent_balance = $key['rent_balance'];
    		$new_rent_balance = $rent_balance - $amount;
    		$this->db->query("UPDATE rent_details SET rent_balance = '" . $new_rent_balance . "' WHERE email ='" . $email . "'");

    		}
     return TRUE;
        }
        else{

            return FALSE;
        }
    }

    public function check_due_date($date)
    {
    	echo $date;
    	$query = $this->db->query('SELECT * FROM rent_details')->result_array();
    
    	//exit();
    	foreach ($query as $key)
		{
		   $due_date = $key['rent_due_date'];
		   $rent = $key['rent'];
		   $id = $key['id'];
		   $rent_balance = $key['rent_balance'];
		   $new_rent_balance = $rent_balance + $rent;
		   $new_date=date_create($due_date);
			date_add($new_date,date_interval_create_from_date_string("30 days"));
			$new_rent_due_date = date_format($new_date,"Y-m-d");
			echo $new_rent_due_date;
		   	$date1=date_create($date);
			$date2=date_create($due_date);
			$diff=date_diff($date1,$date2);
			$dif = $diff->format("%a");

		   if ($dif == 0) {
		   		if ($new_rent_balance <= 0) {
					 $this->db->query("UPDATE rent_details SET rent_due = '0' WHERE id ='" . $id . "'");
					# code...
				} else {
					$this->db->query("UPDATE rent_details SET rent_due = '" . $new_rent_balance . "' WHERE id ='" . $id . "'");
				}

			$this->db->query("UPDATE rent_details SET rent_balance = '" . $new_rent_balance . "' WHERE id ='" . $id . "'");
			$this->db->query("UPDATE rent_details SET rent_due_date = '" . $new_rent_due_date . "' WHERE id ='" . $id . "'");

			
		   } 
		   else
		   {
		   	//$this->db->query('UPDATE rent_details SET rent_due = '0'');
		   
		   }
		}
	
	 }
     public function produce_receipt($data)
    {
        
    }

     public function rent_balance()
    {
        
    }
}

