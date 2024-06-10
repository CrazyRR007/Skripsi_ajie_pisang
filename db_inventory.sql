-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 01:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_keluar`
--

CREATE TABLE `data_barang_keluar` (
  `tanggal` date NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `harga` decimal(12,0) NOT NULL,
  `total_harga` decimal(12,0) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_customer` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang_keluar`
--

INSERT INTO `data_barang_keluar` (`tanggal`, `id_keluar`, `id_barang`, `qty_keluar`, `harga`, `total_harga`, `keterangan`, `id_customer`) VALUES
('2023-03-01', 22, 'MR-001', 12, '10000', '120000', 'Beli Snack', 'CST-001');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang_masuk`
--

CREATE TABLE `data_barang_masuk` (
  `tanggal` date NOT NULL,
  `id_masuk` int(11) NOT NULL,
  `id_barang` varchar(12) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `harga` decimal(12,0) NOT NULL,
  `total_harga` decimal(15,0) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `id_supplier` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang_masuk`
--

INSERT INTO `data_barang_masuk` (`tanggal`, `id_masuk`, `id_barang`, `qty_masuk`, `harga`, `total_harga`, `keterangan`, `id_supplier`) VALUES
('2023-02-27', 40, 'MR-001', 13, '10000', '130000', 'Stock Masuk', 'SPY-001');

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` varchar(12) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(100) NOT NULL,
  `telp_customer` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `nama_customer`, `alamat_customer`, `telp_customer`) VALUES
('CST-001', 'Budi', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_stock`
--

CREATE TABLE `data_stock` (
  `id_barang` varchar(12) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kategori` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `total_harga` decimal(12,0) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_stock`
--

INSERT INTO `data_stock` (`id_barang`, `nama_barang`, `kategori`, `qty`, `harga`, `total_harga`, `status`) VALUES
('MR-001', 'taro seaweed 125 gram', 'makanan ringan', 38, '10000', '380000', 'tersedia'),
('S-001', 'beras putih 1 kg', 'sembako', 55, '12000', '328000', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id_supplier` varchar(12) NOT NULL,
  `nama_supplier` varchar(45) NOT NULL,
  `alamat_supplier` varchar(45) NOT NULL,
  `telp_supplier` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`) VALUES
('SPY-001', 'PT. Unilever Indonesia', 'Jln. Medan Merdeka Barat', '021-64021122');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto_profil` varchar(50) NOT NULL,
  `tipe_akun` varchar(32) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama_lengkap`, `username`, `email`, `password`, `foto_profil`, `tipe_akun`, `alamat`) VALUES
(1, 'andryan', 'andryan007', 'andryan@gmail.com', '12345678', '', 'Super Admin', 'Jln. Hidup Baru gg L no.65'),
(3, 'budi', 'budi27', 'budigunawan@gmail.com', '12345678', '', 'super admin', 'Jln. Pemandangan 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang_keluar`
--
ALTER TABLE `data_barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `data_barang_masuk`
--
ALTER TABLE `data_barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_stock`
--
ALTER TABLE `data_stock`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang_keluar`
--
ALTER TABLE `data_barang_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_barang_masuk`
--
ALTER TABLE `data_barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
