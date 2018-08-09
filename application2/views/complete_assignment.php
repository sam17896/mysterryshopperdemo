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
          <i class="fa fa-table"></i>Complete Assignment Data
        </div>
      </div>
        <div class="card-header">
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/add_assignment')?>">Add Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/pending_assignment')?>">View Pending Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment')?>">View New Assignment</a>
            <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/reject_assignment')?>">View Reject Assignment</a>
             <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/accept_assignment')?>">View Accept Assignment</a>
             <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/expired_assignment')?>">View Expired Assignment</a>
        </div>
                        <!-- <h4 class="card-title">Basic example</h4>
                        <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>

                  <th>Client Name</th>
                  <th>Address</th>
                  <th>Month</th>
                  <th>Status</th>
                  <th>Mystery Shopper Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
        foreach ($alldata as $key => $value)
        { ?>

          <tr align="center">
            <td><?php echo $value['mysteryShopper_client_name']; ?> - <?php echo $value['mysteryShopper_client_owner_name']; ?></td>
            <td><?php echo $value['mysteryShopper_client_address']; ?></td>
            <td><?php echo $value['month']; ?></td>
            <td><?php echo $value['status']; ?></td>
            <?php
           foreach ($allshopper as $key => $value2)
            {
              if($value['shopper_id'] == $value2['user_id']){
            ?>
                <td><?php echo $value2['user_name']; ?> </td>

            <?php }} ?>


              <td>
              <?php  $id=$value['id'];?>
                <a class="btn btn-info add-client" href="<?php echo site_url('Assignment/complete_assignment_delivery_detail/'.$id) ?>" target="blank" class="btn btn-default">Report</a>
                <?php  ?>
                <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/assignmentAccept/'.$id) ?>"  class="btn btn-default">Accept</a>
                <a class="btn btn-danger add-client" href="<?php echo site_url('Assignment/assignmentReject/'.$id) ?>"  class="btn btn-default">Reject</a>
                <a class="btn btn-primary add-client" href="<?php echo site_url('Assignment/assignmentEditDescriptionView/'.$id) ?>"  class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</a>
              </td>
              <?php
        }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->



