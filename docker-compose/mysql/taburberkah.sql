-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2020 at 02:51 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.3.17-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `jkel`) VALUES
(5, 'Brian', 'Brian@gmail.com', '082344949505', 'fotoadmin/UCl0voDsCqK1KZriP7TJSDL4R0MSUHLGpw2bEv26.png', NULL, '$2y$10$63YSqfpGzTPjTd4Fat5QguK3H45rTj7VB04IiOLabAAvcopZZFXYG', NULL, '2019-03-13 23:17:04', '2019-03-29 18:44:22', 'L'),
(13, 'Sri Rinardi Putra', 'sririnardi@gmail.com', '085255995255', 'fotoadmin/1iCOBkhXplNweD1aW95Qso6esp2f3dE5Wj5aUPve.jpeg', NULL, '$2y$10$TO2jvMW8V05Qk4fCXyxdn.991hzKaikmFtO2DjtPWqbvRj7LoJav.', NULL, '2019-03-29 18:47:39', '2019-04-03 01:51:27', 'L'),
(14, 'Hendrik', 'drikdoank@gmail.com', '082344949505', 'fotoadmin/bpjLgHILH7MNK0BkX4PqoI7sT7FwasDza4iFxlVI.png', NULL, '$2y$10$CCaZjRiUh5nmylH19t0A9Od0agA9ozSsYrptKyacX3kcfAgYLzv.i', NULL, '2019-03-29 19:35:25', '2020-05-07 02:03:15', 'L');

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
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `nama`, `link`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 'Banner 1', 'bersamayatim', 'fotobanner/toiunz4WvtUyWuJKZMDkBKg7eJ2XVcw7wkCStoga.jpeg', 'active', 13, 'Hendrik', '2019-03-30 22:34:40', '2020-05-21 19:57:22'),
(11, 'Banner 2', 'lawan-corona', 'fotobanner/Y1k7uJj298I8LcU1ifEKfTKxe7yaXERZCOsufWuz.jpeg', 'active', 13, 'Hendrik', '2019-04-03 03:21:20', '2020-05-17 15:41:53'),
(13, 'Banner 4', 'wakaf-masjid-al-barokah', 'fotobanner/ilzckTpT1vy9lMlHWaXovLwSEQahw4JJ7XriXNgd.jpeg', 'active', 14, 'Hendrik', '2020-05-07 09:42:44', '2020-06-21 14:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswas`
--

CREATE TABLE `beasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_persemester` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `lama` int(11) NOT NULL,
  `pendidikan` enum('S1','D3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kampus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donasis`
--

CREATE TABLE `donasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mitra_id` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `campaign_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `ref` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donasis`
--

INSERT INTO `donasis` (`id`, `nama`, `email`, `nohp`, `confirm_by`, `status`, `jumlah`, `foto`, `created_at`, `updated_at`, `mitra_id`, `campaign_id`, `campaign_type`, `type`, `invoice`, `url`, `snap_token`, `message`, `ref`) VALUES
(1, 'Hendrik', NULL, '088211984956', NULL, 'pending', 50, NULL, '2020-05-12 15:20:00', '2020-05-12 15:20:00', 4, 1, 'proker', 'gopay', 'INV-00000001', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, '2724384e456633d769110df40f9d83c7'),
(2, 'Tonkotsu Chashu Ramen 2', NULL, '088211984953', NULL, 'pending', 100, NULL, '2020-05-12 15:35:10', '2020-05-12 15:35:10', 4, 1, 'proker', 'gopay', 'INV-00000001', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'b96097dabeb57f7e28722048eebfa4cc'),
(3, 'Jayantika Fitriana', 'jayantika.fitriana@gmail.com', '08823456378', NULL, 'pending', 10, NULL, '2020-05-12 15:42:19', '2020-05-12 15:42:19', 4, 1, 'proker', 'gopay', 'INV-00000002', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'ce00abff6f5a58d25edaa2633b360006'),
(4, 'Jayantika Fitriana', 'jayantika.fitriana@gmail.com', '088231322323', NULL, 'pending', 250, NULL, '2020-05-12 16:02:08', '2020-05-12 16:02:08', 4, 1, 'proker', 'echannel', 'INV-00000003', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, '24ebf9baeaf646c908d4e6a0a6bd0177'),
(5, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '8112233176', NULL, 'pending', 10, NULL, '2020-05-12 16:41:02', '2020-05-12 16:41:02', 4, 1, 'proker', 'bca', 'INV-00000004', 'bermanfaat-bagi-dunia-akhirat', NULL, NULL, 'b06df86e9a5e275efe4670cce265c1bc'),
(7, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-13 04:00:14', '2020-05-13 04:02:44', 4, 1, 'proker', 'gopay', 'INV-00000005', 'bermanfaat-bagi-dunia-akhirat', 'a26e0f90-ebf7-40d7-8a64-ef514a17380e', NULL, 'f2353f01120fa43f44fdfed2129bbff8'),
(8, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'pending', 10000, NULL, '2020-05-13 06:21:04', '2020-05-13 06:21:05', 5, 4, 'proker', 'gopay', 'INV-00000007', 'berbagi-beasiswa', '220626d8-5d23-4b9c-b48e-4fe56de459e2', NULL, '3522f5eada7220f448ab008aeee1c96e'),
(9, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'pending', 10000, NULL, '2020-05-13 06:22:34', '2020-05-13 06:22:35', 4, 2, 'proker', 'bca', 'INV-00000008', 'beramal-quran', 'e3d5b27b-3d4d-42c0-92f7-fd328b49433a', NULL, '9d6ef2c0752840b5343acb3354d73f39'),
(10, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'expire', 50000, NULL, '2020-05-13 08:52:53', '2020-05-22 19:45:34', 5, 3, 'proker', 'gopay', 'INV-00000009', 'lawan-corona', 'bf4e858d-ba62-403b-84a0-f5f7923fb6fc', NULL, '8343a511d16e1ab07546e78414b35be5'),
(11, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'expire', 50000, NULL, '2020-05-13 09:02:22', '2020-05-22 19:45:43', 5, 3, 'proker', 'echannel', 'INV-00000010', 'lawan-corona', '0b3cd696-99c3-4d51-9329-b3c7a201a7d9', NULL, '718ca220222731d4e203f4d558e44538'),
(12, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-13 09:03:53', '2020-05-13 09:05:05', 4, 2, 'proker', 'va-bni', 'INV-00000011', 'beramal-quran', 'e6528a3a-33b1-495e-83be-dd38624fc46d', NULL, 'ac4c117baed7c5f6339364a39482c066'),
(13, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 50000, NULL, '2020-05-13 15:47:00', '2020-05-13 15:47:45', 4, 2, 'proker', 'bni_va', 'INV-00000012', 'beramal-quran', 'ed48adbc-66a2-435a-8e40-55c9951f4c9a', NULL, 'a8e3aa5a66bd8a0ee6c8d01f6bbf4c38'),
(14, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'expire', 10000, NULL, '2020-05-13 15:50:36', '2020-05-16 14:30:02', 5, 3, 'proker', 'gopay', 'INV-00000013', 'lawan-corona', 'a2e53d85-01ec-4ff8-92f5-9271391f4a8b', NULL, '534b0f7a4b283072fb1a74552bf40ba6'),
(15, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'success', 50000, NULL, '2020-05-13 16:11:01', '2020-05-13 16:12:13', 5, 5, 'proker', 'bni_va', 'INV-00000014', 'pakaian-layak-gaza', '828dc1d9-6656-4a85-9b8f-1e3fd11453a7', NULL, '7fea6b881978bc379713149125eb91b2'),
(16, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'expired', 10000, NULL, '2020-05-14 05:16:47', '2020-05-15 12:17:24', 4, 2, 'proker', 'bca', 'INV-00000015', 'beramal-quran', '65c8113d-54c3-40ab-a68a-ffbfdd8ebe2a', NULL, '23c269ad5fe612c672261ec28619ba67'),
(17, 'Hendrik', 'drikdoank@gmail.com', '088211984956', NULL, 'expire', 50000, NULL, '2020-05-14 05:24:41', '2020-05-14 05:51:07', 4, 2, 'proker', 'gopay', 'INV-00000016', 'beramal-quran', '79ad1b9d-2a5a-4c4d-9163-a5ee9f0d31f3', NULL, 'a662fb378a39315008c250b725354eaf'),
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
(49, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '08112233176', NULL, 'expired', 10000, NULL, '2020-05-17 17:11:07', '2020-05-18 17:11:27', 4, 2, 'proker', 'bca_va', 'INV-00000049', 'beramal-quran', 'a990fa92-602d-4806-833c-046889cefe3c', NULL, '1d7667e2cac4bf983e1247e9170e5cf0'),
(50, 'Hendrik', 'drikdoank@gmail.com', '0892892839121', NULL, 'success', 50000, NULL, '2020-05-21 08:54:59', '2020-05-21 22:42:34', 5, 5, 'proker', 'bni_va', 'INV-00000050', 'pakaian-layak-gaza', '71623c91-78bf-4a57-9d0c-869405176d41', NULL, '7114eabc8c6fd674c6eeeee2a876b700'),
(51, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10000, NULL, '2020-05-21 12:32:50', '2020-05-22 19:46:18', 4, 1, '10', 'bni_va', 'INV-00000051', 'bersamayatim', '1ae90cbc-98ab-4d56-95fc-87216d69ae4d', 'semoga barokah', '655740e2dcb229dd0adcedbcfb0e14a2'),
(52, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 50000, NULL, '2020-05-21 19:24:19', '2020-05-22 13:14:58', 4, 11, '13', 'bni_va', 'INV-00000052', 'wakaf-masjid-al-barokah', '794600d3-ef67-40d9-95c2-a69c71ad4d79', NULL, '6642bc3bab7bcf5d777895817481c71b'),
(53, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', 14, 'success', 50506, 'buktidonatur/xMKlZB7xuBoNDpboX9yNFqUK0MikCzlhNE5295LR.png', '2020-05-21 19:25:00', '2020-06-28 15:04:43', 4, 11, '13', 'bca', 'INV-00000053', 'wakaf-masjid-al-barokah', NULL, NULL, '63d83528607ef6670b71dce997a77a8a'),
(54, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', 14, 'success', 10554, 'buktidonatur/UfqX76VmhOrCNW5E9FjYiOxWF6wLpl4Hgyknap5l.png', '2020-05-21 19:59:20', '2020-06-28 15:06:05', 4, 2, '10', 'bca', 'INV-00000054', 'beramal-quran', NULL, NULL, '618582c7eda4c87dcc6cdaf28f389fc9'),
(55, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'success', 10818, NULL, '2020-05-21 20:01:32', '2020-05-21 20:01:39', 4, 1, '10', 'bca', 'INV-00000055', 'bersamayatim', NULL, NULL, 'b131491afc35b446bb12fdad677d6a19'),
(56, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', 14, 'success', 10809, 'buktidonatur/lHcuOCHlLzKrnwp5MbsvHc6VVkL7ilNoXgKCxxcR.png', '2020-05-21 20:01:58', '2020-06-28 15:07:47', 4, 1, '10', 'bca', 'INV-00000056', 'bersamayatim', NULL, NULL, 'b14e7e0734c44fe64deb76b3df4084c2'),
(57, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'pending', 10818, NULL, '2020-05-21 20:04:04', '2020-05-21 20:04:04', 4, 1, '10', 'bca', 'INV-00000057', 'bersamayatim', NULL, NULL, 'e0d95ba72643a524002a71f738f7df6e'),
(58, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'pending', 10042, NULL, '2020-05-22 13:14:32', '2020-05-22 13:14:32', 4, 1, '10', 'bri', 'INV-00000058', 'bersamayatim', NULL, NULL, 'afc72ed33b41cb0ce5d373fe950b72a8'),
(60, 'Mastur Google\"><img src=sx onerror=alert(document.domain)>', 'kitacaribug@gmail.com', '081286006806', NULL, 'expired', 100000, NULL, '2020-05-22 19:32:24', '2020-05-22 21:43:34', 4, 1, '10', 'gopay', 'INV-00000059', 'bersamayatim', 'acd81ba6-6050-4e52-a258-d38c4699bac0', NULL, '5798f6ab960e2744c43a7ccbbac2012f'),
(66, 'Mastur Google', 'kitacaribug@gmail.com', '081286006806', NULL, 'success', 1000, NULL, '2020-05-22 19:43:31', '2020-05-22 21:23:39', 4, 10, '11', 'bni_val', 'INV-00000066', 'zakat-fitrah-untuk-semua', '64b0733a-0b8e-4162-ad2f-5feaff914cf3', NULL, '4c226b33f49c51d6f1c3ae93e5091bb4'),
(67, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'expired', 10000, NULL, '2020-05-22 21:19:22', '2020-05-22 21:24:18', 5, 5, '10', 'gopay', 'INV-00000067', 'pakaian-layak-gaza', 'fa2e4196-8b4c-477b-8d84-0c2ba9cd385f', NULL, '6eaf07b4c43efb0780c87aa4320114dc'),
(70, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'expired', 10000, NULL, '2020-05-22 21:28:38', '2020-05-23 21:28:53', 4, 2, '10', 'bca_va', 'INV-00000068', 'beramal-quran', 'f67b1ffa-a6c1-48db-a95e-19460d1f9985', NULL, '314a879aa203ab70564f970c3892fc53'),
(71, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'pending', 10681, NULL, '2020-05-22 21:30:57', '2020-05-22 21:30:57', 4, 2, '10', 'bca', 'INV-00000071', 'beramal-quran', NULL, 'Halo', 'd58da98f6c3245e1b3901950b8d3db28'),
(72, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'expired', 10000, NULL, '2020-05-22 21:31:23', '2020-05-23 21:31:43', 4, 2, '10', 'bca_va', 'INV-00000072', 'beramal-quran', 'e0e51479-2771-462c-b2c0-4d629043bf83', 'Halo', '66dfec46bf0cca129e531c54b6349de7'),
(73, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '8112233176', NULL, 'success', 10000, NULL, '2020-05-22 21:32:03', '2020-05-22 21:32:22', 4, 2, '10', 'gopay', 'INV-00000073', 'beramal-quran', '97c4edf0-5553-46bb-83f5-cf7da14b63dd', 'Halo', 'b294dc125d041cb2871d95960645b25a'),
(74, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'expired', 10000, NULL, '2020-05-22 21:37:51', '2020-05-23 21:38:03', 4, 1, '10', 'echannel', 'INV-00000074', 'bersamayatim', '90f881d2-29d9-41af-bbaf-fa9760650f90', NULL, '94ceb64efcfcd2e9420d9bb8a86ce093'),
(75, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:26:00', '2020-05-23 16:59:04', 4, 2, '10', 'bni_va', 'INV-00000075', 'beramal-quran', '0272119b-7eb0-472d-b36d-2524a5b1148c', NULL, '56d2a3dc6447bda39210bdc16f512cb7'),
(76, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:37:09', '2020-05-23 16:57:51', 5, 5, '10', 'bni_va', 'INV-00000076', 'pakaian-layak-gaza', 'c855bbe3-f663-492c-9f4d-9bcd51226737', NULL, 'bc874a61a948f1adefdb39900989abe9'),
(77, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'success', 10000, NULL, '2020-05-22 22:47:10', '2020-05-23 16:56:27', 4, 1, '10', 'bni_va', 'INV-00000077', 'bersamayatim', '8f127f4f-92de-4b32-8dd2-26aa0a699bbe', NULL, '37d93fa90995d308a908e217c78541a2'),
(78, 'Transfer Moota', 'muhafariz@gmail.com', '082110671277', NULL, 'success', 50601, NULL, '2020-06-03 15:52:16', '2020-06-03 16:35:11', 4, 2, '10', 'bca', 'INV-00000078', 'beramal-quran', NULL, 'Semoga berhasil testingnya, Aamiin', '174667470f1546ac3cf76df16aac01ef'),
(79, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'pending', 10000, NULL, '2020-06-08 12:43:57', '2020-06-08 12:43:58', 5, 3, '10', 'bni_va', 'INV-00000079', 'lawan-corona', '70ffa753-d136-4f0b-84ce-4581cc730475', NULL, 'bd1850852cff0f083a1ef714424fa7dc'),
(80, 'Tes', 'tes@gmail.com', '0812345678', NULL, 'expired', 10000, NULL, '2020-06-13 13:03:11', '2020-06-14 13:03:31', 4, 1, '10', 'bca_va', 'INV-00000080', 'bersamayatim', 'e301e266-7426-421f-877d-034518c35a17', NULL, 'f53bc772b10d8bb74c8db48e934e3c8a'),
(81, 'Marsudi Wijaya', 'marsudianeh@gmail.com', '085717188541', NULL, 'expired', 10000, NULL, '2020-06-13 14:12:27', '2020-06-24 15:31:42', 4, 1, '10', 'bca_va', 'INV-00000081', 'bersamayatim', '1692e3ae-949f-4707-b3ab-64da9f4e4452', NULL, 'f12fd90183740b3e806d77616534e79c'),
(82, 'harry fairsyah', 'vser17os@gmail.com', '085274638575', NULL, 'expired', 10000, NULL, '2020-06-14 10:23:19', '2020-06-14 10:43:47', 4, 1, '10', 'gopay', 'INV-00000082', 'bersamayatim', '5c5e9421-e0d4-40f4-9f9d-7d5fc802a3cf', 'semangat ya', '0512fe743e6c0b66055d85300575ec9e'),
(83, 'Harry Fairsyah', 'harryfairsyah@yahoo.co.id', '085274638575', NULL, 'pending', 10859, NULL, '2020-06-14 10:34:30', '2020-06-14 10:34:30', 4, 1, '10', 'bca', 'INV-00000083', 'bersamayatim', NULL, NULL, 'b82497bd2d39ba852a04b27b4ba1397b'),
(84, 'Harry Fairsyah', 'harryfairsyah@yahoo.co.id', '085274638575', NULL, 'pending', 10000, NULL, '2020-06-14 10:37:13', '2020-06-14 10:37:14', 4, 10, '11', 'bca_va', 'INV-00000084', 'zakat-fitrah-untuk-semua', '5de81a92-a5ab-44c8-9e25-72eabdcd47f1', NULL, '35c8807695a77a3f555aa51bc8b318c0'),
(85, 'harry fairsyah', 'harryfairsyah@yahoo.co.id', '085274638575', NULL, 'pending', 10000, NULL, '2020-06-14 10:38:30', '2020-06-14 10:38:31', 4, 1, '10', 'echannel', 'INV-00000085', 'bersamayatim', '6189ed74-0627-4705-a8a1-e18a63bbf3d9', NULL, 'a17a4f65a656a647beb05aae0cf26499'),
(86, 'harry fairsyah', 'harryfairsyah@yahoo.co.id', '085274638575', NULL, 'pending', 10000, NULL, '2020-06-14 10:39:36', '2020-06-14 10:39:37', 5, 5, '10', 'permata_va', 'INV-00000086', 'pakaian-layak-gaza', '01bd878a-a25d-411d-9acf-cfef5a1bf2cd', NULL, 'fb19d36b5aae65b929e48c169a11fb8e'),
(87, 'harry fairsyah', 'harry@kitabisa.com', '085274638575', NULL, 'pending', 10473, NULL, '2020-06-14 10:40:14', '2020-06-14 10:40:14', 5, 3, '14', 'bca', 'INV-00000087', 'lawan-corona', NULL, NULL, 'd0fbea1cfd483455a747a8afd9ca9c97'),
(88, 'harry fairsyah', 'harry@kitabisa.com', '085274638575', NULL, 'pending', 10448, NULL, '2020-06-14 10:40:54', '2020-06-14 10:40:54', 5, 4, '12', 'bri', 'INV-00000088', 'berbagi-beasiswa', NULL, NULL, 'a55bf7bda7eea875cb555dfefe9bd6ee'),
(89, 'harry fairsyah', 'harryfairsyah@yahoo.co.id', '085274638576', NULL, 'pending', 10811, NULL, '2020-06-14 10:41:38', '2020-06-14 10:41:38', 5, 3, '14', 'bni', 'INV-00000089', 'lawan-corona', NULL, NULL, '61d74127b29571148a65fc992af95cf8'),
(90, 'Hendrik', 'drikdoank@gmail.com', '909039093093', NULL, 'pending', 50000, NULL, '2020-06-17 21:48:32', '2020-06-17 21:48:33', 4, 1, '10', 'bni_va', 'INV-00000090', 'bersamayatim', 'a776d453-9584-468e-9062-63578fcce3ea', NULL, 'c35fd8509cb410883e554d5356d06ec5'),
(91, 'Marsudi Wijaya', 'marsudianeh@gmail.com', '085717188541', NULL, 'expired', 10000, NULL, '2020-06-18 20:57:20', '2020-06-18 21:17:45', 4, 1, '21', 'gopay', 'INV-00000091', 'bersamayatim', '64c5d2ff-bc63-408a-9086-83f5fed7f32d', 'asda', '6d16546778e0adf42221b29a0d9e6adb'),
(92, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'pending', 10542, NULL, '2020-06-21 15:00:37', '2020-06-21 15:00:37', 4, 1, '21', 'bca', 'INV-00000092', 'bersamayatim', NULL, NULL, 'd693a93ae1af47e18b6597b19280ab67'),
(93, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', NULL, 'pending', 10000, NULL, '2020-06-21 15:01:18', '2020-06-21 15:01:19', 5, 2, '15', 'bni_va', 'INV-00000093', 'beramal-quran', '5012c6cb-1f9f-4d84-a2ed-f82183e00801', NULL, 'e39289c928f635bcc8cdc58f8c43df71'),
(94, 'Hendrik', 'drik_jutsu@yahoo.co.id', '088211984953', NULL, 'pending', 10992, NULL, '2020-06-21 21:42:39', '2020-06-21 21:42:39', 5, 3, '21', 'bri', 'INV-00000094', 'lawan-corona', NULL, NULL, '783703c0bc3f45a3910f63ec07e40fd0'),
(95, 'Fariz Keynes', 'muhafariz@gmail.com', '082110671277', NULL, 'pending', 10000, NULL, '2020-06-22 11:49:03', '2020-06-22 11:49:05', 5, 3, '21', 'bca_va', 'INV-00000095', 'lawan-corona', 'd72294e4-32cd-4849-82d2-3500121353a9', NULL, '54dcec3dfaa81c77e942c3db4bba8528'),
(96, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984953', 14, 'success', 10000, 'buktidonatur/8e078KT16bpGVG3qke4U8U20WQNhuArdWLsdg6gR.jpeg', '2020-06-22 11:56:25', '2020-06-28 14:47:44', 5, 2, '15', 'bni_va', 'INV-00000096', 'beramal-quran', 'e24dace0-ffba-453f-a0d2-4543f7a0fc38', NULL, '4b8bbe0785f0bafcac408d97108758e5'),
(97, 'Didi tes 2', 'marsudi.wjy@gmail.com', '0857123456789', NULL, 'expired', 10000, NULL, '2020-06-23 14:41:20', '2020-06-23 14:56:58', 5, 3, '21', 'gopay', 'INV-00000097', 'lawan-corona', '42ad7e34-b1bb-4243-99e3-b797ce5a85c6', NULL, 'a01c7ff9a5bfa6b596ec27959c2c7eea'),
(98, 'Tes', 'tes@gmail.com', '088211984953', NULL, 'expired', 10000, NULL, '2020-06-23 14:46:14', '2020-06-24 14:46:31', 5, 2, '15', 'bca_va', 'INV-00000098', 'beramal-quran', 'cb8c4ac2-2afc-48a5-bc61-83a993220cde', NULL, '4a21863b853f3a6940f201f6094216c7'),
(99, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'expired', 10000, NULL, '2020-06-23 15:29:52', '2020-06-24 15:30:12', 5, 2, '15', 'bni_va', 'INV-00000099', 'beramal-quran', '202b31f2-e146-49c9-b31a-0e5e6a5c8511', NULL, '7ea591ada0b8abf1c1a2ab52569b0a93'),
(100, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'settlement', 10000, NULL, '2020-06-23 16:30:19', '2020-06-23 16:43:28', 5, 2, '15', 'bni_va', 'INV-00000100', 'beramal-quran', '799bda61-79a7-41b3-a876-fa6c30fa318e', NULL, '34614a64595822849e04926d2935005c'),
(101, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '081939303511', NULL, 'expired', 10000, NULL, '2020-06-23 17:22:24', '2020-06-23 17:37:41', 5, 3, '21', 'gopay', 'INV-00000101', 'lawan-corona', '81ff127a-adc0-4f91-a836-461b48e466c2', NULL, '99df54c364b72ab64cc1ac49b59c6db3'),
(102, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '08112233176', NULL, 'settlement', 10000, NULL, '2020-06-23 18:26:40', '2020-06-23 18:30:17', 5, 3, '21', 'bca_va', 'INV-00000102', 'lawan-corona', 'c2306dfe-ae87-4782-bb12-5bd3ae23733d', NULL, '2a9e33505811bf019891e82a4b087bce'),
(103, 'Hamba Allah', 'info@rumah-yatim.org', '081221200900', NULL, 'pending', 10400, NULL, '2020-06-26 09:50:40', '2020-06-26 09:50:40', 5, 5, '20', 'bni', 'INV-00000103', 'pakaian-layak-gaza', NULL, NULL, 'eb7ff81f1299244f8271ae5ae031d041'),
(104, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '088211984956', NULL, 'settlement', 50000, NULL, '2020-06-28 15:11:27', '2020-06-28 15:11:57', 5, 5, '20', 'bni_va', 'INV-00000104', 'pakaian-layak-gaza', 'd24e00a4-7796-4922-b08b-01c3de1cfa48', NULL, '4286cebb2564d38e9dd8ed696df0d8ce'),
(105, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '08112233176', NULL, 'pending', 10472, NULL, '2020-06-28 20:02:54', '2020-06-28 20:02:54', 5, 3, '21', 'mandiri', 'INV-00000105', 'lawan-corona', NULL, NULL, 'c55b9166ea0e569a2d503b700135ad1c'),
(106, 'Hendrik', 'drikdoank@gmail.com', '08998789656', NULL, 'pending', 10000, NULL, '2020-06-28 20:03:33', '2020-06-28 20:03:34', 5, 3, '21', 'bni_va', 'INV-00000106', 'lawan-corona', 'c4ceddc2-19dc-42fe-9cd1-25a0955bf38f', NULL, '6ebd5cfd72116dd99732e6fd7e513368'),
(107, 'budi', 'fahriamirullah@gmail.com', '08112233176', NULL, 'pending', 10701, NULL, '2020-07-03 13:31:40', '2020-07-03 13:31:40', 5, 5, '20', 'bca', 'INV-00000107', 'pakaian-layak-gaza', NULL, 'Semoga bermanfaat', '786447b339d7f9389711f59a9af6b345');

-- --------------------------------------------------------

--
-- Table structure for table `donasiusers`
--

CREATE TABLE `donasiusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('sampai','belum','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) UNSIGNED DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `campaign_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategories`
--

CREATE TABLE `kategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategories`
--

INSERT INTO `kategories` (`id`, `nama`, `link`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'Zakat', 'lawan-corona', 'fotokategori/746lsq1QxgQSCkUAtzc9qDIX3SRqpU6BThvEfiYI.jpeg', 'active', 14, 'Hendrik', '2020-06-13 15:59:31', '2020-06-21 14:56:01'),
(15, 'Wakaf', 'anak-yatim', 'fotokategori/1GGxILQ9DuugCviDTaN9L0qWfQA23Z673RsaXyIw.png', 'active', 14, 'Hendrik', '2020-06-13 19:19:03', '2020-06-21 21:45:45'),
(19, 'Beasiswa', 'indonesia', 'fotokategori/rtmYmZzOwNGvVHTxvapQBqrcWzEniHKXxEA516y4.png', 'active', 14, 'Hendrik', '2020-06-14 19:56:06', '2020-06-21 14:51:18'),
(20, 'Infaq', 'brutal', 'fotokategori/wpiyaH4MskRyqCpOyswXOpHpH3niWQhITb8vEufY.png', 'active', 14, 'Hendrik', '2020-06-14 19:56:45', '2020-06-21 14:51:35'),
(21, 'Donasi', 'lawan-corona', 'fotokategori/9F7XoG24MygwBU2IPwQ4bB5064hqzaEftBE5pdhd.png', 'active', 14, NULL, '2020-06-18 20:26:15', '2020-06-18 20:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `kegiataninfaks`
--

CREATE TABLE `kegiataninfaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mitra` int(10) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_real` int(10) NOT NULL,
  `day_left` int(10) NOT NULL,
  `day` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_07_135215_create_admins_table', 1),
(4, '2019_03_13_175846_penyesuaiain_users_table', 1),
(5, '2019_03_14_171005_penyesuaian_table_user', 1),
(6, '2019_03_17_110526_create_penyalurans_table', 1),
(7, '2019_03_17_130943_create_donasis_table', 1),
(8, '2019_03_18_140110_create_mitras_table', 1),
(9, '2019_03_19_183607_create_beasiswas_table', 1),
(10, '2019_03_20_052229_create_ukms_table', 1),
(11, '2019_03_20_132453_create_donasiusers_table', 1),
(12, '2019_03_22_070839_create_totaldonasis_table', 1),
(13, '2019_03_25_163722_sesuaikan_table_users', 1),
(14, '2019_03_25_182243_pesesuaikan_table_users', 1),
(15, '2019_03_28_044000_penyesuaian_beasiswa', 1),
(16, '2019_04_08_105649_penyesuaian_user', 1),
(17, '2019_04_08_110219_penyesuaian_beasiswa_dua', 1),
(18, '2019_04_08_111918_penyesuaian_admin', 1),
(19, '2019_04_09_035158_penyesuaian_donasis', 1),
(20, '2019_04_09_155809_sesuaiakan_beasiswa', 1),
(21, '2019_04_09_160200_sesuaiakan_ukm', 1),
(22, '2019_04_10_122741_create_prokers_table', 1),
(23, '2019_04_10_122831_create_kegiataninfaks_table', 1),
(24, '2019_04_24_002252_sesuaiakanproker', 1),
(25, '2020_05_11_055040_create_social_facebook_accounts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mitras`
--

CREATE TABLE `mitras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_verified` int(11) DEFAULT '0',
  `logo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mitras`
--

INSERT INTO `mitras` (`id`, `nama`, `alamat`, `email`, `jumlah`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_verified`, `logo`) VALUES
(4, 'Hubb Giving', 'Jln. Paccerakkang, Daya', 'hub-giving@gmail.com', 23, 14, 'Hendrik', '2019-03-30 22:32:18', '2020-05-07 08:20:59', 1, 'fotomitra/Y9DGEFfm2wWVvmwTv22POo9suDmlzeFdBkRq4Bc3.jpeg'),
(5, 'BerkahYatim.com', 'Jl. Puri Raya 8 Kota Makassar', 'admin@amalsholeh.com', 85, 14, 'Hendrik', '2019-04-03 03:01:49', '2020-05-11 14:31:10', 1, 'fotomitra/zMFbJ7X8Ga0WsvwjudE66jJaKexus4OLKBpB729v.png'),
(6, 'Sedekah Akbar Indonesia', 'jl. Borong jambu, Antang. Kota Makassar', 'sedekahakbarindonesia@gmail.com', 40, 14, 'Hendrik', '2019-04-03 03:17:03', '2020-05-07 10:00:45', 1, 'fotomitra/4VKtJ8ocpaNdriJ7lgsJvbMJEDfVtQrAtaFQxkH3.jpeg'),
(7, 'Panti Asuhan Peduli Kasih', 'Jl. Bonto Duri 4 Setapak T/22 A', 'pedulikasih@gmail.com', 54, 14, NULL, '2019-04-03 09:09:40', '2019-04-03 09:09:40', 0, ''),
(8, 'Panti Asuhan Nurul Ichsan', 'Jl. Batua Raya No.12 A', 'Nurul@gmail.com', 36, 14, NULL, '2019-04-03 09:10:58', '2019-04-03 09:10:58', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('harryfairsyah@yahoo.co.id', '$2y$10$EKKk82aJZIOd3kF7KHnZ/OlZSr0y3i4mRKfVElaS.n5cLvCqoSyXW', '2020-06-14 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `penyalurans`
--

CREATE TABLE `penyalurans` (
  `id` int(10) UNSIGNED NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `campaign_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penyaluran` int(10) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyalurans`
--

INSERT INTO `penyalurans` (`id`, `campaign_id`, `campaign_type`, `name`, `dokumentasi`, `deskripsi`, `jumlah`, `penyaluran`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Anak Yatim', 'dokumentasi/NqtgUeQDpQyMNukAfeQUS5pxylZ0AgacJUBzIrkA.jpeg', '<p>Anak Yatim menerima donasi Rp 300.000,-</p>', 300000, 2, 14, 'Hendrik', '2020-06-21 16:45:54', '2020-06-21 17:11:55'),
(2, NULL, NULL, 'Penyaluran Beasiswa MAN Bogor Rp 25000', 'dokumentasi/DNA5HYrbpyNVlpVRGQuOkujsebkxXlOAW1IDxHRd.png', '<p>Sebuah donasi untuk siswa MAN Bogor</p>', 25000, 4, 14, 'Hendrik', '2020-06-22 20:36:45', '2020-06-22 20:37:33'),
(3, NULL, NULL, 'Tes', NULL, '<p>coba&nbsp;coba&nbsp;coba&nbsp;coba&nbsp;coba&nbsp;coba</p>', 150000, 3, 14, NULL, '2020-06-23 13:47:22', '2020-06-23 13:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `prokers`
--

CREATE TABLE `prokers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` decimal(10,0) NOT NULL,
  `target_day` int(11) DEFAULT NULL,
  `target_date` datetime DEFAULT NULL,
  `fundriser_id` int(11) NOT NULL,
  `left_day` int(10) DEFAULT '0',
  `actual_earn` decimal(10,0) NOT NULL DEFAULT '0',
  `is_pilihan` int(11) NOT NULL DEFAULT '0',
  `is_urgent` tinyint(10) NOT NULL DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prokers`
--

INSERT INTO `prokers` (`id`, `nama_kegiatan`, `tag`, `deskripsi`, `created_by`, `created_at`, `updated_at`, `dokumentasi`, `target`, `target_day`, `target_date`, `fundriser_id`, `left_day`, `actual_earn`, `is_pilihan`, `is_urgent`, `type`, `url`, `deleted_at`) VALUES
(1, 'BERMANFAAT BAGI DUNIA, BERNILAI AKHIRAT. UNTUK INDONESIA BAHAGIA Bersama BerkahYatim.com', 'donasi,amalbaik,berkahyatim', '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>\r\n\r\n<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>\r\n\r\n<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>\r\n\r\n<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>', 14, '2020-05-06 17:00:00', '2020-06-21 14:59:38', 'fotobeasiswa/4ZpoRmWPMyjd7BBXgYbdaG6FAYZXaYpFq9SheTjA.jpeg', '30000000', 5, '2020-06-21 00:00:00', 4, 2, '25000000', 1, 1, '21', 'bersamayatim', NULL),
(2, 'BeramalQuran Untuk Penghafal Quran di Pelosok Indonesia', 'Waqaf,berkahyatim,amalbaik', '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>\r\n\r\n<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>\r\n\r\n<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>\r\n\r\n<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>', 14, '2020-05-06 17:00:00', '2020-06-21 15:05:00', 'fotobeasiswa/myiWRkGM3wixJw6az8F8ThvOHKVEHJij5S49LNgY.jpeg', '23000000', 20, '2020-06-21 00:00:00', 5, 13, '13000000', 1, 1, '15', 'beramal-quran', NULL),
(3, 'Lawan Corona Bantu Lindungi Tim Medis dan Masyarakat', 'corona', '<p>Kekhawatiran terhadap Virus COVID-19 ini membuat kita sebagai warga negara indonesia wajib untuk menjaga dan melindungi keluarga kita.</p>\r\n\r\n<p>Per hari ini&nbsp;(22/3) sudah terdapat 450 orang kasus positif terkena virus corona dan 38 orang meninggal dunia.</p>', 14, '2020-05-06 17:00:00', '2020-06-18 20:26:43', 'fotobeasiswa/SJwAgoN8i8kbdXc3Xr4gnSxIfDdbwSAa3eXz6TKE.jpeg', '150000000', 20, '2020-06-18 00:00:00', 5, 15, '50000000', 1, 1, '21', 'lawan-corona', NULL),
(4, 'Berbagi Beasiswa dan Biaya Pelatihan Anak Yatim', 'Beasiswa, Berkahyatim, Amalbaik', '<p>-</p>', 14, '2020-05-06 17:00:00', '2020-06-22 13:35:44', 'fotobeasiswa/sUoO0JwkzgoOYhByNa2XBVDnyz3ZnFoBX5t3vhQi.jpeg', '200000', 10, '2020-06-22 00:00:00', 5, 14, '6500000', 0, 0, '19', 'berbagi-beasiswa', NULL),
(5, 'Pakaian Layak Pakai Untuk Musim Dingin Gaza', 'Infak, Amalbaik, Gaza', '<p>-</p>', 14, '2020-05-06 17:00:00', '2020-06-21 14:55:31', 'fotobeasiswa/PRZp7aHHegPK268NZzPWxTaWqczt61IIBz07MtmX.jpeg', '500000', 10, '2020-06-21 00:00:00', 5, 5, '3400000', 0, 0, '20', 'pakaian-layak-gaza', NULL),
(10, 'Bersihkan Harta dengan Zakat Fitrah untuk semua', 'zakat, bersih, harta', '<p>deskripsi</p>', 21, '2020-05-21 19:07:50', '2020-06-22 13:36:16', 'fotobeasiswa/fRETpKVc59UAjtIBCkJYmHwIUZCN6UEOjaoYhsji.jpeg', '4500000', 8, '2020-06-22 00:00:00', 4, 8, '0', 0, 0, '14', 'zakat-fitrah-untuk-semua', NULL),
(11, 'Wakaf Masjid Al Barokah', 'Wakaf, Masjid', '<p>-#</p>', 21, '2020-05-21 19:21:57', '2020-06-21 14:56:49', 'fotobeasiswa/1Q9CaEhi0RE8h62UtJTx5R3rgPXaiEpp8VBOyDVG.jpeg', '54000000', 0, '2020-06-21 00:00:00', 4, 0, '0', 0, 0, '15', 'wakaf-masjid-al-barokah', NULL),
(12, 'BERMANFAAT BAGI DUNIA #2', 'bermanfaat', '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=sx onerror=alert(document.domain) /></p>', 29, '2020-05-22 19:54:03', '2020-05-22 21:27:28', 'fotobeasiswa/4yIK1IguwZ4dPGMPNNodt2njZL8VntUD2qpDcN5T.jpeg', '30000000', 69, '2020-07-31 00:00:00', 4, 69, '0', 0, 0, '10', 'bermanfaat-bagi-dunia---', '2020-05-22 21:27:28'),
(13, 'Tes yatim', 'Yatim, berkah', '<p>Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim&nbsp;Tes yatim</p>\r\n\r\n<p><img alt=\"\" src=\"https://berkahyatim.com/storage/fotobeasiswa/4ZpoRmWPMyjd7BBXgYbdaG6FAYZXaYpFq9SheTjA.jpeg\" /></p>\r\n\r\n<p>&nbsp;</p>', 14, '2020-06-13 19:25:07', '2020-06-21 14:57:11', 'fotoproker/ouLjGdCnOI685HsvJ0x0Mvgzl0Xdu8ysYCh4m0DH.jpeg', '10000000', NULL, '2020-06-21 00:00:00', 5, 0, '0', 0, 0, '21', 'tesyatim', NULL),
(14, 'Berbagi Bersama Yatim', 'berbagiyatimindonesia', '<p>Bersama Berbagi Yatim Indonesia</p>', 27, '2020-06-14 19:46:35', '2020-06-14 19:52:26', 'fotobeasiswa/v19RvSp4sRDBG5jrtV9a1OwStwc57mpXCsDjj1y1.jpeg', '1000000', 15, '2020-06-30 00:00:00', 4, 15, '0', 0, 0, '14', 'berbagi-bersama-yatim', '2020-06-14 19:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `rekenings`
--

CREATE TABLE `rekenings` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moota_id` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekenings`
--

INSERT INTO `rekenings` (`id`, `bank`, `account`, `dokumentasi`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `owner`, `branch`, `moota_id`) VALUES
(10, 'bca', '7263781862', 'fotorekening/IZC193whzBcEXd4NUCJkbVKDjD91tlx5QRNDZyPs.png', 'active', 13, 'Hendrik', '2019-03-30 22:34:40', '2020-05-21 17:20:31', 'Yasan Berkah Yatim', 'KCP BCA Bogor', 'lmVz5Q95zvb'),
(11, 'bni', '152415357', 'fotorekening/YRK7rkTtZ5ZjyNIFGkTB8Kba8z2UaoQduFR6qpjk.png', 'active', 13, 'Hendrik', '2019-04-03 03:21:20', '2020-06-28 20:02:18', 'Yasan Berkah Yatim', 'KCP BNI Bogor', 'lmVz5Q95zvb'),
(12, 'bri', '862763722873', 'fotorekening/YLPBfxjuyhcXZXxQjTggDG8SHHTDzoynDqIOYRkb.png', 'active', 14, 'Hendrik', '2020-05-07 09:42:28', '2020-05-21 17:20:54', 'Yasan Berkah Yatim', 'KCP BRI Bogor', 'lmVz5Q95zvb'),
(13, 'mandiri', '2627372637', 'fotorekening/qZAvqFxlTJvFnlMujMJW6qdyPBCv79wZDPpg9gnH.png', 'active', 14, 'Hendrik', '2020-05-07 09:42:44', '2020-06-28 20:02:38', 'Yasan Berkah Yatim', 'KCP Mandiri Bogor', 'lmVz5Q95zvb');

-- --------------------------------------------------------

--
-- Table structure for table `social_facebook_accounts`
--

CREATE TABLE `social_facebook_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(18, 30, '2396834753944449', 'facebook', '2020-05-22 21:26:10', '2020-05-22 21:26:10'),
(19, 31, '10213529261384225', 'facebook', '2020-06-13 13:54:34', '2020-06-13 13:54:34'),
(20, 31, '114417147247788959736', 'google', '2020-06-13 14:21:54', '2020-06-13 14:21:54'),
(21, 32, '109283135726767251248', 'google', '2020-06-13 14:22:25', '2020-06-13 14:22:25'),
(22, 33, '10216583817808614', 'facebook', '2020-06-14 10:29:07', '2020-06-14 10:29:07'),
(23, 34, '101794610242297767962', 'google', '2020-06-14 10:53:20', '2020-06-14 10:53:20'),
(24, 24, '102435473127181104503', 'google', '2020-06-22 13:32:54', '2020-06-22 13:32:54'),
(25, 21, '118139615404042064514', 'google', '2020-06-22 20:38:00', '2020-06-22 20:38:00'),
(26, 37, '10150000095490607', 'facebook', '2020-07-02 14:17:15', '2020-07-02 14:17:15');

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
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_usaha` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_awal` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT NULL,
  `dokumentasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukms`
--

INSERT INTO `ukms` (`id`, `nama_penerima`, `nama_usaha`, `deskripsi`, `jumlah_awal`, `jumlah_total`, `dokumentasi`, `status`, `lama`, `created_by`, `updated_by`, `created_at`, `updated_at`, `roles`) VALUES
(6, 'Mutmainnah', 'Dagang Pop Ice', '<p>Ibu Mutmainnah diberikan modal untuk membuka usaha rumahan untuk membiayai kebutuhan sehari-harinya. diharapkan selama 3 bulan kedepan, sudah bisa menghasilkan keuntungan untuk keluarganya.</p>', 300000, 300000, 'fotoukm/V9O15Ud5ExM75SMMcNpuvG4XSHKD0XcmR6boNqmz.jpeg', 'active', 1, 13, 'Hendrik', '2019-04-03 03:27:47', '2020-05-07 03:41:22', '2'),
(7, 'Dg. Ramang', 'Tambal Ban', '<p>Dg. Ramang merupakan ayah dari 3 orang anak. awalnya beliau adalah seorang pemulung hingga akhirnya melalui posko yatim, bapak ramang diberikan modal usaha untuk menjadi seorang tukang tambal ban.</p>', 2000000, 2000000, 'fotoukm/2AjBqLrpKBR5kernDZg9AVfr3ZEdNmmhwL5hrAeT.jpeg', 'active', 1, 13, 'Hendrik', '2019-04-03 03:42:31', '2020-05-07 03:41:31', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `activated` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `totaldonasi` int(11) DEFAULT NULL,
  `nohp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `donasi_awal` int(11) NOT NULL,
  `jkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `activated`, `password`, `remember_token`, `created_at`, `updated_at`, `totaldonasi`, `nohp`, `foto`, `pekerjaan`, `alamat`, `status`, `deleted_by`, `donasi_awal`, `jkel`) VALUES
(1, 'Hendrik', 'drikdoank2@gmail.com', '2020-05-07 00:56:35', '0', '$2y$10$1qyAaFNrtdSlhypKFCX.lu2Z.PCNDApNeW8uC.IJ186eBX6JZz2O6', 'zlc0n2uchGw1mlzedle9j32aQK7dZ0xFZ3hW9vCYlzEhAFNspv5DdJKoSgGI', '2020-05-07 00:56:35', '2020-05-09 16:56:42', 100000, '088211984956', 'fotouser/BjbELqaa3um6ql6DeuPRr1WjyBznOssm2R2BzikF.png', 'Pelajar', 'Bogor', 'inactive', NULL, 100000, 'L'),
(21, 'Tonkotsu Chashu Ramen 2', 'drikdoank@gmail.com', '2020-05-11 10:17:16', '0', '$2y$10$PTnehvOK9nz5lOjqhH5cbOT1VCz28E2Kt5NtsHZ9jFbpjxBB3goLW', '6uGzUgMOHMVcJis2w5uSGC5WFMC3shahIeXMK2sIQxknOuKUyPyDj5FnHDfP', '2020-05-10 14:44:56', '2020-06-28 20:03:33', 125000, '08998789656', 'fotouser/sBJ3i7r9A9Mi1rDpEazb1wtUL3hP0mQD37E9sDbg.png', 'Pelajar', 'Bogor', 'active', NULL, 0, 'L'),
(22, 'berkah yatim', 'noreply.berkahyatim@gmail.com', '2020-05-11 14:53:48', 'google', '5837e05c0213dc1617e409543331442c', 'qRbzJUfEmc3NPX00icmSIAzDPYhLoUvUS70sjKHoYICyZAYHkywDxGo4zfbP', '2020-05-11 14:53:48', '2020-05-11 14:53:48', NULL, '', 'https://lh3.googleusercontent.com/-lvJJcwA46uA/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclT0HhVwJgCf1uMbEcbaA9O0NbDoQ/photo.jpg', '', '', 'active', NULL, 0, 'P'),
(23, 'Jayantika Fitriana', 'jayantika.fitriana@gmail.com', '2020-05-12 15:41:35', 'google', '0e1422ea79781ee046484893ce0010c4', '9RYGhHS9rVTWpvprKcmOROe4y6uav1vA7OtWfNY4biscqi6syzNwrwMPn2d7', '2020-05-12 15:41:35', '2020-05-12 15:41:35', NULL, '', 'https://lh6.googleusercontent.com/-r54fOHf-rmQ/AAAAAAAAAAI/AAAAAAAADds/AMZuucnxU4DTlQ-mqGtKkmoBMpF7BXXujA/photo.jpg', '', '', 'active', NULL, 0, 'P'),
(24, 'Berkah Yatim', 'brkah.yatim@gmail.com', '2020-05-13 04:55:59', 'google', 'e94fe9ac8dc10dd8b9a239e6abee2848', '4ZYrZaygxsQw5D9rCTk5T1Se2Ai0W1PezNo5MXhMD4dC3ov9ZdlufcYhbSR9', '2020-05-13 04:55:59', '2020-05-13 04:55:59', NULL, '', 'https://lh5.googleusercontent.com/-i0wgnFjHByc/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucl6jtiaf-7hw8xq_7FF1-85p-QR9Q/photo.jpg', '', '', 'active', NULL, 0, 'P'),
(25, 'Hendrik Hendrik', 'hendrik@tabsquare.com', '2020-05-13 15:12:17', 'google', '1d8c9f71eaa6923fc9d3cd5d10aea4ce', 'IjDpAroGcUUIXNiFa4RAMWv6CPX9TMGzdw6fiOiZ4MVfRetspkUzwNxlM4M2', '2020-05-13 15:12:17', '2020-05-13 15:12:17', NULL, '', 'https://lh6.googleusercontent.com/-yGhaZWKtfUc/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucnzrO_aD610_TkzqsEzrGNfTfGqlw/photo.jpg', '', '', 'active', NULL, 0, 'P'),
(26, 'Hendrik', 'drik_jutsu@yahoo.co.id', '2020-05-13 15:45:42', 'facebook', '1b9a80606d74d3da6db2f1274557e644', 'VC8zskZ2fMRNUa7am1dK5yC2cigMqKdBpOmXLUw2PMGYFStGGQLGjlU06CGu', '2020-05-13 15:45:42', '2020-05-13 15:46:36', NULL, '088211984953', 'https://graph.facebook.com/v3.3/3128562117183290/picture?type=normal', 'Mahasiswa', 'Bogor', 'active', NULL, 0, 'L'),
(27, 'Fahri Amirullah', 'fahriamirullah@gmail.com', '2020-05-14 05:09:55', 'facebook', 'ab2ce2a4bbb59dab4f43dada87ef0e23', 'E2WwqJyHUz7JUM8OdG9fOYA1aKD1mVYYIoBShsL0BS7rNSy4IZSd3OWokBYs', '2020-05-14 05:09:55', '2020-07-03 13:31:40', NULL, '08112233176', 'https://graph.facebook.com/v3.3/10217234416600180/picture?type=normal', '', '', 'active', NULL, 0, 'P'),
(28, 'Puspasari Respatiningtyas', 'puspasari_resti@yahoo.com', '2020-05-16 13:59:28', 'facebook', '2e3ae207832305b6a0bff2dbc8a18b90', NULL, '2020-05-16 13:59:28', '2020-05-16 13:59:28', NULL, '', 'https://graph.facebook.com/v3.3/10218415511921659/picture?type=normal', '', '', 'active', NULL, 0, 'P'),
(29, 'Mastur Google', 'kitacaribug@gmail.com', '2020-05-22 19:25:07', 'google', '$2y$10$Q37JRhq7HHcnODtaHRpuYuVQ6jHRA0uzn/INlLMUCk43biTT6OsGe', 'cyxaLMm1M70NYxxp97bTSUdi764vKsxS9gd2DPA2SSsfp8GNyMxLKpLdXoAN', '2020-05-22 19:25:07', '2020-05-22 22:24:41', NULL, '081286006806', 'https://lh3.googleusercontent.com/a-/AOh14GgGmSsbDL8-48Bhy7sMqouJaTST0d4kjWLzfckI', 'Swasta', 'Jakarta', 'active', NULL, 0, 'P'),
(30, 'Andika Pratama', 'marsudiwijaya2@gmail.com', '2020-05-22 21:26:10', 'facebook', '1fc5309ccc651bf6b5d22470f67561ea', NULL, '2020-05-22 21:26:10', '2020-05-22 21:26:10', NULL, '', 'https://graph.facebook.com/v3.3/2396834753944449/picture?type=normal', '', '', 'active', NULL, 0, 'P'),
(31, 'Marsudi Wijaya', 'marsudianeh@gmail.com', '2020-06-13 13:54:34', 'facebook', '63ce12dcf1ede17589befd56bb5281a5', 'eFKe8Rjw9yq38hRp6yGGA3YcVtOQDoqEDuLKs7sLOrXek2FNmVgWU1M9p9S0', '2020-06-13 13:54:34', '2020-06-13 13:54:34', NULL, '', 'https://graph.facebook.com/v3.3/10213529261384225/picture?type=normal', '', '', 'active', NULL, 0, 'P'),
(32, 'Marsudi Wijaya', 'marsudi@kitabisa.com', '2020-06-13 14:22:25', 'google', '03e0704b5690a2dee1861dc3ad3316c9', NULL, '2020-06-13 14:22:25', '2020-06-13 14:22:25', NULL, '', 'https://lh3.googleusercontent.com/-l63vH5e7_0o/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuckjVbQWLfijnXjkvMRcZBtal-pSXg/photo.jpg', '', '', 'active', NULL, 0, 'P'),
(33, 'Harry Fairsyah', 'harryfairsyah@yahoo.co.id', '2020-06-14 10:29:07', 'facebook', '$2y$10$ZpQFUEWrRKm3Ho1QNpv5tOHNOUBnQ8xNFWJlDeVkNeovTEBTqoDHW', 'ERvNNp1NSprkR2Z7973D2CQURZ9vUZbpE4DlSKioRuNZYb1IWhI6oBHAfK77', '2020-06-14 10:29:07', '2020-06-14 10:32:08', NULL, '085274638575', 'https://graph.facebook.com/v3.3/10216583817808614/picture?type=normal', 'Karyawan swasta', 'Padang', 'active', NULL, 0, 'L'),
(34, 'Harry Fair', 'vser17os@gmail.com', '2020-06-14 10:53:20', 'google', 'a6155b0da06d1ad154ad2d039d1fadf4', 'uBKVHsT3eqcJawZpZEpPLrisuZSo9sHz168D61W2zXlX034OGMLbrAJId8hw', '2020-06-14 10:53:20', '2020-06-14 10:53:20', NULL, '', 'https://lh3.googleusercontent.com/a-/AOh14Gi4ehn1MHqh9RghGxBlJAwSKfw16X2NLEXBvKDOAg', '', '', 'active', NULL, 0, 'P'),
(35, 'Fariz Keynes', 'muhafariz@gmail.com', '2020-06-22 11:35:48', NULL, '$2y$10$nbpW3PQVZmNCIm/3/yR6xOZFnfdDgdHYmCDdC31tTML4AMi0Lqnt6', NULL, '2020-06-22 11:35:13', '2020-06-22 11:35:48', NULL, '082110671277', NULL, NULL, NULL, 'active', NULL, 0, 'L'),
(36, 'Didi tes 2', 'marsudi.wjy@gmail.com', '2020-06-23 13:58:08', NULL, '$2y$10$rEFZQTGQcOaCGSn3AJc/z.rBXY4gTxyvBljPd8vkPb8yZZnjmOpze', 'U4Enu3B3VLd8tmjpVG8ceKKfqfpLr9Iv5BQKuO6jOvCCtuBJwddpk0Q6nHq2', '2020-06-23 13:57:27', '2020-06-23 13:58:08', NULL, '0857123456789', NULL, NULL, NULL, 'active', NULL, 0, 'L'),
(37, 'Amer Sacapuntasez', 'geogatedproject347@gmail.com', '2020-07-02 14:17:15', 'facebook', '8e5d5b79456a8e2bc09e54e9e518a5f1', 'm6dAYQi7bX0DOkssgN7QVX9xaBrQ1B3KxDNochKNDKZZ0YRyAj5OKw94VNI2', '2020-07-02 14:17:15', '2020-07-02 14:17:15', NULL, '', 'https://graph.facebook.com/v3.3/10150000095490607/picture?type=normal', '', '', 'active', NULL, 0, 'P');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `admins_email_unique` (`email`) USING BTREE;

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
  ADD KEY `donasis_confirm_by_foreign` (`confirm_by`) USING BTREE;

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
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

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
  ADD KEY `prokers_created_by_foreign` (`created_by`) USING BTREE;

--
-- Indexes for table `rekenings`
--
ALTER TABLE `rekenings`
  ADD PRIMARY KEY (`id`) USING BTREE,
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `donasiusers`
--
ALTER TABLE `donasiusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategories`
--
ALTER TABLE `kategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `kegiataninfaks`
--
ALTER TABLE `kegiataninfaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mitras`
--
ALTER TABLE `mitras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penyalurans`
--
ALTER TABLE `penyalurans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prokers`
--
ALTER TABLE `prokers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `rekenings`
--
ALTER TABLE `rekenings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `donasis_confirm_by_foreign` FOREIGN KEY (`confirm_by`) REFERENCES `admins` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
