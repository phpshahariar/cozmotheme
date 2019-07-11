-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 12:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cozmo_theme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_products`
--

CREATE TABLE `admin_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_products`
--

INSERT INTO `admin_products` (`id`, `name`, `phone`, `email`, `confirm`, `accept`, `price`, `product_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Cozmo', '01234567899', 'shahariar.ikbal86@gmail.com', 'confirmed', 'confirmed', 30000.00, 'Others', NULL, '2019-05-19 00:43:56', '2019-05-19 00:43:56'),
(2, 'Shahariar', '01234567899', 'azmiry.shahariar15@gmail.com', 'confirmed', 'confirmed', 500000.00, 'Others', NULL, '2019-05-19 00:46:00', '2019-05-19 00:46:00'),
(3, 'Shahariar', '01234567899', 'azmiry.shahariar15@gmail.com', 'confirmed', 'confirmed', 500000.00, 'Others', NULL, '2019-05-19 00:46:35', '2019-05-19 00:46:35'),
(4, 'Education', '01234567899', 'shahariar.ikbal86@gmail.com', 'confirmed', 'confirmed', 50000.00, 'Education', NULL, '2019-05-20 04:55:53', '2019-05-20 04:55:53'),
(5, 'Ikbal', '01234567899', 'shahariar.ikbal86@gmail.com', 'confirmed', 'confirmed', 30000.00, 'Newspaper', NULL, '2019-05-20 22:53:29', '2019-05-20 22:53:29'),
(6, 'Ikbal', '01234567899', 'shahariar.ikbal86@gmail.com', 'confirmed', 'confirmed', 10000.00, 'Newspaper', NULL, '2019-05-22 00:14:43', '2019-05-22 00:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `cashouts`
--

CREATE TABLE `cashouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `case_out` double(8,2) NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cashouts`
--

INSERT INTO `cashouts` (`id`, `user_id`, `case_out`, `bank`, `bank_name`, `mobile`, `others`, `confirm`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'Rahim', 80000.00, NULL, NULL, '01309608232 Bkash', NULL, 'confirmed', NULL, '2019-05-15 02:33:40', '2019-05-15 02:33:40'),
(19, 'Rahim', 80000.00, NULL, NULL, '01309608232 Bkash', NULL, 'confirmed', NULL, '2019-05-15 02:37:19', '2019-05-15 02:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `main_category`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(41, 'Newspaper', 1, NULL, '2019-04-24 06:01:20', '2019-04-24 06:43:27'),
(42, 'E-commerce', 1, NULL, '2019-04-24 06:44:26', '2019-04-24 06:44:26'),
(43, 'Education', 1, NULL, '2019-04-24 06:47:43', '2019-04-24 06:49:31'),
(44, 'Industry', 1, NULL, '2019-04-24 06:47:56', '2019-04-24 06:47:56'),
(45, 'Software', 1, NULL, '2019-04-24 06:49:19', '2019-05-07 04:05:24'),
(46, 'Others', 1, NULL, '2019-05-02 05:56:51', '2019-05-07 04:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_logo`, `status`, `created_at`, `updated_at`) VALUES
(4, '1556790497_client_ECOM.jpg', 1, '2019-05-02 03:48:17', '2019-05-02 03:48:17'),
(5, '1556790510_client_ecommerce-2140603__340.jpg', 1, '2019-05-02 03:48:31', '2019-05-02 03:48:31'),
(6, '1556790522_client_BKS-web.png', 1, '2019-05-02 03:48:42', '2019-05-02 03:48:42'),
(7, '1556790588_client_bg2a.jpg', 1, '2019-05-02 03:49:48', '2019-05-02 03:49:48'),
(8, '1556790705_client_v1hd_glam_top_rear_gal.jpg', 1, '2019-05-02 03:51:46', '2019-05-02 03:51:46'),
(9, '1556791262_client_iphone6_render.jpg', 1, '2019-05-02 04:01:02', '2019-05-02 04:01:02'),
(10, '1556791278_client_How-marketers-can-make-the-best-of-holiday-season.jpg', 1, '2019-05-02 04:01:19', '2019-05-02 04:01:19'),
(11, '1556791292_client_maxresdefault.jpg', 1, '2019-05-02 04:01:33', '2019-05-02 04:01:33'),
(12, '1556791324_client_service-item.jpg', 1, '2019-05-02 04:02:04', '2019-05-02 04:02:04'),
(13, '1556791342_client_1554973705_news_2.jpg', 1, '2019-05-02 04:02:22', '2019-05-02 04:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(22, 'Rahim', 'rahim@info.com', '$2y$10$qZgax0cvfDldTkuErOH7seBy8Wujx38EMKfQ32grOa/ZlQ5ckwD/6', '2019-05-14 23:46:35', '2019-05-14 23:46:35'),
(23, 'Shahariar', 'shahariar.ikbal86@gmail.com', '$2y$10$YoU2FpgvLRLeu44QQo9E5eXmhiF1yFGr274TdLnwwc1YmfT7Tx6k.', '2019-05-20 02:01:46', '2019-05-20 02:01:46'),
(24, 'Rehan Khan', 'rehan@info.com', '$2y$10$n9IH/j.ckaKkQgBm5QE24.TBk/0fWJJ21QbLUVFOYcwdn2XccDQAS', '2019-05-22 00:31:01', '2019-05-22 00:31:01'),
(25, 'Test', 'test@gmail.com', '$2y$10$0xXorzcSqOlbhbbxbxC85.XUngF3iunZNKk9SiCLNlZnglKgMUkNW', '2019-05-28 04:39:57', '2019-05-28 04:39:57'),
(26, 'Rahim', 'rahim@gmail.com', '$2y$10$Jtc6Ab1KsfkdfPaSnb8ji.bhxxUG0PU.kmSLJIH1lBLz.iRavGJ2u', '2019-06-12 02:12:58', '2019-06-12 02:12:58'),
(27, 'Shahariar Ikbal', 'ikbal@info.com', '$2y$10$cfS7HRnnThr.5GxS8M5tO.xvvBNkgvLnfcIkdfMqWkjGksbn6OYfW', '2019-06-26 04:43:35', '2019-06-26 04:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `sale_count` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `search` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`id`, `main_category_id`, `sub_category_id`, `name`, `price`, `description`, `image`, `user_id`, `status`, `view_count`, `sale_count`, `url`, `demo_link`, `search`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 41, 33, 'Bangla News E-Paper', 60000.00, '<p>Bangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-PaperBangla News E-Paper</p>', '1557899269_customer_product_ecommerce-2140603__340.jpg', 22, 1, 1, 0, NULL, NULL, 'Approved Pending Newspaper Education E-commerce ERP PendingCustomer product ', NULL, '2019-05-14 23:47:52', '2019-05-14 23:57:11'),
(19, 42, 42, 'Bangla E-commerce', 80000.00, '<p>Bangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerceBangla E-commerce</p>', '1557899602_customer_product_ECOM.jpg', 22, 1, 2, 0, NULL, NULL, 'Approved Pending Newspaper Education E-commerce ERP Customer product Pending', NULL, '2019-05-14 23:53:23', '2019-06-26 04:46:08'),
(20, 43, 35, 'Student Enrollment', 85000.00, 'Banglakings====Student EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent EnrollmentStudent Enrollment', '1558416610_customer_product_portfolio-thumbnail-03-dark.jpg', 22, 0, 1, 0, NULL, 'https://cozmotheme.com/', 'Approved Pending Newspaper Education E-commerce ERP Customer product Pending', NULL, '2019-05-15 22:43:55', '2019-05-20 23:30:10'),
(27, 44, 37, 'Education', 864000.00, 'EducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducationEducation', '1558349285_customer_product_ipads-right.png', 23, 0, 2, 0, NULL, NULL, NULL, NULL, '2019-05-20 04:44:55', '2019-05-20 22:57:43'),
(29, 43, 34, 'Education', 720000.00, 'Banglakings=====Extra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your PriceExtra 20% Will Be Added to your Price', '1558416553_customer_product_portfolio-thumbnail-01-dark.jpg', 22, 0, 0, 0, NULL, 'https://cozmotheme.com/', NULL, NULL, '2019-05-20 23:15:59', '2019-05-20 23:29:14'),
(30, 42, 41, 'Digital Load System', 90000.00, '<p>Email: info@bitschool.net (Attn: Mrs Lubna Choudhury)<br />\r\nWeb: Bangladesh International Tutorial<br />\r\nInternational Turkish Hope High School</p>', '1558506937_customer_product_template-counter.jpg', 24, 0, 0, 0, NULL, 'google.com', NULL, NULL, '2019-05-22 00:35:37', '2019-05-22 00:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `dynamics`
--

CREATE TABLE `dynamics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dynamics`
--

INSERT INTO `dynamics` (`id`, `page_name`, `page_link`, `created_at`, `updated_at`) VALUES
(1, 'About', 'www.google.com', '2019-05-21 22:42:56', '2019-05-21 23:08:03'),
(2, 'Contact', 'google.com', '2019-05-21 22:56:34', '2019-05-21 22:56:34'),
(3, 'Home', 'google.com', '2019-05-21 22:58:15', '2019-05-21 22:58:15'),
(4, 'BLog', 'google.com', '2019-05-21 22:59:03', '2019-05-21 22:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `featureds`
--

CREATE TABLE `featureds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `featured_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featureds`
--

INSERT INTO `featureds` (`id`, `main_category_id`, `sub_category_id`, `featured_name`, `price`, `view_count`, `long_description`, `demo_link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 41, 28, 'Featured Products', 60000.00, 6, '<p>Featured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured Products</p>', NULL, '1556434747_featured_portfolio-thumbnail-02-dark.jpg', 1, '2019-04-28 00:59:08', '2019-05-22 00:28:29'),
(2, 42, 29, 'Featured Products', 500000.00, 3, '<p>Featured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured Products</p>', NULL, '1556435737_featured_ipads-left.png', 1, '2019-04-28 01:15:37', '2019-05-19 02:32:40'),
(3, 43, 36, 'Featured Products', 90000.00, 3, '<p>Featured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured Products</p>', NULL, '1556436972_featured_portfolio-thumbnail-03-dark.jpg', 1, '2019-04-28 01:36:12', '2019-05-22 00:27:06'),
(4, 43, 35, 'Featured Products', 80000.00, 1, '<p>Featured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured ProductsFeatured Products</p>', NULL, '1556437025_featured_hero-dark.jpg', 1, '2019-04-28 01:37:06', '2019-04-29 03:31:15'),
(5, 45, 29, 'Laravel Accounting Software', 900000.00, 0, '<p>Accounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting Software</p>', NULL, '1558330670_featured_1556617191_product_3.OnlineNews.png', 1, '2019-05-19 23:37:51', '2019-05-19 23:37:51'),
(6, 44, 39, 'Laravel Accounting Software', 850000.00, 1, '<p>Accounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting SoftwareAccounting Software</p>', NULL, '1558330866_featured_banner-mobile.jpg', 1, '2019-05-19 23:41:07', '2019-05-21 00:26:59'),
(7, 46, 44, 'Travel Accounting Software', 100000.00, 3, '<p>Travel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting SoftwareTravel Accounting Software</p>', 'https://cozmotheme.com/', '1558418038_featured_ico-dashboard.jpg', 1, '2019-05-19 23:43:05', '2019-06-26 04:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `featured_orders`
--

CREATE TABLE `featured_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_orders`
--

INSERT INTO `featured_orders` (`id`, `name`, `phone`, `email`, `price`, `product_id`, `confirm`, `accept`, `created_at`, `updated_at`) VALUES
(1, 'Education', '01234567899', 'cozmo@gmail.com', 100000.00, 'Others', 'confirmed', 'confirmed', '2019-05-21 00:16:24', '2019-05-21 00:16:24'),
(3, 'Cozmo', '012345678790', 'shahariar.ikbal86@gmail.com', 850000.00, 'Industry', 'confirmed', 'confirmed', '2019-05-21 00:50:57', '2019-05-21 00:50:57'),
(4, 'Cozmo', '01234567899', 'shahariar.ikbal86@gmail.com', 850000.00, 'Industry', 'confirmed', 'confirmed', '2019-05-21 01:05:30', '2019-05-21 01:05:30'),
(6, 'Cozmo', '01234567899', 'shahariar.ikbal86@gmail.com', 850000.00, 'Industry', 'confirmed', 'confirmed', '2019-05-21 01:25:21', '2019-05-21 01:25:21'),
(7, 'Ikbal', '01234567899', 'shahariar.ikbal86@gmail.com', 60000.00, 'Newspaper', 'confirmed', 'confirmed', '2019-05-22 00:28:41', '2019-05-22 00:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `title`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office Address', '<p>Road # 8/1/A, Holy Zubaida Level : 3 Dhanmondi Shobhanbag Dhaka</p>\r\n\r\n<p><strong>ইমেইল:</strong>&nbsp;cozmotheme@gmail.com&nbsp;<br />\r\n<strong>ফোন:</strong>&nbsp;+88-01730482227</p>\r\n\r\n<p>&nbsp;</p>', 1, '2019-05-02 06:28:30', '2019-05-03 23:53:49'),
(2, 'Popular CMS', '<p>Wordpress</p>\r\n\r\n<p>Megento</p>\r\n\r\n<p>Woocommerce</p>\r\n\r\n<p>CMS</p>\r\n\r\n<p>Jomla</p>\r\n\r\n<p>Jomla</p>', 0, '2019-05-02 06:31:43', '2019-05-03 23:46:47'),
(5, 'Our Company', '<p>Blog</p>\r\n\r\n<p>About Us</p>\r\n\r\n<p>Contact Us</p>\r\n\r\n<p>Portfolio</p>\r\n\r\n<p>Testmonial</p>', 0, '2019-05-02 06:53:29', '2019-05-03 23:46:43'),
(6, 'Support Team', '<p>We are 24/7 days Support for our valuable&nbsp;customer</p>\r\n\r\n<p>if any type Support call us</p>\r\n\r\n<p>+8801000000000,</p>\r\n\r\n<p>+25897416</p>\r\n\r\n<p>Email : Support@info.com</p>', 0, '2019-05-02 07:05:41', '2019-05-03 23:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, '1556189754_logo_logo-5.png', 1, '2019-04-25 04:55:54', '2019-04-25 04:55:54');

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
(3, '2019_04_18_094640_create_categories_table', 2),
(5, '2019_04_20_122147_create_sub_categories_table', 3),
(7, '2019_04_24_103124_create_products_table', 4),
(8, '2019_04_25_084456_create_logos_table', 5),
(9, '2019_04_25_111024_create_sliders_table', 6),
(10, '2019_04_28_053907_create_featureds_table', 7),
(11, '2019_04_30_055948_create_orders_table', 8),
(13, '2019_05_02_062316_create_works_table', 9),
(14, '2019_05_02_085417_create_clients_table', 10),
(15, '2019_05_02_101324_create_footers_table', 11),
(16, '2019_05_04_082648_create_contacts_table', 12),
(18, '2019_05_06_042035_create_customers_table', 13),
(19, '2019_05_06_100503_create_customer_products_table', 14),
(20, '2019_05_09_084355_create_order_products_table', 15),
(21, '2019_05_12_071157_create_cashouts_table', 16),
(22, '2019_05_19_053523_create_admin_products_table', 17),
(23, '2019_05_21_060252_create_featured_orders_table', 18),
(24, '2019_05_21_075136_create_dynamics_table', 19),
(25, '2019_05_22_052401_create_supports_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `user_id`, `product_id`, `name`, `phone`, `email`, `confirm`, `accept`, `url`, `price`, `status`, `created_at`, `updated_at`) VALUES
(23, 22, 'E-commerce', 'Khalek', '01234567899', 'khalek@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 0.00, 1, '2019-05-15 00:09:38', '2019-05-15 02:37:19'),
(24, 22, 'E-commerce', 'Khalek', '01234567890', 'khalek@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 0.00, 1, '2019-05-15 02:09:40', '2019-05-15 02:33:40'),
(25, 22, 'Newspaper', 'Malek', '01234567899', 'malek@info.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 60000.00, 1, '2019-05-15 02:39:59', '2019-05-15 02:40:21'),
(26, 22, 'E-commerce', 'Shahariar', '01738120586', 'azmiry.shahariar15@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 80000.00, 1, '2019-05-18 04:33:31', '2019-05-20 04:38:47'),
(27, 22, 'E-commerce', 'Shahariar', '01738120586', 'azmiry.shahariar15@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 80000.00, 1, '2019-05-18 04:42:41', '2019-05-20 04:57:19'),
(28, 22, 'E-commerce', 'Shahariar', '01738120586', 'azmiry.shahariar15@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 80000.00, 1, '2019-05-18 04:44:41', '2019-05-20 04:57:17'),
(29, 22, 'Education', 'Cozmo', '01234567897', 'shahariar.ikbal86@gmail.com', 'confirmed', 'confirmed', 'http://localhost/Cozmo/public/customer/product/order', 85000.00, 0, '2019-05-20 22:50:19', '2019-05-20 22:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(8,2) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `demo_link` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `main_category_id`, `sub_category_id`, `name`, `balance`, `short_description`, `long_description`, `demo_link`, `image`, `status`, `keyword`, `created_at`, `updated_at`, `view_count`) VALUES
(4, 41, 28, 'ERP', 10000.00, 'well done', '<p>well donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell donewell done</p>', 'https://cozmotheme.com/', '1558416914_admin_product_image-section.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-24 06:05:31', '2019-05-22 00:03:16', 8),
(5, 42, 32, 'News Portal', 2500.00, 'All News Gose to here', '<p>All News Gose to hereAll News Gose to hereAll News Gose to hereAll News Gose to hereAll News Gose to hereAll News Gose to hereAll News Gose to here</p>', NULL, '1556168704_product_1554973705_news_2.jpg', 1, 'The Times, Financial Times, Daily Mail, Daily Express, Daily Mirror, Guardian, Sun, News of the World; France: Le Temps, Le Figaro, Le Monde; Russia: Pravda, Izvestiya, Trud; Germany: Die Welt, Frankfurter Allgemeine; U.S.: USA Today, Washington Post, New York Times, Boston Globe, Chicago Sun-Times, Christian Science Monitor, Wall Street Journal, Baltimore Sun, Miami Herald, Chicago Tribune, Milwaukee Journal, San Francisco Chronicle, Los Angeles Times. songbad, news, bangla paper, paper, hot news.\r\n', '2019-04-24 23:05:05', '2019-06-12 06:49:12', 5),
(7, 43, 36, 'Enrollment System', 10500.00, 'Best Web Enrollment System for university', '<p>Best Web Enrollment System for university&nbsp;Best Web Enrollment System for university&nbsp;Best Web Enrollment System for university</p>', NULL, '1556168943_product_1554966551_news_team_12.png', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-24 23:09:04', '2019-05-22 00:29:53', 5),
(8, 44, 39, 'ERP System', 20500.00, 'Best ERP System for Industry', '<p>Best ERP System for Industry&nbsp;&nbsp;Best ERP System for Industry&nbsp;&nbsp;Best ERP System for Industry&nbsp;Best ERP System for Industry&nbsp;</p>', NULL, '1556169599_product_1554961313_news_about.png', 1, NULL, '2019-04-24 23:19:59', '2019-05-22 00:29:45', 6),
(10, 43, 36, 'Enrollment System', 50000.00, 'Best Enrollment System', '<p>Best Enrollment System&nbsp;Best Enrollment System&nbsp;Best Enrollment System&nbsp;Best Enrollment System&nbsp;Best Enrollment System</p>', NULL, '1556177776_product_1554973720_news_gen5.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-25 01:36:16', '2019-05-20 04:55:30', 2),
(11, 41, 32, 'Daily News', 30000.00, 'Very Day New News', '<p>Very Day New NewsVery Day New NewsVery Day New NewsVery Day New NewsVery Day New NewsVery Day New News</p>', NULL, '1556349522_product_1554801780_blog_m-listing.jpg', 1, 'newspaper, epaper, songbad, news, The Times, Financial Times, Daily Mail, Daily Express, Daily Mirror, Guardian, Sun, News of the World; France: Le Temps, Le Figaro, Le Monde; Russia: Pravda, Izvestiya, Trud; Germany: Die Welt, Frankfurter Allgemeine; U.S.: USA Today, Washington Post, New York Times, Boston Globe, Chicago Sun-Times, Christian Science Monitor, Wall Street Journal, Baltimore Sun, Miami Herald, Chicago Tribune, Milwaukee Journal, San Francisco Chronicle, Los Angeles Times.\r\nbangla paper, hot papaer', '2019-04-27 01:18:44', '2019-05-20 22:37:58', 3),
(12, 43, 34, 'School ERP', 90000.00, 'Best ERP for School', '<p>Best ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for School</p>', NULL, '1556349614_product_1554891957_blog_blog_1.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-27 01:20:14', '2019-05-22 00:29:48', 9),
(13, 43, 34, 'School ERP2', 80000.00, 'Best ERP for SchoolBest ERP', '<p>Best ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for SchoolBest ERP for School</p>', NULL, '1556349663_product_1554795867_blog_m-layout.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-27 01:21:04', '2019-05-18 02:38:46', 3),
(14, 45, 29, 'php ERP', 500000.00, 'Row laravel Software', '<p>Row laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel Software</p>', NULL, '1556349735_product_1554879135_product_portfolio-thumbnail-03-dark.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-27 01:22:15', '2019-05-22 00:29:34', 9),
(15, 43, 35, 'College ERP', 650000.00, 'Row laravel Software', '<p>Row laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel SoftwareRow laravel Software</p>', NULL, '1556349836_product_1554973705_news_2.jpg', 1, 'schooling, study, training, direction, instruction, guidance, teaching, tutoring, coaching, tutelage, learning, reading, enlightenment, edification, inculcation, discipline, tuition, preparation, adult education, book learning, self-instruction, informing, indoctrination, brainwashing, proselytism, propagandism, catechism, cultivation, background, rearing, nurture, apprenticeship; reading, writing, and \'rithmetic*; the three R\'s*, book larnin\'*.', '2019-04-27 01:23:57', '2019-05-22 00:29:51', 6),
(16, 44, 38, 'Garments Software', 90000.00, 'Garments Software', '<p>Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software&nbsp;Garments Software</p>', NULL, '1556533932_product_service-item.jpg', 1, NULL, '2019-04-29 04:32:12', '2019-05-22 00:29:43', 7),
(17, 45, 31, 'JS Frame Work', 700000.00, 'Its New But Best User Friendly', '<p>Its New But Best User Friendly&nbsp;Its New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User Friendly</p>', NULL, '1556534687_product_portfolio-thumbnail-04-dark.jpg', 1, NULL, '2019-04-29 04:44:48', '2019-05-22 00:29:38', 7),
(18, 45, 30, 'CI Frame Work', 800000.00, 'Its New But Best User Friendly', '<p>Its New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User FriendlyIts New But Best User Friendly</p>', NULL, '1556534859_product_web1.png', 1, NULL, '2019-04-29 04:47:39', '2019-05-22 00:29:36', 6),
(19, 46, 43, 'Hotel Booking', 30000.00, 'Best Booking System', '<p>Best Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking SystemBest Booking System</p>', NULL, '1556802979_product_1554973808_news_1.jpg', 1, NULL, '2019-05-02 07:16:20', '2019-05-22 00:29:32', 8),
(20, 46, 44, 'Plane Booking', 500000.00, 'Plane Booking', '<p>Plane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane BookingPlane Booking</p>', NULL, '1556803085_product_1554973834_news_pic2.jpg', 1, NULL, '2019-05-02 07:18:05', '2019-05-22 00:29:30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(6, '1559036216_slider_slider-background-3.jpg', 'Test', 'Hello test', 1, '2019-05-28 03:36:45', '2019-05-28 03:36:56'),
(7, '1559040225_slider_slider-3.jpg', 'Update', 'UpdateUpdate', 1, '2019-05-28 04:43:46', '2019-05-28 04:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `support`, `created_at`, `updated_at`) VALUES
(2, '<p>Mrs Zeba Ali<br />\r\nPrincipal (email: zebaali@bol-online.com)<br />\r\nRoad 14 A. House no 31<br />\r\nDhanmondi R.A.<br />\r\nDhaka 1209. Bangladesh</p>\r\n\r\n<p>Tel: 912-5510; 911-5550; 815-4934<br />\r\nBangladesh International Tutorial</p>', '2019-05-21 23:38:45', '2019-05-21 23:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cozmo', 'cozmo@gmail.com', NULL, '$2y$10$w92YuYM/i0DbPKF8BRaG2OqJlUvSkaYJnNtWsrGtxpJXGqH3DCIfy', NULL, '2019-04-18 01:28:32', '2019-04-18 01:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `title`, `short_description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Choose Your Template', '<p>Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.</p>', '1556780056_work_1 (1).jpg', 1, '2019-05-02 00:54:17', '2019-05-02 00:54:17'),
(3, 'Choose Your Template', '<p>Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.Pellentesque facilisis the ullamcorper sapien interdum is the magna pellentesque kequis. Phasellus keur condimentum eleifend kerat Pellentesque facilisis the ullamcorper sapien interdum magna pellentesque kequis. Phasellus condimen kettum eleifend kerat.</p>', '1556780167_work_kisspng-social-media-marketing-digital-marketing-social-me-social-media-5ac4d71451cf93.6061238215228495563351.jpg', 1, '2019-05-02 00:56:08', '2019-05-02 00:56:08'),
(4, 'Database: Migrations', '<p>Migrations are like version control for your database, allowing your team to easily modify and share the application&#39;s database schema. Migrations are typically paired with Laravel&#39;s schema builder to easily build your application&#39;s database schema. If you have ever had to tell a teammate to manually add a column to their local database schema, you&#39;ve faced the problem that database migrations solve.</p>', '1556781810_work_mac.jpg', 1, '2019-05-02 01:23:31', '2019-05-02 01:23:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_products`
--
ALTER TABLE `admin_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashouts`
--
ALTER TABLE `cashouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_category` (`main_category`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamics`
--
ALTER TABLE `dynamics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featureds`
--
ALTER TABLE `featureds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_orders`
--
ALTER TABLE `featured_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_products`
--
ALTER TABLE `admin_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cashouts`
--
ALTER TABLE `cashouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dynamics`
--
ALTER TABLE `dynamics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `featureds`
--
ALTER TABLE `featureds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `featured_orders`
--
ALTER TABLE `featured_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
