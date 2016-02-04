<div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>admins">Home </a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>admins/check_rent">Rent Remmitted</a></li>
              <li><a href="<?php echo base_url();?>admins/check_requests">Scheduled Views</a></li>
            <li><a href="<?php echo base_url();?>admins/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10 main">
 <div class="well">
    <div class="row">
        <div class="col-md-12">
            <h3 class="lead" style="color: #0066FF">Register New Tenant</h3>
        <div class="container error">
            <?php echo validation_errors('<p style="color: red">','</p>'); ?>
        </div>
        <?php echo form_open('admins/validate_tenant'); ?>
        <div class="col-md-11">
        

                    <?php
                       $data = array(
                      'name'        => 'first_name',
                      'id'          => 'first_name',                      
                      'class' => 'form-control',
                      'placeholder' => 'First Name',
                       ); ?>

                    <div class="col-md-2" style="padding:0">
                        First Name: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'last_name',
                      'id'          => 'last_name',                      
                      'class' => 'form-control',
                      'placeholder' => 'Last Name'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Last Name: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'user_name',
                      'id'          => 'user_name',                      
                      'class' => 'form-control',
                      'placeholder' => 'User Name'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        User Name: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                    <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'pwd',
                      'id'          => 'pwd',                      
                      'class' => 'form-control',
                      'placeholder' => 'Password',
                      'type'=>'password',
                      'autocomplete' => 'false'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Password: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     <?php
                       $data = array(
                      'name'        => 'telephone',
                      'id'          => 'telephone',                      
                      'class' => 'form-control',
                      'placeholder' => '+254*********'
                    
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Telephone Number: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     <?php
                       $data = array(
                      'name'        => 'email',
                      'id'          => 'email',                      
                      'class' => 'form-control',
                      'placeholder' => 'text@text.com'
                      
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Email Adress: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     <?php
                       $data = array(
                      'name'        => 'blockname',
                      'id'          => 'blockname',                      
                      'class' => 'form-control',
                      'placeholder' => 'blockname'
                      
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Block Name: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     <?php
                       $data = array(
                      'name'        => 'unitname',
                      'id'          => 'unitname',                      
                      'class' => 'form-control',
                      'placeholder' => 'Unit Name'
                      
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Unit Name/Number: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     <?php
                       $data = array(
                      'name'        => 'location',
                      'id'          => 'location',                      
                      'class' => 'form-control',
                      'placeholder' => 'Location',
                     // 'value' =>  echo set_value('location');
                      
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Location: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                <?php 
                    $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                echo form_submit($submit_attr, 'Insert'); ?>
               
       
    </div>        
        <?php echo form_close(); ?>
        </div>
  </div>      
</div> 
        </div>
      </div>
    </div>
