-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 07:40 PM
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
-- Database: `registration`
--
-- Create the database
CREATE DATABASE IF NOT EXISTS registration;
USE registration;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$tlNHb2ugNaPeSeexQ4FcpuditWP.Nlzta73rkX.3wmOom6htRGsCK');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `cert10` varchar(255) NOT NULL,
  `cert12` varchar(255) NOT NULL,
  `aadhar` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `middle_name`, `surname`, `birthday`, `address`, `email`, `course`, `year`, `sem`, `gender`, `photo`, `cert10`, `cert12`, `aadhar`, `signature`, `reg_date`, `user_id`, `admin_id`) VALUES
(1, 'Amit', 'Rajendra', 'Sharma', '2005-02-15', 'XYZ Nagar', 'amit.sharma@gmail.com', 'BCA', '1st year', 'I', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:00:20', 1, NULL),
(2, 'Sneha', 'Prakash', 'Joshi', '2004-08-22', 'ABC Colony', 'sneha.joshi@gmail.com', 'BSC.CS', '2nd year', 'III', 'Female', '../student_images/student4.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:01:10', NULL, 1),
(3, 'Vikas', 'Suresh', 'Patil', '2006-06-10', 'LMN Street', 'vikas.patil@gmail.com', 'BCA', '3rd year', 'V', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:02:05', NULL, 1),
(4, 'Pooja', 'Mahesh', 'Deshmukh', '2005-11-05', 'JK Road', 'pooja.deshmukh@gmail.com', 'BSC', '2nd year', 'IV', 'Female', '../student_images/student7.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:03:45', NULL, 1),
(5, 'Rohan', 'Ganesh', 'More', '2004-09-18', 'PQR Layout', 'rohan.more@gmail.com', 'BCA', '1st year', 'II', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:04:30', 1, NULL),
(6, 'Neha', 'Vishal', 'Kulkarni', '2005-04-23', 'MNO Complex', 'neha.kulkarni@gmail.com', 'BCA', '3rd year', 'VI', 'Female', '../student_images/student4.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:05:10', NULL, 1),
(7, 'Aakash', 'Satish', 'Gavade', '2006-01-30', 'TUV Nagar', 'aakash.gavade@gmail.com', 'BCA', '2nd year', 'III', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:06:00', 1, NULL),
(8, 'Priya', 'Sunil', 'Jadhav', '2004-07-25', 'XYZ Nagar', 'priya.jadhav@gmail.com', 'BSC', '1st year', 'I', 'Female', '../student_images/student7.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:07:10', NULL, 1),
(9, 'Sagar', 'Ramesh', 'Chavan', '2005-03-12', 'ABC Colony', 'sagar.chavan@gmail.com', 'BCA', '2nd year', 'IV', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:08:25', 1, NULL),
(10, 'Kavita', 'Dinesh', 'Pawar', '2006-05-28', 'LMN Street', 'kavita.pawar@gmail.com', 'BSC', '3rd year', 'V', 'Female', '../student_images/student4.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:09:50', NULL, 1),
(11, 'Ajay', 'Anil', 'Kadam', '2004-02-19', 'JK Road', 'ajay.kadam@gmail.com', 'BCA', '1st year', 'II', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:10:30', 1, NULL),
(12, 'Swati', 'Mohan', 'Shinde', '2005-09-07', 'PQR Layout', 'swati.shinde@gmail.com', 'BSC', '2nd year', 'IV', 'Female', '../student_images/student7.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:11:15', NULL, 1),
(13, 'Nikhil', 'Suraj', 'Bhosale', '2006-12-21', 'MNO Complex', 'nikhil.bhosale@gmail.com', 'BCA', '3rd year', 'VI', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:12:05', NULL, 1),
(14, 'Rutuja', 'Raj', 'Patil', '2005-08-14', 'TUV Nagar', 'rutuja.patil@gmail.com', 'BSC.CS', '1st year', 'I', 'Female', '../student_images/student4.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:13:10', 1, NULL),
(15, 'Tejas', 'Mahadev', 'Gole', '2004-03-09', 'XYZ Nagar', 'tejas.gole@gmail.com', 'BCA', '2nd year', 'III', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:14:25', NULL, 1),
(16, 'Anjali', 'Sanjay', 'Desai', '2005-10-26', 'ABC Colony', 'anjali.desai@gmail.com', 'BSC', '3rd year', 'V', 'Female', '../student_images/student7.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:15:40', 1, NULL),
(17, 'Vighnesh', 'Mahadev', 'Kammar', '2006-07-13', 'LMN Street', 'vighnesh@gmail.com', 'BSC', '1st year', 'II', 'Male', '../student_images/student3.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:16:55', NULL, 1),
(18, 'Komal', 'Umesh', 'Jain', '2004-05-13', 'JK Road', 'komal.jain@gmail.com', 'BSC.CS', '2nd year', 'IV', 'Female', '../student_images/student4.jpg', '../student_images/student5.jpg', '../student_images/student6.jpg', '../student_images/student6.jpg', '../student_images/student7.jpg', '2025-03-19 11:18:05', 1, NULL),
(19, 'sonal', 'ashok', 'berde', '2005-03-12', 'koraj', 'sonya@gmail.com', 'BCA', '2nd year', 'IV', 'Female', '../student_images/student7.jpg', '../student_images/student3.jpg', '../student_images/student7.jpg', '../student_images/student8.jpg', '../student_images/student7.jpg', '2025-03-20 18:36:48', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`) VALUES
(1, 'user', 'user', 'user@gmail.com', 'user', '$2y$10$fxUOpOoG/CoTgAPJm3b4ZePdNJbYgDrvh1zkO5gETQ88FmYtNm45u');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
