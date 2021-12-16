-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 11:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionnaire`
--

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
-- Table structure for table `kerdeseks`
--

CREATE TABLE `kerdeseks` (
  `kerdes_id` int(10) UNSIGNED NOT NULL,
  `kerdoiv_id` int(10) UNSIGNED NOT NULL,
  `kerdes_szovege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerdeseks`
--

INSERT INTO `kerdeseks` (`kerdes_id`, `kerdoiv_id`, `kerdes_szovege`) VALUES
(6, 5, 'Ön mennyire találta nehéznek elsajátítani a Laravel-t?'),
(7, 5, 'Hanyasra értékeli a munkánkat?');

-- --------------------------------------------------------

--
-- Table structure for table `kerdoivs`
--

CREATE TABLE `kerdoivs` (
  `kerdoiv_id` int(10) UNSIGNED NOT NULL,
  `kerdoiv_nev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kerdoivs`
--

INSERT INTO `kerdoivs` (`kerdoiv_id`, `kerdoiv_nev`) VALUES
(5, 'Bemutató kérdőív');

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
(5, '2021_11_14_182626_create_kerdoivs_table', 1),
(6, '2021_11_14_185354_create_kerdeseks_table', 1),
(7, '2021_11_14_185403_create_valaszoks_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$uAuFsOHahJhAigdaCXqBieIDM778lwj6BWAAzMdZIY5KxxakfeVgq', NULL, '2021-12-09 13:12:35', '2021-12-09 13:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `valaszoks`
--

CREATE TABLE `valaszoks` (
  `valaszok_id` int(10) UNSIGNED NOT NULL,
  `kerdes_id` int(10) UNSIGNED NOT NULL,
  `valasz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fiatalok` int(11) NOT NULL,
  `kozepkoruak` int(11) NOT NULL,
  `idosek` int(11) NOT NULL,
  `ferfi` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `egyeb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `valaszoks`
--

INSERT INTO `valaszoks` (`valaszok_id`, `kerdes_id`, `valasz`, `fiatalok`, `kozepkoruak`, `idosek`, `ferfi`, `no`, `egyeb`) VALUES
(26, 6, 'Nagyon nehéznek', 0, 0, 1, 0, 1, 0),
(27, 6, 'Nehéznek', 0, 0, 0, 0, 0, 0),
(28, 6, 'Nehéz is meg nem is...', 1, 0, 0, 0, 0, 1),
(29, 6, 'Könnyű volt', 0, 0, 0, 0, 0, 0),
(30, 6, 'Nagyon könnyű volt', 1, 0, 0, 1, 0, 0),
(31, 7, '1', 0, 0, 0, 0, 0, 0),
(32, 7, '2', 1, 0, 0, 0, 0, 1),
(33, 7, '3', 0, 0, 0, 0, 0, 0),
(34, 7, '4', 0, 0, 0, 0, 0, 0),
(35, 7, '5', 1, 0, 1, 1, 1, 0);

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
-- Indexes for table `kerdeseks`
--
ALTER TABLE `kerdeseks`
  ADD PRIMARY KEY (`kerdes_id`),
  ADD KEY `kerdeseks_kerdoiv_id_foreign` (`kerdoiv_id`);

--
-- Indexes for table `kerdoivs`
--
ALTER TABLE `kerdoivs`
  ADD PRIMARY KEY (`kerdoiv_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `valaszoks`
--
ALTER TABLE `valaszoks`
  ADD PRIMARY KEY (`valaszok_id`),
  ADD KEY `valaszoks_kerdes_id_foreign` (`kerdes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kerdeseks`
--
ALTER TABLE `kerdeseks`
  MODIFY `kerdes_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kerdoivs`
--
ALTER TABLE `kerdoivs`
  MODIFY `kerdoiv_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `valaszoks`
--
ALTER TABLE `valaszoks`
  MODIFY `valaszok_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kerdeseks`
--
ALTER TABLE `kerdeseks`
  ADD CONSTRAINT `kerdeseks_kerdoiv_id_foreign` FOREIGN KEY (`kerdoiv_id`) REFERENCES `kerdoivs` (`kerdoiv_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `valaszoks`
--
ALTER TABLE `valaszoks`
  ADD CONSTRAINT `valaszoks_kerdes_id_foreign` FOREIGN KEY (`kerdes_id`) REFERENCES `kerdeseks` (`kerdes_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
