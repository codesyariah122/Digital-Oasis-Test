<?php
// Teknikal Test Digital Oasis 2022
// File: app/SoalEmpat
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

namespace app\SoalEmpat;
use \app\BaseClass\BaseClass;
use \app\Methods\Methods;

class SoalEmpat extends BaseClass {
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

	public function format_bilangan($bil)
	{
		echo "<strong>Bilangan Character : {$bil}</strong>";
		$arr = explode('.',$bil);
		$new_bill = implode($arr);
		$bil = str_split($new_bill);
		// echo "<pre>";
		// echo count($arr);
		// echo "</pre/>";

		// echo "<pre>";
		// var_dump($bil);
		// echo "</pre/>";
		echo "<br/>";
		for($i=0;$i <= count($bil)-1; $i++){
			echo $bil[$i];
			for($j=count($bil)-1; $j > $i; $j--){
				echo 0;
			}

			echo '<br/>';
		}
	}
}