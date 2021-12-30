-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 30, 2021 at 03:27 PM
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
-- Table structure for table `history_proses_spp`
--

CREATE TABLE `history_proses_spp` (
  `id_history_proses_spp` varchar(36) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `id_kantin` varchar(36) NOT NULL,
  `nama_kantin` varchar(100) NOT NULL,
  `slug_nama_kantin` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lokasi_kantin` text NOT NULL,
  `biaya_perbulan` int NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`id_kantin`, `nama_kantin`, `slug_nama_kantin`, `lokasi_kantin`, `biaya_perbulan`, `status_delete`) VALUES
('3630bc38-3357-453b-99c7-4470f7582b73', 'Dapur', 'dapur', '-', 0, 0),
('6f9cfc36-8c14-4a51-ab89-abb4373fd90d', 'Kantin Pak Mamat', '', 'Disamping Rumah Pak Mamat', 100000, 0),
('f19a4d1c-3e44-4027-9e7e-d125989edc21', 'Kantin Pak Mamat', '', 'Disamping Rumah Pak Mamat', 100000, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_keluarga` varchar(36) NOT NULL,
  `id_siswa` varchar(36) NOT NULL,
  `id_siswa_keluarga` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(36) NOT NULL,
  `id_users` varchar(36) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jabatan_petugas` varchar(50) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `id_users`, `nama_petugas`, `jabatan_petugas`, `status_delete`) VALUES
('e69121d7-1178-4b76-8427-0d87e74d97a0', '1c0e8c57-a967-442b-81fb-8bbb46c9008d', 'Hashirama Senju', 'bendahara-internal', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(36) NOT NULL,
  `id_kelas_siswa` varchar(36) NOT NULL,
  `total_harus_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `spp_bulan_tahun`
--

CREATE TABLE `spp_bulan_tahun` (
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `id_spp` varchar(36) NOT NULL,
  `bulan_tahun` varchar(30) NOT NULL,
  `id_kantin` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sisa_bayar` int NOT NULL,
  `status_bayar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('0c24e046-950a-4832-a5af-01695715a79c', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$i6Pwtlv.PutfMHsw.7WsfeVyU3Pr8CsB5W6ZG/nd5Klzhn4ZJ70Vq', NULL, 0, 1, 0, NULL),
('12678de9-e470-4240-8999-39c3d6bb0461', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$a5lasKYHKhv7xCF3MnIHH.IWMJtAr.afdB.ZWq.rkcYRlxGBSJGUy', NULL, 0, 1, 0, NULL),
('1befa194-0db4-40fa-ad43-bbf7460ed570', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$ECSvgq125ypeQc2pYHz6SOvIHhkwsJXl3ZOE4wAm/Rws4Ob6sDNWm', NULL, 0, 1, 0, NULL),
('1c0e8c57-a967-442b-81fb-8bbb46c9008d', 'Hashirama Senju', 'hashirama', '$2y$10$aK4zvWko6TuJVgAp9LxDVOjyVDRuy06xOwGmEJ26YS7fyIDyRtCDq', NULL, 2, 1, 0, NULL),
('1c4a3859-8ec5-4e86-bf73-87f518974351', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$xx.BQSWGfuRTO7KHHPn4Cut/Ri4pOxWCAakQmMCb2cljxMmp4I3NW', NULL, 0, 1, 0, NULL),
('25633287-4863-4a23-9ae2-e4de21ff9cb6', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$y9h8VWMV4kL5ILroSlmA8eX4wrxhfNTuJ/.ggZZWy3K6sAYy0qvuO', NULL, 0, 1, 0, NULL),
('26dbf0d2-e4fe-4f59-be62-c50176146809', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$zSCxhvTxlojk/uD9qSg/5OpH00IvW4tImGALNs8JWgUnysihdtnPa', NULL, 0, 1, 0, NULL),
('2f0b9a4f-1f8c-493e-ad56-1e061037ff67', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$sOEtlPh2Y.vOkjMboF4SXOAGMchrEgKJpFdavguoLwjnnIrQiOXhW', NULL, 0, 1, 0, NULL),
('2f9f505c-4759-45a1-acbc-700c01ff9cbb', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$I2.IizgF/NTMvi332f7Gy.Yyao02DG6gCcQbBhfX51AIpEhyupsR2', NULL, 0, 1, 0, NULL),
('3f03f517-bb8e-4178-b98c-a102149ff226', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$5xupdA4NSGKNFpqg.7U8LeqXw6FbD2247oGCa5fqo65r05cq5aTae', NULL, 0, 1, 0, NULL),
('3f05a4f8-2cb3-4a31-b703-4cdecc0f842e', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$rUHN02VmS9KdSiI3qV6YweyK5HJ4Jy2nK06oTkVRNCmS2zG1lTDNG', NULL, 0, 1, 0, NULL),
('433ae6e2-5044-4b6f-9633-e2f1b0b58877', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$K0EdNyng0fbVakcSLdVFseuKvmdTboHF6VJoZUzwyTh8yqaGPEUB.', NULL, 0, 1, 0, NULL),
('4638ad5a-b68a-4c1f-ba52-41ccab37542c', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$vgdCbh026AC6JOdXZ2/luui6sfWY/s7ohXCp2RmL1jdcglUF.xAuW', NULL, 0, 1, 0, NULL),
('545d0f56-2160-42ca-887b-f7a671e64d59', 'Ortu Aditia Kesuma', '012388989877', '$2y$10$AUzoPtAd9utv3.apSSZwGOR4A/63LNvH51ECXjTUz23ggYRl1dCNK', NULL, 0, 1, 0, NULL),
('5f5b5671-2125-4d8e-b335-4df77292334f', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$qY5FUF3b2nH3L1QeELvH9O1thK0dy24TZ52VTFRAMUrNChkTifTg.', NULL, 0, 1, 0, NULL),
('62adc3f3-c449-4203-a8fa-719e69befdb4', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$hnnCMCf.WXGIBEC5cQ3ymuTLBZvu7JxzJw.O8sTQeZiFB8CLcPaYe', NULL, 0, 1, 0, NULL),
('6a5a2f34-2e7e-4642-9d61-e1608a76e0a5', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$SJvIVnMeiYWhhxCY7uDKUuifUqq.QTmH/DncvXES/5e.1Xa.iaGvi', NULL, 0, 1, 0, NULL),
('6e05bf8e-987b-4308-bc70-cd47884a9435', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$.zNOWeioEa5Im.FrL1Wdzuc7GR.076DiFxVnrogp77ye5/yXezHP2', NULL, 0, 1, 0, NULL),
('74de432b-e8f8-4528-89dc-0a97e9e640e3', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$pUxBAY/L2I9Ica4Sop5kD.L9Cu3Y/pU2K3pKkcdkm7ewD/x3TPfNy', NULL, 0, 1, 0, NULL),
('794b4071-c1ea-4aee-98e8-fb3fa8492671', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$4SvRgjw7AJORR5yXePi/z.Oii6ox3sKSXNdC7xhHdiR31/eEAt1X.', NULL, 0, 1, 0, NULL),
('7968e860-5ac6-40c7-8ebb-e2728840514a', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$wWTwxcwWA/nrD02yHN.QQ.LoeNr41wefnEAAVOaWLZEgD364oeNmq', NULL, 0, 1, 0, NULL),
('85e737b4-f433-439b-8fba-24b07bbb35dc', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$19sNJjYnU08tirOSQH8Njup8PhNo1KHwCfFynNqi903d9SZm.4sx2', NULL, 0, 1, 0, NULL),
('8602946b-725c-4444-ad4b-7255ac113d23', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$b8uRWqnhoomtVRY6kcd/XOsmg88iYh40a6d.Sg18BN8ES7jzzuU4.', NULL, 0, 1, 0, NULL),
('86fdb5f6-2d07-4744-b326-11c9cb11ba37', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$ZCisdihWg.rsTK4vj2pGy.ERUGSux6LlCrq4SAzj.SEUAH2CdCTdO', NULL, 0, 1, 0, NULL),
('9837ef8b-68f6-498f-8103-db0bb18703ad', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$.uA0avY039RJqM.LrZOZme1MARKyK.QEEtZ927awbs3ECr6dW.E1m', NULL, 0, 1, 0, NULL),
('9be7f3cf-ceca-418c-93ba-ebe15d5aa197', 'Ortu Ujang Si Jangkung', '000888888', '$2y$10$fTlcZ9t8.d3QeiwweDy.1e0au1Exhxk50uskoRJ1mnPTtzi1GdNAy', 'f5JsvgkPeuFDs804Fsjl7aIb8BbcZgSuaiCGASUpJc5WwQ04Bfq3U2iHDydx', 0, 1, 0, NULL),
('9ff82d8a-c3c5-418c-83d7-cd670d9152f1', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$zYMb.YquL8nFIC0PGymKOucqVDghZpyl7gENnfW03wVr.6p.wJzKi', NULL, 0, 1, 0, NULL),
('a492d245-a9af-4512-a1fc-f3d3c1facdff', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$7aMnAT5AGi12CQdmxcEEVeWjfgIEYMi54U5Xub63VYU11PhKIzKOe', NULL, 0, 1, 0, NULL),
('a5270d07-3c3b-4fcb-8278-d534dd7c1b26', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$7fguNFtH5Tq4K5h/3gjIUe4w9C/uycv8FTOAMW/eolWzwlOfd1FYS', NULL, 0, 1, 0, NULL),
('b5aa5a8c-a6dc-4363-8f30-7528aad36aa9', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$9W73YKfvXQmaN.oN8ZCsq.H6AZzUJaxlgU/RZwqTdjMiHoNl/2Ne2', NULL, 0, 1, 0, NULL),
('b9a02aa2-2faf-4371-8707-61ea8acc0526', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$.w4at2oTr.UncTga0tMvteGpHGhJYxuVzzi21GK.jgZ4y7Ip5ptK6', NULL, 0, 1, 0, NULL),
('cc15fb6f-5384-4a18-a337-4d5a86550a06', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$ZtkMw5FwJq.sBhhAMyosQOe6hT7DvWQm6v6ZDGenxnNr9uU9c735a', NULL, 0, 1, 0, NULL),
('cdc9076d-b515-4de5-8bb5-bb18cb7f7c1b', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$bQAWZUOo.201E1r3AmNXDeqzcuXGIQH2POYfkcBOTIjLMD4mZd8cu', NULL, 0, 1, 0, NULL),
('d0c70a75-07df-44fb-9afe-f6449838ef79', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$IQheafLh31iarHDIfHm6MuGZZGglxRc/oyQBNSNvTXCrN9tkAvBgO', NULL, 0, 1, 0, NULL),
('d4971513-6303-4248-bd27-dbb1a999b51e', 'Administrator', 'admin', '$2y$10$rq2tjnEOyOHfHI/zW/.H6.HKObWTvbmcFWQKC2CCwjOAgb3.IKBey', 'hyuDKQ0DIhfQlKRw9T8Y8WnkRSTqONeTUWAA3bbYmBSJjmtLidZ95BsOE4ON', 3, 1, 0, NULL),
('d9dd0013-0d43-4cf2-a994-79d21bd71aa2', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$qzGQSOrVfnoW/8XnuV.tFeF5Yvifma3d6XL5FjfbKRNfEDtCh62HS', NULL, 0, 1, 0, NULL),
('e36f22fd-c164-4b05-a610-b9b12efa9dff', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$2ZmRQnTyM3EVg/WCPHyjhuu0DVNOQL.cQ5.9Vyjk7F0ax18oQ3VDy', NULL, 0, 1, 0, NULL),
('e7670362-85b6-41b9-892f-22b016dba1d6', 'Ortu Test', '0821231223', '$2y$10$qSRmkUmCdZ1.a0SMgFy.sO9BQs/CL9Vp/UXXmUX79DN43U9ljzYXu', 'ziLWGwqbzYzpmlbj5Z8FwHctzQMvRPELn1aDMbIGM5TyASvZoQlgrWniuPCg', 0, 1, 0, NULL),
('f3dcb2db-c4d3-4635-acd3-2c1a0114cf8f', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$J.HNHOiQAKF9isCMvXPy4.6MMuFu.AApb6x/WJA2bgD4CEVGXTYWa', NULL, 0, 1, 0, NULL),
('f8ea2d8f-9e16-4562-93c8-f57991d5b973', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$.gTBQXcxDaWITLmn9AcC/ezoFVNkyeDmhVm59L.q3pf6w3eeKD3HG', NULL, 0, 1, 0, NULL),
('fd39056e-8f55-4a59-882d-068083ab3293', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$qjDcCyGpAjQpzv9VMgz.mOVahOd87L2KBrwQH8En4V9Zy1e9p.6Ia', NULL, 0, 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_proses_spp`
--
ALTER TABLE `history_proses_spp`
  ADD PRIMARY KEY (`id_history_proses_spp`);

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
  ADD KEY `keluarga_ibfk_1` (`id_siswa`),
  ADD KEY `keluarga_ibfk_2` (`id_siswa_keluarga`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id_kepsek`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `kolom_spp`
--
ALTER TABLE `kolom_spp`
  ADD PRIMARY KEY (`id_kolom_spp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_users` (`id_users`);

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
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keluarga_ibfk_2` FOREIGN KEY (`id_siswa_keluarga`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD CONSTRAINT `kepsek_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
