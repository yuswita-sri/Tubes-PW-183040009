<?php 
   if(!isset($_GET['id'])){
       header("Location: ../index.php");
       exit;
   }
   require 'backend/functions.php';
   $id=$_GET['id'];
   $a = query("SELECT * FROM honor WHERE id=$id")[0];
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
   </head>
   <style>
      body {
      background-image: url(../img/daftar.jpg);
      }
      table {
      margin-left: 50px;
      border : 1px solid black;
      font-size : 20px;
      }
      th{
      background-color: beige;
      }
      td{
      background-color: gainsboro;
      padding : 15px;
      }
      h3{
      text-align : center;
      font-size : 30px;
      }
      button {
      border-radius: 5px;
      background-color: silver;
      }
      .tipe, .th, .ha {
      text-align: center;
      }
      ul {
      list-style: none;
      }
   </style>
   <body>
      <form method="post">
         <button><a href="../index.php">Kembali</a></button>
      </form>
      <div class="container">
      <h3>Honor</h3>
      <table border="1px" cellspacing="0" cellpadding="15">
         <tr>
            <th>Foto</th>
            <th>Tipe</th>
            <th>Tahun Rilis</th>
            <th>Spesifikasi</th>
            <th>Harga</th>
         </tr>
         <tr>
            <td><img src="../img/<?= $a['photo']; ?>"></td>
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
         </tr>
      </table>
   </body>
</html>