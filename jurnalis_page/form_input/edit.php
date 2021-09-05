

<?php
include "../../koneksi/koneksi.php";
include "header_frm.php";

			 $tampil = mysqli_query("SELECT * FROM informasi where id_info='".$_GET['id']."'");
			 $r = mysqli_fetch_array($tampil);
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
<h2 class="font" align="center"> Form Edit Berita</h2><hr width="50%">
	
	<form role="form" method="post" action="../proses_informasi.php" enctype="multipart/form-data">								
	<input type="hidden" name="id_info" class="form-control" value="<?php echo $r['id_info'];?>" readonly="" required>
	<input type="hidden" name="tgl_post" class="form-control" value="<?php echo date('Y-m-d');?>" readonly required>
	<input type="hidden" name="status" class="form-control" value="draft" >
	<input type="hidden" name="id_jurnalis" value=<?php echo $r['id_jurnalis']?> required>
	
	<table cellpadding="0" cellspacing="8" border="0" class='font2'>
	<tr> <td width="200"><b>Judul</b> &nbsp</td> <td>:</td>
		<td>  <input type="text" name="judul" class="form-control" value="<?php echo $r['judul'] ?>"  required></td>
		</tr>
		<?php

					$sql="select * from kategori order by id_kategori";
					$query=mysqli_query($conn,$sql) or die(mysqli_error());
		?>
		<tr>
		<td><b>Kategori</b> &nbsp  </td> <td>:</td> <td>
		<select name="id_kategori" class="form-control" required>
							
							
							<?php
								$id_kategori = $r['id_kategori'];
								$query = "SELECT * FROM kategori ";
								$sql = mysqli_query($query);
								
								while($hasil = mysqli_fetch_array($sql)){
									$selected = ($hasil['id_kategori']==$id_kategori) ? "selected" : "";
									echo "<option value='$hasil[id_kategori]' $selected>	$hasil[nm_kategori]	</option>";
								}
					?>

					</select>
</td></tr>

<tr>
<td><b>Headline</b> &nbsp </td> <td>:</td>
	<td>  <textarea name="headline" id="headline" cols="50" rows="4" required placeholder ='input headline berita'><?php echo $r['headline'];?></textarea>
</td>
</tr>

<tr> 
<td><b>Isi</b> &nbsp </td> <td>:</td>
	<td>  <textarea name="isi" id="isi" cols="50" rows="4" required placeholder ='input isi berita'><?php echo $r['isi'];?></textarea>
</td>
</tr>

 <tr>
 <td><b>Foto (uk.700x400)</b> &nbsp </td> </td> <td>:</td>
	<td>  <input type="checkbox" name="ubah_foto" value="true" required> Ceklis jika ingin mengubah foto
    	
</td></tr>
<tr>
 <td></td> </td> <td></td>
	<td> <input type="file" name="foto">
</td></tr>
<tr> 
<td colspan="3" align="center">&nbsp;&nbsp;<input type="submit" name="ubah_info" value="Ubah">&nbsp;
<input type="reset" name="reset" id="reset" value="Batal">
</td>
</tr>
</table>
</form> </div>

<?php include "footer.php";?>