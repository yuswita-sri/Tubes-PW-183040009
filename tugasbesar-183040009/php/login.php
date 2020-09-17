<?php 
   session_start();
   
   require 'backend/functions.php';
   
   // cek cookie
   if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
   	$id = $_COOKIE['id'];
   	$key = $_COOKIE['key'];
   
   
   	// ambil cookie berdasarkan id
   	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
   	$row = mysqli_fetch_assoc($result);
   
   
   	// cek cookie dan username
   	if ($key === hash('sha256', $row['username']) ) {
   		$_SESSION['login'] = true;
   	}
   }
   
   
   
   
   if( isset($_SESSION["login"])){
   	header("Location: backend/index.php");
   	exit;
   }
   
   
   
   if(isset($_POST["login"])) {
   
   	$username = $_POST["username"];
   	$password = $_POST["password"];
   
   
   	$result = mysqli_query($conn, "SELECT * FROM user WHERE  username = '$username'" );
   
   
   	// cek username
   	if(mysqli_num_rows($result) === 1){
   		//  cek password
   		$row = mysqli_fetch_assoc($result);
   		if (password_verify($password, $row["password"])) {
   			// set session
   			$_SESSION["login"] = true;
   
   			// cek remember me
   			if (isset($_POST['remember'])) {
   				// buat cookie
   
   				setcookie('id', $row['id'], time()+60);
   				setcookie('key', hash('sha256', $row['username']), time()+300);
   			}
   
   
   
   			header("Location: backend/index.php");
   			exit;
   		}
   	}
   
   	$error = true;
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Halaman login</title>
      <style>
         body {
         background-image: url(../img/bglogin.png);
         }
         .error {
         color: red;
         font-style: italic;
         }
         h1 {
         text-align: center;
         }
         .container {
         background-color: beige;
         border-radius: 20px;
         width: 350px;
         height: 420px;
         padding-top:20px;
         padding-left: 20px;
         margin-top: 60px; 
         margin-left: 430px;
         }
         img {
         width: 50px;
         margin-left: 140px;
         margin-top: 1px;
         }
         button{
         background-color: silver;
         margin-top: 10px;
         }
         .reg{
         margin-top: 70px;
         font-style: italic;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <img src="../img/user.png">
         <h1>Halaman Login</h1>
         <?php if(isset($error)) : ?>
         <p class="error">Username / Pasword salah</p>
         <?php endif; ?>
         <table>
            <form action="" method="post">
               <tr>
                  <td>
                     <label for="username">Username :</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="text" name="username" id="username" autofocus placeholder="Masukan username">
                  </td>
               </tr>
               <tr>
                  <td>
                     <label for="password">Password :</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="password" name="password" id="password" placeholder="Masukkan password">
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="checkbox" name="remember" id="remember">
                     <label for="remember">Remember me</label>
                  </td>
               </tr>
               <tr>
                  <td>
                     <button type="submit" name="login">Login</button>
                  </td>
               </tr>
            </form>
         </table>
         <p class="reg">Belum punya akun? <a href="registrasi.php">Daftar disini!</a></p>
      </div>
   </body>
</html>