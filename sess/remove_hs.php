<?php
  include '../admin/backend/conn.php';


  $hs_id = $_REQUEST['hs_id'];
  $userid = $_SESSION['user_buc'];
  // unset($_SESSION['i_count']);


  $sqlbuc= "SELECT * FROM tbl_hs_bucket WHERE hs_buc_id='$hs_id'";
  $rsbuc = $conn->query($sqlbuc);

  $rsbuctot = $rsbuc->num_rows;



  $rowbuc = $rsbuc->fetch_assoc();


  $hsc = $rowbuc['hs_code'];


  $sql = "DELETE FROM tbl_hs_bucket WHERE hs_buc_id='$hs_id' AND u_id='$userid'";
  $rs = $conn->query($sql);

  $sql = "DELETE FROM tbl_hs_buc_val WHERE hs_code='$hsc' AND u_id='$userid'";
  $rs = $conn->query($sql);

  $sql = "DELETE FROM tbl_cal_res WHERE hs_code='$hsc' AND u_id='$userid'";
  $rs = $conn->query($sql);
 ?>
