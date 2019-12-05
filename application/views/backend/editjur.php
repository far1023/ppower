<?php
$id      = $jurusan->id;
if($this->input->post('is_submitted')){
  $nama  = set_value('nama');
  $se    = set_value('se');
  $wa    = set_value('wa');
  $an    = set_value('an');
  $ge    = set_value('ge');
  $ra    = set_value('ra');
  $zr    = set_value('zr');
  $fa    = set_value('fa');
  $wu    = set_value('wu');
  $me    = set_value('me');
} else {
  $editnama= $jurusan->nama;
  $editse = $jurusan->se;
  $editwa = $jurusan->wa;
  $editan = $jurusan->an;
  $editge = $jurusan->ge;
  $editra = $jurusan->ra;
  $editzr = $jurusan->zr;
  $editfa = $jurusan->fa;
  $editwu = $jurusan->wu;
  $editme = $jurusan->me;
}
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Profil Jurusan</title>
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
          Tes Jurusan Kuliah
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="">Tes</li>
          <li class=""><a href="<?= site_url('ujian/jurusan') ?>">Jurusan Kuliah</a></li>
          <li class="active">Edit Profil</li>
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
                  <li class="active"><a href="<?= site_url('ujian/jurusan') ?>"><i class="fa fa-drivers-license-o fa-fw"></i> Profil Jurusan
                    <li class=""><a href="<?= site_url('ujian/peserta/jurusan-kuliah.html') ?>"><i class="fa fa-group fa-fw"></i> Peserta Tes</a></li>
                    <li><a href="<?= site_url('ujian/hasil')?>"><i class="fa fa-file-text-o fa-fw"></i> Hasil Tes</a></li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /. box -->
              <div class="" style="margin-bottom: 20px">
                <button type="button" data-toggle="modal" data-target="#modal-konfirm" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i> Tambah Data</button>
              </div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h5 class="box-title"><a href="javascript:history.go(-1)" class="text-black form-head"><i class="fa fa-xs fa-angle-left fa-fw"> &nbsp</i>Edit Profil Jurusan</a></h5>

                  <div class="box-tools pull-right">
                  </div>
                </div>
                <div class="box-body">
                  <div class="form-group has-feedback">
                    <?= form_open_multipart('ujian/jurusanEdit/'.$id) ?>
                    <p>
                      <label>Nama Jurusan</label>
                      <input class="form-control" autocomplete="off" name="nama" type="text" required list="jurusan" value="<?= $editnama?>"></p>
                      <datalist id="jurusan">
                       <?php foreach ($jur as $show): ?>
                        <option value="<?= $show->nama; ?>">
                        </option>
                      <?php endforeach ?>
                    </datalist>
                    <div class="row">
                      <div class="col-md-4">
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">SE</span>
                          </div>
                          <input class="form-control" name="se" type="number" min="1" max="5" required value="<?= $editse?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">WA</span>
                          </div>
                          <input class="form-control" name="wa" type="number" min="1" max="5" required value="<?= $editwa?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">AN</span>
                          </div>
                          <input class="form-control" name="an" type="number" min="1" max="5" required value="<?= $editan?>">
                        </div></p>
                      </div>
                      <div class="col-md-4">
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">GE</span>
                          </div>
                          <input class="form-control" name="ge" type="number" min="1" max="5" required value="<?= $editge?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">RA</span>
                          </div>
                          <input class="form-control" name="ra" type="number" min="1" max="5" required value="<?= $editra?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">ZR</span>
                          </div>
                          <input class="form-control" name="zr" type="number" min="1" max="5" required value="<?= $editzr?>">
                        </div></p>
                      </div>
                      <div class="col-md-4">
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">FA</span>
                          </div>
                          <input class="form-control" name="fa" type="number" min="1" max="5" required value="<?= $editfa?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">WU</span>
                          </div>
                          <input class="form-control" name="wu" type="number" min="1" max="5" required value="<?= $editwu?>">
                        </div></p>
                        <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">ME</span>
                          </div>
                          <input class="form-control" name="me" type="number" min="1" max="5" required value="<?= $editme?>">
                        </div></p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <div class="col-md-3 pull-right">
                    <button type="submit" class="btn btn-block btn-flat btn-primary">Submit</button>
                  </div>
                </div>
                <?= form_close() ?>
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
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-konfirm">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
        </div>
        <div class="modal-body">
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Tambah Data Profil Jurusan
          </p>
          <?= form_open_multipart('ujian/addJurusan')?>
      <div class="form-group has-feedback">
        <p>
          <label>Nama Jurusan</label>
          <input class="form-control" autocomplete="off" name="nama" type="text" required list="jurusan"></p>
        <datalist id="jurusan">
           <?php foreach ($jur as $show): ?>
            <option value="<?= $show->nama; ?>">
            </option>
          <?php endforeach ?>
        </datalist>
        <div class="row">
          <div class="col-md-4">
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">SE</span>
                          </div>
                          <input class="form-control" name="se" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">WA</span>
                          </div>
                          <input class="form-control" name="wa" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">AN</span>
                          </div>
                          <input class="form-control" name="an" type="number" min="1" max="5" required>
                        </div></p>
          </div>
          <div class="col-md-4">
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">GE</span>
                          </div>
                          <input class="form-control" name="ge" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">RA</span>
                          </div>
                          <input class="form-control" name="ra" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">ZR</span>
                          </div>
                          <input class="form-control" name="zr" type="number" min="1" max="5" required>
                        </div></p>
          </div>
          <div class="col-md-4">
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">FA</span>
                          </div>
                          <input class="form-control" name="fa" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">WU</span>
                          </div>
                          <input class="form-control" name="wu" type="number" min="1" max="5" required>
                        </div></p>
            <p><div class="input-group">
                          <div class="input-group-addon">
                            <span style="font-family: Lucida Console">ME</span>
                          </div>
                          <input class="form-control" name="me" type="number" min="1" max="5" required>
                        </div></p>
          </div>
        </div>
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
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url();?>assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
