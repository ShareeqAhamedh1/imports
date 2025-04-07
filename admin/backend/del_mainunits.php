<?php
    include "conn.php"
?>

<?php
    $un_id = $_GET["unit_id"];

    $sql = "DELETE FROM tbl_units WHERE unit_id = '$un_id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../mainunits.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../mainunits.php");
      exit();
    }
?>
