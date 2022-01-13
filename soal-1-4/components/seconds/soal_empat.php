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
use \app\SoalEmpat\SoalEmpat;
if(isset($_GET['soal4_start']) && !isset($_REQUEST['soal4_process'])):
	$soal_empat = new SoalEmpat('Result Soal Tiga','','');
?>
<div class="container mb-5">

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
				<strong>4.</strong>  Ada sebuah angka seperti ini : <code>1.225.441</code>
				Berikan outputnya berupa : <br>
				<code>1000000</code> <br>
				<code>200000</code> <br>
				<code>20000</code> <br>
				<code>5000</code> <br>
				<code>400</code> <br>
				<code>40</code> <br>
				<code>1</code> <br>
			</article>
		</div>
	</div>

	<!-- Jawaban -->
	<div class="row  justify-content-center mt-5">
		<div class="col-lg-10 col-xs-10 col-sm-10">
			<h5 class="blockquot-footer">Jawaban <?=$_SESSION['soal4_session'] ?>: </h5>
			<blockquote>
				<?php $soal_empat->format_bilangan('1.225.441') ?>
			</blockquote>
			<article>
				<strong>Script Code : </strong> <br>
					<code>
					public function format_bilangan($bil)
					</code> <br>

					<code>
					{
					</code><br>

					<code>
						echo "<strong>Bilangan Character : {$bil}</strong>";
					</code><br>

					<code>
						$arr = explode('.',$bil);
					</code><br>

					<code>
						$new_bill = implode($arr);
					</code><br>

						$bil = str_split($new_bill);
					<code>	
						echo "br";
					</code><br>

					<code>
						for($i=0;$i <= count($bil)-1; $i++){
					</code><br>

					<code>
						echo $bil[$i];
					</code><br>

					<code>
						for($j=count($bil)-1; $j > $i; $j--){
					</code><br>

					<code>
						echo 0;
					</code><br>

					<code>
					}
					</code><br>

					<code>
						echo 'br';
					</code><br>

					<code>
					}	
					}
					</code><br>
			</article>
		</div>
	</div>
	<?php endif; ?>

</div>



<script>
	document.querySelector('#loading4').style.display="none"
	const soal4_btn = () =>  {
		document.querySelector('#loading4').style.display="block"
		document.querySelector('#text_btn4').style.display="none"
	}
</script>
