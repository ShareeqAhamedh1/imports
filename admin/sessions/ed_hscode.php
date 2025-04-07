<?php
include "../backend/conn.php";

$_SESSION['mc_edit'] =true;
$_SESSION['mcid'] = $_REQUEST['id'];

$id = $_REQUEST['id'];
$sql ="SELECT * from tbl_calc_names WHERE cln_id = '$id'";
$rs = $conn->query($sql);

$row = $rs->fetch_assoc();

$_SESSION['cln_name'] = $row['cln_name'];

header('location:../main_calc.php');
exit();
 ?>
