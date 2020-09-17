<?php 
   session_start();
   
   if(!isset($_SESSION["login"])) {
   	header("Location: ../login.php");
   	exit; 
   }
   
   require 'functions.php';
   
   // ambil data di URL
   $id = $_GET["id"];
   
   // query data smartphone berdasarkan id
   $a = query("SELECT * FROM honor WHERE id = $id")[0];
   
   // cek apakah tombol submit sudah ditekan apa belum
   if(isset($_POST["submit"])) {
   
   	// cek apakah data berhasil diubah atau tidak
   	if(ubah($_POST) > 0) {
   		echo "
   			<script>
   				alert('Data berhasil diubah!');
   				document.location.href = 'index.php';
   			</script>
   			";
   	} else {
   		echo "
   			<script>
   				alert('Data gagal diubah!');
   				document.location.href = 'index.php';
   			</script>
   			";
   	}
   }
   
   
    ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Ubah Data</title>
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
         <h1>Ubah Data Smartphone</h1>
         <table>
            <form action="" method="post">
               <input type="hidden" name="id" value="<?= $a['id']; ?>">
               <tr>
                  <td>
                     <label for="tipe">Nama Smartphone</label>
                  </td>
                  <td> : </td>
                  <td>
                     <input type="text" name="tipe" id="tipe" autofocus autocomplete="off" size="30px"  value="<?= $a['tipe']; ?>">
                  </td>
               </tr>
               <tr>
                  <td><label for="tahunrilis">Tahun Rilis</label></td>
                  <td> : </td>
                  <td><input type="text" name="tahunrilis" id="tahunrilis" autocomplete="off" size="30px"  value="<?= $a['tahunrilis']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="chipset">Chipset</label></td>
                  <td> : </td>
                  <td><input type="text" name="chipset" id="chipset" autocomplete="off" size="30px"  value="<?= $a['chipset']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="rammemori">Ram dan Memori</label></td>
                  <td> : </td>
                  <td><input type="text" name="rammemori" id="rammemori" autocomplete="off" size="30px"  value="<?= $a['rammemori']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="kamera">Kamera</label></td>
                  <td> : </td>
                  <td><input type="text" name="kamera" id="kamera" autocomplete="off" size="30px"  value="<?= $a['kamera']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="baterai">Baterai</label></td>
                  <td> : </td>
                  <td><input type="text" name="baterai" id="baterai" autocomplete="off" size="30px"  value="<?= $a['baterai']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="harga">Harga</label></td>
                  <td> : </td>
                  <td><input type="text" name="harga" id="harga" autocomplete="off" size="30px"  value="<?= $a['harga']; ?>"></td>
               </tr>
               <tr>
                  <td><label for="photo">Gambar</label></td>
                  <td> : </td>
                  <td><input type="text" name="photo" id="photo" autocomplete="off" size="30px"  value="<?= $a['photo']; ?>"></td>
               </tr>
               <tr>
                  <td>
                     <button type="submit" name="submit">Ubah Data</button>
                  </td>
               </tr>
            </form>
         </table>
      </div>
   </body>
</html>