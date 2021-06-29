-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 06:43 AM
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
  `prod_padi` int(11) NOT NULL,
  `prod_jagung` int(11) NOT NULL,
  `populasi` int(11) NOT NULL,
  `time_in_ds` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `nm_desa`, `id_kecamatan`, `kd_pos`, `prod_padi`, `prod_jagung`, `populasi`, `time_in_ds`) VALUES
('DS0000000000001', 'Tegal Gede', 'KEC000000000001', '68124', 5, 7, 6000, '2021-06-28 13:44:05'),
('DS0000000000002', 'Cakru', 'KEC000000000002', '68155', 4, 2, 4000, '2021-06-28 13:43:52');

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
  `keterangan` varchar(50) NOT NULL,
  `time_in_himp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `himpunan_kriteria`
--

INSERT INTO `himpunan_kriteria` (`no`, `id_kriteria`, `range`, `nilai`, `keterangan`, `time_in_himp`) VALUES
('HIM000000000001', 'KT0000000000001', 'x&lt;=25', 0.2, '', '2021-06-28 12:42:47'),
('HIM000000000002', 'KT0000000000001', '25&lt;x&lt;=30', 0.4, '', '2021-06-27 16:26:23'),
('HIM000000000003', 'KT0000000000001', '30&lt;x&lt;=35', 0.6, '', '2021-06-27 16:26:31'),
('HIM000000000004', 'KT0000000000001', '35&lt;x&lt;=43', 0.8, '', '2021-06-27 16:26:34'),
('HIM000000000005', 'KT0000000000001', 'x&gt;=44', 1, '', '2021-06-27 16:26:38'),
('HIM000000000006', 'KT0000000000002', 'x&lt;=3', 0.2, '', '2021-06-27 16:27:31'),
('HIM000000000007', 'KT0000000000002', '3&lt;x&lt;=5', 0.4, '', '2021-06-27 16:28:04'),
('HIM000000000008', 'KT0000000000002', '5&lt;x&lt;=10', 0.6, '', '2021-06-27 16:28:46'),
('HIM000000000009', 'KT0000000000002', '10&lt;x&lt;=14', 0.8, '', '2021-06-27 16:29:30'),
('HIM000000000010', 'KT0000000000002', 'x&gt;=15', 1, '', '2021-06-27 16:29:56'),
('HIM000000000011', 'KT0000000000003', 'x&lt;=3', 0.2, '', '2021-06-27 16:30:49'),
('HIM000000000012', 'KT0000000000003', '3&lt;x&lt;=6', 0.4, '', '2021-06-27 16:31:24'),
('HIM000000000013', 'KT0000000000003', '6&lt;x&lt;=15', 0.6, '', '2021-06-27 16:32:17'),
('HIM000000000014', 'KT0000000000003', '15&lt;x&lt;=18', 0.8, '', '2021-06-27 16:32:41'),
('HIM000000000015', 'KT0000000000003', 'x&gt;=19', 1, '', '2021-06-27 16:33:04');

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
  `jml_pemanfaatan` int(11) NOT NULL,
  `time_in_kls` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_desa`, `id_kecamatan`, `jml_ketersediaan`, `jml_akses`, `jml_pemanfaatan`, `time_in_kls`) VALUES
('KLS000000000001', 'DS0000000000001', 'KEC000000000001', 4, 5, 11, '2021-06-29 04:35:46'),
('KLS000000000002', 'DS0000000000002', 'KEC000000000002', 4, 5, 4, '2021-06-29 04:39:58');

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
('KT0000000000001', 'Akses Pangan', '2021-06-27 13:30:53'),
('KT0000000000002', 'Ketersediaan Pangan', '2021-06-27 13:31:31'),
('KT0000000000003', 'Pemanfaatan Pangan', '2021-06-27 13:31:48');

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
