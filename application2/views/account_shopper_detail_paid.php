<section class="content">
    <div class="">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('client/Accounts')?>">Account</a></li>
                <li class="breadcrumb-item active">Shoppers - Detail</li>
            </ol>
      <!-- Client DataTables Card -->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Shoppers - Detail
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
                  <th>Special Note</th>
                  <th>Category</th>
                  <th>Budget</th>
                  <th>Approved Date</th>
                  <th>Status</th>
                  <th>Ref Id</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($assignments as $key => $value)
            {?>
            <tr align="center">
            <!-- <td><img style="width:50px;height:50px;" src="<?php echo $image_path;?>"></td> -->
                <td><?php echo $value['speical_note']; ?></td>
                <td><?php echo $value['type'] ?></td>
                <td><?php echo $value['budget']; ?></td>
                <td><?php echo $value['date']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['ref_id']; ?></td>
            </tr>
            <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
