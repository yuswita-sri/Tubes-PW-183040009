<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "tugasbesar");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}
 

function tambah($data){
	global $conn;

	$tipe = htmlspecialchars($data["tipe"]);
	$tahunrilis = htmlspecialchars($data["tahunrilis"]);
	$chipset = htmlspecialchars($data["chipset"]);
	$rammemori = htmlspecialchars($data["rammemori"]);
	$kamera = htmlspecialchars($data["kamera"]);
	$baterai = htmlspecialchars($data["baterai"]);
	$harga = htmlspecialchars($data["harga"]);	

	// upload gambar
	$photo = upload();
	if(!$photo) {
		return false;
	}


	$query = "INSERT INTO honor
				VALUES
				('', '$photo', '$tipe', '$tahunrilis', '$chipset', '$rammemori', '$kamera', '$baterai', '$harga')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['photo']['name'];
	$ukuranFile = $_FILES['photo']['size'];
	$error = $_FILES['photo']['error'];
	$tmpName = $_FILES['photo']['tmp_name'];



	if($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu');	
			</script>";
		return false;
	}


	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower (end ($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar');	
			</script>";
		return false;
	}


	// jika ukuran terlalu besar
	if( $ukuranFile > 1000000){
		echo "<script>
				alert('ukuran gambar terlalu besar');	
			</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../../img/' . $namaFileBaru);

	return $namaFileBaru;
	
} 


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM honor WHERE id = $id ");

	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$photo = htmlspecialchars($data["photo"]);
	$tipe = htmlspecialchars($data["tipe"]);
	$tahunrilis = htmlspecialchars($data["tahunrilis"]);
	$chipset = htmlspecialchars($data["chipset"]);
	$rammemori = htmlspecialchars($data["rammemori"]);
	$kamera = htmlspecialchars($data["kamera"]);
	$baterai = htmlspecialchars($data["baterai"]);
	$harga = htmlspecialchars($data["harga"]);

	$query = "UPDATE honor SET 
				photo = '$photo',
				tipe = '$tipe',
				tahunrilis = '$tahunrilis',
				chipset = '$chipset',
				rammemori = '$rammemori',
				kamera = '$kamera',
				baterai = '$baterai',
				harga = '$harga'
			WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
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
	return query($query);
}


function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");


	if(mysqli_fetch_assoc($result)){
		echo "<script>
				alert('Username sudah terdaftar! Silahkan ketikan username baru');
			</script>";

		return false;
	}




	// cek konfirmasi password
	if($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";

		return false;
	}


	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");


	return mysqli_affected_rows($conn);







}



 ?>