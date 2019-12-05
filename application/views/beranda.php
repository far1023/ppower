<!DOCTYPE html>
<html>
<title>Psiko-Power</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'pageuser/include/style.html'; ?>
<style>
body,h1,h2,h3,h4,h5,h6,footer {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
.bgcolor-1{
  background-color: #fafafa;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("<?=base_url('assets/images/ide.jpg');?>");
    height: 100%;
    width: 100%;
}
.w3-bar .w3-button {
    padding: 16px;
}
/* width */
::-webkit-scrollbar {
    width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #fafafa; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #bfbfbf; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #bfbfbf;
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card-2" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">Psiko-Power</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-hide w3-bar-item w3-button">ABOUT</a>
      <a href="#team" class="w3-bar-item w3-button"><i class="fa fa-user fa-fw"></i> TEAM</a>
      <a href="#akses" class="w3-bar-item w3-button"><i class="fa fa-star fa-fw"></i> UJIAN</a>
      <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-address-card fa-fw"></i> KONTAK</a>
      <?php 
      $user = $this->session->userdata('username');
      $level = $this->session->userdata('level');
        if ($level==1 || $level==3) {?>
        <a href="<?=site_url('dashboard');?>" class="w3-bar-item w3-button"><i class="fa fa-user-circle fa-lg fa-fw"></i> <?php echo $user; ?></a>
      <?php }
        elseif ($level == 2) {?>
          <a href="<?=site_url('ujian/pilih');?>" class="w3-bar-item w3-button"><i class="fa fa-user-circle fa-fw"></i> <?php echo $user; ?></a>
      <?php }
        elseif (!$level) {?>
          <div class="w3-dropdown-hover">
            <button class="w3-button w3-white"><i class="fa fa-user-circle fa-fw"></i> AKUN</button>
            <div class="w3-dropdown-content w3-bar-block w3-border">
              <div onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">&nbsp Masuk</div>
              <a href="<?=site_url('daftar');?>" class="w3-bar-item w3-button">&nbsp Daftar</a>
            </div>
          </div>
      <?php } ?>
    </div>

    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-tiny w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <span class="w3-bar-item w3-padding-large">Psiko-Power</span>
  <a href="#about" onclick="w3_close()" class="w3-hide w3-bar-item w3-button">ABOUT</a>
  <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
  <a href="#akses" onclick="w3_close()" class="w3-bar-item w3-button">UJIAN</a>
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">KONTAK</a>
  <?php 
    $user = $this->session->userdata('username');
    $level = $this->session->userdata('level');
    if ($level != 2) {
  ?>
      <a href="<?=site_url('dashboard');?>" class="w3-bar-item w3-button"><i class="fa fa-user-circle fa-lg fa-fw"></i> <?php echo $user; ?></a>
    <?php }
    elseif ($level == 2) {?>
      <a href="<?=site_url('dashboard/profil');?>" class="w3-bar-item w3-button"><i class="fa fa-user-circle fa-fw"></i> <?php echo $user; ?></a>
    <?php }
    elseif (!$level) {?>
      <div class="w3-dropdown-click">
        <button onclick="dropDown()" class="w3-button">AKUN <i class="fa fa-angle-down fa-fw"></i></button>
        <div id="Click" class="w3-dropdown-content w3-bar-block w3-black">
          <div onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">Masuk
          </div>
          <a href="<?=site_url('daftar');?>" class="w3-bar-item w3-button">Daftar</a>
        </div>
      </div>
    <?php } ?>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min w3-animate-opacity" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-xlarge">Stop wasting valuable time with projects that just isn't you.</span>
    <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn more and start today</a></p>
  </div> 
</header>

<!-- About Section -->
<div class="w3-container" style="padding:50px 16px" id="about">
  <h3 class="w3-center">ABOUT THE COMPANY</h3>
  <p class="w3-center w3-large">Key features of our company</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p><hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Passion</p><hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Design</p><hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Support</p><hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
    </div>
  </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="w3-container bgcolor-1" style="padding:50px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>We know design.</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore.</p>
      <p><a href="#work" class="w3-button w3-black"><i class="fa fa-th"> </i> View Our Works</a></p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="<?=base_url('assets/images/satu.jpg');?>" alt="Buildings" width="700" height="394">
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:50px 16px" id="team">
  <h3 class="w3-center">THE TEAM</h3>
  <p class="w3-center w3-large">The ones who runs this company</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="<?=base_url('assets/images/satu.jpg');?>" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>John Doe</h3>
          <p class="w3-opacity">CEO & Founder</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="<?=base_url('assets/images/satu.jpg');?>" alt="Jane" style="width:100%">
        <div class="w3-container">
          <h3>Anja Doe</h3>
          <p class="w3-opacity">Art Director</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="<?=base_url('assets/images/satu.jpg');?>" alt="Mike" style="width:100%">
        <div class="w3-container">
          <h3>Mike Ross</h3>
          <p class="w3-opacity">Web Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="<?=base_url('assets/images/satu.jpg');?>" alt="Dan" style="width:100%">
        <div class="w3-container">
          <h3>Dan Star</h3>
          <p class="w3-opacity">Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Work Section -->
<div class="w3-container bgcolor-1" style="padding:50px 16px" id="work">
  <h3 class="w3-center">OUR WORK</h3>
  <p class="w3-center w3-large">What we've done for people</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
    </div>
  </div>

  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
    </div>
    <div class="w3-col l3 m6">
      <img src="<?=base_url('assets/images/satu.jpg');?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Pricing Section -->
<!-- Grid -->
  <div class="w3-row-padding" id="akses" style="padding:50px 16px;">
    <div class="w3-center">
      <h3>Layanan</h3>
      <p>Dapatkan layanan terbaik dari yang ahli.</p>
    </div>

    <div class="w3-quarter w3-margin-bottom" style="margin-top:64px">
      <ul class="w3-hide w3-ul w3-card-4 w3-center w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Akses Penuh</li>
        <li class="w3-padding-16"><b>10GB</b> Storage</li>
        <li class="w3-padding-16"><b>10</b> Emails</li>
        <li class="w3-padding-16"><b>10</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">Rp50.000</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <a href="<?= site_url('daftar') ?>" class="w3-btn w3-green w3-padding-large">Daftar</a>
        </li>
      </ul>
    </div>

    <?php foreach ($ujian as $tampil): ?>
    <div class="w3-quarter w3-margin-bottom" style="margin-top:64px">
      <ul class="w3-ul w3-card-4 w3-center w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Ujian <?= $tampil->nama; ?></li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">Rp<?= number_format($tampil->biaya,0,',','.') ?></h2>
          <span class="w3-opacity">per ujian</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <a href="<?= site_url('ujian/daftar/'.$tampil->slug) ?>" class="w3-btn w3-green w3-padding-large">Daftar</a>
        </li>
      </ul>
    </div>
    <?php endforeach ?>
    <div class="w3-quarter w3-margin-bottom" style="margin-top:64px">
    </div>
  </div>

<!-- Contact Section -->
<div class="w3-container bgcolor-1" style="padding:50px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-half">
      <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right w3-text-dark-grey"></i> Pekanbaru, Riau</p>
      <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right w3-text-dark-grey"></i> Phone: +00 151515</p>
      <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right w3-text-dark-grey"> </i> Email: mail@mail.com</p>
      <?= form_open_multipart('pesan/addPesan', ['class'=>'form-horizontal']) ?>
        <p><input class="w3-input w3-border" type="text" placeholder="Nama Lengkap" required name="nama"></p>
        <p><input class="w3-input w3-border" type="email" placeholder="Email" required name="email"></p>
        <p><select class="w3-input w3-border" required name="perihal">
        <option value="" disabled selected>Perihal --</option>
        <option value="Ujian"> Ujian</option>
        <option value="Pembayaran"> Pembayaran</option>
        </select></p>
        <p><input class="w3-input w3-border" type="text" placeholder="Isi Pesan" required name="pesan"></p>
        <p>
          <button class="w3-button w3-dark-grey w3-hover-green" type="submit">
            <i class="fa fa-paper-plane"></i> KIRIM
          </button>
        </p>
      <?= form_close(); ?>
    </div>
    <div class="w3-half">
      <!-- Add Google Maps -->
      <div id="googleMap" style="width:100%;height:510px;"></div>
    </div>
  </div>
</div></body>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <a href="#home" class="w3-button w3-tiny w3-light-grey"><i class="fa fa-arrow-up fa-fw"></i>To the top</a>
  
  <div class="w3-hide w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</footer>

<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4" style="width: 30%">
      <header class="w3-container w3-light-grey">
        <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright w3-hover-red"><i class="fa fa-remove"></i></span>
      <h3>Login</h3>
    </header>
    <div class="w3-container w3-margin-top w3-center">
      <i class="fa fa-user-circle-o fa-5x w3-text-dark-grey"></i>
    </div>
    <div class="w3-container">
      <div class="w3-row w3-section">
        <div class="w3-rest">
          <?= form_open_multipart('auth/cekLogin', ['class'=>'form-horizontal']) ?>
          <p><input class="w3-input w3-border" name="username" type="text" placeholder="Nama Pengguna" required></p>
          <p><input class="w3-input w3-border" name="password" type="password" placeholder="Password" required></p></div>
    </div>
    </div>
    <button type="submit" class="w3-button w3-block w3-dark-grey w3-hover-green">Masuk</button>
    <?= form_close() ?>
    </div>
    <div class="w3-modal-content w3-animate-opacity w3-center w3-transparent w3-text-white w3-text" style="width: 30%"><h6><?php echo anchor('daftar', 'Daftar di sini');?></h6></div>
</div>

<script>
function dropDown() {
    var x = document.getElementById("Click");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

function myMap()
{
  myCenter=new google.maps.LatLng(0.521059, 101.448786);
  var mapOptions= {
    center:myCenter,
    zoom:15, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });

  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
  content:"Psiko-Power"
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });

}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
    } else {
        mySidebar.style.display = 'block';
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfGOWoOAJMzs844R53YOfeKvBcr9eqN5o&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>