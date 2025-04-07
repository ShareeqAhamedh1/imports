<?php
include "conn.php";

$tot_units = $_REQUEST['uni_count_tot'];
$hscode =$_REQUEST['hs_sub_code'];

$i = 1;
while($i <= $tot_units){

  if(isset($_REQUEST['unit'.$i])){
    $unit_id = $_REQUEST['unit'.$i];
    $val = $_REQUEST['pre_val'.$i];

    $sqlInsert = "INSERT INTO tbl_scl(scl_value,unit_id,hs_code) VALUES ('$val','$unit_id','$hscode')";
    $rsInsert = $conn->query($sqlInsert);
  }
  $i++;
}

header('location:../add_scl.php');
exit();

 ?>
