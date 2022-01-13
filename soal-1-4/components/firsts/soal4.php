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

use \app\SoalEmpat\SoalEmpat;
$soal_empat = new SoalEmpat('Soal Tiga','soal3_start','soal3');
?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="GET">
	<button type="submit" name="soal4_start" value="soal4" class="btn <?=isset($_GET['soal4_start']) ? 'btn-primary' : 'btn-outline-primary';?> rounded-pill">
		<?=$soal_empat->title() ?>
	</button>
</form>
