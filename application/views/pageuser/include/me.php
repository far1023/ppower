
    <div class="w3-container">
      <img src="<?=base_url('assets/images/img_avatar3.png');?>" class="w3-circle w3-margin-right" style="width:60px">
    </div>
    <div class="w3-dropdown-click up">
      <button onclick="dropdown()" class="w3-button w3-white w3-padding">
        <?php $nama=$this->session->userdata('nama'); echo $nama?><i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i>
      </button>
      <div id="drop" class="w3-dropdown-content w3-bar-block">
        <hr class="hr2">
          <a href="<?=site_url('clients/editClients/'.$this->session->userdata('id'));?>" class="w3-text-dark-grey w3-small w3-button w3-hover-white w3-hover-text-grey w3-left-align" style="text-decoration: none"><i class="fa fa-gear"></i> &nbspPengaturan Akun</a>
        <a href="<?=site_url('auth/logout');?>" class="w3-small w3-button w3-hover-light-grey w3-text-red w3-left-align" style="text-decoration: none"><i class="fa fa-power-off"></i> &nbspKeluar</a>
        <hr class="hr2">
      </div>
    </div>