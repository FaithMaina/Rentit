<?php

class Payments extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		$this->load->helper('string');
		
	}
	 public function purchase(){
	 	$userdata = $this->session->all_userdata();
	 	$config['business'] 			= 'rentit2@gmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= 'http://192.168.43.196/Rentit/payments/notify_payment';
		$config['notify_url'] 			= '<?php echo base_url();?>payments/notify_payment';
		$config['cancel_return'] 			= '<?php echo base_url();?>payments/cancel_payment';
		$config['production'] 			= FALSE; //Its false by default and will use sandbox
		
		$config["invoice"]				= $userdata['invoice_number'];//The invoice id

		
		$this->load->library('paypal',$config);
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		$this->load->model('tenants_model');
        
        $amount = $userdata['amount'];
        $rent = round($amount/101.85, 2);
		$this->paypal->add('Rent',$rent  ); //First item

	
		
		$this->paypal->pay(); //Proccess the payment
	 }

	 public function notify_payment()
	 {
		 	$payment_data = $this->input->post();
		 	$userdata = $this->session->all_userdata();
	 		$data['email'] = $userdata['email']; 
		 	$data['blockname'] = $userdata['blockname']; 
		 	$data['unitname'] = $userdata['unitname']; 
		 	$data['amount_paid'] = $userdata['amount'];
		 	$data['date_paid'] = $payment_data['payment_date'];
		 	$data['payer_email'] = $payment_data['payer_email'];
		 	$data['receiver_email'] = $payment_data['receiver_email'];
		 	$data['invoice_number'] = $payment_data['invoice'];
	 $this->load->model('payments_model');
	 $this->payments_model->record_payment($data);
	 	 	$data['paymentdata'] = $payment_data;
	 	 	$data['amount'] = $userdata['amount'];
	 	 	$data['email'] = $userdata['email'];
	 	 	$data['payer_email'] = $payment_data['payer_email'];
	 	 	$data['invoice_number'] = $payment_data['invoice'];
	 	 	$data['userdata'] = $this->session->all_userdata();
	 	 	$data['main_content'] = 'tenants/payment_successful';
       $this->load->view('includes/template', $data);

	 	 	//load receipt view# code...
	 	 




	 
	 }

	 public function cancel_payment(){
	 	
	 }
}