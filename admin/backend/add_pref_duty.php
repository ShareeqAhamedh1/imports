<?php
    include "conn.php"
?>

<?php
    $pre_name = $_REQUEST["pre_duty"];

    $sql = "INSERT INTO tbl_pd_name(pd_name) VALUES ('$pre_name')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../pref_duty.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../pref_duty.php");
      exit();
    }
?>
