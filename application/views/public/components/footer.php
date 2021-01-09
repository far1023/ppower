<footer>
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="footer-content">
						<div class="footer-head">
							<div class="footer-logo">
								<h2><span>Siak</span>Anak</h2>
							</div>
							<p>Aplikai yang dibuat untuk menunjang Program Pemerintah Kabupaten Siak dalam mewujudkan Kabupaten Siak Layak Anak.</p>
							<div class="footer-icons d-none">
								<ul>
									<li>
										<a href="#"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-google"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-pinterest"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- end single footer -->
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="footer-content">
						<div class="footer-head">
							<h4>Profil</h4>
							<div class="footer-contacts">
								<?php foreach ($navprof as $value): ?>									
									<a href="<?= site_url('about/'.$value->url) ?>" class="kis-white"><?= $value->judul ?></a><br />
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
				<!-- end single footer -->
				<div class="col-md-4 col-sm-4 col-xs-12 d-none">
					<div class="footer-content">
						<div class="footer-head">
							<h4></h4>
							<div class="flicker-img">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-area-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="copyright text-center">
						<p>
							Copyright &copy; 2020 <a href="https://diskominfo.siakkab.go.id/" style="color: #9f9f9f;"><strong>Dinas Komunikasi dan Informatika Kabupaten Siak</strong></a>. All Rights Reserved
						</p>
					</div>
					<div class="credits" style="color: #111">
							<!--
							All the links in the footer should remain intact.
							You can delete the links only if you purchased the pro version.
							Licensing information: https://bootstrapmade.com/license/
							Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
						-->
						<small>Template by <a href="https://bootstrapmade.com/" style="text-decoration: none; color: #111;">BootstrapMade</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>