<?php
include "../backend/conn.php";

$_SESSION['unit_edit'] =true;
$_SESSION['uid'] = $_REQUEST['id'];

$id = $_REQUEST['id'];
$sql ="SELECT * from tbl_units WHERE unit_id = '$id'";
$rs = $conn->query($sql);

$row = $rs->fetch_assoc();

$_SESSION['unit_name'] = $row['unit_name'];

header('location:../mainunits.php');
exit();
 ?>
