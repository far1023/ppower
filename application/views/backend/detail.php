<?php
$slug      = $artikel->slug;
if($this->input->post('is_submitted')){
  $username  = set_value('username');
  $password  = set_value('password');
  $nama    = set_value('nama');
  $gender  = set_value('gender');
  $alamat  = set_value('alamat');
  $telepon = set_value('telepon');
} else {
  $vauthor = $artikel->author;
  $vjudul = $artikel->judul;
  $vtanggal = $artikel->tanggal;
  $vgambar = $artikel->gambar;
  $visi = $artikel->isi;
}
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    .hr2 { 
      display: block;
      margin-top: 0.5em;
      margin-bottom: 0.5em;
      margin-left: auto;
      margin-right: auto;
      border-style: inset;
      border-width: 0.5px;
      opacity: 0.5;
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $vjudul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>p</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Psiko</b>Power</span>
      </a>
      <?php include "include/topbar.php"; ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <?php include 'include/sidebar.php'; ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Artikel
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?= site_url('artikel') ?>">Artikel</a></li>
          <li class="active"><?= $vjudul ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-2">
            &nbsp
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3">
                  <a href="<?= site_url('artikel/addArtikel') ?>" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i> Tambah Data</a><br>
              </div>
              <div class="col-md-5 pull-right">
                <div class="form-group">
                  <form action="<?= site_url('artikel/list') ?>" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control" name="cari">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-fw fa-search"></i></button>
                    </span>
                  </div>
                  </form>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            </div>
            <div class="box box-solid" style="padding: 5px">
              <!-- /.box-header -->
              <div class="box-header with-border">
                <p>
                  <span style="font-size: 24px"><?= $vjudul ?></span><br>
                  <small><i class="fa fa-fw fa-calendar-o"></i> <?= mediumdate_indo($vtanggal) ?> - <i class="fa fa-fw fa-user-o"></i> <?= $vauthor ?></small>
                </p>
              </div>
              <div class="box-body" style="margin-bottom: 20px">
                <div class="container" style="width: 100%;">
                  <?php if ($vgambar): ?>
                    <p style="text-align: center"><img src="<?= base_url('assets/images/post/'.$vgambar);?>" style="height: 200px;"></p>
                  <?php endif ?>
                  <?= htmlspecialchars_decode($visi) ?>
                </div>
              </div>
              <div class="box-footer" style="text-align: center">
                <small>Psiko<b>Power</b></small>
              </div>
              <!-- /.box-body -->
            </div>
            <?php if ($suggest): ?>
              <h4 style="margin-top: 25px">Artikel Lain</h4>
              <hr style="margin-top: 0.5em; ">
              <div class="row">
              <?php foreach ($suggest as $show): ?>
                <div class="col-md-6">
                  <div class="box box-solid" style="min-height: 80px">
                  <!-- /.box-header -->
                  <div class="box-body" style="margin-bottom: 20px">
                    <div class="container" style="width: 100%;">
                      <a href="<?= site_url('artikel/detail/'.$show->slug) ?>"><?= ($show->judul) ?></a><br>
                      <span style="font-size: 10px"><?= mediumdate_indo($show->tanggal) ?></span>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  </div>
                </div>
              <?php endforeach ?>
              </div>
            <?php endif ?>

            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "include/footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="<?= base_url();?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url();?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
