<?php
  include 'admin/backend/conn.php';

  $hsid=$_REQUEST['id'];
//
  $sqlpdname ="SELECT * FROM tbl_pd_name";
  $rs= $conn->query($sqlpdname);

  $sqlcalname ="SELECT * FROM tbl_calc_names";
  $rscalname= $conn->query($sqlcalname);



 ?>
   <?php
   while ($rowpd = $rs->fetch_assoc()) {
      $pd_id= $rowpd['pd_id'];

      $sqlpdVal = "SELECT * FROM tbl_pd_value WHERE pd_id ='$pd_id' AND hs_sub_code='$hsid'";
      $rspdVal = $conn->query($sqlpdVal);

      $rowpdVal = $rspdVal->fetch_assoc();
      ?>
   <tr>
     <th scope="col"><?= $rowpd['pd_name'] ?></th>
     <td><?= $rowpdVal['pdv_value']."%" ?> </td>
   </tr>
 <?php } ?>
 <?php

 while ($row_cal = $rscalname->fetch_assoc()) {
   $clid = $row_cal['cln_id'];

  ?>
  <tr>
    <th><?= $row_cal['cln_name'] ?></th>
    <th>

    <?php
    $cktinc=0;
    $sqlunits = "SELECT * FROM tbl_units";
    $rsunits = $conn->query($sqlunits);
    if ($rsunits->num_rows > 0) {
     while ($rowunits = $rsunits->fetch_assoc()){
      $un_id = $rowunits['unit_id'];

      $sql_cal_val = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND unit_id='$un_id' AND hs_sub_code='$hsid'";
      $rs_cal_val = $conn->query($sql_cal_val);
      $row_cal_val = $rs_cal_val->fetch_assoc();

      $sql_cal_val_ck = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND hs_sub_code='$hsid'";
      $rs_cal_val_ck = $conn->query($sql_cal_val_ck);

      if ($rs_cal_val->num_rows > 0) {

        if ($rs_cal_val->num_rows == $cktinc) {
          if ($row_cal_val['cal_value'] != 0) {
            if ($un_id == 3) {
              echo $row_cal_val['cal_value']."%";
            }else {
              echo "Rs ".$row_cal_val['cal_value']." Per ".$rowunits['unit_name'];
            }
          }
      }else {
        if ($row_cal_val['cal_value'] != 0) {
        if ($un_id == 3) {
          echo $row_cal_val['cal_value']."% OR";
        }else {
          echo "Rs ".$row_cal_val['cal_value']." Per ".$rowunits['unit_name']." OR";
        }
       }
      }
      // elseif($rs_cal_val_ck->num_rows > 1){
      //   if ($un_id == 3) {
      //     echo $row_cal_val['cal_value']."% OR";
      //   }else {
      //     echo "Rs ".$row_cal_val['cal_value']." Per ".$rowunits['unit_name']." OR";
      //   }
      // }
      //  else {
      //    if ($row_cal_val['cal_value'] != NULL) {
      //      echo $row_cal_val['cal_value']."%";
      //    }
      //  }

      }

      ?>


  <?php  $cktinc++; } } ?>
    </th>
  </tr>
<?php } ?>

<?php
  $sqlexc = "SELECT * FROM tbl_excise WHERE hs_code = '$hsid'";
  $rsexc = $conn->query($sqlexc);
  $rsexc_check = $rsexc->num_rows;
  if ($rsexc_check != 0) {
 ?>
 <tr>
   <th>Excise</th>
   <th>
     <?php
     $sqlunits = "SELECT * FROM tbl_units";
     $rsunits = $conn->query($sqlunits);
     if ($rsunits->num_rows > 0) {
       $ckt=1;
      while ($rowunits = $rsunits->fetch_assoc()){
       $un_id = $rowunits['unit_id'];

       $sql_cal_val_ck = "SELECT * FROM tbl_excise WHERE un_id='$un_id' AND hs_code='$hsid'";
       $rs_cal_val_ck = $conn->query($sql_cal_val_ck);

       if ($rs_cal_val_ck->num_rows > 0) {
         $row_cal_val_ck=$rs_cal_val_ck->fetch_assoc();

         if ($rs_cal_val_ck->num_rows == $ckt && $rs_cal_val_ck->num_rows > 1) {
           if ($row_cal_val_ck['exci_val'] != 0) {
             if ($un_id == 3) {
               echo $row_cal_val_ck['exci_val']."%";
             }else {
               echo "Rs ".$row_cal_val_ck['exci_val']." Per ".$rowunits['unit_name'];
             }
           }
       }
       else {
         if ($row_cal_val_ck['exci_val'] != 0) {
         if ($un_id == 3) {
           echo $row_cal_val_ck['exci_val']."% OR";
         }else {
           echo "Rs ".$row_cal_val_ck['exci_val']." Per ".$rowunits['unit_name']." OR";
         }
        }
       }
       }
     $ckt++;}
   }
      ?>
   </th>
 </tr>
<?php }else {
  $sqlexc = "SELECT * FROM tbl_ex_ranges WHERE hs_sub_code = '$hsid'";
  $rsexc = $conn->query($sqlexc);
  $rsexc_check = $rsexc->num_rows;
  if ($rsexc_check != 0) {
  ?>
  <tr>
    <th style="text-align: center; vertical-align: middle;">Excise</th>

    <th>
      <?php
        while ($rowexrange =  $rsexc->fetch_assoc()) {
       ?>
      <?= $rowexrange['r_from'] ?> cm<sup>3</sup>  &#60;x&#60;  <?= $rowexrange['r_to'] ?>cm<sup>3</sup> = Rs.<?= $rowexrange['r_value'] ?>/- Per cm<sup>3</sup>
        <hr style="border:1px solid #000;">
    <?php } ?>
  </th>
  </tr>
<?php } } ?>
