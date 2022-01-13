<?php
// Teknikal Test Digital Oasis 2022
// File: app/Methods
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

namespace app\Methods;
use \app\BaseClass\BaseClass;
use \app\Database\Database;

class Methods extends BaseClass {


	public function setup_process($req, $value, $dir, $file)
	{
		
		$check = $req[$value] ?? '';
		// echo "<pre>";
		// var_dump($req);
		// echo "</pre>";
		switch ($check) {
			case 'soal1':
			require_once $dir.$file.'.php';
			break;
			case 'soal2':
			require_once $dir.$file.'.php';
			case 'soal3':
			require_once $dir.$file.'.php';
			default:
				# code...
			break;
		}
		
	}

	// automatic setup
	public function setup_database($req)
	{
		// echo "<pre>";
		// var_dump($req); 
		// echo "</pre>";
		// die;
		$new_db = new Database;
		// Create database first
		$new_db->create_db($req);
		// Create table on this database
		$new_db->create_tb('registrasi');
		// Insert new table
		$new_db->insert_tb('registrasi', 100);
	}



	public function result_process($data)
	{
		$jml = (int)$data['jml'];

		echo "<form action='http://localhost:8888/index.php?soal1_start=soal1' method='POST' class='mt-3'>";
		for($i=1; $i<=$jml; $i++):
			echo "
				<div class='form-group'>
					<label for='bil{$i}'>Input {$i}</label>
					<input type='number' name='bil{$i}' min='1' max='15' class='form-control'>
				</div>
			";
		endfor;
		echo "
			<div class='form-group'>
				<div class='d-grid gap-2 mt-3'>
					<button type='submit' name='loops' class='btn btn-primary'>Process</button>
					</button>
				</div>
			</div>
		</form>
		";
	}
}
