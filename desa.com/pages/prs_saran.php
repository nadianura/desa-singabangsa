<?php
include "../../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['kirim_saran'])){
  $id_saran   = $_POST['id_saran'];
  $nama_masy   = $_POST['nama_masy'];
  $email   = $_POST['email'];
  $notelp  = $_POST['notelp'];
  $isi_saran   = $_POST['isi_saran'];
  $tanggal = $_POST['tanggal'];


  //INSERT QUERY START
  $query = "insert into saran values('$id_saran','$nama_masy','$email','$notelp','$isi_saran','$tanggal')";
  $sql   = mysqli_query($conn,$query);
  if ($sql) {
		echo"<META HTTP-EQUIV=Refresh CONTENT='5; URL=../index.php?page=contact'>";
		include"ty_srn.php";
        }

	else {
      echo "<h2>Gagal,</h2>Silakan coba lagi .";
    }
}


?>
