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
            <thead>
            <tbody>
                <tr>
                    <td>Total Recieved from client</td>
                    <td><?php echo $total_client ?></td>
                </tr>

                <tr>
                    <td>Total Paid to the shoppers</td>
                    <td><?php echo $total_shopper ?></td>

                </tr>

                <tr>
                    <td>Net</td>
                    <td><?php echo $total_client - $total_shopper ?></td>
                </tr>

            </tbody>
            </table>
          </div>
        </div>
      </div>
