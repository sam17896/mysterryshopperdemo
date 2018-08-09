<section class="content">
    <div class="">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('client/Accounts')?>">Account</a></li>
                <li class="breadcrumb-item active">Shoppers Payable</li>
            </ol>
      <!-- Client DataTables Card -->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Shoppers Payable - Cycle <?php echo $start_date; echo ' -- '; echo $end_date; ?>
        </div>
    </div>
    <div class="card-header">
        <a class="btn btn-success add-client" href="<?php echo site_url('client/Accounts')?>">Shoppers Payable</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('client/ShopperPaid')?>">Shoppers Paid</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Clients')?>">Clients Paid</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Cycle')?>">Client Payable</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Bank')?>">Bank</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Tax')?>">Tax</a>

    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                  <th>Name</th>
                  <th>NIC</th>
                  <th>Card Type</th>
                  <th>Bank Name</th>
                  <th>Total</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($allShoppers as $key => $value)
            {?>
            <tr align="center">
            <!-- <td><img style="width:50px;height:50px;" src="<?php echo $image_path;?>"></td> -->
            <td><?php echo $value['mysteryShopper_name']; ?></td>
            <td><?php echo $value['mysteryShopper_nic']; ?></td>
            <td><?php echo $value['mysteryShopper_card_type']; ?></td>
            <td><?php echo $value['mysteryShopper_bank_name']; ?></td>
            <td><?php echo $value['total']; ?></td>
            <td><?php echo $value['mysteryShopper_address']; ?></td>
            <td><?php echo $value['mysteryShopper_email']; ?></td>
            <td><a href="<?php echo site_url('Account/get_shopper_detail/'.$value['user_id']) ?>">View Details</a></td>
            </tr>
            <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
