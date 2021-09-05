<?php
  include('../koneksi/koneksi.php');
  session_start(); //Mendapatkan Session
  
 date_default_timezone_set('Asia/Jakarta');
 $date1 = date('d/m/Y - H:i', time());
 $date2 = date('d/m/Y', time());
 
 $ket=$_POST['ket'];
 $admin=$_POST['admin'];
  
  
  date_default_timezone_set('Asia/Jakarta');
  function tglIndonesia($str){
        $tr   = trim($str);
        $str    = str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
        return $str;
    }

  ob_start();
  //Report
  require ("../html2pdf/html2pdf.class.php");
  $content = ob_get_clean();

  $content.= "
  <style>
  p.kop{
    margin-left:50px;
  }
  </style>
  <br><br><br><br>
  <br><br>
  
  <table class='kop' border='0' align='center'>
  <tr>
    <td align='left' width='900' >
		 <p>PEMERINTAH KABUPATEN BOGOR<br>
			KECAMATAN TENJO<br>
			KANTOR KEPALA DESA SINGABANGSA</p>
    </td>
  </tr>
  <tr>
  
		<td align='center'><p>
	<br><br><br><br>
	LAPORAN BULANAN PENDUDUDK<br>
	DESA SINGABANGSA<br>
	$date2
		</p>
	</td>
	
  </tr>
  </table>
  
   <h4 align='center'><br><br><br><br>Kelompok Jenis Kelamin</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
	  <tr bgcolor='#CCCCCC'>
		<th style='width: 100px; height: 20px'>Jenis Kelamin</th>
        <th style='width: 150px;'>Laki-Laki</th>
        <th style='width: 100px;'>Perempuan</th>
      </tr>";
      // Menampilkan data
      
      $content.="
	  <tr>
		<td>Jumlah (jiwa)</td>
		
		<td>";
			$sql = "SELECT count(jenkel) as hasil_lk from penduduk WHERE jenkel='laki-laki'";
			$query = mysqli_query($conn,$sql);
			$data=mysqli_fetch_assoc($query);
		    $content.="$data[hasil_lk]
		 </td>
		
		<td>";
			$sql = "SELECT count(jenkel) as hasil_pr from penduduk WHERE jenkel='perempuan'";
			$query = mysqli_query($sql);
			$data=mysqli_fetch_assoc($query);
		    $content.="$data[hasil_pr]
		</td>
	</tr>
	  ";
	  
    $content.="</table></p>
	
	<h4 align='center'>Kelompok Umur</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
	  <tr bgcolor='#CCCCCC'>
		<th style='width: 100px; height: 20px'>Umur</th>
        <th style='width: 100px;'>0-4 tahun</th>
        <th style='width: 100px;'>5-9 tahun</th>
		<th style='width: 100px;'>10-15 tahun</th>
		<th style='width: 100px;'>16-25 tahun</th>
		<th style='width: 100px;'>26-40 tahun</th>
		<th style='width: 100px;'>41-55 tahun</th>
		<th style='width: 110px;'>56 tahun keatas</th>
      </tr>";
     
      
      $content.="
	  <tr>
		<td>Jumlah (jiwa)</td>
		
		<td>";
			$sql = "SELECT COUNT( umur ) AS hasil_1 FROM penduduk WHERE umur >  '0' AND umur <  '5'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_1]
		 </td>
		
		<td>";
			$sql = "SELECT COUNT( umur ) AS hasil_2 FROM penduduk WHERE umur >  '4' AND umur <  '10'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_2]
		</td>
		
		<td>";
			$sql = "SELECT count(umur) as hasil_3 from penduduk WHERE umur >  '8' AND umur <  '16'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_3]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(umur) as hasil_4 from penduduk WHERE umur >  '15' AND umur <  '26'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_4]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(umur) as hasil_5 from penduduk WHERE umur >  '25' AND umur <  '41'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_5]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(umur) as hasil_6 from penduduk WHERE umur >  '40' AND umur <  '56'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_6]
		</td>
		
		<td>";
			$sql = "SELECT count(umur) as hasil_7 from penduduk WHERE umur >  '55'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_7]
		</td>
	
	</tr>
	  ";
	  
	  $content.="</table></p>
	
	<h4 align='center'><br><br><br><br><br><br><br><br><br><br><br><br>Kelompok Agama</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
	  <tr bgcolor='#CCCCCC'>
		<th style='width: 100px; height: 20px'>Agama</th>
        <th style='width: 100px;'>Islam</th>
        <th style='width: 100px;'>Kristen</th>
		<th style='width: 100px;'>Budha</th>
		<th style='width: 100px;'>Hindu</th>
		<th style='width: 100px;'>Konghucu</th>
		<th style='width: 100px;'>Lain-lain</th>
      </tr>";
     
      
      $content.="
	  <tr>
		<td>Jumlah (jiwa)</td>
		
		<td>";
			$sql = "SELECT count(agama) as hasil_islam from penduduk WHERE agama='islam'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_islam]
		 </td>
		
		<td>";
			$sql = "SELECT count(agama) as hasil_kristen from penduduk WHERE agama='kristen'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_kristen]
		</td>
		
		<td>";
			$sql = "SELECT count(agama) as hasil_budha from penduduk WHERE agama='budha'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_budha]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(agama) as hasil_hindu from penduduk WHERE agama='hindu'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_hindu]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(agama) as hasil_konghucu from penduduk WHERE agama='konghucu'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_konghucu]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(agama) as hasil_lain from penduduk WHERE agama='lain-lain'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_lain]
		</td>
		
	</tr>
	  ";
	  
	   $content.="</table></p>
	
	<h4 align='center'>Kelompok Pendidikan</h4>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
	  <tr bgcolor='#CCCCCC'>
		<th style='width: 120px; height: 20px'>Pendidikan</th>
        <th style='width: 100px;'>SD</th>
        <th style='width: 100px;'>SMP</th>
		<th style='width: 100px;'>SMA</th>
		<th style='width: 170px;'>Perguruan Tinggi</th>
		<th style='width: 100px;'>Lain-lain</th>
      </tr>";
     
      
      $content.="
	  <tr>
		<td>Jumlah (jiwa)</td>
		
		<td>";
			$sql = "SELECT count(pendidikan) as hasil_sd from penduduk WHERE pendidikan='sd'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_sd]
		 </td>
		
		<td>";
			$sql = "SELECT count(pendidikan) as hasil_smp from penduduk WHERE pendidikan='smp'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_smp]
		</td>
		
		<td>";
			$sql = "SELECT count(pendidikan) as hasil_sma from penduduk WHERE pendidikan='sma'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_sma]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(pendidikan) as hasil_pt from penduduk WHERE pendidikan='perguruan tinggi'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_pt]
		 </td>
		 
		 <td>";
			$sql = "SELECT count(pendidikan) as hasil_ln from penduduk WHERE pendidikan='lain-lain'";
			$query = mysql_query($sql);
			$data=mysql_fetch_assoc($query);
		    $content.="$data[hasil_ln]
		 </td>
	</tr>
	  ";
	 
	$wkt = date('d - m - Y', time());
    $content.="</table></p>
	<br><br><br><br>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0 align='center'>
	  <tr>
		
        <th style='width: 200px;'><p align='center'>
	Mengetahui :<br><br>
	Kepala Desa Singabangsa
	<br><br><br><br><br><br>
	
	______________________
	
	
	</p></th>
        <th style='width: 100px;'></th>
		<th style='width: 100px;'></th>
		<th style='width: 100px;'></th>
		<th style='width: 250px;'><p align='center'>
		Singabangsa, $wkt<br><br>
		Petugas Register Kependudukan
		<br><br><br><br><br><br>
	
	______________________</p>
		</th>
      </tr>";
     
      
      $content.="
	  
	  ";
	  
	  $content.="</table></p>
	
	";
	

  $filename="Laporan_Jurnalis ".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

  ob_end_clean();
  // conversion HTML => PDF
  try
  {
    $html2pdf = new HTML2PDF('L', 'A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>

