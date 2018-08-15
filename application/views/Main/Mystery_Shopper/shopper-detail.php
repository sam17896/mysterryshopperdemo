<div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">


                      <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  <th>S.No</th>
                  <th>To Date</th>
                  <th>From Date</th>
                  <th>Client Name</th>
                  <th>Budget</th>
                  <th>Ref Id</th>
                  <th>Assignment Id</th>
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
                                            <td><?php echo $value['mysteryShopper_assignment_toDate']; ?></td>
                                            <td><?php echo $value['mysteryShopper_assignment_fromDate']; ?></td>
                                            <td><?php echo $value['mysteryShopper_client_name']; ?></td>
                                            <td><?php echo $value['assignment_budget']; ?></td>
                                            <td></td>
                                            <td>
                                              <?php  echo $value['mysteryShopper_assignment_id']?></td>

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