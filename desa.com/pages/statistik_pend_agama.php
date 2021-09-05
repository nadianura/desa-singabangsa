<?php
include "../koneksi/koneksi.php";
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- data 1-->
	  
      <div class="row">

	  <div class="col-md-12" align="center">
        
          <h3>Kategori Agama</h3>
         
	 
       <div id="piechart"></div>
	   
	   <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Kategori', 'Agama'],
  ['Islam', 
  <?php
	$sql = "SELECT count(agama) as hasil_islam from penduduk WHERE agama='islam'";
	$query = mysqli_query($conn,$sql);
	$data=mysqli_fetch_assoc($query);
    echo $data['hasil_islam'];
  ?>
  ],
  ['Kristen', 
  <?php
	$sql = "SELECT count(agama) as hasil_kristen from penduduk WHERE agama='kristen'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_kristen'];
  ?>
  ],
  ['Budha', 
  <?php
	$sql = "SELECT count(agama) as hasil_budha from penduduk WHERE agama='budha'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_budha'];
  ?>
  ],
  ['Hindu', 
  <?php
	$sql = "SELECT count(agama) as hasil_hindu from penduduk WHERE agama='hindu'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_hindu'];
  ?>
  ],
  ['Konghucu',
  <?php
	$sql = "SELECT count(agama) as hasil_konghucu from penduduk WHERE agama='konghucu'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_konghucu'];
  ?>
  ],
  ['Konghucu',
  <?php
	$sql = "SELECT count(agama) as hasil_lain from penduduk WHERE agama='lain-lain'";
	$query = mysqli_query($conn,$sql);
  $data=mysqli_fetch_assoc($query);
    echo $data['hasil_lain'];
  ?>
  ]
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Statistik Agama Di Desa Singabangsa', 'width':550, 'height':400};

  // Display the chart inside the div element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

	  <hr> 
         
        </div>
      </div>
      <!-- /.row -->

          
