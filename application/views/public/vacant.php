
<div class="container-fluid">
    <div class="row">
   
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">VACANT UNITS</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="navbar-default">

                    <tr>
                        <th>Block Name</th>
                        <th>Unit Name</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Floor</th>
                        <th>Rent</th>

                    </tr>

                    </thead>
                    <tbody>
                    <?php foreach ($all_vacant_units as $unit):?>
                        <tr>
                            <td><?php echo $unit['block_name'];?></td>
                            <td><?php echo $unit['unit_name'];?></td>
                            <td><?php echo $unit['location'];?></td>
                            <td><?php echo $unit['type'];?></td>
                            <td><?php echo $unit['floor'];?></td>
                            <td><?php echo $unit['rent'];?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                  Schedule to View
                </button>

            <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Schedule View</h4>
                          </div>
                          <div class="modal-body">
                           <?php echo form_open('home/views'); ?>
                            <div class="col-md-11">
                            

                                        
                                         
                                        <?php
                                           $data = array(
                                          'name'        => 'name',
                                          'id'          => 'name',                      
                                          'class' => 'form-control',
                                          'placeholder' => 'Name'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Name: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>
                                        <?php
                                           $data = array(
                                          'name'        => 'email',
                                          'id'          => 'email',                      
                                          'class' => 'form-control',
                                          'placeholder' => 'Email'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Email: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>

                                        <?php
                                           $data = array(
                                          'name'        => 'telephone',
                                          'id'          => 'telephone',                      
                                          'class' => 'form-control',
                                          'placeholder' => '+2547********'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Telephone: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>
                                        <?php
                                           $data = array(
                                          'name'        => 'bname',
                                          'id'          => 'bname',                      
                                          'class' => 'form-control',
                                          'placeholder' => 'Block Name'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Block Name: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>
                                        <?php
                                           $data = array(
                                          'name'        => 'uname',
                                          'id'          => 'uname',                      
                                          'class' => 'form-control',
                                          'placeholder' => 'Unit Name'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Unit Name: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>

                                        <?php
                                           $data = array(
                                          'name'        => 'date',
                                          'id'          => 'date',                      
                                          'class' => 'form-control',
                                          'placeholder' => 'YYYY-MM-DD'
                                          
                                        ); ?>

                                        <div class="col-md-2" style="padding:0">
                                            Date: 
                                        </div>
                                        <div class="col-md-10" style="padding:0">
                                            <?php echo form_input($data); ?>  
                                        </div><br><br>


                                          <?php 
                                        $submit_attr = array('class'=>'btn btn-success', 'name'=>'submit');
                                    echo form_submit($submit_attr, 'Submit Request'); ?>
                                   
                           
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