<?php

class Admins extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Home';
        $data['all_units'] = $this->get_data_model->get_all_units();
        $data['main_content'] = 'admin/home';
        $this->load->view('includes/template', $data);
	}
    public function login()
    {
         $data['title'] = 'Login';
        $data['main_content'] = 'admin/login';
        $this->load->view('includes/template', $data);
    }
    public function change_password(){
        $data['title'] = 'Change Password';
        $data['main_content'] = 'admin/change_password';
        $this->load->view('includes/template', $data);

    }

    public function validate_newpwd()
    {
        $this->load->library('form_validation');
         $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('oldpassword','Old Password','required|trim|xss_clean');
        $this->form_validation->set_rules('newpassword','New Password','required|trim|xss_clean');
        $this->form_validation->set_rules('conpassword','Confirm New Password','required|trim|xss_clean|matches[newpassword]');

        if($this->form_validation->run()!= true)
        {
            $this->change_password();
        } else {
            $username = $this->input->post('username');
            $oldpassword = $this->input->post('oldpassword');
            $newpassword = $this->input->post('newpassword');
    
            $this->load->model('users_model');
            $change_password = $this->users_model->change_admin_pwd($username ,$oldpassword,$newpassword);
                if ($change_password) {
                    echo '<div class="alert alert-success alert-dismissible center"  role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <strong> Password Updated.</strong> 
            </div>';
                $this->index();
                }else{
                    echo '<div class="alert alert-warning alert-dismissible center" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <strong> Wrong Old Password!.</strong> 
                </div>';
                $this -> change_password(); 
                }

        }
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
            $this->load->model('payments_model');
            $date = date("Y-m-d ");
            $this->payments_model->check_due_date($date);
            redirect('admins');
        }
        else{
            $this->login();
        }
     
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
     public function rent_remitted()
    {
        $data['title'] = 'rent';
        $data['rent'] = $this->get_data_model->get_all_payments();
        $data['main_content'] = 'admin/rent_remmitted';
        $this->load->view('includes/template', $data);
    }

    public function check_requests()
    {
        $data['title'] = 'viewings';
        $data['views'] = $this->get_data_model->get_all_views();
        $data['main_content'] = 'admin/scheduled_views';
        $this->load->view('includes/template', $data);
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
              $date = date("Y-m-d ");
            

            $this->load->model('blocks_model');
            $occupied_unit = $this->blocks_model->occupy_unit($firstname, $lastname, $username, $pwd, $email, $telephone, $unitname, $blockname, $location, $date );
            
            
            if($occupied_unit){
              
             $this->load->model('tenants_model');
             $rent = $this->tenants_model->get_rent($email);
             $units = $this->tenants_model->get_unit($email);
             $unit = $units[0]['unitname'];
             $this->load->model('payments_model');
             $this->payments_model->rent_detail($rent ,$email, $date, $unit);
            $this->index();
        } else{
            echo "unitname/blockname entered does not exist or is already occupied";
            $data['main_content'] = 'admin/register_tenant';
             $this->load->view('includes/template', $data);

        }

    }
}
    public function remove_tenant(){
        $this->load->model('tenants_model');
        $id = $this->uri->segment(3);
       $delete_tenant = $this->tenants_model->delete_tenant($id);
       if ($delete_tenant) {
            $blockname = $delete_tenant[0]['block_name'];
            $unitname = $delete_tenant[0]['unitname'];
            $email = $delete_tenant[0]['email'];
            $this->load->model('blocks_model');
            $unoccupy = $this->blocks_model->unoccupy_unit($blockname , $unitname);
            $this->load->model('payments_model');
            $delete_rent = $this->payments_model->remove_rent_detail($email);
        echo '<div class="alert alert-warning alert-dismissible center" role="alert">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                           The Tenant was deleted successfully. .</strong> 
                    </div>';
                    $this->get_tenants();
       }else{
        echo '<div class="alert alert-warning alert-dismissible center" role="alert">
                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <strong>Warning!</strong> The Tenant Failed to delete. Try again later.</strong> 
                    </div>';
                    $this->get_tenants();
       }
       
        
    }

        

    public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    }	