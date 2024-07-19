-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 09:10 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaprin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` int(11) NOT NULL,
  `bahan` varchar(225) NOT NULL,
  `harga` float NOT NULL,
  `type_cetak` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `bahan`, `harga`, `type_cetak`, `created_time`, `created_by`, `updated_time`, `updated_by`) VALUES
(1, 'Stiker Kromo', 4500, 1, '2024-06-25 01:06:33', 'admin', NULL, NULL),
(2, 'HVS', 2800, 2, '2024-06-27 11:06:14', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_bayar`
--

CREATE TABLE `bukti_bayar` (
  `id_pesanan` int(11) NOT NULL,
  `bukti_file` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_bayar`
--

INSERT INTO `bukti_bayar` (`id_pesanan`, `bukti_file`) VALUES
(1, '1_Screenshot 2024-07-11 001806.png'),
(2, '2_Screenshot 2024-07-11 001806.png');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `isi_chat` text NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_pesanan`, `isi_chat`, `created_time`, `created_by`) VALUES
(1, 1, 'Design anda sudah selesai, mohon konfirmasi !!!', '2024-07-12 10:38:24', 1),
(2, 1, 'baik kak terima kasih ', '2024-07-12 10:40:05', 8),
(3, 2, 'halo', '2024-07-13 11:26:38', 8),
(4, 2, 'Design anda sudah selesai, mohon konfirmasi !!!', '2024-07-13 11:46:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `updateLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `email`, `username`, `password`, `status`, `nama`, `updateLogin`) VALUES
(1, '', 'admin', 'admin', '1', 'admin', '2024-07-16'),
(2, '', 'cun', 'cun', '2', 'cun', '2024-07-05'),
(3, '', 'boss', 'boss', '3', 'boss', '2024-07-06'),
(8, 'daffa@gmail.com', 'daffa', 'daffa', '2', 'daffa', '2024-07-16'),
(9, 'alam@gmail.com', 'alam', 'alam', '1', 'alam', NULL),
(10, 'azzahjupri@gmail.com', 'jupri', '12345678', '2', 'jupri', '2024-06-27'),
(11, 'vira@gmail.com', 'vira', 'vira', '2', 'vira', '2024-07-10'),
(12, 'adnan', 'adnan', 'adnan', '2', 'adnan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_pemesanan`
--

CREATE TABLE `master_pemesanan` (
  `id` int(11) NOT NULL,
  `id_pemesan` int(12) NOT NULL,
  `file1` varchar(225) NOT NULL,
  `file2` varchar(225) NOT NULL,
  `metode_pengiriman` varchar(20) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `total` float NOT NULL,
  `type_cetak` varchar(30) NOT NULL,
  `produk` int(11) NOT NULL,
  `jenis_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pembayaran` varchar(30) NOT NULL,
  `catatan` text NOT NULL,
  `ongkir` double NOT NULL,
  `grand_total` double NOT NULL,
  `flag_lunas` int(11) NOT NULL,
  `progress` int(12) NOT NULL,
  `file_design` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pemesanan`
--

INSERT INTO `master_pemesanan` (`id`, `id_pemesan`, `file1`, `file2`, `metode_pengiriman`, `alamat_pengiriman`, `total`, `type_cetak`, `produk`, `jenis_bahan`, `jumlah`, `pembayaran`, `catatan`, `ongkir`, `grand_total`, `flag_lunas`, `progress`, `file_design`, `keterangan`, `created_time`, `created_by`) VALUES
(1, 8, '8_20240712_223741_Screenshot 2024-07-11 001806.png', '', '2', 'qwe', 54000, '1', 1, 1, 12, 'QRIS', 'qwe', 20000, 74000, 2, 1, 'file_design_1_Screenshot 2024-07-11 001806.png', '', '2024-07-12 22:37:41', 'daffa'),
(2, 8, '8_20240713_112324_Screenshot 2024-07-11 001806.png', '', '2', 'qwe', 54000, '1', 1, 1, 12, 'QRIS', 'qwe', 20000, 74000, 1, 9, 'file_design_2_Screenshot 2024-07-11 001806.png', '', '2024-07-13 11:23:24', 'daffa');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_notif` int(11) NOT NULL,
  `notif_flag` int(11) NOT NULL,
  `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `id_pemesanan`, `id_notif`, `notif_flag`, `created_time`) VALUES
(1, 1, 9, 1, '2024-07-12 22:37:41'),
(2, 1, 9, 2, '2024-07-12 22:37:41'),
(3, 1, 1, 1, '2024-07-12 10:37:51'),
(4, 1, 2, 1, '2024-07-12 22:38:13'),
(5, 1, 1, 2, '2024-07-12 22:38:16'),
(6, 2, 9, 1, '2024-07-13 11:23:24'),
(7, 2, 9, 2, '2024-07-13 11:23:24'),
(8, 2, 1, 1, '2024-07-13 11:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `produk` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `gambar`, `description`, `created_time`, `created_by`, `updated_time`, `updated_by`) VALUES
(1, 'Stiker', 'Stiker_20240625_stiker.jpg', 'stiker', '2024-06-25 01:06:11', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `progress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `progress`) VALUES
(1, 'Pesanan Diterima'),
(2, 'Pesanan Telah Selesai'),
(3, 'Pesanan Diterima Pelanggan'),
(4, 'Pesanan Sedang Dikirim'),
(5, 'Pesanan Dibatalkan Admin'),
(6, 'Pesanan Dibatalkan System'),
(9, 'Pesanan Belum Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id`, `status`) VALUES
(1, 'Belum Lunas'),
(2, 'Lunas'),
(3, 'Pesanan dibatalkan system'),
(9, 'Bukti Pembayaran Belum Dikirimkan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `master_pemesanan`
--
ALTER TABLE `master_pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `jenis_bahan` (`jenis_bahan`),
  ADD KEY `master_pemesanan_ibfk_3` (`produk`),
  ADD KEY `master_pemesanan_ibfk_4` (`progress`),
  ADD KEY `flag_lunas` (`flag_lunas`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_pemesanan`
--
ALTER TABLE `master_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_pembayaran`
--
ALTER TABLE `status_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukti_bayar`
--
ALTER TABLE `bukti_bayar`
  ADD CONSTRAINT `bukti_bayar_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `master_pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `master_pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_pemesanan`
--
ALTER TABLE `master_pemesanan`
  ADD CONSTRAINT `master_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `login` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_pemesanan_ibfk_2` FOREIGN KEY (`jenis_bahan`) REFERENCES `bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_pemesanan_ibfk_3` FOREIGN KEY (`produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_pemesanan_ibfk_4` FOREIGN KEY (`progress`) REFERENCES `progress` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `master_pemesanan_ibfk_5` FOREIGN KEY (`flag_lunas`) REFERENCES `status_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `master_pemesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
