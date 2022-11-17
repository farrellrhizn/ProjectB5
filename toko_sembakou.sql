-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 02:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sembakou`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `nama` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`nama`, `info`) VALUES
('', 'Tambah Barang: BR-0006'),
('', 'Tambah Barang: BR-0007'),
('Muhammad Tester', 'Menambahkan Barang: Autan'),
('Muhammad Tester', 'Menambahkan Barang: TechJob'),
('Muhammad Tester', 'Menambahkan Barang: Sidu'),
('Muhammad Tester', 'Menambahkan Barang: testing'),
('Muhammad Tester', 'Menambahkan Barang: '),
('Muhammad Tester', 'Menambahkan Supplier: PT. Bimoli'),
('Muhammad Tester', 'Menambahkan Supplier: PT. Sunco'),
('Muhammad Tester', 'Menambahkan Supplier: PT. Sunco'),
('Muhammad Tester', 'Menambahkan Barang: Mie Sedaap'),
('Muhammad Tester', 'Menambahkan Barang: Sidu');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kdBarang` varchar(7) NOT NULL,
  `NamaBarang` varchar(225) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL,
  `Stok` int(5) NOT NULL,
  `Satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kdBarang`, `NamaBarang`, `jenis_barang`, `deskripsi`, `HargaBeli`, `HargaJual`, `Stok`, `Satuan`) VALUES
('BR-0001', 'Bimoli', 'Minyak', '', 20000, 22000, 15, 'Liter'),
('BR-0002', 'Sunco', 'Minyak', '', 23000, 25000, 13, 'Liter'),
('BR-0003', 'test', 'test', '', 5111, 6222, 120, 'Pcs'),
('BR-0004', 'test', 'test', '', 5000, 7600, 12, 'Pcs'),
('BR-0005', 'Kacang Garuda', 'Kacang', '', 0, 0, 0, 'Kilogram'),
('BR-0006', 'Rosta', 'Kacang', '', 2500, 3000, 150, 'Pcs'),
('BR-0007', 'Yakult', 'Susu Fermentasi', '', 9000, 10000, 42, 'Pcs'),
('BR-0008', 'Autan', 'Losion Anti Nyamuk', '', 500, 1000, 40, 'Pcs'),
('BR-0009', 'Snowman', 'Pulpen', '', 2000, 2500, 25, 'Pcs'),
('BR-0010', 'TechJob', 'Pulpen', '', 1500, 2000, 51, 'Pcs'),
('BR-0011', 'Sidu', 'Buku', '', 1500, 2000, 4, 'Pcs'),
('BR-0012', 'testing', 'testing', '', 10, 20, 10, 'Liter'),
('BR-0013', 'Mie Sedaap', 'Mie Instan', '', 2000, 2500, 120, 'Pcs'),
('BR-0014', 'Sidu', 'Buku Gambar', 'Buku Gambar', 1000, 1500, 25, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `idDetailPenjualan` int(11) NOT NULL,
  `kdPenjualan` varchar(7) DEFAULT NULL,
  `kdBarang` varchar(7) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `HargaSatuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idPembeli` int(11) NOT NULL,
  `NamaPembeli` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `noHP` int(12) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idAdmin` int(11) NOT NULL,
  `NamaAdmin` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idAdmin`, `NamaAdmin`, `Username`, `Password`) VALUES
(1, 'Muhammad Tester', 'Tester', '5fddd9142877fa6363ea6cd30ddfefb0');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kdPenjualan` varchar(7) NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `Waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kdSupplier` varchar(7) NOT NULL,
  `NamaSupplier` varchar(225) NOT NULL,
  `Alamat` varchar(225) NOT NULL,
  `NoHP` varchar(20) NOT NULL,
  `kdBarang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kdSupplier`, `NamaSupplier`, `Alamat`, `NoHP`, `kdBarang`) VALUES
('SP-0001', 'PT. Bimoli', 'Jl. bimoli', '0821738281', 'BR-0001'),
('SP-0002', 'PT. Sunco', 'Jl. Sunco', '082154642154', 'BR-0002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kdBarang`),
  ADD KEY `NamaBarang` (`NamaBarang`(191));

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`idDetailPenjualan`),
  ADD KEY `detail_penjualan_ibfk_1` (`kdPenjualan`),
  ADD KEY `detail_penjualan_ibfk_2` (`kdBarang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idPembeli`),
  ADD UNIQUE KEY `NamaPembeli` (`NamaPembeli`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `NamaAdmin` (`NamaAdmin`),
  ADD UNIQUE KEY `idAdmin` (`idAdmin`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kdPenjualan`),
  ADD UNIQUE KEY `nama_penjual` (`nama_penjual`),
  ADD UNIQUE KEY `nama_pembeli` (`nama_pembeli`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kdSupplier`),
  ADD KEY `Nama_Barang` (`kdBarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `idDetailPenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idPembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kdBarang`) REFERENCES `barang` (`kdBarang`),
  ADD CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`kdPenjualan`) REFERENCES `penjualan` (`kdPenjualan`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`nama_pembeli`) REFERENCES `pembeli` (`NamaPembeli`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`nama_penjual`) REFERENCES `penjual` (`NamaAdmin`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `fdf` FOREIGN KEY (`kdBarang`) REFERENCES `barang` (`kdBarang`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
