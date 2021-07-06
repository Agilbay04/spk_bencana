-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 01:45 PM
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
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id_klasifikasi` varchar(15) NOT NULL,
  `id_desa` varchar(15) NOT NULL,
  `id_kecamatan` varchar(15) NOT NULL,
  `jml_ketersediaan` int(11) NOT NULL,
  `n_ketersediaan` double NOT NULL,
  `jml_akses` int(11) NOT NULL,
  `n_akses` double NOT NULL,
  `jml_pemanfaatan` int(11) NOT NULL,
  `n_pemanfaatan` double NOT NULL,
  `time_in_kls` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_desa`, `id_kecamatan`, `jml_ketersediaan`, `n_ketersediaan`, `jml_akses`, `n_akses`, `jml_pemanfaatan`, `n_pemanfaatan`, `time_in_kls`) VALUES
('KLS000000000002', 'DS0000000000005', 'KEC000000000004', 2, 0.2, 20, 0.2, 7, 0.6, '2021-07-04 15:23:24'),
('KLS000000000003', 'DS0000000000006', 'KEC000000000004', 8, 0.6, 36, 0.8, 8, 0.6, '2021-07-04 15:23:24'),
('KLS000000000004', 'DS0000000000007', 'KEC000000000004', 11, 0.8, 32, 0.6, 17, 0.8, '2021-07-04 15:23:24'),
('KLS000000000005', 'DS0000000000008', 'KEC000000000004', 13, 0.8, 28, 0.4, 5, 0.4, '2021-07-04 15:23:24'),
('KLS000000000006', 'DS0000000000009', 'KEC000000000004', 10, 0.6, 40, 0.8, 6, 0.4, '2021-07-04 15:23:24'),
('KLS000000000007', 'DS0000000000010', 'KEC000000000004', 4, 0.4, 32, 0.6, 15, 0.6, '2021-07-04 15:23:24'),
('KLS000000000015', 'DS0000000000004', 'KEC000000000004', 7, 0.6, 32, 0.6, 12, 0.6, '2021-07-04 15:23:24'),
('KLS000000000016', 'DS0000000000132', 'KEC000000000033', 10, 0.6, 15, 0.2, 6, 0.4, '2021-07-05 15:39:31'),
('KLS000000000017', 'DS0000000000133', 'KEC000000000033', 30, 1, 21, 0.2, 8, 0.6, '2021-07-05 15:39:49'),
('KLS000000000018', 'DS0000000000134', 'KEC000000000033', 16, 1, 11, 0.2, 2, 0.2, '2021-07-05 15:40:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
