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
    <?php include "include/header.php" ?>
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
        <li>
          <a href="<?= site_url('ujian/pilih') ?>">
            <i class="fa fa-book"></i> <span>Daftar Tes</span>
          </a>
        </li>
        <li class="header">AKUN</li>
        <li class="active">
          <a href="<?= site_url('pembayaran/show/'.$this->session->userdata('username')) ?>">
            <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
          </a>
        </li>
        <li>
          <a href="<?= site_url('ujian/peserta/'.$this->session->userdata('username')) ?>">
            <i class="fa fa-id-badge"></i> <span>Kepesertaan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?= site_url('hasil/'.$this->session->userdata('username')) ?>">
            <i class="fa fa-file-text-o"></i>
            <span>Hasil Tes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?= site_url('ujian/hasil/'.$this->session->userdata('username').'') ?>"><i class="fa fa-circle-o"></i>Jurusan Kuliah</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Tumbuh Balita</a></li>
          </ul>
        </li>
          <li class="header">BANTUAN</li>
          <li class="">
            <a href="<?= site_url('pesan/showPesan'); ?>">
              Pesan
            </a>
          </li>
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
    <div class="col-md-2">      
    </div>
    <section class="invoice col-md-8">
      <!-- title row -->
      <div class="row">
        <a href="<?= site_url('pembayaran/show') ?>"
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
              <a href="<?= site_url('ujian/myUjian/'.$tes->id) ?>" class="btn btn-flat btn-primary"><i class="fa fa-clipboard fa-fw"> &nbsp</i>Cek Hasil</a>
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
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Ilmu Komputer | <img src="<?=base_url('assets/images/ur1.png');?>" class="" style="height: 30px">
    </div>
    1403119788 - 
    <strong>Fuad Agil &copy; 2019 </strong>.
  </footer>

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
