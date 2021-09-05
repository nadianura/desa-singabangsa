

<?php
include "koneksi.php";
$idk 			= $_GET['idk'];
$query_update = "update komentar set flag='1' where idk='$idk'";
$update = mysql_query($query_update);

if($update)
	{
	include("moderator.php");
	}
else
	{
	echo "Gagal update ... ";	
	}