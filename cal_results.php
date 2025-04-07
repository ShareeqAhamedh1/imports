<?php
 include 'layout/header.php';

  $hsid=$_REQUEST['hscode'];

if(isset($_REQUEST['tot_cif'])){
  $tot_cif = $_REQUEST['tot_cif'];
  $tot_qnty = $_REQUEST['tot_qnty'];
  $duty = $_REQUEST['duty'];


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

           if ($row_cal_val['cal_value'] == 1001 || $row_cal_val['cal_value'] == 9001) {
             $row_cal_val['cal_value'] = 0;
           }

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




   $vat = ($tot_cif + ($tot_cif * 10 / 100) + $genduty + $cess + $pal) *  $vat_calc / 100;
}
else {
  exit();
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
		<div class="editContent">
			<h1 class="text-center latestitems"><?= $pal ?> HS Code <?= $_REQUEST['hscode'] ?></h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>

    <div class="container">
      <?php
      $sqlUnit2 = "SELECT * FROM tbl_units";
      $rsUnit2 = $conn->query($sqlUnit2);

      while ($rowUnit2 = $rsUnit2->fetch_assoc()) {
        $uni_id = $rowUnit2['unit_id'];

        $sqlExcise ="SELECT * FROM tbl_excise WHERE hs_code='$hsid' AND un_id='$uni_id'";
        $rsExcise = $conn->query($sqlExcise);

        if ($rsExcise->num_rows > 0) {
           $rowExcise = $rsExcise->fetch_assoc();
           $exciseValue = $rowExcise['exci_val'];
           if ($exciseValue > 0) {
             if($uni_id == 3){
               $exciseRate = ($tot_cif + $genduty + $cess + $pal) * $exciseValue;
             }
             else {
               $exciseRate = $tot_qnty * $exciseValue;
             }
           }
           else {
             $exciseRate = 0;
           }
        }
      }
      if(isset($_REQUEST['rang_id'])){
        $rang_id = $_REQUEST['rang_id'];
        $sqlRange = "SELECT * FROM tbl_ex_ranges WHERE hs_sub_code='$hsid' AND range_id='$rang_id'";
        $rsRange = $conn->query($sqlRange);

        $row_range = $rsRange->fetch_assoc();

        $ex_val = $row_range['r_value'];
        $cc = $_REQUEST['cc'];
        $tot_val = ($cc * $ex_val) * $tot_qnty;
      }
       ?>
      <div class="row">
        <div class="col-lg-6">
          <h4>CIF Value: Rs. <?= number_format(ceil($tot_cif)) ?>/=</h4>
        </div>
        <div class="col-lg-6">
          <h4>Total Quantity: <?= number_format(ceil($tot_qnty)) ?></h4>
        </div>
      </div>
      <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th><?= $dutyname ?></th>
        <td>Rs. <?= number_format(ceil($genduty)) ?>/=</td>
      </tr>
      <tr>
        <th>CESS</th>
        <td>Rs. <?= number_format(ceil($cess)) ?>/=</td>
      </tr>
      <tr>
        <th>PAL</th>
        <td>Rs. <?= number_format(ceil($pal)) ?>/=</td>
      </tr>
      <tr>
        <th>VAT</th>
        <td>Rs. <?= number_format(ceil($vat)) ?>/=</td>
      </tr>
      <?php if(isset($_REQUEST['rang_id'])){ ?>
        <tr>
          <th>Excise</th>
          <td>Rs.<?= number_format(ceil($tot_val))?>/=   (Rs. <?= number_format(ceil($ex_val))?>/= per cmᶾ) </td>
        </tr>
      <?php }else{ ?>
      <tr>
        <th>Excise</th>
        <td>Rs. <?= number_format(ceil($exciseRate)) ?>/=</td>
      </tr>
    <?php } ?>
      <tr>
        <th> <h4>Total levies</h4> </th>
        <td> <h4>Rs. <?= number_format(ceil($genduty) + ceil($cess) + ceil($pal) + ceil($vat) + ceil($exciseRate)) ?>/=</h4> </td>
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
