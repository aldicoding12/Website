<?php
//koneksi ke data base
date_default_timezone_set('Asia/Makassar');
$conn = mysqli_connect("localhost", "root", "", "db_sekolah");
$pengguna = query("SELECT * FROM pengguna");

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ) {
    $rows [] = $row;
  }
  return $rows;
}

function tambah($data) {
	global $conn;

  $nama = addslashes(htmlspecialchars($data["nama"]));
	$username = addslashes(strtolower(stripslashes($data["username"]))) ;
	$password =addslashes(mysqli_real_escape_string($conn, $data["password"])) ;
  $Konfirmasi=$data["konfirmasi"];
  $level = $data["level"];
  $creat = date('Y-m-d H:i:s ');


  if ( $password != $Konfirmasi ) {
    echo "<script>
          alert('Konfirmasi password sala!');
            </script>";
      return false;
      exit;
  }

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!');
		      </script>";
		return false;
	}

	// enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO pengguna VALUES('', '$nama', '$username', '$password', '$level', '$creat', 'NULL'

  )");

  return mysqli_affected_rows($conn);

}

function hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM pengguna WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function galeri1($id) {
  global $conn;
  $result = mysqli_query($conn, "SELECT foto FROM galeri WHERE id = '$id'");
  if ( mysqli_num_rows($result) > 0 ) {

  $det = mysqli_fetch_assoc($result);
    if ( file_exists("../upload/img/".$det["gambar"]) ) {
      unlink("../upload/img/".$det["foto"]);
    }
  }
  mysqli_query($conn, "DELETE FROM galeri WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function jurusan1($id) {
  global $conn;

  $result = mysqli_query($conn, "SELECT gambar FROM jurusan WHERE id = '$id'");
  if ( mysqli_num_rows($result) > 0 ) {

  $det = mysqli_fetch_assoc($result);
    if ( file_exists("../upload/img/".$det["gambar"]) ) {
      unlink("../upload/img/".$det["gambar"]);
    }
  }
  mysqli_query($conn, "DELETE FROM jurusan WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;
  $id = $data["id"];
  $nama = addslashes(htmlspecialchars($data["nama"]));
	$username = addslashes(strtolower(stripslashes($data["username"])));
  $level = $data["level"];
  $update = date('Y-m-d H:i:s ');
	// cek username sudah ada atau belum
  // if ( !isset($username["username"]) == 1 ) {
  //   $result = mysqli_query($conn, "SELECT username FROM pengguna WHERE username = '$username'");
  //   if( mysqli_fetch_assoc($result) ) {
      
  //   } else {
  //     echo "<script>
  //         alert('username sudah terdaftar!');
  //           </script>";
  //     return false;
  //   }
  // }

	$query = "UPDATE pengguna SET 
          nama = '$nama', 
          username = '$username', 
          level = '$level',
          updated_at = '$update'
          WHERE id = '$id';
          ";

   mysqli_query($conn, $query);



  return mysqli_affected_rows($conn);

}

function ubahpassword($pass) {
  global $conn;
  $id = $_SESSION["uid"];
  $passwordLama=mysqli_real_escape_string($conn, $pass["password-lama"]) ;
  $passwordBaru=mysqli_real_escape_string($conn, $pass["password-baru"]) ;
  $Konfirmasi=$pass["konfirmasi"];


  if ( !isset( $passwordLama ) ) {
    $result = mysqli_query($conn, "SELECT password FROM pengguna WHERE password = '$passwordLama'");
    if( mysqli_fetch_assoc($result) ) {
      echo "<script>
          alert('Password salah!');
            </script>";
      return false;
      exit;
    }

  }

  if ( $passwordBaru != $Konfirmasi ) {
    echo "<script>
          alert('Konfirmasi password sala!');
            </script>";
      return false;
      exit;
  }

  $password = password_hash($passwordBaru, PASSWORD_DEFAULT);

  $query = "UPDATE pengguna SET
            password = '$password' Where id = '$id';
  ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);

}

//jurusan

function jurusan($data) {
	global $conn;

  $nama = addslashes(htmlspecialchars($data["nama"]));
  $keterangan=htmlspecialchars($data["keterangan"]);
  $creat = date('Y-m-d H:i:s ');

  $gambar = uplaod();
  if ( !$gambar ) {
    return false;
  }

  mysqli_query($conn, "INSERT INTO jurusan VALUES('', '$nama', '$keterangan', '$gambar', '$creat', 'NULL'

  )");

  return mysqli_affected_rows($conn);

}

function ubahjurusan($data) {
  global $conn;
  $id = $data["id"];
  $nama = addslashes(htmlspecialchars($data["nama"]));
  $keterangan=htmlspecialchars($data["keterangan"]);
  $update = date('Y-m-d H:i:s ');
  $GambarLama = $data["GambarLama"];

  if ( $_FILES["gambar"]["error"] == 4 ) {
    $gambar = $GambarLama;
  }else {
    $gambar = uplaod();
  }

  if ( file_exists("../upload/img/".$GambarLama) > 0 ) {
    unlink('../upload/img/'.$GambarLama);
  }

  $query = "UPDATE jurusan SET
                          nama = '$nama',
                          keterangan = '$keterangan',
                          updated_at = '$update',
                          gambar = '$gambar'
                          WHERE id = '$id'
  ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function galeri($data) {
	global $conn;

  $keterangan=htmlspecialchars($data["keterangan"]);
  $creat = date('Y-m-d H:i:s ');

  $gambar = uplaod();
  if ( !$gambar ) {
    return false;
  }

  mysqli_query($conn, "INSERT INTO galeri VALUES('',  '$gambar', '$keterangan', '$creat', 'NULL'

  )");

  return mysqli_affected_rows($conn);

}

function ubahgaleri($data) {
  global $conn;
  $id = $data["id"];
  $keterangan = $data["keterangan"];
  $gambarLama = $data["GambarLama"];

  if ( $_FILES["gambar"] == 4 ) {
    $gambar = $gambarLama;
  }else {
    $gambar = uplaod();
  }

  if ( file_exists("../upload/img/".$gambarLama) > 0 ) {
    unlink('../upload/img/'.$gambarLama);
  }

  $query = "UPDATE galeri SET
            keterangan = '$keterangan',
            foto = '$gambar'
            WHERE id = '$id'
  ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

//Informasi
function informasi($data) {
	global $conn;

  $judul = (htmlspecialchars($data["judul"]));
  $keterangan=htmlspecialchars($data["keterangan"]);
  $creat = date('Y-m-d H:i:s ');

  $gambar = uplaod();
  if ( !$gambar ) {
    return false;
  }

  mysqli_query($conn, "INSERT INTO informasi VALUES('', '$judul', '$keterangan', '$gambar', '$creat', 'NULL', 'NULL'
  )");

  return mysqli_affected_rows($conn);

}

//delete Informasi
function informasi1($id) {
  global $conn;
  $result = mysqli_query($conn, "SELECT gambar FROM jurusan WHERE id = '$id'");
  if ( mysqli_num_rows($result) > 0 ) {

  $det = mysqli_fetch_assoc($result);
    if ( file_exists("../upload/img/".$det["gambar"]) ) {
      unlink("../upload/img/".$det["gambar"]);
    }
  }
  mysqli_query($conn, "DELETE FROM informasi WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}
function uplaod() {
  $nama = $_FILES["gambar"] ["name"];
  $ukuran = $_FILES["gambar"] ["size"];
  $error = $_FILES["gambar"] ["error"];
  $tmpName = $_FILES["gambar"] ["tmp_name"];

  //cek error
  if ( $error === 4 ) {
    echo "<script>
    alert('Tidak ada gambar yang di upload!');
    </script>";
    return false;
  }

  //cek ukuran
  if ( $ukuran > 1000000 ) {
    echo "<script>
    alert('Fila yang di upload terlalu besar!');
    </script>";
    return false;
  }

  $formatFile = pathinfo($nama, PATHINFO_EXTENSION);
  $riname = 'jurgam'.time().'.'.$formatFile;

  $eksistensi = ['png', 'jpg', 'jpeg', 'gif'];

  if ( !in_array($formatFile, $eksistensi) ) {
    echo "<script>
    alert('Fila yang di upload tidak mendukung!');
    </script>";
    return false;
  }

  move_uploaded_file($tmpName, "../upload/img/".$riname);


  return $riname;
}


?>