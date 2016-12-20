-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2016 at 08:41 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `nama_admin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE IF NOT EXISTS `tbl_jurusan` (
  `kode_jurusan` int(4) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`kode_jurusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Multimedia'),
(3, 'Teknik Komputer dan Jaringan'),
(4, 'Administrasi Perkantoran'),
(5, 'Akuntansi'),
(6, 'Pemasaran'),
(7, 'Akomodasi dan Perhotelan'),
(8, 'DKV (Desain Komunikasi Virtual)'),
(9, 'Seni Tari');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `no_pendaftaran` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nisn` varchar(15) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `jenis_kelamin` set('L','P') NOT NULL DEFAULT '',
  `tempat_lahir` varchar(30) NOT NULL DEFAULT '',
  `tgl_lahir` date NOT NULL DEFAULT '0000-00-00',
  `agama` set('Islam','Kristen','Katolik','Hindu','Budha') NOT NULL DEFAULT 'Islam',
  `alamat` varchar(50) NOT NULL DEFAULT '',
  `no_telp` varchar(15) NOT NULL DEFAULT '',
  `asal_smp` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`no_pendaftaran`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `no_telp`, `asal_smp`) VALUES
(0001, '11', 'Kiki', '', 'Bwi', '1994-03-13', 'Islam', 'Bwi', '0876555545', 'SMPN 1 GIRI'),
(0002, '123', 'Anisa', '', 'Bwi', '1994-03-13', 'Islam', 'Bwi', '08765467778', 'SMPN 1 GIRI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa_nilaijurusan`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa_nilaijurusan` (
  `no_pendaftaran` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nilai_matematika` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nilai_bhsIndonesia` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nilai_bhsInggris` decimal(10,2) NOT NULL DEFAULT '0.00',
  `nilai_ipa` decimal(10,2) NOT NULL DEFAULT '0.00',
  `jurusan_1` int(1) NOT NULL DEFAULT '0',
  `jurusan_2` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_siswa_nilaijurusan`
--

INSERT INTO `tbl_siswa_nilaijurusan` (`no_pendaftaran`, `nilai_matematika`, `nilai_bhsIndonesia`, `nilai_bhsInggris`, `nilai_ipa`, `jurusan_1`, `jurusan_2`) VALUES
(0001, '8.00', '8.00', '8.00', '8.00', 1, 2),
(0002, '8.00', '8.00', '8.00', '8.00', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
