<?php
include "../backend/conn.php";

$_SESSION['pf_edit'] =true;
$_SESSION['pfid'] = $_REQUEST['id'];

$id = $_REQUEST['id'];
$sql ="SELECT * from tbl_pd_name WHERE pd_id = '$id'";
$rs = $conn->query($sql);

$row = $rs->fetch_assoc();

$_SESSION['pd_name'] = $row['pd_name'];

header('location:../pref_duty.php');
exit();
 ?>
