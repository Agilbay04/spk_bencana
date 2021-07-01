-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 16.52
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

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
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` varchar(15) NOT NULL,
  `nm_desa` varchar(50) NOT NULL,
  `id_kecamatan` varchar(15) NOT NULL,
  `kd_pos` char(5) NOT NULL,
  `prod_padi` double NOT NULL,
  `prod_jagung` double NOT NULL,
  `populasi` int(11) NOT NULL,
  `time_in_ds` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `nm_desa`, `id_kecamatan`, `kd_pos`, `prod_padi`, `prod_jagung`, `populasi`, `time_in_ds`) VALUES
('DS0000000000001', 'Tegal Gede', 'KEC000000000001', '68124', 5, 7, 6000, '2021-06-28 13:44:05'),
('DS0000000000002', 'Cakru', 'KEC000000000002', '68155', 4, 2, 4000, '2021-06-28 13:43:52'),
('DS0000000000003', 'Ajung', 'KEC000000000004', '68175', 1680, 570, 5000, '2021-07-01 09:44:32'),
('DS0000000000004', 'Ajung', 'KEC000000000004', '68175', 1680.76, 570.76, 5000, '2021-07-01 09:51:53'),
('DS0000000000005', 'Klompangan', 'KEC000000000004', '68175', 1450.76, 234.85, 3000, '2021-07-01 10:03:38'),
('DS0000000000006', 'Mangaran', 'KEC000000000004', '68175', 2870.45, 480.77, 4000, '2021-07-01 10:04:17'),
('DS0000000000007', 'Pancakarya', 'KEC000000000004', '68175', 1509.12, 300.5, 5000, '2021-07-01 10:05:04'),
('DS0000000000008', 'Rowo Indah', 'KEC000000000004', '68175', 1879.23, 367.22, 4000, '2021-07-01 10:05:39'),
('DS0000000000009', 'Sukamakmur', 'KEC000000000004', '68175', 2209.44, 678.22, 5000, '2021-07-01 10:06:16'),
('DS0000000000010', 'Wirowongso', 'KEC000000000004', '68175', 3187.17, 729.09, 6000, '2021-07-01 10:06:56'),
('DS0000000000011', 'Karang Anyar', 'KEC000000000011', '68132', 1209.65, 245.87, 3000, '2021-07-01 10:07:48'),
('DS0000000000012', 'Ambulu', 'KEC000000000011', '68172', 1367.98, 267.99, 4000, '2021-07-01 10:08:23'),
('DS0000000000013', 'Andogsari', 'KEC000000000011', '68172', 1198.09, 267.87, 3789, '2021-07-01 10:09:22'),
('DS0000000000014', 'Pontang', 'KEC000000000011', '68172', 1798.96, 432.89, 4210, '2021-07-01 10:09:54'),
('DS0000000000015', 'Sabrang', 'KEC000000000011', '68172', 1089.98, 120.87, 3250, '2021-07-01 10:10:25'),
('DS0000000000016', 'Sumberrejo', 'KEC000000000011', '68172', 1609.88, 215.78, 3790, '2021-07-01 10:27:11'),
('DS0000000000017', 'Tegalsari', 'KEC000000000011', '68172', 1567.98, 367.21, 4278, '2021-07-01 10:11:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_desa`
--

CREATE TABLE `hasil_desa` (
  `id_hasil` varchar(15) NOT NULL,
  `id_desa` varchar(15) NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `himpunan_kriteria`
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
-- Dumping data untuk tabel `himpunan_kriteria`
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
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(15) NOT NULL,
  `nm_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nm_jabatan`) VALUES
('JBT000000000001', 'Admin'),
('JBT000000000002', 'Petugas Lapang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(15) NOT NULL,
  `nm_kecamatan` varchar(50) NOT NULL,
  `time_in_kec` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
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
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `id_desa`, `id_kecamatan`, `jml_ketersediaan`, `jml_akses`, `jml_pemanfaatan`, `time_in_kls`) VALUES
('KLS000000000001', 'DS0000000000003', 'KEC000000000004', 6, 26, 17, '2021-07-01 10:14:33'),
('KLS000000000002', 'DS0000000000005', 'KEC000000000004', 2, 20, 7, '2021-07-01 10:15:23'),
('KLS000000000003', 'DS0000000000006', 'KEC000000000004', 8, 36, 8, '2021-07-01 10:15:55'),
('KLS000000000004', 'DS0000000000007', 'KEC000000000004', 11, 32, 17, '2021-07-01 10:16:56'),
('KLS000000000005', 'DS0000000000008', 'KEC000000000004', 13, 28, 5, '2021-07-01 10:17:35'),
('KLS000000000006', 'DS0000000000009', 'KEC000000000004', 10, 40, 6, '2021-07-01 10:18:05'),
('KLS000000000007', 'DS0000000000010', 'KEC000000000004', 4, 32, 15, '2021-07-01 10:18:36'),
('KLS000000000008', 'DS0000000000011', 'KEC000000000011', 5, 28, 7, '2021-07-01 10:22:40'),
('KLS000000000009', 'DS0000000000012', 'KEC000000000011', 4, 30, 10, '2021-07-01 10:23:10'),
('KLS000000000010', 'DS0000000000013', 'KEC000000000011', 7, 32, 15, '2021-07-01 10:23:36'),
('KLS000000000011', 'DS0000000000014', 'KEC000000000011', 9, 32, 11, '2021-07-01 10:24:08'),
('KLS000000000012', 'DS0000000000015', 'KEC000000000011', 3, 25, 4, '2021-07-01 10:24:39'),
('KLS000000000013', 'DS0000000000017', 'KEC000000000011', 11, 36, 18, '2021-07-01 10:25:13'),
('KLS000000000014', 'DS0000000000016', 'KEC000000000011', 11, 43, 18, '2021-07-01 10:27:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(15) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL,
  `time_in_kt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`, `time_in_kt`) VALUES
('KT0000000000001', 'Akses Pangan', '2021-06-27 13:30:53'),
('KT0000000000002', 'Ketersediaan Pangan', '2021-06-27 13:31:31'),
('KT0000000000003', 'Pemanfaatan Pangan', '2021-06-27 13:31:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_jabatan`) VALUES
('USR000000000001', 'Alex Kuproy', 'kuproy77', '', 'JBT000000000001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `hasil_desa`
--
ALTER TABLE `hasil_desa`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indeks untuk tabel `himpunan_kriteria`
--
ALTER TABLE `himpunan_kriteria`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
