<?php
	session_start();
	@define ( '_lib' , '../../libraries/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	include_once _lib."pclzip.php";
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";	
	$d = new database($config['database']);

	$table = (string)$_POST['table'];
	$id = (int)$_POST['id'];
	$value = (string)$_POST['value'];

	$data['stt'] = $value;
	$d->setTable($table);
	$d->setWhere('id', $id);
	$d->update($data);


?>
	
	