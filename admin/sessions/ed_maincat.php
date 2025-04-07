<?php
include "../backend/conn.php";

$_SESSION['main_edit'] =true;
$_SESSION['mainid'] = $_REQUEST['id'];

$id = $_REQUEST['id'];
$sql ="SELECT * from tbl_hs_main_cat WHERE hmc_id = '$id'";
$rs = $conn->query($sql);

$row = $rs->fetch_assoc();

$_SESSION['hmc_code'] = $row['hmc_code'];
$_SESSION['hmc_desc'] = $row['hmc_desc'];

header('location:../maincat.php');
exit();
 ?>
