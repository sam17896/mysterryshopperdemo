<div class="main">

    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">

                    
                    <h1 class="text-center">Password Reset</h1> 


                    <form action="<?php echo site_url('Web/reset_password_via_email')?>" class="form-center" method="POST" id="siteForm">
                    <?php 
                    
                    
                    $user_id = $this->input->get('msp');
                   // var_dump($user_id);
                  // $key ="mysteryshopperspakistan";
                  //$userId = base64_decode($user_id);
                 // var_dump($userId);
                    
                    
                    
                     ?>
                                                <input type="hidden" name="user_id" value="<?php echo $user_id?>">

                        
                        <p>New Password</p>
                        <input class="form-control" type="password" name="newPassword" id="newPassword" required>
                        <p>Retype Password</p>
                        <input class="form-control" type="password" name="retypePassword" id="retypePassword" onkeyup='check();' required><span id='message'></span>
<?php echo $this->session->flashdata('msg'); ?>

                       <center><button class="btn btn-green" id="submitButton">Reset</button></center>
                       
                     
                       
                    </form>



                </div>
            </div>

        </div>
    </div>

    </div>
    
  
    <script type="text/javascript">
       
    
    var check = function() {
  if (document.getElementById('newPassword').value ==
    document.getElementById('retypePassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not matching';
  }
}
    </script>
    
    
    
    
    
    