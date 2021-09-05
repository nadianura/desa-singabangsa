	<div class="row">
			<div class="col-lg-12" align="center">
				<h1 class="page-header">Data Jurnalis</h1>
				
				<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalJur">
					  <i class="fa fa-fw  fa-user-plus"></i></i>&nbsp;Register Akun Jurnalis
					</button><br><br>
			</div>
			
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Id Jurnalis</th>
			   <th>NIK</th>
			    <th>Nama</th>
              <th>Alamat</th>
			  <th>Jabatan</th>
              <th width='15%' ><span class="glyphicon glyphicon-tasks"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Query Select pekerjaan -->
            <?php
            $query="SELECT * FROM jurnalis ORDER BY id_jurnalis ASC";
            $tampil = mysqli_query($conn,$query);
            $no = 1; // nomor baris
            while ($r = mysqli_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no.</td>
              <td>$r[id_jurnalis]</td>
			  <td>$r[nik_jurnalis]</td>
			  <td>$r[nm_jurnalis]</td>
			  <td>$r[alamat]</td>
			  <td>$r[jabatan]</td>
              
              
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_jurnalis'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#edit_jurnalis"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_jurnalis'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus_jurnalis"><i class="glyphicon glyphicon-trash"></i></button>
              </td>
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";

		  ?>


		  
		  <!-- Modal tambah -->
<div class="modal fade" id="ModalJur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Form Tambah Jurnalis</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="panel-body">
		
		
		<?php
			// membuat kode otomatis 

$query = "SELECT max(id_jurnalis) as maxKode FROM jurnalis";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$id_jurnalis = $data['maxKode'];

$noUrut = (int) substr($id_jurnalis, 3, 3);

$noUrut++;

$char = "JR";
$newID = $char . sprintf("%03s", $noUrut);

		?>
		
			<form role="form" method="post" action="proses_jurnalis.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>ID Jurnalis</label>
					<input type="text" name="id_jurnalis" class="form-control" value="<?php echo $newID ?>" readonly=""  required="">
				</div>
				
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Masukkan Password"  required="">
				</div>
				
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik_jurnalis" class="form-control" maxlength="16" placeholder="Masukkan NIK" maxlenght="16" required="" onkeypress="return isNumberKey(event)" >
				</div>
				
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nm_jurnalis" class="form-control" placeholder="Masukkan Nama" required="" onkeypress="return isAlphabetKey(event)">
				</div>
				
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" class="form-control" >
					</textarea>
				</div>
				
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="no_telp" class="form-control" placeholder="Masukkan Nomor Telpon" required="" onkeypress="return isNumberKey(event)">
				</div>
				
				<div class="form-group">
					<label>Jabatan</label>
					<input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan">
				</div>				
				
				<div class="form-group">
					<label>Foto - Format PNG./JPG. uk.170x170</label>
					<input type="file" name="foto" required="" >
				</div>	
				
			
		</div>
		
      </div>
      <div class="modal-footer" >
        <button type="submit" name="tambah_jurnalis" class="btn btn-primary">Tambah</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </form>
	  </div>
    </div>
  </div>
</div>
<!-------ubah data jurnalis--------->

<div class="modal fade" id="edit_jurnalis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Jurnalis</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="post" action="proses_jurnalis.php" enctype="multipart/form-data">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="edit_jur"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="edit" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>


		<!--****************** Hapus ******************-->
<div class="modal fade" id="hapus_jurnalis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Informasi</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_jurnalis.php">
            <div class="box-body">
              Yakin ingin menghapus data jurnalis ini ?

            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <input type="hidden" id="id_jurnalis" name="id" value="">
              <br>
			  <button name="hapus_jurnalis" type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->

  <script>
function ubahdata(id_jurnalis){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("edit_jur").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah_jurnalis.php?id="+id_jurnalis+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_jurnalis){
    document.getElementById('id_jurnalis').value=id_jurnalis;
}
</script>  
