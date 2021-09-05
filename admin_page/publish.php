<?php 
$id_pegawai= $_GET['id_pegawai'];
$id_info= $_GET['id_info'];
$status= "publish";
$conn = new mysqli("localhost","root","","db_webdesa");

$publish = $conn->query("UPDATE informasi SET status='$status',id_pegawai='$id_pegawai' WHERE id_info='".$id_info."'");
$message = "Informasi Berhasil Dipublish";
echo "<script type='text/javascript'>
		alert('$message'); document.location.href='home.php?page=informasi'
	  </script>";
?>