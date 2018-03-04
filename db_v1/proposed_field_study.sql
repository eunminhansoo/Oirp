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
-- Table structure for table `proposed_field_study`
--

CREATE TABLE `proposed_field_study` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `APPLICATION_FORM` varchar(30) DEFAULT NULL,
  `APPLICATION_PROG` varchar(30) DEFAULT NULL,
  `PROPOSED_PROG` varchar(100) DEFAULT NULL,
  `COURSE_1` varchar(30) DEFAULT NULL,
  `COURSE_2` varchar(30) DEFAULT NULL,
  `COURSE_3` varchar(30) DEFAULT NULL,
  `COURSE_4` varchar(30) DEFAULT NULL,
  `COURSE_5` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposed_field_study`
--

INSERT INTO `proposed_field_study` (`STUDENT_COUNT`, `STUDENT_ID`, `APPLICATION_FORM`, `APPLICATION_PROG`, `PROPOSED_PROG`, `COURSE_1`, `COURSE_2`, `COURSE_3`, `COURSE_4`, `COURSE_5`) VALUES
(1, '20180304001-out', '', '', 'fdfsdfl', 'jl', 'jlj', 'lj', 'ljl', 'kj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposed_field_study`
--
ALTER TABLE `proposed_field_study`
  ADD KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposed_field_study`
--
ALTER TABLE `proposed_field_study`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `proposed_field_study`
--
ALTER TABLE `proposed_field_study`
  ADD CONSTRAINT `proposed_field_study_ibfk_1` FOREIGN KEY (`STUDENT_COUNT`) REFERENCES `student` (`STUDENT_COUNT`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
