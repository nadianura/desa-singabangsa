<?php
 include "../koneksi/koneksi.php";
  
  $tampil = mysqli_query($conn,"SELECT * FROM kategori where id_kategori='".$_GET['id']."'");
  $r = mysqli_fetch_array($tampil);
?>

		   <div class="form-group">
			  <label>Id Kategori</label>
              <input name="id_kategori" type="text" class="form-control" value="<?php echo $r['id_kategori'] ?>" readonly="">
            </div>
           <div class="form-group">
              <label>Nama Kategori</label>
              <input value="<?php echo $r['nm_kategori'] ?>" name="nm_kategori" type="text" class="form-control" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
           </div>