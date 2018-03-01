-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 05:39 PM
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`STUDENT_COUNT` int(11) NOT NULL,
  `DATE_ENROLL` date NOT NULL,
  `APPLICATION_PROG` varchar(10) NOT NULL,
  `STUDENT_ID` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `FAMILY_NAME` varchar(30) NOT NULL,
  `GIVEN_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(10) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `BIRTHPLACE` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_COUNT`, `DATE_ENROLL`, `APPLICATION_PROG`, `STUDENT_ID`, `EMAIL`, `PASSWORD`, `FAMILY_NAME`, `GIVEN_NAME`, `MIDDLE_NAME`, `GENDER`, `BIRTHDAY`, `BIRTHPLACE`) VALUES
(1, '2018-02-17', 'outbound', '20180217001-outbound', 'dongbaekminsoo@gmail.com', '11231997', 'milabo', 'aimee', 'avendano', 'Female', '1997-11-23', 'Philippines');

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
MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
