<?php

class Tenants extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $this->get_details();
    }

    public function set_payment(){
        $data['title'] = 'Set Rent';
        $data['main_content'] = 'tenants/set_rent';
        $this->load->view('includes/template', $data);

    }

 public function pay_rent()
    {
        $data['title'] = 'Rent';
        $this->load->helper('string');
        $this->load->library('session');
        $this->load->model('tenants_model');
        $userdata = $this->session->all_userdata();
        $amount = $this->input->post('amount');
        $data['email'] = $userdata['email'];
        $data['tenant_detail'] = $this->tenants_model->get_unit($data['email']);
        $blockname = $data['tenant_detail'][0]['block_name'];
        $unitname = $data['tenant_detail'][0]['unitname'];
        $data = array(
              'amount' => $amount,
              'invoice_number' =>random_string('numeric', 8),
            'blockname' => $blockname,
            'unitname' => $unitname
            );
         $this->session->set_userdata($data);
         $userdata = $this->session->all_userdata();
        $this->load->library('session');
        $data['email'] = $userdata['email'];
        $data['amount'] = $userdata['amount'];
        $data['tenant_detail'] = $this->tenants_model->get_unit($data['email']);
        $data['tenant_rent'] = $this->tenants_model->get_rent($email);
        $data['invoice_number'] = $userdata['invoice_number'];
        $data['main_content'] = 'tenants/invoice.php';
        $this->load->view('includes/template', $data);
        
    }
    public function login()
    {
        $data['title'] = 'Login';
        $data['main_content'] = 'tenants/login';
        $this->load->view('includes/template', $data);
    }

    public function get_details(){
        $this->load->model('tenants_model');
        $userdata = $this->session->all_userdata();
        $email = $userdata['email'];
        $data['tenant_detail'] = $this->tenants_model->get_unit($email);
        $data['tenant_rent'] = $this->tenants_model->get_rent($email);
         $data['tenant_rent_due'] = $this->tenants_model->get_rent_due($email);
         $data['tenant_rent_due_date'] = $this->tenants_model->get_rent_due_date($email);
       
        $data['main_content'] = 'tenants/home';

        $this->load->view('includes/template', $data);
    }


    public function validate_credentials()
    {
        $this->load->model('users_model');
        $email = $this->input->post('email');
        $password = $this->input->post('pwd');
        $query = $this->users_model->validate_tenant($email, $password);
        if ($query) {
            $data = array(
                'email' => $email,
                'is_logged_in' => TRUE
            );
            $this->load->library('session');
            $this->session->set_userdata($data);
            redirect('tenants');
        } else {
            $this->login();
        }

    }

    public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}