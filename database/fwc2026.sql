-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 02:23 PM
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
  `home_team_id` bigint(20) UNSIGNED NOT NULL,
  `away_team_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `matches` (`id`, `home_team_id`, `away_team_id`, `stadium_id`, `match_date_utc`, `status`, `home_score`, `away_score`, `stage`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '2026-03-28 06:33:23', 'live', 2, 1, 'Group Stage', 'Group A', '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(2, 5, 6, 2, '2026-03-29 06:33:23', 'upcoming', 0, 0, 'Group Stage', 'Group B', '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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

--
-- Dumping data for table `match_events`
--

INSERT INTO `match_events` (`id`, `match_id`, `team_id`, `player_id`, `type`, `minute`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'goal', 25, 'Header from corner', '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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
(10, '2026_03_28_063002_create_standings_table', 1);

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
(1, 1, 'Player 1 (USA)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(2, 1, 'Player 2 (USA)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(3, 1, 'Player 3 (USA)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(4, 2, 'Player 1 (Canada)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(5, 2, 'Player 2 (Canada)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(6, 2, 'Player 3 (Canada)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(7, 3, 'Player 1 (Mexico)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(8, 3, 'Player 2 (Mexico)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(9, 3, 'Player 3 (Mexico)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(10, 4, 'Player 1 (Brazil)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(11, 4, 'Player 2 (Brazil)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(12, 4, 'Player 3 (Brazil)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(13, 5, 'Player 1 (Argentina)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(14, 5, 'Player 2 (Argentina)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(15, 5, 'Player 3 (Argentina)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(16, 6, 'Player 1 (France)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(17, 6, 'Player 2 (France)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(18, 6, 'Player 3 (France)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(19, 7, 'Player 1 (Germany)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(20, 7, 'Player 2 (Germany)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(21, 7, 'Player 3 (Germany)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(22, 8, 'Player 1 (Japan)', 'Forward', 1, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(23, 8, 'Player 2 (Japan)', 'Forward', 2, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(24, 8, 'Player 3 (Japan)', 'Forward', 3, NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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
(1, 'MetLife Stadium', 'New York/New Jersey', 82500, 'https://images.unsplash.com/photo-1599305090598-fe179d501c27', 40.81280000, -74.07420000, '2026-03-28 00:33:22', '2026-03-28 00:33:22'),
(2, 'SoFi Stadium', 'Los Angeles', 70240, 'https://images.unsplash.com/photo-1596727147705-61a532a659bd', 33.95350000, -118.33900000, '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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
(1, 1, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(2, 2, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(3, 3, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(4, 4, 'Group A', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(5, 5, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(6, 6, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(7, 7, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(8, 8, 'Group B', 0, 0, 0, 0, 0, 0, 0, 0, '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `flag_url`, `coach`, `group_name`, `fifa_rank`, `created_at`, `updated_at`) VALUES
(1, 'USA', '🇺🇸', 'Coach USA', 'Group A', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(2, 'Canada', '🇨🇦', 'Coach Canada', 'Group A', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(3, 'Mexico', '🇲🇽', 'Coach Mexico', 'Group A', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(4, 'Brazil', '🇧🇷', 'Coach Brazil', 'Group A', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(5, 'Argentina', '🇦🇷', 'Coach Argentina', 'Group B', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(6, 'France', '🇫🇷', 'Coach France', 'Group B', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(7, 'Germany', '🇩🇪', 'Coach Germany', 'Group B', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23'),
(8, 'Japan', '🇯🇵', 'Coach Japan', 'Group B', NULL, '2026-03-28 00:33:23', '2026-03-28 00:33:23');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `match_events`
--
ALTER TABLE `match_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `standings`
--
ALTER TABLE `standings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
