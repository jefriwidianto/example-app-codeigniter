-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 09:50 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_user` int(11) NOT NULL,
  `nm_karyawan` varchar(25) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `atasan` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_bulan`
--

CREATE TABLE `ref_bulan` (
  `bulan` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_bulan`
--

INSERT INTO `ref_bulan` (`bulan`) VALUES
('01'),
('02'),
('03'),
('04'),
('05'),
('06'),
('07'),
('08'),
('09'),
('10'),
('11'),
('12');

-- --------------------------------------------------------

--
-- Table structure for table `ref_corp`
--

CREATE TABLE `ref_corp` (
  `id_corp` int(11) NOT NULL,
  `nm_corp` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_corp`
--

INSERT INTO `ref_corp` (`id_corp`, `nm_corp`, `status`) VALUES
(1, 'Project Manager', 1),
(2, 'Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatan`
--

CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(25) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ref_level`
--

CREATE TABLE `ref_level` (
  `id_level` int(11) NOT NULL,
  `nm_level` varchar(15) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_level`
--

INSERT INTO `ref_level` (`id_level`, `nm_level`, `active`) VALUES
(1, 'Kepala Prodi', 1),
(2, 'Staff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_level_menu_access`
--

CREATE TABLE `ref_level_menu_access` (
  `id_level_menu_access` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu_details` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_level_menu_access`
--

INSERT INTO `ref_level_menu_access` (`id_level_menu_access`, `id_level`, `id_menu_details`, `active`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(16, 1, 16, 1),
(19, 1, 19, 1),
(24, 1, 24, 1),
(25, 1, 25, 1),
(26, 1, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_menu_details`
--

CREATE TABLE `ref_menu_details` (
  `id_menu_details` int(11) NOT NULL,
  `nm_menu_details` varchar(20) NOT NULL,
  `url` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `position` tinyint(1) NOT NULL,
  `id_menu_groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_menu_details`
--

INSERT INTO `ref_menu_details` (`id_menu_details`, `nm_menu_details`, `url`, `active`, `position`, `id_menu_groups`) VALUES
(1, 'Menu Detail', 'menu_details', 1, 1, 1),
(2, 'Karyawan', 'user', 1, 1, 5),
(3, 'Level Menu Access', 'level_menu_access', 1, 3, 1),
(4, 'Menu Group', 'menu_groups', 1, 4, 1),
(6, 'Device', 'device', 1, 1, 2),
(7, 'Data Log', 'log', 1, 2, 2),
(8, 'Export to Excel', 'report', 1, 1, 3),
(9, 'Export to .Pdf', 'report/pdf', 1, 2, 3),
(15, 'Jabatan', 'corp', 1, 7, 5),
(19, 'Level Akses', 'level', 1, 4, 1),
(24, 'Income Letter', 'surat_masuk', 1, 1, 4),
(25, 'Send Letter', 'surat_keluar', 1, 3, 4),
(26, 'Disposisi', 'dis', 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ref_menu_groups`
--

CREATE TABLE `ref_menu_groups` (
  `id_menu_groups` int(11) NOT NULL,
  `nm_menu_groups` varchar(20) NOT NULL,
  `position` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_menu_groups`
--

INSERT INTO `ref_menu_groups` (`id_menu_groups`, `nm_menu_groups`, `position`, `active`) VALUES
(1, 'Setting', 1, 1),
(3, 'Report', 4, 1),
(4, 'Operasional', 3, 1),
(5, 'Master', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_pangkat`
--

CREATE TABLE `ref_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nm_pangkat` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_pangkat`
--

INSERT INTO `ref_pangkat` (`id_pangkat`, `nm_pangkat`, `status`) VALUES
(1, 'kopral', 1),
(2, 'jendral', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_user`
--

CREATE TABLE `ref_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `atasan` int(11) NOT NULL,
  `id_corp` int(11) NOT NULL,
  `id_level` int(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ref_user`
--

INSERT INTO `ref_user` (`id_user`, `nik`, `nm_user`, `username`, `password`, `atasan`, `id_corp`, `id_level`, `active`) VALUES
(1, '', 'saykul', 'saykul', 'cakep', 0, 0, 1, 1),
(121, '', 'ridho', 'ridho', 'ridho', 1, 2, 1, 1),
(111001, '', 'tumhi', 'tata', 'tata', 1233212, 1, 1, 1),
(1233212, '', 'anas', 'ujicoba', 'ujicoba', 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_coba`
--

CREATE TABLE `tr_coba` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_coba`
--

INSERT INTO `tr_coba` (`id`, `id_surat`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tr_dis`
--

CREATE TABLE `tr_dis` (
  `id` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tujukan` varchar(50) NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_dis`
--

INSERT INTO `tr_dis` (`id`, `id_surat`, `tujukan`, `alasan`, `note`) VALUES
(1, 3, 'haish', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tr_surat_keluar`
--

CREATE TABLE `tr_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_surat_keluar` varchar(30) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `isi_surat` text NOT NULL,
  `cdate` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_surat_keluar`
--

INSERT INTO `tr_surat_keluar` (`id_surat_keluar`, `no_surat_keluar`, `hal`, `isi_surat`, `cdate`, `id_user`, `keterangan`, `atas_nama`, `status`, `prodi`) VALUES
(149, '001/June-18/Teknik Informatika', 'Programing', '<p><span style="color:#c0392b">SELECT</span><br />\r\n&nbsp;&nbsp; &nbsp;<em>date_format(a.c_date,&#39;%M&#39;) AS c_date,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(b.id_surat_keluar)AS total1,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(c.id_surat)AS total2</em><br />\r\n<span style="color:#c0392b">FROM</span><br />\r\n&nbsp;&nbsp; <em>&nbsp;t_chart a LEFT&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_masuk c ON a.id_surat = c.id_surat</em><br />\r\n<span style="color:#e74c3c">GROUP BY</span><br />\r\n&nbsp;&nbsp; &nbsp;<span style="color:#c0392b">MONTH</span>(a.c_date)</p>\r\n', '2017-01-24', 0, 'bisa nggak', 'Bpk. Santoso', 1, 'Teknik Informatika'),
(150, '002/June-18/Akuntansi', 'Akuntansi', '<p>SELECT<br />\r\n&nbsp;&nbsp; &nbsp;date_format(a.c_date,&#39;%M&#39;) AS c_date,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(b.id_surat_keluar)AS total1,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(c.id_surat)AS total2<br />\r\nFROM<br />\r\n&nbsp;&nbsp; &nbsp;t_chart a LEFT&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_masuk c ON a.id_surat = c.id_surat<br />\r\nGROUP BY<br />\r\n&nbsp;&nbsp; &nbsp;MONTH(a.c_date)SELECT<br />\r\n&nbsp;&nbsp; &nbsp;date_format(a.c_date,&#39;%M&#39;) AS c_date,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(b.id_surat_keluar)AS total1,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(c.id_surat)AS total2<br />\r\nFROM<br />\r\n&nbsp;&nbsp; &nbsp;t_chart a LEFT&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_masuk c ON a.id_surat = c.id_surat<br />\r\nGROUP BY<br />\r\n&nbsp;&nbsp; &nbsp;MONTH(a.c_date)</p>\r\n', '2017-03-15', 0, 'always off', 'Bpk. Tatang Sutarman', 1, 'Akuntansi'),
(152, '004/June-18/Fisika', 'Fisika', '<p>SELECT<br />\r\n&nbsp;&nbsp; &nbsp;date_format(a.c_date,&#39;%M&#39;) AS c_date,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(b.id_surat_keluar)AS total1,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(c.id_surat)AS total2<br />\r\nFROM<br />\r\n&nbsp;&nbsp; &nbsp;t_chart a LEFT&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_masuk c ON a.id_surat = c.id_surat<br />\r\nGROUP BY<br />\r\n&nbsp;&nbsp; &nbsp;MONTH(a.c_date)</p>\r\n', '2017-08-24', 0, 'fer', 'Bpk.terter', 1, 'Fisika'),
(153, '005/June-18/Manajemen', 'Matakuliah', '<p>SELECT<br />\r\n&nbsp;&nbsp; &nbsp;date_format(a.c_date,&#39;%M&#39;) AS c_date,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(b.id_surat_keluar)AS total1,<br />\r\n&nbsp;&nbsp; &nbsp;COUNT(c.id_surat)AS total2<br />\r\nFROM<br />\r\n&nbsp;&nbsp; &nbsp;t_chart a LEFT&nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_keluar b ON a.id_surat = b.id_surat_keluar LEFT<br />\r\n&nbsp;&nbsp; &nbsp;JOIN tr_surat_masuk c ON a.id_surat = c.id_surat<br />\r\nGROUP BY<br />\r\n&nbsp;&nbsp; &nbsp;MONTH(a.c_date)</p>\r\n', '2017-08-15', 0, 'dfwer', 'Bpk. Bambang', 1, 'Manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `tr_surat_masuk`
--

CREATE TABLE `tr_surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `intansi` varchar(50) NOT NULL,
  `hal` text NOT NULL,
  `tujukan` varchar(50) NOT NULL,
  `cdate` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tr_surat_masuk`
--

INSERT INTO `tr_surat_masuk` (`id_surat`, `no_surat`, `id_user`, `intansi`, `hal`, `tujukan`, `cdate`, `keterangan`, `status`) VALUES
(8, 'sadasd', 0, '0', 'vvvvvvvvvvvvvvvvvvvvvvvvv', 'sadasd', '2017-06-13', 'asdsadsa', 1),
(9, 'asdasdasd', 0, 'asdasd', 'asdsadsa', 'sdasdas', '2017-04-12', 'asdasdas', 1),
(10, 'sdasdas', 0, 'sdsadasd', 'asdasd', 'sadsdsd', '2017-04-26', 'sdsdasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_chart`
--

CREATE TABLE `t_chart` (
  `id` int(11) NOT NULL,
  `id_surat` varchar(20) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_chart`
--

INSERT INTO `t_chart` (`id`, `id_surat`, `no_surat`, `keterangan`, `c_date`) VALUES
(40, '149', '001/June-18/Teknik Informatika', 'Surat Keluar', '2017-01-24'),
(41, '150', '002/June-18/Akuntansi', 'Surat Keluar', '2017-03-15'),
(43, '152', '004/June-18/Fisika', 'Surat Keluar', '2017-08-24'),
(44, '153', '005/June-18/Manajemen', 'Surat Keluar', '2017-08-15'),
(45, '8', 'sadasd', 'Surat Masuk', '2017-06-13'),
(46, '9', 'asdasdasd', 'Surat Masuk', '2017-04-12'),
(47, '10', 'sdasdas', 'Surat Masuk', '2017-04-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ref_corp`
--
ALTER TABLE `ref_corp`
  ADD PRIMARY KEY (`id_corp`);

--
-- Indexes for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `ref_level`
--
ALTER TABLE `ref_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `ref_level_menu_access`
--
ALTER TABLE `ref_level_menu_access`
  ADD PRIMARY KEY (`id_level_menu_access`);

--
-- Indexes for table `ref_menu_details`
--
ALTER TABLE `ref_menu_details`
  ADD PRIMARY KEY (`id_menu_details`);

--
-- Indexes for table `ref_menu_groups`
--
ALTER TABLE `ref_menu_groups`
  ADD PRIMARY KEY (`id_menu_groups`);

--
-- Indexes for table `ref_pangkat`
--
ALTER TABLE `ref_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `ref_user`
--
ALTER TABLE `ref_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tr_coba`
--
ALTER TABLE `tr_coba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_dis`
--
ALTER TABLE `tr_dis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_surat_keluar`
--
ALTER TABLE `tr_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `tr_surat_masuk`
--
ALTER TABLE `tr_surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `t_chart`
--
ALTER TABLE `t_chart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_corp`
--
ALTER TABLE `ref_corp`
  MODIFY `id_corp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_level`
--
ALTER TABLE `ref_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_level_menu_access`
--
ALTER TABLE `ref_level_menu_access`
  MODIFY `id_level_menu_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `ref_menu_details`
--
ALTER TABLE `ref_menu_details`
  MODIFY `id_menu_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `ref_menu_groups`
--
ALTER TABLE `ref_menu_groups`
  MODIFY `id_menu_groups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_pangkat`
--
ALTER TABLE `ref_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_user`
--
ALTER TABLE `ref_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1233213;
--
-- AUTO_INCREMENT for table `tr_coba`
--
ALTER TABLE `tr_coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_dis`
--
ALTER TABLE `tr_dis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tr_surat_keluar`
--
ALTER TABLE `tr_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `tr_surat_masuk`
--
ALTER TABLE `tr_surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_chart`
--
ALTER TABLE `t_chart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
