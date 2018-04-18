-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 07:33 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oirp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_inbound`
--

CREATE TABLE IF NOT EXISTS `personal_info_inbound` (
`STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `NATIONALITY_IN` varchar(500) DEFAULT NULL,
  `PASSPORT_NUM_IN` varchar(100) DEFAULT NULL,
  `VALIDITY_DATE_IN` date DEFAULT NULL,
  `DATE_ISSUANCE_IN` date DEFAULT NULL,
  `MAILING_ADD_IN` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_IN` varchar(100) DEFAULT NULL,
  `MOBILE_NUM_IN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_info_inbound`
--

INSERT INTO `personal_info_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `NATIONALITY_IN`, `PASSPORT_NUM_IN`, `VALIDITY_DATE_IN`, `DATE_ISSUANCE_IN`, `MAILING_ADD_IN`, `TELEPHONE_NUM_IN`, `MOBILE_NUM_IN`) VALUES
(1, '20180408004-in', 'South Korea', 's65f4s694g165s4g65s', '2030-11-23', '2014-11-23', '1130-C Don Quijote St. Sampaloc Manila', '+63 2-406-1611', '+63 974-887-6512'),
(2, '20180417007-in', 'French', '12j3hkj', '2030-11-11', '2015-03-23', '370 L. Gonzales st., Mandaluyong City 1550', '+63 2-424-535', '+63 905-321-2946'),
(3, '20180417008-in', 'Filipino', '09065216683', '2021-06-20', '2017-06-20', '8 hereford street, project 8, quezon city', '+63 2-995-3855', '+63 906-521-6683');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_info_inbound`
--
ALTER TABLE `personal_info_inbound`
 ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_info_inbound`
--
ALTER TABLE `personal_info_inbound`
MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
