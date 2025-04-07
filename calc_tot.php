<?php
 include 'layout/header.php';

$user = $_SESSION['user_buc'];

$sqlbuc= "SELECT * FROM tbl_hs_bucket WHERE u_id='$user'";
$rsbuc = $conn->query($sqlbuc);

$rsbuctot = $rsbuc->num_rows;



$rowbuc = $rsbuc->fetch_assoc();


$hsid = $rowbuc['hs_buc_id'];

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
			<h1 class="text-center latestitems"><?= $rowbuc['hs_code'] ?></h1>
		</div>
	</div>


		<div class="row">
			<div class="col-lg-6">
				<div style="border:1px solid #000;width:100%;padding:10px 10px 10px 10px;">

					<div class="form-group">
						<label for="">Currency</label>
						<select class="form-control" name="" id="c_code" autofocus>
							<?php
								$sqlcurr = "SELECT * FROM currency";
								$rscurr = $conn->query($sqlcurr);
								while ($rowcurr = $rscurr->fetch_assoc()) {
							 ?>
							<option value="<?= $rowcurr['currency_code'] ?>"><?= $rowcurr['currency_name'] ?> &nbsp;<?= $rowcurr['currency_code'] ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">CIF</label>
						<input type="number" name="" min="0" class="form-control" id="c_amnt" value="" onkeyup="convertCurr()">
					</div>
					<div id="con_amm">

					</div>
					<small>Currency Converter</small>
				</div>

			</div>
			<div class="col-lg-6">
				<form class="" action="buc_func/cal_results_save.php" method="post">
          <input type="hidden" name="hscode" value="<?= $hsid ?>">
					<div class="form-group">
						<label for="">CIF in LKR</label>
						<input type="text" class="form-control" name="tot_cif" id="tot_price" placeholder="RS 0.00" value="">
					</div>
          <div class="form-group">
						<label for="">General Duty / Preferential Duty</label>
						<select class="form-control" name="duty" id="c_code">
              <option value="85">GEN DUTY</option>
							<?php
								$sqlcurr = "SELECT * FROM tbl_pd_name";
								$rscurr = $conn->query($sqlcurr);
								while ($rowcurr = $rscurr->fetch_assoc()) {
							 ?>
							<option value="<?= $rowcurr['pd_id'] ?>"><?= $rowcurr['pd_name'] ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Total Quantity</label>
						<input type="number" min="0" class="form-control" name="tot_qnty" id="tot_qnty" placeholder="KG,U,L" value="" required>
					</div>
					<button type="submit" class="btn btn-warning" name="button">Calculate</button>
				</form>
        <br>
			</div>
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
