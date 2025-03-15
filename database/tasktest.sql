-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 09:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasktest`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_03_13_101358_create_tasks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'MyApp', 'ad3573bba3c86df6ab328881e2e4be5bf29a4d61d21963fc87639cbf99a8df13', '[\"*\"]', NULL, NULL, '2025-03-13 05:14:05', '2025-03-13 05:14:05'),
(2, 'App\\Models\\User', 1, 'MyApp', 'bdae7c4cb540cf2160406ec0d35b10a79cbf9c14aa2c2a486571c27411cebf46', '[\"*\"]', NULL, NULL, '2025-03-13 07:22:01', '2025-03-13 07:22:01'),
(3, 'App\\Models\\User', 1, 'MyApp', '97e9cd3b787f202bea559746033377d1822bc343433c68f7aa33037d41959e41', '[\"*\"]', NULL, NULL, '2025-03-14 22:17:13', '2025-03-14 22:17:13'),
(4, 'App\\Models\\User', 1, 'MyApp', '6fa9e631d7d917cebb1a05317ba2b03eb6df84df885ae5099250232663f5c0c3', '[\"*\"]', NULL, NULL, '2025-03-14 22:17:18', '2025-03-14 22:17:18'),
(5, 'App\\Models\\User', 1, 'MyApp', '3bf798669ee462a74d300bda233dd16e0a5afaf7d725ea104d7cf24d7e7c5a43', '[\"*\"]', NULL, NULL, '2025-03-14 22:19:27', '2025-03-14 22:19:27'),
(6, 'App\\Models\\User', 1, 'MyApp', 'fdb25d278e50109e59e03306086c8707cec5935cb4e5c11f345076defc85e843', '[\"*\"]', NULL, NULL, '2025-03-14 22:22:00', '2025-03-14 22:22:00'),
(7, 'App\\Models\\User', 1, 'MyApp', 'c49402b89098d2ff966b4b5215061c71bd364d852a8acf5bcf3d037facd61a05', '[\"*\"]', NULL, NULL, '2025-03-14 22:22:33', '2025-03-14 22:22:33'),
(8, 'App\\Models\\User', 1, 'MyApp', '6761c415cbc77755ed61693762215e346b27671af71c5783d5cadd01ed0a678a', '[\"*\"]', NULL, NULL, '2025-03-14 22:23:54', '2025-03-14 22:23:54'),
(9, 'App\\Models\\User', 1, 'MyApp', '9b4ee7b3a218de6006a9ee612396fdf1fb27e095572d3c035211b99c158892d4', '[\"*\"]', NULL, NULL, '2025-03-14 22:33:19', '2025-03-14 22:33:19'),
(10, 'App\\Models\\User', 1, 'MyApp', 'c48d24bef764a516657df5c43aa4fd389ce9804fad1e27ad7799e422b8d2a3dd', '[\"*\"]', NULL, NULL, '2025-03-14 23:06:03', '2025-03-14 23:06:03'),
(11, 'App\\Models\\User', 1, 'MyApp', '8297c99b9a5e1dfae54b8963beb5067ded1e135074d2bda0d9e09dfc68c371c9', '[\"*\"]', NULL, NULL, '2025-03-14 23:06:33', '2025-03-14 23:06:33'),
(12, 'App\\Models\\User', 1, 'MyApp', '7c3b67450d060fea00eb3d1ffae2c2535fa835483dfff9f26ad029c9fdeef8b7', '[\"*\"]', NULL, NULL, '2025-03-14 23:07:54', '2025-03-14 23:07:54'),
(13, 'App\\Models\\User', 1, 'MyApp', 'e5b55a65e2633ba429ee8f33c6d920371ce3c81a05eb4930aa51a3bddf06e952', '[\"*\"]', NULL, NULL, '2025-03-14 23:09:43', '2025-03-14 23:09:43'),
(14, 'App\\Models\\User', 1, 'MyApp', '5334cd66e65ef720e3ddec11a54abfce2a419c77e5c92bdcaeba4305a7d26b39', '[\"*\"]', NULL, NULL, '2025-03-14 23:12:02', '2025-03-14 23:12:02'),
(15, 'App\\Models\\User', 2, 'MyApp', '9f0f24a686b51653cd2c5c21815a173b464cf85bff162fe5ac62cf31cdbfa158', '[\"*\"]', NULL, NULL, '2025-03-15 02:26:48', '2025-03-15 02:26:48'),
(16, 'App\\Models\\User', 2, 'MyApp', 'c78765dc6ec4c327ad95ce9bae0a815e8ae14321c5422323941c6145cf273218', '[\"*\"]', NULL, NULL, '2025-03-15 02:27:00', '2025-03-15 02:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Test', 'Test', '0', '2025-03-14 23:20:23', '2025-03-15 01:01:54', '2025-03-15 01:01:54'),
(2, 1, 'Test12', 'Test2', '2', '2025-03-15 00:11:13', '2025-03-15 02:04:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sub Insulation Board', 'abhishtraghuvanshi1078@gmail.com', 1, NULL, '$2y$10$4Wp7p66N8ahdgBvDjUCqPecmsdgSOEuDUpt.Ld9PlzkJ4mYVRQJOu', NULL, '2025-03-13 05:14:05', '2025-03-13 05:14:05'),
(2, 'Test', 'test@gmail.com', 2, NULL, '$2y$10$nytCY8.6WWbcGJKIda96KOp90c5jlBG.2x6Pf.N9DDfYPWOIhH7/u', NULL, '2025-03-15 02:26:48', '2025-03-15 02:26:48');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
