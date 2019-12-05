<?php
$id      = $clients->id;
if($this->input->post('is_submitted')){
  $username  = set_value('username');
  $password  = set_value('password');
  $nama    = set_value('nama');
  $gender  = set_value('gender');
  $alamat  = set_value('alamat');
  $telepon = set_value('telepon');
} else {
  $edituser= $clients->username;
  $editpass= $clients->password;
  $editnama= $clients->nama;
  $editsex = $clients->gender;
  $editaddr= $clients->alamat;
  $edittelp= $clients->telepon;
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
  <title>PsikoPower | Profil</title>
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

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <?php include "include/header.php"; ?>
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
    <div class="content-wrapper" style="padding-bottom: 180px">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Profil 
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="">Profil</li>
          <li class="active">Edit</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3">
            <?php $error = $this->session->flashdata('error');?>
            <?php if($error){?>
              <div class="alert alert-danger alert-dismissible btn-xs">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $this->session->flashdata('error')?>
              </div>
            <?php } ?>
            <?php $done = $this->session->flashdata('done');?>
            <?php if($done){?>
              <div class="alert alert-success alert-dismissible btn-xs">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?= $this->session->flashdata('done')?>
              </div>
            <?php } ?>
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title"><a href="javascript:history.go(-1)" class="text-black form-head"><i class="fa fa-xs fa-angle-left fa-fw"> &nbsp</i>Profil</a></h3>

                <div class="box-tools pull-right">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?= form_open_multipart('profil/index/'.$id)?>
                <div class="form-group has-feedback" style="margin-top: 0.5em">
                  <p style="text-align: center">
                    <img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar'));?>" class="img-circle" style="height: 150px;" alt="User Image">
                  </p>
                  <input id='exampleInputFile' type="file" name="gambar">
                  <p class="help-block">Upload avatar baru 
                    <?php if ($this->session->userdata('avatar')!="img_avatar3.png"): ?>
                      atau 
                      <?=anchor( 'profil/index/'.$id.'/hapus','<span class="label label-danger">Hapus</span>', ['onclick'=>'return confirm(\'Hapus avatar?\')'])?>
                    <?php endif ?>
                  </p>
                  <small class="text-red"><?= form_error('gambar'); ?></small>
                </div>
                <div class="form-group has-feedback">
                  <label>Username</label>
                  <input type="text" class="form-control" readonly value="<?= $edituser ?>" required name="username">
                </div>
                <div class="form-group has-feedback">
                  <label>Nama Lengkap <?= set_value('nama') ?></label>
                  <input type="text" class="form-control" autocomplete="off" 
                  value="<?php if(!set_value('nama')){echo $editnama;}else{echo set_value('nama');} ?>" name="nama">
                  <small class="text-red"><?= form_error('nama'); ?></small>
                </div>
                <div class="form-group has-feedback">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="gender">
                    <?php if ($editsex==2): ?>
                      <option value="1">Laki-laki</option>
                      <option value="2" selected>Perempuan</option>
                      <?php elseif ($editsex==1): ?>
                        <option value="1" selected>Laki-laki</option>
                        <option value="2">Perempuan</option>
                      <?php endif ?>
                    </select>
                    <small class="text-red"><?= form_error('gender'); ?></small>
                  </div>
                  <div class="form-group has-feedback">
                    <label>Alamat</label>
                    <textarea class="form-control" autocomplete="off" name="alamat" style="resize: vertical;"><?php if(set_value('alamat')){echo set_value('alamat');}else{echo $editaddr;}?></textarea>
                    <small class="text-red"><?= form_error('alamat'); ?></small>
                  </div>
                  <div class="form-group has-feedback">
                    <label>Telepon</label>
                    <input type="tel" class="form-control" autocomplete="off"
                    value="<?php if(!set_value('telepon')){echo $edittelp;}else{echo set_value('telepon');} ?>" 
                    name="telepon" onkeypress="return isNumber(event)">
                    <small class="text-red"><?= form_error('telepon'); ?></small>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                  </div>
                  <!-- /.col -->
                </div>
                <?= form_close() ?>
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
      <footer class="main-footer">
        <?php include "include/footer.php"; ?>
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
