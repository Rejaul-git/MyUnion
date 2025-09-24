-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 05:55 AM
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
-- Database: `myunion`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth_certificates`
--

CREATE TABLE `birth_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_no` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','cancelled') NOT NULL DEFAULT 'pending',
  `fee` decimal(10,2) NOT NULL DEFAULT 50.00,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `applicant_name_bn` varchar(255) NOT NULL,
  `applicant_name_en` varchar(255) NOT NULL,
  `father_name_bn` varchar(255) NOT NULL,
  `father_name_en` varchar(255) NOT NULL,
  `mother_name_bn` varchar(255) NOT NULL,
  `mother_name_en` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birth_registration_number` varchar(255) DEFAULT NULL,
  `birth_place` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `upazila` varchar(255) NOT NULL,
  `union` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `present_address` text NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `nid_path` varchar(255) DEFAULT NULL,
  `birth_registration_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_10_035927_add_role_to_users_table', 1),
(5, '2025_09_12_104036_create_profiles_table', 1),
(6, '2025_09_15_000000_create_birth_certificates_table', 1),
(7, '2025_09_16_040328_create_taxes_table', 1),
(8, '2025_09_16_040535_add_holding_number_to_profiles_table', 1);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `holding_number` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL COMMENT 'Name in English',
  `name_bn` varchar(255) NOT NULL COMMENT 'Name in Bangla',
  `father_name_en` varchar(255) NOT NULL COMMENT 'Father name in English',
  `father_name_bn` varchar(255) NOT NULL COMMENT 'Father name in Bangla',
  `mother_name_en` varchar(255) NOT NULL COMMENT 'Mother name in English',
  `mother_name_bn` varchar(255) NOT NULL COMMENT 'Mother name in Bangla',
  `spouse_name_en` varchar(255) DEFAULT NULL COMMENT 'Spouse name in English',
  `spouse_name_bn` varchar(255) DEFAULT NULL COMMENT 'Spouse name in Bangla',
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `marital_status` enum('single','married','divorced','widowed') DEFAULT NULL,
  `current_division` varchar(255) NOT NULL,
  `current_district` varchar(255) NOT NULL,
  `current_upazila` varchar(255) NOT NULL,
  `current_union` varchar(255) NOT NULL,
  `current_ward` varchar(255) NOT NULL,
  `current_village` varchar(255) NOT NULL,
  `current_post_office` varchar(255) DEFAULT NULL,
  `current_post_code` varchar(10) DEFAULT NULL,
  `current_full_address` text NOT NULL,
  `permanent_division` varchar(255) NOT NULL,
  `permanent_district` varchar(255) NOT NULL,
  `permanent_upazila` varchar(255) NOT NULL,
  `permanent_union` varchar(255) NOT NULL,
  `permanent_ward` varchar(255) NOT NULL,
  `permanent_village` varchar(255) NOT NULL,
  `permanent_post_office` varchar(255) DEFAULT NULL,
  `permanent_post_code` varchar(10) DEFAULT NULL,
  `permanent_full_address` text NOT NULL,
  `same_as_current` tinyint(1) NOT NULL DEFAULT 0,
  `photo_path` varchar(255) DEFAULT NULL,
  `nid_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `holding_number`, `name_en`, `name_bn`, `father_name_en`, `father_name_bn`, `mother_name_en`, `mother_name_bn`, `spouse_name_en`, `spouse_name_bn`, `email`, `mobile`, `birth_date`, `gender`, `marital_status`, `current_division`, `current_district`, `current_upazila`, `current_union`, `current_ward`, `current_village`, `current_post_office`, `current_post_code`, `current_full_address`, `permanent_division`, `permanent_district`, `permanent_upazila`, `permanent_union`, `permanent_ward`, `permanent_village`, `permanent_post_office`, `permanent_post_code`, `permanent_full_address`, `same_as_current`, `photo_path`, `nid_path`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, '456456', 'Rejaul Karim', 'রেজাউল করিম', 'Abdul Karim', 'আবদুল করিম', 'Fatema Begum', 'ফাতেমা বেগম', NULL, NULL, 'rejaul@example.com', '01700000000', '1995-05-10', 'male', 'single', 'Dhaka', 'Dhaka', 'Savar', 'Tetuljhora', 'Ward-3', 'Hemayetpur', 'Savar', '1340', 'Hemayetpur, Savar, Dhaka', 'Dhaka', 'Dhaka', 'Savar', 'Tetuljhora', 'Ward-3', 'Hemayetpur', 'Savar', '1340', 'Hemayetpur, Savar, Dhaka', 1, NULL, NULL, 'approved', 'Auto seeded demo profile', '2025-09-16 21:46:57', '2025-09-23 21:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7TJ1x1dGK97VCejoCYvnw9RAPqd0anl7hoetwipP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1pnd3BYY25zWkFtcTJveEFqc2ZxUUhuUHg2djdWTmNybzNMdG56eiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1758685921),
('GPNWWGgZJ23D6jLcP56UFW6zaFdJCSJ8GL5h0qpc', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUzlGMG5sb2Y4a1A3djlWTVhHNG5NbUpoUUl5UnpKbEJVM0lhMVF0OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC8iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1758089878);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `holding_number` varchar(255) DEFAULT NULL,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `user_id`, `holding_number`, `tax_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(5, 2, '225544', 1000.00, 'paid', '2025-09-23 21:43:31', '2025-09-23 21:43:31'),
(6, 2, '456456', 1000.00, 'paid', '2025-09-23 21:50:26', '2025-09-23 21:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `birth_num` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `general` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `phone`, `date_of_birth`, `birth_num`, `nid`, `general`, `password`, `otp`, `otp_expires_at`, `is_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'rejaulk431@gmail.com', '01783822929', NULL, NULL, NULL, NULL, '$2y$12$bi7yw.jVjTJJdSKk3BPPpueAlWtJEJiogY8h.FCJVqebQksR2DAx.', NULL, NULL, 1, NULL, '2025-09-16 21:46:56', '2025-09-16 21:46:56'),
(2, 'User', 'user', 'rejaulk@gmail.com', '01783822930', NULL, NULL, NULL, NULL, '$2y$12$w2/4TykCvSiNcB.hAnYFf.XnOqnOpNHFg2tgAEAZhqZ/41mxOF4p.', NULL, NULL, 1, NULL, '2025-09-16 21:46:57', '2025-09-16 21:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `birth_certificates_application_no_unique` (`application_no`),
  ADD KEY `birth_certificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_status_index` (`user_id`,`status`),
  ADD KEY `profiles_mobile_index` (`mobile`),
  ADD KEY `profiles_email_index` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taxes_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `birth_certificates`
--
ALTER TABLE `birth_certificates`
  ADD CONSTRAINT `birth_certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxes`
--
ALTER TABLE `taxes`
  ADD CONSTRAINT `taxes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
