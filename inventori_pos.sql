-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Aug 09, 2025 at 03:20 PM
-- Server version: 8.0.43
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventori_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Snack', '2025-08-09 14:30:05', '2025-08-09 14:30:05'),
(2, 'Minuman', '2025-08-09 14:30:14', '2025-08-09 14:30:14'),
(3, 'Makanan Instan', '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(5, 'Bahan Pokok', '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(6, 'Peralatan Dapur', '2025-08-09 14:44:06', '2025-08-09 14:44:06'),
(7, 'Elektronik', '2025-08-09 14:44:06', '2025-08-09 14:44:06'),
(8, 'Kebutuhan Rumah Tangga', '2025-08-09 14:44:06', '2025-08-09 14:44:06'),
(9, 'Perawatan Tubuh', '2025-08-09 14:44:06', '2025-08-09 14:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int UNSIGNED NOT NULL,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_03_05_194740_tambah_kolom_baru_to_users_table', 1),
(7, '2021_03_05_195441_buat_kategori_table', 1),
(8, '2021_03_05_195949_buat_produk_table', 1),
(9, '2021_03_05_200515_buat_member_table', 1),
(10, '2021_03_05_200706_buat_supplier_table', 1),
(11, '2021_03_05_200841_buat_pembelian_table', 1),
(12, '2021_03_05_200845_buat_pembelian_detail_table', 1),
(13, '2021_03_05_200853_buat_penjualan_table', 1),
(14, '2021_03_05_200858_buat_penjualan_detail_table', 1),
(15, '2021_03_05_200904_buat_setting_table', 1),
(16, '2021_03_05_201756_buat_pengeluaran_table', 1),
(17, '2021_03_11_225128_create_sessions_table', 1),
(18, '2021_03_24_115009_tambah_foreign_key_to_produk_table', 1),
(19, '2021_03_24_131829_tambah_kode_produk_to_produk_table', 1),
(20, '2021_05_08_220315_tambah_diskon_to_setting_table', 1),
(21, '2021_05_09_124745_edit_id_member_to_penjualan_table', 1),
(22, '2022_08_23_112656_create_pembayarans_table', 1),
(23, '2022_08_24_143748_create_satuans_table', 1),
(24, '2022_08_26_150524_create_tokos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penjualan` int NOT NULL,
  `nama_piutang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_harga` int NOT NULL,
  `pembayaran` enum('cash','piutang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_penjualan`, `nama_piutang`, `total_harga`, `pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 12000, 'cash', '2025-08-09 14:35:47', '2025-08-09 14:35:47'),
(2, 4, NULL, 22000, 'cash', '2025-08-09 14:37:24', '2025-08-09 14:37:24'),
(3, 5, 'Yudi', 10000, 'piutang', '2025-08-09 14:38:19', '2025-08-09 14:38:19'),
(4, 6, NULL, 14000, 'cash', '2025-08-09 15:06:28', '2025-08-09 15:06:28'),
(5, 7, 'Budi', 65000, 'piutang', '2025-08-09 15:06:28', '2025-08-09 15:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int UNSIGNED NOT NULL,
  `id_supplier` int NOT NULL,
  `total_item` int NOT NULL,
  `total_harga` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `bayar` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `total_item`, `total_harga`, `diskon`, `bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 60, 210000, 10, 189000, '2025-08-09 14:34:10', '2025-08-09 14:34:44'),
(2, 2, 40, 120000, 5, 114000, '2025-08-09 14:58:57', '2025-08-09 14:58:57'),
(3, 3, 25, 160000, 0, 160000, '2025-08-09 14:58:57', '2025-08-09 14:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id_pembelian_detail` int UNSIGNED NOT NULL,
  `id_pembelian` int NOT NULL,
  `id_produk` int NOT NULL,
  `id_satuan` int NOT NULL,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_satuan` int NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id_pembelian_detail`, `id_pembelian`, `id_produk`, `id_satuan`, `nama_satuan`, `jumlah_satuan`, `harga_beli`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'pcs', 20, 6500, 20, 130000, '2025-08-09 14:34:21', '2025-08-09 14:34:32'),
(2, 1, 1, 1, 'pcs', 20, 1000, 20, 20000, '2025-08-09 14:34:25', '2025-08-09 14:34:34'),
(3, 1, 3, 1, 'pcs', 20, 3000, 20, 60000, '2025-08-09 14:34:27', '2025-08-09 14:34:36'),
(4, 2, 4, 1, 'pcs', 20, 3000, 20, 60000, '2025-08-09 15:05:48', '2025-08-09 15:05:48'),
(5, 2, 5, 1, 'pcs', 20, 2500, 20, 50000, '2025-08-09 15:05:48', '2025-08-09 15:05:48'),
(6, 3, 6, 1, 'sak', 5, 50000, 5, 250000, '2025-08-09 15:05:48', '2025-08-09 15:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int UNSIGNED NOT NULL,
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_produk` int NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_produk`, `nama_produk`, `jumlah_produk`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 2, 'coklat batang', 5, 32500, '2025-08-09 14:35:04', '2025-08-09 14:35:04'),
(2, 6, 'Beras 5kg', 2, 130000, '2025-08-09 15:06:36', '2025-08-09 15:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int UNSIGNED NOT NULL,
  `id_member` int DEFAULT NULL,
  `total_item` int NOT NULL,
  `total_harga` int NOT NULL,
  `diskon` tinyint DEFAULT '0',
  `bayar` int NOT NULL DEFAULT '0',
  `diterima` int NOT NULL DEFAULT '0',
  `id_user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_member`, `total_item`, `total_harga`, `diskon`, `bayar`, `diterima`, `id_user`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, 0, 0, 0, 0, 1, '2025-08-09 14:35:13', '2025-08-09 14:35:13'),
(2, NULL, 2, 12000, NULL, 12000, 20000, 1, '2025-08-09 14:35:19', '2025-08-09 14:35:47'),
(3, NULL, 0, 0, 0, 0, 0, 1, '2025-08-09 14:35:54', '2025-08-09 14:35:54'),
(4, NULL, 3, 22000, NULL, 22000, 20000, 1, '2025-08-09 14:36:40', '2025-08-09 14:37:24'),
(5, NULL, 1, 10000, NULL, 10000, 0, 1, '2025-08-09 14:38:05', '2025-08-09 14:38:19'),
(6, NULL, 3, 14000, 0, 14000, 20000, 2, '2025-08-09 15:05:57', '2025-08-09 15:05:57'),
(7, NULL, 2, 65000, 0, 65000, 70000, 2, '2025-08-09 15:05:57', '2025-08-09 15:05:57'),
(8, NULL, 0, 0, 0, 0, 0, 1, '2025-08-09 15:11:45', '2025-08-09 15:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int UNSIGNED NOT NULL,
  `id_penjualan` int NOT NULL,
  `id_produk` int NOT NULL,
  `harga_jual` int NOT NULL,
  `jumlah` int NOT NULL,
  `diskon` tinyint DEFAULT '0',
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_produk`, `harga_jual`, `jumlah`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2000, 1, NULL, 2000, '2025-08-09 14:35:26', '2025-08-09 14:35:47'),
(2, 2, 2, 10000, 1, NULL, 10000, '2025-08-09 14:35:38', '2025-08-09 14:35:47'),
(3, 4, 2, 10000, 2, NULL, 20000, '2025-08-09 14:36:47', '2025-08-09 14:37:24'),
(4, 4, 1, 2000, 1, NULL, 2000, '2025-08-09 14:36:52', '2025-08-09 14:37:24'),
(5, 5, 2, 10000, 1, NULL, 10000, '2025-08-09 14:38:10', '2025-08-09 14:38:19'),
(6, 6, 4, 5000, 2, 0, 10000, '2025-08-09 15:06:05', '2025-08-09 15:06:05'),
(7, 6, 1, 2000, 2, 0, 4000, '2025-08-09 15:06:05', '2025-08-09 15:06:05'),
(8, 7, 6, 65000, 1, 0, 65000, '2025-08-09 15:06:05', '2025-08-09 15:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int UNSIGNED NOT NULL,
  `id_kategori` int UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `merk`, `harga_beli`, `diskon`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(1, 1, 'P000001', 'Keripik Kentang', 'Chitato', 1000, 0, 2000, 110, '2025-08-09 14:31:12', '2025-08-09 14:34:44'),
(2, 1, 'P000002', 'coklat batang', 'Silver Quenn', 6500, 0, 10000, 45, '2025-08-09 14:32:16', '2025-08-09 14:35:04'),
(3, 2, 'P000003', 'minuman soda', 'cocacola', 3000, 0, 5000, 170, '2025-08-09 14:32:43', '2025-08-09 14:34:44'),
(25, 2, 'P000004', 'Teh Botol', 'Sosro', 3000, 0, 5000, 100, '2025-08-09 14:58:32', '2025-08-09 14:58:32'),
(26, 3, 'P000005', 'Mi Instan Ayam', 'Indofood', 2500, 0, 4000, 200, '2025-08-09 14:58:32', '2025-08-09 14:58:32'),
(27, 5, 'P000006', 'Beras 5kg', 'Maknyuss', 50000, 0, 65000, 50, '2025-08-09 14:58:32', '2025-08-09 14:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int UNSIGNED NOT NULL,
  `nama_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh_satuan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `jmlh_satuan`, `created_at`, `updated_at`) VALUES
(1, 'pcs', 1, NULL, NULL),
(2, 'dus', 12, '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(3, 'pack', 6, '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(4, 'liter', 1, '2025-08-09 14:44:15', '2025-08-09 14:44:15'),
(5, 'kg', 1, '2025-08-09 14:44:15', '2025-08-09 14:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('92JMLzkboZlWebfLvoYjAshuS0CoP6DdP5LHRqlu', 1, '172.23.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiejVKcHpITEZoNm5hTDhGOWU5UzdYYmNzQlF4U29yQnN6SDVnRmw4TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwNi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1754749317),
('L5bf8TYJ94xPt7wMzjSTC9MoEcN6DE5T8yFc5Nmn', NULL, '172.23.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajEwbFhnTUN1SWRQQUtzaE00OFdwcHBlVzhBSEd1QkQ3UDdBOTBIWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwNi9sb2dpbiI7fX0=', 1754752351);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_nota` tinyint NOT NULL,
  `diskon` smallint DEFAULT '0',
  `path_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_kartu_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_perusahaan`, `alamat`, `telepon`, `tipe_nota`, `diskon`, `path_logo`, `path_kartu_member`, `created_at`, `updated_at`) VALUES
(1, 'Toko Ku', 'Jl. Pendidikan, Gg Pelajar', '08999999999', 1, 5, '/img/logo.png', '/img/member.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Grosir Indo', 'Jl. Perhubungan Medan', '08123456', '2025-08-09 14:33:21', '2025-08-09 14:33:21'),
(2, 'PT Sumber Makmur', 'Jl. Industri No.12 Jakarta', '081222333444', '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(3, 'CV Maju Bersama', 'Jl. Pahlawan No.45 Surabaya', '081355566677', '2025-08-09 14:43:29', '2025-08-09 14:43:29'),
(4, 'PT Elektronik Jaya', 'Jl. Sudirman No.100 Bandung', '081277788899', '2025-08-09 14:44:23', '2025-08-09 14:44:23'),
(5, 'CV Sejahtera Bersama', 'Jl. Merdeka No.45 Yogyakarta', '081399944455', '2025-08-09 14:44:23', '2025-08-09 14:44:23'),
(6, 'PT Dapur Makmur', 'Jl. Gatot Subroto No.20 Medan', '082112223334', '2025-08-09 14:44:23', '2025-08-09 14:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int UNSIGNED NOT NULL,
  `id_produk` int UNSIGNED NOT NULL,
  `id_kategori` int UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `merk`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'P000002', 'coklat batang', 'Silver Quenn', 10000, 16, '2025-08-09 14:33:52', '2025-08-09 14:38:19'),
(2, 1, 1, 'P000001', 'Keripik Kentang', 'Chitato', 2000, 8, '2025-08-09 14:34:01', '2025-08-09 14:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint NOT NULL DEFAULT '0',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `level`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$10$uBG2e0hn7C0Odjg5iFPBd.4VEcCUOPd4l6RiEPGtXjOLZ5YGfUlOa', '/img/user.jpg', 1, NULL, NULL, NULL, NULL, NULL, '2025-08-09 14:20:40', '2025-08-09 14:20:40'),
(2, 'Kasir 1', 'kasir1@gmail.com', NULL, '$2y$10$ZXgQUxuC3o9MfdjBAp2JCeDgnALyBZ6wXxyb15HE.TTe79dRezwXu', '/img/user.jpg', 2, NULL, NULL, NULL, NULL, NULL, '2025-08-09 14:20:40', '2025-08-09 14:20:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `member_kode_member_unique` (`kode_member`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id_pembelian_detail`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `produk_nama_produk_unique` (`nama_produk`),
  ADD UNIQUE KEY `produk_kode_produk_unique` (`kode_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `toko_kode_produk_unique` (`kode_produk`),
  ADD UNIQUE KEY `toko_nama_produk_unique` (`nama_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id_pembelian_detail` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
