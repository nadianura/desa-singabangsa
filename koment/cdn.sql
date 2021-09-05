/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.0.51b-community-nt-log : Database - komentar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`komentar` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `komentar`;

/*Table structure for table `1_artikel` */

DROP TABLE IF EXISTS `1_artikel`;

CREATE TABLE `1_artikel` (
  `id` int(5) NOT NULL auto_increment,
  `judul` varchar(150) default NULL,
  `isi` text,
  `tgl` varchar(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `judul_3` (`judul`),
  FULLTEXT KEY `judul` (`judul`,`isi`),
  FULLTEXT KEY `judul_2` (`judul`),
  FULLTEXT KEY `isi` (`isi`),
  FULLTEXT KEY `judul_4` (`judul`),
  FULLTEXT KEY `isi_2` (`isi`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `1_artikel` */

insert  into `1_artikel`(`id`,`judul`,`isi`,`tgl`) values (1,'script php komentar menggunakan bootstrap ','<p>Script php komentar ini dibuat menggunakan php dan database mysql serta bootstrap. Fasilitasnya antara lain yaitu:</p>\r\n\r\n<ul class=\"list-group\" >\r\n	<li  class=\"list-group-item\">Layoutnya responsive untuk semua resolusi layar device.</li>\r\n	<li  class=\"list-group-item\">Terdapat avatar untuk setiap user yang memberikan komentar, dan pemilihan avatar secara acak dari 40 avatar yang disimpan di cdn gratis cloudinary.</li>\r\n	<li  class=\"list-group-item\">Moderator komentar. Komentar harus mendapat persetujuan admin untuk dapat ditampilkan, hal ini untuk menghindari komentar spam atau komentar yang tidak layak untuk ditayangkan.</li>\r\n	<li  class=\"list-group-item\">Gratis. Silahkan jika ingin menggunakannya script komentar untuk blog atau web, dapat didownload secara gratis dan dimodifikasi sesuai keperluan anda. Terima kasih jika anda mencantumkan sumber atau back link ke web ini.</li>\r\n</ul>\r\n<p>Script php komentar ini merupakan demo saja, untuk mengintegrasikan ke blog atau web, anda harus memodifikasinya sendiri.\r\n<h2>Penjelasan script php ini:</h2>\r\n\r\n<p>Menggunakan 2 tabel database mysql, yang pertama adalah tabel untuk komentar user dan yang kedua adalah tabel untuk menyimpan avatar. Diperuntukan khusus untuk blog dan web berbasis php, dan sobat harus mengerti sedikit tentang php untuk dapat menginstalnya.</p>\r\n\r\n<h2>Cara kerja script komentar ini,</h2>\r\n\r\n<p>Form komentar dipasang di setiap halaman posting blog atau web. Pada salah satu field input yang di hidden, akan mendeteksi id artikel atau posting dan terisi secara otomatis sehingga saat user mengklik tombol submit, id artikel/post blog akan ikut disimpan di tabel komentar. Kemudian Komentar akan dimunculkan di halaman post/artikel berdasarkan id artikel yang ikut tersimpan tersebut.</p>\r\n\r\n<p>Avatar user akan dipilihkan secara acak dari daftar yang telah disimpan dalam database, dan filenya di host di cdn cloudinary.</p>\r\n\r\n<h2>Tampilan form dan komentar</h2>\r\n','19 Jul 2015 ');

/*Table structure for table `avatar` */

DROP TABLE IF EXISTS `avatar`;

CREATE TABLE `avatar` (
  `id` int(2) NOT NULL auto_increment,
  `avtr` varchar(150) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `avatar` */

insert  into `avatar`(`id`,`avtr`) values (1,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-1.jpg'),(2,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-2.jpg'),(3,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-3.jpg'),(4,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-4.jpg'),(5,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-5.jpg'),(6,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-6.jpg'),(7,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-7.jpg'),(8,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-8.jpg'),(9,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-9.jpg'),(10,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-10.jpg'),(11,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-11.jpg'),(12,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-12.jpg'),(13,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-13.jpg'),(14,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-14.jpg'),(15,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-15.jpg'),(16,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-16.jpg'),(17,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-17.jpg'),(18,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-18.jpg'),(19,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-19.jpg'),(20,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-20.jpg'),(21,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-21.jpg'),(22,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-22.jpg'),(23,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-23.jpg'),(24,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-24.jpg'),(25,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-25.jpg'),(26,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-26.jpg'),(27,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-27.jpg'),(28,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-28.jpg'),(29,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-29.jpg'),(30,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-30.jpg'),(31,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-31.jpg'),(32,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-32.jpg'),(33,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-33.jpg'),(34,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-34.jpg'),(35,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-35.jpg'),(36,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-36.jpg'),(37,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-37.jpg'),(38,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-38.jpg'),(39,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-39.jpg'),(40,'http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-40.jpg');

/*Table structure for table `komentar` */

DROP TABLE IF EXISTS `komentar`;

CREATE TABLE `komentar` (
  `idk` int(5) NOT NULL auto_increment,
  `id` int(6) NOT NULL,
  `tglk` varchar(10) NOT NULL,
  `judulk` varchar(150) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `web` varchar(100) NOT NULL default '#',
  `email` varchar(50) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `komentar` text NOT NULL,
  `flag` int(1) NOT NULL default '0',
  PRIMARY KEY  (`idk`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `komentar` */

insert  into `komentar`(`idk`,`id`,`tglk`,`judulk`,`nama`,`web`,`email`,`avatar`,`komentar`,`flag`) values (1,1,'11-07-2015','mantap, gan!','paijo','http://www.bayuajie.com','','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-18.jpg\r\n','saya coba dulu, mas gan.. mudah-mudahan bisa :)',1),(2,1,'18-07-2015','dicoba dulu','parto','http://www.bayuajie.com','zuperbayu@gmail.com','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-5.jpg\r\n','makasih sob, saya coba dulu.. mudah2an bisa',1),(15,1,'20-07-2015','pake form login juga dong','jojo','http://www.domain.com','jojo@domain.com','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-23.jpg','baiknya ada form login untuk adminnya gan, biar saat moderate komentarnya, admin login lebih dahulu..',0),(8,1,'19-07-2015','share localhost','ari','http://www.bayuajie.com','arisena@yahoo.com','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-11.jpg\r\n','kalau localhost dishare untuk komputer dalam apa bisa gan? caranya bagaimana ya?',1),(9,1,'19-07-2015','software untuk optimasi image','agus','http://www.bayuajie.com','zuperbayu@gmail.com','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-33.jpg\r\n','sob, software yang bisa untuk optimasi image massal sekaligus apa ya? ada gak?',1),(14,1,'19-07-2015','domain yang bisa','agan kaskuser','http://www.bayuajie.com','zuperbayu@gmail.com','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-5.jpg','domain apa aja yang bisa untuk blogspot gan?',1),(17,0,'20-07-2015','tolong instalin di blog saya','nunu','http://www.domain.com','','http://res.cloudinary.com/bayuajie-com/image/fetch/http://www.bayuajie.com/avatar/avatar-37.jpg','Gan, bisa minta tolong instalin scriptnya di blog saya gak?',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
