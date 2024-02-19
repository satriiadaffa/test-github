-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 12:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelolagudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `atk`
--

CREATE TABLE `atk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeGL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `satuanBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atk`
--

INSERT INTO `atk` (`id`, `namaBarang`, `kodeGL`, `kodeBarang`, `saldo`, `satuanBarang`, `hargaSatuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Buku Cek harga Baru', 'Buku Cek & Bilyet Giro (C8100)', 'C81001', 4000, 'Lembar', 910, 'new', '2023-08-24 01:43:00', '2023-08-24 01:43:00'),
(2, 'BG harga Baru', 'Bilyet Giro (C8105)', 'C81052', 6000, 'Lembar', 900, 'new', '2023-08-24 01:44:24', '2023-08-24 01:44:24'),
(3, 'Bilyet Deposito', 'Deposito Berjangka (C8110)', 'C81103', 0, 'Lembar', 1500, 'new', '2023-08-24 01:45:27', '2023-08-24 01:45:27'),
(4, 'Aplikasi Permohonan Deposito Berjangka', 'Bilyet Deposito (C8210)', 'C82104', 31, 'Bendel', 14300, 'new', '2023-08-24 01:46:38', '2023-08-24 01:46:38'),
(5, 'Aplikasi Permohonan Deposito', 'Bilyet Deposito (C8210)', 'C82105', 121, 'Bendel', 14300, 'new', '2023-08-24 01:47:00', '2023-08-24 01:47:00'),
(6, 'Aplikasi Permohonan Deposito Logo Lama', 'Bilyet Deposito (C8210)', 'C82106', 12, 'Bendel', 14300, 'new', '2023-08-24 01:47:22', '2023-08-24 01:47:22'),
(7, 'Buku Tabungan Siklus Prioritas', 'Buku Tabungan (C8160)', 'C81607', 300, 'Buku', 5500, 'new', '2023-08-24 01:48:06', '2023-08-24 01:48:06'),
(8, 'Buku Tabungan LAKU PANDAI', 'Buku Tabungan (C8160)', 'C81608', 500, 'Buku', 2500, 'new', '2023-08-24 01:48:41', '2023-08-24 01:48:41'),
(9, 'Buku Tabunganku', 'Buku Tabungan (C8160)', 'C81609', 0, 'Buku', 2125, 'new', '2023-08-24 01:49:46', '2023-08-24 01:49:46'),
(10, 'Buku Tabungan Simpeda', 'Buku Tabungan (C8160)', 'C816010', 200, 'Buku', 2500, 'tambahSaldo', '2023-08-24 01:50:40', '2023-08-24 01:50:57'),
(11, 'Buku Tabungan Simpeda (2)', 'Buku Tabungan (C8160)', 'C816011', 50, 'Buku', 2125, 'new', '2023-08-24 01:59:13', '2023-08-24 01:59:13'),
(12, 'Slip Penarikan Des 2022', 'Slip Penarikan (C8175)', 'C817512', 105, 'Buku', 8000, 'new', '2023-08-24 02:00:28', '2023-08-24 02:00:58'),
(13, 'Box Arsip Kecil', 'Barang Cetak & Brg Cetak Lain (C8190)', 'C819013', 995, 'Lembar', 17500, 'tambahSaldo', '2023-08-24 02:04:04', '2023-08-24 02:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `kodegl`
--

CREATE TABLE `kodegl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaKode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeGabungan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kodegl`
--

INSERT INTO `kodegl` (`id`, `kode`, `namaKode`, `kodeGabungan`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'C8100', 'Buku Cek & Bilyet Giro', 'Buku Cek & Bilyet Giro (C8100)', 'ATK', '2023-08-24 01:34:25', '2023-08-24 01:34:25'),
(2, 'C8105', 'Bilyet Giro', 'Bilyet Giro (C8105)', 'ATK', '2023-08-24 01:34:49', '2023-08-24 01:34:49'),
(3, 'C8110', 'Deposito Berjangka', 'Deposito Berjangka (C8110)', 'ATK', '2023-08-24 01:35:07', '2023-08-24 01:35:07'),
(4, 'C8210', 'Bilyet Deposito', 'Bilyet Deposito (C8210)', 'ATK', '2023-08-24 01:35:31', '2023-08-24 01:35:31'),
(5, 'C8160', 'Buku Tabungan', 'Buku Tabungan (C8160)', 'ATK', '2023-08-24 01:36:46', '2023-08-24 01:36:46'),
(6, 'C8170', 'Slip Setoran', 'Slip Setoran (C8170)', 'ATK', '2023-08-24 01:37:24', '2023-08-24 01:37:24'),
(8, 'C8175', 'Slip Penarikan', 'Slip Penarikan (C8175)', 'ATK', '2023-08-24 01:38:18', '2023-08-24 01:38:18'),
(9, 'C8220', 'Bilyet Bank Garansi', 'Bilyet Bank Garansi (C8220)', 'ATK', '2023-08-24 01:39:09', '2023-08-24 01:39:09'),
(10, 'C8190', 'Barang Cetak & Brg Cetak Lain', 'Barang Cetak & Brg Cetak Lain (C8190)', 'ATK', '2023-08-24 01:39:39', '2023-08-24 01:39:39'),
(11, 'C8305', 'Persediaan Barang Usang', 'Persediaan Barang Usang (C8305)', 'ATK', '2023-08-24 01:40:00', '2023-08-24 01:40:00'),
(12, 'C8270', 'Persediaan Kantor Lainnya', 'Persediaan Kantor Lainnya (C8270)', 'ATK', '2023-08-24 01:41:49', '2023-08-24 01:41:49'),
(13, 'C8300', 'Persediaan Lainnya', 'Persediaan Lainnya (C8300)', 'Souvenir', '2023-08-24 02:08:08', '2023-08-24 02:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2023_08_08_023857_create_table_atk', 1),
(39, '2023_08_08_091837_create_table_kode_gl', 1),
(40, '2023_08_09_071532_create_table_rekam_tambah_saldo_atk', 1),
(41, '2023_08_10_021634_create_table_rekam_pendaftaran_atk', 1),
(42, '2023_08_10_062858_create_table_rekam_penghapusan_atk', 1),
(43, '2023_08_10_080342_create_table_unit', 1),
(44, '2023_08_11_092703_create_table_request_atk', 1),
(45, '2023_08_14_012640_create_table_users', 1),
(46, '2023_08_16_022029_create_table_souvenir', 1),
(47, '2023_08_16_022217_create_table_rekam_tambah_saldo_souvenir', 1),
(48, '2023_08_16_022506_create_table_rekam_pendaftaran_souvenir', 1),
(49, '2023_08_16_022540_create_table_rekam_penghapusan_souvenir', 1),
(50, '2023_08_16_022623_create_table_request_souvenir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekampendaftaranatk`
--

CREATE TABLE `rekampendaftaranatk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekampendaftaranatk`
--

INSERT INTO `rekampendaftaranatk` (`id`, `nip`, `namaUser`, `namaBarang`, `kodeBarang`, `debet`, `created_at`, `updated_at`) VALUES
(1, '00000003', 'Admin', 'Buku Cek harga Baru', 'C81001', 4000, '2023-08-24 01:43:00', '2023-08-24 01:43:00'),
(2, '00000003', 'Admin', 'BG harga Baru', 'C81052', 6000, '2023-08-24 01:44:24', '2023-08-24 01:44:24'),
(3, '00000003', 'Admin', 'Bilyet Deposito', 'C81103', 0, '2023-08-24 01:45:27', '2023-08-24 01:45:27'),
(4, '00000003', 'Admin', 'Aplikasi Permohonan Deposito Berjangka', 'C82104', 31, '2023-08-24 01:46:38', '2023-08-24 01:46:38'),
(5, '00000003', 'Admin', 'Aplikasi Permohonan Deposito', 'C82105', 121, '2023-08-24 01:47:00', '2023-08-24 01:47:00'),
(6, '00000003', 'Admin', 'Aplikasi Permohonan Deposito Logo Lama', 'C82106', 12, '2023-08-24 01:47:22', '2023-08-24 01:47:22'),
(7, '00000003', 'Admin', 'Buku Tabungan Siklus Prioritas', 'C81607', 300, '2023-08-24 01:48:06', '2023-08-24 01:48:06'),
(8, '00000003', 'Admin', 'Buku Tabungan LAKU PANDAI', 'C81608', 500, '2023-08-24 01:48:41', '2023-08-24 01:48:41'),
(9, '00000003', 'Admin', 'Buku Tabunganku', 'C81609', 0, '2023-08-24 01:49:46', '2023-08-24 01:49:46'),
(10, '00000003', 'Admin', 'Buku Tabungan Simpeda', 'C816010', 0, '2023-08-24 01:50:40', '2023-08-24 01:50:40'),
(11, '00000003', 'Admin', 'Buku Tabungan Simpeda (2)', 'C816011', 50, '2023-08-24 01:59:13', '2023-08-24 01:59:13'),
(12, '00000003', 'Admin', 'Slip Penarikan Des 2022', 'C817512', 125, '2023-08-24 02:00:28', '2023-08-24 02:00:28'),
(13, '00000003', 'Admin', 'Box Arsip Kecil', 'C819013', 0, '2023-08-24 02:04:04', '2023-08-24 02:04:04'),
(14, '00000003', 'Admin', 'Asbak', 'C830014', 8, '2023-08-24 02:08:36', '2023-08-24 02:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `rekampendaftaransouvenir`
--

CREATE TABLE `rekampendaftaransouvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekampendaftaransouvenir`
--

INSERT INTO `rekampendaftaransouvenir` (`id`, `nip`, `namaUser`, `namaBarang`, `kodeBarang`, `debet`, `created_at`, `updated_at`) VALUES
(1, '00000003', 'Admin', 'Asbak', 'C83001', 8, '2023-08-24 02:21:18', '2023-08-24 02:21:18'),
(2, '00000003', 'Admin', 'Jam Dinding 2022', 'C83002', 70, '2023-08-24 02:23:55', '2023-08-24 02:23:55'),
(3, '00000003', 'Admin', 'Mug Putih 2022', 'C83003', 30, '2023-08-24 02:29:29', '2023-08-24 02:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `rekampenghapusanatk`
--

CREATE TABLE `rekampenghapusanatk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekampenghapusansouvenir`
--

CREATE TABLE `rekampenghapusansouvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekamtambahsaldoatk`
--

CREATE TABLE `rekamtambahsaldoatk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekamtambahsaldoatk`
--

INSERT INTO `rekamtambahsaldoatk` (`id`, `nip`, `namaUser`, `namaBarang`, `kodeBarang`, `debet`, `created_at`, `updated_at`) VALUES
(1, '00000003', 'Admin', 'Buku Tabungan Simpeda', 'C816010', 200, '2023-08-24 01:50:57', '2023-08-24 01:50:57'),
(2, '00000003', 'Admin', 'Box Arsip Kecil', 'C819013', 1000, '2023-08-24 02:04:24', '2023-08-24 02:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `rekamtambahsaldosouvenir`
--

CREATE TABLE `rekamtambahsaldosouvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestatk`
--

CREATE TABLE `requestatk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaUnit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestatk`
--

INSERT INTO `requestatk` (`id`, `namaUnit`, `namaBarang`, `kodeBarang`, `debet`, `nip`, `namaUser`, `created_at`, `updated_at`) VALUES
(1, 'UNEJ', 'Slip Penarikan Des 2022', 'C817512', '20', '00000003', 'Admin', '2023-08-24 02:00:58', '2023-08-24 02:00:58'),
(2, 'UNEJ', 'Box Arsip Kecil', 'C819013', '5', '00000003', 'Admin', '2023-08-24 02:04:44', '2023-08-24 02:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `requestsouvenir`
--

CREATE TABLE `requestsouvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaUnit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requestsouvenir`
--

INSERT INTO `requestsouvenir` (`id`, `namaUnit`, `namaBarang`, `kodeBarang`, `debet`, `nip`, `namaUser`, `created_at`, `updated_at`) VALUES
(1, 'Kencong', 'Jam Dinding 2022', 'C83002', '5', '00000003', 'Admin', '2023-08-24 02:27:43', '2023-08-24 02:27:43'),
(2, 'Kencong', 'Mug Putih 2022', 'C83003', '10', '00000003', 'Admin', '2023-08-24 02:29:49', '2023-08-24 02:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `souvenir`
--

CREATE TABLE `souvenir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeGL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeBarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `satuanBarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `souvenir`
--

INSERT INTO `souvenir` (`id`, `namaBarang`, `kodeGL`, `kodeBarang`, `saldo`, `satuanBarang`, `hargaSatuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asbak', 'Persediaan Lainnya (C8300)', 'C83001', 8, 'Pcs', 8000, 'new', '2023-08-24 02:21:18', '2023-08-24 02:21:18'),
(2, 'Jam Dinding 2022', 'Persediaan Lainnya (C8300)', 'C83002', 65, 'Pcs', 70000, 'new', '2023-08-24 02:23:55', '2023-08-24 02:27:43'),
(3, 'Mug Putih 2022', 'Persediaan Lainnya (C8300)', 'C83003', 20, 'Pcs', 30000, 'new', '2023-08-24 02:29:29', '2023-08-24 02:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeUnit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namaUnit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `kodeUnit`, `namaUnit`, `created_at`, `updated_at`) VALUES
(1, 'unit_1', 'Umum & Akuntansi', '2023-08-24 01:53:17', '2023-08-24 01:53:17'),
(2, 'unit_2', 'Pemasaran Kredit', '2023-08-24 01:54:09', '2023-08-24 01:54:09'),
(3, 'unit_3', 'UNEJ', '2023-08-24 02:00:44', '2023-08-24 02:00:44'),
(4, 'unit_4', 'Kencong', '2023-08-24 02:26:39', '2023-08-24 02:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `userName`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, '00000003', 'Admin', '$2y$10$cOKwSdq.6foThZeEjzBZI.nnvpVW8Y.KHkm3bxKOSI.EO/.Ny1Okq', 'Super Admin', '2023-08-24 00:34:42', '2023-08-24 00:34:42'),
(2, '01230019', 'David Andre Setiawan', '$2y$10$M2x7HQAEhWR/fDcmjvkCHu6KpChtQBJurgP.N7Acwq0XCSZdSlpJ.', 'Manager', '2023-08-24 02:53:14', '2023-08-24 02:53:14'),
(3, '21053561', 'Satria Daffa', '$2y$10$qv4sw/FQbaVmZHaSKU8kSO4V3tVZJvwwcvukklmD9kZ855.hS/4jC', 'Staff', '2023-08-24 02:53:50', '2023-08-24 02:53:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atk`
--
ALTER TABLE `atk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodegl`
--
ALTER TABLE `kodegl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekampendaftaranatk`
--
ALTER TABLE `rekampendaftaranatk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekampendaftaransouvenir`
--
ALTER TABLE `rekampendaftaransouvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekampenghapusanatk`
--
ALTER TABLE `rekampenghapusanatk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekampenghapusansouvenir`
--
ALTER TABLE `rekampenghapusansouvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekamtambahsaldoatk`
--
ALTER TABLE `rekamtambahsaldoatk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekamtambahsaldosouvenir`
--
ALTER TABLE `rekamtambahsaldosouvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestatk`
--
ALTER TABLE `requestatk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestsouvenir`
--
ALTER TABLE `requestsouvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `souvenir`
--
ALTER TABLE `souvenir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atk`
--
ALTER TABLE `atk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kodegl`
--
ALTER TABLE `kodegl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekampendaftaranatk`
--
ALTER TABLE `rekampendaftaranatk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekampendaftaransouvenir`
--
ALTER TABLE `rekampendaftaransouvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekampenghapusanatk`
--
ALTER TABLE `rekampenghapusanatk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekampenghapusansouvenir`
--
ALTER TABLE `rekampenghapusansouvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekamtambahsaldoatk`
--
ALTER TABLE `rekamtambahsaldoatk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekamtambahsaldosouvenir`
--
ALTER TABLE `rekamtambahsaldosouvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestatk`
--
ALTER TABLE `requestatk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requestsouvenir`
--
ALTER TABLE `requestsouvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `souvenir`
--
ALTER TABLE `souvenir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
