<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Komentar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="script php komentar blog atau web menggunakan boostrap dan database mysql">
    <meta name="author" content="bayuajie.com">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
  </head>
  <body>
    <div class="container">
      <div>
	    <!--tampilkan artikel/post berdasarkan id -->
		<?php
		include "menu.php";
		include "koneksi.php";
		$cari = "SELECT id,judul,isi from 1_artikel where id='1'";
		$carititel = mysql_query($cari);
		while($select_result = mysql_fetch_array($carititel))
		{
		$id		= $select_result['id'] ;
		$judul	= $select_result['judul'] ;
		$isi	= $select_result['isi'] ;
		echo"
	    <h1>$judul</h1>
        <p>$isi</p>
		";}
		
		//tampilkan komentar berdasarkan id artikel/post //
		?>
		<h3>Komentar:</h3>		
		<?php
		include"show-koment.php";
		include"form-komentar.php";
		?>		
      </div>     
     
      <footer>
        <p>&copy; <a href="http://www.bayuajie.com">bayuajie.com 2015</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
