
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
          <h1 class="page-header">OCCUPIED UNITS</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">

                    <tr>
                        <th>Block Name</th>
                        <th>Unit Name</th>
                        <th>Occupied on</th>
                        <th>Rent Paid</th>
                        <th>Rent Due</th>

                    </tr>

              </thead>
              <tbody>
              <?php foreach ($occupied_units as $unit):?>
                    <tr>
                        <td><?php echo $unit['block_name'];?></td>
                        <td><?php echo $unit['unit_name'];?></td>
                        <td><?php $this->load->helper('date');
                            $datestring = "%d/%m/%Y";
                            echo mdate($datestring); ?></td>
                        <td><?php echo $unit['rent'];?></td>
                        <td><?php echo $unit['rent'];?></td>
                    </tr>
                <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>