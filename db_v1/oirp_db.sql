-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 05:10 AM
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
-- Table structure for table `admin_college`
--

CREATE TABLE `admin_college` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `PROPOSED_PROGRAM` varchar(100) NOT NULL,
  `COURSE` varchar(500) NOT NULL,
  `COLLEGE` varchar(500) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'Approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_student_data`
--

CREATE TABLE `admin_student_data` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `DATE_STARTED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `APPLICATION_FORM` varchar(500) NOT NULL,
  `COLLEGE` varchar(50) NOT NULL,
  `COURSE` varchar(500) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `DATE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`STUDENT_COUNT`, `STUDENT_ID`, `LASTNAME`, `FIRSTNAME`, `APPLICATION_FORM`, `COLLEGE`, `COURSE`, `STATUS`, `DATE`) VALUES
(1, '20180501001-out', 'Milabo', 'Aimee Maricris', 'outbound', '', '', '', '2018-05-01/20:23:35'),
(2, '20180501002-out', 'Orteg', 'Dave Peter Lorenzo', 'outbound', '', '', '', '2018-05-01/20:31:05'),
(3, '20180501003-out', 'Atilano', 'Jeanina', 'outbound', '', '', '', '2018-05-01/21:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `certificateofcompletion`
--

CREATE TABLE `certificateofcompletion` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `APPLICATION_FORM` varchar(100) NOT NULL,
  `CERTIFICATION` varchar(500) NOT NULL,
  `EXPIRATION_ACCESS` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collegenotification`
--

CREATE TABLE `collegenotification` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `COMMENT_STATUS` int(11) NOT NULL,
  `APPLICATION_FORM` varchar(500) NOT NULL,
  `COLLEGE` varchar(50) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `country_univ_outbound`
--

CREATE TABLE `country_univ_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `APPLICATION_PROG` varchar(500) DEFAULT NULL,
  `COUNTRY_OUT` varchar(500) DEFAULT NULL,
  `UNIVERSITY_OUT` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educ_background_inbound`
--

CREATE TABLE `educ_background_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `COUNTRY_ORIGIN` varchar(500) DEFAULT NULL,
  `HOME_UNIV_IN_BILA` varchar(500) DEFAULT NULL,
  `UNIV_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `NAME_OFFICER_CONTACT_IN_BILA` varchar(500) DEFAULT NULL,
  `EMAIL_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `CURRENT_PROG_STUDY_IN_BILA` varchar(500) DEFAULT NULL,
  `DESIGNATION_IN_BILA` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_BILA` varchar(500) DEFAULT NULL,
  `SPECIALIZATION_IN_BILA` varchar(500) DEFAULT NULL,
  `YEAR_LEVEL` varchar(500) DEFAULT NULL,
  `TYPE_OF_PROGRAM` varchar(100) NOT NULL,
  `TYPE_OF_PROG_OTHER` varchar(100) NOT NULL,
  `TYPE_OF_FORM` varchar(100) NOT NULL,
  `TYPE_OF_FORM_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN1` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expectation_prog_inbound`
--

CREATE TABLE `expectation_prog_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `EXPECTATION_PROG` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_info_outbound`
--

CREATE TABLE `guardian_info_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `FATHER_NAME_OUT` varchar(30) DEFAULT NULL,
  `OCCUPATION_DADA_OUT` varchar(500) DEFAULT NULL,
  `COMPANY_DADA_OUT` varchar(30) DEFAULT NULL,
  `ADDRESS_DADA_OUT` varchar(30) DEFAULT NULL,
  `EMAIL_ADD_DADA_OUT` varchar(30) DEFAULT NULL,
  `CONTACT_NUM_DADA_OUT` varchar(20) DEFAULT NULL,
  `ANNUAL_INCOME_DADA_OUT` varchar(100) DEFAULT NULL,
  `MOTHER_NAME_OUT` varchar(30) DEFAULT NULL,
  `OCCUPATION_MOM_OUT` varchar(30) DEFAULT NULL,
  `COMPANY_MOM_OUT` varchar(30) DEFAULT NULL,
  `ADDRESS_MOM_OUT` varchar(30) DEFAULT NULL,
  `EMAIL_ADD_MOM_OUT` varchar(30) DEFAULT NULL,
  `CONTACT_NUM_MOM_OUT` varchar(20) DEFAULT NULL,
  `ANNUAL_INCOME_MOM_OUT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `medical_english_inbound`
--

CREATE TABLE `medical_english_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `DO_YOU_SMOKE_INBOUND` varchar(30) DEFAULT NULL,
  `DESCRIBE_DISABILI_INBOUND` varchar(500) DEFAULT NULL,
  `DESCRIBE_ILL_INBOUND` varchar(500) DEFAULT NULL,
  `COMPLETE_TOEF_INBOUND` varchar(30) DEFAULT NULL,
  `COMPLETE_TOEF_SCORE_INBOUND` int(11) NOT NULL,
  `INTEND_TAKE_TOEF_INBOUND` varchar(30) DEFAULT NULL,
  `INTEND_TAKE_TOEF_DATE_INBOUND` date DEFAULT NULL,
  `INTEND_TAKE_TOEF_TYPE_INBOUND` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) NOT NULL,
  `LASTNAME` varchar(500) NOT NULL,
  `FIRSTNAME` varchar(500) NOT NULL,
  `COMMENT_STATUS` int(11) NOT NULL,
  `APPLICATION_FORM` varchar(500) NOT NULL,
  `COLLEGE` varchar(50) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outcomparison`
--

CREATE TABLE `outcomparison` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `NUMBER_STUDENT` int(100) NOT NULL,
  `YEAR` varchar(100) NOT NULL,
  `SEMESTER` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcomparison`
--

INSERT INTO `outcomparison` (`STUDENT_COUNT`, `NUMBER_STUDENT`, `YEAR`, `SEMESTER`) VALUES
(1, 27, '2015-2016', '1st Semester'),
(2, 32, '2015-2016', '2nd Semester'),
(3, 24, '2015-2016', 'Special Term'),
(4, 14, '2016-2017', '1st Semester'),
(5, 46, '2016-2017', '2nd Semester'),
(6, 49, '2016-2017', 'Special Term');

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

-- --------------------------------------------------------

--
-- Table structure for table `partner_universities`
--

CREATE TABLE `partner_universities` (
  `ID` int(11) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `personal_contact_inbound`
--

CREATE TABLE `personal_contact_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `PERSONAL_CONTACT_IN_BILA` varchar(50) DEFAULT NULL,
  `RELATIONSHIP_IN_BILA` varchar(50) DEFAULT NULL,
  `ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `EMAIL_ADD_IN_BILA` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_IN_BILA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_inbound`
--

CREATE TABLE `personal_info_inbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `NATIONALITY_IN` varchar(500) DEFAULT NULL,
  `PASSPORT_NUM_IN` varchar(100) DEFAULT NULL,
  `VALIDITY_DATE_IN` date DEFAULT NULL,
  `DATE_ISSUANCE_IN` date DEFAULT NULL,
  `MAILING_ADD_IN` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_IN` varchar(100) DEFAULT NULL,
  `MOBILE_NUM_IN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info_outbound`
--

CREATE TABLE `personal_info_outbound` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `NATIONALITY_OUT` varchar(500) DEFAULT NULL,
  `CITIZENSHIP_OUT` varchar(500) DEFAULT NULL,
  `PASSPORT_NUM_OUT` varchar(100) DEFAULT NULL,
  `VALIDITY_DATE_OUT` date DEFAULT NULL,
  `DATE_ISSUANCE_OUT` date DEFAULT NULL,
  `MAILING_ADD_OUT` varchar(500) DEFAULT NULL,
  `TELEPHONE_NUM_OUT` varchar(100) DEFAULT NULL,
  `MOBILE_NUM_OUT` varchar(100) DEFAULT NULL,
  `COLLEGE_INSTITUTE_FACULTY_OUT` varchar(100) DEFAULT NULL,
  `DEGREE_PROG_OUT` varchar(100) DEFAULT NULL,
  `YEAR_LEVEL_OUT` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposed_field_study`
--

CREATE TABLE `proposed_field_study` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `PROPOSED_PROG` varchar(500) DEFAULT NULL,
  `COURSE_1` varchar(500) DEFAULT NULL,
  `COURSE_2` varchar(500) DEFAULT NULL,
  `COURSE_3` varchar(500) DEFAULT NULL,
  `COURSE_4` varchar(500) DEFAULT NULL,
  `COURSE_5` varchar(500) DEFAULT NULL,
  `TYPE_OF_PROGRAM` varchar(100) NOT NULL,
  `TYPE_OF_PROG_OTHER` varchar(100) NOT NULL,
  `TYPE_OF_FORM` varchar(100) NOT NULL,
  `TYPE_OF_FORM_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN1` varchar(100) NOT NULL,
  `SCHOLARSHIP_LOAN_OTHER1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposed_field_study_in_bila`
--

CREATE TABLE `proposed_field_study_in_bila` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `STUDENT_ID` varchar(15) DEFAULT NULL,
  `PROPOSED_PROG_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_1_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_2_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_3_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_4_INBOUND` varchar(500) DEFAULT NULL,
  `COURSE_5_INBOUND` varchar(500) DEFAULT NULL,
  `RESEARCH_TOPIC_INBOUND` varchar(500) DEFAULT NULL,
  `INTENDED_SEM_STUDY_INBOUND` varchar(500) DEFAULT NULL,
  `DESCRIPTION_ACTION_STATUS_INBOUND` varchar(500) DEFAULT NULL,
  `REASON_STUDYING_INBOUND` varchar(500) DEFAULT NULL,
  `ACCOMODATION_INBOUND` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share_universities`
--

CREATE TABLE `share_universities` (
  `ID` int(11) NOT NULL,
  `UNIVERSITY` varchar(100) NOT NULL,
  `COUNTRY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_COUNT` int(11) NOT NULL,
  `DATE_ENROLL` date NOT NULL,
  `APPLICATION_PROG` varchar(10) NOT NULL,
  `STUDENT_ID` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `FAMILY_NAME` varchar(30) NOT NULL,
  `GIVEN_NAME` varchar(50) NOT NULL,
  `MIDDLE_NAME` varchar(10) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `BIRTHDAY` varchar(500) NOT NULL,
  `AGE` int(11) NOT NULL,
  `BIRTHPLACE` varchar(50) NOT NULL,
  `STATUS` varchar(100) NOT NULL DEFAULT 'Pending',
  `PAGINATION` varchar(100) NOT NULL DEFAULT 'page 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `TOR_SCAN` varchar(5000) NOT NULL,
  `DATE_SUBMITTED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yearly`
--

CREATE TABLE `yearly` (
  `COUNT` int(11) NOT NULL,
  `YEARLY` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearly`
--

INSERT INTO `yearly` (`COUNT`, `YEARLY`) VALUES
(1, '2015-2016'),
(2, '2016-2017'),
(3, '2017-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_college`
--
ALTER TABLE `admin_college`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `admin_student_data`
--
ALTER TABLE `admin_student_data`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `certificateofcompletion`
--
ALTER TABLE `certificateofcompletion`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `collegenotification`
--
ALTER TABLE `collegenotification`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_univ_outbound`
--
ALTER TABLE `country_univ_outbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `educ_background_inbound`
--
ALTER TABLE `educ_background_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `expectation_prog_inbound`
--
ALTER TABLE `expectation_prog_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `guardian_info_outbound`
--
ALTER TABLE `guardian_info_outbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `incomparison`
--
ALTER TABLE `incomparison`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `instatistics`
--
ALTER TABLE `instatistics`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medical_english_inbound`
--
ALTER TABLE `medical_english_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `outcomparison`
--
ALTER TABLE `outcomparison`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `outstatistics`
--
ALTER TABLE `outstatistics`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `partner_universities`
--
ALTER TABLE `partner_universities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `personal_contact_inbound`
--
ALTER TABLE `personal_contact_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `personal_info_inbound`
--
ALTER TABLE `personal_info_inbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `proposed_field_study`
--
ALTER TABLE `proposed_field_study`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `proposed_field_study_in_bila`
--
ALTER TABLE `proposed_field_study_in_bila`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `share_universities`
--
ALTER TABLE `share_universities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_COUNT`);

--
-- Indexes for table `upload_pdf`
--
ALTER TABLE `upload_pdf`
  ADD UNIQUE KEY `STUDENT_COUNT` (`STUDENT_COUNT`);

--
-- Indexes for table `yearly`
--
ALTER TABLE `yearly`
  ADD PRIMARY KEY (`COUNT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_college`
--
ALTER TABLE `admin_college`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admin_student_data`
--
ALTER TABLE `admin_student_data`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `certificateofcompletion`
--
ALTER TABLE `certificateofcompletion`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collegenotification`
--
ALTER TABLE `collegenotification`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `country_univ_outbound`
--
ALTER TABLE `country_univ_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educ_background_inbound`
--
ALTER TABLE `educ_background_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expectation_prog_inbound`
--
ALTER TABLE `expectation_prog_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guardian_info_outbound`
--
ALTER TABLE `guardian_info_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incomparison`
--
ALTER TABLE `incomparison`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `instatistics`
--
ALTER TABLE `instatistics`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `medical_english_inbound`
--
ALTER TABLE `medical_english_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `outcomparison`
--
ALTER TABLE `outcomparison`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `outstatistics`
--
ALTER TABLE `outstatistics`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `partner_universities`
--
ALTER TABLE `partner_universities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `personal_contact_inbound`
--
ALTER TABLE `personal_contact_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_info_inbound`
--
ALTER TABLE `personal_info_inbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_info_outbound`
--
ALTER TABLE `personal_info_outbound`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposed_field_study`
--
ALTER TABLE `proposed_field_study`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposed_field_study_in_bila`
--
ALTER TABLE `proposed_field_study_in_bila`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share_universities`
--
ALTER TABLE `share_universities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_pdf`
--
ALTER TABLE `upload_pdf`
  MODIFY `STUDENT_COUNT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yearly`
--
ALTER TABLE `yearly`
  MODIFY `COUNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
