<?php
include 'admin/backend/conn.php';

$amnt = $_REQUEST['amnt'];
$code= $_REQUEST['ccode']."_LKR";


$sql_all = "SELECT * FROM `currency`";
$rs_all = $conn->query($sql_all);

$row_rate = $rs_all->fetch_assoc();
// echo "$api_url";
 ?>

<span> Exchange Rate : LKR <?= $row_rate['c_name'] ?> </span>

<script type="text/javascript">
  document.getElementById('tot_price').value='<?= $row_rate['c_name'] * $amnt; ?>';
</script>
