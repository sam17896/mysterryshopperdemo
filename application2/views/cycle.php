<section class="content">
    <div class="">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('client/Accounts')?>">Account</a></li>
                <li class="breadcrumb-item active">Ccyle - </li>
            </ol>
      <!-- Client DataTables Card -->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Cycle -
        </div>
    </div>
    <div class="card-header">
        <a class="btn btn-success add-client" href="<?php echo site_url('client/Accounts')?>">Shoppers</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Clients')?>">Clients</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Bank')?>">Bank</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Tax')?>">Tax</a>
        <a class="btn btn-success add-client" href="<?php echo site_url('Account/Cycle')?>">Generate Cycle</a>

    </div>

    <div class="table-responsive">
        <table id="data-table" class="table table-bordered">
            <thead>
                <tr>
                  <th>Special Note</th>
                  <th>Category</th>
                  <th>Budget</th>
                  <th>Payout</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($assignments as $key => $value)
            {?>
            <tr align="center">
            <!-- <td><img style="width:50px;height:50px;" src="<?php echo $image_path;?>"></td> -->
            <td><?php echo $value['speical_note']; ?></td>
            <td><?php echo $value['type']; ?></td>
            <td><?php echo $value['budget']; ?></td>
            <td><?php echo $value['total_payout']; ?></td>
            <td><?php echo $value['status']; ?></td>
            </tr>
            <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
