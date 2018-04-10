-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:03 PM
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
  `NATIONALITY_OUT` varchar(500) DEFAULT NULL,
  `CITIZENSHIP_OUT` varchar(500) DEFAULT NULL,
  `PASSPORT_NUM_OUT` varchar(100) DEFAULT NULL,
  `VALIDITY_DATE_OUT` date DEFAULT NULL,
  `DATE_ISSUANCE_OUT` date DEFAULT NULL,
  `MAILING_ADD_OUT` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_OUT` varchar(100) DEFAULT NULL,
  `MOBILE_NUM_OUT` varchar(100) DEFAULT NULL,
  `COLLEGE_INSTITUTE_FACULTY_OUT` varchar(100) DEFAULT NULL,
  `DEGREE_PROG_OUT` varchar(100) DEFAULT NULL,
  `YEAR_LEVEL_OUT` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info_outbound`
--

INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, `NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, `MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`) VALUES
(1, '20180406001-out', 'South Korea', 'South Korea', 'dfssg5ds4g94f654gd6', '2030-11-23', '2016-11-23', '1130-C Don Quijote St. Sampaloc Manila', '+63 2-406-1611', '+63 974-887-6512', 'IICS', 'BS. IT', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
