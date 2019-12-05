<!DOCTYPE html>
<html>
<title>PP - Front Office</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'include/style.html'; ?>
<style>
</style>
<body>

<!-- Top container -->
<?php include 'include/top.html';?>

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
        <hr class="hr2">
      </div>
    </div>
  <hr class="hr1">
    <a href="<?= site_url('dashboard') ?>" class="w3-bar-item w3-button w3-padding "><i class="fa fa-dashboard fa-fw w3-text-grey w3-margin-right w3-large"></i> Overview</a>
    <a href="<?= site_url('clients') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-group fa-fw w3-text-grey w3-margin-right w3-large"></i> Clients</a>
    <a href="<?= site_url('pembayaran') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-credit-card fa-fw w3-text-grey w3-margin-right w3-large"></i> Pembayaran</a>
    <a href="<?= site_url('pesan/showPesan') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Pesan</a>
    <a href="<?= site_url('artikel') ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-newspaper-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Artikel</a>
    <hr class="hr2">
    <div class="w3-padding"><h6 class="sub">TES</h6></div>
    <button onclick="akordion('jurusan')" class="testbtn w3-light-grey w3-bar-item w3-button w3-padding"><i class="fa fa-graduation-cap fa-fw w3-text-blue w3-margin-right w3-large"></i> Jurusan Kuliah &nbsp <i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i></button>
    <div id="jurusan" class="w3-hide">
      <a href="<?= site_url('ujian/jurusan') ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Profil Jurusan <i class="fa fa-circle fa-fw w3-text-light-green w3-right"></i></a>
      <a href="<?= site_url('ujian/peserta/jurusan-kuliah.html') ?>" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Peserta Ujian</a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-fw w3-text-grey w3-margin-right w3-large"></i> Hasil Ujian</a>
    </div>
    <button onclick="akordion('psikotes')" class="w3-bar-item w3-button w3-padding"><i class="fa fa-heart-o fa-fw w3-text-grey w3-margin-right w3-large"></i> Psiko Tes &nbsp <i class="fa fa-caret-down fa-fw w3-right w3-text-grey"></i></button>
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


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-padding konten" style="">

  <!-- Header -->
  <header class="w3-container" style="padding-top:6px">
    <h2 class="w3-text-dark-grey" style="text-align: left;"><b><i class="fa fa-drivers-license-o"></i> Psiko Test</b></h2>
  </header>

  <div class="w3-row-padding w3-margin-bottom"><br>
    <div class="w3-quarter">
      <a href="<?= site_url('clients/showClients') ?>" style="text-decoration: none">
      <div class="w3-container w3-khaki w3-hover-opacity">
        <div class="w3-left"><h5>Teks</h5></div>
        <div class="w3-right">
          <h4><i class="fa fa-group fa-fw"></i></h4>
        </div>
        <div class="w3-clear"></div>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="<?= site_url('clients/showClients') ?>" style="text-decoration: none">
      <div class="w3-container w3-khaki w3-hover-opacity">
        <div class="w3-left"><h5>Teks</h5></div>
        <div class="w3-right">
          <h4><i class="fa fa-group fa-fw"></i></h4>
        </div>
        <div class="w3-clear"></div>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="<?= site_url('clients/showClients') ?>" style="text-decoration: none">
      <div class="w3-container w3-khaki w3-hover-opacity">
        <div class="w3-left"><h5>Teks</h5></div>
        <div class="w3-right">
          <h4><i class="fa fa-group fa-fw"></i></h4>
        </div>
        <div class="w3-clear"></div>
      </div>
      </a>
    </div>
    <div class="w3-quarter">
      <a href="<?= site_url('clients/showClients') ?>" style="text-decoration: none">
      <div class="w3-container w3-khaki w3-hover-opacity">
        <div class="w3-left"><h5>Teks</h5></div>
        <div class="w3-right">
          <h4><i class="fa fa-group fa-fw"></i></h4>
        </div>
        <div class="w3-clear"></div>
      </div>
      </a>
    </div>
  </div>

  <!-- Header -->

  <div class="w3-container"><br>
    
  </div>
  
  <hr>
  <div class="w3-container">
    
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Mike</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jill</span><br>
      </li>
      <li class="w3-padding-16">
        <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
        <span class="w3-xlarge">Jane</span><br>
      </li>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-4" style="width: 30%">
    <header class="w3-container w3-light-grey">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright w3-hover-red"><i class="fa fa-remove"></i></span>
      <h3>Profil Jurusan</h3>
    </header>
    <div class="w3-panel w3-center">
    <div class="w3-row-padding" style="">
      <div class="">
        <?= form_open_multipart('ujian/addJurusan', ['class'=>'form-horizontal']) ?>
        <p><input class="w3-input w3-border" name="nama" type="text" placeholder="Nama Jurusan" required></p>
        <p><input class="w3-input w3-border" name="se" type="number" min="1" max="5" placeholder="SE" required></p>
        <p><input class="w3-input w3-border" name="wa" type="number" min="1" max="5" placeholder="WA" required></p>
        <p><input class="w3-input w3-border" name="an" type="number" min="1" max="5" placeholder="AN" required></p>
        <p><input class="w3-input w3-border" name="ge" type="number" min="1" max="5" placeholder="GE" required></p>
        <p><input class="w3-input w3-border" name="ra" type="number" min="1" max="5" placeholder="RA" required></p>
        <p><input class="w3-input w3-border" name="zr" type="number" min="1" max="5" placeholder="ZR" required></p>
        <p><input class="w3-input w3-border" name="fa" type="number" min="1" max="5" placeholder="FA" required></p>
        <p><input class="w3-input w3-border" name="wu" type="number" min="1" max="5" placeholder="WU" required></p>
        <p><input class="w3-input w3-border" name="me" type="number" min="1" max="5" placeholder="ME" required></p>
      </div>
    </div>
    </div>
    <button type="submit" class="w3-button w3-block w3-dark-grey w3-hover-green">Tambah</button>
    <?= form_close() ?>
  </div><br><br><br>
</div>

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
<script>
var mybtn = document.getElementsByClassName("testbtn");
var i;
for (i = 0; i < mybtn.length; i++) {
    mybtn[i].click();
    }
</script>

</body>
</html>
