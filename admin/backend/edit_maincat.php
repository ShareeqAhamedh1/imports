<?php
    include "conn.php";
?>

<?php

    $id_edit = $_REQUEST["id_edit"];
    $hs_code  = $_REQUEST["hs_code"];
    $hs_desc  = $_REQUEST["hs_desc"];

    $sql = "UPDATE tbl_hs_main_cat SET hmc_code='$hs_code', hmc_desc='$hs_desc' WHERE hmc_id='$id_edit'";
    $rs = $conn->query($sql);
    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../maincat.php");
      unset($_SESSION['main_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../maincat.php");
      unset($_SESSION['main_edit']);
      exit();
    }
?>
