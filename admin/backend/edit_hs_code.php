<?php
    include "conn.php";
?>

<?php

    $hs_iid = $_REQUEST["hs_iid"];
    $hs_code  = $_REQUEST["hsm_code"];
    $hs_desc  = $_REQUEST["hsm_description"];
    $hs_level = $_REQUEST['sel_sub'];

    $reloc = $_SESSION['re_loc'];

    if (isset($_REQUEST['ckemp'])) {
      $checkLevel = $_REQUEST['ckemp'];
    }
    else {
      $checkLevel = 0;
    }

    $sql = "UPDATE tbl_hs_sub SET hs_sub_code='$hs_code',
                                  hs_level='$hs_level',
                                  hs_sub_name='$hs_desc',
                                  emp ='$checkLevel'
                                   WHERE hs_sub_id='$hs_iid'";
    $rs = $conn->query($sql);


    if($rs > 0){
      $_SESSION['up_succ'] = true;
      header ("Location:../view_hs_sub.php?hs_id=".$reloc);
      // unset($_SESSION['main_edit']);
      exit();
    }
    else{
      $_SESSION['up_fail'] = true;
      header ("Location:../view_hs_sub.php?hs_id=".$reloc);
      // unset($_SESSION['main_edit']);
      exit();
    }
?>
