<script src="<?= base_url('assets/template/plugins/iziToast/js/iziToast.min.js') ?>"></script>
<script src="<?= base_url('assets/js/tab.js') ?>"></script>

<script>
	var SITEURL = '<?= site_url(); ?>';

	$(document).ready(function () {
		$('#changeName').click(function() {
			$('#nama-feedback').html('');
			$('#modal-nama').modal('show');
		})

		$('#changeAvatar').click(function() {
			$('#nama-feedback').html('');
			$('#modal-avatar').modal('show');
		})

		$('#changePass').click(function() {
			$('#password-feedback').html('');
			$('#npass-feedback').html('');
			$('#repass-feedback').html('');
			$('#form-password').trigger('reset');
			$('#form-npassword').trigger('reset');
			openTab(event, 'oldpass');
			$('#modal-password').modal('show');
		})
	});

	$('#form-nama').on('submit', function(e) {
		e.preventDefault();
		$('#nama-feedback').html('');

		var formData = new FormData($('#form-nama')[0]);
		formData.append("id", "<?= $this->session->userdata('id'); ?>");
		formData.append("type", "nama");
		formData.append("<?=$this->security->get_csrf_token_name();?>", "<?= $this->security->get_csrf_hash(); ?>");
		$.ajax({
			contentType: false,
			processData: false,
			data: formData,
			url : SITEURL + 'profil/simpan',
			type: "POST",
			dataType: 'json',
			beforeSend:function(){
				$('#cta-submit-nama').addClass('disabled').html('<span class="spinner-border spinner-border-sm"></span>');
			},
			success: function(response) {
				if (response.error) {
					if(response.nama_error != ''){$('#nama-feedback').html(response.nama_error);}
					else{$('#nama-feedback').html('');}
				} else {
					iziToast.success({
						title: 'Done!',
						message: 'Nama berhasil diubah',
						position: 'topCenter' 
					});
					$('.profilNama').html(response.data.nama);
					$('#modal-nama').modal('hide');
					$('#nama').val(response.data.nama);
				}
				$('#cta-submit-nama').removeClass('disabled').html('SIMPAN');
			},
			error: function () {
				iziToast.error({
					title: 'Error',
					message: 'Terjadi kesalahan',
					position: 'topCenter' 
				});
				$('#cta-submit-nama').removeClass('disabled').html('SIMPAN');
			}
		});
	});

	$('#form-password').on('submit', function(e) {
		e.preventDefault();
		$('#password-feedback').html('');

		var formData = new FormData($('#form-password')[0]);
		formData.append("id", "<?= $this->session->userdata('id'); ?>");
		formData.append("<?=$this->security->get_csrf_token_name();?>", "<?= $this->security->get_csrf_hash(); ?>");
		$.ajax({
			contentType: false,
			processData: false,
			data: formData,
			url : SITEURL + 'profil/cekPass',
			type: "POST",
			dataType: 'json',
			beforeSend:function(){
				$('#cta-lanjut').addClass('disabled').html('<span class="spinner-border spinner-border-sm"></span>');
			},
			success: function(response) {
				if (response.error) {
					if(response.password_error != ''){$('#password-feedback').html(response.password_error);}
					else{$('#password-feedback').html('');}
				} else {
					openTab(event, 'newpass');
					$('#form-password').trigger('reset');
				}
				$('#cta-lanjut').removeClass('disabled').html('LANJUT');
			},
			error: function () {
				iziToast.error({
					title: 'Error',
					message: 'Terjadi kesalahan',
					position: 'topCenter' 
				});
				$('#cta-lanjut').removeClass('disabled').html('LANJUT');
			}
		});
	});

	$('#form-avatar').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($('#form-avatar')[0]);
		formData.append("id", "<?= $this->session->userdata('id'); ?>");
		formData.append("type", "avatar");
		formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", '<?php echo $this->security->get_csrf_hash(); ?>');
		$.ajax({
			type: "post",
			url: SITEURL + "profil/simpan",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			beforeSend: function() {
				$('#cta-submit-avatar').addClass('disabled').html('<span class="spinner-border spinner-border-sm"></span>');
			},
			success: function(response) {
				if (response.error) {
					iziToast.error({
						title: 'Error',
						message: response.msg,
						position: 'topCenter' 
					});
				} else {
					iziToast.success({
						title: 'Done!',
						message: 'Avatar profil berhasil diubah',
						position: 'topCenter' 
					});
					$('#form-avatar').trigger('reset');
					$('.profpic').attr('src', "<?= base_url('assets/images/avatar/')?>"+response.avatar);
					$('#modal-avatar').modal('hide');
				}
				$('#cta-submit-avatar').removeClass('disabled').html('SIMPAN');
			},
			error: function () {
				iziToast.error({
					title: 'Error',
					message: 'Terjadi kesalahan',
					position: 'topCenter' 
				});
				$('#cta-submit-avatar').attr('disabled', false).html('SIMPAN');
			}
		});
	});

	$('#form-npassword').on('submit', function(e) {
		e.preventDefault();
		$('#npass-feedback').html('');
		$('#repass-feedback').html('');

		var formData = new FormData($('#form-npassword')[0]);
		formData.append("id", "<?= $this->session->userdata('id'); ?>");
		formData.append("type", "password");
		formData.append("<?=$this->security->get_csrf_token_name();?>", "<?= $this->security->get_csrf_hash(); ?>");
		$.ajax({
			contentType: false,
			processData: false,
			data: formData,
			url : SITEURL + 'profil/simpan',
			type: "POST",
			dataType: 'json',
			beforeSend:function(){
				$('#cta-submit-pass').addClass('disabled').html('<span class="spinner-border spinner-border-sm"></span>');
			},
			success: function(response) {
				if (response.error) {
					if(response.npass_error != ''){$('#npass-feedback').html(response.npass_error);}
					else{$('#npass-feedback').html('');}
					if(response.repass_error != ''){$('#repass-feedback').html(response.repass_error);}
					else{$('#repass-feedback').html('');}
				} else {
					iziToast.success({
						title: 'Done!',
						message: 'Password berhasil diubah',
						position: 'topCenter' 
					});
					$('#form-npassword').trigger('reset');
					$('#modal-password').modal('hide');
				}
				$('#cta-submit-pass').removeClass('disabled').html('SIMPAN');
			},
			error: function () {
				iziToast.error({
					title: 'Error',
					message: 'Terjadi kesalahan',
					position: 'topCenter' 
				});
				$('#cta-submit-pass').removeClass('disabled').html('SIMPAN');
			}
		});
	});
</script>