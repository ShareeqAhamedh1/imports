<?php
    include "conn.php"
?>

<?php
    $prd_id = $_GET["pd_id"];

    $sql = "DELETE FROM tbl_pd_name WHERE pd_id = '$prd_id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../pref_duty.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../pref_duty.php");
      exit();
    }
?>
