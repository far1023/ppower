<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/floating-labels.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<div class="card mb-5">
			<div class="card-body login-card-body p-0">
				<p class="login-box-msg p-4">Sign in to start your session</p>
				<form id="form-login" class="php-email-form">
					<div class="mx-4" id="alert"></div>
					<div class="row contact_row p-4">
						<div class="col-lg-12 pb-4">
							<div class="floating-form">
								<div class="floating-label">
									<input type="text" class="floating-input" name="username" id="username" placeholder=" " value="" title="Masukkan Username" autocomplete="off">
									<span class="highlight"></span>
									<label class="floats">Username</label>
								</div>
							</div>
							<small id="user_error"></small>
						</div>
						<div class="col-lg-12 pb-4">
							<div class="floating-form">
								<div class="floating-label">
									<input type="password" class="floating-input" name="password" id="password" placeholder=" " value="" title="Masukkan Password">
									<span class="highlight"></span>
									<label class="floats">Password</label>
								</div>
							</div>
							<small id="pass_error"></small>
						</div>
					</div>
					<button type="submit" class="btn btn-block btn-flat btn-primary" id="cta_login">Masuk</button>
				</form>
			</div>
		</div>
		<footer class="text-center text-sm">
		</footer>
	</div>

	<script src="<?= base_url('assets/template/') ?>plugins/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/template/') ?>dist/js/adminlte.min.js"></script>
	<script>
		$(document).ready(function () {
			$('form').keyup(function(){
				$('#alert').html('');
				$('#user_error').html('');
				$('#pass_error').html('');
			});
		});

		$('#form-login').on('submit', function(e) {
			e.preventDefault();
			$('#alert').html('');
			var formData = new FormData($('#form-login')[0]);
			formData.append("loginAttempt", true);
			formData.append("<?=$this->security->get_csrf_token_name();?>", "<?= $this->security->get_csrf_hash(); ?>");
			$.ajax({
				contentType: false,
				processData: false,
				data: formData,
				url : '<?= site_url() ?>' + 'login',
				type: "POST",
				dataType: 'json',
				beforeSend:function(){
					$('#cta_login').prop("disabled", true).html('memeriksa');
				},
				success: function(kis) {
					if (kis.error) {
						if (kis.msg != '') {
							let gagal = '<div class="alert alert-danger show fade text-sm"><div class="alert-body">'+kis.msg+'</div></div>';
							$('#alert').html(gagal);
						} else {
							$('#alert').html('');
						}

						(kis.user_error != '') ? $('#user_error').html(kis.user_error): $('#user_error').html('');
						(kis.pass_error != '') ? $('#pass_error').html(kis.pass_error): $('#pass_error').html('');

						// $('#captcha-here').html(kis.captcha);
						$('#cta_login').prop("disabled", false).html('MASUK');
					} else {
						$('#cta_login').html('mengalihkan...');
						let ok = '<div class="alert alert-success show fade text-sm"><div class="alert-body">'+kis.msg+'</div></div>';
						$('#alert').html(ok);
						window.setTimeout(function () {
							location.href = kis.href;
						}, 1000);
					}
					// $('#captcha').val(kis.captcha_word);
				},
				error: function () {
					let gagal = '<div class="alert alert-danger show fade text-sm"><div class="alert-body">Terjadi kesalahan, <a href="<?= site_url('login') ?>">muat ulang halaman</a></div></div>';
					$('#alert').html(gagal);
					// $('#captcha').val('');
					$('#cta_login').prop("disabled", false).html('MASUK');
				}
			});
		});
	</script>
</body>
</html>
