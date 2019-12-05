<style>
  #jangan {
    outline:none;
    border: 0px solid;
  }
  textarea{
    resize: vertical;
    outline:none;
    border: 0px solid;
  }
</style>
<div id="add" onclick="document.getElementById('help').style.display='block'" class="w3-round w3-green w3-hover-light-green w3-tiny w3-button w3-display-bottom" title="Bantuan">Bantuan <i class="fa fa-question"></i>
</div>
</div>
<div id="help" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-4" style="width: 30%">
    <header class="w3-container w3-light-grey">
      <span onclick="document.getElementById('help').style.display='none'" 
      class="w3-button w3-display-topright w3-hover-red w3-tiny"><i class="fa fa-remove"></i></span>
      <h3>Bantuan</h3>
    </header>
    <div class="">
      <div class="" style="">
        <div class="">
          <?= form_open_multipart('pesan/addPesan', ['class'=>'form-horizontal']) ?>
          <div class=" w3-small w3-margin-left w3-margin-top">
            <label><code>dari &nbsp &nbsp &nbsp</code><input class="w3-white jangan" disabled type="text" readonly required name="" value="Saya">
              <input class="w3-white w3-hide jangan" style="" type="text" readonly required name="nama" value="<?= $this->session->userdata('nama'); ?>">
              <input class="w3-white w3-hide jangan" style="" type="text" readonly required name="email" value="<?= $this->session->userdata('username'); ?>">
            </label>
          </div>
          <hr class="hr2">
          <div class=" w3-small w3-margin-left">
            <label><code>perihal &nbsp</code>
              <select class="jangan" style="width: 80%" required name="perihal">
                <option value="" disabled selected>pilih --</option>
                <option value="Ujian"> Ujian</option>
                <option value="Pembayaran"> Pembayaran</option>
                <option value="Lainnya"> Lainnya</option>
              </select>
            </label>
          </div>
          <hr class="hr2">
          <p><textarea class="w3-input" style="height: 150px;" type="text" placeholder="  Isi Pesan" required name="pesan"></textarea></p>
        </div>
      </div>
    </div>
    <button class="w3-button w3-block w3-dark-grey w3-hover-green" type="submit"><i class="fa fa-paper-plane"></i> KIRIM
    </button>
    <?= form_close() ?>
  </div><br><br><br>
</div>