


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

                    <h1 class="text-center">Edit Assignments</h1>
                    <p class="text-center">Edit your assignments here if miss some thing.</p>

                    <div class="row chosen-reviews">
                        <div class="col-md-12 chosen-reviews-left">

                            <div class="chosen-countdown" data-active="0" id="countdown-middle"></div>

                            <div class="chosen-grey-box">
                               


                                <?php           $check=0;
                                                foreach ($editAssignment as $key => $value)
                                                {
                                                    if($value['mysteryShopper_assignment_category'] == 'Dine') 
                                                    { 
                                                        foreach ($allreview as $key => $value2)
                                                        {
                                                            if($value['mysteryShopper_assignment_id'] == $value2['mysteryShopper_assignment_id'])
                                                            {
                                                                foreach ($allclient as $key => $value1)
                                                                {
                                                                    if($value['mysteryShopper_client_id'] == $value1['mysteryShopper_client_id'])
                                                                    {
                                                                        $base_path = base_url("uploads/");
                                                                        $image_name = $value1['mysteryShopper_client_image'];
                                                                        $image_path = $base_path.$image_name;
                                ?>
                                                                        <div class="chosen-missed-out margin-left">
                                                                            <div class="siteImgContainer">
                                <?php  
                                                                            $id=$value2['review_id'];
                                                                        
                                ?>
                                                                                <a href="<?php echo site_url('MysteryShopperLoggedin/edit_assignment_detail/'.$id)?>" rel="nofollow">
                                                                                    <img alt="Image" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="Dine">
                                                                                    <button type="button" class="btn btn-success" >Edit Assignment</button>
                                                                                </a>
                                

                                                                            </div>
                                                                        </div>
                                              
 

                                           
                                <?php
                                                           
                                            
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        foreach ($all_review_delivery as $key => $value2)
                                                        {
                                                            if($value['mysteryShopper_assignment_id'] == $value2['mysteryShopper_assignment_id'])
                                                            {
                                                                foreach ($allclient as $key => $value1)
                                                                {
                                                                    if($value['mysteryShopper_client_id'] == $value1['mysteryShopper_client_id'])
                                                                    {
                                                                        $base_path = base_url("uploads/");
                                                                        $image_name = $value1['mysteryShopper_client_image'];
                                                                        $image_path = $base_path.$image_name;
                                ?>
                                                                        <div class="chosen-missed-out margin-left">
                                                                            <div class="siteImgContainer">
                                <?php  
                                                                                $id=$value2['online_review_id'];
                                                                        
                                ?>
                                                                                <a href="<?php echo site_url('MysteryShopperLoggedin/edit_assignment_detail_delivery/'.$id)?>" rel="nofollow">
                                                                                    <img alt="Image" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="Delivery">
                                                                                    <button type="button" class="btn btn-success" >Edit Assignment</button>
                                                                                </a>
                                

                                                                            </div>
                                                                        </div>
                                              
 

                                           
                                <?php
                                                           
                                            
                                                                    }
                                                                }
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


    