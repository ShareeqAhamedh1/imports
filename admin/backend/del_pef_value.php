<?php
    include "conn.php"
?>

<?php
    $un_id = $_GET["id"];


    $sql = "DELETE FROM tbl_pref_multi_value WHERE pmv_id = '$un_id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../pref_duty_val.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../pref_duty_val.php");
      exit();
    }
?>
