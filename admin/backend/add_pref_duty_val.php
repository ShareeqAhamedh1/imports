<?php
include "conn.php";
$pdtot = $_REQUEST['pdtot'];

$hscode =preg_replace('/\s+/', '',$_REQUEST['hs_sub_code']);

for($i=0;$i < $pdtot;$i++) {
  if (!isset($_REQUEST['pdnameid'.$i])) {
    continue;
  }
  else {
    $uct = $_REQUEST['uni_count_tot'.$i];
    $pd_name_id =$_REQUEST['pdnameid'.$i];
    for($c=0;$c < $uct;$c++) {
      if (!isset($_REQUEST['unit'.$i.$c])) {
        continue;
      }
      else {
        $units_id = $_REQUEST['unit'.$i.$c];
        $unit_val = $_REQUEST['pre_val'.$i.$c];

        $sql = "INSERT INTO tbl_pref_multi_value(cal_val,hs_code,unit_id,pref_duty_name_id) VALUES ('$unit_val','$hscode','$units_id','$pd_name_id')";
        $rs=$conn->query($sql);
      }
    }
  }


}


header('location:../pref_duty_val.php');
exit();
