-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 05:05 PM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `DATE_ENROLL` date NOT NULL,
  `APPLICATION_PROG` varchar(10) NOT NULL,
  `STUDENT_ID` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `FAMILY_NAME` varchar(30) NOT NULL,
  `GIVEN_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(10) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `BIRTHDAY` varchar(500) NOT NULL,
  `AGE` int(11) NOT NULL,
  `BIRTHPLACE` varchar(50) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `PAGINATION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_COUNT`, `DATE_ENROLL`, `APPLICATION_PROG`, `STUDENT_ID`, `EMAIL`, `PASSWORD`, `FAMILY_NAME`, `GIVEN_NAME`, `MIDDLE_NAME`, `GENDER`, `BIRTHDAY`, `AGE`, `BIRTHPLACE`, `STATUS`, `PAGINATION`) VALUES
(1, '2018-04-06', 'outbound', '20180406001-out', 'aimee@gmail.com', 'MTEvMjMvMTk5Nw==', 'Milabo', 'Aimee Maricris', 'Avendano', 'Female', 'MTEvMjMvMTk5Nw==', 20, 'Manila', '', 'Submitted PDF'),
(4, '2018-04-08', 'inbound', '20180408004-in', 'IU@gmail.com', 'MDUvMTYvMTk5Mw==', 'Lee', 'Ji-eun', '', 'Female', 'MDUvMTYvMTk5Mw==', 24, 'Seoul', '', 'Submitted PDF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
