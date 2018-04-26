-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 10:35 PM
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
-- Table structure for table `collegenotification`
--

CREATE TABLE `collegenotification` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `COMMENT_STATUS` int(11) NOT NULL,
  `APPLICATION_FORM` varchar(500) NOT NULL,
  `COLLEGE` varchar(50) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegenotification`
--

INSERT INTO `collegenotification` (`STUDENT_COUNT`, `STUDENT_ID`, `LASTNAME`, `FIRSTNAME`, `COMMENT_STATUS`, `APPLICATION_FORM`, `COLLEGE`, `STATUS`, `COURSE`) VALUES
(1, '20180426002-in', 'Lee', 'Ji-eun', 1, '', 'Institute of Information and Computing Sciences', '', 'CS 123'),
(2, '20180426002-in', 'Lee', 'Ji-eun', 1, '', 'Institute of Information and Computing Sciences', '', 'PLN 3'),
(3, '20180426002-in', 'Lee', 'Ji-eun', 1, '', 'Alfredo M. Velayo College of Accountancy', '', 'RMA'),
(4, '20180426002-in', 'Lee', 'Ji-eun', 1, '', 'Faculty of Engineering', '', 'ENG 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collegenotification`
--
ALTER TABLE `collegenotification`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collegenotification`
--
ALTER TABLE `collegenotification`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
