             <div class="main">

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                 <div class="col-md-offset-1 col-md-12 white-bg">
                    <h1 class="text-center">Review</h1>


                    <form action="<?php echo site_url('MysteryShopperLoggedin/updateAssignmentReview/')?>" class="form-center-review" method="POST" enctype="multipart/form-data" id="siteForm">
                                                <input type="hidden" name="review_id" value="<?php echo $this->uri->segment(3) ?>">
                                                <input type="hidden" name="id" value="<?php echo $selected_assignment['mysteryShopper_assignment_id']; ?>">
                


                <div class="form-group">
                  <div class="row" >

                <div class="col-md-12">
              
               <dt ><span style="color: red">* </span>Outlet</dt>
                <input class="form-control"  type="text" name="Outlet" aria-describedby="nameHelp"  value="<?php echo $selected_assignment['outlet'];?>" autocomplete="false" readonly required>
             
              </div>
              
              <div class="col-md-12">
              
              <dt ><span style="color: red">* </span>Date</dt>
                <input class="form-control" placeholder="" type="date"  name="reviewDate" value="<?php echo $selected_assignment['date'];?>" required>
                
              </div>
              <div class="col-md-12" >
             
              <dt ><span style="color: red">* </span>Time</dt>
                <input class="form-control" placeholder="" type="time" value="<?php echo $selected_assignment['time'];?>"  id="mystery_shopper_nic_number" name="reviewTime"  required>
                 
              </div>

              </div>
              </div>
                <div class="form-group">
                 <div class="row" >
                    <div class="col-md-12" >
             
              <dt ><span style="color: red">* </span>Number of Customers in store</dt>
                <input class="form-control txtboxToFilter" type="text"  name="noCustomer" value="<?php echo $selected_assignment['no_customer'];?>" required>
              </div>
              <div class="col-md-12" >
             
		<dt ><span style="color: red">* </span>Number of Staff (visible) in store</dt>
                <input class="form-control txtboxToFilter" type="text"  name="noStaff" value="<?php echo $selected_assignment['no_staff'];?>" required>
              </div> 
              <div class="col-md-12" >
              <label>Server/Care Taker Name (optional field)</label>
              
                <input class="form-control" type="text"  name="serverName" value="<?php echo $selected_assignment['server_name'];?>" >
              </div> 

              </div>
              </div>

              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
              <label>Manager on Duty (optional field)</label>
                <input class="form-control" type="text"  name="managerDuty" value="<?php echo $selected_assignment['manager_on_duty'];?>" required>
                 
              </div>
              <div class="col-md-12" >
                
		<dt ><span style="color: red">* </span>Parking area (Clean/Tidy/Bins or vise versa)</dt>
                 <input class="form-control" type="text"  name="parkingArea"  value="<?php echo $selected_assignment['parking_area'];?>" required>
               </div> 
              <div class="col-md-12" >
              
<dt ><span style="color: red">* </span>Observations on Ambiance right before stepping in outlet (Clean or Not, Smelly or not,
Lit or Dim)</dt>
                <input class="form-control " type="text"  name="outsideAmbiacne"  value="<?php echo $selected_assignment['outside_ambiance'];?>" required>
              </div> 

               </div>
              </div>

              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
              
              <dt ><span style="color: red">* </span>Greeter/Receiver/GRO(smile vs rude)</dt>
                <input class="form-control" type="text"  name="greeter" value="<?php echo $selected_assignment['greeter'];?>" required>
              </div> 
              <div class="col-md-12" >
           
              <dt ><span style="color: red">* </span>Any complimentary drinks served while waiting.</dt>
               <input class="form-control" type="text"  name="complimentarydrink" value="<?php echo $selected_assignment['complimentary_drink'];?>" required>
              </div>
              <div class="col-md-12" >
            
               <dt ><span style="color: red">* </span>Table Allotment/Seat (Actual vs Committed, Prior reserved or not)</dt>
                <input class="form-control" type="text"  name="tableAllotmet" value="<?php echo $selected_assignment['table_allotment'];?>" required>
             
              </div>

              </div>
              </div>
               <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
              
 <dt ><span style="color: red">* </span>Feel of the place (dull/lit, Smelly vs Fragrant, Attractive vs Not so much- artworks look
and feel of the place.</dt>
              <input class="form-control" type="text"  name="feel_of_place" value="<?php echo $selected_assignment['feel_of_place'];?>" required>
                
              </div>
              <div class="col-md-12" >
              
               <dt ><span style="color: red">* </span>Menu presentation (Clean ? Readable?)</dt>
              <input class="form-control" type="text"  name="menuPresentation" value="<?php echo $selected_assignment['menu_presentation'];?>" required>
                
              </div>
              <div class="col-md-12" >
               
               <dt ><span style="color: red">* </span>Kiosk/Screen (Clean ? Readable?)</dt>
              <input class="form-control" type="text"  name="screen" value="<?php echo $selected_assignment['screen'];?>" required>
                
              </div>
              </div>
              </div>
              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
            
                <dt ><span style="color: red">* </span>Self Ordering (in any in operation)</dt>
              <input class="form-control" type="text"  name="selfOrder" value="<?php echo $selected_assignment['self_ordering'];?>" required>
                
              </div>
              <div class="col-md-12" >
            
               <dt ><span style="color: red">* </span>Washroom (Clean vs dirty, smelly or not)</dt>
              <input class="form-control" type="text"  name="Washroom" value="<?php echo $selected_assignment['washroom'];?>" required>
                
              </div>
              
                
            
              </div>
              </div>

              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Service</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Did order taker introduced themselves, was s/he calm or in hurry.</dd></p>
                    <p><dd>ii.  Any recommendations or just jolting down the order. </dd></p>
                    <p><dd>iii.  Any upselling towards Appetizer/,Mocktails/Deserts. </dd></p>
                    <p><dd>iv.  Order repeated. </dd></p>
                    <p><dd>v.  Order Time (committed vs actual). </dd></p>
                    <p><dd>vi.  Was the table ready with setup (knife, fork etc.). </dd></p>
                    <p><dd>vii.  Any other comments you deem fit. </dd></p>


                    </dl>
                    <textarea onKeyDown="limitText(this.form.service,this.form.countdown,5000);"   
onKeyUp="limitText(this.form.service,this.form.countdown,5000);" class="form-control" data-limitService="3000" id="service" name="service" rows="4" value="<?php echo set_value('service');?>" required><?php echo $selected_assignment['service'];?></textarea>
<div class="col-md-4">
<font size="1">(Minimum characters: 200,Max: 300) characters Left</font>
</div><br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdown" size="3" value="0" id="serviceCount"></font>
</div>
                 <span class="text-danger"><?php echo form_error('service'); ?></span>
              </div>
              
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Food</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Food and Drinks (arrival time vs ordered time )(were they served togather).</dd></p>
                    <p><dd>ii.  Taste ( brief about it). </dd></p>
                    <p><dd>iii.  Fresh or Not. </dd></p>
                    <p><dd>iv.  If everything was fine do call the manager get his/her name and
appreciate. </dd></p>
                    
                    <p><dd>v.  Any other comments you deem fit. </dd></p>


                    </dl>
                    <textarea onKeyDown="limitText(this.form.food,this.form.countdownfood,5000);"   
onKeyUp="limitText(this.form.food,this.form.countdownfood,5000);"  class="form-control"   name="food" id="food" rows="4" value="<?php echo set_value('food');?>" required><?php echo $selected_assignment['food'];?></textarea>
                <div class="col-md-4">
<font size="1">(Minimum characters: 200,Max: 300) characters Left</font>
</div><br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdownfood" size="3" value="0" id="foodCount"></font>
</div>
 <span class="text-danger"><?php echo form_error('food'); ?></span>
              </div>
              <div class="col-md-4" style="margin-top: 1%" >
               
                <dt style="margin-top: 3%"><span style="color: red">* </span>Food Picture</dt>
                  <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image3'])?>">
                   <?php 
                    if($selected_assignment['image3']=='' || $selected_assignment['image3']==null)
                    {

                    ?>
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)" value=""  name="image3"  required style="height:0% !important">
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)" value=""  name="image3"  style="height:0% !important">
                    <?php } ?>   
                 
                   </div>
              <div class="col-md-12" >
              
               <dl>
               
  <h2 style="    font-size: 16px !important;">Complaints</h2>
  
  <input type="radio" id="yes" name="group1" style="width:5% !important;display: inline-block;" required><span style="display:inline-block;font-size:20px;" ><b>YES</b></span>
  <input type="radio" id="no" name="group1" style="width:5% !important;display: inline-block;"><span style="display:inline-block;font-size:20px;"><b>No</b></span>
  <div class="panel-group">
    <div class="panel panel-default" >
      <!--<div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="\\#collapse1">If any, CLICK ME.!</a>
        </h4>
        
      </div>-->
      <div id="collapse1" class="panel-collapse collapse" style="display:none">
        
        
                    <p style="margin-top: 2"><dd>i.  Were there any complains in food or service (picture).</dd></p>
                    <p><dd>ii.  How was it handled (professionally- introduced him/her senior? Were they
apologetic? </dd></p>
                    <p><dd>iii.  Was the item replaced. </dd></p>
                    <p><dd>iv.  Any extra items served complimentary. </dd></p>
                    
                    <p><dd>v. Was the complained item charged or new one. </dd></p>
                    <p><dd>vi. Any other comments you deem fit. </dd></p>
                    <textarea onKeyDown="limitText(this.form.Complaints,this.form.countdownComplaints,5000);"   
onKeyUp="limitText(this.form.Complaints,this.form.countdownComplaints,5000);"   
 class="form-control" type="textarea" id="complain-text"  name="Complaints" rows="4"  autocomplete='street-address'><?php echo $selected_assignment['complaints'];?></textarea>
        <font size="1">(Minimum characters: 200) characters Left</font>
 <br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdownComplaints" size="4" value="0" id="complaintsCount"></font>
      </div>
              
              </div>
              </div>
              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Billing</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Time taken to bring the bill.</dd></p>
                    <p><dd>ii.  Discount if any applied. </dd></p>
                    <p><dd>iii.  Written feedback (on paper or tablet etc.), get the name of order taker
and manager. </dd></p>
                    <p><dd>iv.  Any other comments you deem fit. </dd></p>
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="Billing" rows="4" value="<?php echo set_value('Billing');?>" required><?php echo $selected_assignment['billing'];?></textarea>
                
              </div>
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Loyalty Program</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Were you offered a loyalty card. </dd></p>
                    <p><dd>iii.  Card in good shape. </dd></p>
                    <p><dd>iv.  Points added in card (sms verification?). </dd></p>
                    
                    <p><dd>v.  Any other comments you deem fit. </dd></p>


                    </dl>
                    <textarea class="form-control" type="textarea"  name="loyaltyProgram" rows="4" value="<?php echo set_value('loyaltyProgram');?>" required><?php echo $selected_assignment['loyalty_program'];?></textarea>
                
              </div>
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Bribe</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Ask for Extra discount and you’ll tip well..</dd></p>
                    <p><dd>ii.  Chuck of few items from the bill and you’ll leave a good tip. </dd></p>
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="Bribe" rows="4" value="<?php echo set_value('Bribe');?>" required><?php echo $selected_assignment['bribe'];?></textarea>
                
              </div>
              </div>
              </div>
              <div class="form-group">
               <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>TakeAway</dt>

                      <p style="margin-top: 2"><dd>i.  Get few main course parceled, after getting into car check if you received whatyou parceled..</dd></p>

                    </dl>
                 <textarea class="form-control" type="textarea"  name="TakeAway" rows="4" value="<?php echo set_value('TakeAway');?>" required><?php echo $selected_assignment['takeaway'];?></textarea>
                
                <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                    <dt style="margin-top: 3%">Take Away Picture</dt>
                   <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image2'])?>">
                   <?php 
                    if($selected_assignment['image2']=='' || $selected_assignment['image2']==null)
                    {

                    ?>
                   <input class="form-control" type="file" value="" onchange="fileChanged(event)" onclick="fileClicked(event)"  name="image2"  required style="height:0% !important">
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image2" onchange="fileChanged(event)" onclick="fileClicked(event)"  style="height:0% !important">
                    <?php } ?>  
                 
                   </div>
                 
                   </div>
              </div>
              
               <div class="row" >
              
              <div class="col-md-12" style="margin-top: 1%" >
               
               <dt style="margin-top: 3%"><span style="color: red">* </span>Smiles while leaving?</dt>
              <input class="form-control" type="text"  name="smileWhileLeaving" value="<?php echo $selected_assignment['smiles_while_leaving'];?>" required>
                
              </div>
              </div>
               <div class="row" >
              <div class="col-md-12" >
              <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Valet in operations?</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Any efforts to call the valet?.</dd></p>
                    <p><dd>ii.  How much time valet took to bring the car?. </dd></p>
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="valetOperation" rows="4" value="<?php echo set_value('valetOperation');?>" required><?php echo $selected_assignment['valet_operation'];?></textarea>
              </div>
              </div>
              </div>
              </div>
              <div class="form-group">
              <div class="row" >
              <div class="col-md-12" >
              
                <dt style="margin-top: 3%"><span style="color: red">* </span>Any extra details you might want to add</dt>
                    <textarea class="form-control" type="textarea"  name="extraDetails" rows="4" value="<?php echo set_value('extraDetails');?>" ><?php echo $selected_assignment['extra_detail'];?></textarea>
                
              </div>
             
             
              </div>
              </div>
              <div class="form-group">
              <div class="row" >
              <div class="col-md-12" style="margin-top: 1%" >
               <dl>
                    <dt style="margin-top: 5%">Upload Images</dt>
                  

                     </dl>
                   </div>
                   <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
                
                    <dt style="margin-top: 3%"><span style="color: red;inline:block;">* </span>Bill Picture</dt>
                    <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image1'])?>">
                    <?php 
                    if($selected_assignment['image1']=='' || $selected_assignment['image1']==null)
                    {

                    ?>
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)" value=""  name="image1"  required style="height:0% !important">
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)" value=""  name="image1" style="height:0% !important" >
                    <?php } ?>
                   </div>
              </div>
              </div>
               <div class="form-group">
                <div class="row" >
                   <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                   <label>Extra</label>
                   <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image4'])?>">
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)"  name="image4"  value="" style="height:0% !important">
                 
                   </div>
                   </div>
                   
                   <div class="row" >
                   <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                    <label>Extra</label>
                    <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image5'])?>">
                   <input class="form-control" type="file" onchange="fileChanged(event)" onclick="fileClicked(event)" name="image5"  style="height:0% !important">
                 </div>
                 </div>
                   
</div>
             </div>
             
             
             


                    <div class="col-md-12" style="margin-top: 5%">
                   <center> <input id="register" class="btn btn-green btn-block" type="submit" name="submit" value="SUBMIT REVIEW"></center>
                    </div>
                    </form>

                </div>
            </div>
</div>
</div>
</div>


  <script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value =  limitField.value.length;
  }
}  

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
    
    $(document).ready(function () {
     
     	var ServiceTxtVal = $('#service').val();
 	 var serviceWords = ServiceTxtVal.length;
  	$('#serviceCount').val(serviceWords);
  	 var foodTxtVal = $('#food').val();
	  var foodWords = foodTxtVal.length;
	   $('#foodCount').val(foodWords);
	   var complaintstxt = $('#complain-text').val();
 var complaintsWords = complaintstxt.length;
  $('#complaintsCount').val(complaintsWords);
     
     $(".submitBtn").click(function() {
  	 var ServiceTxtVal = $('#service').val();
 	 var serviceWords = ServiceTxtVal.length;
  	$('#serviceCount').val(serviceWords);
  
  
  
	  var foodTxtVal = $('#food').val();
	  var foodWords = foodTxtVal.length;
	   $('#foodCount').val(foodWords);
  

	  if(Number(foodWords) < Number(200)){
	  $('#myModal').modal('show');
         	$('#messageBox').text("In Food character length is less than 200 ");
	 
	 
	 	 return false
	  
	  }
	  
	  if(Number(serviceWords) < Number(200)){
	  $('#myModal').modal('show');
         	$('#messageBox').text("In Service character length is less than 200 ");
	       
	 	return false
	  
	  }
   });
     
     
     
     
    
$( "#yes" ).click(function() {
   
   $('#collapse1').css('display','block');
   $("#complain-text").prop('required',true);
     
});

$( "#no" ).click(function() {
   
   $('#collapse1').hide();
   $("#complain-text").prop('required',false);
     
});


});

var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
    
</script>
        
