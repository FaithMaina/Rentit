 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Block Details</h1>

          
          <?php echo form_open('landlords/validate_block_details'); ?>
          
          <div class="table-responsive">
          <h2 class="sub-header"></h2>
            <table class="table table-striped1">
            <thead>
            <tr>
            <td><div class="col-md-5" style="padding:0">
                        Block Name: 
                    </div><input label= 'Block Name' type='text' name="block_name" value="<?php echo $block_name?>"></td>
            <td><div class="col-md-5" style="padding:0">
                        Total Units: 
                    </div><input label= 'Total Units' type='text' name="total_units" value="<?php echo $total_units?>"></td>
                        Location:
                    </div><input label= 'Location' type='text' name="location" value="<?php echo $location?>"></td>
            </tr>
              <thead>
                <tr>
                 <th>Unit Number</th>
                  <th>Unit Name</th>
                  <th>Type</th>
                  <th>Floor</th>
                  <th>Rent Amount</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php for ($i=1; $i<=$total_units; $i++){ ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><input label= $i type='text' name="<?php echo 'name'.$i;?>" value="<?php echo set_value('name'.$i); ?>"></td>
                    <td><input type='text' name="<?php echo 'type'.$i;?>"></td>
                    <td><input type='text' name="<?php echo 'floor'.$i;?>"></td>
                    <td><input type='text' name="<?php echo 'rent'.$i;?>"></td>
                    
                  
                  </tr>
                  <?php echo form_close();?>
                <?php } ?>
              <tr class="submit">
            <td> <?php $submit_attr = array('class'=>'btn btn-lg btn-success', 'name'=>'submit');
                echo form_submit($submit_attr, 'Insert');?>
                </td>
              </tr>  
              </tbody>
            </table>      
          </div>
        </div>
<script>
$document.ready(function(){
  var i = 0;
  $('#unitname').each(function(){
      i++
      if($(input).val(i) === $(input).val(i-1))
  });
}
})
</script>        