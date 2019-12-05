<?php function limit_words($string, $word_limit){
  $words = explode(" ",$string);
  return implode(" ",array_splice($words,0,$word_limit));
} 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Artikel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/w3.css') ?>">
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>p</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Psiko</b>Power</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <?php include 'include/topbar.php'; ?>
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
          <li><a href="<?= site_url('artikel/list') ?>">Artikel</a></li>
          <li class="active">Data</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row"><div class="col-md-5">
          <?php $error = $this->session->flashdata('error');?>
          <?php if($error){?>
            <div class="alert alert-danger alert-dismissible btn-xs">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-exclamation fa-fw"> </i> <?= $this->session->flashdata('error')?>
            </div>
          <?php } ?>
          <?php $done = $this->session->flashdata('done');?>
          <?php if($done){?>
            <div class="alert alert-success alert-dismissible btn-xs">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="fa fa-check fa-fw"> </i> <?= $this->session->flashdata('done')?>
            </div>
          <?php } ?>
        </div></div>
        <div class="row">
          <div class="col-md-2">
            &nbsp
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg-3">
                  <a href="<?= site_url('artikel/addArtikel') ?>" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i> Tambah Data</a><br>
              </div>
              <div class="col-lg-5 pull-right">
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
            <?php if ($cari): ?>
              <p><i class="fa fa-search fa-fw">&nbsp</i>Hasil pencarian " <?= $cari ?> "</p>
            <?php endif ?>
            <?php if ($feed): ?>
              <?php foreach ($feed as $tampil): ?>
                <div class="box box-solid" style="padding: 5px">
                  <!-- /.box-header -->
                    <div class="box-header with-border">
                      <p>
                        <a href="<?= site_url('artikel/detail/'.$tampil->slug) ?>" class="text-black form-head">
                        <span style="font-size: 24px"><?= $tampil->judul ?></span></a><br>
                        <small><i class="fa fa-fw fa-calendar-o"></i> <?= mediumdate_indo($tampil->tanggal) ?>&nbsp - <i class="fa fa-fw fa-user-o"></i> <?= $tampil->author ?></small>
                      </p>
                    </div>

                  <div class="box-body" style="margin-bottom: 20px">
                    <div class="container" style="width: 100%;">
                      <?= limit_words(htmlspecialchars_decode($tampil->isi), 50) ?> &nbsp<?=anchor( 'artikel/detail/' . $tampil->slug, 
                      '<span class="label label-default">. . Selengkapnya</span>')?>
                    </div>
                  </div>
                  <div class="box-footer">
                    <a href="<?= site_url('artikel/removeArtikel/'.$tampil->id) ?>" onclick="return confirm('Hapus artikel ?')" class="btn btn-danger pull-right"><i class="fa fa-fw fa-close"> </i>Hapus</a>&nbsp 
                    <a href="<?= site_url('artikel/update/'.$tampil->id) ?>" class="btn btn-default"><i class="fa fa-fw fa-edit"> </i>Edit</a>&nbsp 
                  </div>
                </div>
              <?php endforeach ?>
            <?php else: ?>
              <pre style="text-align: center"><h4>Belum ada artikel</h4></pre>
            <?php endif ?>
            <?php
            echo $this->pagination->create_links();
            ?>
            <!-- sini -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- footer -->
    <?php include 'include/footer.php'; ?>
    <!-- /footer -->

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
 <!-- Bootstrap WYSIHTML5 -->
 <script src="<?= base_url();?>assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 <!-- page script -->
 <script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function isNumber(event) {
    var keycode=event.keyCode;
    if (keycode>47 && keycode<58){
      return true;
    }
    return false;
  }
</script>
</body>
</html>