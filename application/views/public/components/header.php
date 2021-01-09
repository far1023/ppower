	<header id="header" class="fixed-top">
		<div class="container d-flex">

			<div class="logo mr-auto">
				<h1 class="text-light"><a href="<?= site_url() ?>"><span>Siak</span>Anak</a></h1>
				<!-- Uncomment below if you prefer to use an image logo -->
				<!-- <a href="index.html"><img src="<?= base_url() ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li class='<?php if($this->uri->segment(1) == "home"){echo"active";} ?>'><a href="<?= site_url() ?>#home">Home</a></li>
					<li class='<?php if($this->uri->segment(1) == "about"){echo"active";} ?>'><a href="<?= site_url() ?>#tentang">Tentang</a></li>
					<li><a href="<?= site_url() ?>#pimpinan">Pimpinan</a></li>
					<li class='<?php if($this->uri->segment(1) == "berita"){echo"active";} ?>'><a href="<?= site_url('berita') ?>">Berita</a></li>
					<li class='<?php if($this->uri->segment(1) == "login"){echo"active";} ?>'><a href="<?= site_url('login') ?>">Login</a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>
	</header>