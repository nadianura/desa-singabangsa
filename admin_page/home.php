<?php
  include 'header.php';

  //Include file header.php
  //include 'header.php';
  //cek session, jika tidak ada, maka alihkan ke page utama
  if(isset($_GET['page'])){
      switch($_GET['page']){
          case 'beranda'  : include 'beranda.php'; break;
		  case 'informasi'  : include 'informasi.php'; break;
		  case 'agenda'  : include 'agenda.php'; break;
		  case 'saran'  : include 'saran.php'; break;
		  case 'input_informasi'  : include 'input_informasi.php'; break;
		  case 'info_lkp'  : include 'info_lkp.php'; break;
		  case 'komen_lkp'  : include 'komen_lkp.php'; break;
		  case 'kategori'  : include 'kategori.php'; break;
		  case 'jurnalis'  : include 'jurnalis.php'; break;
		  case 'draft'  : include 'draft.php'; break;
		  case 'penduduk'  : include 'penduduk.php'; break;
		  case 'info_lkp_draft'  : include 'info_lkp_draft.php'; break;
		  case 'agenda_lkp'  : include 'agenda_lkp.php'; break;
		  //laporan
		  case 'lap_jurnalis'  : include 'lap_jurnalis.php'; break;
		  case 'lap_penduduk'  : include 'lap_penduduk.php'; break;
		  case 'lap_berita'  : include 'lap_berita.php'; break;
		  
		  
        

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
