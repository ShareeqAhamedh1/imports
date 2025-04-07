<?php
    include 'layout/header.php';
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

      <?php
        if (isset($_SESSION['main_edit'])){
       ?>
       <form class="" action="backend/edit_maincat.php" method="get">
          <input type="hidden" name="id_edit" value="<?= $_SESSION['mainid'] ?>" />
             <div class="form-group">
               <label for="" style="font-weight:bolder;color:#000;">HS main code</label>
               <input type="text" class="form-control" name="hs_code" value="<?= $_SESSION['hmc_code'] ?>">
               <label for="" style="font-weight:bolder;color:#000;">HS description</label>
               <textarea name="hs_desc" class="form-control" rows="8" cols="80">
                 <?= $_SESSION['hmc_desc'] ?>
               </textarea>
             </div>
             <button type="submit" class="btn btn-info" name="button">EDIT</button>
       </form>
     <?php
        }
        else{
       ?>
              <form class="" action="backend/add_maincat.php" method="post">
                <div class="form-group">
                  <label for="" style="font-weight:bolder;color:#000;">HS main code</label>
                  <input type="text" class="form-control" name="hsm_code" value="">
                </div>
                <div class="form-group">
                  <label for="" style="font-weight:bolder;color:#000;">HS description</label>
                  <textarea name="hsm_description" class="form-control" rows="8" cols="80"></textarea>
                </div>
                <button type="submit" class="btn btn-info" name="button">ADD</button>
              </form>
              <?php
                }
                ?>
              <hr>
              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="font-weight:bolder;color:#000;">HS CODE</th>
        <th style="font-weight:bolder;color:#000;">HS DESCRIPTION</th>
        <th></th>
        <th></th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql ="SELECT * from tbl_hs_main_cat ORDER BY `tbl_hs_main_cat`.`hmc_id` DESC";
      if(mysqli_query($conn, $sql)){
        $result=mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $oid = $row['hmc_id'];
          ?>
      <tr>
        <td style="font-weight:bold;color:#000;"><?php echo $row['hmc_code'];?></td>
        <td style="font-weight:bold;color:#000;"><?php echo $row['hmc_desc'];?></td>
        <td>
          <a href="sessions/ed_maincat.php?id=<?= $oid ?>" class="btn btn-info btn-sm">EDIT</a>
          <a href="backend/del_maincat.php?hmc_id=<?= $row['hmc_id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
        </td>
        <td>
          <a href="hs_sub.php?hs_id=<?= $row['hmc_id'] ?>" class="btn btn-warning btn-sm">Add Details>></a>
        </td>
        <td>
          <a href="view_hs_sub.php?hs_id=<?= $row['hmc_id'] ?>" class="btn btn-primary btn-sm"> View hs codes</a>
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
