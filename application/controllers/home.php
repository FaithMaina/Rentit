<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	
	  public function index() {
	  
        $data['main_content'] = 'public/home';
        $this->load->view('includes/template', $data);
        	
    }

     public function vacant()
    {
        $data['title'] = 'vacant';
        $data['all_vacant_units'] = $this->get_data_model->get_all_vacant();
        $data['main_content'] = 'public/vacant';
        $this->load->view('includes/template', $data);
    }

    public function views()
    {

        $data['title'] = 'views';
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $telephone = $this->input->post('telephone');
        $blockname = $this->input->post('bname');
        $unitname = $this->input->post('uname');
        $date = $this->input->post('date');
          $this->load->model('tenants_model');
       if( $this->tenants_model->schedule_view($name, $email, $telephone,$blockname,$unitname, $date)){
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong> The Viewing Request has been accepted.</strong> 
</div>';
         $this->vacant();
       }else
       {
        echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> The Viewing Request you made already exists.</strong> 
</div>';


        $this->vacant();
       }
        
    
    }
}

