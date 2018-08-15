<section class="content">
              
                <div class="">
                    <div class="">
                      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Entry</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Expired Assignment Data
        </div>
      </div>
        <div class="card-header">
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/add_assignment')?>">Add Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment')?>">View New Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/complete_assignment')?>">View Completed Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/reject_assignment')?>">View Reject Assignment</a>
             <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/accept_assignment')?>">View Accept Assignment</a>
             <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/pending_assignment')?>">View Pending Assignment</a>
             
        </div>
                        <!-- <h4 class="card-title">Basic example</h4>
                        <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  
                  <th>Client Name</th>
                  <th>City</th>
                  <th>Start From</th>
                  <th>Valid Till</th>
                  <th>Status</th>
                  <th>Mystery Shopper Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
                                                foreach ($alldata as $key => $value)
                                                {
                                                  
                                             ?>
                                           
                                              <?php
                                                foreach ($allclient as $key => $value1)
                                                {
                                                  if($value['mysteryShopper_client_id'] == $value1['mysteryShopper_client_id']){
                                            ?>
                                          <tr align="center">
                                            <td><?php echo $value1['mysteryShopper_client_name']; ?> - <?php echo $value1['mysteryShopper_client_owner_name']; ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_city'];?></td>
                                            <td><?php echo date("d/m/Y", strtotime($value['mysteryShopper_assignment_fromDate']));?></td>
                                            <td><?php echo date("d/m/Y", strtotime($value['mysteryShopper_assignment_toDate'])); ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_status']; ?></td>

                                            <?php
                                                foreach ($allshopper as $key => $value2)
                                                {
                                                  if($value['mysteryShopper_id'] == $value2['user_id']){
                                            ?>
                                            <td><?php echo $value2['user_name']; ?> </td>
                                             
                                            <?php }} ?>
                                            <td>
                                              <?php  $id=$value['mysteryShopper_assignment_id']?>
                                             
                                            <a href="<?php echo site_url('Assignment/update_assignment/'.$id) ?>" class="btn btn-default">Update</a>
                                            <a href="<?php echo site_url('Assignment/delete/'.$id) ?>" name="del" class="btn btn-default">Delete</a>
                                            </td>

                                            <?php
                                               }
                                              }
                                             }

                                            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    


