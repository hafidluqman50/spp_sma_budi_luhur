-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 21, 2021 at 03:49 PM
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
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id_kantin` varchar(36) NOT NULL,
  `nama_kantin` varchar(100) NOT NULL,
  `lokasi_kantin` text NOT NULL,
  `biaya_perbulan` int NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`id_kantin`, `nama_kantin`, `lokasi_kantin`, `biaya_perbulan`, `status_delete`) VALUES
('6f9cfc36-8c14-4a51-ab89-abb4373fd90d', 'Kantin Pak Mamat', 'Disamping Rumah Pak Mamat', 100000, 0),
('f19a4d1c-3e44-4027-9e7e-d125989edc21', 'Kantin Pak Mamat', 'Disamping Rumah Pak Mamat', 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(36) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `slug_kelas` varchar(100) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `slug_kelas`, `status_delete`) VALUES
('218c14e3-cd16-4f72-84d5-83d696390fa6', 'XII RPL 1', 'xii-rpl-1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` varchar(36) NOT NULL,
  `id_tahun_ajaran` varchar(36) NOT NULL,
  `id_siswa` varchar(36) NOT NULL,
  `id_kelas` varchar(36) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_tahun_ajaran`, `id_siswa`, `id_kelas`, `status_delete`) VALUES
('0a2c3901-c957-4bf0-b58b-5bc238be3687', '7bbb36db-240a-48ee-af92-4669326778ee', 'c088bf43-ab82-4dc0-b87b-ee36a79ff8e4', '218c14e3-cd16-4f72-84d5-83d696390fa6', 0),
('4b1b083d-f695-4ad1-8c8a-2786587fbc78', '7bbb36db-240a-48ee-af92-4669326778ee', '9ffc8df5-0329-4c39-a069-870178ff3d74', '218c14e3-cd16-4f72-84d5-83d696390fa6', 0),
('ae33e2dc-d4ca-4e40-a067-bc6fdac63186', '7bbb36db-240a-48ee-af92-4669326778ee', 'bfbb26b8-68f3-4bbe-8315-3f1cd0946c56', '218c14e3-cd16-4f72-84d5-83d696390fa6', 0),
('c7ba8ef0-8528-4720-860e-ac54f2c4f60b', '7bbb36db-240a-48ee-af92-4669326778ee', '13c137e8-7344-4c50-a89b-160976ed620b', '218c14e3-cd16-4f72-84d5-83d696390fa6', 1),
('ecbfa6dd-680c-4e3f-b633-64dbe915f350', '7bbb36db-240a-48ee-af92-4669326778ee', '13c137e8-7344-4c50-a89b-160976ed620b', '218c14e3-cd16-4f72-84d5-83d696390fa6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` varchar(36) NOT NULL,
  `id_siswa` varchar(36) NOT NULL,
  `id_siswa_keluarga` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `id_siswa`, `id_siswa_keluarga`) VALUES
('8f3c93a9-51a6-45bf-8df9-09ef1ca91dca', '9ffc8df5-0329-4c39-a069-870178ff3d74', 'a1f307cb-7352-40c8-8805-5b607b8fb58d'),
('eb369dfb-a109-4381-aeef-0dcca21c3369', 'c088bf43-ab82-4dc0-b87b-ee36a79ff8e4', '9ffc8df5-0329-4c39-a069-870178ff3d74');

-- --------------------------------------------------------

--
-- Table structure for table `kolom_spp`
--

CREATE TABLE `kolom_spp` (
  `id_kolom_spp` varchar(36) NOT NULL,
  `nama_kolom_spp` varchar(100) NOT NULL,
  `slug_kolom_spp` varchar(100) NOT NULL,
  `keterangan_kolom` text,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kolom_spp`
--

INSERT INTO `kolom_spp` (`id_kolom_spp`, `nama_kolom_spp`, `slug_kolom_spp`, `keterangan_kolom`, `status_delete`) VALUES
('1971752f-5e6c-459f-8a13-c51327bb88e7', 'Pembayaran Akademik', 'pembayaran-akademik', NULL, 0),
('60f3492f-d8be-4f29-9014-478d314fe4ef', 'Pembayaran Gedung', 'pembayaran-gedung', NULL, 0),
('ca6d1c9c-a668-4b92-9934-60402b4a1668', 'Test', '', '-', 1),
('ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 'Kantin Pak Mamat', 'kantin-pak-mamat', NULL, 0),
('ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 'Pembayaran Fasilitas', 'pembayaran-fasilitas', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(36) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `slug_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nomor_orang_tua` varchar(20) NOT NULL,
  `asal_kelompok` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `asal_wilayah` varchar(100) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `slug_siswa`, `jenis_kelamin`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `nomor_orang_tua`, `asal_kelompok`, `asal_wilayah`, `wilayah`, `status_delete`) VALUES
('13c137e8-7344-4c50-a89b-160976ed620b', '00088899912', 'Uchiha Bayu', 'uchiha-bayu', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('2caf7e9a-012f-47d3-94d3-fe34a7c4d341', '00088899914', 'Uchiha Sukirman', 'uchiha-sukirman', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('2dcbdcdd-aafe-4360-9e51-e8ce865007a3', '00088899912', 'Uchiha Bayu', 'uchiha-bayu', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('30955d56-c74b-4135-9ff8-b6114fad7fc2', '00088899913', 'Uchiha Tiara', 'uchiha-tiara', 'perempuan', '2001-10-01', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 1),
('5393caa8-1443-4030-8042-083e24f5278a', '00088899914', 'Uchiha Sukirman', 'uchiha-sukirman', 'laki-laki', '2001-10-02', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('9ffc8df5-0329-4c39-a069-870178ff3d74', '000888888', 'Ujang Si Jangkung', 'ujang-si-jangkung', 'laki-laki', '2021-09-13', 'Uchiha Abi', 'Uchiha Ummi', '08889998989', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('a1245618-df0b-44c8-b87a-14c3776c19e0', '00088899913', 'Uchiha Tiara', 'uchiha-tiara', 'perempuan', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 1),
('a1f307cb-7352-40c8-8805-5b607b8fb58d', '0821231223', 'Test', '', 'laki-laki', '2021-10-03', 'testj', 'tetsm', '088888888', '-', 'Konohagakure No Sato', 'dalam-kota', 0),
('bfbb26b8-68f3-4bbe-8315-3f1cd0946c56', '00088899913', 'Uchiha Tiara', 'uchiha-tiara', 'perempuan', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('c088bf43-ab82-4dc0-b87b-ee36a79ff8e4', '008899823928', 'Malin Kundang', 'malin-kundang', 'laki-laki', '2021-09-29', 'Kujang', 'Kujing', '088989809898', 'Clan Senju', 'Konohagakure No Sato', 'dalam-kota', 0),
('c31dc532-93c3-4a86-89e4-24076278dc51', '00088899914', 'Uchiha Sukirman', 'uchiha-sukirman', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('daaf7f34-708c-4f95-a3c1-841a80415d28', '00088899912', 'Uchiha Bayu', 'uchiha-bayu', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 1);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(36) NOT NULL,
  `id_kelas_siswa` varchar(36) NOT NULL,
  `total_harus_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `id_kelas_siswa`, `total_harus_bayar`) VALUES
('16eab520-6bd5-499a-b5f4-d2ce57f6f734', 'c7ba8ef0-8528-4720-860e-ac54f2c4f60b', 10000),
('faf359cf-6dcd-4562-aaeb-3cccd528ee21', 'ae33e2dc-d4ca-4e40-a067-bc6fdac63186', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `spp_bayar`
--

CREATE TABLE `spp_bayar` (
  `id_spp_bayar` varchar(36) NOT NULL,
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total_biaya` int NOT NULL,
  `nominal_bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  `keterangan_bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bayar`
--

INSERT INTO `spp_bayar` (`id_spp_bayar`, `id_spp_bulan_tahun`, `tanggal_bayar`, `total_biaya`, `nominal_bayar`, `kembalian`, `keterangan_bayar`) VALUES
('5063c859-388a-4b73-8fed-0541483fc6dc', 'e7f69a55-7373-4ff6-a19a-d6c5e7302070', '2021-09-15', 20000, 30000, 10000, 'Pembayaran SPP September 2021'),
('84238c46-4802-418a-ac65-a692684e34e2', 'a1b70f0e-2152-4348-871f-95f078e15a11', '2021-08-20', 20000, 20000, 0, 'Pembayaran Sisa Akademik Agustus 2021'),
('8db5f102-7ead-47c1-be03-2c85e577e9c1', 'a1b70f0e-2152-4348-871f-95f078e15a11', '2021-08-14', 50000, 50000, 0, 'Pembayaran SPP Bulan Agustus'),
('b4b69ab4-3685-497e-bafc-7f4a73d9a3f1', 'e7f69a55-7373-4ff6-a19a-d6c5e7302070', '2021-09-13', 50000, 70000, 20000, 'Pembayaran Akademik September 2021');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bulan_tahun`
--

CREATE TABLE `spp_bulan_tahun` (
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `id_spp` varchar(36) NOT NULL,
  `bulan_tahun` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bulan_tahun`
--

INSERT INTO `spp_bulan_tahun` (`id_spp_bulan_tahun`, `id_spp`, `bulan_tahun`) VALUES
('a1b70f0e-2152-4348-871f-95f078e15a11', '16eab520-6bd5-499a-b5f4-d2ce57f6f734', 'Agustus, 2021'),
('b84f6106-fa15-47fa-b57a-9212c14dd2b2', 'faf359cf-6dcd-4562-aaeb-3cccd528ee21', 'Oktober, 2021'),
('e7f69a55-7373-4ff6-a19a-d6c5e7302070', 'faf359cf-6dcd-4562-aaeb-3cccd528ee21', 'September, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `spp_detail`
--

CREATE TABLE `spp_detail` (
  `id_spp_detail` varchar(36) NOT NULL,
  `id_spp_bulan_tahun` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_kolom_spp` varchar(36) NOT NULL,
  `nominal_spp` int NOT NULL,
  `bayar_spp` int NOT NULL,
  `status_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_detail`
--

INSERT INTO `spp_detail` (`id_spp_detail`, `id_spp_bulan_tahun`, `id_kolom_spp`, `nominal_spp`, `bayar_spp`, `status_bayar`) VALUES
('0cc1ed89-b01f-4c40-912e-767fbebc365a', 'b84f6106-fa15-47fa-b57a-9212c14dd2b2', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 10000, 10000, 1),
('219b4859-f0d6-4c24-9918-7c3ce7d6e0ed', 'a1b70f0e-2152-4348-871f-95f078e15a11', '1971752f-5e6c-459f-8a13-c51327bb88e7', 50000, 50000, 1),
('242e7031-3128-4533-ad77-52b94bc84ede', 'a1b70f0e-2152-4348-871f-95f078e15a11', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, 10000, 0),
('46e9ad34-62e0-4947-afa1-d91e97185818', 'e7f69a55-7373-4ff6-a19a-d6c5e7302070', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, 10000, 0),
('ca2da86c-39dd-4392-905e-5697e609c268', 'e7f69a55-7373-4ff6-a19a-d6c5e7302070', '1971752f-5e6c-459f-8a13-c51327bb88e7', 50000, 50000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` varchar(36) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`, `status_delete`) VALUES
('7bbb36db-240a-48ee-af92-4669326778ee', '2021/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` varchar(36) NOT NULL,
  `name` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `remember_token` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `level_user` int NOT NULL,
  `status_akun` int NOT NULL,
  `status_delete` int NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `password`, `remember_token`, `level_user`, `status_akun`, `status_delete`, `last_login`) VALUES
('028b58d2-383f-4bd0-b46a-0e64f0d7c1cb', 'Ortu Malin Kundang', '008899823928', '$2y$10$NKHV8LVdPblCTq58hbjoPelkcsJcZlSePXdVDu3lcPl9W4qGBgkZu', 'PLdX6AC5r5QRoYUdkAQVSlI8poTHJsqshDjrWJaetegpowB3zlYKj8wMA7BH', 0, 1, 0, NULL),
('9be7f3cf-ceca-418c-93ba-ebe15d5aa197', 'Ortu Ujang Si Jangkung', '000888888', '$2y$10$fTlcZ9t8.d3QeiwweDy.1e0au1Exhxk50uskoRJ1mnPTtzi1GdNAy', 'f5JsvgkPeuFDs804Fsjl7aIb8BbcZgSuaiCGASUpJc5WwQ04Bfq3U2iHDydx', 0, 1, 0, NULL),
('d4971513-6303-4248-bd27-dbb1a999b51e', 'Administrator', 'admin', '$2y$10$rq2tjnEOyOHfHI/zW/.H6.HKObWTvbmcFWQKC2CCwjOAgb3.IKBey', 'vkeO87V8jVjP9sL1Pc81BNQ2qv7c8jLJjGsEEp3lQ66X7EFgjqkkLCs1U3fk', 2, 1, 0, NULL),
('e7670362-85b6-41b9-892f-22b016dba1d6', 'Ortu Test', '0821231223', '$2y$10$qSRmkUmCdZ1.a0SMgFy.sO9BQs/CL9Vp/UXXmUX79DN43U9ljzYXu', 'ziLWGwqbzYzpmlbj5Z8FwHctzQMvRPELn1aDMbIGM5TyASvZoQlgrWniuPCg', 0, 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kantin`
--
ALTER TABLE `kantin`
  ADD PRIMARY KEY (`id_kantin`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_siswa_keluarga` (`id_siswa_keluarga`);

--
-- Indexes for table `kolom_spp`
--
ALTER TABLE `kolom_spp`
  ADD PRIMARY KEY (`id_kolom_spp`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `id_kelas_siswa` (`id_kelas_siswa`);

--
-- Indexes for table `spp_bayar`
--
ALTER TABLE `spp_bayar`
  ADD PRIMARY KEY (`id_spp_bayar`),
  ADD KEY `id_spp_bulan_tahun` (`id_spp_bulan_tahun`);

--
-- Indexes for table `spp_bulan_tahun`
--
ALTER TABLE `spp_bulan_tahun`
  ADD PRIMARY KEY (`id_spp_bulan_tahun`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp_detail`
--
ALTER TABLE `spp_detail`
  ADD PRIMARY KEY (`id_spp_detail`),
  ADD KEY `id_kolom_spp` (`id_kolom_spp`),
  ADD KEY `id_spp_bulan_tahun` (`id_spp_bulan_tahun`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_3` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `keluarga_ibfk_2` FOREIGN KEY (`id_siswa_keluarga`) REFERENCES `siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`id_kelas_siswa`) REFERENCES `kelas_siswa` (`id_kelas_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `spp_bayar`
--
ALTER TABLE `spp_bayar`
  ADD CONSTRAINT `spp_bayar_ibfk_1` FOREIGN KEY (`id_spp_bulan_tahun`) REFERENCES `spp_bulan_tahun` (`id_spp_bulan_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp_bulan_tahun`
--
ALTER TABLE `spp_bulan_tahun`
  ADD CONSTRAINT `spp_bulan_tahun_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp_detail`
--
ALTER TABLE `spp_detail`
  ADD CONSTRAINT `spp_detail_ibfk_2` FOREIGN KEY (`id_kolom_spp`) REFERENCES `kolom_spp` (`id_kolom_spp`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_detail_ibfk_3` FOREIGN KEY (`id_spp_bulan_tahun`) REFERENCES `spp_bulan_tahun` (`id_spp_bulan_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;