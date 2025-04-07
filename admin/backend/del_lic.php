<?php
    include "conn.php"
?>

<?php
    $id = $_GET["id"];

    $sql = "DELETE FROM tbl_lic WHERE lic_id = '$id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../lic_info.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../lic_info.php");
      exit();
    }
?>
