 

<div class="main">

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">

                    
                    <h1 class="text-center">Password Reset</h1> 


                    <form action="<?php echo site_url('Web/pass_reset')?>" class="form-center" method="POST" id="siteForm">
                                                <input type="hidden" name="postback" value="1">

                        <p>Enter Email:</p>
                        <input class="form-control" type="email" name="email" required>
                        <?php echo $this->session->flashdata('msg'); ?>

                       <center><button class="btn btn-green" id="submitButton">Reset</button></center>
                       
                     
                       
                    </form>



                </div>
            </div>

        </div>
    </div>

    </div>
