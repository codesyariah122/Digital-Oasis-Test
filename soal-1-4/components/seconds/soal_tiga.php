<?php
// Teknikal Test Digital Oasis 2022
// File: component/soal1
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/
use \app\SoalTiga\SoalTiga;
if(isset($_GET['soal3_start'])):
	$soal_tiga = new SoalTiga('Result Soal Tiga','','');
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
				<strong>3.</strong> Anagram adalah kata yang dibentuk dari kata itu sendiri dengan menata ulang huruf-
				huruf pada kata tersebut, menggunakan semua huruf yang ada pada kata tersebut tanpa
				ada yang dikurangi dan ditambahkan.
				Buatkan modul / fungsi dalam bahasa pseudocode (algoritma) atau bahasa pemrograman
				lainnya (Java, php, C++, dll) untuk memeriksa dua kata, apakah dua kata tersebut
				merupakan anagram atau bukan.
			</article>
		</div>
	</div>

	<!-- Jawaban -->
	<div class="row  justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			<h5 class="blockquot-footer">Jawaban <?=$_SESSION['soal3_session'] ?>: </h5>
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
						<button type="submit" class="btn btn-primary rounded-pill" name="soal1_process" onclick="soal3_btn()">
							<div id="loading3">
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</div>
							<div id="text_btn3">
								Process
							</div>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php endif; ?>

	<div class="row justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			
		</div>
	</div>

	<div class="row justify-content-center">
		
		
	</div>

</div>



<script>
	document.querySelector('#loading3').style.display="none"
	const soal3_btn = () =>  {
		document.querySelector('#loading3').style.display="block"
		document.querySelector('#text_btn3').style.display="none"
	}
</script>
