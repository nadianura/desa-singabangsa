	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Daftar Berita (Published)</h3>
				
				<!-- Button trigger modal -->
					
					<button type="button" class="btn btn-md btn-primary">
					  <i class="fa fa-fw fa-sticky-note"></i>&nbsp;
					  <a href="home.php?page=kategori"><font color="white">Lihat Kategori</font></a>
					</button>
					<button type="button" class="btn btn-md btn-primary">
					  <i class="fa fa-fw  fa-user-plus"></i>&nbsp;
					  <a href="home.php?page=draft"><font color="white">Lihat Draft</font></a>
					</button>
					<br><br>
				
				
			</div>
	</div><!--/.row-->
				
		<div class="row">
		
			
			<?php
		$query = "select * from informasi where status='publish' order by id_info";
		$tampil = mysqli_query($conn,$query);
		while ($hasil = mysqli_fetch_array($tampil)) {
        ?>   
						
			<div class="col-md-4">
				<div class="panel panel-primary">
				
				<!--notifikasi komentar-->
				
				<?php
				$id_info = $hasil['id_info'];
				$sql = "SELECT COUNT(flag)
					  FROM komentar
					  WHERE flag='0' AND id_info='$id_info' ";
						$query = mysqli_query($conn,$sql);
						$result = mysqli_fetch_array($query);
						$komen = $result['0'];
						

				?>
				
				<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em>
							<?php
								if($komen==0){
									echo "";
									}else if($komen>0){
									echo "<span class='label label-danger'>$komen</span>";
								}
							?>
						
					
						
						
					
					
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="home.php?page=komen_lkp&&id=<?php echo $hasil['id_info']?>">
								<div><em class="fa fa-envelope"></em><b><i> <?php echo $komen ;?> Komentar</i></b>,<br> 
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;menunggu persetujuan !
								</div>
							</a></li>
							
						</ul>
					</li>
					</ul>
					<div class="panel-heading">
					<a href="home.php?page=info_lkp&&id=<?php echo $hasil['id_info']?>">
							<font color="white"><?php echo "$hasil[id_info]";?></font>
						</a>
						
						</div>
					<div class="panel-body" align="center">
						<p><?php echo "$hasil[judul]";?></p>
					<button type="button" class="btn btn-danger" value='<?php echo $hasil['id_info'];?>' onclick="hapusdata(this.value)" data-toggle="modal" data-target="#hapus_info"><i class="glyphicon glyphicon-trash"></i></button>
					
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
function ubahdata(id_info){
    var ajaxbos = new XMLHttpRequest();
        ajaxbos.onreadystatechange= function(){
            if(ajaxbos.readyState==4 && ajaxbos.status==200){
                document.getElementById("ubah_pek").innerHTML= ajaxbos.responseText;
            }
        };
        ajaxbos.open("GET","ubah/edit_pekerjaan.php?id="+id_info+"&s=#",true);
        ajaxbos.send();
    }
function hapusdata(id_info){
    document.getElementById('id_info').value=id_info;
}
</script>  