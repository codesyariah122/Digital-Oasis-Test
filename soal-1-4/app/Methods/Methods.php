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
			break;
			case 'soal3':
			require_once $dir.$file.'.php';
			break;
			case 'soal4':
			require_once $dir.$file.'.php';
			break;
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

		echo "<form action='http://localhost:8888/?soal1_start=soal1' method='POST' class='mt-3'>";
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

	public function check_anagram($req)
	{
		// string pertama
		$string_1=$req['string1'];
		$shuffle1=str_shuffle($string_1);

		// string ke dua
		$string_2=$req['string2'];
		$shuffle2=str_shuffle($string_2);

		$result1 = count_chars($string_1, 1) == count_chars($shuffle1) ? 'true' : 'false' ;

		$result2 = count_chars($string_2, 1) == count_chars($shuffle2) ? 'true' : 'false' ;

		echo "
			<div class='table-responsive'>
				<table class='table table-dark table-sm table-bordered'>
					<thead>
						<tr>
							<th scope='col'>Input: {$string_1}  {$shuffle1}</th>
							<th scope='col'>Input: {$string_2}  {$shuffle2}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Output : <b>{$result1}</b></td>
							<td>Output : <b>{$result2}</b></td>
						</tr>
					</tbody>
				</table>
			</div>
		";


	}
}
