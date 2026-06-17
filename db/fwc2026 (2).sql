-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 10:29 PM
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
-- Database: `fwc2026`
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_teams`
--

CREATE TABLE `favorite_teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `away_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `home_team_placeholder` varchar(255) DEFAULT NULL,
  `away_team_placeholder` varchar(255) DEFAULT NULL,
  `stadium_id` bigint(20) UNSIGNED NOT NULL,
  `match_date_utc` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'upcoming',
  `external_match_id` varchar(255) DEFAULT NULL,
  `scraping_url` varchar(255) DEFAULT NULL,
  `is_scraping_active` tinyint(1) NOT NULL DEFAULT 0,
  `match_type` varchar(255) NOT NULL DEFAULT 'tournament',
  `home_score` int(11) NOT NULL DEFAULT 0,
  `away_score` int(11) NOT NULL DEFAULT 0,
  `match_time` varchar(255) DEFAULT NULL,
  `stage` varchar(255) NOT NULL DEFAULT 'Group Stage',
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `home_team_placeholder`, `away_team_placeholder`, `stadium_id`, `match_date_utc`, `status`, `external_match_id`, `scraping_url`, `is_scraping_active`, `match_type`, `home_score`, `away_score`, `match_time`, `stage`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 4, '2026-06-11 19:00:00', 'finished', NULL, NULL, 0, 'tournament', 2, 0, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:23', '2026-06-17 13:50:57'),
(2, 3, 4, NULL, NULL, 16, '2026-06-12 02:00:00', 'finished', NULL, NULL, 0, 'tournament', 2, 1, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:24', '2026-06-17 13:51:19'),
(3, 1, 3, NULL, NULL, 4, '2026-06-19 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(4, 2, 4, NULL, NULL, 5, '2026-06-18 16:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(5, 1, 4, NULL, NULL, 5, '2026-06-25 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(6, 2, 3, NULL, NULL, 11, '2026-06-25 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group A', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(7, 5, 6, NULL, NULL, 9, '2026-06-12 19:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:24', '2026-06-17 13:51:43'),
(8, 7, 8, NULL, NULL, 7, '2026-06-13 19:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:24', '2026-06-17 13:51:57'),
(9, 5, 7, NULL, NULL, 5, '2026-06-18 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(10, 6, 8, NULL, NULL, 2, '2026-06-18 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(11, 5, 8, NULL, NULL, 8, '2026-06-24 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:24', '2026-06-17 13:46:19'),
(12, 6, 7, NULL, NULL, 12, '2026-06-24 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group B', '2026-06-17 13:31:25', '2026-06-17 13:46:19'),
(13, 9, 10, NULL, NULL, 8, '2026-06-13 22:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:52:15'),
(14, 11, 12, NULL, NULL, 11, '2026-06-14 01:00:00', 'finished', NULL, NULL, 0, 'tournament', 0, 1, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:52:32'),
(15, 9, 11, NULL, NULL, 9, '2026-06-20 00:30:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(16, 10, 12, NULL, NULL, 11, '2026-06-19 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(17, 9, 12, NULL, NULL, 5, '2026-06-24 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(18, 10, 11, NULL, NULL, 2, '2026-06-24 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group C', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(19, 13, 14, NULL, NULL, 2, '2026-06-13 01:00:00', 'finished', NULL, NULL, 0, 'tournament', 4, 1, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:52:57'),
(20, 15, 16, NULL, NULL, 9, '2026-06-14 04:00:00', 'finished', NULL, NULL, 0, 'tournament', 2, 0, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:53:08'),
(21, 13, 15, NULL, NULL, 7, '2026-06-19 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(22, 14, 16, NULL, NULL, 6, '2026-06-20 03:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(23, 13, 16, NULL, NULL, 14, '2026-06-26 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(24, 14, 15, NULL, NULL, 14, '2026-06-26 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group D', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(25, 17, 18, NULL, NULL, 7, '2026-06-14 17:00:00', 'finished', NULL, NULL, 0, 'tournament', 7, 1, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:53:36'),
(26, 19, 20, NULL, NULL, 4, '2026-06-14 23:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 0, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:53:48'),
(27, 17, 19, NULL, NULL, 3, '2026-06-20 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(28, 18, 20, NULL, NULL, 13, '2026-06-21 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:46:20'),
(29, 17, 20, NULL, NULL, 4, '2026-06-25 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:46:21'),
(30, 18, 19, NULL, NULL, 10, '2026-06-25 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group E', '2026-06-17 13:31:25', '2026-06-17 13:46:21'),
(31, 21, 22, NULL, NULL, 2, '2026-06-14 20:00:00', 'finished', NULL, NULL, 0, 'tournament', 2, 2, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:54:08'),
(32, 23, 24, NULL, NULL, 16, '2026-06-15 02:00:00', 'finished', NULL, NULL, 0, 'tournament', 5, 1, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:54:26'),
(33, 21, 23, NULL, NULL, 13, '2026-06-20 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(34, 22, 24, NULL, NULL, 13, '2026-06-21 04:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(35, 21, 24, NULL, NULL, 4, '2026-06-25 23:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(36, 22, 23, NULL, NULL, 3, '2026-06-25 23:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group F', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(37, 25, 26, NULL, NULL, 3, '2026-06-15 19:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:54:47'),
(38, 27, 28, NULL, NULL, 3, '2026-06-16 01:00:00', 'finished', NULL, NULL, 0, 'tournament', 2, 2, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:54:59'),
(39, 25, 27, NULL, NULL, 14, '2026-06-21 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(40, 26, 28, NULL, NULL, 7, '2026-06-22 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(41, 25, 28, NULL, NULL, 14, '2026-06-27 03:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(42, 26, 27, NULL, NULL, 8, '2026-06-27 03:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group G', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(43, 29, 30, NULL, NULL, 4, '2026-06-15 16:00:00', 'finished', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:55:18'),
(44, 31, 32, NULL, NULL, 9, '2026-06-15 22:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:55:31'),
(45, 29, 31, NULL, NULL, 6, '2026-06-21 16:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(46, 30, 32, NULL, NULL, 14, '2026-06-21 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(47, 29, 32, NULL, NULL, 14, '2026-06-27 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:46:22'),
(48, 30, 31, NULL, NULL, 7, '2026-06-27 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group H', '2026-06-17 13:31:26', '2026-06-17 13:46:21'),
(49, 33, 34, NULL, NULL, 7, '2026-06-16 19:00:00', 'finished', NULL, NULL, 0, 'tournament', 3, 1, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:55:50'),
(50, 35, 36, NULL, NULL, 8, '2026-06-16 22:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 4, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:56:06'),
(51, 33, 35, NULL, NULL, 12, '2026-06-22 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(52, 34, 36, NULL, NULL, 11, '2026-06-23 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(53, 33, 36, NULL, NULL, 3, '2026-06-26 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(54, 34, 35, NULL, NULL, 1, '2026-06-26 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group I', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(55, 37, 38, NULL, NULL, 16, '2026-06-17 01:00:00', 'finished', NULL, NULL, 0, 'tournament', 3, 0, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:56:33'),
(56, 39, 40, NULL, NULL, 12, '2026-06-17 04:00:00', 'finished', NULL, NULL, 0, 'tournament', 3, 1, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:56:49'),
(57, 37, 39, NULL, NULL, 12, '2026-06-22 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(58, 38, 40, NULL, NULL, 5, '2026-06-23 03:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(59, 37, 40, NULL, NULL, 1, '2026-06-28 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(60, 38, 39, NULL, NULL, 13, '2026-06-28 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group J', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(61, 41, 42, NULL, NULL, 11, '2026-06-17 17:00:00', 'finished', NULL, NULL, 0, 'tournament', 1, 1, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:27', '2026-06-17 13:57:18'),
(62, 43, 44, NULL, NULL, 7, '2026-06-18 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:27', '2026-06-17 13:46:22'),
(63, 41, 43, NULL, NULL, 6, '2026-06-23 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:28', '2026-06-17 13:46:22'),
(64, 42, 44, NULL, NULL, 16, '2026-06-24 02:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(65, 41, 44, NULL, NULL, 10, '2026-06-27 23:30:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(66, 42, 43, NULL, NULL, 5, '2026-06-27 23:30:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group K', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(67, 45, 46, NULL, NULL, 12, '2026-06-17 20:00:00', 'live', NULL, 'https://www.espn.in/football/match/_/gameId/760437', 1, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 14:23:20'),
(68, 47, 48, NULL, NULL, 10, '2026-06-17 23:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(69, 45, 47, NULL, NULL, 15, '2026-06-23 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(70, 46, 48, NULL, NULL, 6, '2026-06-23 23:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(71, 45, 48, NULL, NULL, 3, '2026-06-27 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(72, 46, 47, NULL, NULL, 12, '2026-06-27 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Group Stage', 'Group L', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(73, NULL, NULL, 'Runner-up Group A', 'Runner-up Group B', 12, '2026-06-28 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(74, NULL, NULL, 'Winner Group A', '3rd Group C/D/E/F/G/H/I/J', 13, '2026-06-29 20:30:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(75, NULL, NULL, 'Winner Group B', '3rd Group E/F/G/H/I/J/K/L', 5, '2026-06-30 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(76, NULL, NULL, 'Winner Group C', 'Runner-up Group F', 5, '2026-06-29 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(77, NULL, NULL, 'Winner Group F', 'Runner-up Group C', 10, '2026-06-30 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(78, NULL, NULL, 'Runner-up Group D', 'Runner-up Group E', 15, '2026-06-30 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:28', '2026-06-17 13:46:23'),
(79, NULL, NULL, 'Winner Group D', '3rd Group A/B/C/E/F/G/H/I', 7, '2026-07-01 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:23'),
(80, NULL, NULL, 'Winner Group E', '3rd Group A/B/C/D/F/G/H/J', 15, '2026-07-01 16:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(81, NULL, NULL, 'Winner Group I', 'Runner-up Group L', 16, '2026-07-02 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(82, NULL, NULL, 'Winner Group L', 'Runner-up Group I', 12, '2026-07-01 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(83, NULL, NULL, 'Runner-up Group G', 'Runner-up Group H', 7, '2026-07-02 23:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(84, NULL, NULL, 'Winner Group G', '3rd Group I/J/K/L/A/B/C/D', 14, '2026-07-02 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(85, NULL, NULL, 'Winner Group H', 'Runner-up Group J', 4, '2026-07-03 03:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(86, NULL, NULL, 'Winner Group J', 'Runner-up Group H', 5, '2026-07-03 22:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(87, NULL, NULL, 'Runner-up Group K', 'Runner-up Group L', 16, '2026-07-04 01:30:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(88, NULL, NULL, 'Winner Group K', '3rd Group G/H/I/J/K/L/A/B', 3, '2026-07-03 18:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 32', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(89, NULL, NULL, 'Winner Match 74', 'Winner Match 77', 3, '2026-07-04 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(90, NULL, NULL, 'Winner Match 73', 'Winner Match 75', 6, '2026-07-04 17:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(91, NULL, NULL, 'Winner Match 76', 'Winner Match 78', 7, '2026-07-05 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(92, NULL, NULL, 'Winner Match 79', 'Winner Match 80', 12, '2026-07-06 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(93, NULL, NULL, 'Winner Match 83', 'Winner Match 84', 4, '2026-07-06 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(94, NULL, NULL, 'Winner Match 81', 'Winner Match 82', 5, '2026-07-07 00:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(95, NULL, NULL, 'Winner Match 85', 'Winner Match 88', 9, '2026-07-07 16:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(96, NULL, NULL, 'Winner Match 86', 'Winner Match 87', 5, '2026-07-07 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Round of 16', 'Knockout', '2026-06-17 13:31:29', '2026-06-17 13:46:24'),
(97, NULL, NULL, 'Winner Match 89', 'Winner Match 90', 1, '2026-07-09 20:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Quarter-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:24'),
(98, NULL, NULL, 'Winner Match 91', 'Winner Match 92', 2, '2026-07-10 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Quarter-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:24'),
(99, NULL, NULL, 'Winner Match 93', 'Winner Match 94', 2, '2026-07-11 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Quarter-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:24'),
(100, NULL, NULL, 'Winner Match 95', 'Winner Match 96', 5, '2026-07-12 01:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Quarter-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:24'),
(101, NULL, NULL, 'Winner Match 97', 'Winner Match 98', 5, '2026-07-14 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Semi-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:25'),
(102, NULL, NULL, 'Winner Match 99', 'Winner Match 100', 5, '2026-07-15 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Semi-finals', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:25'),
(103, NULL, NULL, 'Loser Match 101', 'Loser Match 102', 2, '2026-07-18 21:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Third Place Match', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:25'),
(104, NULL, NULL, 'Winner Match 101', 'Winner Match 102', 10, '2026-07-19 19:00:00', 'upcoming', NULL, NULL, 0, 'tournament', 0, 0, NULL, 'Final', 'Knockout', '2026-06-17 13:31:30', '2026-06-17 13:46:25'),
(105, 9, 33, NULL, NULL, 1, '2026-06-01 20:00:00', 'finished', NULL, NULL, 0, 'friendly', 2, 1, NULL, 'Friendly', 'International', '2026-06-17 13:31:30', '2026-06-17 13:31:30'),
(106, 37, 17, NULL, NULL, 2, '2026-06-02 19:00:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:30', '2026-06-17 13:31:30'),
(107, 45, 41, NULL, NULL, 5, '2026-06-03 18:30:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:30', '2026-06-17 13:31:30'),
(108, 13, 29, NULL, NULL, 3, '2026-06-04 21:00:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:31', '2026-06-17 13:31:31'),
(109, 21, 25, NULL, NULL, 4, '2026-06-05 20:00:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:31', '2026-06-17 13:31:31'),
(110, 22, 3, NULL, NULL, 6, '2026-06-06 17:00:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:31', '2026-06-17 13:31:31'),
(111, 1, 5, NULL, NULL, 16, '2026-06-07 19:30:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:31', '2026-06-17 13:31:31'),
(112, 32, 46, NULL, NULL, 9, '2026-06-08 20:00:00', 'upcoming', NULL, NULL, 0, 'friendly', 0, 0, NULL, 'Friendly', 'International', '2026-06-17 13:31:31', '2026-06-17 13:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `match_events`
--

CREATE TABLE `match_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `player_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `minute` int(11) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_lineups`
--

CREATE TABLE `match_lineups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `is_starter` tinyint(1) NOT NULL DEFAULT 1,
  `position_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `match_stats`
--

CREATE TABLE `match_stats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `home_possession` int(11) NOT NULL DEFAULT 50,
  `away_possession` int(11) NOT NULL DEFAULT 50,
  `home_shots` int(11) NOT NULL DEFAULT 0,
  `away_shots` int(11) NOT NULL DEFAULT 0,
  `home_shots_on_target` int(11) NOT NULL DEFAULT 0,
  `away_shots_on_target` int(11) NOT NULL DEFAULT 0,
  `home_corners` int(11) NOT NULL DEFAULT 0,
  `away_corners` int(11) NOT NULL DEFAULT 0,
  `home_fouls` int(11) NOT NULL DEFAULT 0,
  `away_fouls` int(11) NOT NULL DEFAULT 0,
  `home_yellow_cards` int(11) NOT NULL DEFAULT 0,
  `away_yellow_cards` int(11) NOT NULL DEFAULT 0,
  `home_red_cards` int(11) NOT NULL DEFAULT 0,
  `away_red_cards` int(11) NOT NULL DEFAULT 0,
  `home_offsides` int(11) NOT NULL DEFAULT 0,
  `away_offsides` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_03_28_062929_create_stadiums_table', 1),
(6, '2026_03_28_062936_create_teams_table', 1),
(7, '2026_03_28_062942_create_players_table', 1),
(8, '2026_03_28_062949_create_matches_table', 1),
(9, '2026_03_28_062955_create_match_events_table', 1),
(10, '2026_03_28_063002_create_standings_table', 1),
(11, '2026_03_30_091330_add_ranking_details_to_teams_table', 1),
(12, '2026_03_30_113154_create_settings_table', 1),
(13, '2026_04_02_112807_add_match_type_to_matches_table', 1),
(14, '2026_04_07_053617_create_faqs_table', 1),
(15, '2026_04_07_091513_add_role_to_users_table', 1),
(16, '2026_04_08_102024_add_scraping_fields_to_matches_table', 1),
(17, '2026_04_08_122417_add_match_time_to_matches_table', 1),
(18, '2026_04_08_124507_add_player_name_to_match_events_table', 1),
(19, '2026_04_29_103841_create_match_stats_table', 1),
(20, '2026_04_29_104334_create_match_lineups_table', 1),
(21, '2026_04_29_114445_create_predictions_table', 1),
(22, '2026_04_30_055034_create_favorite_teams_table', 1),
(23, '2026_04_30_055326_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`stats`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `name`, `position`, `number`, `stats`, `created_at`, `updated_at`) VALUES
(1, 1, 'Star 1 (Mexico)', 'Pro', 63, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(2, 1, 'Star 2 (Mexico)', 'Pro', 58, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(3, 1, 'Star 3 (Mexico)', 'Pro', 25, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(4, 2, 'Star 1 (South Africa)', 'Pro', 60, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(5, 2, 'Star 2 (South Africa)', 'Pro', 32, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(6, 2, 'Star 3 (South Africa)', 'Pro', 89, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08'),
(7, 3, 'Star 1 (South Korea)', 'Pro', 85, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(8, 3, 'Star 2 (South Korea)', 'Pro', 52, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(9, 3, 'Star 3 (South Korea)', 'Pro', 76, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(10, 4, 'Star 1 (Czech Republic)', 'Pro', 85, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(11, 4, 'Star 2 (Czech Republic)', 'Pro', 81, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(12, 4, 'Star 3 (Czech Republic)', 'Pro', 14, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(13, 5, 'Star 1 (Canada)', 'Pro', 77, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(14, 5, 'Star 2 (Canada)', 'Pro', 82, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(15, 5, 'Star 3 (Canada)', 'Pro', 63, NULL, '2026-06-17 13:31:09', '2026-06-17 13:31:09'),
(16, 6, 'Star 1 (Bosnia and Herzegovina)', 'Pro', 15, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(17, 6, 'Star 2 (Bosnia and Herzegovina)', 'Pro', 4, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(18, 6, 'Star 3 (Bosnia and Herzegovina)', 'Pro', 37, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(19, 7, 'Star 1 (Qatar)', 'Pro', 66, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(20, 7, 'Star 2 (Qatar)', 'Pro', 41, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(21, 7, 'Star 3 (Qatar)', 'Pro', 99, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(22, 8, 'Star 1 (Switzerland)', 'Pro', 53, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(23, 8, 'Star 2 (Switzerland)', 'Pro', 29, NULL, '2026-06-17 13:31:10', '2026-06-17 13:31:10'),
(24, 8, 'Star 3 (Switzerland)', 'Pro', 74, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(25, 9, 'Star 1 (Brazil)', 'Pro', 96, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(26, 9, 'Star 2 (Brazil)', 'Pro', 86, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(27, 9, 'Star 3 (Brazil)', 'Pro', 18, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(28, 10, 'Star 1 (Morocco)', 'Pro', 80, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(29, 10, 'Star 2 (Morocco)', 'Pro', 7, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(30, 10, 'Star 3 (Morocco)', 'Pro', 49, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(31, 11, 'Star 1 (Haiti)', 'Pro', 64, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(32, 11, 'Star 2 (Haiti)', 'Pro', 61, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(33, 11, 'Star 3 (Haiti)', 'Pro', 25, NULL, '2026-06-17 13:31:11', '2026-06-17 13:31:11'),
(34, 12, 'Star 1 (Scotland)', 'Pro', 84, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(35, 12, 'Star 2 (Scotland)', 'Pro', 15, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(36, 12, 'Star 3 (Scotland)', 'Pro', 74, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(37, 13, 'Star 1 (United States)', 'Pro', 79, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(38, 13, 'Star 2 (United States)', 'Pro', 43, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(39, 13, 'Star 3 (United States)', 'Pro', 55, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(40, 14, 'Star 1 (Paraguay)', 'Pro', 13, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(41, 14, 'Star 2 (Paraguay)', 'Pro', 41, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(42, 14, 'Star 3 (Paraguay)', 'Pro', 16, NULL, '2026-06-17 13:31:12', '2026-06-17 13:31:12'),
(43, 15, 'Star 1 (Australia)', 'Pro', 16, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(44, 15, 'Star 2 (Australia)', 'Pro', 72, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(45, 15, 'Star 3 (Australia)', 'Pro', 26, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(46, 16, 'Star 1 (Turkey)', 'Pro', 6, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(47, 16, 'Star 2 (Turkey)', 'Pro', 83, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(48, 16, 'Star 3 (Turkey)', 'Pro', 92, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(49, 17, 'Star 1 (Germany)', 'Pro', 54, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(50, 17, 'Star 2 (Germany)', 'Pro', 98, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(51, 17, 'Star 3 (Germany)', 'Pro', 15, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(52, 18, 'Star 1 (Curaçao)', 'Pro', 39, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(53, 18, 'Star 2 (Curaçao)', 'Pro', 45, NULL, '2026-06-17 13:31:13', '2026-06-17 13:31:13'),
(54, 18, 'Star 3 (Curaçao)', 'Pro', 26, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(55, 19, 'Star 1 (Ivory Coast)', 'Pro', 83, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(56, 19, 'Star 2 (Ivory Coast)', 'Pro', 53, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(57, 19, 'Star 3 (Ivory Coast)', 'Pro', 58, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(58, 20, 'Star 1 (Ecuador)', 'Pro', 27, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(59, 20, 'Star 2 (Ecuador)', 'Pro', 11, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(60, 20, 'Star 3 (Ecuador)', 'Pro', 78, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(61, 21, 'Star 1 (Netherlands)', 'Pro', 44, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(62, 21, 'Star 2 (Netherlands)', 'Pro', 75, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(63, 21, 'Star 3 (Netherlands)', 'Pro', 4, NULL, '2026-06-17 13:31:14', '2026-06-17 13:31:14'),
(64, 22, 'Star 1 (Japan)', 'Pro', 22, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(65, 22, 'Star 2 (Japan)', 'Pro', 45, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(66, 22, 'Star 3 (Japan)', 'Pro', 18, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(67, 23, 'Star 1 (Sweden)', 'Pro', 63, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(68, 23, 'Star 2 (Sweden)', 'Pro', 83, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(69, 23, 'Star 3 (Sweden)', 'Pro', 91, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(70, 24, 'Star 1 (Tunisia)', 'Pro', 38, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(71, 24, 'Star 2 (Tunisia)', 'Pro', 69, NULL, '2026-06-17 13:31:15', '2026-06-17 13:31:15'),
(72, 24, 'Star 3 (Tunisia)', 'Pro', 32, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(73, 25, 'Star 1 (Belgium)', 'Pro', 73, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(74, 25, 'Star 2 (Belgium)', 'Pro', 22, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(75, 25, 'Star 3 (Belgium)', 'Pro', 3, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(76, 26, 'Star 1 (Egypt)', 'Pro', 56, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(77, 26, 'Star 2 (Egypt)', 'Pro', 83, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(78, 26, 'Star 3 (Egypt)', 'Pro', 49, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(79, 27, 'Star 1 (Iran)', 'Pro', 55, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(80, 27, 'Star 2 (Iran)', 'Pro', 52, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(81, 27, 'Star 3 (Iran)', 'Pro', 2, NULL, '2026-06-17 13:31:16', '2026-06-17 13:31:16'),
(82, 28, 'Star 1 (New Zealand)', 'Pro', 53, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(83, 28, 'Star 2 (New Zealand)', 'Pro', 62, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(84, 28, 'Star 3 (New Zealand)', 'Pro', 52, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(85, 29, 'Star 1 (Spain)', 'Pro', 36, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(86, 29, 'Star 2 (Spain)', 'Pro', 10, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(87, 29, 'Star 3 (Spain)', 'Pro', 78, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(88, 30, 'Star 1 (Cape Verde)', 'Pro', 34, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(89, 30, 'Star 2 (Cape Verde)', 'Pro', 52, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(90, 30, 'Star 3 (Cape Verde)', 'Pro', 37, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(91, 31, 'Star 1 (Saudi Arabia)', 'Pro', 72, NULL, '2026-06-17 13:31:17', '2026-06-17 13:31:17'),
(92, 31, 'Star 2 (Saudi Arabia)', 'Pro', 17, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(93, 31, 'Star 3 (Saudi Arabia)', 'Pro', 51, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(94, 32, 'Star 1 (Uruguay)', 'Pro', 64, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(95, 32, 'Star 2 (Uruguay)', 'Pro', 77, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(96, 32, 'Star 3 (Uruguay)', 'Pro', 23, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(97, 33, 'Star 1 (France)', 'Pro', 16, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(98, 33, 'Star 2 (France)', 'Pro', 43, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(99, 33, 'Star 3 (France)', 'Pro', 68, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(100, 34, 'Star 1 (Senegal)', 'Pro', 3, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(101, 34, 'Star 2 (Senegal)', 'Pro', 7, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(102, 34, 'Star 3 (Senegal)', 'Pro', 38, NULL, '2026-06-17 13:31:18', '2026-06-17 13:31:18'),
(103, 35, 'Star 1 (Iraq)', 'Pro', 49, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(104, 35, 'Star 2 (Iraq)', 'Pro', 74, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(105, 35, 'Star 3 (Iraq)', 'Pro', 26, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(106, 36, 'Star 1 (Norway)', 'Pro', 90, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(107, 36, 'Star 2 (Norway)', 'Pro', 18, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(108, 36, 'Star 3 (Norway)', 'Pro', 16, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(109, 37, 'Star 1 (Argentina)', 'Pro', 86, NULL, '2026-06-17 13:31:19', '2026-06-17 13:31:19'),
(110, 37, 'Star 2 (Argentina)', 'Pro', 4, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(111, 37, 'Star 3 (Argentina)', 'Pro', 58, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(112, 38, 'Star 1 (Algeria)', 'Pro', 61, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(113, 38, 'Star 2 (Algeria)', 'Pro', 17, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(114, 38, 'Star 3 (Algeria)', 'Pro', 83, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(115, 39, 'Star 1 (Austria)', 'Pro', 15, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(116, 39, 'Star 2 (Austria)', 'Pro', 67, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(117, 39, 'Star 3 (Austria)', 'Pro', 51, NULL, '2026-06-17 13:31:20', '2026-06-17 13:31:20'),
(118, 40, 'Star 1 (Jordan)', 'Pro', 17, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(119, 40, 'Star 2 (Jordan)', 'Pro', 64, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(120, 40, 'Star 3 (Jordan)', 'Pro', 80, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(121, 41, 'Star 1 (Portugal)', 'Pro', 94, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(122, 41, 'Star 2 (Portugal)', 'Pro', 46, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(123, 41, 'Star 3 (Portugal)', 'Pro', 49, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(124, 42, 'Star 1 (DR Congo)', 'Pro', 99, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(125, 42, 'Star 2 (DR Congo)', 'Pro', 86, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(126, 42, 'Star 3 (DR Congo)', 'Pro', 27, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(127, 43, 'Star 1 (Uzbekistan)', 'Pro', 52, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(128, 43, 'Star 2 (Uzbekistan)', 'Pro', 82, NULL, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(129, 43, 'Star 3 (Uzbekistan)', 'Pro', 20, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(130, 44, 'Star 1 (Colombia)', 'Pro', 87, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(131, 44, 'Star 2 (Colombia)', 'Pro', 37, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(132, 44, 'Star 3 (Colombia)', 'Pro', 24, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(133, 45, 'Star 1 (England)', 'Pro', 64, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(134, 45, 'Star 2 (England)', 'Pro', 92, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(135, 45, 'Star 3 (England)', 'Pro', 55, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(136, 46, 'Star 1 (Croatia)', 'Pro', 30, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(137, 46, 'Star 2 (Croatia)', 'Pro', 85, NULL, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(138, 46, 'Star 3 (Croatia)', 'Pro', 38, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(139, 47, 'Star 1 (Ghana)', 'Pro', 27, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(140, 47, 'Star 2 (Ghana)', 'Pro', 9, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(141, 47, 'Star 3 (Ghana)', 'Pro', 75, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(142, 48, 'Star 1 (Panama)', 'Pro', 54, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(143, 48, 'Star 2 (Panama)', 'Pro', 66, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(144, 48, 'Star 3 (Panama)', 'Pro', 92, NULL, '2026-06-17 13:31:23', '2026-06-17 13:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `choice` enum('home','draw','away') NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'FIFA World Cup 2026', NULL, NULL),
(2, 'portal_description', 'The ultimate mobile experience for the 2026 World Cup in USA, Canada, and Mexico.', NULL, NULL),
(3, 'footer_text', '© 2026 FIFA World Cup Official Fan App', NULL, NULL),
(4, 'primary_color', '#0ea5e9', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `capacity` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `name`, `city`, `timezone`, `capacity`, `image_url`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Estadio Azteca', 'Mexico City', 'America/Mexico_City', 83000, 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2', NULL, NULL, '2026-06-17 13:31:06', '2026-06-17 13:31:06'),
(2, 'MetLife Stadium', 'East Rutherford', 'America/New_York', 82500, 'https://images.unsplash.com/photo-1599305090598-fe179d501c27', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(3, 'AT&T Stadium', 'Arlington', 'America/Chicago', 94000, 'https://images.unsplash.com/photo-1566577739112-510d4bf9390', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(4, 'Mercedes-Benz Stadium', 'Atlanta', 'America/New_York', 75000, 'https://images.unsplash.com/photo-1533558379417-062e08e68407', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(5, 'SoFi Stadium', 'Inglewood', 'America/Los_Angeles', 70000, 'https://images.unsplash.com/photo-1596727147705-61a532a659bd', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(6, 'BC Place', 'Vancouver', 'America/Vancouver', 54000, 'https://images.unsplash.com/photo-1569510345591-893043236021', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(7, 'BMO Field', 'Toronto', 'America/Toronto', 45000, 'https://images.unsplash.com/photo-1574629810360-7efbbe195018', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(8, 'Arrowhead Stadium', 'Kansas City', 'America/Chicago', 73000, 'https://images.unsplash.com/photo-1575361204480-aadea2d30e68', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(9, 'NRG Stadium', 'Houston', 'America/Chicago', 72000, 'https://images.unsplash.com/photo-1594412217033-0c58e763f972', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(10, 'Levi\'s Stadium', 'Santa Clara', 'America/Los_Angeles', 71000, 'https://images.unsplash.com/photo-1580137189272-c9379f8864fd', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(11, 'Lincoln Financial Field', 'Philadelphia', 'America/New_York', 69000, 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(12, 'Lumen Field', 'Seattle', 'America/Los_Angeles', 69000, 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(13, 'Hard Rock Stadium', 'Miami Gardens', 'America/New_York', 65000, 'https://images.unsplash.com/photo-1517603980279-a76495f50a89', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(14, 'Gillette Stadium', 'Foxborough', 'America/New_York', 65000, 'https://images.unsplash.com/photo-1577223625816-7546f13df25d', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(15, 'Estadio BBVA', 'Guadalupe', 'America/Monterrey', 53500, 'https://images.unsplash.com/photo-1569510345591-893043236021', NULL, NULL, '2026-06-17 13:31:07', '2026-06-17 13:31:07'),
(16, 'Estadio Akron', 'Zapopan', 'America/Mexico_City', 48000, 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', NULL, NULL, '2026-06-17 13:31:08', '2026-06-17 13:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

CREATE TABLE `standings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `played` int(11) NOT NULL DEFAULT 0,
  `won` int(11) NOT NULL DEFAULT 0,
  `drawn` int(11) NOT NULL DEFAULT 0,
  `lost` int(11) NOT NULL DEFAULT 0,
  `goals_for` int(11) NOT NULL DEFAULT 0,
  `goals_against` int(11) NOT NULL DEFAULT 0,
  `goal_difference` int(11) NOT NULL DEFAULT 0,
  `points` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`id`, `team_id`, `group_name`, `played`, `won`, `drawn`, `lost`, `goals_for`, `goals_against`, `goal_difference`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 'Group A', 1, 1, 0, 0, 2, 0, 2, 3, '2026-06-17 13:31:08', '2026-06-17 13:50:57'),
(2, 2, 'Group A', 1, 0, 0, 1, 0, 2, -2, 0, '2026-06-17 13:31:08', '2026-06-17 13:50:57'),
(3, 3, 'Group A', 1, 1, 0, 0, 2, 1, 1, 3, '2026-06-17 13:31:08', '2026-06-17 13:51:19'),
(4, 4, 'Group A', 1, 0, 0, 1, 1, 2, -1, 0, '2026-06-17 13:31:09', '2026-06-17 13:51:19'),
(5, 5, 'Group B', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:09', '2026-06-17 13:51:44'),
(6, 6, 'Group B', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:10', '2026-06-17 13:51:44'),
(7, 7, 'Group B', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:10', '2026-06-17 13:51:57'),
(8, 8, 'Group B', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:10', '2026-06-17 13:51:57'),
(9, 9, 'Group C', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:11', '2026-06-17 14:07:22'),
(10, 10, 'Group C', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:11', '2026-06-17 13:52:15'),
(11, 11, 'Group C', 1, 0, 0, 1, 0, 1, -1, 0, '2026-06-17 13:31:11', '2026-06-17 13:52:32'),
(12, 12, 'Group C', 1, 1, 0, 0, 1, 0, 1, 3, '2026-06-17 13:31:12', '2026-06-17 13:52:32'),
(13, 13, 'Group D', 1, 1, 0, 0, 4, 1, 3, 3, '2026-06-17 13:31:12', '2026-06-17 13:52:57'),
(14, 14, 'Group D', 1, 0, 0, 1, 1, 4, -3, 0, '2026-06-17 13:31:12', '2026-06-17 13:52:57'),
(15, 15, 'Group D', 1, 1, 0, 0, 2, 0, 2, 3, '2026-06-17 13:31:12', '2026-06-17 13:53:08'),
(16, 16, 'Group D', 1, 0, 0, 1, 0, 2, -2, 0, '2026-06-17 13:31:13', '2026-06-17 13:53:09'),
(17, 17, 'Group E', 1, 1, 0, 0, 7, 1, 6, 3, '2026-06-17 13:31:13', '2026-06-17 13:53:36'),
(18, 18, 'Group E', 1, 0, 0, 1, 1, 7, -6, 0, '2026-06-17 13:31:13', '2026-06-17 13:53:36'),
(19, 19, 'Group E', 1, 1, 0, 0, 1, 0, 1, 3, '2026-06-17 13:31:14', '2026-06-17 13:53:48'),
(20, 20, 'Group E', 1, 0, 0, 1, 0, 1, -1, 0, '2026-06-17 13:31:14', '2026-06-17 13:53:48'),
(21, 21, 'Group F', 1, 0, 1, 0, 2, 2, 0, 1, '2026-06-17 13:31:14', '2026-06-17 13:54:08'),
(22, 22, 'Group F', 1, 0, 1, 0, 2, 2, 0, 1, '2026-06-17 13:31:15', '2026-06-17 13:54:08'),
(23, 23, 'Group F', 1, 1, 0, 0, 5, 1, 4, 3, '2026-06-17 13:31:15', '2026-06-17 13:54:26'),
(24, 24, 'Group F', 1, 0, 0, 1, 1, 5, -4, 0, '2026-06-17 13:31:15', '2026-06-17 13:54:26'),
(25, 25, 'Group G', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:16', '2026-06-17 13:54:47'),
(26, 26, 'Group G', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:16', '2026-06-17 13:54:47'),
(27, 27, 'Group G', 1, 0, 1, 0, 2, 2, 0, 1, '2026-06-17 13:31:16', '2026-06-17 13:54:59'),
(28, 28, 'Group G', 1, 0, 1, 0, 2, 2, 0, 1, '2026-06-17 13:31:17', '2026-06-17 13:55:00'),
(29, 29, 'Group H', 1, 0, 1, 0, 0, 0, 0, 1, '2026-06-17 13:31:17', '2026-06-17 13:55:18'),
(30, 30, 'Group H', 1, 0, 1, 0, 0, 0, 0, 1, '2026-06-17 13:31:17', '2026-06-17 13:55:18'),
(31, 31, 'Group H', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:17', '2026-06-17 13:55:31'),
(32, 32, 'Group H', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:18', '2026-06-17 13:55:31'),
(33, 33, 'Group I', 1, 1, 0, 0, 3, 1, 2, 3, '2026-06-17 13:31:18', '2026-06-17 14:07:22'),
(34, 34, 'Group I', 1, 0, 0, 1, 1, 3, -2, 0, '2026-06-17 13:31:18', '2026-06-17 13:55:50'),
(35, 35, 'Group I', 1, 0, 0, 1, 1, 4, -3, 0, '2026-06-17 13:31:18', '2026-06-17 13:56:06'),
(36, 36, 'Group I', 1, 1, 0, 0, 4, 1, 3, 3, '2026-06-17 13:31:19', '2026-06-17 13:56:06'),
(37, 37, 'Group J', 1, 1, 0, 0, 3, 0, 3, 3, '2026-06-17 13:31:19', '2026-06-17 13:56:33'),
(38, 38, 'Group J', 1, 0, 0, 1, 0, 3, -3, 0, '2026-06-17 13:31:20', '2026-06-17 13:56:34'),
(39, 39, 'Group J', 1, 1, 0, 0, 3, 1, 2, 3, '2026-06-17 13:31:20', '2026-06-17 13:56:49'),
(40, 40, 'Group J', 1, 0, 0, 1, 1, 3, -2, 0, '2026-06-17 13:31:20', '2026-06-17 13:56:49'),
(41, 41, 'Group K', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:21', '2026-06-17 13:57:18'),
(42, 42, 'Group K', 1, 0, 1, 0, 1, 1, 0, 1, '2026-06-17 13:31:21', '2026-06-17 13:57:18'),
(43, 43, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:21', '2026-06-17 13:31:21'),
(44, 44, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(45, 45, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(46, 46, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:22', '2026-06-17 13:31:22'),
(47, 47, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:23', '2026-06-17 13:31:23'),
(48, 48, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-06-17 13:31:23', '2026-06-17 13:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `flag_url` varchar(255) DEFAULT NULL,
  `coach` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `fifa_rank` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `highest_rank` int(11) DEFAULT NULL,
  `lowest_rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `flag_url`, `coach`, `group_name`, `fifa_rank`, `created_at`, `updated_at`, `highest_rank`, `lowest_rank`) VALUES
(1, 'Mexico', 'uploads/flags/mexico.png', 'Coach Mexico', 'Group A', 15, '2026-06-17 13:31:08', '2026-06-17 13:31:08', 4, 40),
(2, 'South Africa', 'uploads/flags/south_africa.png', 'Coach South Africa', 'Group A', 58, '2026-06-17 13:31:08', '2026-06-17 13:31:08', 16, 124),
(3, 'South Korea', 'uploads/flags/south_korea.png', 'Coach South Korea', 'Group A', 22, '2026-06-17 13:31:08', '2026-06-17 13:31:08', 17, 69),
(4, 'Czech Republic', 'uploads/flags/czech_republic.png', 'Coach Czech Republic', 'Group A', 36, '2026-06-17 13:31:09', '2026-06-17 13:31:09', 2, 67),
(5, 'Canada', 'uploads/flags/canada.png', 'Coach Canada', 'Group B', 50, '2026-06-17 13:31:09', '2026-06-17 13:31:09', 33, 122),
(6, 'Bosnia and Herzegovina', 'uploads/flags/bosnia_and_herzegovina.png', 'Coach Bosnia and Herzegovina', 'Group B', 71, '2026-06-17 13:31:10', '2026-06-17 13:31:10', 13, 108),
(7, 'Qatar', 'uploads/flags/qatar.png', 'Coach Qatar', 'Group B', 34, '2026-06-17 13:31:10', '2026-06-17 13:31:10', 34, 113),
(8, 'Switzerland', 'uploads/flags/switzerland.png', 'Coach Switzerland', 'Group B', 19, '2026-06-17 13:31:10', '2026-06-17 13:31:10', 3, 83),
(9, 'Brazil', 'uploads/flags/brazil.png', 'Coach Brazil', 'Group C', 5, '2026-06-17 13:31:11', '2026-06-17 13:31:11', 1, 22),
(10, 'Morocco', 'uploads/flags/morocco.png', 'Coach Morocco', 'Group C', 12, '2026-06-17 13:31:11', '2026-06-17 13:31:11', 10, 92),
(11, 'Haiti', 'uploads/flags/haiti.png', 'Coach Haiti', 'Group C', 90, '2026-06-17 13:31:11', '2026-06-17 13:31:11', 38, 155),
(12, 'Scotland', 'uploads/flags/scotland.png', 'Coach Scotland', 'Group C', 39, '2026-06-17 13:31:12', '2026-06-17 13:31:12', 13, 88),
(13, 'United States', 'uploads/flags/united_states.png', 'Coach United States', 'Group D', 13, '2026-06-17 13:31:12', '2026-06-17 13:31:12', 4, 36),
(14, 'Paraguay', 'uploads/flags/paraguay.png', 'Coach Paraguay', 'Group D', 56, '2026-06-17 13:31:12', '2026-06-17 13:31:12', 8, 103),
(15, 'Australia', 'uploads/flags/australia.png', 'Coach Australia', 'Group D', 23, '2026-06-17 13:31:12', '2026-06-17 13:31:12', 14, 92),
(16, 'Turkey', 'uploads/flags/turkey.png', 'Coach Turkey', 'Group D', 35, '2026-06-17 13:31:13', '2026-06-17 13:31:13', 10, 67),
(17, 'Germany', 'uploads/flags/germany.png', 'Coach Germany', 'Group E', 16, '2026-06-17 13:31:13', '2026-06-17 13:31:13', 1, 22),
(18, 'Curaçao', 'uploads/flags/curaçao.png', 'Coach Curaçao', 'Group E', 91, '2026-06-17 13:31:13', '2026-06-17 13:31:13', 68, 183),
(19, 'Ivory Coast', 'uploads/flags/ivory_coast.png', 'Coach Ivory Coast', 'Group E', 39, '2026-06-17 13:31:14', '2026-06-17 13:31:14', 12, 107),
(20, 'Ecuador', 'uploads/flags/ecuador.png', 'Coach Ecuador', 'Group E', 31, '2026-06-17 13:31:14', '2026-06-17 13:31:14', 10, 71),
(21, 'Netherlands', 'uploads/flags/netherlands.png', 'Coach Netherlands', 'Group F', 7, '2026-06-17 13:31:14', '2026-06-17 13:31:14', 1, 36),
(22, 'Japan', 'uploads/flags/japan.png', 'Coach Japan', 'Group F', 18, '2026-06-17 13:31:14', '2026-06-17 13:31:14', 9, 62),
(23, 'Sweden', 'uploads/flags/sweden.png', 'Coach Sweden', 'Group F', 26, '2026-06-17 13:31:15', '2026-06-17 13:31:15', 2, 45),
(24, 'Tunisia', 'uploads/flags/tunisia.png', 'Coach Tunisia', 'Group F', 41, '2026-06-17 13:31:15', '2026-06-17 13:31:15', 14, 65),
(25, 'Belgium', 'uploads/flags/belgium.png', 'Coach Belgium', 'Group G', 8, '2026-06-17 13:31:16', '2026-06-17 13:31:16', 1, 71),
(26, 'Egypt', 'uploads/flags/egypt.png', 'Coach Egypt', 'Group G', 36, '2026-06-17 13:31:16', '2026-06-17 13:31:16', 9, 75),
(27, 'Iran', 'uploads/flags/iran.png', 'Coach Iran', 'Group G', 20, '2026-06-17 13:31:16', '2026-06-17 13:31:16', 15, 122),
(28, 'New Zealand', 'uploads/flags/new_zealand.png', 'Coach New Zealand', 'Group G', 104, '2026-06-17 13:31:17', '2026-06-17 13:31:17', 47, 161),
(29, 'Spain', 'uploads/flags/spain.png', 'Coach Spain', 'Group H', 8, '2026-06-17 13:31:17', '2026-06-17 13:31:17', 1, 25),
(30, 'Cape Verde', 'uploads/flags/cape_verde.png', 'Coach Cape Verde', 'Group H', 65, '2026-06-17 13:31:17', '2026-06-17 13:31:17', 27, 120),
(31, 'Saudi Arabia', 'uploads/flags/saudi_arabia.png', 'Coach Saudi Arabia', 'Group H', 53, '2026-06-17 13:31:17', '2026-06-17 13:31:17', 21, 126),
(32, 'Uruguay', 'uploads/flags/uruguay.png', 'Coach Uruguay', 'Group H', 11, '2026-06-17 13:31:18', '2026-06-17 13:31:18', 2, 76),
(33, 'France', 'uploads/flags/france.png', 'Coach France', 'Group I', 2, '2026-06-17 13:31:18', '2026-06-17 13:31:18', 1, 27),
(34, 'Senegal', 'uploads/flags/senegal.png', 'Coach Senegal', 'Group I', 17, '2026-06-17 13:31:18', '2026-06-17 13:31:18', 17, 99),
(35, 'Iraq', 'uploads/flags/iraq.png', 'Coach Iraq', 'Group I', 58, '2026-06-17 13:31:18', '2026-06-17 13:31:18', 39, 139),
(36, 'Norway', 'uploads/flags/norway.png', 'Coach Norway', 'Group I', 46, '2026-06-17 13:31:19', '2026-06-17 13:31:19', 2, 84),
(37, 'Argentina', 'uploads/flags/argentina.png', 'Coach Argentina', 'Group J', 1, '2026-06-17 13:31:19', '2026-06-17 13:31:19', 1, 24),
(38, 'Algeria', 'uploads/flags/algeria.png', 'Coach Algeria', 'Group J', 43, '2026-06-17 13:31:20', '2026-06-17 13:31:20', 13, 103),
(39, 'Austria', 'uploads/flags/austria.png', 'Coach Austria', 'Group J', 25, '2026-06-17 13:31:20', '2026-06-17 13:31:20', 10, 105),
(40, 'Jordan', 'uploads/flags/jordan.png', 'Coach Jordan', 'Group J', 71, '2026-06-17 13:31:20', '2026-06-17 13:31:20', 37, 152),
(41, 'Portugal', 'uploads/flags/portugal.png', 'Coach Portugal', 'Group K', 6, '2026-06-17 13:31:21', '2026-06-17 13:31:21', 3, 43),
(42, 'DR Congo', 'uploads/flags/dr_congo.png', 'Coach DR Congo', 'Group K', 63, '2026-06-17 13:31:21', '2026-06-17 13:31:21', 28, 133),
(43, 'Uzbekistan', 'uploads/flags/uzbekistan.png', 'Coach Uzbekistan', 'Group K', 62, '2026-06-17 13:31:21', '2026-06-17 13:31:21', 45, 119),
(44, 'Colombia', 'uploads/flags/colombia.png', 'Coach Colombia', 'Group K', 14, '2026-06-17 13:31:22', '2026-06-17 13:31:22', 3, 54),
(45, 'England', 'uploads/flags/england.png', 'Coach England', 'Group L', 4, '2026-06-17 13:31:22', '2026-06-17 13:31:22', 3, 27),
(46, 'Croatia', 'uploads/flags/croatia.png', 'Coach Croatia', 'Group L', 10, '2026-06-17 13:31:22', '2026-06-17 13:31:22', 3, 125),
(47, 'Ghana', 'uploads/flags/ghana.png', 'Coach Ghana', 'Group L', 61, '2026-06-17 13:31:23', '2026-06-17 13:31:23', 14, 89),
(48, 'Panama', 'uploads/flags/panama.png', 'Coach Panama', 'Group L', 44, '2026-06-17 13:31:23', '2026-06-17 13:31:23', 29, 150);

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
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@fwc2026.com', NULL, '$2y$10$Tn7mOGpJemD7rLcPKuCg2.RoUhgsOp/2Uv4NGIpe3taOa1Zn3Zl7S', 'admin', NULL, '2026-06-17 13:31:03', '2026-06-17 13:31:03');

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
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_page_index` (`page`);

--
-- Indexes for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorite_teams_user_id_team_id_unique` (`user_id`,`team_id`),
  ADD UNIQUE KEY `favorite_teams_session_id_team_id_unique` (`session_id`,`team_id`),
  ADD KEY `favorite_teams_team_id_foreign` (`team_id`),
  ADD KEY `favorite_teams_session_id_index` (`session_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matches_home_team_id_foreign` (`home_team_id`),
  ADD KEY `matches_away_team_id_foreign` (`away_team_id`),
  ADD KEY `matches_stadium_id_foreign` (`stadium_id`);

--
-- Indexes for table `match_events`
--
ALTER TABLE `match_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_events_match_id_foreign` (`match_id`),
  ADD KEY `match_events_team_id_foreign` (`team_id`),
  ADD KEY `match_events_player_id_foreign` (`player_id`);

--
-- Indexes for table `match_lineups`
--
ALTER TABLE `match_lineups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `match_lineups_match_id_player_id_unique` (`match_id`,`player_id`),
  ADD KEY `match_lineups_team_id_foreign` (`team_id`),
  ADD KEY `match_lineups_player_id_foreign` (`player_id`);

--
-- Indexes for table `match_stats`
--
ALTER TABLE `match_stats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_stats_match_id_foreign` (`match_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_team_id_foreign` (`team_id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `predictions_match_id_session_id_unique` (`match_id`,`session_id`),
  ADD KEY `predictions_session_id_index` (`session_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `standings_team_id_foreign` (`team_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `match_events`
--
ALTER TABLE `match_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_lineups`
--
ALTER TABLE `match_lineups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `match_stats`
--
ALTER TABLE `match_stats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `predictions`
--
ALTER TABLE `predictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `standings`
--
ALTER TABLE `standings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite_teams`
--
ALTER TABLE `favorite_teams`
  ADD CONSTRAINT `favorite_teams_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_away_team_id_foreign` FOREIGN KEY (`away_team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_home_team_id_foreign` FOREIGN KEY (`home_team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matches_stadium_id_foreign` FOREIGN KEY (`stadium_id`) REFERENCES `stadiums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_events`
--
ALTER TABLE `match_events`
  ADD CONSTRAINT `match_events_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_events_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_events_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_lineups`
--
ALTER TABLE `match_lineups`
  ADD CONSTRAINT `match_lineups_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_lineups_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `match_lineups_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `match_stats`
--
ALTER TABLE `match_stats`
  ADD CONSTRAINT `match_stats_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `predictions`
--
ALTER TABLE `predictions`
  ADD CONSTRAINT `predictions_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `standings`
--
ALTER TABLE `standings`
  ADD CONSTRAINT `standings_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
