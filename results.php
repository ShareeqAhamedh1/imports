

<?php include 'layout/header.php'; ?>
<?php if (!isset($_REQUEST['hssearch']) || $_REQUEST['hssearch'] == ""){
  header('location:index.php');
  ?>

<?php } ?>
<?php

$keyword = $_REQUEST['hssearch'];

$onematch = 0;
$keywordCount =strlen($keyword);

if (preg_match('~[0-9]+~', $keyword) && $keywordCount >= 7) {
    $onematch =1;
}



$hs_head_key= array();

if (preg_match('~[0-9]+~', $keyword)) {
	$sqlsehshead ="SELECT * FROM tbl_hs_main_cat WHERE hmc_code = '$keyword'";
}
else {
	$sqlsehshead ="SELECT * FROM tbl_hs_main_cat WHERE hmc_code = '$keyword' OR hmc_desc LIKE '%$keyword%'";
}


$rssehshead =$conn->query($sqlsehshead);
if ($rssehshead->num_rows > 0) {
while ($rowhead = $rssehshead->fetch_assoc()) {
	$headkey = $rowhead['hmc_id'];

	array_push($hs_head_key,$headkey);

}
}

if (preg_match('~[0-9]+~', $keyword)) {
	$sqlsubhs ="SELECT * FROM tbl_hs_sub WHERE hs_sub_code LIKE '$keyword%'";
}
else {
	$sqlsubhs ="SELECT * FROM tbl_hs_sub WHERE hs_sub_code LIKE '$keyword%' OR hs_sub_name LIKE '%$keyword%'";
}

$rssubhs =$conn->query($sqlsubhs);


if ($rssubhs->num_rows > 0) {
	while ($rowhead = $rssubhs->fetch_assoc()) {
		$headkey = $rowhead['hmc_id'];
		if (!in_array($headkey,$hs_head_key)) {
			array_push($hs_head_key,$headkey);
		}

	}
}

?>
<div class="navbar-bot" style="overflow-x:hidden;">
	<a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> <div class="bot-nav-text">Calculator</div></a>
  <a href="index.php" ><i class="fa fa-search" aria-hidden="true"></i>  <div class="bot-nav-text">Find</div></a>
  <a href="hscodesofitems.php" class="active"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <div class="bot-nav-text">Importables</div></a>
	<a href="#news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  <div class="bot-nav-text active">News</div> </a>
</div>
<header class="item header margin-top-0">
<div class="wrapper">
	<?php include 'layout/nav.php'; ?>
	<br><br><br>
</div>
</header>
<div id="imp_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Applicable Levies</h4>
        <!-- <img src="https://c.tenor.com/gfmfwqdidD0AAAAC/loading-buffering.gif" id="loader" style="width:100%;" /> -->
      </div>
      <div class="modal-body" id="modal_imp">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="loader" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Applicable Levies</h4>
      </div>
      <div class="modal-body" id="modal_imp">
        <img src="https://c.tenor.com/gfmfwqdidD0AAAAC/loading-buffering.gif" id="" style="width:100%;" />


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
 ?>
<!-- CONTENT =============================-->
<section class="item content" id="content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<?php if($rssubhs->num_rows == 0 && $rssehshead->num_rows == 0){
        $tot_res = $rssubhs->num_rows + $rssehshead->num_rows;
        ?>
				<h1 class="text-center latestitems">Sorry No Results found for <span style="color:#00ef8f;font-weight:bold;">"<?= $keyword ?>"</span> </h1> <br>
				<h3 class="text-center latestitems">Please Check Entry</h3>
		<?php }else{ ?>
			<h1 class="text-center latestitems">Results found for <span style="color:#00ef8f;font-weight:bold;">"<?= $keyword ?>"</span> </h1> <br>
		<?php } ?>
		</div>
		<form id="search-form" action="gotores" method="post">
			<div class="form-group" style="text-align:center;">
				<input type="text" style="width:50%;margin:0 auto;border:1px solid black;" class="form-control" placeholder="Enter Description or HS code" name="hssearch" value="" autofocus required>
				<br>
				<button type="submit" name="button" class="btn btn-secondary" style="background-color:#000;color:#fff;font-size:16px;">Search</button>
			</div>
		</form>
	</div>
<div id="inputText" >
	<table class="table" style="height:400px;overflow-y:scroll;">
	<thead>
	  <tr>
	    <th scope="col">HS Hdg</th>
			<th>&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</th>
	    <th scope="col">HS Code</th>
	    <th scope="col">Description</th>
	    <th scope="col">More Information</th>
      <th>Add Items</th>
	  </tr>
	</thead>
	<tbody>
		<?php
		if ($onematch == 0) {
		foreach ($hs_head_key as $main_key) {
			$sqlsehshead = "SELECT * FROM tbl_hs_main_cat WHERE hmc_id = '$main_key'";
			$rssehshead = $conn->query($sqlsehshead);
			if ($rssehshead && $rssehshead->num_rows > 0) {
				$rowhead = $rssehshead->fetch_assoc();
		 ?>
	  <tr>
	    <th scope="row"  id="<?= $rowhead['hmc_code'] ?>"><?= $rowhead['hmc_code'] ?></th>
	    <td></td>
			<td></td>
	    <td><?= $rowhead['hmc_desc'] ?></td>
	    <td></td>
	  </tr>
	<?php } ?>
	<?php
	$sqlsubhs ="SELECT * FROM tbl_hs_sub WHERE hmc_id = '$main_key'";
	$rssubhs =$conn->query($sqlsubhs);


	if ($rssubhs->num_rows > 0) {
		while ($rowhead = $rssubhs->fetch_assoc()) {
			$emptycheck = $rowhead['emp'];
			$level = "";
	 ?>
	  <tr>
	    <th></th>
			<?php
				if($rowhead['hs_level'] == "1"){
					$level = "-";
				}
				elseif($rowhead['hs_level'] == "2") {
					$level = "--";
				}elseif($rowhead['hs_level'] == "3") {
					$level = "---";
				}elseif ($rowhead['hs_level'] == "4") {
					$level = "----";
				}

			 ?>
			<td  style="padding-top:15px;"><?= $level ?></td>
	    <td  id="<?= $rowhead['hs_sub_code'] ?>" style="padding-top:15px;">
				<a onclick="viewImpCharge('<?= $rowhead['hs_sub_code'] ?>')" href="#"><?= $rowhead['hs_sub_code'] ?>
				</a> </td>
	    <td  style="padding-top:15px;"><?= $rowhead['hs_sub_name'] ?></td>
	    <td>
				<?php if ($emptycheck == 0): ?>
					<button type="button" class="btn btn-primary" onclick="viewImpCharge('<?= $rowhead['hs_sub_code'] ?>')">
	  			Applicable Levies
				</button>
				<?php endif; ?>
			</td>
      <td> <?php if ($emptycheck == 0): ?> <a class="btn btn-primary" id='<?= $rowhead['hs_sub_code'] ?>' onclick="addToBucket(this.id)">
         +Add </a> <?php endif; ?> </td>
	  </tr>
	<?php } }  ?>
<?php } }else{?>
	<?php
	$sqlsubhs ="SELECT * FROM tbl_hs_sub WHERE hs_sub_code LIKE '%$keyword%'";
	$rssubhs =$conn->query($sqlsubhs);


	if ($rssubhs->num_rows > 0) {
		while ($rowhead = $rssubhs->fetch_assoc()) {
			$emptycheck = $rowhead['emp'];
	 ?>
	  <tr>
	    <th scope="row"></th>
			<?php
				if($rowhead['hs_level'] == "1"){
					$level = "-";
				}
				elseif($rowhead['hs_level'] == "2") {
					$level = "--";
				}elseif($rowhead['hs_level'] == "3") {
					$level = "---";
				}elseif ($rowhead['hs_level'] == "4") {
					$level = "----";
				}

			 ?>
			<td  style="padding-top:15px;"><?= $level ?></td>
	    <td  id="<?= $rowhead['hs_sub_code'] ?>" style="padding-top:15px;">
				<a onclick="viewImpCharge('<?= $rowhead['hs_sub_code'] ?>')" href="#"><?= $rowhead['hs_sub_code'] ?>
				</a> </td>
	    <td  style="padding-top:15px;"><?= $rowhead['hs_sub_name'] ?></td>
	    <td>
				<?php if ($emptycheck == 0): ?>
					<button type="button" class="btn btn-primary" onclick="viewImpCharge('<?= $rowhead['hs_sub_code'] ?>')">
	  			Applicable Levies
				</button>
				<?php endif; ?>
			</td>
      <td> <?php if ($emptycheck == 0): ?> <a class="btn btn-primary" id='<?= $rowhead['hs_sub_code'] ?>' onclick="addToBucket(this.id)">
         +Add </a> <?php endif; ?> </td>
	  </tr>
	<?php } }  ?>
<?php } ?>
	</tbody>
	</table>


	</div>
</div>
</section>

<?php include 'layout/footer.php'; ?>
<script type="text/javascript">

			 function viewImpCharge(send_id){
				 $(document).ready(function() {
           $('#imp_modal').modal('show');

           // $.post("impcharges.php", {id:send_id}, function(result){
           //    $("#modal_imp").html(result);
           //  });
           $('#modal_imp').html("<div class='text-center'><img src='loader/loadnew.gif' id='loader' style='width:200px;' /></div>");
						 $('#modal_imp').load('impcharges.php',{
							 id:send_id
						 });
				 });

			 }

			 </script>
       <script type="text/javascript">
       function addToBucket(hsCode) {
         var postData = 'hs_code='+hsCode;
         $.ajax({
      url : "sess/create_ses.php",
      type: "POST",
      data : postData,
      success: function(data,status, xhr)
      {
        $('#viewCount').load('sess/item_count.php');
        $('#viewHs').load('sess/items.php');
      }
    });
  }

       </script>
       <?php
       if (!preg_match('~[0-9]+~', $keyword) && $keywordCount <= 7) {
        ?>
<script src="js/hilitor.js" charset="utf-8"></script>
<script type="text/javascript">
var myHilitor = new Hilitor("content"); // id of the element to parse
 myHilitor.apply("<?= $keyword ?>");

</script>
<?php } ?>
