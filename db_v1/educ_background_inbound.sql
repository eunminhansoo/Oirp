-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:01 PM
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
  `TYPE_OF_PROGRAM` varchar(100) NOT NULL,
  `TYPE_OF_PROG_OTHER` varchar(100) NOT NULL,
  `TYPE_OF_FORM` varchar(100) NOT NULL,
  `TYPE_OF_FORM_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN1` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educ_background_inbound`
--

INSERT INTO `educ_background_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `COUNTRY_ORIGIN`, `HOME_UNIV_IN_BILA`, `UNIV_ADD_IN_BILA`, `NAME_OFFICER_CONTACT_IN_BILA`, `EMAIL_ADD_IN_BILA`, `CURRENT_PROG_STUDY_IN_BILA`, `DESIGNATION_IN_BILA`, `TELEPHONE_NUM_BILA`, `SPECIALIZATION_IN_BILA`, `YEAR_LEVEL`, `TYPE_OF_PROGRAM`, `TYPE_OF_PROG_OTHER`, `TYPE_OF_FORM`, `TYPE_OF_FORM_OTHER`, `SCHOLARSHIP_LOAN`, `SCHOLARSHIP_LOAN_OTHER`, `SCHOLARSHIP_LOAN1`, `SCHOLARSHIP_LOAN_OTHER1`) VALUES
(1, '20180408004-in', 'Australia', 'Australian Catholic University', 'dsfsdfg', 'asfdasf', 'as@gmail.com', 'BS. IT', 'KJGKGKG', '+63 974-887-6512', '            BS.IT', '4', 'Others', ' hey', ' ', ' ', ' ', ' ', 'No', '');

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
