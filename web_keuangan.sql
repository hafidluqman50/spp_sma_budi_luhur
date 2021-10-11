-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 11, 2021 at 12:25 PM
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
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `status_delete`) VALUES
('218c14e3-cd16-4f72-84d5-83d696390fa6', 'XII RPL 1', 0);

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
('4b1b083d-f695-4ad1-8c8a-2786587fbc78', '7bbb36db-240a-48ee-af92-4669326778ee', '9ffc8df5-0329-4c39-a069-870178ff3d74', '218c14e3-cd16-4f72-84d5-83d696390fa6', 0);

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
  `keterangan_kolom` text,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kolom_spp`
--

INSERT INTO `kolom_spp` (`id_kolom_spp`, `nama_kolom_spp`, `keterangan_kolom`, `status_delete`) VALUES
('1971752f-5e6c-459f-8a13-c51327bb88e7', 'Pembayaran Akademik', NULL, 0),
('60f3492f-d8be-4f29-9014-478d314fe4ef', 'Pembayaran Gedung', NULL, 0),
('ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 'Kantin Pak Mamat', '100000', 0),
('ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 'Pembayaran Fasilitas', NULL, 0);

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
('9ffc8df5-0329-4c39-a069-870178ff3d74', '000888888', 'Ujang Si Jangkung', 'ujang-si-jangkung', 'laki-laki', '2021-09-13', 'Uchiha Abi', 'Uchiha Ummi', '08889998989', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('a1f307cb-7352-40c8-8805-5b607b8fb58d', '0821231223', 'Test', '', 'laki-laki', '2021-10-03', 'testj', 'tetsm', '088888888', '-', 'Konohagakure No Sato', 'dalam-kota', 0),
('bfbb26b8-68f3-4bbe-8315-3f1cd0946c56', '00088899913', 'Uchiha Tiara', 'uchiha-tiara', 'perempuan', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('c088bf43-ab82-4dc0-b87b-ee36a79ff8e4', '008899823928', 'Malin Kundang', 'malin-kundang', 'laki-laki', '2021-09-29', 'Kujang', 'Kujing', '088989809898', 'Clan Senju', 'Konohagakure No Sato', 'dalam-kota', 0),
('c31dc532-93c3-4a86-89e4-24076278dc51', '00088899914', 'Uchiha Sukirman', 'uchiha-sukirman', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0),
('daaf7f34-708c-4f95-a3c1-841a80415d28', '00088899912', 'Uchiha Bayu', 'uchiha-bayu', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(36) NOT NULL,
  `id_kelas_siswa` varchar(36) NOT NULL,
  `total_pembayaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `id_kelas_siswa`, `total_pembayaran`) VALUES
('2cf9729f-4c25-43a5-9ea1-6b363b3b0eef', '4b1b083d-f695-4ad1-8c8a-2786587fbc78', 60000),
('d31e7fb1-3233-45b3-bbfd-9a1464ac2700', '0a2c3901-c957-4bf0-b58b-5bc238be3687', 10000);

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
('02ea6e27-062a-46d5-977a-ff66fb562de8', '2cf9729f-4c25-43a5-9ea1-6b363b3b0eef', 'Oktober, 2021'),
('1740d333-c883-44f3-8c16-edbca286b84e', '2cf9729f-4c25-43a5-9ea1-6b363b3b0eef', 'November, 2021'),
('3d995dd7-7b2e-4672-b2b6-2dbea1166ceb', '2cf9729f-4c25-43a5-9ea1-6b363b3b0eef', 'Desember, 2021'),
('450a8497-149c-4c6d-a1aa-518b94c3a575', 'd31e7fb1-3233-45b3-bbfd-9a1464ac2700', 'Oktober, 2021'),
('bea46d81-f69d-4e26-8d3c-89930a4ca31a', 'd31e7fb1-3233-45b3-bbfd-9a1464ac2700', 'November, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `spp_detail`
--

CREATE TABLE `spp_detail` (
  `id_spp_detail` varchar(36) NOT NULL,
  `id_spp_bulan_tahun` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_kolom_spp` varchar(36) NOT NULL,
  `nominal_spp` int NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `bayar_spp` int NOT NULL,
  `status_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_detail`
--

INSERT INTO `spp_detail` (`id_spp_detail`, `id_spp_bulan_tahun`, `id_kolom_spp`, `nominal_spp`, `tanggal_bayar`, `bayar_spp`, `status_bayar`) VALUES
('05ca2644-5d93-487e-99f4-84e061068ee9', '02ea6e27-062a-46d5-977a-ff66fb562de8', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 20000, NULL, 0, 0),
('1ec9873c-992b-4f6f-ba19-5e0c81276333', '1740d333-c883-44f3-8c16-edbca286b84e', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, '2021-10-02', 20000, 1),
('3cd8af8b-a300-491c-af52-b3bfba78b07f', 'bea46d81-f69d-4e26-8d3c-89930a4ca31a', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 10000, NULL, 0, 0),
('3f9b9c51-abbc-493e-81df-b444d28f1caa', 'bea46d81-f69d-4e26-8d3c-89930a4ca31a', '60f3492f-d8be-4f29-9014-478d314fe4ef', 30000, NULL, 0, 0),
('4bdaa503-4936-434a-885f-1baf095e94c8', '450a8497-149c-4c6d-a1aa-518b94c3a575', '60f3492f-d8be-4f29-9014-478d314fe4ef', 10000, '2021-10-02', 10000, 1),
('5e81fada-4c11-4674-9331-8bc52a58eb06', '02ea6e27-062a-46d5-977a-ff66fb562de8', '1971752f-5e6c-459f-8a13-c51327bb88e7', 20000, NULL, 0, 0),
('8afe89a8-e717-4d3a-950b-af49f3f694a5', '1740d333-c883-44f3-8c16-edbca286b84e', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 30000, '2021-10-03', 30000, 1),
('9fb10c61-f723-45cd-b29b-e857dba7862e', '3d995dd7-7b2e-4672-b2b6-2dbea1166ceb', '1971752f-5e6c-459f-8a13-c51327bb88e7', 20000, NULL, 0, 0),
('b155c695-21cb-4d36-892c-64d954a27fe5', '3d995dd7-7b2e-4672-b2b6-2dbea1166ceb', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 20000, NULL, 0, 0),
('c08a714f-bc41-46fc-b914-cc18f9e64051', 'bea46d81-f69d-4e26-8d3c-89930a4ca31a', '1971752f-5e6c-459f-8a13-c51327bb88e7', 20000, NULL, 0, 0),
('c1efc2a5-97e0-4d8e-8799-cfa2e31b4567', '02ea6e27-062a-46d5-977a-ff66fb562de8', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, NULL, 0, 0),
('caa0fafb-515f-4fdc-b62d-fe58b700be64', '1740d333-c883-44f3-8c16-edbca286b84e', '1971752f-5e6c-459f-8a13-c51327bb88e7', 10000, '2021-10-02', 10000, 1),
('f4817fb0-572a-45bc-a050-a94e83a7539c', '3d995dd7-7b2e-4672-b2b6-2dbea1166ceb', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, NULL, 0, 0);

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
('028b58d2-383f-4bd0-b46a-0e64f0d7c1cb', 'Ortu Malin Kundang', '008899823928', '$2y$10$NKHV8LVdPblCTq58hbjoPelkcsJcZlSePXdVDu3lcPl9W4qGBgkZu', '', 0, 1, 0, NULL),
('9be7f3cf-ceca-418c-93ba-ebe15d5aa197', 'Ortu Ujang Si Jangkung', '000888888', '$2y$10$fTlcZ9t8.d3QeiwweDy.1e0au1Exhxk50uskoRJ1mnPTtzi1GdNAy', 'f5JsvgkPeuFDs804Fsjl7aIb8BbcZgSuaiCGASUpJc5WwQ04Bfq3U2iHDydx', 0, 1, 0, NULL),
('d4971513-6303-4248-bd27-dbb1a999b51e', 'Administrator', 'admin', '$2y$10$rq2tjnEOyOHfHI/zW/.H6.HKObWTvbmcFWQKC2CCwjOAgb3.IKBey', '2hFL91EWrQBy5ymOpg8JinvVkx7f10OvQmEhczBfv9ktA0gQb5Wis5eHp7w2', 2, 1, 0, NULL),
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
