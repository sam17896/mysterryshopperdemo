  <div class="main">

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                 <div class="col-md-offset-1 col-md-12 white-bg">
                    <h1 class="text-center">Review</h1>


                    <form action="<?php echo site_url('MysteryShopperLoggedin/updateAssignmentDeliveryReview/')?>" class="form-center-review" method="POST" enctype="multipart/form-data" id="siteForm">
                                                <input type="hidden" name="review_id" value="<?php echo $this->uri->segment(3) ?>">
                                               
                                                <input type="hidden" name="id" value="<?php echo $selected_assignment['mysteryShopper_assignment_id']; ?>">


                <div class="form-group">
                  <div class="row" >
                <div class="col-md-12">
              <span style="color: red">* </span>Outlet
                <input class="form-control" type="text" name="Outlet" value="<?php echo $selected_assignment['outlet'];?>" aria-describedby="nameHelp"  autocomplete="false"  required>
             
              </div>
              
              <div class="col-md-12">
              <span style="color: red">* </span>Date
                <input class="form-control" placeholder="" type="date" value="<?php echo $selected_assignment['date'];?>"  name="reviewDate"  required>
                
              </div>
              <div class="col-md-12" >
              <span style="color: red">* </span>Time
                <input class="form-control" placeholder="" type="time" id="time" name="reviewTime" value="<?php echo $selected_assignment['time'];?>" required>
                 
              </div>

              </div>
              </div>
                

              

              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Call Center(either online or call center)</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Greeting.</dd></p>
                    <p><dd>ii.  Help in finding the right order. </dd></p>
                    <p><dd>iii. Deals discussed. </dd></p>
                    <p><dd>iv.  Time from Call to Order receipt. </dd></p>
                    <p><dd>v.   Min Time agreed vs order received. </dd></p>
                    <p><dd>vi.  Ask for cash memo not company based. </dd></p>
                    


                    </dl>
                    <textarea onKeyDown="limitText(this.form.call_center,this.form.countdown,5000);"   
onKeyUp="limitText(this.form.call_center,this.form.countdown,5000);" class="form-control"   name="call_center" rows="4"  required><?php echo $selected_assignment['call_center'];?></textarea>
<div class="col-md-4">
<font size="1">(Minimum characters: 200) characters Left</font>
</div><br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdown" size="4" value="0"></font>
</div>
                 <span class="text-danger"><?php echo form_error('call_center'); ?></span>
              </div>
              
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Online(either online or call center)</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Snaps of website.</dd></p>
                    <p><dd>ii.  Snaps of deal or order selected. </dd></p>
                    <p><dd>iii.  Payment via card. </dd></p>
                    <p><dd>iv.  Cash on delivery. </dd></p>
                    
                    <p><dd>v.  Snaps of email confirmations. </dd></p>
                    <p><dd>vi.  Any other details you wanna add. </dd></p>


                    </dl>
                    <textarea onKeyDown="limitText(this.form.online,this.form.countdownfood,5000);"   
onKeyUp="limitText(this.form.online,this.form.countdownfood,5000);"  class="form-control"   name="online" rows="4"  required><?php echo $selected_assignment['online'];?></textarea>
                <div class="col-md-4">
<font size="1">(Minimum characters: 200) characters Left</font>
</div><br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdownfood" size="4" value="0"></font>
</div>
 <span class="text-danger"><?php echo form_error('online'); ?></span>
              </div>
              
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Rider</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Name Tag/Badge.</dd></p>
                    <p><dd>ii.  Intimation via call or sms?. </dd></p>
                    <p><dd>iii.  Repeated calls or sms to receive food (pic of calla and messages attach ). </dd></p>
                    <p><dd>iv.  Rude vs Polite. </dd></p>
                    
                    <p><dd>v. Items missing? </dd></p>
                    <p><dd>vi. Missed items received in how much time. </dd></p>
                    <p><dd>vii. Any feeling of being uncomfortable. </dd></p>


                    </dl>
                    <textarea onKeyDown="limitText(this.form.rider,this.form.countdownComplaints,5000);"   
onKeyUp="limitText(this.form.rider,this.form.countdownComplaints,5000);" class="form-control" type="textarea"  name="rider" rows="4"  required><?php echo $selected_assignment['rider'];?></textarea>
                <div class="col-md-4">
<font size="1">(Minimum characters: 200) characters Left</font>
</div><br>
<div class="col-md-1" style="margin-left: 20px;">
<font size="1"><input readonly type="text" name="countdownComplaints" size="4" value="0"></font>
</div>
 <span class="text-danger"><?php echo form_error('rider'); ?></span>
              </div>
              
              </div>
              </div>
              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Billing</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Only cash(informed while placing the order) or card accepted via GPS
Machine/PayPal(online payment).</dd></p>
                    <p><dd>ii.  Forced Tip?. </dd></p>
                    <p><dd>iii.  Billing mistake (Pic of bill , if mistake old and new both). </dd></p>
                   
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="Billing" rows="4"  required><?php echo $selected_assignment['billing'];?></textarea>
                
              </div>
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Loyalty Program</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Were you offered a loyalty card. </dd></p>
                    <p><dd>ii.  Card in good shape. </dd></p>
                    <p><dd>iii.  Points added in card (sms verification?). </dd></p>
                    
                    <p><dd>iv.  Any other comments you deem fit. </dd></p>


                    </dl>
                    <textarea class="form-control" type="textarea"  name="loyaltyProgram" rows="4"  required><?php echo $selected_assignment['loyalty'];?></textarea>
                
              </div>
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Bribe</dt>

                     

                    <p style="margin-top: 2"><dd>i.  try to convince to pay half amount against good tips.</dd></p>
                    
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="Bribe" rows="4"  required><?php echo set_value('Bribe');?><?php echo $selected_assignment['bribe'];?></textarea>
                
              </div>
              </div>
              </div>
              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Food Packaging(Pic Attach)</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Spilled drinks or food.</dd></p>
                    <p><dd>ii.  Any complimentary items received like disposable knifes, tissue, dips anything
please jolt down. </dd></p>
                    <p><dd>iii.  Marketing flyers etc. received. </dd></p>
                   
                    
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="foodPackaging" rows="4"  required><?php echo $selected_assignment['food_packaging'];?></textarea>
                
              </div>
              <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
                <dt style="margin-top: 3%"><span style="color: red">* </span>Food Picture</dt>
                
                    <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image3'])?>">
                   <?php 
                    if($selected_assignment['image3']=='' || $selected_assignment['image3']==null)
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image3"  required>
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image3"  >
                    <?php } ?>   
                 
                   </div>
             
              <div class="col-md-12" >
              <dl>
                    <dt style="margin-top: 3%"><span style="color: red">* </span>Food Itself(Pic Attach)</dt>

                     

                    <p style="margin-top: 2"><dd>i.  Fresh vs Stale.</dd></p>
                    <p><dd>ii.  Taste. </dd></p>
                    <p><dd>iii.  Hot or Not. </dd></p>
                    <p><dd>iv.  Burned. </dd></p>
                    
                    <p><dd>v.  Any other comments. </dd></p>
                   
                    


                    </dl>
                    <textarea class="form-control" type="textarea"  name="foodItself" rows="4"  required><?php echo $selected_assignment['food_itself'];?></textarea>
              </div>
              <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                <dt style="margin-top: 3%"><span style="color: red">* </span>Food itSelf Picture</dt>
                  
                    <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image2'])?>">
                   <?php 
                    if($selected_assignment['image2']=='' || $selected_assignment['image2']==null)
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image2"  required>
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image2"  >
                    <?php } ?>  
                 
                   </div>
              </div>
              </div>
              <div class="form-group">
                  <div class="row" >
              <div class="col-md-12" >
               <span style="color: red">* </span>Any extra details you might want to add
                    <textarea class="form-control" type="textarea"  name="extraDetails" rows="4"  ><?php echo $selected_assignment['extra'];?></textarea>
                
              </div>
             
             
              </div>
              </div>
              <div class="form-group">
              <div class="row" >
		<div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                    <dt style="margin-top: 3%"><span style="color: red;inline:block;">* </span>Bill Picture</dt>
                  <img id="blah" style="width:150px;height:200px;" alt="Image" src="<?php echo base_url("uploads/".$selected_assignment['image1'])?>">
                   <?php 
                    if($selected_assignment['image1']=='' || $selected_assignment['image1']==null)
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image1"  required>
                    <?php 
                    } 
                    else
                    {

                    ?>
                   <input class="form-control" type="file" value=""  name="image1"  >
                    <?php } ?>  
                 
                   </div>
                 
                   </div>
                    </div>
                    <div class="row" >
    		<div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                   <label>Extra</label>
                   <input class="form-control" type="file"  name="image4"  >
                 
                   </div>
                   </div>
                   <div class="row" >
                   <div class="col-md-4" style="margin-top: 1%;height:0% !important" >
               
                    <label>Extra</label>
                   <input class="form-control" type="file"  name="image5"  >
                 
                   </div>               
                   
</div>
              
              </div>
              
             
             


                    <div class="col-md-12" style="margin-top: 5%">
                    <input id="register" class="btn btn-green btn-block" type="submit" name="submit" value="SUBMIT REVIEW">
                    </div>
                    </form>

                </div>
            </div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

  <script language="javascript" type="text/javascript">
   var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});
timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
  
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
  
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value =  limitField.value.length;
  }
}  
</script>
        