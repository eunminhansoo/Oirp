-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 11:25 AM
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
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
`id` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college`, `username`, `password`) VALUES
(1, 'Office of International Relations and Programs', 'oirp', 'oirp@2013'),
(2, 'Faculty of Sacred Theology', 'theo', 'theo@1611'),
(3, 'Faculty of Philosophy', 'philo', 'philo@1611'),
(4, 'Faculty of Canon Law', 'canon', 'canon@1733'),
(5, 'Graduate School', 'grad', 'grad@1938'),
(6, 'Alfredo M. Velayo College of Accountancy', 'amv', 'amv@2005'),
(7, 'College of Architecture', 'arki', 'arki@1930'),
(8, 'Faculty of Arts and Letters', 'ab', 'ab@1896'),
(9, 'Faculty of Civil Law', 'civil', 'civil@1734'),
(10, 'College of Commerce and Business Administration', 'cba', 'cba@1933'),
(11, 'College of Education', 'educ', 'educ@1926'),
(12, 'Faculty of Engineering', 'engg', 'engg@1907'),
(13, 'College of Fine Arts and Design', 'cfad', 'cfad@2000'),
(14, 'Institute of Information and Computing Sciences', 'iics', 'iics@2014'),
(15, 'Faculty of Medicine and Surgery', 'med', 'med@1871'),
(16, 'Conservatory of Music', 'music', 'music@1945'),
(17, 'College of Nursing', 'nursing', 'nursing@1946'),
(18, 'Faculty of Pharmacy', 'pharma', 'pharma@1871'),
(19, 'Institute of Physical Education and Athletics', 'ipea', 'ipea@2000'),
(20, 'College of Rehabilitation Sciences', 'rs', 'rs@1974'),
(21, 'Institute of Religion', 'rel', 'rel@1933'),
(22, 'College of Science', 'science', 'science@1926'),
(23, 'College of Tourism and Hospitality Management', 'cthm', 'cthm@2006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
