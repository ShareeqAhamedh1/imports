<?php
  include '../admin/backend/conn.php';

  $userid = $_SESSION['user_buc'];

    $sql ="SELECT * FROM tbl_hs_bucket WHERE u_id='$userid'";
    $rs = $conn->query($sql);

    echo $rs->num_rows;

 ?>
