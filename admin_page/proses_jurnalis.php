<?php
include "../koneksi/koneksi.php";

//Proses Tambah
if(isset($_POST['tambah_jurnalis'])){
  $id_jurnalis   = $_POST['id_jurnalis'];
  $nik_jurnalis = $_POST['nik_jurnalis'];
  $nm_jurnalis   = $_POST['nm_jurnalis'];
  $alamat  = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $jabatan = $_POST['jabatan'];
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $password = $_POST['password'];
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = 'jurnalis'.date('dmYHis').$foto;

// Set path folder tempat menyimpan fotonya
$path = "../images/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	$query = "INSERT INTO jurnalis(id_jurnalis,nik_jurnalis,nm_jurnalis,alamat,no_telp,jabatan,foto,password) VALUES('".$id_jurnalis."', '".$nik_jurnalis."', '".$nm_jurnalis."', '".$alamat."', '".$no_telp."','".$jabatan."','".$fotobaru."', '".$password."')";
	$sql = mysqli_query($conn,$query);
		  if ($sql) {
			  echo "<script>alert('Jurnalis berhasil terdaftar !');
					document.location.href='home.php?page=jurnalis'</script>\n";			
		  } else {
			echo "<script>alert('Jurnalis gagal didaftarkan, silahkan cek kembali inputan anda');
					document.location.href='home.php?page=jurnalis'</script>\n";
		  }	
	}
}


//Proses Ubah
else if(isset($_POST['edit'])) {
    $id_jurnalis = $_POST['id_jurnalis'];
	$nik_jurnalis= $_POST['nik_jurnalis'];
	$nm_jurnalis= $_POST['nm_jurnalis'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$jabatan= $_POST['jabatan'];
    $password= $_POST['password'];
	// Cek apakah ingin mengubah fotonya atau tidak
    if(isset($_POST['ubah_foto'])){ // Jika menceklis checkbox yang ada di form ubah, lakukan :
        // Ambil data foto yang dipilih dari form
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Rename nama fotonya dengan menambahkan tanggal dan jam upload
       $fotobaru = "updt_jurnalis".date('dmYHis').$foto;

        // Set path folder tempat menyimpan fotonya
       $path = "../images/".$fotobaru;

        // Proses upload
        if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Query untuk menampilkan data spv berdasarkan NIS yang dikirim
            $query = "SELECT * from jurnalis where id_jurnalis='".$id_jurnalis."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/Jalankan query dari variabel $query
            $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

            // Cek apakah file foto sebelumnya ada di folder foto
            if(file_exists("../images/".$data['foto'])){ // Jika foto ada
                unlink("../images/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
              }

            // Proses ubah data ke Database
            $query = "UPDATE jurnalis SET nik_jurnalis='".$nik_jurnalis."', nm_jurnalis='".$nm_jurnalis."', alamat='".$alamat."', no_telp='".$no_telp."',jabatan='".$jabatan."', foto='".$fotobaru."', password='".$password."' WHERE id_jurnalis='".$id_jurnalis."'";
            $sql = mysqli_query($conn,$query); // Eksekusi/ Jalankan query dari variabel $query

            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo "<script type='text/javascript'>
					alert('Jurnalis berhasil di edit'); document.location.href='home.php?page=jurnalis'
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
        $query1 = "UPDATE jurnalis SET nik_jurnalis='".$nik_jurnalis."', nm_jurnalis='".$nm_jurnalis."', alamat='".$alamat."', no_telp='".$no_telp."',jabatan='".$jabatan."', password='".$password."' WHERE id_jurnalis='".$id_jurnalis."'";
        $sql = mysqli_query($conn,$query1); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            echo "<script type='text/javascript'>
					alert('Jurnalis berhasil di edit'); document.location.href='home.php?page=jurnalis'
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
else if(isset($_POST['hapus_jurnalis'])) {
  $id = $_POST['id'];
  //DELETE QUERY START
  $query = "delete from jurnalis where id_jurnalis='$id'";
  $sql = mysqli_query($conn,$query);
  if ($sql) {
			  echo "<script>alert('Jurnalis Berhasil Dihapus !');
					document.location.href='home.php?page=jurnalis'</script>\n";			
		  } else {
			echo "<script>alert('Tidak Berhasil Menghapus Data');
					document.location.href='home.php?page=jurnalis'</script>\n";
		  }	
  exit;
}


?>
