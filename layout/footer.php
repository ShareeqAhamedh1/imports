
<!-- FOOTER =============================-->
<?php if(strpos($alink, 'results') > 0): ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php endif; ?>
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 Connect with IMPORTS.LK
			</p>
			<ul class="social-iconsfooter">
				<li><a href="#"><i class="fa fa-phone"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			</ul>
			<p>
				 &copy; 2021 Imports.lk<br/>
				Designed By Mancode Pvt Ltd <a href="https://mancode.lk">ManCode</a>
			</p>
		</div>
	</div>
</div>

<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" charset="utf-8"></script>
<script src="js/master.js?v=22" charset="utf-8"></script>
<script>
//----HOVER CAPTION---//
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>

</body>
</html>
<script type="text/javascript">
	function loadBucket(){
		$('#viewCount').load('sess/item_count.php');
		$('#viewHs').load('sess/items.php');
	}

	function remove_hs(hs_id){
		var postData = 'hs_id='+hs_id;
		$.ajax({
 url : "sess/remove_hs.php",
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
<script type="text/javascript">

	function firstStep(){



		document.getElementById('second_step').style.display = 'block';
		document.getElementById('first_step').style.display = 'none';
	}

	function secondStep(){
		document.getElementById('first_step').style.display = 'block';
		document.getElementById('second_step').style.display = 'none';
	}

	function calculateManual(){
		var  gen_duty= document.getElementById('gen_duty').value;
		var  vat     = document.getElementById('vat').value;
		var  pal     = document.getElementById('pal').value;
		var  cess    = document.getElementById('cess').value;
		var  excise  = document.getElementById('excise').value;

		var  cif  = document.getElementById('cif').value;

		var gen_cal =cif * gen_duty/100;
		var cess_cal = cif * cess / 100;
		var pal_cal = cif * pal /100;

		var cif_ten = cif * 1.1;

		var vat_re =  (cif_ten + gen_cal + cess_cal + pal_cal) *  vat / 100;
		// var vat_re =  cif_ten;
		var exci_re = (+gen_cal + +cess_cal + +pal_cal + +cif) * excise /100;

		document.getElementById('gen_duty_show').innerHTML = "Rs "+ Math.round(cif * gen_duty/100) + "/=";
		document.getElementById('vat_dis').innerHTML = "Rs "+ Math.round(vat_re) + "/=";
		document.getElementById('pal_dis').innerHTML = "Rs "+ Math.round(cif * pal /100) + "/=";
		document.getElementById('cess_dis').innerHTML = "Rs "+ Math.round(cif * cess / 100) + "/=";
		document.getElementById('excise_dis').innerHTML = "Rs "+ Math.round(exci_re) + "/=";

	}


		$('.dropdown').on({

		    //fires after dropdown is shown instance method is called (if you click anywhere else)
		    "shown.bs.dropdown": function() { this.close= false; },

		    //when dropdown is clicked
		    "click": function() { this.close= false; },

		    //when close event is triggered
		    "hide.bs.dropdown":  function() { return this.close; }
		});

		$("#close_drop").click(function() {
   			$(".dropdown").dropdown("toggle");
		});
</script>
