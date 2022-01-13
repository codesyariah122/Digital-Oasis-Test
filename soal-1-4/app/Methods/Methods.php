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
		return $data;
	}
}
