  <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
     

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=profil"><b>Kembali</b></a>
        </li>
        <li class="breadcrumb-item active">Statistik Penduduk</li>
      </ol>
       <center><h5 class="mt-4 mb-3">Data Statistik Penduduk Berdasarkan Kategori</h5></center>
        
      
<center>Pilih kategori kependudukan di bawah ini<br>
<b><a href="index.php?page=statistik&kategori=agama">Agama</a>
<a href="index.php?page=statistik&kategori=umur">Umur</a>
<a href="index.php?page=statistik&kategori=jenkel">Jenis Kelamin</a>
<a href="index.php?page=statistik&kategori=pendidikan">Pendidikan</a></b>
</center><hr>
  <?php 
  if(isset($_GET['kategori'])){
      switch($_GET['kategori']){
          case 'agama'  : include 'pages/statistik_pend_agama.php'; break;
          case 'umur'  : include 'pages/statistik_pend_umur.php'; break;
      case 'jenkel'  : include 'pages/statistik_pend_jenkel.php'; break;
      case 'pendidikan'  : include 'pages/statistik_pend_pendidikan.php'; break;
          

          default : include 'pages/404.php';
      }
  }else{
      include 'pages/statistik_pend_agama.php';
  }
  
 ?>  

    </div>
    <!-- /.container -->

   