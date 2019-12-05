<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/w3.css') ?>">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/plugins/iCheck/square/blue.css">
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
    <?php include 'include/topbar.php'; ?>        
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar:
     style can be found in sidebar.less -->
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
        Dashboard
        <small>Administrator</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <a href="<?= site_url('clients/showOfficer') ?>" style="text-decoration: none; color: #000;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-user-md"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Petugas</span>
              <span class="info-box-number"><?php echo $this->db->where('level !=', 2)->count_all_results('clients'); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
        <a href="<?= site_url('clients/showClients') ?>" style="text-decoration: none; color: #000;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-group"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Clients</span>
              <span class="info-box-number"><?php echo $this->db->where('level', 2)->count_all_results('clients'); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
        <a href="<?= site_url('pembayaran') ?>" style="text-decoration: none; color: #000;">
          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-credit-card"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pembayaran</span>
              <span class="info-box-number"><?php echo $this->db->count_all('pembayaran'); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <a href="<?= site_url('pesan/showPesan') ?>" style="text-decoration: none; color: #000;"><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pesan</span>
              <span class="info-box-number"><?php echo $this->db->count_all('contact'); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Default box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Pembayaran</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive no-border">
          <table id="example2" class="table table-hover">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Jenis Ujian</th>
                <th>Metode Pembayaran</th>
                <th>Total Bayar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($bayar as $tampil): ?>
                <tr>
                  <td><?= mediumdate_indo($tampil->tanggal);?></td>
                  <td><?= $tampil->username;?></td>
                  <td><?= $tampil->nama;?></td>
                  <td><?= $tampil->ujian;?></td>
                  <td><?= $tampil->tf;?></td>
                  <td>Rp<?= number_format($tampil->total,0,',','.')?></td>
                  <?php if ($tampil->status == "Pending"): ?>
                    <td><?=anchor( 'pembayaran/open/' . $tampil->id, 
                    '<span class="label label-default">'.$tampil->status.'</span>')?></td>
                  <?php endif ?>
                  <?php if ($tampil->status == "Paid"): ?>
                    <td><?=anchor( 'pembayaran/open/' . $tampil->id, 
                    '<span class="label label-success">'.$tampil->status.'</span>')?></td>
                  <?php endif ?>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="<?= site_url('pembayaran') ?>" class="uppercase pull-right">
            <i class="fa fa-bars fa-fw"></i>Selengkapnya</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Baru Bergabung</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive no-border">
                <table class="table no-margin table-hover">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($clients as $tampil): ?>
                  <tr>
                    <td><?= $tampil->username;?></td>
                      <td><?= $tampil->nama;?></td>
                      <td><?php if ($tampil->gender ==1) {
                        echo "Laki-Laki";
                      }
                      else{
                        echo "Perempuan";
                      }?>
                    </td>
                    <td><?= $tampil->alamat;?></td>
                    <td><?= $tampil->telepon;?></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?= site_url('clients/showClients');?>" class="uppercase pull-right">
                <i class="fa fa-bars fa-fw"></i>Selengkapnya</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Penyelenggaraan Tes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <?php if (!$ujian): ?>
                  <li><?= $this->session->flashdata('error')?>
                    <a href="#">
                      <span class="pull-right text-red">
                        <i class="fa fa-refresh"></i>
                      </span>
                    </a>
                  </li>
                <?php elseif($ujian): ?>
                 <table class="table no-margin table-hover">
                  <tbody>
                  <?php foreach ($ujian as $tampil): ?>
                  <tr>
                    <td class="text-center"><?=anchor( 'ujian/removeUjian/' . $tampil->id, 
                        '<i class="fa fa-times-rectangle fa-lg text-red" title="Hapus"></i>',[
                         'onclick'=>'return confirm(\'Hapus data ujian '.$tampil->nama.' ?\')'
                         ])?>
                    </td>
                    <td><?= $tampil->nama;?></td>
                    <td><span class="label label-warning pull-right">Rp<?= number_format($tampil->biaya,0,',','.') ?></span></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <?php endif; ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button class="btn bg-blue btn-sm pull-right" data-toggle="modal" data-target="#modal-default">Tambah</button>
            </div>
            <!-- /.footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('ujian/addUjian')?>
          <p>
            <label>Nama Ujian :</label>
            <input class="form-control" autocomplete="off" name="nama" type="text" required>
          </p>
          <p>
            <label>Biaya Ujian :</label>
            <div class="input-group">
              <div class="input-group-addon">
                Rp
              </div>
              <input class="form-control" name="biaya" type="number" min=10000 required>
            </div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-block btn-success">Simpan</button>
        </div>
        <?= form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

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
<!-- FastClick -->
<script src="<?= base_url();?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url();?>assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?= base_url();?>assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url();?>assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="b<?= base_url();?>assets/AdminLTE/ower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url();?>assets/AdminLTE/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url();?>assets/AdminLTE/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
