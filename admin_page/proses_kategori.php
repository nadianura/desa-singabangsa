<?php
// Load file koneksi.php
include "../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['tambah_kt'])){
  $id_kategori   = $_POST['id_kategori'];
  $nm_kategori   = $_POST['nm_kategori'];
  
  //INSERT QUERY START
  $query = "insert into kategori values('$id_kategori','$nm_kategori')";
  $sql   = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Data kategori berhasil ditambahkan !');
					document.location.href='home.php?page=kategori'</script>\n";			
		  } else {
			echo "<script>alert('Data kategori GAGAL ditambahkan, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=kategori'</script>\n";
		  }
}

//Proses Ubah
else if(isset($_POST['ubah_kt'])) {
  $id_kategori   = $_POST['id_kategori'];
  $nm_kategori   = $_POST['nm_kategori'];
  //UPDATE QUERY START
  $query = "update kategori set nm_kategori='$nm_kategori' where id_kategori='$id_kategori'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Data kategori berhasil diubah !');
					document.location.href='home.php?page=kategori'</script>\n";			
		  } else {
			echo "<script>alert('Data kategori GAGAL diubah, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=kategori'</script>\n";
		  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus_kt'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from kategori where id_kategori='$id'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Data kategori berhasil dihapus !');
					document.location.href='home.php?page=kategori'</script>\n";			
		  } else {
			echo "<script>alert('Data kategori GAGAL dihapus);
					document.location.href='home.php?page=kategori'</script>\n";
		  }
  exit;
}
?>
