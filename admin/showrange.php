<?php
  include 'backend/conn.php';
 $range = $_REQUEST['ranges'];
?>
<?php for ($i=1; $i <= $range; $i++) {?>
<div style="font-weight:bold;">
  #<?= $i ?>
</div>
<div class="form-group">
    <label for="">From</label>
    <input type="text" class="form-control" name="from-range<?= $i ?>" value="" placeholder="">
</div>
<div class="form-group">
    <label for="">To</label>
    <input type="text" class="form-control" name="to-range<?= $i ?>" value="" placeholder="">
</div>
<div class="form-group">
  <label for="">Value</label>
  <input type="text" name="exrangval<?= $i ?>" value="" class="form-control">
</div>
<?php } ?>
