<?php
  include 'header.php';

  //Include file header.php
  //include 'header.php';
  //cek session, jika tidak ada, maka alihkan ke page utama
  if(isset($_GET['page'])){
      switch($_GET['page']){
          case 'beranda'  : include 'beranda.php'; break;
		  case 'informasi'  : include 'informasi.php'; break;
		  case 'tmb_info'  : include 'tmb_info.php'; break;
		  case 'edt_info'  : include 'edt_info.php'; break;
		  case 'agenda'  : include 'agenda.php'; break;
		  case 'saran'  : include 'saran.php'; break;
		  case 'input_informasi'  : include 'input_informasi.php'; break;
		  case 'info_lkp'  : include 'info_lkp.php'; break;
		  case 'kategori'  : include 'kategori.php'; break;
		  case 'jurnalis'  : include 'jurnalis.php'; break;
		  case 'profil_jurnalis'  : include 'profil_jurnalis.php'; break;
		  
		  
        

          default : include '404.php';
      }
  }else{
      include 'beranda.php';
  }
  //Include file footer.php
  include 'footer.php';

?>
