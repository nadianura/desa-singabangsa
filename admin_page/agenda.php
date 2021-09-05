	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Daftar Agenda</h3>
				
				<!-- Button trigger modal -->
					<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalInput">
					  <i class="fa fa-fw fa-plus"></i>&nbsp;Tambah Agenda
					</button>
					
					<br><br>
				
				
			</div>
	</div><!--/.row-->
		
		


<!-- Modal -->
<div class="modal fade" id="ModalInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="panel-body">
		
		
		<?php
			// membuat kode otomatis 
//membaca kode terbesar
$query = "SELECT max(id_agenda) as maxKode FROM agenda";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$id_agenda = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id_agenda, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "AG";
$newID = $char . sprintf("%03s", $noUrut);

//Memasukkan data textbox ke database
		?>
		
			<form role="form" method="post" action="proses_agenda.php" enctype="multipart/form-data">
			
				<div class="form-group">
					<label>ID Agenda</label>
					<input type="text" name="id_agenda" class="form-control" value="<?php echo $newID ?>" readonly="" required>
				</div>
				
				<div class="form-group">
					<label>Judul</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Agenda" required>
				</div>
				
				<div class="form-group" name="tanggal">
					<label>Tanggal</label>
					<input type="text" name="tanggal" class="form-control" placeholder="('Y-m-d')"  required>
				</div>
				
				<div class="form-group">
					<label>Isi</label>
					<textarea name="isi" class="form-control" required>
					</textarea>
				</div>
				
				<div class="form-group">
					<label>Gambar - Format PNG./JPG. uk.700x400</label>
					<input type="file" name="foto" required>
				</div>
				
				<div class="form-group" name="id_pegawai">
				
				<?php 
				
				include"../koneksi/koneksi.php";
				$id=$_SESSION['id_pegawai'];
				$query = mysqli_query($conn,"SELECT * FROM pegawai where id_pegawai='".$id."'");
				$result = mysqli_fetch_array($query);
				?>
					<label>Diinput Oleh <?php echo $result['nm_pegawai'];?> - (<?php echo $id;?>)</label>
					<input name="id_pegawai" type="hidden" class="form-control" value="<?php echo $id;?>" readonly required>
					
				</div>
				
			
		</div>
		
      </div>
      <div class="modal-footer" >
        <button type="submit" name="tambah_agenda" class="btn btn-primary">Posting</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </form>
	  </div>
    </div>
  </div>
</div>
		
		<div class="row">
		
			
			<?php
		$query = "select * from agenda order by tanggal";
		$tampil = mysqli_query($conn,$query);
		while ($hasil = mysqli_fetch_array($tampil)) {
        ?>   
						
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<a href="home.php?page=agenda_lkp&&id=<?php echo $hasil['id_agenda']?>">
							<font color="white"><?php echo "$hasil[tanggal]";?></font>
						</a>
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
						</div>
					<div class="panel-body" align="center">
						<p><?php echo "$hasil[judul]";?></p>
					<button type="button" class="btn btn-danger" value='<?php echo $hasil['id_agenda'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus_info"><i class="glyphicon glyphicon-trash"></i></button>
					</div>
					
				</div>
				
			</div>
			
			<?php
		}
			?>
			
			
		<!--****************** Hapus ******************-->
<div class="modal fade" id="hapus_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Agenda</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_agenda.php">
            <div class="box-body">
              Yakin ingin menghapus Agenda ini ?

            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <input type="hidden" id="id_agenda" name="id" value="">
              <br>
			  <button name="hapus_agenda" type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->

<script>

function hapusdata(id_agenda){
    document.getElementById('id_agenda').value=id_agenda;
}
</script>  