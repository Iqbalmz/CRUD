<?php 
include('inc/config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<body>
	<h1 align="center">Data Siswa</h1>
	<a href="?act=Tambah">
	<button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;"> Tambah data </button>
	</a>
	<table border="1" style="width: 100%; border-collapse: collapse;">
		<tr>
			<th style="width: 25px; color: white; background-color: black">#</th>
			<th style="color: white; background-color: black">Foto</th>
			<th style="width: 250px; color: white; background-color: black">Nama</th>
			<th style="width: 180px; color: white; background-color: black">Telepon</th>
			<th style="width: 100px; color: white; background-color: black">Jenis Kelamin</th>
			<th style="width: 250px; color: white; background-color: black">Email</th>
			<th style="width: 100px; ; color: white; background-color: black">Aksi</th>
		</tr>
	</table>
</body>
</html>
