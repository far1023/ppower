<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Ganti Password</title>
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
<style>
  input, textarea, select {
    outline:none;
    border: 0px solid;
  }
  textarea{
    resize: vertical;
  }
  .hr2 { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.5px;
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
          &nbsp 
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="">Password</li>
          <li class="active">Ganti</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3">
            <?php $eror = $this->session->flashdata('error');?>
            <?php if($eror){?>
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
            <!-- /. box -->
          </div>
          <!-- /.col -->
          <div class="col-md-5">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title"><a href="javascript:history.go(-1)" class="text-black form-head"><i class="fa fa-xs fa-angle-left fa-fw"> &nbsp</i>Ganti Password</a></h3>
                <div class="box-tools pull-right">
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?= form_open_multipart('profil/changePassword/'.$this->session->userdata('id'))?>
                <div class="form-group has-feedback" style="margin-top: 0.5em">
                  <label>Password Lama</label>
                  <input type="password" class="form-control" autocomplete="off" name="current">
                  <small class="text-red"><?= form_error('current'); ?></small>
                </div>
                <hr class="hr2" style="opacity: 0.1">
                <div class="form-group has-feedback">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" autocomplete="off" name="pass">
                  <small class="text-red"><?= form_error('pass'); ?></small>
                </div>
                <div class="form-group has-feedback">
                  <label>Konfirmasi Password</label>
                  <input type="password" class="form-control" autocomplete="off" name="repass">
                  <small class="text-red"><?= form_error('repass'); ?></small>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-xs-3 pull-right">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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
    $('#example1').DataTable()
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
