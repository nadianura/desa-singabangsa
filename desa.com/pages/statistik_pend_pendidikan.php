<?php
include "../koneksi/koneksi.php";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- data 1-->
	  
      <div class="row">

	  <div class="col-md-12" align="center">
        
          <h3>Kategori Pendidikan</h3>
         
	 
       <div id="piechart"></div>
	   
	   <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Kategori', 'Pendidikan'],
  ['sd', 
  <?php
	$sql = "SELECT count(pendidikan) as hasil_sd from penduduk WHERE pendidikan='sd'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_sd'];
  ?>
  ],
  ['smp', 
  <?php
	$sql = "SELECT count(pendidikan) as hasil_smp from penduduk WHERE pendidikan='smp'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_smp'];
  ?>
  ],
  ['sma', 
  <?php
	$sql = "SELECT count(pendidikan) as hasil_sma from penduduk WHERE pendidikan='sma'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_sma'];
  ?>
  ],
  ['perguruan tinggi', 
  <?php
	$sql = "SELECT count(pendidikan) as hasil_pt from penduduk WHERE pendidikan='perguruan tinggi'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_pt'];
  ?>
  ],
  ['lain-lain',
  <?php
	$sql = "SELECT count(pendidikan) as hasil_ln from penduduk WHERE pendidikan='lain-lain'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_ln'];
  ?>
  ],
   
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Statistik Pendidikan Di Desa Singabangsa', 'width':550, 'height':400};

  // Display the chart inside the div element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

	  <hr> 
         
        </div>
      </div>
      <!-- /.row -->

          
