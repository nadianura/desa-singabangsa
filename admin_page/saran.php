	
	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Daftar Kritik & Saran Masyarakat</h3>
				
				
			</div>
			
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Id Saran</th>
			   <th>Nama</th>
			    <th>Email</th>
              <th>No. Telpon</th>
			  <th>Tanggal</th>
			  <th>Isi</th>
              <th width='10%' >Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Query Select pekerjaan -->
            <?php
            $query="SELECT * FROM saran ORDER BY tanggal ASC";
            $tampil = mysqli_query($conn,$query);
            $no = 1; // nomor baris
            while ($r = mysqli_fetch_array($tampil)) {
            echo "
            <tr>
              <td>$no.</td>
              <td>$r[id_saran]</td>
			  <td>$r[nama_masy]</td>
			  <td>$r[email]</td>
			  <td>$r[notelp]</td>
			  <td>$r[tanggal]</td>
			  <td>$r[isi_saran]</td>
              
              
              <td> "; ?>
                <!-- Button trigger modal -->
           
                <button type="button" class="btn btn-danger" value='<?php echo $r['id_saran'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-trash"></i></button>
				<a href="mailto:<?php echo $r['email'];?>"><button type="button" class="btn btn-md btn-success" value="" ><i class="fa fa-envelope-o"></i></button></a>
				
              </td>
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";

		  ?>


		  
		

		<!--****************** Hapus ******************-->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus Saran</h4>
      </div>
      <div class="modal-body">
        <!-- general form elements -->
          <!-- form start -->
          <form role="form" method="POST" action="proses_saran.php">
            <div class="box-body">
              Yakin ingin menghapus saran ini ?

            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <input type="hidden" id="id_saran" name="id" value="">
              <br>
			  <button name="hapus_saran" type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->

  <script>

function hapusdata(id_saran){
    document.getElementById('id_saran').value=id_saran;
}
</script>  

