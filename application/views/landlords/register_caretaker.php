<div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>landlords">Home </a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>landlords/check_rent">Rent Remmitted</a></li>
             <li><a href="<?php echo base_url();?>landlords/pay_tax">Pay Your Tax</a></li>
              <li><a href="<?php echo base_url();?>landlords/check_requests">Scheduled Views</a></li>
            <li><a href="<?php echo base_url();?>landlords/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10 main">
 <div class="well">
    <div class="row">
        <div class="col-md-12">
            <h3 class="lead" style="color: #0066FF">Register Caretaker</h3>
        <div class="container error">
            <?php echo validation_errors('<p style="color: red">','</p>'); ?>
        </div>
        <?php echo form_open('landlords/validate_new_caretaker'); ?>
        <div class="col-md-11">
        

                    
                    <?php
                       $data = array(
                      'name'        => 'caretaker_name',
                      'id'          => 'caretaker_name',                      
                      'class' => 'form-control',
                      'placeholder' => 'Firstname Lastname'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Caretaker Name: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>
                    <?php
                       $data = array(
                      'name'        => 'username',
                      'id'          => 'username',                      
                      'class' => 'form-control',
                      'placeholder' => 'Username'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Username: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'password',
                      'id'          => 'password',                      
                      'class' => 'form-control',
                      'type'=>'password',
                      'autocomplete' => 'false',
                      'placeholder' => 'password'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Password: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'lusername',
                      'id'          => 'lusername',                      
                      'class' => 'form-control',
                      'placeholder' => 'Landlord Username'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Landlord Username: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                <?php 
                    $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                echo form_submit($submit_attr, 'Register'); ?>
               
       
    </div>        
        <?php echo form_close(); ?>
        </div>
  </div>      
</div> 
        </div>
      </div>
    </div>
