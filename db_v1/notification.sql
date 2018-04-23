-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 10:58 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `COMMENT_STATUS` int(11) NOT NULL,
  `APPLICATION_FORM` varchar(500) NOT NULL,
  `COLLEGE` varchar(50) NOT NULL,
  `COURSE` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`STUDENT_COUNT`, `STUDENT_ID`, `LASTNAME`, `FIRSTNAME`, `COMMENT_STATUS`, `APPLICATION_FORM`, `COLLEGE`, `COURSE`, `STATUS`) VALUES
(1, '20180423001-in', 'Ortega', 'Dave', 1, 'inbound', '', '', ''),
(2, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'Arki101', 'Qualified'),
(3, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'ICS101', 'Qualified'),
(4, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'IT202', 'Qualified'),
(5, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'Arki101', 'Qualified'),
(6, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'ICS101', 'Qualified'),
(7, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Institute of Information and Computing Sciences', 'IT202', 'Qualified'),
(8, '20180423001-in', 'Ortega', 'Dave', 1, '', 'Faculty of Arts and Letters', 'IT211', 'Qualified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
