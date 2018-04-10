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
-- Table structure for table `personal_contact_inbound`
--

CREATE TABLE `personal_contact_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `PERSONAL_CONTACT_IN_BILA` varchar(50) DEFAULT NULL,
  `RELATIONSHIP_IN_BILA` varchar(50) DEFAULT NULL,
  `ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `EMAIL_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_IN_BILA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_contact_inbound`
--

INSERT INTO `personal_contact_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `PERSONAL_CONTACT_IN_BILA`, `RELATIONSHIP_IN_BILA`, `ADD_IN_BILA`, `EMAIL_ADD_IN_BILA`, `TELEPHONE_NUM_IN_BILA`) VALUES
(1, '20180408004-in', 'sf35sdfsdf', 'ljh', 'khkj', 'kh@gmail.com', '+63 974-887-6512');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_contact_inbound`
--
ALTER TABLE `personal_contact_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_contact_inbound`
--
ALTER TABLE `personal_contact_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
