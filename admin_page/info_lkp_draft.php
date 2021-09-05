	<?php
		$query = mysqli_query($conn,"SELECT
  `kategori`.`nm_kategori`,
  `jurnalis`.`nm_jurnalis`,
  `informasi`.`id_info`,
  `informasi`.`id_kategori`,
  `informasi`.`judul`,
  `informasi`.`headline`,
  `informasi`.`tgl_post`,
  `informasi`.`isi`,
  `informasi`.`status`,
  `informasi`.`foto`,
  `informasi`.`id_jurnalis`
FROM
  `informasi`
  INNER JOIN `kategori` ON `kategori`.`id_kategori` = `informasi`.`id_kategori`
  INNER JOIN `jurnalis` ON `jurnalis`.`id_jurnalis` = `informasi`.`id_jurnalis`				
  WHERE id_info='".$_GET['id']."'");
		$result = mysqli_fetch_array($query);
	?>
	
	
	
	<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">Berita Lengkap (Draft)</h3>
				
			</div>
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<div class="panel panel-default articles">
					<div class="panel-heading">
						ID Informasi <b><?php echo $_GET['id'];?></b>
						
						</div>
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<?php echo "<img class='img-fluid rounded' width='700px' height='400px' src='../images/".$result['foto']."'";?>
										
									</div>							
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						
						<hr width="100%">
						
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Judul:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<p><?php echo $result['judul'];?></p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Kategori:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<p>(<?php echo $result['id_kategori'];?>)</p>-<p>(<?php echo $result['nm_kategori'];?>)</p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Headline:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<p><?php echo $result['headline'];?></p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Tanggal Posting:</p>
										
									</div>
									
									<div class="col-xs-10 col-md-10">
										<p><?php echo $result['tgl_post'];?></p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Isi:</p>
										
									</div>
									
									<div class="col-xs-10 col-md-10">
										<form>
											<p><?php echo $result['isi'];?></p>
										</form>
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Status:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<p><?php echo $result['status'];?></p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Diinput Oleh:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<p>(<?php echo $result['id_jurnalis'];?>)</p>-<p>(<?php echo $result['nm_jurnalis'];?>)</p>
										
									</div>									
								</div>
							</div>
							<div class="clear" align="center">
							
							<?php
							$id_info=$_GET['id'];
							$id_pegawai=$_SESSION['id_pegawai'];
							?>
							<a href="publish.php?id_info=<?php echo"$id_info";?>&&id_pegawai=<?php echo "$id_pegawai"; ?> ">
							<button type="button" class="btn btn-md btn-primary">
								<i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Publish Informasi
							</button>
							</a>
							</div>
						</div><!--End-->
						
					</div>
					
				</div><!--End .articles-->
				
				<!--modal edit-->
				
				
				<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Publish Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="panel-body">
		
		
		
			<form role="form" method="post" action="proses_informasi.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>ID Informasi</label>
					<input type="text" name="id_info" class="form-control" value="<?php echo $_GET['id'] ?>" readonly="">
				</div>
				
				<div class="form-group">
			<label> Kategori</label>
				 <select name="id_kategori" class="form-control" required>
		
		
		<?php
			$query = "SELECT * FROM kategori` ORDER BY id_kategori";
			$sql = mysqli_query($conn,$query);
			
			while($hasil = mysqli_fetch_array($sql)){
				$selected = ($hasil['id_kategori']==$id_kategori) ? "selected" : "";
				echo "<option value='$hasil[id_kategori]' $selected>	$hasil[nm_kategori]	</option>";
			}
?>

</select>
			</div>
				
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" class="form-control" value="<?php echo $result['judul']?>" placeholder="Masukkan Judul Informasi">
				</div>
				
				<div class="form-group" name="tanggal">
					<label>Tanggal</label>
					<input type="text" name="tgl_post" class="form-control" value="<?php echo date('Y/m/d');?>" readonly>
				</div>
				
				<div class="form-group">
					<label>Headline</label>
					<textarea name="headline" class="form-control" >
					<?php echo $result['headline']?>
					</textarea>
				</div>
				
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" class="form-control" >
					<?php echo $result['isi'] ?>
					</textarea>
				</div>
				
				<div class="form-group">
					<label>Gambar - Format PNG./JPG. uk.700x400</label><br>
					<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
					<input type="file" name="foto" >
				</div>
				
				<div class="form-group" name="tanggal">
					<label>Status</label>
					<input type="text" name="status" class="form-control" value="<?php echo 'publish';?>" readonly>
				</div>
				
				<div class="form-group" name="id_pegawai">
				
				<?php 
				
				include"../koneksi/koneksi.php";
				$id=$_SESSION['id_pegawai'];
				$query = mysqli_query($conn,"SELECT * FROM pegawai where id_pegawai='".$id."'");
				$result = mysqli_fetch_array($query);
				?>
					<label>Diposting Oleh <?php echo $result['nm_pegawai'];?> - (<?php echo $id;?>)</label>
					<input name="id_pegawai" type="text" class="form-control" value="<?php echo $id;?>" readonly>
					
				</div>
				
			
		</div>
		
      </div>
      <div class="modal-footer" >
        <button type="submit" name="posting" class="btn btn-primary">Posting</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </form>
	  </div>
    </div>
  </div>
</div>