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
        foreach ($allassignment as $key => $value)
        {
            $base_path = base_url("uploads/");
            $image_name = $value['mysteryShopper_client_image'];
            $image_path = $base_path.$image_name; ?>

            <div class="chosen-missed-out margin-left">
                <div class="siteImgContainer">
                    <?php  $id=$value['id']; ?>
                        <a href="<?php echo site_url('MysteryShopperLoggedin/upload_review/'.$id) ?>" rel="nofollow">
                            <img alt="Get A FREE £100 B&amp;Q Voucher!" class="siteImg" style="width:350px;height:200px;" src="<?php echo $image_path;?>" title="">
                            <center><span>Dine</span></center>
                            <button type="button" class="btn btn-success">Upload Review</button>
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


