<?php
    include 'layout/header.php';
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add Currency</h1> <hr>
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


              <form class="" action="backend/add_curr.php" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Currency Code</label>
                      <input type="text" class="form-control" name="cc_code" value="">
                    </div>
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Currency Name</label>
                      <input type="text" class="form-control" name="cc_name" value="">
                    </div>
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Currency Rate</label>
                      <input type="text" class="form-control" name="cc_rate" value="">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-info" name="button">ADD</button>
              </form>

              <hr>
              <div class="row">
                <div class="col-lg-5">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="font-weight:bolder;color:#000;">Currency Code</th>
                      <th style="font-weight:bolder;color:#000;">Currency Name</th>
                      <th style="font-weight:bolder;color:#000;">Currency Rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql ="SELECT * from currency";
                    if(mysqli_query($conn, $sql)){
                      $result=mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        ?>
                    <tr>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['currency_code']?></td>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['currency_name']?></td>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['c_name']?></td>
                      <td>
                        <a href="backend/del_curr.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
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
