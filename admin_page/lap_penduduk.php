<?php
      include "../koneksi/koneksi.php";
      $id = $_SESSION['id_pegawai'];      
      $sql = "select * from pegawai where id_pegawai='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
		  
	 
?>

 <!-- general form elements -->
        
		
		
            <div class="box-header with-border" align="center"> 
              <h3 class="box-title"><b>Laporan Data Penduduk<br></b></h3>
			  <font color="red">*klik PROSES untuk mencetak data!</font><hr>
			  <div class="col-sm-6 col-md-4" align="center">
			  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
			<!---cetak data penduduk dan surat pengantar-->
			<form method="post" action="proses_srt_pengantar.php">
              <div class="box-body" align="center">
			  <div class="col-sm-6 col-md-4" align="center">
			  <div class="form-group">
					<label>Masukkan Uraian</label>
					<textarea class="form-control" name="uraian"></textarea>
					<br>
					<label>Masukkan Keterangan</label>
					<textarea class="form-control" name="keterangan"></textarea>
					
					<input type="hidden" name="admin" value="<?php echo $data['nm_pegawai'] ;?>">
					<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="proses"> <i class="fa fa-fw fa-print"></i>&nbsp;Proses</button>
			  <br><br>
			  </div>
			  </div>	 
            </form>
			<br><br><br><br><br><br><br><br><br><br><br>
			<hr>
			<!-----data penduduk----->
			<div class="box-header with-border" align="center"> 
             <hr>
			  <div class="col-sm-6 col-md-4" align="center">
			  </div>
            </div>
			<form method="post" action="proses_lap_penduduk.php">
              <div class="box-body" align="center">
			  <div class="col-sm-6 col-md-4" align="center">
			  <label>Laporan Penduduk</label>
			  <div class="form-group">
					<input type="hidden" name="admin" value="<?php echo $data['nm_pegawai'] ;?>">
					<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="proses"> <i class="fa fa-fw fa-print"></i>&nbsp;Proses</button>
			  <br><br>
			  </div>
			  </div>	 
            </form>
			
             </div>
			<br><br><br><br><br>
			<br><br><br><br><br>
			  
	  <?php 
		} 
	  ?>			   