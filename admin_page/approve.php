<?php 
$id_pegawai= $_GET['receiver'];
$id_komentar=$_GET['id_komen'];
$id_info=$_GET['id_info'];
$flag= "1";
$conn = new mysqli("localhost","root","","db_webdesa");

$publish = $conn->query("UPDATE komentar SET flag='$flag',id_pegawai='$id_pegawai' WHERE id_komentar='".$id_komentar."'");
$message = "Komentar Berhasil Disetujui";
echo "<script type='text/javascript'>
		alert('$message'); document.location.href='home.php?page=komen_lkp&&id=$id_info'
	  </script>";
?>