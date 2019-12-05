<!-- Kategori -->
<li <?php if ($page == "artikel") {echo 'class="active"';} ?>>
  <a href="<?= site_url('artikel') ?>">
    <i class="fa fa-newspaper-o"></i> <span>Artikel</span></a>
</li>
<li <?php if ($page == "ujian/pilih") {echo 'class="active"';} ?>>
  <a href="<?= site_url('ujian/pilih') ?>">
    <i class="fa fa-book"></i> <span>Daftar Tes</span></a>
</li>
  <?php foreach ($col as $sidecol): ?>
    <?php if ($sidecol->level == 2 && $sidecol->aktif == 1): ?>
      <li class="header"><?= $sidecol->kategori ?></li>
      <!-- Main Menu -->
      <?php foreach ($menu as $sidemain): ?>
        <?php if ($sidemain->kategori == $sidecol->id && $sidemain->level ==2 & $sidemain->aktif == 1): ?>
          <?php $sub=$this->db->get_where('menusub', array('main' => $sidemain->id)) ?>
          <?php if ($sub->num_rows()>0): ?>
            <li class="treeview <?php if($sidemain->link == $subto){echo'active';} ?>">
              <a href="<?= site_url($sidemain->link) ?>"><i class="fa <?= $sidemain->icon ?>"></i>
                <span><?= $sidemain->nama ?></span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                <?php foreach ($sub->result() as $sidesub): ?>
                  <li <?php if ($sidesub->link == $page) {echo 'class="active"';} ?>><a href="<?= site_url($sidesub->link) ?>"><i class="fa fa-circle-o"></i> <?= $sidesub->nama ?></a></li>
                <?php endforeach ?>
              </ul>
            </li>
            <?php else: ?>
              <li <?php if ($sidemain->link == $page) {echo 'class="active"';} ?>>
                <a href="<?= site_url($sidemain->link) ?>">
                  <?php if ($sidemain->icon != "N/A"): ?>
                    <i class="fa <?= $sidemain->icon ?>"></i>
                  <?php endif ?>
                <span><?= $sidemain->nama ?></span></a>
                </li>
              <?php endif ?>
            <?php endif ?>
          <?php endforeach ?>
          <!-- /Main Menu -->
        <?php endif ?>
      <?php endforeach ?>
          <!-- /Kategori -->