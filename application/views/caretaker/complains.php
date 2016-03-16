
<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <h3 class="lead"><a href="<?php echo base_url();?>caretakers">Caretakers Options</a></h3>
            <ul class="nav nav-sidebar">
              <li><a href="<?php echo base_url();?>caretakers/sign_out">Logout</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">COMPLAINTS RECEIVED</h1>

          <div class="table-responsive">
            <table class="table table-striped">
                <thead class="navbar-default">

                    <tr>
                        <th>Block Name</th>
                        <th>Unit Name</th>
                         <th>Complaint</th>
                        <th>Date Received</th>
                        

                    </tr>

              </thead>
              <tbody>
              <?php foreach ($all_complains as $key =>$complain):?>
                    <tr>
                        <td><?php echo $complain['blockname'];?></td>
                        <td><?php echo $complain['unitname'];?></td>
                        <td><?php echo $complain['complaint'];?></td>
                        <td><?php echo $complain['date'];?></td>
                    </tr>
                <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
