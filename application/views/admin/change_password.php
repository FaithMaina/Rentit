<div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>admins">Home </a></h3>
            <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url();?>admins/rent_remitted">Rent Remmitted</a></li>
              <li><a href="<?php echo base_url();?>admins/check_requests">Scheduled Views</a></li>
            <li><a href="<?php echo base_url();?>admins/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-offset-3 col-sm-9 col-md-offset-2 col-md-10 main">
 <div class="well">
    <div class="row">
        <div class="col-md-12">
            <h3 class="lead" style="color: #0066FF">Change Password</h3>
        <div class="container error">
            <?php echo validation_errors('<p style="color: red">','</p>'); ?>
        </div>
        <?php echo form_open('admins/validate_newpwd'); ?>
        <div class="col-md-11">
        

                    <?php
                       $data = array(
                      'name'        => 'username',
                      'id'          => 'username',                      
                      'class' => 'form-control',
                      'placeholder' => 'Username',
                       ); ?>

                    <div class="col-md-2" style="padding:0">
                        Username: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'oldpassword',
                      'id'          => 'oldpassword',                      
                      'class' => 'form-control',
                      'type'=>'password',
                      'placeholder' => 'Old Password'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Old Password: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'newpassword',
                      'id'          => 'newpassword',                      
                      'class' => 'form-control',
                      'type'=>'password',
                      'placeholder' => 'New Password'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        New Password: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                    <?php echo form_input($data); ?>  
                    </div><br><br>

                    <?php
                       $data = array(
                      'name'        => 'conpassword',
                      'id'          => 'conpassword',                      
                      'class' => 'form-control',
                      'placeholder' => 'Confirm New Password',
                      'type'=>'password',
                      'autocomplete' => 'false'
                    ); ?>

                    <div class="col-md-2" style="padding:0">
                        Confirm New Password: 
                    </div>
                    <div class="col-md-10" style="padding:0">
                        <?php echo form_input($data); ?>  
                    </div><br><br>

                     
                <?php 
                    $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                echo form_submit($submit_attr, 'Change'); ?>
               
       
    </div>        
        <?php echo form_close(); ?>
        </div>
  </div>      
</div> 
        </div>
      </div>
    </div>
