-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2018 pada 08.25
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_webdesa`
--
CREATE DATABASE IF NOT EXISTS `db_webdesa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_webdesa`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` char(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_pegawai` char(5) NOT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul`, `tanggal`, `isi`, `foto`, `id_pegawai`) VALUES
('AG002', 'sdvsdv ubah', '2018-02-07', '													sdvsdv	 ubah											', 'updt_agenda07022018033222ini.jpeg', 'PG001'),
('AG003', 'judul ubah', '2018-02-07', 'isi ubah					', 'updt_agenda07022018033806kemeja1_lab.jpg', 'PG001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id_info` char(5) NOT NULL,
  `id_kategori` char(5) NOT NULL,
  `judul` text NOT NULL,
  `headline` text NOT NULL,
  `tgl_post` date NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `id_pegawai` char(5) DEFAULT NULL,
  `id_jurnalis` char(5) NOT NULL,
  PRIMARY KEY (`id_info`),
  KEY `id_pegawai` (`id_pegawai`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_jurnalis` (`id_jurnalis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnalis`
--

CREATE TABLE IF NOT EXISTS `jurnalis` (
  `id_jurnalis` char(5) NOT NULL,
  `nik_jurnalis` varchar(20) NOT NULL,
  `nm_jurnalis` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jurnalis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnalis`
--

INSERT INTO `jurnalis` (`id_jurnalis`, `nik_jurnalis`, `nm_jurnalis`, `alamat`, `no_telp`, `jabatan`, `foto`, `password`) VALUES
('JR001', '1611500032', 'Alvin Ramadhan', 'RT01 RW 09 no.114 Kecamatan Pamulang Kota Tangerang Seelatang -Banten												', '08989860937', 'Programmer', 'updt_jurnalis07022018165954alvin siluet copy .png', 'alvin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` char(5) NOT NULL,
  `nm_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nm_kategori`) VALUES
('KT002', 'kesehatan'),
('KT003', 'olahraga'),
('KT004', 'sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(10) NOT NULL AUTO_INCREMENT,
  `nm_warga` varchar(20) NOT NULL,
  `id_pegawai` char(5) DEFAULT NULL,
  `id_info` char(5) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `isi` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `flag` char(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `id_user` (`nm_warga`,`id_info`),
  KEY `id_info` (`id_info`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` char(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `nm_pegawai` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `bagian`, `nm_pegawai`, `password`) VALUES
('PG001', '1611500032', 'Sekretaris', 'Aldo', 'aldo'),
('PG002', '1611500033', 'Humas', 'Fahri', 'fahri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `nik` char(20) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `umur` int(3) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `jenkel`, `agama`, `umur`, `pendidikan`, `nama`) VALUES
('1762534517182540', 'laki-laki', 'islam', 20, 'sd', 'ahmad'),
('4377489089365460', 'laki-laki', 'hindu', 5, 'lain-lain', 'dongsu'),
('7364523042676260', 'perempuan', 'konghucu', 4, 'perguruan tinggi', 'lie'),
('86272839477847490', 'laki-laki', 'kristen', 20, 'perguruan tinggi', 'james'),
('9272716520346650', 'perempuan', 'kristen', 34, 'smp', 'john');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE IF NOT EXISTS `saran` (
  `id_saran` char(11) NOT NULL,
  `nama_masy` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `isi_saran` text NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  PRIMARY KEY (`id_saran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id_saran`, `nama_masy`, `email`, `notelp`, `isi_saran`, `tanggal`) VALUES
('SR000000001', 'Alvin Ramdhan', 'ramadhan.alvin43@gmail.com', '087878985432', 'Semoga dengan adanya sistem informasi Desa Singabangsa ini, hubungan komuniasi antar masyarakat dengan perangkat desa semakin baik, maju terus ..', ' 26-01-2018 '),
('SR000000002', 'Dzaki Nur Fazri', '1611500032@student.budiluhur.ac.id', '08989876432', 'Tolong kinerja perangkat desa lebih ditingkatkan lagi .', ' 26-01-2018 ');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informasi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informasi_ibfk_3` FOREIGN KEY (`id_jurnalis`) REFERENCES `jurnalis` (`id_jurnalis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_info`) REFERENCES `informasi` (`id_info`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
