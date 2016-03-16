<?php

class Caretakers extends CI_Controller {
   

    public function index()
    {
        $this->get_units();
    }
    public function login()
	{
		 $data['title'] = 'Login';
        $data['main_content'] = 'caretaker/login';
        $this->load->view('includes/template', $data);
	}

	 public function validate_credentials(){
        $this->load->model('users_model');
        $username = $this->input->post('uname');
        $password = $this->input->post('pwd');
        $query = $this->users_model->validate_caretaker($username, $password);
        if($query){
            $data = array(
              'username' => $username,
              'is_logged_in' => TRUE  
            );
            $this->load->library('session');
            $this->session->set_userdata($data);
            redirect('caretakers');
        }
        else{
            $this->login();
        }
     
    }

    public function get_units(){
        
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $data['units'] = $this->get_data_model->get_caretakers_units($username);
        $data['main_content'] = 'caretaker/home';
        $this->load->view('includes/template', $data);
    }

    public function check_requests()

    {
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('landlords_model');
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $blocks = $this->get_data_model->get_caretakers_units($username);
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
        $data['main_content'] = 'caretaker/views';
        $this->load->view('includes/template', $data);
    }
    public function check_notices(){
         error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->model('caretakers_model');
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $blocks = $this->get_data_model->get_caretakers_units($username);
        foreach ($blocks as $key => $value) {
            $block_name[] = $value['block_name'];
           }
           foreach ($block_name as $key => $value) {
            $notices[] = $this->caretakers_model->get_notices($value);
           }
           foreach ($notices as $key => $value) {
             foreach ($value as $key => $notice) {
                $all_notices[] = $notice; 
             }
           }
        $data['all_notices'] = $all_notices;
        $data['main_content'] = 'caretaker/notices';
        $this->load->view('includes/template', $data);
    }

    public function check_complains(){
         
        $this->load->model('caretakers_model');
        $userdata = $this->session->all_userdata();
        $username = $userdata['username'];
        $blocks = $this->get_data_model->get_caretakers_units($username);
        foreach ($blocks as $key => $value) {
            $block_name[] = $value['block_name'];
           }
           foreach ($block_name as $key => $value) {
            $complains[] = $this->caretakers_model->get_complains($value);
           }
           foreach ($complains as $key => $value) {
             foreach ($value as $key => $complain) {
                $all_complains[] = $complain; 
             }
           }
        $data['all_complains'] = $all_complains;
        $data['main_content'] = 'caretaker/complains';
        $this->load->view('includes/template', $data);
    }
    
    
    


    public function sign_out()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
    }	