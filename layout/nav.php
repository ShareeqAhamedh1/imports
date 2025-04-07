<?php
	$sqlbuc= "SELECT * FROM tbl_create_user WHERE u_id='1'";
	$rsbuc = $conn->query($sqlbuc);

	$rsbucck =$rsbuc->num_rows;


if(!isset($_SESSION['user_buc'])){
	if ($rsbucck > 0) {
		$rowbuc = $rsbuc->fetch_assoc();
		$_SESSION['user_buc'] = $rowbuc['uni_id'];

		$inc = $rowbuc['uni_id'] + 1;
		$sqlbuc= "UPDATE tbl_create_user SET uni_id='$inc' WHERE u_id='1'";
		$rsbuc = $conn->query($sqlbuc);
	}
}
 ?>
<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
<div class="container">
  <div class="navbar-header">
    <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
    <i class="fa fa-bars"></i>
    <span class="sr-only">Toggle navigation</span>
    </button>
    <a href="index">
      <div class="content">
  		<h2>Imports.lk</h2>
  		<h2>Imports.lk</h2>
  	</div>
    </a>
  </div>
  <div id="navbar-collapse-02" class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
      <li class="propClone"><a href="index">Home</a></li>
      <li class="propClone"><a href="hscodesofitems">Quick Search</a></li>
      <li class="propClone"><a href="licenceinfo">Regulating Authorities</a></li>
      <li class="propClone"><a href="clearingagents">Clearing Agents</a></li>
      <li class="propClone"><a href="contact">Contact Us</a></li>
      <li class="propClone"> <br>
        <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" id="dropbtn_tog" data-toggle="dropdown">
    Added Items: <span id="viewCount">0</span>
  </button>
  <div class="dropdown-menu" id="viewHs" style="height:300px;overflow-y:scroll;">
    <!-- &nbsp;<a class="dropdown-item" href="#" id="hs_code_show">0201.10.00</a> <br> -->
  </div>
</div>
      </li>
    </ul>
  </div>
</div>
</nav>
