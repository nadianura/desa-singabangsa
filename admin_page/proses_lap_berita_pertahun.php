<?php
  session_start(); //Mendapatkan Session
  include('../koneksi/koneksi.php');
  $tahun = $_POST['tahun'];
  $admin =$_POST['admin'];

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
      <h2 align='center'>PEMERINTAH KABUPATEN BOGOR<br>KECAMATAN TENJO<br><b>KANTOR KEPALA DESA SINGABANGSA</b></h2>
      <p class='kop' align='center'>JALAN TEGAL PONDOH SINGABANGSA KODE POS 16370</p>
    </td>
  </tr>
  </table> <br>
  <hr> <br>
  <h4 align='center'>Data Informasi Ter-Publish (Pertahun)</h4>
 
  <p align='center'>
    <table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
      <tr bgcolor='#CCCCCC'>
        <th style='width: 30px; height: 20px'>No.</th>
        <th style='width: 90px;'>ID Informasi</th>
        <th style='width: 110px;'>Kategori</th>
		<th style='width: 120px;'>Tanggal Posting</th>
		<th style='width: 120px;'>Jurnalis</th>
		<th style='width: 100px;'>Dipublish Oleh</th>
      </tr>";
      // Menampilkan data
      $query = mysqli_query($conn,"SELECT
  `informasi`.`id_info`,
  `informasi`.`id_kategori`,
  `informasi`.`judul`,
  `informasi`.`headline`,
  `informasi`.`tgl_post`,
  `informasi`.`isi`,
  `informasi`.`status`,
  `informasi`.`foto`,
  `informasi`.`id_pegawai`,
  `informasi`.`id_jurnalis`,
  `kategori`.`nm_kategori`,
  `jurnalis`.`nm_jurnalis`,
  `pegawai`.`nm_pegawai`
FROM
  `informasi`
  INNER JOIN `kategori` ON `informasi`.`id_kategori` = `kategori`.`id_kategori`
  INNER JOIN `jurnalis` ON `jurnalis`.`id_jurnalis` = `informasi`.`id_jurnalis`
  INNER JOIN `pegawai` ON `pegawai`.`id_pegawai` = `informasi`.`id_pegawai`
  WHERE status='publish' AND YEAR(tgl_post)='$tahun' ");
      $no = 1; // nomor baris
      while ($r = mysqli_fetch_array($query)) {
      $content.="<tr bgcolor='#FFFFFF'>
        <td>$no</td>
        <td>$r[id_info]</td>
        <td style='text-align:center'>$r[nm_kategori]</td>
		<td style='text-align:center'>$r[tgl_post]</td>
		<td style='text-align:center'>$r[nm_jurnalis]</td>
		<td style='text-align:center'>$r[nm_pegawai]</td>
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
	
	<i>Keterangan   : Data tahun $tahun. </i	>
	
	</pre>
	
	</p>";
	
	

  $filename="LaporanBerita(pertahun)".date('d-m-y').".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya

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

