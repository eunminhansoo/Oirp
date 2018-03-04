-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 12:33 PM
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
-- Table structure for table `country_univ_outbound`
--

CREATE TABLE `country_univ_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `APPLICATION_PROG` varchar(30) DEFAULT NULL,
  `COUNTRY_OUT` varchar(500) DEFAULT NULL,
  `UNIVERSITY_OUT` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_univ_outbound`
--

INSERT INTO `country_univ_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, `APPLICATION_PROG`, `COUNTRY_OUT`, `UNIVERSITY_OUT`) VALUES
(1, '20180304001-out', '', 'France', 'Institut Catholique de Toulouse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_univ_outbound`
--
ALTER TABLE `country_univ_outbound`
  ADD KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_univ_outbound`
--
ALTER TABLE `country_univ_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country_univ_outbound`
--
ALTER TABLE `country_univ_outbound`
  ADD CONSTRAINT `country_univ_outbound_ibfk_1` FOREIGN KEY (`STUDENT_COUNT`) REFERENCES `student` (`STUDENT_COUNT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
