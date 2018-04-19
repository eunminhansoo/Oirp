-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 07:06 AM
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
-- Table structure for table `instatistics`
--

CREATE TABLE `instatistics` (
  `ID` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(100) NOT NULL,
  `COUNTRY` varchar(500) NOT NULL,
  `APPLICATION_FORM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instatistics`
--

INSERT INTO `instatistics` (`ID`, `NUMBER_STUDENT`, `YEAR`, `COUNTRY`, `APPLICATION_FORM`) VALUES
(1, 1, '2015-2016', 'Argentina', 'inbound'),
(2, 25, '2015-2016', 'Australia', 'inbound'),
(3, 1, '2015-2016', 'Brazil', 'inbound'),
(4, 19, '2015-2016', 'China', 'inbound'),
(5, 15, '2015-2016', 'Indonesia', 'inbound'),
(6, 38, '2015-2016', 'Japan', 'inbound'),
(7, 12, '2015-2016', 'Malaysia', 'inbound'),
(8, 1, '2015-2016', 'Spain', 'inbound'),
(9, 2, '2015-2016', 'Taiwan', 'inbound'),
(10, 29, '2015-2016', 'Thailand', 'inbound'),
(11, 15, '2015-2016', 'USA', 'inbound'),
(12, 25, '2016-2017', 'Australia', 'inbound'),
(13, 2, '2015-2016', 'Austria', 'inbound'),
(14, 1, '2016-2017', 'Belgium', 'inbound'),
(15, 1, '2016-2017', 'Brazil', 'inbound'),
(16, 3, '2016-2017', 'Cambodia', 'inbound'),
(17, 3, '2016-2017', 'Canada', 'inbound'),
(18, 2, '2016-2017', 'Chile', 'inbound'),
(20, 1, '2016-2017', 'Croatia', 'inbound'),
(21, 1, '2016-2017', 'Czech Republic', 'inbound'),
(22, 2, '2016-2017', 'France', 'inbound'),
(23, 8, '2016-2017', 'India', 'inbound'),
(24, 1, '2016-2017', 'Indonesia', 'inbound'),
(25, 25, '2016-2017', 'Japan', 'inbound'),
(26, 1, '2016-2017', 'Loas', 'inbound'),
(27, 11, '2016-2017', 'Malaysia', 'inbound'),
(28, 3, '2016-2017', 'Myanmar', 'inbound'),
(29, 1, '2016-2017', 'Netherlands', 'inbound'),
(30, 1, '2016-2017', 'Poland', 'inbound'),
(31, 1, '2016-2017', 'Romania', 'inbound'),
(32, 1, '2016-2017', 'Russia', 'inbound'),
(33, 1, '2016-2017', 'Slovakia', 'inbound'),
(34, 1, '2016-2017', 'Slovenia', 'inbound'),
(35, 1, '2016-2017', 'South Korea', 'inbound'),
(36, 5, '2016-2017', 'Spain', 'inbound'),
(37, 22, '2016-2017', 'Thailand', 'inbound'),
(38, 1, '2016-2017', 'Turkey', 'inbound'),
(39, 19, '2016-2107', 'USA', 'inbound'),
(40, 1, '2016-2017', 'Vietnam', 'inbound');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instatistics`
--
ALTER TABLE `instatistics`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instatistics`
--
ALTER TABLE `instatistics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
