<?php
// Teknikal Test Diigital Ocean 2022
// File: app/Database
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/
// Note : create database first
namespace app\Database;
use \app\BaseClass\BaseClass;
use \PDO;


class Database extends BaseClass {
	
	public function __construct()
	{
		parent::__construct();
		$this->rows=[];
		$this->db_host;
		$this->db_user;
		$this->db_pass;
		$this->db_name;
	}


	public function create_db($value=[])
	{
		if(!empty($value['db_host']) or !empty($value['db_user']) or !empty($value['db_name'])):
			// setup property untuk database dari parent class property
			$this->db_host = $value['db_host'];
			$this->db_user = $value['db_user'];
			$this->db_pass = $value['db_pass'];
			$this->db_name = $value['db_name'];

			try {
				$conn = new PDO("mysql:host={$this->db_host}", $this->db_user, $this->db_pass);
	  			// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "CREATE DATABASE IF NOT EXISTS {$this->db_name}";
	  			// use exec() because no results are returned
				$conn->exec($sql);
				echo '
					<div class="alert alert-success d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
					<div>
						Database '.$this->db_name.' successfully created, check your database application.
					</div>
					</div>
				';
			} catch(PDOException $e) {
				echo $sql . "<br>" . $e->getMessage();
			}

		endif;
	}

	public function create_tb($tb_name)
	{
		try {
			$conn = $this->connect_db();
		  	// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  	// sql to create table
			$sql = "CREATE TABLE IF NOT EXISTS {$tb_name} (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				tahun VARCHAR(30) NOT NULL
			)";

		  	// use exec() because no results are returned
			$conn->exec($sql);
			echo '
				<div class="alert alert-info d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				<div>
					Table '.$tb_name.' created successfully.
				</div>
				</div>
			';


		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

	}

	public function insert_tb($tb_name, int $jml)
	{
		try {
			// activate database connection
			$dbh = $this->connect_db();
			// var_dump($dbh);die;
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$fetch = $dbh->prepare("SELECT * FROM {$tb_name}");
			$fetch->execute();
			$results = $fetch->fetchAll(PDO::FETCH_OBJ);
			// echo count($results);  die;
			if(count($results) < 100){
				// var_dump($dbh);  die;
				$data['tahun'] = date('Y');
				$insert = $dbh->prepare("INSERT INTO `$tb_name` (tahun) VALUES (:tahun)");

				$insert->bindParam(':tahun',$data['tahun']);

				for($i=1;$i<=$jml;$i++):
					$insert->execute();
				endfor;

				echo '
				<div class="alert alert-secondary d-flex align-items-center" role="alert">
				<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
				<div>
				New record created successfully.
				</div>
				</div>
				';
			}
			
		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}

	}

	public function select_data($request,$query)
	{		
		try{
			$dbh = new PDO("mysql:host={$request['db_host']};dbname={$request['db_name']}", $request['db_user'], $request['db_pass']);
			// var_dump($dbh); die;
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = $dbh->query($query);
			while($row = $sql->fetch(PDO::FETCH_ASSOC)):
				$this->rows[] = $row;
			endwhile;
			$this->conn = $dbh;
			return $this->rows;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function update_data($conn,$count)
	{
		try {
			$dbh = new PDO("mysql:host={$conn['db_host']};dbname={$conn['db_name']}", $conn['db_user'], $conn['db_pass']);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$i=20;
			while($i <= $count):
				$sql = "UPDATE registrasi SET tahun='2016' WHERE id={$i}";

				$stmt = $dbh->prepare($sql);

				$stmt->execute();
				$i++;
			endwhile;

			$this->alert = ['error', 'success'];
			$this->dir = 'components/alerts/';
			require_once $this->dir.$this->alert[1].'.php';
			echo "
				<div class='alert alert-secondary d-flex align-items-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
				<div>
					{$stmt->rowCount()} records UPDATED successfully.
				</div>
				</div>
			";
			$fetch_session = new BaseClass;
			$query = "SELECT * FROM registrasi LIMIT 19, 100";
			$updates = $this->select_data($conn, $query);
			$fetch_session->start_session('fetchs', $updates);

		} catch(PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
		
	}

	public function connect_db()
	{
		// echo  $this->db_host.  ' ' .  $this->db_user.'-'.$this->db_pass. ' '. $this->db_name;
		// echo  "<br/><br/>";
		try {
			$conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}", $this->db_user, $this->db_pass);
	  			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $conn;

		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}

}