<title>Psiko-Power (Hasil Ujian <?= $idpeserta ?>)</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'include/style.html'; ?>
<style>
  table, tr, td, th{
    border: 1px solid #ddd;
    border-collapse: collapse;
    padding: 5px;
  }
  #noborder {
    border: 0px;
  }
  #tabel {
    width: 100%;
  }
  #wadah{
    position: relative;
  }
  #tes{
    bottom: 0;
    right: 0;
    position: absolute;
  }
  .headform { 
    display: block;
    margin-top: 0em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 0.5px;
  }
</style>
<body>
  <div class="" style="margin-top: 0px; margin-bottom: 10px; margin-left: 5px"><i class="fa fa-graduation-cap fa-fw">  </i> Pemilihan Jurusan Kuliah <span class="pull-right" style="margin-right: 5px"><b>Psiko</b>Power</span>
  </div>
  <hr class="headform">
  <div class="w3-container w3-padding w3-margin-right w3-margin-left">
    <code class="">No. Peserta &nbsp : <?= $idpeserta ?></code><br>
    <code class="">Nama Peserta &nbsp: <?= $namapes ?></code><br>
    <code>Jenis Kelamin : <?php if ($gender==1) {echo "Laki-laki";} elseif($gender==2){echo 'Perempuan';} elseif(!$gender) {echo ' ';}?></code><br>
    <br>
    <table id="tabel" class="w3-text-dark-grey w3-centered w3-white">
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <th class="w3-small" rowspan="2"> NO </th>
        <th class="" rowspan="2" width=28%>ASPEK / <br>FUNGSI PSIKIS</th>
        <th class="" rowspan="2" width=25%>DESKRIPSI<br>SKOR RENDAH</th>
        <th class="w3-tiny" colspan="5" style="">SKALA PENILAIAN</th>
        <th class="" rowspan="2" width=25%>DESKRIPSI<br>SKOR TINGGI</th>
      </tr>
      <tr class="w3-hover-white w3-small w3-hover-text-dark-grey" style="">
        <td><i class="fa fa-fw"><code>1</code></i></td>
        <td><i class="fa fa-fw"><code>2</code></i></td>
        <td class="w3-light-grey"><i class="fa fa-fw"><code>3</code></i></td>
        <td><i class="fa fa-fw"><code>4</code></i></td>
        <td><i class="fa fa-fw"><code>5</code></i></td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">1</td>
        <td class="w3-left-align w3-small">
          KECERDASAN UMUM
        </td>
        <td class="w3-left-align w3-tiny">Hanya mampu memecahkan persoalan yang tidak rumit, sederhana dan pernah terjadi</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$se && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$se) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu dalam berpikir menyeluruh untuk memahami dan mencari penyelesaian masalah dengan tepat</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">2</td>
        <td class="w3-left-align w3-small">
          KEMAMPUAN PENGAMBILAN KEPUTUSAN
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu memilih satu pilihan terbaik dari alternatif pilihan yang ada</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$wa && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$wa) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu memilih satu pilihan terbaik dari alternatif pilihan yang ada</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">3</td>
        <td class="w3-left-align w3-small">
          DAYA ANALISA MASALAH
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu berfikir secara menyeluruh terhadap suatu masalah dan menguraikannya menjadi hal yang lebih detail/spesifik</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$an && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$an) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu melihat suatu masalah secara menyeluruh, kemudian menguraikannya secara detail untuk mendapat kesimpulan</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">4</td>
        <td class="w3-left-align w3-small">
          FLEKSIBILITAS BERFIKIR
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu berpindah orientasi dari satu cara ke cara yang lain, dan kaku dalam berfikir</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$ge && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$ge) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Lincah dan luwes dalam berfikir untuk mencari solusi dari satu cara ke cara lain</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">5</td>
        <td class="w3-left-align w3-small">
          KEMAMPUAN ABSTRAKSI VERBAL
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu berpindah orientasi dari satu cara ke cara yang lain, dan kaku dalam berfikir</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$ra && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$ra) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Lincah dan luwes dalam berfikir untuk mencari solusi dari satu cara ke cara lain</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">6</td>
        <td class="w3-left-align w3-small">
          KEMAMPUAN NUMERIKAL / MATEMATIS
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu berfikir dengan angka dan kurang menguasai hubungan numerik</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$zr && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$zr) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu berfikir matematis, logis, dan praktis dengan berhitung</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">7</td>
        <td class="w3-left-align w3-small">
          DAYA KREATIFITAS
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu menciptakan ide-ide baru dan lebih mengikuti cara-cara yang sudah ada</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$fa && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$fa) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu mengembangkan ide, membuat solusi dan cara-cara baru/berbeda dalam mengatasi masalah</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">8</td>
        <td class="w3-left-align w3-small">
          KEMAMPUAN DAYA BAYANG RUANG
        </td>
        <td class="w3-left-align w3-tiny">Kurang mampu berfikir secara sistematis dan kurang praktis untuk diterapkan</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$wu && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$wu) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu untuk berfikir runtut, terarah dengan penalaran yang masuk akal</td>
      </tr>
      <!------------------------- --------------------------------------------->
      <tr class="w3-hover-white w3-hover-text-dark-grey">
        <td class="w3-small">9</td>
        <td class="w3-left-align w3-small">
          DAYA INGAT
        </td>
        <td class="w3-left-align w3-tiny">Mudah lupa terhadap hal-hal yang pernah dipelajari sebelumnya</td>
        <?php $i=1; 
        for ($i = 1; $i <=5; $i++) {
          if ($i==$me && $i==3) {
            echo '<td class="w3-light-grey"><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==$me) {
            echo '<td class=""><i class="fa fa-close w3-text-dark-grey"></i></td>';
          }
          elseif ($i==3){
            echo '<td class="w3-light-grey"></td>';
          }
          else {
            echo '<td class=""></td>';
          }
        }
        ?>
        <td class="w3-left-align w3-tiny">Mampu untuk memberikan respon sesuai dengan hal yang telah dipelajari sebelumnya</td>
      </tr>
    </table>
    <i class="w3-small">Ket :
      <table style="width: 100%">
        <tr class="w3-small">
          <td style="width: 20%">1 = Kurang Sekali</td>
          <td style="width: 20%">2 = Kurang</td>
          <td style="width: 20%">3 = Cukup</td>
          <td style="width: 20%">4 = Baik</td>
          <td style="width: 20%">5 = Baik Sekali</td>
        </tr>
      </table></i><br>
      <table class="w3-small" style="width: 100%">
        <tr class="w3-text-dark-grey"><th>Saran</th></tr>
        <tr class="w3-text-dark-grey">
          <?php
          $add    = array_slice($saran, -1);
          $awal   = join(' ', array_slice($saran, 0, -1));
          $susun  = array_filter(array_merge(array($awal), $add)); 
          ?>
          <td><?php echo ucfirst(join(' Serta ', $susun)).""; ?></td>
        </tr>
      </table><br>
      <table class="w3-small" style="width: 100%">
        <tr class="w3-text-dark-grey"><th>Masukan tambahan</th></tr>
        <tr class="w3-text-dark-grey">
          <td><?= $sarank->deskripsi ?></td>
        </tr>
      </table><br>
      <table class="w3-small">
        <tr class="w3-text-dark-grey">
          <td>No.</td>
          <td>Jurusan yang disarankan</td>
        </tr>
        <?php 
        $i=1;
        foreach ($dt as $value) {
          if ($i>3) {
            break;
          }
          echo '<tr class="w3-text-dark-grey">';
          echo '<td class="w3-center">'.$i.'</td>';
          echo '<td>'.$value['jurusan'].'</td>';
          echo '</tr>';
          $i++;
        };
        ?>
      </table>
      <br>
    </div>
    <div class="pull-right" id="tes" style="padding-right: 1cm;">
      <div style="text-align: center; z-index: 1; position: relative; top: -20px;">
        Pekanbaru, <?php echo tgl_indo(date('Y-m-d')); ?><br>
        <?php if ($ttd): ?>
          <img src="<?= base_url('assets/images/ttd/'.$ttd->title);?>" alt="User Image" style="height: 2.5cm;"><br>
        <?php else: ?>
          <img src="<?= base_url('assets/images/ttd/ur1.png');?>" alt="User Image" style="height: 2.5cm;"><br>
        <?php endif ?>
        <?= $dokter->nama ?>
      </div>
    </div>
    <div class="pull-right" id="tes" style="padding-right: 1cm;">
      <div style="z-index: 2; position: relative; left: -110px; ">
        <img src="<?= base_url();?>assets/images/mark.png" alt="User Image" style="height: 5cm; opacity: 0.69">
      </div>
    </div>
  </body>
  <script>
    window.print()
  </script>