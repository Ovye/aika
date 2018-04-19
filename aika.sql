-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 07:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aika`
--

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `index` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `index`, `value`) VALUES
(1, 'sms', '[{\"provider\":\"smartxmx\",\"url\":\"https:\\/\\/smartsmssolutions.com\\/api\\/\",\"token\":\"XXtF21mAGPJhuZi6iRtDZWZX8jJGgvIMcKeZrnEQtg1MdDCH7K0tJx7luxau4yksOWGrHdzXdYevNnccl2VzlK53BYBfRhCsHD5w\",\"is_default\":1}]');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_02_13_103124_create_user_verifications_table', 1),
(6, '2018_02_16_110718_create_configs_table', 2),
(9, '2018_02_18_074940_create_socialite_users_table', 3),
(11, '2018_02_21_033109_create_permission_tables', 4),
(12, '2018_02_21_125920_create_password_recovery_table', 5),
(13, '2018_02_21_135447_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(3, 'App\\User', 1),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(4, 'App\\User', 1),
(4, 'App\\User', 6),
(4, 'App\\User', 7),
(5, 'App\\User', 1),
(5, 'App\\User', 6),
(5, 'App\\User', 7),
(6, 'App\\User', 1),
(6, 'App\\User', 6),
(6, 'App\\User', 7),
(7, 'App\\User', 6),
(7, 'App\\User', 7),
(8, 'App\\Models\\Auths\\SocialiteUser', 1),
(8, 'App\\Models\\Auths\\SocialiteUser', 2),
(9, 'App\\Models\\Auths\\SocialiteUser', 1),
(9, 'App\\Models\\Auths\\SocialiteUser', 2),
(10, 'App\\Models\\Auths\\SocialiteUser', 1),
(10, 'App\\Models\\Auths\\SocialiteUser', 2),
(11, 'App\\Models\\Auths\\SocialiteUser', 1),
(11, 'App\\Models\\Auths\\SocialiteUser', 2),
(12, 'App\\Models\\Auths\\SocialiteUser', 1),
(12, 'App\\Models\\Auths\\SocialiteUser', 2),
(13, 'App\\User', 1),
(14, 'App\\User', 1),
(15, 'App\\User', 1),
(16, 'App\\User', 1),
(17, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 6),
(3, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(4, 'App\\User', 1),
(4, 'App\\User', 2),
(4, 'App\\User', 6),
(4, 'App\\User', 7),
(5, 'App\\Models\\Auths\\SocialiteUser', 1),
(5, 'App\\Models\\Auths\\SocialiteUser', 2),
(6, 'App\\Models\\Auths\\SocialiteUser', 1),
(6, 'App\\Models\\Auths\\SocialiteUser', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` int(11) DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `recovery_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_request_times` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`id`, `user_id`, `code`, `token`, `recovery_type`, `code_request_times`, `status`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 484853, 'qXuhj4S3VbrQ8lbB1LbwtcGJaQxZmO', 'phone', 4, 'pending', '1519464602', '2018-02-21 15:52:42', '2018-02-24 07:30:02'),
(2, 6, NULL, 'x2Ry1WKL6geE6gtYGxZGhFPOuxs3Gs', 'email', NULL, 'completed', '1519428973', '2018-02-23 21:36:13', '2018-02-23 21:38:55');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add travellers', 'web', '2018-02-23 08:10:29', '2018-02-23 08:10:29'),
(2, 'add admins', 'web', '2018-02-23 08:15:21', '2018-02-23 08:15:21'),
(3, 'add parcels', 'web', '2018-02-23 08:16:47', '2018-02-23 08:16:47'),
(4, 'edit parcels', 'web', '2018-02-23 08:16:47', '2018-02-23 08:16:47'),
(5, 'delete parcels', 'web', '2018-02-23 08:16:47', '2018-02-23 08:16:47'),
(6, 'send parcels', 'web', '2018-02-23 08:16:47', '2018-02-23 08:16:47'),
(7, 'pick parcels', 'web', '2018-02-23 08:16:47', '2018-02-23 08:16:47'),
(8, 'add parcels', 'socialite', '2018-02-23 08:17:39', '2018-02-23 08:17:39'),
(9, 'edit parcels', 'socialite', '2018-02-23 08:17:39', '2018-02-23 08:17:39'),
(10, 'delete parcels', 'socialite', '2018-02-23 08:17:39', '2018-02-23 08:17:39'),
(11, 'send parcels', 'socialite', '2018-02-23 08:17:39', '2018-02-23 08:17:39'),
(12, 'pick parcels', 'socialite', '2018-02-23 08:17:39', '2018-02-23 08:17:39'),
(13, 'add users', 'web', '2018-02-23 08:23:31', '2018-02-23 08:23:31'),
(14, 'edit users', 'web', '2018-02-23 08:23:32', '2018-02-23 08:23:32'),
(15, 'delete users', 'web', '2018-02-23 08:23:32', '2018-02-23 08:23:32'),
(16, 'edit admins', 'web', '2018-02-23 08:31:06', '2018-02-23 08:31:06'),
(17, 'delete admins', 'web', '2018-02-23 08:31:06', '2018-02-23 08:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2018-02-23 08:10:29', '2018-02-23 08:10:29'),
(2, 'super-admin', 'web', '2018-02-23 08:14:27', '2018-02-23 08:14:27'),
(3, 'traveller', 'web', '2018-02-23 08:19:11', '2018-02-23 08:19:11'),
(4, 'sender', 'web', '2018-02-23 08:19:11', '2018-02-23 08:19:11'),
(5, 'traveller', 'socialite', '2018-02-23 08:19:11', '2018-02-23 08:19:11'),
(6, 'sender', 'socialite', '2018-02-23 08:19:11', '2018-02-23 08:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `socialite_users`
--

CREATE TABLE `socialite_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `secret` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `active_as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialite_users`
--

INSERT INTO `socialite_users` (`id`, `provider`, `provider_id`, `fullname`, `fname`, `mname`, `lname`, `token`, `secret`, `email`, `username`, `password`, `photo`, `active_as`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'facebook', '1832067036845371', 'Josiah Ovye Yahaya', 'Josiah', 'Ovye', 'Yahaya', 'EAAWz06YWpAIBAML1goiV8V05P3rNJ5VgRsxRR9efitAvgrWrKe0dlD0kaHIzN5NZA2iyviCWxvh5ZCN22zisYfJWkeSiYo9jZB323JtHAPJlsfd0SZCDRVvvi2yIpNtRGTupfzXATFcgZAVo9IZB31GUGVXSJIYFrx3YbdiEi4pgZDZD', NULL, 'dmcbist@gmail.com', NULL, '$2y$10$/mlGssd8fLPKv75YYkHaU.1KpiTBIKbCBMKY1ynqs0z0X0AVE/3.C', 'https://graph.facebook.com/v2.10/1832067036845371/picture?type=normal', 'sender', 'active', 'P2nYb1KQjHtvSDjCO8eV9z69AKSVSXKvdvHbzVX9c6SoOHy2KZe8Is2HbIin', '2018-02-18 19:44:21', '2018-02-18 19:44:21'),
(2, 'twitter', '303949169', 'Josiah Ovye Yahaya', 'Josiah', 'Ovye', 'Yahaya', '303949169-HkgtKDvywsv69tgkGqGWd63RD06X8iOKblO10B4g', NULL, 'josiahoyahaya@gmail.com', 'josiahoyahaya', '$2y$10$AeIzcSqE4Zh.m8CACcEfheDYpFvRVibo8kAdwPw3gg5qCB6Swd4Gq', 'http://pbs.twimg.com/profile_images/921386027490729986/wR2xF912_normal.jpg', 'sender', 'active', '6SNJLSvUwNobswQj3XI9FRKC6XGBeA7igWhNaMPYsJaVlIr4WlVzCC1JDAJT', '2018-02-18 19:45:22', '2018-02-18 19:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_fb_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_credentials` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `active_as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `fullname`, `email`, `use_fb_email`, `fb_email`, `phone`, `username`, `password`, `social_credentials`, `photo`, `active_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joseph', NULL, 'Tsaker', 'Joseph Tsaker', 'joseph@gmail.com', 'yes', 'dmcbist@gmail.com', '08131600400', NULL, '$2y$10$hJJj0U/NYYLI6v4phjo3BO2Ez94/6p7k3WJSf5JHkBc7m7/wFB5ra', '[{\"name\":\"facebook\",\"id\":\"1832067036845371\",\"token\":\"EAAWz06YWpAIBAKjssP2xw4SAeOBdrBn0A6s1cV11iU5xZBLZA9XKwCNxgmH7BYWSLtaMDGd4GuxNe8k62fBmk2ZCkhnp6ZCRoMbnM1RyKBexSxjTSa7ZB3bNMOsZCTUwJeEsZBhLSh08I85JKCxF2HhSJKfgwa2iYst0KwMh0zZCTwZDZD\",\"photo\":\"https:\\/\\/graph.facebook.com\\/v2.10\\/1832067036845371\\/picture?type=normal\",\"email\":\"dmcbist@gmail.com\",\"username\":null},{\"name\":\"twitter\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"},{\"name\":\"google\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"}]', NULL, 'traveller', 'GnMeCISpTDOliwpqlpcdzegBtPs30lBhChUcFDEwm9TsWgUPySedNaFTmrYc', '2018-02-16 14:52:01', '2018-02-25 13:12:05'),
(2, 'Jacob', NULL, 'Yahaya', 'Jacob Yahaya', 'josiah@gmail.com', 'yes', 'dmcbist@gmail.com', '08131600401', NULL, '$2y$10$YQ7qrR5iRAMjl0M6drUNI.tje3gtn6cA7EzgjwE3PGrGPUgodZ0kS', '[{\"name\":\"facebook\",\"id\":\"1832067036845371\",\"token\":\"EAAWz06YWpAIBAKJXFgpFQ8hjzbBUMcwSEGgBMCZCcfZAYl7uYs4RTlPlAOduBxgq0N9hpdYdMcPpYnHEb1aUKnwGiqyXMdHwa78bYitVVN3jkrkEzMUocTZC5X3WwivohFvBVz3LPwY2JJg3sTZANjj4ld6BWZAwrU4KztEAaUgZDZD\",\"photo\":\"https:\\/\\/graph.facebook.com\\/v2.10\\/1832067036845371\\/picture?type=normal\",\"email\":\"dmcbist@gmail.com\",\"username\":null},{\"name\":\"twitter\",\"id\":\"303949169\",\"token\":\"303949169-HkgtKDvywsv69tgkGqGWd63RD06X8iOKblO10B4g\",\"photo\":\"http:\\/\\/pbs.twimg.com\\/profile_images\\/921386027490729986\\/wR2xF912_normal.jpg\",\"email\":\"josiahoyahaya@gmail.com\",\"username\":\"josiahoyahaya\"},{\"name\":\"google\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"}]', NULL, 'sender', 'dTHsPs6xwyAUa20DEnAtgDdiwIAVA6q5Tv0aPrGaTmE3W0ItCZPvsUDyEzZF', '2018-02-18 10:15:18', '2018-02-25 15:20:11'),
(6, 'Ovye', NULL, 'Yahaya', 'Ovye Yahaya', 'ovye@gmail.com', 'no', 'dmcbist@gmail.com', '08131600402', NULL, '$2y$10$B7czDEOGvglSEIekEWUilO2ijlkwndHgFnjqNwoKccZfOvaIEZG12', '[{\"name\":\"facebook\",\"id\":\"1832067036845371\",\"token\":\"EAAWz06YWpAIBAIsqGal9hKfnvyKN3pmRBk8q4Gct8kPyJEiNZBJhSl964UTWTrAQ9dnmk40dQOrOlGFWSh8sVgj8yrP7p8jHXt1TUZCLK5vNJhN4JonKbRdaZBAYL8QLqrPPIbwaZAYdRRZB5ZB1F8f7HbQaYqPGIZAxXjHxtcjQQZDZD\",\"photo\":\"https:\\/\\/graph.facebook.com\\/v2.10\\/1832067036845371\\/picture?type=normal\",\"email\":\"dmcbist@gmail.com\",\"username\":null},{\"name\":\"twitter\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"},{\"name\":\"google\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"}]', NULL, 'admin', 'MdHq9qpcqktv8BJSL82yIipslvW4zNc8mNfpkTculZ7eSFLCl648oEgves0J', '2018-02-23 08:51:25', '2018-02-23 21:38:55'),
(7, 'Anslem', NULL, 'Moses', 'Anslem Moses', 'amaofficial07@gmail.com', 'no', 'dmcbist@gmail.com', '07038933638', NULL, '$2y$10$JNhkAL0ehZTok1f6GL9Dg.24HGRP9ANebuefPTgUPx/4iUMePa4Jm', '[{\"name\":\"facebook\",\"id\":\"1832067036845371\",\"token\":\"EAAWz06YWpAIBAPJ9zubijbwd678U2A1LnSxCuzgwBgrLkUmhXpfwWRNQfbRaZBkKiNf2YDptiZAuSHDohNA3ZCZB0iOKtdPzQbsm4NZAfEz37eSae9dfZCcK3yFYy6pI0TAiw53hZBygQNxcAIxvCDGxKFXrzrh5SUbxqXTGmTb4gZDZD\",\"photo\":\"https:\\/\\/graph.facebook.com\\/v2.10\\/1832067036845371\\/picture?type=normal\",\"email\":\"dmcbist@gmail.com\",\"username\":null},{\"name\":\"twitter\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"},{\"name\":\"google\",\"id\":\"\",\"token\":\"\",\"photo\":\"\",\"email\":\"\",\"username\":\"\"}]', NULL, NULL, 't3Te6SA3tcmJLox1Aunm2GKD9IKfB8LxQm6BWSAJUpu1Gc0SaD9VsJJWG3U0', '2018-03-05 09:42:26', '2018-03-05 09:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `phone` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`id`, `user_id`, `phone`, `email`, `code`, `token`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '549583', '17a7b889fc9a47c5f3596efa75ee7b4a', '1519401121', '2018-02-16 14:52:01', '2018-02-23 07:25:34'),
(2, 2, 1, 1, '329904', '17a7b889fc9a47c5f3596efa75ee7b4a', '1519557318', '2018-02-18 10:15:19', '2018-02-21 08:06:01'),
(4, 6, 0, 0, '476043', '11cb2a67-6ae0-4987-83f7-039d9c90d23c', '1519984289', '2018-02-23 08:51:29', '2018-02-23 20:58:50'),
(5, 7, 1, 1, '160082', '6ac6c969-cea2-478f-9643-c8a6c1240ffb', '1520851353', '2018-03-05 09:42:33', '2018-03-05 09:52:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_recovery_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `socialite_users`
--
ALTER TABLE `socialite_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_verifications_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socialite_users`
--
ALTER TABLE `socialite_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD CONSTRAINT `password_recovery_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD CONSTRAINT `user_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
