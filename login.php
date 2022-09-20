
<?php 
session_start();
require "function.php";
if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
      $_SESSION["nama"] = $row["nama"]; 
      $_SESSION["level"] = $row["level"];
      $_SESSION["uid"] = $row["id"];


        header("Location:admin/index.php");
      exit;
    }
  }
  $eror = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="asist/css/style.css">
  <title>Document</title>
</head>
<body>
  <!-- home [page] -->
  <div class="home-page">
    <!-- box -->
    <div class="box">
      <!-- .box-header -->
      <div class="box-header text-center">
        Login
      </div>
      <!-- box-login -->
      <div class="box-body">
       <div class="form-group">
       <form action="" method="POST">
       <img src="img/login.png.png" class="imglogin">
          <label for="username" >
            Username
            <input type="text" name="username" id="username" placeholder="Username" autofocus="of" class="input-control">
          </label>
          <label for="password">
            Password
            <input type="password" name="password" id="password" placeholder="password" autofocus="of" class="input-control">
          </label>
          <input type="submit" name="login" value="Login" class="btn">
        </form>
       </div>
       <?php if ( isset($eror) ) : ?>
        <p class="eror">Username atau Passwor Anda salah</p>
       <?php endif ?>
      </div>
      <!-- box=footer -->
      <div class="box-footer ">
        <a href="" class="">Kembali ke Halam utama</a>
      </div>
    </div>
  </div>
</body>
</html>