<section class="content"> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Data Entry</a>
        </li>
        <li class="breadcrumb-item active">Update Client</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Update Client</div>
          </div>
        <form class="form-control" action="<?php echo site_url('Client/update')?>" enctype="multipart/form-data" method="post">
          
          <div class="form-group">
            <div class="form-row">
              
              <div class="col-md-6"> 
              <?php
              
              if($selected_client->mysteryShopper_client_image == '' || $selected_client->mysteryShopper_client_image == null)
              {
              $img = base_url("uploads/no_image.jpeg");
              }
              else
              {
              	$img = base_url("uploads/".$selected_client->mysteryShopper_client_image);
              }
              
              
              ?>
              <img id="blah" style="width:150px;height:200px;" src="<?php echo  $img; ?>">
              </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              
              <div class="col-md-6">
              <label>Picture</label>
                <input class="form-control" value="<?php echo $selected_client->mysteryShopper_client_image?>" type="file" name="pic" onchange="readURL(this);" accept="image/*">
              </div>
             </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <input type="hidden" value="<?php echo $selected_client->mysteryShopper_client_id?>" name="id">
              <label>Company Name</label>
                <input class="form-control" type="text" value="<?php echo $selected_client->mysteryShopper_client_name?>" name="name" aria-describedby="nameHelp" placeholder="Enter Compnay Name" required>
              </div>
              <div class="col-md-6">
              <label>Address</label>
                <input class="form-control" value="<?php echo $selected_client->mysteryShopper_client_address?>" type="text" placeholder="Enter Address" name="address">
              </div>

            </div>
          </div>

          <div class="form-group">

            <div class="form-row">
              
              <div class="col-md-6">
              <label>Owner Name</label>
                <input class="form-control" value="<?php echo $selected_client->mysteryShopper_client_owner_name?>" type="text" placeholder="Enter Owner Name" name="owner_name">
              </div>
              <div class="col-md-6">
              <label>Category</label>
                <select class="form-control"  name="category">
                  <option><?php echo $selected_client->mysteryShopper_client_category?></option>
                  <option>Food</option>
                  <option>Sports</option>
                  <option>Banking</option>
                  <option>Entertainment</option>
                  </select>
              </div>
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
<script type="text/javascript">
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

  