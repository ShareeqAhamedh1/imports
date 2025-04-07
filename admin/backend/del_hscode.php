<?php
    include "conn.php"
?>

<?php
    $id = $_GET["id"];

    $sql = "DELETE FROM tbl_hs_code WHERE hsm_id = '$id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../index.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../index.php");
      exit();
    }
?>
