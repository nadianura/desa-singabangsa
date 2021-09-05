<?php
      include "../koneksi/koneksi.php";
      $id = $_SESSION['id_pegawai'];      
      $sql = "select * from pegawai where id_pegawai='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
		  
	 
?>

 <!-- general form elements -->
       
		
	<div class="container">
	<div class="row">
            <div class="box-header with-border" align="center"> 
              <h3 class="box-title"><b>Laporan Berita Ter-Publish</b></h3>
			  <font color="red">*klik PROSES untuk mencetak data!</font> <hr>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
		   
		   <!--laporan perbulan-->
		   
		   <div class="box-header with-border" align="center"> 
              <h4 class="box-title"><b>Data Per-bulan</b></h4>
			  <div class="col-sm-6 col-md-4" align="center">
			  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
			<form method="post" action="proses_lap_berita_perbulan.php">
              <div class="box-body" align="center">
			  <div class="col-sm-6 col-md-4" align="center">
			  <div class="form-group">
                    <div class="selectContainer">
                      <select class="form-control" name="bulan">
                        <option>Pilih Bulan</option>
						<option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <div class="selectContainer">
                      <?php
                      $now=date('Y');
                      echo "<select name='tahun' class='form-control'>";
                        for ($a=2010;$a<=$now;$a++)
                        {
                        echo "<option value='$a' selected>$a</option>";
                        }
                      echo "</select>";
                      ?>
                    </div>
                  </div>
			  <div class="form-group">
					<input type="hidden" name="admin" value="<?php echo $data['nm_pegawai'] ;?>">
					<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="proses"> <i class="fa fa-fw fa-print"></i>&nbsp;Proses</button>
			  <br><br>
			  </div>
			  </div>	 
              
            </form>
					
                
              </div> 
		   
		   <!--end laporan perbulan-->
		   <br><br><br><br><br><br><br><br><br>
		   <hr>
		   <!--laporan pertahun-->
		   
		   <div class="box-header with-border" align="center"> 
              <h4 class="box-title"><b>Data Per-tahun</b></h4>
			  <div class="col-sm-6 col-md-4" align="center">
			  </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
			<form method="post" action="proses_lap_berita_pertahun.php">
              <div class="box-body" align="center">
			  <div class="col-sm-6 col-md-4" align="center">
			  
			  <div class="form-group">
                    <div class="selectContainer">
                      <?php
                      $now=date('Y');
                      echo "<select name='tahun' class='form-control'>";
                        for ($a=2010;$a<=$now;$a++)
                        {
                        echo "<option value='$a' selected>$a</option>";
                        }
                      echo "</select>";
                      ?>
                    </div>
                  </div>
			  
			  <div class="form-group">
					<input type="hidden" name="admin" value="<?php echo $data['nm_pegawai'] ;?>">
					<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="proses"> <i class="fa fa-fw fa-print"></i>&nbsp;Proses</button>
			  <br><br>
			  </div>
			  </div>	 
              
            </form>
					
                
              </div> 
		   
		   <!--end laporan petahun-->
			  
	
      <!-- /.box-header -->
      </div>
        <hr>
		
		<?php
	  }
		?>