-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 01:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbajie`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_hari`
--

CREATE TABLE `data_hari` (
  `id_hari` varchar(2) NOT NULL,
  `hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_hari`
--

INSERT INTO `data_hari` (`id_hari`, `hari`) VALUES
('H5', 'Jumat'),
('H6', 'Sabtu'),
('H7', 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_lapangan` varchar(4) NOT NULL,
  `id_user` int(8) NOT NULL,
  `id_hari` varchar(2) NOT NULL,
  `id_jam` varchar(2) NOT NULL,
  `best_generation` int(11) NOT NULL,
  `fitness_score` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `id_lapangan`, `id_user`, `id_hari`, `id_jam`, `best_generation`, `fitness_score`) VALUES
(1, '0001', 3, 'H5', 'J1', 1, '0.5'),
(2, '0001', 4, 'H5', 'J3', 1, '0.5');

-- --------------------------------------------------------

--
-- Table structure for table `data_jam`
--

CREATE TABLE `data_jam` (
  `id_jam` varchar(2) NOT NULL,
  `jam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jam`
--

INSERT INTO `data_jam` (`id_jam`, `jam`) VALUES
('J1', '08.00 - 10.00'),
('J2', '10.00 - 12.00'),
('J3', '13.00 - 15.00'),
('J4', '15.00 - 17.00');

-- --------------------------------------------------------

--
-- Table structure for table `data_konfigurasi`
--

CREATE TABLE `data_konfigurasi` (
  `populationSize` int(11) NOT NULL,
  `mutationRate` int(11) NOT NULL,
  `generations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_konfigurasi`
--

INSERT INTO `data_konfigurasi` (`populationSize`, `mutationRate`, `generations`) VALUES
(30, 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `data_lapangan`
--

CREATE TABLE `data_lapangan` (
  `id_lapangan` varchar(4) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_lapangan`
--

INSERT INTO `data_lapangan` (`id_lapangan`, `nama_lapangan`, `alamat`) VALUES
('0001', 'a', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_minggu_ke`
--

CREATE TABLE `data_minggu_ke` (
  `id_minggu` varchar(2) NOT NULL,
  `minggu_ke` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_minggu_ke`
--

INSERT INTO `data_minggu_ke` (`id_minggu`, `minggu_ke`) VALUES
('M1', 1),
('M2', 2),
('M3', 3),
('M4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_pesan_lapangan`
--

CREATE TABLE `data_pesan_lapangan` (
  `id_pesanan` int(4) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `id_hari` varchar(2) NOT NULL,
  `foto_pemesanan` varchar(100) NOT NULL,
  `id_lapangan` varchar(4) NOT NULL,
  `id_user` int(8) NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pesan_lapangan`
--

INSERT INTO `data_pesan_lapangan` (`id_pesanan`, `tanggal_pesanan`, `id_hari`, `foto_pemesanan`, `id_lapangan`, `id_user`, `status`, `keterangan`) VALUES
(5, '2024-06-09', 'H5', 'Kucing.jpg', '0001', 3, 'terverifikasi', 'Pembayaran Bulan Juni'),
(6, '2024-06-09', 'H5', 'Kucing.jpg', '0001', 4, 'terverifikasi', 'Pembayaran Bulan Juni');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(8) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `no_tlp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tipe_akun` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama_user`, `no_tlp`, `alamat`, `tipe_akun`, `username`, `password`) VALUES
(1, 'Ajie Pisang', '12345678', 'Planet Pisang', 'admin', 'ajiepisang', 'pisang123'),
(3, 'raka', '1231312', 'Bekasi', 'member', 'raka', 'raka'),
(4, 'raka', '13123123123', 'Bekasi', 'member', 'raka2', 'raka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_hari`
--
ALTER TABLE `data_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `data_jam`
--
ALTER TABLE `data_jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `data_lapangan`
--
ALTER TABLE `data_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `data_minggu_ke`
--
ALTER TABLE `data_minggu_ke`
  ADD PRIMARY KEY (`id_minggu`);

--
-- Indexes for table `data_pesan_lapangan`
--
ALTER TABLE `data_pesan_lapangan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_pesan_lapangan`
--
ALTER TABLE `data_pesan_lapangan`
  MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
