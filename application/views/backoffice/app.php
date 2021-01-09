<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $title ?></title>
	
	<!-- Favicon -->
	<link rel="icon" href="<?= base_url(); ?>favicon.png" type="image/png">
	
	<link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/scrollbar.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/drag-drop-files.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/custom-floating-labels.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/template/plugins/fontawesome-free/css/all.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/template/dist/css/adminlte.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Inconsolata:400,700|Roboto%20Mono:400|Google%20Sans%20Display:400" rel="stylesheet">
	<script>document.addEventListener("click", x=>0)</script>
	<!-- Page Specific CSS File -->
	<?php if ($cssphp) : ?>
		<?php $this->load->view('backoffice/cssphp/' . $cssphp); ?>
	<?php endif ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper" id="app">
		<?php include 'components/navbar.php'; ?>
		<?php include 'components/sidebar.php'; ?>
		<div class="content-wrapper bg-white text-sm">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<h1 class="text-dark pl-1 py-2"><?= $title ?></h1>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('backoffice/pages/' . $main); ?>
		</div>
		<?php include 'components/footer.php'; ?>
	</div>
	<script src="<?= base_url('assets/template/plugins/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= base_url('assets/template/dist/js/adminlte.min.js') ?>"></script>
	<!-- Page Specific JS File -->
	<?php if ($jsphp) : ?>
		<?php $this->load->view('backoffice/jsphp/' . $jsphp); ?>
	<?php endif ?>
</body>
</html>