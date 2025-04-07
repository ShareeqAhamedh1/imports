<?php
    include 'layout/header.php';

    $hs_main_id= $_REQUEST['hs_id'];

    $_SESSION['re_loc'] = $hs_main_id;
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add HS MAIN CODE</h1> <hr>
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

              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="font-weight:bolder;color:#000;">HS CODE</th>
        <th style="font-weight:bolder;color:#000;">HS level</th>
        <th style="font-weight:bolder;color:#000;">HS Name</th>

      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM tbl_hs_sub WHERE hmc_id='$hs_main_id'";
        $rs = $conn->query($sql);


        while ($row = $rs->fetch_assoc()) {
       ?>
      <tr>
        <td style="font-weight:bold;color:#000;"><?= $row['hs_sub_code']  ?></td>
        <td style="font-weight:bold;color:#000;"><?= $row['hs_level']  ?></td>
        <td style="font-weight:bold;color:#000;"><?= $row['hs_sub_name']  ?></td>
        <td style="font-weight:bold;color:#000;"> <a href="backend/delete_hs.php?hscode=<?= $row['hs_sub_code']  ?>&hs_id=<?= $hs_main_id ?>&hs_real=<?= $row['hs_sub_id']  ?>" class="btn btn-danger btn-sm">Delete</a> </td>
        <td style="font-weight:bold;color:#000;"> <a href="edit_hs_sub.php?hscode=<?= $row['hs_sub_code']  ?>&hs_sub_id=<?= $row['hs_sub_id']  ?>" class="btn btn-warning btn-sm">Edit</a> </td>
        <td style="font-weight:bold;color:#000;"> <a href="edit_hs_sub_full.php?hscode=<?= $row['hs_sub_code']  ?>&hs_sub_id=<?= $row['hs_sub_id']  ?>" class="btn btn-warning btn-sm">Edit Full</a> </td>
      </tr>
    <?php } ?>

    </tbody>
  </table>
                </div>
              </div>
            </div>
        </div>
<?php
    include 'layout/footer.php';
?>
