-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 07:07 AM
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
-- Table structure for table `outstatistics`
--

CREATE TABLE `outstatistics` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `APPLICATION_FORM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outstatistics`
--

INSERT INTO `outstatistics` (`STUDENT_COUNT`, `NUMBER_STUDENT`, `YEAR`, `COUNTRY`, `APPLICATION_FORM`) VALUES
(1, 1, '2015-2016', 'Australia', 'outbound'),
(2, 22, '2015-2016', 'Canada', 'outbound'),
(3, 16, '2015-2016', 'France', 'outbound'),
(4, 1, '2015-2016', 'Hongkong', 'outbound'),
(5, 42, '2015-2016', 'Japan', 'outbound'),
(6, 2, '2015-2016', 'Indonesia', 'outbound'),
(7, 3, '2015-2016', 'Malaysia', 'outbound'),
(8, 1, '2015-2016', 'Singapore', 'outbound'),
(9, 17, '2015-2016', 'Spain', 'outbound'),
(10, 106, '2015-2016', 'South Korea', 'outbound'),
(11, 15, '2015-2016', 'Taiwan', 'outbound'),
(12, 47, '2015-2016', 'Thailand', 'outbound'),
(13, 6, '2015-2016', 'United Kingdom of Great Britian and Ireland', 'outbound'),
(14, 89, '2015-2016', 'USA', 'outbound'),
(15, 10, '2016-2017', 'Australia', 'outbound'),
(16, 2, '2016-2017', 'Austria', 'outbound'),
(17, 1, '2016-2017', 'Brunei', 'outbound'),
(18, 50, '2016-2017', 'Canada', 'outbound'),
(19, 16, '2016-2017', 'France', 'outbound'),
(20, 1, '2016-2017', 'Germany', 'outbound'),
(21, 2, '2016-2017', 'India', 'outbound'),
(22, 7, '2016-2017', 'Italy', 'outbound'),
(23, 51, '2016-2017', 'Japan', 'outbound'),
(24, 7, '2016-2017', 'Malaysia', 'outbound'),
(25, 2, '2016-2017', 'New Zealand', 'outbound'),
(26, 2, '2016-2017', 'South Korea', 'outbound'),
(27, 10, '2016-2017', 'Spain', 'outbound'),
(28, 2, '2016-2017', 'Sweden', 'outbound'),
(29, 27, '2016-2017', 'Taiwan', 'outbound'),
(30, 57, '2016-2017', 'Thailand', 'outbound'),
(31, 6, '2016-2017', 'United Kingdom', 'outbound'),
(32, 167, '2016-2017', 'USA', 'outbound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outstatistics`
--
ALTER TABLE `outstatistics`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `outstatistics`
--
ALTER TABLE `outstatistics`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
