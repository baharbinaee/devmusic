-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 08:46 PM
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
-- Database: `devmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`, `img`, `created_at`, `updated_at`) VALUES
(4, 'Chester Bennington', 'in a nutshell; A LEGENG!', '1765656230_images.webp', '2025-12-13 20:03:50', NULL),
(5, 'Doja Cat', 'a sassy baddie queen.', '1765657283_ab6761610000e5eb8a0644455ebfa7d3976f5101.jpg', '2025-12-13 20:21:23', NULL),
(6, 'Billie Eilish', 'a teenage friendly drama queen.', '1765657488_images (1).webp', '2025-12-13 20:24:48', NULL),
(7, 'Gojira', 'they simply exist.', '1765657573_ab6761610000e5eb96c4949ee078fbef5d5adb68.jpg', '2025-12-13 20:26:13', NULL),
(8, 'Korn', 'they badly wanted to replace K with a P.', '1765657662_images (2).webp', '2025-12-13 20:27:42', NULL),
(9, 'The Weeknd', 'that awkward kid back in school with poor spelling.', '1765657735_images (3).webp', '2025-12-13 20:28:55', NULL),
(10, 'Radiohead', 'let\'s not discuss it and just jump to the crying part cause I\'M A CREEEEEEP. \r\nP.S. the vocalist looks like a raw carrot.', '1765657896_MV5BZmU1OGNmZjMtY2ZlZi00YTI3LTk2ODctYjg1YjYyMDNmZTc0XkEyXkFqcGc@._V1_.jpg', '2025-12-13 20:31:36', NULL),
(11, 'Bring Me The Horizon', 'the literal meaning of Nu Metal.', '1765658000_BMTH-JontiWild-2024-2.webp', '2025-12-13 20:33:20', NULL),
(12, 'Bad Omens', 'dude calls himself a bad omen, what else did you expect?', '1765658084_LxT5UUN8tzo8ggc58NpSkg-1200-80.jpg', '2025-12-13 20:34:44', NULL),
(13, 'Michael Jackson', 'Michael Joseph Jackson was an American singer, songwriter, dancer, and philanthropist. Dubbed the \"King of Pop\", he is widely regarded as one of the most culturally significant figures of the 20th century.', '1765658508_Michael_Jackson.webp', '2025-12-13 20:41:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(2, 'Jersey Club', '1766432231_51kuXnGnGcL._UXNaN_FMjpg_QL85_.jpg', '2025-12-22 19:37:11', NULL),
(3, 'Alternative Metal', '1766432304_Nu-Metal-Party.jpg', '2025-12-22 19:38:24', NULL),
(4, 'Indie Pop–Rock', '1766432550_avatars-000436891380-l192ru-t240x240.jpg', '2025-12-22 19:42:30', NULL),
(5, 'Phonk', '1766432598_avatars-000291938190-p1vhle-t240x240.jpg', '2025-12-22 19:43:18', NULL),
(6, 'Alternative R&B', '1766432757_61n-WuyW0JL._UXNaN_FMjpg_QL85_.jpg', '2025-12-22 19:45:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `musics`
--

CREATE TABLE `musics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lyrics` varchar(255) NOT NULL,
  `music` varchar(256) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `artist_id` tinyint(4) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_music`
--

CREATE TABLE `playlist_music` (
  `id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `description`, `logo`, `banner`, `email`, `phonenumber`, `created_at`, `updated_at`) VALUES
(1, 'this seems to be a website.', '', '', 'baharbinaee03@gmail.com', '09199751027', '2025-12-12 19:29:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musics`
--
ALTER TABLE `musics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_music`
--
ALTER TABLE `playlist_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `musics`
--
ALTER TABLE `musics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist_music`
--
ALTER TABLE `playlist_music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
