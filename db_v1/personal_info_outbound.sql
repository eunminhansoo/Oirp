-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 12:32 PM
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
-- Table structure for table `personal_info_outbound`
--

CREATE TABLE `personal_info_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `AGE_OUT` int(11) DEFAULT NULL,
  `NATIONALITY_OUT` varchar(50) DEFAULT NULL,
  `CITIZENSHIP_OUT` varchar(50) DEFAULT NULL,
  `PASSPORT_NUM_OUT` varchar(30) DEFAULT NULL,
  `VALIDITY_DATE_OUT` date DEFAULT NULL,
  `DATE_ISSUANCE_OUT` date DEFAULT NULL,
  `MAILING_ADD_OUT` varchar(50) DEFAULT NULL,
  `TELEPHONE_NUM_OUT` varchar(20) DEFAULT NULL,
  `MOBILE_NUM_OUT` varchar(20) DEFAULT NULL,
  `COLLEGE_INSTITUTE_FACULTY_OUT` varchar(50) DEFAULT NULL,
  `DEGREE_PROG_OUT` varchar(30) DEFAULT NULL,
  `YEAR_LEVEL_OUT` varchar(30) DEFAULT NULL,
  `APPLICATION_PROG` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info_outbound`
--

INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, `AGE_OUT`, `NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, `MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`, `APPLICATION_PROG`) VALUES
(1, '20180304001-out', 0, 'werwer', 'qwewqe', 'we878', '2018-11-23', '2030-02-23', '1130-C Don Quijote St. Sampaloc Manila', '+635674987', '987979', 'IICS', 'BS. IT', '4', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  ADD KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  ADD CONSTRAINT `personal_info_outbound_ibfk_1` FOREIGN KEY (`STUDENT_COUNT`) REFERENCES `student` (`STUDENT_COUNT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
