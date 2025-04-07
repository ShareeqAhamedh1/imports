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

              <div class="row">
                <div class="col-lg-12">
                  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="font-weight:bolder;color:#000;">HS CODE</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="font-weight:bold;color:#000;"></td>
      </tr>

    </tbody>
  </table>
                </div>
              </div>
            </div>
        </div>
<?php
    include 'layout/footer.php';
?>
