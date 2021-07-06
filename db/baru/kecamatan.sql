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
('KEC000000000007', 'Sukowono', '2021-06-16 16:51:13'),
('KEC000000000008', 'Gumukmas', '2021-07-01 06:50:33'),
('KEC000000000009', 'Puger', '2021-07-01 06:50:40'),
('KEC000000000010', 'Wuluhan', '2021-07-01 06:50:52'),
('KEC000000000011', 'Ambulu', '2021-07-01 06:50:57'),
('KEC000000000012', 'Tempurejo', '2021-07-01 06:51:11'),
('KEC000000000013', 'Silo', '2021-07-01 06:51:15'),
('KEC000000000014', 'Mayang', '2021-07-01 06:51:30'),
('KEC000000000015', 'Mumbulsari', '2021-07-01 06:51:39'),
('KEC000000000016', 'Jenggawah', '2021-07-01 06:51:46'),
('KEC000000000018', 'Rambipuji', '2021-07-01 06:53:02'),
('KEC000000000019', 'Balung', '2021-07-01 06:53:07'),
('KEC000000000020', 'Umbulsari', '2021-07-01 06:54:12'),
('KEC000000000021', 'Semboro', '2021-07-01 06:54:20'),
('KEC000000000022', 'Sumberbaru', '2021-07-01 06:54:28'),
('KEC000000000023', 'Tanggul', '2021-07-01 06:54:35'),
('KEC000000000024', 'Bangsalsari', '2021-07-01 06:54:47'),
('KEC000000000025', 'Panti', '2021-07-01 06:54:54'),
('KEC000000000026', 'Sukorambi', '2021-07-01 06:55:05'),
('KEC000000000027', 'Arjasa', '2021-07-01 06:55:10'),
('KEC000000000028', 'Kalisat', '2021-07-01 06:55:25'),
('KEC000000000029', 'Ledokombo', '2021-07-01 06:55:32'),
('KEC000000000031', 'Jelbuk', '2021-07-01 06:55:49'),
('KEC000000000032', 'Kaliwates', '2021-07-01 06:55:56'),
('KEC000000000033', 'Patrang', '2021-07-01 06:56:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
