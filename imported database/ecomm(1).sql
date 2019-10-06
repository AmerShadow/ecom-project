-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 01:09 PM
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

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `item_id`, `status`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 4, 12, 0, 4, '1300.00', '2019-09-18 14:49:05', '2019-09-23 05:35:29'),
(6, 4, 12, 1, 1, '1300.00', '2019-09-18 14:53:06', '2019-09-23 04:56:02'),
(7, 4, 12, 1, 1, '1300.00', '2019-09-18 14:53:08', '2019-09-23 04:56:02');

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
  `discount_ratio` decimal(10,0) NOT NULL DEFAULT '0',
  `tax_ratio` decimal(10,0) NOT NULL DEFAULT '0',
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `category_id`, `color`, `size`, `views`, `price`, `discount_ratio`, `tax_ratio`, `vendor_id`, `created_at`, `updated_at`) VALUES
(12, 'ray ban glass', 'first copy rayben glass', 1, 'black', 'xl', 15, '1300.00', '25', '12', 0, '2019-09-06 14:47:55', '2019-10-04 04:17:17'),
(16, 'ray ban glass xyz', 'first copy rayben glass', 1, 'black', 'xl', 2, '1300.00', '0', '0', 0, '2019-09-07 12:31:35', '2019-10-02 03:16:37'),
(19, 'sparx sport shoes', 'dark black sparx original shoes', 7, 'black', '9', 6, '1800.00', '0', '0', 0, '2019-09-12 10:33:14', '2019-10-02 03:16:42'),
(20, 'Boxer', 'hello this is me', 19, 'black', 'xl', 3, '150.00', '15', '15', 0, '2019-09-16 09:37:06', '2019-10-02 03:16:48'),
(21, 'Boxer 1', 'hello this is me', 19, 'black', 'xl', 1, '150.00', '15', '15', 0, '2019-09-16 09:40:18', '2019-09-16 10:17:53'),
(22, 'Reebok shoes', 'Reebok shoes with sparx logo?isnt it insane', 19, 'black', '9', 2, '1800.00', '25', '10', 4, '2019-10-02 03:44:48', '2019-10-03 11:48:32'),
(23, 'Lava', 'hello', 19, 'blue', '7', 0, '2500.00', '12', '10', 4, '2019-10-02 04:10:26', '2019-10-02 04:10:26'),
(25, 'Lava', 'hello', 19, 'blue', '7', 0, '2500.00', '12', '10', 4, '2019-10-02 04:15:39', '2019-10-02 04:15:39'),
(26, 'Lava', 'hello', 19, 'blue', '7', 0, '2500.00', '12', '10', 4, '2019-10-02 04:16:18', '2019-10-02 04:16:18'),
(27, 'Lava', 'hello', 19, 'blue', '7', 0, '2500.00', '12', '10', 4, '2019-10-02 04:24:00', '2019-10-02 04:24:00'),
(28, 'Aamer SOhail', 'Hello', 19, 'blue', '11', 0, '3500.00', '10', '25', 4, '2019-10-02 04:28:54', '2019-10-02 04:28:54'),
(29, 'Aamer SOhail', 'Hello', 19, 'blue', '11', 0, '3500.00', '10', '25', 4, '2019-10-02 04:29:35', '2019-10-02 04:29:35');

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
(23, 19, '1568304194.jpeg', '2019-09-12 10:33:14', '2019-09-12 10:33:14'),
(24, 20, '1568647454.PNG', '2019-09-16 09:37:06', '2019-09-16 09:54:14'),
(25, 21, '1568647433.PNG', '2019-09-16 09:40:18', '2019-09-16 09:53:53'),
(26, 22, '1570007688.jpeg', '2019-10-02 03:44:48', '2019-10-02 03:44:48'),
(27, 25, '1570009539.jpeg', '2019-10-02 04:15:39', '2019-10-02 04:15:39'),
(28, 26, '1570009578.jpeg', '2019-10-02 04:16:18', '2019-10-02 04:16:18'),
(29, 27, '1570010040.jpeg', '2019-10-02 04:24:00', '2019-10-02 04:24:00'),
(30, 28, '1570010334.jpeg', '2019-10-02 04:28:54', '2019-10-02 04:28:54'),
(31, 29, '1570010375.jpeg', '2019-10-02 04:29:35', '2019-10-02 04:29:35');

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
(8, '2019_09_08_183419_create_carts_table', 2),
(9, '2019_09_12_112750_create_orders_table', 3),
(10, '2019_09_12_112941_create_order_items_table', 3),
(11, '2019_09_30_124952_create_roles_table', 4),
(12, '2019_10_02_205404_create_transactions_table', 5),
(13, '2019_10_02_215431_create_subscription_plans_table', 5),
(14, '2019_10_02_215626_create_revenue_plans_table', 5),
(15, '2019_10_05_093856_create_user_subscriptions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `tax` decimal(8,2) NOT NULL DEFAULT '0.00',
  `other_charges` decimal(8,2) NOT NULL DEFAULT '0.00',
  `grand_total` decimal(10,2) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` bigint(20) NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `total`, `tax`, `other_charges`, `grand_total`, `address`, `pin_code`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 113, 13, '14000.00', '0.00', '0.00', '14000.00', '', 0, 'cod', '113', '2019-10-15 18:30:00', '2019-10-24 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` decimal(8,2) NOT NULL,
  `tax_ratio` decimal(3,2) NOT NULL,
  `discount_ratio` decimal(3,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `item_id`, `vendor_id`, `quantity`, `mrp`, `tax_ratio`, `discount_ratio`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 4, 6, '1200.00', '9.99', '9.99', '1023.00', 2, NULL, '2019-10-04 04:12:11');

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
('amersohailroot@gmail.com', '$2y$10$v.xziTMSWaAUdUcvJJasjOcNs12wWcjV8t7yIpDg5pbP4W.uWrP4O', '2019-10-05 03:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `pin_codes`
--

CREATE TABLE `pin_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `pin_code` mediumint(8) UNSIGNED NOT NULL,
  `charges` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pin_codes`
--

INSERT INTO `pin_codes` (`id`, `vendor_id`, `pin_code`, `charges`, `created_at`, `updated_at`) VALUES
(2, 0, 431604, '100.00', '2019-09-04 13:00:25', '2019-09-04 13:00:25'),
(3, 0, 431601, '75.00', '2019-09-04 13:00:32', '2019-09-04 13:00:32'),
(4, 0, 431608, '150.00', '2019-09-07 16:25:18', '2019-09-07 16:31:30'),
(5, 4, 341605, '100.00', '2019-10-03 11:24:32', '2019-10-03 11:24:32'),
(6, 4, 431608, '125.00', '2019-10-03 11:31:47', '2019-10-03 11:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `revenue_plans`
--

CREATE TABLE `revenue_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `max_stock` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `title`, `price`, `duration`, `max_stock`, `created_at`, `updated_at`) VALUES
(3, 'Gold', '3000.00', 6, '50000.00', '2019-10-03 06:00:59', '2019-10-03 06:50:07'),
(5, 'silver', '3000.00', 6, '50000.00', '2019-10-03 06:03:03', '2019-10-03 06:50:17'),
(6, 'platinium', '5000.00', 12, '50000.00', '2019-10-03 06:05:42', '2019-10-03 06:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(9,2) UNSIGNED NOT NULL,
  `status_code` bigint(20) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `transaction_id`, `payment_mode`, `amount`, `status_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 113, 'cod', '14000.00', 1, '1', '2019-10-08 18:30:00', '2019-10-16 18:30:00'),
(2, 1, 114, 'cod', '14000.00', 2, '2', '2019-10-14 18:30:00', '2019-10-15 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT '2',
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
(4, 'Aamer Sohail', 'amersohel4all@gmail.com', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, '2019-10-05 03:49:31', '$2y$10$V92ZV5uch5VN0jvQMTQvaO92eTWx9KLMhUJO1ZrfPIkMdaTLDNpWS', 'rkvo48hW55tTsdkQ7cF3bRZvvWDaP8YuZcxT7kuYutnIFcRrEETMf2ok5LVj', '2019-09-05 06:18:11', '2019-10-05 03:49:31'),
(5, 'Aamer sohail', 'admin@mgm.com', '7020654094', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MPJe/0nKOO65YYdy8ymOEO2a2GguX92HulQKXqxIb7OaxzV/ZAH1a', NULL, '2019-09-08 04:29:33', '2019-10-01 16:36:47'),
(8, 'Aamer sohail', 'admin@aamer.com', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$UtY70X6EH0WYdrGv3yC.3uXT5zQzf8GgAxBJYu9KgB8ar5WLX2B0m', 'BI8ahUppshATq9651iUg8sGpB8gQHlkidbiGFQVSAMqcLbEvIQV0uM7nsk2x', '2019-09-30 07:36:36', '2019-09-30 07:36:36'),
(13, 'Aamer', 'Aamer@Aamer.com', '7020654094', 3, 0, 'Hatai, Nanded', 431604, 'Central Solutions', NULL, NULL, NULL, 'xx', 'xx', NULL, '2019-10-01 16:36:39'),
(25, 'Aamer sohail', 'amersohailroot@gmail.com', '7020654094', 2, 1, 'Hatai katbala road', 431604, '7020654094', '1570266489.png', '1570266489.jpg', '2019-10-05 03:39:09', '$2y$10$.H8ELjQ5hCHg1sa5TVvI0ePPuU3cQL4if5wR6//GpfLG80Zjrnkya', 'gX9x5lGNz7NPm8rjeJUUzw2zpPydWGnW3hlVrWoTVMK9aTLOzvAMSRE4b9zi', '2019-10-05 03:38:09', '2019-10-05 03:39:09'),
(26, 'Syed Mazhar', 'mazharsayyed7@gmail.com', '7020654094', 2, 1, 'Hatai katbala road', 431604, '7020654094', '1570351689.png', '1570351689.jpg', NULL, '$2y$10$vsAXJoP5vw6XgOH4OXgEtuybvn6/RVkdSflCcLrlb3j8d3mRK1HqW', 'YWvs3edvAIUVW358VATEyRreuT3SzZy2047U1XuNjtwrjImhsvMC1dWPVKjO', '2019-10-06 03:18:10', '2019-10-06 03:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `subscription_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `is_expired` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `revenue_plans`
--
ALTER TABLE `revenue_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `user_subscriptions_plan_id_foreign` (`plan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pin_codes`
--
ALTER TABLE `pin_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `revenue_plans`
--
ALTER TABLE `revenue_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `user_subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`),
  ADD CONSTRAINT `user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
