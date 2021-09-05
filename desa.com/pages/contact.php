
<?php

// membuat kode otomatis
//membaca kode terbesar
include "../koneksi/koneksi.php";
$query = "SELECT max(id_saran) as maxKode FROM saran";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$idsaran = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($idsaran, 8, 8);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "SR";
$newID = $char . sprintf("%09s", $noUrut);//ini adalah variabel untuk id baru

//Memasukkan data textbox ke database
              ?>   

   <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=beranda">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6097846337207!2d106.4657244140688!3d-6.314880963552579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42089ec4a1b815%3A0x1337a097e04e30d2!2sKantor+Desa+Singabangsa!5e0!3m2!1sid!2sid!4v1516082446667" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Informasi dan Pelayanan Silakan Kunjungi</h3><hr>
          <p>
            <strong>Kantor Kepala Desa</strong> - Singabangsa Rt. 004 Te. 002, Singabangsa, Tenjo, Bogor, Jawa Barat 16370
            <br>
          </p>
          <p>
            <strong>Telpon</strong> - (123) 456-7890
          </p>
          <p>
            <strong>E-Mail</strong> -
            <a href="mailto:name@example.com">info@singabangsa.desa.id
            </a>
          </p>
          <p>
            <strong>Waktu Pelayanan</strong> - Senin -Jum'at<br> Pukul 09:00 sampai 17:00 WIB.
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h4>Kirimkan kritik, saran dan Keluhan Anda di bawah ini :</h4><hr>
          <form role="form" method="POST" action="pages/prs_saran.php">
            
			<div class="control-group form-group">
              <div class="controls">
                <input type="hidden" class="form-control" value="<?php echo $newID; ?>" name="id_saran" required>
                <p class="help-block"></p>
              </div>
            </div>
			
			<div class="control-group form-group">
              <div class="controls">
                <strong>*Nama Lengkap :</strong>
                <input type="text" class="form-control" name="nama_masy" onkeypress="return isAlphabetKey(event)" required>
                <p class="help-block"></p>
              </div>
            </div>
			<div class="control-group form-group">
              <div class="controls">
                <strong>*E-mail :</strong>
                <input type="email" class="form-control" name="email" placeholder="exmple@gmail.com" required>
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <strong>*Nomor Telepon:</strong>
                <input type="text" class="form-control" name="notelp" onkeypress="return isNumberKey(event)" required>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <strong>*Isi:</strong>
                <textarea rows="10" cols="100" class="form-control" name="isi_saran" required></textarea>
              </div>
            </div>
			<input type="hidden" name="tanggal" class="form-control" value=" <?php echo date('d-m-Y'); ?> " >
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button name="kirim_saran" type="submit"  class="btn btn-lg btn-primary">Kirim</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    