<section class="content"> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Data Entry</a>
        </li>
        <li class="breadcrumb-item active">Add Client</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Add Client</div>
          </div>
        <form class="form-control" action="<?php echo site_url('Client/insert')?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
            <img id="blah" src="#">
                
            </div>
          </div>
            </div>
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
              <label>Picture</label>
                <input class="form-control" type="file" name="pic" onchange="readURL(this);" accept="image/*">
                
            </div>
          </div>
            </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 form-group">
              <label>Company Name*</label>
                <input class="form-control" type="text" name="name" aria-describedby="nameHelp" placeholder="Enter Compnay Name" required>
              </div>
              <div class="col-md-6 form-group">
              <label>Address*</label>
                <input class="form-control" type="text" placeholder="Enter Address" name="address" required>
              </div>

            </div>
          </div>

          <div class="form-group">

            <div class="form-row">
              
              <div class="col-md-6 form-group">
              <label>Owner Name*</label>
                <input class="form-control" type="text" placeholder="Enter Owner Name" name="owner_name" required>
              </div>
              <div class="col-md-6 form-group">
              <label>Category</label>
                <select class="form-control"  name="category">
                  <option>Food</option>
                  <option>Sports</option>
                  <option>Banking</option>
                  <option>Entertainment</option>
                  </select>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
             <div class="col-md-6 form-group">
              <label>Email*</label>
                <input class="form-control" value="<?php echo set_value('email'); ?>"  placeholder="Enter Email" type="email" name="email" required>
              </div> 
             
              
              

              <div class="col-md-6 form-group">
              <label>Password*</label>
                <input class="form-control" type="password" name="password" required>
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

  