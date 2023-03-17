-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 11:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_bahagia`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kamar`
--

CREATE TABLE `data_kamar` (
  `no_kamar` varchar(20) NOT NULL,
  `tipe_kamar` enum('Superior','Delaxe') NOT NULL,
  `harga` varchar(100) NOT NULL,
  `lantai_kamar` varchar(200) NOT NULL,
  `max_dewasa` varchar(200) NOT NULL,
  `max_anak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kamar`
--

INSERT INTO `data_kamar` (`no_kamar`, `tipe_kamar`, `harga`, `lantai_kamar`, `max_dewasa`, `max_anak`) VALUES
('309', 'Delaxe', '800000', '8', '2', '2'),
('809', 'Superior', '100000', '3', '7', '2'),
('890', 'Delaxe', '9888', '2', '2', '4');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `no_kamar` varchar(20) NOT NULL,
  `nama_fasilitas` varchar(35) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `fasilitas_lain` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`no_kamar`, `nama_fasilitas`, `fasilitas`, `fasilitas_lain`) VALUES
('809', 'aaa', 'eeeeeeeeeeeeeee', 'cccc');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `nama_fasilitas`) VALUES
(1, 'gym'),
(5, 'Ruangan Area bebas Rokok'),
(6, 'Area publik'),
(7, 'kafe'),
(8, 'Restoran Untuk Makan Malam'),
(9, 'Restoran Untuk makan Siang'),
(10, 'Kolam berenang '),
(11, 'Wifi di area umum');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `job_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `job_level`) VALUES
(1, 'admin'),
(2, 'resepsionis'),
(3, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_ci` date NOT NULL,
  `tanggal_co` date NOT NULL,
  `jumlah_kmr` int(11) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `tipe_kamar` enum('Superior','Delaxe') NOT NULL,
  `status` varchar(20) NOT NULL,
  `bukti` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesanan`, `tanggal_ci`, `tanggal_co`, `jumlah_kmr`, `nama_pemesan`, `email`, `no_hp`, `nama_tamu`, `tipe_kamar`, `status`, `bukti`) VALUES
(17, '2023-03-09', '2023-03-10', 1, 'ferdi', 'ferdi@gmail.com', 2147483647, 'yahya', 'Superior', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_level`) VALUES
('admin', 'admin', 1),
('r', 'r', 2),
('user', 'user', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kamar`
--
ALTER TABLE `data_kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD KEY `no_kamar` (`no_kamar`);

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`no_kamar`) REFERENCES `data_kamar` (`no_kamar`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
