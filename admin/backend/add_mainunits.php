<?php
    include "conn.php"
?>

<?php
    $un_name = $_REQUEST["u_name"];

    $sql = "INSERT INTO tbl_units(unit_name) VALUES ('$un_name')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../mainunits.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../mainunits.php");
      exit();
    }
?>
