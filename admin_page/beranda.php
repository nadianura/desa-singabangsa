	<?php
      $id = $_SESSION['id_pegawai'];      
      $sql = "select nm_pegawai from pegawai where id_pegawai='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
	  
	  	  <?php
	  }
      ?>
		
		
		
		
			
			<div class="alert bg-info" role="alert"> <marquee><b>Beranda Administrator Website Desa Singabangsa</b> </marquee></div>
			
			
			
			<div class="col-sm-12">
				<p class="back-link"><font color="#30a5ff"><b>&copy;Copyright Januari 2018</b></font></p>
			</div>
			
			<br><br><br>
			<?php 
			include "time.php";
			?>		
			<br>
			<center><img src="../images/logo.png" width="150" height="180" ><center><br>