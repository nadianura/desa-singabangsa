	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Draft Berita Dari Anda</h3>
				
				<!-- button tmb_info -->
					<a href="form_input/"><button type="button" class="btn btn-md btn-success">
					  <i class="fa fa-fw fa-plus"></i>&nbsp;Tambah Berita
					</button></a>
					<button type="button" class="btn btn-md btn-success">
					  <i class="fa fa-fw fa-sticky-note"></i>&nbsp;
					  <a href="home.php?page=kategori"><font color="white">Lihat Kategori</font></a>
					</button>
					
					<br><br>
				
				
			</div>
	</div><!--/.row-->
		
		

		
		<div class="row">
		
			
			<?php
		$id= $_SESSION['id_jurnalis'] ;
		$query = "select * from informasi WHERE status='draft' AND id_jurnalis='$id' order by tgl_post ASC";
		$tampil = mysqli_query($conn,$query);
		while ($hasil = mysqli_fetch_array($tampil)) {
        ?>   
						
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<a href="home.php?page=info_lkp&&id=<?php echo $hasil['id_info']?>">
							<font color="white"><?php echo "$hasil[judul]";?></font>
						</a>
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
						</div>
					<div class="panel-body" align="center">
						<p><?php echo "$hasil[headline]";?></p>
					<button type="button" class="btn btn-danger" value="<?php echo $hasil['id_info'];?>" onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus_info"><i class="glyphicon glyphicon-trash"></i></button>
					</div>
					
				</div>
				
			</div>
			
			<?php
		}
			?>
			
	</div>
	
	
	
	
	
	<!--****************** Hapus ******************-->
<div class="modal fade" id="hapus_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          <form role="form" method="POST" action="proses_informasi.php">
            <div class="box-body">
              Yakin ingin menghapus informasi ini ?

            </div>
            <!-- /.box-body -->
            <div class="box-footer" align="center">
              <input type="hidden" id="id_info" name="id" value="">
              <br>
			  <button name="hapus_info" type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
  <!--////////////////////////////////////////// End Modals //////////////////////////////////////////-->
  
 <script>
 function hapusdata(id_info){
    document.getElementById('id_info').value=id_info;
}
</script>  
