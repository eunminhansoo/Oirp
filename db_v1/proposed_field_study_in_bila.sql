-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:04 PM
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
-- Table structure for table `proposed_field_study_in_bila`
--

CREATE TABLE `proposed_field_study_in_bila` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `PROPOSED_PROG_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_1_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_2_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_3_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_4_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_5_INBOUND` varchar(500) DEFAULT NULL,
  `RESEARCH_TOPIC_INBOUND` varchar(500) DEFAULT NULL,
  `INTENDED_SEM_STUDY_INBOUND` varchar(500) DEFAULT NULL,
  `DESCRIPTION_ACTION_STATUS_INBOUND` varchar(500) DEFAULT NULL,
  `REASON_STUDYING_INBOUND` varchar(500) DEFAULT NULL,
  `ACCOMODATION_INBOUND` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposed_field_study_in_bila`
--

INSERT INTO `proposed_field_study_in_bila` (`STUDENT_COUNT`, `STUDENT_ID`, `PROPOSED_PROG_INBOUND`, `COURSE_1_INBOUND`, `COURSE_2_INBOUND`, `COURSE_3_INBOUND`, `COURSE_4_INBOUND`, `COURSE_5_INBOUND`, `RESEARCH_TOPIC_INBOUND`, `INTENDED_SEM_STUDY_INBOUND`, `DESCRIPTION_ACTION_STATUS_INBOUND`, `REASON_STUDYING_INBOUND`, `ACCOMODATION_INBOUND`) VALUES
(1, '20180408004-in', 'Information Technology', 'CS 123', 'IT 205', 'IS 205', 'math103', 'IT 204', '', '2nd Semester', 'gjgjhsdgfjhg', 'kjjbki', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proposed_field_study_in_bila`
--
ALTER TABLE `proposed_field_study_in_bila`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposed_field_study_in_bila`
--
ALTER TABLE `proposed_field_study_in_bila`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
