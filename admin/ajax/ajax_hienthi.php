<?php 
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../lib/');
		
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."pclzip.php";
	include_once _lib."class.database.php";	
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	$login_name_admin = 'NINACO';
	if(!isset($_SESSION[$login_name_admin]) || $_SESSION[$login_name_admin]==false){
		die();
	}

	if(isset($_POST["id"])){

		$bang = htmlspecialchars($_POST["bang"]);
		$type = htmlspecialchars($_POST["type"]);
		$value = htmlspecialchars($_POST["value"]);
		$id = htmlspecialchars($_POST["id"]);

		$d->reset();
		$data[$type] = $value;
		$d->setTable($bang);
		$d->setWhere('id', $id);
		$d->update($data);
    }
?>