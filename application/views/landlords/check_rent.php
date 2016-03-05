
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>landlords">Landlord Options</a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>landlords/register_block" class="active navbar-inverse">Register new Block</a></li>
            <li><a href="<?php echo base_url();?>landlords/check_rent">Rent Remmitted</a></li>
             <li><a href="<?php echo base_url();?>landlords/pay_tax">Pay Your Tax</a></li>
              <li><a href="<?php echo base_url();?>landlords/check_requests">Scheduled Views</a></li>
              <li><a href="<?php echo base_url();?>landlords/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">RENT REMMITTED</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">

                    <tr>
                        <th>Block Name</th>
                        <th>Unit Name</th>
                        <th>Invoice Number</th>
                        <th>Amout Paid</th>
                        <th>Date</th>
                        

                    </tr>

              </thead>
              <tbody>
              <?php foreach ($rent_paid as $key => $detail):?>
                    <tr>
                        <td><?php echo $detail['block_name'];?></td>
                        <td><?php echo $detail['unit_name'];?></td>
                        <td><?php echo $detail['invoice_num'];?></td>
                        <td><?php echo $detail['amount'];?></td>
                        <td><?php echo $detail['date'];?></td>
                    </tr>
                <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>