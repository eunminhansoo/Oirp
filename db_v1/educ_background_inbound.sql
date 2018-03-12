-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 07:10 AM
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
-- Table structure for table `educ_background_inbound`
--

CREATE TABLE `educ_background_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `COUNTRY_ORIGIN` varchar(500) DEFAULT NULL,
  `HOME_UNIV_IN_BILA` varchar(500) DEFAULT NULL,
  `UNIV_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `NAME_OFFICER_CONTACT_IN_BILA` varchar(500) DEFAULT NULL,
  `EMAIL_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `CURRENT_PROG_STUDY_IN_BILA` varchar(500) DEFAULT NULL,
  `DESIGNATION_IN_BILA` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_BILA` varchar(500) DEFAULT NULL,
  `SPECIALIZATION_IN_BILA` varchar(500) DEFAULT NULL,
  `YEAR_LEVEL` varchar(500) DEFAULT NULL,
  `SCHOLARSHIP_IN_BILA` varchar(500) DEFAULT NULL,
  `SCHOLARSHIP_TEXT_IN_BILA` varchar(500) DEFAULT NULL,
  `APPLICATION_FORM` varchar(500) DEFAULT NULL,
  `APPLICATION_TYPE_PROG` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educ_background_inbound`
--

INSERT INTO `educ_background_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `COUNTRY_ORIGIN`, `HOME_UNIV_IN_BILA`, `UNIV_ADD_IN_BILA`, `NAME_OFFICER_CONTACT_IN_BILA`, `EMAIL_ADD_IN_BILA`, `CURRENT_PROG_STUDY_IN_BILA`, `DESIGNATION_IN_BILA`, `TELEPHONE_NUM_BILA`, `SPECIALIZATION_IN_BILA`, `YEAR_LEVEL`, `SCHOLARSHIP_IN_BILA`, `SCHOLARSHIP_TEXT_IN_BILA`, `APPLICATION_FORM`, `APPLICATION_TYPE_PROG`) VALUES
(1, '20180309002-in', 'Germany', 'Helmholtz Zentrum Fur Infektionsforschung Gmbh, Br', 'GEMANY BIBIBIBIT', 'asfadfa', 'a@gmail.com', 'iics', 'sfdafas', '313123', 'BS. IS ', '3', '', '', 'sadasd', 'Scholarship');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educ_background_inbound`
--
ALTER TABLE `educ_background_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educ_background_inbound`
--
ALTER TABLE `educ_background_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
