<?php
// Teknikal Test Digital Oasis 2022
// File: app/SoalTiga
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

namespace app\SoalTiga;
use \app\BaseClass\BaseClass;
use \app\Methods\Methods;

class SoalTiga extends BaseClass {
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
		$soal3_session = new BaseClass;
		$this->dir = $dir;
		$this->file = $file;
		$this->request = $request;
		$soal3_session->start_session($this->name,$this->value);
		$method->setup_process($this->request, $this->value, $this->dir, $this->file);
	}

	public function trap_process($request)
	{
		$this->alert = ['error', 'success'];
		$this->dir = 'components/alerts/';
		if(empty($request['string1']) || empty($request['string2'])):
			$alert = new BaseClass;
			$alert->start_session('url', 'http://localhost:8888/?soal3_start=soal3');
			$alert->alert([
				'dir'=>  $this->dir,
				'file' => $this->alert[0]
			]);
		else:
			// require_once $this->dir.$this->alert[1].'.php';
			$alert = new BaseClass;
			$alert->start_session('url', 'http://localhost:8888/?soal3_start=soal3');
			$alert->alert([
				'dir'=>  $this->dir,
				'file' => $this->alert[1]
			]);
			$method = new Methods;
			$method->check_anagram($request);
		endif;
	}
}