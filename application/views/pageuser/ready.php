<!DOCTYPE html>
<html>
<head>
<style>
  body{
    background-color: #f0f0f0 !important;
  }
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Portal Penilaian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include'include/style.html'; ?>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Portal Penilaian</b></a>
  </div>
  <!-- /.login-logo -->
    <div class="row">
      <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar'));?>" alt="User Avatar" style="background-color: white">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?= $this->session->userdata('namapes'); ?></h3>
              <h5 class="widget-user-desc"><?php $ujian=$this->session->userdata('ujian'); ?>&nbsp
              </h5>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Jenis Tes <span class="pull-right">
                  <?php if ($ujian=="tumbuh-balita.html"): ?>
                    Tumbuh Balita
                  <?php elseif ($ujian=="jurusan-kuliah.html"): ?>
                    Jurusan Kuliah
                  <?php endif ?>
                </span></a></li>
                <li><a href="#">Id Peserta <span class="pull-right">
                  <?= $this->session->userdata('idpes'); ?>
                </span></a></li>
                <li><a href="#">Status <span class="pull-right">
                  <?= $this->session->userdata('status'); ?>
                </span></a></li>
              </ul>
            </div>
            <div class="box-footer">
              <?php if ($this->session->userdata('status')=="Aktif" && $this->db->count_all('soalbayi')==10): ?>
              <a href="<?= site_url('ujian/mulai/'.$this->session->userdata('ujian'))?>" title="tes" class="btn btn-warning btn-flat pull-right">Mulai</a>
              <?php elseif ($this->session->userdata('status')=="Aktif" && $this->db->count_all('soalbayi')<10): ?>
              <i class="pull-right" style="font-size: smaller;">Data tes bermasalah.</i>
              <?php endif ?>
              <a href="<?= site_url('auth/selesai') ?>" class="btn btn-default btn-flat">Kembali</a>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
    </div>

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url();?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
