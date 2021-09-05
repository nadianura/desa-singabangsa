<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	 <link rel="shortcut icon" href="../images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login" ><br><br>
	<div class="row">
	
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default"><br>
				
			
			<center> 
			<img src="../images/logo.png" width="20%"  height="20%" >
			</center>
				<div class="panel-body" align="center">
				<h3>SIDESI </h3>
				Sistem Informasi Desa Singabangsa<br><br>
					<form role="form" method="POST" action="cek_login_adm.php">
						<fieldset>
							
							<div class="form-group">
								<input class="form-control" placeholder="Masukkan ID Anda" name="id_pegawai" type="text" autofocus="" required>
							</div>
							<br>
							<div class="form-group">
								<input class="form-control" placeholder="Masukkan Password Anda" name="password" type="password" required>
							</div>
							<br>
							<center><button type="submit" name="login" class="btn btn-md btn-primary">Login</button></center></fieldset>
					</form>
				</div>
			</div>
			
		</div><!-- /.col-->

	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
