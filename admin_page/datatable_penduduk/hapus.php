<?php
include "../../koneksi/koneksi.php";

$nik= $_GET['id'];
$query = "delete from penduduk where nik='$nik'";
  $sql = mysqli_query($conn,$query);
 if ($sql) {
			  echo "<script>alert('Data penduduk berhasil dihapus !');
					document.location.href='index.php'</script>\n";			
		  } else {
			echo "<script>alert('Data penduduk GAGAL dihapus, silakan coba lagi.');
					document.location.href='index.php'</script>\n";
		  }

?>