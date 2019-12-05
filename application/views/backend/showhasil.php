<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Hasil Tes</title>
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
<style>
  #page {
    padding-bottom: 100px;
  }
  #konten {
    padding-left: 35px;
    padding-right: 35px;
  }
  table, tr, td, th{
    border: 1px solid #ddd;
    border-collapse: collapse;
    padding: 5px;
  }
</style>
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
                  <li><a href="<?= site_url('ujian/jurusan')?>"><i class="fa fa-drivers-license-o fa-fw"></i> Profil Jurusan
                    <li><a href="<?= site_url('ujian/peserta/jurusan-kuliah.html') ?>"><i class="fa fa-group fa-fw"></i> Peserta Tes</a></li>
                    <li class="active"><a href="<?= site_url('ujian/hasil') ?>"><i class="fa fa-file-text-o fa-fw"></i> Hasil Tes</a></li>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8 w3-responsive">
              <div class="box box-solid w3-responsive" id="page">
                <div class="box-header with-border"><a href="javascript:history.go(-1)" class="text-black form-head"><i class="fa fa-xs fa-angle-left fa-fw"> &nbsp</i><i class="fa fa-fw fa-graduation-cap"></i>Pemilihan Jurusan Kuliah</a>
                </div>
                <div class="box-body" id="konten">
                  <div class="table-responsive no-border">
                    <a href="<?= site_url('ujian/myUjian/'.$id.'/print')?>" class="pull-right" target=_blank title="Cetak"><i class="fa fa-print fa-2x fa-border w3-text-grey"></i></a>
                    <span style="font-family: Lucida Console">
                      No. Peserta &nbsp : <?= $idpeserta ?><br>
                      Nama Peserta &nbsp: <?= $namapes ?><br>
                      Jenis Kelamin : <?php if($gender==1) {echo "Laki-laki";} elseif($gender==2){echo 'Perempuan';} elseif(!$gender) {echo ' ';}?><br>
                      Tanggal Tes &nbsp : <?= longdate_indo($tanggal) ?>
                    </span>
                    <table id="tabel" class="w3-text-dark-grey w3-centered w3-white" style="margin-top: 20px">
                      <tr class="w3-hover-white w3-hover-text-dark-grey">
                        <th class="w3-small" rowspan="2"> NO </th>
                        <th class="" rowspan="2" width=28%>ASPEK / <br>FUNGSI PSIKIS</th>
                        <th class="" rowspan="2" width=25%>DESKRIPSI<br>SKOR RENDAH</th>
                        <th class="w3-small" colspan="5">SKALA PENILAIAN</th>
                        <th class="" rowspan="2" width=25%>DESKRIPSI<br>SKOR TINGGI</th>
                      </tr>
                      <tr id="skala" class="w3-hover-white w3-small w3-hover-text-dark-grey">
                        <td><i class="fa fa-fw">1</i></td>
                        <td><i class="fa fa-fw">2</i></td>
                        <td class="w3-light-grey"><i class="fa fa-fw">3</i></td>
                        <td><i class="fa fa-fw">4</i></td>
                        <td><i class="fa fa-fw">5</i></td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">1</td>
                        <td class="w3-left-align w3-small">
                          KECERDASAN UMUM
                        </td>
                        <td class="w3-left-align w3-tiny">Hanya mampu memecahkan persoalan yang tidak rumit, sederhana dan pernah terjadi</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$se && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$se) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu dalam berpikir menyeluruh untuk memahami dan mencari penyelesaian masalah dengan tepat</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">2</td>
                        <td class="w3-left-align w3-small">
                          KEMAMPUAN PENGAMBILAN KEPUTUSAN
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu memilih satu pilihan terbaik dari alternatif pilihan yang ada</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$wa && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$wa) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu memilih satu pilihan terbaik dari alternatif pilihan yang ada</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">3</td>
                        <td class="w3-left-align w3-small">
                          DAYA ANALISA MASALAH
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu berfikir secara menyeluruh terhadap suatu masalah dan menguraikannya menjadi hal yang lebih detail/spesifik</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$an && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$an) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu melihat suatu masalah secara menyeluruh, kemudian menguraikannya secara detail untuk mendapat kesimpulan</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">4</td>
                        <td class="w3-left-align w3-small">
                          FLEKSIBILITAS BERFIKIR
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu berpindah orientasi dari satu cara ke cara yang lain, dan kaku dalam berfikir</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$ge && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$ge) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Lincah dan luwes dalam berfikir untuk mencari solusi dari satu cara ke cara lain</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">5</td>
                        <td class="w3-left-align w3-small">
                          KEMAMPUAN ABSTRAKSI VERBAL
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu berpindah orientasi dari satu cara ke cara yang lain, dan kaku dalam berfikir</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$ra && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$ra) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Lincah dan luwes dalam berfikir untuk mencari solusi dari satu cara ke cara lain</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">6</td>
                        <td class="w3-left-align w3-small">
                          KEMAMPUAN NUMERIKAL / MATEMATIS
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu berfikir dengan angka dan kurang menguasai hubungan numerik</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$zr && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$zr) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu berfikir matematis, logis, dan praktis dengan berhitung</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">7</td>
                        <td class="w3-left-align w3-small">
                          DAYA KREATIFITAS
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu menciptakan ide-ide baru dan lebih mengikuti cara-cara yang sudah ada</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$fa && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$fa) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu mengembangkan ide, membuat solusi dan cara-cara baru/berbeda dalam mengatasi masalah</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">8</td>
                        <td class="w3-left-align w3-small">
                          KEMAMPUAN DAYA BAYANG RUANG
                        </td>
                        <td class="w3-left-align w3-tiny">Kurang mampu berfikir secara sistematis dan kurang praktis untuk diterapkan</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$wu && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$wu) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu untuk berfikir runtut, terarah dengan penalaran yang masuk akal</td>
                      </tr>
                      <!------------------------- --------------------------------------------->
                      <tr class="w3-hover-white">
                        <td class="w3-small">9</td>
                        <td class="w3-left-align w3-small">
                          DAYA INGAT
                        </td>
                        <td class="w3-left-align w3-tiny">Mudah lupa terhadap hal-hal yang pernah dipelajari sebelumnya</td>
                        <?php
                        for ($i = 1; $i <=5; $i++) {
                          if ($i==$me && $i==3) {
                            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==$me) {
                            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
                          }
                          elseif ($i==3){
                            echo '<td class="w3-light-grey"></td>';
                          }
                          else {
                            echo '<td class=""></td>';
                          }
                        }
                        ?>
                        <td class="w3-left-align w3-tiny">Mampu untuk memberikan respon sesuai dengan hal yang telah dipelajari sebelumnya</td>
                      </tr>
                    </table>
                    <i class="w3-small">Ket :
                      <table style="width: 100%">
                        <tr class="w3-small">
                          <td style="width: 20%">1 = Kurang Sekali</td>
                          <td style="width: 20%">2 = Kurang</td>
                          <td style="width: 20%">3 = Cukup</td>
                          <td style="width: 20%">4 = Baik</td>
                          <td style="width: 20%">5 = Baik Sekali</td>
                        </tr>
                      </table></i><br>
                      <table class="w3-small" style="width: 100%">
                        <tr class="w3-text-dark-grey"><th>Saran</th></tr>
                        <tr class="w3-text-dark-grey">
                          <?php
                          $add    = array_slice($saran, -1);
                          $awal   = join(' ', array_slice($saran, 0, -1));
                          $susun  = array_filter(array_merge(array($awal), $add)); 
                          ?>
                          <td><?php echo ucfirst(join(' Serta ', $susun)).""; ?></td>
                        </tr>
                      </table><br>
                      <table class="w3-small" style="width: 100%">
                        <tr class="w3-text-dark-grey"><th>Masukan tambahan</th></tr>
                        <tr class="w3-text-dark-grey">
                          <td><?= $sarank->deskripsi ?></td>
                        </tr>
                      </table><br>
                      <table>
                        <tr>
                          <td>No.</td>
                          <td>Jurusan yang disarankan</td>
                        </tr>
                        <?php 
                        $i=1;
                        foreach ($dt as $value) {
                          if ($i>3) {
                            break;
                          }
                          echo '<tr>';
                          echo '<td class="w3-center">'.$i.'</td>';
                          echo '<td>'.$value['jurusan'].'</td>';
                          echo '</tr>';
                          $i++;
                        };
                        ?>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
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
