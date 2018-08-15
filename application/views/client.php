       <!-- Modal -->
   <div class="msgModal">
  <div class="modal fade " id="client_del_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
       <center> <div class="modal-body">
       <input type="hidden" id="modal_text_id">
          <p style="color:white"  >Deleting Client will delete all its data including assignments.</p>
          <p style="color:white"  >Are Your Sure ?</p>
          
        </div></center>
        <center><div style="padding: 15px;
   
    border-top: 1px solid #e5e5e5;" >
     <input type="hidden" id="status" value="<?php echo $this->session->flashdata('status'); ?>" >
          <a class="btn btn-info btn-lg deleteBtnYes" >YES</a>
          <a class="btn btn-info btn-lg"  data-dismiss="modal">NO</a>
          
        </div></center>
      </div>
      
    </div>
  </div>
  </div>
  
   <!-- Modal -->
   <div class="msgModal">
  <div class="modal fade " id="cannot_del" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
       <center> <div class="modal-body">
          <p style="color:white" id="cannot_del_msg" ></p>
          
        </div></center>
        <center><div style="padding: 15px;
   
    border-top: 1px solid #e5e5e5;" >
          <a class="btn btn-info btn-lg"  data-dismiss="modal">OK</a>
          
        </div></center>
      </div>
      
    </div>
  </div>
  </div>
<section class="content"> 
              
                <div class="">
                    <div class="">
                      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Data Entry</li>
      </ol>
      <!-- Client DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Client Data
        </div>
      </div>
        <div class="card-header">
          <a class="btn btn-success add-client" href="<?php echo site_url('client/add_client')?>">Add Client</a>
        </div>
                       
                        <div class="table-responsive">
                        <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  <th>Company Logo</th>
                  <th>Company Name</th>
                  <th>Address</th>
                  <th>Owner Name</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
                                                foreach ($allclient as $key => $value)
                                                {
                                                  $base_path = base_url("uploads/");
                                                  $image_name = $value['mysteryShopper_client_image'];
                                                  if($image_name == '' || $image_name == null)
         					  {
         						$image_name='no_image.jpeg';
         					  }
                                                  $image_path = $base_path.$image_name;
                                            ?>
                                            <tr align="center">
                                              <td><img style="width:50px;height:50px;" src="<?php echo $image_path;?>"></td>
                                            <td><?php echo $value['mysteryShopper_client_name']; ?></td>
                                            <td><?php echo $value['mysteryShopper_client_address']; ?></td>
                                            <td><?php echo $value['mysteryShopper_client_owner_name']; ?></td>
                                            <td><?php echo $value['mysteryShopper_client_category']; ?></td>
                                            
                                            <td>
                                              <?php  
                                              $user_id=$value['user_id'];
                                              $client_id=$value['mysteryShopper_client_id'];
                                              
                                              
                                              ?>
                                             
                                            <a href="<?php echo site_url('Client/update_client/'.$client_id) ?>" class="btn btn-default">Update</a>
                                            <a  name="del" class="btn btn-default deleteBtn"  data-target="#client_del_modal"  data-id="<?php echo site_url('Client/delete/'.$user_id.'/'.$client_id) ?>">Delete</a>
                                            </td>
                                            <?php
                                                }

                                            ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
 
      
    <script>
    
    $( document ).ready(function() {
    	$.noConflict();
    	
    	 var status = $('#status').val();
	var remove_start_p_tag_status =  status.replace("<p>","");
	var status_error = remove_start_p_tag_status.replace("</p>","");  
	//alert(status);
	if(status_error !=""){
	        //$('#client_del_modal').modal('hide');
         	$('#cannot_del').modal('show');
         	$('#cannot_del_msg').text("Sorry you can not delete this client because he has assignment that is takken by MyStery Shopper");
         	//return false;
         	
        }
        
        
       
   $(".deleteBtn").click(function () {      
      
      
      $("#modal_text_id").val($(this).attr('data-id'));
      
     $(".deleteBtnYes").attr("href", $("#modal_text_id").val());
    	
         $("#client_del_modal").modal('show');
       });   
       
       
       
      
       
       
          
      
 
    
    });
    </script>

