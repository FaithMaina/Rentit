<?php

class Tenants extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $this->get_details();
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