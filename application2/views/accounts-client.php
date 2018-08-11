<section class="content">
    <div class="">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('client/Accounts')?>">Account</a></li>
                <li class="breadcrumb-item">Clients - Paid</li>
            </ol>
      <!-- Client DataTables Card -->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Client Paid
        </div>
    </div>
    <div class="card-header">
        <a class="btn btn-success add-client" href="<?php echo site_url('client/Accounts')?>">Shoppers Payable</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('client/ShopperPaid')?>">Shoppers Paid</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Clients')?>">Total Received from Clients</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Cycle')?>">Clients Receivable</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Bank')?>">Bank</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Tax')?>">Tax</a>

    </div>


    <div class="table-responsive">
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                  <th>Company Logo</th>
                  <th>Company Name</th>
                  <th>Address</th>
                  <th>Owner Name</th>
                  <th>Category</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php
    foreach ($allclients as $key => $value)
        {
            $base_path = base_url("uploads/");
            $image_name = $value['mysteryShopper_client_image'];
            if($image_name == '' || $image_name == null)
            {
              $image_name='no_image.jpeg';
            }
            $image_path = $base_path.$image_name;
?>
            <tr align="center">
            <td><img style="width:50px;height:50px;" src="<?php echo $image_path;?>"></td>
            <td><?php echo $value['mysteryShopper_client_name']; ?></td>
            <td><?php echo $value['mysteryShopper_client_address']; ?></td>
            <td><?php echo $value['mysteryShopper_client_owner_name']; ?></td>
            <td><?php echo $value['mysteryShopper_client_category']; ?></td>
            <td><?php echo $value['total']; ?></td>
            <td>
            <?php
                $user_id=$value['user_id'];
                $client_id=$value['mysteryShopper_client_id'];
            ?>
                <a href="<?php echo site_url('Account/client_detail/'.$user_id) ?>" class="btn btn-default">View Details</a>
            </td>
        <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->



