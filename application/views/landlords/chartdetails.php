<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                  echo form_submit($submit_attr, 'Get Report'); ?>
                                 
                         
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
