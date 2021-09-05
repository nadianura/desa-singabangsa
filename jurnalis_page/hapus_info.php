<?php
// Load file koneksi.php
include "../koneksi/koneksi.php";

//Proses Hapus
if(isset($_POST['hapus_info'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from informasi where id_info='$id'";
  $sql = mysqli_query($query);
  if ($sql) {
			  echo "<script>alert('Informasi berhasil dihapus !');
					document.location.href='home.php?page=informasi'</script>\n";			
		  } else {
			echo "<script>alert('Informasi gagal dihapus');
					document.location.href='home.php?page=informasi'</script>\n";
		  }	
  exit;
}


?>