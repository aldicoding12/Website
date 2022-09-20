<?php 
require "../function.php";

$id = $_GET["idjurusan"]; 

if ( informasi($id) ) {
  echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'informasi.php';
		</script>
	";
}else
echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'informasi.php';
		</script>
	";


	



?>