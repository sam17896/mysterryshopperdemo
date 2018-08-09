<div class="main">

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg ">

                    
                    <h1 class="text-center">THANK YOU</h1>

                    <form  class="form-center" method="POST" id="siteForm">
                                                <input type="hidden" name="postback" value="1">

                       <div>
                        <!-- <p style="font-size: 36px">THANK YOU</p> -->
                        <p style="color: green"></p>
                        <?php echo $this->session->flashdata('msg'); ?>

                        </div>
                       

                       

                        <!-- <div class="col-md-4" style="margin-top: 0%">
                       <a class="btn btn-green" href="<?php echo site_url('Web/login')?>">OK</a> 
                       </div>  -->
                     
                       
                    </form>

                </div>
            </div>

        </div>
    </div>

    </div>