-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2022 at 02:21 AM
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
-- Database: `toko_sembakou`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logs`
--

CREATE TABLE `admin_logs` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_logs`
--

INSERT INTO `admin_logs` (`id`, `nama`, `info`) VALUES
(1, 'Muhammad Tester', 'Mengedit Supplier: PT. Bimoli'),
(2, 'Muhammad Tester', 'Menambahkan Barang: test'),
(3, 'Muhammad Tester', 'Menambahkan Barang: test'),
(4, 'Muhammad Tester', 'Menambahkan Barang: adf'),
(5, 'Muhammad Tester', 'Menambahkan Barang: asfadfa'),
(6, 'Muhammad Tester', 'Menambahkan Barang: asfdadf'),
(7, 'Muhammad Tester', 'Menambahkan Barang: asfadf'),
(8, 'Muhammad Tester', 'Menambahkan Barang: dafasd'),
(9, 'Muhammad Tester', 'Menambahkan Barang: dafasd'),
(10, 'Muhammad Tester', 'Menambahkan Barang: DAFA'),
(11, 'Muhammad Tester', 'Menambahkan Barang: afdf'),
(12, 'Muhammad Tester', 'Menambahkan Barang: afdf'),
(13, 'Muhammad Tester', 'Menambahkan Barang: afdfas'),
(14, 'Muhammad Tester', 'Menambahkan Barang: afdad'),
(15, 'Muhammad Tester', 'Menghapus Barang: afdad'),
(16, 'Muhammad Tester', 'Menambahkan Barang: fadf'),
(17, 'Muhammad Tester', 'Menghapus Barang: fadf'),
(18, 'Muhammad Tester', 'Menghapus Supplier: SP-0006'),
(19, 'Muhammad Tester', 'Menghapus Supplier: SP-0006'),
(20, 'Muhammad Tester', 'Menghapus Supplier: SP-0006'),
(21, 'Muhammad Tester', 'Menghapus Supplier: SP-0006'),
(22, 'Muhammad Tester', 'Menghapus Supplier: SP-0006'),
(23, 'Muhammad Tester', 'Menghapus Supplier: SP-0002'),
(24, 'Muhammad Tester', 'Menghapus Supplier: SP-0002'),
(25, 'Muhammad Tester', 'Menghapus Supplier: SP-0002'),
(26, 'Muhammad Tester', 'Menghapus Supplier: SP-0002'),
(27, 'Muhammad Tester', 'Mengedit Barang: Sedaap Mie Instant Goreng 90G'),
(28, 'Muhammad Tester', 'Mengedit Barang: Sedaap Mie Instant Goreng 90G'),
(29, 'Muhammad Tester', 'Menambahkan Supplier: PT Pabrik Kertas Tjiwi Kimia Tbk (TKIM)'),
(30, 'Muhammad Tester', 'Mengedit Supplier: PT Salim Ivomas Pratama Tbk (BIMOLI)'),
(31, 'Muhammad Tester', 'Mengedit Supplier: PT Pabrik Kertas Tjiwi Kimia Tbk (SIDU)'),
(32, 'Muhammad Tester', 'Menambahkan Supplier: PT Sprite'),
(33, 'Muhammad Tester', 'Menambahkan Supplier: PT Coca Cola'),
(34, 'Muhammad Tester', 'Menambahkan Supplier: PT Yakult'),
(35, 'Muhammad Tester', 'Menambahkan Supplier: PT Malkist'),
(36, 'Muhammad Tester', 'Mengedit Barang: Coca Cola Soft Drink Original Taste 390Ml'),
(37, 'Muhammad Tester', 'Mengedit Barang: Yakult Minuman Fermentasi 5X65ml'),
(38, 'Muhammad Tester', 'Mengedit Barang: Buku Tulis SIDU 58 Lembar isi 10 Original'),
(39, 'Muhammad Tester', 'Mengedit Barang: Roma Crackers Malkist Abon 135G'),
(40, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(41, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(42, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(43, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(44, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(45, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(46, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(47, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(48, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(49, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(50, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(51, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(52, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(53, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(54, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(55, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(56, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(57, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(58, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(59, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(60, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(61, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(62, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(63, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(64, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(65, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(66, 'Muhammad Tester', 'Mengedit Barang: Sprite Soft Drink 390Ml Rasa Jeruk Nipis'),
(67, 'Muhammad Admin', 'Menambahkan Barang: soto'),
(68, 'Muhammad Admin', 'Menambahkan Barang: akodka'),
(69, 'Muhammad Admin', 'Menambahkan Barang: asdasdasdasd'),
(70, 'Muhammad Admin', 'Menambahkan Barang: rawon'),
(71, 'Muhammad Admin', 'Menghapus Barang: rawon'),
(72, 'Muhammad Admin', 'Menghapus Barang: asdasdasdasd'),
(73, 'Muhammad Admin', 'Menghapus Barang: akodka'),
(74, 'Muhammad Admin', 'Menghapus Barang: soto'),
(75, 'Muhammad Tester', 'Menambahkan Barang: teast'),
(76, 'Muhammad Tester', 'Menghapus Barang: teast');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kdBarang` varchar(7) NOT NULL,
  `NamaBarang` varchar(225) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `HargaBeli` int(11) NOT NULL,
  `HargaJual` int(11) NOT NULL,
  `Stok` int(5) NOT NULL,
  `Satuan` varchar(50) NOT NULL,
  `kdSupplier` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kdBarang`, `NamaBarang`, `jenis_barang`, `deskripsi`, `gambar`, `HargaBeli`, `HargaJual`, `Stok`, `Satuan`, `kdSupplier`) VALUES
('BR-0001', 'Bimoli Minyak Goreng Special 1 Liter', 'Sembako', 'Minyak goreng Bimoli dibuat dari bibit biji kelapa sawit pilihan yaitu \"Tenera\" untuk menghasilkan minyak goreng dengan kualitas terbaik.', 'http://13.214.186.196/img/produk/bimoli_1ltr.jpg', 20000, 22000, 13, 'Pcs', 'SP-0001'),
('BR-0002', 'Bimoli Minyak Goreng Special 2 Liter', 'Sembako', 'Minyak goreng Bimoli dibuat dari bibit biji kelapa sawit pilihan yaitu \"Tenera\" untuk menghasilkan minyak goreng dengan kualitas terbaik.', 'http://13.214.186.196/img/produk/bimoli_2ltr.jpg', 40000, 42000, 7, 'Pcs', 'SP-0001'),
('BR-0003', 'Coca Cola Soft Drink Original Taste 390Ml', 'Minuman', 'Coca-Cola adalah minuman ringan berkarbonasi yang dijual di toko, restoran dan mesin penjual di lebih dari 200 negara. Minuman ini diproduksi oleh The Coca-Cola Company asal Atlanta, Georgia, dan sering disebut Coke saja (merek dagang terdaftar The Coca-C', 'http://13.214.186.196/img/produk/cocacola_390ml.jpg', 4000, 5000, 50, 'Pcs', 'SP-0005'),
('BR-0004', 'Yakult Minuman Fermentasi 5X65ml', 'Minuman', 'Yakult adalah minuman susu fermentasi yang mengandung lebih dari 6,5 miliar bakteri L. casei Shirota strain ditiap botolnya.', 'http://13.214.186.196/img/produk/yakult.jpg', 9000, 10000, 15, 'Pcs', 'SP-0006'),
('BR-0005', 'Sedaap Mie Instant Goreng 90G', 'Makanan', 'Mie Sedaap adalah salah satu merek mie instan terkemuka yang terbuat dari bahan-bahan berkualitas dan rempah-rempah alami serta dilengkapi dengan formulasi bumbu yang tepat.', 'http://13.214.186.196/img/produk/mie_sedaap.png', 2000, 2500, 240, 'Pcs', 'SP-0002'),
('BR-0006', 'Buku Tulis SIDU 58 Lembar isi 10 Original', 'Alat Tulis', 'Sinar Dunia (SiDU) adalah salah satu merk buku tulis unggulan Asia Pulp & Paper (APP) Sinar Mas yang diluncurkan sejak 1984. Selama lebih dari tiga dekade, SiDU Buku Tulis telah menemani kegiatan menulis anak Indonesia. SiDU Buku Tulis merupakan produk In', 'http://13.214.186.196/img/produk/buku_tulis.jfif', 45000, 50000, 18, 'Paket', 'SP-0003'),
('BR-0007', 'Roma Crackers Malkist Abon 135G', 'Makanan Ringan', 'ROMA Malkist Abon Crackers Biskuit [135 g] merupakan biskuit dengan aroma yang khas dari Roma. Biskuit dilapisi dengan abon untuk memberikan energi lebih pada tubuh Anda. Nikmati biskuit bersama teh di sore hari dapat mencerahkan hari Anda. Dilengkapi den', 'http://13.214.186.196/img/produk/malkist_abon.jfif', 8000, 8500, 24, 'Pcs', 'SP-0007'),
('BR-0008', 'Sprite Soft Drink 390Ml Rasa Jeruk Nipis', 'Minuman', 'Asam dan menyegarkan, Sprite adalah minuman ringan rasa lemon dan jeruk nipis terkemuka di dunia. Minuman berkarbonasi dalam kemasan dengan rasa lemon dan jeruk nipis. Nikmati kesegarannya yang maksimal dengan meminumnya ketika dingin.', 'http://13.214.186.196/img/produk/sprite390ml.jpg', 4500, 5000, 10, 'Pcs', 'SP-0007');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `kdPenjualan` varchar(7) DEFAULT NULL,
  `kdBarang` varchar(7) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `TotalHarga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`kdPenjualan`, `kdBarang`, `Jumlah`, `TotalHarga`) VALUES
('PJ-0001', 'BR-0001', 2, 44000),
('PJ-0001', 'BR-0003', 5, 25000),
('PJ-0003', 'BR-0002', 1, 42000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `Edit` AFTER UPDATE ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE barang SET Stok = Stok + OLD.Jumlah, 
    Stok = Stok - NEW.Jumlah
    WHERE kdBarang = NEW.kdBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurang_barang` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE barang SET Stok = Stok - NEW.Jumlah
    WHERE kdBarang = NEW.kdBarang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_barang` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
	UPDATE barang SET Stok = Stok + OLD.Jumlah
    WHERE kdBarang = OLD.kdBarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(12) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `jenis_barang`, `gambar`) VALUES
(1, 'Makanan', 'makanan.png'),
(2, 'Minuman', 'minuman.png'),
(3, 'Makanan Ringan', 'snack.png'),
(4, 'Alat Tulis', 'tulis.png'),
(5, 'Bumbu Dapur', 'bumbu.png'),
(6, 'Perlengkapan Mandi', 'mandi.png'),
(7, 'Perlengkapan Mencuci', 'rumah.png'),
(8, 'Sembako', 'food.png'),
(9, 'Peralatan Rumah Tangga', 'sapu.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idPembeli` int(11) NOT NULL,
  `NamaPembeli` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idPembeli`, `NamaPembeli`, `Alamat`, `no_hp`, `Username`, `Password`) VALUES
(52, 'a', 'a', '1', 'a', 'a'),
(8, 'aku', 'aku', '23123', 'aku', 'aku'),
(1, 'Askin Nakk Le Varr', 'German', '081268675668', 'Askin', 'askin'),
(54, 'b', 'b', '312', 'b', 'b'),
(5, 'banana', 'jombang', '0812', 'banana', 'banana'),
(51, 'dasdas', 'dasd', '3123s', 'dasd', 'asdasd'),
(4, 'kahfi', 'jombang', '0812', 'kahfi', 'kahfi'),
(45, 'kencis', 'cangringan', '0812', 'kencis', 'kencis'),
(2, 'kyoya', 'jepang', '081277777', 'kyoya', 'kyoya'),
(53, 'oke', 'kts', '00000000000', 'oke', 'oke'),
(46, 'ridho', 'ngawi', '08888888', 'ridho', 'hore\nhore'),
(6, 'ssdas', 'sddasd', '31231', 'sadasd', 'asdas'),
(7, 'saya', 'kts', '0812', 'saya', 'saya'),
(3, 'asda', 'sdasd', '31231', 'sdasd', 'asdasd'),
(48, 'Ridho Tampan', 'ngawi', '0888888', 'yupi', 'yupi');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idAdmin` int(11) NOT NULL,
  `NamaAdmin` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idAdmin`, `NamaAdmin`, `Username`, `Password`) VALUES
(3, 'Muhammad Admin', 'Admin', 'ee61e766467546320854c3446ccde3d4'),
(2, 'Ahmad Test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
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
  `bayar` int(50) NOT NULL,
  `kembalian` int(50) NOT NULL,
  `Waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kdPenjualan`, `TotalHarga`, `nama_penjual`, `nama_pembeli`, `bayar`, `kembalian`, `Waktu`) VALUES
('PJ-0001', 69000, 'Muhammad Tester', 'test', 100000, 31000, '2022-11-25'),
('PJ-0002', 50000, 'Muhammad Tester', 'testtts', 50000, 0, '2022-10-14'),
('PJ-0003', 42000, 'Muhammad Tester', 'testas', 50000, 8000, '2022-10-14');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `Hapus` BEFORE DELETE ON `penjualan` FOR EACH ROW BEGIN
	DELETE from detail_penjualan
    WHERE kdPenjualan = OLD.kdPenjualan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kdSupplier` varchar(7) NOT NULL,
  `NamaSupplier` varchar(225) NOT NULL,
  `Alamat` varchar(225) NOT NULL,
  `NoHP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kdSupplier`, `NamaSupplier`, `Alamat`, `NoHP`) VALUES
('SP-0001', 'PT Salim Ivomas Pratama Tbk (BIMOLI)', 'Jl. bimoli', '082154642154'),
('SP-0002', 'PT Prakarsa Alam Segar (Mie Sedaap)', 'Jl Kaliabang bungur pondok ungu, Desa Pejuang Bekasi Kota Bekasi , Jawa Barat Indonesia', '088454256465'),
('SP-0003', 'PT Pabrik Kertas Tjiwi Kimia Tbk (SIDU)', 'Jl. Industri Ii No. 21 A, Semarang, Jawa Tengah', '085646524845'),
('SP-0004', 'PT Sprite', 'Jl. Sprite', '082456421518'),
('SP-0005', 'PT Coca Cola', 'Jl. Coca Cola', '084526548454'),
('SP-0006', 'PT Yakult', 'Jl. Yakult', '085422154521'),
('SP-0007', 'PT Malkist', 'Jl. Malkist', '084525445464');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logs`
--
ALTER TABLE `admin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kdBarang`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD KEY `detail_penjualan_ibfk_1` (`kdPenjualan`),
  ADD KEY `detail_penjualan_ibfk_2` (`kdBarang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `idPembeli` (`idPembeli`);

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
  ADD UNIQUE KEY `nama_pembeli` (`nama_pembeli`),
  ADD KEY `nama_penjual` (`nama_penjual`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kdSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logs`
--
ALTER TABLE `admin_logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idPembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `asdasg` FOREIGN KEY (`kdBarang`) REFERENCES `barang` (`kdBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`kdPenjualan`) REFERENCES `penjualan` (`kdPenjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`nama_penjual`) REFERENCES `penjual` (`NamaAdmin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
