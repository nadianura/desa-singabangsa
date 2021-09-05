<?php
  include('../koneksi/koneksi.php');
  session_start(); //Mendapatkan Session

  
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
    margin-left:45px;
  }
  </style>
  <table class='kop'>
  <tr>
    <td align='center' width='150'><img src='../images/logo.png' width='90' height='100'></td>
    <td width='470'>
      <h2 align='center'>PEMERINTAH KABUPATEN BOGOR<br>KECAMATAN TENJO<br><b>KANTOR KEPALA DESA SINGABANGSA</b></h2>
      <p class='kop'>JALAN TEGAL PONDOH SINGABANGSA KODE POS 16370</p>
    </td>
  </tr>
  </table> <br>
  <hr> <br>
  <h3 align='center'>Data Jurnalis</h3>
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>No.</th>
        <th style='width: 80px;'>ID Jurnalis</th>
        <th style='width: 100px;'>NIK</th>
        <th style='width: 120px;'>Nama</th>
		<th style='width: 120px;'>No.Telpon</th>
		<th style='width: 120px;'>Jabatan</th>
      </tr>";
      // Menampilkan data
      $query = mysqli_query($conn,"SELECT * FROM jurnalis");
      $no = 1; // nomor baris
      while ($r = mysqli_fetch_array($query)) {
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[id_jurnalis]</td>
        <td style='text-transform:capitalize'>$r[nik_jurnalis]</td>
        <td style='text-align:center'>$r[nm_jurnalis]</td>
		<td style='text-align:center'>$r[no_telp]</td>
		<td style='text-align:center'>$r[jabatan]</td>
      </tr>";
      $no++;
      }
	date_default_timezone_set('Asia/Jakarta');
	$date = date('d/m/Y - H:i', time());
    $content.="</table></p><br><br>
	
	<p align='left'>
	<pre align='left'>
	<i>Dicetak Pada : $date.</i>
	
	<i>Oleh Admin   : $admin.</i>
	
	</pre>
	
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

