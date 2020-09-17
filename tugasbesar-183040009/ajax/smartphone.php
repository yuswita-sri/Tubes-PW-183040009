<?php 

require '../php/backend/functions.php';


$keyword = $_GET["keyword"];



$query = "SELECT * FROM honor
			WHERE
		tipe LIKE '%$keyword%' OR 
		tahunrilis LIKE '%$keyword%' OR 
		chipset LIKE '%$keyword%' OR
		rammemori LIKE '%$keyword%' OR 
		kamera LIKE '%$keyword%' OR 
		baterai LIKE '%$keyword%' OR
		harga LIKE '%$keyword%' 
		";
$honor = query($query);



 ?>

 <table border="1" cellpadding="10" cellspacing="0">
		 
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama Smartphone</th>
			<th>Tahun Rilis</th>
			<th>Spesifikasi</th>
			<th>Harga</th>
			<th>Opsi</th>
		</tr>

		<?php if(empty($honor)) : ?>
			<tr>
				<td colspan="10"> <p style="text-align: center;">Data tidak ditemukan</p></td>
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
			<td>
				<button class="ubah"><a href="ubah.php?id=<?= $a['id']; ?>">Ubah</a></button>
				<button class="hapus"><a href="hapus.php?id=<?= $a['id']; ?>" onclick="return confirm('Apakah anda yakin ingin mengapus data ini?');">Hapus</a></button>
			</td>
		</tr>
		<?php $i++; ?>
	<?php endforeach; ?>
	</table>