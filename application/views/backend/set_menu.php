<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Menu Settings</title>
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
    <div class="content-wrapper" style="padding-bottom: 100px">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Menu Settings
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Settings</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3"><div class="box box-default">
            <div class="box-body">
              <div class="table-responsive no-border">
                <table class="table table-hover">
                  <tbody>
                    <?php if ($col): ?>  
                      <?php foreach ($col as $tampil): ?>
                        <tr class="">
                          <td><?=anchor( 'menu_settings/dCol/' . $tampil->id, 
                            '<i class="fa fa-times-rectangle fa-lg text-red" title="Hapus"></i>',[
                             'onclick'=>'return confirm(\'Hapus menu '.$tampil->kategori.' ?\')'
                             ])?></td>
                          <td><?= $tampil->kategori ?></td>
                          <td><?php if($tampil->level!=2){echo 'Admin';}else{echo 'Clients';}?></td>
                        </tr>
                      <?php endforeach ?>
                      <?php elseif (!$col): ?>
                        <tr>
                          <td colspan="6" style="text-align: center">Tidak Ada Data</td>
                        </tr>
                      <?php endif ?>
                    </tbody>
                  </table>
                  <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->

              <div class="">
                <button type="button" data-toggle="modal" data-target="#addCol" class="btn btn-block btn-default btn-xs"><i class="fa fa-plus fa-fw"></i> Kolom</button>
              </div>
              </div></div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9"><div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#main-menu" data-toggle="tab">Main Menu &nbsp<button type="button" data-toggle="modal" data-target="#addMenu" class="btn btn-xs btn-default"><i class="fa fa-plus fa-fw"></i></button>
              </a></li>
              <li><a href="#sub-menu" data-toggle="tab">Sub Menu &nbsp<button type="button" data-toggle="modal" data-target="#addSub" class="btn btn-xs btn-default"><i class="fa fa-plus fa-fw"></i></button></a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="main-menu">
                <div class="table-responsive no-border">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Main Menu</th>
                        <th>Link</th>
                        <th>Icon</th>
                        <th>Kategori</th>
                        <th>Level</th>
                        <th>Aktif</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($menu): ?>  
                        <?php foreach ($menu as $tampil): ?>
                          <tr class="">
                            <td><?=anchor( 'menu_settings/dMenu/' . $tampil->id, 
                              '<i class="fa fa-times-rectangle fa-lg text-red" title="Hapus"></i>',[
                               'onclick'=>'return confirm(\'Hapus menu '.$tampil->nama.' ?\')'
                               ])?></td>
                            <td><?= $tampil->nama ?></td>
                            <td>ppower/<?= $tampil->link ?></td>
                            <td><i class="<?= $tampil->icon ?> fa-fw"></i>&nbsp <?= $tampil->icon ?></td>
                            <td><?php foreach ($col as $value) {
                              if ($value->id == $tampil->kategori) {
                                echo $value->kategori;
                              }
                            } ?></td>
                            <td><?php if($tampil->level!=2){echo "Admin";}else{echo"Clients";} ?></td>
                            <td>
                            <?php if ($tampil->aktif==1): ?>
                              <span class="label label-success">ON</span>
                              <?=anchor( 'menu_settings/turnMenu/'.$tampil->id.'/off','<span class="label label-default">OFF</span>', ['onclick'=>'return confirm(\'Matikan menu?\')'])?>
                            <?php else: ?>
                              <?=anchor( 'menu_settings/turnMenu/'.$tampil->id.'/on','<span class="label label-default">ON</span>', ['onclick'=>'return confirm(\'Aktifkan menu?\')'])?>
                              <span class="label label-danger">OFF</span>
                            <?php endif ?>
                            </td>
                          </tr>
                        <?php endforeach ?>
                        <?php elseif (!$menu): ?>
                          <tr>
                            <td colspan="6" style="text-align: center">Tidak Ada Data</td>
                          </tr>
                        <?php endif ?>
                      </tbody>
                    </table>
                    
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane" id="sub-menu">
              <div class="tab-pane active" id="main-menu">
                <div class="table-responsive no-border">
                  <table id="example3" class="table table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Sub Menu</th>
                        <th>Link</th>
                        <th>Main Menu</th>
                        <th>Level</th>
                        <th>Aktif</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if ($submenu): ?>  
                        <?php foreach ($submenu as $tampil): ?>
                          <tr class="">
                            <td><?=anchor( 'menu_settings/dSub/' . $tampil->id, 
                              '<i class="fa fa-times-rectangle fa-lg text-red" title="Hapus"></i>',[
                               'onclick'=>'return confirm(\'Hapus menu '.$tampil->nama.' ?\')'
                               ])?></td>
                            <td><?= $tampil->nama ?></td>
                            <td>ppower/<?= $tampil->link ?></td>
                            <td><?php foreach ($menu as $value) {
                              if ($value->id == $tampil->main) {
                                echo $value->nama;
                              }
                            } ?></td>
                            <td><?php if($tampil->level==1){echo "Admin";}else{echo"Clients";} ?></td>
                            <td>
                            <?php if ($tampil->aktif==1): ?>
                              <span class="label label-success">ON</span>
                              <?=anchor( 'menu_settings/turnSub/'.$tampil->id.'/off','<span class="label label-default">OFF</span>', ['onclick'=>'return confirm(\'Matikan menu?\')'])?>
                            <?php else: ?>
                              <?=anchor( 'menu_settings/turnSub/'.$tampil->id.'/on','<span class="label label-default">ON</span>', ['onclick'=>'return confirm(\'Aktifkan menu?\')'])?>
                              <span class="label label-danger">OFF</span>
                            <?php endif ?>
                            </td>
                          </tr>
                        <?php endforeach ?>
                        <?php elseif (!$submenu): ?>
                          <tr>
                            <td colspan="6" style="text-align: center">Tidak Ada Data</td>
                          </tr>
                        <?php endif ?>
                      </tbody>
                    </table>
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
              </div>                
              </div>
              <!-- /#ion-icons -->
            </div>
            <!-- /.tab-content -->
          </div>
              <!-- /. box -->
              
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
 <?php if ($this->session->flashdata('errorMenu')): ?>
   <script>alert("Maaf Terjadi Kesalahan")</script>
 <?php endif ?>
 <div class="modal fade" id="addMenu">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('menu_settings/addMenu')?>
        <div class="form-group has-feedback">
          <div class="row">
            <div class="col-md-6">
              <p>
                <label>Menu : </label>
                <input class="form-control" autocomplete="off" name="nama" type="text" value="<?= set_value('nama') ?>">  
              </p>
              <p>
                <label>Link : </label>
                <span style="font-family: Lucida Console">&nbspppower/</span>
                <input class="form-control" autocomplete="off" name="link" type="text" value="<?= set_value('link') ?>">
              </p>
              <p>
                <label>Icon :</label><a href="<?= site_url('menu_settings/icon_list') ?>" target="blank" class="pull-right">cek disini</a>
                <input class="form-control" autocomplete="off" name="icon" type="text" value="<?= set_value('icon') ?>">
              </p>
            </div>
            <div class="col-md-6"><p>
              <label>Kategori : </label>
              <select class="form-control" name="kategori">
                <option value="" selected disabled>-- pilih</option>
                <?php foreach ($col as $value): ?>
                  <option value="<?= $value->id ?>"><?= $value->kategori ?></option>
                <?php endforeach ?>
              </select>
            </p>
            <p>
              <label>Level : </label>
              <select class="form-control" autocomplete="off" name="level">
                <option value="" selected disabled>-- pilih</option>
                <option value="1">Admin</option>
                <option value="2">Client</option>
              </select>
            </p>
            <p>
              <label>Aktif : </label>
              <select class="form-control" autocomplete="off" name="aktif">
                <option value="" selected disabled>-- pilih</option>
                <option value="0">N</option>
                <option value="1">Y</option>
              </select>
            </p>             
          </div>
        </div>
        <div class="row">
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

 <div class="modal fade" id="addCol">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('menu_settings/addCol')?>
        <div class="form-group has-feedback">
          <div class="row">
            <div class="col-md-12"><p>
              <label>Kategori : </label>
              <input class="form-control" autocomplete="off" name="kategori" type="text" value="<?= set_value('kategori') ?>">  
            </p>
            <p>
              <label>Level : </label>
              <select class="form-control" autocomplete="off" name="level">
                <option value="" selected disabled>-- pilih</option>
                <option value="1">Admin</option>
                <option value="2">Client</option>
              </select>
            </p>
            <p>
              <label>Aktif : </label>
              <select class="form-control" autocomplete="off" name="aktif">
                <option value="" selected disabled>-- pilih</option>
                <option value="0">N</option>
                <option value="1">Y</option>
              </select>
            </p>             
          </div>
        </div>
        <div class="row">
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

<div class="modal fade" id="addSub">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('menu_settings/addSub')?>
        <div class="form-group has-feedback">
          <div class="row">
            <div class="col-md-6">
              <p>
                <label>Sub Menu : </label>
                <input class="form-control" autocomplete="off" name="nama" type="text" value="<?= set_value('nama') ?>">  
              </p>
              <p>
                <label>Link : </label>
                <span style="font-family: Lucida Console">&nbspppower/</span>
                <input class="form-control" autocomplete="off" name="link" type="text" value="<?= set_value('link') ?>">
              </p>
              <p>
                <label>Icon :</label><a href="<?= site_url('menu_settings/icon_list') ?>" target="blank" class="pull-right">cek disini</a>
                <input class="form-control" autocomplete="off" name="icon" type="text" value="<?= set_value('icon') ?>">
              </p>
            </div>
            <div class="col-md-6"><p>
              <label>Sub to : </label>
              <select class="form-control" name="kategori">
                <option value="" selected disabled>-- pilih</option>
                <?php foreach ($menu as $r): ?>
                  <option value="<?= $r->id ?>">
                    <i><?php if($r->level!=2){echo "(Admin) ";}else{echo '(Clients) ';} ?></i><?= $r->nama ?>
                  </option>
                <?php endforeach ?>
              </select>
            </p>
            <p>
              <label>Level : </label>
              <select class="form-control" autocomplete="off" name="level">
                <option value="" selected disabled>-- pilih</option>
                <option value="1">Admin</option>
                <option value="2">Client</option>
              </select>
            </p>
            <p>
              <label>Aktif : </label>
              <select class="form-control" autocomplete="off" name="aktif">
                <option value="" selected disabled>-- pilih</option>
                <option value="0">N</option>
                <option value="1">Y</option>
              </select>
            </p>             
          </div>
        </div>
        <div class="row">
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
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    })
  })
  $(function () {
    $('#example3').DataTable({
      'paging'      : true,
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
