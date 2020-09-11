<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p><?php echo $company_info['company_name']; ?> adalah aplikasi pemesanan bis dengan mudah & nyaman.</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Tautan</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Link 1</a></li>
							<li><a href="#">Link 2</a></li>
							<li><a href="#">Link 3</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-5 col-md-push-1">
					<div class="gtco-widget">
						<h3>Hubungi Kami</h3>
						<ul class="gtco-quick-contact">
							<li><h3><?php echo $company_info['company_name']; ?></h3></li>
							<li><a href="#"><i class="icon-map2"></i> <?php echo $company_info['company_address']; ?></a></li>
							<li><a href="#"><i class="icon-mail2"></i> <?php echo $company_info['company_email']; ?></a></li>
							<li><a href="#"><i class="icon-phone"></i> <?php echo $company_info['company_phone_number']; ?></a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2019 <?php echo $company_info['company_name']; ?>. All Rights Reserved.</small> 
					</p>
					<p class="pull-right">
						<!-- <ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul> -->
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/frontend/js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap-datepicker.min.js"></script>

	<!-- Main -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>

	<!-- Magic error notification -->
	<script>
      	$(document).ready(function(){
          	$('#btn_err').trigger('click');
      	});
	</script>
	
	<!-- Select 2 plugin -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

	<script>
	$(document).ready(function() {
    	$('.js-select-from').select2();
		$('.js-select-to').select2();
	});
	</script>

	<script>
		$(function () {
			$("#pp").click(function () {
				if ($(this).is(":checked")) {
					$(".pulang").show();
				} else {
					$(".pulang").hide();
				}
			});
    	});
	</script>

	</body>
</html>

<!-- Modal Error Notification -->
	<?php if ($_SESSION['error']) { ?>
		<button style="display: none;" id="btn_err" class="nav-link" href="#" data-toggle="modal" class="err" data-target="#error"></button>
		<div class="modal fade" id="error" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Error!</h4>
					</div>
				
					<div class="modal-body">
						<p><?php echo $_SESSION['error']; ?></p>
					</div>
				
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
			</div>
			</div>
		</div>
	<?php unset($_SESSION['error']); } ?>
<!-- END -->