<body>
	<div id="add" onclick="document.getElementById('news').style.display='block'" class="w3-hide w3-round w3-green w3-hover-light-green w3-button" title="Publis Artikel" style=""><i class="fa fa-newspaper-o fa-lg"></i>
	</div>


	<div id="news" class="w3-modal">
		<div class="w3-modal-content w3-animate-zoom w3-card-4" style="width: 50%">
			<header class="w3-container w3-light-grey">
				<span onclick="document.getElementById('news').style.display='none'" 
				class="w3-button w3-display-topright w3-hover-red w3-tiny"><i class="fa fa-remove"></i></span>
				<h3>Artikel</h3>
			</header>
			<div class="w3-panel w3-center">
				<div class="w3-row-padding" style="">
					<div class="">
						<?= form_open_multipart('artikel/addArtikel', ['class'=>'form-horizontal']) ?>
						<input type="text" name="judul" class="form-control w3-input w3-border w3-margin-top" placeholder="Judul" required/><br>
						<textarea id="ckeditor" class="w3-margin-top w3-border w3-padding" name="isi" class="form-control" style="width: 100%" required></textarea><br>
						<input id='file-input' type="file" class="w3-left form-control" name="gambar"><br>
					</div>
				</div>
			</div><br>
			<button class="w3-button w3-block w3-dark-grey w3-hover-green" type="submit">
				<i class="fa fa-paper-plane"></i> KIRIM
			</button>
			<?= form_close() ?>
		</div><br><br><br>
	</div>
</body>