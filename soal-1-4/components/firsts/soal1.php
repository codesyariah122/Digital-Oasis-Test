<?php
// Teknikal Test Diigital Ocean 2022
// File: component/soal1
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

use \app\SoalSatu\SoalSatu;
$soal_satu = new SoalSatu('Soal Satu','','');
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
	<button type="submit" name="soal1_start" value="soal1" class="btn <?=isset($_GET['soal1_start']) ? 'btn-primary' : 'btn-outline-primary';?> rounded-pill">
		<?=$soal_satu->title() ?>
	</button>
</form>








