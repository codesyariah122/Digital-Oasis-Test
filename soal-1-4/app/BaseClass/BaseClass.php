<?php
// Teknikal Test Diigital Ocean 2022
// File: app/BaseClass
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/
namespace app\BaseClass;

class BaseClass {
	protected 
			$name, 
			$value, 
			$title, 
			$block, 
			$dir, 
			$file, 
			$param, 
			$request,
			$db_host, 
			$db_user, 
			$db_pass, 
			$db_name,
			$rows,
			$alert,
			$conn;

	public function __construct(string $title='', string $name='', $value='', $request=[])
	{
		$this->name = $name;
		$this->value = $value;
		$this->title = $title;
		$this->request = $request;
	}

	public function start_session($name,$value)
	{
		$this->name = $name;
		$this->value = $value;
		// echo $this->name;  die;
		$_SESSION[$this->name] = $this->value;
	}

	public function title()
	{
		return $this->title;
	}

	public function paragraph(string $block='')
	{
		$this->block = $block;
		return $this->block;
	}

	public function components($dir, $file)
	{
		$this->dir = $dir;
		$this->file = $file;
		array_map(function($payload){
			echo '<div class="col-md-3">';
				// load file component
				require_once $this->dir.'/'.$payload.'.php';
			echo '</div>';
		}, $this->file);
	}

	public function my_profile($dir,$file)
	{
		$this->dir = $dir;
		$this->file = $file;
		$i = 0;
		do {
			require_once $this->dir.'/'.$this->file[$i].'.php';
			$i+=1;
		}while($i < count($this->file));
	}

}