<link rel='stylesheet' href='cleditor/js/cleditor/jquery.cleditor.css'>
<script src='cleditor/js/jquery.min.js'></script>
<script src='cleditor/js/cleditor/jquery.cleditor.min.js'></script>
<script>
$(document).ready(function () {
	$("#headline, #isi").cleditor();
	
});
</script>

<?php
			// membuat kode otomatis 
//membaca kode terbesar
$query = "SELECT max(id_info) as maxKode FROM informasi";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$id_info = $data['maxKode'];
$noUrut = (int) substr($id_info, 3, 3);
$noUrut++;
$char = "BR";
$newID = $char . sprintf("%03s", $noUrut);

//Memasukkan data textbox ke database
		?>
 <BR><BR> 
  <!-- FORM TAMBAH BERITA ---------------------------------------------------------- -->
 
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Form Tambah Informasi/Berita</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="proses_informasi.php" enctype="multipart/form-data">
								
								<div class="form-group">
				
									<?php 		
									$id=$_SESSION['id_jurnalis'];
									$query = mysql_query("SELECT * FROM jurnalis where id_jurnalis='".$id."'");
									$result = mysql_fetch_array($query);
									?>
										<label>Kiriman dari Jurnalis <u><?php echo $result['nm_jurnalis'];?> - [<?php echo $id;?>]</u></label>
										<input name="id_jurnalis" type="hidden" class="form-control" value="<?php echo $id;?>" readonly>
					
								</div>
								
								<div class="form-group">
									<label>ID Informasi</label>
									<input type="text" name="id_info" class="form-control" value="<?php echo $newID ?>" readonly="" required>
								</div>
								
								<div class="form-group" name="tanggal">
									<label>Tanggal</label>
									<input type="text" name="tgl_post" class="form-control" value="<?php echo date('Y-m-d');?>" readonly required>
								</div>
								
				
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" class="form-control" required>
					</textarea>
				</div>
				
					<div class="form-group">
									<label>Headline</label>
									<textarea name="headline" class="form-control" required>
									</textarea>
					</div>
								
								
								</div>
								<div class="col-md-6">
								
							
								
								
								<div class="form-group">
			<label> Kategori</label>
			<?php

					$sql="select * from kategori order by id_kategori";
					$query=mysql_query($sql) or die(mysql_error());
					?>
				<select name="id_kategori" class="form-control" required="">
																<option value="">Pilih Kategori<br></option>
																 <?php
					 while (list($id_kategori,$nm_kategori)=mysql_fetch_array($query)) //adalah field urutan pertama dan kedua dalam tabel 
					   {
					?>
						  <option  value="<?php echo $id_kategori ?>"><?php echo $nm_kategori ?></option>
					<?php
					  }
					?>
                </select>
			</div>
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Informasi" required>
				</div>
								
									<div class="form-group">
					<label>Gambar</label>
					<input type="file" name="foto" required>
					<p class="help-block">Format PNG./JPG. uk.700x400</p>
				                      </div>
									  
				 <div class="form-group">
					<input type="hidden" name="status" class="form-control" value="draft" >
				</div>
				
				<textarea name="headline" id="headline" cols="50" rows="4" required placeholder ='input headline berita'></textarea>
				
									<button type="submit" name="tambah_informasi" class="btn btn-primary">Kirim</button>
									<button type="reset" class="btn btn-secondary" data-dismiss="modal">Hapus</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->