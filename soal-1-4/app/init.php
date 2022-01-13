<?php
// Teknikal Test Diigital Ocean 2022
// File: app/init.php
/*
created by :
	nama : Puji Ermanto
	email : pujiermanto@gmail.com
	no telp : 0882 2266 8778
	github username : codesyariah122
*/

// Automatic load file based on class name
spl_autoload_register(function($class) {
	// var_dump($class); 
	// die;
	$class = explode('\\', $class);
	
	$class = end($class);

	// Debuging disini
	// echo "<pre>";
	// var_dump($class);
	// echo "</pre>";
	// die;

	require_once $class.'/'.$class.'.php';
});



