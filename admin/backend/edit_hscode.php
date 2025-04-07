<?php
    include "conn.php";
?>

<?php

    $id = $_GET["id"];
    $hs_code  = $_REQUEST["hs_code_ed"];
    $hs_desc  = $_REQUEST["hs_code_desc"];

    $sql = "UPDATE tbl_hs_code SET hs_code='$hs_code', hs_description='$hs_desc' WHERE hsm_id='$id'";
    $rs = $conn->query($sql);
    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../index.php");
      // unset($_SESSION['main_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../index.php");
      // unset($_SESSION['main_edit']);
      exit();
    }
?>
