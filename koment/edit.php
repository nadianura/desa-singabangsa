<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Komentar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
  </head>
  <body>
    <div class="container">

      <div>
	  <h3>Edit Komentar</h3><br/>
	    <!--tampilkan artikel/post berdasarkan id -->
		<?php
		$idk 	= $_GET['idk'];
		include "koneksi.php";
		$cari = "SELECT judulk,web,komentar,nama from komentar where idk='$idk'";
		$carititel = mysql_query($cari);
		while($select_result = mysql_fetch_array($carititel))
		{
		$judulk		= $select_result['judulk'] ;
		$web		= $select_result['web'] ;
		$komentar	= $select_result['komentar'] ;
		$nama		= $select_result['nama'] ;
		echo"
		<form role='form' method='POST' action='update-komentar.php'> 
				 <div class='register-top-grid'>			
                                       
					 <div class='form-group'>
						<span>Subyek<label>*</label></span>
						<input id='titel komentar' name='judulk' class='form-control' value='$judulk' required='required' type='text'>    						    
					 </div>
					 <div class='form-group'>
						<span>Nama<label>*</label></span>
						<input id='nama' name='nama' value='$nama' class='form-control' required='required' type='text'>
					 </div>
					 <div class='form-group'>
						 <span>Web / blog</span>
						 <input id='web' name='web' value='$web' class='form-control' type='text'>    
					 </div>
					 <div class='form-group'>
						 <input id='idk' name='idk' value='$idk' type='hidden'>
					 </div>					
						 <span>Komentar</span>
						 <textarea id='komentar' name='komentar' class='form-control'>$komentar</textarea><br/>                     						 
					   <input type='submit' class='btn btn-primary' value='submit'>					 
					 </div>
				     
		</form>
		";}
		
		//tampilkan komentar berdasarkan id artikel/post //
		?>
		
      </div>     
      <hr>
      <footer>
        <p>&copy; <a href="http://www.bayuajie.com">bayuajie.com 2015</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
