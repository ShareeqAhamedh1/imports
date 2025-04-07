<?php
    include 'layout/header.php';

    $id = $_REQUEST['id'];

    $sql = "SELECT  * FROM tbl_lic WHERE lic_id='$id'";
    $rs = $conn->query($sql);

    $row = $rs->fetch_assoc();

    $id = $_REQUEST['id'];
    $lic_name = $row['lic_name'];
    $hscode = $row['hs_code'];
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add PREFENTIAL DUTY CODE</h1> <hr>
              <?php if(isset($_SESSION['ins_succ'])){ ?>
              <p style="font-weight:bold;color:#2ccc1a;font-size:16px;">Successfully Added</p>
            <?php unset($_SESSION['ins_succ']); } ?>

            <?php if(isset($_SESSION['del_succ'])){ ?>
            <p style="font-weight:bold;color:#2ccc1a;font-size:16px;">Deleted</p>
          <?php unset($_SESSION['del_succ']); } ?>

          <?php if(isset($_SESSION['up_succ'])){ ?>
          <p style="font-weight:bold;color:#2ccc1a;font-size:16px;">Successfully Updated</p>
        <?php unset($_SESSION['up_succ']); } ?>

        <?php if(isset($_SESSION['up_fail'])){ ?>
        <p style="font-weight:bold;color:#f10101;font-size:16px;">Update Fail</p>
      <?php unset($_SESSION['up_fail']); } ?>

      <form class="" action="backend/edit_lic.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="" style="font-weight:bolder;color:#000;">Licence information</label>
              <input type="text" class="form-control" name="lic_name" value="<?= $lic_name ?>">
            </div>
            <div class="form-group">
              <label for="" style="font-weight:bolder;color:#000;">HS CODE</label>
              <input type="text" class="form-control" name="hs_code" value="<?= $hscode ?>">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-info" name="button">Update</button>
      </form>
              <hr>

            </div>
        </div>
<?php
    include 'layout/footer.php';
?>
