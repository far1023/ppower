<?php if ($ceksub): ?>
	<?php foreach ($ceksub as $v): ?>
		<li <?php if($v->link==$page){echo'class="active"';} ?>><a href="<?= site_url($v->link)?>"><i class="fa <?= $v->icon ?> fa-fw"></i> <?= $v->nama ?></a>
	<?php endforeach ?>
<?php endif ?>