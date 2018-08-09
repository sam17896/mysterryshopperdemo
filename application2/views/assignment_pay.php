<section class="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Assignment Payment</a>
        </li>
        <li class="breadcrumb-item active"></li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Confirm Payment</div>
          </div>
        <form class="form-control" action="<?php echo site_url('Account/pay')?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6 form-group">
            <label>Ref Id</label>
                <input class="form-control" type="text" name="ref_id" id="userdate" required />
            </div>
            <input style="display:none" type="text" name="assignment_id" value="<?php echo $assignment_id ?>"/>
           </div>
           </div>
          <input class="btn btn-success btn-block" type="submit" name="submit">
        </form>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

</body>


</html>


