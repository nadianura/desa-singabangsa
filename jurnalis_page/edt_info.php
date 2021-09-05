<?php
			 $tampil = mysqli_query("SELECT * FROM informasi where id_info='".$_GET['id']."'");
			 $r = mysqli_fetch_array($tampil);
?>
 <BR><BR> 
  <!-- FORM EDIT BERITA ---------------------------------------------------------- -->
 
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Form Edit Informasi/Berita</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="post" action="proses_informasi.php" enctype="multipart/form-data">
								
								<div class="form-group">
				
									<?php 		
									$id=$_SESSION['id_jurnalis'];
									$query = mysqli_query($conn,"SELECT * FROM jurnalis where id_jurnalis='".$id."'");
									$result = mysqli_fetch_array($query);
									?>
										<label>Kiriman dari Jurnalis <u><?php echo $result['nm_jurnalis'];?> - [<?php echo $id;?>]</u></label>
										<input name="id_jurnalis" type="hidden" class="form-control" value="<?php echo $id;?>" readonly required>
					
								</div>
								
								<div class="form-group">
									<label>ID Informasi</label>
									<input type="text" name="id_info" class="form-control" value="<?php echo $r['id_info'] ?>" readonly="" required>
								</div>
								
								<div class="form-group" name="tanggal">
									<label>Tanggal</label>
									<input type="text" name="tgl_post" class="form-control" value="<?php echo $r['tgl_post'] ?>" readonly required>
								</div>
								
				
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" class="form-control" required>
					<?php echo $r['isi'] ?>
					</textarea>
				</div>
				
					<div class="form-group">
									<label>Headline</label>
									<textarea name="headline" class="form-control" required>
									<?php echo $r['headline'] ?>
									</textarea>
					</div>
								
								
								</div>
								<div class="col-md-6">
								
					  <?php
					  //variable dibawah ini untuk mendapatkan record kategori yang dipilih
					  $id_kategori = $r['id_kategori'] ;  
					  ?>		
					<div class="form-group">
					  <label>Kategori</label>
					  <select name="id_kategori" class="form-control" required>
							
							
							<?php
								$query = "SELECT * FROM kategori ";
								$sql = mysqli_query($query);
								
								while($hasil = mysqli_fetch_array($sql)){
									$selected = ($hasil['id_kategori']==$id_kategori) ? "selected" : "";
									echo "<option value='$hasil[id_kategori]' $selected>	$hasil[nm_kategori]	</option>";
								}
					?>

					</select>
					</div>
								
								
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Informasi" value="<?php echo $r['judul'] ?>" required>
				</div>
								
									<div class="form-group">
                      <label>Gambar</label>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="ubah_foto" value="true" required> Ceklis jika ingin mengubah foto<br><br>
    			                  <input type="file" name="foto">
                          </label>
                        </div>
		                </div>
									  
				 <div class="form-group">
					<input type="hidden" name="status" class="form-control" value="draft" required>
				</div>
									<br><br>
									<button type="submit" name="ubah_info" class="btn btn-primary">Ubah</button>
									<button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->