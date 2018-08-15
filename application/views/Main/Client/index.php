
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

                    <h1 class="text-center">My Stores</h1>
                    <p class="text-center">Your added stores for Mystery Shopping Pakistan</p>

                    <div class="row chosen-reviews">
                        <div class="col-md-12 chosen-reviews-left">

                            <div class="chosen-countdown" data-active="0" id="countdown-middle"></div>

                         <div class="chosen-grey-box">
                                <h2 class="center">Wanna see reviews?</h2>
                                <p class="center">Select store from below.</p>


        <?php                                   $check=0;
                                                foreach ($client_data as $key => $value)
                                                {
                                            
                                                            $base_path = base_url("uploads/");
                                                  $image_name = $value['mysteryShopper_client_image'];
                                                  if($image_name =='' || $image_name== null)
                                                  {
                                                  $image_name ='no_image.jpeg';
                                                  }
                                                  $image_path = $base_path.$image_name;
                                                                ?>
                                    <div class="chosen-missed-out margin-left">
                                        <div class="siteImgContainer">
                                            <?php  $id=$value['mysteryShopper_client_id'];?>
                                            <a href="<?php echo site_url('ClientLoggedin/store_assignments/'.$id.'/mystery/212005151015') ?>" rel="nofollow">
                                                <img alt="" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="Logo">
                                                <button type="button" class="btn btn-success">View Completed Assignments</button>
                                            </a>
                                        </div>
                                    </div>
                                              
                                           
                                              <?php
                                                           
                                            
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


    