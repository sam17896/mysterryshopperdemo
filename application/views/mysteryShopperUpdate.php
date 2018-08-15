<section class="content"> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Mystery Shopper Data</a>
        </li>
        <li class="breadcrumb-item active">Add Mystery Shopper</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Add Mystery Shopper</div>
          </div>
          
        <form class="form-control" action="<?php echo site_url('MysteryShopper/mysteryShopperUpdate/'.$allMysteryShopper->mysteryShopper_id)?>" enctype="multipart/form-data" method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
               <img id="blah" style="width:150px; height: 200px;" src="<?php echo base_url("uploads/".$allMysteryShopper->mysteryShopper_profile_image)?>">
               
            </div>
            </div>
          </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
              <label>Profile Image</label>
             
               <input class="form-control " type="file" placeholder="Select Profile Image" onchange="readURL(this);"  name="pic" accept="image/*" >
             </div>
            </div>
          </div>


          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">


              <label>Name</label>
                <input class="form-control" type="text" name="mystery_shopper_name" value="<?php echo $allMysteryShopper->mysteryShopper_name?>" aria-describedby="nameHelp" placeholder="Enter Mystery Shopper Name" required>
              </div>
              <div class="col-md-4">
              <label>Contact Number</label>
                <input class="form-control" type="text" placeholder="Enter  Contact Number" value="<?php echo $allMysteryShopper->mysteryShopper_contact_number?>" name="mystery_shopper_contact_number">
              </div>
              <div class="col-md-4">
              <label>Nic Number</label>
                <input class="form-control" type="text" placeholder="Enter  Nic Number" value="<?php echo $allMysteryShopper->mysteryShopper_nic?>" name="mystery_shopper_nic_number">
              </div>

            </div>
          </div>

          <div class="form-group">

            <div class="form-row">
              
                         
              <div class="col-md-4">
              <label>Address</label>
                <input class="form-control" type="text" placeholder="Enter  Address" value="<?php echo $allMysteryShopper->mysteryShopper_address?>" name="mystery_shopper_address">
              </div>
              <div class="col-md-4">
              <label>Bank Name</label>
                <input class="form-control" type="text" placeholder="Enter Bank Name" value="<?php echo $allMysteryShopper->mysteryShopper_bank_name?>" name="mystery_shopper_bank_name">
              </div> 
              <div class="col-md-4">
              <label>ATM Card Type</label>
                <input class="form-control" type="text" placeholder="Enter Card Type" value="<?php echo $allMysteryShopper->mysteryShopper_card_type?>" name="mystery_shopper_card_type">
              </div> 
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
              <label>Email</label>
                <input class="form-control" type="text" placeholder="Enter Email  Address" value="<?php echo $allMysteryShopper->mysteryShopper_email?>" name="mystery_shopper_email">
              </div>
              <div class="col-md-4">
                <label>Profile Video</label>

                 <input class="form-control " type="file" placeholder="Select Profile Image" value="<?php echo $allMysteryShopper->mysteryShopper_video?>" name="profile_video" accept="image/*" >
               </div> 
              <div class="col-md-4">
              <label>Account Number</label>
                <input class="form-control" type="text" value="<?php echo $allMysteryShopper->mysteryShopper_account_no?>" placeholder="Enter Account Number" name="mystery_shopper_account_number">
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
  