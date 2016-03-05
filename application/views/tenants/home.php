 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead">Tenant Options</h3>
            <ul class="nav nav-sidebar">
             <li><a href="<?php echo base_url();?>tenants/complaints">Complaint/Notice</a></li>
              <li><a href="<?php echo base_url();?>home/vacant">Search Vacant</a></li>
              <li><a href="<?php echo base_url();?>tenants/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php foreach ($tenant_detail as $key => $detail):?>
          <h1 class="page-header">Hey, <?php echo $detail['first_name'];?></h1>
             <div class="col-sm-9 ">
             <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="navbar-default">
                    <div>
                        <tr>
                            <th>Tenant Details</th>
                            <th>Rent Balance</th>
                             <th>Rent Due Date</th>
                        </tr>
                        <tr>
               
                      <td rowspan="4">Tenant Name: <?php echo $detail['first_name'];?> <?php echo $detail['last_name'];?>
                      <br/><br/>Block Name: <?php echo $detail['block_name'];?> 
                      <br/><br/>Unit Name/Number: <?php echo $detail['unitname'];?>
                        <?php endforeach; ?>
                      <?php foreach ($tenant_rent as $key => $rent);?>
                      
                       <br/><br/>Rent: <?php echo $rent['rent'];?>
                    </td>
                    <td>
                       <?php foreach ($tenant_rent_due as $key => $rent_due);?>
                        <?php echo $rent_due['rent_balance'];?>
                    </td>
                    <td>
                      <?php foreach ($tenant_rent_due_date as $key => $rent_due_date);?>
                      <?php echo $rent_due_date['rent_due_date'];?>
                    </td>
                    </tr>

                  
                  
                        
                        </tr>
                        </tbody>
                        </table>
              </div>
         
        </div>

          <div class="col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10 main">
 <!--<div class="well">
    <div class="row">
        <div class="col-md-12">
            <h3 class="lead" style="color: #0066FF">Pay Your Rent</h3>
        <div class="container error">
            <?php echo validation_errors('<p style="color: red">','</p>'); ?>
        </div>

<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Pay Your Rent
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pay Rent</h4>
      </div>
      <div class="modal-body">
       <?php echo form_open('tenants/pay_rent'); ?>
        <div class="col-md-11">
        

                    
                     <?php
                       $data = array(
                      'name'        => 'amount',
                      'id'          => 'amount',                      
                      'class' => 'form-control',
                      'placeholder' => 'KShs'
                      
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Amount: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     
                <?php 
                    $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                echo form_submit($submit_attr, 'Get Invoice'); ?>
               
       
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

       
        </div>
  </div>      
</div>
</div>