<?php
include "../../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['kirim_komen'])){
  $nm_warga   = $_POST['nm_warga'];
  $id_info  = $_POST['id_info'];
  $tanggal = $_POST['tanggal'];
  $isi   = $_POST['isi'];
  $email = $_POST['email'];
  $flag = $_POST['flag'];
  $status = $_POST['status'];


  //INSERT QUERY START
  $query = "insert into komentar values('','$nm_warga',null,'$id_info','$tanggal','$isi','$email','$flag','$status')";
  $sql   = mysqli_query($conn,$query);
  if ($sql) {
		echo"<META HTTP-EQUIV=Refresh CONTENT='4; URL=content.php?id=$id_info'>";
	 include"ty_kmn.php";
        }

	else {
      echo "<h2>Gagal,</h2>Silakan coba lagi .";
	 
    }
}


?>

