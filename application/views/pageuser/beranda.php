<!DOCTYPE html>
<html>
<title>PP - Front Office</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'include/style.html'; ?>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<style>
#add {
  position: fixed;
  right: 0;
  bottom: 0;
  margin-right: 1%;
  margin-bottom: 1%;
}
</style>
<body>

  <!-- Top container -->
  <div class="w3-bar w3-top w3-black w3-xlarge" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>
    <span class="w3-bar-item w3-right">Logo</span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white lebar" style="" id="mySidebar"><br>
    <div class="w3-bar-block">
      <div class="w3-container">
        <img src="<?=base_url('assets/images/img_avatar3.png');?>" class="w3-circle w3-margin-right" style="width:60px">
      </div>
      <div class="w3-dropdown-click up">
        <button onclick="dropdown()" class="w3-button w3-white w3-padding">
          <?php $nama=$this->session->userdata('nama'); echo $nama?><i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i>
        </button>
        <div id="drop" class="w3-dropdown-content w3-bar-block">
          <hr class="hr2">
          <a href="<?=site_url('auth/logout');?>" class="w3-small w3-button w3-hover-light-grey w3-text-red w3-left-align" style="text-decoration: none"><i class="fa fa-power-off"></i> &nbspKeluar</a>
          <a href="<?=site_url('auth/logout');?>" class="w3-small w3-button w3-hover-light-grey w3-text-red w3-left-align" style="text-decoration: none"><i class="fa fa-power-off"></i> &nbspKeluar</a>
          <hr class="hr2">
        </div>
      </div>
      <hr class="hr1">
      <a href="#" class="w3-light-grey w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw w3-text-blue w3-margin-right w3-large"></i> Beranda</a>
      <a href="<?= site_url('ujian/pilih') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw w3-text-grey w3-margin-right w3-large"></i> Ujian</a>
      <hr class="hr2">
      <div class="w3-padding"><h6 class="sub">AKUN</h6></div>
      <a href="<?= site_url('pembayaran/show/'.$this->session->userdata('username')) ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-credit-card fa-fw w3-text-grey w3-margin-right w3-large"></i> Pembayaran</a>
      <a href="<?= site_url('ujian/peserta/'.$this->session->userdata('username')) ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-id-badge fa-fw w3-text-grey w3-margin-right w3-large"></i> Kepesertaan</a>
      <button onclick="akordion('jurusan')" class="testbtn w3-bar-item w3-button w3-padding"><i class="fa fa-graduation-cap fa-fw w3-text-grey w3-margin-right w3-large"></i> Hasil Ujian &nbsp <i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i></button>
      <div id="jurusan" class="w3-hide">
        <a href="<?= site_url('ujian/hasil/'.$this->session->userdata('username')) ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Jurusan Kuliah </a>
      </div>
      <hr class="hr2">
      <?php include'include/help.php'; ?>
      <div class="w3-padding sub w3-small">
        <?php include 'include/footside.html'; ?>
      </div>
      <div class="w3-padding"></div>
      <hr class="hr2">
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main w3-padding konten" style="">
    <!-- Header -->
    <div class="w3-container w3-threequarter"><br>
      <form action="<?= site_url('dashboard/ku'); ?>" method="GET">
        <input style="" class="w3-container w3-margin-bottom" type="text" name="cari" placeholder="Cari . ."> &nbsp<i class="fa fa-search w3-text-dark-grey"></i>
      </form>
      <?php if (!$feed): ?>
      <div class="w3-third">
        <div class="w3-panel w3-margin-top w3-pale-red w3-leftbar w3-border-red w3-animate-left"><p class="w3-padding"><?= $this->session->flashdata('error')?> &nbsp&nbsp<a href="<?= site_url('clients/showClients'); ?>"><i class="fa fa-refresh fa-lg"></i></a></p></div>
      </div>
      <?php elseif($feed): ?>
        <?php function limit_words($string, $word_limit){
          $words = explode(" ",$string);
          return implode(" ",array_splice($words,0,$word_limit));
        }
        foreach ($feed as $tampil): ?><br>
        <div class="w3-responsive w3-padding w3-white w3-rightbar w3-border-light-grey">
          <h5><a class="w3-hover-text-blue" href="<?= site_url('artikel/detail/'. $tampil->slug) ?>"><?= $tampil->judul ?></a></h5>
          <h6 class="w3-opacity w3-small"><i class="fa fa-user-o"> </i> <?php echo $tampil->author;?>&nbsp - &nbsp<i class="fa fa-calendar-o"> </i> 
          <?php $date = $tampil->tanggal; echo longdate_indo($date);?></h6>
        </div>
        <hr class="sub w3-responsive w3-padding w3-white w3-rightbar w3-border-light-grey" style="margin-top: 0px;">
        <div class="w3-responsive w3-padding w3-white w3-rightbar w3-border-light-grey" style="margin-top: 0px;">
          <?= limit_words($tampil->isi, 20) ?><br><br>
        </div>
        <?php endforeach ?>
      <?php endif ?><br>
      <?php
      echo $this->pagination->create_links();
      ?>
      <div class="w3-responsive w3-padding" style="margin-bottom: 20px;">
      </div>
    
  </div>
     
<?php include'include/tombol_help.php'; ?>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function akordion(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function dropdown() {
  var x = document.getElementById("drop");
  if (x.className.indexOf("w3-show") == -1) {  
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
