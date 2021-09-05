
<?php error_reporting(0); ?>
<!--include koneksi dan session-->
<?php include"../../koneksi/koneksi.php";
session_start();
if(!isset($_SESSION['id_pegawai'])){
    ?>
    <script >
        alert("Maaf Anda Tidak Memiliki Hak Akses Untuk Halaman Ini ! !");
        document.location="../../login/index.php";
    </script>
    <?php
}
?>


 <!-- ////////////////// Validate ////////////////// -->
  <script language="javascript">
    function isNumberKey(evt) //Number
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;

      return true;
    }
    function isUppercaseKey(evt) //Uppercase
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 65 || charCode > 90))
          return false;

      return true;
    }
    function isLowercaseKey(evt) //Lowercase
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 31 && (charCode < 97 || charCode > 122))
          return false;

      return true;
    }
    function isAlphabetKey(evt) //Alphabet + spc
    {
      var charCode = (evt.which) ? evt.which : event.keyCode;
      console.log(charCode);
        if (charCode > 32 && (charCode < 97 || charCode > 122))
          return false;

      return true;
    }
  </script>
  <!-- ////////////////// End Validate ////////////////// -->

<!DOCTYPE html>
<html>
<head>
	<title>Data Penduduk</title>	
	
	<script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
	<script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">

   <link rel="shortcut icon" href="../../images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	<center>
		<h3>Data Penduduk Desa Singabangsa<br></h3>
		
	</center>
		
	<div class="container">
	<div class="jumbotron">
    
	
  
		<table class="table table-striped table-bordered data">
			<thead>
            <tr>
              <th>No.</th>
			   <th>Nama</th>
			   <th>NIK</th>
			    <th>Jenis Kelamin</th>
              <th>Agama</th>
			  <th>Umur</th>
			  <th>Pendidikan</th>
			  <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Query Select pekerjaan -->
            <?php
            $query="SELECT * FROM penduduk ORDER BY nama ASC";
            $tampil = mysqli_query($conn,$query);
            $no = 1; // nomor baris
            while ($r = mysqli_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no.</td>
              <td>$r[nama]</td>
			  <td>$r[nik]</td>
			  <td>$r[jenkel]</td>
			  <td>$r[agama]</td>
			  <td>$r[umur]</td>
			  <td>$r[pendidikan]</td>
              
              
              <td> "; ?>
                <!-- Button trigger modal -->
                <a href="index.php?inc=ubah&nik=<?php echo $r['nik'];?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp; 
				<a href="hapus.php?id=<?php echo $r['nik']; ?>" 
	            onClick = "return confirm('Apakah Anda ingin mengapus data ini?')" value="hapus" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i> </a>
			  </td>
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";
 
		  ?>
		  
     <br><br>
   <div class="panel panel-default" align="center">
    <hr width="50%">
	<?php  
  if(isset($_GET['inc'])){
      switch($_GET['inc']){
          case 'ubah'  : include 'ubah.php'; break;
          case 'ket'  : include 'keterangan.php'; break;
          default : include '404.php';
      }
  }else{
      include 'keterangan.php';
  }
  
 ?>
    <div class="panel-body"></div>
   </div>
		  
	</div>
</body>

	
<!--call dataTables-->

<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
 
  </div>
</html>

