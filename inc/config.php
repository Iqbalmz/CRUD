<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'db_siswa';
	$connect = mysqli_connect($host, $user, $pass) or die('Gagal Connect');
	$select_db  = mysqli_select_db($connect, $db) or die('Database tidak ada');
?>