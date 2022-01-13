<?php
// Teknikal Test Diigital Oasis 2022
// File: component/soal2
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

use \app\SoalDua\SoalDua;
$soal_dua = new SoalDua('Soal Dua','soal2_start','soal2');
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
	<button type="submit" name="soal2_start" value="soal2" class="btn <?=isset($_GET['soal2_start']) ? 'btn-primary' : 'btn-outline-primary';?> rounded-pill">
		<?=$soal_dua->title() ?>
	</button>
</form>






