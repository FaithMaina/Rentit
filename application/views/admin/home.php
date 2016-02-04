<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>admins">Admin Options</a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>admins/register_landlord" class="active navbar-inverse">Register Landlord</a></li>
            <li><a href="<?php echo base_url();?>admins/register_tenant">Register Tenant</a></li>
             <li><a href="<?php echo base_url();?>admins/rent_remitted">Rent Remitted</a></li>
              <li><a href="<?php echo base_url();?>admins/check_requests">Scheduled Views</a></li>
                <li><a href="<?php echo base_url();?>admins/get_landlords">Our Landlords</a></li>
                <li><a href="<?php echo base_url();?>admins/get_tenants">Our Tenants</a></li>
              <li><a href="<?php echo base_url();?>admins/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Our Blocks</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="navbar-default">
                    <div>
                        <tr>
                            <th>Block Number</th>
                            <th>Landlord Name</th>
                            <th>Total units</th>
                            <th>Location</th>

                        </tr>
                    </div>
                    </thead>
                    <tbody>
                    <?php foreach ($all_units as $all_units):?>
                        <tr>
                            <td><?php echo $all_units['block_name'];?></td>
                            <td><?php echo $all_units['landlord_name'];?></td>
                            <td><?php echo $all_units['totalunits']; ?></td>
                            <td><?php echo $all_units['location']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <li><a href="<?php echo base_url();?>admins/occupied" class="btn btn-success btn-info btn-sm btn">Occupied Units</a></li><br><br>
                <li><a href="<?php echo base_url();?>admins/vacant" class="btn btn-success btn-info btn-sm btn">Vacant Units</a></li>
            </div>
        </div>
      </div>
</div>