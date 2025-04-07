<?php
    include "conn.php"
?>

<?php
    $cc_code = mysqli_real_escape_string($conn,$_REQUEST["cc_code"]);
    $cc_name = mysqli_real_escape_string($conn,$_REQUEST["cc_name"]);
    $cc_rate = mysqli_real_escape_string($conn,$_REQUEST["cc_rate"]);

    $sql = "INSERT INTO currency(currency_code,currency_name,c_name) VALUES ('$cc_code', '$cc_name','$cc_rate')";
    if(mysqli_query($conn, $sql)){
      $_SESSION['ins_succ']= true;
      header ("Location:../a_curr_rate.php");
      exit();
    }
    else{
      $_SESSION['ins_fail']= true;
      header ("Location:../a_curr_rate.php");
      exit();
    }
?>
