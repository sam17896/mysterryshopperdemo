    <div class="full-width generic-section">
        <div class="container chosen-top">

            <div class="row">
                <div class="col-md-offset-1 col-md-10 white-bg">


                      <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">

              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Month</th>
                  <th>Shopper Name</th>
                  <th>Status</th>
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
                                            <td><?php echo $value['month']; ?></td>
                                            <td><?php echo $value['mysteryShopper_name']; ?></td>
                                            <td><?php echo $value['status']; ?></td>

                                            <td>
                                              <?php  echo $value['assignment_id']?></td>

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