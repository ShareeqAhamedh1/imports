<?php
    include 'layout/header.php';
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


              <form class="" action="backend/add_lic.php" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Licence information</label>
                      <select class="form-control" name="lic_name">
                        <option value="L">L</option>
                        <option value="TS">TS</option>
                        <option value="SL">SL</option>
                        <option value="TS/S">TS/S</option>
                        <option value="TB">TB</option>
                        <option value="S">S</option>
                        <option value="S/TB">S/TB</option>
                        <option value="B/S">B/S</option>
                        <option value="L/S">L/S</option>
                        <option value="L/TS">L/TS</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">HS CODE</label>
                      <input type="text" class="form-control" name="hs_code" value="">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-info" name="button">ADD</button>
              </form>
              <hr>
              <div class="row">
                <div class="col-lg-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="font-weight:bolder;color:#000;">Licence information</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql ="SELECT * FROM tbl_lic ORDER BY `tbl_lic`.`lic_id` DESC";
                    if(mysqli_query($conn, $sql)){
                      $result=mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                        $lid = $row['lic_id'];
                        ?>
                    <tr>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['lic_name']?></td>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['hs_code']?></td>
                      <td>
                        <a href="edit_lic_info.php?id=<?= $lid ?>" class="btn btn-info btn-sm">EDIT</a>
                        <a href="backend/del_lic.php?id=<?= $row['lic_id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
                  </tbody>
                </table>
                </div>
              </div>
            </div>
        </div>
<?php
    include 'layout/footer.php';
?>
