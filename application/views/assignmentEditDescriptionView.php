<section class="content"> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Data Entry</a>
        </li>
        <li class="breadcrumb-item active">Report Instructions To Edit</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Report Instructions To Edit</div>
          </div>
        <form class="form-control" action="<?php echo site_url('Assignment/assignmentEditDescription')?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
          
              <label>What to Edit Type Here...?</label>
                <textarea class="form-control"   name="editReport" ></textarea>     
            </div>
            
            <input type="hidden" name="id" value="<?php echo $selected_assignment->mysteryShopper_assignment_id; ?>" >
          
          </div>
            </div>
          

          


          <input class="btn btn-success btn-block" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
</body>

</html>

