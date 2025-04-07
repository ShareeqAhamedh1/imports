<?php
    include 'layout/header.php';

    $hs_sub_id = $_REQUEST['hs_sub_id'];

    $sqlHs = "SELECT * FROM tbl_hs_sub WHERE hs_sub_id='$hs_sub_id'";
    $rsHs =$conn->query($sqlHs);

    $row=$rsHs->fetch_assoc();
 ?>
        <div class="content-body">
            <div class="container-fluid">
                  <form class="" action="backend/edit_hs_sub_final.php" method="post">
                <input type="hidden" name="hs_iid" value="<?= $hs_sub_id ?>">
                <input type="hidden" name="hs_code" value="<?= $row['hs_sub_code'] ?>">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <h3>HS CODE: <?= $row['hs_sub_code'] ?></h3>
                    </div>
                  </div>
                <br><br>

              <hr>
                  <div class="row">
                    <div class="col-6">
                      <h2>Calculations</h2>
                      <hr>
                      <div class="row">
                        <?php
                          $sqlPrefName = "SELECT * FROM tbl_calc_names";
                          $rsPN = $conn->query($sqlPrefName);
                          $clnc=0;
                          if ($rsPN->num_rows > 0) {
                            $uinre=0;
                            while ($rowpn = $rsPN->fetch_assoc()) {
                         ?>
                        <div class="col-6">
                          <h2><?= $rowpn['cln_name'] ?></h2>
                          <hr>
                          <?php
                              $sqlU = "SELECT * FROM tbl_units";
                              $rsU = $conn->query($sqlU);
                              if ($rsU->num_rows) {
                                ?>

                                <?php
                                while ($rowU = $rsU->fetch_assoc()) {
                           ?>
                          <div class="form-group">
                            <input type="hidden" name="cal_name_id<?=$uinre?>" value="<?= $rowpn['cln_id'] ?>">
                            <input type="checkbox" class="" name="unit<?=$uinre?>" value="<?= $rowU['unit_id'] ?>">
                            <label style="font-weight:bolder;color:#000;" for=""><?= $rowU['unit_name'] ?></label>
                            <input type="text" class="form-control" name="valunit<?= $uinre ?>" value="" placeholder="<?=$rowU['unit_name'] ?>">
                          </div>
                        <?php $uinre++; } } ?>
                        </div>
                      <?php  $clnc++; } } ?>
                      <input type="hidden" name="u_tot" value="<?= $uinre ?>">
                      <input type="hidden" name="calc_count" value="<?= $clnc ?>">
                      <input type="hidden" name="tot_unit" value="<?= $rsU->num_rows; ?>">
                        <div class="col-6">
                          <h2>Preferential Duty</h2>
                          <hr>
                          <?php
                            $sqlPd = "SELECT * FROM tbl_pd_name";
                            $rsPd = $conn->query($sqlPd);

                            if ($rsPd->num_rows > 0) {
                              $pdinc=0;
                              while ($rowPd = $rsPd->fetch_assoc()) {
                           ?>
                          <div class="form-group">
                            <input type="checkbox" class="" name="pdnameid<?= $pdinc ?>"  value="<?= $rowPd['pd_id'] ?>" checked>
                            <label style="font-weight:bolder;color:#000;" for=""><?= $rowPd['pd_name'] ?></label>
                            <input type="text" class="form-control" name="pdval<?= $pdinc ?>" value="0" placeholder="VALUE">
                          </div>
                        <?php $pdinc++; } } ?>
                        <input type="hidden" name="pdtot" value="<?= $pdinc ?>">
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <h4>Excise</h4>
                      <hr>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <input type="radio" name="exsel" value="0">
                            <label for="">Ordinary Data</label>
                          </div>
                          <?php
                              $sqlU = "SELECT * FROM tbl_units";
                              $rsU = $conn->query($sqlU);
                              if ($rsU->num_rows) {
                                ?>
                                <input type="hidden" name="" value="">
                                <?php
                                $uinrex=0;
                                while ($rowU = $rsU->fetch_assoc()) {
                           ?>
                          <div class="form-group">
                            <input type="checkbox" class="" name="uex<?= $uinrex ?>" value="<?= $rowU['unit_id'] ?>">
                            <label style="font-weight:bolder;color:#000;" for=""><?= $rowU['unit_name'] ?></label>
                            <input type="text" class="form-control" name="uexval<?= $uinrex ?>" value="" placeholder="<?= $rowU['unit_name'] ?>">
                          </div>
                        <?php $uinrex++; } } ?>
                        <input type="hidden" name="uexctot" value="<?= $uinrex ?>">
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <input type="radio" name="exsel" value="1">
                            <label for="">Ranges</label>
                          </div>
                          <div class="form-group">
                            <label for="">How many Ranges</label>
                            <input type="text" onkeyup="AddRanges(this.value)" class="" name="tot_ranges" value="">
                          </div>
                          <div id="showrang">

                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-12">
                      <button type="submit" name="button" class="btn btn-info">edit final Data</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>


<?php
    include 'layout/footer.php';
?>
<script type="text/javascript">
 function AddRanges(tot){
   $('#showrang').load('showrange.php',{
     ranges:tot
   });
 }
</script>
