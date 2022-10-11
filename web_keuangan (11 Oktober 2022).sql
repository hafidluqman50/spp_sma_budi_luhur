-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 11, 2022 at 06:45 AM
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_terbaca` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history_proses_spp`
--

INSERT INTO `history_proses_spp` (`id_history_proses_spp`, `text`, `created_at`, `updated_at`, `status_terbaca`) VALUES
('072cf91f-35f0-4081-b112-f0069a056869', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Agustus, 2021</b>, <b>Pembayaran Akademik</b> Sebesar <b>Rp. 500.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 500.000,00</b>', '2022-01-08 01:20:25', '2022-08-19 15:13:23', 1),
('0fa8fb64-82be-4c00-a573-bb9398ab382b', 'Administrator telah import data SPP', '2022-02-26 15:30:38', '2022-08-19 15:13:23', 1),
('1234a49a-a077-464a-ad68-8eb5071b574d', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2022</b>', '2022-08-23 14:02:52', '2022-08-23 14:02:52', 0),
('14781bf8-e42f-4a7e-9075-783c85443a38', 'Administrator telah import data SPP', '2022-08-14 00:32:36', '2022-08-19 15:13:23', 1),
('2071d3f5-ea5e-4281-89bb-59b6ec904cec', 'Administrator telah import data SPP', '2022-02-26 15:52:41', '2022-08-19 15:13:23', 1),
('25700fd0-3655-452d-83ff-f055d5be785a', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Januari, 2022</b>, <b>Uang Makan</b> Sebesar <b>Rp. 0,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-08-31 14:18:09', '2022-08-31 14:18:09', 0),
('26edc2fc-b417-417b-925d-7f83974b7f02', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:26:38', '2022-08-19 15:13:23', 1),
('271d5f7d-3277-4838-a4b0-dd754ebfabb9', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:25:51', '2022-08-19 15:13:23', 1),
('27a4ea2c-18c7-4b0f-a3f8-679220d9ebde', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:26:37', '2022-08-19 15:13:23', 1),
('27c3c600-45d3-43ce-b6ad-e7ebc7efe76c', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:53:33', '2022-08-19 15:13:23', 1),
('292f0dbd-17b5-478c-b92a-37e6c84c33c4', 'Administrator telah menghapus Pembayaran : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 10.000,00</b>, Nominal Bayar : <b>Rp. 10.000,00</b>, dan Kembalian : <b>Rp. 0,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-05 01:51:46', '2022-08-19 15:13:23', 1),
('2ba45d4f-ec15-4d3d-b10b-fa08d78f548d', 'Administrator telah import data SPP', '2022-08-14 00:29:37', '2022-08-19 15:13:23', 1),
('2c488a9b-7f5b-4b47-bd34-67c659e324dd', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:51:57', '2022-08-19 15:13:23', 1),
('4586e463-836f-44fe-a85c-24e968b8682b', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:30:24', '2022-08-19 15:13:23', 1),
('4ec50d31-d572-4832-952e-3bae49d005f4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-13 01:39:45', '2022-08-19 15:13:23', 1),
('56104592-7644-43f3-ba87-680f5109bab8', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Agustus, 2021</b>, <b></b> Sebesar Rp. 500.000,00 dan dengan total nominal bayar sebesar Rp. 1.000.000,00', '2022-01-04 22:42:47', '2022-08-19 15:13:23', 1),
('6424c37a-69b3-4f3f-8d98-ab93b7c9ca72', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:52:00', '2022-08-19 15:13:23', 1),
('6800b2f6-1892-46eb-94fc-6a98beb4ce90', 'Administrator telah menghapus SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Oktober, 2021</b>, <b></b>', '2022-02-26 15:59:17', '2022-08-19 15:13:23', 1),
('6dc01db4-2fb4-459b-8256-bde8197ee23e', 'Administrator telah menghapus Pembayaran : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 1.000.000,00</b>, Nominal Bayar : <b>Rp. 2.000.000,00</b>, dan Kembalian : <b>Rp. 1.000.000,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-04 23:04:58', '2022-08-19 15:13:23', 1),
('6dcb9c2f-98ed-4e35-94c7-bd7bc1633022', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:53:32', '2022-08-19 15:13:23', 1),
('754ab493-cf8e-42eb-be50-a8d468fdff18', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-08-14 00:32:30', '2022-08-19 15:13:23', 1),
('75d679cb-7a41-463a-8488-224089c0fdf9', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:30:25', '2022-08-19 15:13:23', 1),
('7f8aa87d-438e-429a-8900-e6202b6da805', 'Administrator telah import data SPP', '2022-01-05 02:04:35', '2022-08-19 15:13:23', 1),
('85cd50bf-4f49-42f3-92d1-4302c7d1dcb0', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-14 00:32:28', '2022-08-19 15:13:23', 1),
('959cd4ed-ccd0-4a28-8289-83c41dd966f0', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Januari, 2022</b>, <b>Kantin Pak Mamat</b> Sebesar <b>Rp. 0,00</b> dan dengan total nominal bayar sebesar <b>Rp. 2.000.000,00</b>', '2022-08-10 00:53:02', '2022-08-19 15:13:23', 1),
('9a1cc8af-d5a8-4d5e-a39c-3ad0877c11b4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:57:46', '2022-08-19 15:13:23', 1),
('ae75016a-fa10-49dd-821b-d94a6aff088d', 'Administrator telah import data SPP', '2022-02-26 15:57:43', '2022-08-19 15:13:23', 1),
('b673824f-1533-42bf-8706-50823f13bad8', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-11 13:43:19', '2022-08-19 15:13:23', 1),
('b6ad5c2f-9a54-433c-a59e-e6aab75de685', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:59:06', '2022-08-19 15:13:23', 1),
('bf4def14-b2a1-4c84-85ab-bd3bb14964d1', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:25:52', '2022-08-19 15:13:23', 1),
('c2186f49-016d-443a-a87a-0555df8fa097', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-01-05 02:02:42', '2022-08-19 15:13:23', 1),
('c2e6e41d-904d-4392-977b-110066105a71', 'Administrator telah menghapus Pembayaran : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 1.000.000,00</b>, Nominal Bayar : <b>Rp. 2.000.000,00</b>, dan Kembalian : <b>Rp. 1.000.000,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-04 23:07:34', '2022-08-19 15:13:23', 1),
('c51a9adf-a3b5-42d7-8568-6cb576e9fa59', 'Administrator telah import data SPP', '2022-02-26 15:26:42', '2022-08-19 15:13:23', 1),
('c8886984-6224-4235-89b4-bff9f6f8ac24', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:57:33', '2022-08-19 15:13:23', 1),
('d304bfe8-5bcb-4c7a-8a85-03cb670d8f51', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>September, 2021</b>, <b>Pembayaran Gedung</b> Sebesar <b>Rp. 10.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 10.000,00</b>', '2022-08-10 01:10:46', '2022-08-19 15:13:23', 1),
('d6f98e1b-2fd9-4f51-815a-9ecc6d821952', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:57:37', '2022-08-19 15:13:23', 1),
('d9c4356d-62f8-472e-ae36-b19ce62c443e', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-08-31 14:13:17', '2022-08-31 14:13:17', 0),
('da5b79da-a09a-49ce-ad59-452fdc733f93', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>September, 2021</b>, <b></b> Sebesar <b>Rp. 10.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 10.000,00</b>', '2022-01-04 23:08:12', '2022-08-19 15:13:23', 1),
('dc8eef49-3ed2-4faf-b48f-76388f33edd4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:57:20', '2022-08-19 15:13:23', 1),
('e11d35bb-7d4e-43e1-99f8-843cc8c73055', 'Administrator telah import data SPP', '2022-02-26 15:59:02', '2022-08-19 15:13:23', 1),
('e18e320b-07e4-4186-bd7a-92f23b919342', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:58:56', '2022-08-19 15:13:23', 1),
('e5e3e895-60f0-45a8-85e2-7c4ecf112253', 'Administrator telah membayar spp Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022 Bulan, Tahun Agustus, 2021,   Sebesar Rp. 0,00 dan dengan total nominal bayar sebesar Rp. 2.000.000,00', '2022-01-04 22:19:33', '2022-08-19 15:13:23', 1),
('ec909e33-e7fd-4e67-a221-dfc28d2b9217', 'Administrator telah import data SPP', '2022-02-26 15:53:44', '2022-08-19 15:13:23', 1),
('f8f2a3a3-8719-47c1-8398-bae7946a7ec8', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:58:57', '2022-08-19 15:13:23', 1),
('fa41f6c7-7915-4f2a-9564-21e6bafef2fd', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-11 13:46:18', '2022-08-19 15:13:23', 1);

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
('6f9cfc36-8c14-4a51-ab89-abb4373fd90d', 'Kantin Pak Mamat', 'kantin-pak-mamat', 'Disamping Rumah Pak Mamat', 100000, 0);

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
('c611c597-41d2-4cb2-89c8-7d879a980bfb', 'XII RPL 1', 'xii-rpl-1', 0);

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
('8038690d-94bd-4eb1-8237-447aee3004c7', '7bbb36db-240a-48ee-af92-4669326778ee', 'd9021dc3-aa5b-4caf-be6f-a5eb96fc382d', 'c611c597-41d2-4cb2-89c8-7d879a980bfb', 0),
('add4695a-3425-4651-8a62-ef5f30815f81', '7bbb36db-240a-48ee-af92-4669326778ee', '66e49e69-ef34-4ef8-a454-719bd5e59188', 'c611c597-41d2-4cb2-89c8-7d879a980bfb', 0),
('f485dbe2-aae3-4c9e-b55a-d0f957e222a7', '7bbb36db-240a-48ee-af92-4669326778ee', '304183d5-f207-40a6-8cdc-fcfc4aff50c4', 'c611c597-41d2-4cb2-89c8-7d879a980bfb', 0);

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
('4e07c1aa-f0c6-41eb-9d00-c9d9fe8b537c', 'd9021dc3-aa5b-4caf-be6f-a5eb96fc382d', '304183d5-f207-40a6-8cdc-fcfc4aff50c4'),
('c46b9970-1eb2-4635-a9de-8be336ae146a', '304183d5-f207-40a6-8cdc-fcfc4aff50c4', 'd9021dc3-aa5b-4caf-be6f-a5eb96fc382d'),
('cd1a0d8d-23b6-4d60-bd02-1d18a8f2ed7b', 'd9021dc3-aa5b-4caf-be6f-a5eb96fc382d', '66e49e69-ef34-4ef8-a454-719bd5e59188');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id_kepsek` varchar(36) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `nama_kepsek` varchar(100) NOT NULL,
  `id_users` varchar(36) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id_kepsek`, `nip_kepsek`, `nama_kepsek`, `id_users`, `status_delete`) VALUES
('638b6c1b-b7e9-462a-bcae-49e30a5b5a31', '088888', 'Kepsek Bapak', 'eafb556b-1a36-4183-9691-6eea9a2da269', 0);

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
('ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 'Uang Makan', 'uang-makan', NULL, 0),
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
-- Table structure for table `rincian_pembelanjaan`
--

CREATE TABLE `rincian_pembelanjaan` (
  `id_rincian_pembelanjaan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `kategori_rincian_pembelanjaan` varchar(75) NOT NULL,
  `id_rincian_pengeluaran_detail` varchar(36) NOT NULL,
  `jenis_rincian_pembelanjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan_pembelanjaan` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pembelanjaan`
--

INSERT INTO `rincian_pembelanjaan` (`id_rincian_pembelanjaan`, `id_rincian_pengeluaran`, `kategori_rincian_pembelanjaan`, `id_rincian_pengeluaran_detail`, `jenis_rincian_pembelanjaan`, `keterangan_pembelanjaan`, `created_at`, `updated_at`) VALUES
('9793016e-ef3f-498f-a306-248d8a43b89a', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'Biaya Operasional', '7208053a-a277-4e5e-add4-d81a3ff9d3ac', 'operasional', '', '2022-08-31 14:42:16', '2022-08-31 14:42:16'),
('c297bd7e-b5ac-4a02-9125-168a1ec3311a', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'Belanja Uang Makan', '4f7523b9-0862-45cf-9b25-5e20a77dd4bd', 'uang-makan', NULL, '2022-08-31 14:43:09', '2022-10-08 16:20:38'),
('e5a4955e-77af-4401-8764-bbdab18f1d0a', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'Pembelian Barang Jasa', 'c86e9f4b-2b9d-4940-aed1-e927c6c8344d', 'operasional', '', '2022-08-31 14:42:16', '2022-08-31 14:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan`
--

CREATE TABLE `rincian_penerimaan` (
  `id_rincian_penerimaan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penerimaan`
--

INSERT INTO `rincian_penerimaan` (`id_rincian_penerimaan`, `id_rincian_pengeluaran`, `created_at`, `updated_at`) VALUES
('69a39058-d5ab-4932-a8c2-efc9858cc23f', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-10-08 13:07:58', '2022-10-08 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_detail`
--

CREATE TABLE `rincian_penerimaan_detail` (
  `id_rincian_penerimaan_detail` varchar(36) NOT NULL,
  `id_rincian_penerimaan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran_detail` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `perincian` varchar(100) DEFAULT NULL,
  `rencana` int DEFAULT NULL,
  `penerimaan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penerimaan_detail`
--

INSERT INTO `rincian_penerimaan_detail` (`id_rincian_penerimaan_detail`, `id_rincian_penerimaan`, `id_rincian_pengeluaran_detail`, `perincian`, `rencana`, `penerimaan`, `created_at`, `updated_at`) VALUES
('43401a7c-b59b-4f36-987f-9c816ccb6c26', '69a39058-d5ab-4932-a8c2-efc9858cc23f', '7208053a-a277-4e5e-add4-d81a3ff9d3ac', 'Penerimaan Gedung', NULL, 10000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('58225c9a-d255-408c-8216-945a3ecc3895', '69a39058-d5ab-4932-a8c2-efc9858cc23f', '4f7523b9-0862-45cf-9b25-5e20a77dd4bd', 'Penerimaan Uang Makan', 100000, 110000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('7d4e114c-f9c0-4ff3-9a3c-daab9691e348', '69a39058-d5ab-4932-a8c2-efc9858cc23f', NULL, 'Sumbangan Pembiayaan Pendidikan (SPP)', 1600000, 130000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('945b12ae-3128-4ff6-873f-7cca8a5aeaf7', '69a39058-d5ab-4932-a8c2-efc9858cc23f', '63378a84-b711-4edf-8a09-40216fa6f22b', 'Penerimaan BOSDA', NULL, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('9517df63-6b4f-4388-88b0-bb06f2af67e2', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 'b766b0a0-c79e-4304-b404-b0d8809f676a', 'Penerimaan Akademik', NULL, 0, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('da913497-28f7-4249-b605-f0419392ca08', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 'c86e9f4b-2b9d-4940-aed1-e927c6c8344d', 'Penerimaan Fasilitas', NULL, 10000, '2022-10-08 13:07:58', '2022-10-08 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_rekap`
--

CREATE TABLE `rincian_penerimaan_rekap` (
  `id_rincian_penerimaan_rekap` varchar(36) NOT NULL,
  `id_rincian_penerimaan` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal_bon_pengajuan` date NOT NULL,
  `nominal_bon_pengajuan` int NOT NULL,
  `tanggal_realisasi_pengeluaran` date NOT NULL,
  `nominal_realisasi_pengeluaran` int NOT NULL,
  `sisa_realisasi_pengeluaran` int NOT NULL,
  `tanggal_penerimaan_bulan_ini` date NOT NULL,
  `sisa_penerimaan_bulan_ini` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penerimaan_rekap`
--

INSERT INTO `rincian_penerimaan_rekap` (`id_rincian_penerimaan_rekap`, `id_rincian_penerimaan`, `tanggal_bon_pengajuan`, `nominal_bon_pengajuan`, `tanggal_realisasi_pengeluaran`, `nominal_realisasi_pengeluaran`, `sisa_realisasi_pengeluaran`, `tanggal_penerimaan_bulan_ini`, `sisa_penerimaan_bulan_ini`, `created_at`, `updated_at`) VALUES
('5f1f4de1-0ede-402f-a396-ca1ca15d5de0', '69a39058-d5ab-4932-a8c2-efc9858cc23f', '2022-10-08', 100000000, '2022-10-09', 1500000, 98500000, '2022-10-10', 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_tahun_ajaran`
--

CREATE TABLE `rincian_penerimaan_tahun_ajaran` (
  `id_rincian_penerimaan_tahun_ajaran` varchar(36) NOT NULL,
  `id_rincian_penerimaan` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bulan` int NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pemasukan` int NOT NULL,
  `realisasi_pengeluaran` int NOT NULL,
  `sisa_akhir_bulan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penerimaan_tahun_ajaran`
--

INSERT INTO `rincian_penerimaan_tahun_ajaran` (`id_rincian_penerimaan_tahun_ajaran`, `id_rincian_penerimaan`, `bulan`, `tahun`, `pemasukan`, `realisasi_pengeluaran`, `sisa_akhir_bulan`, `created_at`, `updated_at`) VALUES
('0ef5cb7f-fcb7-43e5-a604-69cebc7e0a26', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 2, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('10a44b42-9dc5-4ac9-8b89-23f46615f80a', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 4, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('24bdb4aa-7a90-4ca8-a2cd-d7d597ef75b7', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 7, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('4662b861-aff7-481d-ae1c-9b8e9f26268b', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 3, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('4829e225-c550-41f3-a162-73cb3b1cab85', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 11, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('79891bb5-55f4-46ce-aab5-49448d265457', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 12, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('8424f1b6-6f02-4703-ae2c-3b8dabd70880', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 5, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('96bbff02-b55a-434e-a0e2-ad99d35c7aaf', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 10, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('a5061097-5af9-49c3-8c2a-d94b600f4d88', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 9, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('ec427b2b-ceb8-4946-94e4-73050aee1c86', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 8, '2022', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('f698b233-3a4f-404e-9cb3-adef430b3761', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 6, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58'),
('ffe6aba1-88a1-477e-8125-664a8e73a85d', '69a39058-d5ab-4932-a8c2-efc9858cc23f', 1, '2023', 100000, 100000, 100000, '2022-10-08 13:07:58', '2022-10-08 13:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengajuan`
--

CREATE TABLE `rincian_pengajuan` (
  `id_rincian_pengajuan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `kategori_rincian_pengajuan` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rincian_pengeluaran_detail` varchar(36) NOT NULL,
  `keterangan_pengajuan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengajuan`
--

INSERT INTO `rincian_pengajuan` (`id_rincian_pengajuan`, `id_rincian_pengeluaran`, `kategori_rincian_pengajuan`, `id_rincian_pengeluaran_detail`, `keterangan_pengajuan`, `created_at`, `updated_at`) VALUES
('11bc88b5-3a4e-4358-af5a-bf6e0d2f06fb', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'Belanja Biaya Gedung', '7208053a-a277-4e5e-add4-d81a3ff9d3ac', '', '2022-09-01 16:34:00', '2022-09-01 16:34:00'),
('2fe34e58-0b96-4e36-a6bf-874968f70213', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'Belanja Barang Dan Jasa', 'c86e9f4b-2b9d-4940-aed1-e927c6c8344d', '', '2022-09-01 16:34:00', '2022-09-01 16:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengeluaran`
--

CREATE TABLE `rincian_pengeluaran` (
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `bulan_laporan` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tahun_laporan` year NOT NULL,
  `bulan_pengajuan` varchar(2) NOT NULL,
  `tahun_pengajuan` year NOT NULL,
  `id_tahun_ajaran` varchar(36) NOT NULL,
  `saldo_awal` int NOT NULL,
  `tanggal_setor_dapur` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengeluaran`
--

INSERT INTO `rincian_pengeluaran` (`id_rincian_pengeluaran`, `bulan_laporan`, `tahun_laporan`, `bulan_pengajuan`, `tahun_pengajuan`, `id_tahun_ajaran`, `saldo_awal`, `tanggal_setor_dapur`, `created_at`, `updated_at`) VALUES
('5a5e50fc-04a8-431b-9700-04231db33cb8', '8', 2022, '9', 2022, '7bbb36db-240a-48ee-af92-4669326778ee', 100000000, '2022-10-08', '2022-08-31 14:36:01', '2022-10-08 16:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengeluaran_detail`
--

CREATE TABLE `rincian_pengeluaran_detail` (
  `id_rincian_pengeluaran_detail` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `tanggal_rincian` date NOT NULL,
  `uraian_rincian` varchar(100) NOT NULL,
  `volume_rincian` int NOT NULL,
  `nominal_rincian` int NOT NULL,
  `id_kolom_spp` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nominal_pendapatan_spp` int DEFAULT NULL,
  `kolom_pendapatan` varchar(75) DEFAULT NULL,
  `nominal_pendapatan` int DEFAULT NULL,
  `uraian_rab` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `volume_rab` int DEFAULT NULL,
  `nominal_rab` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengeluaran_detail`
--

INSERT INTO `rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`, `id_rincian_pengeluaran`, `tanggal_rincian`, `uraian_rincian`, `volume_rincian`, `nominal_rincian`, `id_kolom_spp`, `nominal_pendapatan_spp`, `kolom_pendapatan`, `nominal_pendapatan`, `uraian_rab`, `volume_rab`, `nominal_rab`, `created_at`, `updated_at`) VALUES
('4f7523b9-0862-45cf-9b25-5e20a77dd4bd', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-08-31', 'Setor Kantin', 1, 100000, 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 110000, NULL, NULL, NULL, NULL, NULL, '2022-08-31 14:36:01', '2022-10-08 12:58:55'),
('63378a84-b711-4edf-8a09-40216fa6f22b', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-10-08', 'Konsumsi Harian', 1, 100000, NULL, 0, 'BOSDA', 100000, NULL, NULL, NULL, '2022-10-08 12:58:55', '2022-10-08 12:58:55'),
('7208053a-a277-4e5e-add4-d81a3ff9d3ac', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-08-31', 'Listrik Agustus 2022', 1, 200000, '60f3492f-d8be-4f29-9014-478d314fe4ef', 10000, NULL, NULL, 'Listrik September 2022', 1, 200000, '2022-08-31 14:36:01', '2022-10-08 12:58:55'),
('b766b0a0-c79e-4304-b404-b0d8809f676a', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-09-07', 'Gaji Guru', 1, 1000000, '1971752f-5e6c-459f-8a13-c51327bb88e7', 0, NULL, NULL, 'Gaji Guru', 1, 2000000, '2022-09-07 15:44:03', '2022-10-08 12:58:55'),
('c86e9f4b-2b9d-4940-aed1-e927c6c8344d', '5a5e50fc-04a8-431b-9700-04231db33cb8', '2022-08-31', 'PDAM Agustus 2022', 1, 100000, 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 10000, NULL, NULL, 'PDAM September 2022', 1, 100000, '2022-08-31 14:36:01', '2022-10-08 12:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `sapras`
--

CREATE TABLE `sapras` (
  `id_sapras` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `kategori_sapras` varchar(75) NOT NULL,
  `nama_barang` varchar(75) NOT NULL,
  `qty` int NOT NULL,
  `ket` varchar(70) NOT NULL,
  `harga_barang` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sapras`
--

INSERT INTO `sapras` (`id_sapras`, `id_rincian_pengeluaran`, `kategori_sapras`, `nama_barang`, `qty`, `ket`, `harga_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
('3de0f8f7-9613-42a7-8a93-fbf1c18eedca', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'OBAT - OBATAN', 'Panadol Hijau', 10, 'PCS', 100000, 1000000, '2022-09-01 23:37:18', '2022-09-01 23:37:18'),
('9baaea39-66da-4e4b-a02a-ef1857b9e3cb', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'OBAT - OBATAN', 'Mevinal 500mg', 10, 'PCS', 100000, 1000000, '2022-09-01 23:37:18', '2022-09-01 23:37:18'),
('c22dc151-bb2a-4e44-83c4-1ad0c51734fd', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'ATK', 'Pensil 2B Faber Castell', 10, 'PCS', 10000, 100000, '2022-09-01 23:37:18', '2022-09-01 23:37:18'),
('e58885a7-7617-46f9-a771-2eeb697eba66', '5a5e50fc-04a8-431b-9700-04231db33cb8', 'ATK', 'Pulpen Standard AE7', 10, 'PCS', 200000, 2000000, '2022-09-01 23:37:18', '2022-09-01 23:37:18');

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
  `nomor_va` varchar(100) NOT NULL,
  `status_delete` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `slug_siswa`, `jenis_kelamin`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `nomor_orang_tua`, `asal_kelompok`, `asal_wilayah`, `wilayah`, `nomor_va`, `status_delete`) VALUES
('304183d5-f207-40a6-8cdc-fcfc4aff50c4', '00088899912', 'Uchiha Bayu', 'uchiha-bayu', 'laki-laki', '2001-10-24', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', '', 0),
('66e49e69-ef34-4ef8-a454-719bd5e59188', '00088899914', 'Uchiha Sukirman', 'uchiha-sukirman', 'laki-laki', '2001-10-02', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', '', 0),
('d9021dc3-aa5b-4caf-be6f-a5eb96fc382d', '00088899913', 'Uchiha Tiara', 'uchiha-tiara', 'perempuan', '2001-10-01', 'Uchiha Saburo', 'Uchiha Ajeng', '088888090', 'Clan Uchiha', 'Konohagakure No Sato', 'dalam-kota', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` varchar(36) NOT NULL,
  `id_kelas_siswa` varchar(36) NOT NULL,
  `id_users` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `id_kelas_siswa`, `id_users`, `created_at`, `updated_at`) VALUES
('0da11a43-78f5-4644-8bd9-5482635cc344', 'f485dbe2-aae3-4c9e-b55a-d0f957e222a7', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2022-08-14 00:32:36', '2022-08-14 00:32:36'),
('c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', '8038690d-94bd-4eb1-8237-447aee3004c7', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2022-08-14 00:32:36', '2022-08-14 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bayar`
--

CREATE TABLE `spp_bayar` (
  `id_spp_bayar` varchar(36) NOT NULL,
  `id_spp_bayar_data` varchar(36) NOT NULL,
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bayar`
--

INSERT INTO `spp_bayar` (`id_spp_bayar`, `id_spp_bayar_data`, `id_spp_bulan_tahun`, `created_at`, `updated_at`) VALUES
('447954b8-ffd9-4354-931f-42364d7c5ade', '684ee4a8-71d2-402c-963f-bcb1f468725d', 'c94da010-7392-41f8-8ebc-569f31185a30', '2022-08-31 14:18:09', '2022-08-31 14:18:09'),
('45ba7aba-54cd-4579-baa3-a6b9e0206ca4', '898f316b-ca3f-48bf-b457-67290a762f21', 'de21cb98-6678-4c4b-9fd8-3a26953a7833', '2022-10-07 23:55:24', '2022-10-07 23:55:24'),
('8afa3a3e-2d3a-4d19-938f-d7e6edf56d0a', '69c3ba5e-0426-47c0-a1b2-5f6c6d782afa', '4a28b59d-ab74-4afb-9655-7dce5e489a9b', '2022-08-19 15:10:18', '2022-08-19 15:10:18'),
('8d122698-ae0a-4f1b-8d7f-12df74dc6f0c', '69c3ba5e-0426-47c0-a1b2-5f6c6d782afa', '92b0ab58-ba1c-45aa-a868-61f883006d43', '2022-08-19 15:10:18', '2022-08-19 15:10:18'),
('f5f4f151-0a1a-4964-af2f-c7257c1ec795', '69c3ba5e-0426-47c0-a1b2-5f6c6d782afa', '6e06b0fd-363c-4681-8931-83a31875d9b9', '2022-08-19 15:10:18', '2022-08-19 15:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bayar_data`
--

CREATE TABLE `spp_bayar_data` (
  `id_spp_bayar_data` varchar(36) NOT NULL,
  `id_spp` varchar(36) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total_biaya` int NOT NULL,
  `nominal_bayar` int NOT NULL,
  `kembalian` int NOT NULL,
  `keterangan_bayar_spp` varchar(100) NOT NULL,
  `id_users` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bayar_data`
--

INSERT INTO `spp_bayar_data` (`id_spp_bayar_data`, `id_spp`, `tanggal_bayar`, `total_biaya`, `nominal_bayar`, `kembalian`, `keterangan_bayar_spp`, `id_users`, `created_at`, `updated_at`) VALUES
('684ee4a8-71d2-402c-963f-bcb1f468725d', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', '2022-08-31', 100000, 100000, 0, 'Bayar Uang Makan Januari 2022', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2022-08-31 14:18:09', '2022-08-31 14:18:09'),
('69c3ba5e-0426-47c0-a1b2-5f6c6d782afa', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', '2022-08-19', 30000, 30000, 0, 'September 2021 - April 2022', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2022-08-19 15:10:18', '2022-08-19 15:10:18'),
('898f316b-ca3f-48bf-b457-67290a762f21', '0da11a43-78f5-4644-8bd9-5482635cc344', '2022-10-07', 1000000, 1200000, 200000, 'Bayar SPP Agustus 2021', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2022-10-07 23:55:24', '2022-10-07 23:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bayar_detail`
--

CREATE TABLE `spp_bayar_detail` (
  `id_spp_bayar_detail` varchar(36) NOT NULL,
  `id_spp_bayar` varchar(36) NOT NULL,
  `id_kolom_spp` varchar(36) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal_bayar` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bayar_detail`
--

INSERT INTO `spp_bayar_detail` (`id_spp_bayar_detail`, `id_spp_bayar`, `id_kolom_spp`, `tanggal_bayar`, `nominal_bayar`, `created_at`, `updated_at`) VALUES
('41cb1b6f-98c0-4928-b8f8-6a1ec34fa1a9', '45ba7aba-54cd-4579-baa3-a6b9e0206ca4', '1971752f-5e6c-459f-8a13-c51327bb88e7', '2022-10-07', 500000, '2022-10-07 23:55:24', '2022-10-07 23:55:24'),
('5ff8e370-229e-4ca7-bd06-ac50f2bdc259', 'f5f4f151-0a1a-4964-af2f-c7257c1ec795', '60f3492f-d8be-4f29-9014-478d314fe4ef', '2022-08-19', 10000, '2022-08-19 15:10:18', '2022-08-19 15:10:18'),
('655d7fa2-7d34-4041-9139-0a51b2a8810a', '8d122698-ae0a-4f1b-8d7f-12df74dc6f0c', 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', '2022-08-19', 10000, '2022-08-19 15:10:18', '2022-08-19 15:10:18'),
('8a7abf6e-ff53-462c-887c-89d95a9ee0d4', '45ba7aba-54cd-4579-baa3-a6b9e0206ca4', '60f3492f-d8be-4f29-9014-478d314fe4ef', '2022-10-07', 500000, '2022-10-07 23:55:24', '2022-10-07 23:55:24'),
('b3e80ec2-232e-41df-93be-8f34b0bb1f17', '447954b8-ffd9-4354-931f-42364d7c5ade', 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', '2022-08-31', 100000, '2022-08-31 14:18:09', '2022-08-31 14:18:09'),
('cdbaff02-c4ee-4478-9cc9-260ce9428bd7', '8afa3a3e-2d3a-4d19-938f-d7e6edf56d0a', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', '2022-08-19', 10000, '2022-08-19 15:10:18', '2022-08-19 15:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `spp_bulan_tahun`
--

CREATE TABLE `spp_bulan_tahun` (
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `id_spp` varchar(36) NOT NULL,
  `bulan_tahun` varchar(30) NOT NULL,
  `bulan` int NOT NULL,
  `tahun` year NOT NULL,
  `id_kantin` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bulan_tahun`
--

INSERT INTO `spp_bulan_tahun` (`id_spp_bulan_tahun`, `id_spp`, `bulan_tahun`, `bulan`, `tahun`, `id_kantin`, `created_at`, `updated_at`) VALUES
('325ec5a9-1f52-46f7-a96c-27a71fa5c5fe', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'Maret, 2022', 3, 2022, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-23 14:01:19', '2022-08-23 14:01:19'),
('4a28b59d-ab74-4afb-9655-7dce5e489a9b', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'Oktober, 2021', 10, 2021, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-14 00:32:36', '2022-08-14 00:32:36'),
('6e06b0fd-363c-4681-8931-83a31875d9b9', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'September, 2021', 9, 2021, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-14 00:32:36', '2022-08-14 00:32:36'),
('92b0ab58-ba1c-45aa-a868-61f883006d43', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'April, 2022', 4, 2022, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-18 16:49:21', '2022-08-18 16:49:21'),
('ae71628c-9ccf-46f0-a301-2db53dbec192', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'Desember, 2022', 12, 2022, '3630bc38-3357-453b-99c7-4470f7582b73', '2022-08-23 14:06:03', '2022-08-23 14:06:03'),
('c94da010-7392-41f8-8ebc-569f31185a30', 'c1f4e67c-bb94-4fa0-8d1d-360fac9ecfec', 'Januari, 2022', 1, 2022, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-31 14:16:20', '2022-08-31 14:16:20'),
('de21cb98-6678-4c4b-9fd8-3a26953a7833', '0da11a43-78f5-4644-8bd9-5482635cc344', 'Agustus, 2022', 8, 2022, '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', '2022-08-14 00:32:36', '2022-08-14 00:32:36');

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
  `status_bayar` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_detail`
--

INSERT INTO `spp_detail` (`id_spp_detail`, `id_spp_bulan_tahun`, `id_kolom_spp`, `nominal_spp`, `bayar_spp`, `sisa_bayar`, `status_bayar`, `created_at`, `updated_at`) VALUES
('0283bfae-fce2-434c-be4f-5393af8ff47d', '92b0ab58-ba1c-45aa-a868-61f883006d43', 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 10000, 10000, 0, 1, '2022-08-18 16:49:21', '2022-08-19 15:10:18'),
('31cf0d4e-3f26-426a-8770-aae6a105b321', '4a28b59d-ab74-4afb-9655-7dce5e489a9b', 'ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 10000, 10000, 0, 1, '2022-08-14 00:32:36', '2022-08-19 15:10:18'),
('52c4867f-8a29-4e47-bc38-568c51216802', 'c94da010-7392-41f8-8ebc-569f31185a30', 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 100000, 100000, 0, 1, '2022-08-31 14:16:20', '2022-08-31 14:18:09'),
('5de19193-721b-4d9d-a22c-807c3e0a9648', 'de21cb98-6678-4c4b-9fd8-3a26953a7833', '60f3492f-d8be-4f29-9014-478d314fe4ef', 600000, 490000, 110000, 0, '2022-08-14 00:32:36', '2022-10-07 23:55:24'),
('a249e123-6828-4974-a969-c2a6a1e7ce48', 'ae71628c-9ccf-46f0-a301-2db53dbec192', '60f3492f-d8be-4f29-9014-478d314fe4ef', 100000, 0, 100000, 0, '2022-08-23 14:06:03', '2022-08-23 14:06:03'),
('b24ec3ba-5866-468d-b836-2f6ab3ca55ba', 'de21cb98-6678-4c4b-9fd8-3a26953a7833', '1971752f-5e6c-459f-8a13-c51327bb88e7', 1000000, 480000, 520000, 0, '2022-08-14 00:32:36', '2022-10-07 23:55:24'),
('c06faa15-e129-4042-96ef-074e5d1f85f1', '6e06b0fd-363c-4681-8931-83a31875d9b9', '60f3492f-d8be-4f29-9014-478d314fe4ef', 20000, 10000, 10000, 0, '2022-08-14 00:32:36', '2022-08-19 15:10:18'),
('cdb25f0d-3d5e-49ff-b769-232ae32680a0', '325ec5a9-1f52-46f7-a96c-27a71fa5c5fe', '60f3492f-d8be-4f29-9014-478d314fe4ef', 1000000, 0, 1000000, 0, '2022-08-23 14:01:19', '2022-08-23 14:01:19'),
('d59908d6-d51e-4a39-aac7-2043c28cc9b6', '6e06b0fd-363c-4681-8931-83a31875d9b9', '1971752f-5e6c-459f-8a13-c51327bb88e7', 50000, 0, 50000, 0, '2022-08-14 00:32:36', '2022-08-19 15:10:18'),
('fd1ee16e-7ea7-4435-816a-323a9eeff722', '325ec5a9-1f52-46f7-a96c-27a71fa5c5fe', '1971752f-5e6c-459f-8a13-c51327bb88e7', 1000000, 0, 1000000, 0, '2022-08-23 14:01:19', '2022-08-23 14:01:19');

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
('7bbb36db-240a-48ee-af92-4669326778ee', '2022/2023', 0);

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
('07402a86-37a6-456d-a867-54087ec57034', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$SQCYh/wL73AEX7GEM3AUOuQP/nTiVDZnvebhs0gdeK8tgVg2Sb2cu', NULL, 0, 1, 0, NULL),
('0c24e046-950a-4832-a5af-01695715a79c', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$i6Pwtlv.PutfMHsw.7WsfeVyU3Pr8CsB5W6ZG/nd5Klzhn4ZJ70Vq', NULL, 0, 1, 0, NULL),
('12678de9-e470-4240-8999-39c3d6bb0461', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$a5lasKYHKhv7xCF3MnIHH.IWMJtAr.afdB.ZWq.rkcYRlxGBSJGUy', NULL, 0, 1, 0, NULL),
('1befa194-0db4-40fa-ad43-bbf7460ed570', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$ECSvgq125ypeQc2pYHz6SOvIHhkwsJXl3ZOE4wAm/Rws4Ob6sDNWm', NULL, 0, 1, 0, NULL),
('1c0e8c57-a967-442b-81fb-8bbb46c9008d', 'Hashirama Senju', 'hashirama', '$2y$10$aK4zvWko6TuJVgAp9LxDVOjyVDRuy06xOwGmEJ26YS7fyIDyRtCDq', 'OXSuTaxxtJRQPRYstNSXZiV2d51xBVUtVGnOWsgq6Qqh79NjIYhPx7q6XJkr', 2, 1, 0, NULL),
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
('b9c202d5-4d20-413e-91db-6991fa22b88b', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$fIK4fRoUhgh61htI9gFf9u0tZBt41Q84ZrJUql6qC7v/HNOO//PnO', NULL, 0, 1, 0, NULL),
('cc15fb6f-5384-4a18-a337-4d5a86550a06', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$ZtkMw5FwJq.sBhhAMyosQOe6hT7DvWQm6v6ZDGenxnNr9uU9c735a', NULL, 0, 1, 0, NULL),
('cdc9076d-b515-4de5-8bb5-bb18cb7f7c1b', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$bQAWZUOo.201E1r3AmNXDeqzcuXGIQH2POYfkcBOTIjLMD4mZd8cu', NULL, 0, 1, 0, NULL),
('d0c70a75-07df-44fb-9afe-f6449838ef79', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$IQheafLh31iarHDIfHm6MuGZZGglxRc/oyQBNSNvTXCrN9tkAvBgO', NULL, 0, 1, 0, NULL),
('d4971513-6303-4248-bd27-dbb1a999b51e', 'Administrator', 'admin', '$2y$10$rq2tjnEOyOHfHI/zW/.H6.HKObWTvbmcFWQKC2CCwjOAgb3.IKBey', 'YIQsBYWzWodSQ8WVYcFk6bemYXBZE5KmnZKyBe4jOGNJDTNBfg1OPVpzRDIZ', 3, 1, 0, '2022-10-01 15:59:52'),
('d9dd0013-0d43-4cf2-a994-79d21bd71aa2', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$qzGQSOrVfnoW/8XnuV.tFeF5Yvifma3d6XL5FjfbKRNfEDtCh62HS', NULL, 0, 1, 0, NULL),
('e36f22fd-c164-4b05-a610-b9b12efa9dff', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$2ZmRQnTyM3EVg/WCPHyjhuu0DVNOQL.cQ5.9Vyjk7F0ax18oQ3VDy', NULL, 0, 1, 0, NULL),
('e44db3a7-2a2d-4a0c-bc84-cdb804be8513', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$XXHO2SzkWv1WVOUddXZ9ouVPKAxxDZsS.QtIoixm/rc2Erfa79jlW', NULL, 0, 1, 0, NULL),
('e7670362-85b6-41b9-892f-22b016dba1d6', 'Ortu Test', '0821231223', '$2y$10$qSRmkUmCdZ1.a0SMgFy.sO9BQs/CL9Vp/UXXmUX79DN43U9ljzYXu', 'ziLWGwqbzYzpmlbj5Z8FwHctzQMvRPELn1aDMbIGM5TyASvZoQlgrWniuPCg', 0, 1, 0, NULL),
('eafb556b-1a36-4183-9691-6eea9a2da269', 'Kepsek Bapak', 'kepsek', '$2y$10$8e3AnVchcaBMHe./go2aveGCIMqZAkOhI9VGYzQkzey.A8RBZ1DTO', '2aH8Yknx6FBex2HAQ7BQFW8Kf6FWt96DW4aoQ2QP1ZXbXBArMQnXSAV9Hsgy', 1, 1, 0, '2022-02-27 00:10:38'),
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
-- Indexes for table `rincian_pembelanjaan`
--
ALTER TABLE `rincian_pembelanjaan`
  ADD PRIMARY KEY (`id_rincian_pembelanjaan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`);

--
-- Indexes for table `rincian_penerimaan`
--
ALTER TABLE `rincian_penerimaan`
  ADD PRIMARY KEY (`id_rincian_penerimaan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`);

--
-- Indexes for table `rincian_penerimaan_detail`
--
ALTER TABLE `rincian_penerimaan_detail`
  ADD PRIMARY KEY (`id_rincian_penerimaan_detail`),
  ADD KEY `id_rincian_penerimaan` (`id_rincian_penerimaan`),
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`);

--
-- Indexes for table `rincian_penerimaan_rekap`
--
ALTER TABLE `rincian_penerimaan_rekap`
  ADD PRIMARY KEY (`id_rincian_penerimaan_rekap`),
  ADD KEY `id_rincian_penerimaan` (`id_rincian_penerimaan`);

--
-- Indexes for table `rincian_penerimaan_tahun_ajaran`
--
ALTER TABLE `rincian_penerimaan_tahun_ajaran`
  ADD PRIMARY KEY (`id_rincian_penerimaan_tahun_ajaran`),
  ADD KEY `id_rincian_penerimaan` (`id_rincian_penerimaan`);

--
-- Indexes for table `rincian_pengajuan`
--
ALTER TABLE `rincian_pengajuan`
  ADD PRIMARY KEY (`id_rincian_pengajuan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`);

--
-- Indexes for table `rincian_pengeluaran`
--
ALTER TABLE `rincian_pengeluaran`
  ADD PRIMARY KEY (`id_rincian_pengeluaran`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `rincian_pengeluaran_detail`
--
ALTER TABLE `rincian_pengeluaran_detail`
  ADD PRIMARY KEY (`id_rincian_pengeluaran_detail`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_kolom_spp` (`id_kolom_spp`);

--
-- Indexes for table `sapras`
--
ALTER TABLE `sapras`
  ADD PRIMARY KEY (`id_sapras`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`);

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
  ADD KEY `id_kelas_siswa` (`id_kelas_siswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `spp_bayar`
--
ALTER TABLE `spp_bayar`
  ADD PRIMARY KEY (`id_spp_bayar`),
  ADD KEY `id_spp_bulan_tahun` (`id_spp_bulan_tahun`),
  ADD KEY `id_spp_bayar_data` (`id_spp_bayar_data`);

--
-- Indexes for table `spp_bayar_data`
--
ALTER TABLE `spp_bayar_data`
  ADD PRIMARY KEY (`id_spp_bayar_data`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp_bayar_detail`
--
ALTER TABLE `spp_bayar_detail`
  ADD PRIMARY KEY (`id_spp_bayar_detail`),
  ADD KEY `id_spp_bayar` (`id_spp_bayar`),
  ADD KEY `id_kolom_spp` (`id_kolom_spp`);

--
-- Indexes for table `spp_bulan_tahun`
--
ALTER TABLE `spp_bulan_tahun`
  ADD PRIMARY KEY (`id_spp_bulan_tahun`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `id_kantin` (`id_kantin`);

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
-- Constraints for table `rincian_pembelanjaan`
--
ALTER TABLE `rincian_pembelanjaan`
  ADD CONSTRAINT `rincian_pembelanjaan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pembelanjaan_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_detail`) REFERENCES `rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan`
--
ALTER TABLE `rincian_penerimaan`
  ADD CONSTRAINT `rincian_penerimaan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_detail`
--
ALTER TABLE `rincian_penerimaan_detail`
  ADD CONSTRAINT `rincian_penerimaan_detail_ibfk_1` FOREIGN KEY (`id_rincian_penerimaan`) REFERENCES `rincian_penerimaan` (`id_rincian_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_penerimaan_detail_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_detail`) REFERENCES `rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_rekap`
--
ALTER TABLE `rincian_penerimaan_rekap`
  ADD CONSTRAINT `rincian_penerimaan_rekap_ibfk_1` FOREIGN KEY (`id_rincian_penerimaan`) REFERENCES `rincian_penerimaan` (`id_rincian_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_tahun_ajaran`
--
ALTER TABLE `rincian_penerimaan_tahun_ajaran`
  ADD CONSTRAINT `rincian_penerimaan_tahun_ajaran_ibfk_1` FOREIGN KEY (`id_rincian_penerimaan`) REFERENCES `rincian_penerimaan` (`id_rincian_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengajuan`
--
ALTER TABLE `rincian_pengajuan`
  ADD CONSTRAINT `rincian_pengajuan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pengajuan_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_detail`) REFERENCES `rincian_pengeluaran_detail` (`id_rincian_pengeluaran_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengeluaran`
--
ALTER TABLE `rincian_pengeluaran`
  ADD CONSTRAINT `rincian_pengeluaran_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengeluaran_detail`
--
ALTER TABLE `rincian_pengeluaran_detail`
  ADD CONSTRAINT `rincian_pengeluaran_detail_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pengeluaran_detail_ibfk_2` FOREIGN KEY (`id_kolom_spp`) REFERENCES `kolom_spp` (`id_kolom_spp`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `sapras`
--
ALTER TABLE `sapras`
  ADD CONSTRAINT `sapras_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `spp_ibfk_1` FOREIGN KEY (`id_kelas_siswa`) REFERENCES `kelas_siswa` (`id_kelas_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `spp_bayar`
--
ALTER TABLE `spp_bayar`
  ADD CONSTRAINT `spp_bayar_ibfk_1` FOREIGN KEY (`id_spp_bulan_tahun`) REFERENCES `spp_bulan_tahun` (`id_spp_bulan_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_bayar_ibfk_3` FOREIGN KEY (`id_spp_bayar_data`) REFERENCES `spp_bayar_data` (`id_spp_bayar_data`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp_bayar_data`
--
ALTER TABLE `spp_bayar_data`
  ADD CONSTRAINT `spp_bayar_data_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_bayar_data_ibfk_2` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spp_bayar_detail`
--
ALTER TABLE `spp_bayar_detail`
  ADD CONSTRAINT `spp_bayar_detail_ibfk_1` FOREIGN KEY (`id_spp_bayar`) REFERENCES `spp_bayar` (`id_spp_bayar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_bayar_detail_ibfk_2` FOREIGN KEY (`id_kolom_spp`) REFERENCES `kolom_spp` (`id_kolom_spp`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `spp_bulan_tahun`
--
ALTER TABLE `spp_bulan_tahun`
  ADD CONSTRAINT `spp_bulan_tahun_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_bulan_tahun_ibfk_2` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
