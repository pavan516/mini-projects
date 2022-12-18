-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 11:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lordselearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_dt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_code`, `created_dt`, `modified_dt`) VALUES
(1, 'LORDS_BADANGPET', 'LORDS_BADANGPET', '2020-06-30 12:52:43', '2020-06-30 12:52:43'),
(2, 'LORDS_JILLELAGUDA', 'LORDS_JILLELAGUDA', '2020-06-30 12:53:10', '2020-06-30 12:53:10'),
(3, 'LORDS_MALLAPUR', 'LORDS_MALLAPUR', '2020-06-30 12:53:25', '2020-06-30 12:53:25'),
(4, 'SYREDDY_ALMASGUDA', 'SYREDDY_ALMASGUDA', '2020-06-30 12:54:00', '2020-06-30 12:54:00'),
(5, 'VIDHYA_VANI_RNREDDY', 'VIDHYA_VANI_RNREDDY', '2020-06-30 12:54:28', '2020-06-30 12:54:28'),
(6, 'VIDHYA_VIKAS_GURRAMGUDA', 'VIDHYA_VIKAS_GURRAMGUDA', '2020-06-30 12:54:55', '2020-06-30 12:54:55'),
(7, 'MARUTHI_CONCEPT_EMJAL', 'MARUTHI_CONCEPT_EMJAL', '2020-06-30 12:55:23', '2020-06-30 12:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_code` varchar(128) NOT NULL,
  `class_name` varchar(128) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_code`, `class_name`, `created_dt`, `modified_dt`) VALUES
(1, '10TH_CLASS', '10th class (x class)', '2020-07-03 05:41:37', '2020-07-03 05:41:37'),
(2, '9TH_CLASS', '9th class (ix class)', '2020-07-03 05:42:09', '2020-07-03 05:42:09'),
(3, '8TH_CLASS', '8th class (viii class)', '2020-07-03 05:42:37', '2020-07-03 05:42:37'),
(4, '7TH_CLASS', '7th class (vii class)', '2020-07-03 05:42:58', '2020-07-03 05:42:58'),
(5, '6TH_CLASS', '6th class (vi class)', '2020-07-03 05:43:30', '2020-07-03 05:43:30'),
(6, '5TH_CLASS', '5th class (v class)', '2020-07-03 05:43:49', '2020-07-03 05:43:49'),
(7, '4TH_CLASS', '4th class (iv class)', '2020-07-03 05:44:32', '2020-07-03 05:44:32'),
(8, '3RD_CLASS', '3rd class (iii class)', '2020-07-03 05:44:49', '2020-07-03 05:44:49'),
(9, '2ND_CLASS', '2nd class (ii class)', '2020-07-03 05:45:22', '2020-07-03 05:45:22'),
(10, '1ST_CLASS', '1st class (i class)', '2020-07-03 05:45:40', '2020-07-03 05:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `uuid` varchar(48) NOT NULL,
  `homework_on` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homework_sections`
--

CREATE TABLE `homework_sections` (
  `id` int(11) NOT NULL,
  `homework_on` date NOT NULL,
  `homework_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uuid` varchar(48) NOT NULL,
  `post_on` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_sections`
--

CREATE TABLE `post_sections` (
  `id` int(11) NOT NULL,
  `post_on` date NOT NULL,
  `post_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_name` varchar(48) NOT NULL,
  `section_code` varchar(48) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `branch_id`, `class_id`, `section_name`, `section_code`, `created_dt`) VALUES
(1, 2, 10, '1st class - rose', 'ROSE', '2020-07-03 06:10:18'),
(2, 2, 10, '1st class - jasmine', 'JASMINE', '2020-07-03 06:10:37'),
(3, 2, 10, '1st class - lotus', 'LOTUS', '2020-07-03 06:10:59'),
(4, 2, 10, '1st class - marigold', 'MARIGOLD', '2020-07-03 06:11:21'),
(5, 2, 9, '2nd class - rose', 'ROSE', '2020-07-03 06:12:18'),
(6, 2, 9, '2nd class - jasmine', 'JASMINE', '2020-07-03 06:13:04'),
(7, 2, 9, '2nd class - lotus', 'LOTUS', '2020-07-03 06:13:33'),
(8, 2, 9, '2nd class - marigold', 'MARIGOLD', '2020-07-03 06:14:00'),
(9, 2, 8, '3rd class - rose', 'ROSE', '2020-07-03 06:14:42'),
(10, 2, 8, '3rd class - jasmine', 'JASMINE', '2020-07-03 06:15:07'),
(11, 2, 8, '3rd class - lotus', 'LOTUS', '2020-07-03 06:15:34'),
(12, 2, 8, '3rd class - marigold', 'MARIGOLD', '2020-07-03 06:16:00'),
(13, 2, 7, '4th class - rose', 'ROSE', '2020-07-03 06:16:44'),
(14, 2, 7, '4th class - jasmine', 'JASMINE', '2020-07-03 06:17:02'),
(15, 2, 7, '4th class - lotus', 'LOTUS', '2020-07-03 06:17:20'),
(16, 2, 7, '4th class - marigold', 'MARIGOLD', '2020-07-03 06:17:39'),
(17, 2, 6, '5th class - rose', 'ROSE', '2020-07-03 06:18:06'),
(18, 2, 6, '5th class - jasmine', 'JASMINE', '2020-07-03 06:18:29'),
(19, 2, 6, '5th class - lotus', 'LOTUS', '2020-07-03 06:18:44'),
(20, 2, 5, '6th class - rose', 'ROSE', '2020-07-03 06:19:05'),
(21, 2, 5, '6th class - jasmine', 'JASMINE', '2020-07-03 06:19:41'),
(22, 2, 5, '6th class - lotus', 'LOTUS', '2020-07-03 06:20:04'),
(23, 2, 4, '7th class - rose', 'ROSE', '2020-07-03 06:20:38'),
(24, 2, 4, '7th class - jasmine', 'JASMINE', '2020-07-03 06:21:02'),
(25, 2, 4, '7th class - lotus', 'LOTUS', '2020-07-03 06:21:28'),
(26, 2, 3, '8th class - rose', 'ROSE', '2020-07-03 06:21:47'),
(27, 2, 3, '8th class - jasmine', 'JASMINE', '2020-07-03 06:22:09'),
(28, 2, 2, '9th class - rose', 'ROSE', '2020-07-03 06:22:26'),
(29, 2, 2, '9th class - jasmine', 'JASMINE', '2020-07-03 06:22:46'),
(30, 2, 1, '10th class - rose', 'ROSE', '2020-07-03 06:23:05'),
(31, 2, 1, '10th class - jasmine', 'JASMINE', '2020-07-03 06:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `student_homeworks`
--

CREATE TABLE `student_homeworks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `image` varchar(255) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(255) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `class_id`, `subject_name`, `subject_code`, `created_dt`, `modified_dt`) VALUES
(1, 10, 'telugu', 'TELUGU', '2020-07-03 05:48:11', '2020-07-03 05:48:11'),
(2, 10, 'hindi', 'HINDI', '2020-07-03 05:48:22', '2020-07-03 05:48:22'),
(3, 10, 'english', 'ENGLISH', '2020-07-03 05:48:42', '2020-07-03 05:48:42'),
(4, 10, 'maths', 'MATHS', '2020-07-03 05:48:49', '2020-07-03 05:48:49'),
(5, 10, 'evs', 'EVS', '2020-07-03 05:48:54', '2020-07-03 05:48:54'),
(6, 10, 'computer', 'COMPUTER', '2020-07-03 05:49:01', '2020-07-03 05:49:01'),
(7, 9, 'telugu', 'TELUGU', '2020-07-03 05:50:10', '2020-07-03 05:50:10'),
(8, 9, 'hindi', 'HINDI', '2020-07-03 05:50:17', '2020-07-03 05:50:17'),
(9, 9, 'english', 'ENGLISH', '2020-07-03 05:50:24', '2020-07-03 05:50:24'),
(10, 9, 'maths', 'MATHS', '2020-07-03 05:50:32', '2020-07-03 05:50:32'),
(11, 9, 'evs', 'EVS', '2020-07-03 05:50:37', '2020-07-03 05:50:37'),
(12, 9, 'computer', 'COMPUTER', '2020-07-03 05:50:44', '2020-07-03 05:50:44'),
(13, 8, 'telugu', 'TELUGU', '2020-07-03 05:50:52', '2020-07-03 05:50:52'),
(14, 8, 'hindi', 'HINDI', '2020-07-03 05:50:58', '2020-07-03 05:50:58'),
(15, 8, 'english', 'ENGLISH', '2020-07-03 05:51:16', '2020-07-03 05:51:16'),
(16, 8, 'maths', 'MATHS', '2020-07-03 05:51:24', '2020-07-03 05:51:24'),
(17, 8, 'science', 'SCIENCE', '2020-07-03 05:51:33', '2020-07-03 05:51:33'),
(18, 8, 'social', 'SOCIAL', '2020-07-03 05:51:41', '2020-07-03 05:51:41'),
(19, 8, 'computer', 'COMPUTER', '2020-07-03 05:51:56', '2020-07-03 05:51:56'),
(20, 7, 'telugu', 'TELUGU', '2020-07-03 05:52:11', '2020-07-03 05:52:11'),
(21, 7, 'hindi', 'HINDI', '2020-07-03 05:52:18', '2020-07-03 05:52:18'),
(22, 7, 'english', 'ENGLISH', '2020-07-03 05:52:25', '2020-07-03 05:52:25'),
(23, 7, 'maths', 'MATHS', '2020-07-03 05:52:31', '2020-07-03 05:52:31'),
(24, 7, 'science', 'SCIENCE', '2020-07-03 05:52:38', '2020-07-03 05:52:38'),
(25, 7, 'social', 'SOCIAL', '2020-07-03 05:52:45', '2020-07-03 05:52:45'),
(26, 7, 'computer', 'COMPUTER', '2020-07-03 05:52:51', '2020-07-03 05:52:51'),
(27, 6, 'telugu', 'TELUGU', '2020-07-03 05:53:05', '2020-07-03 05:53:05'),
(28, 6, 'hindi', 'HINDI', '2020-07-03 05:53:11', '2020-07-03 05:53:11'),
(29, 6, 'english', 'ENGLISH', '2020-07-03 05:53:17', '2020-07-03 05:53:17'),
(30, 6, 'maths', 'MATHS', '2020-07-03 05:53:23', '2020-07-03 05:53:23'),
(31, 6, 'science', 'SCIENCE', '2020-07-03 05:53:44', '2020-07-03 05:53:44'),
(32, 6, 'social', 'SOCIAL', '2020-07-03 05:53:52', '2020-07-03 05:53:52'),
(33, 6, 'computer', 'COMPUTER', '2020-07-03 05:54:00', '2020-07-03 05:54:00'),
(34, 5, 'telugu', 'TELUGU', '2020-07-03 05:54:18', '2020-07-03 05:54:18'),
(35, 5, 'hindi', 'HINDI', '2020-07-03 05:54:25', '2020-07-03 05:54:25'),
(36, 5, 'english', 'ENGLISH', '2020-07-03 05:54:32', '2020-07-03 05:54:32'),
(37, 5, 'maths', 'MATHS', '2020-07-03 05:54:38', '2020-07-03 05:54:38'),
(38, 5, 'science', 'SCIENCE', '2020-07-03 05:54:44', '2020-07-03 05:54:44'),
(39, 5, 'social', 'SOCIAL', '2020-07-03 05:54:51', '2020-07-03 05:54:51'),
(40, 5, 'computer', 'COMPUTER', '2020-07-03 05:54:57', '2020-07-03 05:54:57'),
(41, 4, 'telugu', 'TELUGU', '2020-07-03 05:55:13', '2020-07-03 05:55:13'),
(42, 4, 'hindi', 'HINDI', '2020-07-03 05:55:21', '2020-07-03 05:55:21'),
(43, 4, 'english', 'ENGLISH', '2020-07-03 05:55:28', '2020-07-03 05:55:28'),
(44, 4, 'maths', 'MATHS', '2020-07-03 05:55:35', '2020-07-03 05:55:35'),
(45, 4, 'science', 'SCIENCE', '2020-07-03 05:55:41', '2020-07-03 05:55:41'),
(46, 4, 'social', 'SOCIAL', '2020-07-03 05:55:48', '2020-07-03 05:55:48'),
(47, 4, 'computer', 'COMPUTER', '2020-07-03 05:55:54', '2020-07-03 05:55:54'),
(48, 3, 'telugu', 'TELUGU', '2020-07-03 05:56:10', '2020-07-03 05:56:10'),
(49, 3, 'hindi', 'HINDI', '2020-07-03 05:56:16', '2020-07-03 05:56:16'),
(50, 3, 'english', 'ENGLISH', '2020-07-03 05:56:23', '2020-07-03 05:56:23'),
(51, 3, 'maths', 'MATHS', '2020-07-03 05:57:02', '2020-07-03 05:57:02'),
(52, 3, 'physics', 'PHYSICS', '2020-07-03 05:57:12', '2020-07-03 05:57:12'),
(53, 3, 'biology', 'BIOLOGY', '2020-07-03 05:57:25', '2020-07-03 05:57:25'),
(54, 3, 'social', 'SOCIAL', '2020-07-03 05:57:40', '2020-07-03 05:57:40'),
(55, 3, 'computer', 'COMPUTER', '2020-07-03 05:57:47', '2020-07-03 05:57:47'),
(56, 2, 'telugu', 'TELUGU', '2020-07-03 05:57:57', '2020-07-03 05:57:57'),
(57, 2, 'hindi', 'HINDI', '2020-07-03 05:58:04', '2020-07-03 05:58:04'),
(58, 2, 'english', 'ENGLISH', '2020-07-03 05:58:11', '2020-07-03 05:58:11'),
(59, 2, 'maths', 'MATHS', '2020-07-03 05:58:16', '2020-07-03 05:58:16'),
(60, 2, 'physics', 'PHYSICS', '2020-07-03 06:04:33', '2020-07-03 06:04:33'),
(61, 2, 'biology', 'BIOLOGY', '2020-07-03 06:05:26', '2020-07-03 06:05:26'),
(62, 2, 'social', 'SOCIAL', '2020-07-03 06:05:32', '2020-07-03 06:05:32'),
(63, 1, 'telugu', 'TELUGU', '2020-07-03 06:05:42', '2020-07-03 06:05:42'),
(64, 1, 'hindi', 'HINDI', '2020-07-03 06:05:48', '2020-07-03 06:05:48'),
(65, 1, 'english', 'ENGLISH', '2020-07-03 06:05:53', '2020-07-03 06:05:53'),
(66, 1, 'maths', 'MATHS', '2020-07-03 06:06:00', '2020-07-03 06:06:00'),
(67, 1, 'physics', 'PHYSICS', '2020-07-03 06:06:05', '2020-07-03 06:06:05'),
(68, 1, 'biology', 'BIOLOGY', '2020-07-03 06:06:11', '2020-07-03 06:06:11'),
(69, 1, 'social', 'SOCIAL', '2020-07-03 06:06:17', '2020-07-03 06:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `teachermappings`
--

CREATE TABLE `teachermappings` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachermappings`
--

INSERT INTO `teachermappings` (`id`, `branch_id`, `teacher_id`, `class_id`, `section_id`, `subject_id`, `created_dt`) VALUES
(1, 2, 30, 10, 1, 1, '2020-07-03 06:48:35'),
(2, 2, 30, 10, 2, 1, '2020-07-03 06:48:45'),
(3, 2, 30, 10, 3, 1, '2020-07-03 06:48:52'),
(4, 2, 30, 10, 4, 1, '2020-07-03 06:49:01'),
(5, 2, 30, 9, 5, 7, '2020-07-03 06:49:17'),
(6, 2, 30, 9, 6, 7, '2020-07-03 06:49:54'),
(7, 2, 28, 9, 7, 7, '2020-07-03 06:55:22'),
(8, 2, 28, 9, 8, 7, '2020-07-03 06:55:38'),
(9, 2, 28, 8, 12, 13, '2020-07-03 06:55:53'),
(10, 2, 28, 8, 11, 13, '2020-07-03 06:56:03'),
(11, 2, 28, 8, 10, 13, '2020-07-03 06:56:11'),
(12, 2, 28, 8, 9, 13, '2020-07-03 06:56:19'),
(13, 2, 22, 7, 16, 20, '2020-07-03 07:02:15'),
(14, 2, 22, 7, 15, 20, '2020-07-03 07:02:23'),
(15, 2, 22, 7, 14, 20, '2020-07-03 07:02:34'),
(16, 2, 22, 7, 13, 20, '2020-07-03 07:02:42'),
(17, 2, 22, 6, 17, 27, '2020-07-03 07:06:49'),
(18, 2, 22, 6, 18, 27, '2020-07-03 07:06:57'),
(19, 2, 14, 6, 19, 27, '2020-07-03 07:10:11'),
(20, 2, 14, 5, 20, 34, '2020-07-03 07:10:19'),
(22, 2, 14, 5, 21, 34, '2020-07-03 07:12:52'),
(23, 2, 14, 5, 22, 34, '2020-07-03 07:13:08'),
(24, 2, 14, 4, 23, 41, '2020-07-03 07:13:34'),
(25, 2, 14, 4, 24, 41, '2020-07-03 07:13:42'),
(26, 2, 14, 4, 25, 41, '2020-07-03 07:13:49'),
(27, 2, 4, 3, 26, 48, '2020-07-03 07:14:56'),
(28, 2, 4, 3, 27, 48, '2020-07-03 07:15:04'),
(29, 2, 4, 2, 28, 56, '2020-07-03 07:15:10'),
(30, 2, 4, 2, 29, 56, '2020-07-03 07:15:19'),
(31, 2, 4, 1, 30, 63, '2020-07-03 07:15:33'),
(32, 2, 4, 1, 31, 63, '2020-07-03 07:15:41'),
(33, 2, 27, 10, 1, 2, '2020-07-03 07:16:10'),
(34, 2, 27, 10, 2, 2, '2020-07-03 07:16:17'),
(35, 2, 27, 9, 6, 8, '2020-07-03 07:16:26'),
(36, 2, 27, 9, 7, 8, '2020-07-03 07:16:33'),
(37, 2, 27, 9, 8, 8, '2020-07-03 07:16:42'),
(38, 2, 27, 8, 9, 14, '2020-07-03 07:16:49'),
(39, 2, 26, 10, 3, 2, '2020-07-03 07:22:41'),
(40, 2, 26, 10, 4, 2, '2020-07-03 07:23:11'),
(41, 2, 26, 9, 5, 8, '2020-07-03 07:23:49'),
(42, 2, 26, 8, 11, 14, '2020-07-03 07:24:02'),
(43, 2, 26, 8, 12, 14, '2020-07-03 07:24:15'),
(44, 2, 26, 7, 16, 21, '2020-07-03 07:24:32'),
(45, 2, 20, 8, 10, 14, '2020-07-03 07:31:51'),
(46, 2, 20, 7, 13, 21, '2020-07-03 07:32:05'),
(47, 2, 20, 6, 18, 28, '2020-07-03 07:32:28'),
(48, 2, 20, 5, 20, 35, '2020-07-03 07:32:41'),
(49, 2, 20, 5, 21, 35, '2020-07-03 07:32:48'),
(50, 2, 20, 4, 24, 42, '2020-07-03 07:33:04'),
(51, 2, 15, 7, 15, 21, '2020-07-03 07:34:14'),
(52, 2, 15, 7, 14, 21, '2020-07-03 07:34:28'),
(53, 2, 15, 6, 17, 28, '2020-07-03 07:34:42'),
(54, 2, 15, 6, 19, 28, '2020-07-03 07:34:53'),
(55, 2, 15, 5, 22, 35, '2020-07-03 07:35:04'),
(56, 2, 15, 4, 23, 42, '2020-07-03 07:35:16'),
(57, 2, 15, 4, 25, 42, '2020-07-03 07:35:24'),
(59, 2, 5, 3, 26, 49, '2020-07-03 07:36:54'),
(60, 2, 5, 3, 27, 49, '2020-07-03 07:37:01'),
(61, 2, 5, 2, 28, 57, '2020-07-03 07:37:13'),
(62, 2, 5, 2, 29, 57, '2020-07-03 07:37:20'),
(63, 2, 5, 1, 30, 64, '2020-07-03 07:37:26'),
(64, 2, 5, 1, 31, 64, '2020-07-03 07:37:37'),
(65, 2, 23, 10, 2, 3, '2020-07-03 07:38:30'),
(66, 2, 23, 9, 7, 9, '2020-07-03 07:38:44'),
(67, 2, 23, 7, 13, 25, '2020-07-03 07:38:58'),
(68, 2, 23, 7, 14, 25, '2020-07-03 07:39:06'),
(69, 2, 23, 7, 15, 25, '2020-07-03 07:39:14'),
(70, 2, 23, 7, 16, 25, '2020-07-03 07:39:22'),
(71, 2, 23, 8, 9, 19, '2020-07-03 07:39:45'),
(72, 2, 23, 8, 10, 19, '2020-07-03 07:39:53'),
(73, 2, 23, 8, 11, 19, '2020-07-03 07:40:00'),
(74, 2, 23, 8, 12, 19, '2020-07-03 07:40:14'),
(77, 2, 33, 10, 2, 1, '2020-07-03 08:01:02'),
(78, 2, 33, 10, 2, 2, '2020-07-03 08:01:13'),
(79, 2, 33, 10, 2, 3, '2020-07-03 08:01:21'),
(80, 2, 33, 10, 2, 4, '2020-07-03 08:01:29'),
(81, 2, 33, 10, 2, 5, '2020-07-03 08:01:36'),
(82, 2, 33, 10, 2, 6, '2020-07-03 08:01:43'),
(83, 2, 34, 10, 4, 1, '2020-07-03 08:02:13'),
(84, 2, 34, 10, 4, 2, '2020-07-03 08:02:23'),
(85, 2, 34, 10, 4, 3, '2020-07-03 08:02:29'),
(86, 2, 34, 10, 4, 4, '2020-07-03 08:02:56'),
(87, 2, 34, 10, 4, 5, '2020-07-03 08:03:07'),
(88, 2, 34, 10, 4, 6, '2020-07-03 08:03:18'),
(95, 2, 35, 10, 3, 1, '2020-07-03 08:05:23'),
(96, 2, 35, 10, 3, 2, '2020-07-03 08:05:29'),
(97, 2, 35, 10, 3, 3, '2020-07-03 08:05:36'),
(98, 2, 35, 10, 3, 4, '2020-07-03 08:05:44'),
(99, 2, 35, 10, 3, 5, '2020-07-03 08:05:51'),
(100, 2, 35, 10, 3, 6, '2020-07-03 08:05:59'),
(101, 2, 31, 10, 1, 3, '2020-07-03 08:08:01'),
(102, 2, 31, 10, 3, 3, '2020-07-03 08:08:12'),
(103, 2, 31, 10, 4, 3, '2020-07-03 08:08:19'),
(104, 2, 31, 9, 8, 9, '2020-07-03 08:08:35'),
(105, 2, 31, 9, 8, 11, '2020-07-03 08:08:58'),
(106, 2, 31, 8, 9, 18, '2020-07-03 08:10:37'),
(107, 2, 31, 8, 9, 17, '2020-07-03 08:11:14'),
(108, 2, 21, 9, 5, 9, '2020-07-03 08:11:47'),
(109, 2, 21, 9, 6, 9, '2020-07-03 08:11:55'),
(110, 2, 21, 8, 9, 15, '2020-07-03 08:12:06'),
(111, 2, 21, 8, 10, 15, '2020-07-03 08:12:13'),
(112, 2, 21, 7, 15, 22, '2020-07-03 08:12:25'),
(113, 2, 21, 7, 16, 22, '2020-07-03 08:12:35'),
(114, 2, 21, 6, 19, 29, '2020-07-03 08:13:14'),
(115, 2, 19, 8, 11, 15, '2020-07-03 08:14:06'),
(116, 2, 19, 8, 12, 15, '2020-07-03 08:14:13'),
(117, 2, 19, 7, 13, 22, '2020-07-03 08:14:23'),
(118, 2, 19, 7, 14, 22, '2020-07-03 08:14:30'),
(119, 2, 19, 6, 17, 29, '2020-07-03 08:14:40'),
(120, 2, 19, 6, 18, 29, '2020-07-03 08:14:47'),
(121, 2, 19, 7, 13, 26, '2020-07-03 08:15:12'),
(122, 2, 19, 7, 14, 26, '2020-07-03 08:15:21'),
(123, 2, 19, 7, 15, 26, '2020-07-03 08:15:38'),
(124, 2, 19, 7, 16, 26, '2020-07-03 08:15:50'),
(125, 2, 19, 6, 17, 33, '2020-07-03 08:16:13'),
(126, 2, 19, 6, 18, 33, '2020-07-03 08:16:21'),
(127, 2, 19, 6, 19, 33, '2020-07-03 08:16:29'),
(128, 2, 9, 5, 21, 36, '2020-07-03 08:17:14'),
(129, 2, 9, 5, 22, 36, '2020-07-03 08:17:23'),
(130, 2, 9, 4, 25, 43, '2020-07-03 08:17:37'),
(131, 2, 9, 3, 26, 50, '2020-07-03 08:17:50'),
(132, 2, 9, 2, 28, 58, '2020-07-03 08:18:11'),
(133, 2, 9, 1, 31, 65, '2020-07-03 08:18:30'),
(134, 2, 8, 5, 20, 36, '2020-07-03 08:19:02'),
(135, 2, 8, 4, 24, 43, '2020-07-03 08:19:13'),
(136, 2, 8, 4, 23, 43, '2020-07-03 08:19:22'),
(137, 2, 8, 3, 27, 50, '2020-07-03 08:19:34'),
(138, 2, 8, 2, 29, 58, '2020-07-03 08:19:47'),
(139, 2, 8, 1, 30, 65, '2020-07-03 08:19:56'),
(140, 2, 29, 10, 2, 4, '2020-07-03 08:20:33'),
(141, 2, 29, 10, 3, 4, '2020-07-03 08:20:43'),
(142, 2, 29, 10, 4, 4, '2020-07-03 08:20:59'),
(143, 2, 29, 9, 6, 10, '2020-07-03 08:21:12'),
(144, 2, 23, 10, 1, 4, '2020-07-03 08:22:54'),
(145, 2, 23, 9, 5, 10, '2020-07-03 08:23:05'),
(146, 2, 23, 8, 12, 16, '2020-07-03 08:23:18'),
(147, 2, 23, 7, 16, 23, '2020-07-03 08:23:29'),
(148, 2, 23, 10, 1, 6, '2020-07-03 08:38:23'),
(149, 2, 23, 10, 2, 6, '2020-07-03 08:38:32'),
(150, 2, 23, 10, 3, 6, '2020-07-03 08:38:40'),
(151, 2, 23, 10, 4, 6, '2020-07-03 08:38:49'),
(152, 2, 23, 9, 5, 12, '2020-07-03 08:39:01'),
(153, 2, 23, 9, 6, 12, '2020-07-03 08:39:09'),
(154, 2, 23, 9, 7, 12, '2020-07-03 08:39:16'),
(155, 2, 23, 9, 8, 12, '2020-07-03 08:39:22'),
(156, 2, 17, 9, 7, 10, '2020-07-03 08:41:02'),
(157, 2, 17, 9, 8, 10, '2020-07-03 08:41:10'),
(158, 2, 17, 8, 10, 16, '2020-07-03 08:41:32'),
(159, 2, 17, 8, 11, 16, '2020-07-03 08:41:46'),
(160, 2, 17, 7, 14, 23, '2020-07-03 08:41:56'),
(161, 2, 17, 6, 19, 30, '2020-07-03 08:42:08'),
(162, 2, 18, 8, 9, 16, '2020-07-03 08:42:43'),
(163, 2, 18, 7, 13, 23, '2020-07-03 08:42:58'),
(164, 2, 18, 7, 15, 23, '2020-07-03 08:43:32'),
(165, 2, 18, 6, 17, 30, '2020-07-03 08:43:44'),
(166, 2, 18, 6, 18, 30, '2020-07-03 08:43:52'),
(167, 2, 18, 5, 20, 40, '2020-07-03 08:44:25'),
(168, 2, 18, 5, 21, 40, '2020-07-03 08:44:31'),
(169, 2, 18, 5, 22, 40, '2020-07-03 08:44:39'),
(170, 2, 18, 4, 23, 47, '2020-07-03 08:44:54'),
(171, 2, 18, 4, 24, 47, '2020-07-03 08:45:02'),
(172, 2, 18, 4, 25, 47, '2020-07-03 08:45:10'),
(173, 2, 18, 3, 26, 55, '2020-07-03 08:45:20'),
(174, 2, 18, 3, 27, 55, '2020-07-03 08:45:37'),
(175, 2, 7, 5, 20, 37, '2020-07-03 08:46:07'),
(176, 2, 7, 5, 22, 37, '2020-07-03 08:46:15'),
(177, 2, 7, 4, 23, 44, '2020-07-03 08:46:27'),
(178, 2, 7, 3, 27, 51, '2020-07-03 08:46:38'),
(179, 2, 7, 2, 29, 59, '2020-07-03 08:46:46'),
(180, 2, 7, 1, 31, 66, '2020-07-03 08:46:54'),
(181, 2, 6, 5, 21, 37, '2020-07-03 08:47:42'),
(182, 2, 6, 4, 24, 44, '2020-07-03 08:47:56'),
(183, 2, 6, 4, 25, 44, '2020-07-03 08:48:18'),
(184, 2, 6, 3, 26, 51, '2020-07-03 08:48:47'),
(185, 2, 6, 2, 28, 59, '2020-07-03 08:48:56'),
(186, 2, 6, 1, 30, 66, '2020-07-03 08:49:05'),
(187, 2, 24, 10, 3, 5, '2020-07-03 08:49:46'),
(188, 2, 24, 10, 4, 5, '2020-07-03 08:50:01'),
(189, 2, 24, 9, 7, 11, '2020-07-03 08:50:10'),
(190, 2, 25, 9, 6, 11, '2020-07-03 08:50:53'),
(191, 2, 25, 8, 10, 17, '2020-07-03 08:51:21'),
(192, 2, 25, 8, 11, 17, '2020-07-03 08:51:42'),
(193, 2, 25, 8, 12, 17, '2020-07-03 08:52:04'),
(194, 2, 25, 8, 10, 18, '2020-07-03 09:11:05'),
(195, 2, 25, 8, 11, 18, '2020-07-03 09:11:14'),
(196, 2, 25, 8, 12, 18, '2020-07-03 09:11:26'),
(197, 2, 16, 7, 13, 24, '2020-07-03 09:12:19'),
(198, 2, 16, 7, 14, 24, '2020-07-03 09:12:35'),
(199, 2, 16, 7, 15, 24, '2020-07-03 09:12:56'),
(200, 2, 16, 7, 16, 24, '2020-07-03 09:13:09'),
(201, 2, 16, 6, 17, 31, '2020-07-03 09:13:24'),
(202, 2, 16, 6, 19, 31, '2020-07-03 09:13:34'),
(203, 2, 16, 6, 18, 32, '2020-07-03 09:13:46'),
(204, 2, 12, 6, 18, 31, '2020-07-03 09:14:24'),
(205, 2, 12, 5, 20, 38, '2020-07-03 09:14:49'),
(206, 2, 12, 5, 21, 38, '2020-07-03 09:15:12'),
(207, 2, 12, 5, 22, 38, '2020-07-03 09:15:38'),
(208, 2, 12, 4, 24, 45, '2020-07-03 09:16:25'),
(209, 2, 12, 3, 26, 53, '2020-07-03 09:16:37'),
(210, 2, 12, 2, 29, 61, '2020-07-03 09:16:50'),
(211, 2, 3, 3, 26, 52, '2020-07-03 09:18:21'),
(212, 2, 3, 3, 27, 52, '2020-07-03 09:18:30'),
(213, 2, 3, 2, 28, 60, '2020-07-03 09:18:40'),
(214, 2, 3, 2, 29, 60, '2020-07-03 09:18:47'),
(215, 2, 3, 1, 30, 67, '2020-07-03 09:18:57'),
(216, 2, 3, 1, 31, 67, '2020-07-03 09:19:05'),
(217, 2, 10, 4, 23, 45, '2020-07-03 09:20:05'),
(218, 2, 10, 4, 25, 45, '2020-07-03 09:20:14'),
(219, 2, 10, 3, 27, 53, '2020-07-03 09:20:39'),
(220, 2, 10, 2, 28, 61, '2020-07-03 09:20:59'),
(221, 2, 10, 1, 30, 68, '2020-07-03 09:21:08'),
(222, 2, 10, 1, 31, 68, '2020-07-03 09:21:16'),
(223, 2, 13, 6, 17, 32, '2020-07-03 09:22:09'),
(224, 2, 13, 6, 19, 32, '2020-07-03 09:22:17'),
(225, 2, 13, 5, 20, 39, '2020-07-03 09:22:26'),
(226, 2, 13, 5, 21, 39, '2020-07-03 09:22:34'),
(227, 2, 13, 5, 22, 39, '2020-07-03 09:22:41'),
(228, 2, 13, 4, 23, 46, '2020-07-03 09:22:51'),
(229, 2, 13, 4, 24, 46, '2020-07-03 09:22:58'),
(230, 2, 11, 4, 25, 46, '2020-07-03 09:23:26'),
(231, 2, 11, 3, 26, 54, '2020-07-03 09:23:37'),
(232, 2, 11, 3, 27, 54, '2020-07-03 09:23:47'),
(233, 2, 11, 2, 28, 62, '2020-07-03 09:24:00'),
(234, 2, 11, 2, 29, 62, '2020-07-03 09:24:08'),
(235, 2, 11, 1, 30, 69, '2020-07-03 09:24:20'),
(236, 2, 11, 1, 31, 69, '2020-07-03 09:24:27'),
(237, 2, 32, 10, 1, 5, '2020-07-03 09:25:17'),
(238, 2, 32, 9, 5, 11, '2020-07-03 09:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uuid` varchar(48) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `mobile` varchar(48) NOT NULL,
  `role` varchar(48) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL DEFAULT 0,
  `section_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `mobile`, `role`, `branch_id`, `class_id`, `section_id`, `image`, `created_dt`, `modified_dt`) VALUES
(1, '1a036ab9-f9de-4098-82e5-ec97dea9374a', 'Pavan Kumar', 'en.pavankumar@gmail.com', '8520872771', 'SUPER_ADMIN', 0, 0, 0, NULL, '2020-07-03 05:39:54', '2020-07-03 05:39:54'),
(2, '406f53ca-6181-4de2-b2d1-76c21a0707e6', 'Satish Kumar', '', '7981788603', 'ADMIN', 2, 0, 0, '', '2020-07-03 06:08:54', '2020-07-03 06:08:54'),
(3, '68b16526-5215-481d-a25c-f5baf3489c6b', 'SATISH KUMAR', '', '9502921208', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:25:48', '2020-07-03 06:28:28'),
(4, 'a1084752-a3de-45c1-aa05-88c7877fc2d6', 'HEMALATHA', '', '7989713586', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:26:08', '2020-07-03 06:28:16'),
(5, 'a966247d-91bf-4f3f-8f6d-ed65f3336cc7', 'SADANA', '', '7801085365', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:26:30', '2020-07-03 06:28:04'),
(6, '0456a8fa-9f19-4563-9ec9-44742055399b', 'NARENDER', '', '9177803917', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:27:22', '2020-07-03 06:28:46'),
(7, '88c9e561-d0f3-4e02-b8e5-5e14c135378d', 'SUNIL', '', '9948894589', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:27:40', '2020-07-03 06:28:57'),
(8, 'aeb907e3-d0d5-4e2b-add9-d1a8e52567da', 'CHITRA', '', '8106813163', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:29:47', '2020-07-03 06:29:47'),
(9, '5653ba54-475a-4f57-866b-6969bf8fefc2', 'NIKITHA AGARWAL', '', '9701726743', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:30:06', '2020-07-03 06:30:06'),
(10, '27f37df2-ff5f-484d-ac17-467b5b736d86', 'SHIVANI', '', '9550688007', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:30:20', '2020-07-03 06:30:20'),
(11, '64c62d65-3b06-425c-9139-2bb7e002b65e', 'NAGA PRAKASH', '', '7093554051', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:30:35', '2020-07-03 06:30:35'),
(12, '1ec050cf-3357-4f77-8e1c-40962b8c7fff', 'PRAMOD', '', '9550241380', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:30:47', '2020-07-03 06:30:47'),
(13, 'f6faa1c9-6792-47a0-8d21-1ae931decc32', 'N.LAVANYA', '', '9676349500', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:31:06', '2020-07-03 06:31:06'),
(14, '839bd6e8-90a2-44a0-aeb2-e655afb18ff1', 'B. SWAPNA', '', '9849004666', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:31:27', '2020-07-03 06:31:27'),
(15, '365bf12d-8b19-4a9b-b399-cf9789fa6bd2', 'MANJULA', '', '9550532423', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:31:46', '2020-07-03 06:31:46'),
(16, 'bc24cec6-31b8-4e76-b9d5-52c261644715', 'DURGA BHAVANI', '', '8309594308', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:32:00', '2020-07-03 06:32:00'),
(17, '467f6b9e-311f-43f7-8745-accf5ea98e72', 'SWATHI', '', '8919742430', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:32:18', '2020-07-03 06:32:18'),
(18, '8cae61f9-8c9d-46b7-97a0-bb673b917132', 'M.SWAPNA', '', '7013511908', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:32:31', '2020-07-03 06:32:31'),
(19, '1e8945bc-2362-4276-bd0f-41cc39c07b88', 'SAI SREE', '', '7095378461', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:32:47', '2020-07-03 06:32:47'),
(20, '0ba1d612-d09b-46d9-acc8-b850c755c0f2', 'UMA SHARMA', '', '8121300818', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:34:03', '2020-07-03 06:34:03'),
(21, '899a0665-7bb7-43aa-a493-345869e9332b', 'DEEPTHI', '', '8143844809', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:34:16', '2020-07-03 06:34:16'),
(22, 'ec4bce20-b3f7-491f-b1ba-553c80ae3c8a', 'JYOTHI', '', '9618629991', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:34:40', '2020-07-03 06:34:40'),
(23, '283f82f9-4174-434d-adee-6e535b02d00c', 'NIKITHA', '', '6300942857', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:34:52', '2020-07-03 06:34:52'),
(24, '4663f2fb-9609-464c-8443-9e5721c17f90', 'REKHA', '', '9985130910', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:35:03', '2020-07-03 06:35:03'),
(25, 'af1fba54-f4a5-4fa2-bc18-4305f590208a', 'MEENA', '', '9701569839', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:35:16', '2020-07-03 06:35:16'),
(26, 'e71543de-7ef8-40af-a597-1ae904dfee74', 'VASUNDARA', '', '7569836086', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:35:36', '2020-07-03 06:35:36'),
(27, '4bc763da-6c70-4f22-88f2-e584c5f831bc', 'SUSHEELA BHAVANI', '', '9182540946', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:36:00', '2020-07-03 06:36:00'),
(28, 'b62338da-c471-49f4-92fd-1e5251284c18', 'LAXMI', '', '9676777302', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:36:33', '2020-07-03 06:36:33'),
(29, '97384190-35d7-443a-9ce2-9fda6fd571f4', 'SAGARIKA', '', '9704643021', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:36:51', '2020-07-03 06:36:51'),
(30, '29a528be-d36e-48b5-b030-dea6a991c700', 'ANURADHA', '', '7095354652', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:37:11', '2020-07-03 06:37:11'),
(31, '916557df-3cce-4879-aad9-8eff34969df5', 'M.LAVANYA', '', '6304707989', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:40:33', '2020-07-03 08:07:32'),
(32, 'af63eeaf-36be-4b12-a55a-81726810d67c', 'MS.KIRANMAYI', '', '9032767841', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:40:52', '2020-07-03 06:40:52'),
(33, 'a66d4286-beeb-4b3c-9d6f-8c366e73abcb', 'MS.SHYAMALA', '', '9052163727', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:41:12', '2020-07-03 06:41:12'),
(34, '47113c3c-faf3-4b42-b389-11121f4a5228', 'MS.LAXMI PRIYA', '', '9542629709', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:41:34', '2020-07-03 06:41:34'),
(35, '921308ff-2444-4adc-9b3f-1e7a6a6d2ec8', 'MS.MANASA', '', '8639541953', 'TEACHERS', 2, 0, 0, '', '2020-07-03 06:41:53', '2020-07-03 06:41:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_on` (`homework_on`);

--
-- Indexes for table `homework_sections`
--
ALTER TABLE `homework_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_id` (`homework_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `homework_on` (`homework_on`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_on` (`post_on`),
  ADD KEY `uuid` (`uuid`);

--
-- Indexes for table `post_sections`
--
ALTER TABLE `post_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `post_on` (`post_on`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_branch` (`branch_id`),
  ADD KEY `sectons_class` (`class_id`);

--
-- Indexes for table `student_homeworks`
--
ALTER TABLE `student_homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `homework_id` (`homework_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachermappings`
--
ALTER TABLE `teachermappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mappings_branch` (`branch_id`),
  ADD KEY `mappings_teacher_id` (`teacher_id`),
  ADD KEY `mappings_class_id` (`class_id`),
  ADD KEY `mappings_section_id` (`section_id`),
  ADD KEY `mappings_subject_id` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_mobile` (`mobile`),
  ADD KEY `role` (`role`),
  ADD KEY `branch` (`branch_id`),
  ADD KEY `users_class_id` (`class_id`),
  ADD KEY `users_section_id` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework_sections`
--
ALTER TABLE `homework_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_sections`
--
ALTER TABLE `post_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_homeworks`
--
ALTER TABLE `student_homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `teachermappings`
--
ALTER TABLE `teachermappings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
