<?php
      include "../koneksi/koneksi.php";
      $id = $_SESSION['id_pegawai'];      
      $sql = "select * from pegawai where id_pegawai='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
		  
	 
?>

 <!-- general form elements -->
 
        <br>
		<br>
		<br>
		<br>
		<br>
            <div class="box-header with-border" align="center"> 
			
              <h3 class="box-title"><b>Laporan Data Jurnalis</b></h3><hr>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="proses_lap_jurnalis.php">
              <div class="box-body" align="center">
			  <input type="hidden" name="admin" value="<?php echo $data['nm_pegawai'] ;?>">
                <button type="submit" class="btn btn-primary" style="margin-top: 10px"> <i class="fa fa-fw fa-print"></i>&nbsp;Proses</button><br><br>
					<font color="red">*klik PROSES untuk mencetak data!</font> 
              </div>
            </form> 
                </div>
              
			  
			  
			   		  
	  <?php 
		} 
	  ?>			   