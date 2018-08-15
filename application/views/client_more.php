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
                        <!-- <h4 class="card-title">Basic example</h4>
                        <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  <th>Client Name</th>
                  <th>Client Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
                                                foreach ($alluser as $key => $value)
                                                {
                                            
                                            ?>
                                            <tr align="center">
                                            <td><?php echo $value['user_name']; ?></td>
                                            <td><?php echo $value['user_email']; ?></td>
                                            
                                            <td>
                                              <?php  $user_id=$value['user_id']?>
                                             
                                            <a href="<?php echo site_url('Client/add_more_store/'.$user_id) ?>" class="btn btn-success add-client">Add New Store</a>
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
    


