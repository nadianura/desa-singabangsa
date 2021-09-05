<?php

include "../koneksi/koneksi.php";
		//Proses Hapus
if(isset($_POST['hapus_saran'])) {
  $id_saran = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from saran where id_saran='$id_saran'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Saran berhasil dihapus !');
					document.location.href='home.php?page=saran'</script>\n";			
		  } else {
			echo "<script>alert('Saran GAGAL dihapus , silakan coba lagi');
					document.location.href='home.php?page=saran'</script>\n";
		  }
}
	?>