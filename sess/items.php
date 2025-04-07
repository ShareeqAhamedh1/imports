<?php
  include '../admin/backend/conn.php';

  $userid = $_SESSION['user_buc'];

    $sql ="SELECT * FROM tbl_hs_bucket WHERE u_id='$userid'";
    $rs = $conn->query($sql);

    $tot = $rs->num_rows;

?>

<span id="close_drop" style="cursor:pointer;" onclick="window.location.reload();"> &nbsp; x </span>
<?php
    if($rs->num_rows > 0){
      $i=1;
    while ($row = $rs->fetch_assoc()) {

      ?>
      <div class="text-center">
      &nbsp; <span style="font-weight:bold;">[<?= $i ?>]&nbsp; &nbsp;</span>  <a class="dropdown-item" style="font-weight:normal;"><?= $row['hs_code'] ?></a> <div  class="btn btn-danger" onclick="remove_hs('<?= $row['hs_buc_id'] ?>')" >-</div> <br><br>
      <?php
    $i++; }
?>


</div>
&nbsp; <a href="calc_tot?tot_it=<?= $tot ?>" class="btn btn-primary" style="background-color:#d8d606;text-transform:capitalize;color:#fff;position:fixed;top:0;">Calculate</a>
<?php
  }

 ?>
