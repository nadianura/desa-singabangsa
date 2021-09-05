	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Data Jurnalis</h3>
				
				
			</div>
			
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Id Jurnalis</th>			   
			    <th>Nama</th>
              <th>Alamat</th>
			  <th>No.Telepon</th>
			  <th>Jabatan</th>
              
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
			  <td>$r[nm_jurnalis]</td>			  
			  <td>$r[alamat]</td>
			  <td>$r[no_telp]</td>
			  <td>$r[jabatan]</td>
              "; ?>
              
              
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";

		  ?>

