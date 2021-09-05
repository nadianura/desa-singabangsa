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
	    <!--tampilkan artikel/post yang belum disetujui -->
 <div class="panel-body">
      <ul class="list-group">
		<?php
		include "menu.php";
		echo"<h3>Komentar yang belum disetujui</h3>";
		include "koneksi.php";
		$skomentar = "SELECT * from komentar where flag='0'";
		$selectkmt = mysql_query($skomentar);
		while($select_result = mysql_fetch_array($selectkmt))
		{
		$idk					= $select_result['idk'] ;
		$nama					= $select_result['nama'] ;
		$web					= $select_result['web'] ;
		$komentar				= $select_result['komentar'] ;
		$judulk					= $select_result['judulk'] ;
		$tglk					= $select_result['tglk'] ;
        $avatar					= $select_result['avatar'] ;
		echo"

                    <li class='list-group-item'>
                        <div class='row'>
                            <div class='col-xs-2 col-md-1'>
                                <img src='$avatar' class='img-circle img-responsive' alt='avatar user' /></div>
                            <div class='col-xs-10 col-md-11'>
                                <div>
                                    <div>$judulk</div>
                                    <div class='mic-info'>
                                        oleh: <a href='$web'>$nama</a> tanggal: $tglk
                                    </div>
                                </div>
                                <div class='comment-text'>
                                    $komentar
                                </div>               
								<div class='action'>
                                    <a href='edit.php?idk=$idk'><button type='button' class='btn btn-primary btn-xs' title='Edit'>
                                        <span class='glyphicon glyphicon-pencil'></span>
                                    </button></a>
                                    <a href='approve.php?idk=$idk'><button type='button' class='btn btn-success btn-xs' title='Approved'>
                                        <span class='glyphicon glyphicon-ok'></span>
                                    </button></a>
                                    <a href='hapus.php?idk=$idk'><button type='button' class='btn btn-danger btn-xs' title='Delete'>
                                        <span class='glyphicon glyphicon-trash'></span>
                                    </button></a>
                                </div>								
                            </div>
                        </div>
                    </li>
            ";}  ?>      
                </ul>                
				<br/>
	<!--tampilkan artikel/post yang sudah disetujui -->			
	<ul class="list-group">
		<?php
		echo"<h3>Komentar yang sudah disetujui</h3>";		
		$skomentar = "SELECT * from komentar where flag='1'";
		$selectkmt = mysql_query($skomentar);
		while($select_result = mysql_fetch_array($selectkmt))
		{
		$idk					= $select_result['idk'] ;
		$nama					= $select_result['nama'] ;
		$web					= $select_result['web'] ;
		$komentar				= $select_result['komentar'] ;
		$judulk					= $select_result['judulk'] ;
		$tglk					= $select_result['tglk'] ;
        $avatar					= $select_result['avatar'] ;
		echo"

                    <li class='list-group-item'>
                        <div class='row'>
                            <div class='col-xs-2 col-md-1'>
                                <img src='$avatar' class='img-circle img-responsive' alt='avatar user' /></div>
                            <div class='col-xs-10 col-md-11'>
                                <div>
                                    <div>$judulk</div>
                                    <div class='mic-info'>
                                        oleh: <a href='$web'>$nama</a> tanggal: $tglk
                                    </div>
                                </div>
                                <div class='comment-text'>
                                    $komentar
                                </div>               
								<div class='action'>
                                    <a href='edit.php?idk=$idk'><button type='button' class='btn btn-primary btn-xs' title='Edit'>
                                        <span class='glyphicon glyphicon-pencil'></span>
                                    </button></a>
                                    <a href='approve.php?idk=$idk'><button type='button' class='btn btn-success btn-xs' title='Approved'>
                                        <span class='glyphicon glyphicon-ok'></span>
                                    </button></a>
                                    <a href='hapus.php?idk=$idk'><button type='button' class='btn btn-danger btn-xs' title='Delete'>
                                        <span class='glyphicon glyphicon-trash'></span>
                                    </button></a>
                                </div>								
                            </div>
                        </div>
                    </li>
            ";}  ?>      
                </ul>  
				
				
            </div>
        </div>
    </div>
	<!-- komentar selesai -->		
    
      <hr>
      <footer>
        <p>&copy; <a href="http://www.bayuajie.com">bayuajie.com 2015</p>
      </footer>
     <!-- /container -->
  </body>
</html>
