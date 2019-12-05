<?php include'include/style.html'; ?>
<?php
$id      = $hasil->id;
if($this->input->post('is_submitted')){
  $tanggal  = set_value('tanggal');
  $username  = set_value('username');
  $password  = set_value('password');
  $nama    = set_value('nama');
  $tf  = set_value('tf');
  $total  = set_value('total');
  $ujian = set_value('ujian');
  $ukey = set_value('ukey');
}
?>
<?php if ($hasil->status=="Unpaid"): ?>
  <?= form_open_multipart('pembayaran/konfirm/'.$id)?>
  <div class="w3-padding-large">
    <div class="w3-hide">
      <input class="w3-input w3-white w3-animate-input" style="width: 75%" type="text" readonly required name="idpeserta" value="<?= $idpes ?>">
    </div>
    <div class="w3-hide">
      <input class="w3-input w3-white w3-animate-input" style="width: 75%" type="text" readonly required name="idpay" value="<?= $id ?>">
    </div> 
    <div class="w3-section">
      <label>Tanggal Pendaftaran</label>
      <input class="w3-input w3-white w3-animate-input" style="width: 75%" type="text" readonly required name="tanggal" value="<?= longdate_indo($hasil->tanggal) ?>">
    </div>              
    <div class="w3-section">
      <label>Username</label>
      <input class="w3-input w3-animate-input" style="width: 75%" readonly name="username" value="<?= $hasil->username ?>">
    </div>
    <div class="w3-section">
      <label>Nama Lengkap</label>
      <input class="w3-input w3-animate-input" style="width: 75%" readonly name="nama" value="<?= $hasil->nama ?>">
    </div>
    <div class="w3-section">
      <label>Jenis Ujian</label>
      <input class="w3-input w3-animate-input" style="width: 75%" readonly name="ujian" value="<?= $hasil->ujian ?>">
    </div>
    <div class="w3-section">
      <label>Metode Pembayaran</label>
      <input class="w3-input w3-animate-input" style="width: 75%" readonly name="tf" value="<?= $hasil->tf ?>">
    </div>
    <div class="w3-section">
      <label>Total (Rp)</label>
      <input class="w3-input w3-animate-input" style="width: 75%" readonly name="total" value="<?= number_format($hasil->total,0,',','.') ?>">
    </div>
  </div>
  <div class="">
    <div class="w3-container w3-padding" style="margin-top: 8px"> &nbsp
    </div><hr class="headform">
  </div>
  <div class=" w3-padding-large">
    <div class="w3-section">
      <?php $ukey=random_string('alpha',6) ?>
      <label>UKey Peserta &nbsp <i class="fa fa-key w3-text-grey fa-fw"></i>&nbsp <code class="w3-codespan"><?= $ukey ?></code></label>
      <input class="w3-hide" style="width: 75%; border: none;" name="ukey" readonly type="text" value="<?= $ukey?>">
    </div>
    <div class="w3-section ">
      <input class="w3-input w3-animate-input" style="width: 75%" name="password" type="password" required placeholder="Konfirmasi Password">
    </div>
    <button type="submit" class="w3-btn w3-round w3-green"><i class="fa fa-check fa-fw">&nbsp</i>Konfirmasi</button>
    <? form_close(); ?>
    <?php elseif ($hasil->status=="Paid"): ?>
      <?php $id = $hasil->id; ?>
      <?= form_open_multipart('pembayaran/cancel/'.$id) ?>
      <div class=" w3-padding-large">
        <div class="w3-section">
          <label>Tanggal Pendaftaran</label>
          <input class="w3-input w3-white w3-animate-input" style="width: 75%" type="text" readonly name="tanggal" value="<?= longdate_indo($hasil->tanggal) ?>">
        </div>
        <div class="w3-section">
          <label>Nama Lengkap</label>
          <input class="w3-input w3-animate-input" style="width: 75%" readonly name="nama" value="<?= $hasil->nama ?>">
        </div>
        <div class="w3-section">
          <label>Jenis Ujian</label>
          <input class="w3-input w3-animate-input" style="width: 75%" readonly name="ujian" value="<?= $hasil->ujian ?>">
        </div>
        <div class="w3-section">
          <label>Metode Pembayaran</label>
          <input class="w3-input w3-animate-input" style="width: 75%" readonly name="tf" value="<?= $hasil->tf ?>">
        </div>
        <div class="w3-section">
          <label>Total (Rp)</label>
          <input class="w3-input w3-animate-input" style="width: 75%" readonly name="total" value="<?= number_format($hasil->total,0,',','.') ?>">
        </div>
      </div>
      <div class="">
        <div class="w3-container w3-padding" style="margin-top: 8px"> &nbsp
        </div><hr class="headform">
      </div>
      <?php if ($peserta->status!="Selesai"): ?>
        <div class=" w3-padding-large">
          <div class="w3-section">
            <label><i class="fa fa-exclamation fa-lg w3-text-red"></i>&nbsp Dengan ini pembayaran dibatalkan.</label>
          </div>
          <div class="w3-section ">
            <input class="w3-input w3-animate-input" style="width: 75%" name="password" type="password" required placeholder="Konfirmasi Password">
          </div>
          <button type="submit" class="w3-btn w3-round w3-hover-red w3-pale-red"><i class="fa fa-close fa-fw">&nbsp</i>Batal</button>
          <br><br>
          <div>
          </div>
        </div><div></div>
        <?php elseif ($peserta->status=="Selesai"): ?>
          <div class="w3-container">
            <div class="w3-container w3-white w3-padding-16">
              <div class="w3-left"><i class="fa fa-drivers-license w3-text-dark-grey w3-xxlarge"></i></div>
              <div class="w3-right">
                <h5 class="w3-text-dark-grey"><?= $peserta->id ?>  <?= $peserta->nama ?></h5>
              </div>
              <br><br>
              <div class="w3-green">
              </div>
            </div>
          </div><br>
          <a href="<?= site_url('ujian/myUjian/'.$peserta->id) ?>" class="w3-block w3-button w3-padding w3-pale-green w3-hover-green w3-small"><b>CEK HASIL</b></a>
          <div class="">
          <?php endif ?>
          <? form_close(); ?>
                </div>
              <?php endif ?>
              <!-- End page content -->
            </div><br>
          </div><br><br>
        </div><br><br>
        <!-- End page content -->
      </div>
      <?php include'include/tombol_artikel.php'; ?>

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
