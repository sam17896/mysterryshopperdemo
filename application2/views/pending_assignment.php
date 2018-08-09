<section class="content">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Entry</li>
  </ol>
  <!-- Client DataTables Card -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i>Pending Assignment Data
    </div>
  </div>
  <div class="card-header">
      <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/add_assignment')?>">Add Assignment</a>
      <a class="btn btn-success add-client" href="<?php echo site_url('Assignment')?>">View New Assignment</a>
      <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/complete_assignment')?>">View Completed Assignment</a>
      <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/reject_assignment')?>">View Reject Assignment</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/accept_assignment')?>">View Accept Assignment</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Assignment/expired_assignment')?>">View Expired Assignment</a>
  </div>
  <div class="table-responsive">
    <table id="data-table" class="table table-bordered">
      <thead>
        <tr>
          <th>Client Name</th>
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
      <?php  $id=$value['assignment_id'];?>
      <a href="<?php echo site_url('Assignment/update_assignment/'.$id) ?>" class="btn btn-default">Update</a>
      <a href="<?php echo site_url('Assignment/delete/'.$id) ?>" name="del" class="btn btn-default">Delete</a>
      </td>
      <?php
}
      ?>
      </tbody>
    </table>
  </div>
</div>
</div>


