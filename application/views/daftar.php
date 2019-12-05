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
  <title>PsikoPower | Daftar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include'backend/include/style.html'; ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-box-body">
    <p class="register-box-msg">Daftar akun baru</p>

    <?php $eror = $this->session->flashdata('error');?>
      <?php if($eror){?>
      <div class="alert alert-danger alert-dismissible btn-xs">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?= $this->session->flashdata('error')?>
      </div>
    <?php } ?>
    <?= form_open_multipart('clients/addClients')?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username" value="<?= set_value('username') ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <small class="text-red"><?= form_error('username'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password') ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <small class="text-red"><?= form_error('password'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="repassword" placeholder="Konfirmasi Password" value="<?= set_value('repassword') ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <small class="text-red"><?= form_error('repassword'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama') ?>">
        <span class="glyphicon glyphicon-font form-control-feedback"></span>
        <small class="text-red"><?= form_error('nama'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" name="gender">
        <option value="" disabled selected>Jenis Kelamin</option>
          <?php if (set_value('gender')==2): ?>
          <option value="1">Laki-laki</option>
          <option value="2" selected>Perempuan</option>
          <?php elseif (set_value('gender')==1): ?>
          <option value="1" selected>Laki-laki</option>
          <option value="2">Perempuan</option>
          <?php else: ?>
        <option value="1">Laki-laki</option>
        <option value="2">Perempuan</option>
          <?php endif ?>
        </select>
        <small class="text-red"><?= form_error('gender'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" autocomplete="off" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
        <small class="text-red"><?= form_error('alamat'); ?></small>
      </div>
      <div class="form-group has-feedback">
        <input type="tel" class="form-control" autocomplete="off" name="telepon" placeholder="Nomor Telepon" value="<?= set_value('telepon') ?>" onkeypress="return isNumber(event)">
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
        <small class="text-red"><?= form_error('telepon'); ?></small>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required></input> I agree to the <a href="#" data-toggle="modal" data-target="#modal-default">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    <?= form_close() ?>

    <a href="<?= site_url('auth')?>" class="text-center">Sudah punya akun?</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Ketentuan & Kebijakan</h4>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('ujian/addUjian')?>
          <p>
            Isi di sini
          </p>
        </div>
        <?= form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  
    function isNumber(event) {
    var keycode=event.keyCode;
    if (keycode>47 && keycode<58){
      return true;
    }
      return false;
    }
  });

  
</script>
</body>
</html>
