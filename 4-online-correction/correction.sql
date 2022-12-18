-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 10:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `correction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_pass`) VALUES
('en.pavankumar@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `fac_email` varchar(255) NOT NULL,
  `stu_rollno` varchar(255) NOT NULL,
  `stu_subject` varchar(255) NOT NULL,
  `stu_midtype` varchar(255) NOT NULL,
  `q1_a` varchar(255) NOT NULL,
  `q1_b` varchar(255) NOT NULL,
  `q1_c` varchar(255) NOT NULL,
  `q1_d` varchar(255) NOT NULL,
  `q2_a` varchar(222) NOT NULL,
  `q2_b` varchar(222) NOT NULL,
  `q2_c` varchar(222) NOT NULL,
  `q2_d` varchar(222) NOT NULL,
  `q3_a` varchar(222) NOT NULL,
  `q3_b` varchar(222) NOT NULL,
  `q3_c` varchar(222) NOT NULL,
  `q3_d` varchar(222) NOT NULL,
  `q4_a` varchar(222) NOT NULL,
  `q4_b` varchar(222) NOT NULL,
  `q4_c` varchar(222) NOT NULL,
  `q4_d` varchar(222) NOT NULL,
  `sub_tot_marks` varchar(255) NOT NULL,
  `obj_tot_marks` varchar(255) NOT NULL,
  `stu_year` varchar(255) NOT NULL,
  `stu_department` varchar(255) NOT NULL,
  `stu_section` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `fac_email`, `stu_rollno`, `stu_subject`, `stu_midtype`, `q1_a`, `q1_b`, `q1_c`, `q1_d`, `q2_a`, `q2_b`, `q2_c`, `q2_d`, `q3_a`, `q3_b`, `q3_c`, `q3_d`, `q4_a`, `q4_b`, `q4_c`, `q4_d`, `sub_tot_marks`, `obj_tot_marks`, `stu_year`, `stu_department`, `stu_section`, `status`) VALUES
(46, 'avinash.seekoli@gmail.com', '14R91A0516', 'fhjghjgh', 'mid_1', '0', '0', '0', '0', '2', '1', '1', '0', '2', '1', '0', '0', '0', '0', '0', '0', '7', '10', '3-1', 'CSE', 'A', 'verified'),
(47, 'en.pavankumar@gmail.com', '14R91A0520', 'fhjghjgh', 'mid_1', '0', '0', '0', '0', '2', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '10', '7', '3-1', 'CSE', 'A', 'verified'),
(48, 'en.pavankumar@gmail.com', '14R91A0520', 'fhjghjgh', 'mid_2', '0', '0', '0', '0', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '0', '0', '4', '9', '3-1', 'CSE', 'A', 'unverified');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `scrutiniser_fac_email` varchar(222) NOT NULL,
  `marks_fac_email` varchar(222) NOT NULL,
  `stu_rollno` varchar(222) NOT NULL,
  `stu_subject` varchar(222) NOT NULL,
  `stu_midtype` varchar(222) NOT NULL,
  `message` varchar(222) NOT NULL,
  `date` date NOT NULL,
  `view` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `scrutiniser_fac_email`, `marks_fac_email`, `stu_rollno`, `stu_subject`, `stu_midtype`, `message`, `date`, `view`) VALUES
(5, 'en.pavankumar@gmail.com', 'en.pavankumar@gmail.com', '14R91A0516', 'fhjghjgh', 'mid_1', 'tityiyuioyu', '2017-06-19', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`password`) VALUES
('TKRCOLLEGE');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fac_id` int(11) NOT NULL,
  `fac_name` varchar(255) NOT NULL,
  `fac_email` varchar(255) NOT NULL,
  `fac_pass` varchar(255) NOT NULL,
  `fac_department` varchar(255) NOT NULL,
  `fac_contact` varchar(255) NOT NULL,
  `fac_image` varchar(255) NOT NULL,
  `fac_gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fac_id`, `fac_name`, `fac_email`, `fac_pass`, `fac_department`, `fac_contact`, `fac_image`, `fac_gender`) VALUES
(1, 'pavan Kumar', 'en.pavankumar@gmail.com', '12345678', 'CSE', '8520872771', '3.jpg', 'male'),
(5, 'Avinash', 'avinash.seekoli@gmail.com ', 'SVSCMAHESHBABU', 'CSE', '9032230989', '3.jpg', 'male'),
(6, 'nxdgvhdfg', 'abc@gmail.com ', '12345678', 'CSE', '12344444', 'default.jpg', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `scrutiniser`
--

CREATE TABLE `scrutiniser` (
  `id` int(11) NOT NULL,
  `fac_email` varchar(222) NOT NULL,
  `stu_rollno` varchar(222) NOT NULL,
  `stu_subject` varchar(222) NOT NULL,
  `stu_midtype` varchar(222) NOT NULL,
  `q1_a` varchar(222) NOT NULL,
  `q1_b` varchar(222) NOT NULL,
  `q1_c` varchar(222) NOT NULL,
  `q1_d` varchar(222) NOT NULL,
  `q2_a` varchar(222) NOT NULL,
  `q2_b` varchar(222) NOT NULL,
  `q2_c` varchar(222) NOT NULL,
  `q2_d` varchar(222) NOT NULL,
  `q3_a` varchar(222) NOT NULL,
  `q3_b` varchar(222) NOT NULL,
  `q3_c` varchar(222) NOT NULL,
  `q3_d` varchar(222) NOT NULL,
  `q4_a` varchar(222) NOT NULL,
  `q4_b` varchar(222) NOT NULL,
  `q4_c` varchar(222) NOT NULL,
  `q4_d` varchar(222) NOT NULL,
  `sub_tot_marks` varchar(222) NOT NULL,
  `obj_tot_marks` varchar(222) NOT NULL,
  `stu_year` varchar(222) NOT NULL,
  `stu_department` varchar(222) NOT NULL,
  `stu_section` varchar(222) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scrutiniser`
--

INSERT INTO `scrutiniser` (`id`, `fac_email`, `stu_rollno`, `stu_subject`, `stu_midtype`, `q1_a`, `q1_b`, `q1_c`, `q1_d`, `q2_a`, `q2_b`, `q2_c`, `q2_d`, `q3_a`, `q3_b`, `q3_c`, `q3_d`, `q4_a`, `q4_b`, `q4_c`, `q4_d`, `sub_tot_marks`, `obj_tot_marks`, `stu_year`, `stu_department`, `stu_section`, `status`) VALUES
(49, 'en.pavankumar@gmail.com', '14R91A0516', 'fhjghjgh', 'mid_1', '0', '0', '0', '0', '0', '0', '0', '0', '4', '0', '0', '0', '4', '0', '0', '0', '8', '10', '3-1', 'CSE', 'A', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `stu_rollno` varchar(255) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_contact` varchar(255) NOT NULL,
  `stu_year` varchar(255) NOT NULL,
  `stu_department` varchar(255) NOT NULL,
  `stu_section` varchar(255) NOT NULL,
  `stu_image` varchar(255) NOT NULL,
  `stu_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stu_rollno`, `stu_name`, `stu_email`, `stu_contact`, `stu_year`, `stu_department`, `stu_section`, `stu_image`, `stu_pass`) VALUES
(1, '14R91A0516', 'Endurthi Pavan Kumar', 'en.pavankumar@gmail.com', '8520872771', '3-1', 'CSE', 'A', 'exampad.png', '12345678'),
(2, '14R91A0520', 'H.bharath', 'bharath.hari444@gmail.com', '9848859049', '3-1', 'CSE', 'A', '', 'funny'),
(3, '15R91A0517', 'Manisha', 'manu@gmail.com', '12345678', '3-2', 'ECE', 'B', '', 'funny'),
(4, '14R91A0524', 'Katta Maheshwari', 'katta@gmail.com', '8520872771', '4-1', 'CSE', 'A', '1 (2).jpg', 'funny'),
(5, 'dhdghgf', 'gfhjgfj', 'dhgf@gmail.com', 'gfhgf', '2017', 'CSE', 'A', '3.jpg', 'frhgd');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `stu_year` varchar(255) NOT NULL,
  `stu_department` varchar(255) NOT NULL,
  `stu_subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`stu_year`, `stu_department`, `stu_subjects`) VALUES
('4-1', 'CSE', 'Rams'),
('4-1', 'CSE', 'SANDy'),
('3-1', 'ECE', 'sai krishna'),
('3-1', 'ECE', 'Chanti'),
('1-1', 'CSE', 'physics'),
('2-1', 'CSE', 'dfhdgtjhjt'),
('2-2', 'CSE', 'dfhfgtjh'),
('3-1', 'CSE', 'fhjghjgh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `scrutiniser`
--
ALTER TABLE `scrutiniser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `scrutiniser`
--
ALTER TABLE `scrutiniser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
