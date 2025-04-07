<?php
  include 'admin/backend/conn.php';

  $hsid=$_REQUEST['id'];
//
  $sqlpdname ="SELECT * FROM tbl_pd_name";
  $rs= $conn->query($sqlpdname);

  $sqlcalname ="SELECT * FROM tbl_calc_names";
  $rscalname= $conn->query($sqlcalname);



 ?>

 <table class="table">
 <tbody>
   <tr>
     <td style="font-weight:bold;" id="text_pd" colspan="2">Preferential Duty</td>
   </tr>
   <?php

   $sql_multi_pref = "SELECT * FROM tbl_pref_multi_value WHERE hs_code='$hsid'";
   $rs_multi_pref = $conn->query($sql_multi_pref);
   if ($rs_multi_pref->num_rows > 0) {
     ?>
     <?php
     $incTextNew= 1;
     while ($row_cal = $rs->fetch_assoc()) {
       $clid = $row_cal['pd_id'];

      ?>
      <tr>
        <th><?= $row_cal['pd_name'] ?></th>
        <th style="font-weight:bold;color:#000;">
          <span id="text_remove_new<?= $incTextNew ?>">
        <?php
        $cktinc=0;
        $sqlunits = "SELECT * FROM tbl_units";
        $rsunits = $conn->query($sqlunits);
        if ($rsunits->num_rows > 0) {
          $addor = 0;
         while ($rowunits = $rsunits->fetch_assoc()){
          $un_id = $rowunits['unit_id'];

          $sql_cal_val = "SELECT * FROM tbl_pref_multi_value WHERE pref_duty_name_id='$clid' AND unit_id='$un_id' AND hs_code='$hsid' ORDER BY `tbl_pref_multi_value`.`pmv_id` DESC";
          $rs_cal_val = $conn->query($sql_cal_val);
          $row_cal_val = $rs_cal_val->fetch_assoc();

          $sql_cal_val_ck = "SELECT * FROM tbl_pref_multi_value WHERE pref_duty_name_id='$clid' AND hs_code='$hsid' ORDER BY `tbl_pref_multi_value`.`pmv_id` DESC";
          $rs_cal_val_ck = $conn->query($sql_cal_val_ck);

          if ($rs_cal_val->num_rows > 0) {

            if ($rs_cal_val_ck->num_rows > 0) {
              if ($row_cal_val['cal_val'] != 0) {
                if ($row_cal_val['cal_val'] == 1001) {
                  echo "FREE";
                }
                elseif ($row_cal_val['cal_val'] == 9001) {
                  echo "Ex";
                }
                else if ($un_id == 3) {
                  echo $row_cal_val['cal_val']."%";
                }else {
                  echo "Rs. ".$row_cal_val['cal_val']."/= per ".$rowunits['unit_name']." or ";
                }
              }
          }else {
            if ($row_cal_val['cal_val'] != 0) {
              if ($row_cal_val['cal_val'] == 1001) {
                echo "FREE";
              }
              elseif ($row_cal_val['cal_val'] == 9001) {
                echo "Ex";
              }
              else if($un_id == 3) {
                echo $row_cal_val['cal_val']."% or";
              }
            else {
              echo "Rs. ".$row_cal_val['cal_val']."/= per ".$rowunits['unit_name']." or";
            }
           }
          }

          }

          ?>


      <?php  $cktinc++; } } ?>
        </span>
        </th>
      </tr>
      <script type="text/javascript">
        var textNew = document.getElementById('text_remove_new<?=$incTextNew?>').innerHTML;

        var textNew = textNew.trim();

        var textNewLast = textNew.charAt(textNew.length - 1);
        if(textNewLast == 'r'){

        var newText = textNew.replace("or",'');

        document.getElementById('text_remove_new<?=$incTextNew?>').innerHTML=newText;

        var changedText  = document.getElementById('text_remove_new<?=$incTextNew?>').innerHTML;
        }
      </script>
     <?php $incTextNew++;} ?>

     <?php
    }
   else {
   $xsss = 0;
   while ($rowpd = $rs->fetch_assoc()) {

      $pd_id= $rowpd['pd_id'];

      $sqlpdVal = "SELECT * FROM tbl_pd_value WHERE pd_id ='$pd_id' AND hs_sub_code='$hsid'";
      $rspdVal = $conn->query($sqlpdVal);

      $rowpdVal = $rspdVal->fetch_assoc();
      ?>
      <?php if ($rowpdVal['pdv_value'] != 0): ?>
        <?php $xsss++; ?>
        <tr>
          <th style="font-weight:normal;" scope="col">&nbsp;&nbsp;&nbsp;<?= $rowpd['pd_name'] ?></th>
          <td style="font-weight:bold;color:#000;">
            <?php if ($rowpdVal['pdv_value'] == 1001){ ?>
             <?php echo "FREE"; ?>
          <?php }elseif( $rowpdVal['pdv_value'] == 9001){ ?>
              <?php echo "Ex"; ?>
          <?php }else{ ?>
             <?= $rowpdVal['pdv_value']."%" ?>
          <?php } ?> </td>
        </tr>
      <?php endif; ?>

 <?php  } ?>
 <?php if ($xsss == 0): ?>
   <script type="text/javascript">
     document.getElementById('text_pd').innerHTML='';
   </script>
 <?php endif; ?>
<?php } ?>
<!-- end of pref duty -->

 <?php
 $incText= 1;
 while ($row_cal = $rscalname->fetch_assoc()) {
   $clid = $row_cal['cln_id'];

  ?>
  <tr>
    <th><?= $row_cal['cln_name'] ?></th>
    <th style="font-weight:bold;color:#000;">
      <span id="text_remove<?= $incText ?>">
    <?php
    $cktinc=0;
    $sqlunits = "SELECT * FROM tbl_units";
    $rsunits = $conn->query($sqlunits);
    if ($rsunits->num_rows > 0) {
      $addor = 0;
     while ($rowunits = $rsunits->fetch_assoc()){
      $un_id = $rowunits['unit_id'];

      $sql_cal_val = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND unit_id='$un_id' AND hs_sub_code='$hsid'";
      $rs_cal_val = $conn->query($sql_cal_val);
      $row_cal_val = $rs_cal_val->fetch_assoc();

      $sql_cal_val_ck = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND hs_sub_code='$hsid'";
      $rs_cal_val_ck = $conn->query($sql_cal_val_ck);

      if ($rs_cal_val->num_rows > 0) {

        if ($rs_cal_val_ck->num_rows > 0) {
          if ($row_cal_val['cal_value'] != 0) {
            if ($row_cal_val['cal_value'] == 1001) {
              echo "FREE";
            }
            elseif ($row_cal_val['cal_value'] == 9001) {
              echo "Ex";
            }
            else if ($un_id == 3) {
              echo $row_cal_val['cal_value']."%";
            }else {
              echo "Rs. ".$row_cal_val['cal_value']."/= per ".$rowunits['unit_name']." or ";
            }
          }
      }else {
        if ($row_cal_val['cal_value'] != 0) {
          if ($row_cal_val['cal_value'] == 1001) {
            echo "FREE";
          }
          elseif ($row_cal_val['cal_value'] == 9001) {
            echo "Ex";
          }
          else if($un_id == 3) {
            echo $row_cal_val['cal_value']."% or";
          }
        else {
          echo "Rs. ".$row_cal_val['cal_value']."/= per ".$rowunits['unit_name']." or";
        }
       }
      }

      }

      ?>


  <?php  $cktinc++; } } ?>
    </span>
    </th>
  </tr>
  <script type="text/javascript">
    var text = document.getElementById('text_remove<?=$incText?>').innerHTML;

    var text = text.trim();

    var last = text.charAt(text.length - 1);

    if(last == 'r'){
    var newText = text.replace("or",'');
    document.getElementById('text_remove<?=$incText?>').innerHTML=newText;
    }
  </script>
 <?php $incText++;} ?>



 <?php
  $sqlexc = "SELECT * FROM tbl_excise WHERE hs_code = '$hsid'";
  $rsexc = $conn->query($sqlexc);
  $rsexc_check = $rsexc->num_rows;
  if ($rsexc_check != 0) {
 ?>
 <tr>
   <th>Excise</th>
   <th style="font-weight:bold;color:#000;">
     <?php
     $sqlunits = "SELECT * FROM tbl_units";
     $rsunits = $conn->query($sqlunits);
     if ($rsunits->num_rows > 0) {
       $ckt=1;
      while ($rowunits = $rsunits->fetch_assoc()){
        ?>
        <span id="text_remove<?=$ckt?>">
        <?php
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
               echo "Rs. ".$row_cal_val_ck['exci_val']." per ".$rowunits['unit_name'];
             }
           }
       }
       else {
         if ($row_cal_val_ck['exci_val'] != 0) {
         if ($un_id == 3) {
           echo $row_cal_val_ck['exci_val']."% or ";
         }else {
           echo "Rs. ".$row_cal_val_ck['exci_val']." per ".$rowunits['unit_name']." or ";
         }
        }
       }
       }
       ?>
       </span>
       <script type="text/javascript">
         var text = document.getElementById('text_remove<?=$ckt?>').innerHTML;

         var text = text.trim();

         var last = text.charAt(text.length - 1);

         if(last == 'r'){
         var newText = text.replace("or",'');
         document.getElementById('text_remove<?=$ckt?>').innerHTML=newText;
         }
       </script>
       <?php
     $ckt++; }
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


</tbody>
 </table>
 <?php
  $sql_lic="SELECT * FROM tbl_lic WHERE hs_code='$hsid'";
  $rs_lic = $conn->query($sql_lic);
  if($rs_lic->num_rows > 0){
    $row_lic = $rs_lic->fetch_assoc();
    $lic_name = $row_lic['lic_name'];
  ?>
 <div class="container text-center" style="width:100%;">
   <a href="licenceinfo" target="_blank">
   <?php
    if($lic_name == "TS"){
    ?>
    <h4>Temporarily suspended for importation (TS)</h4>
<?php }elseif($lic_name == "L"){ ?>
    <h4>Require Imports and exports control license (ICL)</h4>

  <?php }elseif($lic_name == "SL"){ ?>
    <h4>Require SLSI approvals (SL)</h4>
  <?php }elseif($lic_name == "B"){ ?>

    <h4>Temporarily banned for for importation(TB)</h4>
    <?php } ?>
    </a>
 </div> <br><br>
<?php } ?>
 <div class="text-center">
   <a href="calc?hscode=<?= $hsid ?>" class="btn btn-primary">Duty Calculator</a>
 </div>
