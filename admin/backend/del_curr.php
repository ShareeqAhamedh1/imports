<?php
    include "conn.php"
?>

<?php
    $id = $_GET["id"];


    $sqldel ="DELETE FROM currency WHERE id='$id'";
    $rsdel=$conn->query($sqldel);

    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../a_curr_rate.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../a_curr_rate.php");
      exit();
    }
?>
