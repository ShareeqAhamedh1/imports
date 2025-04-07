<?php include 'layout/header.php'; ?>
	<div class="navbar-bot">
		<a href="#"><i class="fa fa-calculator" aria-hidden="true"></i> <div class="bot-nav-text">Calculator</div></a>
	  <a href="index.php"><i class="fa fa-search" aria-hidden="true"></i>  <div class="bot-nav-text">Find</div></a>
	  <a href="hscodesofitems.php"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  <div class="bot-nav-text">Importables</div></a>
		<a href="index.php?#news"> <i class="fa fa-newspaper-o" aria-hidden="true"></i>  <div class="bot-nav-text active">News</div> </a>
	</div>
<header class="item header margin-top-0">
<div class="wrapper">
	<?php include 'layout/nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 0.7s after 0.0s">
						Customs House Agents
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
	<div class="row">
		<div class="col-md-12">
			<div class="productbox">
				<br/>
				<h1>CUSTOMS HOUSE AGENTS</h1>
					<p>
						A suitable, trustworthy, efficient Customs House Agent matters much in the convenience as well as in the final outcome of the imports and exports process. As they are the bridge between importer and the customs, having a proper knowledge of them would help the traders to a great extent and would help them to choose the most ideal agent for their need. Therefore, this site provides very useful, reliable, unbiased information in selection of clearing agents.
					</p>
			</div>
		</div>

		<div class="col-lg-6">
			<form  action="index.php" method="post">
				<div class="form-group">
					<label for="">Company Name:</label>
					<input type="text" class="form-control" name="filled" value="" placeholder="company/business" required>
				</div>
				<div class="form-group">
					<label for="">Names of Director/Owner:</label>
					<input type="text" class="form-control" name="" value="" placeholder="Owner details" required>
				</div>
				<div class="form-group">
					<label for="">Official address:</label>
					<input type="text" class="form-control" name="" value="" placeholder="Office details" required>
				</div>
				<div class="form-group">
					<label for="">Email address:</label>
					<input type="text" class="form-control" name="" value="" placeholder="Office details" required>
				</div>
				<div class="form-group">
					<label for="">Telephone Number:</label>
					<input type="text" class="form-control" name="" value="" placeholder="Office details" required>
				</div>
				<div class="form-group">
					<label for="">Valid Tin Number:</label>
					<input type="text" class="form-control" name="" value="" placeholder="Office details" required>
				</div>
				<div class="form-group">
					<input type="radio" name="package" value="" required>
					<label for="">Basic Package</label> <br>
					<input type="radio" name="package" value="" required>
					<label for="">Premium Package:</label>
				</div>
				<div class="form-group">
					<label for="">Special information about the company</label>
					<textarea name="name" class="form-control" rows="8" cols="80"></textarea>
				</div>

				<button type="submit" class="btn btn-primary" name="button">Submit</button> <br><br>
			</form>
		</div>
		<div class="col-lg-6">
			<p style="font-weight:bold;">On our premium package we will display every information which you upload to us. On our basic package few details going to be visible to the customers</p>
			<div class="table-responsive">
<table class="table">
<caption>Package Information</caption>
<thead>
	<tr>
		<th scope="col">Information </th>
		<th scope="col">Basic</th>
		<th scope="col">premium</th>
	</tr>
</thead>
<tbody>
	<tr>
		<th scope="row">Company Name</th>
		<td> <img src="icons/right.png" style="width:25px;" alt=""> </td>
		<td><img src="icons/right.png" style="width:25px;" alt=""> </td>
	</tr>
	<tr>
		<th scope="row">Email</th>
		<td> <img src="icons/right.png" style="width:25px;" alt=""> </td>
		<td><img src="icons/right.png" style="width:25px;" alt=""> </td>
	</tr>
	<tr>
		<th scope="row">Phone Number</th>
		<td> <img src="icons/wrong.png" style="width:25px;" alt=""> </td>
		<td><img src="icons/right.png" style="width:25px;" alt=""> </td>
	</tr>
	<tr>
		<th scope="row">Special Information</th>
		<td> <img src="icons/wrong.png" style="width:25px;" alt=""> </td>
		<td><img src="icons/right.png" style="width:25px;" alt=""> </td>
	</tr>
</tbody>
</table>
		</div>

	</div>
</div>
</section>

<?php include 'layout/footer.php'; ?>
