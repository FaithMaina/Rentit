 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>tenants">Tenant Options</a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>tenants/pay_rent">Pay Rent</a></li>
             <li><a href="<?php echo base_url();?>tenants/complaints">Complaint/Notice</a></li>
              <li><a href="<?php echo base_url();?>tenants/house_search">Search Vacant</a></li>
              <li><a href="<?php echo base_url();?>tenants/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Hey, Someone</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <!--  <thead class="navbar-default">
               <div>
                    <tr>
                      <th>Block Number</th>
                      <th>Block Name</th>
                      <th>Total units</th>

                    </tr>
                </div>
              </thead>-->

              <tbody>
                  <?php foreach ($tenant_detail as $key => $detail):?>
                      <tr><td><?php echo $detail['first_name'];?></td> </tr>
                      <tr> <td><?php echo $detail['last_name'];?></td> </tr>
                      <tr><td><?php echo $detail['username'];?></td> </tr>
                      <tr><td><?php echo $detail['telephone'];?></td> </tr>
                      <tr><td><?php echo $detail['email'];?></td> </tr>
                      <tr><td><?php echo $detail['block_name'];?></td> </tr>
                      <tr><td><?php echo $detail['unitname'];?></td> </tr>
                  <?php endforeach; ?>
                  <?php foreach ($tenant_rent as $key => $rent);?>
                        <tr><td><?php echo $rent['rent'];?></td> </tr>

              </tbody>

</table>
</div>
</div>
</div>
</div>