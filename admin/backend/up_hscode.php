<?php
include "conn.php";

$hscode = $_REQUEST['hs_code'];
$hsdesc = $_REQUEST['desc'];




$fileName = "hsimage";
$filetemp = $imgTempName = $_FILES[$fileName]['tmp_name'];

if ($filetemp == "") {
  $newname = "empty.png";
}
else {
  $filePath = "../hsimages/";
  $allowedList = array('jpg','jpeg','png');
  $errorLocation="../index.php";

  uploadImage($fileName,$filePath,$allowedList,$errorLocation);

  $newname = $GLOBALS['fileNameNew'];
}



$sql = "INSERT INTO tbl_hs_code(hs_code,hs_description,hs_image) VALUES ('$hscode','$hsdesc','$newname')";
$rs = $conn->query($sql);

if ($rs > 0) {
  header('location:../index.php?succ');
  $_SESSION['added'] = true;
  exit();
}else {
  header('location:../index.php?error');
  exit();
}
 ?>
