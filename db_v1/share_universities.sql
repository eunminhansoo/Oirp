-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 01:37 PM
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
-- Table structure for table `share_universities`
--

CREATE TABLE IF NOT EXISTS `share_universities` (
`ID` int(11) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `share_universities`
--

INSERT INTO `share_universities` (`ID`, `UNIVERSITY`, `COUNTRY`) VALUES
(1, 'Royal University of Phnom Penh', 'Cambodia'),
(2, 'University of Cambodia', 'Cambodia'),
(3, 'Phnom Penh International University', 'Cambodia'),
(4, 'National University of Management Cambodia', 'Cambodia'),
(5, 'Universitas Indonesia', 'Indonesia'),
(6, 'Universitas Diponegoro', 'Indonesia'),
(7, 'Bogor Agricultural University', 'Indonesia'),
(8, 'Bina Nusantara University', 'Indonesia'),
(9, 'National University of Laos', 'Lao PDR'),
(10, 'Savannakhet University', 'Lao PDR'),
(11, 'Souphanouvong University', 'Lao PDR'),
(12, 'Champasack University', 'Lao PDR'),
(13, 'Universiti Kebangsaan Malaysia', 'Malaysia'),
(14, 'Taylor’s University Malaysia', 'Malaysia'),
(15, 'Universiti Teknologi Malaysia', 'Malaysia'),
(16, 'Universiti Malaysia Sabah', 'Malaysia'),
(17, 'University of Yangon', 'Myanmar'),
(18, 'Mandalay University', 'Myanmar'),
(19, 'Myanmar Maritime University', 'Myanmar'),
(20, 'Yangon University of Economics', 'Myanmar'),
(21, 'Chulalongkorn University', 'Thailand'),
(22, 'Payap University', 'Thailand'),
(23, 'King Mongkut’s University of Technology Thonburi', 'Thailand'),
(24, 'Thammasat University', 'Thailand'),
(25, 'Viet Nam National University', 'Vietnam'),
(26, 'Hanoi University of Science and Technology', 'Vietnam'),
(27, 'Ho Chi Minh University of Technology and Education', 'Vietnam'),
(28, 'Hue University', 'Vietnam'),
(29, 'University of Applied Sciences Upper Austria', 'Austria'),
(30, 'University of Ghent', 'Belgium'),
(31, 'Université Paul Sabatier – Toulouse III', 'France'),
(32, 'University of Duisburg-Essen', 'Germany'),
(33, 'University College Cork', 'Ireland'),
(34, 'University of Groningen', 'The Netherlands'),
(35, 'Warsaw School of Economics', 'Poland'),
(36, 'Uppsala University', 'Sweden'),
(37, 'University of Murcia', 'Spain'),
(38, 'Tomas Bata University', 'Czech Republic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `share_universities`
--
ALTER TABLE `share_universities`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `share_universities`
--
ALTER TABLE `share_universities`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
