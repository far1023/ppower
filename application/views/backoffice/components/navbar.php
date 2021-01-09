		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar')); ?>" class="user-image img-circle profpic" alt="User Image">
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<!-- User image -->
						<li class="user-header bg-white">
							<img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar')); ?>" class="img-circle profpic" alt="User Image">
							<p>
								<small>Login sebagai</small>
								<div class="profilNama"><?= $this->session->userdata('nama'); ?></div>
							</p>
						</li>
						<div class="dropdown-divider"></div>
						<li class="user-footer px-4">
							<a href="<?= site_url('personal-info/'.$this->session->userdata('id')) ?>" class="btn btn-light bg-light btn-sm btn-flat border px-3">Profil</a>
							<a href="<?= site_url('logout') ?>" class="btn btn-light bg-light btn-sm btn-flat float-right border px-3">Keluar</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>