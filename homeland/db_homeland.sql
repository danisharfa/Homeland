-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 03:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `nama_produk`, `gambar`, `quantity`, `harga`) VALUES
(80, 32, 'Kasur ', 'kasur3.jpeg', 1, 900000),
(81, 32, 'Kursi putih', 'chair4.jpg', 4, 500000),
(82, 32, 'Kasur Belgia', 'Kasur2.jpeg', 1, 800000),
(83, 33, 'Kursi putih', 'chair4.jpg', 12, 500000),
(84, 33, 'Meja merah', 'meja1.jpg', 3, 700000),
(85, 34, 'Sofa Empuk', 'sofa1.jpeg', 1, 600000),
(86, 34, 'Meja hitam bundar', 'meja2.jpg', 1, 800000),
(87, 35, 'Kursi hitam', 'chair2.jpg', 2, 699000),
(88, 36, 'Kursi hitam', 'chair2.jpg', 4, 699000),
(89, 37, 'Kursi kuning', 'chair5.jpg', 3, 600000),
(90, 38, 'Meja hitam bundar', 'meja2.jpg', 1, 800000),
(91, 38, 'Kursi kuning', 'chair5.jpg', 3, 600000),
(92, 39, 'Meja merah', 'meja1.jpg', 1, 700000),
(93, 40, 'Kursi putih', 'chair4.jpg', 3, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('sofa','chair','table','bed','wardrobe') NOT NULL,
  `harga` bigint(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `stok` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `gambar`, `nama`, `jenis`, `harga`, `deskripsi`, `quantity`, `stok`) VALUES
(1, 'kasur3.jpeg', 'Kasur ', 'bed', 900000, 'kasur empat kaki yang nyaman digunakan untuk duduk.', 0, 0),
(2, 'chair2.jpg', 'Kursi hitam', 'chair', 699000, 'Kursi empat kaki yang nyaman digunakan untuk duduk.', 0, 0),
(3, 'chair3.jpg', 'Kursi Coklat', 'chair', 589000, 'Kursi sangat amat nyaman sekali.', 0, 0),
(4, 'chair4.jpg', 'Kursi putih', 'chair', 500000, 'Kursi Ini penuh dengan panu', 3, 0),
(5, 'sofa1.jpeg', 'Sofa Empuk', 'sofa', 600000, 'Sofa ini berbahan bulu kucing', 0, 0),
(6, 'Kasur1.jpeg', 'Kasur Amsterdam', 'bed', 700000, 'Kasur berbahan dari kulit buaya', 0, 0),
(7, 'Kasur2.jpeg', 'Kasur Belgia', 'bed', 800000, 'Kasur ini terbuat dari bahan kulit ayam', 0, 0),
(8, 'meja1.jpg', 'Meja merah', 'table', 700000, 'Meja merah terbuat dari kayu jati', 0, 0),
(9, 'meja2.jpg', 'Meja hitam bundar', 'table', 800000, 'Meja hita terbuat dari besi baja', 0, 0),
(15, 'chair5.jpg', 'Kursi kuning', 'chair', 600000, 'Kursi empat kaki yang nyaman digunakan untuk duduk.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `harga_total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `tanggal_transaksi`, `harga_total`) VALUES
(32, 3, '2023-06-19', 3800000),
(33, 8, '2023-06-19', 8200000),
(34, 3, '2023-06-19', 1500000),
(35, 3, '2023-06-19', 1498000),
(36, 3, '2023-06-20', 2896000),
(37, 8, '2023-06-20', 1900000),
(38, 8, '2023-06-20', 2700000),
(39, 8, '2023-06-20', 800000),
(40, 3, '2023-06-21', 1600000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `email`, `phonenumber`, `address`, `password`) VALUES
(3, 'dimas', 'user@gmail.com', '1234577744881', 'Jl. Majapahit No.62, Gomong, Kec. Selaparang, Kota Mataram, Nusa Tenggara Bar. 83114', '$2y$10$afXAtfrCWCAcv1OX23UlnutVKXlJ4DPPSZ0io0rMrNGyX8kRtJfae'),
(4, 'admin', 'admin@admin.com', '123658', 'Jl. XXXXX', '$2y$10$JTsXe7nNo5lyv6i2T5dp2er5OXLOOHwukIfIBy7pR1sWJ5eKamOLC'),
(8, 'danis', 'mdarfa1803@gmail.com', '085333932136', 'Taman Sejahtera 12 no.1', '$2y$10$hR6c/OcV96gqvXOBnKFFpOCBBIv1rSHzMx24mkjwzuxYaE471qtIy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
