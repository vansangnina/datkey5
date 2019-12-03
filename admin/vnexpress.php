<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	$noidung = htmlspecialchars($_POST['noidung']);
	$ten= htmlspecialchars($_POST['tieude']);
	$ngaytao = (int)$_POST['ngaydang'];
	$mota = htmlspecialchars($_POST['mota']);
	$hienthi = 1;

	$sql = "INSERT INTO  table_vnexpress (noidung,ten,ngaytao,mota,hienthi) VALUES ('$noidung','$ten','$ngaytao','$mota','$hienthi')";
	mysql_query($sql);
	
?>