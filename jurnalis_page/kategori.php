	<div class="row">
			<div class="col-lg-12" align="center">
				<h3 class="page-header">Kategori Berita</h3>
				
			</div>
			
		</div><!--/.row-->
		
		
		<div class="panel panel-container">
		
			
			<table id="datatable" class="table table-striped table-bordered">
          <thead>
            <tr>
             <th style='width: 30px; height: 20px'>No.</th>
              <th style='text-align:center'>Id Kategori</th>
              <th style='text-align:center'>Nama Kategori</th>
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
              <td style='text-align:center'>$no.</td>
              <td style='text-align:center'>$r[id_kategori]</td>
              <td style='text-align:center'>$r[nm_kategori]</td>
              "; ?>
                
            </tr>
            <?php
            $no++;}

        //    <!-- End Data Cabang -->
          echo"</table >";

		  ?>

