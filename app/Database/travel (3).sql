-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 02:25 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_wisata` int(3) NOT NULL,
  `no_tlp` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_perjalanan`
--

CREATE TABLE `rencana_perjalanan` (
  `id_perjalanan` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `kegiatan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `role`, `created_at`, `updated_at`) VALUES
(2, 'adhi', '$2y$10$7X45jWHXYj.OTobeOmOJYuUcENtxAEaIKATq2o2GEkNQC9U9dfHu6', 'Muhammad Hardithya Aenuddin', 'muhammadadhi2803@gmail.com', 1, '2025-01-02', '2025-01-02'),
(3, 'adhiuser', '$2y$10$5eRdYQjvug.hTcj2TGvWT.5d33MJcryVDIJyqf1F0dOpBt2lTzcV.', 'Muhammad Hardithya Aenuddin', 'adhi@gmail.com', 2, '2025-01-04', '2025-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(5) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `minimum_orang` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `waktu_perjalanan` int(2) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `created_by` int(5) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_booking_user` (`id_user`),
  ADD KEY `fk_booking_wisata` (`id_wisata`);

--
-- Indexes for table `rencana_perjalanan`
--
ALTER TABLE `rencana_perjalanan`
  ADD PRIMARY KEY (`id_perjalanan`),
  ADD KEY `fk_rencana_perjalanan_wisata` (`id_wisata`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rencana_perjalanan`
--
ALTER TABLE `rencana_perjalanan`
  MODIFY `id_perjalanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rencana_perjalanan`
--
ALTER TABLE `rencana_perjalanan`
  ADD CONSTRAINT `fk_rencana_perjalanan_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rencana_perjalanan_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
