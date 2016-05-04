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
        <div class="text-center" id="chart-container"></div>
        
        <div class="text-center">
          <form method="POST" id="rentchart">
            <input type="hidden" value="<?php echo $block_details[0]['block_name'];?>" name="blockname">
            <div class="col-xs-12 col-sm-3">
              <strong>From:</strong> <input id="from" type="date" class="form-control" name="from">
              
            </div>

            <div class="col-xs-12 col-sm-3">
              <strong>To:</strong> <input id="to" type="date" class="form-control" name="to">
              
            </div>

            <div class="col-xs-12 col-sm-3">
              <br/>
              <button id="generate" class="btn btn-success btn-info btn-sm btn" type="submit">Generate Rent Report</button>
            </div>
          </form>
        </div>
        
          <div class="row">
              <div class="col-sm-12 text-center">
                <h3><?php echo $block_details[0]['block_name']; ?> Details</h3>
              </div>
          </div>
        

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

    <div class="modal fade" id="rentreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                          <h4 class="modal-title" id="myModalLabel">Enter Details</h4>
                        </div>
                        <div class="modal-body">
                         <?php echo form_open('charts/block_rent_details'); ?>
                          <div class="col-md-11">
                          

                                      
                                       <?php
                                         $data = array(
                                        'name'        => 'block_name',
                                        'id'          => 'block_name',                      
                                        'class' => 'form-control',
                                        'placeholder' => 'Block Name'
                                        
                                      ); ?>

                                      <div class="col-md-2" style="padding:0">
                                          Block: 
                                      </div>
                                      <div class="col-md-10" style="padding:0">
                                          <?php echo form_input($data); ?>  
                                      </div><br><br>


                                       <?php
                                         $data = array(
                                        'name'        => 'from',
                                        'id'          => 'from',                      
                                        'class' => 'form-control',
                                        'type' => 'date'
                                        
                                      ); ?>

                                      <div class="col-md-2" style="padding:0">
                                          From: 
                                      </div>
                                      <div class="col-md-10" style="padding:0">
                                          <?php echo form_input($data); ?>  
                                      </div><br><br>

                                      <?php
                                         $data = array(
                                        'name'        => 'to',
                                        'id'          => 'to',                      
                                        'class' => 'form-control',
                                        'type' => 'date'
                                        
                                      ); ?>

                                      <div class="col-md-2" style="padding:0">
                                          To: 
                                      </div>
                                      <div class="col-md-10" style="padding:0">
                                          <?php echo form_input($data); ?>  
                                      </div><br><br>


                                       
                                  <?php 
                                      $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                                      echo form_submit($submit_attr, 'Get Report'); 
                                  ?>
                                 
                         
                      </div>        
                          <?php echo form_close(); ?>
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                      </div>
                    </div>
                  </div>
<script src="<?php echo base_url();?>js/jquery-2.2.1.min.js"></script>
<script src="<?php echo base_url();?>js/fusioncharts.js"></script>
<script src="<?php echo base_url();?>js/fusioncharts.charts.js"></script>
<script src="<?php echo base_url();?>js/themes/fusioncharts.theme.zune.js"></script>
<script src="<?php echo base_url();?>js/app.js"></script>