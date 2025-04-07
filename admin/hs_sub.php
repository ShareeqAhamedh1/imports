<?php
    include 'layout/header.php';
    if(isset($_REQUEST['hs_id'])){
      $_SESSION['hs_main'] = $_REQUEST['hs_id'];
    }
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add HS SUB CODE FOR <?= $_SESSION['hs_main'] ?></h1> <hr>
              <form class="" action="backend/add_hs_code.php" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">HS SUB CODE</label>
                      <input type="text" class="form-control" name="hsm_code" value="">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">HS DESCRIPTION</label>
                      <textarea name="hsm_description" class="form-control" rows="4" cols="80"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label style="font-weight:bolder;color:#000;" for="">Select sub level</label>
                  <select class="form-control" name="sel_sub">
                    <?php if (isset($_SESSION['s1']) OR isset($_SESSION['sw1'])){?>
                      <option value="s1">-With Sub</option>
                      <option value="sw1">-Without Sub</option>
                    <?php }elseif (isset($_SESSION['s2']) OR isset($_SESSION['sw2'])){?>
                      <option value="s2">--With Sub</option>
                      <option value="sw2">--Without Sub</option>
                    <?php }elseif(isset($_SESSION['s3']) OR isset($_SESSION['sw3'])){?>
                      <option value="s3">---With Sub</option>
                      <option value="sw3">---Without Sub</option>
                    <?php }elseif(isset($_SESSION['s4']) OR isset($_SESSION['sw4'])){?>
                      <option value="sw4">----Without Sub</option>
                    <?php }else{ ?>
                    <option value="s1">-With Sub</option>
                    <option value="sw1">-Without Sub</option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Check Empty</label>
                  <input type="checkbox" name="ckemp" value="1">
                </div>
                <button type="submit" class="btn btn-info" name="button">ADD</button> <br><br>
                <button type="submit" name="reset" class="btn btn-secondary">RESET</button>

              <hr>
              </form>
              <?php if(isset($_SESSION['get_duty'])){ ?>
                <form class="" action="backend/add_hs_sub_final.php" method="post">
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
                        <div class="col-4">
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
                      <button type="submit" name="button" class="btn btn-info">Add final Data</button>
                    </div>
                  </div>
                </form>
              <?php } ?>
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
