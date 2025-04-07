<?php
    include "conn.php"
?>

<?php
    $hm_id = $_GET["hmc_id"];



    $sqlsub = "SELECT * FROM tbl_hs_sub WHERE hmc_id='$hm_id'";
    $rssub =$conn->query($sqlsub);
    if ($rssub->num_rows > 0) {
      $rowsub = $rssub->fetch_assoc();
      $hsid=$rowsub['hs_sub_code'];
      $code = $rowsub['hs_sub_id'];

      $sqldelcal = "DELETE FROM tbl_main_calc WHERE hs_sub_code='$hsid'";
      $rsdelcal = $conn->query($sqldelcal);

      $sqldelcal = "DELETE FROM tbl_pd_value WHERE hs_sub_code='$hsid'";
      $rsdelcal = $conn->query($sqldelcal);

      $sqldelcal = "DELETE FROM tbl_ex_ranges WHERE hs_sub_code='$hsid'";
      $rsdelcal = $conn->query($sqldelcal);

      $sqldelcal = "DELETE FROM tbl_excise WHERE hs_code='$hsid'";
      $rsdelcal = $conn->query($sqldelcal);

      $sqldelcal = "DELETE FROM tbl_scl WHERE hs_code='$hsid'";
      $rsdelcal = $conn->query($sqldelcal);
    }

    $sqldel ="DELETE FROM tbl_hs_sub WHERE hmc_id='$hm_id'";
    $rsdel=$conn->query($sqldel);

    $sql = "DELETE FROM tbl_hs_main_cat WHERE hmc_id = '$hm_id'";
    if(mysqli_query($conn, $sql)){
      $_SESSION['del_succ']= true;
      header ("Location:../maincat.php");
      exit();
    }
    else{
      $_SESSION['del_fail']= true;
      header ("Location:../maincat.php");
      exit();
    }
?>
