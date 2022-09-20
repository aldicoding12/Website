<?php 
session_start();
  if ( !isset( $_SESSION["login"]) ) {
    echo header("Location:../login.php");
  }
  require "../function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asist/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Adminstrator</title>
</head>
<body class="bg-light" >
    <!-- navbar -->
    <div class="navbar">
      <div class="container">
        <h2 class="nav-brand float"> <a href="index.php">Acoding</a> </h2>
          <ul class="nav-menu float">
            <li> <a href="index.php">Dashboard</a> </li>
            <li><?php if ( $_SESSION["level"]  == 'Super Admin'  ) {  ?></i></li>
            <li> <a href="pengguna.php">Pengguna</a> </li>
            <?php } elseif ( $_SESSION["level"] == 'Admin' ) { ?>
            <li> <a href="jurusan.php">Jurusan</a> </li>
            <li> <a href="galeri.php">Galeri</a> </li>
            <li> <a href="informasi.php">Informasi</a> </li>
            <li>
               <a href="">Pengaturan</a> 
                <ul class="dropdown">
                  <li> <a href="">Identitas Sekolah</a> </li>
                  <li> <a href="">Tentang sekolah Sekolah</a> </li>
                  <li> <a href="">Kepala Sekolah</a> </li>
                </ul>
              </li>
              <?php } ?>
              <li> <a href=""><?= $_SESSION["nama"]; ?>(<?= $_SESSION["level"]; ?><i class="fa-sharp fa-solid fa-chevron-down rotate"></i></a> 
              <ul class="dropdown">
                <li> <a href="ubah-password-pengguna.php">Ubah Password</a> </li>
                <li> <a href="keluar.php">Keluar</a> </li>
              </ul>
            </li>
          </ul>
          <div class="clear"></div>
      </div>
    </div>