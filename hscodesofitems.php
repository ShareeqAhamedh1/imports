<?php include 'layout/header.php'; ?>
<div class="navbar-bot">
	<a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> <div class="bot-nav-text">Calculator</div></a>
  <a href="index.php" ><i class="fa fa-search" aria-hidden="true"></i>  <div class="bot-nav-text">Find</div></a>
  <a href="hscodesofitems.php" class="active"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <div class="bot-nav-text">Quick Search</div></a>
	<a href="index.php?#news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  <div class="bot-nav-text active">News</div> </a>
</div>

<header class="item header margin-top-0">
<div class="wrapper">
	<?php include 'layout/nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Quick Search
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<div id="imp_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" id="modal_imp">


    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
  </div>
</div>

<div class="modal fade" id="hs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal_hs">

    </div>
  </div>
</div>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<!-- <div class="editContent">
			<h1 class="text-center latestitems">Quick Search</h1>
		</div> -->

		<form class="" action="hscodesofitems" method="post">
			<div class="form-group"  style="text-align:center;">
				<input type="text" name="skey" class="form-control" placeholder="Enter Description" value="" style="width:50%;margin:0 auto;border:1px solid black;" autofocus>
				<br>
				<button type="submit" name="button" class="btn btn-secondary" style="background-color:#000;color:#fff;font-size:16px;">Search</button>
			</div>
		</form>
	</div>
	<div class="row">
		<?php

		$per_page_record = 20;

		if (isset($_GET["page"])) {
				$page  = $_GET["page"];
		} else {
				$page = 1;
		}

		$start_from = ($page - 1) * $per_page_record;

		if (isset($_REQUEST['skey'])){
			$key = $_REQUEST['skey'];
			$sql = "SELECT * FROM tbl_hs_code WHERE hs_code LIKE '$key%' OR hs_description LIKE '%$key%' ORDER BY `hs_code` ASC";
		}
		else {
			$sql = "SELECT * FROM tbl_hs_code ORDER BY `hs_code` ASC LIMIT $start_from, $per_page_record ";
		}
		$result = mysqli_query($conn, $sql);
		?>
		<table class="table">
  <thead>
    <tr>
			<th scope="col" style="font-size:19px;">Description</th>
      <th scope="col" style="font-size:19px;">Suggested HS Code</th>
      <th scope="col" style="font-size:19px;"> <span style="font-style:italic;">Image</span> </th>
    </tr>
  </thead>
  <tbody>
		<?php
			while ($rowimp = mysqli_fetch_array($result)) {
		 ?>
    <tr>
			<td style="padding-top:15px;"><?= ucfirst(substr($rowimp['hs_description'], 0, 100))  ?></td>
      <th style="padding-top:15px;"> <a href="results?hssearch=<?= $rowimp['hs_code'] ?>" style="cursor:pointer;"><?= $rowimp['hs_code'] ?></a> </th>
			<?php if ($rowimp['hs_image'] != "empty.png"){ ?>
      <td>
					<button type="button" class="btn btn-primary" name="button" onclick="viewHsImage(<?= $rowimp['hsm_id'] ?>)">View Image</button>
			</td>
		<?php }else { ?>
			<td class="text-center"> N/A </td>
		<?php } ?>
    </tr>
			<?php }  ?>
  </tbody>
</table>


	</div>

	<div class="pagination justify-content-center">
			<?php
			if (!isset($_REQUEST['skey'])) {
			$sql = "SELECT COUNT(*) FROM tbl_hs_code";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_row($result);
			$total_records = $row[0];

			echo "</br>";
			$total_pages = ceil($total_records / $per_page_record);
			$pagLink = "";

			if ($page >= 2) {
					echo "<a style='font-weight:bold;' class='btn btn-outline-dark' href='hscodesofitems?page=" . ($page - 1) . "'> << Previous </a>";
			}

			for ($i = 1; $i <= $total_pages; $i++) {
			    if ($i == $page) {
			        $pagLink .= "<a style='font-weight:bold;' class='btn btn-outline-dark' class = 'active' href='index.php?page="
			            . $i . "'>" . $i . " </a>";
			    } else {
			        $pagLink .= "<a style='font-weight:bold;' class='btn btn-outline-dark' href='index.php?page=" . $i . "'>
			                                            " . $i . " </a>";
			    }
			};
			// echo $pagLink;

			if ($page < $total_pages) {
					echo "<a style='font-weight:bold;' class='btn btn-outline-dark' href='hscodesofitems?page=" . ($page + 1) . "'>  Next >> </a>";
			}
		}

			?>
	</div>
</div>
</section>

<?php include 'layout/footer.php'; ?>
<script type="text/javascript">
			 function viewHsImage(id){
				 $(document).ready(function() {
						 $('#modal_hs').load('imageview.php',{
							 id:id
						 });
				 });
				 $('#hs_modal').modal('show');
			 }
			 </script>
			 <script type="text/javascript">
			 			 function viewImpCharge(id){
			 				 $(document).ready(function() {
			 						 $('#modal_imp').load('impcharges.php',{
			 							 id:id
			 						 });
			 				 });
			 				 $('#imp_modal').modal('show');
			 			 }
			 			 </script>
