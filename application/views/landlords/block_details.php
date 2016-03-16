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
          <h1 class="page-header">Block's Details</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">
               <div>
                    <tr> 
                        <th></th>
                        <th>Unit Name</th>
                        <th>Occupied</th>
                        <th>Type</th>
                         <th>Rent</th>
                         <th>Update</th>
                     
                    </tr>
                </div>
              </thead>
              <tbody>
                  <?php foreach ($block_details as $detail):?>

                  <tr>
                      <?php echo form_open('landlords/change_rent');?>
                      <td><input type="hidden" value="<?php echo $detail['id'];?>" name="unit_id"></td>
                      <td><?php echo $detail['unit_name'];?></td>
                      <td><?php echo $detail['occupied']; ?></td>
                      <td><?php echo $detail['type']; ?></td>
                      <td ><input type="number" name="rent" maxlength="7" value="<?php echo $detail['rent'];?>"> </td>
                      <td><input type="submit" value="Update" class="btn btn-info btn-sm"></td>
                      <?php echo form_close();?>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>