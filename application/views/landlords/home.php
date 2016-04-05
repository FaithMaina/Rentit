<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead">Landlord Options</h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>landlords/register_block" class="active navbar-inverse">Register new Block</a></li>
            <li><a href="<?php echo base_url();?>landlords/register_caretaker" class="active navbar-inverse">Register Caretaker</a></li>
            <li><a href="<?php echo base_url();?>landlords/check_rent">Rent Remmitted</a></li>
             <li><a href="<?php echo base_url();?>landlords/pay_tax">Pay Your Tax</a></li>
              <li><a href="<?php echo base_url();?>landlords/check_requests">Scheduled Views</a></li>
              <li><a href="<?php echo base_url();?>landlords/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Your Blocks</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">
               <div>
                    <tr>  
                        <th>Block Name</th>
                        <th>Total units</th>
                        <th>Location</th>
                        <th>Details</th>
                    </tr>
                </div>
              </thead>
              <tbody>
                  <?php foreach ($units as $unit):?>
                  <tr>
                      <td><?php echo $unit['block_name'];?></td>
                      <td><?php echo $unit['totalunits']; ?></td>
                      <td><?php echo $unit['location']; ?></td>
                      <td><a href="<?php echo base_url() .'landlords/edit_block_details/'.$unit['id']; ?>" class="btn btn-success">Visit</a></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
                 
                    <div class="col-xs-12 col-sm-3">
                      <a href="<?php echo base_url();?>landlords/occupied" class="btn btn-success btn-info btn-sm btn">Occupied Units</a>
                    </div>
          </div>
        </div>
      </div>
    </div>

    