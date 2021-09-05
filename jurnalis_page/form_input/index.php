

<?php
include "../../koneksi/koneksi.php";
include "header_frm.php";

// membuat kode otomatis 
//membaca kode terbesar
$query = "SELECT max(id_info) as maxKode FROM informasi";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$id_info = $data['maxKode'];
$noUrut = (int) substr($id_info, 3, 3);
$noUrut++;
$char = "BR";
$newID = $char . sprintf("%03s", $noUrut);

//Memasukkan data textbox ke database
?>
<link rel='stylesheet' href='js_cl/cleditor/jquery.cleditor.css'>
<script src='js_cl/jquery.min.js'></script>
<script src='js_cl/cleditor/jquery.cleditor.min.js'></script>
<script>
$(document).ready(function () {
	$("#headline, #isi").cleditor();
	
});
</script>
<div id='main'>
<h3 class="font" align="center"> Form Input Berita</h3><hr width="50%">
<?php if(isset($info)) echo $info;?>
	
	<form role="form" method="post" action="../proses_informasi.php" enctype="multipart/form-data">
	
									
	<input type="hidden" name="id_info" class="form-control" value="<?php echo $newID ?>" readonly="" required>
	<input type="hidden" name="tgl_post" class="form-control" value="<?php echo date('Y-m-d');?>" readonly required>
	<input type="hidden" name="status" class="form-control" value="draft" >
	<?php 		
									$id=$_SESSION['id_jurnalis'];
									$query = mysqli_query($conn,"SELECT * FROM jurnalis where id_jurnalis='".$id."'");
									$result = mysqli_fetch_array($query);
    ?>
	<input type="hidden" name="id_jurnalis" value=<?php echo $result['id_jurnalis']?> required>
	
	<table cellpadding="0" cellspacing="3" border="0" class='font2'>
	<tr> <td width="200"><b>Judul</b> &nbsp</td> <td>:</td>
		<td>  <input type="text" name="judul" size='50' maxlength="100" placeholder='Masukkan Judul Informasi' required></td>
		</tr>
		<?php

					$sql="select * from kategori order by id_kategori";
					$query=mysqli_query($conn,$sql) or die(mysqli_error());
		?>
		<tr>
		<td><b>Kategori</b> &nbsp  </td> <td>:</td> <td>
		<select name="id_kategori"  required="">
																<option value="">Pilih Kategori<br></option>
																 <?php
					 while (list($id_kategori,$nm_kategori)=mysqli_fetch_array($query)) //adalah field urutan pertama dan kedua dalam tabel 
					   {
					?>
						  <option  value="<?php echo $id_kategori ?>"><?php echo $nm_kategori ?></option>
					<?php
					  }
					?>
                </select>
</td></tr>

<tr>
<td><b>Headline</b> &nbsp </td> <td>:</td>
	<td>  <textarea name="headline" id="headline" cols="50" rows="4" required placeholder ='input headline berita'></textarea>
</td>
</tr>

<tr> 
<td><b>Isi</b> &nbsp </td> <td>:</td>
	<td>  <textarea name="isi" id="isi" cols="50" rows="4" required placeholder ='input isi berita'></textarea>
</td>
</tr>

 <tr>
 <td><b>Foto (uk.700x400)</b> &nbsp </td> </td> <td>:</td>
	<td>  <input type="file" name="foto" required>
</td></tr>
<tr> 
<td colspan="3" align="center">&nbsp;&nbsp;<input type="submit" name="tambah_informasi" value="Kirim">&nbsp;
<input type="reset" name="reset" id="reset" value="Batal">
</td>
</tr>
</table>
</form> </div>

<?php include "footer.php";?>