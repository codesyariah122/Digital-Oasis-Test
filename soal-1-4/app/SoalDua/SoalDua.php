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
			require_once $this->dir.$this->alert[0].'.php';
		else:
			require_once $this->dir.$this->alert[1].'.php';
			$this->create_db($request);
		endif;
	}

	public function create_db($request)
	{
		$setupdb = new Methods;
		$setupdb->setup_database($request);
	}

}
