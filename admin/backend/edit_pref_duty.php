<?php
    include "conn.php";
?>

<?php

    $id_edit = $_REQUEST["id_edit"];
    $p_name  = $_REQUEST["p_name"];

    $sql = "UPDATE tbl_pd_name SET pd_name='$p_name' WHERE pd_id='$id_edit'";
    $rs = $conn->query($sql);
    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../pref_duty.php");
      unset($_SESSION['pf_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../pref_duty.php");
      unset($_SESSION['pf_edit']);
      exit();
    }
?>
