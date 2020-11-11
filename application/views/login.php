<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') ?>" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/assets/modules/fontawesome/css/all.min.css') ?>" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/assets/modules/bootstrap-social/bootstrap-social.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css') ?>">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/assets/css/style.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/stisla/dist/assets/css/components.css') ?>">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row">
					<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
						<div class="login-brand">
							<!-- <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
							AB
						</div>

						<div class="card card-primary">
							<div class="card-header"><h4>Login</h4></div>

							<div class="card-body">
								<div id="alert"></div>
								<form id="form-login" name="form-login" class="needs-validation" novalidate="">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
										<div class="invalid-feedback" id="username-feedback"></div>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
											<div class="float-right">
												<a href="auth-forgot-password.html" class="text-small">
													Forgot Password?
												</a>
											</div>
										</div>
										<input id="password" type="password" class="form-control" name="password" tabindex="2" required>
										<div class="invalid-feedback" id="password-feedback"></div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" id="cta-login" tabindex="4">
											Login
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="mt-5 text-muted text-center">
							Don't have an account? <a href="javascript:void(0)" onclick="addEvent()">Create One</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url('assets/stisla/dist/assets/modules/jquery.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/modules/popper.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/modules/moment.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/js/stisla.js') ?>" crossorigin="anonymous"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?= base_url('assets/stisla/dist/assets/js/scripts.js') ?>" crossorigin="anonymous"></script>
	<script src="<?= base_url('assets/stisla/dist/assets/js/custom.js') ?>" crossorigin="anonymous"></script>
	<script>
		function addEvent() {
			var resource = {
				"summary": "Appointment",
				"location": "Somewhere",
				"start": {
					"dateTime": "2011-12-16T10:00:00.000-07:00"
				},
				"end": {
					"dateTime": "2011-12-16T10:25:00.000-07:00"
				}
			};
			var request = gapi.client.calendar.events.insert({
				'calendarId': 'primary',
				'resource': resource
			});
			request.execute(function(resp) {
				console.log(resp);
			});
		}

		$('#form-login').on('submit', function () {
			$('#username-feedback').html('');
			$('#password-feedback').html('');
			$('#alert').html('');
			var formData = new FormData($('#form-login')[0]);
			formData.append("loginAttempt", true);
			$.ajax({
				contentType: false,
				processData: false,
				data: formData,
				url : '<?= site_url() ?>' + 'auth/login',
				type: "POST",
				dataType: 'json',
				beforeSend:function(){
					$('#cta-login').addClass('disabled btn-progress');
				},
				success: function(kis) {
					if (kis.error) {
						if(kis.user_error != ''){$('#username-feedback').html(kis.user_error);}
						else{$('#username-feedback').html('');}
						if(kis.pass_error != ''){$('#password-feedback').html(kis.pass_error);}
						else{$('#password-feedback').html('');}

						if (kis.msg != '') {
							let gagal = '<div class="alert alert-danger alert-dismissible show fade text-small"><div class="alert-body"><button class="close text-small" data-dismiss="alert"><i class="fa fa-fw fa fa-times"></i></button>'+kis.msg+'</div></div>';
							$('#alert').html(gagal);
						} else {
							$('#alert').html('');
						}
						$('#cta-login').removeClass('disabled btn-progress');
					} else {
						$('#cta-login').removeClass('btn-progress').html('mengalihkan...');
						let ok = '<div class="alert alert-success show fade text-small"><div class="alert-body"><button class="close text-small" data-dismiss="alert"><i class="fa fa-fw fa fa-times"></i></button>'+kis.msg+'</div></div>';
						$('#alert').html(ok);
						location.href = kis.href;
					}
				},
				error: function () {
					console.log('Error:');
					$('#cta-login').removeClass('disabled btn-progress');
				}
			});
			return false;
		});
	</script>

	<!-- Page Specific JS File -->
</body>
</html>
