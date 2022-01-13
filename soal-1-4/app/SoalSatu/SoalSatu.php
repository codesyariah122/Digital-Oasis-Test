<?php
// Teknikal Test Diigital Ocean 2022
// File: app/SoalSatu
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

namespace app\SoalSatu;
use \app\BaseClass\BaseClass;
use \app\Methods\Methods;

class SoalSatu extends BaseClass {

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
		$soal1_session = new BaseClass;
		$this->dir = $dir;
		$this->file = $file;
		$this->request = $request;
		$soal1_session->start_session($this->name,$this->value);
		$method->setup_process($this->request, $this->value, $this->dir, $this->file);
	}

	public function trap_process($request)
	{
		$method = new Methods;
		$this->request = $request;
		$method->result_process($this->request);
	}
}
