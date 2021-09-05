<?php 
include "../../koneksi/koneksi.php";
	
	

	
	 

$query = mysqli_query($conn,"SELECT * FROM informasi where id_info='".$_GET['id']."'");
$result = mysqli_fetch_array($query);

?>   

<!DOCTYPE html>
<html lang="en">

  <head>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desa Singabangsa Information Center</title>

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
          <a href="../index.php"><b>Beranda</b></a>
        </li>
        <li class="breadcrumb-item active">Berita</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          <!-- Preview Image -->
          
		  <?php echo "<img class='img-fluid rounded' src='../../images/".$result['foto']."'";?>

          <hr>

          
          
          <hr>
		  <p>
		  <img src="../images/posting.png" height="20" width="20"> <i><?php echo $result['tgl_post'];?></i>
		  <img src="../images/admin.png" height="20" width="20"> <i> <?php echo $result['id_jurnalis'];?></i>
		  </p>


          <!-- Post Content -->
          <p class="lead"><?php echo $result['isi']; ?></p>

          <hr>

        
       <div class="col-lg-8 mb-4">
          <h4>Komentari Berita :</h4><hr>
		  
          <form role="form" method="POST" action="prs_komentar.php">
            
			<div class="control-group form-group">
              <div class="controls">
                <strong>Nama&nbsp;:</strong>
                <input type="text" class="form-control" name="nm_warga" placeholder="Masukkan nama anda" required>
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="id_info" value="<?php echo $_GET['id'];?>" required>
                <p class="help-block"></p>
              </div>
            </div>
			<?php 
			date_default_timezone_set('Asia/Jakarta');
			$date = date('d/m/Y-[H:i]', time());
			?>
			<input type="hidden"  name="tanggal" class="form-control" value=" <?php echo $date; ?> " >
			
			  <div class="control-group form-group">
              <div class="controls">
                <strong>Isi Komentar&nbsp;:</strong>
                <textarea rows="10" cols="100" class="form-control" name="isi" required></textarea>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <strong>E-Mail&nbsp;:</strong>
                <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="flag" value="0" required>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" name="status" value="komen" required>
              </div>
			  
            </div>
          
			
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button name="kirim_komen" type="submit"  class="btn btn-sm btn-primary">Kirim</button>
          </form>
        </div>

        <div class="card my-4">
		<h5 class="card-header">Komentar:</h5>
          <div class="card-body">
		
		<?php
//tampil komentar		
		$komentar = "SELECT * from komentar where id_info= '".$_GET['id']."' and flag='1'";
			$selectkmt = mysqli_query($conn,$komentar);
			while($res = mysqli_fetch_array($selectkmt))
		{
			if($res['status']=="komen"){
		?>
				
		
            
                <!-- Single Comment -->
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../images/cmt_komen.png" width="50" height="50" alt="">
            <div class="media-body">
			
				<h6 class="mt-0"><u><?php echo $res['nm_warga'];?></u>  - [<?php echo $res['tanggal']?>]</h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div><hr>
			<?php }else if($res['status']=="balas"){
			?>
			
			<div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="../images/cmt_balas.png" width="50" height="50" alt="">
            <div class="media-body">
			
				<h6 class="mt-0"><u><font color="blue">Admin</u> - [<i><?php echo $res['tanggal']?></i>]</font></h6>			  
			  
			  
				<?php echo $res['isi'];?>
            </div>
          </div>
			
		<?php
		}}
		?>
          <!-- Comment with nested comments -->
         
            
			</div>
			
          </div>
          </div>
		  
        

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Layanan Desa</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  Silahkan menghubungi Kami pada no. telp berikut (021)&nbsp;56346246 .
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
				 <img src="../../images/socmed/fb.png" width="30px" height="30px"> Facebook &nbsp;
				 <img src="../../images/socmed/alamat.png" width="30px" height="30px"> Maps &nbsp;
				 <img src="../../images/socmed/email.png" width="35px" height="30px"> Email &nbsp;
				 <img src="../../images/socmed/instagram.png" width="30px" height="30px"> Instagram &nbsp;
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
	</body>
	<br>
	<br>
	<br>
	<br>
	