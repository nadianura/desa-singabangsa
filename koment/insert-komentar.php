		<?php		
		include "koneksi.php";
		$cariavt = "SELECT avtr from avatar order by rand() limit 1";
		$avauser = mysql_query($cariavt);
		while($select_result = mysql_fetch_array($avauser))
		{
		$avtr	= $select_result['avtr'] ;		
		}
		?>
		

<?php
include "koneksi.php";
$nama	 		= $_POST['nama'] ;
$id		 	    = $_POST['id'] ;
$web	 		= $_POST['web'] ;
$komentar		= $_POST['komentar'] ;
$judulk			= $_POST['judulk'] ;
$email			= $_POST['email'] ;
$tglk			= date('d-m-Y');
//$titel			= $_POST['titel'];


$query_insert = "insert into komentar (
nama, 
id, 
web, 
email,
judulk,
komentar,
tglk,
avatar
)
values(
'$nama', 
'$id', 
'$web', 
'$email',
'$judulk',
'$komentar',
'$tglk',
'$avtr'

);";

$insert = mysql_query($query_insert);	
if($insert)
	{
		echo"<META HTTP-EQUIV=Refresh CONTENT='3; URL=index.php'>";
		include"terimakasih-komentar.php";
		
        }
else
	{
	echo "Gagal update ... ";
	}
?>