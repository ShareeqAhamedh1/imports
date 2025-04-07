<?php
    include "conn.php"
?>

<?php
    $hm_code = $_REQUEST["hsm_code"];
    $hm_desc = mysqli_real_escape_string($conn,$_REQUEST["hsm_description"]);

    $sql = "INSERT INTO tbl_hs_main_cat(hmc_code, hmc_desc) VALUES ('$hm_code', '$hm_desc')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../maincat.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../maincat.php");
      exit();
    }
?>
