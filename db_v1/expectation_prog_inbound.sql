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
-- Table structure for table `expectation_prog_inbound`
--

CREATE TABLE `expectation_prog_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `EXPECTATION_PROG` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expectation_prog_inbound`
--

INSERT INTO `expectation_prog_inbound` (`STUDENT_COUNT`, `STUDENT_ID`, `EXPECTATION_PROG`) VALUES
(1, '20180408004-in', 'Ok urin meoributeo balkkeutkkaji jeonbu da\r\nJjeo jjeoreo\r\nHaruui jeolbaneul jageobe jjeo jjeoreo\r\nJageopsire jjeoreo sareo cheongchuneun sseogeogado\r\nDeokbune moro gado dallineun seonggonggado\r\nSonyeodeura deo keuge sorijilleo jjeo jjeoreong\r\nBamsae ilhaessji everyday\r\nNiga keulleobeseo nol ttae yeah\r\nTtan nyeoseokdeulgwaneun dareuge\r\nI donâ€™t wanna say yes\r\nI donâ€™t wanna say yes\r\nSorichyeobwa all right\r\nMomi tabeoridorok all night (all night)\r\nCause we got fire (fire!)\r\nHigher (higher!)\r\nI gotta make it, I gotta make it\r\nJjeoreo!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expectation_prog_inbound`
--
ALTER TABLE `expectation_prog_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expectation_prog_inbound`
--
ALTER TABLE `expectation_prog_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
