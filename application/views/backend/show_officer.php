<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Petugas</title>
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
          Petugas
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Petugas</a></li>
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
              <i class="fa fa-exclamation fa-fw"> </i> <?= $this->session->flashdata('error')?>&nbsp <a href="<?= site_url('ujian/hasil') ?>">Cek di sini</a>
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
            <button class="btn btn-default btn-block" data-toggle="modal" data-target="#addOfficer" ><i class="fa fa-plus fa-fw"></i> Tambah Data</button><br>
          </div>
          <div class="col-md-10">
            <div class="box box-solid">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example2" class="table table-hover">
                  <thead>
                    <tr><th></th><th>Username</th><th>Level</th><th>Nama Lengkap</th><th>Jenis Kelamin</th><th>Alamat</th><th>Telepon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($admin): ?>
                      <?php foreach ($admin as $tampil): ?>
                        <tr class="w3-text-grey w3-hover-light-grey">
                          <?php if ($tampil->username!=$this->session->userdata('username')&&$tampil->username!="admin1"): ?>
                            <td><?=anchor( 'clients/removeOfficer/' . $tampil->id, 
                            '<i class="fa fa-times-rectangle fa-lg text-red w3-hover-red" title="Hapus"></i>',[
                             'onclick'=>'return confirm(\'Hapus data dokter '.$tampil->username.' ?\')'
                             ])?>&nbsp |
                          &nbsp<?=anchor( 'clients/editOfficer/' . $tampil->id, 
                          '<i class="fa fa-pencil-square-o fa-lg text-black" title="Edit"></i>')?></td>
                          <?php else: ?>
                            <td></td>
                          <?php endif ?>
                          <td><?= $tampil->username ?></td>
                          <?php if ($tampil->level==1): ?>
                            <td><?php echo 'Administrator'; ?></td>
                          <?php elseif ($tampil->level==3): ?>
                            <td><?php echo 'Dokter'; ?></td>
                          <?php endif ?>
                          <td><?= $tampil->nama ?></td>
                          <td><?php if ($tampil->gender != 2){ echo "Laki-laki"; }else{ echo "Perempuan"; }?></td>
                          <td><?= $tampil->alamat ?></td>
                          <td><?= $tampil->telepon ?></td>
                        </tr>
                      <?php endforeach ?>                    
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
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
    <div class="modal fade" id="addOfficer">
      <div class="modal-dialog modal-md" style="">
        <div class="modal-content">
          <div class="modal-header">
            <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
          </div>
          <div class="modal-body">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Tambah Petugas
            </p>
            <?= form_open_multipart('clients/showOfficer')?>
            <div class="row">
              <div class="col-md-6">
                  <p>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      <small class="text-red"><?= form_error('username'); ?></small>
                    </div>
                  </p>
                  <p>
                <div class="form-group has-feedback">
                  <select class="form-control" name="level">
                    <option value="" disabled selected>Level</option>
                    <?php if (set_value('level')==3): ?>
                      <option value="1">Administrator</option>
                      <option value="3" selected>Dokter</option>
                      <?php elseif (set_value('level')==1): ?>
                        <option value="1" selected>Administrator</option>
                        <option value="3">Dokter</option>
                        <?php else: ?>
                          <option value="1">Administrator</option>
                          <option value="3">Dokter</option>
                        <?php endif ?>
                      </select>
                      <small class="text-red"><?= form_error('level'); ?></small>
                    </div>
                  </p>
                  <p>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      <small class="text-red"><?= form_error('password'); ?></small>
                    </div>
                  </p>
                  <p>
                    <div class="form-group has-feedback">
                      <input type="password" class="form-control" name="repassword" placeholder="Konfirmasi Password" value="<?= set_value('repassword') ?>">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      <small class="text-red"><?= form_error('repassword'); ?></small>
                    </div>
                  </p>
                </div>
                <div class="col-md-6">
                  <p>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
                    <span class="glyphicon glyphicon-font form-control-feedback"></span>
                    <small class="text-red"><?= form_error('nama'); ?></small>
                  </div>
                </p>
                <p>
                  <div class="form-group has-feedback">
                    <select class="form-control" name="gender">
                      <option value="" disabled selected>Jenis Kelamin</option>
                      <?php if (set_value('gender')==2): ?>
                        <option value="1">Laki-laki</option>
                        <option value="2" selected>Perempuan</option>
                        <?php elseif (set_value('gender')==1): ?>
                          <option value="1" selected>Laki-laki</option>
                          <option value="2">Perempuan</option>
                          <?php else: ?>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                          <?php endif ?>
                        </select>
                        <small class="text-red"><?= form_error('gender'); ?></small>
                      </div>
                    </p>
                    <p>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" autocomplete="off" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                        <small class="text-red"><?= form_error('alamat'); ?></small>
                      </div>
                      <p>
                        <div class="form-group has-feedback">
                          <input type="tel" class="form-control" autocomplete="off" name="telepon" placeholder="Nomor Telepon" value="<?= set_value('telepon') ?>" onkeypress="return isNumber(event)">
                          <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                          <small class="text-red"><?= form_error('telepon'); ?></small>
                        </div>
                      </p>
                    </p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-block btn-success">Tambah</button>
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
<script>
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
