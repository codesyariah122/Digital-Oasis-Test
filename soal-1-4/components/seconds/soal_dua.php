<div class="container  mb-5">
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
	use \app\SoalDua\SoalDua;
	use \app\Database\Database;
	// var_dump($_GET);
	// die;
	if(isset($_GET['soal2_start']) && !isset($_REQUEST['soal2_process']) && !isset($_REQUEST['update'])):
		?>
	<!-- Study Case -->
	<div class="row justify-content-center">
		<div class="col-lg-10 col-xs-10 col-sm-10">
			<article>
				<strong>2.</strong> Dalam suatu database terdapat tabel pendaftaran yang memiliki dua kolom yaitu id
				(primary key) dan tahun. Dalam tabel tersebut terdapat kesalahan data pada record
				dengan id 20 sampai dengan 100. Buatkan query untuk mengganti nilai kolom tahun
				menjadi 2016 untuk record-record tersebut :
				
			</article>
		</div>
	</div>

	<!-- Jawaban -->
	<div class="row  justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			<h5 class="blockquot-footer">Jawaban <?=$_SESSION['soal2_session'] ?>: </h5>
			<blockquote>
				Siapkan database terlebih dahulu, sebelumnya jalankan aplikasi database SQL Anda (mysql/mariadb/pgsql) atau menggunakan web server software package (xampp/mamp/lamp) aktifkan database SQL melalui aplikasi web server software package :  <br>
				<small>
					<strong>
						Setelah itu isi data yang di butuhkan,  yang berupa user  autentikasi aplikasi database anda (mysql/mariadb/pgsql).
					</strong>
				</small>
			</blockquote>
			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<div class="form-group">
					<input type="hidden" name="db_name" value="digital_oasis" class="form-control" placeholder="Inputkan jumlah prosesnya" min="1" max="3">
				</div>
				<div class="form-group mb-2">
					<label for="hostname">DB Host <small class="text-danger">*wajib</small></label>
					<input type="text" id="hostname" name="db_host" class="form-control" placeholder="Contoh: (localhost /  127.0.0.1)">
				</div>
				<div class="form-group mb-2">
					<label for="username">DB User <small class="text-danger">*wajib</small></label>
					<input type="text" name="db_user" class="form-control" id="username" placeholder="Contoh: root">
				</div>
				<div class="form-group">
					<label for="password">DB Password <small class="text-info">*optional</small></label>
					<input type="password" name="db_pass" class="form-control" id="password" placeholder="Contoh: password_123 atau kosongkan saja(pengguna xampp)">
				</div>
				<div class="form-group">
					<div class="d-grid gap-2 mt-3">
						<button type="submit" class="btn btn-primary rounded-pill" name="soal2_process" onclick="soal2_btn()">
							<div id="loading2">
								<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
								Loading...
							</div>
							<div id="text_btn2">
								Setup Database
							</div>
							
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php endif; ?>

<?php 
if(isset($_REQUEST['soal2_process'])): 
	$soal_dua = new SoalDua('Result Soal Dua','','');
	$db = new Database;
?>
	<div class="row justify-content-center">
		<div class="col-lg-12 col-xs-12 col-sm-12">
			<?php  $soal_dua->check_request($_REQUEST) ?>

			<?php  $fetchs=$db->select_data($_REQUEST,"SELECT * FROM registrasi LIMIT 19, 100") ?>


			<article>
				<strong>2.</strong> Dalam suatu database terdapat tabel pendaftaran yang memiliki dua kolom yaitu id
				(primary key) dan tahun. Dalam tabel tersebut terdapat kesalahan data pada record
				dengan id 20 sampai dengan 100. Buatkan query untuk mengganti nilai kolom tahun
				menjadi 2016 untuk record-record tersebut :
			</article>

			<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
				<?php foreach($fetchs as $data): ?>
					<input type="hidden" name="id" value="<?=$data['id']?>">
				<?php endforeach; ?>
				<button type="submit" name="update" class="btn btn-primary rounded-pill">
					Update Data (id: 20 - 100)
				</button>
			</form>
			<small class="mt-3 text-danger">Data awal</small>
			<div class="table-responsive">
				<table class="table table-dark table-sm table-bordered">
					<thead>
						<tr>
							<th scope="col">ID Data</th>
							<th scope="col">Tahun</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($fetchs as $data): ?>
							<tr>
								<th scope="row"><?=$data['id'] ?></th>
								<td><?=$data['tahun'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
<?php endif; ?>

<?php
// Update data awal berdasarkan id dari 20 - 100
if(isset($_REQUEST['update'])):
	$this->conn = [
		'db_host' => $_SESSION['db_host'],
		'db_user' => $_SESSION['db_user'],
		'db_pass' => $_SESSION['db_pass'],
		'db_name' => $_SESSION['db_name']   
	];
	// echo '<br/>';
	// echo "<pre>";
	// 	var_dump($this->conn);
	// echo "</pre>";
	// die;
	$update_data = new Database;
	$update_data->update_data($this->conn,(int)$_REQUEST['id']);
?>

<?php if(isset($_SESSION['fetchs'])): ?>
	<div class="card">
		<strong>
			Jawaban : <br> yang saya lakukan adalah menjalankan update data dalam sebuah proses iterasi, berikut scriptnya.
		</strong>
		<code>
			public function update_data($conn,$count){
		</code>
		<code>
			$dbh = new PDO("mysql:host={$conn['db_host']};dbname={$conn['db_name']}", $conn['db_user'], $conn['db_pass']);
		</code>
		<code>
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$i=20;
		</code>
		<code>
			while($i <= $count):
		</code>
		<code>
			$sql = "UPDATE registrasi SET tahun='2016' WHERE id={$i}";
		</code>
		<code>
			$stmt = $dbh->prepare($sql);
		</code>
		<code>
			$stmt->execute();
		</code>
		<code>
			$i++;
		</code>
		<code>
			endwhile;
		</code>
		<code>
			}
		</code>

	</div>


	<small class="mt-3 mb-2 text-info">Data Baru</small>
	<div class="table-responsive">
		<table class="table table-dark table-sm table-bordered">
			<thead>
				<tr>
					<th scope="col">ID Data</th>
					<th scope="col">Tahun</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION['fetchs'] as $data): ?>
					<tr>
						<th scope="row"><?=$data['id'] ?></th>
						<td><?=$data['tahun'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

<?php endif; endif;?>

</div>


<script>
	document.querySelector('#loading2').style.display="none"
	const soal2_btn = () =>  {
		document.querySelector('#loading2').style.display="block"
		document.querySelector('#text_btn2').style.display="none"
	}
</script>

