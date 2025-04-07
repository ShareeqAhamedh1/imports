<?php
    include "conn.php";
?>

<?php

$id = $_REQUEST['id'];
$lic_name = $_REQUEST["lic_name"];
$hs_code = mysqli_real_escape_string($conn,$_REQUEST["hs_code"]);

    $sql = "UPDATE tbl_lic SET lic_name='$lic_name',hs_code='$hs_code' WHERE lic_id='$id'";
    $rs = $conn->query($sql);

    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../lic_info.php");
      unset($_SESSION['unit_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../lic_info.php");
      unset($_SESSION['unit_edit']);
      exit();
    }
?>
