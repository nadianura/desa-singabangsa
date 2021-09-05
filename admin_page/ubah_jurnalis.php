<?php
		include "../koneksi/koneksi.php";
		$query = mysqli_query($conn,"SELECT * FROM jurnalis WHERE id_jurnalis='".$_GET['id']."'");
		$r = mysqli_fetch_array($query);
?>

                <div class="form-group">
					<label>ID Jurnalis</label>
					<input type="text" name="id_jurnalis" class="form-control" value="<?php echo $r['id_jurnalis'] ?>" readonly="" required="">
				</div>
				
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?php echo $r['password'] ?>" required="" >
				</div>
				
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik_jurnalis" class="form-control" value="<?php echo $r['nik_jurnalis'] ?>" required="" onkeypress="return isNumberKey(event)" maxlength="16">
				</div>
				
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nm_jurnalis" class="form-control" value="<?php echo $r['nm_jurnalis'] ?>" required="" onkeypress="return isAlphabetKey(event)">
				</div>
				
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" required="">
					<?php echo $r['alamat'] ?>
					</textarea>
				</div>
				
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="no_telp" class="form-control" value="<?php echo $r['no_telp'] ?>" required="" onkeypress="return isNumberKey(event)" >
				</div>
				
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" name="jabatan" class="form-control" value="<?php echo $r['jabatan'] ?>" >
				</div>				
								
				<div class="form-group">
                      <label>Foto</label>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br><br>
    			                  <input type="file" name="foto">
                          </label>
                      </div>
		         </div>