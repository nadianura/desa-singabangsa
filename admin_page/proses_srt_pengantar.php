<?php
  include('../koneksi/koneksi.php');
  session_start(); //Mendapatkan Session
  date_default_timezone_set('Asia/Jakarta');
  
  
  $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
  $time= 'Singabangsa,' .date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ;
  $day = date('d', time());
  $bulan[date('m')];
  $year = date('Y', time());
  $admin=$_POST['admin'];
  $keterangan=$_POST['keterangan'];
  $uraian=$_POST['uraian'];
  
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
    margin-left:45px;
  }
  </style>
  <table class='kop'>
  <tr>
    <td align='center' width='80'><img src='../images/logo.png' width='90' height='100'></td>
    <td width='635'>
      <h2 align='center'>PEMERINTAH KABUPATEN BOGOR<br>KECAMATAN TENJO<b><br>KANTOR KEPALA DESA SINGABANGSA</b></h2>
      <p class='kop' align='center'>JALAN TEGAL PONDOH SINGABANGSA KODE POS 16370</p>
    </td>
  </tr>
  <hr>

  </table> 
  <br><br>
  <table border='0' align='right'>
<tr>
<td width='200' align='center'>
  
  $time
  <br><br>
  Kepada<br>
  Yth,  Camat Tenjo<br>                                                           
  di tempat
</td>
</tr>
  </table>
  <p align='center'>
  <br><br><br><br>
  <br><br><br><br>
    <table cellpadding='5' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>No.</th>
        <th style='width: 230px;'>Uraian</th>
        <th style='width: 150px;'>Banyaknya</th>
        <th style='width: 230px;'>Keterangan</th>
      </tr>";
      // Menampilkan data
      $query = mysqli_query("SELECT * FROM jurnalis");
      $no = 1; // nomor baris
      $r = mysqli_fetch_array($query);
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td style='width: 230px;'>$uraian</td>
        <td style='width: 150px;'>2 ( Dua ) Lembar Lampiran</td>
        <td style='width: 230px;'>$keterangan</td>
      </tr>";
      $no++;
      
	date_default_timezone_set('Asia/Jakarta');
	$date = date('d/m/Y - H:i', time());
    $content.="</table></p>
	<br><br>
  <br><br>
  <br><br>
  <br><br>
	<p align='center'>
	 Kepala Desa Singabangsa<br>
	<br><br>
  <br><br>
  <br><br>
    _______________________
  </p>";
	

  $filename="Laporan_Jurnalis ".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

  ob_end_clean();
  // conversion HTML => PDF
  try
  {
    $html2pdf = new HTML2PDF('P', 'A4','en', false, 'ISO-8859-15');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->pdf->IncludeJS('print(TRUE)');
    $html2pdf->Output($filename);
  }
  catch(HTML2PDF_exception $e) { echo $e; }
?>

