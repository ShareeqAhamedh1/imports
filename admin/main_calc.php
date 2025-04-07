<?php
    include 'layout/header.php';
 ?>
        <div class="content-body">
            <div class="container-fluid">
              <h1>Add CALCULATION NAMES</h1> <hr>

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
        if (isset($_SESSION['mc_edit'])){
       ?>
       <form class="" action="backend/edit_main_calc.php" method="post">
          <input type="hidden" name="id_edit" value="<?= $_SESSION['mcid'] ?>" />
             <div class="form-group">
               <label for="" style="font-weight:bolder;color:#000;">Calculation Name</label>
               <input type="text" class="form-control" name="cn_name" value="<?= $_SESSION['cln_name'] ?>">
             </div>
             <button type="submit" class="btn btn-info" name="button">EDIT</button>
       </form>
     <?php
        }
        else{
       ?>

              <form class="" action="backend/add_main_calc.php" method="post">
                    <div class="form-group">
                      <label for="" style="font-weight:bolder;color:#000;">Calculation Name</label>
                      <input type="text" class="form-control" name="cal_name" value="">
                    </div>

                <button type="submit" class="btn btn-info" name="button">ADD</button>
              </form>
              <?php
                }
                ?>
              <hr>
              <div class="row">
                <div class="col-lg-5">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="font-weight:bolder;color:#000;">Calculation Names list</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql ="SELECT * from tbl_calc_names";
                    if(mysqli_query($conn, $sql)){
                      $result=mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){
                        $oid = $row['cln_id'];
                        ?>
                    <tr>
                      <td style="font-weight:bold;color:#000;"><?php echo $row['cln_name']?></td>
                      <td>
                        <a href="sessions/ed_main_calc.php?id=<?= $oid ?>" class="btn btn-info btn-sm">EDIT</a>
                        <a href="backend/del_main_calc.php?cln_id=<?= $row['cln_id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
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
