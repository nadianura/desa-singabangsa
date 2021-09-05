<?php
include '../koneksi/koneksi.php';

?>


<html>
<head>
	<title></title>
</head>
<body>
	<h1>Tambah Informasi</h1>
	<form method="post" action="../proses/proses_informasi.php" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>id</td>
		<td><input type="text" name="id_info"></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>
		
		<?php

$sql="select * from kategori ";
$query=mysql_query($sql) or die(mysql_error());
?>
                                            <select name="id_kategori"  required="">
											<option value="">Pilih Kategori</option>
                                             <?php
 while (list($id_kategori,$nm_kategori)=mysql_fetch_array($query))
   {
?>
      <option  value="<?php echo $id_kategori ?>"><?php echo $nm_kategori ?></option>
<?php
  }
?>
                                            </select>
		
		</td>
	</tr>
	
	<tr>
		<td>Judul</td>
		<td><input type="text" name="judul"></td>
	</tr>
	<tr>
		<td>headline</td>
		<td><input type="text" name="headline"></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td><input type="date" name="tgl_post"></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td><textarea name="isi"></textarea></td>
	</tr>
	<tr>
		<td>Status</td>
		<td>
		<input type="radio" name="status" value="publish"> Publish
		<input type="radio" name="status" value="draft"> Draft
		</td>
	</tr>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>
		
		<?php

$sql="select * from pegawai ";
$query=mysql_query($sql) or die(mysql_error());
?>
                                            <select name="id_pegawai"  required="">
											<option value="">Di posting oleh</option>
                                             <?php
 while (list($id_pegawai,$nip)=mysql_fetch_array($query))
   {
?>
      <option  value="<?php echo $id_pegawai ?>"><?php echo $nip ?></option>
<?php
  }
?>
                                            </select>
		
		</td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" name="tambah_informasi" value="Simpan">
	<a href="index.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>





