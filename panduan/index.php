<?php
  include 'navbar.html';

  //Include navbar.html
  
  
  if(isset($_GET['page'])){
      switch($_GET['page']){
          case 'beranda'  : include 'pages/beranda.php'; break;
          case 'profil'  : include 'pages/profil.php'; break;
		  case 'contact'  : include 'pages/contact.php'; break;
		  case 'profil'  : include 'pages/profil.php'; break;
		  case 'agenda'  : include 'pages/agenda.php'; break;
		  case 'galeri'  : include 'pages/galeri.php'; break;
		  case 'panduan'  : include 'pages/panduan.php'; break;
		  case 'statistik_pend'  : include 'pages/statistik_pend.php'; break;
		  case 'profil_pemerintah'  : include 'pages/profil_pemerintah.php'; break;
		  case 'lamp_linmas'  : include 'pages/lamp_linmas.php'; break;
		  case 'lamp_lpmd'  : include 'pages/lamp_lpmd.php'; break;
		  case 'lamp_rt'  : include 'pages/lamp_rt.php'; break;
		  case 'lamp_gapoktan'  : include 'pages/lamp_gapoktan.php'; break;
		  case 'lamp_perdes'  : include 'pages/lamp_perdes.php'; break;
		  
          

          default : include 'pages/404.php';
      }
  }else{
      include 'pages/beranda.php';
  }
  //Include file footer.php
  include 'footer.html';

?>
