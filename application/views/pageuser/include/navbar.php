<nav class="w3-sidebar w3-collapse w3-white lebar" style="" id="mySidebar"><br>
    <div class="w3-bar-block isi">
      <div class="w3-container">
        <img src="<?=base_url('assets/images/img_avatar3.png');?>" class="w3-circle" style="width:60px">
      </div>
      <div class="w3-dropdown-click up">
        <button onclick="dropdown()" class="w3-button w3-white w3-padding">
          <?php $nama=$this->session->userdata('nama'); echo $nama?><i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i>
        </button>
        <div id="drop" class="w3-dropdown-content w3-bar-block">
          <hr class="hr2">
          <!--<a href="<?=site_url('clients/editClients/'.$this->session->userdata('id'));?>" class="w3-text-dark-grey w3-small w3-button w3-hover-white w3-hover-text-grey w3-left-align" style="text-decoration: none"><i class="fa fa-gear"></i> &nbspPengaturan Akun</a>-->
          <a href="<?=site_url('auth/logout');?>" class="w3-text-dark-grey w3-small w3-button w3-hover-white w3-hover-text-red w3-left-align" style="text-decoration: none"><i class="fa fa-power-off"></i> &nbspKeluar</a>
          <hr class="hr2">
        </div>
      </div>
      <hr class="hr1">
      <a href="#" class="w3-bar-item w3-button w3-padding w3-light-grey"><i class="fa fa-edit fa-fw w3-text-blue w3-margin-right w3-large"></i> Overview</a>
      <a href="<?= site_url('clients') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-group fa-fw w3-text-grey w3-margin-right w3-large"></i> Clients</a>
      <a href="<?= site_url('pembayaran') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-credit-card fa-fw w3-text-grey w3-margin-right w3-large"></i> Pembayaran</a>
      <a href="<?= site_url('pesan/showPesan') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Pesan</a>
      <a href="<?= site_url('artikel') ?>" class="w3-hide w3-bar-item w3-button w3-padding"><i class="fa fa-newspaper-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Artikel</a>
      <hr class="hr2">
      <div class="w3-padding"><h6 class="sub">UJIAN</h6></div>
      <button onclick="akordion('jurusan')" class="w3-bar-item w3-button w3-padding"><i class="fa fa-graduation-cap fa-fw w3-text-grey w3-margin-right w3-large"></i> Jurusan Kuliah &nbsp <i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i></button>
      <div id="jurusan" class="w3-hide">
        <a href="<?= site_url('ujian/jurusan') ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Profil Jurusan</a>
        <a href="<?= site_url('ujian/peserta/jurusan-kuliah.html') ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Peserta Ujian</a>
        <a href="<?= site_url('ujian/hasil') ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Hasil Ujian</a>
      </div>
      <button onclick="akordion('psikotes')" class="w3-hide w3-bar-item w3-button w3-padding"><i class="fa fa-heart-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Psiko Tes &nbsp <i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i></button>
      <div id="psikotes" class="w3-hide">
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Teks</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Teks</a>
      </div>
      <hr class="hr2">
      <div class="w3-padding sub w3-small">
        <?php include 'include/footside.html'; ?>
      </div>
      <div class="w3-padding"></div>
      <hr class="hr2">
    </div>
  </nav>