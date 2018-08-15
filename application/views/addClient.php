<section class="content"> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Data Entry</a>
        </li>
        <li class="breadcrumb-item active">Add Client</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-hand-paper-o"></i>Add Client</div>
          </div>
        <form class="form-control" id="form" action="<?php echo site_url('Client/insert')?>" enctype="multipart/form-data" onsubmit="return validateMyForm();" method="post">
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-6">
            <img id="blah" src="#">
                
            </div>
          </div>
            </div>
          <div class="form-group">
            <div class="form-row">
          <div class="col-md-2">
              <label>Picture</label>
                <input class="form-control" value="<?php echo $this->session->flashdata('img')?>" type="file" name="pic" id="picture" onchange="readURL(this);" accept="image/*">
                <p id="error1" style="display:none; color:#FF0000;">
Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
</p>
<p id="error2" style="display:none; color:#FF0000;">
Maximum File Size Limit is 1MB.
</p>
            </div>
          </div>
            </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 form-group">
              <label>Company Name*</label>
                <input class="form-control" value="<?php echo $this->session->flashdata('client_name')?>" type="text" name="name" aria-describedby="nameHelp" placeholder="Enter Compnay Name" required>
              </div>
              <div class="col-md-6">
              <label>Address*</label>
                <input class="form-control" type="text" value="<?php echo $this->session->flashdata('address'); ?>" placeholder="Enter Address" name="address" required>
              </div>

            </div>
          </div>

          <div class="form-group">

            <div class="form-row">
              
              <div class="col-md-6 form-group">
              <label>Owner Name*</label>
                <input class="form-control" value="<?php echo $this->session->flashdata('owner_name'); ?>" type="text" placeholder="Enter Owner Name" name="owner_name" required>
              </div>
              <div class="col-md-6 ">
              <label>Category</label>
                <select class="form-control" style="color:#16354e ;font-weight: bold;
font-size: 13px;"  name="category">
                  <option>Food</option>
                  <option>Sports</option>
                  <option>Banking</option>
                  <option>Entertainment</option>
                  </select>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
             <div class="col-md-6 form-group">
              <label>Email*</label>
                <input class="form-control" value="<?php echo $this->session->flashdata('email'); ?>"  placeholder="Enter Email" type="email" name="email" id="email" required>
              </div> 
             
              
              

              <div class="col-md-6 form-group">
              <label>Password*</label>
                <input class="form-control" value="<?php echo $this->session->flashdata('password'); ?>" type="password" name="password" required>
              </div>
            </div>
          </div>
          



          <input class="btn btn-success btn-block" type="submit"  name="submit">
        </form>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
</body>

</html>

<script type="text/javascript">
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
    
    function validateMyForm()
    {



	
	var email  = $('#email').val();
	
	
	
	
	
	
	$(function () 
  				{
    
    				$.ajax({
      					type: "POST",                                      
      					url: 'get_all_user',                  
      					data: {email: email},                        
      					dataType: 'json',                
      					success: function(data2)          
      						{
      							
        						for( j=0; j<data2.length;j++)
          						{
          	
          							if(email == data2[j]['user_email'])
                                                		{
                                                                      //alert('Client Exist');
                                                                      
                                                                      return false;
                                                		}
							}
        				    
        						return true;
        				    	
        				    
        					
        				    

      						} ,
      						error: function (error)
      						{
        						return false;
        						console.log(error);
        
      						}

     	
      					});
      				});



}
    
    
    
</script>

   <script>
$('input[type="submit"]').prop("disabled", false);
var a=0;
//binds to onchange event of your input field
$('#picture').bind('change', function() {
if ($('input:submit').attr('disabled',false)){
	$('input:submit').attr('disabled',true);
	}
var ext = $('#picture').val().split('.').pop().toLowerCase();
if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
	$('#error1').slideDown("slow");
	$('#error2').slideUp("slow");
	a=0;
	}else{
	var picsize = (this.files[0].size);
	if (picsize > 1000000){
	$('#error2').slideDown("slow");
	a=0;
	}else{
	a=1;
	$('#error2').slideUp("slow");
	}
	$('#error1').slideUp("slow");
	if (a==1){
		$('input:submit').attr('disabled',false);
		}
}
});
</script>