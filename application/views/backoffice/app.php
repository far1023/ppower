<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Ecommerce Dashboard &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/') ?>assets/css/components.css">
</head>
<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<?php include 'components/navbar.php' ?>
			<?php include 'components/sidebar.php' ?>
			<div class="main-content">
				<?php $this->load->view('backoffice/content/'.$main); ?>
			</div>
			<?php include 'components/footer.php' ?>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/jquery.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/popper.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/tooltip.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/moment.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/jquery.sparkline.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/chart.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/summernote/summernote-bs4.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

	<!-- Page Specific JS File -->
	<?php $this->load->view('backoffice/jsphp/'.$jsphp); ?>

	<!-- Template JS File -->
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/js/scripts.js"></script>
	<script src="<?= base_url('assets/stisla/dist/') ?>assets/js/custom.js"></script>
</body>
</html>