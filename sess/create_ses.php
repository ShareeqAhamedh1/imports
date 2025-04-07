<?php
  include '../admin/backend/conn.php';


  $hs_code = $_REQUEST['hs_code'];
  $userid = $_SESSION['user_buc'];
  // unset($_SESSION['i_count']);

  $sql = "SELECT * FROM tbl_cal_res WHERE u_id = '$userid'";
  $rs = $conn->query($sql);

  if ($rs->num_rows > 0) {
    $sql = "DELETE FROM tbl_hs_buc_val WHERE  u_id='$userid'";
    $rs = $conn->query($sql);

    $sql = "DELETE FROM tbl_cal_res WHERE u_id='$userid'";
    $rs = $conn->query($sql);
  }

unset($_SESSION['cal_set']);

  $sql = "INSERT INTO tbl_hs_bucket(hs_code,u_id) VALUES ('$hs_code','$userid')";
  $rs = $conn->query($sql);

 ?>
