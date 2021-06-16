-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 07:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_bencana`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id_desa` varchar(15) NOT NULL,
  `nm_desa` varchar(50) NOT NULL,
  `id_kecamatan` varchar(15) NOT NULL,
  `kd_pos` char(5) NOT NULL,
  `padi` int(11) NOT NULL,
  `jagung` int(11) NOT NULL,
  `ubi_kayu` int(11) NOT NULL,
  `populasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_desa`
--

CREATE TABLE `hasil_desa` (
  `id_hasil` varchar(15) NOT NULL,
  `id_desa` varchar(15) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `himpunan_kriteria`
--

CREATE TABLE `himpunan_kriteria` (
  `no` varchar(15) NOT NULL,
  `id_kriteria` varchar(15) NOT NULL,
  `range` varchar(50) NOT NULL,
  `nilai` double NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(15) NOT NULL,
  `nm_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
('JBT000000000001', 'Admin'),
('JBT000000000002', 'Petugas Lapang');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(15) NOT NULL,
  `nm_kecamatan` varchar(50) NOT NULL,
  `time_in_kec` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nm_kecamatan`, `time_in_kec`) VALUES
('KEC000000000001', 'Sumbersari', '2021-06-16 13:05:16'),
('KEC000000000002', 'Kencong', '2021-06-16 13:05:16'),
('KEC000000000003', 'Jombang', '2021-06-16 13:05:16'),
('KEC000000000004', 'Ajung', '2021-06-16 13:05:16'),
('KEC000000000005', 'Sumberjambe', '2021-06-16 13:05:16'),
('KEC000000000006', 'Pakusari', '2021-06-16 16:51:04'),
('KEC000000000007', 'Sukowono', '2021-06-16 16:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` varchar(15) NOT NULL,
  `id_desa` varchar(15) NOT NULL,
  `id_kecamatan` varchar(15) NOT NULL,
  `jml_ketersediaan` int(11) NOT NULL,
  `jml_akses` int(11) NOT NULL,
  `jml_pemanfaatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(15) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL,
  `time_in_kt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`, `time_in_kt`) VALUES
('KT0000000000001', 'Sangat Kurang', '2021-06-16 16:43:32'),
('KT0000000000002', 'Kurang', '2021-06-16 16:32:55'),
('KT0000000000003', 'Normal', '2021-06-16 16:34:01'),
('KT0000000000004', 'Baik', '2021-06-16 16:56:56'),
('KT0000000000005', 'Sangat Baik', '2021-06-16 16:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`) VALUES
('USR000000000001', 'Alex Kuproy', 'kuproy77', '', 'JBT000000000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `hasil_desa`
--
ALTER TABLE `hasil_desa`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `himpunan_kriteria`
--
ALTER TABLE `himpunan_kriteria`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
