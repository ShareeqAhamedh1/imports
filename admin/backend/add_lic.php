<?php
    include "conn.php"
?>

<?php
    $lic_name = preg_replace('/\s+/', '',$_REQUEST["lic_name"]);
    $hs_code = mysqli_real_escape_string($conn,preg_replace('/\s+/', '',$_REQUEST["hs_code"]));

    $sql = "INSERT INTO tbl_lic(lic_name, hs_code) VALUES ('$lic_name', '$hs_code')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../lic_info.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../lic_info.php");
      exit();
    }
?>
