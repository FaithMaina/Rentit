<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead">Caretaker's Options</h3>
            <ul class="nav nav-sidebar">
              <li><a href="<?php echo base_url();?>caretakers/check_complains">Complaints</a></li>
              <li><a href="<?php echo base_url();?>caretakers/check_notices">Notices</a></li>
              <li><a href="<?php echo base_url();?>caretakers/check_requests">Scheduled Views</a></li>
              <li><a href="<?php echo base_url();?>caretakers/sign_out">Logout</a></li>
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
                     
                    </tr>
                </div>
              </thead>
              <tbody>
                  <?php foreach ($units as $unit):?>
                  <tr>
                      <td><?php echo $unit['block_name'];?></td>
                      <td><?php echo $unit['totalunits']; ?></td>
                      <td><?php echo $unit['location']; ?></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>