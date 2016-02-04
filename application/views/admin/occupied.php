 */

 <div class="container-fluid">
     <div class="row">
         <div class="col-sm-3 col-md-2 sidebar">
             <h3 class="lead"><a href="<?php echo base_url();?>landlords">Admin Options</a></h3>
             <ul class="nav nav-sidebar">
                 <li><a href="<?php echo base_url();?>admins/register_landlord" class="active navbar-inverse">Register Landlord</a></li>
                 <li><a href="<?php echo base_url();?>admins/register_tenant">Register Tenant</a></li>
                 <li><a href="<?php echo base_url();?>admins/rent_remitted">Rent Remitted</a></li>
                 <li><a href="<?php echo base_url();?>admins/check_requests">Scheduled Views</a></li>
                 <li><a href="<?php echo base_url();?>admins/get_landlords">Our Landlords</a></li>
                 <li><a href="<?php echo base_url();?>admins/get_tenants">Our Tenants</a></li>
                 <li><a href="<?php echo base_url();?>admins/sign_out">Logout</a></li>
             </ul>
         </div>
         <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
             <h1 class="page-header">OCCUPIED UNITS</h1>

             <div class="table-responsive">
                 <table class="table table-striped">
                     <thead class="navbar-default">

                     <tr>
                         <th>Block Name</th>
                         <th>Unit Name</th>
                         <th>Occupied on</th>
                         <th>Rent Paid</th>
                         <th>Rent Due</th>

                     </tr>

                     </thead>
                     <tbody>
                     <?php foreach ($all_occupied_units as $unit):?>
                         <tr>
                             <td><?php echo $unit['block_name'];?></td>
                             <td><?php echo $unit['unit_name'];?></td>
                             <td><?php $this->load->helper('date');
                                 $datestring = "%d/%m/%Y";
                                 echo mdate($datestring); ?></td>
                             <td><?php echo $unit['rent'];?></td>
                             <td><?php echo $unit['rent'];?></td>
                         </tr>
                     <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>