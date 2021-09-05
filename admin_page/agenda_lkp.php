	<?php
		$query = mysqli_query($conn,"SELECT * FROM agenda WHERE id_agenda='".$_GET['id']."'");
		$result = mysqli_fetch_array($query);
	?>
	
	
	
	<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header" align="center">Agenda Lengkap</h3>
				
			</div>
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<div class="panel panel-default articles">
					<div class="panel-heading">
						ID Agenda <b><?php echo $_GET['id'];?></b>
						
						</div>
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
										<?php echo "<img class='img-fluid rounded' width='700px' height='400px' src='../desa.com/images/".$result['foto']."'";?>
										
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
										<p>Tanggal Posting:</p>
										
									</div>
									
									<div class="col-xs-10 col-md-10">
										<p><?php echo $result['tanggal'];?></p>
										
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
								
							</div>
							<div class="clear"></div>
						</div><!--End-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<p>Diinput oleh:</p>
										
									</div>
									
									<div class="col-xs-2 col-md-10date">
									<?php
									    $id_pegawai = $result['id_pegawai'];
										$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
										$res   = mysqli_fetch_array($query);
									?>
										<p>(<?php echo $res['nm_pegawai'];?>)</p>
										
									</div>									
								</div>
							</div>
							<div class="clear"></div>
							<center><button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#modal">
							</i>&nbsp;Edit Agenda
							</button></center>
							
						</div><!--End-->
					</div>
					
				</div><!--End .articles-->
				
				
				<!-------------------------------Modal Update Agenda-------------------------------->
				
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Edit Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="panel-body">
		
		<?php
			$tampil = mysqli_query($conn,"SELECT * FROM agenda where id_agenda='".$_GET['id']."'");
			$r = mysqli_fetch_array($tampil);
	    ?>
		
			<form role="form" method="post" action="proses_agenda.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>ID Agenda</label>
					<input type="text" name="id_agenda" class="form-control" value="<?php echo $r['id_agenda'] ?>" readonly="" required>
				</div>
				
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" class="form-control" value="<?php echo $r['judul'] ?>">
				</div>
				
				<div class="form-group" name="tanggal">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" value="<?php echo date('Y-m-d');?>" readonly required>
				</div>
				
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" class="form-control" required >
					<?php echo $r['isi'] ?>
					</textarea>
				</div>
				
				<div class="form-group">
                      <label>Gambar</label>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br><br>
    			                  <input type="file" name="foto">
                          </label>
                      </div>
		         </div>
				
				<div class="form-group">
				
				<?php 
				
				include"../koneksi/koneksi.php";
				$id=$_SESSION['id_pegawai'];
				$query = mysqli_query($conn,"SELECT * FROM pegawai where id_pegawai='".$id."'");
				$result = mysqli_fetch_array($query);
				?>
					<label>Diinput Oleh <?php echo $result['nm_pegawai'];?> - (<?php echo $id;?>)</label>
					<input name="id_pegawai" type="hidden" class="form-control" value="<?php echo $id;?>" readonly required>
					
				</div>
				
			
		</div>
		
      </div>
      <div class="modal-footer" >
        <button type="submit" name="ubah_agenda" class="btn btn-primary">Ubah</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </form>
	  </div>
    </div>
  </div>
</div>