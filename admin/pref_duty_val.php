<?php
    include 'layout/header.php';
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add PREFENTIAL DUTY VALUE</h1> <hr>



              <form class="" action="backend/add_pref_duty_val.php" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Hs Code</label>
                      <input type="text" class="form-control" name="hs_sub_code" value="">
                    </div>
                    <div class="row">
                    <?php
                      $sqlPd = "SELECT * FROM tbl_pd_name";
                      $rsPd = $conn->query($sqlPd);

                      if ($rsPd->num_rows > 0) {
                        $pdinc=0;
                        while ($rowPd = $rsPd->fetch_assoc()) {
                     ?>
                     <div class="col-2">
                       <div class="form-group">
                         <input type="checkbox" class="" name="pdnameid<?= $pdinc ?>"  value="<?= $rowPd['pd_id'] ?>">

                         <label style="font-weight:bolder;color:#000;" for=""><?= $rowPd['pd_name'] ?></label> <br><br>
                         <?php
                             $sqlU = "SELECT * FROM tbl_units";
                             $rsU = $conn->query($sqlU);
                             if ($rsU->num_rows) {
                               ?>

                               <?php
                               $uniCount=1;
                               while ($rowU = $rsU->fetch_assoc()) {
                          ?>
                         <input type="checkbox" name="unit<?= $pdinc ?><?= $uniCount ?>" value="<?= $rowU['unit_id'] ?>">
                         <label for=""><?= $rowU['unit_name'] ?> (<?= $rowU['unit_id'] ?>)</label>
                         <input type="text" class="form-control" name="pre_val<?= $pdinc ?><?= $uniCount ?>" value="">
                       <?php $uniCount++; } } ?>
                       </div>
                       <input type="hidden" name="uni_count_tot<?= $pdinc ?>" value="<?= $uniCount ?>">
                     </div>
                  <?php $pdinc++; }
                ?>


                </div>
              <?php } ?>
                  <input type="hidden" name="pdtot" value="<?= $pdinc ?>">


                    <button type="submit" class="btn btn-info" name="button">ADD</button>
                  </form>
                  </div>



                  <div class="col-lg-6">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="font-weight:bolder;color:#000;">HS CODE</th>
                        <th style="font-weight:bolder;color:#000;">Unit </th>
                        <th style="font-weight:bolder;color:#000;">Value</th>
                        <th style="font-weight:bolder;color:#000;">PD NAME</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $sqlPd= "SELECT * FROM tbl_pref_multi_value ORDER BY `tbl_pref_multi_value`.`pmv_id` DESC";
                        $rsPd =$conn->query($sqlPd);

                        if ($rsPd->num_rows > 0) {
                          while ($rowPd = $rsPd->fetch_assoc()) {
                            $unid=$rowPd['unit_id'];
                            $sql_u = "SELECT * FROM tbl_units WHERE unit_id='$unid'";
                            $rs_u = $conn->query($sql_u);
                            $row_u = $rs_u->fetch_assoc();

                            $pd_name_id=$rowPd['pref_duty_name_id'];
                            $sql_pd = "SELECT * FROM tbl_pd_name WHERE pd_id='$pd_name_id'";
                            $rs_pd = $conn->query($sql_pd);
                            $row_pd = $rs_pd->fetch_assoc();

                       ?>
                      <tr>
                        <td style="font-weight:bolder;color:#000;"><?= $rowPd['hs_code'] ?></td>
                        <td style="font-weight:bolder;color:#000;"><?= $row_u['unit_name'] ?></td>
                        <td style="font-weight:bolder;color:#000;"><?= $rowPd['cal_val'] ?></td>
                        <td style="font-weight:bolder;color:#000;"><?= $row_pd['pd_name'] ?></td>
                        <td> <a href="backend/del_pef_value.php?id=<?= $rowPd['pmv_id'] ?>" class="btn btn-danger btn-sm">Delete</a> </td>
                      </tr>
                    <?php } } ?>
                    </tbody>
                  </table>
                  </div>
                </div>

              <hr>
            </div>
        </div>
<?php
    include 'layout/footer.php';
?>
