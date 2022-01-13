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
if(isset($_GET['soal1_start']) AND isset($_SESSION['soal1_session'])):
	$soal_satu = new SoalSatu('Result Soal Satu','','');
?>
<div class="container  mb-5">

	<!-- <div class="row justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			<div id="loading_soal1" class="position-absolute top-50 start-50 translate-middle">
				<div class="d-flex justify-content-center">
					<div class="spinner-grow text-primary" role="status" style="width: 3rem; height: 3rem;">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Study Case -->
	<div class="row justify-content-center">
		<div id="show_soal1" class="col-lg-10 col-xs-10 col-sm-10">
			<article>
				<strong>1.</strong> Buatkan modul / prosedur dalam bahasa pseudocode (algoritma) atau bahasa
				pemrograman lainnya (Java, php, C++, dll) untuk menampilkan bilangan 1 sampai dengan
				n, dimana n adalah parameter input, dengan kondisi berikut :
				<ul>
					<li>Setiap kelipatan bilangan 2, tampilkan string “DI”</li>
					<li>Setiap kelipatan bilangan 3, tampilkan string “OS”</li>
					<li>Setiap kelipatan bilangan 6, tampilkan string “DIGITAL OASIS”</li>
				</ul>
			</article>
		</div>
	</div>

	<!-- Jawaban -->
	<div class="row  justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			<h5 class="blockquot-footer">Jawaban <?=$_SESSION['soal1_session'] ?>: </h5>
			<blockquote>
				Silahkan inputkan jumlah proses yang akan di jalankan, kemudian click/tap tombol <strong>Process</strong> :  <br>
				<small>
					<strong>
						Min : 1 <br>
						Max : 3
					</strong>
				</small>
			</blockquote>
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<div class="form-group">
					<input type="number" name="jml" class="form-control" placeholder="Inputkan jumlah prosesnya" min="1" max="3">
				</div>
				<div class="form-group">
					<div class="d-grid gap-2 mt-3">
						<button type="submit" class="btn btn-primary rounded-pill" name="soal1_process">Process</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
		<?php if(isset($_REQUEST['soal1_process'])): ?>
			<?=$_REQUEST['jml'] ?>
		<?php endif; ?>
		</div>
	</div>

</div>

<?php endif; ?>