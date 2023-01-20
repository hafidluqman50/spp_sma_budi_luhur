-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 20, 2023 at 06:18 PM
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
('062ce5bf-9966-4b38-9998-a204d4ac6d6e', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2022/2023</b> Bulan Tahun : <b>Januari, 2017</b>', '2023-01-19 19:01:36', '2023-01-19 19:01:36', 0),
('072cf91f-35f0-4081-b112-f0069a056869', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Agustus, 2021</b>, <b>Pembayaran Akademik</b> Sebesar <b>Rp. 500.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 500.000,00</b>', '2022-01-08 01:20:25', '2022-08-19 15:13:23', 1),
('0754afc1-76d4-4a82-b002-1786f3168870', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2022/2023</b>', '2023-01-20 23:28:31', '2023-01-20 23:28:31', 0),
('0fa8fb64-82be-4c00-a573-bb9398ab382b', 'Administrator telah import data SPP', '2022-02-26 15:30:38', '2022-08-19 15:13:23', 1),
('1234a49a-a077-464a-ad68-8eb5071b574d', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2022</b>', '2022-08-23 14:02:52', '2022-08-23 14:02:52', 0),
('14781bf8-e42f-4a7e-9075-783c85443a38', 'Administrator telah import data SPP', '2022-08-14 00:32:36', '2022-08-19 15:13:23', 1),
('1490b203-9701-4d54-a370-aef46e782f83', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2022/2023</b>', '2023-01-20 23:33:43', '2023-01-20 23:33:43', 0),
('1c62a79c-37b5-4b42-b8c7-47448ecf5998', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2022/2023</b>', '2023-01-20 23:33:00', '2023-01-20 23:33:00', 0),
('2071d3f5-ea5e-4281-89bb-59b6ec904cec', 'Administrator telah import data SPP', '2022-02-26 15:52:41', '2022-08-19 15:13:23', 1),
('20a77d4e-9ee8-4d82-b21c-08a56a9d6717', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Februari, 2022</b>, <b>Uang Makan</b> Sebesar <b>Rp. 0,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-11-05 20:38:48', '2022-11-05 20:38:48', 0),
('22a1a56f-9a16-4c6f-8804-8a54bc46a502', 'Administrator telah membayar SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Januari, 2023</b>, <b>Uang Makan</b> Sebesar <b>Rp. 200.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 200.000,00</b>', '2023-01-12 18:29:41', '2023-01-12 18:29:41', 0),
('25700fd0-3655-452d-83ff-f055d5be785a', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Januari, 2022</b>, <b>Uang Makan</b> Sebesar <b>Rp. 0,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-08-31 14:18:09', '2022-08-31 14:18:09', 0),
('26edc2fc-b417-417b-925d-7f83974b7f02', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:26:38', '2022-08-19 15:13:23', 1),
('271d5f7d-3277-4838-a4b0-dd754ebfabb9', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:25:51', '2022-08-19 15:13:23', 1),
('27a4ea2c-18c7-4b0f-a3f8-679220d9ebde', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:26:37', '2022-08-19 15:13:23', 1),
('27b1f181-369a-4854-92a9-c7308e3436f3', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>September, 2021</b>, <b>Pembayaran Gedung</b> Sebesar <b>Rp. 20.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 520.000,00</b>', '2023-01-19 18:58:16', '2023-01-19 18:58:16', 0),
('27c3c600-45d3-43ce-b6ad-e7ebc7efe76c', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:53:33', '2022-08-19 15:13:23', 1),
('292f0dbd-17b5-478c-b92a-37e6c84c33c4', 'Administrator telah menghapus Pembayaran : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 10.000,00</b>, Nominal Bayar : <b>Rp. 10.000,00</b>, dan Kembalian : <b>Rp. 0,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-05 01:51:46', '2022-08-19 15:13:23', 1),
('2ba45d4f-ec15-4d3d-b10b-fa08d78f548d', 'Administrator telah import data SPP', '2022-08-14 00:29:37', '2022-08-19 15:13:23', 1),
('2c488a9b-7f5b-4b47-bd34-67c659e324dd', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:51:57', '2022-08-19 15:13:23', 1),
('3897570a-6945-42d5-bedd-a2f18e6da8b4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2022/2023</b> Bulan Tahun : <b>Februari, 2022</b>', '2022-11-05 20:29:17', '2022-11-05 20:29:17', 0),
('3ad3bdab-027b-405e-aeb0-2f463ba9a2e5', 'Administrator telah membayar SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Januari, 2023</b>, <b>Uang Makan</b> Sebesar <b>Rp. 100.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2023-01-12 18:27:04', '2023-01-12 18:27:04', 0),
('4586e463-836f-44fe-a85c-24e968b8682b', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:30:24', '2022-08-19 15:13:23', 1),
('4ec50d31-d572-4832-952e-3bae49d005f4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-13 01:39:45', '2022-08-19 15:13:23', 1),
('56104592-7644-43f3-ba87-680f5109bab8', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Agustus, 2021</b>, <b></b> Sebesar Rp. 500.000,00 dan dengan total nominal bayar sebesar Rp. 1.000.000,00', '2022-01-04 22:42:47', '2022-08-19 15:13:23', 1),
('6183ea0b-e821-43ec-b5e1-548c09ea1f76', 'Administrator telah menghapus data SPP <b>Uchiha Sukirman XII RPL 1 2022/2023</b> Bulan Tahun : <b>Januari, 2023</b>', '2023-01-16 22:24:19', '2023-01-16 22:24:19', 0),
('630f435a-9957-4297-aef8-c84c18d467b6', 'Administrator telah menghapus SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Januari, 2023</b>, <b></b>', '2023-01-16 22:18:54', '2023-01-16 22:18:54', 0),
('6424c37a-69b3-4f3f-8d98-ab93b7c9ca72', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:52:00', '2022-08-19 15:13:23', 1),
('6800b2f6-1892-46eb-94fc-6a98beb4ce90', 'Administrator telah menghapus SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Oktober, 2021</b>, <b></b>', '2022-02-26 15:59:17', '2022-08-19 15:13:23', 1),
('6dc01db4-2fb4-459b-8256-bde8197ee23e', 'Administrator telah menghapus Pembayaran : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 1.000.000,00</b>, Nominal Bayar : <b>Rp. 2.000.000,00</b>, dan Kembalian : <b>Rp. 1.000.000,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-04 23:04:58', '2022-08-19 15:13:23', 1),
('6dcb9c2f-98ed-4e35-94c7-bd7bc1633022', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:53:32', '2022-08-19 15:13:23', 1),
('754ab493-cf8e-42eb-be50-a8d468fdff18', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-08-14 00:32:30', '2022-08-19 15:13:23', 1),
('75d679cb-7a41-463a-8488-224089c0fdf9', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:30:25', '2022-08-19 15:13:23', 1),
('7716d833-d5f6-4382-a535-58f8f6c8e6e1', 'Administrator telah membayar SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Januari, 2023</b>, <b>Pembayaran Gedung</b> Sebesar <b>Rp. 100.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2023-01-16 22:18:49', '2023-01-16 22:18:49', 0),
('7f8aa87d-438e-429a-8900-e6202b6da805', 'Administrator telah import data SPP', '2022-01-05 02:04:35', '2022-08-19 15:13:23', 1),
('8110f2c2-7aa7-47db-b8fd-1b7956bb4f71', 'Administrator telah menghapus SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Maret, 2022</b>, <b></b>', '2023-01-16 22:16:00', '2023-01-16 22:16:00', 0),
('85cd50bf-4f49-42f3-92d1-4302c7d1dcb0', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-14 00:32:28', '2022-08-19 15:13:23', 1),
('8a800b4f-a53e-4af8-825a-e1bac1eb55e7', 'Administrator telah menghapus SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Maret, 2022</b>, <b></b>', '2023-01-16 22:14:55', '2023-01-16 22:14:55', 0),
('8e9adde1-c975-4b29-aa4e-4032511d4596', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2022/2023</b>', '2023-01-20 23:28:33', '2023-01-20 23:28:33', 0),
('92bdf60c-7bf8-4f76-bf83-951e01746b9e', 'Administrator telah menghapus data SPP <b>Uchiha Sukirman XII RPL 1 2022/2023</b>', '2023-01-16 22:25:17', '2023-01-16 22:25:17', 0),
('959cd4ed-ccd0-4a28-8289-83c41dd966f0', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>Januari, 2022</b>, <b>Kantin Pak Mamat</b> Sebesar <b>Rp. 0,00</b> dan dengan total nominal bayar sebesar <b>Rp. 2.000.000,00</b>', '2022-08-10 00:53:02', '2022-08-19 15:13:23', 1),
('9a1cc8af-d5a8-4d5e-a39c-3ad0877c11b4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:57:46', '2022-08-19 15:13:23', 1),
('ae75016a-fa10-49dd-821b-d94a6aff088d', 'Administrator telah import data SPP', '2022-02-26 15:57:43', '2022-08-19 15:13:23', 1),
('b673824f-1533-42bf-8706-50823f13bad8', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-08-11 13:43:19', '2022-08-19 15:13:23', 1),
('b6ad5c2f-9a54-433c-a59e-e6aab75de685', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:59:06', '2022-08-19 15:13:23', 1),
('bf4def14-b2a1-4c84-85ab-bd3bb14964d1', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:25:52', '2022-08-19 15:13:23', 1),
('c1baaa0f-0bd7-4248-a542-6b3ea32a4683', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>September, 2021</b>, <b>Pembayaran Fasilitas</b> Sebesar <b>Rp. 50.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 520.000,00</b>', '2023-01-19 18:58:16', '2023-01-19 18:58:16', 0),
('c2186f49-016d-443a-a87a-0555df8fa097', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-01-05 02:02:42', '2022-08-19 15:13:23', 1),
('c2e6e41d-904d-4392-977b-110066105a71', 'Administrator telah menghapus Pembayaran : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Dengan jumlah Total Biaya : <b>Rp. 1.000.000,00</b>, Nominal Bayar : <b>Rp. 2.000.000,00</b>, dan Kembalian : <b>Rp. 1.000.000,00</b> dengan Keterangan : <b></b> yang telah diinput oleh <b>Administrator</b>', '2022-01-04 23:07:34', '2022-08-19 15:13:23', 1),
('c4d1a834-b746-4ff5-a099-72e327ab07a5', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Februari, 2022</b>, <b>Uang Makan</b> Sebesar <b>Rp. 100.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-11-05 20:51:46', '2022-11-05 20:51:46', 0),
('c51a9adf-a3b5-42d7-8568-6cb576e9fa59', 'Administrator telah import data SPP', '2022-02-26 15:26:42', '2022-08-19 15:13:23', 1),
('c63f905b-30af-422f-ae2d-5d2b8e6eafde', 'Administrator telah membayar SPP : <b> Uchiha Bayu Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Februari, 2022</b>, <b>Uang Makan</b> Sebesar <b>Rp. 100.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-11-05 20:51:11', '2022-11-05 20:51:11', 0),
('c8886984-6224-4235-89b4-bff9f6f8ac24', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:57:33', '2022-08-19 15:13:23', 1),
('cfd82c14-7f4a-4ef7-a513-98a25137e7d3', 'Administrator telah menghapus SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Januari, 2023</b>, <b></b>', '2023-01-16 22:18:25', '2023-01-16 22:18:25', 0),
('d304bfe8-5bcb-4c7a-8a85-03cb670d8f51', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>September, 2021</b>, <b>Pembayaran Gedung</b> Sebesar <b>Rp. 10.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 10.000,00</b>', '2022-08-10 01:10:46', '2022-08-19 15:13:23', 1),
('d6f98e1b-2fd9-4f51-815a-9ecc6d821952', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b>', '2022-02-26 15:57:37', '2022-08-19 15:13:23', 1),
('d9c4356d-62f8-472e-ae36-b19ce62c443e', 'Administrator telah menghapus data SPP <b>Uchiha Tiara XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-08-31 14:13:17', '2022-08-31 14:13:17', 0),
('da5b79da-a09a-49ce-ad59-452fdc733f93', 'Administrator telah membayar SPP : <b> Uchiha Tiara Kelas XII RPL 1 Tahun Ajaran 2021/2022</b>. Bulan, Tahun : <b>September, 2021</b>, <b></b> Sebesar <b>Rp. 10.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 10.000,00</b>', '2022-01-04 23:08:12', '2022-08-19 15:13:23', 1),
('dc8eef49-3ed2-4faf-b48f-76388f33edd4', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b> Bulan Tahun : <b>Agustus, 2021</b>', '2022-02-26 15:57:20', '2022-08-19 15:13:23', 1),
('e11d35bb-7d4e-43e1-99f8-843cc8c73055', 'Administrator telah import data SPP', '2022-02-26 15:59:02', '2022-08-19 15:13:23', 1),
('e18e320b-07e4-4186-bd7a-92f23b919342', 'Administrator telah menghapus data SPP <b>Uchiha Bayu XII RPL 1 2021/2022</b>', '2022-02-26 15:58:56', '2022-08-19 15:13:23', 1),
('e42ccb04-a1f5-49bb-a972-2c14f7bde4d9', 'Administrator telah membayar SPP : <b> Uchiha Sukirman Kelas XII RPL 1 Tahun Ajaran 2022/2023</b>. Bulan, Tahun : <b>Juli, 2022</b>, <b>tab. tes</b> Sebesar <b>Rp. 100.000,00</b> dan dengan total nominal bayar sebesar <b>Rp. 100.000,00</b>', '2022-12-09 00:30:38', '2022-12-09 00:30:38', 0),
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
('6f9cfc36-8c14-4a51-ab89-abb4373fd90d', 'Kantin Pak Mamat', 'kantin-pak-mamat', 'Disamping Rumah Pak Mamat', 100000, 0),
('841ac61a-ea64-4dfd-8a31-9b8b300a8f70', 'Kantin Pak Agus', 'kantin-pak-agus', '-', 100000, 0);

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
('2825c71e-39e7-4a8f-b4bf-ee40218bc521', 'SPP', 'spp', NULL, 0),
('46ee0905-2d06-48d7-bb43-15c07c8044c9', 'tab. tes', 'tab-tes', NULL, 0),
('60f3492f-d8be-4f29-9014-478d314fe4ef', 'Pembayaran Gedung', 'pembayaran-gedung', NULL, 0),
('ca6d1c9c-a668-4b92-9934-60402b4a1668', 'Test', '', '-', 1),
('ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 'Uang Makan', 'uang-makan', NULL, 0),
('ef5d0504-3830-4fdc-ba8e-a9dc91aac6f5', 'Pembayaran Fasilitas', 'pembayaran-fasilitas', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_kantin`
--

CREATE TABLE `pemasukan_kantin` (
  `id_pemasukan_kantin` varchar(36) NOT NULL,
  `id_spp_bulan_tahun` varchar(36) NOT NULL,
  `id_kantin` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nominal_harus_bayar` int NOT NULL,
  `nominal_pemasukan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemasukan_kantin`
--

INSERT INTO `pemasukan_kantin` (`id_pemasukan_kantin`, `id_spp_bulan_tahun`, `id_kantin`, `nominal_harus_bayar`, `nominal_pemasukan`, `created_at`, `updated_at`) VALUES
('1d88f7ee-2bd1-4faf-a296-4fecfd233f4e', '61d268f9-ea75-43fd-9f98-c82a17ee5c47', '3630bc38-3357-453b-99c7-4470f7582b73', 100000, 100000, '2023-01-20 23:34:29', '2023-01-21 02:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `profile_instansi`
--

CREATE TABLE `profile_instansi` (
  `id_profile_instansi` varchar(36) NOT NULL,
  `nama_kepsek` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_pengurus_yayasan` varchar(100) NOT NULL,
  `nama_pembina_yayasan` varchar(100) NOT NULL,
  `nama_bendahara` varchar(100) NOT NULL,
  `nama_bendahara_yayasan` varchar(100) NOT NULL,
  `nama_wali_pembina` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile_instansi`
--

INSERT INTO `profile_instansi` (`id_profile_instansi`, `nama_kepsek`, `nama_pengurus_yayasan`, `nama_pembina_yayasan`, `nama_bendahara`, `nama_bendahara_yayasan`, `nama_wali_pembina`) VALUES
('33fcde4a-05fd-4a51-8a31-2771076cae40', 'Edi Purwanto, S.Pd', 'Agus Bukhori', 'Sudarisman', 'Nuri Dina Sari', 'Hartanto', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembelanjaan`
--

CREATE TABLE `rincian_pembelanjaan` (
  `id_rincian_pembelanjaan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `kategori_rincian_pembelanjaan` varchar(75) NOT NULL,
  `id_rincian_pengeluaran_sekolah` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_rincian_pengeluaran_uang_makan` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `jenis_rincian_pembelanjaan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keterangan_pembelanjaan` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pembelanjaan`
--

INSERT INTO `rincian_pembelanjaan` (`id_rincian_pembelanjaan`, `id_rincian_pengeluaran`, `kategori_rincian_pembelanjaan`, `id_rincian_pengeluaran_sekolah`, `id_rincian_pengeluaran_uang_makan`, `jenis_rincian_pembelanjaan`, `keterangan_pembelanjaan`, `created_at`, `updated_at`) VALUES
('315e97cb-b422-4e3e-bc40-566482f83284', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Setor Uang Makan', NULL, '062f720d-679e-4ec3-90f3-32017c5ea23a', 'uang-makan', 'Belom Disetor', '2022-11-15 22:26:01', '2022-12-16 00:43:15'),
('394e34bf-46ec-477d-ab6c-a5a779e0b040', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Belanja Pegawai', 'b8c106af-3bdc-49c9-ab11-1938e12253de', NULL, 'operasional', 'Sudah Setor', '2022-11-25 23:17:11', '2023-01-12 18:41:17'),
('5d7ee953-ab6d-459c-bf81-16eab47ee4a1', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Fasilitas Sekolah', 'e90ea836-7707-4fcf-99b7-2e3150a62038', NULL, 'operasional', 'Sudah Setor', '2022-11-25 23:17:11', '2023-01-12 18:41:17'),
('c0f3e172-ee53-43a0-ab06-b706ab79b48d', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Setor Uang Makan', NULL, 'ff129433-3702-484c-b53d-b58391bfbc29', 'uang-makan', 'Belum Disetor', '2022-11-15 22:26:01', '2022-12-16 00:43:15'),
('e01ac403-adba-4692-86b9-3b8f46d69868', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Belanja Pegawai', '9a95611f-efa1-46e4-a609-a1154ce007c9', NULL, 'operasional', 'Sudah Setor', '2022-11-25 23:17:11', '2023-01-12 18:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembelanjaan_tahun_ajaran`
--

CREATE TABLE `rincian_pembelanjaan_tahun_ajaran` (
  `id_rincian_pembelanjaan_tahun_ajaran` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rincian_pengeluaran` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bulan` int NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `pemasukan` int NOT NULL,
  `realisasi_pengeluaran` int NOT NULL,
  `sisa_akhir_bulan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pembelanjaan_tahun_ajaran`
--

INSERT INTO `rincian_pembelanjaan_tahun_ajaran` (`id_rincian_pembelanjaan_tahun_ajaran`, `id_rincian_pengeluaran`, `bulan`, `tahun`, `pemasukan`, `realisasi_pengeluaran`, `sisa_akhir_bulan`, `created_at`, `updated_at`) VALUES
('08d3990b-77ed-47fa-a051-b680b48c6984', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 12, '2022', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('0d165246-e0c9-4a63-9406-40adc9477d11', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 4, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('0e5342ec-23d8-44d4-9062-7bf609d42882', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 3, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('4804305c-a7d8-45f5-bf3e-f11288b979fe', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 8, '2022', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:15'),
('5d3b05b9-4d5a-4c76-a146-4221d4d4fcad', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 11, '2022', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('6943ac65-6a73-4337-adc2-00403a7ad43e', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 6, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('6e442cf6-7788-4382-8c35-74c13c868cb1', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 7, '2022', 100000, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:15'),
('705e2327-9ef3-4305-9fdd-6d2452264456', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 5, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('81fa38a4-ead9-48af-b877-355ac720a755', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 1, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16'),
('8935f09d-529a-4d37-9a51-aa46081613de', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 10, '2022', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:15'),
('a54d055b-9c89-4a46-bbe5-388f4fe68eee', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 9, '2022', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:15'),
('cc8fd37d-ac9d-4e46-b046-dc4478aa349c', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 2, '2023', 0, 0, 0, '2022-12-16 00:42:12', '2022-12-16 00:43:16');

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
('c2b591de-7ac1-46d0-99d9-58c563dfa94c', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-12-18 22:58:14', '2022-12-18 22:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_detail`
--

CREATE TABLE `rincian_penerimaan_detail` (
  `id_rincian_penerimaan_detail` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rincian_pengeluaran_sekolah` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `perincian` varchar(100) DEFAULT NULL,
  `rencana` int DEFAULT NULL,
  `penerimaan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_penerimaan_detail`
--

INSERT INTO `rincian_penerimaan_detail` (`id_rincian_penerimaan_detail`, `id_rincian_pengeluaran`, `id_rincian_pengeluaran_sekolah`, `perincian`, `rencana`, `penerimaan`, `created_at`, `updated_at`) VALUES
('0d91dc07-2a48-46d5-af8c-8f2f3c081bd2', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '9a95611f-efa1-46e4-a609-a1154ce007c9', 'Sumbangan Pembiayaan Pendidikan (SPP)', 10000, 0, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('62b22a5d-0126-4138-a408-87d8816e2a92', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'e90ea836-7707-4fcf-99b7-2e3150a62038', 'Penerimaan Gedung', 100000, 10000, '2022-12-19 15:32:13', '2022-12-19 15:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_rekap`
--

CREATE TABLE `rincian_penerimaan_rekap` (
  `id_rincian_penerimaan_rekap` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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

INSERT INTO `rincian_penerimaan_rekap` (`id_rincian_penerimaan_rekap`, `id_rincian_pengeluaran`, `tanggal_bon_pengajuan`, `nominal_bon_pengajuan`, `tanggal_realisasi_pengeluaran`, `nominal_realisasi_pengeluaran`, `sisa_realisasi_pengeluaran`, `tanggal_penerimaan_bulan_ini`, `sisa_penerimaan_bulan_ini`, `created_at`, `updated_at`) VALUES
('ea735d49-e051-49c2-901a-3c4593878e19', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-12-18', 1000000000, '2022-12-19', 75849500, 924150500, '2022-12-20', 100000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_penerimaan_tahun_ajaran`
--

CREATE TABLE `rincian_penerimaan_tahun_ajaran` (
  `id_rincian_penerimaan_tahun_ajaran` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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

INSERT INTO `rincian_penerimaan_tahun_ajaran` (`id_rincian_penerimaan_tahun_ajaran`, `id_rincian_pengeluaran`, `bulan`, `tahun`, `pemasukan`, `realisasi_pengeluaran`, `sisa_akhir_bulan`, `created_at`, `updated_at`) VALUES
('034e57f3-ff4f-4125-a77e-7ea3258b23d2', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 5, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('0b0fd93f-3f94-4a5f-bd4e-aa9d9783adc4', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 7, '2022', 1000000, 2000000, 3000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('1311174d-0ca9-4a0c-9c24-5f49ecfd5393', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 10, '2022', 5000000, 5000000, 5000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('2ef0dabe-a87c-4a68-bf1d-5fccaae7f77f', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 3, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('6df1823d-e185-49e2-915a-a569c4bfd775', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 4, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('80cc3141-9eea-475b-8cc1-887f1a142d73', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 12, '2022', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('9bd7fdbe-b26c-4829-8b13-ea6f5244b983', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 2, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('a1961906-ca4c-4529-8a30-bdb458240e5c', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 1, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('a873e1b8-cb8c-4517-ad92-a2514f31c015', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 8, '2022', 3000000, 3000000, 3000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('c35e19bd-6ccc-4a99-b26d-5a59c53c30ea', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 11, '2022', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('d6aa3d05-e9eb-46eb-8f92-92dd900caf59', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 6, '2023', 6000000, 6000000, 6000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13'),
('d81b03fd-adce-48a4-8681-e1acd957397e', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 9, '2022', 4000000, 4000000, 4000000, '2022-12-18 23:01:21', '2022-12-19 15:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengajuan`
--

CREATE TABLE `rincian_pengajuan` (
  `id_rincian_pengajuan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `kategori_rincian_pengajuan` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rincian_pengeluaran_sekolah` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `keterangan_pengajuan` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengajuan`
--

INSERT INTO `rincian_pengajuan` (`id_rincian_pengajuan`, `id_rincian_pengeluaran`, `kategori_rincian_pengajuan`, `id_rincian_pengeluaran_sekolah`, `keterangan_pengajuan`, `created_at`, `updated_at`) VALUES
('2168179b-190e-426c-875a-3678e06b9de2', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Biaya Asrama', NULL, NULL, '2023-01-12 18:40:33', '2023-01-12 18:40:33'),
('a8cb066b-be46-493e-a527-1bc8bb74a4e6', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Belanja Pegawai', 'b8c106af-3bdc-49c9-ab11-1938e12253de', 'Mantap', '2022-12-19 15:35:42', '2023-01-12 18:40:33'),
('ca3cafae-ffa0-4d1f-9d14-145378c01c47', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Belanja Pegawai', '9a95611f-efa1-46e4-a609-a1154ce007c9', 'Mantap Lagi', '2022-12-19 15:35:42', '2023-01-12 18:40:33'),
('e7722bfc-5d5b-4fb3-b975-10d78b413a75', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Bayar Fasilitas', 'e90ea836-7707-4fcf-99b7-2e3150a62038', 'mantap jua', '2022-12-19 15:35:42', '2023-01-12 18:40:33'),
('fa2bae5c-3ca1-4124-9595-f9e63261a251', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Biaya Pembangunan', NULL, NULL, '2023-01-12 18:40:33', '2023-01-12 18:40:33');

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
  `pemasukan_uang_makan` int NOT NULL,
  `tanggal_setor_dapur` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengeluaran`
--

INSERT INTO `rincian_pengeluaran` (`id_rincian_pengeluaran`, `bulan_laporan`, `tahun_laporan`, `bulan_pengajuan`, `tahun_pengajuan`, `id_tahun_ajaran`, `saldo_awal`, `pemasukan_uang_makan`, `tanggal_setor_dapur`, `created_at`, `updated_at`) VALUES
('8927573c-e72b-4d81-a9f7-f7124c3647eb', '8', 2022, '9', 2022, '7bbb36db-240a-48ee-af92-4669326778ee', 1000000000, 110000, '2022-11-15', '2022-11-02 23:57:18', '2022-12-16 00:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengeluaran_sekolah`
--

CREATE TABLE `rincian_pengeluaran_sekolah` (
  `id_rincian_pengeluaran_sekolah` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `tanggal_rincian` date NOT NULL,
  `uraian_rincian` varchar(100) NOT NULL,
  `volume_rincian` int NOT NULL,
  `ket_volume_rincian` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nominal_rincian` int NOT NULL,
  `id_kolom_spp` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `nominal_pendapatan_spp` int DEFAULT NULL,
  `kolom_pendapatan` varchar(75) DEFAULT NULL,
  `nominal_pendapatan` int DEFAULT NULL,
  `uraian_rab` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `volume_rab` int DEFAULT NULL,
  `ket_volume_rab` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nominal_rab` int DEFAULT NULL,
  `ket_rincian_pengeluaran_sekolah` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengeluaran_sekolah`
--

INSERT INTO `rincian_pengeluaran_sekolah` (`id_rincian_pengeluaran_sekolah`, `id_rincian_pengeluaran`, `tanggal_rincian`, `uraian_rincian`, `volume_rincian`, `ket_volume_rincian`, `nominal_rincian`, `id_kolom_spp`, `nominal_pendapatan_spp`, `kolom_pendapatan`, `nominal_pendapatan`, `uraian_rab`, `volume_rab`, `ket_volume_rab`, `nominal_rab`, `ket_rincian_pengeluaran_sekolah`, `created_at`, `updated_at`) VALUES
('9a95611f-efa1-46e4-a609-a1154ce007c9', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-11-02', 'Ukhro Staff dan Guru Agustus', 1, 'Bulan', 69669000, '2825c71e-39e7-4a8f-b4bf-ee40218bc521', 0, NULL, NULL, 'Ukhro Staff dan Guru September', 1, 'Bulan', 100000, '', '2022-11-02 23:57:18', '2022-11-05 02:26:08'),
('b8c106af-3bdc-49c9-ab11-1938e12253de', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-11-27', 'Ukhro Pengampu Ekskul Agustus', 1, 'Bulan', 6155000, NULL, 0, NULL, NULL, 'Ukhro Pengampu Ekskul September', 1, 'Bulan', 9620000, '', '2022-11-02 23:57:18', '2022-11-05 02:26:08'),
('e90ea836-7707-4fcf-99b7-2e3150a62038', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-11-02', 'PDAM', 1, 'Bulan', 25500, '60f3492f-d8be-4f29-9014-478d314fe4ef', 10000, NULL, NULL, 'Wifi Corporet', 1, 'Bulan', 100000, '', '2022-11-02 23:57:18', '2022-11-05 02:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pengeluaran_uang_makan`
--

CREATE TABLE `rincian_pengeluaran_uang_makan` (
  `id_rincian_pengeluaran_uang_makan` varchar(36) NOT NULL,
  `id_rincian_pengeluaran` varchar(36) NOT NULL,
  `tanggal_rincian` date NOT NULL,
  `uraian_rincian` varchar(100) NOT NULL,
  `id_kantin` varchar(36) NOT NULL,
  `volume_rincian` int NOT NULL,
  `ket_volume_rincian` varchar(50) NOT NULL,
  `nominal_rincian` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincian_pengeluaran_uang_makan`
--

INSERT INTO `rincian_pengeluaran_uang_makan` (`id_rincian_pengeluaran_uang_makan`, `id_rincian_pengeluaran`, `tanggal_rincian`, `uraian_rincian`, `id_kantin`, `volume_rincian`, `ket_volume_rincian`, `nominal_rincian`, `created_at`, `updated_at`) VALUES
('062f720d-679e-4ec3-90f3-32017c5ea23a', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-11-02', 'Setor Uang Makan ke Kantin Pak Mamat', '6f9cfc36-8c14-4a51-ab89-abb4373fd90d', 1, 'Bulan', 0, '2022-11-02 23:57:18', '2022-11-05 02:26:08'),
('ff129433-3702-484c-b53d-b58391bfbc29', '8927573c-e72b-4d81-a9f7-f7124c3647eb', '2022-11-02', 'Setor Uang Makan ke Dapur', '3630bc38-3357-453b-99c7-4470f7582b73', 1, 'Bulan', 1000000, '2022-11-02 23:57:18', '2022-11-05 02:26:08');

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
  `pemohon` varchar(100) NOT NULL,
  `keterangan_pemohon` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sapras`
--

INSERT INTO `sapras` (`id_sapras`, `id_rincian_pengeluaran`, `kategori_sapras`, `nama_barang`, `qty`, `ket`, `harga_barang`, `jumlah`, `pemohon`, `keterangan_pemohon`, `created_at`, `updated_at`) VALUES
('36a4827e-c747-4a2f-b810-dad8cc6d938d', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'ATK', 'Pensil', 10, 'PCS', 2000, 20000, 'Supriadi', 'Kegiatan Lomba', '2022-12-20 12:45:58', '2022-12-20 12:58:19'),
('987bf608-8c72-4fc6-95ef-058801d4e62b', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Alat Lomba', 'Tali Jemuran', 1, 'PCS', 5000, 5000, 'Galuh', NULL, '2022-12-20 12:45:58', '2022-12-20 12:58:19'),
('cfbfbe9a-a7dd-4a42-ae42-39b2f9399e13', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Obat', 'Panadol Hijau', 1, 'PCS', 10000, 10000, 'Supriadi', 'Kegiatan Lomba', '2022-12-20 12:45:58', '2022-12-20 12:58:19'),
('d70864d4-ef6b-4399-9c31-c3ee378888fd', '8927573c-e72b-4d81-a9f7-f7124c3647eb', 'Alat Lomba', 'Tali Tambang', 1, 'PCS', 5000, 5000, 'Galuh', NULL, '2022-12-20 12:45:58', '2022-12-20 12:58:19');

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
('36dd7f27-990e-4e51-bdac-43eedda25a7d', 'f485dbe2-aae3-4c9e-b55a-d0f957e222a7', 'd4971513-6303-4248-bd27-dbb1a999b51e', '2023-01-20 23:34:29', '2023-01-20 23:34:29');

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
  `jenis_bayar` varchar(20) NOT NULL,
  `id_users` varchar(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_kantin` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `status_delete` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spp_bulan_tahun`
--

INSERT INTO `spp_bulan_tahun` (`id_spp_bulan_tahun`, `id_spp`, `bulan_tahun`, `bulan`, `tahun`, `id_kantin`, `status_delete`, `created_at`, `updated_at`) VALUES
('61d268f9-ea75-43fd-9f98-c82a17ee5c47', '36dd7f27-990e-4e51-bdac-43eedda25a7d', 'Januari, 2023', 1, 2023, '3630bc38-3357-453b-99c7-4470f7582b73', 0, '2023-01-20 23:34:29', '2023-01-20 23:34:29');

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
('3b21f65a-f34e-46c5-a0d2-f699f35cacc2', '61d268f9-ea75-43fd-9f98-c82a17ee5c47', 'ca8c7b9a-5a58-4ea8-a3c4-8f5246cf72f9', 100000, 0, 100000, 0, '2023-01-20 23:34:29', '2023-01-21 02:05:58'),
('fb0fbf59-6bf7-4125-9d13-af1ee8f5fe90', '61d268f9-ea75-43fd-9f98-c82a17ee5c47', '1971752f-5e6c-459f-8a13-c51327bb88e7', 100000, 100000, 0, 1, '2023-01-20 23:34:29', '2023-01-21 02:04:00');

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
('12678de9-e470-4240-8999-39c3d6bb0461', 'Ortu Uchiha Tiara', '00088899913', '$2y$10$a5lasKYHKhv7xCF3MnIHH.IWMJtAr.afdB.ZWq.rkcYRlxGBSJGUy', 'CduuH49I1Kqa4JJBCZhmCqDFqspdMpCko2mvicS743Y5lONGs1almawgIoZB', 0, 1, 0, '2022-12-28 00:11:49'),
('1a227dde-17d9-431c-b9be-47f144dde327', 'Pak Kepsek', 'kepsek', '$2y$10$Ar5qDAWarJBd.pv0tPa/FuipxFdHAPm/wuJG4XuAGuG4hfZg8pMJK', 'dnDwoUTJUzCjMRbpdFHoSelmwwnjJTljVgH5WTMQVbv6R3zXem0Ofo833bMf', 1, 1, 0, '2022-12-27 23:59:41'),
('1befa194-0db4-40fa-ad43-bbf7460ed570', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$ECSvgq125ypeQc2pYHz6SOvIHhkwsJXl3ZOE4wAm/Rws4Ob6sDNWm', NULL, 0, 1, 0, NULL),
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
('d434f360-934f-4f2d-af76-5d2cdd798919', 'Mahmud', 'mahmud', '$2y$10$HsLyIHxR9HW6gvg/b53PHOVVNp1OXpYLwb6OoYydmTYy/3onBSmcW', '92LhQozMQQlQXSKay2WIdKEORQADxtKVNfe5N1MbPibmDKA7OdRAMs67YewY', 2, 1, 0, '2022-12-27 01:40:22'),
('d4971513-6303-4248-bd27-dbb1a999b51e', 'Administrator', 'admin', '$2y$10$pknJ0F7OrOxtXjbI1.VgneDs5N6NPDM8OiK1s7zz3FPWJf9unvTJG', 'Vd4pmR0yvzhmoBCfz4yc1Tb3j19G3iUbFYlR70haru5Hr4eWxjoTSYC6YoLG', 3, 1, 0, '2023-01-18 23:11:47'),
('d9dd0013-0d43-4cf2-a994-79d21bd71aa2', 'Ortu Uchiha Bayu', '00088899912', '$2y$10$qzGQSOrVfnoW/8XnuV.tFeF5Yvifma3d6XL5FjfbKRNfEDtCh62HS', NULL, 0, 1, 0, NULL),
('e36f22fd-c164-4b05-a610-b9b12efa9dff', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$2ZmRQnTyM3EVg/WCPHyjhuu0DVNOQL.cQ5.9Vyjk7F0ax18oQ3VDy', NULL, 0, 1, 0, NULL),
('e44db3a7-2a2d-4a0c-bc84-cdb804be8513', 'Ortu Uchiha Sukirman', '00088899914', '$2y$10$XXHO2SzkWv1WVOUddXZ9ouVPKAxxDZsS.QtIoixm/rc2Erfa79jlW', NULL, 0, 1, 0, NULL),
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
-- Indexes for table `kolom_spp`
--
ALTER TABLE `kolom_spp`
  ADD PRIMARY KEY (`id_kolom_spp`);

--
-- Indexes for table `pemasukan_kantin`
--
ALTER TABLE `pemasukan_kantin`
  ADD PRIMARY KEY (`id_pemasukan_kantin`),
  ADD KEY `pemasukan_kantin_ibfk_1` (`id_spp_bulan_tahun`),
  ADD KEY `id_kantin` (`id_kantin`);

--
-- Indexes for table `profile_instansi`
--
ALTER TABLE `profile_instansi`
  ADD PRIMARY KEY (`id_profile_instansi`);

--
-- Indexes for table `rincian_pembelanjaan`
--
ALTER TABLE `rincian_pembelanjaan`
  ADD PRIMARY KEY (`id_rincian_pembelanjaan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_sekolah`),
  ADD KEY `id_rincian_pengeluaran_uang_makan` (`id_rincian_pengeluaran_uang_makan`);

--
-- Indexes for table `rincian_pembelanjaan_tahun_ajaran`
--
ALTER TABLE `rincian_pembelanjaan_tahun_ajaran`
  ADD PRIMARY KEY (`id_rincian_pembelanjaan_tahun_ajaran`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`);

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
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_sekolah`),
  ADD KEY `rincian_penerimaan_detail_ibfk_1` (`id_rincian_pengeluaran`);

--
-- Indexes for table `rincian_penerimaan_rekap`
--
ALTER TABLE `rincian_penerimaan_rekap`
  ADD PRIMARY KEY (`id_rincian_penerimaan_rekap`),
  ADD KEY `rincian_penerimaan_rekap_ibfk_1` (`id_rincian_pengeluaran`);

--
-- Indexes for table `rincian_penerimaan_tahun_ajaran`
--
ALTER TABLE `rincian_penerimaan_tahun_ajaran`
  ADD PRIMARY KEY (`id_rincian_penerimaan_tahun_ajaran`),
  ADD KEY `rincian_penerimaan_tahun_ajaran_ibfk_1` (`id_rincian_pengeluaran`);

--
-- Indexes for table `rincian_pengajuan`
--
ALTER TABLE `rincian_pengajuan`
  ADD PRIMARY KEY (`id_rincian_pengajuan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_rincian_pengeluaran_detail` (`id_rincian_pengeluaran_sekolah`);

--
-- Indexes for table `rincian_pengeluaran`
--
ALTER TABLE `rincian_pengeluaran`
  ADD PRIMARY KEY (`id_rincian_pengeluaran`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `rincian_pengeluaran_sekolah`
--
ALTER TABLE `rincian_pengeluaran_sekolah`
  ADD PRIMARY KEY (`id_rincian_pengeluaran_sekolah`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`),
  ADD KEY `id_kolom_spp` (`id_kolom_spp`);

--
-- Indexes for table `rincian_pengeluaran_uang_makan`
--
ALTER TABLE `rincian_pengeluaran_uang_makan`
  ADD PRIMARY KEY (`id_rincian_pengeluaran_uang_makan`),
  ADD KEY `id_rincian_pengeluaran` (`id_rincian_pengeluaran`);

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
  ADD KEY `id_kolom_spp` (`id_kolom_spp`),
  ADD KEY `id_kantin` (`id_kantin`);

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
-- Constraints for table `pemasukan_kantin`
--
ALTER TABLE `pemasukan_kantin`
  ADD CONSTRAINT `pemasukan_kantin_ibfk_1` FOREIGN KEY (`id_spp_bulan_tahun`) REFERENCES `spp_bulan_tahun` (`id_spp_bulan_tahun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemasukan_kantin_ibfk_2` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pembelanjaan`
--
ALTER TABLE `rincian_pembelanjaan`
  ADD CONSTRAINT `rincian_pembelanjaan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pembelanjaan_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_sekolah`) REFERENCES `rincian_pengeluaran_sekolah` (`id_rincian_pengeluaran_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pembelanjaan_ibfk_3` FOREIGN KEY (`id_rincian_pengeluaran_uang_makan`) REFERENCES `rincian_pengeluaran_uang_makan` (`id_rincian_pengeluaran_uang_makan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pembelanjaan_tahun_ajaran`
--
ALTER TABLE `rincian_pembelanjaan_tahun_ajaran`
  ADD CONSTRAINT `rincian_pembelanjaan_tahun_ajaran_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan`
--
ALTER TABLE `rincian_penerimaan`
  ADD CONSTRAINT `rincian_penerimaan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_detail`
--
ALTER TABLE `rincian_penerimaan_detail`
  ADD CONSTRAINT `rincian_penerimaan_detail_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_penerimaan_detail_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_sekolah`) REFERENCES `rincian_pengeluaran_sekolah` (`id_rincian_pengeluaran_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_rekap`
--
ALTER TABLE `rincian_penerimaan_rekap`
  ADD CONSTRAINT `rincian_penerimaan_rekap_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_penerimaan_tahun_ajaran`
--
ALTER TABLE `rincian_penerimaan_tahun_ajaran`
  ADD CONSTRAINT `rincian_penerimaan_tahun_ajaran_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengajuan`
--
ALTER TABLE `rincian_pengajuan`
  ADD CONSTRAINT `rincian_pengajuan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pengajuan_ibfk_2` FOREIGN KEY (`id_rincian_pengeluaran_sekolah`) REFERENCES `rincian_pengeluaran_sekolah` (`id_rincian_pengeluaran_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengeluaran`
--
ALTER TABLE `rincian_pengeluaran`
  ADD CONSTRAINT `rincian_pengeluaran_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengeluaran_sekolah`
--
ALTER TABLE `rincian_pengeluaran_sekolah`
  ADD CONSTRAINT `rincian_pengeluaran_sekolah_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincian_pengeluaran_sekolah_ibfk_2` FOREIGN KEY (`id_kolom_spp`) REFERENCES `kolom_spp` (`id_kolom_spp`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `rincian_pengeluaran_uang_makan`
--
ALTER TABLE `rincian_pengeluaran_uang_makan`
  ADD CONSTRAINT `rincian_pengeluaran_uang_makan_ibfk_1` FOREIGN KEY (`id_rincian_pengeluaran`) REFERENCES `rincian_pengeluaran` (`id_rincian_pengeluaran`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `spp_bayar_detail_ibfk_2` FOREIGN KEY (`id_kolom_spp`) REFERENCES `kolom_spp` (`id_kolom_spp`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `spp_bayar_detail_ibfk_3` FOREIGN KEY (`id_kantin`) REFERENCES `kantin` (`id_kantin`) ON DELETE RESTRICT ON UPDATE CASCADE;

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
