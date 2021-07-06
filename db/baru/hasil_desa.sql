-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 01:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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
-- Table structure for table `hasil_desa`
--

CREATE TABLE `hasil_desa` (
  `id_hasil` int(11) NOT NULL,
  `id_desa` varchar(15) NOT NULL,
  `id_kecamatan` varchar(15) NOT NULL,
  `hasil_akhir` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_desa`
--

INSERT INTO `hasil_desa` (`id_hasil`, `id_desa`, `id_kecamatan`, `hasil_akhir`) VALUES
(249, 'DS0000000000132', 'KEC000000000033', 12.52),
(250, 'DS0000000000133', 'KEC000000000033', 15.8),
(251, 'DS0000000000134', 'KEC000000000033', 11.8),
(252, 'DS0000000000005', 'KEC000000000004', 6.95),
(253, 'DS0000000000006', 'KEC000000000004', 13.5),
(254, 'DS0000000000007', 'KEC000000000004', 14.15),
(255, 'DS0000000000008', 'KEC000000000004', 9.5),
(256, 'DS0000000000009', 'KEC000000000004', 12),
(257, 'DS0000000000010', 'KEC000000000004', 11.05),
(258, 'DS0000000000004', 'KEC000000000004', 11.85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_desa`
--
ALTER TABLE `hasil_desa`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_desa`
--
ALTER TABLE `hasil_desa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
