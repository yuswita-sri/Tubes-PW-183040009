<?php 
   require 'backend/functions.php';
   
   if(isset($_POST["register"])) {
   
   	if(registrasi($_POST) > 0 ) {
   		echo "<script>
   				alert('Registrasi berhasil!');
   			</script>";
   	} else {
   		echo mysqli_error($conn);
   	}
   }
   
   
   
    ?>
<!DOCTYPE html>
<html>
   <head>
      <title>halaman registrasi</title>
      <style>
         body {
         background-image: url(../img/daftar.jpg);
         }
         .container {
         border-radius: 20px;
         width: 380px;
         height: 380px;
         background-color: beige;
         margin-top: 90px;
         margin-left: 440px;
         }
         h1 {
         padding-top: 20px;
         text-align: center;
         }
         tr td {
         padding-left: 10px;
         }
         button {
         background-color: silver;
         margin-top: 10px;
         }
      </style>
   </head>
   <body>
      <button><a href="login.php">Kembali</a></button>
      <div class="container">
         <table>
            <h1>Halaman Registrasi</h1>
            <form action="" method="post">
               <tr>
                  <td>
                     <label for="username">Username :</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="text" name="username" id="username" autofocus required>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="password">Password :</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="password" name="password" id="password" required>
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="password2">Konfirmasi password :</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="password2" name="password2" id="password2" autocomplete="off" required>
                  </td>
               </tr>
               <tr>
                  <td>
                     <button type="submit" name="register">Registrasi</button>
                  </td>
               </tr>
            </form>
         </table>
      </div>
   </body>
</html>