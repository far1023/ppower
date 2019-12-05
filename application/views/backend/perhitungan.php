<?php 
	// var_dump($dt);
$i=1;
	foreach ($dt as $value) {
		if ($i>3) {
			break;
		}
		echo $value['jurusan']." = ".$value['nilai']."<br>";
		$i++;
	};
	var_dump($data['nya']->nama);
?>	