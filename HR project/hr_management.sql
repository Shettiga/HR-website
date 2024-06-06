-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 08:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `sl.no` int(2) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`sl.no`, `username`, `password`, `email`) VALUES
(1, 'anagha', 'anagha123', 'anagha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `atten_date` varchar(64) DEFAULT NULL,
  `signin_time` time DEFAULT NULL,
  `signout_time` time DEFAULT NULL,
  `working_hour` varchar(64) DEFAULT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `atten_date`, `signin_time`, `signout_time`, `working_hour`, `place`) VALUES
(1012, '6969', '2021-06-04', '10:00:00', '03:04:00', '06 h 56 m', 'field'),
(1013, '6969', '2021-06-06', '09:00:00', '02:00:00', '07 h 0 m', 'office'),
(1014, '123456', '2021-12-01', '09:00:00', '04:30:00', '04 h 30 m', 'office'),
(1015, '123444', '2021-12-29', '09:00:00', '03:00:00', '06 h 0 m', 'office'),
(1016, '3008', '2021-12-28', '10:00:00', '03:23:00', '06 h 37 m', 'office'),
(1017, '6600', '2022-01-02', '10:00:00', '04:00:00', '06 h 0 m', 'office'),
(1018, '8829', '2022-01-02', '10:00:00', '04:05:00', '05 h 55 m', 'office'),
(1019, '6600', '2021-11-30', '10:00:00', '05:00:00', '05 h 0 m', 'office'),
(1020, '', '', '00:00:00', '00:00:00', '00:00:00', ''),
(1021, '', '', '00:00:00', '00:00:00', '00:00:00', ''),
(1022, '1002', '2024-06-03', '12:21:00', '18:21:00', '06:00:00', 'office'),
(1023, '1003', '2024-06-03', '13:32:00', '18:32:00', '05:00:00', 'field'),
(1024, '1003', '2024-06-03', '13:32:00', '18:32:00', '05:00:00', 'field'),
(1025, '2001', '2024-06-05', '11:59:00', '17:59:00', '06:00:00', 'office'),
(1026, '2011jd', '2024-06-05', '10:39:00', '23:41:00', '13:02:00', 'office'),
(1027, '2011jd', '2024-06-05', '01:54:00', '14:54:00', '13 h 00 m 00 s', 'office');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(64) NOT NULL,
  `em_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_name`, `em_id`) VALUES
(2, 'Administration', ''),
(3, 'Finance, HR, & Admininstration', ''),
(4, 'Research', ''),
(5, 'Information Technology', ''),
(6, 'Support', ''),
(7, 'Network Engineering', ''),
(8, 'Sales and Marketing', ''),
(9, 'Helpdesk', ''),
(10, 'Project Management', ''),
(11, '1001', ' 6');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `em_email` varchar(64) DEFAULT NULL,
  `em_id` varchar(20) NOT NULL,
  `em_password` varchar(512) NOT NULL,
  `em_gender` varchar(20) DEFAULT NULL,
  `em_phone` varchar(64) DEFAULT NULL,
  `em_birthday` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `em_email`, `em_id`, `em_password`, `em_gender`, `em_phone`, `em_birthday`) VALUES
(58, 'Deon  Pinto', 'pintodeon860@gmail.com', '2011jd', '123', 'Male', '8217886972', '2024-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` int(11) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `typeid` int(14) NOT NULL,
  `leave_type` varchar(64) DEFAULT NULL,
  `start_date` varchar(64) DEFAULT NULL,
  `end_date` varchar(64) DEFAULT NULL,
  `leave_duration` varchar(128) DEFAULT NULL,
  `apply_date` varchar(64) DEFAULT NULL,
  `reason` varchar(1024) DEFAULT NULL,
  `leave_status` varchar(20) NOT NULL DEFAULT 'Not Approve'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `em_id`, `typeid`, `leave_type`, `start_date`, `end_date`, `leave_duration`, `apply_date`, `reason`, `leave_status`) VALUES
(1, '103', 0, NULL, '2024-06-04', '2024-06-06', '2', '2024-06-04', 'fever', 'APPROVED'),
(2, '1031', 0, NULL, '2024-06-06', '2024-06-08', '2', '2024-06-04', 'fefdw', 'REJECTED'),
(3, '1031', 0, NULL, '2024-06-06', '2024-06-08', '2', '2024-06-04', 'fefdw', 'APPROVED'),
(4, '1031', 0, NULL, '2024-06-05', '2024-06-06', '1', '2024-06-04', 'wdd', 'APPROVED'),
(5, '1031', 0, NULL, '2024-06-05', '2024-06-06', '1', '2024-06-04', 'fever', 'REJECTED'),
(6, '101', 0, NULL, '2024-06-14', '2024-06-18', '4', '2024-06-04', 'fever', 'APPROVED'),
(7, '101', 0, NULL, '2024-06-06', '2024-06-07', '1', '2024-06-05', 'fever', 'APPROVED'),
(8, '101', 0, NULL, '2024-06-06', '2024-06-07', '1', '2024-06-05', 'ewewe', 'APPROVED'),
(9, '2011jd', 0, NULL, '2024-06-06', '2024-06-07', '1', '2024-06-05', 'fever', 'APPROVED'),
(10, '2011jd', 0, NULL, '2024-06-07', '2024-06-08', '1', '2024-06-05', 'death', 'REJECTED'),
(11, '2011jd', 0, NULL, '2024-06-08', '2024-06-09', '1', '2024-06-05', 'fefe', 'APPROVED'),
(12, '2011jd', 0, NULL, '2024-06-06', '2024-06-08', '2', '2024-06-05', 'sdad', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(64) DEFAULT NULL,
  `department` varchar(4) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`id`, `emp_id`, `department`, `salary`) VALUES
(1, 'Doe1754', '', 0),
(2, 'Doe1753', '', 0),
(3, 'Soy1332', '', 0),
(4, 'Rob1472', '', 0),
(5, 'Moo1402', '', 0),
(6, 'Smi1266', '', 0),
(7, 'Moo1634', '', 0),
(8, 'Joh1474', '', 0),
(9, 'Tho1044', '', 0),
(10, 'Den1745', '', 0),
(11, 'emp_id', 'depa', 0),
(12, 'anupama shetty', 'IT', 0),
(13, 'anupama shetty', 'IT', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `hr_login`
--

CREATE TABLE `hr_login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr_login`
--

INSERT INTO `hr_login` (`id`, `name`, `dob`, `phone`, `gender`, `password`, `email`) VALUES
(6, 'priya  sharma', '2012-01-12', '01234567897', '', 'abcdef', 'dgfhg@email.com'),
(22, 'shettigar  sudarshan', '0000-00-00', '1234566788', '', 'gu1234', 'gugugugu@12345'),
(23, 'pvmp ANAGHA bha', '1995-02-16', '01234567897', '', 'aabbccdd', 'PVMAFBHGTRBG@GMAIL.COM'),
(24, 'pvp  bhat', '2000-11-14', '0820277929', '', '12345', 'abcdef@gmail.com'),
(26, 'pinto  deon', '2024-05-02', '12345677889', '', '1234567', 'eon860@gmail.com'),
(27, 'anip  nayak', '2024-05-07', '08217886972', '', '123456', 'anipnayaka@gmail.com'),
(28, 'xxxxxxxx  yyyyyyyyyy', '2024-05-16', '8151031656', '', 'abcdef', 'xxxxyyyyyy@gmail.com'),
(29, '  ', '0000-00-00', '', '', '', ''),
(30, 'anupama  shetty', '2024-06-05', '7894561230', '', '123456', 'anupamashetty@gmail.com'),
(33, 'adarsh  salian', '2024-06-06', '8020825463', '', '123456', 'adarsh@gmail.com'),
(34, 'Ram  H', '1999-02-04', '8212657996', '', '123456', 'RamH@gmail.com'),
(36, 'arwin  me', '2024-05-29', '3214569872', '', '12345', 'arwin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `resignation`
--

CREATE TABLE `resignation` (
  `ID` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `joining_date` date NOT NULL,
  `Leaving_date` date NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resignation`
--

INSERT INTO `resignation` (`ID`, `employee_id`, `username`, `password`, `phone`, `joining_date`, `Leaving_date`, `department`) VALUES
(1, 0, 'frr', 'password', 2147483647, '2024-05-01', '0000-00-00', 'network_engineering'),
(2, 0, 'frr', 'password', 2147483647, '2024-05-01', '2024-05-25', 'network_engineering'),
(3, 0, '', 'password', 0, '0000-00-00', '0000-00-00', ''),
(4, 0, '', 'password', 0, '0000-00-00', '0000-00-00', ''),
(5, 0, '', 'password', 0, '0000-00-00', '0000-00-00', ''),
(6, 0, '', 'password', 0, '0000-00-00', '0000-00-00', ''),
(7, 0, '', 'password', 0, '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_login`
--
ALTER TABLE `hr_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `resignation`
--
ALTER TABLE `resignation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `sl.no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hr_login`
--
ALTER TABLE `hr_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `resignation`
--
ALTER TABLE `resignation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
