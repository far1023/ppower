<style>

  .content-wrapper{
    padding-bottom: 100px;
  }

  .btn-dark:hover {
    cursor: default !important;
    background-color: #fff !important;
  }

  .form-head:hover {
    background-color: #fff !important;
  }

  .menu-user:hover {
    background-color: #f0f0f0 !important;
  }

  .menu-user {
    color: #000 !important;
  }

  .hr1 { 
      display: block;
      margin-top: 1em;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 0.5px;
  }

  .hr2 { 
      display: block;
      margin-top: 0.5em;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 0.5px;
  }

  .hr3 { 
      display: block;
      margin-top: 0em;
      margin-bottom: 1em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 0.5px;
  }

  /* width */
  ::-webkit-scrollbar {
      width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
      background: #ffffff; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
      background: #bfbfbf; 
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
      background: #bfbfbf;
  }

</style>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
	<!-- Navbar Right Menu -->
	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar'));?>" class="user-image img-circle" style="height: 20px; background-color: white;" alt="User Image">&nbsp 
         <span class="hidden-xs"><i class="fa fa-caret-down"></i></span></a>
         <ul class="dropdown-menu" role="menu" style="width: 300px;">
           <li>
            <a href="#" class="btn-dark">
              <p style=""><img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar'));?>" class="img-circle" style="height: 50px;" alt="User Image"></p>
              <span style="color: black"><?= htmlspecialchars($this->session->userdata('nama')); ?></span><br>
              <small style="color: black;"><?php $level=$this->session->userdata('level');
              if($level==1){echo "Administrator";}elseif($level==3){echo"Dokter";}?></small>
            </a>
          </li>
         <li class="divider"></li>
         <li><a href="<?= site_url('profil/index/'.$this->session->userdata('id')) ?>" class="menu-user"><i class="fa fa-user-o fa-fw"></i> Profil</a></li>
         <li><a href="<?= site_url('profil/changePassword/'.$this->session->userdata('id')) ?>" class="menu-user"><i class="fa fa-lock fa-fw"></i> Ganti Password</a></li>
         <li><a href="<?= site_url('menu_settings') ?>" class="menu-user"><i class="fa fa-cogs fa-fw"></i> Pengaturan Menu</a></li>
         <li class="divider"></li>
         <li><a href="<?= site_url('auth/logout') ?>" class="menu-user" class="text-black">Keluar</a></li>
       </ul>
     </li>
   </ul>
 </div>

</nav>