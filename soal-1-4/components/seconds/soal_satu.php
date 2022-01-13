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
use \app\SoalSatu\SoalSatu;
if(isset($_GET['soal1_start']) && !isset($_REQUEST['soal1_process']) && !isset($_REQUEST['loops'])):
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
		<div class="col-lg-10 col-xs-10 col-sm-10">
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
						<button type="submit" class="btn btn-primary rounded-pill" name="soal1_process" onclick="soal1_btn()">
							<div id="loading1">
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</div>
							<div id="text_btn1">
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
			<?php if(isset($_REQUEST['soal1_process'])): ?>
				<h5 class="blockquot-footer">Jawaban <?=$_SESSION['soal1_session'] ?>: </h5>
				<blockquote>
				Silahkan inputkan jumlah proses yang akan di jalankan, kemudian click/tap tombol <strong>Process</strong> :  <br>
				<small>
					<strong>
						Input 1 : untuk angka antara (1-10) <br>
						Input 2 : untuk angka antara (1-15) <br>
						Input 3 : untuk angka antara (1-5) <br>
					</strong>
				</small>
			</blockquote>
				<?php
				$process = new SoalSatu('Result Soal Satu','test','soal1');
				$process->trap_process($_REQUEST);
				?>
			<?php endif; ?>
		</div>
	</div>

	<div class="row justify-content-center">
		<?php if (isset($_REQUEST['loops'])): ?>
			<?php  
				$loop_process = new SoalSatu('Result Process Loop','loop','soal1');
				$loop_process->process_loop([
					'bil1' => (isset($_REQUEST['bil1'])) ? $_REQUEST['bil1'] : '',
					'bil2' => (isset($_REQUEST['bil2'])) ? $_REQUEST['bil2'] : '' ,
					'bil3' => (isset($_REQUEST['bil3'])) ? $_REQUEST['bil3'] : ''
				]);
				if($_SESSION['loops']){
					$firsts = $_SESSION['loops']['bil1'];
					$seconds = $_SESSION['loops']['bil2'];
					$thirds = $_SESSION['loops']['bil3'];
			?>
			<small class="mt-3 mb-2 text-info">Hasil Bilangan berdasarkan input yang terkirim</small>
			<div class="table-responsive">
				<table class="table table-dark table-sm table-bordered">
					<thead>
						<tr>
							<th scope="col">Input: 10</th>
							<th scope="col">Input: 15</th>
							<th scope="col">Input: 5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!-- Bilangan 1 - 10 -->
							<td>
								<?php for($i = 1; $i <= $firsts; $i+=1): ?>
									<b><?=$i; ?></b> &nbsp;
									<?php  
									if($i % 2 == 0 && $i % 6 !== 0){
										echo "DI";
									}elseif ($i % 3 == 0 && $i % 6 !== 0) {
										echo "OS";
									}elseif($i % 6 == 0){
										echo "DIGITAL OASIS";
									}
									?>
									<br>
								<?php endfor; ?>
							</td>
							<!-- Bilangan 1 - 15 -->
							<td>
								<?php for($i = 1; $i <= $seconds; $i+=1): ?>
									<b><?=$i; ?></b> &nbsp;
									<?php  
									if($i % 2 == 0 && $i % 6 !== 0){
										echo "DI";
									}elseif ($i % 3 == 0 && $i % 6 !== 0) {
										echo "OS";
									}elseif($i % 6 == 0){
										echo "DIGITAL OASIS";
									}
									?>
									<br>
								<?php endfor; ?>
							</td>
							<!-- Bilangan 1 - 5 -->
							<td>
								<?php for($i = 1; $i <= $thirds; $i+=1): ?>
									<b><?=$i; ?></b> &nbsp;
									<?php  
									if($i % 2 == 0 && $i % 6 !== 0){
										echo "DI";
									}elseif ($i % 3 == 0 && $i % 6 !== 0) {
										echo "OS";
									}elseif($i % 6 == 0){
										echo "DIGITAL OASIS";
									}
									?>
									<br>
								<?php endfor; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<?php }?>
		<?php endif ?>
	</div>

</div>



<script>
	document.querySelector('#loading1').style.display="none"
	const soal1_btn = () =>  {
		document.querySelector('#loading1').style.display="block"
		document.querySelector('#text_btn1').style.display="none"
	}
</script>