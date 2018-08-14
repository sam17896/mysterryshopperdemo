<div class="main">

<style>
    .new-tc {
        padding: 0 10px 5px 10px;
        color: gainsboro;
        font-size: 0.8em;
    }
    .new-tc a {
        text-decoration: none;
        color: whitesmoke;
    }
    .new-tc.intro {
        color: whitesmoke;
        font-size: 0.9em;
        margin-top: 5px;
        text-align: center;
    }
    .new-tc.intro span {
        text-transform: uppercase;
    }
</style>
<?php


    foreach ($allclient as $key => $value1)
    {
    if($selected_assignment['mysteryShopper_client_id'] == $value1['mysteryShopper_client_id'])
    {
        $base_path = base_url("uploads/");
        $image_name = $value1['mysteryShopper_client_image'];
        $image_path = $base_path.$image_name;

        $company_name = $value1['mysteryShopper_client_name'];
        $address = $value1['mysteryShopper_client_address'];

    }
    }
    $id = $selected_assignment['assignment_id']

    ?>
    <div class="full-width product-section ">
                <div class="container product-top ">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">

                    <h1 class="text-center"><?php echo $company_name;?> Mystery Shoppers Wanted!</h1>

                    <div id="countdownContainer" class="countdownContainer" data-timezone="Europe/London" data-countdowntarget=""></div>

                    <!--- start -->

                    <div style="position: relative">
                        <img class="center product-image" alt="Costa Mystery Shopper" src="<?php echo $image_path;?>">

                        <div class="product-signup" id="signupForm">


                                <input id="termsCheckbox" type="checkbox" style="display: none;" name="record[tc]" checked>

                                <div id="actualForm" style="display: none">
                                                                            <div class="new-tc intro">
                                            To receive offers and promotions click SIGN UP FOR FREE below
                                        </div>
                                                                        <input type="hidden" name="postback" value="1">
                                    <ul>
                                        <li class="getStarted" id="titleHolder">
                                            <p id="getStartedText">GET STARTED</p>

                                            <p class="userConf" id="userConf1">Thanks!</p>
                                            <select id="title" name="record[title]" >
                                                <option value="" disabled selected>Title</option>
                                                <option
                                                    value="Mr" >
                                                    Mr
                                                </option>
                                                <option
                                                    value="Mrs" >
                                                    Mrs
                                                </option>
                                                <option
                                                    value="Ms" >
                                                    Ms
                                                </option>
                                                <option
                                                    value="Miss" >
                                                    Miss
                                                </option>
                                            </select>
                                        </li>
                                        <li>
                                            <p class="userConf" id="userConf2">Great name!</p>
                                            <input id="firstName" type="text" name="record[first_name]" placeholder="First Name"
                                                >
                                        </li>
                                        <li>
                                            <p class="userConf" id="userConf3">Nice!</p>
                                            <input id="lastName" type="text" name="record[last_name]" placeholder="Last Name"
                                                >
                                        </li>
                                        <li>
                                            <p class="userConf" id="userConf4">Perfect, lets go!</p>
                                            <input type="text" name="record[email]" id="email" placeholder="Email"
                                                >
                                        </li>
                                        <li class="product-button">
                                            <button class="btn" type="submit" id="signupFormBtn"
                                                style="
                                                    color: ;
                                                    background-color: ;
                                                "
                                            >
                                                <span id="signup-text">
                                                    SIGN UP FOR FREE                                                </span>
                                                <span id="signupDots"></span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>

                                <div id="signupPrompt" style="">
                                             <!-- <div class="new-tc intro">
                                                To receive offers and promotions sign up below
                                            </div> -->
                                                                              <!--  <a href="https://www.facebook.com/v2.2/dialog/oauth?client_id=169022070204886&amp;state=0adecc8086db0c7f8aee81294a44f39d&amp;response_type=code&amp;sdk=php-sdk-5.4.2&amp;redirect_uri=https%3A%2F%2Fukmysteryshopper.co.uk%2Fauth%2Ffacebook_login%2F267&amp;scope=email" id="fblink">
                                            <img class="signupBtn" id="fbbutton" src="<?php echo base_url();?>img/fbsignup.png">
                                        </a> -->
                                        <?php
                                        $budget = $selected_assignment['budget_for_each'];
                                        $branch_id = $selected_assignment['branch_id'];
                                        if($shopperCity->mysteryShopper_account_contact != null && $shopperCity->mysteryShopper_account_contact != ""){
                                        ?>
                                        <a href="<?php echo site_url('MysteryShopperLoggedin/get_assignment/'.$id.'/'.$budget.'/'.$branch_id) ?>">
                                        <div id="emailsignupbtn" class="signupBtn" style="padding: 13.5px;">

                                            GET ASSIGNMENT
                                        </div>
                                        </a>
                                        <?php }
                                              else{
                                         ?>
                                         <div data-toggle="modal" data-target="#myModal" id="emailsignupbtn" class="signupBtn" style="padding: 13.5px;">

                                            GET ASSIGNMENT
                                        </div>

                                          <!-- Modal -->
  					<div class="modal fade" id="myModal" role="dialog">
    						<div class="modal-dialog">

     							 <!-- Modal content-->
     							 <form  method="post" action="<?php echo site_url('MysteryShopperWeb/mysteryShopperContact_NIC_update') ?>">
      							<div class="modal-content">
        							<div class="modal-header" style="background-color:#101010;">
          								<button type="button" class="close" data-dismiss="modal">&times;</button>
          								<h4 class="modal-title" style="color: white;">Enter Details</h4>
        							</div>

        							<div class="modal-body">

        							  <p style="color:black;" >Enter the contact no on which your amount is to be transfered.</p>

          								<h5 style="color:black; margin-top: 0px !important; float:left;">NIC</h5><br>
          								<input style="width:100%" name="mystery_shopper_nic_number" type="text" value="<?php echo $shopperCity->mysteryShopper_nic;?>" placeholder="Enter NIC Number" required>

          								<h5 style="color:black; margin-top: 10px !important; float:left;">Account Contact</h5>
          								<input style="width:100%" name="account_contact"  type="text" placeholder="Enter Account Contact No" required>

          								<input type="hidden" name="assignment_id" value="<?php echo urldecode($this->uri->segment(3)) ?>" >
        							  	<input type="hidden" name="user_id" value="<?php echo $shopperCity->mysteryShopper_id ?>" >

        							</div>
        							<div class="modal-footer" style="background-color:#101010;">
          							<button type="submit" class="btn-secondary" style="    padding-bottom: 2px;padding-top: 2px;">Update</button>

        							</div>

      							</div>
      							</form>

    						</div>
  					</div>
                                         <?php  } ?>
                                                                    </div>

                                                                    <div class="new-tc">
                                        <!--<span>The personal information you provide will help us to deliver, develop and promote our services. Submitting your details indicates that you have read and agree to our
                                            <a href="../p/privacy-policy.html" target="_blank" rel="nooppener">privacy policy</a>
                                            that governs how your information will be processed. Please read this to access your data rights. You also consent to Mystery Shopper, its sponsors and its clients <a target="_blank" href="../sponsors.html" rel="nooppener">listed here</a> sending you information by telephone, email and SMS about products and/or services that may be of interest to you.
                                        </span>-->
                                    </div>



                        </div>
                    </div>



                           <div class="container product-bottom">
            <div class="row">
                <div class=" col-xs-10">

                    <div class="row">
                        <div class="col-md-12">


                     <h3><center>Shopper’s Pack:</center></h3>
                            <p><strong>Name of Client: </strong><?php echo $company_name;?>.</P>
                            <p><strong>Location: </strong><?php echo $selected_assignment['City'].'-'.$selected_assignment['Address'];?>.</p>
                            <p><strong>Month: </strong><?php echo $selected_assignment['month']; ?>.</p>
                            <p><strong>Description: </strong><?php echo $selected_assignment['speical_note'];?>.</p>
                            <p><strong>Dine/Delivery: </strong> <?php echo $selected_assignment['type'];?></p>
                            <p><strong>Budget: </strong> <?php echo $selected_assignment['budget_for_each'];?></p>


                        </div>

                    </div>

                </div>
            </div>

                    <div class="container product-bottom">
            <div class="row">
                <div class=" col-xs-10">

                    <div class="row">
                        <div class="col-md-12">

                            <h3><center>Shopper’s Pack:</center></h3>
        <p><strong>1.</strong> Please conduct the assignment with all honesty and extreme caution as no one should find  out that you are a mystery shopper, in case of any doubt we have the right to Reject the shopping assignment.</P>
      	<p><strong>2.</strong> Once the assignment has been accepted it cannot be dropped back.</p>
	<p><strong>3.</strong> Assignment has to be uploaded within a day from the date of assignment. </p>
	<p><strong>4.</strong> Your portal will update the amount once your shopping assignment has been approved.
	<p><strong>5.</strong> You may use your online wallets to pay or cash out as you wish.
	<p><strong>6.</strong> Payments are made on every 1st and 16th of calendar month after the deduction of bank charges and taxes, if any.
	<p><strong>7.</strong> Your assignments could be accepted us, opened again for editing or rejected, an email will be sent to you on each of the action.
	<p><strong>8.</strong> If the assignment is opened for editing you would be requested to make changes, if changes are not made as requested the assignment would be rejected.
	<p><strong>9.</strong> One the assignment has been accepted it would be available to upload the report/feedback in your “MY ASSIGNMENTS” secTon.</p>

                        </div>

                    </div>

                </div>
            </div>

        </div>
                </div>
            </div>
        </div>



    </div>

    </div>