<section class="content">
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Data Entry</a>
        </li>
        <li class="breadcrumb-item active"> Client</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Add New Store</div>
          </div>
        <form class="form-control" action="<?php echo site_url('Client/insert_more_store')?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <div class="form-row1">
          <div class="col-md-6">
            <img id="blah" src="#">
                <input name="user_id" type="hidden" value="<?php echo $selected_user->user_id;?>">
            </div>
          </div>
            </div>





            </div>
          </div>
  <div class="form-group">
  <div class="form-row1">
  <div class="col-md-6">
  <label for="City"> City</label>
<?php    $this->load->view("citydropdown");  ?>
  </div>
  </div>
   <div class="col-md-6">
              <label>Address</label>
                <input class="form-control" type="text" placeholder="Enter Address" name="address">
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

