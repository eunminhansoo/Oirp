-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 07:09 AM
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
-- Table structure for table `medical_english_inbound`
--

CREATE TABLE `medical_english_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `DO_YOU_SMOKE_INBOUND` varchar(30) DEFAULT NULL,
  `DESCRIBE_DISABILI_INBOUND` varchar(500) DEFAULT NULL,
  `DESCRIBE_ILL_INBOUND` varchar(500) DEFAULT NULL,
  `COMPLETE_TOEF_INBOUND` varchar(30) DEFAULT NULL,
  `COMPLETE_TOEF_SCORE_INBOUND` int(11) NOT NULL,
  `INTED_TAKE_TOEF_INBOUND` varchar(30) DEFAULT NULL,
  `INTED_TAKE_TOEF_DATE_INBOUND` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_english_inbound`
--

INSERT INTO `medical_english_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `DO_YOU_SMOKE_INBOUND`, `DESCRIBE_DISABILI_INBOUND`, `DESCRIBE_ILL_INBOUND`, `COMPLETE_TOEF_INBOUND`, `COMPLETE_TOEF_SCORE_INBOUND`, `INTED_TAKE_TOEF_INBOUND`, `INTED_TAKE_TOEF_DATE_INBOUND`) VALUES
(1, '20180309002-in', '', 'MY BRAIN', 'SCHOOL', 'Yes', 8, 'Yes', '2018-02-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_english_inbound`
--
ALTER TABLE `medical_english_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_english_inbound`
--
ALTER TABLE `medical_english_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
