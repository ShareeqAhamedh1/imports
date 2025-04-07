<?php
    include "conn.php";
?>

<?php

    $id_edit = $_REQUEST["id_edit"];
    $cn_name  = $_REQUEST["cn_name"];

    $sql = "UPDATE tbl_calc_names SET cln_name='$cn_name' WHERE cln_id='$id_edit'";
    $rs = $conn->query($sql);
    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../main_calc.php");
      unset($_SESSION['mc_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../main_calc.php");
      unset($_SESSION['mc_edit']);
      exit();
    }
?>
