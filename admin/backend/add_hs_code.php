<?php
include "conn.php";


$hs_code=$_SESSION['hs_main'];

$hs_sub_code = preg_replace('/\s+/', '',$_REQUEST['hsm_code']);
$hs_name = $conn->real_escape_string($_REQUEST['hsm_description']);
$sel_sub = $_REQUEST['sel_sub'];

if (isset($_REQUEST['ckemp'])) {
  $checked = 1;
}
else {
  $checked = 0;
}



if (isset($_REQUEST['reset'])) {
  unset($_SESSION['s2']);
  unset($_SESSION['s3']);
  unset($_SESSION['s4']);
  unset($_SESSION['get_duty']);
  header('location:../hs_sub.php');
  exit();
}



if($sel_sub == "s1") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','1','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
  }
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['s2'] = true;
}
elseif ($sel_sub == "sw1") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','1','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
}
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['get_duty']=true;
}

if($sel_sub == "s2") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','2','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
 }
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['s3'] = true;
  unset($_SESSION['s2']);
}
elseif ($sel_sub == "sw2") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','2','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
}
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['get_duty']=true;
}

if($sel_sub == "s3") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','3','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
}
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['s4'] = true;
  unset($_SESSION['s3']);
}
if($sel_sub == "sw3") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','3','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
}
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['get_duty']=true;
}

if ($sel_sub == "sw4") {
  if(!empty($hs_name)){
  $sqlHsSub = "INSERT INTO tbl_hs_sub (hs_sub_code,hs_level,hs_sub_name,hmc_id,emp) VALUES ('$hs_sub_code','4','$hs_name','$hs_code','$checked')";
  $rsHsSub = $conn->query($sqlHsSub);
}
  $_SESSION['hs_sub_code'] = $hs_sub_code;
  $_SESSION['get_duty']=true;
}


header('location:../hs_sub.php');
exit();

 ?>
