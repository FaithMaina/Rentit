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

		$to = $this->input->post('to');
		$from = $this->input->post('from');
		$block = $this->input->post('blockname');

		$rent_details = $this->charts_model->block_rent_details($block,$from, $to);

		$jsonArray = array();
       
        foreach($rent_details as $key => $row) {
            $jsonArrayItem = array();
            $jsonArrayItem['label'] = utf8_encode($row['date']);  
            $jsonArrayItem['value'] = utf8_encode($row['expected_rent_sum']);
            array_push($jsonArray, $jsonArrayItem);
        }
        array_push($jsonArray, $jsonArrayItem);

        return $this->output->set_content_type('application/json')
        		->set_status_header(200)
        		->set_output(json_encode($jsonArray));
	}

	


}
