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
	<?php if(isset($_GET['act'])AND $_GET['act']=='tambah'){
				
				echo "
						<h3>Tambah Data</h3>
						<form name='tambah' action='?act=proses_tambah' method='post' enctype='multipart/form-data'>
						<p><input type='text' name='nama_siswa' placeholder='nama siswa' required></p>
						<p><input type='number' name='telepon' placeholder='telepon' required></p>
						<p><input type='text' name='jenis_kelamin' placeholder='jenis kelamin' required></p>
						<p><input type='email' name='email' placeholder='email' required></p>
						<p><input type='file' name='gambar'></p>
						<p><input type='submit' name='proses' value='Simpan' style = 'background-color: #008CBA;  border: none;
  						color: white;
  						padding: 15px 32px;
  						text-align: center;
  						text-decoration: none;
  						display: inline-block;
  						font-size: 16px;'></p>
					";
				}elseif (isset($_GET['act'])AND $_GET['act']=='proses_tambah') {
					if($_FILES['gambar']['error'] !=0){
					$tambah = mysqli_query($connect, "INSERT into siswa (Nama, Tlpn, Jeniskelamin, Email)
							values ('$_POST[nama_siswa]','$_POST[telepon]', '$_POST[jenis_kelamin]','$_POST[email]')");
					}else{
						$tmp_file = $_FILES['gambar']['tmp_name'];
						$filename = $_FILES['gambar']['name'];
						$filetype = $_FILES['gambar']['type'];
						$filesize = $_FILES['gambar']['size'];
						$destination = 'uploads/'.$filename;

						if(move_uploaded_file($tmp_file, $destination)){
							$gambar = $filename;
						}
						$tambah =  mysqli_query($connect, "INSERT into siswa (Nama, Tlpn, Jeniskelamin, Email, Foto)
							values ('$_POST[nama_siswa]','$_POST[telepon]', '$_POST[jenis_kelamin]','$_POST[email]', '$gambar')");
					}
					if($tambah){
						echo "Data berhasil ditambahkan";
					}else{
						echo "Data gagal ditambahkan";
					}
					echo "<hr>";
				
				}
	?>
	<a href="?act=tambah">
	<button type="button" style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;margin-bottom: 20px"> Tambah data </button>
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
		<?php $query = mysqli_query($connect, "SELECT * FROM siswa");
		$i = 0;
				if(mysqli_num_rows($query)>0){
					while($data = mysqli_fetch_array($query)){ $i++;?>
						<tr>
							<td><?php echo $i?></td>
							<td><img src="uploads/<?php echo $data['Foto']?>" width="200px"></td>
							<td><?php echo $data['Nama']?></td>
							<td><?php echo $data['Tlpn']?></td>
							<td><?php echo $data['Jeniskelamin']?></td>
							<td><?php echo $data['Email']?></td>
							<td><a href="?act=edit&id=<?php echo $data['id_siswa']; ?>"><button type="button" style="background-color: #FFFF00; /* Green */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;font-size: 10px;"> Edit </button></a><br>
  <a href="?act=hapus&id=<?php echo $data['id_siswa']; ?>" OnClick=\"return confirm('Anda yakin ingin menghapus data ?');\")>
<button type="button" style="background-color: tomato; /* Green */
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;font-size: 10px;"> Hapus </button></td>
						</tr>
					<?php }?>
				<?php }else{?>
					<tr>
						<td colspan="7">Tidak ada data</td>
					</tr>
				<?php }?>
	</table>
</body>
</html>
