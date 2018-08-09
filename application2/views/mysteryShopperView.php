<section class="content">
              
                <div class="">
                    <div class="">
                      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Mystery Shopper Data </li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Mystery Shopper Data
        </div>
      </div>
        <div class="card-header">
          <a class="btn btn-success add-client" href="<?php echo site_url('MysteryShopper/add_mystery_shopper_view')?>">Add Mystery Shopper</a>
        </div> 
                        <!-- <h4 class="card-title">Basic example</h4>
                        <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Card Type</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Email</th> 
                  <th>NIC</th>
                  <th>Contact Number</th>
                  <!--<th>Video</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
                                                foreach ($allMysteryShopper as $key => $value)
                                                {

                                                  $base_path = base_url("uploads/");
                                                  $image_name = $value['mysteryShopper_video'];
                                                  $image_path = $base_path.$image_name;
                                            ?>
                                            <tr align="center">
                                            <td><?php echo $value['mysteryShopper_name']; ?></td>
                                            <td><?php echo $value['mysteryShopper_address']; ?></td>
                                            <td><?php echo $value['mysteryShopper_card_type']; ?></td>
                                            <td><?php echo $value['mysteryShopper_bank_name']; ?></td>
                                            <td><?php echo $value['mysteryShopper_account_no']; ?></td>
                                            <td><?php echo $value['mysteryShopper_email']; ?></td>
                                            <td><?php echo $value['mysteryShopper_nic']; ?></td>
                                            <td><?php echo $value['mysteryShopper_contact_number']; ?></td>
                                             <!-- <td>
                                               
                                               <video width="400" height="200" controls>
                                                <source src="<?php echo $image_path?>" type="video/mp4">
                                                  
                                             </video>
                                             </td> -->
                                            
                                            <td>
                                              <?php  $mysteryShopper_id=$value['mysteryShopper_id'];
                                              	$user_id=$value['user_id'];
                                              ?>
                                             
                                            <a href="<?php echo site_url('MysteryShopper/mysteryShopperUpdateView/'.$mysteryShopper_id) ?>" class="btn btn-default">Update</a>
                                            <a href="<?php echo site_url('MysteryShopper/delete/'.$mysteryShopper_id.'/'.$user_id) ?>" name="del" class="btn btn-default">Delete</a>
                                            </td>
                                            <?php
                                                }

                                            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    


