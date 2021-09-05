  <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      
        
      

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=beranda"><b>Beranda</b></a>
        </li>
        <li class="breadcrumb-item active">Panduan</li>
      </ol>
      <center><h5 class="mt-4 mb-3">Panduan Administrasi Penduduk</h5></center>
<center>Pilih kategori panduan di bawah ini :<br><br>
<b><a href="index.php?page=panduan&&kt_panduan=kk">Kartu Keluarga,</a>
<a href="index.php?page=panduan&&kt_panduan=ektp">E-KTP,</a>
<a href="index.php?page=panduan&&kt_panduan=akte">Akte,</a>
<a href="index.php?page=panduan&&kt_panduan=skck">SKCK,</a>
<a href="index.php?page=panduan&&kt_panduan=srt_kematian">Surat Kematian</a></b>
</center><hr>
  <?php  
  if(isset($_GET['kt_panduan'])){
      switch($_GET['kt_panduan']){
          case 'kk'  : include 'pages/panduan_kk.php'; break;
          case 'akte'  : include 'pages/panduan_akte.php'; break;
      case 'skck'  : include 'pages/panduan_skck.php'; break;
      case 'srt_kematian'  : include 'pages/panduan_skem.php'; break;
      case 'ektp'  : include 'pages/panduan_ektp.php'; break;
          

          default : include 'pages/404.php';
      }
  }else{
      include 'pages/panduan_kk.php';
  }
  
 ?>  

    </div>
    <!-- /.container -->

   