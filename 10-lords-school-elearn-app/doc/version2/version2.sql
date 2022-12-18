-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 08:23 AM
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
(2, '406f53ca-6181-4de2-b2d1-76c21a0707e6', 'Satish Kumar', '', '7981788603', 'ADMIN', 2, 0, 0, '', '2020-07-03 06:08:54', '2020-07-03 06:08:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
