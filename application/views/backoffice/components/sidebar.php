<aside class="main-sidebar sidebar-light-navy border-right">
	<a href="<?= site_url(); ?>" class="brand-link navbar-white" target="_blank">
		<!--<img src="<?= base_url(); ?>favicon.png" alt="site_logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
		<span class="brand-text font-weight-light">PPower</span>
	</a>
	<div class="sidebar text-md">
		<nav class="mt-4">
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= site_url('home') ?>" class="nav-link py-2 pl-4 <?php if($this->uri->segment(1) == 'home'){echo'active';} ?>">
						<i class="nav-icon far fa-heart fa-fw"></i>&emsp;
						<p> Dashboard </p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>