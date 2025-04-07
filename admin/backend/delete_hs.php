<?php
    include "conn.php"
?>

<?php
    $hscode = $_REQUEST['hscode'];
    $hsid = $_REQUEST['hs_id'];
    $hs_real = $_REQUEST['hs_real'];

    $sql = "DELETE FROM tbl_hs_sub WHERE hs_sub_id = '$hs_real'";
    $rs =$conn->query($sql);

    $sql = "DELETE FROM tbl_main_calc WHERE hs_sub_code = '$hscode'";
    $rs =$conn->query($sql);

    $sql = "DELETE FROM tbl_pd_value WHERE hs_sub_code = '$hscode'";
    $rs =$conn->query($sql);

    $sql = "DELETE FROM tbl_excise WHERE hs_code = '$hscode'";
    $rs =$conn->query($sql);

    $sql = "DELETE FROM tbl_ex_ranges WHERE hs_sub_code = '$hscode'";
    $rs =$conn->query($sql);

    header('location:../view_hs_sub.php?hs_id='.$hsid);
    exit();

?>
