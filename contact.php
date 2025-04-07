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
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Contact Us
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
		<div class="col-lg-8 col-lg-offset-2">
			<div class="done">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Your message has been sent. Thank you!
				</div>
			</div>
			<form method="post" action="contact.php" id="contactform">
				<div class="form">
					<label for="">Your Name</label>
					<input type="text" name="name" placeholder="Your Name *">
					<label for="">Your Email</label>
					<input type="email" name="name" placeholder="Your Email *">
					<label for="">Your Contact Number</label>
					<input type="tel" name="phone" placeholder="Your Mobile Number">
					<label for="">Your Message</label>
					<textarea name="comment" rows="7" placeholder="Type your Message *"></textarea>
					<input type="submit" id="submit" class="clearfix btn" value="Send">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</section>
<!-- CALL TO ACTION =============================-->
<section class="content-block" style="background-color:#00bba7;">
<div class="container text-center">
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="item" data-scrollreveal="enter top over 0.4s after 0.1s">
			<h1 class="callactiontitle"> For advertisment contact us <span class="callactionbutton"><i class="fa fa-phone"></i> +94 76 555 65 75</span>
			</h1>
		</div>
	</div>
</div>
</div>
</section>
<?php include 'layout/footer.php'; ?>
