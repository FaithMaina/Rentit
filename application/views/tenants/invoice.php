
<head>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/invoice.css">
</head>
<div class="container">
    	<div class="row">
    		<div class="span4">
               
    			<address>
			       <h1 class="cover-heading">RENTIT AGENCY.</h1>
		    	</address>
    		</div>
    		<div class="span4 well">
    			<table class="invoice-head">
    				<tbody>
            <?php foreach ($tenant_detail as $key => $detail):?>
    					<tr>
    						<td class="pull-right"><strong>Tenant Name</strong></td>
    						<td><?php echo $detail['first_name'];?></td> 
                 <td><?php echo $detail['last_name'];?></td>
    					</tr>
              <?php endforeach; ?>
    					<tr>
    						<td class="pull-right"><strong>Invoice #</strong></td>
    						<td><?php echo $invoice_number;?></td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Date</strong></td>
    						<td><?php $this->load->helper('date');
                            $datestring = "%d/%m/%Y";
                            echo mdate($datestring); ?></td>
    					</tr>
    					<tr>
    						<td class="pull-right"><strong>Period</strong></td>
                          <td>9/1/2103 - 9/30/2013</td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
    	<div class="row">
    		<div class="span8">
    			<h2>Invoice</h2>
    		</div>
    	</div>
    	<div class="row">
		  	<div class="span8 well invoice-body">
		  		<table class="table table-bordered">
					<thead>
						<tr>
							<th>Description</th>
							<th>Date</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>Rent due for:</td>
						<td>10/8/2013</td>
				
              <td><?php echo $amount;?></td>
						</tr>
            <tr>
							<td>&nbsp;</td>
							<td><strong>Total KSH</strong></td>
            
              <td><?php echo $amount;?></td>
							
						</tr>
            <tr>
              <td>&nbsp;</td>
              <td><strong>Total USD</strong></td>
               
              <td><?php echo round($amount /101.85,2);?></td>
              
            </tr>
					</tbody>
				</table>
		  	</div>
  		</div>

      <div class="span1 ">
      <h2>Payment Options</h2>
          <table class="invoice-head">
            <tbody>
              <tr>
               <ul><a href="<?php echo base_url();?>payments/purchase" class="btn btn-default btn-info btn-sm btn"><img src="<?php echo base_url();?>images/paypal1.png"></a></ul><br>
                <ul><a href="<?php echo base_url();?>payments/purchase" class="btn btn-default btn-info btn-sm btn"><img src="<?php echo base_url();?>images/mpesa.gif"></a></ul><br><br>               
      
                </div>
                  </tr>
            </tbody>
          </table>
        </div>
      </div>
  		<!-- <div class="row"> 
  			<div class="span8 well invoice-thank"> 
  				<h5 style="text-align:center;">Thank You!</h5>
  			</div>
  		</div>
  		<div class="row">
  	    	<div class="span3">
  		        <strong>Phone:</strong> <a href="tel:555-555-5555">555-555-5555</a>
  	    	</div>
  	    	<div class="span3">
  		        <strong>Email:</strong> <a href="mailto:hello@5marks.co">hello@bootply.com</a>
  	    	</div>
  	    	<div class="span3">
  		        <strong>Website:</strong> <a href="http://5marks.co">http://bootply.com</a>
  	    	</div>
  		</div>
    </div> -->