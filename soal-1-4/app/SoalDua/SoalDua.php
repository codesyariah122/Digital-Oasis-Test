<?php
// Teknikal Test Digital Oasis 2022
// File: app/SoalSatu
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

namespace app\SoalDua;
use \app\BaseClass\BaseClass;
use \app\Methods\Methods;

class SoalDua extends BaseClass {

	public function __construct($title, $name, $value)
	{
		parent::__construct();
		$this->title = $title;
		$this->name = $name;
		$this->value = $value;
		$db_session = new BaseClass;
		$db_session->start_session($this->name, $this->value);
	}

	public function second_component($request, $dir, $file)
	{
		$method = new Methods;
		$soal2_session = new BaseClass;
		$this->dir = $dir;
		$this->file = $file;
		$this->request = $request;
		$soal2_session->start_session($this->name,$this->value);
		$method->setup_process($this->request, $this->value, $this->dir, $this->file);
	}

	public function check_request($request)
	{
		$this->alert = ['error', 'success'];
		$this->dir = 'components/alerts/';
		// echo "<pre>";
		// echo $this->dir;
		// var_dump($request);
		// echo "</pre>";
		// die;
		$db_session = new BaseClass;
		$db_session->start_session('db_host', $request['db_host']);
		$db_session->start_session('db_user', $request['db_user']);
		$db_session->start_session('db_pass', $request['db_pass']);
		$db_session->start_session('db_name', $request['db_name']);
		
		if(empty($request['db_host']) or empty($request['db_user']) or empty($request['db_name'])):
			$alert = new BaseClass;
			$alert->start_session('url', 'http://localhost:8888/?soal2_start=soal2');
			$alert->alert([
				'dir'=>  $this->dir,
				'file' => $this->alert[0]
			]);
		else:
			// require_once $this->dir.$this->alert[1].'.php';
			$alert = new BaseClass;
			$alert->start_session('url', 'http://localhost:8888/?soal2_start=soal2');
			$alert->alert([
				'dir'=>  $this->dir,
				'file' => $this->alert[1]
			]);
			$this->create_db($request);
		endif;
	}

	public function create_db($request)
	{
		$setupdb = new Methods;
		$setupdb->setup_database($request);
	}

}
