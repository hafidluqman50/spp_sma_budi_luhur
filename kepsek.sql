-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 22, 2021 at 09:10 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id_kepsek` varchar(36) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `nama_kepsek` varchar(100) NOT NULL,
  `id_users` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id_kepsek`),
  ADD KEY `id_users` (`id_users`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD CONSTRAINT `kepsek_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
