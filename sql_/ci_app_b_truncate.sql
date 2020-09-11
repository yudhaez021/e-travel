-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 26, 2019 at 05:25 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ci_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_data_mahasiswa`
--

CREATE TABLE `ci_data_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(250) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `status` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_data_mahasiswa`
--

INSERT INTO `ci_data_mahasiswa` (`id`, `nim`, `nama_lengkap`, `jurusan`, `angkatan`, `status`) VALUES
(16, '136', 'Anggi', 'Sastra Industri', '2015', '1'),
(17, '137', 'Rangga', 'Sastra Industri', '2015', '1'),
(18, '138', 'Adit', 'Sastra Industri', '2015', '1'),
(19, '101', 'Andre', 'Sastra Indonesia', '2016', '1'),
(20, '102', 'Putri', 'Teknik Komputer', '2016', '1'),
(21, '103', 'Anggi', 'Teknik Komputer', '2016', '1'),
(22, '104', 'Rangga', 'Teknik Komputer', '2016', '1'),
(23, '105', 'Adit', 'Teknik Komputer', '2016', '1'),
(24, '106', 'Yudha Maulana', 'Teknik Komputer', '2016', '1'),
(25, '107', 'John Doe', 'Teknik Komputer', '2016', '1'),
(26, '108', 'Andre', 'Teknik Komputer', '2016', '1'),
(27, '109', 'Putri', 'Teknik Komputer', '2016', '1'),
(28, '110', 'Anggi', 'Teknik Komputer', '2016', '1'),
(29, '111', 'Rangga', 'Teknik Komputer', '2016', '1'),
(30, '112', 'Adit', 'Teknik Komputer', '2016', '1'),
(31, '12345', 'Yudha Maulana', 'Teknik Komputer', '2017', '1'),
(32, '123456', 'John Doe', 'Sastra Indonesia', '2017', '1'),
(33, '113', 'Yudha Maulana', 'Teknik Komputer', '2017', '1'),
(34, '114', 'John Doe', 'Teknik Komputer', '2017', '1'),
(35, '115', 'Andre', 'Teknik Komputer', '2017', '1'),
(36, '116', 'Putri', 'Teknik Komputer', '2017', '1'),
(37, '117', 'Anggi', 'Teknik Komputer', '2017', '1'),
(38, '118', 'Rangga', 'Teknik Komputer', '2017', '1'),
(39, '119', 'Adit', 'Teknik Komputer', '2017', '1'),
(40, '120', 'Yudha Maulana', 'Teknik Komputer', '2017', '1'),
(41, '121', 'John Doe', 'Teknik Komputer', '2017', '1'),
(42, '122', 'Andre', 'Teknik Komputer', '2017', '1'),
(43, '123', 'Putri', 'Teknik Komputer', '2018', '1'),
(44, '124', 'Anggi', 'Teknik Komputer', '2018', '1'),
(45, '125', 'Rangga', 'Teknik Komputer', '2018', '1'),
(46, '126', 'Adit', 'Teknik Komputer', '2018', '1'),
(47, '127', 'Yudha Maulana', 'Teknik Komputer', '2018', '1'),
(48, '128', 'John Doe', 'Teknik Komputer', '2018', '1'),
(49, '129', 'Andre', 'Teknik Komputer', '2018', '1'),
(50, '130', 'Putri', 'Teknik Komputer', '2018', '1'),
(51, '131', 'Anggi', 'Teknik Komputer', '2018', '1'),
(52, '132', 'Yudha Maulana', 'Teknik Komputer', '2018', '1'),
(53, '133', 'John Doe', 'Teknik Komputer', '2018', '1'),
(55, '27362', 'barkah', 'skdhksd', '2055', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_manajemen_akses`
--

CREATE TABLE `ci_manajemen_akses` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `added` varchar(250) NOT NULL,
  `last_login` varchar(250) NOT NULL,
  `primary` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_manajemen_akses`
--

INSERT INTO `ci_manajemen_akses` (`id`, `username`, `password`, `nama_lengkap`, `foto`, `added`, `last_login`, `primary`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'New_Project.png', '23/06/2019&nbsp;(07:37:22am)', '26/06/2019&nbsp;(10:24:37pm)', '1'),
(5, 'barkah', 'e0c25b00c8dada7191d233e6d7b51ede', 'barkah', '', '26/06/2019&nbsp;(05:28:33pm)', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_pengaturan`
--

CREATE TABLE `ci_pengaturan` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(250) NOT NULL,
  `deskripsi_aplikasi` text NOT NULL,
  `intro_aplikasi` varchar(250) NOT NULL,
  `pembuat_aplikasi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_pengaturan`
--

INSERT INTO `ci_pengaturan` (`id`, `nama_aplikasi`, `deskripsi_aplikasi`, `intro_aplikasi`, `pembuat_aplikasi`) VALUES
(1, 'SPCM App', 'Aplikasi sistem peramalan calon mahasiswa berbasis web, dan terintegrasi dengan database.', 'SPCM Apps, adalah aplikasi bagus, mantep.', 'Yudha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_data_mahasiswa`
--
ALTER TABLE `ci_data_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `ci_manajemen_akses`
--
ALTER TABLE `ci_manajemen_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_pengaturan`
--
ALTER TABLE `ci_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_data_mahasiswa`
--
ALTER TABLE `ci_data_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `ci_manajemen_akses`
--
ALTER TABLE `ci_manajemen_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
