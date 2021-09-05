<br>

<?php
	  $id = $_GET['id'];      
      $sql = "select * from informasi where id_info='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
?>
<div class="alert bg-info" role="alert">Monitoring Komentar   <br>Berita : <b>[<?php echo $data['id_info'];?>]</b> - <?php echo $data['judul'];?>  
<br><br><button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#modal_balas"><i class="fa fa-fw fa-commenting-o"></i>Balas Komentar</button></div><br>

	  <?php } ?>
<div class="panel panel-default">
					<div class="panel-heading"><b>Komentar menuggu persetujuan</b></div>
					<div class="panel-body">
						<div class="col-md-12" align="center">
							
								<?php
//tampil komentar		
		$komentar = "SELECT * from komentar where id_info= '".$_GET['id']."' and flag='0' order by tanggal DESC ";
			$selectkmt = mysqli_query($conn,$komentar);
			while($res = mysqli_fetch_array($selectkmt))
		{
			if($res['status']=="komen"){
		?>
            
                <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../desa.com/images/cmt_komen.png" width="50" height="50" alt="foto">
            <div class="media-body">
			
				<h6 class="mt-0"><u><?php echo $res['nm_warga'];?></u>  - [<?php echo $res['tanggal']?>]</h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div><br>
		  <!--setujui komentar dgn mengirimkan id pegawai berdasarkan session -->
		  <?php
			$id_pegawai=$_SESSION['id_pegawai'];
			$id_komentar=$res['id_komentar'];
			$id_info=$_GET['id'];
     	  ?>
		  
		  <!--button setujui-->
							<a href="approve.php?receiver=<?php echo "$id_pegawai";?>&&id_komen=<?php echo "$id_komentar";?>&&id_info=<?php echo "$id_info";?> ">
							<button type="button" class="btn btn-sm btn-danger">Setujui</button>
							</a>
		  <!--button hapus-->
						  <a href="delete_komentar.php?id_komen=<?php echo "$id_komentar";?>&&id_info=<?php echo "$id_info";?> ">
						  <button type="button" class="btn btn-sm btn-warning" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</button>
						  </a>
		  <hr>
			<?php }else if($res['status']=="balas"){
			?>
			
			<div class="media mb-6">
            <img class="d-flex mr-3 rounded-circle" src="../desa.com/images/cmt_balas.png" width="50" height="50" alt="foto">
            <div class="media-body">
			
				<h6 class="mt-0"><u><font color="blue">Admin</u> - [<i><?php echo $res['tanggal']?></i>]</font></h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div>	
		  <hr>
			
		<?php
		}}
		?>
								
							
								</div>
								
							</form>
						</div>
					</div>
					
				<!---->

<div class="panel panel-default">
					<div class="panel-heading"><b>Komentar Disetujui</b></div>
					<div class="panel-body">
						<div class="col-md-12" align="center">
							
								<?php
//tampil komentar		
		$komentar = "SELECT * from komentar where id_info= '".$_GET['id']."' and flag='1' order by tanggal DESC";
     	  
			$selectkmt = mysqli_query($conn,$komentar);
			while($res = mysqli_fetch_array($selectkmt))
		{
			if($res['status']=="komen"){
		
			$id_komentar=$res['id_komentar'];
			$id_info=$_GET['id'];	
		  ?>  
                <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../desa.com/images/cmt_komen.png" width="50" height="50" alt="foto">
            <div class="media-body">
			
				<h6 class="mt-0"><u><?php echo $res['nm_warga'];?></u>  - [<?php echo $res['tanggal']?>]</h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div><br>
		   
		   <!--button hapus-->
						  <a href="delete_komentar.php?id_komen=<?php echo "$id_komentar";?>&&id_info=<?php echo "$id_info";?> ">
						  <button type="button" class="btn btn-sm btn-warning" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</button>
						  </a>
		  <hr>
			<?php }else if($res['status']=="balas"){
			$id_komentar=$res['id_komentar'];
			$id_info=$_GET['id'];
			
			?>
			
			<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../desa.com/images/cmt_balas.png" width="50" height="50" alt="foto">
            <div class="media-body">
			
				<h6 class="mt-0"><u><font color="blue">Admin</u> - [<i><?php echo $res['tanggal']?></i>]</font></h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div><br>
			  <!--button hapus-->
						  <a href="delete_komentar.php?id_komen=<?php echo "$id_komentar";?>&&id_info=<?php echo "$id_info";?> ">
						  <button type="button" class="btn btn-sm btn-warning" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</button>
						  </a>
		  <hr>
			
		<?php
		}}
		?>
								
							
								</div>
						</div>
					</div>
					
					<!------------------------Modal Balas Komentar !----------------------------->
					<div class="modal fade" id="modal_balas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Balas Komentar</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
        <!-- form start -->
        <form role="form" method="POST" action="proses_balas.php">
            
			<div class="control-group form-group">
              <div class="controls">
                <strong>ID pegawai&nbsp;:</strong>
                <input type="text" class="form-control" name="id_pegawai" value="<?php echo $_SESSION['id_pegawai']?>" readonly required>
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="id_info" value="<?php echo $_GET['id'];?>" required>
                <p class="help-block"></p>
              </div>
            </div>
			<?php 
			date_default_timezone_set('Asia/Jakarta');
			$date = date('d/m/Y-[H:i]', time());
			?>
			<input type="hidden"  name="tanggal" class="form-control" value=" <?php echo $date; ?> " >
			
			  <div class="control-group form-group">
              <div class="controls">
                <strong>Isi Komentar&nbsp;:</strong>
                <textarea rows="10" cols="100" class="form-control" name="isi" required></textarea>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <strong>E-Mail&nbsp;:</strong>
                <input type="email" class="form-control" name="email" value=" info@singabangsa.desa.id" readonly required>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="flag" value="1" required>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="status" value="balas" required>
              </div>
			  
            </div>
          
			
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button name="kirim_balas" type="submit"  class="btn btn-sm btn-primary">Kirim</button>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
					<!------------------------ End Modal! ----------------------------->

	