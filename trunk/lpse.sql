-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2011 at 10:06 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lpse`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE IF NOT EXISTS `anggaran` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `tahun` int(10) NOT NULL,
  `nomor_ang` int(100) NOT NULL,
  `nilai_ang` int(30) NOT NULL,
  `status_ang` tinyint(1) NOT NULL COMMENT '0 artinya "belum digunakan", 1 artinya "sudah digunakan"',
  `daerah` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`ID`, `tahun`, `nomor_ang`, `nilai_ang`, `status_ang`, `daerah`) VALUES
(26, 2011, 444, 1000000000, 1, '6'),
(25, 2011, 12345, 600000000, 1, '5'),
(24, 2011, 1234, 1000000000, 1, '6'),
(23, 2011, 115, 1200000000, 1, '4'),
(14, 2011, 105, 700000000, 1, '6'),
(27, 2011, 567, 1000000000, 1, '26'),
(28, 2011, 789, 1200000000, 1, '1'),
(29, 2011, 111, 1000000000, 1, '16'),
(30, 2011, 222, 2000000000, 1, '1'),
(31, 2011, 7045, 1000000000, 1, '21'),
(32, 2011, 1745, 1200000000, 1, '24'),
(33, 2011, 1993, 2000000, 1, '21'),
(34, 2011, 4567, 2000000, 1, '21'),
(35, 2011, 2222, 2147483647, 1, '21'),
(36, 2011, 2345, 2000000, 1, '24'),
(37, 2011, 2012, 30000000, 1, '24'),
(38, 2011, 6789, 2000000, 1, '1'),
(39, 2011, 1208, 1000000000, 1, '1'),
(40, 2011, 4811, 1000000000, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `atpm`
--

CREATE TABLE IF NOT EXISTS `atpm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atpm` varchar(100) CHARACTER SET latin1 NOT NULL,
  `merek` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `atpm`
--

INSERT INTO `atpm` (`id`, `atpm`, `merek`) VALUES
(1, 'atpm_toyota', 'Toyota'),
(2, 'atpm_honda', 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE IF NOT EXISTS `daerah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `daerah` varchar(35) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `daerah`
--

INSERT INTO `daerah` (`id`, `daerah`) VALUES
(1, 'Kabupaten Bandung'),
(2, 'Kabupaten Bandung Barat'),
(3, 'Kabupaten Bekasi'),
(4, 'Kota Bekasi'),
(5, 'Kota Banjar'),
(6, 'Kota Bandung'),
(7, 'Kabupaten Tasikmalaya'),
(8, 'Kabupaten Sumedang'),
(9, 'Kabupaten Sukabumi'),
(10, 'Kabupaten Subang'),
(11, 'Kabupaten Purwakarta'),
(12, 'Kabupaten Majalengka'),
(13, 'Kabupaten Kuningan'),
(14, 'Kabupaten Karawang'),
(15, 'Kabupaten Indramayu'),
(16, 'Kabupaten Garut'),
(17, 'Kabupaten Cirebon'),
(18, 'Kabupaten Cianjur'),
(19, 'Kabupaten Ciamis'),
(20, 'Kabupaten Bogor'),
(21, 'Kota Bogor'),
(22, 'Kota Cimahi'),
(23, 'Kota Cirebon'),
(24, 'Kota Depok'),
(25, 'Kota Sukabumi'),
(26, 'Kota Tasikmalaya');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE IF NOT EXISTS `daftar` (
  `id_daftar` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(25) NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `username`, `password`, `email`, `token`) VALUES
(17, 'adit', 'mahdar', 'zulfikar@kabayanit.com', 'ovhbmatvzjrjmbenwsog'),
(16, 'adit', 'mahdar', 'hate_art@ymail.com', 'uiqoyhjcjwbclpvky'),
(27, '', '', '', 'jistafqolegrnzx'),
(28, 'sada', 'dad', 'dealer', 'knwliacxrlzdobtn');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `time_formed` date DEFAULT NULL,
  `website` varchar(75) CHARACTER SET latin1 DEFAULT NULL,
  `merekmobil` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `bank` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `acc_number` int(50) DEFAULT NULL,
  `acc_name` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `of_addres` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `of_poskode` int(10) DEFAULT NULL,
  `of_city` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `of_prov` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `of_phone` int(50) DEFAULT NULL,
  `of_phone2` int(50) DEFAULT NULL,
  `of_fax` int(50) DEFAULT NULL,
  `of_fax2` int(50) DEFAULT NULL,
  `of2_addres` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `of2_poskode` int(10) DEFAULT NULL,
  `of2_city` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `of2_prov` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `of2_phone` int(50) DEFAULT NULL,
  `of2_phone2` int(50) DEFAULT NULL,
  `of2_fax` int(50) DEFAULT NULL,
  `of2_fax2` int(50) DEFAULT NULL,
  `dir_nama` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dir_noktp` int(50) DEFAULT NULL,
  `dir_hp` int(50) DEFAULT NULL,
  `dir_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dir_ktpdoc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `cp_nama` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `cp_noktp` int(50) DEFAULT NULL,
  `cp_hp` int(50) DEFAULT NULL,
  `cp_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `cp_ktpdoc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `auth_atpm` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `auth_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'dokumen penunjukkan dealer resmi dr atpm',
  `auth_date` date DEFAULT NULL COMMENT 'tgl penujukan',
  `ap_notaris` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nama Notaris',
  `ap_number` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nomor Akta Notaris Pendirian Perusahaan',
  `ap_date` date DEFAULT NULL COMMENT 'Tanggal Akta Notaris Pendirian Perusahaan',
  `ap_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Dokumen Akta Notaris Pendirian Perusahaan',
  `ap_menhukam_no` char(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nomor Surat Keputusan Menhukham',
  `ap_menhukam_date` date DEFAULT NULL COMMENT 'Tanggal  Surat Keputusan Menhukham',
  `ap_menhukam_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Dokumen  Surat Keputusan Menhukham',
  `an_notaris` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Akta Notaris Perubahan Terakhir',
  `an_nomor` int(50) DEFAULT NULL,
  `an_date` date DEFAULT NULL,
  `an_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `an_menhukam_no` int(50) DEFAULT NULL,
  `an_menhukam_date` date DEFAULT NULL,
  `an_menhukam_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `siup_nomor` int(50) DEFAULT NULL COMMENT 'Surat Izin Usaha Perdagangan (SIUP)',
  `siup_date` date DEFAULT NULL,
  `siup_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `tdp_nomor` int(50) DEFAULT NULL COMMENT 'Tanda Daftar Perusahaan (TDP)',
  `tdp_date` date DEFAULT NULL,
  `tdp_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `situ_nomor` int(50) DEFAULT NULL COMMENT 'Surat Izin tempat Usaha (SITU)',
  `situ_date` date DEFAULT NULL,
  `situ_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `npwp_no` int(50) DEFAULT NULL COMMENT 'Nomor Pokok Wajib Pajak (NPWP)',
  `npwp_date` date DEFAULT NULL,
  `npwp_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `pkp_no` int(50) DEFAULT NULL COMMENT 'Surat Pengukuhan Pengusaha Kena Pajak (PKP)',
  `pkp_date` date DEFAULT NULL,
  `pkp_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `spt_date` date DEFAULT NULL COMMENT 'Surat Pemberitahuan (SPT) Tahunan Tahun Terakhir',
  `spt_datesetoran` date DEFAULT NULL,
  `spt_nosetoran` int(50) DEFAULT NULL,
  `spt_doc` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `tax_monthlydoc` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Laporan Bulanan PPh (pasal 21/23/25/29) atau PPN sekurang-kurangnya 3 bulan terakhir',
  `exp_nama1` varchar(100) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pengalaman Perusahaan dalam Pengadaan Mobil',
  `exp_own1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `exp_value1` int(30) DEFAULT NULL,
  `exp_date1` date DEFAULT NULL,
  `exp_doc1` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'salinan kontrak',
  `exp_nama2` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_own2` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_value2` int(30) DEFAULT NULL,
  `exp_date2` date DEFAULT NULL,
  `exp_doc2` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'salinan kontrak',
  `exp_nama3` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_own3` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_value3` int(30) DEFAULT NULL,
  `exp_date3` date DEFAULT NULL,
  `exp_doc3` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'salinan kontrak',
  `exp_nama4` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_own4` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_value4` int(30) DEFAULT NULL,
  `exp_date4` date DEFAULT NULL,
  `exp_doc4` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'salinan kontrak',
  `exp_nama5` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_own5` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `exp_value5` int(30) DEFAULT NULL,
  `exp_date5` date DEFAULT NULL,
  `exp_doc5` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'salinan kontrak',
  `bank_ref` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Referensi Bank',
  `surat1` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Surat Permohonan Menjadi Dealer Rekanan',
  `pailit` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Surat Pernyataan tidak pailit',
  `surat2` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Surat Pernyataan Kesanggupan memenuhi ketentuan E-purchasing',
  `pakta` varchar(500) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Pakta Integritas',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Status 0. Calon Dealer 1.menunggu hasil kualifikasi, 2. Terdaftar sebagai dealer resmi, 3. dealer resmi : menunggu persutujuan perubahan/penambahan kualifikasi, 4. kadaluarsa, 5. Revisi',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`username`, `nama`, `time_formed`, `website`, `merekmobil`, `bank`, `acc_number`, `acc_name`, `of_addres`, `of_poskode`, `of_city`, `of_prov`, `of_phone`, `of_phone2`, `of_fax`, `of_fax2`, `of2_addres`, `of2_poskode`, `of2_city`, `of2_prov`, `of2_phone`, `of2_phone2`, `of2_fax`, `of2_fax2`, `dir_nama`, `dir_noktp`, `dir_hp`, `dir_email`, `dir_ktpdoc`, `cp_nama`, `cp_noktp`, `cp_hp`, `cp_email`, `cp_ktpdoc`, `auth_atpm`, `auth_doc`, `auth_date`, `ap_notaris`, `ap_number`, `ap_date`, `ap_doc`, `ap_menhukam_no`, `ap_menhukam_date`, `ap_menhukam_doc`, `an_notaris`, `an_nomor`, `an_date`, `an_doc`, `an_menhukam_no`, `an_menhukam_date`, `an_menhukam_doc`, `siup_nomor`, `siup_date`, `siup_doc`, `tdp_nomor`, `tdp_date`, `tdp_doc`, `situ_nomor`, `situ_date`, `situ_doc`, `npwp_no`, `npwp_date`, `npwp_doc`, `pkp_no`, `pkp_date`, `pkp_doc`, `spt_date`, `spt_datesetoran`, `spt_nosetoran`, `spt_doc`, `tax_monthlydoc`, `exp_nama1`, `exp_own1`, `exp_value1`, `exp_date1`, `exp_doc1`, `exp_nama2`, `exp_own2`, `exp_value2`, `exp_date2`, `exp_doc2`, `exp_nama3`, `exp_own3`, `exp_value3`, `exp_date3`, `exp_doc3`, `exp_nama4`, `exp_own4`, `exp_value4`, `exp_date4`, `exp_doc4`, `exp_nama5`, `exp_own5`, `exp_value5`, `exp_date5`, `exp_doc5`, `bank_ref`, `surat1`, `pailit`, `surat2`, `pakta`, `status`) VALUES
('calondealer', '', '2011-06-30', '', '', '', 0, '', '', 0, '', '', 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'aa', 786, 578, 'asf', NULL, 'asfd', 6363, 363, 'fsaa', NULL, 'afasfa', NULL, '2011-06-29', 'asf', '542', '2011-06-29', NULL, '532', '2011-06-29', NULL, 'fda', 35325, '2011-06-29', NULL, 5225, '2011-06-29', NULL, 0, '2011-06-29', NULL, 53453, '2011-06-29', NULL, 6363, '2011-06-29', NULL, 34636, '2011-06-29', NULL, 3646, '2011-06-29', NULL, '2011-06-29', '2011-06-29', 3634, NULL, NULL, 'twet', 'wtte', 0, '2011-06-29', NULL, 'gdsg', 'dgss', 346, '2011-06-29', NULL, 'gsd', 'sg', 0, '2011-06-29', NULL, '', '', 0, '2011-06-29', NULL, '', '', 0, '2011-06-29', NULL, NULL, NULL, NULL, NULL, NULL, 0),
('dealer', 'Dealer1', '2011-07-14', 'zulfikarh.blogspot.com', 'Toyota', 'Niaga', 89329994, 'zulfikar', 'bandung', 40132, 'bandung', 'Jawa barat', 30002, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'Zulfikar', 300288, 433222, 'zulfikar.hakim@gmail.com', 'ctvap172p4ycbwr9oz82.txt', 'Beginner', 0, 0, 'fkkddii', '91ghfwq4f67g0ib99lbq.txt', '', NULL, '2011-07-14', '', '', '2011-07-14', NULL, '', '2011-07-14', NULL, '', 0, '2011-07-14', NULL, 0, '2011-07-14', NULL, 0, '2011-07-14', NULL, 0, '2011-08-20', NULL, 0, '2011-07-22', NULL, 0, '2011-07-14', NULL, 0, '2011-07-14', NULL, '2011-07-14', '2011-07-14', 0, NULL, NULL, '', '', 0, '2011-07-14', NULL, '', '', 0, '2011-07-14', NULL, '', '', 0, '2011-07-14', NULL, '', '', 0, '2011-07-14', NULL, '', '', 0, '2011-07-14', NULL, NULL, NULL, NULL, NULL, NULL, 3),
('hondabandungcenter', 'Honda Bandung Center', '2011-07-22', 'lalal', 'Honda', 'BCA', 189118911, 'Amalia Dwi Putri', 'Jalan Gatot Subroto no.11 Bandung', 40265, 'Bandung', 'Jawa Barat', 2147483647, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, '', 0, 0, '', '5hdyfj94waipqlpslt4n.gif', '', 0, 0, '', NULL, '', 'yzjn958gw77f0opmkek1.gif', '2011-07-22', '', '', '2011-07-22', NULL, '', '2011-07-22', NULL, '', 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, '2011-07-22', '2011-07-22', 0, NULL, NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, NULL, NULL, NULL, NULL, NULL, 2),
('plaza_toyota', 'Plaza Toyota', '2011-07-22', 'www.amalia.com', 'Toyota', 'BCA', 23456654, 'Alvin Pradana', '', 0, '', '', 0, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, '', 0, 0, '', NULL, '', 0, 0, '', NULL, '', NULL, '2011-07-22', '', '', '2011-07-22', NULL, '', '2011-07-22', NULL, '', 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, 0, '2012-07-22', NULL, 0, '2012-07-22', NULL, 0, '2011-07-22', NULL, 0, '2011-07-22', NULL, '2011-07-22', '2011-07-22', 0, NULL, NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, '', '', 0, '2011-07-22', NULL, NULL, NULL, NULL, NULL, NULL, 2),
('auto2000', 'Auto 2000 ', '2011-08-02', 'http://auto2000.co.id', 'Toyota', 'BNI', 1894888809, 'Amalia Dwi Putri', 'Jl. Daan Mogot No. 146-147 ', 0, '11510', 'DKI Jakarta', 215642000, 0, 0, 0, '', 0, '', '', 0, 0, 0, 0, 'Coddy Kurniawan', 2147483647, 2147483647, 'amalia_dwi_putri@yahoo.com', 'qpjl8k14887haev2i18.png', 'Jacob Malik', 2147483647, 2147483647, 'amaliadwiputri@gmail.com', 'xqnxcrx7emremxxereyr.png', 'ATPM TOYOTA', '9qgzrb5by5y7vvehwd1.docx', '2005-08-01', 'XXX', '524171', '2005-01-01', 'xirbvrsxtcyt6a1y7cv.docx', '1273', '2005-01-05', '43stexdyoue3xh2m.docx', 'XXX', 12345, '2011-08-01', '0zr7by7gq69j7natu5vq.docx', 12345, '2011-08-01', '085trnwrumg0mh1ybea.docx', 12345, '2005-01-01', '9q9ieiskb222uj3fsdlh.docx', 12345, '2012-08-02', 'ldc9ifn2d6lt9d6jbith.docx', 12345, '2012-08-01', 'e9oatkmzurt7q5gi2s5t.docx', 12345, '2005-09-01', 'nqfwpsbwvw3ggt3gfx8n.docx', 12345, '2006-08-01', 'gnlwac97ptm712rj1off.docx', '2011-08-01', '2011-08-01', 12345, 'jc57otugrcqu7d7n7kej.docx', 'lia6a13pucut1i3tixlb.docx', 'Pengadaan mobil dinas kesehatan', 'Rossa fadilla', 600000000, '2009-08-01', 'r4sssjt7jypdrb9p4d1u.docx', 'Pengadaan mobil dinas kepala DPRD jabar', 'Anjani Putri', 0, '2009-12-01', '8eb56tm06x0vhvapg2mu.docx', '', '', 0, '2011-08-01', NULL, '', '', 0, '2011-08-01', NULL, '', '', 0, '2011-08-01', NULL, '5w6uav7mke1wycxxeoqc.docx', '10bzpvh8gwiwuhbsp9p.docx', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eval`
--

CREATE TABLE IF NOT EXISTS `eval` (
  `id_lalai` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_lalai`,`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `eval`
--

INSERT INTO `eval` (`id_lalai`, `username`) VALUES
(1, 'hondabandungcenter'),
(2, 'auto2000'),
(2, 'hondabandungcenter'),
(3, 'auto2000'),
(3, 'hondabandungcenter'),
(4, 'auto2000');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE IF NOT EXISTS `harga` (
  `id_katalog` int(3) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `OnTR` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_katalog`,`id_daerah`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_katalog`, `id_daerah`, `username`, `OnTR`) VALUES
(21, 13, 'auto2000', 35800000),
(21, 12, 'auto2000', 35800000),
(21, 11, 'auto2000', 35800000),
(21, 10, 'auto2000', 35800000),
(21, 9, 'auto2000', 35800000),
(21, 8, 'auto2000', 35800000),
(21, 7, 'auto2000', 35800000),
(21, 6, 'auto2000', 35800000),
(21, 5, 'auto2000', 35800000),
(21, 4, 'auto2000', 35800000),
(21, 3, 'auto2000', 35800000),
(21, 2, 'auto2000', 35800000),
(21, 1, 'auto2000', 35800000),
(21, 14, 'auto2000', 35800000),
(21, 15, 'auto2000', 35800000),
(21, 16, 'auto2000', 35800000),
(21, 17, 'auto2000', 35800000),
(21, 18, 'auto2000', 35800000),
(21, 19, 'auto2000', 35800000),
(21, 20, 'auto2000', 35800000),
(21, 21, 'auto2000', 35800000),
(21, 22, 'auto2000', 35800000),
(21, 23, 'auto2000', 35800000),
(21, 24, 'auto2000', 35800000),
(21, 25, 'auto2000', 35800000),
(21, 26, 'auto2000', 35800000),
(19, 1, 'auto2000', 174000000),
(19, 2, 'auto2000', 174000000),
(19, 3, 'auto2000', 174000000),
(19, 4, 'auto2000', 174000000),
(19, 5, 'auto2000', 174000000),
(19, 6, 'auto2000', 174000000),
(19, 7, 'auto2000', 174000000),
(19, 8, 'auto2000', 174000000),
(19, 9, 'auto2000', 174000000),
(19, 10, 'auto2000', 174000000),
(19, 11, 'auto2000', 174000000),
(19, 12, 'auto2000', 174000000),
(19, 13, 'auto2000', 174000000),
(19, 14, 'auto2000', 174000000),
(19, 15, 'auto2000', 174000000),
(19, 16, 'auto2000', 174000000),
(19, 17, 'auto2000', 174000000),
(19, 18, 'auto2000', 174000000),
(19, 19, 'auto2000', 174000000),
(19, 20, 'auto2000', 174000000),
(19, 21, 'auto2000', 174000000),
(19, 22, 'auto2000', 174000000),
(19, 23, 'auto2000', 174000000),
(19, 24, 'auto2000', 174000000),
(19, 25, 'auto2000', 174000000),
(19, 26, 'auto2000', 174000000),
(18, 1, 'auto2000', 164000000),
(18, 2, 'auto2000', 164000000),
(18, 3, 'auto2000', 164000000),
(18, 4, 'auto2000', 164000000),
(18, 5, 'auto2000', 164000000),
(18, 6, 'auto2000', 164000000),
(18, 7, 'auto2000', 164000000),
(18, 8, 'auto2000', 164000000),
(18, 9, 'auto2000', 164000000),
(18, 10, 'auto2000', 164000000),
(18, 11, 'auto2000', 164000000),
(18, 12, 'auto2000', 164000000),
(18, 13, 'auto2000', 164000000),
(18, 14, 'auto2000', 164000000),
(18, 15, 'auto2000', 164000000),
(18, 16, 'auto2000', 164000000),
(18, 17, 'auto2000', 164000000),
(18, 18, 'auto2000', 164000000),
(18, 19, 'auto2000', 164000000),
(18, 20, 'auto2000', 164000000),
(18, 21, 'auto2000', 164000000),
(18, 22, 'auto2000', 164000000),
(18, 23, 'auto2000', 164000000),
(18, 24, 'auto2000', 164000000),
(18, 25, 'auto2000', 164000000),
(18, 26, 'auto2000', 164000000),
(17, 1, 'auto2000', 161000000),
(17, 2, 'auto2000', 161000000),
(17, 3, 'auto2000', 161000000),
(17, 4, 'auto2000', 161000000),
(17, 5, 'auto2000', 161000000),
(17, 6, 'auto2000', 161000000),
(17, 7, 'auto2000', 161000000),
(17, 8, 'auto2000', 161000000),
(17, 9, 'auto2000', 161000000),
(17, 10, 'auto2000', 161000000),
(17, 11, 'auto2000', 161000000),
(17, 12, 'auto2000', 161000000),
(17, 13, 'auto2000', 161000000),
(17, 14, 'auto2000', 161000000),
(17, 15, 'auto2000', 161000000),
(17, 16, 'auto2000', 161000000),
(17, 17, 'auto2000', 161000000),
(17, 18, 'auto2000', 161000000),
(17, 19, 'auto2000', 161000000),
(17, 20, 'auto2000', 161000000),
(17, 21, 'auto2000', 161000000),
(17, 22, 'auto2000', 161000000),
(17, 23, 'auto2000', 161000000),
(17, 24, 'auto2000', 161000000),
(17, 25, 'auto2000', 161000000),
(17, 26, 'auto2000', 161000000),
(16, 1, 'auto2000', 151000000),
(16, 2, 'auto2000', 151000000),
(16, 3, 'auto2000', 151000000),
(16, 4, 'auto2000', 151000000),
(16, 5, 'auto2000', 151000000),
(16, 6, 'auto2000', 151000000),
(16, 7, 'auto2000', 151000000),
(16, 8, 'auto2000', 151000000),
(16, 9, 'auto2000', 151000000),
(16, 10, 'auto2000', 151000000),
(16, 11, 'auto2000', 151000000),
(16, 12, 'auto2000', 151000000),
(16, 13, 'auto2000', 151000000),
(16, 14, 'auto2000', 151000000),
(16, 15, 'auto2000', 151000000),
(16, 16, 'auto2000', 151000000),
(16, 17, 'auto2000', 151000000),
(16, 18, 'auto2000', 151000000),
(16, 19, 'auto2000', 151000000),
(16, 20, 'auto2000', 151000000),
(16, 21, 'auto2000', 151000000),
(16, 22, 'auto2000', 151000000),
(16, 23, 'auto2000', 151000000),
(16, 24, 'auto2000', 151000000),
(16, 25, 'auto2000', 151000000),
(16, 26, 'auto2000', 151000000),
(15, 1, 'auto2000', 146000000),
(15, 2, 'auto2000', 146000000),
(15, 3, 'auto2000', 146000000),
(15, 4, 'auto2000', 146000000),
(15, 5, 'auto2000', 146000000),
(15, 6, 'auto2000', 146000000),
(15, 7, 'auto2000', 146000000),
(15, 8, 'auto2000', 146000000),
(15, 9, 'auto2000', 146000000),
(15, 10, 'auto2000', 146000000),
(15, 11, 'auto2000', 146000000),
(15, 12, 'auto2000', 146000000),
(15, 13, 'auto2000', 146000000),
(15, 14, 'auto2000', 146000000),
(15, 15, 'auto2000', 146000000),
(15, 16, 'auto2000', 146000000),
(15, 17, 'auto2000', 146000000),
(15, 18, 'auto2000', 146000000),
(15, 19, 'auto2000', 146000000),
(15, 20, 'auto2000', 146000000),
(15, 21, 'auto2000', 146000000),
(15, 22, 'auto2000', 146000000),
(15, 23, 'auto2000', 146000000),
(15, 24, 'auto2000', 146000000),
(15, 25, 'auto2000', 146000000),
(15, 26, 'auto2000', 146000000),
(14, 1, 'auto2000', 142000000),
(14, 2, 'auto2000', 142000000),
(14, 3, 'auto2000', 142000000),
(14, 4, 'auto2000', 142000000),
(14, 5, 'auto2000', 142000000),
(14, 6, 'auto2000', 142000000),
(14, 7, 'auto2000', 142000000),
(14, 8, 'auto2000', 142000000),
(14, 9, 'auto2000', 142000000),
(14, 10, 'auto2000', 142000000),
(14, 11, 'auto2000', 142000000),
(14, 12, 'auto2000', 142000000),
(14, 13, 'auto2000', 142000000),
(14, 14, 'auto2000', 142000000),
(14, 15, 'auto2000', 142000000),
(14, 16, 'auto2000', 142000000),
(14, 17, 'auto2000', 142000000),
(14, 18, 'auto2000', 142000000),
(14, 19, 'auto2000', 142000000),
(14, 20, 'auto2000', 142000000),
(14, 21, 'auto2000', 142000000),
(14, 22, 'auto2000', 142000000),
(14, 23, 'auto2000', 142000000),
(14, 24, 'auto2000', 142000000),
(14, 25, 'auto2000', 142000000),
(14, 26, 'auto2000', 142000000),
(13, 1, 'auto2000', 136000000),
(13, 2, 'auto2000', 136000000),
(13, 3, 'auto2000', 136000000),
(13, 4, 'auto2000', 136000000),
(13, 5, 'auto2000', 136000000),
(13, 6, 'auto2000', 136000000),
(13, 7, 'auto2000', 136000000),
(13, 8, 'auto2000', 136000000),
(13, 9, 'auto2000', 136000000),
(13, 10, 'auto2000', 136000000),
(13, 11, 'auto2000', 136000000),
(13, 12, 'auto2000', 136000000),
(13, 13, 'auto2000', 136000000),
(13, 14, 'auto2000', 136000000),
(13, 15, 'auto2000', 136000000),
(13, 16, 'auto2000', 136000000),
(13, 17, 'auto2000', 136000000),
(13, 18, 'auto2000', 136000000),
(13, 19, 'auto2000', 136000000),
(13, 20, 'auto2000', 136000000),
(13, 21, 'auto2000', 136000000),
(13, 22, 'auto2000', 136000000),
(13, 23, 'auto2000', 136000000),
(13, 24, 'auto2000', 136000000),
(13, 25, 'auto2000', 136000000),
(13, 26, 'auto2000', 136000000),
(22, 1, 'auto2000', 351000000),
(22, 2, 'auto2000', 351000000),
(22, 3, 'auto2000', 351000000),
(22, 4, 'auto2000', 351000000),
(22, 5, 'auto2000', 351000000),
(22, 6, 'auto2000', 351000000),
(22, 7, 'auto2000', 351000000),
(22, 8, 'auto2000', 351000000),
(22, 9, 'auto2000', 351000000),
(22, 10, 'auto2000', 351000000),
(22, 11, 'auto2000', 351000000),
(22, 12, 'auto2000', 351000000),
(22, 13, 'auto2000', 351000000),
(22, 14, 'auto2000', 351000000),
(22, 15, 'auto2000', 351000000),
(22, 16, 'auto2000', 351000000),
(22, 17, 'auto2000', 351000000),
(22, 18, 'auto2000', 351000000),
(22, 19, 'auto2000', 351000000),
(22, 20, 'auto2000', 351000000),
(22, 21, 'auto2000', 351000000),
(22, 22, 'auto2000', 351000000),
(22, 23, 'auto2000', 351000000),
(22, 24, 'auto2000', 351000000),
(22, 25, 'auto2000', 351000000),
(22, 26, 'auto2000', 351000000),
(23, 1, 'auto2000', 380500000),
(23, 2, 'auto2000', 380500000),
(23, 3, 'auto2000', 380500000),
(23, 4, 'auto2000', 380500000),
(23, 5, 'auto2000', 380500000),
(23, 6, 'auto2000', 380500000),
(23, 7, 'auto2000', 380500000),
(23, 8, 'auto2000', 380500000),
(23, 9, 'auto2000', 380500000),
(23, 10, 'auto2000', 380500000),
(23, 11, 'auto2000', 380500000),
(23, 12, 'auto2000', 380500000),
(23, 13, 'auto2000', 380500000),
(23, 14, 'auto2000', 380500000),
(23, 15, 'auto2000', 380500000),
(23, 16, 'auto2000', 380500000),
(23, 17, 'auto2000', 380500000),
(23, 18, 'auto2000', 380500000),
(23, 19, 'auto2000', 380500000),
(23, 20, 'auto2000', 380500000),
(23, 21, 'auto2000', 380500000),
(23, 22, 'auto2000', 380500000),
(23, 23, 'auto2000', 380500000),
(23, 24, 'auto2000', 380500000),
(23, 25, 'auto2000', 380500000),
(23, 26, 'auto2000', 380500000),
(24, 1, 'auto2000', 195000000),
(24, 2, 'auto2000', 195000000),
(24, 3, 'auto2000', 195000000),
(24, 4, 'auto2000', 195000000),
(24, 5, 'auto2000', 195000000),
(24, 6, 'auto2000', 195000000),
(24, 7, 'auto2000', 195000000),
(24, 8, 'auto2000', 195000000),
(24, 9, 'auto2000', 195000000),
(24, 10, 'auto2000', 195000000),
(24, 11, 'auto2000', 195000000),
(24, 12, 'auto2000', 195000000),
(24, 13, 'auto2000', 195000000),
(24, 14, 'auto2000', 195000000),
(24, 15, 'auto2000', 195000000),
(24, 16, 'auto2000', 195000000),
(24, 17, 'auto2000', 195000000),
(24, 18, 'auto2000', 195000000),
(24, 19, 'auto2000', 195000000),
(24, 20, 'auto2000', 195000000),
(24, 21, 'auto2000', 195000000),
(24, 22, 'auto2000', 195000000),
(24, 23, 'auto2000', 195000000),
(24, 24, 'auto2000', 195000000),
(24, 25, 'auto2000', 195000000),
(24, 26, 'auto2000', 195000000),
(25, 1, 'auto2000', 204000000),
(25, 2, 'auto2000', 204000000),
(25, 3, 'auto2000', 204000000),
(25, 4, 'auto2000', 204000000),
(25, 5, 'auto2000', 204000000),
(25, 6, 'auto2000', 204000000),
(25, 7, 'auto2000', 204000000),
(25, 8, 'auto2000', 204000000),
(25, 9, 'auto2000', 204000000),
(25, 10, 'auto2000', 204000000),
(25, 11, 'auto2000', 204000000),
(25, 12, 'auto2000', 204000000),
(25, 13, 'auto2000', 204000000),
(25, 14, 'auto2000', 204000000),
(25, 15, 'auto2000', 204000000),
(25, 16, 'auto2000', 204000000),
(25, 17, 'auto2000', 204000000),
(25, 18, 'auto2000', 204000000),
(25, 19, 'auto2000', 204000000),
(25, 20, 'auto2000', 204000000),
(25, 21, 'auto2000', 204000000),
(25, 22, 'auto2000', 204000000),
(25, 23, 'auto2000', 204000000),
(25, 24, 'auto2000', 204000000),
(25, 25, 'auto2000', 204000000),
(25, 26, 'auto2000', 204000000),
(26, 1, 'auto2000', 204000000),
(26, 2, 'auto2000', 204000000),
(26, 3, 'auto2000', 204000000),
(26, 4, 'auto2000', 204000000),
(26, 5, 'auto2000', 204000000),
(26, 6, 'auto2000', 204000000),
(26, 7, 'auto2000', 204000000),
(26, 8, 'auto2000', 204000000),
(26, 9, 'auto2000', 204000000),
(26, 10, 'auto2000', 204000000),
(26, 11, 'auto2000', 204000000),
(26, 12, 'auto2000', 204000000),
(26, 13, 'auto2000', 204000000),
(26, 14, 'auto2000', 204000000),
(26, 15, 'auto2000', 204000000),
(26, 16, 'auto2000', 204000000),
(26, 17, 'auto2000', 204000000),
(26, 18, 'auto2000', 204000000),
(26, 19, 'auto2000', 204000000),
(26, 20, 'auto2000', 204000000),
(26, 21, 'auto2000', 204000000),
(26, 22, 'auto2000', 204000000),
(26, 23, 'auto2000', 204000000),
(26, 24, 'auto2000', 204000000),
(26, 25, 'auto2000', 204000000),
(26, 26, 'auto2000', 204000000),
(27, 1, 'auto2000', 217000000),
(27, 2, 'auto2000', 217000000),
(27, 3, 'auto2000', 217000000),
(27, 4, 'auto2000', 217000000),
(27, 5, 'auto2000', 217000000),
(27, 6, 'auto2000', 217000000),
(27, 7, 'auto2000', 217000000),
(27, 8, 'auto2000', 217000000),
(27, 9, 'auto2000', 217000000),
(27, 10, 'auto2000', 217000000),
(27, 11, 'auto2000', 217000000),
(27, 12, 'auto2000', 217000000),
(27, 13, 'auto2000', 217000000),
(27, 14, 'auto2000', 217000000),
(27, 15, 'auto2000', 217000000),
(27, 16, 'auto2000', 217000000),
(27, 17, 'auto2000', 217000000),
(27, 18, 'auto2000', 217000000),
(27, 19, 'auto2000', 217000000),
(27, 20, 'auto2000', 217000000),
(27, 21, 'auto2000', 217000000),
(27, 22, 'auto2000', 217000000),
(27, 23, 'auto2000', 217000000),
(27, 24, 'auto2000', 217000000),
(27, 25, 'auto2000', 217000000),
(27, 26, 'auto2000', 217000000),
(28, 1, 'auto2000', 206000000),
(28, 2, 'auto2000', 206000000),
(28, 3, 'auto2000', 206000000),
(28, 4, 'auto2000', 206000000),
(28, 5, 'auto2000', 206000000),
(28, 6, 'auto2000', 206000000),
(28, 7, 'auto2000', 206000000),
(28, 8, 'auto2000', 206000000),
(28, 9, 'auto2000', 206000000),
(28, 10, 'auto2000', 206000000),
(28, 11, 'auto2000', 206000000),
(28, 12, 'auto2000', 206000000),
(28, 13, 'auto2000', 206000000),
(28, 14, 'auto2000', 206000000),
(28, 15, 'auto2000', 206000000),
(28, 16, 'auto2000', 206000000),
(28, 17, 'auto2000', 206000000),
(28, 18, 'auto2000', 206000000),
(28, 19, 'auto2000', 206000000),
(28, 20, 'auto2000', 206000000),
(28, 21, 'auto2000', 206000000),
(28, 22, 'auto2000', 206000000),
(28, 23, 'auto2000', 206000000),
(28, 24, 'auto2000', 206000000),
(28, 25, 'auto2000', 206000000),
(28, 26, 'auto2000', 206000000),
(29, 1, 'auto2000', 219000000),
(29, 2, 'auto2000', 219000000),
(29, 3, 'auto2000', 219000000),
(29, 4, 'auto2000', 219000000),
(29, 5, 'auto2000', 219000000),
(29, 6, 'auto2000', 219000000),
(29, 7, 'auto2000', 219000000),
(29, 8, 'auto2000', 219000000),
(29, 9, 'auto2000', 219000000),
(29, 10, 'auto2000', 219000000),
(29, 11, 'auto2000', 219000000),
(29, 12, 'auto2000', 219000000),
(29, 13, 'auto2000', 219000000),
(29, 14, 'auto2000', 219000000),
(29, 15, 'auto2000', 219000000),
(29, 16, 'auto2000', 219000000),
(29, 17, 'auto2000', 219000000),
(29, 18, 'auto2000', 219000000),
(29, 19, 'auto2000', 219000000),
(29, 20, 'auto2000', 219000000),
(29, 21, 'auto2000', 219000000),
(29, 22, 'auto2000', 219000000),
(29, 23, 'auto2000', 219000000),
(29, 24, 'auto2000', 219000000),
(29, 25, 'auto2000', 219000000),
(29, 26, 'auto2000', 219000000),
(21, 1, 'plaza_toyota', 340000000),
(21, 2, 'plaza_toyota', 340000000),
(21, 3, 'plaza_toyota', 340000000),
(21, 4, 'plaza_toyota', 340000000),
(21, 5, 'plaza_toyota', 340000000),
(21, 6, 'plaza_toyota', 340000000),
(21, 7, 'plaza_toyota', 340000000),
(21, 8, 'plaza_toyota', 340000000),
(21, 9, 'plaza_toyota', 340000000),
(21, 10, 'plaza_toyota', 340000000),
(21, 11, 'plaza_toyota', 340000000),
(21, 12, 'plaza_toyota', 340000000),
(21, 13, 'plaza_toyota', 340000000),
(21, 14, 'plaza_toyota', 340000000),
(21, 15, 'plaza_toyota', 340000000),
(21, 16, 'plaza_toyota', 340000000),
(21, 17, 'plaza_toyota', 340000000),
(21, 18, 'plaza_toyota', 340000000),
(21, 19, 'plaza_toyota', 340000000),
(21, 20, 'plaza_toyota', 340000000),
(21, 21, 'plaza_toyota', 340000000),
(21, 22, 'plaza_toyota', 340000000),
(21, 23, 'plaza_toyota', 340000000),
(21, 24, 'plaza_toyota', 340000000),
(21, 25, 'plaza_toyota', 340000000),
(21, 26, 'plaza_toyota', 340000000),
(22, 1, 'plaza_toyota', 350000000),
(22, 2, 'plaza_toyota', 350000000),
(22, 3, 'plaza_toyota', 350000000),
(22, 4, 'plaza_toyota', 350000000),
(22, 5, 'plaza_toyota', 350000000),
(22, 6, 'plaza_toyota', 350000000),
(22, 7, 'plaza_toyota', 350000000),
(22, 8, 'plaza_toyota', 350000000),
(22, 9, 'plaza_toyota', 350000000),
(22, 10, 'plaza_toyota', 350000000),
(22, 11, 'plaza_toyota', 350000000),
(22, 12, 'plaza_toyota', 350000000),
(22, 13, 'plaza_toyota', 350000000),
(22, 14, 'plaza_toyota', 350000000),
(22, 15, 'plaza_toyota', 350000000),
(22, 16, 'plaza_toyota', 350000000),
(22, 17, 'plaza_toyota', 350000000),
(22, 18, 'plaza_toyota', 350000000),
(22, 19, 'plaza_toyota', 350000000),
(22, 20, 'plaza_toyota', 350000000),
(22, 21, 'plaza_toyota', 350000000),
(22, 22, 'plaza_toyota', 350000000),
(22, 23, 'plaza_toyota', 350000000),
(22, 24, 'plaza_toyota', 350000000),
(22, 25, 'plaza_toyota', 350000000),
(22, 26, 'plaza_toyota', 350000000),
(23, 1, 'plaza_toyota', 387000000),
(23, 2, 'plaza_toyota', 387000000),
(23, 3, 'plaza_toyota', 387000000),
(23, 4, 'plaza_toyota', 387000000),
(23, 5, 'plaza_toyota', 387000000),
(23, 6, 'plaza_toyota', 387000000),
(23, 7, 'plaza_toyota', 387000000),
(23, 8, 'plaza_toyota', 387000000),
(23, 9, 'plaza_toyota', 387000000),
(23, 10, 'plaza_toyota', 387000000),
(23, 11, 'plaza_toyota', 387000000),
(23, 12, 'plaza_toyota', 387000000),
(23, 13, 'plaza_toyota', 387000000),
(23, 14, 'plaza_toyota', 387000000),
(23, 15, 'plaza_toyota', 387000000),
(23, 16, 'plaza_toyota', 387000000),
(23, 17, 'plaza_toyota', 387000000),
(23, 18, 'plaza_toyota', 387000000),
(23, 19, 'plaza_toyota', 387000000),
(23, 20, 'plaza_toyota', 387000000),
(23, 21, 'plaza_toyota', 387000000),
(23, 22, 'plaza_toyota', 387000000),
(23, 23, 'plaza_toyota', 387000000),
(23, 24, 'plaza_toyota', 387000000),
(23, 25, 'plaza_toyota', 387000000),
(23, 26, 'plaza_toyota', 387000000),
(30, 1, 'hondabandungcenter', 242000000),
(30, 2, 'hondabandungcenter', 242000000),
(30, 3, 'hondabandungcenter', 242000000),
(30, 4, 'hondabandungcenter', 242000000),
(30, 5, 'hondabandungcenter', 242000000),
(30, 6, 'hondabandungcenter', 242000000),
(30, 7, 'hondabandungcenter', 242000000),
(30, 8, 'hondabandungcenter', 242000000),
(30, 9, 'hondabandungcenter', 242000000),
(30, 10, 'hondabandungcenter', 242000000),
(30, 11, 'hondabandungcenter', 242000000),
(30, 12, 'hondabandungcenter', 242000000),
(30, 13, 'hondabandungcenter', 242000000),
(30, 14, 'hondabandungcenter', 242000000),
(30, 15, 'hondabandungcenter', 242000000),
(30, 16, 'hondabandungcenter', 242000000),
(30, 17, 'hondabandungcenter', 242000000),
(30, 18, 'hondabandungcenter', 242000000),
(30, 19, 'hondabandungcenter', 242000000),
(30, 20, 'hondabandungcenter', 242000000),
(30, 21, 'hondabandungcenter', 242000000),
(30, 22, 'hondabandungcenter', 242000000),
(30, 23, 'hondabandungcenter', 242000000),
(30, 24, 'hondabandungcenter', 242000000),
(30, 25, 'hondabandungcenter', 242000000),
(30, 26, 'hondabandungcenter', 242000000),
(31, 1, 'hondabandungcenter', 263000000),
(31, 2, 'hondabandungcenter', 263000000),
(31, 3, 'hondabandungcenter', 263000000),
(31, 4, 'hondabandungcenter', 263000000),
(31, 5, 'hondabandungcenter', 263000000),
(31, 6, 'hondabandungcenter', 263000000),
(31, 7, 'hondabandungcenter', 263000000),
(31, 8, 'hondabandungcenter', 263000000),
(31, 9, 'hondabandungcenter', 263000000),
(31, 10, 'hondabandungcenter', 263000000),
(31, 11, 'hondabandungcenter', 263000000),
(31, 12, 'hondabandungcenter', 263000000),
(31, 13, 'hondabandungcenter', 263000000),
(31, 14, 'hondabandungcenter', 263000000),
(31, 15, 'hondabandungcenter', 263000000),
(31, 16, 'hondabandungcenter', 263000000),
(31, 17, 'hondabandungcenter', 263000000),
(31, 18, 'hondabandungcenter', 263000000),
(31, 19, 'hondabandungcenter', 263000000),
(31, 20, 'hondabandungcenter', 263000000),
(31, 21, 'hondabandungcenter', 263000000),
(31, 22, 'hondabandungcenter', 263000000),
(31, 23, 'hondabandungcenter', 263000000),
(31, 24, 'hondabandungcenter', 263000000),
(31, 25, 'hondabandungcenter', 263000000),
(31, 26, 'hondabandungcenter', 263000000),
(32, 1, 'hondabandungcenter', 431000000),
(32, 2, 'hondabandungcenter', 431000000),
(32, 3, 'hondabandungcenter', 431000000),
(32, 4, 'hondabandungcenter', 431000000),
(32, 5, 'hondabandungcenter', 431000000),
(32, 6, 'hondabandungcenter', 431000000),
(32, 7, 'hondabandungcenter', 431000000),
(32, 8, 'hondabandungcenter', 431000000),
(32, 9, 'hondabandungcenter', 431000000),
(32, 10, 'hondabandungcenter', 431000000),
(32, 11, 'hondabandungcenter', 431000000),
(32, 12, 'hondabandungcenter', 431000000),
(32, 13, 'hondabandungcenter', 431000000),
(32, 14, 'hondabandungcenter', 431000000),
(32, 15, 'hondabandungcenter', 431000000),
(32, 16, 'hondabandungcenter', 431000000),
(32, 17, 'hondabandungcenter', 431000000),
(32, 18, 'hondabandungcenter', 431000000),
(32, 19, 'hondabandungcenter', 431000000),
(32, 20, 'hondabandungcenter', 431000000),
(32, 21, 'hondabandungcenter', 431000000),
(32, 22, 'hondabandungcenter', 431000000),
(32, 23, 'hondabandungcenter', 431000000),
(32, 24, 'hondabandungcenter', 431000000),
(32, 25, 'hondabandungcenter', 431000000),
(32, 26, 'hondabandungcenter', 431000000),
(33, 1, 'hondabandungcenter', 447000000),
(33, 2, 'hondabandungcenter', 447000000),
(33, 3, 'hondabandungcenter', 447000000),
(33, 4, 'hondabandungcenter', 447000000),
(33, 5, 'hondabandungcenter', 447000000),
(33, 6, 'hondabandungcenter', 447000000),
(33, 7, 'hondabandungcenter', 447000000),
(33, 8, 'hondabandungcenter', 447000000),
(33, 9, 'hondabandungcenter', 447000000),
(33, 10, 'hondabandungcenter', 447000000),
(33, 11, 'hondabandungcenter', 447000000),
(33, 12, 'hondabandungcenter', 447000000),
(33, 13, 'hondabandungcenter', 447000000),
(33, 14, 'hondabandungcenter', 447000000),
(33, 15, 'hondabandungcenter', 447000000),
(33, 16, 'hondabandungcenter', 447000000),
(33, 17, 'hondabandungcenter', 447000000),
(33, 18, 'hondabandungcenter', 447000000),
(33, 19, 'hondabandungcenter', 447000000),
(33, 20, 'hondabandungcenter', 447000000),
(33, 21, 'hondabandungcenter', 447000000),
(33, 22, 'hondabandungcenter', 447000000),
(33, 23, 'hondabandungcenter', 447000000),
(33, 24, 'hondabandungcenter', 447000000),
(33, 25, 'hondabandungcenter', 447000000),
(33, 26, 'hondabandungcenter', 447000000),
(34, 1, 'hondabandungcenter', 484000000),
(34, 2, 'hondabandungcenter', 484000000),
(34, 3, 'hondabandungcenter', 484000000),
(34, 4, 'hondabandungcenter', 484000000),
(34, 5, 'hondabandungcenter', 484000000),
(34, 6, 'hondabandungcenter', 484000000),
(34, 7, 'hondabandungcenter', 484000000),
(34, 8, 'hondabandungcenter', 484000000),
(34, 9, 'hondabandungcenter', 484000000),
(34, 10, 'hondabandungcenter', 484000000),
(34, 11, 'hondabandungcenter', 484000000),
(34, 12, 'hondabandungcenter', 484000000),
(34, 13, 'hondabandungcenter', 484000000),
(34, 14, 'hondabandungcenter', 484000000),
(34, 15, 'hondabandungcenter', 484000000),
(34, 16, 'hondabandungcenter', 484000000),
(34, 17, 'hondabandungcenter', 484000000),
(34, 18, 'hondabandungcenter', 484000000),
(34, 19, 'hondabandungcenter', 484000000),
(34, 20, 'hondabandungcenter', 484000000),
(34, 21, 'hondabandungcenter', 484000000),
(34, 22, 'hondabandungcenter', 484000000),
(34, 23, 'hondabandungcenter', 484000000),
(34, 24, 'hondabandungcenter', 484000000),
(34, 25, 'hondabandungcenter', 484000000),
(34, 26, 'hondabandungcenter', 484000000),
(35, 1, 'hondabandungcenter', 710000000),
(35, 2, 'hondabandungcenter', 710000000),
(35, 3, 'hondabandungcenter', 710000000),
(35, 4, 'hondabandungcenter', 710000000),
(35, 5, 'hondabandungcenter', 710000000),
(35, 6, 'hondabandungcenter', 710000000),
(35, 7, 'hondabandungcenter', 710000000),
(35, 8, 'hondabandungcenter', 710000000),
(35, 9, 'hondabandungcenter', 710000000),
(35, 10, 'hondabandungcenter', 710000000),
(35, 11, 'hondabandungcenter', 710000000),
(35, 12, 'hondabandungcenter', 710000000),
(35, 13, 'hondabandungcenter', 710000000),
(35, 14, 'hondabandungcenter', 710000000),
(35, 15, 'hondabandungcenter', 710000000),
(35, 16, 'hondabandungcenter', 710000000),
(35, 17, 'hondabandungcenter', 710000000),
(35, 18, 'hondabandungcenter', 710000000),
(35, 19, 'hondabandungcenter', 710000000),
(35, 20, 'hondabandungcenter', 710000000),
(35, 21, 'hondabandungcenter', 710000000),
(35, 22, 'hondabandungcenter', 710000000),
(35, 23, 'hondabandungcenter', 710000000),
(35, 24, 'hondabandungcenter', 710000000),
(35, 25, 'hondabandungcenter', 710000000),
(35, 26, 'hondabandungcenter', 710000000),
(36, 1, 'hondabandungcenter', 351000000),
(36, 2, 'hondabandungcenter', 351000000),
(36, 3, 'hondabandungcenter', 351000000),
(36, 4, 'hondabandungcenter', 351000000),
(36, 5, 'hondabandungcenter', 351000000),
(36, 6, 'hondabandungcenter', 351000000),
(36, 7, 'hondabandungcenter', 351000000),
(36, 8, 'hondabandungcenter', 351000000),
(36, 9, 'hondabandungcenter', 351000000),
(36, 10, 'hondabandungcenter', 351000000),
(36, 11, 'hondabandungcenter', 351000000),
(36, 12, 'hondabandungcenter', 351000000),
(36, 13, 'hondabandungcenter', 351000000),
(36, 14, 'hondabandungcenter', 351000000),
(36, 15, 'hondabandungcenter', 351000000),
(36, 16, 'hondabandungcenter', 351000000),
(36, 17, 'hondabandungcenter', 351000000),
(36, 18, 'hondabandungcenter', 351000000),
(36, 19, 'hondabandungcenter', 351000000),
(36, 20, 'hondabandungcenter', 351000000),
(36, 21, 'hondabandungcenter', 351000000),
(36, 22, 'hondabandungcenter', 351000000),
(36, 23, 'hondabandungcenter', 351000000),
(36, 24, 'hondabandungcenter', 351000000),
(36, 25, 'hondabandungcenter', 351000000),
(36, 26, 'hondabandungcenter', 351000000),
(38, 1, 'hondabandungcenter', 391000000),
(38, 2, 'hondabandungcenter', 391000000),
(38, 3, 'hondabandungcenter', 391000000),
(38, 4, 'hondabandungcenter', 391000000),
(38, 5, 'hondabandungcenter', 391000000),
(38, 6, 'hondabandungcenter', 391000000),
(38, 7, 'hondabandungcenter', 391000000),
(38, 8, 'hondabandungcenter', 391000000),
(38, 9, 'hondabandungcenter', 391000000),
(38, 10, 'hondabandungcenter', 391000000),
(38, 11, 'hondabandungcenter', 391000000),
(38, 12, 'hondabandungcenter', 391000000),
(38, 13, 'hondabandungcenter', 391000000),
(38, 14, 'hondabandungcenter', 391000000),
(38, 15, 'hondabandungcenter', 391000000),
(38, 16, 'hondabandungcenter', 391000000),
(38, 17, 'hondabandungcenter', 391000000),
(38, 18, 'hondabandungcenter', 391000000),
(38, 19, 'hondabandungcenter', 391000000),
(38, 20, 'hondabandungcenter', 391000000),
(38, 21, 'hondabandungcenter', 391000000),
(38, 22, 'hondabandungcenter', 391000000),
(38, 23, 'hondabandungcenter', 391000000),
(38, 24, 'hondabandungcenter', 391000000),
(38, 25, 'hondabandungcenter', 391000000),
(38, 26, 'hondabandungcenter', 391000000),
(37, 1, 'hondabandungcenter', 361000000),
(37, 2, 'hondabandungcenter', 361000000),
(37, 3, 'hondabandungcenter', 361000000),
(37, 4, 'hondabandungcenter', 361000000),
(37, 5, 'hondabandungcenter', 361000000),
(37, 6, 'hondabandungcenter', 361000000),
(37, 7, 'hondabandungcenter', 361000000),
(37, 8, 'hondabandungcenter', 361000000),
(37, 9, 'hondabandungcenter', 361000000),
(37, 10, 'hondabandungcenter', 361000000),
(37, 11, 'hondabandungcenter', 361000000),
(37, 12, 'hondabandungcenter', 361000000),
(37, 13, 'hondabandungcenter', 361000000),
(37, 14, 'hondabandungcenter', 361000000),
(37, 15, 'hondabandungcenter', 361000000),
(37, 16, 'hondabandungcenter', 361000000),
(37, 17, 'hondabandungcenter', 361000000),
(37, 18, 'hondabandungcenter', 361000000),
(37, 19, 'hondabandungcenter', 361000000),
(37, 20, 'hondabandungcenter', 361000000),
(37, 21, 'hondabandungcenter', 361000000),
(37, 22, 'hondabandungcenter', 361000000),
(37, 23, 'hondabandungcenter', 361000000),
(37, 24, 'hondabandungcenter', 361000000),
(37, 25, 'hondabandungcenter', 361000000),
(37, 26, 'hondabandungcenter', 361000000),
(24, 6, 'plaza_toyota', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `hps`
--

CREATE TABLE IF NOT EXISTS `hps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atpm` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `pkb` int(50) NOT NULL,
  `bbn` int(50) NOT NULL,
  `ongkir` int(50) NOT NULL,
  `asuransi` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `hps`
--

INSERT INTO `hps` (`id`, `id_atpm`, `id_daerah`, `pkb`, `bbn`, `ongkir`, `asuransi`) VALUES
(8, 1, 3, 2000000, 0, 1200000, 243000),
(7, 1, 2, 2000000, 0, 1200000, 243000),
(6, 1, 1, 2000000, 0, 1200000, 243000),
(9, 1, 4, 2000000, 0, 1200000, 243000),
(10, 1, 5, 2000000, 0, 1200000, 243000),
(11, 1, 6, 2000000, 0, 1200000, 243000),
(12, 1, 7, 2000000, 0, 1200000, 243000),
(13, 1, 8, 2000000, 0, 1200000, 243000),
(14, 1, 9, 2000000, 0, 1200000, 243000),
(15, 1, 10, 2000000, 0, 1200000, 243000),
(16, 1, 11, 2000000, 0, 1200000, 243000),
(17, 1, 12, 2000000, 0, 1200000, 243000),
(18, 1, 13, 2000000, 0, 1200000, 243000),
(19, 1, 14, 2000000, 0, 1200000, 243000),
(20, 1, 15, 2000000, 0, 1200000, 243000),
(21, 1, 16, 2000000, 0, 1200000, 243000),
(22, 1, 17, 2000000, 0, 1200000, 243000),
(23, 1, 18, 2000000, 0, 1200000, 243000),
(24, 1, 19, 2000000, 0, 1200000, 243000),
(25, 1, 20, 2000000, 0, 1200000, 243000),
(26, 1, 21, 2000000, 0, 1200000, 243000),
(27, 1, 22, 2000000, 0, 1200000, 243000),
(28, 1, 23, 2000000, 0, 1200000, 243000),
(29, 1, 24, 2000000, 0, 1200000, 243000),
(30, 1, 25, 2000000, 0, 1200000, 243000),
(31, 1, 26, 2000000, 0, 1200000, 243000),
(32, 2, 1, 2000000, 0, 1200000, 243000),
(33, 2, 2, 2000000, 0, 1200000, 243000),
(34, 2, 3, 2000000, 0, 1200000, 243000),
(35, 2, 4, 2000000, 0, 1200000, 243000),
(36, 2, 5, 2000000, 0, 1200000, 243000),
(37, 2, 6, 2000000, 0, 1200000, 243000),
(38, 2, 7, 2000000, 0, 1200000, 243000),
(39, 2, 8, 2000000, 0, 1200000, 243000),
(40, 2, 9, 2000000, 0, 1200000, 243000),
(41, 2, 10, 2000000, 0, 1200000, 243000),
(42, 2, 11, 2000000, 0, 1200000, 243000),
(43, 2, 12, 2000000, 0, 1200000, 243000),
(44, 2, 13, 2000000, 0, 1200000, 243000),
(45, 2, 14, 2000000, 0, 1200000, 243000),
(46, 2, 15, 2000000, 0, 1200000, 243000),
(47, 2, 16, 2000000, 0, 1200000, 243000),
(48, 2, 17, 2000000, 0, 1200000, 243000),
(49, 2, 18, 2000000, 0, 1200000, 243000),
(50, 2, 19, 2000000, 0, 1200000, 243000),
(51, 2, 20, 2000000, 0, 1200000, 243000),
(52, 2, 21, 2000000, 0, 1200000, 243000),
(53, 2, 22, 2000000, 0, 1200000, 243000),
(54, 2, 23, 2000000, 0, 1200000, 243000),
(55, 2, 24, 2000000, 0, 1200000, 243000),
(56, 2, 25, 2000000, 0, 1200000, 243000),
(57, 2, 26, 2000000, 0, 1200000, 243000);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE IF NOT EXISTS `katalog` (
  `id_tipe` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `transmisi` enum('Automatic','Manual','Automatic TRD') CHARACTER SET latin1 DEFAULT NULL,
  `cc` int(50) DEFAULT NULL,
  `OfTR` int(50) NOT NULL COMMENT 'Harga Off the road jkt',
  `PIC` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_tipe`, `id`, `tipe`, `transmisi`, `cc`, `OfTR`, `PIC`) VALUES
(14, 21, '1800 E ', 'Manual', 1794, 327600000, NULL),
(13, 19, 'S 1500', 'Automatic', 1298, 170275000, NULL),
(13, 18, 'S 1500 ', 'Manual', 1298, 160350000, NULL),
(13, 17, 'G 1300', 'Automatic', 1298, 158175000, NULL),
(13, 16, 'G 1300', 'Manual', 1298, 148200000, NULL),
(13, 15, 'E 1300', 'Automatic', 1298, 142975000, NULL),
(13, 14, 'E 1300 Dress Up', 'Manual', 1298, 138000000, NULL),
(13, 13, 'E 1300', 'Manual', 1298, 133000000, NULL),
(14, 22, '1800 G ', 'Automatic', 1794, 348200000, NULL),
(14, 23, '2000 V ', 'Automatic', 1987, 378300000, NULL),
(15, 24, '1500 G VVTI  ', 'Manual', 1495, 191300000, NULL),
(15, 25, '1500 G VVTI  ', 'Automatic', 1495, 201050000, NULL),
(15, 26, '1500 S VVTI  ', 'Manual', 1495, 200400000, NULL),
(15, 27, '1500 S VVTI  ', 'Automatic', 1495, 214050000, NULL),
(15, 28, '1500 S VVTI  DRESS UP ', 'Manual', 1495, 203150000, NULL),
(15, 29, '1500 S VVTI  DRESS UP ', 'Automatic', 1495, 216800000, NULL),
(16, 30, 'Freed Otomatis ', 'Automatic', 1497, 239500000, NULL),
(16, 31, 'Freed with Power Sliding Door', 'Automatic', 1497, 260000000, NULL),
(17, 32, 'Accord 2,4L VTi  ', 'Manual', 2354, 428500000, NULL),
(17, 33, 'Accord 2,4L VTi  ', 'Automatic', 2354, 443500000, NULL),
(17, 34, 'Accord 2,4L VTi-L ', 'Automatic', 2354, 481500000, NULL),
(17, 35, 'Accord 3,5L V6  ', 'Automatic', 3471, 708000000, NULL),
(18, 36, '2.0 L', 'Automatic', 1997, 348000000, NULL),
(18, 37, '2.0 L', 'Manual', 1997, 359000000, NULL),
(18, 38, '2.4 L', 'Automatic', 2354, 388000000, NULL),
(19, 39, 'E 1300', 'Automatic', 1495, 126000000, NULL),
(19, 40, 'E 1300 Dress Up', 'Automatic', 1495, 133000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kualifikasi`
--

CREATE TABLE IF NOT EXISTS `kualifikasi` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` tinyint(1) NOT NULL DEFAULT '0',
  `time_formed` tinyint(1) NOT NULL DEFAULT '0',
  `website` tinyint(1) NOT NULL DEFAULT '0',
  `merekmobil` tinyint(1) NOT NULL DEFAULT '0',
  `bank` tinyint(1) NOT NULL DEFAULT '0',
  `acc_number` tinyint(1) NOT NULL DEFAULT '0',
  `acc_name` tinyint(1) NOT NULL DEFAULT '0',
  `of_addres` tinyint(1) NOT NULL DEFAULT '0',
  `of_poskode` tinyint(1) NOT NULL DEFAULT '0',
  `of_city` tinyint(1) NOT NULL DEFAULT '0',
  `of_prov` tinyint(1) NOT NULL DEFAULT '0',
  `of_phone` tinyint(1) NOT NULL DEFAULT '0',
  `of_phone2` tinyint(1) NOT NULL DEFAULT '0',
  `of_fax` tinyint(1) NOT NULL DEFAULT '0',
  `of_fax2` tinyint(1) NOT NULL DEFAULT '0',
  `of2_addres` tinyint(1) NOT NULL DEFAULT '0',
  `of2_poskode` tinyint(1) NOT NULL DEFAULT '0',
  `of2_city` tinyint(1) NOT NULL DEFAULT '0',
  `of2_prov` tinyint(1) NOT NULL DEFAULT '0',
  `of2_phone` tinyint(1) NOT NULL DEFAULT '0',
  `of2_phone2` tinyint(1) NOT NULL DEFAULT '0',
  `of2_fax` tinyint(1) NOT NULL DEFAULT '0',
  `of2_fax2` tinyint(1) NOT NULL DEFAULT '0',
  `dir_nama` tinyint(1) NOT NULL DEFAULT '0',
  `dir_noktp` tinyint(1) NOT NULL DEFAULT '0',
  `dir_hp` tinyint(1) NOT NULL DEFAULT '0',
  `dir_email` tinyint(1) NOT NULL DEFAULT '0',
  `dir_ktpdoc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `dir_ktpdoc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `dir_ktpdoc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `dir_ktpdoc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `cp_nama` tinyint(1) NOT NULL DEFAULT '0',
  `cp_noktp` tinyint(1) NOT NULL DEFAULT '0',
  `cp_hp` tinyint(1) NOT NULL DEFAULT '0',
  `cp_email` tinyint(1) NOT NULL DEFAULT '0',
  `cp_ktpdoc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `cp_ktpdoc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `cp_ktpdoc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `cp_ktpdoc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `auth_atpm` tinyint(1) NOT NULL DEFAULT '0',
  `auth_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'dokumen penunjukkan dealer resmi dr atpm',
  `auth_doc_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'dokumen penunjukkan dealer resmi dr atpm',
  `auth_doc_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'dokumen penunjukkan dealer resmi dr atpm',
  `auth_doc_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'dokumen penunjukkan dealer resmi dr atpm',
  `auth_date` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'tgl penujukan',
  `ap_notaris` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Nama Notaris',
  `ap_number` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Nomor Akta Notaris Pendirian Perusahaan',
  `ap_date` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Tanggal Akta Notaris Pendirian Perusahaan',
  `ap_doc` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dokumen Akta Notaris Pendirian Perusahaan',
  `ap_menhukam_no` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Nomor Surat Keputusan Menhukham',
  `ap_menhukam_date` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Tanggal  Surat Keputusan Menhukham',
  `ap_menhukam_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dokumen  Surat Keputusan Menhukham',
  `ap_menhukam_doc_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dokumen  Surat Keputusan Menhukham',
  `ap_menhukam_doc_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dokumen  Surat Keputusan Menhukham',
  `ap_menhukam_doc_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Dokumen  Surat Keputusan Menhukham',
  `an_notaris` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Akta Notaris Perubahan Terakhir',
  `an_nomor` tinyint(1) NOT NULL DEFAULT '0',
  `an_date` tinyint(1) NOT NULL DEFAULT '0',
  `an_doc` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_no` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_date` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `an_menhukam_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `siup_nomor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Izin Usaha Perdagangan (SIUP)',
  `siup_date` tinyint(1) NOT NULL DEFAULT '0',
  `siup_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `siup_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `siup_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `siup_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `tdp_nomor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Tanda Daftar Perusahaan (TDP)',
  `tdp_date` tinyint(1) NOT NULL DEFAULT '0',
  `tdp_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `tdp_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `tdp_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `tdp_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `situ_nomor` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Izin tempat Usaha (SITU)',
  `situ_date` tinyint(1) NOT NULL DEFAULT '0',
  `situ_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `situ_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `situ_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `situ_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `npwp_no` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Nomor Pokok Wajib Pajak (NPWP)',
  `npwp_date` tinyint(1) NOT NULL DEFAULT '0',
  `npwp_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `npwp_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `npwp_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `npwp_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `pkp_no` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pengukuhan Pengusaha Kena Pajak (PKP)',
  `pkp_date` tinyint(1) NOT NULL DEFAULT '0',
  `pkp_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `pkp_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `pkp_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `pkp_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `spt_date` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pemberitahuan (SPT) Tahunan Tahun Terakhir',
  `spt_datesetoran` tinyint(1) NOT NULL DEFAULT '0',
  `spt_nosetoran` tinyint(1) NOT NULL DEFAULT '0',
  `spt_doc_tersedia` tinyint(1) NOT NULL DEFAULT '0',
  `spt_doc_kop` tinyint(1) NOT NULL DEFAULT '0',
  `spt_doc_cap` tinyint(1) NOT NULL DEFAULT '0',
  `spt_doc_ttd` tinyint(1) NOT NULL DEFAULT '0',
  `tax_monthlydoc_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Laporan Bulanan PPh (pasal 21/23/25/29) atau PPN sekurang-kurangnya 3 bulan terakhir',
  `tax_monthlydoc_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Laporan Bulanan PPh (pasal 21/23/25/29) atau PPN sekurang-kurangnya 3 bulan terakhir',
  `tax_monthlydoc_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Laporan Bulanan PPh (pasal 21/23/25/29) atau PPN sekurang-kurangnya 3 bulan terakhir',
  `tax_monthlydoc_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Laporan Bulanan PPh (pasal 21/23/25/29) atau PPN sekurang-kurangnya 3 bulan terakhir',
  `exp_nama1` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Pengalaman Perusahaan dalam Pengadaan Mobil',
  `exp_own1` tinyint(1) NOT NULL DEFAULT '0',
  `exp_value1` tinyint(1) NOT NULL DEFAULT '0',
  `exp_date1` tinyint(1) NOT NULL DEFAULT '0',
  `exp_doc1_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc1_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc1_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc1_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_nama2` tinyint(1) NOT NULL DEFAULT '0',
  `exp_own2` tinyint(1) NOT NULL DEFAULT '0',
  `exp_value2` tinyint(1) NOT NULL DEFAULT '0',
  `exp_date2` tinyint(1) NOT NULL DEFAULT '0',
  `exp_doc2_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc2_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc2_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc2_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_nama3` tinyint(1) NOT NULL DEFAULT '0',
  `exp_own3` tinyint(1) NOT NULL DEFAULT '0',
  `exp_value3` tinyint(1) NOT NULL DEFAULT '0',
  `exp_date3` tinyint(1) NOT NULL DEFAULT '0',
  `exp_doc3_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc3_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc3_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc3_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_nama4` tinyint(1) NOT NULL DEFAULT '0',
  `exp_own4` tinyint(1) NOT NULL DEFAULT '0',
  `exp_value4` tinyint(1) NOT NULL DEFAULT '0',
  `exp_date4` tinyint(1) NOT NULL DEFAULT '0',
  `exp_doc4_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc4_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc4_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc4_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_nama5` tinyint(1) NOT NULL DEFAULT '0',
  `exp_own5` tinyint(1) NOT NULL DEFAULT '0',
  `exp_value5` tinyint(1) NOT NULL DEFAULT '0',
  `exp_date5` tinyint(1) NOT NULL DEFAULT '0',
  `exp_doc5_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc5_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc5_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `exp_doc5_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'salinan kontrak',
  `bank_ref` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Referensi Bank',
  `surat1_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Permohonan Menjadi Dealer Rekanan',
  `surat1_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Permohonan Menjadi Dealer Rekanan',
  `surat1_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Permohonan Menjadi Dealer Rekanan',
  `surat1_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Permohonan Menjadi Dealer Rekanan',
  `pailit_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan tidak pailit',
  `pailit_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan tidak pailit',
  `pailit_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan tidak pailit',
  `pailit_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan tidak pailit',
  `surat2_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan Kesanggupan memenuhi ketentuan E-purchasing',
  `surat2_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan Kesanggupan memenuhi ketentuan E-purchasing',
  `surat2_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan Kesanggupan memenuhi ketentuan E-purchasing',
  `surat2_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Surat Pernyataan Kesanggupan memenuhi ketentuan E-purchasing',
  `pakta_tersedia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Pakta Integritas',
  `pakta_kop` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Pakta Integritas',
  `pakta_cap` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Pakta Integritas',
  `pakta_ttd` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Pakta Integritas',
  `komentar` text COLLATE latin1_general_ci,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kualifikasi`
--

INSERT INTO `kualifikasi` (`username`, `nama`, `time_formed`, `website`, `merekmobil`, `bank`, `acc_number`, `acc_name`, `of_addres`, `of_poskode`, `of_city`, `of_prov`, `of_phone`, `of_phone2`, `of_fax`, `of_fax2`, `of2_addres`, `of2_poskode`, `of2_city`, `of2_prov`, `of2_phone`, `of2_phone2`, `of2_fax`, `of2_fax2`, `dir_nama`, `dir_noktp`, `dir_hp`, `dir_email`, `dir_ktpdoc_tersedia`, `dir_ktpdoc_kop`, `dir_ktpdoc_cap`, `dir_ktpdoc_ttd`, `cp_nama`, `cp_noktp`, `cp_hp`, `cp_email`, `cp_ktpdoc_tersedia`, `cp_ktpdoc_kop`, `cp_ktpdoc_cap`, `cp_ktpdoc_ttd`, `auth_atpm`, `auth_doc_tersedia`, `auth_doc_kop`, `auth_doc_cap`, `auth_doc_ttd`, `auth_date`, `ap_notaris`, `ap_number`, `ap_date`, `ap_doc`, `ap_menhukam_no`, `ap_menhukam_date`, `ap_menhukam_doc_tersedia`, `ap_menhukam_doc_kop`, `ap_menhukam_doc_cap`, `ap_menhukam_doc_ttd`, `an_notaris`, `an_nomor`, `an_date`, `an_doc`, `an_menhukam_no`, `an_menhukam_date`, `an_menhukam_doc_tersedia`, `an_menhukam_doc_kop`, `an_menhukam_doc_cap`, `an_menhukam_doc_ttd`, `siup_nomor`, `siup_date`, `siup_doc_tersedia`, `siup_doc_kop`, `siup_doc_cap`, `siup_doc_ttd`, `tdp_nomor`, `tdp_date`, `tdp_doc_tersedia`, `tdp_doc_kop`, `tdp_doc_cap`, `tdp_doc_ttd`, `situ_nomor`, `situ_date`, `situ_doc_tersedia`, `situ_doc_kop`, `situ_doc_cap`, `situ_doc_ttd`, `npwp_no`, `npwp_date`, `npwp_doc_tersedia`, `npwp_doc_kop`, `npwp_doc_cap`, `npwp_doc_ttd`, `pkp_no`, `pkp_date`, `pkp_doc_tersedia`, `pkp_doc_kop`, `pkp_doc_cap`, `pkp_doc_ttd`, `spt_date`, `spt_datesetoran`, `spt_nosetoran`, `spt_doc_tersedia`, `spt_doc_kop`, `spt_doc_cap`, `spt_doc_ttd`, `tax_monthlydoc_tersedia`, `tax_monthlydoc_kop`, `tax_monthlydoc_cap`, `tax_monthlydoc_ttd`, `exp_nama1`, `exp_own1`, `exp_value1`, `exp_date1`, `exp_doc1_tersedia`, `exp_doc1_kop`, `exp_doc1_cap`, `exp_doc1_ttd`, `exp_nama2`, `exp_own2`, `exp_value2`, `exp_date2`, `exp_doc2_tersedia`, `exp_doc2_kop`, `exp_doc2_cap`, `exp_doc2_ttd`, `exp_nama3`, `exp_own3`, `exp_value3`, `exp_date3`, `exp_doc3_tersedia`, `exp_doc3_kop`, `exp_doc3_cap`, `exp_doc3_ttd`, `exp_nama4`, `exp_own4`, `exp_value4`, `exp_date4`, `exp_doc4_tersedia`, `exp_doc4_kop`, `exp_doc4_cap`, `exp_doc4_ttd`, `exp_nama5`, `exp_own5`, `exp_value5`, `exp_date5`, `exp_doc5_tersedia`, `exp_doc5_kop`, `exp_doc5_cap`, `exp_doc5_ttd`, `bank_ref`, `surat1_tersedia`, `surat1_kop`, `surat1_cap`, `surat1_ttd`, `pailit_tersedia`, `pailit_kop`, `pailit_cap`, `pailit_ttd`, `surat2_tersedia`, `surat2_kop`, `surat2_cap`, `surat2_ttd`, `pakta_tersedia`, `pakta_kop`, `pakta_cap`, `pakta_ttd`, `komentar`) VALUES
('calondealer', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ''),
('hondabandungcenter', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Bagussss'),
('auto2000', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Terima Kasih. Dokumen Anda sudah lengkap.');

-- --------------------------------------------------------

--
-- Table structure for table `lalai`
--

CREATE TABLE IF NOT EXISTS `lalai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lalai` varchar(100) CHARACTER SET latin1 NOT NULL,
  `poin` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lalai`
--

INSERT INTO `lalai` (`id`, `lalai`, `poin`) VALUES
(1, 'Belum melakukan update dokumen kualifikasi setelah dokumen tersebut habis masa berlakunya', 10),
(2, 'Belum melakukan input lengkap harga hingga H+14 setelah terdaftar sebagai rekanan (memiliki username', 5),
(3, 'Jumlah stok yang tertera pada sistem e-purchasingtidak sesuai dengan kenyataan', 20),
(4, 'Tidak melakukan perubahan status PO menjadi  "dalam proses" H+10 setelah PO diterima.', 10),
(5, 'Tidak melakukan perubahan status PO menjadi  "telah dikirim" H+10 setelah PO diterima untuk pemesan', 10),
(6, 'Tidak melakukan perubahan status PO menjadi  "telah dikirim" H+90 setelah perubahan status PO menja', 10);

-- --------------------------------------------------------

--
-- Table structure for table `material_plan`
--

CREATE TABLE IF NOT EXISTS `material_plan` (
  `id_ajuan` int(11) NOT NULL AUTO_INCREMENT,
  `id_katalog` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `keperluan` varchar(500) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `daerah` int(11) NOT NULL,
  `total_hps` int(12) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu',
  `pesan` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ajuan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `material_plan`
--

INSERT INTO `material_plan` (`id_ajuan`, `id_katalog`, `jumlah`, `keperluan`, `departemen`, `daerah`, `total_hps`, `status`, `pesan`, `username`) VALUES
(51, 21, 2, 'Mobil Operasional Kesehatan Dinas Kesehatan Jawa Barat.', 'Dinas kesehatan kab. Bandung', 1, 661600000, 'diterima', 'Nomor Mata Anggaran akan segera diproses.', 'ulp_dinkes_jabar'),
(52, 24, 3, 'Mobil Operasional Kesehatan Dinas Kesehatan Jawa Barat.', 'Dinas kesehatan kab. Bandung', 1, 583500000, 'ditolak', '2 tahun kedepan tidak diizinkan mengadakan mobil operasional dinkes, karena baru diadakan dalam jumlah banyak pada tahun 2010.', 'ulp_dinkes_jabar'),
(53, 24, 3, 'Mobil Operasional Kesehatan Dinas Kesehatan Jawa Barat.', 'Dinas kesehatan kab. Bandung', 1, 583500000, 'Menunggu', '', 'ulp_dinkes_jabar'),
(54, 30, 2, 'Mobil dinas pejabat dinas kesehatan Jabar', 'Dinas Kesehatan jawa Barat', 6, 485400000, 'Menunggu', '', 'ulp_dinkes_jabar'),
(55, 21, 1, 'untuk mobil operasional', 'Departemen Kesahatan Kab.Bandung', 1, 330800000, 'Menunggu', 'tlg kurangi jumlah', 'ulp_dinkes_jabar');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE IF NOT EXISTS `penawaran` (
  `id_po` int(11) NOT NULL,
  `username_dealer` varchar(50) NOT NULL,
  `harga_penawaran` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `dealer_ajuan` varchar(70) NOT NULL DEFAULT 'Tidak Mengajukan' COMMENT 'status bisa tidak mengajukan atau telah mengajukan',
  `tgl_penawaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id_po`, `username_dealer`, `harga_penawaran`, `pesan`, `dealer_ajuan`, `tgl_penawaran`) VALUES
(1, 'dealer', 0, '', 'Tidak Mengajukan', '0000-00-00'),
(1, 'plaza_toyota', 0, '', 'Tidak Mengajukan', '0000-00-00'),
(1, 'auto2000', 0, '', 'Tidak Mengajukan', '0000-00-00'),
(2, 'dealer', 0, '', 'Tidak Mengajukan', '0000-00-00'),
(2, 'plaza_toyota', 200000, 'lajkhkkjsga', 'Telah Mengajukan', '2011-08-20'),
(2, 'auto2000', 200000, 'aassdfdgdjhsfkdjngda', 'Telah Mengajukan', '2011-08-14'),
(3, 'dealer', 0, '', 'Tidak Mengajukan', '0000-00-00'),
(3, 'plaza_toyota', 200, 'beli yang aku aja ya', 'Telah Mengajukan', '2011-08-12'),
(3, 'auto2000', 100, 'beli ya', 'Telah Mengajukan', '2011-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_PO` int(11) NOT NULL,
  `id_stok_warna` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_PO`, `id_stok_warna`, `jumlah_pesan`) VALUES
(3, 98, 3),
(3, 101, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_pr`
--

CREATE TABLE IF NOT EXISTS `pesanan_pr` (
  `id_PO` int(11) NOT NULL,
  `id_warna` int(10) NOT NULL,
  `jumlah_pesan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_pr`
--

INSERT INTO `pesanan_pr` (`id_PO`, `id_warna`, `jumlah_pesan`) VALUES
(1, 18, 2),
(1, 19, 2),
(2, 12, 1),
(2, 13, 1),
(3, 18, 4),
(3, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id_PO` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `dealer` varchar(60) NOT NULL,
  `nomor_ang` int(100) NOT NULL,
  `daerah` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `OnTR` int(50) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL DEFAULT 'Non Preorder',
  `tgl_pemenuhan` date NOT NULL,
  `status_dealer` varchar(50) NOT NULL DEFAULT 'Menunggu',
  `username` varchar(100) NOT NULL,
  `tgl_terima_po` date NOT NULL,
  `status_invoice` varchar(20) NOT NULL DEFAULT 'belum ada' COMMENT 'menunggu / telah dikirim ',
  `tgl_PR` date NOT NULL,
  `jumlah_penawaran` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_PO`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id_PO`, `tanggal`, `dealer`, `nomor_ang`, `daerah`, `alamat`, `OnTR`, `jumlah_pesanan`, `total_harga`, `status_pesanan`, `tgl_pemenuhan`, `status_dealer`, `username`, `tgl_terima_po`, `status_invoice`, `tgl_PR`, `jumlah_penawaran`) VALUES
(1, '2011-08-11', '', 2012, 24, 'ccc', 0, 4, 0, '', '2011-08-30', 'Menunggu', 'ulp_dinkes_jabar', '0000-00-00', 'belum ada', '2011-08-16', 0),
(2, '2011-08-11', '', 6789, 1, 'bjhdfkkjfa', 0, 2, 0, '', '2011-08-24', 'Menunggu', 'auto2000', '0000-00-00', 'belum ada', '2013-11-28', 2),
(3, '2011-08-12', 'auto2000', 1208, 1, 'LPIK', 100, 7, 700, 'Non Pre Order', '2011-08-19', 'Menunggu', 'ulp_dinkes_jabar', '0000-00-00', 'belum ada', '2011-08-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spekintext_eks`
--

CREATE TABLE IF NOT EXISTS `spekintext_eks` (
  `eks` varchar(50) NOT NULL,
  `eks_doc` varchar(500) NOT NULL,
  `eks_desc` varchar(500) NOT NULL,
  `id_tipe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spekintext_eks`
--

INSERT INTO `spekintext_eks` (`eks`, `eks_doc`, `eks_desc`, `id_tipe`) VALUES
('Rear bumper ', 'ext_atpm_toyota06.gif', 'Dari bahan resin yang besar dan kokoh, didesain sesuai dengan kontur bodi bagian belakang sehingga menambah penampilan AVANZA lebih elegan', 13),
('Rear spoiler', 'ext_atpm_toyota14.gif', 'Dipadu dengan high mount stop lamp membuat AVANZA lebih sporti dan saat pengereman terlihat jelas oleh pengemudi dibelakang.', 13),
('Design baru lampu kombinasi belakang', 'ext_atpm_toyota23.gif', 'Dua bulatan lampu belakang dengan dukungan lampu multireflektor, semakin menegaskan kesan elegan pada AVANZA.', 13),
('Rear wiper', 'ext_atpm_toyota32.gif', 'Fitur fungsional pada kaca belakang membantu pengemudi untuk memaksimalkan daya pandang ke belakang kendaraan.', 13),
('Rear door', 'ext_atpm_toyota42.gif', 'Dilengkapi dengan hidraulik dan dapat dibuka ke atas dengan lebar mempermudah Anda memasukkan dan mengeluarkan barang bawaan dengan nyaman serta berfungsi sebagai atap pada saat hujan.', 13),
('Rem Cakram', 'ext_atpm_toyota01.PNG', 'Rem Cakram 15 inci pada semua roda (tipe V & G).', 14),
('Headlamps', 'ext_atpm_toyota11.PNG', 'HID Headlamp yang bisa diset secara manual. Lampu depan multireflektor dengan bohlam HID (High Intensity Discharge) (tipe V) dan halogen (tipe J & G) menghasilkan cahaya yang lebih terang dengan cakupan yang luas (khusus tipe V).', 14),
('Wiper Otomatis', 'ext_atpm_toyota21.PNG', 'Wiper Otomatis dengan sensor hujan (khusus tipe V).', 14),
('High Mount Stop Lamp', 'ext_atpm_toyota31.PNG', 'High Mount Stop Lamp dengan LED membantu memperingatkan pengemudi lain ketika pengemudi melakukan pengereman.', 14),
('Lampu Kabut', 'ext_atpm_toyota41.PNG', 'Lampu kabut terletak di bemper depan untuk meningkatkan keamanan berkendara di saat cuaca buruk. Untuk tipe V, lampu kabut dihias dengan cincin krom.', 14),
('Mud Guard', 'ext_atpm_toyota07.gif', '', 15),
('Rear Roof Spoiler', 'ext_atpm_toyota15.gif', '', 15),
('Side Body Moulding', 'ext_atpm_toyota24.gif', '', 15),
('FOG LIGHTS with GARNISH', 'ext_atpm_honda03.jpg', '', 16),
('FRONT GRILLE', 'ext_atpm_honda14.jpg', '', 16),
('MUD GUARD SET', 'ext_atpm_honda23.jpg', '', 16),
('DOOR HANDLE COVER SET', 'ext_atpm_honda33.jpg', '', 16),
('DOOR VISOR SET', 'ext_atpm_honda43.jpg', '', 16),
('BUMPER CORNER PROTECTOR', 'ext_atpm_honda53.jpg', '', 16),
('Front Grille', 'ext_atpm_honda04.jpg', '', 17),
('Front Lower Garnish', 'ext_atpm_honda15.jpg', '', 17),
('Door Lower Garnish', 'ext_atpm_honda24.jpg', '', 17),
('Rear Lower Garnish', 'ext_atpm_honda34.jpg', '', 17),
('Front Under Spoiler', 'ext_atpm_honda44.jpg', '', 17),
('Side Under Spoiler', 'ext_atpm_honda54.jpg', '', 17),
('Rear Under Spoiler', 'ext_atpm_honda62.jpg', '', 17),
('Trunk Spoiler', 'ext_atpm_honda72.jpg', '', 17),
('Side Protector', 'ext_atpm_honda82.jpg', '', 17),
('Rear Corner Protector', 'ext_atpm_honda92.jpg', '', 17),
('Front Corner Protector', 'ext_atpm_honda102.jpg', '', 17),
('Door Visor', 'ext_atpm_honda111.jpg', '', 17),
('Front Aero Bumper', 'ext_atpm_honda05.jpg', '', 18),
('Rear Aero Bumper', 'ext_atpm_honda16.jpg', '', 18),
('Front Lower Garnish', 'ext_atpm_honda25.jpg', '', 18),
('Rear Lower Garnish', 'ext_atpm_honda35.jpg', '', 18),
('Running Board', 'ext_atpm_honda45.jpg', '', 18),
('Fog Lights Garnish', 'ext_atpm_honda55.jpg', '', 18),
('Door Mirror Cover', 'ext_atpm_honda63.jpg', '', 18),
('Tail Gate Spoiler', 'ext_atpm_honda73.jpg', '', 18),
('Exhaust Pipe Finisher', 'ext_atpm_honda83.jpg', '', 18),
('Front Grille', 'ext_atpm_honda93.jpg', '', 18),
('Side Under Spoiler', 'ext_atpm_honda103.jpg', '', 18),
('bagian depan', 'ext_atpm_toyota0.jpg', 'xx', 19);

-- --------------------------------------------------------

--
-- Table structure for table `spekintext_int`
--

CREATE TABLE IF NOT EXISTS `spekintext_int` (
  `int` varchar(50) DEFAULT NULL,
  `int_doc` varchar(500) DEFAULT NULL,
  `int_desc` varchar(500) DEFAULT NULL,
  `id_tipe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spekintext_int`
--

INSERT INTO `spekintext_int` (`int`, `int_doc`, `int_desc`, `id_tipe`) VALUES
('Audio System', 'int24.gif', 'Panel instrumennya dilengkapi dengan berbagai fitur terbaru. Kini tampil dalam warna baru, sistem audio dengan CD dan cassette player dilengkapi dengan 4 speaker dan 2 tweeter (1.5S), menghasilkan kualitas suara yang jernih, menjadikan perjalanan Anda semakin nyaman.', 13),
('Rear Seat Belt ', 'int_atpm_toyota06.gif', 'Tidak hanya tempat duduk depan dan tengah yang dilengkapi dengan seat belt melainkan juga tempat duduk belakang, menambah keamanan dan kenyamanan anda berkendara bersama keluarga.', 13),
('Combination Meter ', 'int_atpm_toyota25.gif', 'Dengan lingkaran meter berwarna silver dan pilihan warna yang kontras menghadirkan nuansa tenang dan sporty', 13),
('leather seats', 'int_atpm_toyota07.gif', 'Nikmati kenyamanan sepanjang perjalanan di setiap ruang kabin All New Corolla Altis yang makin lega, menjadikan hari-hari Anda penuh kesegaran.', 14),
('steering wheel ', 'int_atpm_toyota16.gif', 'Leather & Wood Trimmed Steering Wheel with Audio & MID Switches (V type).', 14),
('multi information display', 'int_atpm_toyota26.gif', 'Meter kombinasi tipe optitron, canggih, dilengkapi Dot LCD MID memudahkan pengontrolan (V& G type).', 14),
('third row set', 'int_atpm_toyota08.gif', '', 15),
('door trim', 'int_atpm_toyota17.gif', '', 15),
('steering wheel ', 'int_atpm_toyota27.gif', '', 15),
('SHIFT KNOB LEATHER', 'int_atpm_honda03.jpg', '', 16),
('STEERING WHEEL COVER', 'int_atpm_honda13.jpg', '', 16),
('INTERIOR PANEL WOODY', 'int_atpm_honda23.jpg', '', 16),
('INTERIOR PANEL METAL', 'int_atpm_honda33.jpg', '', 16),
('TRUNK TRAY', 'int_atpm_honda43.jpg', '', 16),
('FRONT SIDE STEP GARNISH', 'int_atpm_honda53.jpg', '', 16),
('REAR SIDE STEP GARNISH', 'int_atpm_honda61.jpg', '', 16),
('BLACK FLOOR MAT', 'int_atpm_honda71.jpg', '', 16),
('Side Step Garnish', 'int_atpm_honda04.jpg', '', 17),
('Side Step Illumi Kit', 'int_atpm_honda14.jpg', '', 17),
('Interior Panel Set Carbon', 'int_atpm_honda24.jpg', '', 17),
('Interior Panel Set Wood', 'int_atpm_honda34.jpg', '', 17),
('Floor Mat', 'int_atpm_honda44.jpg', '', 17),
('Sport Pedal (AT)', 'int_atpm_honda54.jpg', '', 17),
('Interior Panel Set Wood', 'int_atpm_honda05.jpg', '', 18),
('Tonneau Cover Ivory', 'int_atpm_honda15.jpg', '', 18),
('Side Step Garnish', 'int_atpm_honda25.jpg', '', 18),
('Side Step Garnish With Illumination', 'int_atpm_honda35.jpg', '', 18),
('Interior Panel Set Carbon', 'int_atpm_honda45.jpg', '', 18),
('Steering Wheel Carbon', 'int_atpm_honda55.jpg', '', 18),
('kursi', 'int_atpm_toyota09.gif', 'xxxx', 19),
('dashboard', 'int_atpm_toyota18.gif', '', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE IF NOT EXISTS `tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merek` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `spec` varchar(100) NOT NULL,
  `atpm_name` varchar(50) NOT NULL,
  `PIC` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `merek`, `jenis`, `model`, `spec`, `atpm_name`, `PIC`) VALUES
(16, 'Honda', 'MPV', 'Freed', 'Freed_specs_spec7.gif', 'atpm_honda', '12.jpg'),
(15, 'Toyota', 'SUV', 'Rush', 'spek14.PNG', 'atpm_toyota', '171.gif'),
(14, 'Toyota', 'SEDAN', 'Corolla Altis', '1800_E3.PNG', 'atpm_toyota', '108.gif'),
(13, 'Toyota', 'MPV', 'New Avanza', 'spek13.PNG', 'atpm_toyota', '15.gif'),
(17, 'Honda', 'SEDAN', 'Accord', 'Accord_specs_spec-accord-new.gif', 'atpm_honda', '13.jpg'),
(18, 'Honda', 'SUV', 'New CR-V', 'CR-V_specs_baru1.jpg', 'atpm_honda', 'CR-V_imagebanner__banner-kecil1.jpg'),
(19, 'Toyota', 'MPV', 'inove', 'spek15.PNG', 'atpm_toyota', '16.gif');

-- --------------------------------------------------------

--
-- Table structure for table `ulp`
--

CREATE TABLE IF NOT EXISTS `ulp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ulp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_daerah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ulp`
--

INSERT INTO `ulp` (`id`, `ulp`, `nama`, `id_daerah`) VALUES
(1, 'ulp_dinkes_jabar', 'Unit Layanan Pengadaan Dinas Kesehatan Jawa Barat', 1),
(2, 'ulp_dprd_jabar', 'Unit Layanan Pengadaan DPRD Jawa Barat', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '1 : admin , 2 : calon dealer, 3 : dealer, 4 : admin ulp, 5 : atpm, 6 : ppkd,7: keuangan',
  PRIMARY KEY (`username`),
  FULLTEXT KEY `username` (`username`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES
('calondealer', 'calondealer', 'amalia_dwi_putri@yahoo.com', 2),
('ulp_dprd_jabar', 'dprd', 'ulp@dprd.com', 4),
('atpm_toyota', 'toyota', 'atpm1@etpm.com', 5),
('admin', 'admin', 'admin@admin.com', 1),
('ulp_dinkes_jabar', 'dinkes', 'ulp@ulp.com', 4),
('ppkd', 'ppkd', 'ppkd@ppkd.com', 6),
('hondabandungcenter', 'hondabandungcenter', 'cdealer1@cdealer.com', 3),
('plaza_toyota', 'plaza_toyota', 'dealer2@dealer2.com', 3),
('atpm_honda', 'honda', 'atpm2@atpm.cpm', 5),
('auto2000', 'auto2000', 'amalia_dwi_putri@yahoo.com', 3),
('admin2', 'admin2', 'aaa', 1),
('keuangan', 'keuangan', 'keuangan@yahoo.com', 7);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE IF NOT EXISTS `warna` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ID_tipe` int(11) NOT NULL,
  `warna` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`ID`, `ID_tipe`, `warna`) VALUES
(6, 13, 'Champagne Metallic'),
(5, 13, 'Silver Metallic'),
(7, 13, 'Wine Red Metallic'),
(8, 13, 'Dark Grey Metallic'),
(9, 13, 'Black Mica'),
(10, 13, 'Aqua Metallic'),
(11, 13, 'Light Green Metallic'),
(12, 14, 'Beige Metallic'),
(13, 14, 'Silver Metallic'),
(14, 14, 'Medium Silver Metali'),
(15, 14, 'Dark Grey Mica'),
(16, 14, 'Black Mica'),
(17, 14, 'Grayish Blue Metalli'),
(18, 15, 'White'),
(19, 15, 'Black Mica'),
(20, 15, 'Champagne M.M'),
(21, 15, 'Dark Grey'),
(22, 15, 'Silver Meca Metallic'),
(23, 15, 'Maroon MC'),
(24, 16, 'Brilliant White Pear'),
(25, 16, 'Crystal Black Pearl'),
(26, 16, 'Polished Metal Metal'),
(27, 16, 'Alabaster Silver Met'),
(28, 16, 'Basque Red Pearl'),
(29, 16, 'Luminous Blue Pearl'),
(30, 17, 'Brilliant White Pear'),
(31, 17, 'Crystal Black Pearl'),
(32, 17, 'Urban Titanium Metal'),
(33, 17, 'Alabaster Silver Met'),
(34, 17, 'Polished Metal Metal'),
(35, 17, 'Bold Beige Metallic '),
(36, 18, 'Polished Metal Metal'),
(37, 18, 'Alabaster Silver Met'),
(38, 18, 'Dark Mocha Pearl '),
(39, 18, 'Crystal Black Pearl'),
(40, 18, 'Brilliant White Pear'),
(41, 18, 'Urban Titanium Metal'),
(42, 19, 'merah'),
(43, 19, 'Kuning');

-- --------------------------------------------------------

--
-- Table structure for table `warna_stok`
--

CREATE TABLE IF NOT EXISTS `warna_stok` (
  `id_stok_warna` int(11) NOT NULL AUTO_INCREMENT,
  `ID_warna` int(11) NOT NULL COMMENT 'foreign key dr tabel warna',
  `id_katalog` int(11) NOT NULL,
  `username_dealer` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'foreign key dr tabel dealer',
  `stok` int(5) NOT NULL COMMENT 'jumlah stok mobil dengan warna tersebut punya dealer tsb',
  PRIMARY KEY (`id_stok_warna`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=180 ;

--
-- Dumping data for table `warna_stok`
--

INSERT INTO `warna_stok` (`id_stok_warna`, `ID_warna`, `id_katalog`, `username_dealer`, `stok`) VALUES
(7, 14, 21, 'auto2000', 2),
(6, 13, 21, 'auto2000', 2),
(5, 12, 21, 'auto2000', 0),
(8, 15, 21, 'auto2000', 0),
(9, 16, 21, 'auto2000', -1),
(10, 17, 21, 'auto2000', -1),
(11, 6, 19, 'auto2000', 3),
(12, 5, 19, 'auto2000', 2),
(13, 7, 19, 'auto2000', 2),
(14, 8, 19, 'auto2000', 0),
(15, 9, 19, 'auto2000', 3),
(16, 10, 19, 'auto2000', 2),
(17, 11, 19, 'auto2000', 1),
(18, 6, 18, 'auto2000', 2),
(19, 5, 18, 'auto2000', 2),
(20, 7, 18, 'auto2000', 0),
(21, 8, 18, 'auto2000', 0),
(22, 9, 18, 'auto2000', 0),
(23, 10, 18, 'auto2000', 0),
(24, 11, 18, 'auto2000', 2),
(25, 6, 17, 'auto2000', 2),
(26, 5, 17, 'auto2000', 2),
(27, 7, 17, 'auto2000', 0),
(28, 8, 17, 'auto2000', 0),
(29, 9, 17, 'auto2000', 0),
(30, 10, 17, 'auto2000', 0),
(31, 11, 17, 'auto2000', 2),
(32, 6, 36, 'auto2000', 0),
(33, 5, 16, 'auto2000', 2),
(34, 7, 16, 'auto2000', 0),
(35, 8, 16, 'auto2000', 3),
(36, 9, 16, 'auto2000', 2),
(37, 10, 16, 'auto2000', 3),
(38, 11, 16, 'auto2000', 0),
(39, 6, 15, 'auto2000', 0),
(40, 5, 15, 'auto2000', 3),
(41, 7, 15, 'auto2000', 4),
(42, 8, 15, 'auto2000', 0),
(43, 9, 15, 'auto2000', 0),
(44, 10, 15, 'auto2000', 0),
(45, 11, 15, 'auto2000', 0),
(46, 6, 14, 'auto2000', 5),
(47, 5, 14, 'auto2000', 0),
(48, 7, 14, 'auto2000', 0),
(49, 8, 14, 'auto2000', 5),
(50, 9, 14, 'auto2000', 0),
(51, 10, 14, 'auto2000', 0),
(52, 11, 14, 'auto2000', 5),
(53, 6, 13, 'auto2000', 2),
(54, 5, 13, 'auto2000', 0),
(55, 7, 13, 'auto2000', 4),
(56, 8, 13, 'auto2000', 0),
(57, 9, 13, 'auto2000', 2),
(58, 10, 13, 'auto2000', 0),
(59, 11, 13, 'auto2000', 0),
(60, 12, 22, 'auto2000', 0),
(61, 13, 22, 'auto2000', 2),
(62, 14, 22, 'auto2000', 0),
(63, 15, 22, 'auto2000', 3),
(64, 16, 22, 'auto2000', 0),
(65, 17, 22, 'auto2000', 5),
(66, 18, 29, 'auto2000', 3),
(67, 19, 29, 'auto2000', 0),
(68, 20, 29, 'auto2000', 2),
(69, 21, 29, 'auto2000', 0),
(70, 22, 29, 'auto2000', 0),
(71, 23, 29, 'auto2000', -1),
(72, 18, 28, 'auto2000', 0),
(73, 19, 28, 'auto2000', 3),
(74, 20, 28, 'auto2000', 0),
(75, 21, 28, 'auto2000', 4),
(76, 22, 28, 'auto2000', 0),
(77, 23, 28, 'auto2000', 5),
(78, 18, 27, 'auto2000', 0),
(79, 19, 27, 'auto2000', 0),
(80, 20, 27, 'auto2000', 3),
(81, 21, 27, 'auto2000', 0),
(82, 22, 27, 'auto2000', 0),
(83, 23, 27, 'auto2000', 5),
(84, 18, 26, 'auto2000', 0),
(85, 19, 26, 'auto2000', 3),
(86, 20, 26, 'auto2000', 0),
(87, 21, 26, 'auto2000', 0),
(88, 22, 26, 'auto2000', 3),
(89, 23, 26, 'auto2000', 0),
(90, 18, 25, 'auto2000', 0),
(91, 19, 25, 'auto2000', 0),
(92, 20, 25, 'auto2000', 3),
(93, 21, 25, 'auto2000', 0),
(94, 22, 25, 'auto2000', 0),
(95, 23, 25, 'auto2000', 4),
(96, 18, 24, 'auto2000', 0),
(97, 19, 24, 'auto2000', 0),
(98, 20, 24, 'auto2000', 5),
(99, 21, 24, 'auto2000', 0),
(100, 22, 24, 'auto2000', 0),
(101, 23, 24, 'auto2000', 6),
(102, 12, 23, 'auto2000', 5),
(103, 13, 23, 'auto2000', 0),
(104, 14, 23, 'auto2000', 8),
(105, 15, 23, 'auto2000', 0),
(106, 16, 23, 'auto2000', 0),
(107, 17, 23, 'auto2000', 0),
(108, 12, 21, 'plaza_toyota', 0),
(109, 13, 21, 'plaza_toyota', 2),
(110, 14, 21, 'plaza_toyota', 2),
(111, 15, 21, 'plaza_toyota', 0),
(112, 16, 21, 'plaza_toyota', -1),
(113, 17, 21, 'plaza_toyota', -1),
(114, 12, 22, 'plaza_toyota', 6),
(115, 13, 22, 'plaza_toyota', 6),
(116, 14, 22, 'plaza_toyota', 0),
(117, 15, 22, 'plaza_toyota', 0),
(118, 16, 22, 'plaza_toyota', 0),
(119, 17, 22, 'plaza_toyota', 6),
(120, 12, 23, 'plaza_toyota', 0),
(121, 13, 23, 'plaza_toyota', 6),
(122, 14, 23, 'plaza_toyota', 6),
(123, 15, 23, 'plaza_toyota', 6),
(124, 16, 23, 'plaza_toyota', 0),
(125, 17, 23, 'plaza_toyota', 0),
(126, 36, 38, 'hondabandungcenter', -1),
(127, 37, 38, 'hondabandungcenter', 5),
(128, 38, 38, 'hondabandungcenter', 6),
(129, 39, 38, 'hondabandungcenter', 0),
(130, 40, 38, 'hondabandungcenter', 7),
(131, 41, 38, 'hondabandungcenter', 0),
(132, 36, 37, 'hondabandungcenter', 0),
(133, 37, 37, 'hondabandungcenter', 7),
(134, 38, 37, 'hondabandungcenter', 7),
(135, 39, 37, 'hondabandungcenter', 0),
(136, 40, 37, 'hondabandungcenter', 0),
(137, 41, 37, 'hondabandungcenter', 0),
(138, 36, 36, 'hondabandungcenter', 3),
(139, 37, 36, 'hondabandungcenter', 2),
(140, 38, 36, 'hondabandungcenter', 0),
(141, 39, 36, 'hondabandungcenter', 3),
(142, 40, 36, 'hondabandungcenter', 0),
(143, 41, 36, 'hondabandungcenter', 0),
(144, 30, 35, 'hondabandungcenter', 5),
(145, 31, 35, 'hondabandungcenter', 1),
(146, 32, 35, 'hondabandungcenter', 0),
(147, 33, 35, 'hondabandungcenter', 4),
(148, 34, 35, 'hondabandungcenter', 0),
(149, 35, 35, 'hondabandungcenter', 0),
(150, 30, 34, 'hondabandungcenter', 0),
(151, 31, 34, 'hondabandungcenter', 5),
(152, 32, 34, 'hondabandungcenter', 0),
(153, 33, 34, 'hondabandungcenter', 5),
(154, 34, 34, 'hondabandungcenter', 0),
(155, 35, 34, 'hondabandungcenter', 5),
(156, 30, 33, 'hondabandungcenter', 2),
(157, 31, 33, 'hondabandungcenter', 0),
(158, 32, 33, 'hondabandungcenter', 2),
(159, 33, 33, 'hondabandungcenter', 3),
(160, 34, 33, 'hondabandungcenter', 4),
(161, 35, 33, 'hondabandungcenter', 0),
(162, 30, 32, 'hondabandungcenter', 0),
(163, 31, 32, 'hondabandungcenter', 6),
(164, 32, 32, 'hondabandungcenter', 0),
(165, 33, 32, 'hondabandungcenter', 7),
(166, 34, 32, 'hondabandungcenter', 6),
(167, 35, 32, 'hondabandungcenter', 0),
(168, 24, 31, 'hondabandungcenter', 4),
(169, 25, 31, 'hondabandungcenter', 4),
(170, 26, 31, 'hondabandungcenter', 0),
(171, 27, 31, 'hondabandungcenter', 5),
(172, 28, 31, 'hondabandungcenter', 0),
(173, 29, 31, 'hondabandungcenter', 0),
(174, 24, 30, 'hondabandungcenter', 1),
(175, 25, 30, 'hondabandungcenter', 2),
(176, 26, 30, 'hondabandungcenter', 0),
(177, 27, 30, 'hondabandungcenter', 3),
(178, 28, 30, 'hondabandungcenter', 0),
(179, 29, 30, 'hondabandungcenter', 0);
