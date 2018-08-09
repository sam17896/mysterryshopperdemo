<?php


$this->load->model('Client_model');
$this->load->model('mysteryshopper_client_branch_model');
$data=$this->Client_model->search_by_user_id($userid['id']);
 

 $client_data=$this->Client_model->get_branches_by_id($userid['id']);
 
//print_r($client_data);
?>

<section class="container "> 
  <div class="col-md-12"> 
   <h1 class="center">Add new assignment</h1>
   <p class="center inline"> Minimum Asssingments Agreed
     <b  > <?php echo $data[0]['Minimum_assignments'] ?> <b>  </p>
  <form class="form-control" action="<?php echo site_url('assign/insert')?>" enctype="multipart/form-data" method="post">
 
  <div class="col-md-6">
          <div class="form-group">
          <div class="form-row">
         
              <label>Next Month Assignments</label>
                <input class="form-control" type="text" name="assignments_number"  ; >
                
            </div>
            </div>
            </div>
            <!-- <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
            <?php
            foreach($client_data as $row)
            {
              ?>
                  
              <label>Number of assignments for <?php echo $row['City'] ?></label>
                <input class="form-control" type="text" name="city_assingments[]"  ; >
              
              <?php 
            }
            ?>
            </div>
            </div>
            </div>
   <?php

               foreach($client_data as $row)
            {
              ?>
                     <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
              <label>Budget for <?php echo $row['City'] ?></label>
                <input class="form-control" type="text" name="city_budget[]"  ; >
                
            </div>
              <?php 
            }
            ?>
</div>
<div class="form-group">
            <div class="form-row">
          <div class="col-md-12">
          <label>Special Note </label>
          <input class="form-control" type="text" name="note"  ; >

          </div></div></div>

   <div class="form-group">
            <div class="form-row">
          <div class="col-md-12">
          
          <input class="form-control" class="Primary-btn" type="submit" name="submit" value="Submit"  ; >

          </div></div>
        
        </div>
        </div>       

<br><br><br><br><br><br><br><br><br>
</sectoion>