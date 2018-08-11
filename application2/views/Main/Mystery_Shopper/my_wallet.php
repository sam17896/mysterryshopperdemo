<div class="full-width generic-section">
    <div class="container chosen-top">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 white-bg">
              <div class="table-responsive">
                <h1 class="text-center">Assignments</h1>
                <table id="data-table" class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Total Approved</th>
                        <th>Total Pending</th>
                        <th>Total Rejected</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr align="center">
                        <td><?php echo $accept[0]['total']; ?></td>
                        <td><?php echo $pending[0]['total']; ?></td>
                        <td><?php echo $reject[0]['total']; ?></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-offset-1 col-md-10 white-bg">
              <div class="table-responsive">
                <h1 class="text-center">Earnings</h1>
                <table id="data-table" class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Total Earning</th>
                        <th>Earning Receivable</th>
                        <th>Earning Lost</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td><a style="color:blue;" href="<?php echo site_url('MysteryShopperLoggedin/mystery_shopper_assignment_detail/'.$user_id) ?>"><?php echo $amount[0]['total_amount']; ?></a></td>
                        <td><?php echo $payable_amount[0]['total_amount']; ?></td>
                        <td><?php echo $reject_amount[0]['total_amount'];?></td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    </div>