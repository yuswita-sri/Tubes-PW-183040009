<?php  
session_start();

if(!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan apa belum
if(isset($_POST["submit"])) {


 
	// cek apakah data berhasil ditambahkan atau tidak
	if(tambah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('Data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
			";
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<style>
		body {
				background-image: url(../../img/bg3.jpg);		
		}

		button {
			margin-top: 15px;
			background-color: aliceblue;
			box-shadow: ;
			border-radius: 5px;
		}
		.container {
			background-color: beige;
			height: 370px;
			width: 500px;
			margin-top: 100px;
			margin-left: 380px;
		}
		h1 {
			text-align: center;
			padding-top: 20px;
		}
		tr td {
			padding-left: 10px;
		}

	</style>
</head>
<body>
	<button><a href="index.php">Kembali</a></button>
	
	<div class="container">
	<h1>Tambah Data Smartphone</h1>
		<table>
		<form action="" method="post" enctype="multipart/form-data">
			<tr>
				<td>
					<label for="tipe">Nama Smartphone</label>
				</td>
				<td> : </td>
				<td>
					<input type="text" name="tipe" id="tipe" autofocus autocomplete="off" required>
				</td>
			</tr>
			<tr>
				<td><label for="tahunrilis">Tahun Rilis</label></td>
				<td> : </td>
				<td><input type="text" name="tahunrilis" id="tahunrilis" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="chipset">Chipset</label></td>
				<td> : </td>
				<td><input type="text" name="chipset" id="chipset" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="rammemori">Ram dan Memori</label></td>
				<td> : </td>
				<td><input type="text" name="rammemori" id="rammemori" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="kamera">Kamera</label></td>
				<td> : </td>
				<td><input type="text" name="kamera" id="kamera" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="baterai">Baterai</label></td>
				<td> : </td>
				<td><input type="text" name="baterai" id="baterai" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="harga">Harga</label></td>
				<td> : </td>
				<td><input type="text" name="harga" id="harga" autocomplete="off" ></td>
			</tr>
			<tr>
				<td><label for="photo">Gambar</label></td>
				<td> : </td>
				<td><input type="file" name="photo" id="photo"  ></td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="submit">Tambah Data</button>
				</td>
			</tr>
		</form>
	</table>
	</div>
	

</body>
</html>
