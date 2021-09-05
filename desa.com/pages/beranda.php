
<?php
include "../koneksi/koneksi.php";
?>
<div class="container">

 <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=beranda">Home</a>
        </li>
        <li class="breadcrumb-item active">Beranda</li>
      </ol>
    <header>
   
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../images/desa/s4.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <!--<h3>First Slide</h3>
              <p>This is a description for the first slide.</p>-->
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../images/desa/py1.png')">
            <div class="carousel-caption d-none d-md-block">
              <!--<h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>-->
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../images/desa/uu.png')">
            <div class="carousel-caption d-none d-md-block">
               <!--<h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>-->
            </div>
          </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../images/desa/st1.jpg')">
            <div class="carousel-caption d-none d-md-block">
             <!--  <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>-->
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
 <section id="cta" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-11">
                  <center>
    <img class="blog wow fadeIn" data-wow-duration="400ms" data-wow-delay="500ms" src="../images/bgbupati.png" width="1100px" alt=""><br>
</center> 
                    
   <p><b>Singabangsa</b> merupakan salah satu Desa di wilayah Kecamatan Tenjo Kabupaten Bogor, dengan luas wilayah 303.262 Ha. Yang terbagi dalam 2 Dusun 4 Rukun Warga ( RW ), 15 Rukun Tetangga ( RT ). Jumlah Penduduk Desa Singabangsa sampai akhir bulan Desember Tahun 2019 tercatat sebanyak 3,998 Jiwa Dengan Jumlah Kartu Keluarga Sebanyak : 2,400 Kepala Keluarga (KK). Dengan kondisi wilayah demikian pemanfaatan lahan sebagai dasar dari tunjuan pembangunan dan pemanfaatan Sumber Daya Alam (SDA) menjadi fokus utama dalam visi dan Misi Kepala Desa Singabangsa. Tidak lain, pemanfaatan tersebut bertujuan untuk kemaslahatan warga setempat yang juga diharapkan dapat mengakat perekonomian masyarakatnya. Sumber pengairan (Irgasi) yang diberi nama Situ Singabangsa juga tidak luput dari perhatian kepala Desa sebagai sasaran pembangunan dan pengembangan kemajuan desa Singabangsa pada tahun 2019 kedepan ini. Tujuannya, pengembangan irigasi yang memiliki manfaat untuk sumber pengairan lahan tani warga desa Singabangsa ini, tidak hanya bisa dirasakan sebagai sarana pengairan saja. Tetapi, juga bisa dijadikan ojbek wisata alam bagi masyarakat. Selain masyarakat setempat dengan pembangunan dan pengembangan yang baik dan benar tentu hal ini juga bisa dirasakan oleh masyarakat luar desa sebagai suatu iconic atau tanda mata bagi para pengunjung dengan cara berfoto-foto di sekitaran Situ Singabangsa. Manfaat lain dari pembangunan dan pengembangan Situ Singabangsa ini tentu memiliki potensi sebagai lahan komoditas bagi para penduduk, seperti penyediaan lahan untuk berjualan Makanan dan Minuman.
                    </p>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <div class="container">

     

     

      <!-- Konten Informasi -->
      <br><br>
    <div class="breadcrumb" color="#00FFFF">Berita Terbaru
    </div>

      <div class="row">
       
        <?php
    $query = "select * from informasi where status='publish' order by tgl_post DESC";
    $tampil = mysqli_query($conn,$query);
    while ($hasil = mysqli_fetch_array($tampil)) {
        ?>    
        
      
        <div class="col-lg-4 col-sm-4 portfolio-item">
          <div class="card h-100">
            <a href="#">
        <?php echo "<img class='card-img-top' height='250 px' width='500 px' src='../images/".$hasil['foto']."'";?>
      </a>
            <div class="card-body">
              <h4 class="card-title">
                
        <a href="pages/content.php?id=<?php echo $hasil['id_info']?>">
        <?php echo "$hasil[judul]";?>
        </a>
        
        
              </h4>
              <p class="card-text"><?php echo "$hasil[headline]";?></p>
        
        
            </div>
          </div>
        </div>
    
    <?php
    }
    ?>
    
      </div>
      <!-- /.row
 Desa Karangmojo
Kecamatan Karangmojo
Kabupaten Gunungkidul
Jln. Karangmojo Ponjong KM 1,5 Gatak Karangmojo

    -->

   
    
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Desa Singabangsa Kabupaten Bogor</h2>
          <p>Silahkan gunakan layanan informasi masyarakat dengan bijak.</p>
          
          <p>Website desa ini adalah salah satu bentuk pelayanan perangkat desa kepada masyarakat Desa Singabangsa maupun masyarakat di luar Desa</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="../images/logo.png" alt="" width="140" height="150">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Klik tombol <strong>"Pengaduan"</strong> untuk layanan pengaduan atau laporan Pemerintah Kabupaten Bogor.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="http://pengaduan.bogorkab.go.id/"><strong>Pengaduan</strong></a>
        </div>
      </div>

    </div>
    </div>

   