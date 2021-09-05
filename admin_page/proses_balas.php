<?php
include "../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['kirim_balas'])){
  $nm_warga   = 'admin';
  $id_info  = $_POST['id_info'];
  $tanggal = $_POST['tanggal'];
  $isi   = $_POST['isi'];
  $email = $_POST['email'];
  $flag = $_POST['flag'];
  $status = $_POST['status'];
  $id_pegawai = $_POST['id_pegawai'];


  //INSERT QUERY START
  $query = "insert into komentar values('','$nm_warga','$id_pegawai','$id_info','$tanggal','$isi','$email','$flag','$status')";
  $sql   = mysqli_query($conn,$query);
  if ($sql) {
		echo"<META HTTP-EQUIV=Refresh CONTENT='3; URL=home.php?page=komen_lkp&&id=$id_info'>";
	 include"ty_balas.php";
        }

	else {
      echo "<h2>Gagal,</h2>Silakan coba lagi .";
	 
    }
}


?>

