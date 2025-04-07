<?php
  include '../admin/backend/conn.php';


  $user = $_SESSION['user_buc'];
 $hs_buc_id = $_REQUEST['hscode'];



  $sqlbuc= "SELECT * FROM tbl_hs_bucket WHERE u_id='$user'";
  $rsbuc = $conn->query($sqlbuc);

  $rsbuctot = $rsbuc->num_rows;

  $rowbuc = $rsbuc->fetch_assoc();

  $hsbid = $rowbuc['hs_buc_id'];
  $hscode = $rowbuc['hs_code'];

  $tot_cif = $_REQUEST['tot_cif'];
  $tot_qnty = $_REQUEST['tot_qnty'];
  $duty = $_REQUEST['duty'];

  $sqlin = "INSERT INTO tbl_hs_buc_val (buc_v_tot_cif,buc_v_tot_qnty,buc_v_duty,u_id,hs_code) VALUES ('$tot_cif','$tot_qnty','$duty','$user','$hscode')";
  $rsin = $conn->query($sqlin);



  $sqldel = "DELETE FROM tbl_hs_bucket WHERE hs_buc_id='$hs_buc_id'";
  $rsdel = $conn->query($sqldel);


  if ($rsbuctot > 1) {
    header('location:../calc_tot.php');
    exit();
  }
  else {
    header('location:../cal_results_tot.php');
    exit();
  }



 ?>
