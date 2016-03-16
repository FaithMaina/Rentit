<?php

class Landlords extends CI_Controller {

	public function index()
	{
		$this->get_units();
	}

	public function login()
	{
		 $data['title'] = 'Login';
        $data['main_content'] = 'landlords/login';
        $this->load->view('includes/template', $data);
	}

	 public function validate_credentials(){
        $this->load->model('users_model');
        $username = $this->input->post('uname');
        $password = $this->input->post('pwd');
        $query = $this->users_model->validate_landlord($username, $password);
        if($query){
            $data = array(
              'username' => $username,
              'is_logged_in' => TRUE  
            );
            $this->load->library('session');
            $this->session->set_userdata($data);
            redirect('landlords');
        }
        else{
            $this->login();
        }
     
    }	

    public function get_units(){
    	
    	$userdata = $this->session->all_userdata();
    	$username = $userdata['username'];
        $data['units'] = $this->get_data_model->get_units($username);
        $data['main_content'] = 'landlords/home';
		$this->load->view('includes/template', $data);
    }

     public function check_rent(){
    	$this->load->model('landlords_model');
    	$userdata = $this->session->all_userdata();
    	$username = $userdata['username'];
    	 $blocks = $this->get_data_model->get_units($username);

    	   foreach ($blocks as $key => $value) {
    	   	$block_name[] = $value['block_name'];
    	   }
    	   foreach ($block_name as $key => $value) {
    	   	$rent_remmitted[] = $this->landlords_model->get_rent_remmitted($value);
    	   }
    	   foreach ($rent_remmitted as $key => $value) {
    	   	 foreach ($value as $key => $rent) {
    	   	 	$rent_all[] = $rent; 
    	   	 }
    	   }
        $data['rent_paid'] = $rent_all;
       	$data['main_content'] = 'landlords/check_rent';
		$this->load->view('includes/template', $data);
    }

    public function register_block()
	{
		$data['main_content'] = 'landlords/register_block';
		$this->load->view('includes/template', $data);
	}
	public function register_caretaker()
	{
		$data['main_content'] = 'landlords/register_caretaker';
		$this->load->view('includes/template', $data);
	}

    public function occupied()
    {
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $data['occupied_units'] = $this->get_data_model->get_occupied($username);
        $data['main_content'] = 'landlords/occupied';
        $this->load->view('includes/template', $data);
    }

      public function check_requests()
    {
    	 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    	$this->load->model('landlords_model');
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $blocks = $this->get_data_model->get_units($username);
        foreach ($blocks as $key => $value) {
    	   	$block_name[] = $value['block_name'];
    	   }
    	   foreach ($block_name as $key => $value) {
    	   	$viewings[] = $this->landlords_model->get_views($value);
    	   }
    	   foreach ($viewings as $key => $value) {
    	   	 foreach ($value as $key => $viewing) {
    	   	 	$all_views[] = $viewing; 
    	   	 }
    	   }
        $data['all_views'] = $all_views;
       	$data['main_content'] = 'landlords/views';
		$this->load->view('includes/template', $data);
    }
    
	public function get_block_details($block_name, $total_units, $location)
	{
		$data['block_name'] = $block_name;
		$data['total_units'] = $total_units;
        $data['location'] = $location;
        $data['main_content'] = 'landlords/insert_block_details';
		$this->load->view('includes/template', $data);
		
	}
	public function validate_block_details(){
		$total_units = $this->input->post('total_units');
		$block_name = $this->input->post('block_name');
        $location = $this->input->post('location');

		 for($i=1; $i<=$total_units ;$i++) { 
		 	$name[$i] = $this->input->post('name'.$i);
		 	$type[$i] = $this->input->post('type'.$i);
		 	$floor[$i] = $this->input->post('floor'.$i);
		 	$rent[$i] = $this->input->post('rent'.$i);

	}

	$this->load->model('blocks_model');

        $userdata = $this->session->all_userdata();
        $landlord_name = $userdata['username'];

	
	 $inserted_block_details = $this->blocks_model->insert_new_block_details($total_units, $block_name, $landlord_name, $name, $type, $floor, $rent, $location);
	if($inserted_block_details)
			{
                $this->blocks_model->rent_sum($block_name);
				$this->get_units();
				
			} else {
				echo    '<div class="alert alert-warning alert-dismissible center" role="alert">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning!</strong> The Block you Registered already exists.</strong> 
                    </div>';
			 $data['main_content'] = 'landlords/register_block';
			 $this->load->view('includes/template', $data);
			}
	
	  }


	public function validate_block()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('block_name', 'Block Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('caretaker_name', 'Caretakers Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('total_units', 'Total Units', 'trim|required|xss_clean|is_natural_no_zero');
        $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE)
		{
			$this->register_block();
		}
		else
		{
			//get the values from the form and store them in variables.
			$userdata = $this->session->all_userdata();
    	

			$block_name = $this->input->post('block_name');
			$landlord_name = $userdata['username'];
			$caretaker_name = $this->input->post('caretaker_name');
			$total_units = $this->input->post('total_units');
			$location = $this->input->post('location');
			

			$this->load->model('blocks_model');

			


			$inserted_block = $this->blocks_model->insert_new_block($block_name, $landlord_name, $caretaker_name, $total_units, $location);
			
			if($inserted_block)
			{
				$this->get_block_details($block_name, $total_units, $location);
				
				
			} else {
			echo 	'<div class="alert alert-warning alert-dismissible center" role="alert">
						  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						  <strong>Warning!</strong> The Block you Registered already exists.</strong> 
					</div>';
			 $data['main_content'] = 'landlords/register_block';
			 $this->load->view('includes/template', $data);
			}
	
		}
	}
	 public function validate_new_caretaker()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[caretakers.username]');
        $this->form_validation->set_rules('caretaker_name', 'Caretakers Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lusername', 'Landlord Username', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE)
        {
        
            $this->register_caretaker();
        }
        else
        {
            //get the values from the form and store them in variables.
            $userdata = $this->session->all_userdata();
        

            $caretaker_name = $this->input->post('caretaker_name');
            $landlord_name = $userdata['username'];
            $password = $this->input->post('password');
            $username = $this->input->post('username');
            
            

            $this->load->model('caretakers_model');

            


            $new_caretaker = $this->caretakers_model->insert_new_caretaker($caretaker_name, $landlord_name, $password, $username);
           
            
            if($new_caretaker)
            {
            	$this->index();
                
            } else {
            echo    '<div class="alert alert-warning alert-dismissible center" role="alert">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning!</strong> The Caretaker you Registered already exists.</strong> 
                    </div>';
             $data['main_content'] = 'landlords/register_caretaker';
             $this->load->view('includes/template', $data);
            }
    
        }
    }

    public function edit_block_details(){
        $id = $this->uri->segment(3);
        $data['block_details'] = $this->get_data_model->get_block_details($id);
        $data['main_content'] = 'landlords/block_details';
        $this->load->view('includes/template', $data);

    }

    public function change_rent(){
        $unit_id = $this->input->post('unit_id');
        $rent = $this->input->post('rent');
       $this->load->model('blocks_model');
       $block_name = $this->blocks_model->update_rent($unit_id, $rent);
       $expected_rent_sum = $this->blocks_model->rent_sum($block_name);
        $this->get_units();
       }
       
	public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

	}



