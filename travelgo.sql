-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 12:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detailes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popular` int(11) NOT NULL DEFAULT 1,
  `upcoming` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `time`, `price`, `detailes`, `location`, `created_at`, `updated_at`, `image`, `popular`, `upcoming`) VALUES
(1, '12 Days', '12000.99', 'A good traveler has no fixed plans and is not intent on arriving.', ' Cagayan De Oro, Mapawa Nature Park', NULL, NULL, 'popular-1.jpg', 1, 0),
(3, '20 Days', '10000.00', 'Test Description.', 'Palawan, El Nido', NULL, NULL, 'popular-3.jpg', 1, 0),
(4, '7 Days', '2000.00', 'Travel Travel Travel.', 'Albay,Aklan', NULL, NULL, 'popular-3.jpg', 1, 0),
(5, '14 Days', '8000.00', 'Travel Travel Travel.', 'Aurora,Baler', NULL, NULL, 'popular-3.jpg', 1, 0),
(6, '16 Days', '20000.00', 'Travel Test.', 'Manila,Rizal Park', NULL, NULL, 'popular-3.jpg', 1, 0),
(7, '15 Days', '5000.00', 'Travel Agency is the best.', 'Places,Another Places', NULL, NULL, 'popular-3.jpg', 1, 0),
(9, '1 Day', '1000.00', 'Try Try Try', 'Rizal Park,Manila', '2022-12-08 05:35:39', '2022-12-08 05:35:39', 'rizal.png', 1, 0),
(12, '12', '20.00', 'adsads', 'Boracay', '2022-12-09 17:35:44', '2022-12-09 17:35:44', 'a0c5a994-d99a-4278-a1b1-8a3b652461ac.png', 1, 0),
(13, '10 Days', '4000.00', 'Camiguin is great', 'Cagayan De Oro Camiguin', '2022-12-10 05:14:50', NULL, 'destination-1.jpg', 1, 0),
(14, '7 Days', '1000.00', 'Boracay is the place to be', 'Island in Malay Aklan, Boracay', '2022-12-10 05:19:09', NULL, 'destination-2.jpg', 1, 0),
(15, '3 Days', '5000.00', 'The perfect Island of Baler', 'Baler Aurora,Dicasalarin Cove', '2022-12-10 05:21:34', NULL, 'destination-3.jpg', 1, 0),
(16, '9 Days', '8000.00', 'The perfect Island of Ilocos', 'Ilocos Sur,Vigan City', '2022-12-10 05:21:34', NULL, 'destination-4.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_review`
--

CREATE TABLE `global_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `global_review`
--

INSERT INTO `global_review` (`id`, `userid`, `Review`, `stars`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, '15', 'sdadasdasd', 1, 1, NULL, NULL),
(4, '15', 'sadasdasdsasdsadsad', 3, 0, NULL, NULL),
(5, '15', 'saddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 3, 1, NULL, NULL),
(9, '15', 'STARS TEST', 4, 1, NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_07_010913_update_users_table', 2),
(6, '2022_12_07_013919_create_destination_table', 3),
(7, '2022_12_07_014823_update_destination_table', 4),
(8, '2022_12_07_024915_update_destination_table', 5),
(9, '2022_12_09_003024_create_review_table', 6),
(10, '2022_12_10_015905_create_global_review_table', 7),
(11, '2022_12_10_023101_create_new_review_table_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `new_review_table`
--

CREATE TABLE `new_review_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` int(11) NOT NULL,
  `Userid` int(255) NOT NULL,
  `Review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` int(50) NOT NULL DEFAULT 0,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `destination_id`, `Userid`, `Review`, `confirmed`, `created_at`, `updated_at`) VALUES
(2, 9, 15, 'Try commenting Again', 1, 'Dec-09-22 17:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'admin', 'admin', 'harvy275@gmail.com', NULL, '$2y$10$Q6INn.jLQiVMYd2Vq4XfaeTTcVJELFdNjAWVt4u70/xN9i1Klz60q', NULL, '2022-12-07 17:29:28', '2022-12-07 17:29:28'),
(17, 'RenrevZ', 'Gascon', 'harriesonmacaso06@gmail.com', NULL, '$2y$10$w/2nK657YM4NK9XB.VMa0u3LSZKRSUQPjGHANKownonOSpJvdmiN6', NULL, '2022-12-08 07:12:41', '2022-12-08 07:12:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `global_review`
--
ALTER TABLE `global_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_review_table`
--
ALTER TABLE `new_review_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
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
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_review`
--
ALTER TABLE `global_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `new_review_table`
--
ALTER TABLE `new_review_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
