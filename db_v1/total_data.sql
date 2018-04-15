-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 07:34 AM
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
-- Table structure for table `total_data`
--

CREATE TABLE `total_data` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `COUNTRY` varchar(100) NOT NULL,
  `APPLICATION_FORM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_data`
--

INSERT INTO `total_data` (`STUDENT_COUNT`, `NUMBER_STUDENT`, `YEAR`, `COUNTRY`, `APPLICATION_FORM`) VALUES
(1, 1, '2015', 'Australia', 'outbound'),
(2, 1, '2015', 'Canada', 'outbound'),
(3, 1, '2015', 'France', 'outbound'),
(4, 6, '2015', 'Japan', 'outbound'),
(5, 3, '2015', 'Malaysia', 'outbound'),
(6, 13, '2015', 'Spain', 'outbound'),
(7, 3, '2015', 'Taiwan', 'outbound'),
(8, 11, '2015', 'Thailand', 'outbound'),
(9, 23, '2015', 'USA', 'outbound'),
(10, 21, '2016', 'Canada', 'outbound'),
(11, 15, '2016', 'France', 'outbound'),
(12, 1, '2016', 'Hongkong', 'outbound'),
(13, 36, '2016', 'Japan', 'outbound'),
(14, 2, '2016', 'Indonesia', 'outbound'),
(15, 1, '2016', 'Singapore', 'outbound'),
(16, 4, '2016', 'Spain', 'outbound'),
(17, 106, '2016', 'South Korea', 'outbound'),
(18, 12, '2016', 'Taiwan', 'outbound'),
(19, 36, '2016', 'Thailand', 'outbound'),
(20, 6, '2016', 'United Kingdom of Great Britian and Ireland', 'outbound'),
(21, 60, '2016', 'USA', 'outbound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `total_data`
--
ALTER TABLE `total_data`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `total_data`
--
ALTER TABLE `total_data`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
