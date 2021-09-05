<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Komentar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="demo script php komentar menggunakan bootstrap">
    <meta name="author" content="bayuajie.com">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">    
  </head>
  <body>
    <div class="container">
       
      <div>
	    <!--tampilkan artikel/post yang belum diapprove -->
 <div class="panel-body">
      <ul class="list-group">
		<?php
		include "menu.php";
		echo"<h3>Cara instal Script:</h3>
		<br/>
		<span class='label label-success'>1.</span> buat database<br/>
		<span class='label label-success'>2.</span> dump file sql ke dalam database, ada dua file sql yang bisa anda pilih:<br/>
		<div class='alert alert-info'>Jika ingin menggunakan avatar yang di host di cdn cloudinary, silahkan gunakan <strong>cdn.sql</strong> untuk dump databasenya<br/>
		Jika anda ingin menggunakan avatar di server anda sendiri/localhost silahkan gunakan <strong>local.sql</strong> untuk dump ke database</div>
		<span class='label label-success'>3.</span> buka koneksi.php , edit setting database beserta password<br/>
		<span class='label label-success'>4.</span> selesai buka  http://localhost/koment/index.php atau path dimana anda menginstal script komentar ini<br/>
		<br/>Untuk mengintegrasikan ke dalam blog atau website, anda harus mengerti sedikit tentang php dan html, silahkan pelajari script ini<br/>
		<a href='http://www.bayuajie.com/tutorial-titel-cara-setting-subdomain-untuk-blogspot.php'>contoh penggunaan script komentar php</a> ini bisa dilihat di blog saya.";
        ?>  
		  </ul>                
            </div>
        </div>
    </div>
	<!-- komentar selesai -->		
      </div>     
      <hr>
      <footer>
        <p>&copy; <a href="http://www.bayuajie.com">bayuajie.com 2015</p>
      </footer>
    </div> <!-- /container -->
  </body>
</html>
