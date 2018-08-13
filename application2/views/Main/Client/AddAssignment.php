<?php


$this->load->model('Client_model');
$this->load->model('mysteryshopper_client_branch_model');
$data=$this->Client_model->search_by_user_id($userid['id']);

 $client_data=$this->Client_model->get_branches_by_id($userid['id']);
 if(sizeof($client_data)==0)
  { ?>

    <div class="container">
    <div class="col-md-12 " style="min-height:400px;margin-top:250px">
      <h1 class="center">Add New Assingments </h1>

       <h3>No branch found. Please contact admin in order to add assignment.</h3>
      </div>
      </div>
     <?php
     goto endFile;
  }

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
   <div id="accordio">
    <?php

   echo'<input type="text" class="form-control hidden" name="user_id" value=' .$userid['id'] .' id="city">';

 $current_city=$client_data[0]['City'];
 echo "<div class=\"accordion\"> " .$client_data[0]['City']. "</div> <div class=\"panel\">";
 echo' <div class="form-group">
 <div class="col-md-6">
 <label for="branch">number of assignments for  '. $client_data[0]['City'].'</label>
 <input type="text" class="form-control assignment_numbers" name="city_assignments[]" id="'. $client_data[0]['City'].'_number">
</div>
</div>
<div class="form-group">
<div class="col-md-6">
<label for="branch">Budget of each assignment for  '. $client_data[0]['City'].'</label>
<input type="text" class="form-control budget" name="budgets[]" id="'.  str_replace(' ', '_',$client_data[0]['City']).'">

</div>
</div>

';
 echo "<br>";
  for($i=0;$i<sizeof($client_data);$i++)
  {
   if($client_data[$i]['City']==$current_city)
   {
    $row=$client_data[$i];


   echo' <div class="form-group col-md-6">
    <label for="branch">Branch Address :'. $row['Address'].'</label>
    <input type="text" class="form-control col-md-6 '. str_replace(' ', '_',$client_data[$i]['City']).'_number " name="branch_assignments[]" id="text" >

  </div> ';




  echo' <div class="form-group col-md-6">
  <label for="branch"> Budget of each assignment for :'. $row['Address'].'</label>

  <input type="text" class="form-control '. str_replace(' ', '_',$client_data[$i]['City']).'" name="city_budgets[]"  >

</div> ';

   }
   else{
    $current_city=$client_data[$i]['City'];
    echo "</div>";
    echo "<div class=\"accordion\"> " .$client_data[$i]['City']. "</div> <div class=\"panel\">";
    echo "<br>";
    echo' <div class="form-group">
    <div class="col-md-6">
    <label for="branch">number of assignments for  '. $client_data[$i]['City'].'</label>
    <input type="text" class="form-control assignment_numbers" name="city_assignments[]" id="'. str_replace(' ', '_',$client_data[$i]['City']).'_nums">
   </div>
   </div>
   <div class="form-group">
   <div class="col-md-6">
   <label for="branch">Budget of  each assignment for  '. $client_data[$i]['City'].'</label>
   <input type="text" class="form-control budget"  name="budgets[]" id="'. str_replace(' ', '_',$client_data[$i]['City']).'">
   </div>
   </div>

   ';

     $row=$client_data[$i];
     echo' <div class="form-group col-md-6">
     <label for="branch">Branch Address :'. $row['Address'].'</label>
     <input type="text" class="form-control '. str_replace(' ', '_',$client_data[$i]['City']).'_nums" name="branch_assignments[]" id="text" >

   </div> ';

   echo' <div class="form-group col-md-6">
   <label for="branch">Budget of each assignment for :'. $row['Address'].'</label>

    <input type="text" class="form-control   '. str_replace(' ', '_',$client_data[$i]['City']).'" name="city_budgets[]"  >
 </div> ';

   }
    echo "<br>";
  }
    ?>
</div>
    </div>  <!-- Accordian end here -->

   <input type="submit"  class=" col-md-12 primary-btn"  value="Submit"></input>

  </form>
  </div><!-- col 12 end here -->
  </div><!-- container end here -->



  <br><br><br>



 <?php

 endFile:
 ?>
<script>

 jQuery( ".budget" ).change(function() {

   value=jQuery(this).val();

   jQuery("."+jQuery(this).attr("id")).val(value);
});




 jQuery( ".assignment_numbers" ).change(function() {

value=jQuery(this).val();
child=jQuery("."+jQuery(this).attr("id"));


remainings=child.length;
if(value%remainings==0)
  {
    child.val(value/remainings)
  }
  else{
      for(i=0;i<child.length;i++)
      {

          if(value%remainings==0)
          {
              for(j=i;j<child.length;j++)
              {
                child.eq(i).val(value/remainings);
              }
              i=j;
          }
          else{
            temp=Math.ceil(value/remainings);
            child.eq(i).val(temp);
            value=value-temp;
            remainings--;
          }

      }
}
//jQuery("."+jQuery(this).attr("id")).val(value);
});


 var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {

        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display == "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}


// slide
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}

  </script>




<style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
    margin-bottom:10px;
    margin-top:10px
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
    background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
    overflow: hidden;
}

 .panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
.accordion:after {
    content: '\2214'; /* Unicode character for "plus" sign (+) */
    font-size: 17px;
    color: #777;
    float: right;
    margin-left: 5px;
}


</style>