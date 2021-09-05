<?php
// Load file koneksi.php
include "../koneksi/koneksi.php";

//Proses Insert
if(isset($_POST['tambah_informasi'])) {
// Ambil Data yang Dikirim dari Form
$id_info = $_POST['id_info'];
$id_kategori = $_POST['id_kategori'];
$judul = $_POST['judul'];
$tgl_post = $_POST['tgl_post'];
$headline = addslashes($_POST['headline']);
$isi = addslashes($_POST['isi']);
$status = $_POST['status'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$id_jurnalis = $_POST['id_jurnalis'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO informasi(id_info,id_kategori,judul,headline,tgl_post,isi,status,foto,id_jurnalis) VALUES('".$id_info."', '".$id_kategori."', '".$judul."', '".$headline."', '".$tgl_post."','".$isi."','".$status."', '".$fotobaru."','".$id_jurnalis."')";
	$sql = mysqli_query($conn,$query);
		  if ($sql) {
			  echo "<script>alert('Informasi berhasil ditambahkan !');
					document.location.href='home.php?page=informasi'</script>\n";			
		  } else {
			echo "<script>alert('Informasi gagal ditambahkan, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=informasi'</script>\n";
		  }	
	}
}

//Proses Ubah
else if(isset($_POST['ubah_info'])) {
    $id_info = $_POST['id_info'];
	$id_kategori = $_POST['id_kategori'];
	$judul = $_POST['judul'];
	$tgl_post = $_POST['tgl_post'];
	$headline = $_POST['headline'];
	$isi = $_POST['isi'];
	$status = $_POST['status'];
	$id_jurnalis = $_POST['id_jurnalis'];

    // Cek apakah ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika menceklis checkbox yang ada di form ubah, lakukan :
        // Ambil data foto yang dipilih dari form
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
       $fotobaru = "updt".date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
       $path = "../images/".$fotobaru;

        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Query untuk menampilkan data spv berdasarkan NIS yang dikirim
            $query = "SELECT * from informasi where id_info='".$id_info."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            // Cek apakah file foto sebelumnya ada di folder foto
            if(file_exists("../images/".$data['foto'])){ // Jika foto ada
                unlink("../images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
              }

            // Proses ubah data ke Database
            $query = "UPDATE informasi SET id_kategori='".$id_kategori."', judul='".$judul."', headline='".$headline."', tgl_post='".$tgl_post."',isi='".$isi."', status='".$status."',foto='".$fotobaru."' ,id_jurnalis='".$id_jurnalis."' WHERE id_info='".$id_info."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo "<script type='text/javascript'>
					alert('Informasi anda berhasil di edit'); document.location.href='home.php?page=info_lkp&&id=$id_info'
				    </script>";
            }else{
                // Jika Gagal, Lakukan :
                //header("location: ../../index.php?hal=spv&tmb=fail");
                die ("sql gagal");
            }
        }else{
            /*// Jika gambar gagal diupload, Lakukan :
            ?>
            <script >
                window.location=history.go(-1);
                document.write("Gagal upload gambar");
            </script>
            <?php*/
            die ('uploaded file false');
        }
    }else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
        // Proses ubah data ke Database
        $query1 =  "UPDATE informasi SET id_kategori='".$id_kategori."', judul='".$judul."', headline='".$headline."', tgl_post='".$tgl_post."',isi='".$isi."', status='".$status."', id_jurnalis='".$id_jurnalis."' WHERE id_info='".$id_info."'";
        $sql = mysqli_query($conn,$query1); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            echo "<script type='text/javascript'>
					alert('Informasi anda berhasil di edit'); document.location.href='home.php?page=info_lkp&&id=$id_info'
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
else if(isset($_POST['hapus_info'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from informasi where id_info='$id'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Informasi berhasil dihapus !');
					document.location.href='home.php?page=informasi'</script>\n";			
		  } else {
			echo "<script>alert('Informasi gagal dihapus');
					document.location.href='home.php?page=informasi'</script>\n";
		  }	
  exit;
}


?>