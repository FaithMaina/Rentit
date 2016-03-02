<?php 
class Receipt extends CI_Controller{
      function __construct() { 
 parent::__construct();
 } 

 function index()
 {
$this->load->library('Pdf');
 $userdata = $this->session->all_userdata();
 $data['email'] = $userdata['email'];
 $this->load->model('tenants_model'); 
 $data['tenant_detail'] = $this->tenants_model->get_unit($data['email']);
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Rent Receipt');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Rentit Agency');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
$html = <<<EOD
<table cellspacing="3" cellpadding="6" border="">

 

		  
		  
EOD;
$pdf->Ln();
		$html .= "<tr><td>";
		$html .= "<b>RENTIT AGENCY<br />RENT RECEIPT</b>";
		$html .= "</td><td>";
		$this->load->helper('date');
        $datestring = "%Y-%m-%d ";
		$date = mdate($datestring);
		$html.= "<b>Date Received: </b> $date <br />" ; 
		$html.=	"<br /><b>Received From: </b> ";
		$html.= $userdata['email'] ; '<br />';
		$html.=	"<br /><br/><b>The sum of: </b> KeS " ;
		$html.= $userdata['amount'] ; '<br />';
		$html.= "</td></tr>";
		$html.= "<tr><td colspan=2>";
		$html .= "<b>For Rent at:</b> "; 
		$html.= $data['tenant_detail'][0]['block_name'];
		$html.= " house, "  ;
		$html.= $data['tenant_detail'][0]['unitname']; ',';
		$html.= "<br /><br /><b>Rent Period Starting</b>: ";
		$html.=  $data['tenant_detail'][0]['occupation_date']; ',<br />' ;
		$html.=	"<br /><br /><b>Received by: </b> Rentit Agency";

		$html .= "</td></tr>";
    	 
		$html .= "</table>";

$pdf->writeHTML($html, true ,false ,false, false, '');
ob_clean();
$pdf->Output('Receipt.pdf', 'I');
      }
}
?>