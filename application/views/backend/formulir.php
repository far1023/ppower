<?php
$id      = $hasil->id;
if($this->input->post('is_submitted')){
  $tanggal  = set_value('tanggal');
  $username  = set_value('username');
  $password  = set_value('password');
  $nama    = set_value('nama');
  $tf  = set_value('tf');
  $total  = set_value('total');
  $ujian = set_value('ujian');
  $ukey = set_value('ukey');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Pembayaran</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
  .invoice{
    
  }
</style>
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
        Pembayaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= site_url('pembayaran'); ?>">Pembayaran</a></li>
        <li class="active">#<?= $hasil->id ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <div class="row">
    <div class="col-md-2">
    </div>

    <section class="invoice col-md-8">
      <!-- title row -->
      <div class="row">
        <a href="javascript:history.go(-1)"
            class="w3-button w3-pale-red w3-hover-red w3-tiny w3-display-topright"><i class="fa fa-close fa-lg"></i></a>
        <div class="col-xs-12">
          <h2 class="page-header">
            <b>Psiko</b>Power
          </h2>
        </div>
        <!-- /.col -->
      </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Kode Pembayaran</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Jenis Tes</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?= $hasil->id; ?></td>
              <td><?= $hasil->username; ?></td>
              <td><?= $hasil->nama; ?></td>
              <td><?= $hasil->ujian; ?></td>
              <td>Rp<?= number_format($hasil->total,0,',','.'); ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <?php if ($hasil->status=="Pending"): ?>
            <p class="lead">Metode Pembayaran:</p>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <?= $hasil->tf;?><br>
              Pendaftaran <?= longdate_indo($hasil->tanggal);?><br><br>
            </p>
          <?php elseif ($hasil->status=="Paid" && $peserta->status=="Aktif"): ?>
            <p class="lead">Metode Pembayaran:</p>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              <?= $hasil->tf;?><br>
              Pendaftaran <?= longdate_indo($hasil->tanggal);?><br><br>
            </p>
          <?php elseif ($hasil->status=="Paid" && $peserta->status=="Selesai"): ?>
            <p class="lead">Hasil Tes : </p>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              No. Peserta : <?= $peserta->id;?><br>
              Nama Peserta  : <?= $peserta->nama;?><br><br>
              <a href="<?= site_url('ujian/myUjian/'.$tes->id) ?>" class="btn btn-default"><i class="fa fa-clipboard fa-fw"> &nbsp</i>Cek Hasil</a>
            </p>
          <?php endif ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rp<?= number_format($hasil->total,0,',','.'); ?></td>
              </tr>
              <tr>
                <th>Pajak (0%)</th>
                <td>Rp0</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>Rp<?= number_format($hasil->total,0,',','.'); ?></td>
              </tr>
              <tr>
                <?php if ($hasil->status=="Pending"): ?>
                <td colspan="2"><label class="btn btn-block label-default"><?= $hasil->status;?></label></td>
                <?php elseif ($hasil->status=="Paid"): ?>
                <td colspan="2"><label class="btn btn-block label-success"><?= $hasil->status;?></label></td>
                <?php endif ?>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn hide btn-default"><i class="fa fa-print"></i> Print</a>
          <?php if ($hasil->status=="Pending"): ?>
          <div class="row">
            <div class="col-lg-2 pull-right"><button type="button" data-toggle="modal" data-target="#modal-konfirm" class="btn btn-success pull-right"><i class="fa fa-check"></i> Konfirmasi</button></div>
            <div class="col-lg-3 pull-right">
              <?php if ($this->session->flashdata('error')): ?>
                <span class="text-red pull-right"><?= $this->session->flashdata('error'); ?></span>
              <?php endif ?>
            </div>
          </div>
          <?php elseif ($hasil->status=="Paid" && $peserta->status=="Aktif"): ?>
          <div class="row">
            <div class="col-lg-2 pull-right"><button type="button" data-toggle="modal" data-target="#modal-cancel" class="btn btn-danger pull-right"><i class="fa fa-remove"></i> Batalkan</button></div>
            <div class="col-lg-3 pull-right">
              <?php if ($this->session->flashdata('error')): ?>
                <span class="text-red pull-right"><?= $this->session->flashdata('error'); ?></span>
              <?php endif ?>
            </div>
          </div>
          <?php endif ?>
        </div>
      </div>
    </section>
  </div>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-konfirm">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
        </div>
        <div class="modal-body">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <i class="fa fa-warning fa-fw">&nbsp</i>Konfirmasi Password
          </p>
          <?= form_open_multipart('pembayaran/konfirm/'.$id)?>
      <div class="form-group has-feedback">
        <?php $ukey=random_string('alpha',6) ?>
        <input class="form-control hide" type="text" required readonly name="ukey"value="<?= $ukey?>">
        <input class="form-control hide" type="text" required readonly name="idpay" value="<?= $id ?>">
        <input class="form-control hide" type="text" required readonly name="tanggal" value="<?= longdate_indo($hasil->tanggal) ?>">
        <input class="form-control hide" type="text" required readonly name="username" value="<?= $hasil->username ?>">
        <input class="form-control hide" type="text" required readonly name="nama" value="<?= $hasil->nama ?>">
        <input class="form-control hide" type="text" required readonly name="ujian" value="<?= $hasil->ujian ?>">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon text-gray glyphicon-lock form-control-feedback"></span>
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
  <div class="modal fade" id="modal-cancel">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
        </div>
        <div class="modal-body">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <i class="fa fa-warning fa-fw">&nbsp</i>Konfirmasi Password
          </p>
          <?= form_open_multipart('pembayaran/cancel/'.$id)?>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon text-gray glyphicon-lock form-control-feedback"></span>
      </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-block btn-danger">Batalkan</button>
        </div>
        <?= form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php include_once 'include/footer.php'; ?>

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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
