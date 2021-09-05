	<div class="row">
			<div class="col-lg-12" align="center">
				<h1 class="page-header">Kategori Berita</h1>
				
				<button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambah_kt">
					  <i class="fa fa-fw fa-plus"></i>&nbsp;Tambah Kategori
					</button><br><br>
			</div>
			
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Id Kategori</th>
              <th>Nama Kategori</th>
              <th width='15%' ><span class="glyphicon glyphicon-tasks"></span></th>
            </tr>
          </thead>
          <tbody>
            <!-- Query Select pekerjaan -->
            <?php
            $query="SELECT * FROM kategori ORDER BY id_kategori ASC";
            $tampil = mysqli_query($conn,$query);
            $no = 1; // nomor baris
            while ($r = mysqli_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no.</td>
              <td>$r[id_kategori]</td>
              <td style='text-transform:capitalize'>$r[nm_kategori]</td>
              
              <td> "; ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning" value='<?php echo $r['id_kategori'];?>' onclick="ubahdata(this.value)" data-toggle="modal" data-target="#ubah_kt"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_kategori'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus_kt"><i class="glyphicon glyphicon-trash"></i></button>
              </td>
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";

		  ?>
		  
		  <!--////////////////////////////////////////// Modals //////////////////////////////////////////-->
  <!--****************** Tambah ******************-->
<div class="modal fade" id="tambah_kt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
        <!-- form start -->
        <form role="form" method="POST" action="proses_kategori.php">
          <div class="box-body">
            <div class="form-group">
              <?php


$query = "SELECT max(id_kategori) as maxKode FROM kategori";
$hasil = mysqli_query($query);
$data  = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];

$noUrut = (int) substr($kode, 3, 3);
$noUrut++;
$char = "KT";
$newID = $char . sprintf("%03s", $noUrut);//ini adalah variabel untuk id baru

//Memasukkan data textbox ke database
              ?>
              <label>ID Kategori</label>
              <input name="id_kategori" type="text" class="form-control" value="<?php echo $newID ?>" readonly="" required>
            </div>
            <div class="form-group">
              <label>Nama Kategori</label>
              <input name="nm_kategori" type="text" class="form-control" placeholder="Masukkan Jenis kategori" maxlength="50" required="" onkeypress="return isAlphabetKey(event)" style="text-transform: capitalize;">
            </div>
            
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <button name="tambah_kt" type="submit"  class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Ubah ******************-->
<div class="modal fade" id="ubah_kt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ubah Kategori</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_kategori.php">
            <div class="box-body">
              <!-- Ubah Data -->
              <span id="ubah_ktg"></span>
              <!-- End Ubah Data -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button name="ubah_kt" type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!--****************** Hapus ******************-->
<div class="modal fade" id="hapus_kt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Kategori</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_kategori.php">
            <div class="box-body">
              Yakin ingin menghapus data ?
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" id="id_kategori" name="id" value="">
              <br>
			  <button name="hapus_kt" type="submit" class="btn btn-primary">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->
<!-- Modal Ubah & hapus data -->
<script>
function ubahdata(id_kategori){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("ubah_ktg").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah_kategori.php?id="+id_kategori+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_kategori){
    document.getElementById('id_kategori').value=id_kategori;
}
</script>


