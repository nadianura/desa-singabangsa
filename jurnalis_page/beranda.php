	<?php
      $id = $_SESSION['id_jurnalis'];      
      $sql = "select nm_jurnalis from jurnalis where id_jurnalis='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
	  
	  	
		<div class="panel panel-container">		
			<div class="alert bg-success" role="alert"> 
				<b>
				<marquee>Beranda Jurnalis Website Desa Singabangsa</marquee>
				</b>
				 </div>
			
	  <?php
	  }
      ?>
	
	
		

			
			
			
			<div class="col-sm-12">
				<p class="back-link"><font color="#8ad919"><b>&copy;Copyright Januari 2018 - Journalist</b></font></p>
			</div>
			
			<center>
			<h3><b>Kode Etik Jurnalistik</b></h3>
			<br>
			<embed src="../doc_lembaga_masy/ke_jurnalis.pdf" width="1000" height="600"></embed>
			
			<center>