-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 05:40 AM
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
-- Table structure for table `2015_previous_data`
--

CREATE TABLE `2015_previous_data` (
  `ID` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(100) NOT NULL,
  `COUNTRY` varchar(500) NOT NULL,
  `APPLICATION_TYPE_PROG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `2015_previous_data`
--

INSERT INTO `2015_previous_data` (`ID`, `NUMBER_STUDENT`, `YEAR`, `COUNTRY`, `APPLICATION_TYPE_PROG`) VALUES
(1, 1, '2015', 'Australia', 'outbound'),
(2, 1, '2015', 'Canada', 'outbound'),
(3, 1, '2015', 'France', 'outbound'),
(5, 6, '2015', 'Japan', 'outbound'),
(6, 3, '2015', 'Malaysia', 'outbound'),
(7, 13, '2015', 'Spain', 'outbound'),
(8, 3, '2015', 'Taiwan', 'outbound'),
(9, 11, '2015', 'Thailand', 'outbound'),
(10, 23, '2015', 'USA', 'outbound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2015_previous_data`
--
ALTER TABLE `2015_previous_data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `2015_previous_data`
--
ALTER TABLE `2015_previous_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
