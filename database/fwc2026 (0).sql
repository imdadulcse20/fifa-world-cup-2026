-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2026 at 08:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `home_score` int(11) NOT NULL DEFAULT 0,
  `away_score` int(11) NOT NULL DEFAULT 0,
  `stage` varchar(255) NOT NULL DEFAULT 'Group Stage',
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `home_team_placeholder`, `away_team_placeholder`, `stadium_id`, `match_date_utc`, `status`, `home_score`, `away_score`, `stage`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 6, '2026-03-31 05:47:32', 'live', 1, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(2, 3, 4, NULL, NULL, 6, '2026-06-18 15:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(3, 1, 3, NULL, NULL, 12, '2026-06-16 07:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(4, 2, 4, NULL, NULL, 4, '2026-06-14 15:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(5, 1, 4, NULL, NULL, 13, '2026-06-14 01:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(6, 2, 3, NULL, NULL, 13, '2026-06-14 13:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group A', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(7, 5, 6, NULL, NULL, 2, '2026-06-14 00:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(8, 7, 8, NULL, NULL, 2, '2026-06-12 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(9, 5, 7, NULL, NULL, 7, '2026-06-12 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(10, 6, 8, NULL, NULL, 13, '2026-06-12 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(11, 5, 8, NULL, NULL, 11, '2026-06-14 14:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(12, 6, 7, NULL, NULL, 15, '2026-06-19 06:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(13, 9, 10, NULL, NULL, 11, '2026-06-19 08:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(14, 11, 12, NULL, NULL, 7, '2026-06-18 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(15, 9, 11, NULL, NULL, 3, '2026-06-17 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(16, 10, 12, NULL, NULL, 3, '2026-06-12 18:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(17, 9, 12, NULL, NULL, 9, '2026-06-17 00:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(18, 10, 11, NULL, NULL, 7, '2026-06-17 10:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group C', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(19, 13, 14, NULL, NULL, 14, '2026-06-17 14:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(20, 15, 16, NULL, NULL, 16, '2026-06-16 04:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(21, 13, 15, NULL, NULL, 10, '2026-06-18 03:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(22, 14, 16, NULL, NULL, 14, '2026-06-14 16:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(23, 13, 16, NULL, NULL, 13, '2026-06-20 00:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(24, 14, 15, NULL, NULL, 3, '2026-06-17 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group D', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(25, 17, 18, NULL, NULL, 7, '2026-06-14 11:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(26, 19, 20, NULL, NULL, 4, '2026-06-14 16:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(27, 17, 19, NULL, NULL, 13, '2026-06-14 18:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(28, 18, 20, NULL, NULL, 5, '2026-06-12 01:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(29, 17, 20, NULL, NULL, 10, '2026-06-15 19:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(30, 18, 19, NULL, NULL, 11, '2026-06-12 12:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group E', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(31, 21, 22, NULL, NULL, 9, '2026-06-13 03:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(32, 23, 24, NULL, NULL, 7, '2026-06-19 10:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(33, 21, 23, NULL, NULL, 3, '2026-06-16 19:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(34, 22, 24, NULL, NULL, 5, '2026-06-14 12:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(35, 21, 24, NULL, NULL, 5, '2026-06-19 20:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(36, 22, 23, NULL, NULL, 6, '2026-06-14 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group F', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(37, 25, 26, NULL, NULL, 12, '2026-06-19 20:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(38, 27, 28, NULL, NULL, 1, '2026-06-15 09:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(39, 25, 27, NULL, NULL, 14, '2026-06-18 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(40, 26, 28, NULL, NULL, 10, '2026-06-16 18:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(41, 25, 28, NULL, NULL, 4, '2026-06-12 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(42, 26, 27, NULL, NULL, 6, '2026-06-11 22:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group G', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(43, 29, 30, NULL, NULL, 10, '2026-06-13 10:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(44, 31, 32, NULL, NULL, 13, '2026-06-18 10:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(45, 29, 31, NULL, NULL, 12, '2026-06-16 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(46, 30, 32, NULL, NULL, 12, '2026-06-19 01:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(47, 29, 32, NULL, NULL, 16, '2026-06-19 15:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(48, 30, 31, NULL, NULL, 11, '2026-06-16 21:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group H', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(49, 33, 34, NULL, NULL, 8, '2026-06-11 19:00:00', 'finished', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-31 00:01:09'),
(50, 35, 36, NULL, NULL, 2, '2026-06-13 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(51, 33, 35, NULL, NULL, 4, '2026-06-19 21:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(52, 34, 36, NULL, NULL, 5, '2026-06-13 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(53, 33, 36, NULL, NULL, 5, '2026-06-13 13:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(54, 34, 35, NULL, NULL, 6, '2026-06-15 03:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group I', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(55, 37, 38, NULL, NULL, 11, '2026-06-20 02:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(56, 39, 40, NULL, NULL, 2, '2026-06-16 14:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(57, 37, 39, NULL, NULL, 9, '2026-06-13 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(58, 38, 40, NULL, NULL, 14, '2026-06-18 00:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(59, 37, 40, NULL, NULL, 13, '2026-06-19 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(60, 38, 39, NULL, NULL, 16, '2026-06-13 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group J', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(61, 41, 42, NULL, NULL, 8, '2026-06-14 10:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(62, 43, 44, NULL, NULL, 14, '2026-06-14 13:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(63, 41, 43, NULL, NULL, 7, '2026-06-17 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(64, 42, 44, NULL, NULL, 8, '2026-06-12 07:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(65, 41, 44, NULL, NULL, 4, '2026-06-17 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(66, 42, 43, NULL, NULL, 2, '2026-06-14 04:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group K', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(67, 45, 46, NULL, NULL, 9, '2026-06-19 02:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(68, 47, 48, NULL, NULL, 2, '2026-06-12 05:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(69, 45, 47, NULL, NULL, 8, '2026-06-14 11:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(70, 46, 48, NULL, NULL, 7, '2026-06-19 23:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(71, 45, 48, NULL, NULL, 1, '2026-06-12 04:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(72, 46, 47, NULL, NULL, 9, '2026-06-18 17:00:00', 'upcoming', 0, 0, 'Group Stage', 'Group L', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(73, NULL, NULL, 'Runner-up Group A', 'Runner-up Group B', 8, '2026-06-28 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(74, NULL, NULL, 'Winner Group A', '3rd Group C/D/E/F/G/H/I/J', 1, '2026-06-28 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(75, NULL, NULL, 'Winner Group B', '3rd Group E/F/G/H/I/J/K/L', 6, '2026-06-28 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(76, NULL, NULL, 'Winner Group C', 'Runner-up Group F', 9, '2026-06-28 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(77, NULL, NULL, 'Winner Group F', 'Runner-up Group C', 11, '2026-06-29 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(78, NULL, NULL, 'Runner-up Group D', 'Runner-up Group E', 9, '2026-06-29 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(79, NULL, NULL, 'Winner Group D', '3rd Group A/B/C/E/F/G/H/I', 2, '2026-06-29 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(80, NULL, NULL, 'Winner Group E', '3rd Group A/B/C/D/F/G/H/J', 4, '2026-06-29 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(81, NULL, NULL, 'Winner Group I', 'Runner-up Group L', 16, '2026-06-30 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(82, NULL, NULL, 'Winner Group L', 'Runner-up Group I', 16, '2026-06-30 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(83, NULL, NULL, 'Runner-up Group G', 'Runner-up Group H', 3, '2026-06-30 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(84, NULL, NULL, 'Winner Group G', '3rd Group I/J/K/L/A/B/C/D', 3, '2026-06-30 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(85, NULL, NULL, 'Winner Group H', 'Runner-up Group J', 2, '2026-07-01 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(86, NULL, NULL, 'Winner Group J', 'Runner-up Group H', 11, '2026-07-01 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(87, NULL, NULL, 'Runner-up Group K', 'Runner-up Group L', 12, '2026-07-01 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(88, NULL, NULL, 'Winner Group K', '3rd Group G/H/I/J/K/L/A/B', 15, '2026-07-01 18:00:00', 'upcoming', 0, 0, 'Round of 32', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(89, NULL, NULL, 'Winner Match 74', 'Winner Match 77', 12, '2026-07-04 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(90, NULL, NULL, 'Winner Match 73', 'Winner Match 75', 1, '2026-07-04 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(91, NULL, NULL, 'Winner Match 76', 'Winner Match 78', 13, '2026-07-04 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(92, NULL, NULL, 'Winner Match 79', 'Winner Match 80', 12, '2026-07-05 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(93, NULL, NULL, 'Winner Match 83', 'Winner Match 84', 11, '2026-07-05 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(94, NULL, NULL, 'Winner Match 81', 'Winner Match 82', 14, '2026-07-05 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(95, NULL, NULL, 'Winner Match 85', 'Winner Match 88', 9, '2026-07-06 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(96, NULL, NULL, 'Winner Match 86', 'Winner Match 87', 1, '2026-07-06 18:00:00', 'upcoming', 0, 0, 'Round of 16', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(97, NULL, NULL, 'Winner Match 89', 'Winner Match 90', 7, '2026-07-09 18:00:00', 'upcoming', 0, 0, 'Quarter-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(98, NULL, NULL, 'Winner Match 91', 'Winner Match 92', 12, '2026-07-09 18:00:00', 'upcoming', 0, 0, 'Quarter-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(99, NULL, NULL, 'Winner Match 93', 'Winner Match 94', 14, '2026-07-10 18:00:00', 'upcoming', 0, 0, 'Quarter-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(100, NULL, NULL, 'Winner Match 95', 'Winner Match 96', 9, '2026-07-10 18:00:00', 'upcoming', 0, 0, 'Quarter-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(101, NULL, NULL, 'Winner Match 97', 'Winner Match 98', 11, '2026-07-14 18:00:00', 'upcoming', 0, 0, 'Semi-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(102, NULL, NULL, 'Winner Match 99', 'Winner Match 100', 6, '2026-07-16 18:00:00', 'upcoming', 0, 0, 'Semi-finals', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(103, NULL, NULL, 'Loser Match 101', 'Loser Match 102', 1, '2026-07-18 18:00:00', 'upcoming', 0, 0, 'Third Place Match', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(104, NULL, NULL, 'Winner Match 101', 'Winner Match 102', 4, '2026-07-19 18:00:00', 'upcoming', 0, 0, 'Final', 'Knockout', '2026-03-30 23:47:32', '2026-03-30 23:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `match_events`
--

CREATE TABLE `match_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `match_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `minute` int(11) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
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
(12, '2026_03_30_113154_create_settings_table', 1);

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
(1, 1, 'Star 1 (Mexico)', 'Pro', 99, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(2, 1, 'Star 2 (Mexico)', 'Pro', 30, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(3, 1, 'Star 3 (Mexico)', 'Pro', 71, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(4, 2, 'Star 1 (South Africa)', 'Pro', 60, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(5, 2, 'Star 2 (South Africa)', 'Pro', 26, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(6, 2, 'Star 3 (South Africa)', 'Pro', 68, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(7, 3, 'Star 1 (South Korea)', 'Pro', 77, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(8, 3, 'Star 2 (South Korea)', 'Pro', 4, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(9, 3, 'Star 3 (South Korea)', 'Pro', 47, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(10, 4, 'Star 1 (Poland)', 'Pro', 28, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(11, 4, 'Star 2 (Poland)', 'Pro', 67, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(12, 4, 'Star 3 (Poland)', 'Pro', 25, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(13, 5, 'Star 1 (Canada)', 'Pro', 57, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(14, 5, 'Star 2 (Canada)', 'Pro', 62, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(15, 5, 'Star 3 (Canada)', 'Pro', 6, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(16, 6, 'Star 1 (Italy)', 'Pro', 98, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(17, 6, 'Star 2 (Italy)', 'Pro', 99, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(18, 6, 'Star 3 (Italy)', 'Pro', 17, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(19, 7, 'Star 1 (Qatar)', 'Pro', 36, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(20, 7, 'Star 2 (Qatar)', 'Pro', 6, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(21, 7, 'Star 3 (Qatar)', 'Pro', 34, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(22, 8, 'Star 1 (Switzerland)', 'Pro', 70, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(23, 8, 'Star 2 (Switzerland)', 'Pro', 48, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(24, 8, 'Star 3 (Switzerland)', 'Pro', 91, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(25, 9, 'Star 1 (USA)', 'Pro', 17, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(26, 9, 'Star 2 (USA)', 'Pro', 54, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(27, 9, 'Star 3 (USA)', 'Pro', 39, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(28, 10, 'Star 1 (Ghana)', 'Pro', 8, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(29, 10, 'Star 2 (Ghana)', 'Pro', 86, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(30, 10, 'Star 3 (Ghana)', 'Pro', 53, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(31, 11, 'Star 1 (Netherlands)', 'Pro', 15, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(32, 11, 'Star 2 (Netherlands)', 'Pro', 17, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(33, 11, 'Star 3 (Netherlands)', 'Pro', 43, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(34, 12, 'Star 1 (Japan)', 'Pro', 48, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(35, 12, 'Star 2 (Japan)', 'Pro', 8, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(36, 12, 'Star 3 (Japan)', 'Pro', 72, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(37, 13, 'Star 1 (Argentina)', 'Pro', 20, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(38, 13, 'Star 2 (Argentina)', 'Pro', 6, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(39, 13, 'Star 3 (Argentina)', 'Pro', 7, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(40, 14, 'Star 1 (France)', 'Pro', 93, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(41, 14, 'Star 2 (France)', 'Pro', 63, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(42, 14, 'Star 3 (France)', 'Pro', 60, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(43, 15, 'Star 1 (Saudi Arabia)', 'Pro', 7, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(44, 15, 'Star 2 (Saudi Arabia)', 'Pro', 83, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(45, 15, 'Star 3 (Saudi Arabia)', 'Pro', 67, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(46, 16, 'Star 1 (Norway)', 'Pro', 5, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(47, 16, 'Star 2 (Norway)', 'Pro', 92, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(48, 16, 'Star 3 (Norway)', 'Pro', 5, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(49, 17, 'Star 1 (Brazil)', 'Pro', 57, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(50, 17, 'Star 2 (Brazil)', 'Pro', 93, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(51, 17, 'Star 3 (Brazil)', 'Pro', 50, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(52, 18, 'Star 1 (Spain)', 'Pro', 18, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(53, 18, 'Star 2 (Spain)', 'Pro', 78, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(54, 18, 'Star 3 (Spain)', 'Pro', 4, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(55, 19, 'Star 1 (Cameroon)', 'Pro', 59, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(56, 19, 'Star 2 (Cameroon)', 'Pro', 80, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(57, 19, 'Star 3 (Cameroon)', 'Pro', 44, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(58, 20, 'Star 1 (Ukraine)', 'Pro', 14, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(59, 20, 'Star 2 (Ukraine)', 'Pro', 35, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(60, 20, 'Star 3 (Ukraine)', 'Pro', 22, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(61, 21, 'Star 1 (England)', 'Pro', 4, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(62, 21, 'Star 2 (England)', 'Pro', 74, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(63, 21, 'Star 3 (England)', 'Pro', 10, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(64, 22, 'Star 1 (Portugal)', 'Pro', 44, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(65, 22, 'Star 2 (Portugal)', 'Pro', 4, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(66, 22, 'Star 3 (Portugal)', 'Pro', 98, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(67, 23, 'Star 1 (Senegal)', 'Pro', 25, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(68, 23, 'Star 2 (Senegal)', 'Pro', 93, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(69, 23, 'Star 3 (Senegal)', 'Pro', 21, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(70, 24, 'Star 1 (Ecuador)', 'Pro', 28, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(71, 24, 'Star 2 (Ecuador)', 'Pro', 41, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(72, 24, 'Star 3 (Ecuador)', 'Pro', 17, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(73, 25, 'Star 1 (Belgium)', 'Pro', 92, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(74, 25, 'Star 2 (Belgium)', 'Pro', 33, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(75, 25, 'Star 3 (Belgium)', 'Pro', 30, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(76, 26, 'Star 1 (Croatia)', 'Pro', 91, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(77, 26, 'Star 2 (Croatia)', 'Pro', 98, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(78, 26, 'Star 3 (Croatia)', 'Pro', 39, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(79, 27, 'Star 1 (Ivory Coast)', 'Pro', 55, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(80, 27, 'Star 2 (Ivory Coast)', 'Pro', 87, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(81, 27, 'Star 3 (Ivory Coast)', 'Pro', 60, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(82, 28, 'Star 1 (Turkey)', 'Pro', 60, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(83, 28, 'Star 2 (Turkey)', 'Pro', 63, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(84, 28, 'Star 3 (Turkey)', 'Pro', 72, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(85, 29, 'Star 1 (Germany)', 'Pro', 78, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(86, 29, 'Star 2 (Germany)', 'Pro', 47, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(87, 29, 'Star 3 (Germany)', 'Pro', 10, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(88, 30, 'Star 1 (Uruguay)', 'Pro', 12, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(89, 30, 'Star 2 (Uruguay)', 'Pro', 18, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(90, 30, 'Star 3 (Uruguay)', 'Pro', 57, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(91, 31, 'Star 1 (Egypt)', 'Pro', 29, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(92, 31, 'Star 2 (Egypt)', 'Pro', 37, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(93, 31, 'Star 3 (Egypt)', 'Pro', 24, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(94, 32, 'Star 1 (Chile)', 'Pro', 25, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(95, 32, 'Star 2 (Chile)', 'Pro', 94, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(96, 32, 'Star 3 (Chile)', 'Pro', 76, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(97, 33, 'Star 1 (Italy)', 'Pro', 1, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(98, 33, 'Star 2 (Italy)', 'Pro', 27, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(99, 33, 'Star 3 (Italy)', 'Pro', 79, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(100, 34, 'Star 1 (Colombia)', 'Pro', 99, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(101, 34, 'Star 2 (Colombia)', 'Pro', 76, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(102, 34, 'Star 3 (Colombia)', 'Pro', 64, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(103, 35, 'Star 1 (Algeria)', 'Pro', 56, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(104, 35, 'Star 2 (Algeria)', 'Pro', 75, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(105, 35, 'Star 3 (Algeria)', 'Pro', 54, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(106, 36, 'Star 1 (Austria)', 'Pro', 90, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(107, 36, 'Star 2 (Austria)', 'Pro', 10, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(108, 36, 'Star 3 (Austria)', 'Pro', 72, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(109, 37, 'Star 1 (Denmark)', 'Pro', 4, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(110, 37, 'Star 2 (Denmark)', 'Pro', 15, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(111, 37, 'Star 3 (Denmark)', 'Pro', 27, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(112, 38, 'Star 1 (Peru)', 'Pro', 71, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(113, 38, 'Star 2 (Peru)', 'Pro', 47, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(114, 38, 'Star 3 (Peru)', 'Pro', 6, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(115, 39, 'Star 1 (Nigeria)', 'Pro', 84, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(116, 39, 'Star 2 (Nigeria)', 'Pro', 60, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(117, 39, 'Star 3 (Nigeria)', 'Pro', 66, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(118, 40, 'Star 1 (Scotland)', 'Pro', 50, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(119, 40, 'Star 2 (Scotland)', 'Pro', 1, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(120, 40, 'Star 3 (Scotland)', 'Pro', 78, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(121, 41, 'Star 1 (Serbia)', 'Pro', 31, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(122, 41, 'Star 2 (Serbia)', 'Pro', 42, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(123, 41, 'Star 3 (Serbia)', 'Pro', 83, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(124, 42, 'Star 1 (Tunisia)', 'Pro', 15, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(125, 42, 'Star 2 (Tunisia)', 'Pro', 54, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(126, 42, 'Star 3 (Tunisia)', 'Pro', 83, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(127, 43, 'Star 1 (Wales)', 'Pro', 25, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(128, 43, 'Star 2 (Wales)', 'Pro', 48, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(129, 43, 'Star 3 (Wales)', 'Pro', 92, NULL, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(130, 44, 'Star 1 (Czech Republic)', 'Pro', 5, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(131, 44, 'Star 2 (Czech Republic)', 'Pro', 38, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(132, 44, 'Star 3 (Czech Republic)', 'Pro', 86, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(133, 45, 'Star 1 (Panama)', 'Pro', 51, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(134, 45, 'Star 2 (Panama)', 'Pro', 27, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(135, 45, 'Star 3 (Panama)', 'Pro', 83, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(136, 46, 'Star 1 (Jamaica)', 'Pro', 6, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(137, 46, 'Star 2 (Jamaica)', 'Pro', 37, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(138, 46, 'Star 3 (Jamaica)', 'Pro', 35, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(139, 47, 'Star 1 (Paraguay)', 'Pro', 19, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(140, 47, 'Star 2 (Paraguay)', 'Pro', 19, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(141, 47, 'Star 3 (Paraguay)', 'Pro', 27, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(142, 48, 'Star 1 (New Zealand)', 'Pro', 85, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(143, 48, 'Star 2 (New Zealand)', 'Pro', 85, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(144, 48, 'Star 3 (New Zealand)', 'Pro', 36, NULL, '2026-03-30 23:47:32', '2026-03-30 23:47:32');

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

INSERT INTO `stadiums` (`id`, `name`, `city`, `capacity`, `image_url`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Estadio Azteca', 'Mexico City', 83000, 'https://images.unsplash.com/photo-1508098682722-e99c43a406b2', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(2, 'MetLife Stadium', 'East Rutherford', 82500, 'https://images.unsplash.com/photo-1599305090598-fe179d501c27', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(3, 'AT&T Stadium', 'Arlington', 94000, 'https://images.unsplash.com/photo-1566577739112-5180d4bf9390', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(4, 'Mercedes-Benz Stadium', 'Atlanta', 75000, 'https://images.unsplash.com/photo-1533558379417-062e08e68407', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(5, 'SoFi Stadium', 'Inglewood', 70000, 'https://images.unsplash.com/photo-1596727147705-61a532a659bd', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(6, 'BC Place', 'Vancouver', 54000, 'https://images.unsplash.com/photo-1569510345591-893043236021', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(7, 'BMO Field', 'Toronto', 45000, 'https://images.unsplash.com/photo-1574629810360-7efbbe195018', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(8, 'Arrowhead Stadium', 'Kansas City', 73000, 'https://images.unsplash.com/photo-1575361204480-aadea2d30e68', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(9, 'NRG Stadium', 'Houston', 72000, 'https://images.unsplash.com/photo-1594412217033-0c58e763f972', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(10, 'Levi\'s Stadium', 'Santa Clara', 71000, 'https://images.unsplash.com/photo-1580137189272-c9379f8864fd', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(11, 'Lincoln Financial Field', 'Philadelphia', 69000, 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(12, 'Lumen Field', 'Seattle', 69000, 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(13, 'Hard Rock Stadium', 'Miami Gardens', 65000, 'https://images.unsplash.com/photo-1517603980279-a76495f50a89', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(14, 'Gillette Stadium', 'Foxborough', 65000, 'https://images.unsplash.com/photo-1577223625816-7546f13df25d', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(15, 'Estadio BBVA', 'Guadalupe', 53500, 'https://images.unsplash.com/photo-1569510345591-893043236021', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(16, 'Estadio Akron', 'Zapopan', 48000, 'https://images.unsplash.com/photo-1504450758481-7338eba7524a', NULL, NULL, '2026-03-30 23:47:30', '2026-03-30 23:47:30');

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
(1, 1, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(2, 2, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(3, 3, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(4, 4, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(5, 5, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(6, 6, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(7, 7, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(8, 8, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(9, 9, 'Group C', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(10, 10, 'Group C', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(11, 11, 'Group C', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(12, 12, 'Group C', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(13, 13, 'Group D', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(14, 14, 'Group D', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(15, 15, 'Group D', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(16, 16, 'Group D', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(17, 17, 'Group E', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:30', '2026-03-30 23:47:30'),
(18, 18, 'Group E', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(19, 19, 'Group E', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(20, 20, 'Group E', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(21, 21, 'Group F', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(22, 22, 'Group F', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(23, 23, 'Group F', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(24, 24, 'Group F', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(25, 25, 'Group G', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(26, 26, 'Group G', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(27, 27, 'Group G', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(28, 28, 'Group G', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(29, 29, 'Group H', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(30, 30, 'Group H', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(31, 31, 'Group H', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(32, 32, 'Group H', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(33, 33, 'Group I', 1, 0, 1, 0, 0, 0, 0, 1, '2026-03-30 23:47:31', '2026-03-31 00:01:09'),
(34, 34, 'Group I', 1, 0, 1, 0, 0, 0, 0, 1, '2026-03-30 23:47:31', '2026-03-31 00:01:09'),
(35, 35, 'Group I', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(36, 36, 'Group I', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(37, 37, 'Group J', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(38, 38, 'Group J', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(39, 39, 'Group J', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(40, 40, 'Group J', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(41, 41, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(42, 42, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(43, 43, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(44, 44, 'Group K', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:31', '2026-03-30 23:47:31'),
(45, 45, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(46, 46, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(47, 47, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:32', '2026-03-30 23:47:32'),
(48, 48, 'Group L', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-30 23:47:32', '2026-03-30 23:47:32');

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
(1, 'Mexico', 'uploads/flags/mexico.png', 'Coach Mexico', 'Group A', 15, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 4, 40),
(2, 'South Africa', 'uploads/flags/south_africa.png', 'Coach South Africa', 'Group A', 70, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 16, 124),
(3, 'South Korea', 'uploads/flags/south_korea.png', 'Coach South Korea', 'Group A', 22, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 17, 69),
(4, 'Poland', 'uploads/flags/poland.png', 'Coach Poland', 'Group A', 30, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 5, 78),
(5, 'Canada', 'uploads/flags/canada.png', 'Coach Canada', 'Group B', 40, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 33, 122),
(6, 'Italy', 'uploads/flags/italy.png', 'Coach Italy', 'Group B', 9, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 1, 21),
(7, 'Qatar', 'uploads/flags/qatar.png', 'Coach Qatar', 'Group B', 35, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 34, 113),
(8, 'Switzerland', 'uploads/flags/switzerland.png', 'Coach Switzerland', 'Group B', 19, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 3, 83),
(9, 'USA', 'uploads/flags/usa.png', 'Coach USA', 'Group C', 13, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 4, 36),
(10, 'Ghana', 'uploads/flags/ghana.png', 'Coach Ghana', 'Group C', 60, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 14, 89),
(11, 'Netherlands', 'uploads/flags/netherlands.png', 'Coach Netherlands', 'Group C', 7, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 1, 36),
(12, 'Japan', 'uploads/flags/japan.png', 'Coach Japan', 'Group C', 18, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 9, 62),
(13, 'Argentina', 'uploads/flags/argentina.png', 'Coach Argentina', 'Group D', 2, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 1, 24),
(14, 'France', 'uploads/flags/france.png', 'Coach France', 'Group D', 3, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 1, 27),
(15, 'Saudi Arabia', 'uploads/flags/saudi_arabia.png', 'Coach Saudi Arabia', 'Group D', 56, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 21, 126),
(16, 'Norway', 'uploads/flags/norway.png', 'Coach Norway', 'Group D', 45, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 2, 84),
(17, 'Brazil', 'uploads/flags/brazil.png', 'Coach Brazil', 'Group E', 5, '2026-03-30 23:47:30', '2026-03-30 23:47:30', 1, 22),
(18, 'Spain', 'uploads/flags/spain.png', 'Coach Spain', 'Group E', 1, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 1, 25),
(19, 'Cameroon', 'uploads/flags/cameroon.png', 'Coach Cameroon', 'Group E', 46, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 11, 102),
(20, 'Ukraine', 'uploads/flags/ukraine.png', 'Coach Ukraine', 'Group E', 24, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 11, 132),
(21, 'England', 'uploads/flags/england.png', 'Coach England', 'Group F', 4, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 27),
(22, 'Portugal', 'uploads/flags/portugal.png', 'Coach Portugal', 'Group F', 6, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 43),
(23, 'Senegal', 'uploads/flags/senegal.png', 'Coach Senegal', 'Group F', 17, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 17, 99),
(24, 'Ecuador', 'uploads/flags/ecuador.png', 'Coach Ecuador', 'Group F', 31, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 10, 71),
(25, 'Belgium', 'uploads/flags/belgium.png', 'Coach Belgium', 'Group G', 8, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 1, 71),
(26, 'Croatia', 'uploads/flags/croatia.png', 'Coach Croatia', 'Group G', 10, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 125),
(27, 'Ivory Coast', 'uploads/flags/ivory_coast.png', 'Coach Ivory Coast', 'Group G', 39, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 12, 107),
(28, 'Turkey', 'uploads/flags/turkey.png', 'Coach Turkey', 'Group G', 35, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 10, 67),
(29, 'Germany', 'uploads/flags/germany.png', 'Coach Germany', 'Group H', 16, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 1, 22),
(30, 'Uruguay', 'uploads/flags/uruguay.png', 'Coach Uruguay', 'Group H', 11, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 2, 76),
(31, 'Egypt', 'uploads/flags/egypt.png', 'Coach Egypt', 'Group H', 36, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 9, 75),
(32, 'Chile', 'uploads/flags/chile.png', 'Coach Chile', 'Group H', 42, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 84),
(33, 'Italy', 'uploads/flags/italy.png', 'Coach Italy', 'Group I', 9, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 1, 21),
(34, 'Colombia', 'uploads/flags/colombia.png', 'Coach Colombia', 'Group I', 14, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 54),
(35, 'Algeria', 'uploads/flags/algeria.png', 'Coach Algeria', 'Group I', 43, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 13, 103),
(36, 'Austria', 'uploads/flags/austria.png', 'Coach Austria', 'Group I', 25, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 10, 105),
(37, 'Denmark', 'uploads/flags/denmark.png', 'Coach Denmark', 'Group J', 21, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 3, 51),
(38, 'Peru', 'uploads/flags/peru.png', 'Coach Peru', 'Group J', 32, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 10, 91),
(39, 'Nigeria', 'uploads/flags/nigeria.png', 'Coach Nigeria', 'Group J', 28, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 5, 82),
(40, 'Scotland', 'uploads/flags/scotland.png', 'Coach Scotland', 'Group J', 34, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 13, 88),
(41, 'Serbia', 'uploads/flags/serbia.png', 'Coach Serbia', 'Group K', 33, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 6, 101),
(42, 'Tunisia', 'uploads/flags/tunisia.png', 'Coach Tunisia', 'Group K', 41, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 14, 65),
(43, 'Wales', 'uploads/flags/wales.png', 'Coach Wales', 'Group K', 29, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 8, 117),
(44, 'Czech Republic', 'uploads/flags/czech_republic.png', 'Coach Czech Republic', 'Group K', 38, '2026-03-30 23:47:31', '2026-03-30 23:47:31', 2, 67),
(45, 'Panama', 'uploads/flags/panama.png', 'Coach Panama', 'Group L', 44, '2026-03-30 23:47:32', '2026-03-30 23:47:32', 29, 150),
(46, 'Jamaica', 'uploads/flags/jamaica.png', 'Coach Jamaica', 'Group L', 55, '2026-03-30 23:47:32', '2026-03-30 23:47:32', 27, 116),
(47, 'Paraguay', 'uploads/flags/paraguay.png', 'Coach Paraguay', 'Group L', 56, '2026-03-30 23:47:32', '2026-03-30 23:47:32', 8, 103),
(48, 'New Zealand', 'uploads/flags/new_zealand.png', 'Coach New Zealand', 'Group L', 85, '2026-03-30 23:47:32', '2026-03-30 23:47:32', 47, 161);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@fwc2026.com', NULL, '$2y$10$xD9u7wsftBSeIB6m28gYH.GrI3ymPZqat7M3M3Tw8fM3I990IysPO', NULL, '2026-03-30 23:47:29', '2026-03-30 23:47:29');

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
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `match_events`
--
ALTER TABLE `match_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `standings`
--
ALTER TABLE `standings`
  ADD CONSTRAINT `standings_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
