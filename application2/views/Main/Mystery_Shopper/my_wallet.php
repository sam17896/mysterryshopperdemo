<style>
#wrap {
   width:600px;
   margin:0 auto;
}
#left_col {
   float:left;
   width:300px;
}
#right_col {
   float:right;
   width:300px;
}
</style>
<div class="full-width generic-section">
    <div class="container chosen-top">
        <div id="wrap">
            <h1 class="text-center">Assignments</h1>
            <div id="left_col">
                <p>Total Approved:</p>
                <p>Total Pending:</p>
                <p>Total Rejected:</p>

            </div>
            <div id="right_col">
                <p><?php echo $accept[0]['total']; ?></p>
                <p><?php echo $pending[0]['total']; ?></p>
                <p><?php echo $reject[0]['total']; ?></p>
            </div>
        </div>
        <br/>
        <div id="wrap">
            <h1 class="text-center">Earnings</h1>
            <div id="left_col">
                <p >Total Earning:</p>
                <p>Earning Receivable:</p>
                <p>Earning Lost:</p>
            </div>
            <div id="right_col">
                <p><a style="color:blue;" href="<?php echo site_url('MysteryShopperLoggedin/mystery_shopper_assignment_detail/'.$user_id) ?>"><?php echo $amount[0]['total_amount']; ?></a></p>
                <p><?php echo $payable_amount[0]['total_amount']; ?></p>
                <p><?php echo $reject_amount[0]['total_amount'];?></p>
            </div>
        </div>

    </div>
</div>
</div>

