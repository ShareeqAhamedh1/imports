<?php
    include "conn.php"
?>

<?php
    $cl_id = $_GET["cln_id"];

    $sql = "DELETE FROM tbl_calc_names WHERE cln_id = '$cl_id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../main_calc.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../main_calc.php");
      exit();
    }
?>
