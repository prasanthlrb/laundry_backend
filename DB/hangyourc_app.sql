-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 03:31 PM
-- Server version: 5.7.28
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangyourc_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Aravind', '', '', '', NULL, NULL),
(2, 'prasanth s', 'prasanthats@gmail.com', '07010384622', '$2y$10$c.2YcGEBWq0N8WoQrTDvQuqsGqboJL9uM4QNmtWQMiAn7WaQfFTby', NULL, '2020-06-09 17:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Al Zahiyah and Al Markaziyah\r\n', 'Abu Dhabi', NULL, NULL),
(2, 'Madinat Zayed', 'Abu Dhabi', NULL, NULL),
(3, 'Al Wahda', 'Abu Dhabi', NULL, NULL),
(4, 'Khalidiya', 'Abu Dhabi', NULL, NULL),
(5, 'Al Karamah', 'Abu Dhabi', NULL, NULL),
(6, 'Al Rowdah and Al Mushrif', 'Abu Dhabi', NULL, NULL),
(7, 'Al Muroor', 'Abu Dhabi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_1`, `title_2`, `time`, `image`, `banner`, `content`, `created_at`, `updated_at`) VALUES
(1, 'DRY CLEAN', 'SUPER FAST DRY CLEAN', '12 Hours', '1250013048.png', '1667862415.png', 'We offer wide range of service Send your cloths today and get them back cleaned. We make sure ready to wear  Outfits once you schedule this order.Explore Super Fast Dry Clean:Are you worried about party wear that need\'s to be cleaned immediately.', '2020-04-13 13:15:11', '2020-04-26 19:15:59'),
(2, 'WASH & IRON', 'RAPID WASH & IRON', '12 Hours', '1860025559.png', '309073128.jpg', 'We wash with care Premium Wet Cleaning service In UAE enjoy your cloths with fresh smell and steam ironed. Ready to Wear Outfits.Explore our Rapid Wash & Iron Service Now which is automated and advanced Electrolux  Cleaning service.', '2020-04-24 06:32:18', '2020-04-24 08:56:05'),
(3, 'IRONING', 'EXPRESS IRONING', '12 Hours', '503898512.png', '1667673429.jpg', 'Do you have a stack of clothes that don’t need washing but needs ironing? Send them to us and get back freshly steam ironed ready-to-wear outfits. Explore our Rapid Iron Service Schedule your pick up now.', '2020-04-24 08:58:05', '2020-04-24 08:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Abu Dhabi', NULL, NULL),
(2, 'Dubai', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_per_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_per_coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_order_val` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `description`, `start_date`, `end_date`, `discount_type`, `service_id`, `amount`, `max_value`, `limit_per_user`, `limit_per_coupon`, `user_type`, `user_id`, `min_order_val`, `created_at`, `updated_at`) VALUES
(1, 'July Offers', 'This Offers only for July Month, Per User One Coupon Only', '2020-07-03', '2020-07-03', '3', '', '50', NULL, '1', '20', '0', '', NULL, '2020-07-02 19:54:27', '2020-07-02 19:54:27'),
(2, 'AugOffer', 'this Offer Only For August Register Customer Only', '2020-07-03', '2020-07-13', '4', '', '10', '3000', '1', '200', '1', '8,9,12,10,13', NULL, '2020-07-02 20:33:43', '2020-07-02 20:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `token_id`, `unique_id`, `created_at`, `updated_at`) VALUES
(1, 'Aravind', 'admin@gmail.com', '8883191962', '', NULL, NULL, NULL, NULL),
(2, 'aravind', 'admin1723@gmail.com', '9876548210', '$2y$10$HRa2Go7VS1fsKYHnkaG9d.L07DMsXyO5vZtiIqGauaEs1oJWMMac2', NULL, '148691', '2020-04-18 07:53:58', '2020-04-19 08:12:10'),
(3, 'aravind', 'admin123@gmail.com', '9876543210', '$2y$10$F7bDW.iNhE6M4xtrG0zdtOrc7lc3YEuanI/nt44VD0l7WoPFqC/62', NULL, NULL, '2020-04-18 08:44:42', '2020-04-18 08:44:42'),
(4, 'aravind', 'admin123@gmail.com', '9876543210', '$2y$10$oNTVoc8xEbnYrI5LqKbjh.4XklCwwP/yjXG4eKXSrOJ4KyrDTgRRK', NULL, NULL, '2020-04-18 08:45:42', '2020-04-18 08:45:42'),
(5, 'john', 'nijojio.com', '0567987826', '$2y$10$WVhA0ZjSAHPszrrahFV/iuyTP3N1QDwzvGoV69KN8rYhC.fHbQyG2', '818652', NULL, '2020-04-26 18:51:54', '2020-04-26 19:04:06'),
(6, 'mohamed', 'thowsif', '0568169568', '$2y$10$XWvRllvCkErvMpQAexkA2.a9VDHE6WFku/dFkjNzMErQdvQufHE52', '365662', NULL, '2020-04-26 19:24:34', '2020-04-26 19:24:34'),
(7, 'mohamed thowsif', 'thowsifm81@gmail.com', '0568169569', '$2y$10$p7Lw0rODbOPSvlcD8BwCl.NWpbE.cAxBOLWnrkxaRVHARJCCwAfGC', '426038', NULL, '2020-04-26 19:40:53', '2020-04-26 19:40:53'),
(8, 'trety477', '5678@223.com', '0568169569', '$2y$10$Wrckw0iZeSy9ULwY.QgEkOAmylgwLoO5de.CwP7WFkKdYYPSdBBMi', '102314', NULL, '2020-04-26 22:05:13', '2020-04-26 22:05:13'),
(9, 'Aravindkumar R', 'aravind.0216@gmail.com', '7904497927', '$2y$10$KUX2VjQzdZyt9GuVpVFR1ujdhLg2hUmyPET4GLvYCGJMUWsiZgvfy', '261952', NULL, '2020-04-28 10:45:50', '2020-04-28 10:45:50'),
(10, 'prasanth', 'prasanthats@gmail.com', '7010384622', '$2y$10$yX/oI3CprG8bTMomidgFQ.yWq.hGC3SAYI02FD9gbU1zgCx3ASdl6', '678081', '367405', '2020-04-28 11:58:35', '2020-06-12 14:39:06'),
(11, 'ali', 'alialqubaisi91@gmail.com', '0589996914', '$2y$10$KlxvXTfDAc6vbffUlnsgyewoy9JLyHeUP5DrN.M7JW8sF1afpwx3i', '681728', NULL, '2020-04-28 12:21:00', '2020-04-28 12:21:00'),
(12, 'Prasad', 'prasanthats1@gmail.com', NULL, '$2y$10$enRDp7cxnw6wjMJH1SJgOu.L.W9T2JuWjTV5TlPrdvBSQI.Qqk2G6', '890663', NULL, '2020-07-04 23:41:44', '2020-07-04 23:41:44'),
(13, 'john nijo', 'johnnijomail@gmail.com', '0564180384', '$2y$10$/RfqRFoMbKDXwC13nUQHv.f5tqTFajzq3cB/1i9yS5SC0FTeHk85.', '369181', NULL, '2020-07-12 09:28:06', '2020-07-12 09:28:06'),
(14, 'Mohamed Thowsif', 'thowsif@lrbinfotech.com', '0568169568', '$2y$10$.Hkf7nCeXxLdNrCq2.4mTOstwQ5Ob4yslQX5BWdbfgBD1IP9c25Ke', '533105', NULL, '2020-07-12 10:12:50', '2020-07-12 10:12:50'),
(15, 'heba', 'heba.alhamed@gmail.com', '0509092847', '$2y$10$C5aifiiF9IY9Afqrk56fJeFf8QHfJf7rbRHB1NMEZ7qRVTxLeROh.', '584943', NULL, '2020-07-12 13:44:55', '2020-07-12 13:44:55'),
(16, 'abdulla', 'trigger770@outlook.com', '0501401201', '$2y$10$Z2nIF6Q6Koq58tB5vvuaSOOdMeT2k.BcLIFdwXjQBAL57LjfzH6eu', '296778', NULL, '2020-07-13 03:22:15', '2020-07-13 03:22:15'),
(17, 'abdulla', 'trigger770@outlook.com', '0501401201', '$2y$10$AlsZYmHb0nOMrSy7lk8DAOmsYrtHjSlaJryasjyHL72hIBcWsmwKi', '177679', NULL, '2020-07-13 03:22:15', '2020-07-13 03:22:15'),
(18, 'alpha', 'show', NULL, '$2y$10$.CPO4J/HsP4coPA/yehYTezAdVB922kOPwemAHM77te6xZ9.1hl3y', '490834', NULL, '2020-07-13 04:21:04', '2020-07-13 04:21:04'),
(19, 'salemalmansoori', 's109s@hotmail.com', '0507688891', '$2y$10$SOTjPV0P1VRAh7CxgUuBoer07wVQBf4TDV70kgykTLcaMOsGob1K6', '210514', NULL, '2020-07-13 18:46:47', '2020-07-13 18:46:47'),
(20, 'ashika', 'ashikamrf71@gmail.com', NULL, '$2y$10$Udg7BCIPw3RVmcOhWNScWuIHk9tCct8yLo6xJWa2n.yYrMhD8Xuoy', '172098', NULL, '2020-07-14 00:50:47', '2020-07-14 00:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `position`, `image`, `title`, `text`, `created_at`, `updated_at`) VALUES
(2, '2', '1457089469.png', NULL, NULL, '2020-04-10 08:45:04', '2020-04-26 18:53:30'),
(4, '1', '136878640.png', 'Special Covid19 Pack', 'Order Soon Limited Offer Only!', '2020-04-10 08:56:49', '2020-07-03 02:07:34'),
(5, '3', '737990969.png', NULL, NULL, '2020-04-26 18:53:41', '2020-04-26 18:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Abaya', '390913844.png', '2020-04-13 13:17:00', '2020-04-24 15:06:42'),
(2, 'Jeans', '1107589384.png', '2020-04-24 10:35:23', '2020-04-24 15:07:31'),
(3, 'Office uniform', '1740017635.png', '2020-04-24 10:35:52', '2020-04-24 15:07:11'),
(4, 'Office Uniform Trouser / pants', '1416539466.png', '2020-04-24 10:36:46', '2020-04-24 15:08:04'),
(5, 'Pyjamas', '919078311.png', '2020-04-24 10:37:26', '2020-04-24 15:08:21'),
(6, 'Salwar / Kameez 2piece', '829348248.png', '2020-04-24 10:38:05', '2020-04-24 15:08:39'),
(7, 'Shirt', '943625964.png', '2020-04-24 10:39:56', '2020-04-24 15:08:58'),
(8, 'Tracksuit', '875706883.png', '2020-04-24 10:40:42', '2020-04-24 15:09:48'),
(9, 'Trouser / Pants', '1946658154.png', '2020-04-24 10:41:01', '2020-04-24 15:10:14'),
(10, 'Hijab / Scarf', '1891969887.png', '2020-04-24 10:41:56', '2020-04-24 15:10:52'),
(11, 'Niqab', '683581094.png', '2020-04-24 10:43:09', '2020-04-24 15:13:13'),
(12, 'Shawl', '1073680973.png', '2020-04-24 10:43:52', '2020-04-24 15:13:53'),
(13, 'Shela', '2055104690.png', '2020-04-24 10:44:34', '2020-04-24 15:14:09'),
(14, 'Blouse', '512529376.png', '2020-04-24 10:45:04', '2020-04-24 15:14:38'),
(15, 'Skirt', '1731570841.png', '2020-04-24 10:45:17', '2020-04-24 15:15:09'),
(16, 'Skirt (Normal)', '1124347350.png', '2020-04-24 10:45:57', '2020-04-24 15:15:32'),
(17, 'Bath Towel (Large)', '2061133868.png', '2020-04-24 10:47:08', '2020-04-24 15:16:43'),
(18, 'Gilet / Vest', '1350295469.png', '2020-04-24 10:47:38', '2020-04-24 15:17:18'),
(19, 'Neck Tie', '138206128.png', '2020-04-24 10:48:07', '2020-04-24 15:17:44'),
(20, 'Gahfia', '1901440408.png', '2020-04-24 11:17:46', '2020-04-24 15:40:25'),
(21, 'Shorts', '1225535402.png', '2020-04-24 10:49:33', '2020-04-24 15:19:52'),
(22, 'T-Shirt', '417679407.png', '2020-04-24 10:50:14', '2020-04-24 15:20:45'),
(23, 'Bath Towel (Small)', '157324277.png', '2020-04-24 10:50:39', '2020-04-24 15:21:01'),
(24, 'Lungi / Wizar', '1206092977.png', '2020-04-24 10:51:11', '2020-04-24 15:21:22'),
(25, 'Big Bag', '998306616.png', '2020-04-24 10:51:24', '2020-04-24 15:21:43'),
(26, 'Hand Towel', '1543247100.png', '2020-04-24 10:51:56', '2020-04-24 15:22:12'),
(27, 'Socks', '1207587438.png', '2020-04-24 10:52:06', '2020-04-24 15:22:38'),
(28, 'UnderShirt', '1784777393.png', '2020-04-24 10:52:53', '2020-04-24 15:22:59'),
(29, 'Underwear', '1228955595.png', '2020-04-24 10:53:04', '2020-04-24 15:23:13'),
(30, 'Vest', '1919140148.png', '2020-04-24 10:53:16', '2020-04-24 15:23:43'),
(31, 'Blanket (Single)', '109140149.png', '2020-04-24 11:18:20', '2020-04-24 15:40:47'),
(32, 'Dress (Normal)', '1287711136.png', '2020-04-24 10:54:53', '2020-04-24 15:24:36'),
(33, 'Duvet (Double)', '800788000.png', '2020-04-24 10:56:16', '2020-04-24 15:28:31'),
(34, 'Blanket (Double)', '1597859989.png', '2020-04-24 10:56:30', '2020-04-24 15:27:34'),
(35, 'Small Bag', '352876727.png', '2020-04-24 10:56:42', '2020-04-24 15:27:46'),
(36, 'Blanket(Single)', '39394858.png', '2020-04-24 10:57:21', '2020-04-24 15:28:11'),
(37, 'Duvet (single)', '552151242.png', '2020-04-24 10:57:36', '2020-04-24 15:28:43'),
(38, 'Two-Piece Suit', '486667496.png', '2020-04-24 11:00:50', '2020-04-24 15:29:08'),
(39, 'Duvet (Single)', '1449030710.png', '2020-04-24 11:18:32', '2020-04-24 15:41:15'),
(40, 'Bed Sheet (Double)', '23322902.png', '2020-04-24 11:02:32', '2020-04-24 15:30:10'),
(41, 'Jacket', '2141784771.png', '2020-04-24 11:02:52', '2020-04-24 15:30:35'),
(42, 'Jalabyeh', '267009378.png', '2020-04-24 11:03:23', '2020-04-24 15:30:53'),
(43, 'Jean Jacket', '2083056124.png', '2020-04-24 11:04:39', '2020-04-24 15:31:16'),
(44, 'Kandura (Summer)', '884002606.png', '2020-04-24 11:06:16', '2020-04-24 15:31:38'),
(45, 'Kandura (Winter)', '1896149878.png', '2020-04-24 11:06:30', '2020-04-24 15:31:57'),
(46, 'Bath Mat (Big)', '1035635821.gif', '2020-04-24 11:21:47', '2020-04-24 15:45:27'),
(47, 'Suit Jacket', '1499301435.png', '2020-04-24 11:08:24', '2020-04-24 15:33:13'),
(48, 'Tracksuit Jacket', '1070822925.png', '2020-04-24 11:08:40', '2020-07-13 00:39:44'),
(49, 'Bed Sheet (Single)', '1163528206.png', '2020-04-24 11:09:10', '2020-04-24 15:33:52'),
(50, 'Punjabi', '1271333069.png', '2020-04-24 11:11:16', '2020-04-24 15:34:14'),
(51, 'Saree', '1609084622.png', '2020-04-24 11:11:25', '2020-04-24 15:34:39'),
(52, 'Boiler', '1084560758.png', '2020-04-24 11:11:43', '2020-04-24 15:34:52'),
(53, 'Gutrah', '1477896573.png', '2020-04-24 11:12:05', '2020-04-24 15:35:08'),
(54, 'Shimagh', '1994459215.png', '2020-04-24 11:12:24', '2020-04-24 15:36:02'),
(55, 'Sweater / Pullover', '295419562.png', '2020-04-24 11:12:42', '2020-04-24 15:36:24'),
(56, 'Tablecloth Normal (Per Meter)', '275718821.png', '2020-04-24 11:13:02', '2020-04-24 15:37:00'),
(57, 'Doormat', '489929993.png', '2020-04-24 11:21:59', '2020-04-24 15:46:31'),
(58, 'Two-piece Suit', '1948058865.png', '2020-04-24 11:23:41', '2020-04-24 15:49:03'),
(59, 'Curtains (Per Meter)', '1526949641.png', '2020-04-24 11:24:21', '2020-04-24 15:50:18'),
(60, 'Pillow case', '48594945.png', '2020-04-24 11:25:44', '2020-04-24 15:51:11'),
(61, 'Lungi/Wizar', '824726980.png', '2020-04-24 11:26:31', '2020-04-24 15:52:53'),
(62, 'Neck tie', '1908536534.png', '2020-04-24 11:35:12', '2020-04-24 16:03:11'),
(63, 'Bath Mat (Small)', '1987816630.gif', '2020-04-24 11:38:18', '2020-04-24 16:04:39'),
(64, 'Sweater/Pullover', '1692627401.png', '2020-04-24 11:39:48', '2020-04-24 16:07:30'),
(65, 'Bath Mat (Medium)', '2143046435.gif', '2020-04-24 11:40:03', '2020-04-24 16:08:19'),
(66, 'Bathrobe', '231056472.png', '2020-04-24 11:40:11', '2020-04-24 16:08:48'),
(68, 'ashika', '2005066818.png', '2020-07-14 00:16:20', '2020-07-14 00:16:20'),
(69, 'test 12', '1676773148.jpg', '2020-07-14 00:41:46', '2020-07-14 00:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `manage_addresses`
--

CREATE TABLE `manage_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_addresses`
--

INSERT INTO `manage_addresses` (`id`, `map_title`, `lat`, `lng`, `addr_type`, `addr_title`, `address1`, `address2`, `address3`, `customer_id`, `phone`, `city`, `area`, `status`, `created_at`, `updated_at`) VALUES
(33, '311 Hamdan Bin Mohammed St - Al HisnAl Markaziyah West - Abu Dhabi - United Arab Emirates', '24.4843261', '54.35485079999999', 'apt', 'dalma plaza', '123', NULL, NULL, '10', NULL, 'Abu Dhabi', 'Al Rowdah and Al Mushrif', NULL, '2020-07-11 13:06:19', '2020-07-11 13:07:28'),
(34, '25 شارع رَأس مْشَيْرِب - Zone 1E3-01 - Abu Dhabi - United Arab Emirates', '24.4862052', '54.3592676', 'apt', 'dalma plaza', '1210', NULL, NULL, '13', '0564180348', 'Abu Dhabi', 'Al Zahiyah and Al Markaziyah', NULL, '2020-07-12 09:30:36', '2020-07-12 09:30:36'),
(36, 'Hamdan Street, UAE Exchange Building, Opposite DU,Second floor - Hamdan Bin Mohammed St - Zone 1E3-01 - Abu Dhabi - United Arab Emirates', '24.4865221', '54.35975910000001', 'office', 'uae exchange building', '0105', 'first floor', NULL, '13', '0564180384', 'Abu Dhabi', 'Al Zahiyah and Al Markaziyah', NULL, '2020-07-12 09:31:53', '2020-07-12 09:31:53'),
(37, 'Hamdan Bin Mohammed St - Salmen Tower - Zone 1شرق 3-01 - أبو ظبي - United Arab Emirates', '24.4860954', '54.3592755', 'villa', 'Dalma plaza', 'Hamdan street', '1208', NULL, '14', '0568169568', 'Abu Dhabi', 'Madinat Zayed', NULL, '2020-07-12 10:13:56', '2020-07-12 10:13:56'),
(38, 'Unnamed Road - Jazeerat Zarkoh - United Arab Emirates', '24.8933114', '53.0788272', 'apt', '12', 'ف', 'ف', NULL, '11', 'ت', 'Abu Dhabi', 'Madinat Zayed', NULL, '2020-07-12 11:56:30', '2020-07-12 11:56:30'),
(39, 'Almería, Spain', '36.834047', '-2.4637136', 'apt', '12', '45', NULL, NULL, '18', NULL, 'Abu Dhabi', 'Khalidiya', NULL, '2020-07-13 04:23:02', '2020-07-13 04:23:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_03_08_230016_create_categories_table', 1),
(9, '2020_03_08_230035_create_services_table', 1),
(10, '2020_03_08_235514_create_customers_table', 1),
(11, '2020_03_08_235924_create_orders_table', 1),
(12, '2020_03_09_001236_create_order_items_table', 1),
(13, '2020_03_12_002220_create_roles_table', 1),
(14, '2020_04_08_131927_create_coupons_table', 2),
(15, '2020_04_09_131829_create_home_sliders_table', 3),
(16, '2020_04_10_150846_create_agents_table', 4),
(17, '2020_04_17_170031_create_weeks_table', 5),
(18, '2020_04_17_170048_create_schedules_table', 5),
(19, '2020_04_24_110335_create_manage_addresses_table', 6),
(20, '2020_05_03_135559_create_items_table', 7),
(21, '2020_07_09_105623_create_cities_table', 8),
(22, '2020_07_09_105640_create_areas_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_driver_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_driver_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `pickup_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `date`, `agent_id`, `pickup_driver_id`, `delivery_driver_id`, `total`, `payment_type`, `pickup_date`, `pickup_time`, `delivery_date`, `delivery_time`, `address_id`, `status`, `created_at`, `updated_at`, `delivery_option`, `coupon_id`, `coupon_value`, `coupon_code`, `remark`, `payment_status`) VALUES
(64, '10', NULL, NULL, NULL, NULL, '50.0', NULL, 'Jul 12', '10:00 am - 12:00 pm', NULL, NULL, '33', '0', '2020-07-11 13:35:55', '2020-07-11 13:35:55', 'standard', '2', '5.0', 'AugOffer', 'Plz quick', 0),
(65, '13', NULL, NULL, NULL, NULL, '82.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '34', '0', '2020-07-12 09:35:02', '2020-07-12 09:35:02', 'express', '2', '8.0', 'AugOffer', 'my first order #testing', 0),
(66, '13', NULL, NULL, NULL, NULL, '0.0', NULL, 'Jul 17', '08:00 am - 10:00 am', NULL, NULL, '34', '0', '2020-07-12 09:36:39', '2020-07-12 09:36:39', 'standard', 'null', '0.0', NULL, NULL, 0),
(67, '10', NULL, NULL, NULL, NULL, '10.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '33', '0', '2020-07-12 10:09:21', '2020-07-12 10:09:21', 'standard', 'null', '0.0', NULL, 'hello', 0),
(68, '14', NULL, NULL, NULL, NULL, '31.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '37', '0', '2020-07-12 10:15:32', '2020-07-12 10:15:32', 'standard', 'null', '0.0', 'July offers', 'pls collect my cloths my immediately', 0),
(69, '11', NULL, NULL, NULL, NULL, '0.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '38', '0', '2020-07-12 11:57:09', '2020-07-12 11:57:09', 'standard', 'null', '0.0', NULL, NULL, 0),
(70, '11', NULL, NULL, NULL, NULL, '41.0', NULL, 'Jul 13', '08:00 am - 10:00 am', NULL, NULL, '38', '0', '2020-07-12 11:58:21', '2020-07-12 11:58:21', 'standard', 'null', '0.0', 'hyc', NULL, 0),
(71, '11', NULL, NULL, NULL, NULL, '41.0', NULL, 'Jul 13', '08:00 am - 10:00 am', NULL, NULL, '38', '0', '2020-07-12 11:58:22', '2020-07-12 11:58:22', 'standard', 'null', '0.0', 'hyc', NULL, 0),
(72, '13', NULL, NULL, NULL, NULL, '180.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '34', '0', '2020-07-13 07:25:38', '2020-07-13 07:25:38', 'standard', 'null', '0.0', NULL, NULL, 0),
(73, '13', NULL, NULL, NULL, NULL, '214.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '36', '0', '2020-07-13 07:27:26', '2020-07-13 07:27:26', 'standard', 'null', '0.0', NULL, NULL, 0),
(74, '10', NULL, '1', NULL, NULL, '25.0', NULL, 'Jul 13', '11:00 AM - 12:00 PM', NULL, NULL, '33', '0', '2020-07-13 10:28:47', '2020-07-14 00:47:22', 'standard', 'null', '0.0', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dry_clean_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iron_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laundry_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dry_clean_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iron_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `date`, `order_id`, `service_id`, `qty`, `price`, `created_at`, `updated_at`, `item_id`, `laundry_price`, `dry_clean_price`, `iron_price`, `laundry_qty`, `dry_clean_qty`, `iron_qty`, `total`, `status`) VALUES
(2, NULL, '49', NULL, NULL, NULL, '2020-06-11 00:17:05', '2020-06-11 00:17:05', '2', '10', '16', '6', '1', '1', '1', '32.0', NULL),
(3, NULL, '49', NULL, NULL, NULL, '2020-06-11 00:18:06', '2020-06-11 00:18:06', '62', '10', '10', '6', '1', '1', '1', '26.0', NULL),
(4, NULL, '2', NULL, NULL, NULL, '2020-06-11 02:32:14', '2020-06-11 02:32:14', '2', '5', '8', '3', '2', '2', '1', '29.0', NULL),
(5, NULL, '2', NULL, NULL, NULL, '2020-06-11 02:33:16', '2020-06-11 02:33:16', '43', '10', '15', '6', '0', '1', '0', '15.0', NULL),
(6, NULL, '2', NULL, NULL, NULL, '2020-06-11 02:34:46', '2020-06-11 02:34:46', '1', '10', '15', '6', '1', '1', '0', '25.0', NULL),
(7, NULL, '2', NULL, NULL, NULL, '2020-06-11 02:36:04', '2020-06-11 02:36:04', '26', '2', '3', NULL, '1', '1', '0', '5.0', NULL),
(8, NULL, '2', NULL, NULL, NULL, '2020-06-11 03:29:51', '2020-06-11 03:29:51', '2', '5', '8', '3', '0', '2', '2', '22.0', NULL),
(9, NULL, '3', NULL, NULL, NULL, '2020-06-11 03:46:20', '2020-06-11 03:46:20', '2', '5', '8', '3', '0', '1', '0', '8.0', NULL),
(10, NULL, '3', NULL, NULL, NULL, '2020-06-13 17:03:42', '2020-06-13 17:03:42', '2', '5', '8', '3', '1', '1', '4', '25.0', NULL),
(11, NULL, '3', NULL, NULL, NULL, '2020-06-14 04:50:36', '2020-06-14 04:50:36', '11', '5', '7', '3', '1', '1', '0', '12.0', NULL),
(12, NULL, '3', NULL, NULL, NULL, '2020-06-14 06:13:12', '2020-06-14 06:13:12', '43', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(13, NULL, '56', NULL, NULL, NULL, '2020-06-15 07:13:48', '2020-06-15 07:13:48', '1', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(14, NULL, '56', NULL, NULL, NULL, '2020-06-15 07:13:49', '2020-06-15 07:13:49', '5', '5', '8', '3', '1', '1', '0', '13.0', NULL),
(15, NULL, '56', NULL, NULL, NULL, '2020-06-15 07:13:49', '2020-06-15 07:13:49', '2', '5', '8', '3', '1', '1', '0', '13.0', NULL),
(16, NULL, '57', NULL, NULL, NULL, '2020-06-15 08:08:22', '2020-06-15 08:08:22', '1', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(17, NULL, '57', NULL, NULL, NULL, '2020-06-15 08:08:23', '2020-06-15 08:08:23', '4', '-', '8', '-', '0', '2', '0', '16.0', NULL),
(18, NULL, '57', NULL, NULL, NULL, '2020-06-15 08:08:23', '2020-06-15 08:08:23', '17', '4', '5', '-', '2', '2', '0', '18.0', NULL),
(19, NULL, '58', NULL, NULL, NULL, '2020-06-15 11:39:01', '2020-06-15 11:39:01', '4', '-', '8', '-', '0', '1', '0', '8.0', NULL),
(20, NULL, '58', NULL, NULL, NULL, '2020-06-15 11:39:02', '2020-06-15 11:39:02', '1', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(21, NULL, '61', NULL, NULL, NULL, '2020-07-05 08:45:46', '2020-07-05 08:45:46', '1', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(22, NULL, '61', NULL, NULL, NULL, '2020-07-05 08:45:46', '2020-07-05 08:45:46', '2', '5', '8', '3', '4', '0', '0', '20.0', NULL),
(23, NULL, '61', NULL, NULL, NULL, '2020-07-05 08:45:46', '2020-07-05 08:45:46', '5', '5', '8', '3', '1', '0', '0', '5.0', NULL),
(24, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:01', '2020-07-05 08:48:01', '1', '10', '15', '6', '2', '0', '0', '20.0', NULL),
(25, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:01', '2020-07-05 08:48:01', '2', '5', '8', '3', '2', '0', '0', '10.0', NULL),
(26, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:01', '2020-07-05 08:48:01', '9', '-', '8', '-', '0', '1', '0', '8.0', NULL),
(27, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:02', '2020-07-05 08:48:02', '13', '5', '7', '3', '2', '0', '0', '10.0', NULL),
(28, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:03', '2020-07-05 08:48:03', '28', '3', '8', '1', '2', '0', '0', '6.0', NULL),
(29, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:03', '2020-07-05 08:48:03', '20', '-', '1.5', '-', '0', '3', '0', '4.5', NULL),
(30, NULL, '62', NULL, NULL, NULL, '2020-07-05 08:48:03', '2020-07-05 08:48:03', '22', '4', '5', '2', '5', '0', '0', '20.0', NULL),
(31, NULL, '63', NULL, NULL, NULL, '2020-07-11 10:21:47', '2020-07-11 10:21:47', '1', '10', '15', '6', '1', '1', '0', '25.0', NULL),
(32, NULL, '63', NULL, NULL, NULL, '2020-07-11 10:21:47', '2020-07-11 10:21:47', '2', '5', '8', '3', '1', '0', '0', '5.0', NULL),
(33, NULL, '63', NULL, NULL, NULL, '2020-07-11 10:21:47', '2020-07-11 10:21:47', '4', '-', '8', '-', '0', '1', '0', '8.0', NULL),
(34, NULL, '64', NULL, NULL, NULL, '2020-07-11 13:35:58', '2020-07-11 13:35:58', '1', '10', '15', '6', '4', '0', '0', '40.0', NULL),
(35, NULL, '64', NULL, NULL, NULL, '2020-07-11 13:35:58', '2020-07-11 13:35:58', '2', '5', '8', '3', '2', '0', '0', '10.0', NULL),
(36, NULL, '65', NULL, NULL, NULL, '2020-07-12 09:35:03', '2020-07-12 09:35:03', '1', '20', '30', '12', '2', '1', '1', '82.0', NULL),
(37, NULL, '67', NULL, NULL, NULL, '2020-07-12 10:09:22', '2020-07-12 10:09:22', '1', '10', '15', '6', '1', '0', '0', '10.0', NULL),
(38, NULL, '68', NULL, NULL, NULL, '2020-07-12 10:15:33', '2020-07-12 10:15:33', '1', '10', '15', '6', '1', '1', '1', '31.0', NULL),
(39, NULL, '70', NULL, NULL, NULL, '2020-07-12 11:58:22', '2020-07-12 11:58:22', '1', '10', '15', '6', '2', '1', '1', '41.0', NULL),
(40, NULL, '71', NULL, NULL, NULL, '2020-07-12 11:58:23', '2020-07-12 11:58:23', '1', '10', '15', '6', '2', '1', '1', '41.0', NULL),
(41, NULL, '72', NULL, NULL, NULL, '2020-07-13 07:25:39', '2020-07-13 07:25:39', '39', '10', '20', '-', '2', '0', '0', '20.0', NULL),
(42, NULL, '72', NULL, NULL, NULL, '2020-07-13 07:25:39', '2020-07-13 07:25:39', '1', '10', '15', '6', '5', '0', '0', '50.0', NULL),
(43, NULL, '72', NULL, NULL, NULL, '2020-07-13 07:25:39', '2020-07-13 07:25:39', '42', '6', '15', '4', '5', '0', '0', '30.0', NULL),
(44, NULL, '72', NULL, NULL, NULL, '2020-07-13 07:25:39', '2020-07-13 07:25:39', '45', '8', '15', '5', '10', '0', '0', '80.0', NULL),
(45, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:27', '2020-07-13 07:27:27', '16', '5', '6', '3', '0', '2', '0', '12.0', NULL),
(46, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:27', '2020-07-13 07:27:27', '43', '10', '15', '6', '0', '1', '0', '15.0', NULL),
(47, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:28', '2020-07-13 07:27:28', '51', '12', '12', '6', '0', '5', '0', '60.0', NULL),
(48, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:28', '2020-07-13 07:27:28', '6', '-', '8', '-', '0', '2', '0', '16.0', NULL),
(49, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:28', '2020-07-13 07:27:28', '32', '20', '30', '6', '0', '3', '0', '90.0', NULL),
(50, NULL, '73', NULL, NULL, NULL, '2020-07-13 07:27:28', '2020-07-13 07:27:28', '64', '5', '7', '-', '0', '3', '0', '21.0', NULL),
(51, NULL, '74', NULL, NULL, NULL, '2020-07-13 10:28:48', '2020-07-13 10:28:48', '1', '10', '15', '6', '1', '1', '0', '25.0', NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_read` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_edit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_del` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_read` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_edit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_del` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_read` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_edit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_del` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_read` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_edit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_del` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `category_read`, `category_edit`, `category_del`, `services_read`, `services_edit`, `services_del`, `customer_read`, `customer_edit`, `customer_del`, `user_read`, `user_edit`, `user_del`, `role_read`, `role_edit`, `role_del`, `order_read`, `order_edit`, `order_del`, `coupon_read`, `coupon_edit`, `coupon_del`, `agent_read`, `agent_edit`, `agent_del`, `slider_read`, `slider_edit`, `slider_del`, `order_report`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', '0', '2020-04-13 02:43:30', '2020-04-16 09:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `week_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `week_id`, `title`, `description`, `from_time`, `to_time`, `status`, `created_at`, `updated_at`) VALUES
(2, '2', NULL, NULL, '11:00 AM', '12:00 PM', '0', '2020-04-18 05:49:36', '2020-04-18 05:49:36'),
(3, '1', NULL, NULL, '08:00 am', '10:00 am', '0', '2020-04-28 13:40:02', '2020-06-13 09:35:25'),
(4, '1', NULL, NULL, '10:00 am', '12:00 pm', '0', '2020-06-13 09:35:39', '2020-06-13 09:35:57'),
(6, '1', NULL, NULL, '12:00 pm', '2:00 pm', '0', '2020-06-13 09:36:10', '2020-06-13 09:36:10'),
(7, '7', NULL, NULL, '10:00 am', '12:00 pm', '0', '2020-06-13 10:04:44', '2020-06-13 10:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cat_id`, `item_id`, `price_1`, `duration_1`, `price_2`, `duration_2`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '15', NULL, '30', NULL, '2020-04-13 13:17:00', '2020-05-06 00:03:01'),
(2, '1', '2', '8', NULL, '16', NULL, '2020-04-24 10:35:23', '2020-05-06 00:03:01'),
(3, '1', '4', '8', NULL, '16', NULL, '2020-04-24 10:35:52', '2020-05-06 00:03:01'),
(5, '1', '5', '8', NULL, '16', NULL, '2020-04-24 10:37:26', '2020-05-06 00:03:01'),
(6, '1', '6', '8', NULL, '16', NULL, '2020-04-24 10:38:05', '2020-05-06 00:03:01'),
(7, '1', '28', '8', NULL, '16', NULL, '2020-04-24 10:39:56', '2020-05-06 00:03:01'),
(8, '1', '48', '8', NULL, '16', NULL, '2020-04-24 10:40:42', '2020-05-06 00:03:02'),
(9, '1', '9', '8', NULL, '16', NULL, '2020-04-24 10:41:01', '2020-05-06 00:03:02'),
(10, '1', '10', '7', NULL, '14', NULL, '2020-04-24 10:41:56', '2020-05-06 00:03:02'),
(11, '1', '11', '7', NULL, '14', NULL, '2020-04-24 10:43:09', '2020-05-06 00:03:02'),
(12, '1', '12', '7', NULL, '14', NULL, '2020-04-24 10:43:52', '2020-05-06 00:03:02'),
(13, '1', '13', '7', NULL, '14', NULL, '2020-04-24 10:44:34', '2020-05-06 00:03:02'),
(14, '1', '14', '6', NULL, '12', NULL, '2020-04-24 10:45:04', '2020-05-06 00:03:02'),
(15, '1', '16', '6', NULL, '12', NULL, '2020-04-24 10:45:17', '2020-05-06 00:03:02'),
(17, '1', '17', '5', NULL, '10', NULL, '2020-04-24 10:47:08', '2020-05-06 00:03:02'),
(18, '1', '18', '5', NULL, '10', NULL, '2020-04-24 10:47:38', '2020-05-06 00:03:02'),
(19, '1', '62', '5', NULL, '10', NULL, '2020-04-24 10:48:07', '2020-05-06 00:03:02'),
(21, '1', '21', '5', NULL, '10', NULL, '2020-04-24 10:49:33', '2020-05-06 00:03:05'),
(22, '1', '22', '5', NULL, '10', NULL, '2020-04-24 10:50:14', '2020-05-06 00:03:05'),
(23, '1', '23', '4', NULL, '8', NULL, '2020-04-24 10:50:39', '2020-05-06 00:03:05'),
(24, '1', '24', '4', NULL, '8', NULL, '2020-04-24 10:51:11', '2020-05-06 00:03:05'),
(25, '1', '25', '45', NULL, NULL, NULL, '2020-04-24 10:51:24', '2020-05-06 00:03:05'),
(26, '1', '26', '3', NULL, '6', NULL, '2020-04-24 10:51:56', '2020-05-06 00:03:05'),
(27, '1', '27', '3', NULL, '6', NULL, '2020-04-24 10:52:06', '2020-05-06 00:03:05'),
(28, '1', '28', '3', NULL, '6', NULL, '2020-04-24 10:52:53', '2020-05-06 00:03:05'),
(29, '1', '29', '3', NULL, '6', NULL, '2020-04-24 10:53:04', '2020-05-06 00:03:06'),
(30, '1', '30', '3', NULL, '6', NULL, '2020-04-24 10:53:16', '2020-05-06 00:03:06'),
(31, '1', 'Curtains(Per Meter)', '30', NULL, '60', NULL, '2020-04-24 10:54:26', '2020-04-24 15:24:19'),
(32, '1', '32', '30', NULL, '60', NULL, '2020-04-24 10:54:53', '2020-05-06 00:03:06'),
(33, '1', '33', '30', NULL, '60', NULL, '2020-04-24 10:56:16', '2020-05-06 00:03:06'),
(34, '1', '34', '25', NULL, '50', NULL, '2020-04-24 10:56:30', '2020-05-06 00:03:06'),
(35, '1', '35', '25', NULL, NULL, NULL, '2020-04-24 10:56:42', '2020-05-06 00:03:06'),
(36, '1', '36', '20', NULL, '40', NULL, '2020-04-24 10:57:21', '2020-05-06 00:03:06'),
(37, '1', '39', '20', NULL, '40', NULL, '2020-04-24 10:57:36', '2020-05-06 00:03:06'),
(38, '1', '58', '20', NULL, '40', NULL, '2020-04-24 11:00:50', '2020-05-06 00:03:06'),
(40, '1', '40', '15', NULL, '30', NULL, '2020-04-24 11:02:32', '2020-05-06 00:03:06'),
(42, '1', '42', '15', NULL, '30', NULL, '2020-04-24 11:03:23', '2020-05-06 00:03:06'),
(43, '1', '43', '15', NULL, '30', NULL, '2020-04-24 11:04:39', '2020-05-06 00:03:06'),
(44, '1', '44', '15', NULL, '30', NULL, '2020-04-24 11:06:16', '2020-05-06 00:03:06'),
(45, '1', '45', '15', NULL, '30', NULL, '2020-04-24 11:06:30', '2020-05-06 00:03:06'),
(46, '1', 'Officer Uniform', '15', NULL, '30', NULL, '2020-04-24 11:07:11', '2020-04-24 15:32:32'),
(49, '1', '49', '12', NULL, '24', NULL, '2020-04-24 11:09:10', '2020-05-06 00:03:07'),
(50, '1', '50', '12', NULL, '24', NULL, '2020-04-24 11:11:16', '2020-05-06 00:03:07'),
(51, '1', '51', '12', NULL, '24', NULL, '2020-04-24 11:11:25', '2020-05-06 00:03:07'),
(52, '1', '52', '10', NULL, '20', NULL, '2020-04-24 11:11:43', '2020-05-06 00:03:07'),
(53, '1', '53', '10', NULL, '20', NULL, '2020-04-24 11:12:05', '2020-05-06 00:03:07'),
(54, '1', '54', '10', NULL, '20', NULL, '2020-04-24 11:12:24', '2020-05-06 00:03:07'),
(55, '1', '55', '10', NULL, '20', NULL, '2020-04-24 11:12:42', '2020-05-06 00:03:07'),
(56, '1', '56', '10', NULL, '20', NULL, '2020-04-24 11:13:02', '2020-05-06 00:03:07'),
(57, '2', '28', '1.5', NULL, '3', NULL, '2020-04-24 11:15:23', '2020-05-06 00:03:07'),
(58, '2', '29', '1.5', NULL, '3', NULL, '2020-04-24 11:16:11', '2020-05-06 00:03:07'),
(59, '2', '30', '1.5', NULL, '3', NULL, '2020-04-24 11:16:28', '2020-05-06 00:03:07'),
(60, '2', '20', '1.5', NULL, '3', NULL, '2020-04-24 11:17:46', '2020-05-06 00:03:07'),
(61, '2', '31', '10', NULL, '20', NULL, '2020-04-24 11:18:20', '2020-05-06 00:03:07'),
(62, '2', '39', '10', NULL, '20', NULL, '2020-04-24 11:18:32', '2020-05-06 00:03:07'),
(63, '2', '1', '10', NULL, '20', NULL, '2020-04-24 11:19:00', '2020-05-06 00:03:07'),
(64, '2', '40', '10', NULL, '20', NULL, '2020-04-24 11:19:13', '2020-05-06 00:03:07'),
(66, '2', '43', '10', NULL, '20', NULL, '2020-04-24 11:19:36', '2020-05-06 00:03:08'),
(67, '2', 'Officer Uniform', '10', NULL, '20', NULL, '2020-04-24 11:20:20', '2020-04-24 15:43:25'),
(68, '2', '48', '10', NULL, '20', NULL, '2020-04-24 11:20:39', '2020-05-06 00:03:08'),
(70, '2', '52', '10', NULL, '20', NULL, '2020-04-24 11:21:38', '2020-05-06 00:03:08'),
(71, '2', '46', '10', NULL, '20', NULL, '2020-04-24 11:21:47', '2020-05-06 00:03:08'),
(72, '2', '57', '10', NULL, '20', NULL, '2020-04-24 11:21:59', '2020-05-06 00:03:08'),
(73, '2', '50', '12', NULL, '24', NULL, '2020-04-24 11:22:42', '2020-05-06 00:03:08'),
(74, '2', '51', '12', NULL, '24', NULL, '2020-04-24 11:23:01', '2020-05-06 00:03:08'),
(75, '2', '34', '15', NULL, '30', NULL, '2020-04-24 11:23:12', '2020-05-06 00:03:08'),
(76, '2', '58', '15', NULL, '30', NULL, '2020-04-24 11:23:41', '2020-05-06 00:03:08'),
(77, '2', '59', '20', NULL, '40', NULL, '2020-04-24 11:24:21', '2020-05-06 00:03:08'),
(78, '2', '32', '20', NULL, '40', NULL, '2020-04-24 11:24:31', '2020-05-06 00:03:08'),
(79, '2', '33', '20', NULL, '40', NULL, '2020-04-24 11:24:41', '2020-05-06 00:03:08'),
(80, '2', '60', '2', NULL, '4', NULL, '2020-04-24 11:25:44', '2020-05-06 00:03:08'),
(81, '2', '26', '2', NULL, '4', NULL, '2020-04-24 11:25:53', '2020-05-06 00:03:08'),
(82, '2', '27', '2', NULL, '4', NULL, '2020-04-24 11:26:02', '2020-05-06 00:03:08'),
(83, '2', '23', '3', NULL, '6', NULL, '2020-04-24 11:26:22', '2020-05-06 00:03:08'),
(84, '2', '61', '3', NULL, '6', NULL, '2020-04-24 11:26:31', '2020-05-06 00:03:08'),
(85, '2', '17', '4', NULL, '8', NULL, '2020-04-24 11:27:24', '2020-05-06 00:03:08'),
(86, '2', 'Gilet/Vest', '4', NULL, '8', NULL, '2020-04-24 11:27:38', '2020-04-24 15:54:09'),
(87, '2', '21', '4', NULL, '8', NULL, '2020-04-24 11:28:45', '2020-05-06 00:03:09'),
(88, '2', '22', '4', NULL, '8', NULL, '2020-04-24 11:28:54', '2020-05-06 00:03:09'),
(89, '2', '35', '55', NULL, NULL, NULL, '2020-04-24 11:29:07', '2020-05-06 00:03:09'),
(90, '2', '2', '5', NULL, '10', NULL, '2020-04-24 11:30:01', '2020-05-06 00:03:09'),
(91, '2', 'Officer Uniform Trouser/Pants', '5', NULL, '10', NULL, '2020-04-24 11:30:12', '2020-04-24 15:57:09'),
(92, '2', '5', '5', NULL, '10', NULL, '2020-04-24 11:30:21', '2020-05-06 00:03:09'),
(93, '2', 'salwar/kameez 2pc', '5', NULL, '10', NULL, '2020-04-24 11:30:30', '2020-04-24 15:59:07'),
(95, '2', 'Trouser/Pants', '5', NULL, '10', NULL, '2020-04-24 11:31:17', '2020-04-24 16:00:05'),
(96, '2', 'Hijab/Scarf', '5', NULL, '10', NULL, '2020-04-24 11:31:28', '2020-04-24 16:00:23'),
(97, '2', '11', '5', NULL, '10', NULL, '2020-04-24 11:33:16', '2020-05-06 00:03:09'),
(98, '2', '12', '5', NULL, '10', NULL, '2020-04-24 11:33:33', '2020-05-06 00:03:09'),
(99, '2', '13', '5', NULL, '10', NULL, '2020-04-24 11:34:11', '2020-05-06 00:03:09'),
(100, '2', '14', '5', NULL, '10', NULL, '2020-04-24 11:34:22', '2020-05-06 00:03:09'),
(102, '2', '16', '5', NULL, '10', NULL, '2020-04-24 11:35:02', '2020-05-06 00:03:09'),
(103, '2', '62', '5', NULL, '10', NULL, '2020-04-24 11:35:12', '2020-05-06 00:03:09'),
(104, '2', '53', '5', NULL, '10', NULL, '2020-04-24 11:35:23', '2020-05-06 00:03:10'),
(105, '2', '54', '5', NULL, '10', NULL, '2020-04-24 11:35:44', '2020-05-06 00:03:10'),
(106, '2', '56', '5', NULL, '10', NULL, '2020-04-24 11:36:15', '2020-05-06 00:03:10'),
(107, '2', '63', '5', NULL, '10', NULL, '2020-04-24 11:38:18', '2020-05-06 00:03:10'),
(108, '2', 'Officer Uniform', '6', NULL, '12', NULL, '2020-04-24 11:38:28', '2020-04-24 16:04:55'),
(109, '2', '28', '6', NULL, '12', NULL, '2020-04-24 11:38:39', '2020-05-06 00:03:10'),
(110, '2', '42', '6', NULL, '12', NULL, '2020-04-24 11:38:47', '2020-05-06 00:03:10'),
(111, '2', '44', '6', NULL, '12', NULL, '2020-04-24 11:38:57', '2020-05-06 00:03:10'),
(112, '2', '49', '6', NULL, '12', NULL, '2020-04-24 11:39:37', '2020-05-06 00:03:10'),
(113, '2', '64', '7', NULL, '14', NULL, '2020-04-24 11:39:48', '2020-05-06 00:03:10'),
(114, '2', '65', '7', NULL, '14', NULL, '2020-04-24 11:40:03', '2020-05-06 00:03:10'),
(115, '2', '66', '7', NULL, '14', NULL, '2020-04-24 11:40:11', '2020-05-06 00:03:10'),
(116, '2', '45', '8', NULL, '16', NULL, '2020-04-24 11:40:21', '2020-05-06 00:03:10'),
(117, '2', '25', '9', NULL, NULL, NULL, '2020-04-24 11:40:43', '2020-05-06 00:03:10'),
(118, '3', '58', '8', NULL, '16', NULL, '2020-04-24 11:42:05', '2020-05-06 00:03:10'),
(119, '3', 'Officer Uniform', '7', NULL, '14', NULL, '2020-04-24 11:42:20', '2020-04-24 16:13:37'),
(120, '3', '52', '7', NULL, '14', NULL, '2020-04-24 11:42:34', '2020-05-06 00:03:10'),
(121, '3', '1', '6', NULL, '12', NULL, '2020-04-24 11:42:43', '2020-05-06 00:03:10'),
(122, '3', '48', '6', NULL, '12', NULL, '2020-04-24 11:42:52', '2020-05-06 00:03:11'),
(123, '3', '43', '6', NULL, '12', NULL, '2020-04-24 11:43:03', '2020-05-06 00:03:11'),
(124, '3', '48', '6', NULL, '12', NULL, '2020-04-24 11:43:14', '2020-05-06 00:03:11'),
(125, '3', '48', '6', NULL, '12', NULL, '2020-04-24 11:43:23', '2020-05-06 00:03:11'),
(126, '3', '50', '6', NULL, '12', NULL, '2020-04-24 11:43:32', '2020-05-06 00:03:11'),
(127, '3', '51', '6', NULL, '12', NULL, '2020-04-24 11:43:41', '2020-05-06 00:03:11'),
(128, '3', '32', '6', NULL, '12', NULL, '2020-04-24 11:43:53', '2020-05-06 00:03:11'),
(129, '3', '25', '6', NULL, NULL, NULL, '2020-04-24 11:44:06', '2020-05-06 00:03:11'),
(130, '3', '40', '5', NULL, '10', NULL, '2020-04-24 11:44:18', '2020-05-06 00:03:11'),
(131, '3', '64', '5', NULL, '10', NULL, '2020-04-24 11:44:28', '2020-05-06 00:03:11'),
(132, '3', '45', '5', NULL, '10', NULL, '2020-04-24 11:44:37', '2020-05-06 00:03:11'),
(133, '3', '42', '4', NULL, '8', NULL, '2020-04-24 11:44:47', '2020-05-06 00:03:11'),
(134, '3', '44', '4', NULL, '8', NULL, '2020-04-24 11:44:57', '2020-05-06 00:03:11'),
(135, '3', '21', '3', NULL, '6', NULL, '2020-04-24 11:45:09', '2020-05-06 00:03:11'),
(136, '3', '2', '3', NULL, '6', NULL, '2020-04-24 11:45:18', '2020-05-06 00:03:11'),
(137, '3', 'Officer Uniform Trouser/Pants', '3', NULL, '6', NULL, '2020-04-24 11:45:29', '2020-04-24 16:21:47'),
(138, '3', '5', '3', NULL, '6', NULL, '2020-04-24 11:45:40', '2020-05-06 00:03:11'),
(139, '3', 'salwar/kameez 2pc', '3', NULL, '6', NULL, '2020-04-24 11:45:49', '2020-04-24 16:22:38'),
(140, '3', '48', '3', NULL, '6', NULL, '2020-04-24 11:45:57', '2020-05-06 00:03:11'),
(141, '3', 'Trouser/Pants', '3', NULL, '6', NULL, '2020-04-24 11:46:06', '2020-04-24 16:24:39'),
(142, '3', 'Hijab/Scarf', '3', NULL, '6', NULL, '2020-04-24 11:46:15', '2020-04-24 16:26:01'),
(143, '3', '11', '3', NULL, '6', NULL, '2020-04-24 11:46:23', '2020-05-06 00:03:12'),
(144, '3', '12', '3', NULL, '6', NULL, '2020-04-24 11:46:33', '2020-05-06 00:03:12'),
(145, '3', '13', '3', NULL, '6', NULL, '2020-04-24 11:46:45', '2020-05-06 00:03:12'),
(146, '3', '14', '3', NULL, '6', NULL, '2020-04-24 11:47:54', '2020-05-06 00:03:12'),
(147, '3', '16', '3', NULL, '6', NULL, '2020-04-24 11:48:09', '2020-05-06 00:03:12'),
(148, '3', '16', '3', NULL, '6', NULL, '2020-04-24 11:48:30', '2020-05-06 00:03:12'),
(149, '3', '62', '3', NULL, '6', NULL, '2020-04-24 11:49:13', '2020-05-06 00:03:12'),
(150, '3', '53', '3', NULL, '6', NULL, '2020-04-24 11:49:40', '2020-05-06 00:03:12'),
(151, '3', '54', '3', NULL, '6', NULL, '2020-04-24 11:49:49', '2020-05-06 00:03:12'),
(152, '3', 'Officer Uniform', '3', NULL, '6', NULL, '2020-04-24 11:50:36', '2020-04-24 16:31:50'),
(153, '3', '28', '3', NULL, '6', NULL, '2020-04-24 11:51:21', '2020-05-06 00:03:12'),
(154, '3', '49', '3', NULL, '6', NULL, '2020-04-24 11:52:02', '2020-05-06 00:03:12'),
(155, '3', '35', '35', NULL, NULL, NULL, '2020-04-24 11:52:14', '2020-05-06 00:03:12'),
(156, '3', '61', '2', NULL, '4', NULL, '2020-04-24 11:53:09', '2020-05-06 00:03:12'),
(157, '3', 'Gilet/Vest', '2', NULL, '4', NULL, '2020-04-24 11:54:20', '2020-04-24 16:34:06'),
(158, '3', '22', '2', NULL, '4', NULL, '2020-04-24 11:54:32', '2020-05-06 00:03:13'),
(159, '3', '28', '1', NULL, '2', NULL, '2020-04-24 11:55:48', '2020-05-06 00:03:13'),
(160, '3', '29', '1', NULL, '2', NULL, '2020-04-24 11:55:58', '2020-05-06 00:03:13'),
(161, '3', '30', '1', NULL, '2', NULL, '2020-04-24 11:56:16', '2020-05-06 00:03:13'),
(162, '3', '27', '1', NULL, '2', NULL, '2020-04-24 11:56:36', '2020-05-06 00:03:13'),
(163, '3', '59', '10', NULL, '20', NULL, '2020-04-24 11:56:47', '2020-05-06 00:03:13'),
(164, '3', '60', '1.5', NULL, '3', NULL, '2020-04-24 11:57:02', '2020-05-06 00:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(5000) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  `shop_license_code` varchar(255) DEFAULT NULL,
  `shop_address` varchar(5000) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `address`, `city`, `area`, `pincode`, `vat_number`, `shop_license_code`, `shop_address`, `logo`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@hangyourcloths.com', NULL, '1', '$2y$10$/wyr8rLDdA90Xxu0kiecV.YLsOB55HerMfbqSSojge0.XFB5/Twim', NULL, NULL, '2020-04-23 18:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weeks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `name`, `weeks`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', 'Sunday', NULL, NULL),
(2, 'Monday', 'Monday', NULL, NULL),
(3, 'Tuesday', 'Tuesday', NULL, NULL),
(4, 'Wednesday', 'Wednesday', NULL, NULL),
(5, 'Thursday', 'Thursday', NULL, NULL),
(6, 'Friday', 'Friday', NULL, NULL),
(7, 'Saturday', 'Saturday', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_addresses`
--
ALTER TABLE `manage_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `manage_addresses`
--
ALTER TABLE `manage_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
