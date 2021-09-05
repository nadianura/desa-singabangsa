<?php 
include "../../koneksi/koneksi.php";
	
$query = mysqli_query($conn,"SELECT * FROM agenda where id_agenda='".$_GET['id']."'");
$result = mysqli_fetch_array($query);

?>   

<!DOCTYPE html>
<html lang="en">

  <head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

   

    <!-- Bootstrap core CSS -->
	
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/modern-business.css" rel="stylesheet">

  </head>
  <body>

   <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"><?php echo $result['judul'];?>
       
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../index.php?page=agenda"><b>Kembali</b></a>
        </li>
        <li class="breadcrumb-item active" >Detil Agenda</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          
		  <?php echo "<img class='img-fluid rounded' src='../images/".$result['foto']."'";?>

          <hr>

          
          
          <hr>
		  <p>
		  <img src="../images/posting.png" height="20" width="20"> <i><?php echo $result['tanggal'];?></i>
		  <img src="../images/admin.png" height="20" width="20"> <i> <?php echo 'Petugas Umum';?></i>
		  </p>


          <!-- Post Content -->
          <p class="lead"><?php echo $result['isi']; ?></p>

          <hr>

        
		
		
			
          </div>
		  
		 

        

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Untuk Bantuan</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  Silahkan menghubungi bidang pelayanan masyarakat di 081293584724
                </div>
                <div class="col-lg-6">
                 
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Terhubung Dengan</h5>
            <div class="card-body" align="center">
              Follow Us : 
				  <a class="footer-image" href="https://web.facebook.com/groups/2175245132698936/">
         <img src="../../images/socmed/fb2.png" width="30px" height="30px">

				 <a class="footer-image" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6097846337207!2d106.4657244140688!3d-6.314880963552579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42089ec4a1b815%3A0x1337a097e04e30d2!2sKantor+Desa+Singabangsa!5e0!3m2!1sid!2sid!4v1516082446667">
          <img src="../../images/socmed/maps.png" width="35px" height="35px">

				 <a class="footer-image" href="#">
         <img src="../../images/socmed/email.png" width="23px" height="23px">
				 <a class="footer-image" href="#">
         <img src="../../images/socmed/instagram.png" width="30px" height="30px">
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
	</body>
	