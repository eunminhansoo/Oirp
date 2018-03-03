-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 02:59 AM
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
-- Table structure for table `insurance_info_in_bila`
--

CREATE TABLE `insurance_info_in_bila` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `INSURANCE_COMPANY_NAME_IN_BILA` varchar(50) DEFAULT NULL,
  `POLICY_NUM_IN_BILA` varchar(30) NOT NULL,
  `AMOUNT_COVERAGE_US_DOLLAR_IN_BILA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurance_info_in_bila`
--
ALTER TABLE `insurance_info_in_bila`
  ADD KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurance_info_in_bila`
--
ALTER TABLE `insurance_info_in_bila`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `insurance_info_in_bila`
--
ALTER TABLE `insurance_info_in_bila`
  ADD CONSTRAINT `insurance_info_in_bila_ibfk_1` FOREIGN KEY (`STUDENT_COUNT`) REFERENCES `student` (`STUDENT_COUNT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
