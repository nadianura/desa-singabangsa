<?php error_reporting(0); ?>
<?php include"../koneksi/koneksi.php";
session_start();
if(!isset($_SESSION['id_jurnalis'])){
    ?>
    <script >
        alert("Maaf Anda Tidak Memiliki Hak Akses Untuk Halaman Ini !");
        document.location="../jrn/";
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jurnalis - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	
	
	
	
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	 <link rel="shortcut icon" href="../images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<img src="../images/logo.png" width="52" height="59" align="left"/>
				<a class="navbar-brand" href="home.php?page=beranda">Jurnalist</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
			
			<?php
      $id = $_SESSION['id_jurnalis'];      
      $sql = "select * from jurnalis where id_jurnalis='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
	  
	  <?php
						$nm_foto= $data['foto'];
						echo "<img class='img-responsive' width='170' height='170' alt='$nm_foto' src='../images/".$data['foto']."'>"
						;?>
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
				 <?php echo  $data['nm_jurnalis'];    			
	  }
      ?>
				
				
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Jurnalis</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu" >
			<li><a href="home.php?page=beranda"><i class="glyphicon glyphicon-link"></i> Home </a></li> 
			<li><a href="home.php?page=profil_jurnalis"><i class="glyphicon glyphicon-link"></i> Profil</a></li>	
			<li><a href="home.php?page=informasi"><i class="glyphicon glyphicon-link"></i> Berita</a></li>		
			<li><a href="home.php?page=jurnalis"><i class="glyphicon glyphicon-link"></i> Jurnalis</a></li>			
			
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="home.php">
					<em class="fa fa-home"></em><!--ahref ke beranda-->
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
	
			
			
			