<?php
    include "conn.php";
?>

<?php

    $id_edit = $_REQUEST["id_edit"];
    $u_name  = $_REQUEST["u_name"];

    $sql = "UPDATE tbl_units SET unit_name='$u_name' WHERE unit_id='$id_edit'";
    $rs = $conn->query($sql);
    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../mainunits.php");
      unset($_SESSION['unit_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../mainunits.php");
      unset($_SESSION['unit_edit']);
      exit();
    }
?>
