-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2018 at 10:29 AM
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
-- Table structure for table `incomparison`
--

CREATE TABLE `incomparison` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(100) NOT NULL,
  `SEMESTER` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomparison`
--

INSERT INTO `incomparison` (`STUDENT_COUNT`, `NUMBER_STUDENT`, `YEAR`, `SEMESTER`) VALUES
(1, 4, '2015-2016', '1st Semester'),
(2, 14, '2015-2016', '2nd Semester'),
(3, 5, '2015-2016', 'Special Term'),
(4, 18, '2016-2017', '1st Semester'),
(5, 15, '2016-2017', '2nd Semester'),
(6, 16, '2016-2017', 'Special Term');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incomparison`
--
ALTER TABLE `incomparison`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incomparison`
--
ALTER TABLE `incomparison`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
