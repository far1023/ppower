			<div class="content px-4">
				<div class="container-fluid">
					<div class="row pl-1 pr-1">
						<div class="col-lg-9">
							<div class="card elevation-1 border">
								<div class="card-body p-0">
									<div class="title p-4">
										<h5>Profil</h5>
										<p class="text-muted">Data profil tidak akan ditampilkan ke halaman publik.</p>
									</div>
									<div class="table-responsive">
										<table class="table table-hover no-border">
											<tr class="py-2 cursor-pointer" id="changeAvatar">
												<td class="d-sm-block d-none"></td>
												<td class="border-bottom text-muted"><small>GAMBAR PROFIL</small></td>
												<td class="border-bottom text-md"><span class="text-muted">Dengan gambar profil dapat dengan mudah mendeteksi akun</span></td>
												<td class="border-bottom">
													<img src="<?= base_url('assets/images/avatar/'.$this->session->userdata('avatar')) ?>" alt="User Image" class="img-circle float-right profpic" width="70" title="Ubah gambar profil">
												</td>
											</tr>
											<tr class="py-2 cursor-pointer" id="changeName">
												<td class="d-sm-block d-none"></td>
												<td class="border-bottom text-muted"><small>NAMA</small></td>
												<td class="border-bottom text-md profilNama"><?= $profil->nama ?></td>
												<td class="border-bottom text-right text-muted pr-5"><i class="fa fa-fw fa-lg fa-angle-right"></i></td>
											</tr>
											<tr class="py-2 cursor-pointer" id="changePass">
												<td class="d-sm-block d-none"></td>
												<td class="border-bottom text-muted"><small>PASSWORD</small></td>
												<td class="border-bottom text-md">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</td>
												<td class="border-bottom text-right text-muted pr-5"><i class="fa fa-fw fa-lg fa-angle-right"></i></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" tabindex="-1" role="dialog" id="modal-avatar">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<form id="form-avatar" name="form-avatar" class="" novalidate="">
							<div class="modal-body pt-3">
								<p><small>UBAH GAMBAR PROFIL</small></p>
								<div class="pt-4 pb-5">
									<div class="form-group files">
										<input type="file" id="avatar" name="avatar" class="form-control cursor-pointer">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-non-cta" data-dismiss="modal" aria-label="Close">BATAL</button>
								<button type="submit" class="btn btn-primary" id="cta-submit-avatar">SIMPAN</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" tabindex="-1" role="dialog" id="modal-nama">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<form id="form-nama" name="form-nama" class="" novalidate="">
							<div class="modal-body pt-3">
								<p><small>UBAH NAMA</small></p>
								<div class="pt-4 pb-5">
									<div class="floating-form">
										<div class="floating-label">
											<input type="text" class="floating-input" name="nama" id="nama" placeholder=" " value="<?= $this->session->userdata('nama') ?>" title="Masukkan nama lengkap" autocomplete="off">
											<span class="highlight"></span>
											<label class="floats">Nama</label>
										</div>
										<small class="text-danger" id="nama-feedback"></small>
									</div>
								</div>
								<h6 class="text-muted"><i class="fa fa-fw fa-info"></i>Tips</h6>
								<span class="text-xs">Nama tidak akan ditampilkan pada halaman publik.</span>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-non-cta" data-dismiss="modal" aria-label="Close">BATAL</button>
								<button type="submit" class="btn btn-primary" id="cta-submit-nama">SIMPAN</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="modal fade" tabindex="-1" role="dialog" id="modal-password">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="tabcontent" id="oldpass" style="display: block">
							<form id="form-password" name="form-password" class="" novalidate="">
								<div class="modal-body pt-3">
									<p><small>UBAH PASSWORD</small></p>
									<p>Konfirmasikan bahwa akun ini benar milik anda</p>
									<div class="pt-4 pb-5">
										<div class="floating-form">
											<div class="floating-label">
												<input type="password" class="floating-input" name="password" id="password" placeholder=" " value="" title="Masukkan password lama" autocomplete="off">
												<span class="highlight"></span>
												<label class="floats">Password akun</label>
											</div>
											<small class="text-danger" id="password-feedback"></small>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-non-cta" data-dismiss="modal" aria-label="Close">BATAL</button>
									<button type="submit" class="btn btn-primary" id="cta-lanjut">LANJUT</button>
								</div>
							</form>
						</div>
						<div class="tabcontent" id="newpass" style="display: none">
							<form id="form-npassword" name="form-npassword" class="" novalidate="">
								<div class="modal-body pt-3">
									<p><small>UBAH PASSWORD</small></p>
									<p>Identitas diterima, masukkan password baru yang anda inginkan</p>
									<div class="pt-4 pb-2">
										<div class="floating-form">
											<div class="floating-label">
												<input type="password" class="floating-input" name="npass" id="npass" placeholder=" " value="" title="Masukkan password baru" autocomplete="off">
												<span class="highlight"></span>
												<label class="floats">Password baru</label>
											</div>
											<small class="text-danger" id="npass-feedback"></small>
										</div>
									</div>
									<div class="pt-4 pb-5">
										<div class="floating-form">
											<div class="floating-label">
												<input type="password" class="floating-input" name="repass" id="repass" placeholder=" " value="" title="Ulangi password baru" autocomplete="off">
												<span class="highlight"></span>
												<label class="floats">Ulangi password baru</label>
											</div>
											<small class="text-danger" id="repass-feedback"></small>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-non-cta" data-dismiss="modal" aria-label="Close">BATAL</button>
									<button type="submit" class="btn btn-primary" id="cta-submit-pass">SIMPAN</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>