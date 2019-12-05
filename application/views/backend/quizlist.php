<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Indikator Penilaian</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Tes Tumbuh Balita
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Tes</li>
        <li class="">Tumbuh Balita</li>
        <li class="active">Indikator</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-2">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <?php include('include/folder.php'); ?>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <?php if ($this->db->count_all('soalbayi')<10): ?>
          <div class="" style="margin-bottom: 20px">
            <button type="button" data-toggle="modal" data-target="#modal-konfirm" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i> Tambah Data</button>
          </div>
          <?php endif ?>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-solid">
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-hover">
                <thead>
                <tr>
                  <th></th>
                  <th>Deskripsi Penilaian</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($isi as $tampil): ?>
                    <tr>
                      <td>
                        <?=anchor( 'quiz/delete/' . $tampil->id, 
                      '<i class="fa fa-times-rectangle text-red fa-lg" title="Hapus"></i>',[
                       'onclick'=>'return confirm(\'Hapus data ?\')'
                       ])?>&nbsp |
                    &nbsp<?=anchor( 'quiz/open/' . $tampil->id, 
                      '<i class="fa fa-pencil-square-o fa-lg w3-text-grey" title="Ubah"></i>')?>
                      </td>
                      <td><?= $tampil->soal ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
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

 <!-- /.content-wrapper -->
 <div class="modal fade" id="modal-konfirm">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
      </div>
      <div class="modal-body">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Tambah Indikator Penilaian
        </p>
        <?= form_open_multipart('quiz/add')?>
        <div class="form-group has-feedback">
          <p>
            <label>Deskripsi Penilaian</label>
            <textarea class="form-control" name="soal" required style="resize: vertical;"></textarea>
          </p>
          <p>
            <b>Pencapaian (Rendah - Tinggi)</b>
          </p>
          <p><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
            </div>
            <input type="text" class="form-control" name="opsa" autocomplete="off" required title="opsA">
          </div></p>
          <p><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
            </div>
            <input type="text" class="form-control" name="opsb" autocomplete="off" required title="opsB">
          </div></p>
          <p><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle-o text-gray"></i>
              <i class="fa fa-circle-o text-gray"></i>
            </div>
            <input type="text" class="form-control" name="opsc" autocomplete="off" required title="opsC">
          </div></p>
          <p><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle-o text-gray"></i>
            </div>
            <input type="text" class="form-control" name="opsd" autocomplete="off" required title="opsD">
          </div></p>
          <p><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
              <i class="fa fa-circle"></i>
            </div>
            <input type="text" class="form-control" name="opse" autocomplete="off" required title="opsE">
          </div></p>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-block btn-success">Konfirmasi</button>
    </div>
    <?= form_close() ?>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
  });
</script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
