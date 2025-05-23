<?php
 include 'layout/header.php';

 $user = $_SESSION['user_buc'];

 $sql_buck_val = "SELECT * FROM tbl_hs_buc_val WHERE u_id='$user'";
 $rs_buck = $conn->query($sql_buck_val);
if(!isset($_SESSION['cal_set'])){
if ($rs_buck->num_rows > 0) {
  $_SESSION['cal_set'] = true;
  while ($rowbval = $rs_buck->fetch_assoc()) {

  $hsid=$rowbval['hs_code'];

  $tot_cif = $rowbval['buc_v_tot_cif'];
  $tot_qnty = $rowbval['buc_v_tot_qnty'];
  $duty = $rowbval['buc_v_duty'];


  $genduty = 0;
  $vat = 0;
  $pal = 0;
  $cess = 0;
  $excise = 0;
  $dutyname = "Gen Duty";



  $sqlpdname ="SELECT * FROM tbl_pd_name";
  $rs= $conn->query($sqlpdname);

  $sqlcalname ="SELECT * FROM tbl_calc_names";
  $rscalname= $conn->query($sqlcalname);


    while ($row_cal = $rscalname->fetch_assoc()) {
      $clid = $row_cal['cln_id'];
      $cal_name = $row_cal['cln_name'];

      $sqlunits = "SELECT * FROM tbl_units";
      $rsunits = $conn->query($sqlunits);
      if ($rsunits->num_rows > 0) {

        $sql_cal_val_ck = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND hs_sub_code='$hsid'";
        $rs_cal_val_ck = $conn->query($sql_cal_val_ck);
        if ($rs_cal_val_ck->num_rows > 0) {
          while ($rowunits = $rsunits->fetch_assoc()){
           $un_id = $rowunits['unit_id'];

           $sql_cal_val = "SELECT * FROM tbl_main_calc WHERE cal_n_id='$clid' AND unit_id='$un_id' AND hs_sub_code='$hsid'";
           $rs_cal_val = $conn->query($sql_cal_val);
           $row_cal_val = $rs_cal_val->fetch_assoc();



             if ($cal_name == 'Cess') {
               if ($un_id == 3) {
                 if (($row_cal_val['cal_value'] * $tot_cif) / 100 > $cess) {
                   $cess = ($row_cal_val['cal_value'] * $tot_cif) / 100;
                 }
               }else {
                 if ($row_cal_val['cal_value'] * $tot_qnty > $cess) {
                   $cess = $row_cal_val['cal_value'] * $tot_qnty;
                 }
               }
             }
             elseif ($cal_name == 'Gen Duty') {
               if ($duty != 85) {
                 $dutyname = "Preferential Duty";
                    $pd_id= $duty;

                    $sqlpdVal = "SELECT * FROM tbl_pd_value WHERE pd_id ='$pd_id' AND hs_sub_code='$hsid'";
                    $rspdVal = $conn->query($sqlpdVal);

                    $rowpdVal = $rspdVal->fetch_assoc();

                    if ($rowpdVal['pdv_value'] == "0") {
                      if ($un_id == 3) {
                        if (($row_cal_val['cal_value'] * $tot_cif) / 100 > $cess) {
                          $genduty = ($row_cal_val['cal_value'] * $tot_cif) / 100;
                        }
                      }else {
                        if ($row_cal_val['cal_value'] * $tot_qnty > $cess) {
                          $genduty = $row_cal_val['cal_value'] * $tot_qnty;
                        }
                      }
                    }
                    else {
                      if ($un_id == 3) {
                        if ($rowpdVal['pdv_value'] == "1001") {
                          $rowpdVal['pdv_value'] = 0;
                        }
                        if (($rowpdVal['pdv_value'] * $tot_cif) / 100 > $cess) {
                          $genduty = ($rowpdVal['pdv_value'] * $tot_cif) / 100;
                        }
                      }else {
                        if ($rowpdVal['pdv_value'] * $tot_qnty > $cess) {
                          $genduty = $rowpdVal['pdv_value'] * $tot_qnty;
                        }
                      }
                    }
               }
               else {
                 if ($un_id == 3) {
                   if (($row_cal_val['cal_value'] * $tot_cif) / 100 > $genduty) {
                     $genduty = ($row_cal_val['cal_value'] * $tot_cif) / 100;
                   }
                 }else {
                   if ($row_cal_val['cal_value'] * $tot_qnty > $genduty) {
                     $genduty = $row_cal_val['cal_value'] * $tot_qnty;
                   }
                 }
               }

             }
             elseif ($cal_name == 'PAL') {
               if ($un_id == 3) {
                 if (($row_cal_val['cal_value'] * $tot_cif) / 100 > $pal) {
                   $pal = ($row_cal_val['cal_value'] * $tot_cif) / 100;
                 }
               }else {
                 if ($row_cal_val['cal_value'] * $tot_qnty > $pal) {
                   $pal = $row_cal_val['cal_value'] * $tot_qnty;
                 }
               }
             }
             elseif ($cal_name == "VAT") {
                if ($un_id == 3) {
                  $vat_calc = $row_cal_val['cal_value'];
                 }
             }


         }//end of while loop
        }//end of if



      }// end of if
   }//end of while loop

   if ($genduty == 1001 || $genduty == 9001) {
     $genduty = 0;
   }
   if ($cess == 1001 || $cess == 9001) {
     $cess = 0;
   }
   if ($pal == 1001 || $pal == 9001) {
     $pal = 0;
   }
   if ($vat_calc == 1001 || $vat_calc == 9001) {
     $vat_calc = 0;
   }

   $vat = ($tot_cif + ($tot_cif * 10 / 100) + $genduty + $cess + $pal) *  $vat_calc / 100;

   $sql_bulk_calcu = "INSERT INTO tbl_cal_res (cal_tot_cif,cal_qnty,du_val,cal_genduty,cal_pal,cal_vat,cal_cess,u_id,hs_code) VALUES ('$tot_cif','$tot_qnty','$duty','$genduty','$pal','$vat','$cess','$user','$hsid')";
   $rs_bulk_cal = $conn->query($sql_bulk_calcu);

}
}
}
//end of cif


// $vat = ($tot_cif + ((($tot_cif + $genduty + $cess + $pal) * 10) / 100)) *  $vat_calc / 100;

?>
	<div class="navbar-bot">
		<a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> <div class="bot-nav-text">Calculator</div></a>
	  <a href="#"  class="active"><i class="fa fa-search" aria-hidden="true"></i>  <div class="bot-nav-text">Find</div></a>
	  <a href="hscodesofitems.php"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <div class="bot-nav-text">Importables</div></a>
		<a href="#news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  <div class="bot-nav-text active">News</div> </a>
	</div>
<header class="item header margin-top-0">
<div class="wrapper">
	<?php include 'layout/nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Tariff Calculator
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">

    <?php
    $sql_b_d = "SELECT * FROM `tbl_cal_res` WHERE u_id='$user'";
    $rs_b_d = $conn->query($sql_b_d);

    if ($rs_b_d->num_rows > 0) {
      while ($row_b_d = $rs_b_d->fetch_assoc()) {
     ?>
     <div class="editContent">
 			<h1 class="text-center latestitems">HS Code <?= $row_b_d['hs_code'] ?></h1>
 		</div>
 	</div>

     <div class="container">
       <div class="row">
         <div class="col-lg-6">
           <h4>CIF Value: Rs. <?= number_format(ceil($row_b_d['cal_tot_cif'])) ?>/=</h4>
         </div>
         <div class="col-lg-6">
           <h4>Total Quantity: <?= number_format(ceil($row_b_d['cal_qnty'])) ?></h4>
         </div>
       </div>
       <table class="table table-bordered table-sm">
     <thead>
       <tr>
         <?php $duty = $row_b_d['du_val'];
          if ($duty != 85) {
            $dutyname= "Preferential Duty";
          }
          else {
            $dutyname= "Gen Duty";
          }
          ?>
         <th><?= $dutyname ?></th>
         <td>Rs. <?= number_format(ceil($row_b_d['cal_genduty'])) ?>/=</td>
       </tr>
       <tr>
         <th>CESS</th>
         <td>Rs. <?= number_format(ceil($row_b_d['cal_cess'])) ?>/=</td>
       </tr>
       <tr>
         <th>PAL</th>
         <td>Rs. <?= number_format(ceil($row_b_d['cal_pal'])) ?>/=</td>
       </tr>
       <tr>
         <th>VAT</th>
         <td>Rs. <?= number_format(ceil($row_b_d['cal_vat'])) ?>/=</td>
       </tr>
       <tr>
         <th> <h4>Total levies</h4> </th>
         <td> <h4>Rs. <?= number_format(ceil($row_b_d['cal_genduty']) + ceil($row_b_d['cal_cess']) + ceil($row_b_d['cal_pal']) + ceil($row_b_d['cal_vat'])) ?>/=</h4> </td>
       </tr>
     </thead>

   </table>
     </div>
   <?php
    $tot_lev +=ceil($row_b_d['cal_genduty']) + ceil($row_b_d['cal_cess']) + ceil($row_b_d['cal_pal']) + ceil($row_b_d['cal_vat']);
  } } ?>

  <div class="container">
    <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Sub Total levies</th>
        <td style="font-weight:bolder;">Rs. <?= number_format($tot_lev)  ?>/=</td>
      </tr>
    </thead>
    </table>
  </div>






</div>
</section>

<?php include 'layout/footer.php'; ?>
<script type="text/javascript">
			 function convertCurr(){
				 var amt = document.getElementById('c_amnt').value;
				 var c_code = document.getElementById('c_code').value;
				 $(document).ready(function() {
						 $('#con_amm').load('test.php',{
							 amnt:amt,
							 ccode:c_code
						 });
				 });
			 }
			 </script>
