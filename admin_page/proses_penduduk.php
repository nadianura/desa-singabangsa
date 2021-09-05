<?php
include "../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['tambah'])){
  $nik   = $_POST['nik'];
  $jenkel   = $_POST['jenkel'];
  $agama  = $_POST['agama'];
  $umur = $_POST['umur'];
  $pendidikan =$_POST['pendidikan'];
  $nama = $_POST['nama'];


  //INSERT QUERY START
  $query = "insert into penduduk values('$nik','$jenkel','$agama','$umur','$pendidikan','$nama')";
  $sql   = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Data penduduk berhasil ditambahkan !');
					document.location.href='home.php?page=penduduk'</script>\n";			
		  } else {
			echo "<script>alert('Data penduduk GAGAL ditambahkan, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=penduduk'</script>\n";
		  }
}

//Proses Ubah
else if(isset($_POST['edit'])) {
  $nik_old = $_POST['nik_old'];
  $nik   = $_POST['nik'];
  $jenkel   = $_POST['jenkel'];
  $agama  = $_POST['agama'];
  $umur = $_POST['umur'];
  $pendidikan =$_POST['pendidikan'];
  $nama = $_POST['nama'];
  //UPDATE QUERY START
  $query = "update penduduk set nik='$nik',jenkel='$jenkel',agama='$agama',umur='$umur',pendidikan='$pendidikan',nama='$nama' where nik='$nik_old'";
  $sql = mysqli_query($conn,$query);
 if ($sql) {
			  echo "<script>alert('Data penduduk berhasil diubah !');
					document.location.href='home.php?page=penduduk'</script>\n";			
		  } else {
			echo "<script>alert('Data penduduk GAGAL diubah, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=penduduk'</script>\n";
		  }
//UPDATE QUERY END
}
//Proses Hapus
else if(isset($_POST['hapus'])) {
  $nik = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from penduduk where nik='$nik'";
  $sql = mysqli_query($conn, $query);
 if ($sql) {
			  echo "<script>alert('Data penduduk berhasil dihapus !');
					document.location.href='home.php?page=penduduk'</script>\n";			
		  } else {
			echo "<script>alert('Data penduduk GAGAL dihapus, silakan coba lagi.');
					document.location.href='home.php?page=penduduk'</script>\n";
		  }
  exit;
}
?>
