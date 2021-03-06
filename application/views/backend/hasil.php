<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Jurusan Kuliah</title>
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
          Tes Jurusan Kuliah
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="">Tes</li>
          <li class="">Jurusan Kuliah</li>
          <li class="active">Hasil</li>
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
              <?php if ($this->session->userdata('level')==3 && $ttd->title): ?>
                <div class="" style="margin-bottom: 20px">
                  <button type="button" data-toggle="modal" data-target="#modal-konfirm" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i> Tambah Data</button>
                </div>
              <?php elseif($this->session->userdata('level')==3 && !$ttd->title): ?>
                <div class="" style="margin-bottom: 20px">
                  <a href="<?= site_url('profil/index/'.$this->session->userdata('id')); ?>" class="btn btn-default btn-block"><i class="fa fa-plus fa-fw"></i>Tanda Tangan</a>
                </div>
              <?php endif ?>
              <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-10"><div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#fa-icons" data-toggle="tab">Hasil Ujian</a></li>
              <li><a href="#glyphicons" data-toggle="tab">Saran</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="fa-icons">
                <div class="table-responsive no-border">
                  <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>No. Peserta</th>
                          <th>Nama Peserta</th>
                          <th style="font-family: Lucida Console">SE</th>
                          <th style="font-family: Lucida Console">WA</th>
                          <th style="font-family: Lucida Console">AN</th>
                          <th style="font-family: Lucida Console">GE</th>
                          <th style="font-family: Lucida Console">RA</th>
                          <th style="font-family: Lucida Console">ZR</th>
                          <th style="font-family: Lucida Console">FA</th>
                          <th style="font-family: Lucida Console">WU</th>
                          <th style="font-family: Lucida Console">ME</th>
                          <th>Pemeriksa</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($hasil): ?>
                          <?php foreach ($hasil as $tampil): ?>
                            <tr class="">
                              <td><?=anchor( 'ujian/removeHasil/' . $tampil->id, 
                                '<i class="fa fa-times-rectangle fa-lg w3-text-grey text-red" title="Hapus"></i>',[
                                 'onclick'=>'return confirm(\'Hapus hasil ujian dari peserta : '.$tampil->nama.' ?\')'
                                 ])?>&nbsp |
                              &nbsp<?=anchor( 'ujian/myUjian/' . $tampil->id, 
                              '<i class="fa fa-clipboard fa-lg w3-text-grey" title="Lihat Hasil"></i>')?></td>
                              <td><?= $tampil->id_peserta ?></td>
                              <td><?= $tampil->nama ?></td>
                              <td><?= $tampil->se ?></td>
                              <td><?= $tampil->wa ?></td>
                              <td><?= $tampil->an ?></td>
                              <td><?= $tampil->ge ?></td>
                              <td><?= $tampil->ra ?></td>
                              <td><?= $tampil->zr ?></td>
                              <td><?= $tampil->fa ?></td>
                              <td><?= $tampil->wu ?></td>
                              <td><?= $tampil->me ?></td>
                              <td>
                                <?php foreach ($doc as $v): ?>
                                  <?php if ($v->id==$tampil->id_doc): ?>
                                    <?= $v->nama ?>
                                  <?php endif ?>
                                <?php endforeach ?>
                              </td>
                            </tr>
                          <?php endforeach ?>                    
                        <?php endif ?>
                      </tbody>
                    </table>
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane" id="glyphicons">
              <div class="tab-pane active" id="fa-icons">
                <div class="table-responsive no-border">
                  <table id="example3" class="table table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Subtes</th>
                          <th>Jenis Saran</th>
                          <th>Deskripsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if ($saran): ?>
                          <?php foreach ($saran as $v): ?>
                            <tr class="">
                              <td>
                                <a href="#" data-toggle="modal" data-target="#edit<?= $v->id ?>">
                                  <i class="fa fa-edit fa-lg w3-text-grey text-grey" title="Hapus"></i>
                                </a>
                              </td>
                              <td style="font-family: Lucida Console">
                                <?php if($v->subtes){echo $v->subtes;}else{echo '-';} ?>
                              </td>
                              <td><?= $v->nama ?></td>
                              <td>
                                <?php if ($v->deskripsi): ?>
                                <?=anchor( 'saran/delete/' . $v->id, 
                                '<i class="fa fa-times-rectangle fa-lg w3-text-grey text-red" title="Hapus"></i>',[
                                'onclick'=>'return confirm(\'Hapus deskripsi '.$v->nama.' ?\')'
                                ])?> &nbsp
                                <?php endif ?>
                                <?= $v->deskripsi ?></td>
                            </tr>
                             <div class="modal fade" id="edit<?= $v->id ?>">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
                                  </div>
                                  <div class="modal-body">
                                    <?php $idupdate=$v->id; ?>
                                    <?= form_open_multipart('saran/update/'.$idupdate)?>
                                    <div class="form-group has-feedback">
                                      <p>
                                        <label for="deskripsi"><?= $v->nama ?></label>
                                        <textarea class="form-control" autocomplete="off" name="deskripsi" type="text" required style="resize: vertical; height: 100px;"><?= $v->deskripsi ?></textarea>
                                      </p>
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
                          <?php endforeach ?>
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
 <div class="modal fade" id="modal-konfirm">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
      </div>
      <div class="modal-body">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Tambah Hasil Tes
        </p>
        <?= form_open_multipart('ujian/input')?>
        <div class="form-group has-feedback">
          <div class="row">
            <div class="col-md-6">
              <p><input class="form-control" autocomplete="off" name="id" type="text" placeholder="Id Peserta" required list="peserta">
                <datalist id="peserta">
                 <?php foreach ($val as $peserta): ?>
                  <option value="<?= $peserta->id; ?>">
                    <?= $peserta->nama; ?></option>
                  <?php endforeach ?>
                </datalist></p>
              </div>
              <div class="col-md-6"><small>&nbsp *atau isikan nama peserta</small></div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">SE</span>
                </div>
                <input class="form-control" name="se" type="number" min="1" max="20" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">WA</span>
                </div>
                <input class="form-control" name="wa" type="number" min="1" max="20" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">AN</span>
                </div>
                <input class="form-control" name="an" type="number" min="1" max="20" required>
              </div></p>
            </div>
            <div class="col-md-4">
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">GE</span>
                </div>
                <input class="form-control" name="ge" type="number" min="1" max="32" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">RA</span>
                </div>
                <input class="form-control" name="ra" type="number" min="1" max="20" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">ZR</span>
                </div>
                <input class="form-control" name="zr" type="number" min="1" max="20" required>
              </div></p>
            </div>
            <div class="col-md-4">
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">FA</span>
                </div>
                <input class="form-control" name="fa" type="number" min="1" max="20" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">WU</span>
                </div>
                <input class="form-control" name="wu" type="number" min="1" max="20" required>
              </div></p>
              <p><div class="input-group">
                <div class="input-group-addon">
                  <span style="font-family: Lucida Console">ME</span>
                </div>
                <input class="form-control" name="me" type="number" min="1" max="20" required>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  $(function () {
    $('#example3').DataTable({
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
