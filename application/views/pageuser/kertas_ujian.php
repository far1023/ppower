
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsikoPower | Portal Penilaian</title>
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
<style>
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="#" class="navbar-brand"><b>Psiko</b>Power</a>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url();?>assets/images/img_avatar3.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><i class="fa fa-caret-down"></i></span> 
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-body">
                    <div class="row">
                      <div class="col-md-3">
                        <img src="<?= base_url();?>assets/images/img_avatar3.png" class="img-circle" alt="User Image" style="width: 60px;">
                      </div>
                      <div class="col-md-8">
                        <?php $nama=$this->session->userdata('nama'); echo $nama;?><br>
                        <small>
                          <?php $level=$this->session->userdata('level');
                          if($level==1){echo "Administrator";}
                          else{echo "Pengguna";}?>
                        </small>                
                      </div>
                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <a href="<?= site_url('auth/selesai') ?>" class="text-black">Keluar</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-2">
              <!-- /. box -->
            </div>
            <!-- /.col -->
            <div class="col-md-7">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-fw fa-child"></i>Tumbuh Balita
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="font-size: medium;">
                  <?php $i=1; ?>
                  <ol>
                    <?php foreach ($isi as $value): ?>
                      <div class="row" style="margin-left: 10px; margin-bottom: 10px; margin-right: 10px">
                        <li><?= $value->soal?>
                        <div class="radio icheck">
                          <div class="col-lg-6" style="margin-bottom: 10px">
                            <label><input class="" type="radio" name="<?= $value->id ?>" value=1 required>
                            <?= $value->opsa?></label>
                          </div>
                          <div class="col-lg-6" style="margin-bottom: 10px">
                            <label><input class="" type="radio" name="<?= $value->id ?>" value=2 required>
                            <?= $value->opsb?></label>
                          </div>
                          <div class="col-lg-6" style="margin-bottom: 10px">
                            <label><input class="" type="radio" name="<?= $value->id ?>" value=3 required>
                            <?= $value->opsc?></label>
                          </div>
                          <div class="col-lg-6" style="margin-bottom: 10px">
                            <label><input class="" type="radio" name="<?= $value->id ?>" value=4 required>
                            <?= $value->opsd?></label>
                          </div>
                          <div class="col-lg-6" style="margin-bottom: 10px">
                            <label><input class="" type="radio" name="<?= $value->id ?>" value=5 required>
                            <?= $value->opse?></label>
                          </div>
                        </div>
                      </li>
                    </div>
                  <?php endforeach ?>
                </ol>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default btn-flat pull-right">SELESAI</button>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        Ilmu Komputer | <img src="<?=base_url('assets/images/ur1.png');?>" class="" style="height: 30px">
      </div>
      1403119788 - 
      <strong>Fuad Agil &copy; 2019 </strong>.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red',
    });
  });
</script>
</body>
</html>
