<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="<?php echo base_url(); ?>Main/img/fvIcon.png" type="image/gif" sizes="32x32"> 
        <title>MSP - Admin Panel</title>
        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/bower_components/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/app.min.css">
    </head>

    <body data-sa-theme="7">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Welcome MSP
                   
                </div>
                

                <div class="login__block__body">
                    <form class="cmxform" id="signupForm" method="post" action="<?php echo base_url();?>index.php/Main/login_validation">
                    <div class="form-group">
                        <input type="text" class="form-control text-center" placeholder="User Name" name="username">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control text-center" placeholder="Password" name="password">
                    </div>
                    <input class="submit btn-success btn btn-large" name="login" type="submit" value="Login">
                    <span class="form-control"><?php echo $this->session->flashdata("error")?></span>
                </form>
                </div>
            </div>

           
           

        

        <script src="<?php echo base_url(); ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="<?php echo base_url(); ?>js/app.min.js"></script>
    </body>
</html>
