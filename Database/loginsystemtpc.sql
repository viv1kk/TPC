-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 11:55 PM
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
  `company_name` varchar(200) NOT NULL,
  `company_email` tinytext,
  `company_contact_number` bigint(10) UNSIGNED DEFAULT NULL,
  `cse` tinyint(1) NOT NULL,
  `it` tinyint(1) NOT NULL
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
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `company_contact_number` (`company_contact_number`),
  ADD UNIQUE KEY `company_email` (`company_email`(50));

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
  MODIFY `company_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentdb`
--
ALTER TABLE `studentdb`
  MODIFY `user_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
