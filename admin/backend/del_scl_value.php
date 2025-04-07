<?php
    include "conn.php";

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM tbl_scl WHERE scl_id = '$id'";
    $rs =$conn->query($sql);

    header('location:../add_scl.php');
    exit();
