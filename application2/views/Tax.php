<section class="content">
    <div class="">
        <div class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo site_url('client/Accounts')?>">Account</a></li>
                <li class="breadcrumb-item">Tax</li>
            </ol>
      <!-- Client DataTables Card -->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tax details <?php echo date('m') ?>
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
                  <th>Assignment Id</th>
                  <th>Budget</th>
                  <th>Tax</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
<?php
  if($all_client_assignment != null){
      foreach ($all_client_assignment as $key => $value)


        {
         ?>
            <tr align="center">
            <td><?php echo $value['assignment_id']; ?></td>
            <td><?php echo $value['total_budget']; ?></td>
            <td><?php echo $value['total_payout']-$value['total_budget']; ?></td>
            <td><?php echo $value['total_payout']; ?></td>
        <?php } } else { echo 'No Tax this month'; }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->



