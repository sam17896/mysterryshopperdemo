    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">


                      <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  
                  <th>S.No</th>
                  <th>Start From</th>
                  <th>Valid Till</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


        <?php
        $no =0;
                                                foreach ($alldata as $key => $value)
                                                {
                                                  $no++;
                                             ?>
                                           
                                              
                                            <tr align="center">
                                              <td><?php echo $no; ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_fromDate']; ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_toDate']; ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_status']; ?></td>
                                            
                                            <td>
                                              <?php  $id=$value['mysteryShopper_assignment_id']?>
                                             
                                            <a href="<?php echo site_url('Assignment/complete_assignment_detail_for_client/'.$id.'/1584328/detail/20215') ?>" target='blank' class="btn btn-default">Detail</a>
                                            </td>

                                            <?php
                                               
                                              
                                             }

                                            ?>
              </tbody>
            </table>
          </div>
      </div>
          </div>
          </div>
          </div>