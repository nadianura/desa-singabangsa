<?php
include "../koneksi/koneksi.php";
$id_komentar = $_GET['id_komen'];
$id_info = $_GET['id_info'];
$query_delete = "delete from  komentar where id_komentar='$id_komentar'";
$success = mysqlI_query($conn,$query_delete);
$message_success = "Komentar Berhasil Dihapus";
$message_failed = "Maaf Komentar GAGAL Dihapus !";
if($success)
	{
	
	echo "<script type='text/javascript'>
		alert('$message_success'); document.location.href='home.php?page=komen_lkp&&id=$id_info'
	      </script>";
	
	}
else
	{
	echo "<script type='text/javascript'>
		alert('$message_failed'); document.location.href='home.php?page=komen_lkp&&id=$id_info'
	      </script>";	
	}
	
	?>
	