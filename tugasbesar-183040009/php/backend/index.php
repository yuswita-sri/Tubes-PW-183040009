<?php 
session_start();

if(!isset($_SESSION["login"])) {
	header("Location: ../login.php");
	exit; 
}

require 'functions.php';

$honor = query("SELECT * FROM honor");


// tombol cari ditekan
if(isset($_POST["cari"])) {
	$honor = cari($_POST["keyword"]);
}
 

?>


<!DOCTYPE html> 
<html>
<head>
	<title></title>
	<style>
		body {
			background-image: url(img/coolHue-FFF3B0-CA26FF.png);
		}
		button {
			background-color: aliceblue;
			margin-bottom: 20px;
			border-radius: 5px;
		}
		.ubah {
			background-color: lightskyblue;
			border-radius: 5px;
		}
		.hapus {
			background-color: lightcoral;
			border-radius: 5px;
		}
		h1 {
			text-align: center;
		}
		th {
			background-color: #C0B283;
		}
		td {
			background-color: ;
		}
		.logout {
			margin-left: 1150px;
		}
		.containerr {
			margin-top: 10px;
		}
		.no, .tipe, .th, .ha {
			text-align: center;
		}
		ul {
			list-style: none;
		}
		input {
			margin-bottom: 20px;
		}
		@media print {
			.logout, .tambah, .cari, .opsi {
				display: none;
			}
		}

	</style>
</head>
<body>

	
<div class="containerr">
	<h1>Honor</h1>

	<button class="tambah"><a href="tambah.php">Tambah Data Smartphone</a></button>
	<button class="logout"><a href="../logout.php">Logout</a></button>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="30" placeholder="Cari" autofocus autocomplete="off" id="keyword" class="cari">
		

	</form>

	<div id="container">

	<table border="1" cellpadding="10" cellspacing="0">
		 
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama Smartphone</th>
			<th>Tahun Rilis</th>
			<th>Spesifikasi</th>
			<th>Harga</th>
			<th class="opsi">Opsi</th>
		</tr>

		<?php if(empty($honor)) : ?>
			<tr>
				<td colspan="10"> Data tidak ditemukan</td>
			</tr>

			<button><a href="index.php">Kembali</a></button>


		<?php endif; ?>
		<?php $i = 1; ?>
		<?php foreach ($honor as $a) : ?>
		<tr>
			<td class="no"><?php echo $i; ?></td>
			<td><img src="../../img/<?= $a['photo']; ?>" width="120"></td>
			<td class="tipe"><?= $a['tipe']; ?></td>
			<td class="th"><?= $a['tahunrilis']; ?></td>
			<td>
				
				<ul>
					<li>Chipset : <?= $a['chipset']; ?></li>
					<li>Ram & Memori : <?= $a['chipset']; ?></li>
					<li>Kamera : <?= $a['kamera']; ?></li>
					<li>Baterai : <?= $a['baterai']; ?></li>
				</ul>
				
			</td>
			<td class="ha"><?= $a['harga']; ?></td>
			<td class="opsi">
				<button class="ubah"><a href="ubah.php?id=<?= $a['id']; ?>">Ubah</a></button>
				<button class="hapus"><a href="hapus.php?id=<?= $a['id']; ?>" onclick="return confirm('Apakah anda yakin ingin mengapus data ini?');">Hapus</a></button>
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>
	</div>
</div>

<script src="../../js/script.js"></script>
</body>
</html>













