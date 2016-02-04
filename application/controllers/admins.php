<?php

class Admins extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Home';
        $data['all_units'] = $this->get_data_model->get_all_units();
        $data['main_content'] = 'admin/home';
        $this->load->view('includes/template', $data);
	}

    public function occupied()
    {
        $data['title'] = 'Occupied';
        $data['all_occupied_units'] = $this->get_data_model->get_all_occupied();
        $data['main_content'] = 'admin/occupied';
        $this->load->view('includes/template', $data);
    }

    public function get_tenants()
    {
        $data['title'] = 'Tenants';
        $data['all_tenants'] = $this->get_data_model->get_all_tenants();
        $data['main_content'] = 'admin/tenants';
        $this->load->view('includes/template', $data);
    }

    public function get_landlords()
    {
        $data['title'] = 'Landlords';
        $data['all_landlords'] = $this->get_data_model->get_all_landlords();
        $data['main_content'] = 'admin/landlords';
        $this->load->view('includes/template', $data);
    }

   public function vacant()
    {
        $data['title'] = 'vacant';
        $data['all_vacant_units'] = $this->get_data_model->get_all_vacant();
        $data['main_content'] = 'admin/vacant';
        $this->load->view('includes/template', $data);
    }

	public function login()
	{
		 $data['title'] = 'Login';
        $data['main_content'] = 'admin/login';
        $this->load->view('includes/template', $data);
	}

    

	 public function validate_credentials(){
        $this->load->model('users_model');
        $username = $this->input->post('uname');
        $password = $this->input->post('pwd');
        $query = $this->users_model->validate_admin($username, $password);
        if($query){
            $data = array(
              'username' => $username,
              'is_logged_in' => TRUE  
            );
            $this->load->library('session');
            $this->session->set_userdata($data);
            redirect('admins');
        }
        else{
            $this->login();
        }
     
    }
    public function register_tenant()
    {
         $data['title'] = 'Register Tenant';
        $data['main_content'] = 'admin/register_tenant';
        $this->load->view('includes/template', $data);
    }

    public function register_landlord()
    {
        $data['title'] = 'Register Landlord';
        $data['main_content'] = 'admin/register_landlord';
        $this->load->view('includes/template', $data);
    }

    public function validate_landlord()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|is_unique[tenants.username]|xss_clean');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tenants.email]|valid_email|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->register_landlord();
        } else {
            //get the values from the form and store them in variables.


            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $username = $this->input->post('user_name');
            $pwd = $this->input->post('pwd');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');

            $this->load->model('landlords_model');

            $new_landlord = $this->landlords_model->register_landlord($firstname, $lastname, $username, $pwd, $email, $telephone);

            if($new_landlord){
                $this->index();
            } else{
                echo 'error';
                $data['main_content'] = 'admin/register_landlord';
                $this->load->view('includes/template', $data);

            }
        }
    }


    public function validate_tenant()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_name', 'Username', 'trim|required|is_unique[tenants.username]|xss_clean');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telephone', 'Telephone Number', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[tenants.email]|valid_email|xss_clean');
        $this->form_validation->set_rules('unitname', 'Unit Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('blockname', 'Block Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            $this->register_tenant();
        }
        else
        {
            //get the values from the form and store them in variables.
            
        

            $firstname = $this->input->post('first_name');
            $lastname = $this->input->post('last_name');
            $username = $this->input->post('user_name');
            $pwd = $this->input->post('pwd');
            $telephone = $this->input->post('telephone');
            $email = $this->input->post('email');
            $unitname = $this->input->post('unitname');
            $blockname = $this->input->post('blockname');
            $location = $this->input->post('location');
            

            $this->load->model('blocks_model');

            


            $occupied_unit = $this->blocks_model->occupy_unit($firstname, $lastname, $username, $pwd, $email, $telephone, $unitname, $blockname, $location);
            
            
            if($occupied_unit){
            $this->index();
        } else{
            echo "unitname/blockname entered does not exist or is already occupied";
            $data['main_content'] = 'admin/register_tenant';
             $this->load->view('includes/template', $data);

        }

    }
}
   

        

    public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    }	