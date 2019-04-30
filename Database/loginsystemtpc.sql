-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 07:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystemtpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydb`
--

CREATE TABLE `companydb` (
  `company_ID` int(9) UNSIGNED NOT NULL,
  `company_name` tinytext NOT NULL,
  `company_address` tinytext,
  `date_of_placement` date DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `place_of_placement` tinytext,
  `date_of_joining` date DEFAULT NULL,
  `batch` tinytext,
  `website` tinytext,
  `contact_person` tinytext,
  `email_1` tinytext,
  `contact_no_1` bigint(10) DEFAULT NULL,
  `email_2` tinytext,
  `contact_no_2` bigint(10) DEFAULT NULL,
  `cse` tinyint(1) DEFAULT NULL,
  `it` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `ID` int(5) UNSIGNED NOT NULL,
  `session` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentdb`
--

CREATE TABLE `studentdb` (
  `user_ID` int(9) UNSIGNED NOT NULL,
  `reg_no` int(8) UNSIGNED DEFAULT NULL,
  `roll_no` bigint(11) UNSIGNED DEFAULT NULL,
  `student_name` tinytext,
  `father_name` tinytext,
  `branch` tinytext,
  `shift` tinytext,
  `email` tinytext,
  `contact_no` bigint(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` tinytext,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdb`
--

INSERT INTO `studentdb` (`user_ID`, `reg_no`, `roll_no`, `student_name`, `father_name`, `branch`, `shift`, `email`, `contact_no`, `dob`, `company`, `address`) VALUES
(6, 75643212, 16014050023, 'SHIVANI BHATT', 'HARIRSH BHATT', 'IT', 'SHIFT_1', 'shivanibbhatt204@gmail.com', 9876543210, '1996-02-21', 'GOOGLE INC', 'SRINAGAR, PAURI GARHWAL'),
(12, 12345678, NULL, NULL, NULL, 'IT', 'SHIFT_1', NULL, NULL, NULL, 'APPLE INC', NULL),
(14, 87654321, NULL, NULL, NULL, 'IT', 'SHIFT_1', NULL, NULL, NULL, NULL, NULL),
(16, 21212121, NULL, NULL, NULL, 'IT', 'OTHER', NULL, NULL, NULL, NULL, NULL),
(17, 43534343, NULL, 'VIVEK KOHLI', NULL, 'CSE', 'SHIFT_2', NULL, NULL, NULL, 'GOOGLE INC', NULL),
(18, 43534342, NULL, 'VIVEK KOHLI', NULL, 'CSE', 'SHIFT_2', NULL, NULL, NULL, 'GOOGLE INC', NULL),
(19, 16014025, 16014050029, NULL, NULL, 'IT', 'SHIFT_1', NULL, NULL, NULL, 'AISAN FIEM AUTOMOTIVES', NULL),
(20, 23343321, NULL, NULL, NULL, 'CSE', 'SHIFT_1', NULL, NULL, NULL, 'GOOGLE INC', NULL),
(21, 16003776, 16014050028, 'VIVEK KOHLI', 'JEET SINGH', 'CSE', 'SHIFT_1', 'vivekkohli935@gmail.com', 8755283315, '1999-12-21', 'GOOGLE INC', 'Srinagar, Pauri Garhwal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `pwd`) VALUES
(1, 'test', 'test@tpc.com', '$2y$10$s0EGTkgHRASEM48xs5ySzuAUm9XS1Lp76UqLIyD/qWsAUXPHfrg86');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydb`
--
ALTER TABLE `companydb`
  ADD PRIMARY KEY (`company_ID`),
  ADD UNIQUE KEY `company_name` (`company_name`(255)),
  ADD UNIQUE KEY `contact_no_1` (`contact_no_1`),
  ADD UNIQUE KEY `contact_no_2` (`contact_no_2`),
  ADD UNIQUE KEY `email_1` (`email_1`(255)),
  ADD UNIQUE KEY `email_2` (`email_2`(255));

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `session` (`session`);

--
-- Indexes for table `studentdb`
--
ALTER TABLE `studentdb`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companydb`
--
ALTER TABLE `companydb`
  MODIFY `company_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `ID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentdb`
--
ALTER TABLE `studentdb`
  MODIFY `user_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
