<?php

class Charts extends CI_Controller {
	public function index(){

		 $this->load->model('charts_model');
		 $this->charts_model->get_data();

	}
	public function chart_sample(){
		 $data['main_content'] = 'public/charts';
		$this->load->view('includes/template', $data);
	}

	public function rentchart(){
		
		
		$data['main_content'] = 'landlords/chartdetails';
		$this->load->view('includes/template', $data);
	}
		
		

		
	

	public function block_rent_details(){
		

		$this->load->model('charts_model');
		$rent_details = $this->charts_model->block_rent_details($block,$from, $to);
		
        
	}

	


}
