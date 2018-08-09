<?php


$this->load->model('Client_model');
$this->load->model('Client_assignment_model');
$data=$this->Client_model->search_by_user_id($userid['id']);

 $client_data=$this->Client_assignment_model->get_branches_by_id($userid['id']);


 $current_city=$client_data[0]['City'];

 echo "<br>";
  for($i=0;$i<sizeof($client_data);$i++)
  {
   if($client_data[$i]['City']==$current_city)
   {
    $row=$client_data[$i];

   }
   else{
    $current_city=$client_data[$i]['City'];

    echo "<br>";
     $row=$client_data[$i];

   }
    echo "<br>";
  }
?>

 <div class="container">
  <div class="col-md-12">
    <h1 class="center">Add New Assingments </h1>
    <?php $Mdate= date('Y-m-d', strtotime('+1 month'));

    $monthNum=substr($Mdate,5,2);
    $year=subStr($Mdate,0,4);
   $dateObj   = DateTime::createFromFormat('!m', $monthNum);
   $monthName = $dateObj->format('F');


    ?>
    <p class="center" >Minimum number of assignments for <?php echo $monthName,$year .' are '. $data[0]['Minimum_assignments'] ?></p>

   <form action="<?php echo site_url('Client/addAssignment')?>" enctype="multipart/form-data" method="post">
   <div id="accordion">
    <?php

   echo'<input type="text" class="form-control hidden" name="user_id" value=' .$userid['id'] .' id="city">';

 $current_city=$client_data[0]['City'];
 echo "<h3> ".$client_data[0]['City']."</h3>";
 echo' <div class="form-group">
 <div class="col-md-6">
 <label for="branch">number of assignments for  '. $client_data[0]['City'].'</label>
 <input type="text" class="form-control" name="city_assignments[]" id="city">
</div>
</div>
<div class="form-group">
<div class="col-md-6">
<label for="branch">Budget of each assignment for  '. $client_data[0]['City'].'</label>
<input type="text" class="form-control budget" name="budgets[]" id="'. $client_data[0]['City'].'">

</div>
</div>

';
 echo "<br>";
  for($i=0;$i<sizeof($client_data);$i++)
  {
   if($client_data[$i]['City']==$current_city)
   {
    $row=$client_data[$i];


   echo' <div class="form-group">
    <label for="branch">Branch Address :'. $row['Address'].'</label>
    <input type="text" class="form-control" name="branch_assignments[]" id="text" >
    <input type="text" class="form-control hidden '.$client_data[$i]['City'].'" name="city_budgets[]"  >

  </div> ';

   }
   else{
    $current_city=$client_data[$i]['City'];
    echo "<h3> ".$client_data[$i]['City']."</h3>";
    echo "<br>";
    echo' <div class="form-group">
    <div class="col-md-6">
    <label for="branch">number of assignments for  '. $client_data[$i]['City'].'</label>
    <input type="text" class="form-control" name="city_assignments[]" id="city">
   </div>
   </div>
   <div class="form-group">
   <div class="col-md-6">
   <label for="branch">Budget of  each assignment for  '. $client_data[$i]['City'].'</label>
   <input type="text" class="form-control budget"  name="budgets[]" id="'.$client_data[$i]['City'].'">
   </div>
   </div>

   ';

     $row=$client_data[$i];
     echo' <div class="form-group">
     <label for="branch">Number of assignment for Branch Address :'. $row['Address'].'</label>
     <input type="text" class="form-control" name="branch_assignments[]" id="text" >
      <input type="text" class="form-control hidden '.$client_data[$i]['City'].'" name="city_budgets[]"  >
   </div> ';

   }
    echo "<br>";
  }
    ?>

    </div>  <!-- Accordian end here -->

   <input type="submit"  class=" col-md-12 primary-btn"  value="Submit"></input>

  </form>
  </div><!-- col 12 end here -->
  </div><!-- container end here -->



  <br><br><br>




<script>

 jQuery( ".budget" ).change(function() {

   value=jQuery(this).val();

   jQuery("."+jQuery(this).attr("id")).val(value);
});

  </script>
