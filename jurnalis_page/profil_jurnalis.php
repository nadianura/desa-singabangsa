	<?php
      $id = $_SESSION['id_jurnalis'];      
      $sql = "select * from jurnalis where id_jurnalis='".$id."'";
      $query = mysqli_query($conn,$sql);
      while($data = mysqli_fetch_array($query)){
      ?>
	  
	  <div class="row">
			<div class="col-lg-12" align="left">
				<h5 class="page-header"> <?php echo "<p>Your Profile, ".$data['nm_jurnalis']."</p>";    ?> </h5>
				
			</div>
		</div><!--/.row-->
	  
		
		<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						
						
						
							<div class="large">Aktif</div>
							<div class="text-muted">Status</div>
						</div>
					</div>
				</div>
				
				<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4"><br>
						<?php
						$nm_foto= $data['foto'];
						echo "<img width='170' height='170' alt='$nm_foto' src='../images/".$data['foto']."'>"
						;?>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h3>
                            <?php echo $data['nm_jurnalis'] ;?>
						</h3>
                        <big><cite title="San Francisco, USA"><?php echo $data['alamat'] ;?><i class="glyphicon glyphicon-map-marker">
                        </i></cite>
						</big><br><hr>
                        <p>
                            <i class="fa fa-fw fa-user"></i>&nbsp;ID&nbsp;-&nbsp; <?php echo $data['id_jurnalis']?>
                            <br />
                            <i class="fa fa-fw fa-credit-card"></i>&nbsp;NIK&nbsp;-&nbsp; <?php echo $data['nik_jurnalis']?>
                            <br />
                            <i class="fa fa-fw fa-phone"></i>&nbsp;No.Telepon&nbsp;-&nbsp;<?php echo $data['no_telp']?>
							<br />
							<i class="fa fa-fw fa-suitcase"></i>&nbsp;Jabatan&nbsp;-&nbsp;<?php echo $data['jabatan']?>
							 
							 
                        <!-- Split button -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
		</div>
		
		
		
	<?php
	  }
      ?>
