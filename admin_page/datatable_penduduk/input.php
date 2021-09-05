
<form role="form" method="post" action="proses_penduduk.php" >
			
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control" required="" onkeypress="return isNumberKey(event)" maxlength="16">
				</div>
				
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Penduduk" required="" onkeypress="return isAlphabetKey(event)">
				</div>
				
				<div class="form-group">
				<label>Agama</label>
			<select name="agama" class="form-control" required="">
				  <option>Pilih</option>
				  <option value="islam">Islam</option>
				  <option value="kristen">Kristen</option>
				  <option value="budha">Budha</option>
				  <option value="konghucu">Konghuchu</option>
				  <option value="hindu">Hindu</option>
				</select>
				</div>
				
				
				<div class="form-group">
					<label>Umur</label>
					<input type="number" min="1" name="umur" class="form-control" placeholder="Masukkan Umur" required>
				</div>
				
				<div class="form-group">
				<label>Pendidikan</label>
					<select name="pendidikan" class="form-control" required="">
					  <option>Pilih</option>
					  <option value="sd">SD</option>
					  <option value="smp">SMP</option>
					  <option value="sma">SMA</option>
					  <option value="perguruan tinggi">Perguruan Tinggi</option>
					</select>
				</div>
				<label>Jenis Kelamin</label>
				<div class="form-group">
					 <input type="radio" name="jenkel" value="laki-laki" required> Laki-Laki<br>
					 <input type="radio" name="jenkel" value="perempuan" required> Perempuan<br>
				</div>	
				
			
		</div>
		
      </div>
      <div class="modal-footer" >
        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </form>