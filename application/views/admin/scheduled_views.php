
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>landlords">Home</a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>admins/register_landlord" class="active navbar-inverse">Register Landlord</a></li>
                 <li><a href="<?php echo base_url();?>admins/register_tenant">Register Tenant</a></li>
                 <li><a href="<?php echo base_url();?>admins/rent_remitted">Rent Remitted</a></li>
                 <li><a href="<?php echo base_url();?>admins/get_landlords">Our Landlords</a></li>
                 <li><a href="<?php echo base_url();?>admins/get_tenants">Our Tenants</a></li>
                 <li><a href="<?php echo base_url();?>admins/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">SCHEDULED VIEWS</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">

                    <tr>
                        <th>Block Name</th>
                        <th>Unit Name</th>
                        <th>Viewer's Name</th>
                        <th>Telephone</th>
                        <th>Date</th>
                        

                    </tr>

              </thead>
              <tbody>
              <?php foreach ($views as $key =>$view):?>
                    <tr>
                        <td><?php echo $view['block_name'];?></td>
                        <td><?php echo $view['unit_name'];?></td>
                         <td><?php echo $view['name'];?></td>
                         <td><?php echo $view['telephone'];?></td>
                        <td><?php echo $view['date'];?></td>
                    </tr>
                <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>