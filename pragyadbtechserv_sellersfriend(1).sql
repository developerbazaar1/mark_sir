-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2024 at 07:04 AM
-- Server version: 10.5.22-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pragyadbtechserv_sellersfriend`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$12$1mMKpX/FvnfixQiXCFFquusgIwHPZj/ivfHJauk1EH4iyWLz/aDeu', '2024-03-05 11:09:20');

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

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(6, 'Amazon', 'Retailer', '2024-02-09 01:41:35', '2024-02-09 01:41:35'),
(7, 'Instagram', 'Social Media', '2024-02-09 01:41:56', '2024-02-09 01:45:59'),
(8, 'Generic', 'Publisher', '2024-02-28 08:13:46', '2024-02-28 08:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `sitetypes`
--

CREATE TABLE `sitetypes` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitetypes`
--

INSERT INTO `sitetypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Social Media', '2024-02-08 12:45:49', NULL),
(2, 'Retailer', '2024-02-08 12:45:49', NULL),
(7, 'Publisher', '2024-02-28 08:12:40', '2024-02-28 08:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `site_error`
--

CREATE TABLE `site_error` (
  `id` int(11) NOT NULL,
  `site_type` text DEFAULT NULL,
  `asset_type` text DEFAULT NULL,
  `device_type` text DEFAULT NULL,
  `max_width` text DEFAULT NULL,
  `max_height` text DEFAULT NULL,
  `width` text DEFAULT NULL,
  `height` text DEFAULT NULL,
  `dimentions` text DEFAULT NULL,
  `ratio` text DEFAULT NULL,
  `max_size` text DEFAULT NULL,
  `max_no` text DEFAULT NULL,
  `min_no` text DEFAULT NULL,
  `file_formate` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_error`
--

INSERT INTO `site_error` (`id`, `site_type`, `asset_type`, `device_type`, `max_width`, `max_height`, `width`, `height`, `dimentions`, `ratio`, `max_size`, `max_no`, `min_no`, `file_formate`, `created_at`, `updated_at`) VALUES
(1, 'Social Media', 'image', 'both', '6000', '6000', '1080', '1080', 'Recommended', '1.91 to 1.1', '30720000', '10', '1', 'JPG JPEG PNG', '2024-02-12 12:44:45', '2024-03-13 06:35:55'),
(2, 'Retailer', 'image', 'both', '6000', '6000', '3000', '3000', 'Recommended', '01:01', '30720000', '10', '1', 'JPEG JPG TIFF PNG ', '2024-02-12 12:48:09', NULL),
(3, 'Retailer', 'video', 'both', NULL, NULL, NULL, NULL, 'Min', '16:09', '10240000', '1', '1', 'MP4 MOV 3GP AAC AVI FLV MPEG-2', '2024-02-12 12:48:09', '2024-03-13 06:47:43'),
(4, 'Publisher', 'image', 'both', '1080', '1920', '120', '20', 'Fixed', 'n/a', '614400', '14', '1', 'JPG JPEG PNG GIF', '2024-02-12 12:48:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `userType` enum('admin','user') NOT NULL DEFAULT 'user',
  `access_status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `mail_sent` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `userType`, `access_status`, `remember_token`, `mail_sent`, `created_at`, `updated_at`) VALUES
(1, 'Mark Nilski', 'admin@gmail.com', NULL, '$2y$12$vKpKN3zQGrqxlpy2KnrMx.1DjMDhQETFP5eH7jym0Aej5GImAbm4y', 'admin', 'active', NULL, '0', '2024-02-07 01:43:51', '2024-03-12 06:47:55'),
(3, 'Test', 'test@gmail.com', NULL, '$2y$12$FHkATXBJoqK4CCBhynu4eOb7pCc6bnC3gwDHKL9jye3UfJLV5.Umi', 'user', 'active', NULL, '0', '2024-02-07 04:25:42', '2024-03-05 14:11:32'),
(6, 'test', 'test2@gmail.com', NULL, '$2y$12$JJICZUVnMFv6DEqHMJw2X.slCOfb6DnbtPgNaS4gyQpaSJPZ0n33e', 'user', 'inactive', NULL, '0', '2024-02-07 04:43:16', '2024-03-12 07:19:43'),
(8, 'rr', 'rr@gm.in', NULL, '$2y$12$Dp8jLAmUu4/RtgA1Edelz.WQotyyqe/GYpx1SEVlu/CuYGKbbJTc.', 'user', 'inactive', NULL, '0', '2024-02-07 04:47:29', '2024-03-05 14:25:53'),
(9, 'test', 'test@gm.in', NULL, '$2y$12$tIMG2XNlcA/DdHqNRGXFQOw/fwbm.fAr25Ne3Hr9VKHfZuOHia/KG', 'user', 'inactive', NULL, '0', '2024-02-07 04:56:31', '2024-03-12 07:44:00'),
(11, 'pragya', 'pragya@gm.com', NULL, '$2y$12$6q9IRZJn5psNVJHlDMDjdecKj7Ezdg5ZSF1tG4AxPY7JiwzI/hZb2', 'user', 'active', NULL, '0', '2024-02-09 02:33:11', '2024-03-12 07:23:25'),
(12, 'pragya', 'pragya@gmail.com', NULL, '$2y$12$gOSP9JaWTKEgBpHRPU3KH.gtU5VyLFWfYchV/RjUAWpFH6Eu9FQVy', 'user', 'active', NULL, '0', '2024-03-04 07:46:36', '2024-03-05 14:25:27'),
(13, 'pp', 'pp@gmail.com', NULL, '$2y$12$wpGe6a3ZKHCeDpJx7pyPT..EEgfWnaep2RpBVHZCmHptJDPUz9YWS', 'user', 'active', NULL, '0', '2024-03-04 14:18:21', '2024-03-06 14:26:41'),
(14, 'kk', 'kk@gm.in', NULL, '$2y$12$YBpJ4WJn1WLA9Mg7F0KaCuTKyY3Oicoxyhecv66LYlDGBmrriQg4.', 'user', 'inactive', NULL, '1', '2024-03-12 06:44:15', '2024-03-12 07:49:54'),
(15, 'Pragya', 'pragyakushwah2017@gmail.com', NULL, '$2y$12$zudSvjckiZMOmTteeBHWle6bixEMssD4sG4IcLbIBMJRs/1Xvu.I2', 'user', 'active', NULL, '1', '2024-03-12 07:59:42', '2024-03-12 08:00:18'),
(17, 'pc', 'pragyachouhan76666@gmail.com', NULL, '$2y$12$8CiVPXHTNlTQp8qeCo/r..eRw3BHdu0MPlkTzwbEB5aNb9zPdMbIe', 'user', 'active', NULL, '1', '2024-03-15 06:40:36', '2024-03-15 06:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `usersites`
--

CREATE TABLE `usersites` (
  `id` int(11) NOT NULL,
  `unique_id` text DEFAULT NULL,
  `sitetype` text DEFAULT NULL,
  `site` text DEFAULT NULL,
  `user_id` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `valid_days` text DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `end_date` text DEFAULT NULL,
  `preview_link` text DEFAULT NULL,
  `preview_link_count` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersites`
--

INSERT INTO `usersites` (`id`, `unique_id`, `sitetype`, `site`, `user_id`, `status`, `valid_days`, `start_date`, `end_date`, `preview_link`, `preview_link_count`, `created_at`, `updated_at`) VALUES
(50, '65f04322933db', 'Retailer', 'Amazon', '15', 'active', '30', '2024-03-12', '2024-04-11', 'https://pragya.dbtechserver.online/Sellersfriend/preview/amazon-desktop/65f04322933db---https://pragya.dbtechserver.online/Sellersfriend/preview/amazon-mobile/65f04322933db', 2, '2024-03-12 11:57:22', '2024-03-12 12:00:51'),
(51, '65f0449814338', 'Retailer', 'Amazon', '15', 'active', '30', '2024-03-12', '2024-04-11', 'https://pragya.dbtechserver.online/Sellersfriend/preview/amazon-desktop/65f0449814338---https://pragya.dbtechserver.online/Sellersfriend/preview/amazon-mobile/65f0449814338', 2, '2024-03-12 12:03:36', '2024-03-12 12:04:07'),
(52, '65f045565a092', 'Publisher', 'Generic', '15', 'active', '30', '2024-03-12', '2024-04-11', 'https://pragya.dbtechserver.online/Sellersfriend/preview/publisher/65f045565a092', 1, '2024-03-12 12:06:46', '2024-03-12 12:07:27'),
(53, '65f2ff6ba684a', 'Social Media', 'Instagram', '3', 'active', '30', '2024-03-14', '2024-04-13', 'https://pragya.dbtechserver.online/Sellersfriend/preview/insta-desktop/65f2ff6ba684a---https://pragya.dbtechserver.online/Sellersfriend/preview/insta-mobile/65f2ff6ba684a', 2, '2024-03-14 13:45:15', '2024-03-14 13:46:03'),
(54, '65f3e99c7aea4', 'Retailer', 'Amazon', '3', 'inactive', NULL, NULL, NULL, NULL, NULL, '2024-03-15 06:24:28', '2024-03-15 06:24:28'),
(55, '65f3e9b05e578', 'Social Media', 'Instagram', '3', 'active', '30', '2024-03-15', '2024-04-14', 'https://pragya.dbtechserver.online/Sellersfriend/preview/insta-desktop/65f3e9b05e578---https://pragya.dbtechserver.online/Sellersfriend/preview/insta-mobile/65f3e9b05e578', 2, '2024-03-15 06:24:48', '2024-03-15 06:25:03'),
(56, '65f3e9d13be59', 'Social Media', 'Instagram', '3', 'active', '30', '2024-03-15', '2024-04-14', 'https://pragya.dbtechserver.online/Sellersfriend/preview/insta-desktop/65f3e9d13be59---https://pragya.dbtechserver.online/Sellersfriend/preview/insta-mobile/65f3e9d13be59', 2, '2024-03-15 06:25:21', '2024-03-15 06:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `usersites_media`
--

CREATE TABLE `usersites_media` (
  `id` int(11) NOT NULL,
  `usersite_id` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `sitetype` text DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `asset_type` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersites_media`
--

INSERT INTO `usersites_media` (`id`, `usersite_id`, `file`, `sitetype`, `status`, `asset_type`, `created_at`, `updated_at`) VALUES
(145, '50', 'images/1710244851_aadharcard(1).jpg', 'Retailer', 'active', 'image', '2024-03-12 12:00:51', '2024-03-12 12:00:51'),
(146, '50', 'images/1710244851_pexels_videos_4409 (1080p).mp4', 'Retailer', 'active', 'video', '2024-03-12 12:00:51', '2024-03-12 12:00:51'),
(147, '51', 'images/1710245046_aadharcard(1).jpg', 'Retailer', 'active', 'image', '2024-03-12 12:04:06', '2024-03-12 12:04:07'),
(148, '51', 'images/1710245046_Screenshot 2024-01-19 193737 - Copy - Copy - Copy (2) - Copy - Copy.png', 'Retailer', 'active', 'image', '2024-03-12 12:04:06', '2024-03-12 12:04:07'),
(149, '51', 'images/1710245046_Screenshot 2024-01-19 193737 - Copy - Copy - Copy (2) - Copy.png', 'Retailer', 'active', 'image', '2024-03-12 12:04:06', '2024-03-12 12:04:07'),
(150, '51', 'images/1710245046_Screenshot 2024-01-19 193737 - Copy - Copy - Copy (2).png', 'Retailer', 'active', 'image', '2024-03-12 12:04:06', '2024-03-12 12:04:07'),
(151, '51', 'images/1710245046_Screenshot 2024-01-19 193737 - Copy - Copy - Copy (3) - Copy.png', 'Retailer', 'active', 'image', '2024-03-12 12:04:06', '2024-03-12 12:04:07'),
(152, '51', 'images/1710245046_pexels_videos_4409 (1080p).mp4', 'Retailer', 'active', 'video', '2024-03-12 12:04:07', '2024-03-12 12:04:07'),
(153, '52', 'images/1710245247_MOB-360x640.png', 'Publisher', 'active', 'image', '2024-03-12 12:07:27', '2024-03-12 12:07:27'),
(165, '53', 'images/1710423959_pexels-eberhard-grossgasteiger-2086622.jpg', 'Social Media', 'active', 'image', '2024-03-14 13:46:00', '2024-03-14 13:46:03'),
(166, '53', 'images/1710423960_pexels-eberhard-grossgasteiger-1366909.jpg', 'Social Media', 'active', 'image', '2024-03-14 13:46:01', '2024-03-14 13:46:03'),
(167, '53', 'images/1710423961_pexels-artem-saranin-1547813.jpg', 'Social Media', 'active', 'image', '2024-03-14 13:46:02', '2024-03-14 13:46:03'),
(168, '53', 'images/1710423962_pexels-michael-block-3225517.jpg', 'Social Media', 'active', 'image', '2024-03-14 13:46:03', '2024-03-14 13:46:03'),
(169, '55', 'images/1710483900_pexels-eberhard-grossgasteiger-2086622.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:25:02', '2024-03-15 06:25:03'),
(170, '55', 'images/1710483902_pexels-eberhard-grossgasteiger-1366909.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:25:02', '2024-03-15 06:25:03'),
(171, '55', 'images/1710483902_pexels-artem-saranin-1547813.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:25:03', '2024-03-15 06:25:03'),
(172, '56', 'images/1710483931_pexels-eberhard-grossgasteiger-2086622.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:25:32', '2024-03-15 06:27:07'),
(173, '56', 'images/1710483932_pexels-eberhard-grossgasteiger-1366909.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:25:32', '2024-03-15 06:27:07'),
(174, '56', 'images/1710484025_pexels-eberhard-grossgasteiger-2086622.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:27:07', '2024-03-15 06:27:07'),
(175, '56', 'images/1710484027_pexels-eberhard-grossgasteiger-1366909.jpg', 'Social Media', 'active', 'image', '2024-03-15 06:27:07', '2024-03-15 06:27:07');

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
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitetypes`
--
ALTER TABLE `sitetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_error`
--
ALTER TABLE `site_error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usersites`
--
ALTER TABLE `usersites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersites_media`
--
ALTER TABLE `usersites_media`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sitetypes`
--
ALTER TABLE `sitetypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `site_error`
--
ALTER TABLE `site_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usersites`
--
ALTER TABLE `usersites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `usersites_media`
--
ALTER TABLE `usersites_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
