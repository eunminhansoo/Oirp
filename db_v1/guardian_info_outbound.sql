-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:02 PM
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
-- Table structure for table `guardian_info_outbound`
--

CREATE TABLE `guardian_info_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `FATHER_NAME_OUT` varchar(30) DEFAULT NULL,
  `OCCUPATION_DADA_OUT` varchar(30) DEFAULT NULL,
  `COMPANY_DADA_OUT` varchar(30) DEFAULT NULL,
  `ADDRESS_DADA_OUT` varchar(30) DEFAULT NULL,
  `EMAIL_ADD_DADA_OUT` varchar(30) DEFAULT NULL,
  `CONTACT_NUM_DADA_OUT` varchar(20) DEFAULT NULL,
  `ANNUAL_INCOME_DADA_OUT` varchar(100) DEFAULT NULL,
  `MOTHER_NAME_OUT` varchar(30) DEFAULT NULL,
  `OCCUPATION_MOM_OUT` varchar(30) DEFAULT NULL,
  `COMPANY_MOM_OUT` varchar(30) DEFAULT NULL,
  `ADDRESS_MOM_OUT` varchar(30) DEFAULT NULL,
  `EMAIL_ADD_MOM_OUT` varchar(30) DEFAULT NULL,
  `CONTACT_NUM_MOM_OUT` varchar(20) DEFAULT NULL,
  `ANNUAL_INCOME_MOM_OUT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian_info_outbound`
--

INSERT INTO `guardian_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, `FATHER_NAME_OUT`, `OCCUPATION_DADA_OUT`, `COMPANY_DADA_OUT`, `ADDRESS_DADA_OUT`, `EMAIL_ADD_DADA_OUT`, `CONTACT_NUM_DADA_OUT`, `ANNUAL_INCOME_DADA_OUT`, `MOTHER_NAME_OUT`, `OCCUPATION_MOM_OUT`, `COMPANY_MOM_OUT`, `ADDRESS_MOM_OUT`, `EMAIL_ADD_MOM_OUT`, `CONTACT_NUM_MOM_OUT`, `ANNUAL_INCOME_MOM_OUT`) VALUES
(1, '20180406001-out', 'albert milabo', 'Support Stuff', 'UST', '11ldjhfkjhb', 'al@gmail.com', '+63 2-579-2622', 'PHP 135,001 - PHP 250,000', 'tess milabo', 'Support Stuff', 'UST', '1fsdgwsergvawq', 'a@gmail.com', '+63 2-406-1611', 'PHP 8,001 - PHP 135,000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guardian_info_outbound`
--
ALTER TABLE `guardian_info_outbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guardian_info_outbound`
--
ALTER TABLE `guardian_info_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
