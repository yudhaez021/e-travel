<?php $auth_facebook_URL =  $this->facebook->login_url(); ?>

<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CI - Travel Bus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="yudhaez021" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url(); ?>assets/frontend/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="<?php echo base_url(); ?>"><?php echo $company_info['company_name']; ?> <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>index.php/about_us/">About us</a></li>
						<li class="has-dropdown">
							<a href="#">Account Area</a>
							<ul class="dropdown">
								<?php if ($_SESSION['customer']) { ?>
									<li><a href="#account_details" data-toggle="modal" data-target="#account_details">Account Details</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/travel/order_history/">Order History</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/travel/list_biodata/">Biodata</a></li>
									<li><a href="<?php echo base_url(); ?>index.php/travel/logout/">Logout</a></li>								
								<?php } else { ?>
									<li><a href="#login" data-toggle="modal" data-target="#login">Sign in</a></li>
									<li><a href="#register" data-toggle="modal" data-target="#register">Register</a></li>
								<?php } ?>
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>index.php/contact_us/">Contact us</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>

<!-- Modal Login -->
	<div class="modal fade" style="z-index: 9999;" id="login" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sign in your account</h4>
				</div>
			
				<div class="modal-body">
					<form method="post" action="<?php echo base_url(); ?>index.php/login/">
						<!-- PARSING CURRENT URL -->
						<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
						<input type="hidden" name="current_url" value="<?php echo $actual_link; ?>"	/>
							
						<div class="form-group">
							<input type="text" name="datas[id]" class="form-control" placeholder="Email / Username" required />
						</div>

						<div class="form-group">
							Lupa password?
							<input type="password" name="datas[password]" class="form-control" placeholder="Password" required />
						</div>

						<div class="form-group" style="text-align: right;">
							<input type="submit" value="Login" class="btn btn-primary" />
						</div>
					</form>

					<hr />
					<h4 class="modal-title" style="text-align: center;">Use your social media to log in</h4>
					<center><a href="<?php echo $auth_facebook_URL.'&current_url='.$actual_link; ?>"><img src="https://www.freeiconspng.com/uploads/facebook-sign-in-button-png-26.png" width="250px" /></a></center>
				
					<hr />
					<center><a href="#register" data-toggle="modal" data-target="#register">Doesn't have account? sign up only a few minutes!</a></center>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
		</div>
	</div>
<!-- END -->

<!-- Modal Register -->
	<div class="modal fade" style="z-index: 10000;" id="register" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Create your account now</h4>
				</div>
			
				<div class="modal-body">
					<form method="post" action="<?php echo base_url(); ?>index.php/login/register/">
						<!-- PARSING CURRENT URL -->
						<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
						<input type="hidden" name="current_url" value="<?php echo $actual_link; ?>"	/>
							
						<div class="form-group">
							<input type="text" name="datas[username]" class="form-control" placeholder="Username" required />
						</div>

						<div class="form-group">
							<input type="text" name="datas[email]" class="form-control" placeholder="Email" required />
						</div>

						<div class="form-group">
							<input type="password" name="datas[password]" class="form-control" placeholder="Password" required />
						</div>

						<div class="form-group">
							<input type="password" name="datas[confirm_password]" class="form-control" placeholder="Confirm Password" required />
						</div>

						<div class="form-group">
							<input type="number" name="datas[phone_number]" class="form-control" placeholder="Phone Number" required />
						</div>

						<div class="form-group" style="text-align: right;">
							<input type="submit" value="Register" class="btn btn-primary" />
						</div>
					</form>

					<hr />
					<h4 class="modal-title" style="text-align: center;">Or sign up with your social media</h4>
					<center><a href="<?php echo $auth_facebook_URL.'&current_url='.$actual_link; ?>"><img src="https://www.freeiconspng.com/uploads/facebook-sign-in-button-png-26.png" width="250px" /></a></center>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
		</div>
	</div>
<!-- END -->

<!-- Modal Lupa Password -->
	<div class="modal fade" id="forgot" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				</div>
			
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
		</div>
	</div>
<!-- END -->

<!-- Modal Add New Biodata -->
	<div class="modal fade" style="z-index: 10000;" id="add_bio" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add your bidoata</h4>
				</div>
			
				<div class="modal-body">
					<form method="post" action="<?php echo base_url(); ?>index.php/travel/add_biodata/">
						<!-- PARSING CURRENT URL -->
						<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                        <input type="hidden" name="current_url" value="<?php echo $actual_link; ?>"	/>
                        <input type="hidden" name="datas[id_parent]" value="<?php echo $_SESSION['customer']['id']; ?>"	/>
							
						<div class="form-group">
							<input type="text" name="datas[first_name]" class="form-control" placeholder="First Name" required />
						</div>

						<div class="form-group">
							<input type="text" name="datas[last_name]" class="form-control" placeholder="Last Name" required />
						</div>

						<div class="form-group">
							<input type="number" name="datas[phone_number]" class="form-control" placeholder="Phone Number" required />
						</div>

						<div class="form-group">
							<input type="number" name="datas[no_identity]" class="form-control" placeholder="Identiy Number (KTP/KK/SIM)" required />
						</div>
					<!-- </form> -->
				</div>
			
				<div class="modal-footer">
                    <input type="submit" value="Add Biodata" class="btn btn-primary" /></form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
		</div>
	</div>
<!-- END -->

<!-- Modal Account Details -->
	<div class="modal fade" style="z-index: 10000;" id="account_details" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Account Details</h4>
				</div>
			
				<div class="modal-body">
					<form method="post" action="<?php echo base_url(); ?>index.php/travel/add_biodata/">
						<!-- PARSING CURRENT URL -->
						<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                        <input type="hidden" name="current_url" value="<?php echo $actual_link; ?>"	/>
						
						<input type="hidden" name="datas[id]" value="<?php echo $_SESSION['customer']['id']; ?>" />
						<input type="hidden" name="datas[validation]" value="A"	/>
						
						<div class="form-group">
							<center>
								<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" width="150px" style="border-radius: 50%;" />
							</center>
						</div>
							
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="datas[username]" class="form-control" placeholder="Username" value="<?php echo $_SESSION['customer']['username']; ?>" required />
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="datas[email]" class="form-control" placeholder="Email" value="<?php echo $_SESSION['customer']['email']; ?>" required />
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" name="datas[password]" class="form-control" placeholder="Password" value="<?php echo $_SESSION['customer']['password']; ?>" required />
						</div>

						<div class="form-group">
							<label>Phone Number</label>
							<input type="number" name="datas[phone_number]" class="form-control" placeholder="Phone Number" value="<?php echo $_SESSION['customer']['phone_number']; ?>" required />
						</div>
					<!-- </form> -->
				</div>
			
				<div class="modal-footer">
                    <input type="submit" value="Update Profile" class="btn btn-primary" /></form>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<!-- END -->

<!-- Modal Coming Soon -->
	<div class="modal fade" id="pilih_kursi" style="z-index: 9999;" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Coming Soon</h4>
				</div>
			
				<div class="modal-body">
					<p>Fitur ini masih dalam proses pengembangan, silahkan coba lagi nanti.</p>
				</div>
			
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
		</div>
		</div>
	</div>
<!-- END -->