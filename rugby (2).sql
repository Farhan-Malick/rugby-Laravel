-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2024 at 04:24 PM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rugby`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `winning_team_id` bigint(20) UNSIGNED NOT NULL,
  `winnerTeam` varchar(255) DEFAULT NULL,
  `looserTeam` varchar(255) NOT NULL DEFAULT 'Team A vs Team B',
  `winner` double(8,2) NOT NULL DEFAULT 0.00,
  `looser` double(8,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bonus_points` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `match_id`, `winning_team_id`, `winnerTeam`, `looserTeam`, `winner`, `looser`, `status`, `created_at`, `updated_at`, `bonus_points`) VALUES
(1, 1, 13, NULL, 'Team A vs Team B', 0.00, 0.00, 0, '2024-06-30 03:49:38', '2024-06-30 03:49:38', 0.00),
(2, 2, 15, NULL, 'Team A vs Team B', 0.00, 0.00, 0, '2024-06-30 03:49:44', '2024-06-30 03:49:44', 0.00),
(3, 3, 17, NULL, 'Team A vs Team B', 0.00, 0.00, 0, '2024-06-30 03:49:49', '2024-06-30 03:49:49', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `create_matches`
--

CREATE TABLE `create_matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team1_id` bigint(20) UNSIGNED NOT NULL,
  `team2_id` bigint(20) UNSIGNED NOT NULL,
  `bonus_points_team1` double(8,2) NOT NULL DEFAULT 0.00,
  `bonus_points_team2` double(8,2) NOT NULL DEFAULT 0.00,
  `match_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bonus_points` double(8,2) NOT NULL DEFAULT 0.00,
  `rounds` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_matches`
--

INSERT INTO `create_matches` (`id`, `team1_id`, `team2_id`, `bonus_points_team1`, `bonus_points_team2`, `match_date`, `created_at`, `updated_at`, `bonus_points`, `rounds`) VALUES
(1, 13, 14, 0.00, 0.00, '2024-12-31 00:00:00', '2024-06-30 03:47:44', '2024-06-30 03:47:44', 0.00, 1),
(2, 15, 16, 0.00, 0.00, '2024-12-31 00:00:00', '2024-06-30 03:48:02', '2024-06-30 03:48:02', 0.00, 1),
(3, 17, 18, 0.00, 0.00, '2024-12-31 00:00:00', '2024-06-30 03:48:25', '2024-06-30 03:48:25', 0.00, 1);

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
-- Table structure for table `join_pools`
--

CREATE TABLE `join_pools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pool_id` bigint(20) UNSIGNED NOT NULL,
  `created_pool_id` varchar(255) NOT NULL,
  `pool_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_pools`
--

INSERT INTO `join_pools` (`id`, `user_id`, `user_name`, `pool_id`, `created_pool_id`, `pool_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'DEMO', 1, '66807245a2598', 'Lisa Pool', '2024-06-30 03:47:04', '2024-06-30 03:47:04');

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
(76, '2014_10_12_000000_create_users_table', 1),
(77, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(78, '2014_10_12_100000_create_password_resets_table', 1),
(79, '2019_08_19_000000_create_failed_jobs_table', 1),
(80, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(81, '2023_06_25_151711_create_teams_table', 1),
(82, '2023_07_01_150017_create_pools_table', 1),
(83, '2023_07_01_164024_create_set_pools_table', 1),
(84, '2023_07_15_090913_create_score_charts_table', 1),
(85, '2023_07_15_130357_create_picks_table', 1),
(86, '2023_07_17_154949_create_create_matches_table', 1),
(87, '2023_07_25_191056_create_join_pools_table', 1),
(88, '2023_12_29_141119_create_announcements_table', 1),
(89, '2023_12_31_234845_create_sets__spreads_table', 1),
(90, '2024_01_01_191349_add_bonus_points_to_announcements', 1),
(91, '2024_01_01_200021_add_bonus_points_to_create_matches', 1),
(92, '2024_01_01_232708_create_payment_methods_table', 1),
(93, '2024_01_05_161833_add__b_o_n_u_s_to_create_teams', 1),
(94, '2024_01_12_210032_add_round3_to_picks', 1),
(95, '2024_06_21_235731_add_rounds_to_create_matches_table', 1),
(96, '2024_06_23_101739_add__r_n_d_to_create_picks_table', 1),
(97, '2024_06_27_003715_add_created_pool_id_to_picks_table', 1),
(98, '2024_06_27_004231_add_created_pool_id_to_picks_table', 2),
(99, '2024_06_27_025801_add_rounds_to_picks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cardNumber` varchar(255) NOT NULL,
  `mmYY` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `picks`
--

CREATE TABLE `picks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `teamname` varchar(255) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `rnd` int(11) DEFAULT NULL,
  `created_pool_id` varchar(255) DEFAULT NULL,
  `round1` int(11) DEFAULT NULL,
  `round2` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `round3` int(11) DEFAULT NULL,
  `round4` int(11) DEFAULT NULL,
  `round5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `picks`
--

INSERT INTO `picks` (`id`, `user_id`, `teamname`, `points`, `rnd`, `created_pool_id`, `round1`, `round2`, `total`, `created_at`, `updated_at`, `round3`, `round4`, `round5`) VALUES
(1, 2, 'Irland', 6, 1, '66807245a2598', NULL, NULL, NULL, '2024-06-30 03:48:44', '2024-06-30 03:48:44', NULL, NULL, NULL),
(2, 2, 'scotland', 4, 1, '66807245a2598', NULL, NULL, NULL, '2024-06-30 03:48:44', '2024-06-30 03:48:44', NULL, NULL, NULL),
(3, 2, 'England', 2, 1, '66807245a2598', NULL, NULL, NULL, '2024-06-30 03:48:44', '2024-06-30 03:48:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pools`
--

CREATE TABLE `pools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poolname` varchar(256) DEFAULT NULL,
  `pool_category` varchar(256) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `poolimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pools`
--

INSERT INTO `pools` (`id`, `poolname`, `pool_category`, `status`, `poolimage`, `created_at`, `updated_at`) VALUES
(1, 'Dany Dans', 'Sports', '1', '1719693844.png', '2024-06-30 03:44:04', '2024-06-30 03:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `score_charts`
--

CREATE TABLE `score_charts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round1` int(11) NOT NULL,
  `round2` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sets__spreads`
--

CREATE TABLE `sets__spreads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teams` varchar(255) NOT NULL,
  `bonus_points` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `set_pools`
--

CREATE TABLE `set_pools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pool_id` bigint(20) UNSIGNED NOT NULL,
  `random_id` varchar(255) NOT NULL,
  `pool_name` varchar(256) DEFAULT NULL,
  `pool_format` varchar(256) DEFAULT NULL,
  `pool_spread` varchar(256) DEFAULT NULL,
  `pool_week` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_pools`
--

INSERT INTO `set_pools` (`id`, `user_id`, `pool_id`, `random_id`, `pool_name`, `pool_format`, `pool_spread`, `pool_week`, `created_at`, `updated_at`) VALUES
(1, 19, 1, '66807245a2598', 'Lisa Pool', 'Pick \'em with Best Bets', 'Used in making picks, set by RUGBY', 'week 1', '2024-06-30 03:44:53', '2024-06-30 03:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `slug` varchar(512) NOT NULL,
  `tname` varchar(256) DEFAULT NULL,
  `bonus` double(8,2) NOT NULL DEFAULT 0.00,
  `tcolor` text DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `coach_name` varchar(256) DEFAULT NULL,
  `team_captain` varchar(256) DEFAULT NULL,
  `venue` varchar(256) DEFAULT NULL,
  `poster` varchar(256) DEFAULT NULL,
  `thumbnail` varchar(256) DEFAULT NULL,
  `start_time` varchar(256) DEFAULT NULL,
  `end_time` tinyint(1) DEFAULT 0,
  `meta_title` varchar(256) DEFAULT NULL,
  `meta_keywords` varchar(512) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publish` tinyint(1) DEFAULT 0,
  `is_publishable` varchar(512) DEFAULT NULL,
  `excerpt` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `status`, `slug`, `tname`, `bonus`, `tcolor`, `description`, `coach_name`, `team_captain`, `venue`, `poster`, `thumbnail`, `start_time`, `end_time`, `meta_title`, `meta_keywords`, `meta_description`, `category_id`, `user_id`, `created_at`, `updated_at`, `publish`, `is_publishable`, `excerpt`) VALUES
(13, 1, '', 'Irland', 5.50, 'Blue', 'Great Team', 'Farhan Malick', 'Muneeb', 'New York', '1690477959_ireland.png', '1690477959_ireland.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-07-27 07:12:39', '2024-01-05 11:33:40', 0, NULL, NULL),
(14, 1, '', 'Italy', 9.50, 'White', 'Great Team', 'Messi', 'Ronaldo', 'UK', '1690478036_logo_2.png', '1690478036_logo_2.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-07-27 07:13:56', '2024-01-05 11:33:40', 0, NULL, NULL),
(15, 1, '', 'France', 22.00, 'Green', 'Great Team', 'Uzair', 'Ali', 'Ohio', '1690478104_france.png', '1690478104_france.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-07-27 07:15:04', '2024-01-05 11:36:09', 0, NULL, NULL),
(16, 1, '', 'scotland', 11.00, 'Blue', 'Great Team', 'Shahzad', 'Azam', 'Italy', '1690478186_logo_1.png', '1690478186_logo_1.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-07-27 07:16:26', '2024-01-05 11:36:09', 0, NULL, NULL),
(17, 1, '', 'England', 0.00, 'Blue', 'Good Team', 'Abdullah', 'Talha', 'chicago', '1690478577_logo_3.png', '1690478577_logo_3.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2023-07-27 07:22:57', '2023-07-27 07:22:57', 0, NULL, NULL),
(18, 1, '', 'Wales', 0.00, 'Green', 'asdasd', 'tester', 'tester', 'no idea', '1704114698_logo_4.png', '1704114698_logo_4.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-01-01 08:11:38', '2024-01-01 08:11:38', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL DEFAULT 'User',
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `primary_phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'buyer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `primary_phone`, `country`, `nationality`, `account_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hafiz Muhammad', 'irfan', 'hafizirfan8078@gmail.com', '3438078216', 'Pakistan +92', 'Pakistan', 'Pakistan', 'admin', NULL, '$2y$10$l/1k/eQfiCVci9FsE2wfg.q5wycfWm7WdqYeu2ve/8GjtEO.cPfHS', NULL, '2023-07-26 14:33:46', '2023-07-26 14:33:46'),
(2, 'farhan', 'malick', 'farhan.malicck@gmail.com', '232113213', 'Pakistan +92', 'Pakistan', 'Pakistan', 'user', NULL, '$2y$10$ZlGWrakGJiZYwY3d42wyF.kJLPgOxYYmrqWXS/kTSNi1O4gOM9.4C', '1xcapPXjFi9rrZbONRVP9HHD8hiiATQszRMpjT0unpjnRcxmDT0mpGJIhxA9', '2023-07-26 14:35:53', '2024-06-27 15:56:42'),
(3, 'Abdullah', 'Aahsan', 'abdullah123@gmail.com', '343234232', 'Pakistan +92', 'Pakistan', 'Pakistan', 'user', NULL, '$2y$10$XK40uGxeYSKzJ5CdvnB2FuUARQeW7GRIWA.S7ffslqen3AteVXfJ2', NULL, '2023-07-26 14:37:00', '2023-07-26 14:37:00'),
(4, 'Admin', 'Rugby', 'admin@rugby.com', '03221312312', 'Pakistan +92', 'Pakistan', 'Pakistan', 'admin', NULL, '$2y$10$J570DPuSUFmX7oknevi5QeT0gHczau5fUZ/vPDCoIkjHLHc4HyEfW', NULL, '2023-07-27 07:20:38', '2023-07-27 07:20:38'),
(5, 'irfan', 'watto', 'irfan123@gamil.com', '23422312321', 'Pakistan +92', 'Pakistan', 'Pakistan', 'admin', NULL, '$2y$10$jWgbRI9.Sydd00J8RTKrhe2C9I3dmnHc5BCfAwgSQLHWtoYbh4QyG', NULL, '2023-08-01 03:47:32', '2023-08-01 03:47:32'),
(6, 'Faith', 'Delacruz', 'testing000@gmail.com', '92987898987', 'Select', 'Bahamas', 'Azerbaijan', 'user', NULL, '$2y$10$KhgOiwjTbNqUrt2S9dPPKuusjsGrXKEvUVGBqXI4am9A52uSr3Doy', NULL, '2023-08-01 10:56:46', '2023-08-01 10:56:46'),
(7, 'Farhan', 'Malik', 'anaszahid@gmail.com', '123456788976', 'American Samoa +1684', 'Algeria', 'Andorra', 'user', NULL, '$2y$10$XMJPlni8/dnS3AbQ5XlLjOBzYHN2EcaOIS34/1FwOQZoDqzzZYi.G', NULL, '2023-08-01 11:46:57', '2023-08-01 11:46:57'),
(8, 'Brennan', 'Fry', 'dygizo@mailinator.com', '29334534543', 'Tanzania +255', 'Tunisia', 'Greenland', 'user', NULL, '$2y$10$lrqFywOe99T7NAHBt1MifucfJdPAeSxoVo3Ql1flt1IqDts.hEhFe', NULL, '2023-08-01 14:24:52', '2023-08-01 14:24:52'),
(9, 'muhammad', 'nasar', 'nasar13@gmail.com', '923004517995', 'Select', 'Pakistan', 'Pakistan', 'user', NULL, '$2y$10$THVcVmFc.c8lUF5Uy3IkPO000YfZTW/IV7Q0QYpFyQcSEGiCNRAoG', NULL, '2023-10-13 21:13:05', '2023-10-13 21:13:05'),
(10, 'Kevin', 'Carney', 'carneykev@yahoo.com', '11111111111', 'Select', 'Albania', 'Albania', 'user', NULL, '$2y$10$WU2ZWKwmkUE1j1y6Okr4MOZi.xjoJHbsAN1IBdsyIfaxQoCnCpN16', NULL, '2023-10-13 21:13:34', '2023-10-13 21:13:34'),
(11, 'farhan', 'malik', 'far.malicck@gmail.com', '1234123412', 'Aruba +297', 'Antigua & Barbuda', 'Antigua & Barbuda', 'user', NULL, '$2y$10$o5Zb.8S6FY7Tf9/hvUBaP.iUCQKmr.mZBxNWrmC55BiKJ3wUveUS.', NULL, '2023-10-19 07:28:57', '2023-10-19 07:28:57'),
(12, 'Kevin', 'Boris', 'Kevin@gmail.com', '12345612', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$xQdpcqPyv5I5Kcr9ouukq.i3Gdy6VqyiXGIaWlc5uS3Qb2UsEzPjG', NULL, '2024-01-12 15:37:59', '2024-01-12 15:37:59'),
(13, 'Kami', 'Malik', 'kamimmalik99@gmail.com', '123123123', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$S67tzSs/0QZPd1tSQ4MSqe.JtZAy2DTaiyKwLkblSv6g6kjksesLy', NULL, '2024-02-27 04:43:18', '2024-02-27 04:43:18'),
(14, 'Farhan', 'Malik', 'farhan.malick1o1@gmail.com', '1123123', 'Afghanistan +93', 'Afghanistan', 'Azerbaijan', 'user', NULL, '$2y$10$LKO5OvTY74uAvrfa5aQvw.vsXOZ0ouATKUSnpl/rh2WDkc8c.MItm', NULL, '2024-05-20 17:23:33', '2024-05-20 17:23:33'),
(15, 'Jada', 'Mike', 'jada@ichairscn.com', '07043567890', 'Nigeria +234', 'Nigeria', 'Nigeria', 'user', NULL, '$2y$10$pNDa1cJlO41g8tMNFImU7.8vEcFRNvARP5HHk4tQl1USVbIELqsqq', NULL, '2024-06-12 14:42:23', '2024-06-12 14:42:23'),
(16, 'muhammad', 'nasar', 'nasar@gmail.com', '923004517995', 'Aruba +297', 'Angola', 'Austria', 'user', NULL, '$2y$10$Q/Lc4AB.qzfw1tuvGQD7E.FXEUzKPPP8u0.RMu4NvKdgbbq1/XQiO', NULL, '2024-06-12 15:23:52', '2024-06-12 15:23:52'),
(17, 'kamran', 'malik', 'kami@gmail.com', '123123123', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$smd6/S.MntGkeGpIrA7K8.H85DC1LivcLSdOz9UAhWc1Q0TSQCZnS', NULL, '2024-06-21 16:17:09', '2024-06-21 16:17:09'),
(18, 'Dany', 'dans', 'dany@gmail.com', '123123123', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$rf.de/Pt.Zs8sV2hhHLvJ.0g4f.29OG9LGJP8GVNRdEqZXSegdBA2', NULL, '2024-06-21 16:18:36', '2024-06-21 16:18:36'),
(19, 'Lisa', 'Lis', 'lisa@gmail.com', '123123123', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$SQlqTnmi6meJRf/U5H/SjeTtUWusNTTQyBETqxkYfqz1nb2tCNtEe', NULL, '2024-06-24 13:38:45', '2024-06-24 13:38:45'),
(20, 'Hamza', 'Rizwan', 'Hamza@gmail.com', '123123123', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$GI1sVA3CNf98BR/yC1kyu.UaakjmBO9kimCVHcLauK2tj1yefZAI2', NULL, '2024-06-25 03:01:27', '2024-06-25 03:01:27'),
(21, 'Rafay', 'Aheer', 'rafay@gmail.com', '1231231231', 'Afghanistan +93', 'Afghanistan', 'Afghanistan', 'user', NULL, '$2y$10$q2lXTWPczFUUKBz403/8jO5l1iPAzJp0Ho/DBqQEEmwILEcrAPrkC', NULL, '2024-06-26 11:51:45', '2024-06-26 11:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_match_id_foreign` (`match_id`),
  ADD KEY `announcements_winning_team_id_foreign` (`winning_team_id`);

--
-- Indexes for table `create_matches`
--
ALTER TABLE `create_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_matches_team1_id_foreign` (`team1_id`),
  ADD KEY `create_matches_team2_id_foreign` (`team2_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `join_pools`
--
ALTER TABLE `join_pools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `join_pools_user_id_foreign` (`user_id`),
  ADD KEY `join_pools_pool_id_foreign` (`pool_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `picks`
--
ALTER TABLE `picks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `picks_user_id_foreign` (`user_id`);

--
-- Indexes for table `pools`
--
ALTER TABLE `pools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_charts`
--
ALTER TABLE `score_charts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sets__spreads`
--
ALTER TABLE `sets__spreads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_pools`
--
ALTER TABLE `set_pools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set_pools_user_id_foreign` (`user_id`),
  ADD KEY `set_pools_pool_id_foreign` (`pool_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `create_matches`
--
ALTER TABLE `create_matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_pools`
--
ALTER TABLE `join_pools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picks`
--
ALTER TABLE `picks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pools`
--
ALTER TABLE `pools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `score_charts`
--
ALTER TABLE `score_charts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sets__spreads`
--
ALTER TABLE `sets__spreads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_pools`
--
ALTER TABLE `set_pools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `create_matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `announcements_winning_team_id_foreign` FOREIGN KEY (`winning_team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `create_matches`
--
ALTER TABLE `create_matches`
  ADD CONSTRAINT `create_matches_team1_id_foreign` FOREIGN KEY (`team1_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `create_matches_team2_id_foreign` FOREIGN KEY (`team2_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `join_pools`
--
ALTER TABLE `join_pools`
  ADD CONSTRAINT `join_pools_pool_id_foreign` FOREIGN KEY (`pool_id`) REFERENCES `set_pools` (`id`),
  ADD CONSTRAINT `join_pools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `picks`
--
ALTER TABLE `picks`
  ADD CONSTRAINT `picks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `set_pools`
--
ALTER TABLE `set_pools`
  ADD CONSTRAINT `set_pools_pool_id_foreign` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `set_pools_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
