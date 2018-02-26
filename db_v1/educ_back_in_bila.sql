-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 07:48 AM
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
-- Table structure for table `educ_back_in_bila`
--

CREATE TABLE `educ_back_in_bila` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDNET_ID` varchar(15) DEFAULT NULL,
  `HOME_UNIV_IN_BILA` varchar(100) DEFAULT NULL,
  `UNIV_ADD_IN_BILA` varchar(50) DEFAULT NULL,
  `NAME_OFFICER_CONTACT_IN_BILA` varchar(30) DEFAULT NULL,
  `EMAIL_ADD_IN_BILA` varchar(30) DEFAULT NULL,
  `CURRENT_PROG_STUDY_IN_BILA` varchar(30) DEFAULT NULL,
  `DESIGNATION_IN_BILA` varchar(30) DEFAULT NULL,
  `TELEPHONE_NUM_BILA` int(11) NOT NULL,
  `SPECIALIZATION_IN_BILA` varchar(30) DEFAULT NULL,
  `YEAR_STUDY` varchar(10) DEFAULT NULL,
  `YEAR_LEVEL` varchar(10) DEFAULT NULL,
  `SCHOLARSHIP_IN_BILA` varchar(10) DEFAULT NULL,
  `AGREEMENT_IN_BILA` varchar(10) DEFAULT NULL,
  `YEAR_SIGNED_IN_BILA` varchar(10) DEFAULT NULL,
  `YEAR_RENEWED` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educ_back_in_bila`
--
ALTER TABLE `educ_back_in_bila`
  ADD KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educ_back_in_bila`
--
ALTER TABLE `educ_back_in_bila`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `educ_back_in_bila`
--
ALTER TABLE `educ_back_in_bila`
  ADD CONSTRAINT `educ_back_in_bila_ibfk_1` FOREIGN KEY (`STUDENT_COUNT`) REFERENCES `student` (`STUDENT_COUNT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
