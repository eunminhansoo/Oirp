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
-- Table structure for table `upload_pdf`
--

CREATE TABLE `upload_pdf` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `APPLICATION_PROG` varchar(50) NOT NULL,
  `PDF_NAME` varchar(500) NOT NULL,
  `PDF_IMG` varchar(50000) NOT NULL,
  `DATE_SUBMITTED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_pdf`
--

INSERT INTO `upload_pdf` (`STUDENT_COUNT`, `STUDENT_ID`, `APPLICATION_PROG`, `PDF_NAME`, `PDF_IMG`, `DATE_SUBMITTED`) VALUES
(1, '20180406001-out', 'outbound', 'Milabo', '[FINALS] ICS 115 REVIEWER.pdf', '2018-04-08'),
(2, '20180408004-in', 'inbound', 'Lee', '[FINALS] ICS 115 REVIEWER.pdf', '2018-04-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `upload_pdf`
--
ALTER TABLE `upload_pdf`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upload_pdf`
--
ALTER TABLE `upload_pdf`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
