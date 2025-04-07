<?php
  include 'admin/backend/conn.php';

  $id=$_REQUEST['id'];
//
  $sql ="SELECT * FROM tbl_hs_code WHERE hsm_id = '$id'";
  $rs= $conn->query($sql);

  $rowhs = $rs->fetch_assoc();
 ?>
 <div class="modal-header">
   <h5 class="modal-title" id="exampleModalLabel">Image of <?= $rowhs['hs_code']." | ".$rowhs['hs_description'] ?></h5>
   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 <div class="modal-body">
   <img src="admin/hsimages/<?= $rowhs['hs_image'] ?>" alt="" style="width:80%;">
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 </div>
