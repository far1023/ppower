<!DOCTYPE html>
<html>
<title>PP - Profil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'include/style.html'; ?>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
body, html {
    background-color: #fafafa; 
}
</style>
<body class="">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-black w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="<?= site_url('artikel')?>" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Artikel"><i class="fa fa-globe"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span>
    </button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
    <a href="<?=site_url('auth/logout');?>" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-red" style="text-decoration: none"><i class="fa fa-power-off"></i> Keluar</a>
  

<!-- Navbar on small screens -->
<nav class="w3-tiny w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <span class="w3-bar-item w3-padding-large">LOGO</span>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <div class="w3-dropdown-click">
    <button onclick="dropDown()" class="w3-button w3-bar-item">AKUN <i class="fa fa-angle-down fa-fw"></i>
    </button>
    <div id="Click" class="w3-dropdown-content w3-black w3-bar-block">
      <div class="w3-bar-item w3-button"> Masuk</div>
      <a href="<?=site_url('auth/logout');?>" class="w3-bar-item w3-button w3-hover-red" style="text-decoration: none"><i class="fa fa-power-off"></i> Keluar</a>
    </div>
  </div>
</nav>
</div>
</div>
<!--
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">NULL</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <div class="w3-dropdown-click">
    <button onclick="dropDown()" class="w3-button w3-bar-item w3-padding-large">AKUN <i class="fa fa-angle-down fa-fw"></i>
    </button>
    <div id="Click" class="w3-dropdown-content w3-bar-block w3-border">
      <div onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding-large"> Masuk</div>
      <a href="<?=site_url('auth/logout');?>" class="w3-bar-item w3-button w3-padding-large w3-hover-red" style="text-decoration: none"><i class="fa fa-power-off"></i> Keluar</a>
    </div>
  </div>
</div>
-->
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3 w3-hide-small">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <img src="<?=base_url('assets/images/yaya.jpg');?>" alt="John" style="width:100%">
        <div class="w3-container">
          <h4 class="w3-center"><?php $show = $this->session->userdata('nama'); echo $show; ?></h4>
          <hr>
          <table border="0">
            <tr>
              <td>
                <i class="fa fa-intersex fa-fw w3-margin-left w3-text-theme"></i></td><td>
                  <?php $show = $this->session->userdata('gender'); if ($show != 2){ echo "Laki-laki"; }else{ echo "Perempuan"; } ?>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-phone fa-fw w3-margin-left w3-text-theme"></i></td><td><?php $show = $this->session->userdata('telepon'); echo $show; ?>
              </td>
            </tr>
            <tr>
              <td>
                <i class="fa fa-map-marker fa-fw w3-margin-left w3-text-theme"></i></td><td rowspan="3"><?php $show = $this->session->userdata('alamat'); echo $show; ?>
              </td>
            </tr>
          </table><br> 
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
    <!-- End Left Column -->
    </div>
    

    <!-- Middle Column -->
    <div class="w3-col m7">
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <?php $notice = $this->session->flashdata('notice');?>
              <?php if($notice){?>
              <div class="w3-round w3-panel w3-green w3-display-container">
              <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-pale-red w3-hover-red w3-tiny w3-display-topright"><i class="fa fa-close"></i></span>
              <h6><?= $this->session->flashdata('notice')?></h6>
              </div>
              <?php } ?>
          <div class="w3-card w3-round w3-white">
            <div class="w3-container">
              <?= form_open_multipart('artikel/addArtikel', ['class'=>'form-horizontal']) ?>
              <input type="text" name="judul" class="form-control w3-input w3-border w3-margin-top" placeholder="Judul" required/><br>
              <textarea id="ckeditor" class="w3-margin-top w3-border w3-padding" name="isi" class="form-control" style="width: 600px" required></textarea><br>
              <input id='file-input' type="file" class="form-control" name="gambar"><br>
              <button type="submit" class="w3-button w3-theme w3-margin-top w3-margin-bottom"><i class="fa fa-pencil"></i> Post</button>
            </div>
          </div>
        </div>
      </div>  

      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <?php if ($feed): ?>
          <div class="w3-responsive">
        <table class="w3-table w3-bordered w3-hoverable w3-white">
          <tr class="w3-hover-white"><th>aksi</th><th>Tanggal</th><th>Author</th><th>judul</th></tr>
        <?php
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
            foreach ($feed as $row) :
        ?>
          <tr class="w3-text-grey w3-hover-light-grey">
            <td><?=anchor( 'artikel/removeArtikel/' . $row->id, 
                      '<i class="fa fa-times-rectangle fa-lg w3-text-grey w3-hover-red" title="Hapus"></i>',[
                       'onclick'=>'return confirm(\'Hapus data artikel '.$row->judul.' ?\')'
                      ])?></td>
            <td><?php echo shortdate_indo($row->tanggal);?></td>
            <td><?php echo $row->author;?></td>
            <td><?=anchor( 'artikel/detail/' . $row->slug, 
                      $row->judul)?></td>
          </tr>
        <?php endforeach;?>
      </table></div><br>
        <br><div class=""><div class="w3-content w3-margin-bottom">
    <?php
        echo $pagination;
    ?></div>
</div>
        <?php endif ?>
        <?php if (!$feed): ?>
          <div class="w3-round w3-panel w3-pale-red w3-display-container">
      <h6>Belum ada artikel yang dibuat.</h6>
      </div><br>
        <?php endif ?>
      </div> 
      </div>
    <!-- End Middle Column -->
    
    <!-- Right Column -->
    <div class="w3-col m2 w3-hide-small">      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
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

function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
  } else { 
      x.className = x.className.replace(" w3-show", "");
  }
}

function dropDown() {
    var x = document.getElementById("Click");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js')?>"></script>
<script>
    CKEDITOR.replace('ckeditor');
</script>
</body>
</html> 
