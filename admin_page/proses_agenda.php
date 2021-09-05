<?php
// Load file koneksi.php
include "../koneksi/koneksi.php";

//Proses Insert
if(isset($_POST['tambah_agenda'])) {
// Ambil Data yang Dikirim dari Form
$id_agenda = $_POST['id_agenda'];
$judul = $_POST['judul'];
$tanggal = $_POST['tanggal'];
$isi = $_POST['isi'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$id_pegawai = $_POST['id_pegawai'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = 'agenda'.date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../desa.com/images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO agenda VALUES('".$id_agenda."', '".$judul."', '".$tanggal."','".$isi."', '".$fotobaru."','".$id_pegawai."')";
	$sql = mysqli_query($conn,$query);
		  if ($sql) {
			  echo "<script>alert('Agenda berhasil ditambahkan !');
					document.location.href='home.php?page=agenda'</script>\n";			
		  } else {
			echo "<script>alert('Agenda gagal ditambahkan, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=agenda'</script>\n";
		  }	
	}
}

//Proses Ubah
else if(isset($_POST['ubah_agenda'])) {
    $id_agenda = $_POST['id_agenda'];
	$judul= $_POST['judul'];
	$tanggal = $_POST['tanggal'];
	$isi = $_POST['isi'];
	$id_pegawai = $_POST['id_pegawai'];
    // Cek apakah ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika menceklis checkbox yang ada di form ubah, lakukan :
        // Ambil data foto yang dipilih dari form
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
       $fotobaru = "updt_agenda".date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
       $path = "../desa.com/images/".$fotobaru;

        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Query untuk menampilkan data spv berdasarkan NIS yang dikirim
            $query = "SELECT * from agenda where id_agenda='".$id_agenda."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            // Cek apakah file foto sebelumnya ada di folder foto
            if(file_exists("../desa.com/images/".$data['foto'])){ // Jika foto ada
                unlink("../desa.com/images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
              }

            // Proses ubah data ke Database
            $query = "UPDATE agenda SET id_agenda='".$id_agenda."', judul='".$judul."', tanggal='".$tanggal."', isi='".$isi."',id_pegawai='".$id_pegawai."', foto='".$fotobaru."' WHERE id_agenda='".$id_agenda."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo "<script type='text/javascript'>
					alert('Agenda berhasil di edit'); document.location.href='home.php?page=agenda_lkp&&id=$id_agenda'
				    </script>";
            }else{
                // Jika Gagal, Lakukan :
                die ("sql gagal");
            }
        }else{
           
            die ('uploaded file false');
        }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
        // Proses ubah data ke Database
        $query1 = "UPDATE agenda SET id_agenda='".$id_agenda."', judul='".$judul."', tanggal='".$tanggal."', isi='".$isi."',id_pegawai='".$id_pegawai."' WHERE id_agenda='".$id_agenda."'";
        $sql = mysqli_query($conn,$query1); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            echo "<script type='text/javascript'>
					alert('Agenda berhasil di edit'); document.location.href='home.php?page=agenda_lkp&&id=$id_agenda'
				  </script>";
            // Jika Gagal, Lakukan :
            ?>
            <script >
                window.location=history.go(-1);
            </script>
            <?php
        }
    }

}

//Proses Hapus
else if(isset($_POST['hapus_agenda'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from agenda where id_agenda='$id'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Agenda berhasil dihapus !');
					document.location.href='home.php?page=agenda'</script>\n";			
		  } else {
			echo "<script>alert('Agenda gagal dihapus');
					document.location.href='home.php?page=agenda'</script>\n";
		  }	
  exit;
}


?>