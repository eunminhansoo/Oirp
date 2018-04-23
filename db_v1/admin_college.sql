-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 09:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oirp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_college`
--

CREATE TABLE `admin_college` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `PROPOSED_PROGRAM` varchar(100) NOT NULL,
  `COURSE` varchar(500) NOT NULL,
  `COLLEGE` varchar(500) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_college`
--

INSERT INTO `admin_college` (`STUDENT_COUNT`, `STUDENT_ID`, `PROPOSED_PROGRAM`, `COURSE`, `COLLEGE`, `STATUS`) VALUES
(1, '20180422002-in', ' ', 'CS 123', 'Institute of Information and Computing Sciences', 'Qualified'),
(2, '20180422002-in', ' ', 'IT 205', 'Institute of Information and Computing Sciences', 'Approved'),
(3, '20180422002-in', ' ', 'IS 205', 'Alfredo M. Velayo College of Accountancy', 'Approved'),
(4, '20180422002-in', ' ', 'math103', 'Alfredo M. Velayo College of Accountancy', 'Approved'),
(5, '20180422002-in', ' ', 'IT 204', 'Alfredo M. Velayo College of Accountancy', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_college`
--
ALTER TABLE `admin_college`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_college`
--
ALTER TABLE `admin_college`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
