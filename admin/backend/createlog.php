<?php
session_start();
$_SESSION['clog'] = true;
header('location:../index.php');
exit();

 ?>
