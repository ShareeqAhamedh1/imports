<?php
    include 'layout/header.php';

    $hs_sub_id = $_REQUEST['hs_sub_id'];

    $sqlHs = "SELECT * FROM tbl_hs_sub WHERE hs_sub_id='$hs_sub_id'";
    $rsHs =$conn->query($sqlHs);

    $row=$rsHs->fetch_assoc();
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <form class="" action="backend/edit_hs_code.php" method="post">
                <input type="hidden" name="hs_iid" value="<?= $hs_sub_id ?>">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">HS SUB CODE</label>
                      <input type="text" class="form-control" name="hsm_code" value="<?= $row['hs_sub_code'] ?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">HS DESCRIPTION</label>
                      <textarea name="hsm_description" class="form-control" rows="4" cols="80"><?= $row['hs_sub_name'] ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label style="font-weight:bolder;color:#000;" for="">Select sub level</label>
                  <select class="form-control" name="sel_sub">
                      <option value="<?= $row[''] ?>">Level <?= $row['hs_level'] ?></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>

                  </select>
                </div>
                <div class="form-group">
                  <label for="">Check Empty</label>
                  <input type="checkbox" name="ckemp" value="1" <?php if ( $row['emp'] == 1): ?>checked<?php endif; ?>>
                </div>
                <button type="submit" class="btn btn-info" name="button">Edit</button> <br><br>

              <hr>
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
