-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 01:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `image`, `created_at`, `updated_at`) VALUES
(19, 'shoes', 19, '1568305370.jpeg', '2019-09-12 10:52:50', '2019-09-12 10:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `category_id`, `color`, `size`, `views`, `price`, `vendor_id`, `created_at`, `updated_at`) VALUES
(12, 'ray ban glass', 'first copy rayben glass', 1, 'black', 'xl', 0, '1300.00', 0, '2019-09-06 14:47:55', '2019-09-06 14:47:55'),
(14, 'ray ban glass 2', 'first copy rayben glass', 1, 'black', 'xl', 0, '1300.00', 0, '2019-09-06 15:04:40', '2019-09-06 15:04:40'),
(16, 'ray ban glass xyz', 'first copy rayben glass', 1, 'black', 'xl', 0, '1300.00', 0, '2019-09-07 12:31:35', '2019-09-07 12:31:35'),
(17, 'Sparx shoes', 'original sports sparx shoes', 7, 'black', 'xl', 0, '1300.00', 0, '2019-09-07 15:13:53', '2019-09-07 15:13:53'),
(19, 'sparx sport shoes', 'dark black sparx original shoes', 7, 'black', '9', 1, '1800.00', 0, '2019-09-12 10:33:14', '2019-09-12 10:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_images`
--

INSERT INTO `item_images` (`id`, `item_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 12, '1567801075.PNG', '2019-09-06 14:47:55', '2019-09-06 14:47:55'),
(11, 14, '1567802080.PNG', '2019-09-06 15:04:40', '2019-09-06 15:04:40'),
(12, 15, '1567802947.PNG', '2019-09-06 15:19:07', '2019-09-06 15:19:07'),
(13, 12, '1567805447.PNG', '2019-09-06 16:00:47', '2019-09-06 16:00:47'),
(14, 12, '1567805464.PNG', '2019-09-06 16:01:04', '2019-09-06 16:01:04'),
(15, 1, '1567808224.PNG', '2019-09-06 16:47:04', '2019-09-06 16:47:04'),
(16, 1, '1567808234.PNG', '2019-09-06 16:47:14', '2019-09-06 16:47:14'),
(17, 16, '1567879295.PNG', '2019-09-07 12:31:35', '2019-09-07 12:31:35'),
(21, 17, '1567891543.jpeg', '2019-09-07 15:55:43', '2019-09-07 15:55:43'),
(22, 17, '1567892185.jpeg', '2019-09-07 15:55:54', '2019-09-07 16:06:25'),
(23, 19, '1568304194.jpeg', '2019-09-12 10:33:14', '2019-09-12 10:33:14');

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
(3, '2019_09_02_081427_create_slides_table', 1),
(4, '2019_09_02_081440_create_items_table', 1),
(5, '2019_09_02_081513_create_categories_table', 1),
(6, '2019_09_02_090524_create_pin_codes_table', 1),
(7, '2019_09_02_090650_create_item_images_table', 1),
(8, '2019_09_08_183419_create_carts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin_codes`
--

CREATE TABLE `pin_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `pin_code` mediumint(8) UNSIGNED NOT NULL,
  `charges` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pin_codes`
--

INSERT INTO `pin_codes` (`id`, `pin_code`, `charges`, `created_at`, `updated_at`) VALUES
(2, 431604, '100.00', '2019-09-04 13:00:25', '2019-09-04 13:00:25'),
(3, 431601, '75.00', '2019-09-04 13:00:32', '2019-09-04 13:00:32'),
(4, 431608, '150.00', '2019-09-07 16:25:18', '2019-09-07 16:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `description`, `image`, `index`, `created_at`, `updated_at`) VALUES
(5, 'shoes', 'sparx shoes', '1567930581.jpeg', 1, '2019-09-08 02:46:21', '2019-09-12 11:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `pin_code` mediumint(8) UNSIGNED DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_proof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `type`, `status`, `address`, `pin_code`, `company`, `profile_image`, `id_proof`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Aamer Sohail', 'amersohel4all@gmail.com', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$V92ZV5uch5VN0jvQMTQvaO92eTWx9KLMhUJO1ZrfPIkMdaTLDNpWS', NULL, '2019-09-05 06:18:11', '2019-09-05 06:18:11'),
(5, 'Aamer sohail', 'admin@mgm.com', '7020654094', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MPJe/0nKOO65YYdy8ymOEO2a2GguX92HulQKXqxIb7OaxzV/ZAH1a', NULL, '2019-09-08 04:29:33', '2019-09-08 04:29:33'),
(7, 'Aamer sohail', 'admin2@mgm.com', '7020654094', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2KIInDUHq6eKDJt215.kD.MxRieT7EoYd13PDF/WZj5pVzFkZA36G', NULL, '2019-09-08 05:01:53', '2019-09-08 05:01:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_title_unique` (`title`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pin_codes`
--
ALTER TABLE `pin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pin_codes`
--
ALTER TABLE `pin_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
