<?php
include "conn.php";
$caln = $_REQUEST['calc_count'];
$u_tot = $_REQUEST['u_tot'];
$tot_units = $_REQUEST['tot_unit'];
$pdtot = $_REQUEST['pdtot'];
$hscode =$_REQUEST['hs_code'];


$sql = "DELETE FROM tbl_main_calc WHERE hs_sub_code = '$hscode'";
$rs =$conn->query($sql);

$sql = "DELETE FROM tbl_pd_value WHERE hs_sub_code = '$hscode'";
$rs =$conn->query($sql);

$sql = "DELETE FROM tbl_excise WHERE hs_code = '$hscode'";
$rs =$conn->query($sql);

$sql = "DELETE FROM tbl_ex_ranges WHERE hs_sub_code = '$hscode'";
$rs =$conn->query($sql);

for($c=0;$c < $u_tot;$c++) {
  if (!isset($_REQUEST['unit'.$c])) {
    continue;
  }
  else {
    $units_id = $_REQUEST['unit'.$c];
    $unit_val = $_REQUEST['valunit'.$c];
    $cal_id = $_REQUEST['cal_name_id'.$c];

    $sql = "INSERT INTO tbl_main_calc(cal_value,cal_n_id,hs_sub_code,unit_id) VALUES ('$unit_val','$cal_id','$hscode','$units_id')";
    $rs=$conn->query($sql);
  }
}

for($c=0;$c < $pdtot;$c++) {
  if (!isset($_REQUEST['pdnameid'.$c])) {
    continue;
  }
  else {
    $pd_id = $_REQUEST['pdnameid'.$c];
    $pd_val = $_REQUEST['pdval'.$c];


    $sql = "INSERT INTO tbl_pd_value(pdv_value,pd_id,hs_sub_code) VALUES ('$pd_val','$pd_id','$hscode')";
    $rs=$conn->query($sql);
  }
}

//tested--------------------------------------------------

if ($excise == 0) {
  $uxtot = $_REQUEST['uexctot'];

  for($c=0;$c < $uxtot;$c++) {
    if (!isset($_REQUEST['uex'.$c])) {
      continue;
    }
    else {
      $units_id = $_REQUEST['uex'.$c];
      $unit_val = $_REQUEST['uexval'.$c];

      $sql = "INSERT INTO tbl_excise(exci_val,un_id,hs_code) VALUES ('$unit_val','$units_id','$hscode')";
      $rs=$conn->query($sql);
    }
  }
}
else {
  $totranges = $_REQUEST['tot_ranges'];

  for ($i=1; $i <= $totranges ; $i++) {
    $fromrange = $_REQUEST['from-range'.$i];
    $torange =$_REQUEST['to-range'.$i];
    $value =$_REQUEST['exrangval'.$i];

    $sql = "INSERT INTO tbl_ex_ranges(hs_sub_code,r_from,r_to,r_value) VALUES ('$hscode','$fromrange','$torange','$value')";
    $rs=$conn->query($sql);
  }
}

if (isset($_REQUEST['scl_val'])){
  $sclval = $_REQUEST['scl_val'];

  $sql = "INSERT INTO tbl_scl(scl_value,hs_code) VALUES ('$sclval','$hscode')";
  $rs=$conn->query($sql);
}

header('location:../maincat.php');
exit();



 ?>
