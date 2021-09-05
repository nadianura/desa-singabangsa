
<?php
include "koneksi.php";
$nama	 		= $_POST['nama'] ;
$idk	 	    = $_POST['idk'] ;
$web	 		= $_POST['web'] ;
$komentar		= $_POST['komentar'] ;
$judulk			= $_POST['judulk'] ;

$query_update = "update komentar set
nama	='$nama',
web		='$web', 
komentar='$komentar',
judulk  ='$judulk'
where idk='$idk'";

$update = mysql_query($query_update);	
if($update)
	{
		echo"<META HTTP-EQUIV=Refresh CONTENT='0; URL=moderator.php'>";				
        }
else
	{
	echo "Gagal update ... ";
	}
?>