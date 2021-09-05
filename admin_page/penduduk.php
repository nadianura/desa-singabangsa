	
	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Data Penduduk</h3>
				
				<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalPenduduk">
					  <i class="fa fa-fw  fa-user-plus"></i>&nbsp;Tambah Data Penduduk
				</button>
				<a href="datatable_penduduk/"><button type="button" class="btn btn-md btn-primary" >
					  <span class="glyphicon glyphicon-search"></span></i>&nbsp;Lihat Data Penduduk
				</button></a><br><br>
			</div>
			
		</div><!--/.row-->
		
		
		
			
			<center><b>Pilih kategori statistik penduduk di bawah ini</b><br>
<b><a href="home.php?page=penduduk&&statistik=jenkel">Jenis Kelamin</a>
<a href="home.php?page=penduduk&&statistik=umur">Umur</a>
<a href="home.php?page=penduduk&&statistik=pendidikan">pendidikan</a>
<a href="home.php?page=penduduk&&statistik=agama">agama</a>
</center><hr>
			
		  <?php
		  //include statistik
		  
		  if(isset($_GET['statistik'])){
      switch($_GET['statistik']){
          case 'jenkel'  : include "../desa.com/pages/statistik_pend_jenkel.php"; break;
          case 'umur'  : include "../desa.com/pages/statistik_pend_umur.php"; break;
		  case 'pendidikan'  : include "../desa.com/pages/statistik_pend_pendidikan.php"; break;
		  case 'agama'  : include include "../desa.com/pages/statistik_pend_agama.php"; break;
          default : include '404.php';
      }
  }else{
      include "../desa.com/pages/statistik_pend_jenkel.php";
  }
		  
		  
		  
		  
		  
		  
		  
		  
		  ?>

		  
		  <!-- Modal Tambah -->
<div class="modal fade" id="ModalPenduduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Form Tambah Penduduk</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="panel-body">
		
		
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
	  </div>
    </div>
  </div>
</div>

										<!-----------ubah------------->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Data Penduduk</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_penduduk.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="ubah_penduduk"></span>
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
          <form role="form" method="POST" action="proses_penduduk.php">
            <div class="box-body">
              Yakin ingin menghapus data Penduduk ini ?

            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <input type="hidden" id="nik" name="id" value="">
              <br>
			  <button name="hapus" type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->

  <script>
function ubahdata(nik){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("ubah_penduduk").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah_penduduk.php?id="+nik+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(nik){
    document.getElementById('nik').value=nik;
}
</script>  
