<?php 
require "../function.php";

$id = $_GET["idjurusan"]; 

if ( jurusan1($id) ) {
  echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'jurusan.php';
		</script>
	";
}else
echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'jurusan.php';
		</script>
	";



?>