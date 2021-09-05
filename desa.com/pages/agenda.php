<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php"><b>Beranda</b></a>
        </li>
        <li class="breadcrumb-item active" >Agenda</li>
      </ol>
    <center>
     <div class="col-lg-20" align="left">
     
     <h3>Agenda Desa</h3>
     
<div class="mb-3" id="accordion" role="tablist" aria-multiselectable="true">
 <div class="card">
      <?php
      include"../koneksi/koneksi.php";
    $query = "select * from agenda order by tanggal";
    $tampil = mysqli_query($conn,$query);
    while ($hasil = mysqli_fetch_array($tampil)) {
       ?>   
    
    
      
          <div class="card-header" role="tab" id="headingTwo" align="left">
            <h5 class="mb-0">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <a href="pages/agenda_lkp.php?id=<?php echo $hasil['id_agenda']?>">
        <?php echo "$hasil[judul]";?>
        </a> 
              </a>
            </h5>
          </div>
         
      
<?php
    }
?>
 </div> 
   </div>

  </div>
  </center>
  </div>
    <!-- /.container -->