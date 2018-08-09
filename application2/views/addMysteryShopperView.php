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
          
        <form class="form-control" action="<?php echo site_url('MysteryShopper/add_mystery_shopper')?>" enctype="multipart/form-data" method="post" >
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4 form-group">
              <label>Name</label>
                <input class="form-control" type="text" name="mystery_shopper_name" value="<?php echo set_value('mystery_shopper_name');?>" aria-describedby="nameHelp" placeholder="Enter Mystery Shopper Name" required>
              </div>
              <div class="col-md-4 form-group">
              <label>Contact Number</label>
                <input class="form-control txtboxToFilter" type="text" placeholder="Enter  Contact Number" value="<?php echo set_value('mystery_shopper_contact_number');?>" name="mystery_shopper_contact_number">
                <span class="numbers"></span>
              </div>
              <div class="col-md-4 form-group">
              <label>Nic Number</label>
                <input class="form-control txtboxToFilter" type="text" placeholder="Enter  Nic Number" value="<?php echo set_value('mystery_shopper_nic_number');?>" name="mystery_shopper_nic_number">
                 <span class="numbersnic"></span>
              </div>

            </div>
          </div>

          <div class="form-group">

            <div class="form-row">
              
                         
              <div class="col-md-4 form-group">
              <label>Address</label>
                <input class="form-control" type="text" placeholder="Enter  Address" name="mystery_shopper_address" value="<?php echo set_value('mystery_shopper_address');?>">
              </div>
              <div class="col-md-4 form-group">
              <label>Bank Name</label>
                <input class="form-control" type="text" placeholder="Enter Bank Name" name="mystery_shopper_bank_name" value="<?php echo set_value('mystery_shopper_bank_name');?>">
              </div> 
              <div class="col-md-4 form-group">
              <label>ATM Card Type</label>
                
                <select class="form-control" style="color:black"   name="mystery_shopper_card_type">
                 <option selected disabled>Select Card Type</option>
                  <option>Debit</option>
                  <option>Credit</option>
                </select>
              </div> 
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-4 form-group">
              <label>Email</label>
                <input class="form-control" type="Email" placeholder="Enter Email  Address" name="mystery_shopper_email" value="<?php echo set_value('mystery_shopper_email');?>">
                <span style="color:red;font-size:20px"><?php echo $this->session->flashdata("error")?></span>
              </div>
            <!--  <div class="col-md-4">
                <label>Profile Video</label>

                 <input class="form-control " type="file" placeholder="Select Profile Image" name="profile_video" accept="image/*" >
               </div>  -->
                <div class="col-md-4 form-group">
              <label>Category</label>
                <select class="form-control" style="color:black"   name="category">
                 <option selected disabled>Select Category</option>
                  <option>Food</option>
                  <option>Sports</option>
                </select>
              </div>
              <div class="col-md-4 form-group">
              <label>Profile Image</label>

                <input class="form-control " type="file" placeholder="Select Profile Image" name="pic" accept="image/*" >
              </div>

              
              
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4 form-group">
              <label>Account Number</label>
                <input class="form-control " type="text" placeholder="Enter Account Number" name="mystery_shopper_account_number" value="<?php echo set_value('mystery_shopper_account_number');?>">
                
              </div> 
               <!-- <div class="col-md-4">
              <label>User Name</label>
                <input class="form-control" type="text" placeholder="Enter Uase Name" name="userName">
              </div> -->
               <div class="col-md-4 form-group">
              <label>Password</label>
                <input class="form-control" type="Password" placeholder="Enter Password" name="userPassword" required >
               <span> Password must have at least 6 characters in length</span>
                <span style="color:red;font-size:20px"><?php echo form_error('userPassword'); ?></span>
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
