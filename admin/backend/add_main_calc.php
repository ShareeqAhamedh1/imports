<?php
    include "conn.php"
?>

<?php
    $cal_nme = $_REQUEST["cal_name"];

    $sql = "INSERT INTO tbl_calc_names(cln_name) VALUES ('$cal_nme')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../main_calc.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../main_calc.php");
      exit();
    }
?>
