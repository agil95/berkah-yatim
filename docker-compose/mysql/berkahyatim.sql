-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 09:41 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berkahyatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jkel` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `jkel`, `role_id`) VALUES
(14, 'Hendrik', 'drikdoank@gmail.com', '082344949505', 'fotoadmin/bpjLgHILH7MNK0BkX4PqoI7sT7FwasDza4iFxlVI.png', NULL, '$2y$10$CCaZjRiUh5nmylH19t0A9Od0agA9ozSsYrptKyacX3kcfAgYLzv.i', NULL, '2019-03-29 19:35:25', '2020-05-07 02:03:15', 'L', 1),
(15, 'Fahri', 'fahri@gmail.com', '08873827381', 'fotoadmin/WHS4qNKqoHJj9OJeUNuZlzEFqrYoTKdvn8pPfQeT.jpeg', NULL, '$2y$10$RisK3wsJGAzrGxJ7wYVw4e5RljGIWlrvXwe8rcT4isXehZB9KaGvW', NULL, '2020-09-17 04:31:11', '2020-09-17 04:39:48', 'L', 6);

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfer_logs`
--

CREATE TABLE `bank_transfer_logs` (
  `id` int(11) NOT NULL,
  `donasi_id` int(11) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_transfer_logs`
--

INSERT INTO `bank_transfer_logs` (`id`, `donasi_id`, `account_number`, `account_name`, `date`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 78, '1660002342723', 'MUHAMMAD FARIZ', '2020-06-03 00:00:00', 'PRMA CR Transfer 1660002342723 5379412032631730 S1ACMB9503/248341 /PRM-M-BCA', 50601, '2020-06-03 16:31:05', '2020-06-03 16:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `nama`, `link`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 'Banner 1', 'bersamayatim', 'fotobanner/VVhQT4A6eDIMW5rxgfsAdVDBhfvn70cY50ZyLUki.jpeg', 'active', 14, 'Hendrik', '2019-03-30 22:34:40', '2020-09-02 11:54:18'),
(11, 'Banner 2', 'lawan-corona', 'fotobanner/796avNaxun6e8sZDYA1kqyLZO0duldqIJyehkvko.jpeg', 'active', 14, 'Hendrik', '2019-04-03 03:21:20', '2020-09-02 11:54:30'),
(13, 'Banner 4', 'wakaf-masjid-al-barokah', 'fotobanner/BQTtLUFcEVxou3ANwSGAhsnE6t6SjmyE7Cnkvrm5.jpeg', 'active', 14, 'Hendrik', '2020-05-07 09:42:44', '2020-09-02 11:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswas`
--

CREATE TABLE `beasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_persemester` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `lama` int(11) NOT NULL,
  `pendidikan` enum('S1','D3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kampus` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkel` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donasis`
--

CREATE TABLE `donasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) UNSIGNED DEFAULT NULL,
  `campaign_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ref` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donasis`
--

INSERT INTO `donasis` (`id`, `nama`, `email`, `nohp`, `confirm_by`, `status`, `jumlah`, `foto`, `created_at`, `updated_at`, `mitra_id`, `campaign_id`, `campaign_type`, `type`, `invoice`, `url`, `snap_token`, `message`, `ref`) VALUES
(1, 'Hendrik', NULL, '088211984956', 14, 'success', 50, NULL, '2020-05-12 15:20:00', '2020-09-03 07:47:48', 4, 1, 'proker', 'gopay', 'INV-00000001', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, '2724384e456633d769110df40f9d83c7'),
(2, 'Tonkotsu Chashu Ramen 2', NULL, '088211984953', NULL, 'success', 100, NULL, '2020-05-12 15:35:10', '2020-05-12 15:35:10', 4, 1, 'proker', 'gopay', 'INV-00000001', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'b96097dabeb57f7e28722048eebfa4cc'),
(3, 'Jayantika Fitriana', 'jayantika.fitriana@gmail.com', '08823456378', NULL, 'success', 10, NULL, '2020-05-12 15:42:19', '2020-05-12 15:42:19', 4, 1, 'proker', 'gopay', 'INV-00000002', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'ce00abff6f5a58d25edaa2633b360006'),
(4, 'Jayantika Fitriana', 'jayantika.fitriana@gmail.com', '088231322323', NULL, 'success', 250, NULL, '2020-05-12 16:02:08', '2020-05-12 16:02:08', 4, 1, 'proker', 'echannel', 'INV-00000003', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, '24ebf9baeaf646c908d4e6a0a6bd0177'),
(5, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '8112233176', NULL, 'success', 10, NULL, '2020-05-12 16:41:02', '2020-05-12 16:41:02', 4, 1, 'proker', 'bca', 'INV-00000004', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'b06df86e9a5e275efe4670cce265c1bc'),
(7, 'Hendrik', 'drikdoank@gmail.com', '088211984956', 14, 'pending', 50000, NULL, '2020-05-13 04:00:14', '2020-09-12 15:40:03', 4, 1, 'proker', 'gopay', 'INV-00000005', 'bermanfaat-bagi-dunia-akhirat', 'a26e0f90-ebf7-40d7-8a64-ef514a17380e', NULL, 'f2353f01120fa43f44fdfed2129bbff8'),
(8, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'success', 10000, NULL, '2020-05-13 06:21:04', '2020-05-13 06:21:05', 5, 4, 'proker', 'gopay', 'INV-00000007', 'berbagi-beasiswa', '220626d8-5d23-4b9c-b48e-4fe56de459e2', NULL, '3522f5eada7220f448ab008aeee1c96e'),
(9, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'success', 10000, NULL, '2020-05-13 06:22:34', '2020-05-13 06:22:35', 4, 2, 'proker', 'bca', 'INV-00000008', 'beramal-quran', 'e3d5b27b-3d4d-42c0-92f7-fd328b49433a', NULL, '9d6ef2c0752840b5343acb3354d73f39'),
(10, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'verified', 50000, NULL, '2020-05-13 08:52:53', '2020-05-22 19:45:34', 5, 3, 'proker', 'gopay', 'INV-00000009', 'lawan-corona', 'bf4e858d-ba62-403b-84a0-f5f7923fb6fc', NULL, '8343a511d16e1ab07546e78414b35be5'),
(11, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'cancel', 50000, NULL, '2020-05-13 09:02:22', '2020-05-22 19:45:43', 5, 3, 'proker', 'echannel', 'INV-00000010', 'lawan-corona', '0b3cd696-99c3-4d51-9329-b3c7a201a7d9', NULL, '718ca220222731d4e203f4d558e44538'),
(12, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-13 09:03:53', '2020-05-13 09:05:05', 4, 2, 'proker', 'va-bni', 'INV-00000011', 'beramal-quran', 'e6528a3a-33b1-495e-83be-dd38624fc46d', NULL, 'ac4c117baed7c5f6339364a39482c066'),
(13, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 50000, NULL, '2020-05-13 15:47:00', '2020-05-13 15:47:45', 4, 2, 'proker', 'bni_va', 'INV-00000012', 'beramal-quran', 'ed48adbc-66a2-435a-8e40-55c9951f4c9a', NULL, 'a8e3aa5a66bd8a0ee6c8d01f6bbf4c38'),
(14, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-13 15:50:36', '2020-05-16 14:30:02', 5, 3, 'proker', 'gopay', 'INV-00000013', 'lawan-corona', 'a2e53d85-01ec-4ff8-92f5-9271391f4a8b', NULL, '534b0f7a4b283072fb1a74552bf40ba6'),
(15, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-13 16:11:01', '2020-05-13 16:12:13', 5, 5, 'proker', 'bni_va', 'INV-00000014', 'pakaian-layak-gaza', '828dc1d9-6656-4a85-9b8f-1e3fd11453a7', NULL, '7fea6b881978bc379713149125eb91b2'),
(16, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'success', 10000, NULL, '2020-05-14 05:16:47', '2020-05-15 12:17:24', 4, 2, 'proker', 'bca', 'INV-00000015', 'beramal-quran', '65c8113d-54c3-40ab-a68a-ffbfdd8ebe2a', NULL, '23c269ad5fe612c672261ec28619ba67'),
(17, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-14 05:24:41', '2020-05-14 05:51:07', 4, 2, 'proker', 'gopay', 'INV-00000016', 'beramal-quran', '79ad1b9d-2a5a-4c4d-9163-a5ee9f0d31f3', NULL, 'a662fb378a39315008c250b725354eaf'),
(18, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 16:10:43', '2020-05-14 16:14:14', 4, 1, 'proker', 'va-bni', 'INV-00000017', 'bermanfaat-bagi-dunia-akhirat', '3d7efc20-4c9f-4425-9ea5-64443467042d', NULL, '7e6455caced3a7c30a4157c176e5dd8a'),
(19, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 16:22:34', '2020-05-14 16:51:31', 5, 3, 'proker', 'bca', 'INV-00000018', 'lawan-corona', '2af1874b-5d3e-4c83-bb3d-f39aad74b11e', NULL, '08d4999539c040ec04a53398e99bbcc9'),
(20, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 100000, NULL, '2020-05-14 16:36:32', '2020-05-14 16:54:06', 5, 5, 'proker', 'bca', 'INV-00000020', 'pakaian-layak-gaza', '54c28cf2-bdc2-476a-bb58-7cfbd6846284', NULL, '6ac611627c42941a4d053dcaf325059b'),
(21, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 17:02:01', '2020-05-14 17:06:47', 5, 4, 'proker', 'bca', 'INV-00000021', 'berbagi-beasiswa', '1bdb5aff-9015-4284-9c11-6ec3b4ca1163', NULL, '90db2565ced2b2cdaa6da86ef2181925'),
(22, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-14 17:36:34', '2020-05-14 17:38:04', 4, 1, 'proker', 'va-bni', 'INV-00000022', 'bermanfaat-bagi-dunia-akhirat', '9c693609-5883-4174-be4f-82932ca72842', NULL, '2c95072432db93c127be4a49c3cda82f'),
(29, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-14 17:36:34', '2020-05-14 17:38:04', 4, 1, 'proker', 'va-bni', 'INV-00000029', 'bermanfaat-bagi-dunia-akhirat', '9c693609-5883-4174-be4f-82932ca72842', NULL, 'd2e229d3ad4dd64619cb887cbfb243c5'),
(30, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 17:02:01', '2020-05-14 17:06:47', 5, 4, 'proker', 'bca', 'INV-00000030', 'berbagi-beasiswa', '1bdb5aff-9015-4284-9c11-6ec3b4ca1163', NULL, '91ea4317c400cd237c72160f6b92f758'),
(31, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 100000, NULL, '2020-05-14 16:36:32', '2020-05-14 16:54:06', 5, 5, 'proker', 'bca', 'INV-00000031', 'pakaian-layak-gaza', '54c28cf2-bdc2-476a-bb58-7cfbd6846284', NULL, '1c76b8cdc9bc3473be8bf784856bdfd3'),
(32, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 16:22:34', '2020-05-14 16:51:31', 5, 3, 'proker', 'bca', 'INV-00000032', 'lawan-corona', '2af1874b-5d3e-4c83-bb3d-f39aad74b11e', NULL, '43baf28ad2992f1265f4e07e7c57c17a'),
(33, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 16:22:34', '2020-05-14 16:51:31', 5, 3, 'proker', 'bca', 'INV-00000033', 'lawan-corona', '2af1874b-5d3e-4c83-bb3d-f39aad74b11e', NULL, 'cd6badbe9e7c5237a41594164fe19edb'),
(34, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 100000, NULL, '2020-05-14 16:36:32', '2020-05-14 16:54:06', 5, 5, 'proker', 'bca', 'INV-00000034', 'pakaian-layak-gaza', '54c28cf2-bdc2-476a-bb58-7cfbd6846284', NULL, 'c74cfef79a439cf83609ee16d58e4c5f'),
(35, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-14 17:02:01', '2020-05-14 17:06:47', 5, 4, 'proker', 'bca', 'INV-00000035', 'berbagi-beasiswa', '1bdb5aff-9015-4284-9c11-6ec3b4ca1163', NULL, 'fd22f9561525394f6da39edfcac00fb1'),
(36, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-14 17:36:34', '2020-05-14 17:38:04', 4, 1, 'proker', 'va-bni', 'INV-00000036', 'bermanfaat-bagi-dunia-akhirat', '9c693609-5883-4174-be4f-82932ca72842', NULL, '441e7ae4bfb2a2e1efdb915ee2ff2fa1'),
(37, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-16 17:36:34', '2020-05-16 17:38:04', 4, 1, 'proker', 'va-bni', 'INV-00000037', 'bermanfaat-bagi-dunia-akhirat', '9c693609-5883-4174-be4f-82932ca72842', NULL, '1cb8e27b98b8f9bdb1b88590d09fe3ae'),
(43, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-16 14:44:57', '2020-05-16 14:47:18', 4, 1, 'proker', 'permata_va', 'INV-00000038', 'bermanfaat-bagi-dunia-akhirat', 'f9a44f4e-8321-4fdc-b6a3-289945a9a382', NULL, '6056a2f56b177f16d06031a76b5d01e3'),
(46, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-16 14:53:30', '2020-05-16 14:59:54', 4, 2, 'proker', 'bni_va', 'INV-00000044', 'beramal-quran', '854fb045-cbcd-475c-8953-b37ae43cb45b', NULL, '5d407219e902e5eb036a8703e91ff02c'),
(47, 'Berkah Yatim', 'brkah.yatim@gmail.com', '088234567281', NULL, 'success', 10000, NULL, '2020-05-17 10:36:35', '2020-05-17 10:37:41', 4, 2, 'proker', 'bni_va', 'INV-00000047', 'beramal-quran', 'a6299823-61a1-41f5-bb32-5b2c7f241905', NULL, 'efa65b0b54bf39c1fc5bc2566bab75b3'),
(48, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'success', 10000, NULL, '2020-05-17 16:45:04', '2020-05-17 17:05:21', 4, 1, 'proker', 'bca_va', 'INV-00000048', 'bermanfaat-bagi-dunia-akhirat', '140f7541-351b-493f-bb06-489f9c81ed01', NULL, '513b5e5b9229bfad8c6cb68c3ed57479'),
(49, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'success', 10000, NULL, '2020-05-17 17:11:07', '2020-05-18 17:11:27', 4, 2, 'proker', 'bca_va', 'INV-00000049', 'beramal-quran', 'a990fa92-602d-4806-833c-046889cefe3c', NULL, '1d7667e2cac4bf983e1247e9170e5cf0'),
(50, 'Hendrik', 'drikdoank@gmail.com', '0892892839121', NULL, 'success', 50000, NULL, '2020-05-21 08:54:59', '2020-05-21 22:42:34', 5, 5, 'proker', 'bni_va', 'INV-00000050', 'pakaian-layak-gaza', '71623c91-78bf-4a57-9d0c-869405176d41', NULL, '7114eabc8c6fd674c6eeeee2a876b700'),
(51, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-21 12:32:50', '2020-05-22 19:46:18', 4, 1, '10', 'bni_va', 'INV-00000051', 'bersamayatim', '1ae90cbc-98ab-4d56-95fc-87216d69ae4d', 'semoga barokah', '655740e2dcb229dd0adcedbcfb0e14a2'),
(52, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-21 19:24:19', '2020-05-22 13:14:58', 4, 11, '13', 'bni_va', 'INV-00000052', 'wakaf-masjid-al-barokah', '794600d3-ef67-40d9-95c2-a69c71ad4d79', NULL, '6642bc3bab7bcf5d777895817481c71b'),
(53, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', 14, 'success', 50506, 'buktidonatur/3JteY7pq6VfmTWYfMJQ4SYjVaL4xdbYVDbOS36bd.png', '2020-05-21 19:25:00', '2020-06-28 07:37:30', 4, 11, '13', 'manual', 'INV-00000053', 'wakaf-masjid-al-barokah', NULL, NULL, '63d83528607ef6670b71dce997a77a8a'),
(54, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10554, NULL, '2020-05-21 19:59:20', '2020-05-21 19:59:20', 4, 2, '10', 'bca', 'INV-00000054', 'beramal-quran', NULL, NULL, '618582c7eda4c87dcc6cdaf28f389fc9'),
(55, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10818, NULL, '2020-05-21 20:01:32', '2020-05-21 20:01:39', 4, 1, '10', 'bca', 'INV-00000055', 'bersamayatim', NULL, NULL, 'b131491afc35b446bb12fdad677d6a19'),
(56, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10809, NULL, '2020-05-21 20:01:58', '2020-05-21 20:01:58', 4, 1, '10', 'bca', 'INV-00000056', 'bersamayatim', NULL, NULL, 'b14e7e0734c44fe64deb76b3df4084c2'),
(57, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10818, NULL, '2020-05-21 20:04:04', '2020-05-21 20:04:04', 4, 1, '10', 'bca', 'INV-00000057', 'bersamayatim', NULL, NULL, 'e0d95ba72643a524002a71f738f7df6e'),
(58, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10042, NULL, '2020-05-22 13:14:32', '2020-05-22 13:14:32', 4, 1, '10', 'bri', 'INV-00000058', 'bersamayatim', NULL, NULL, 'afc72ed33b41cb0ce5d373fe950b72a8'),
(60, 'Mastur Google\"><img src=sx onerror=alert(document.domain)>', 'kitacaribug@gmail.com', '081286006806', NULL, 'success', 100000, NULL, '2020-05-22 19:32:24', '2020-05-22 21:43:34', 4, 1, '10', 'gopay', 'INV-00000059', 'bersamayatim', 'acd81ba6-6050-4e52-a258-d38c4699bac0', NULL, '5798f6ab960e2744c43a7ccbbac2012f'),
(66, 'Mastur Google', 'kitacaribug@gmail.com', '081286006806', NULL, 'success', 1000, NULL, '2020-05-22 19:43:31', '2020-05-22 21:23:39', 4, 10, '11', 'bni_val', 'INV-00000066', 'zakat-fitrah-untuk-semua', '64b0733a-0b8e-4162-ad2f-5feaff914cf3', NULL, '4c226b33f49c51d6f1c3ae93e5091bb4'),
(67, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 21:19:22', '2020-05-22 21:24:18', 5, 5, '10', 'gopay', 'INV-00000067', 'pakaian-layak-gaza', 'fa2e4196-8b4c-477b-8d84-0c2ba9cd385f', NULL, '6eaf07b4c43efb0780c87aa4320114dc'),
(70, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 21:28:38', '2020-05-23 21:28:53', 4, 2, '10', 'bca_va', 'INV-00000068', 'beramal-quran', 'f67b1ffa-a6c1-48db-a95e-19460d1f9985', NULL, '314a879aa203ab70564f970c3892fc53'),
(71, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'success', 10681, NULL, '2020-05-22 21:30:57', '2020-05-22 21:30:57', 4, 2, '10', 'bca', 'INV-00000071', 'beramal-quran', NULL, 'Halo', 'd58da98f6c3245e1b3901950b8d3db28'),
(72, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'success', 10000, NULL, '2020-05-22 21:31:23', '2020-05-23 21:31:43', 4, 2, '10', 'bca_va', 'INV-00000072', 'beramal-quran', 'e0e51479-2771-462c-b2c0-4d629043bf83', 'Halo', '66dfec46bf0cca129e531c54b6349de7'),
(73, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'success', 10000, NULL, '2020-05-22 21:32:03', '2020-05-22 21:32:22', 4, 2, '10', 'gopay', 'INV-00000073', 'beramal-quran', '97c4edf0-5553-46bb-83f5-cf7da14b63dd', 'Halo', 'b294dc125d041cb2871d95960645b25a'),
(74, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 21:37:51', '2020-05-23 21:38:03', 4, 1, '10', 'echannel', 'INV-00000074', 'bersamayatim', '90f881d2-29d9-41af-bbaf-fa9760650f90', NULL, '94ceb64efcfcd2e9420d9bb8a86ce093'),
(75, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:26:00', '2020-05-23 16:59:04', 4, 2, '10', 'bni_va', 'INV-00000075', 'beramal-quran', '0272119b-7eb0-472d-b36d-2524a5b1148c', NULL, '56d2a3dc6447bda39210bdc16f512cb7'),
(76, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:37:09', '2020-05-23 16:57:51', 5, 5, '10', 'bni_va', 'INV-00000076', 'pakaian-layak-gaza', 'c855bbe3-f663-492c-9f4d-9bcd51226737', NULL, 'bc874a61a948f1adefdb39900989abe9'),
(77, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:47:10', '2020-05-23 16:56:27', 4, 1, '10', 'bni_va', 'INV-00000077', 'bersamayatim', '8f127f4f-92de-4b32-8dd2-26aa0a699bbe', NULL, '37d93fa90995d308a908e217c78541a2'),
(78, 'Transfer Moota', 'muhafariz@gmail.com', '082110671277', NULL, 'success', 50601, NULL, '2020-06-03 15:52:16', '2020-06-03 16:35:11', 4, 2, '10', 'bca', 'INV-00000078', 'beramal-quran', NULL, 'Semoga berhasil testingnya, Aamiin', '174667470f1546ac3cf76df16aac01ef'),
(79, 'Hendrik', 'drikdoank@gmail.com', '08998789656', 14, 'success', 10000, 'buktidonatur/nCnyQCFOJnoazdYXileLmgphLCRaQZEc6IOtWMXT.png', '2020-06-21 07:32:20', '2020-06-28 07:37:45', 4, 1, '14', 'manual', 'INV-00000079', 'bersamayatim', '4aeb8530-54b0-4670-b222-a7c9193c5db8', NULL, '0c2ba02290839e1af87bf13ff977e7ae'),
(80, 'Hendrik', 'drikdoank@gmail.com', '08998789653', NULL, 'success', 10405, NULL, '2020-06-21 07:44:57', '2020-06-21 07:45:05', 4, 2, '14', 'bca', 'INV-00000080', 'beramal-quran', NULL, NULL, '6462e6a30362c2d3fe00504b1476d779'),
(81, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'success', 10000, NULL, '2020-06-23 07:27:38', '2020-06-23 07:27:39', 4, 1, '14', 'bni_va', 'INV-00000081', 'bersamayatim', 'ef07cde1-2d39-4c1e-b420-73e64de85787', NULL, '2aea952ba91ed2a6e9b1dafcac32ea45'),
(84, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'success', 10211, NULL, '2020-09-03 03:39:50', '2020-09-03 03:39:57', 5, 5, '14', 'bca', 'INV-00000082', 'pakaian-layak-gaza', NULL, NULL, '1f63c11094192c6640ff9dcd2717ad2f'),
(85, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'success', 10300, NULL, '2020-09-03 08:26:35', '2020-09-03 08:26:35', 5, 5, '14', 'bca', 'INV-00000085', 'pakaian-layak-gaza', NULL, NULL, '14c8656779126d19ee9a6de3b5e207d9');

-- --------------------------------------------------------

--
-- Table structure for table `donasiusers`
--

CREATE TABLE `donasiusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('sampai','belum','proses') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) UNSIGNED DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `campaign_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategories`
--

CREATE TABLE `kategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_button` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategories`
--

INSERT INTO `kategories` (`id`, `nama`, `nama_button`, `link`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'Donasi', 'Donasi Sekarang', 'donasi', 'fotokategori/3VfwfUtMTIaDbVGUw1k4ooFATHjmWgcuqol9jQ5v.svg', 'active', 14, 'Hendrik', '2020-06-18 13:38:22', '2020-09-10 01:59:47'),
(15, 'Bencana', 'Donasi Sekarang', 'wakaf-masjid', 'fotokategori/EA3AU9kvAZi1rt1gLmZtRMWyjnSdzs1MxtvTpZOz.svg', 'active', 14, 'Hendrik', '2020-06-18 13:38:46', '2020-09-10 02:00:26'),
(16, 'Zakat', 'Zakat Sekarang', 'zakat-fitrah', 'fotokategori/KOhO3Ir5jjs9oHfFQgbMoGgBWQWrvNnPbAgd09Yr.svg', 'active', 14, 'Hendrik', '2020-06-18 13:39:04', '2020-09-10 02:01:50'),
(17, 'Medis', 'Bantu Sekarang', 'berbagi-beasiswa', 'fotokategori/Q3dS0d6LDbzIz34MBX7hBvBN9rE4I9HQ2pqVcFPp.svg', 'active', 14, 'Hendrik', '2020-06-18 13:39:31', '2020-09-10 02:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `kegiataninfaks`
--

CREATE TABLE `kegiataninfaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_real` int(10) NOT NULL,
  `day_left` int(10) NOT NULL,
  `day` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa fa-circle-o',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent_id`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', NULL, 'admin', 'fa fa-pie-chart', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(2, 'Manage Donasi', NULL, NULL, 'fa fa-dollar', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(3, 'Donasi Donatur', 2, 'admin/manage-donasi-user', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(4, 'Donasi NGO', 2, 'admin/manage-donasi-ngo', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(5, 'Manage Payment', NULL, NULL, 'fa fa-credit-card', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(6, 'Verifikasi Pembayaran Manual', 5, 'admin/manage-donasi-manual', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(7, 'Manage Status Pembayaran', 5, 'admin/manage-donasi-status', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(8, 'Manage Metode Pembayaran', 5, 'admin/manage-rekening', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(9, 'Manage Kategori', NULL, 'admin/manage-kategori', 'fa fa-th-large', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(10, 'Manage Banner', NULL, 'admin/manage-banner', 'fa fa-image', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(11, 'Manage Campaign', NULL, 'admin/manage-campaign', 'fa fa-flag', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(12, 'Manage Mitra', NULL, 'admin/manage-mitra', 'fa fa-users', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(13, 'Manage Donatur', NULL, NULL, 'fa fa-user', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(14, 'Data Donatur', 13, 'admin/manageuser', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(15, 'Admin Roles', NULL, NULL, 'fa fa-users', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(16, 'Admin', 15, 'admin/manageadmin', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(17, 'User Role', 15, 'admin/user_role', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(18, 'Menu', 15, 'admin/menu', 'fa fa-circle-o', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(19, 'Penyaluran', NULL, 'admin/penyaluran', 'fa fa-google-wallet', '2020-09-17 14:37:40', '2020-09-17 14:37:40'),
(20, 'Laporan', NULL, 'admin/laporan', 'fa fa-clipboard', '2020-09-17 14:37:40', '2020-09-17 16:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(78, '2020_09_01_231512_create_admins_table', 0),
(79, '2020_09_01_231512_create_bank_transfer_logs_table', 0),
(80, '2020_09_01_231512_create_banners_table', 0),
(81, '2020_09_01_231512_create_beasiswas_table', 0),
(82, '2020_09_01_231512_create_donasis_table', 0),
(83, '2020_09_01_231512_create_donasiusers_table', 0),
(84, '2020_09_01_231512_create_kategories_table', 0),
(85, '2020_09_01_231512_create_kegiataninfaks_table', 0),
(86, '2020_09_01_231512_create_mitras_table', 0),
(88, '2020_09_01_231512_create_penyalurans_table', 0),
(89, '2020_09_01_231512_create_prokers_table', 0),
(90, '2020_09_01_231512_create_rekenings_table', 0),
(91, '2020_09_01_231512_create_social_facebook_accounts_table', 0),
(92, '2020_09_01_231512_create_totaldonasis_table', 0),
(93, '2020_09_01_231512_create_ukms_table', 0),
(94, '2020_09_01_231512_create_user_activations_table', 0),
(95, '2020_09_01_231512_create_users_table', 0),
(96, '2020_09_01_231514_add_foreign_keys_to_beasiswas_table', 0),
(97, '2020_09_01_231514_add_foreign_keys_to_donasis_table', 0),
(98, '2020_09_01_231514_add_foreign_keys_to_donasiusers_table', 0),
(99, '2020_09_01_231514_add_foreign_keys_to_kegiataninfaks_table', 0),
(100, '2020_09_01_231514_add_foreign_keys_to_mitras_table', 0),
(101, '2020_09_01_231514_add_foreign_keys_to_penyalurans_table', 0),
(102, '2020_09_01_231514_add_foreign_keys_to_ukms_table', 0),
(103, '2020_09_01_231514_add_foreign_keys_to_users_table', 0),
(104, '2020_09_01_231512_create_password_resets_table', 1),
(105, '2020_09_02_195015_create_admins_table', 2),
(106, '2020_09_02_195015_create_bank_transfer_logs_table', 2),
(107, '2020_09_02_195015_create_banners_table', 2),
(108, '2020_09_02_195015_create_beasiswas_table', 2),
(109, '2020_09_02_195015_create_donasis_table', 2),
(110, '2020_09_02_195015_create_donasiusers_table', 2),
(111, '2020_09_02_195015_create_kategories_table', 2),
(112, '2020_09_02_195015_create_kegiataninfaks_table', 2),
(113, '2020_09_02_195015_create_mitras_table', 2),
(114, '2020_09_02_195015_create_password_resets_table', 2),
(115, '2020_09_02_195015_create_penyalurans_table', 2),
(116, '2020_09_02_195015_create_prokers_table', 2),
(117, '2020_09_02_195015_create_rekenings_table', 2),
(118, '2020_09_02_195015_create_social_facebook_accounts_table', 2),
(119, '2020_09_02_195015_create_totaldonasis_table', 2),
(120, '2020_09_02_195015_create_ukms_table', 2),
(121, '2020_09_02_195015_create_user_activations_table', 2),
(122, '2020_09_02_195015_create_users_table', 2),
(123, '2020_09_02_195016_add_foreign_keys_to_beasiswas_table', 2),
(124, '2020_09_02_195016_add_foreign_keys_to_donasis_table', 2),
(125, '2020_09_02_195016_add_foreign_keys_to_donasiusers_table', 2),
(126, '2020_09_02_195016_add_foreign_keys_to_kegiataninfaks_table', 2),
(127, '2020_09_02_195016_add_foreign_keys_to_mitras_table', 2),
(128, '2020_09_02_195016_add_foreign_keys_to_penyalurans_table', 2),
(129, '2020_09_02_195016_add_foreign_keys_to_ukms_table', 2),
(130, '2020_09_02_195016_add_foreign_keys_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mitras`
--

CREATE TABLE `mitras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '1',
  `logo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitras`
--

INSERT INTO `mitras` (`id`, `nama`, `alamat`, `email`, `jumlah`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_verified`, `logo`) VALUES
(4, 'Hubb Giving', 'Jln. Paccerakkang, Daya', 'hub-giving@gmail.com', 23, 14, 'Hendrik', '2019-03-30 22:32:18', '2020-05-07 08:20:59', 1, 'fotomitra/Y9DGEFfm2wWVvmwTv22POo9suDmlzeFdBkRq4Bc3.jpeg'),
(5, 'BerkahYatim.com', 'Jl. Puri Raya 8 Kota Makassar', 'admin@amalsholeh.com', 85, 14, 'Hendrik', '2019-04-03 03:01:49', '2020-05-11 14:31:10', 1, 'fotomitra/zMFbJ7X8Ga0WsvwjudE66jJaKexus4OLKBpB729v.png'),
(6, 'Sedekah Akbar Indonesia', 'jl. Borong jambu, Antang. Kota Makassar', 'sedekahakbarindonesia@gmail.com', 40, 14, 'Hendrik', '2019-04-03 03:17:03', '2020-05-07 10:00:45', 1, 'fotomitra/4VKtJ8ocpaNdriJ7lgsJvbMJEDfVtQrAtaFQxkH3.jpeg'),
(7, 'Panti Asuhan Peduli Kasih', 'Jl. Bonto Duri 4 Setapak T/22 A', 'pedulikasih@gmail.com', 54, 14, NULL, '2019-04-03 09:09:40', '2019-04-03 09:09:40', 0, ''),
(8, 'Panti Asuhan Nurul Ichsan', 'Jl. Batua Raya No.12 A', 'Nurul@gmail.com', 36, 14, NULL, '2019-04-03 09:10:58', '2019-04-03 09:10:58', 0, ''),
(9, 'Wakaq', ',m', 'noreply.berkahyatim@gmail.com', 20, 14, NULL, '2020-06-28 06:12:00', '2020-06-28 06:12:00', 1, 'fotomitra/svNn5WBy3HLfYwgN08v1p24ANebG2UALcQuei81f.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyalurans`
--

CREATE TABLE `penyalurans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penyaluran` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prokers`
--

CREATE TABLE `prokers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` decimal(10,0) NOT NULL,
  `urutan` int(11) UNSIGNED DEFAULT NULL,
  `target_date` datetime DEFAULT NULL,
  `fundriser_id` int(11) NOT NULL,
  `left_day` int(10) DEFAULT '0',
  `actual_earn` decimal(10,0) NOT NULL DEFAULT '0',
  `is_pilihan` int(11) NOT NULL DEFAULT '0',
  `is_urgent` tinyint(10) NOT NULL DEFAULT '0',
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prokers`
--

INSERT INTO `prokers` (`id`, `nama_kegiatan`, `tag`, `deskripsi`, `created_by`, `created_at`, `updated_at`, `dokumentasi`, `target`, `urutan`, `target_date`, `fundriser_id`, `left_day`, `actual_earn`, `is_pilihan`, `is_urgent`, `type`, `url`, `deleted_at`, `status`, `note`) VALUES
(1, 'BERMANFAAT BAGI DUNIA, BERNILAI AKHIRAT. UNTUK INDONESIA BAHAGIA Bersama BerkahYatim.com', 'Ayo #Beramal', '<p>Angkaterus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>\r\n\r\n<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>\r\n\r\n<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>\r\n\r\n<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 14, '2020-05-06 17:00:00', '2020-09-09 06:19:35', 'fotobeasiswa/4ZpoRmWPMyjd7BBXgYbdaG6FAYZXaYpFq9SheTjA.jpeg', '30000000', 1, '2020-09-09 00:00:00', 4, 0, '25000000', 0, 1, '14', 'bersamayatim', NULL, 0, '<p>aa</p>'),
(2, '#BeramalQuran Untuk Penghafal Quran di Pelosok Indonesia', 'sebarkan kebaikan', '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>\r\n\r\n<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>\r\n\r\n<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>\r\n\r\n<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>', 14, '2020-05-06 17:00:00', '2020-09-08 02:35:20', 'fotobeasiswa/myiWRkGM3wixJw6az8F8ThvOHKVEHJij5S49LNgY.jpeg', '23000000', 2, '2020-09-08 00:00:00', 4, 13, '13000000', 0, 1, '14', 'beramal-quran', NULL, 1, NULL),
(3, 'Lawan Corona Bantu Lindungi Tim Medis dan Masyarakat', 'besiswa,pendidikan', '<p>Kekhawatiran terhadap Virus COVID-19 ini membuat kita sebagai warga negara indonesia wajib untuk menjaga dan melindungi keluarga kita.</p>\r\n\r\n<p>Per hari ini&nbsp;(22/3) sudah terdapat 450 orang kasus positif terkena virus corona dan 38 orang meninggal dunia.</p>', 14, '2020-05-06 17:00:00', '2020-09-02 12:37:27', 'fotobeasiswa/SJwAgoN8i8kbdXc3Xr4gnSxIfDdbwSAa3eXz6TKE.jpeg', '150000000', 3, '2020-09-02 00:00:00', 5, 15, '50000000', 0, 1, '17', 'lawan-corona', NULL, 1, ''),
(4, 'Berbagi Beasiswa dan Biaya Pelatihan', 'Ayo bantu sekolah  pemuda cerdas bangsa', '<p>-</p>', 14, '2020-05-06 17:00:00', '2020-07-07 06:25:11', 'fotobeasiswa/sUoO0JwkzgoOYhByNa2XBVDnyz3ZnFoBX5t3vhQi.jpeg', '200000', 4, '2020-07-07 00:00:00', 5, 14, '6500000', 0, 1, '17', 'berbagi-beasiswa', NULL, 1, ''),
(5, 'Pakaian Layak Pakai Untuk Musim Dingin Gaza', 'Selamatkan Anak Gaza dari Musim Dingin', '<p>-</p>', 14, '2020-05-06 17:00:00', '2020-07-07 06:26:52', 'fotobeasiswa/PRZp7aHHegPK268NZzPWxTaWqczt61IIBz07MtmX.jpeg', '500000', 5, '2020-05-25 00:00:00', 5, 5, '3400000', 1, 1, '14', 'pakaian-layak-gaza', NULL, 1, ''),
(10, 'Zakat Fitrah untuk semua', 'zakat-fitrah', '<p>deskripsi</p>', 14, '2020-05-21 19:07:50', '2020-09-02 11:56:23', 'fotobeasiswa/B6gHHBB5CeS5S0BtOGhNinTmnqAWCqmBTZ1sy1hv.jpeg', '4500000', 6, '2020-09-02 00:00:00', 4, 8, '0', 1, 0, '15', 'zakat-fitrah-untuk-semua', NULL, 1, ''),
(11, 'Wakaf Masjid Al Barokah', 'Membangun rumah Allah', '<p>-#</p>', 14, '2020-05-21 19:21:57', '2020-09-02 11:58:37', 'fotobeasiswa/Y82DG0HDBOS41t2gbUeoTDu0NpbDGUip1LW4jzlo.jpeg', '54000000', 7, '2020-09-02 00:00:00', 4, 0, '0', 1, 0, '15', 'wakaf-masjid-al-barokah', NULL, 1, ''),
(12, 'BERMANFAAT BAGI DUNIA #2', 'bermanfaat', '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=sx onerror=alert(document.domain) /></p>', 29, '2020-05-22 19:54:03', '2020-05-22 21:27:28', 'fotobeasiswa/4yIK1IguwZ4dPGMPNNodt2njZL8VntUD2qpDcN5T.jpeg', '30000000', 8, '2020-07-31 00:00:00', 4, 69, '0', 0, 0, '10', 'bermanfaat-bagi-dunia---', '2020-05-22 21:27:28', 1, ''),
(13, 'aa', 'aa', '<p>apapun</p>', 14, '2020-09-04 07:31:00', '2020-09-09 03:12:16', 'fotoproker/hgyHtk5lNnQ6MikMizCzRhHPKTCPRS35Od18OpEw.jpeg', '400000', 12, '2020-09-09 00:00:00', 5, 0, '0', 0, 0, '15', 'aa', NULL, 1, '<p>aa</p>'),
(14, 'aa', 'aa', '<p>11</p>', 14, '2020-09-09 03:07:43', '2020-09-09 03:07:43', NULL, '10000', 11, '2020-09-09 00:00:00', 5, 0, '0', 0, 0, '14', 'aa', NULL, 1, '<p>11</p>');

-- --------------------------------------------------------

--
-- Table structure for table `rekenings`
--

CREATE TABLE `rekenings` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `moota_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekenings`
--

INSERT INTO `rekenings` (`id`, `tipe`, `bank`, `account`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `owner`, `branch`, `moota_id`) VALUES
(10, 'transfer_manual', 'bca', '7263781862', 'fotorekening/7QyFnWOhXSbc0QKmxvbBQd11vyAbK3ScBjSzoQNA.png', 1, 13, 'Hendrik', '2019-03-30 22:34:40', '2020-09-03 04:12:39', 'Yasan Berkah Yatim', 'KCP BCA Bogor', 'lmVz5Q95zvb'),
(11, 'transfer_manual', 'mandiri', '152415357', 'fotorekening/4votsPhK89uHyhrOxyfIgo9o7pEj75PMGmMHmhtM.png', 0, 14, 'Hendrik', '2019-04-03 03:21:20', '2020-09-03 04:08:13', 'Yasan Berkah Yatim', 'KCP Mandiri Bogor', 'lmVz5Q95zvb'),
(12, 'transfer_manual', 'bri', '862763722873', 'fotorekening/NeQaKyV4tiziDMKEdQctcgIkKvsL2JHE8OODTgJq.png', 1, 14, 'Hendrik', '2020-05-07 09:42:28', '2020-09-03 03:50:42', 'Yasan Berkah Yatim', 'KCP BRI Bogor', 'lmVz5Q95zvb'),
(13, 'transfer_manual', 'bni', '2627372637', 'fotorekening/xNY1xommeRQTh7Clfyj2ndhzrFrtPoQhO6COzcbj.png', 1, 14, 'Hendrik', '2020-05-07 09:42:44', '2020-09-03 03:52:36', 'Yasan Berkah Yatim', 'KCP BNI Bogor', 'lmVz5Q95zvb'),
(14, 'manual', 'manual', '-', 'fotorekening/oZmcyvp7dj0BX6SAVFX8xt7FaCLZvJzV9diOprdh.png', 1, 14, NULL, '2020-09-04 06:20:40', '2020-09-04 06:20:40', 'White Label', 'Jakarta', NULL),
(15, 'transfer_manual', 'OCBC', '29382939', 'fotorekening/xDTXyBH1zM0Iio1zSDAL34lJMkiqthUvow7gmBLn.png', 1, 14, 'Hendrik', '2020-09-04 06:28:12', '2020-09-04 06:28:46', 'White Label', 'Jakarta Selatan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_facebook_accounts`
--

CREATE TABLE `social_facebook_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_facebook_accounts`
--

INSERT INTO `social_facebook_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 22, '117930420757303325267', 'google', '2020-05-11 14:53:48', '2020-05-11 14:53:48'),
(2, 23, '116404567323500776932', 'google', '2020-05-12 15:41:35', '2020-05-12 15:41:35'),
(3, 24, '102435473127181104503', 'google', '2020-05-13 04:55:59', '2020-05-13 04:55:59'),
(4, 24, '102435473127181104503', 'google', '2020-05-13 06:17:20', '2020-05-13 06:17:20'),
(5, 21, '118139615404042064514', 'google', '2020-05-13 12:33:30', '2020-05-13 12:33:30'),
(6, 24, '102435473127181104503', 'google', '2020-05-13 15:08:01', '2020-05-13 15:08:01'),
(7, 22, '117930420757303325267', 'google', '2020-05-13 15:09:17', '2020-05-13 15:09:17'),
(8, 25, '102632616481219864540', 'google', '2020-05-13 15:12:17', '2020-05-13 15:12:17'),
(9, 22, '114731780233391', 'facebook', '2020-05-13 15:12:38', '2020-05-13 15:12:38'),
(10, 26, '3128562117183290', 'facebook', '2020-05-13 15:45:42', '2020-05-13 15:45:42'),
(11, 27, '10217234416600180', 'facebook', '2020-05-14 05:09:55', '2020-05-14 05:09:55'),
(12, 27, '113961207114208909689', 'google', '2020-05-14 05:11:51', '2020-05-14 05:11:51'),
(13, 21, '118139615404042064514', 'google', '2020-05-14 17:41:05', '2020-05-14 17:41:05'),
(14, 28, '10218415511921659', 'facebook', '2020-05-16 13:59:28', '2020-05-16 13:59:28'),
(15, 21, '118139615404042064514', 'google', '2020-05-16 14:47:20', '2020-05-16 14:47:20'),
(16, 24, '102435473127181104503', 'google', '2020-05-17 10:35:28', '2020-05-17 10:35:28'),
(17, 29, '107767219270082187892', 'google', '2020-05-22 19:25:07', '2020-05-22 19:25:07'),
(18, 30, '2396834753944449', 'facebook', '2020-05-22 21:26:10', '2020-05-22 21:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `totaldonasis`
--

CREATE TABLE `totaldonasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `total_tersalurkan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ukms`
--

CREATE TABLE `ukms` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_awal` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `dokumentasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `activated` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totaldonasi` int(11) DEFAULT NULL,
  `nohp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `donasi_awal` int(11) NOT NULL DEFAULT '0',
  `jkel` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birth_date`, `email`, `email_verified_at`, `activated`, `password`, `remember_token`, `created_at`, `updated_at`, `totaldonasi`, `nohp`, `foto`, `alamat`, `status`, `deleted_by`, `donasi_awal`, `jkel`) VALUES
(1, 'Hendrik', NULL, 'drikdoank2@gmail.com', '2020-05-07 00:56:35', '0', '$2y$10$1qyAaFNrtdSlhypKFCX.lu2Z.PCNDApNeW8uC.IJ186eBX6JZz2O6', 'zlc0n2uchGw1mlzedle9j32aQK7dZ0xFZ3hW9vCYlzEhAFNspv5DdJKoSgGI', '2020-05-07 00:56:35', '2020-05-09 16:56:42', 100000, '088211984956', 'fotouser/BjbELqaa3um6ql6DeuPRr1WjyBznOssm2R2BzikF.png', 'Bogor', 'inactive', NULL, 100000, 'L'),
(21, 'Tonkotsu Chashu Ramen', '2020-09-01', 'drikdoank1@gmail.com', '2020-09-13 13:43:14', '0', '$2y$10$v8G0IFa9XaieJWI//RZ89eax/EVAOuCUenHGMaN78Z9cClX.n3FEW', 'NdF8VSiQADv4ZN5eYFfCoHuAQUieTLdtNmhcs5obVuLpjVwfpo6FgyN0TQ1a', '2020-05-10 14:44:56', '2020-09-13 13:43:14', 125000, '081939303511', 'fotouser/lh8Blv3aCTcj0wQ0nXyHh0a0sqGefu7MVVb8ZChL.jpeg', 'Aku adalah anak ganteng', 'inactive', NULL, 0, 'L'),
(22, 'berkah yatim', NULL, 'noreply.berkahyatimold@gmail.com', '2020-05-11 14:53:48', 'google', '5837e05c0213dc1617e409543331442c', 'qRbzJUfEmc3NPX00icmSIAzDPYhLoUvUS70sjKHoYICyZAYHkywDxGo4zfbP', '2020-05-11 14:53:48', '2020-05-11 14:53:48', NULL, '', 'https://lh3.googleusercontent.com/-lvJJcwA46uA/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclT0HhVwJgCf1uMbEcbaA9O0NbDoQ/photo.jpg', '', 'inactive', NULL, 0, 'P'),
(23, 'Jayantika Fitriana', NULL, 'jayantika.fitriana.old@gmail.com', '2020-05-12 15:41:35', 'google', '0e1422ea79781ee046484893ce0010c4', '9RYGhHS9rVTWpvprKcmOROe4y6uav1vA7OtWfNY4biscqi6syzNwrwMPn2d7', '2020-05-12 15:41:35', '2020-05-12 15:41:35', NULL, '', 'https://lh6.googleusercontent.com/-r54fOHf-rmQ/AAAAAAAAAAI/AAAAAAAADds/AMZuucnxU4DTlQ-mqGtKkmoBMpF7BXXujA/photo.jpg', '', 'active', NULL, 0, 'P'),
(24, 'Berkah Yatim', NULL, 'brkah.yatim@gmail.com', '2020-05-13 04:55:59', 'google', 'e94fe9ac8dc10dd8b9a239e6abee2848', 'T79SoKw89yhPkZ2ZLAfnh0bd61NfMNLFBrvHe37qDLdBhgDoupSQ5IeSb6Xa', '2020-05-13 04:55:59', '2020-05-13 04:55:59', NULL, '', 'https://lh5.googleusercontent.com/-i0wgnFjHByc/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucl6jtiaf-7hw8xq_7FF1-85p-QR9Q/photo.jpg', '', 'active', NULL, 0, 'P'),
(25, 'Hendrik Hendrik', NULL, 'hendrik@tabsquare.com', '2020-05-13 15:12:17', 'google', '1d8c9f71eaa6923fc9d3cd5d10aea4ce', 'IjDpAroGcUUIXNiFa4RAMWv6CPX9TMGzdw6fiOiZ4MVfRetspkUzwNxlM4M2', '2020-05-13 15:12:17', '2020-05-13 15:12:17', NULL, '', 'https://lh6.googleusercontent.com/-yGhaZWKtfUc/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnzrO_aD610_TkzqsEzrGNfTfGqlw/photo.jpg', '', 'active', NULL, 0, 'P'),
(26, 'Hendrik', NULL, 'drik_jutsu@yahoo.co.id', '2020-05-13 15:45:42', 'facebook', '1b9a80606d74d3da6db2f1274557e644', 'P7AG0Dz7hClDNkQwWHhFh2SSJOF6bK101PweZ290g5rfxRZAh4GIT7colGFv', '2020-05-13 15:45:42', '2020-05-13 15:46:36', NULL, '088211984953', 'https://graph.facebook.com/v3.3/3128562117183290/picture?type=normal', 'Bogor', 'active', NULL, 0, 'L'),
(27, 'Fahri Amirullah', NULL, 'fahriamirullah@gmail.com', '2020-05-14 05:09:55', 'facebook', 'ab2ce2a4bbb59dab4f43dada87ef0e23', 'eR60zq45ao9zG2O7fzLTMs2sbSKfPdsSmu9Xb6aD7dTA8i0yu0WH6QOa34Jo', '2020-05-14 05:09:55', '2020-05-14 05:09:55', NULL, '', 'https://graph.facebook.com/v3.3/10217234416600180/picture?type=normal', '', 'active', NULL, 0, 'P'),
(28, 'Puspasari Respatiningtyas', NULL, 'puspasari_resti@yahoo.com', '2020-05-16 13:59:28', 'facebook', '2e3ae207832305b6a0bff2dbc8a18b90', NULL, '2020-05-16 13:59:28', '2020-05-16 13:59:28', NULL, '', 'https://graph.facebook.com/v3.3/10218415511921659/picture?type=normal', '', 'active', NULL, 0, 'P'),
(29, 'Mastur Google', NULL, 'kitacaribug@gmail.com', '2020-05-22 19:25:07', 'google', '$2y$10$Q37JRhq7HHcnODtaHRpuYuVQ6jHRA0uzn/INlLMUCk43biTT6OsGe', 'cyxaLMm1M70NYxxp97bTSUdi764vKsxS9gd2DPA2SSsfp8GNyMxLKpLdXoAN', '2020-05-22 19:25:07', '2020-05-22 22:24:41', NULL, '081286006806', 'https://lh3.googleusercontent.com/a-/AOh14GgGmSsbDL8-48Bhy7sMqouJaTST0d4kjWLzfckI', 'Jakarta', 'active', NULL, 0, 'P'),
(31, 'Hendrik', NULL, 'drikdoank123@gmail.com', NULL, NULL, '$2y$10$Vxiw5RvhOZaDhndyAUHf2uHkrxtkfJMhYkBZbzymRUFarOsH6rquu', NULL, '2020-06-18 13:54:02', '2020-06-18 13:54:02', NULL, '08998789656', NULL, NULL, 'inactive', NULL, 0, 'L'),
(32, '', NULL, '111@gmail.com', NULL, NULL, '$2y$10$s/ZEpy4SGjyVZLP57JehrumrRv.QUZhKbIYXjCfC0q1Ogh6uA/CyK', NULL, '2020-09-07 01:57:42', '2020-09-09 08:24:29', NULL, NULL, NULL, NULL, 'inactive', 14, 0, NULL),
(33, '', NULL, 'jayantika.fitriana@gmail.com', NULL, NULL, '$2y$10$CAX5bIl4Xl67ubD/yg9N4uZEU3Va/cmYZdMR4ls82dYc/EWBIehcC', NULL, '2020-09-09 03:39:07', '2020-09-09 08:23:40', NULL, NULL, NULL, NULL, 'inactive', 14, 0, NULL),
(41, '', NULL, 'noreply.berkahyatim@gmail.com', '2020-09-12 13:48:33', NULL, '$2y$10$uft9BqoWlbMiF1mkWF6K2u3uZgQTtpq0NrRkHaKklxdEz3o8.8cK6', '21LKuYimnb1z1FKNXo1v10hh7PKireB0Pr1GMsQj7l6isdQsrUHQMj1vpqTu', '2020-09-12 02:15:56', '2020-09-12 13:48:33', NULL, NULL, NULL, NULL, 'inactive', NULL, 0, NULL),
(47, '', NULL, 'dea.emildasavira@gmai.com', NULL, NULL, '$2y$10$OtHKQjhnXNk0TdAlNwPaCeNQd8KIgwbK2jLEqkHmmeU13oD4BFYDG', 'ubagtie3PWDEq0DewzxhLxQeDILClezpLlu3p00k9UnIZIBTGTGEUHHdt7Tf', '2020-09-15 05:53:12', '2020-09-15 05:53:12', NULL, NULL, NULL, NULL, 'inactive', NULL, 0, NULL),
(52, 'Hendrik Ganteng', '2020-09-15', 'drikdoank@gmail.com', NULL, NULL, '$2y$10$jk4TNJd7ryw6kL4B.YWox./rTOMSkCRtR3isf6YbrlxcgO3ZsZnfy', 'zJopv1v0gOHO6Cj4wcxPNA6EG5vpN5kfqdWZtIDBl4fC9TpfrmOQuNTqpQes', '2020-09-15 06:49:59', '2020-09-15 14:46:43', NULL, NULL, 'fotouser/2NYuPh0kZOH8AidIj62bb0vLuKqrR67oyBWz4qA5.jpeg', 'Terdampar di Ngawi', 'inactive', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`Id`, `user_id`, `token`, `created_at`, `activated`) VALUES
(28, 21, 'e0e54e68dace3136db7dc908d19704786ffdd988e2d5aa05fadf3daae83fb997', '2020-09-13 13:45:35', NULL),
(29, 42, '0aea35b019d60860c067f2e39b372533198ea013ef29ce37007b61c7d859bd2f', '2020-09-14 02:56:48', NULL),
(30, 43, '17aecb7616bf91b682983daf2f67b2690c9c94483cbad9193c7856fb84b62018', '2020-09-14 02:59:54', NULL),
(31, 44, '07580b68a4204ee881cb499fad011078b21b93deaf3e5936e8f2d08d73f5aff7', '2020-09-14 03:08:25', NULL),
(32, 45, 'ad9a1bfaa04a112128f09662eb6c43ed3683a48e5649bf5f5b92602fe92f99e0', '2020-09-14 03:13:24', NULL),
(34, 47, '993ee906b1db85a29fb756dfe41d295614faf6f3f571e6a52d1bd0276573a7f2', '2020-09-15 05:53:12', NULL),
(35, 48, 'e85afcf5e98b373079c32a8a7b686e660931f25b1cba72cc36698c01d7489762', '2020-09-15 06:26:39', NULL),
(36, 49, 'a2d239c13cba67e398f9bf8f36c52237173b6c49af244bbb64b623af1fa84b3c', '2020-09-15 06:33:18', NULL),
(37, 50, 'd302f00c9830bfea095251a62798b63a0d7976524cc26c18982ea9549d71c2e7', '2020-09-15 06:40:58', NULL),
(38, 51, '2c5f15d7f6a220c1d8335293d268c58813883742d57443cf98715f3459c82e85', '2020-09-15 06:41:34', NULL),
(39, 52, '8e27e255c5f0dcf65370971a3b11802da456acf076c08a12c74b9336ac2650f5', '2020-09-15 06:49:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `menu_ids` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `menu_ids`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2020-09-17 15:14:06', '2020-09-17 15:14:08'),
(2, 'Admin Pusat', '1,2,3,4,9,10,11,12,13,14,15,16,17,18,19,20', '2020-09-17 15:14:19', '2020-09-17 15:14:21'),
(3, 'Admin Cabang', '1,2,3', '2020-09-17 15:14:28', '2020-09-17 15:14:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admins_email_unique` (`email`) USING BTREE,
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `bank_transfer_logs`
--
ALTER TABLE `bank_transfer_logs`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `beasiswas_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `beasiswas`
--
ALTER TABLE `beasiswas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `beasiswas_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `beasiswas_id_mitra_foreign` (`id_mitra`) USING BTREE;

--
-- Indexes for table `donasis`
--
ALTER TABLE `donasis`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `donasis_confirm_by_foreign` (`confirm_by`) USING BTREE,
  ADD KEY `id` (`id`),
  ADD KEY `campaign_id` (`campaign_id`);

--
-- Indexes for table `donasiusers`
--
ALTER TABLE `donasiusers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `donasiusers_iduser_foreign` (`iduser`) USING BTREE,
  ADD KEY `donasiusers_confirm_by_foreign` (`confirm_by`) USING BTREE;

--
-- Indexes for table `kategories`
--
ALTER TABLE `kategories`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `beasiswas_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kegiataninfaks_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `id_mitra` (`id_mitra`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mitras`
--
ALTER TABLE `mitras`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `mitras_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penyalurans`
--
ALTER TABLE `penyalurans`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `penyalurans_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `prokers`
--
ALTER TABLE `prokers`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `prokers_created_by_foreign` (`created_by`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Indexes for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `bank` (`bank`),
  ADD UNIQUE KEY `account` (`account`),
  ADD KEY `beasiswas_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `totaldonasis`
--
ALTER TABLE `totaldonasis`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ukms`
--
ALTER TABLE `ukms`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ukms_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD KEY `users_deleted_by_foreign` (`deleted_by`) USING BTREE;

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD UNIQUE KEY `Id` (`Id`) USING BTREE;

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bank_transfer_logs`
--
ALTER TABLE `bank_transfer_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `beasiswas`
--
ALTER TABLE `beasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donasis`
--
ALTER TABLE `donasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `donasiusers`
--
ALTER TABLE `donasiusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategories`
--
ALTER TABLE `kategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penyalurans`
--
ALTER TABLE `penyalurans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prokers`
--
ALTER TABLE `prokers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rekenings`
--
ALTER TABLE `rekenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `totaldonasis`
--
ALTER TABLE `totaldonasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ukms`
--
ALTER TABLE `ukms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beasiswas`
--
ALTER TABLE `beasiswas`
  ADD CONSTRAINT `beasiswas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `beasiswas_id_mitra_foreign` FOREIGN KEY (`id_mitra`) REFERENCES `mitras` (`id`);

--
-- Constraints for table `donasis`
--
ALTER TABLE `donasis`
  ADD CONSTRAINT `donasis_confirm_by_foreign` FOREIGN KEY (`confirm_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `donasis_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `prokers` (`id`);

--
-- Constraints for table `donasiusers`
--
ALTER TABLE `donasiusers`
  ADD CONSTRAINT `donasiusers_confirm_by_foreign` FOREIGN KEY (`confirm_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `donasiusers_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Constraints for table `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  ADD CONSTRAINT `kegiataninfaks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `kegiataninfaks_ibfk_1` FOREIGN KEY (`id_mitra`) REFERENCES `mitras` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mitras`
--
ALTER TABLE `mitras`
  ADD CONSTRAINT `mitras_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `penyalurans`
--
ALTER TABLE `penyalurans`
  ADD CONSTRAINT `penyalurans_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `ukms`
--
ALTER TABLE `ukms`
  ADD CONSTRAINT `ukms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
