<?php 
  $nama = $ujian->nama;
  $biaya = $ujian->biaya;
?>
<!DOCTYPE html>
<html>
<style>
  body{
    background-color: #f0f0f0 !important;
  }
</style>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Daftar Tes</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/AdminLTE/plugins/iCheck/minimal/red.css">
  <!-- jQuery 3 -->
  <script src="<?= base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url();?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>

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
    <p class="login-box-msg"><a href="<?= site_url(); ?>" style="color: black"><b>Psiko</b>Power</a><br><small>Formulir Pendaftaran Peserta Tes</small></p>

    <?= form_open_multipart('ujian/daftar/'.$ujian->slug)?>
      <div class="form-group has-feedback hide">
        <input type="text" class="form-control" readonly required name="kode" value="<?= $idpay; ?>">
      </div>
      <div class="form-group has-feedback">
        <label >Nama Ujian</label>
        <input type="text" class="form-control" required readonly name="ujian" value="<?= $ujian->nama; ?>">
      </div>
      <div class="form-group has-feedback hide">
        <label >Username</label>
        <input type="text" class="form-control" required readonly name="username" value="<?= $this->session->userdata('username'); ?>">
      </div>
      <div class="form-group has-feedback">
        <label >Nama Lengkap</label>
        <input type="text" class="form-control" required readonly name="nama" value="<?= $this->session->userdata('nama'); ?>">
      </div>
      <div class="form-group has-feedback">
        <label >Pembayaran via </label>&nbsp <small class="text-red"><?php if (form_error('bank')){echo '*Pilih Bank';} ?></small>
          <div class="row">
        <?php foreach ($bank as $b) :?>
        <div class="radio icheck">
          <div class="col-xs-6" style="margin-bottom: 10px">
            <?php if (set_value('bank')!="Lainnya"): ?>
              <label>
              <input class="" type="radio" name="bank" value="<?= $b->nama; ?>" <?php if(set_value('bank')==$b->nama){echo"checked";} ?>>
              <img src="<?php echo base_url().'assets/images/bank/'.$b->gambar;?>" style="width:35%;">
              </label>
            <?php else: ?>
              <label>
              <input class="" type="radio" name="bank" value="<?= $b->nama; ?>">
              <img src="<?php echo base_url().'assets/images/bank/'.$b->gambar;?>" style="width:35%;">
              </label>
            <?php endif ?>
          </div>
        </div>
        <?php endforeach; ?>
        <div class="radio icheck">
          <div class="col-xs-6" style="margin-top: 8px">
            <?php if (set_value('bank')=="Lainnya"): ?>
              <label>
              <input class="" type="radio" name="bank" value="Lainnya" checked> Lainnya
              </label>
            <?php else: ?>
              <label>
              <input class="" type="radio" name="bank" value="Lainnya"> Lainnya
              </label>
            <?php endif ?>
          </div>
        </div>
          </div>
      </div>
      <div class="form-group has-feedback">
        <label >Atas Nama</label>&nbsp <small class="text-red"><?php if (form_error('atnam')){echo '*Wajib diisi';} ?></small>
        <input type="text" class="form-control" name="atnam" value="<?= set_value('atnam') ?>">
      </div>
      <div class="form-group has-feedback">
        <label>Total yang harus dibayarkan</label>
        <div class="input-group">
          <div class="input-group-addon">Rp</div>
          <input type="number" class="form-control" readonly required name="total" value="<?= number_format($biaya,0,',','.'); ?>">
        </div>
      </div>
    </div>
      <div class="box-footer">
        <div class="col-xs-4">
          <a href="<?= site_url(); ?>" class="btn btn-default btn-flat">Batal</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-success btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
      <?= form_close() ?>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red',
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
