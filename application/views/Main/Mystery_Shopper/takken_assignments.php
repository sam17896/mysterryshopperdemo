    <div class="main">

    <style>
        .chosen-review-table {
            display: table;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }
        .chosen-review-table-cell {
            display: table-cell;
            vertical-align: top;
        }
        .chosen-review-table-cell.image-cell {
            width: 120px;
        }
        .chosen-review-table-cell.text-cell {
            padding-left: 15px;
        }
        .margin-left
        {
            margin-left: 100px;
        }

        @media(max-width: 1200px){
            .margin-left
        {
            margin-left: 20px;
        }
    }
        @media(max-width: 997px){
            .margin-left
        {
            margin-left: 0px;
        }
            .chosen-review-table-cell {
                display: block;
            }
            .chosen-review-table-cell.image-cell {
                margin:auto;
                margin-top: 20px;
                width:100%;
            }
            .chosen-review-table-cell.text-cell {
                padding-left: 0;
            }
        }

    </style>

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">

                    <h1 class="text-center">Review Assignments</h1>
                    <p class="text-center">Upload your reviews for your selected assignments!</p>

                    <div class="row chosen-reviews">
                        <div class="col-md-12 chosen-reviews-left">

                            <div class="chosen-countdown" data-active="0" id="countdown-middle"></div>

                         <div class="chosen-grey-box">
                                <h2 class="center">How was your experience</h2>
                                


        <?php                                   $check=0;
                                                foreach ($allAssignment as $key => $value)
                                                {
                                            
                                                    foreach ($allclient as $key => $value1)
                                                    {
                                                        if($value['mysteryShopper_client_id'] == $value1['mysteryShopper_client_id'])
                                                        {
                                                            $base_path = base_url("uploads/");
                                                  $image_name = $value1['mysteryShopper_client_image'];
                                                  $image_path = $base_path.$image_name;
                                                  if($value['mysteryShopper_assignment_toDate'] > date("Y-m-d")){
                                                                ?>
                                                                
                                    <div class="chosen-missed-out margin-left">
                                        <div class="siteImgContainer">
                                            <?php  $id=$value['mysteryShopper_assignment_id'];
                                            if($value['mysteryShopper_assignment_category']=="Dine"){
                                            ?>
                                            <a style="color: black;" href="<?php echo site_url('MysteryShopperLoggedin/upload_review/'.$id) ?>" rel="nofollow">
                                                <img alt="" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="">
                                                 <center >Category: <span style="font-weight: normal;">Dine</span><br>
                                                Budget: <span style="font-weight: normal;"><?php echo $value['assignment_budget']; ?></span><br>
                                                location: <span style="font-weight: normal;"><?php echo $value1['mysteryShopper_client_address'];?></span><br>
                                                 Date: <span style="font-weight: normal;"><?php echo $value['mysteryShopper_assignment_fromDate'];?></span>
                                                </center>
                                                <button type="button" class="btn btn-success">Upload Review</button>
                                            </a>
                                            <?php }
                                            elseif($value['mysteryShopper_assignment_category']=="Delivery"){
                                            ?>
                                            <a style="color: black;" href="<?php echo site_url('MysteryShopperLoggedin/delivery_upload_review/'.$id) ?>" rel="nofollow">
                                                <img alt="" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="">
                                                <center>Category: <span style="font-weight: normal;">Dine</span><br>
                                                Budget: <span style="font-weight: normal;"><?php echo $value['assignment_budget']; ?></span><br>
                                                location: <span style="font-weight: normal;"><?php echo $value1['mysteryShopper_client_address'];?></span><br>
                                                Date: <span style="font-weight: normal;"><?php echo $value['mysteryShopper_assignment_fromDate'];?></span>
                                                </center>
                                                <button type="button" class="btn btn-success">Upload Review</button>
                                            </a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                              
                                           
                                              <?php
                                                  }         
                                            
                                               }
                                              }
                                             }

                                            ?>                                                        
                                      
                                      
                        </div>
                            
                        

                            
                        </div>

                       
                    </div>

                </div>
            </div>

        </div>
    </div>

    </div>


    