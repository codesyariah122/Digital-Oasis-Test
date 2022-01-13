<?php
// Teknikal Test Diigital Oasis 2022
// File: component/soal3
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

use \app\SoalTiga\SoalTiga;
$soal_tiga = new SoalTiga('Soal Tiga','soal3_start','soal3');
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
	<button type="submit" name="soal3_start" value="soal3" class="btn <?=isset($_GET['soal3_start']) ? 'btn-primary' : 'btn-outline-primary';?> rounded-pill">
		<?=$soal_tiga->title() ?>
	</button>
</form>
