-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 02:28 PM
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
-- Table structure for table `partner_universities`
--

CREATE TABLE IF NOT EXISTS `partner_universities` (
`ID` int(11) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner_universities`
--

INSERT INTO `partner_universities` (`ID`, `UNIVERSITY`, `COUNTRY`) VALUES
(1, 'Australian Catholic University', 'Australia'),
(2, 'Charles Sturt University', 'Australia'),
(3, 'Curtin University', 'Australia'),
(4, 'Deakin University', 'Australia'),
(5, 'Griffith University', 'Australia'),
(6, 'Joanna Briggs Institute', 'Australia'),
(7, 'Macquarie University', 'Australia'),
(8, 'Queensland University of Technology', 'Australia'),
(9, 'RMIT University', 'Australia'),
(10, 'University of Canberra', 'Australia'),
(11, 'University of New Castle', 'Australia'),
(12, 'University of South Australia', 'Australia'),
(13, 'University of the Sunshine Coast', 'Australia'),
(14, 'University of Wollongong', 'Australia'),
(15, 'Victoria University', 'Australia'),
(16, 'Daffodil International University', 'Bangladesh'),
(17, 'Education for an Interdependent World', 'Belgium'),
(18, 'ICHEC Brussels Management School', 'Belgium'),
(19, 'Universidade Federal do Rio de Janeiro', 'Brazil'),
(20, 'Niagara College', 'Canada'),
(21, 'University of British Columbia', 'Canada'),
(22, 'Fudan University', 'China'),
(23, 'Tomas Bata University in Ziin', 'Czech Republic'),
(24, 'University of Southern Demark', 'Denmark'),
(25, 'Institut Catholique de Toulouse', 'France'),
(26, 'N + i France Network of Engineering Institute', 'France'),
(27, 'Université Catholique de Lille', 'France'),
(28, 'Helmholtz Zentrum Fur Infektionsforschung Gmbh, Br', 'Germany'),
(29, 'Hochschule für Musik Franz Liszt, Weimar', 'Germany'),
(30, 'Integrative Pilforschung Senckenberg', 'Germany'),
(31, 'SRH Hochschule Berlin - The International Management University', 'Germany'),
(33, 'University of Bayreuth', 'Germany'),
(34, 'Hongkong Polytechnic University', 'Hong Kong S.A.R.'),
(35, 'Nitte University', 'India'),
(36, 'Atma Jaya Catholic University', 'Indonesia'),
(37, 'Atma Jaya Yogyakarta University', 'Indonesia'),
(38, 'Binus University', 'Indonesia'),
(39, 'Research Center for Regional Resources - The Indonesian Institute of Sciences', 'Indonesia'),
(41, 'Sanata Dharma University', 'Indonesia'),
(42, 'Universitas Airlangga', 'Indonesia'),
(43, 'Universitas Katolik Darma Cendika', 'Indonesia'),
(44, 'Universitas Mercu Buana', 'Indonesia'),
(45, 'Universitas Ubudiyah Indonesia', 'Indonesia'),
(46, 'Widya Mandala Catholic University Surabaya', 'Indonesia'),
(47, 'Universita Degli Studi Di Brescia', 'Italy'),
(48, 'Istituto Marangoni', 'Italy'),
(49, 'Chiba University', 'Japan'),
(50, 'Elisabeth University of Music', 'Japan'),
(51, 'Gifu University', 'Japan'),
(52, 'Hijiyama University and Junior College', 'Japan'),
(53, 'Hiroshima University', 'Japan'),
(54, 'Nagoya City University', 'Japan'),
(55, 'Niigata University', 'Japan'),
(56, 'Niigata University of Health and Welfare', 'Japan'),
(57, 'Oita University', 'Japan'),
(58, 'Research Institute for Humanity and Nature', 'Japan'),
(59, 'St. Catherine University', 'Japan'),
(60, 'Tokyo University of Marine Science and Technology', 'Japan'),
(61, 'Tottori College of Nursing', 'Japan'),
(62, 'University of Shiga Prefecture', 'Japan'),
(63, 'Yokohama National University', 'Japan'),
(64, 'University of Macau', 'Macau S.A.R.'),
(65, 'INTI International University', 'Malaysia'),
(66, 'Management and Science University', 'Malaysia'),
(67, 'Open University Malaysia', 'Malaysia'),
(68, 'Taylor''s University', 'Malaysia'),
(69, 'Universiti Kebangsaan Malaysia', 'Malaysia'),
(70, 'University of Malaya', 'Malaysia'),
(71, 'Universiti Sains Malaysia', 'Malaysia'),
(72, 'Universiti Teknologi Petronas', 'Malaysia'),
(73, 'Universidad de Monterrey', 'Mexico'),
(74, 'International Pacific College Tertiary Institute', 'New Zealand'),
(75, 'University of Otago', 'New Zealand'),
(76, 'AGH University of Science and Technology', 'Poland'),
(77, 'Kozminski University', 'Poland'),
(78, 'Lodz University of Technology', 'Poland'),
(79, 'Tischner European University', 'Poland'),
(80, 'University of Information Technology and Management in Rzeszow', 'Poland'),
(81, 'National University of Singapore', 'Singapore'),
(82, 'National Gallery Singapore', 'Singapore'),
(83, 'Catholic University of Daegu', 'South Korea'),
(84, 'Catholic University of Korea', 'South Korea'),
(85, 'Chonbuk National University', 'South Korea'),
(86, 'Chungnam National University', 'South Korea'),
(87, 'Dongguk University', 'South Korea'),
(88, 'Dongseo University', 'South Korea'),
(89, 'Gyeongju University', 'South Korea'),
(90, 'Kongju National University', 'South Korea'),
(91, 'Kyung Hee University', 'South Korea'),
(92, 'Korea Tourism Organization', 'South Korea'),
(93, 'Sangmyung University', 'South Korea'),
(94, 'Sejong University', 'South Korea'),
(95, 'Seoul National University', 'South Korea'),
(96, 'Seoul National University of Science and Technology', 'South Korea'),
(97, 'Sogang University', 'South Korea'),
(98, 'Soongsil University', 'South Korea'),
(99, 'Yeungnam College of Science and Technology', 'South Korea'),
(100, 'Yeungnam University', 'South Korea'),
(101, 'Institut Catala de Nanociéncia i Nanotecnologia', 'Spain'),
(102, 'Ministry of Education, Culture and Sports', 'Spain'),
(103, 'Universitat Autonoma de Barcelona', 'Spain'),
(104, 'Universidad Catolica Santa Teresa de Jesus de Avila', 'Spain'),
(105, 'Universidad Católica San Antonio de Murcia', 'Spain'),
(106, 'Universidad Catolica de Valencia San Vicente Martir', 'Spain'),
(107, 'Universidad de La Rioja', 'Spain'),
(108, 'University of Oviedo', 'Spain'),
(109, 'Linnaeus University', 'Sweden'),
(110, 'Academia Sinica', 'Taiwan'),
(111, 'Chung Yuan Christian University', 'Taiwan'),
(112, 'Fu Jen Catholic University', 'Taiwan'),
(113, 'Kaohsiung Medical University', 'Taiwan'),
(114, 'National Central University', 'Taiwan'),
(115, 'National Dong Hwa University', 'Taiwan'),
(116, 'National Sun Yat Sen University', 'Taiwan'),
(117, 'National Taiwan Normal University', 'Taiwan'),
(118, 'National Taiwan University of Science and Technology', 'Taiwan'),
(119, 'Tzu Chi University', 'Taiwan'),
(120, 'Wenzao Ursuline University of Languages', 'Taiwan'),
(121, 'Assumption University', 'Thailand'),
(122, 'Chiang Mai University', 'Thailand'),
(123, 'Chulalongkorn University', 'Thailand'),
(124, 'Mahidol University', 'Thailand'),
(125, 'Saint Louis College', 'Thailand'),
(126, 'Siam University', 'Thailand'),
(127, 'Srinakharinwirot University', 'Thailand'),
(128, 'Thabyay Educational Network', 'Thailand'),
(129, 'Thammasat University', 'Thailand'),
(130, 'Ubon Ratchathani Rajabhat University', 'Thailand'),
(131, 'Ukrainian Catholic University', 'Ukraine'),
(132, 'St. Mary’s University, Twickenham', 'United Kingdom'),
(133, 'University of Leeds', 'United Kingdom'),
(134, 'University of Reading', 'United Kingdom'),
(135, 'California Baptist University', 'United States of America'),
(136, 'Catholic University of America', 'United States of America'),
(137, 'York College, City University of New York', 'United States of America'),
(138, 'Duke University School of Nursing', 'United States of America'),
(139, 'Kent State University', 'United States of America'),
(140, 'Menssana Research, Inc.', 'United States of America'),
(141, 'Oakland University William Beaumont School of Medicine', 'United States of America'),
(142, 'Rowan University', 'United States of America'),
(143, 'Seton Hall University', 'United States of America'),
(144, 'Therapeutic Health Services', 'United States of America'),
(145, 'University of Arkansas, Fayetteville', 'United States of America'),
(146, 'University of California, Los Angeles', 'United States of America'),
(147, 'University of California, Irvine', 'United States of America'),
(148, 'University of Hawaii - John A. Burns School of Medicine', 'United States of America'),
(149, 'University of Illinois at Chicago', 'United States of America'),
(150, 'University of Kansas - Natural History Museum and Biodiversity', 'United States of America'),
(151, 'University of Massachusetts Dartmouth', 'United States of America'),
(152, 'University of Missouri - St. Louis', 'United States of America'),
(153, 'University of Texas at San Antonio', 'United States of America'),
(154, 'University of Washington Bothell', 'United States of America'),
(155, 'University of Social Sciences and Humanities - Vietnam', 'Vietnam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partner_universities`
--
ALTER TABLE `partner_universities`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partner_universities`
--
ALTER TABLE `partner_universities`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
