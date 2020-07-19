<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheets/theme-custom.css">

	<!-- Head Libs -->
	<script src="<?php echo base_url() ?>assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<?php show_alert(); ?>
			<a href="#" class="logo pull-left">
				<img src="<?php echo base_url() ?>assets/images/new-logo.png" height="70" alt="Porto Admin" />
			</a>
			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
				</div>
				<div class="panel-body">
					<?php echo form_open('front/cek'); ?>
					<div class="form-group mb-lg">
						<label>Username</label>
						<div class="input-group input-group-icon">
							<input name="username" type="text" class="form-control input-lg" autocomplete="off" value="<?= set_value('username') ?>" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="form-group mb-lg">
						<div class="clearfix">
							<label class="pull-left">Password</label>
							<!-- <a href="pages-recover-password.html" class="pull-right">Lost Password?</a> -->
						</div>
						<div class="input-group input-group-icon">
							<input name="password" type="password" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-lock"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="pull-left">
								<label>Belum Punya Akun? Daftar <a href="<?php echo base_url('front/daftar') ?>"> di sini</a></label>
							</div>
						</div>
						<div class="col-sm-4 text-right">
							<button type="submit" value="submit" class="btn btn-primary hidden-xs">Sign In</button>
							<button type="submit" value="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2020. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
		</div>
	</section>
	<!-- end: page -->

	<!-- Vendor -->
	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo base_url() ?>assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="<?php echo base_url() ?>assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="<?php echo base_url() ?>assets/javascripts/theme.init.js"></script>

</body><img src="http://www.ten28.com/fref.jpg">

</html>