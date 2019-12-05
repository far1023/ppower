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
  <div class="login-box-body">
    <?php $eror = $this->session->flashdata('error');?>
      <?php if($eror){?>
      <div class="alert alert-danger alert-dismissible btn-xs">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $this->session->flashdata('error')?>
      </div>
    <?php } ?>
    
    <div class="row">
      <div class="col-md-5 border-right">
        <p class="">
          Selamat Datang,<br>
          <?= $this->session->userdata('nama'); ?><br>
          <?php echo $this->uri->segment(3); ?>
        </p>
      </div>
      <div class="col-md-7 border-left">
        <?= form_open_multipart('auth/start')?>
        <div class="form-group has-feedback hide">
          <input type="text" class="form-control" name="username" required value="<?= $this->session->userdata('username'); ?>">
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="ukey" autocomplete="off" placeholder="Ukey Peserta" required>
          <span class="fa fa-key form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <? form_close(); ?>
        </div>
    </div>

    <!-- /.social-auth-links -->
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
