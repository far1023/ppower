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
          <li><a href="<?= site_url('artikel') ?>">Artikel</a></li>
          <li class="active"><?= $value->judul ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-2">
            &nbsp
          </div>
          <div class="col-md-8">
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
            <div class="box box-solid" style="padding: 5px">
              <div class="box-header with-border">
                <h3 class="box-title"><a href="<?= site_url('artikel') ?>" class="text-black form-head"><i class="fa fa-xs fa-angle-left fa-fw"> &nbsp</i>Edit Artikel</a></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="margin-bottom: 20px">
                <?= form_open_multipart('artikel/update/'.$value->id)?>
                <p>
                  <div class="form-group has-feedback">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" autocomplete="off" name="judul" value="<?php if(set_value('judul')){echo set_value('judul');}else{echo $value->judul;} ?>">
                    <small class="text-red"><?= form_error('judul'); ?></small>
                  </div>
                </p>
                <p>
                  <label for="">Isi Artikel</label>
                  <textarea class="textarea" name="isi"
                  style="width: 100%; height: 300px; resize: vertical; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= set_value('isi') ?><?php if(set_value('isi')){echo set_value('isi');}else{echo $value->isi;} ?></textarea>
                  <small class="text-red"><?= form_error('isi'); ?></small>
                </p>
                <p>
                  <?php if ($value->gambar): ?>
                    <p style="text-align: center"><img src="<?= base_url('assets/images/post/'.$value->gambar);?>" style="height: 150px;"><br><?=anchor( 'artikel/update/'.$value->id.'/remove','<span class="label label-danger">Hapus</span>', ['onclick'=>'return confirm(\'Hapus gambar?\')'])?></p>
                  <?php endif ?>
                  <input id='exampleInputFile' type="file" name="gambar">
                  <p class="help-block">max 300Kb</p>
                </p>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-success">Update</button>
              </div>
                <?= form_close(); ?>
            </div>
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
    $('.textarea').wysihtml5({
      toolbar: {
        "font-styles": true,
        "image": false,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": false,
        "color": true,
        "blockquote": true,
      }
    })
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