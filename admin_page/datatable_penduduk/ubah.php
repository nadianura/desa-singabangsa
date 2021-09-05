<style>
input[type=text], select, input[type=number] {
    width: 100%;
    padding: 8px 16px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

</style>

<h3 align="center">Ubah Data</h3>
<?php
 include "../../koneksi/koneksi.php";
  
  $tampil = mysqli_query($conn,"SELECT * FROM penduduk where nik='".$_GET['nik']."'");
  $r = mysqli_fetch_array($tampil);
?>
<form action="" method="post">
<table border="0" width="350px">
<tr><td> 
  <label>NIK</label><br>
  <input name="nik" type="text" class="form-control" value="<?php echo $r['nik'];?>" required="" onkeypress="return isNumberKey(event)" maxlength="16">
</td></tr> 

<tr><td> 
  <label>Nama</label><br>
  <input name="nama" type="text" class="form-control" value="<?php echo $r['nama'];?>"  maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
</td></tr> 
<tr><td> 
  <label>Agama</label><br>
  <?php
  $agama= $r['agama'];  
  ?>
   <select name='agama' class="form-control"  required="">
<option value='islam' <?php if($agama=='islam') echo 'selected';?>>Islam</option>
<option value='kristen' <?php if($agama=='kristen') echo 'selected';?>>Kristen</option>
<option value='budha' <?php if($agama=='budha') echo 'selected';?>>Budha</option>
<option value='konghuchu' <?php if($agama=='konghuchu') echo 'selected';?>>Konghuchu</option>
<option value='hindu' <?php if($agama=='hindu') echo 'selected';?>>Hindu</option>
</select>
</td></tr> 
<tr><td> 
  <label>Umur</label><br>
  <input name="umur" type="number" min="1" max="120" class="form-control" value="<?php echo $r['umur'];?>" required  style="text-transform: capitalize;">
</td></tr> 
<tr><td> 
  <label>Pendidikan</label><br>
  <?php
  $pendidikan= $r['pendidikan'];  
  ?>
   <select name='pendidikan' class="form-control"  required="" >
<option value='sd' <?php if($pendidikan=='sd') echo 'selected';?>>SD</option>
<option value='smp' <?php if($pendidikan=='smp') echo 'selected';?>>SMP</option>
<option value='sma' <?php if($pendidikan=='sma') echo 'selected';?>>SMA</option>
<option value='perguruan tinggi' <?php if($pendidikan=='perguruan tinggi') echo 'selected';?>>Perguruan Tinggi</option>
</select>
</td></tr> 
<tr><td> 
<?php
	$jenkel=$r['jenkel'];
?>
<label>Jenis Kelamin</label><br>
					 <input type="radio" name="jenkel"  value="laki-laki"  <?php if ($jenkel == 'laki-laki') {echo ' checked ';} ?>  required="" />Laki-Laki</label><br>
					 <input type="radio" name="jenkel"  value="perempuan" <?php if ($jenkel == 'perempuan') {echo ' checked ';} ?>  required="" />Perempuan</label><br>
</td></tr> 
<input name="nik_old" type="hidden" value="<?php echo $r['nik']?>"  required="">
<td align="center"><br>
	<button type="submit" class="btn btn-md btn-primary" name="edit">
		&nbsp;Ubah
    </button>
	
	<a href="index.php" class="btn btn-md btn-warning">
		&nbsp;Tutup
	</a>
</td>

</table>
</form>

<?php
//Proses Ubah
if(isset($_POST['edit'])) {
  $nik_old = $_POST['nik_old'];
  $nik   = $_POST['nik'];
  $jenkel   = $_POST['jenkel'];
  $agama  = $_POST['agama'];
  $umur = $_POST['umur'];
  $pendidikan =$_POST['pendidikan'];
  $nama = $_POST['nama'];
  //UPDATE QUERY START
  $query ="update penduduk set nik='$nik',jenkel='$jenkel',agama='$agama',umur='$umur',pendidikan='$pendidikan',nama='$nama' where nik='$nik_old'";
  $sql = mysqli_query($conn,$query);
 if ($sql) {
			  echo "<script>alert('Data penduduk berhasil diubah !');
					document.location.href='index.php'</script>\n";			
		  } else {
			echo "<script>alert('Data penduduk GAGAL diubah, silahkan cek kembali inputan anda');
					document.location.href='index.php'</script>\n";
		  }
//UPDATE QUERY END
}
?>