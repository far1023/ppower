<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Bantuan</title>
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
  .hr2 { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.5px;
    }textarea{
      resize: vertical;
      outline:none;
      border: 0px solid;
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
          Bantuan
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Bantuan</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-2">
            <div class="" style="margin-bottom: 20px">
              <button type="button" data-toggle="modal" data-target="#modal-konfirm" class="btn btn-success btn-block">Kirim Pesan</button>
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="box box-solid">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example2" class="table table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Tanggal</th>
                      <th>Perihal</th>
                      <th>Isi Pesan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php function limit_words($string, $word_limit){
                      $words = explode(" ",$string);
                      return implode(" ",array_splice($words,0,$word_limit));
                    }?>
                    <?php if ($pesan): ?>
                      <?php foreach ($pesan as $tampil): ?>
                        <tr class="">
                          <td><?=anchor( 'pesan/removepesan/' . $tampil->id, 
                            '<i class="fa fa-times-rectangle fa-lg text-red" title="Hapus"></i>',[
                             'onclick'=>'return confirm(\'Hapus pesan?\')'
                             ])?>&nbsp |
                          &nbsp<?=anchor( 'pesan/detail/' . $tampil->id, 
                          '<i class="fa fa-envelope-open-o fa-lg text-black" title="Lihat"></i>')?></td>
                          <td><?= mediumdate_indo($tampil->tanggal) ?></td>
                          <td><?= $tampil->perihal ?></td>
                          <td><?= limit_words($tampil->pesan, 7)." ..." ?></td>   
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
    <?php if ($this->session->flashdata('error')): ?>
      <script>alert("Maaf, telah terjadi kesalahan. Silahkan coba kembali")</script>
    <?php endif ?>
    <div class="modal fade" id="modal-konfirm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button class="btn btn-flat w3-pale-red w3-hover-red btn-xs w3-display-topright" data-dismiss="modal" aria-label="Close"><i class="fa fa-close fa-xs"></i></button>
          </div>
          <div class="modal-body">
            <?= form_open_multipart('pesan/addPesan')?>
            <input class="hide" type="text" readonly name="nama" value="<?= $this->session->userdata('nama'); ?>">
            <input class="hide" type="text" readonly name="email" value="<?= $this->session->userdata('username'); ?>">
            <div class="form-group has-feedback">
              <div class="row">
                <div class="col-lg-3" style="font-family: Lucida Console">dari</div>
                <div class="col-lg-9">Saya</div>
              </div>
              <hr class="hr2">
              <div class="row">
                <div class="col-lg-3" style="font-family: Lucida Console">perihal</div>
                <div class="col-lg-9">
                  <select class="jangan" style="width: 80%" required name="perihal">
                  <option value="" disabled selected>pilih --</option>
                  <option value="Ujian"> Ujian</option>
                  <option value="Pembayaran"> Pembayaran</option>
                  <option value="Lainnya"> Lainnya</option>
                  </select>
                </div>
              </div>
              <hr class="hr2">
              <div class="row no-padding">
                <div class="col-lg-12">
                  <textarea class="w3-input" style="height: 100px;" type="text" placeholder="" required name="pesan"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-block btn-success">Kirim</button>
          </div>
          <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
