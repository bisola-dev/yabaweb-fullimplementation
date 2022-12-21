-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 02:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `usemail` varchar(30) DEFAULT NULL,
  `fulln` varchar(65) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `hash` varchar(80) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'SUPERADMIN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `usemail`, `fulln`, `pwd`, `hash`, `status`) VALUES
(1, 'admin@gmail.com', 'Yakubu Gbenga', '1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'SUPERADMIN'),
(2, 'eri@gmail.com', 'Eriayo Yaks', '12345678', '25d55ad283aa400af464c76d713c07ad', 'SUPERADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `sesion` varchar(12) DEFAULT NULL,
  `closindate` date DEFAULT NULL,
  `fee` varchar(10) DEFAULT NULL,
  `csesion` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `sesion`, `closindate`, `fee`, `csesion`) VALUES
(1, '2018/2019', '2019-10-25', '8000', '0'),
(2, '2019/2020', '2020-04-09', '1500', '1'),
(3, '2020/2021', '2021-05-06', '10000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `fulln` varchar(150) DEFAULT NULL,
  `emal` varchar(80) DEFAULT NULL,
  `fon` varchar(15) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `hpwd` varchar(34) DEFAULT NULL,
  `prog` varchar(90) DEFAULT NULL,
  `course` varchar(100) NOT NULL,
  `pix` varchar(120) NOT NULL DEFAULT 'def.jpg',
  `dreg` varchar(80) DEFAULT NULL,
  `statuz` varchar(80) NOT NULL DEFAULT 'NOT ADMITTED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `fulln`, `emal`, `fon`, `pwd`, `hpwd`, `prog`, `course`, `pix`, `dreg`, `statuz`) VALUES
(1, 'Yakubu Eriayo Joyful', 'eriyaks@gmail.com', '08023186305', '1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'ND full time', 'Computer Engineering', 'eriayo.jpg', 'Sep 25, 2019 08:09 pm', 'Admitted'),
(2, 'Ajayi Taiwo Joshua', 'taiwo@gmail.com', '08076541211', 'taiwo1234', 'eb1922ae2ed2fffc5a84178137d0651f', 'HND Full Time', 'Business Administration', 'olatunji.jpeg', 'Sep 13, 2019 10:56 pm', 'Not Admitted'),
(3, 'Ogunjobi Jumoke Anu', 'jumoke@gmail.com', '07012348901', 'jummy@#12', '5b3b4242b075ccfa941fc08dbae90f6e', 'ND Part Time', 'Accountancy', 'lawfoto.jpeg', 'Sep 14, 2019 06:24 pm', 'Not Admitted'),
(4, 'Babatunde Kayode', 'kayode@gmail.com', '09021348971', 'kayode123', '321a913f1636f1655e6ac799af8c1c20', 'HND Full Time', 'Quantity Survey', 'osaghae.jpeg', 'Sep 16, 2019 01:50 pm', 'Not Admitted'),
(5, 'Bisola Oke', 'bisolaoke@yahoo.com', '08012348901', 'bisola12', 'f5b16b1192348034a1ee4e957c0a3658', 'ND Full Time', 'Civil Engineering', 'onomefot.jpeg', 'Sep 16, 2019 03:14 pm', 'Not Admitted'),
(6, 'Alabor Gloria', 'alaboheno@gmail.com', '07123568651', 'alabo123', '58e488ef1682a47118e90aabcbb2e621', 'ND Full Time', 'Electrical Engineering', 'eriayo.jpg', 'Sep 16, 2019 05:23 pm', 'Admitted'),
(7, 'Ajayi Temitayo Anu', 'temitayoade@gmail.com', '09012348974', 'temitayo12', '8818007f720a3930ab3d87760279fb75', 'HND Full Time', 'Accountancy', 'busay.jpg', 'Sep 28, 2019 11:20 am', 'Admitted'),
(8, 'Ayodele Dorcas Oyindamola', 'ayodeledoc@gmail.com', '08123123210', 'dorcas12', 'c8fc1f5b9adcd39424adc89378c8fba4', 'ND Full Time', 'Science Laboratory Technology', 'adelowo1.jpg', 'Sep 28, 2019 11:38 am', 'NOT ADMITTED'),
(9, 'Yekeen Jumoke Lawal', 'jummyek@gmail.com', '08123890644', 'yekeen12', '808af4ca8570a777f7199e1341299abd', 'HND Full Time', 'Electrical/Electronics Engineering', 'gladys.jpeg', 'Sep 28, 2019 12:14 pm', 'Admitted'),
(10, 'Eriife Oluwagbemiga', 'ifeyaks@gmail.com', '07032130987', 'ifeyak12', '02466cbe107d6d21ab04098d274fdf03', 'ND Full Time', 'Hospitality Management', 'eriife1.jpg', 'Oct 20, 2019 07:31 pm', 'NOT ADMITTED');

-- --------------------------------------------------------

--
-- Table structure for table `cardinfo`
--

CREATE TABLE `cardinfo` (
  `id` int(11) NOT NULL,
  `coden` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `passwd` varchar(4) NOT NULL,
  `exdate` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardinfo`
--

INSERT INTO `cardinfo` (`id`, `coden`, `cvv`, `passwd`, `exdate`) VALUES
(1, '1111222233334444', '222', '1234', '0620'),
(2, '1478523698521471', '555', '2222', '0920'),
(3, '7896541236987450', '667', '2222', '0520'),
(4, '1234123465417893', '333', '4444', '0420'),
(5, '1234567800014523', '999', '4444', '1219');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courses`) VALUES
(2, 'Business Administration'),
(5, 'Civil Engineering'),
(6, 'Electrical/Electronics Engineering'),
(8, 'Industrial Maintenance Engineering'),
(9, 'Computer Science'),
(10, 'Computer Engineering'),
(11, 'Food Technology'),
(12, 'Hospitality Management'),
(13, 'Leisure and Tourism'),
(16, 'Polymer Technology'),
(18, 'General Art'),
(20, 'Industrial Design - Fashion'),
(21, 'Graphics Design'),
(24, 'Mathematics'),
(26, 'microbiology'),
(27, 'Mass Communication'),
(28, 'Banking and Finance'),
(29, 'Mechanical Engineering'),
(30, 'Architectural Technology'),
(31, 'Accountancy'),
(32, 'Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `examdetails`
--

CREATE TABLE `examdetails` (
  `id` int(11) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `sittings` varchar(2) NOT NULL,
  `examtype1` varchar(10) NOT NULL,
  `examtype2` varchar(10) NOT NULL,
  `examsesion1` varchar(20) NOT NULL,
  `examsesion2` varchar(20) NOT NULL,
  `examyea1` varchar(20) NOT NULL,
  `examyea2` varchar(20) NOT NULL,
  `examnum1` varchar(15) NOT NULL,
  `examnum2` varchar(15) NOT NULL,
  `dreg` varchar(30) NOT NULL,
  `aplikantmail` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdetails`
--

INSERT INTO `examdetails` (`id`, `fullname`, `sittings`, `examtype1`, `examtype2`, `examsesion1`, `examsesion2`, `examyea1`, `examyea2`, `examnum1`, `examnum2`, `dreg`, `aplikantmail`) VALUES
(1, 'Ajayi Taiwo Joshua', '1', 'NECO', 'select', 'Oct/Nov', 'select', '2013', 'select', '43217890FS', '', 'Nov 17, 2019 01:58 pm', 'taiwo@gmail.com'),
(2, 'Yakubu Eriayo Joyful', '1', 'WAEC', 'nil', 'May/June', 'nil', '2011', 'nil', '4789632DE', '', 'Nov 17, 2019 09:58 pm', 'eriyaks@gmail.com'),
(3, 'Ogunjobi Jumoke Anu', '1', 'NECO', 'nil', 'Oct/Nov', 'nil', '2012', 'nil', '45123698DR', '', 'Nov 17, 2019 10:08 pm', 'jumoke@gmail.com'),
(4, 'Ajayi Taiwo Joshua', '1', 'WAEC', 'nil', 'Sept/Oct', 'nil', '2015', 'nil', '57896412ki', '', 'Nov 17, 2019 10:18 pm', 'taiwo@gmail.com'),
(5, 'Yakubu Eriayo Joyful', '1', 'WAEC', 'nil', 'May/June', 'nil', '2011', 'nil', '54781235HF', '', 'Nov 17, 2019 10:22 pm', 'eriyaks@gmail.com'),
(6, 'Yakubu Eriayo Joyful', '1', 'WAEC', 'nil', 'May/June', 'nil', '2011', 'nil', '54781235HF', '', 'Nov 17, 2019 10:22 pm', 'eriyaks@gmail.com'),
(7, 'Yakubu Eriayo Joyful', '1', 'WAEC', 'nil', 'May/June', 'nil', '2010', 'nil', '34216543DE', '', 'Nov 18, 2019 11:12 am', 'eriyaks@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `exam_year`
--

CREATE TABLE `exam_year` (
  `id` int(11) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_year`
--

INSERT INTO `exam_year` (`id`, `year`) VALUES
(1, '2008'),
(2, '2009'),
(3, '2010'),
(4, '2011'),
(5, '2012'),
(6, '2013'),
(7, '2014'),
(8, '2015'),
(9, '2016'),
(10, '2017'),
(11, '2018'),
(12, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grades` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grades`) VALUES
(1, 'A1'),
(2, 'B2'),
(3, 'B3'),
(4, 'C4'),
(5, 'C5'),
(6, 'C6'),
(7, 'D7'),
(8, 'E8'),
(9, 'F9'),
(10, 'ABS'),
(11, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `jamb_records`
--

CREATE TABLE `jamb_records` (
  `id` int(11) NOT NULL,
  `fullnam` varchar(50) NOT NULL,
  `jamb` varchar(12) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `addres` varchar(60) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `stat` varchar(30) NOT NULL,
  `lga` varchar(30) NOT NULL,
  `subjecty1` varchar(20) NOT NULL,
  `skore1` varchar(2) NOT NULL,
  `subjecty2` varchar(20) NOT NULL,
  `skore2` varchar(2) NOT NULL,
  `subjecty3` varchar(20) NOT NULL,
  `skore3` varchar(2) NOT NULL,
  `subjecty4` varchar(20) NOT NULL,
  `skore4` varchar(2) NOT NULL,
  `subjecty5` varchar(20) NOT NULL,
  `skore5` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamb_records`
--

INSERT INTO `jamb_records` (`id`, `fullnam`, `jamb`, `dob`, `addres`, `sex`, `stat`, `lga`, `subjecty1`, `skore1`, `subjecty2`, `skore2`, `subjecty3`, `skore3`, `subjecty4`, `skore4`, `subjecty5`, `skore5`) VALUES
(1, 'Ajayi Taiwo Joshua', '67854321KL', '2000-09-21', '23 Alfa Nla str, Agege', 'female', ' Edo', 'Akoko Edo', 'English', '49', 'Mathematics', '35', 'Geography', '53', 'Account', '37', 'Yoruba', '34'),
(2, 'Babatunde Kayode', '34216754GH', '1998-05-21', '6, Ajigbotinu Str, IsaleOja', 'male', 'Adamawa', 'Gombi', 'English', '40', 'Mathematics', '37', 'Account', '52', 'History', '21', 'Computer Studies', '32'),
(3, 'Babatunde Kayode', '45321298AC', '1979-12-31', 'ayige stree', 'female', 'Lagos ', 'Agege', 'Mathematics', '32', 'English', '28', 'Commerce', '31', 'History', '32', 'CRK', '56'),
(4, 'Yakubu Eriayo Joyful', '46782134GE', '2009-09-04', 'plot 2, flat 5 Ijaye ', 'female', '12', '225', 'English', '59', 'Mathematics', '69', 'Physics', '50', 'Chemistry', '79', 'Biology', '82');

-- --------------------------------------------------------

--
-- Table structure for table `logger`
--

CREATE TABLE `logger` (
  `id` int(11) NOT NULL,
  `uzer` varchar(120) DEFAULT NULL,
  `activity` text,
  `timereg` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logger`
--

INSERT INTO `logger` (`id`, `uzer`, `activity`, `timereg`) VALUES
(1, 'kayode@gmail.com', 'Registered as fresh applicant', ''),
(2, 'bisolaoke@yahoo.com', 'Registered as fresh applicant', '1568643278'),
(3, 'alaboheno@gmail.com', 'Registered as fresh applicant', 'Sep 16, 2019 05:23 pm'),
(4, 'temitayoade@gmail.com', 'Registered as fresh applicant', 'Sep 28, 2019 11:20 am'),
(5, 'ayodeledoc@gmail.com', 'Registered as fresh applicant', 'Sep 28, 2019 11:38 am'),
(6, 'jummyek@gmail.com', 'Registered as fresh applicant', 'Sep 28, 2019 12:14 pm'),
(7, 'ifeyaks@gmail.com', 'Registered as fresh applicant', 'Oct 20, 2019 07:31 pm');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `lga` varchar(22) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `stateid`, `lga`, `state`) VALUES
(1, 1, 'Aba North', 'Abia State'),
(2, 1, 'Aba South', 'Abia State'),
(3, 1, 'Arochukwu', 'Abia State'),
(4, 1, 'Bende', 'Abia State'),
(5, 1, 'Ikwuano', 'Abia State'),
(6, 1, 'Isiala Ngwa North', 'Abia State'),
(7, 1, 'Isiala Ngwa South', 'Abia State'),
(8, 1, 'Isuikwuato', 'Abia State'),
(9, 1, 'Obi Ngwa', 'Abia State'),
(10, 1, 'Ohafia', 'Abia State'),
(11, 1, 'Osisioma', 'Abia State'),
(12, 1, 'Ugwunagbo', 'Abia State'),
(13, 1, 'Ukwa East', 'Abia State'),
(14, 1, 'Ukwa West', 'Abia State'),
(15, 1, 'Umuahia North', 'Abia State'),
(16, 1, 'Umuahia South', 'Abia State'),
(17, 1, 'Umu Nneochi', 'Abia State'),
(18, 2, 'Demsa', 'Adamawa State'),
(19, 2, 'Fufure', 'Adamawa State'),
(20, 2, 'Ganye', 'Adamawa State'),
(21, 2, 'Gayuk', 'Adamawa State'),
(22, 2, 'Gombi', 'Adamawa State'),
(23, 2, 'Grie', 'Adamawa State'),
(24, 2, 'Hong', 'Adamawa State'),
(25, 2, 'Jada', 'Adamawa State'),
(26, 2, 'Lamurde', 'Adamawa State'),
(27, 2, 'Madagali', 'Adamawa State'),
(28, 2, 'Maiha', 'Adamawa State'),
(29, 2, 'Mayo Belwa', 'Adamawa State'),
(30, 2, 'Michika', 'Adamawa State'),
(31, 2, 'Mubi North', 'Adamawa State'),
(32, 2, 'Mubi South', 'Adamawa State'),
(33, 2, 'Numan', 'Adamawa State'),
(34, 2, 'Shelleng', 'Adamawa State'),
(35, 2, 'Song', 'Adamawa State'),
(36, 2, 'Toungo', 'Adamawa State'),
(37, 2, 'Yola North', 'Adamawa State'),
(38, 2, 'Yola South', 'Adamawa State'),
(39, 3, 'Abak', 'Akwa Ibom State'),
(40, 3, 'Eastern Obolo', 'Akwa Ibom State'),
(41, 3, 'Eket', 'Akwa Ibom State'),
(42, 3, 'Esit Eket', 'Akwa Ibom State'),
(43, 3, 'Essien Udim', 'Akwa Ibom State'),
(44, 3, 'Etim Ekpo', 'Akwa Ibom State'),
(45, 3, 'Etinan', 'Akwa Ibom State'),
(46, 3, 'Ibeno', 'Akwa Ibom State'),
(47, 3, 'Ibesikpo Asutan', 'Akwa Ibom State'),
(48, 3, 'Ibiono-Ibom', 'Akwa Ibom State'),
(49, 3, 'Ika', 'Akwa Ibom State'),
(50, 3, 'Ikono', 'Akwa Ibom State'),
(51, 3, 'Ikot Abasi', 'Akwa Ibom State'),
(52, 3, 'Ikot Ekpene', 'Akwa Ibom State'),
(53, 3, 'Ini', 'Akwa Ibom State'),
(54, 3, 'Itu', 'Akwa Ibom State'),
(55, 3, 'Mbo', 'Akwa Ibom State'),
(56, 3, 'Mkpat-Enin', 'Akwa Ibom State'),
(57, 3, 'Nsit-Atai', 'Akwa Ibom State'),
(58, 3, 'Nsit-Ibom', 'Akwa Ibom State'),
(59, 3, 'Nsit-Ubium', 'Akwa Ibom State'),
(60, 3, 'Obot Akara', 'Akwa Ibom State'),
(61, 3, 'Okobo', 'Akwa Ibom State'),
(62, 3, 'Onna', 'Akwa Ibom State'),
(63, 3, 'Oron', 'Akwa Ibom State'),
(64, 3, 'Oruk Anam', 'Akwa Ibom State'),
(65, 3, 'Udung-Uko', 'Akwa Ibom State'),
(66, 3, 'Ukanafun', 'Akwa Ibom State'),
(67, 3, 'Uruan', 'Akwa Ibom State'),
(68, 3, 'Urue-Offong/Oruko', 'Akwa Ibom State'),
(69, 3, 'Uyo', 'Akwa Ibom State'),
(70, 4, 'Aguata', 'Anambra State'),
(71, 4, 'Anambra East', 'Anambra State'),
(72, 4, 'Anambra West', 'Anambra State'),
(73, 4, 'Anaocha', 'Anambra State'),
(74, 4, 'Awka North', 'Anambra State'),
(75, 4, 'Awka South', 'Anambra State'),
(76, 4, 'Ayamelum', 'Anambra State'),
(77, 4, 'Dunukofia', 'Anambra State'),
(78, 4, 'Ekwusigo', 'Anambra State'),
(79, 4, 'Idemili North', 'Anambra State'),
(80, 4, 'Idemili South', 'Anambra State'),
(81, 4, 'Ihiala', 'Anambra State'),
(82, 4, 'Njikoka', 'Anambra State'),
(83, 4, 'Nnewi North', 'Anambra State'),
(84, 4, 'Nnewi South', 'Anambra State'),
(85, 4, 'Ogbaru', 'Anambra State'),
(86, 4, 'Onitsha North', 'Anambra State'),
(87, 4, 'Onitsha South', 'Anambra State'),
(88, 4, 'Orumba North', 'Anambra State'),
(89, 4, 'Orumba South', 'Anambra State'),
(90, 4, 'Oyi', 'Anambra State'),
(91, 5, 'Alkaleri', 'Bauchi State'),
(92, 5, 'Bauchi', 'Bauchi State'),
(93, 5, 'Bogoro', 'Bauchi State'),
(94, 5, 'Damban', 'Bauchi State'),
(95, 5, 'Darazo', 'Bauchi State'),
(96, 5, 'Dass', 'Bauchi State'),
(97, 5, 'Gamawa', 'Bauchi State'),
(98, 5, 'Ganjuwa', 'Bauchi State'),
(99, 5, 'Giade', 'Bauchi State'),
(100, 5, 'Itas/Gadau', 'Bauchi State'),
(101, 5, 'Jama\'are', 'Bauchi State'),
(102, 5, 'Katagum', 'Bauchi State'),
(103, 5, 'Kirfi', 'Bauchi State'),
(104, 5, 'Misau', 'Bauchi State'),
(105, 5, 'Ningi', 'Bauchi State'),
(106, 5, 'Shira', 'Bauchi State'),
(107, 5, 'Tafawa Balewa', 'Bauchi State'),
(108, 5, 'Toro', 'Bauchi State'),
(109, 5, 'Warji', 'Bauchi State'),
(110, 5, 'Zaki', 'Bauchi State'),
(111, 6, 'Brass', 'Bayelsa State'),
(112, 6, 'Ekeremor', 'Bayelsa State'),
(113, 6, 'Kolokuma/Opokuma', 'Bayelsa State'),
(114, 6, 'Nembe', 'Bayelsa State'),
(115, 6, 'Ogbia', 'Bayelsa State'),
(116, 6, 'Sagbama', 'Bayelsa State'),
(117, 6, 'Southern Ijaw', 'Bayelsa State'),
(118, 6, 'Yenagoa', 'Bayelsa State'),
(119, 7, 'Agatu', 'Benue State'),
(120, 7, 'Apa', 'Benue State'),
(121, 7, 'Ado', 'Benue State'),
(122, 7, 'Buruku', 'Benue State'),
(123, 7, 'Gboko', 'Benue State'),
(124, 7, 'Guma', 'Benue State'),
(125, 7, 'Gwer East', 'Benue State'),
(126, 7, 'Gwer West', 'Benue State'),
(127, 7, 'Katsina-Ala', 'Benue State'),
(128, 7, 'Konshisha', 'Benue State'),
(129, 7, 'Kwande', 'Benue State'),
(130, 7, 'Logo', 'Benue State'),
(131, 7, 'Makurdi', 'Benue State'),
(132, 7, 'Obi', 'Benue State'),
(133, 7, 'Ogbadibo', 'Benue State'),
(134, 7, 'Ohimini', 'Benue State'),
(135, 7, 'Oju', 'Benue State'),
(136, 7, 'Okpokwu', 'Benue State'),
(137, 7, 'Oturkpo', 'Benue State'),
(138, 7, 'Tarka', 'Benue State'),
(139, 7, 'Ukum', 'Benue State'),
(140, 7, 'Ushongo', 'Benue State'),
(141, 7, 'Vandeikya', 'Benue State'),
(142, 8, 'Abadam', 'Borno State'),
(143, 8, 'Askira/Uba', 'Borno State'),
(144, 8, 'Bama', 'Borno State'),
(145, 8, 'Bayo', 'Borno State'),
(146, 8, 'Biu', 'Borno State'),
(147, 8, 'Chibok', 'Borno State'),
(148, 8, 'Damboa', 'Borno State'),
(149, 8, 'Dikwa', 'Borno State'),
(150, 8, 'Gubio', 'Borno State'),
(151, 8, 'Guzamala', 'Borno State'),
(152, 8, 'Gwoza', 'Borno State'),
(153, 8, 'Hawul', 'Borno State'),
(154, 8, 'Jere', 'Borno State'),
(155, 8, 'Kaga', 'Borno State'),
(156, 8, 'Kala/Balge', 'Borno State'),
(157, 8, 'Konduga', 'Borno State'),
(158, 8, 'Kukawa', 'Borno State'),
(159, 8, 'Kwaya Kusar', 'Borno State'),
(160, 8, 'Mafa', 'Borno State'),
(161, 8, 'Magumeri', 'Borno State'),
(162, 8, 'Maiduguri', 'Borno State'),
(163, 8, 'Marte', 'Borno State'),
(164, 8, 'Mobbar', 'Borno State'),
(165, 8, 'Monguno', 'Borno State'),
(166, 8, 'Ngala', 'Borno State'),
(167, 8, 'Nganzai', 'Borno State'),
(168, 8, 'Shani', 'Borno State'),
(169, 9, 'Abi', 'Cross River State'),
(170, 9, 'Akamkpa', 'Cross River State'),
(171, 9, 'Akpabuyo', 'Cross River State'),
(172, 9, 'Bakassi', 'Cross River State'),
(173, 9, 'Bekwarra', 'Cross River State'),
(174, 9, 'Biase', 'Cross River State'),
(175, 9, 'Boki', 'Cross River State'),
(176, 9, 'Calabar Municipal', 'Cross River State'),
(177, 9, 'Calabar South', 'Cross River State'),
(178, 9, 'Etung', 'Cross River State'),
(179, 9, 'Ikom', 'Cross River State'),
(180, 9, 'Obanliku', 'Cross River State'),
(181, 9, 'Obubra', 'Cross River State'),
(182, 9, 'Obudu', 'Cross River State'),
(183, 9, 'Odukpani', 'Cross River State'),
(184, 9, 'Ogoja', 'Cross River State'),
(185, 9, 'Yakuur', 'Cross River State'),
(186, 9, 'Yala', 'Cross River State'),
(187, 10, 'Aniocha North', 'Delta State'),
(188, 10, 'Aniocha South', 'Delta State'),
(189, 10, 'Bomadi', 'Delta State'),
(190, 10, 'Burutu', 'Delta State'),
(191, 10, 'Ethiope East', 'Delta State'),
(192, 10, 'Ethiope West', 'Delta State'),
(193, 10, 'Ika North East', 'Delta State'),
(194, 10, 'Ika South', 'Delta State'),
(195, 10, 'Isoko North', 'Delta State'),
(196, 10, 'Isoko South', 'Delta State'),
(197, 10, 'Ndokwa East', 'Delta State'),
(198, 10, 'Ndokwa West', 'Delta State'),
(199, 10, 'Okpe', 'Delta State'),
(200, 10, 'Oshimili North', 'Delta State'),
(201, 10, 'Oshimili South', 'Delta State'),
(202, 10, 'Patani', 'Delta State'),
(203, 10, 'Sapele', 'Delta State'),
(204, 10, 'Udu', 'Delta State'),
(205, 10, 'Ughelli North', 'Delta State'),
(206, 10, 'Ughelli South', 'Delta State'),
(207, 10, 'Ukwuani', 'Delta State'),
(208, 10, 'Uvwie', 'Delta State'),
(209, 10, 'Warri North', 'Delta State'),
(210, 10, 'Warri South', 'Delta State'),
(211, 10, 'Warri South West', 'Delta State'),
(212, 11, 'Abakaliki', 'Ebonyi State'),
(213, 11, 'Afikpo North', 'Ebonyi State'),
(214, 11, 'Afikpo South', 'Ebonyi State'),
(215, 11, 'Ebonyi', 'Ebonyi State'),
(216, 11, 'Ezza North', 'Ebonyi State'),
(217, 11, 'Ezza South', 'Ebonyi State'),
(218, 11, 'Ikwo', 'Ebonyi State'),
(219, 11, 'Ishielu', 'Ebonyi State'),
(220, 11, 'Ivo', 'Ebonyi State'),
(221, 11, 'Izzi', 'Ebonyi State'),
(222, 11, 'Ohaozara', 'Ebonyi State'),
(223, 11, 'Ohaukwu', 'Ebonyi State'),
(224, 11, 'Onicha', 'Ebonyi State'),
(225, 12, 'Akoko-Edo', 'Edo State'),
(226, 12, 'Egor', 'Edo State'),
(227, 12, 'Esan Central', 'Edo State'),
(228, 12, 'Esan North-East', 'Edo State'),
(229, 12, 'Esan South-East', 'Edo State'),
(230, 12, 'Esan West', 'Edo State'),
(231, 12, 'Etsako Central', 'Edo State'),
(232, 12, 'Etsako East', 'Edo State'),
(233, 12, 'Etsako West', 'Edo State'),
(234, 12, 'Igueben', 'Edo State'),
(235, 12, 'Ikpoba Okha', 'Edo State'),
(236, 12, 'Orhionmwon', 'Edo State'),
(237, 12, 'Oredo', 'Edo State'),
(238, 12, 'Ovia North-East', 'Edo State'),
(239, 12, 'Ovia South-West', 'Edo State'),
(240, 12, 'Owan East', 'Edo State'),
(241, 12, 'Owan West', 'Edo State'),
(242, 12, 'Uhunmwonde', 'Edo State'),
(243, 13, 'Ado Ekiti', 'Ekiti State'),
(244, 13, 'Efon', 'Ekiti State'),
(245, 13, 'Ekiti East', 'Ekiti State'),
(246, 13, 'Ekiti South-West', 'Ekiti State'),
(247, 13, 'Ekiti West', 'Ekiti State'),
(248, 13, 'Emure', 'Ekiti State'),
(249, 13, 'Gbonyin', 'Ekiti State'),
(250, 13, 'Ido Osi', 'Ekiti State'),
(251, 13, 'Ijero', 'Ekiti State'),
(252, 13, 'Ikere', 'Ekiti State'),
(253, 13, 'Ikole', 'Ekiti State'),
(254, 13, 'Ilejemeje', 'Ekiti State'),
(255, 13, 'Irepodun/Ifelodun', 'Ekiti State'),
(256, 13, 'Ise/Orun', 'Ekiti State'),
(257, 13, 'Moba', 'Ekiti State'),
(258, 13, 'Oye', 'Ekiti State'),
(259, 14, 'Aninri', 'Enugu State'),
(260, 14, 'Awgu', 'Enugu State'),
(261, 14, 'Enugu East', 'Enugu State'),
(262, 14, 'Enugu North', 'Enugu State'),
(263, 14, 'Enugu South', 'Enugu State'),
(264, 14, 'Ezeagu', 'Enugu State'),
(265, 14, 'Igbo Etiti', 'Enugu State'),
(266, 14, 'Igbo Eze North', 'Enugu State'),
(267, 14, 'Igbo Eze South', 'Enugu State'),
(268, 14, 'Isi Uzo', 'Enugu State'),
(269, 14, 'Nkanu East', 'Enugu State'),
(270, 14, 'Nkanu West', 'Enugu State'),
(271, 14, 'Nsukka', 'Enugu State'),
(272, 14, 'Oji River', 'Enugu State'),
(273, 14, 'Udenu', 'Enugu State'),
(274, 14, 'Udi', 'Enugu State'),
(275, 14, 'Uzo Uwani', 'Enugu State'),
(276, 15, 'Abaji', 'FCT'),
(277, 15, 'Bwari', 'FCT'),
(278, 15, 'Gwagwalada', 'FCT'),
(279, 15, 'Kuje', 'FCT'),
(280, 15, 'Kwali', 'FCT'),
(281, 15, 'Municipal Area Council', 'FCT'),
(282, 16, 'Akko', 'Gombe State'),
(283, 16, 'Balanga', 'Gombe State'),
(284, 16, 'Billiri', 'Gombe State'),
(285, 16, 'Dukku', 'Gombe State'),
(286, 16, 'Funakaye', 'Gombe State'),
(287, 16, 'Gombe', 'Gombe State'),
(288, 16, 'Kaltungo', 'Gombe State'),
(289, 16, 'Kwami', 'Gombe State'),
(290, 16, 'Nafada', 'Gombe State'),
(291, 16, 'Shongom', 'Gombe State'),
(292, 16, 'Yamaltu/Deba', 'Gombe State'),
(293, 17, 'Aboh Mbaise', 'Imo State'),
(294, 17, 'Ahiazu Mbaise', 'Imo State'),
(295, 17, 'Ehime Mbano', 'Imo State'),
(296, 17, 'Ezinihitte', 'Imo State'),
(297, 17, 'Ideato North', 'Imo State'),
(298, 17, 'Ideato South', 'Imo State'),
(299, 17, 'Ihitte/Uboma', 'Imo State'),
(300, 17, 'Ikeduru', 'Imo State'),
(301, 17, 'Isiala Mbano', 'Imo State'),
(302, 17, 'Isu', 'Imo State'),
(303, 17, 'Mbaitoli', 'Imo State'),
(304, 17, 'Ngor Okpala', 'Imo State'),
(305, 17, 'Njaba', 'Imo State'),
(306, 17, 'Nkwerre', 'Imo State'),
(307, 17, 'Nwangele', 'Imo State'),
(308, 17, 'Obowo', 'Imo State'),
(309, 17, 'Oguta', 'Imo State'),
(310, 17, 'Ohaji/Egbema', 'Imo State'),
(311, 17, 'Okigwe', 'Imo State'),
(312, 17, 'Orlu', 'Imo State'),
(313, 17, 'Orsu', 'Imo State'),
(314, 17, 'Oru East', 'Imo State'),
(315, 17, 'Oru West', 'Imo State'),
(316, 17, 'Owerri Municipal', 'Imo State'),
(317, 17, 'Owerri North', 'Imo State'),
(318, 17, 'Owerri West', 'Imo State'),
(319, 17, 'Unuimo', 'Imo State'),
(320, 18, 'Auyo', 'Jigawa State'),
(321, 18, 'Babura', 'Jigawa State'),
(322, 18, 'Biriniwa', 'Jigawa State'),
(323, 18, 'Birnin Kudu', 'Jigawa State'),
(324, 18, 'Buji', 'Jigawa State'),
(325, 18, 'Dutse', 'Jigawa State'),
(326, 18, 'Gagarawa', 'Jigawa State'),
(327, 18, 'Garki', 'Jigawa State'),
(328, 18, 'Gumel', 'Jigawa State'),
(329, 18, 'Guri', 'Jigawa State'),
(330, 18, 'Gwaram', 'Jigawa State'),
(331, 18, 'Gwiwa', 'Jigawa State'),
(332, 18, 'Hadejia', 'Jigawa State'),
(333, 18, 'Jahun', 'Jigawa State'),
(334, 18, 'Kafin Hausa', 'Jigawa State'),
(335, 18, 'Kazaure', 'Jigawa State'),
(336, 18, 'Kiri Kasama', 'Jigawa State'),
(337, 18, 'Kiyawa', 'Jigawa State'),
(338, 18, 'Kaugama', 'Jigawa State'),
(339, 18, 'Maigatari', 'Jigawa State'),
(340, 18, 'Malam Madori', 'Jigawa State'),
(341, 18, 'Miga', 'Jigawa State'),
(342, 18, 'Ringim', 'Jigawa State'),
(343, 18, 'Roni', 'Jigawa State'),
(344, 18, 'Sule Tankarkar', 'Jigawa State'),
(345, 18, 'Taura', 'Jigawa State'),
(346, 18, 'Yankwashi', 'Jigawa State'),
(347, 19, 'Birnin Gwari', 'Kaduna State'),
(348, 19, 'Chikun', 'Kaduna State'),
(349, 19, 'Giwa', 'Kaduna State'),
(350, 19, 'Igabi', 'Kaduna State'),
(351, 19, 'Ikara', 'Kaduna State'),
(352, 19, 'Jaba', 'Kaduna State'),
(353, 19, 'Jema\'a', 'Kaduna State'),
(354, 19, 'Kachia', 'Kaduna State'),
(355, 19, 'Kaduna North', 'Kaduna State'),
(356, 19, 'Kaduna South', 'Kaduna State'),
(357, 19, 'Kagarko', 'Kaduna State'),
(358, 19, 'Kajuru', 'Kaduna State'),
(359, 19, 'Kaura', 'Kaduna State'),
(360, 19, 'Kauru', 'Kaduna State'),
(361, 19, 'Kubau', 'Kaduna State'),
(362, 19, 'Kudan', 'Kaduna State'),
(363, 19, 'Lere', 'Kaduna State'),
(364, 19, 'Makarfi', 'Kaduna State'),
(365, 19, 'Sabon Gari', 'Kaduna State'),
(366, 19, 'Sanga', 'Kaduna State'),
(367, 19, 'Soba', 'Kaduna State'),
(368, 19, 'Zangon Kataf', 'Kaduna State'),
(369, 19, 'Zaria', 'Kaduna State'),
(370, 20, 'Ajingi', 'Kano State'),
(371, 20, 'Albasu', 'Kano State'),
(372, 20, 'Bagwai', 'Kano State'),
(373, 20, 'Bebeji', 'Kano State'),
(374, 20, 'Bichi', 'Kano State'),
(375, 20, 'Bunkure', 'Kano State'),
(376, 20, 'Dala', 'Kano State'),
(377, 20, 'Dambatta', 'Kano State'),
(378, 20, 'Dawakin Kudu', 'Kano State'),
(379, 20, 'Dawakin Tofa', 'Kano State'),
(380, 20, 'Doguwa', 'Kano State'),
(381, 20, 'Fagge', 'Kano State'),
(382, 20, 'Gabasawa', 'Kano State'),
(383, 20, 'Garko', 'Kano State'),
(384, 20, 'Garun Mallam', 'Kano State'),
(385, 20, 'Gaya', 'Kano State'),
(386, 20, 'Gezawa', 'Kano State'),
(387, 20, 'Gwale', 'Kano State'),
(388, 20, 'Gwarzo', 'Kano State'),
(389, 20, 'Kabo', 'Kano State'),
(390, 20, 'Kano Municipal', 'Kano State'),
(391, 20, 'Karaye', 'Kano State'),
(392, 20, 'Kibiya', 'Kano State'),
(393, 20, 'Kiru', 'Kano State'),
(394, 20, 'Kumbotso', 'Kano State'),
(395, 20, 'Kunchi', 'Kano State'),
(396, 20, 'Kura', 'Kano State'),
(397, 20, 'Madobi', 'Kano State'),
(398, 20, 'Makoda', 'Kano State'),
(399, 20, 'Minjibir', 'Kano State'),
(400, 20, 'Nasarawa', 'Kano State'),
(401, 20, 'Rano', 'Kano State'),
(402, 20, 'Rimin Gado', 'Kano State'),
(403, 20, 'Rogo', 'Kano State'),
(404, 20, 'Shanono', 'Kano State'),
(405, 20, 'Sumaila', 'Kano State'),
(406, 20, 'Takai', 'Kano State'),
(407, 20, 'Tarauni', 'Kano State'),
(408, 20, 'Tofa', 'Kano State'),
(409, 20, 'Tsanyawa', 'Kano State'),
(410, 20, 'Tudun Wada', 'Kano State'),
(411, 20, 'Ungogo', 'Kano State'),
(412, 20, 'Warawa', 'Kano State'),
(413, 20, 'Wudil', 'Kano State'),
(414, 21, 'Bakori', 'Katsina State'),
(415, 21, 'Batagarawa', 'Katsina State'),
(416, 21, 'Batsari', 'Katsina State'),
(417, 21, 'Baure', 'Katsina State'),
(418, 21, 'Bindawa', 'Katsina State'),
(419, 21, 'Charanchi', 'Katsina State'),
(420, 21, 'Dandume', 'Katsina State'),
(421, 21, 'Danja', 'Katsina State'),
(422, 21, 'Dan Musa', 'Katsina State'),
(423, 21, 'Daura', 'Katsina State'),
(424, 21, 'Dutsi', 'Katsina State'),
(425, 21, 'Dutsin Ma', 'Katsina State'),
(426, 21, 'Faskari', 'Katsina State'),
(427, 21, 'Funtua', 'Katsina State'),
(428, 21, 'Ingawa', 'Katsina State'),
(429, 21, 'Jibia', 'Katsina State'),
(430, 21, 'Kafur', 'Katsina State'),
(431, 21, 'Kaita', 'Katsina State'),
(432, 21, 'Kankara', 'Katsina State'),
(433, 21, 'Kankia', 'Katsina State'),
(434, 21, 'Katsina', 'Katsina State'),
(435, 21, 'Kurfi', 'Katsina State'),
(436, 21, 'Kusada', 'Katsina State'),
(437, 21, 'Mai\'Adua', 'Katsina State'),
(438, 21, 'Malumfashi', 'Katsina State'),
(439, 21, 'Mani', 'Katsina State'),
(440, 21, 'Mashi', 'Katsina State'),
(441, 21, 'Matazu', 'Katsina State'),
(442, 21, 'Musawa', 'Katsina State'),
(443, 21, 'Rimi', 'Katsina State'),
(444, 21, 'Sabuwa', 'Katsina State'),
(445, 21, 'Safana', 'Katsina State'),
(446, 21, 'Sandamu', 'Katsina State'),
(447, 21, 'Zango', 'Katsina State'),
(448, 22, 'Aleiro', 'Kebbi State'),
(449, 22, 'Arewa Dandi', 'Kebbi State'),
(450, 22, 'Argungu', 'Kebbi State'),
(451, 22, 'Augie', 'Kebbi State'),
(452, 22, 'Bagudo', 'Kebbi State'),
(453, 22, 'Birnin Kebbi', 'Kebbi State'),
(454, 22, 'Bunza', 'Kebbi State'),
(455, 22, 'Dandi', 'Kebbi State'),
(456, 22, 'Fakai', 'Kebbi State'),
(457, 22, 'Gwandu', 'Kebbi State'),
(458, 22, 'Jega', 'Kebbi State'),
(459, 22, 'Kalgo', 'Kebbi State'),
(460, 22, 'Koko/Besse', 'Kebbi State'),
(461, 22, 'Maiyama', 'Kebbi State'),
(462, 22, 'Ngaski', 'Kebbi State'),
(463, 22, 'Sakaba', 'Kebbi State'),
(464, 22, 'Shanga', 'Kebbi State'),
(465, 22, 'Suru', 'Kebbi State'),
(466, 22, 'Wasagu/Danko', 'Kebbi State'),
(467, 22, 'Yauri', 'Kebbi State'),
(468, 22, 'Zuru', 'Kebbi State'),
(469, 23, 'Adavi', 'Kogi State'),
(470, 23, 'Ajaokuta', 'Kogi State'),
(471, 23, 'Ankpa', 'Kogi State'),
(472, 23, 'Bassa', 'Kogi State'),
(473, 23, 'Dekina', 'Kogi State'),
(474, 23, 'Ibaji', 'Kogi State'),
(475, 23, 'Idah', 'Kogi State'),
(476, 23, 'Igalamela Odolu', 'Kogi State'),
(477, 23, 'Ijumu', 'Kogi State'),
(478, 23, 'Kabba/Bunu', 'Kogi State'),
(479, 23, 'Kogi', 'Kogi State'),
(480, 23, 'Lokoja', 'Kogi State'),
(481, 23, 'Mopa Muro', 'Kogi State'),
(482, 23, 'Ofu', 'Kogi State'),
(483, 23, 'Ogori/Magongo', 'Kogi State'),
(484, 23, 'Okehi', 'Kogi State'),
(485, 23, 'Okene', 'Kogi State'),
(486, 23, 'Olamaboro', 'Kogi State'),
(487, 23, 'Omala', 'Kogi State'),
(488, 23, 'Yagba East', 'Kogi State'),
(489, 23, 'Yagba West', 'Kogi State'),
(490, 24, 'Asa', 'Kwara State'),
(491, 24, 'Baruten', 'Kwara State'),
(492, 24, 'Edu', 'Kwara State'),
(493, 24, 'Ekiti', 'Kwara State'),
(494, 24, 'Ifelodun', 'Kwara State'),
(495, 24, 'Ilorin East', 'Kwara State'),
(496, 24, 'Ilorin South', 'Kwara State'),
(497, 24, 'Ilorin West', 'Kwara State'),
(498, 24, 'Irepodun', 'Kwara State'),
(499, 24, 'Isin', 'Kwara State'),
(500, 24, 'Kaiama', 'Kwara State'),
(501, 24, 'Moro', 'Kwara State'),
(502, 24, 'Offa', 'Kwara State'),
(503, 24, 'Oke Ero', 'Kwara State'),
(504, 24, 'Oyun', 'Kwara State'),
(505, 24, 'Pategi', 'Kwara State'),
(506, 25, 'Agege', 'Lagos State'),
(507, 25, 'Ajeromi-Ifelodun', 'Lagos State'),
(508, 25, 'Alimosho', 'Lagos State'),
(509, 25, 'Amuwo-Odofin', 'Lagos State'),
(510, 25, 'Apapa', 'Lagos State'),
(511, 25, 'Badagry', 'Lagos State'),
(512, 25, 'Epe', 'Lagos State'),
(513, 25, 'Eti Osa', 'Lagos State'),
(514, 25, 'Ibeju-Lekki', 'Lagos State'),
(515, 25, 'Ifako-Ijaiye', 'Lagos State'),
(516, 25, 'Ikeja', 'Lagos State'),
(517, 25, 'Ikorodu', 'Lagos State'),
(518, 25, 'Kosofe', 'Lagos State'),
(519, 25, 'Lagos Island', 'Lagos State'),
(520, 25, 'Lagos Mainland', 'Lagos State'),
(521, 25, 'Mushin', 'Lagos State'),
(522, 25, 'Ojo', 'Lagos State'),
(523, 25, 'Oshodi-Isolo', 'Lagos State'),
(524, 25, 'Shomolu', 'Lagos State'),
(525, 25, 'Surulere', 'Lagos State'),
(526, 26, 'Akwanga', 'Nasarawa State'),
(527, 26, 'Awe', 'Nasarawa State'),
(528, 26, 'Doma', 'Nasarawa State'),
(529, 26, 'Karu', 'Nasarawa State'),
(530, 26, 'Keana', 'Nasarawa State'),
(531, 26, 'Keffi', 'Nasarawa State'),
(532, 26, 'Kokona', 'Nasarawa State'),
(533, 26, 'Lafia', 'Nasarawa State'),
(534, 26, 'Nasarawa', 'Nasarawa State'),
(535, 26, 'Nasarawa Egon', 'Nasarawa State'),
(536, 26, 'Obi', 'Nasarawa State'),
(537, 26, 'Toto', 'Nasarawa State'),
(538, 26, 'Wamba', 'Nasarawa State'),
(539, 27, 'Agaie', 'Niger State'),
(540, 27, 'Agwara', 'Niger State'),
(541, 27, 'Bida', 'Niger State'),
(542, 27, 'Borgu', 'Niger State'),
(543, 27, 'Bosso', 'Niger State'),
(544, 27, 'Chanchaga', 'Niger State'),
(545, 27, 'Edati', 'Niger State'),
(546, 27, 'Gbako', 'Niger State'),
(547, 27, 'Gurara', 'Niger State'),
(548, 27, 'Katcha', 'Niger State'),
(549, 27, 'Kontagora', 'Niger State'),
(550, 27, 'Lapai', 'Niger State'),
(551, 27, 'Lavun', 'Niger State'),
(552, 27, 'Magama', 'Niger State'),
(553, 27, 'Mariga', 'Niger State'),
(554, 27, 'Mashegu', 'Niger State'),
(555, 27, 'Mokwa', 'Niger State'),
(556, 27, 'Moya', 'Niger State'),
(557, 27, 'Paikoro', 'Niger State'),
(558, 27, 'Rafi', 'Niger State'),
(559, 27, 'Rijau', 'Niger State'),
(560, 27, 'Shiroro', 'Niger State'),
(561, 27, 'Suleja', 'Niger State'),
(562, 27, 'Tafa', 'Niger State'),
(563, 27, 'Wushishi', 'Niger State'),
(564, 28, 'Abeokuta North', 'Ogun State'),
(565, 28, 'Abeokuta South', 'Ogun State'),
(566, 28, 'Ado-Odo/Ota', 'Ogun State'),
(567, 28, 'Egbado North', 'Ogun State'),
(568, 28, 'Egbado South', 'Ogun State'),
(569, 28, 'Ewekoro', 'Ogun State'),
(570, 28, 'Ifo', 'Ogun State'),
(571, 28, 'Ijebu East', 'Ogun State'),
(572, 28, 'Ijebu North', 'Ogun State'),
(573, 28, 'Ijebu North East', 'Ogun State'),
(574, 28, 'Ijebu Ode', 'Ogun State'),
(575, 28, 'Ikenne', 'Ogun State'),
(576, 28, 'Imeko Afon', 'Ogun State'),
(577, 28, 'Ipokia', 'Ogun State'),
(578, 28, 'Obafemi Owode', 'Ogun State'),
(579, 28, 'Odeda', 'Ogun State'),
(580, 28, 'Odogbolu', 'Ogun State'),
(581, 28, 'Ogun Waterside', 'Ogun State'),
(582, 28, 'Remo North', 'Ogun State'),
(583, 28, 'Shagamu', 'Ogun State'),
(584, 29, 'Akoko North-East', 'Ondo State'),
(585, 29, 'Akoko North-West', 'Ondo State'),
(586, 29, 'Akoko South-West', 'Ondo State'),
(587, 29, 'Akoko South-East', 'Ondo State'),
(588, 29, 'Akure North', 'Ondo State'),
(589, 29, 'Akure South', 'Ondo State'),
(590, 29, 'Ese Odo', 'Ondo State'),
(591, 29, 'Idanre', 'Ondo State'),
(592, 29, 'Ifedore', 'Ondo State'),
(593, 29, 'Ilaje', 'Ondo State'),
(594, 29, 'Ile Oluji/Okeigbo', 'Ondo State'),
(595, 29, 'Irele', 'Ondo State'),
(596, 29, 'Odigbo', 'Ondo State'),
(597, 29, 'Okitipupa', 'Ondo State'),
(598, 29, 'Ondo East', 'Ondo State'),
(599, 29, 'Ondo West', 'Ondo State'),
(600, 29, 'Ose', 'Ondo State'),
(601, 29, 'Owo', 'Ondo State'),
(602, 30, 'Atakunmosa East', 'Osun State'),
(603, 30, 'Atakunmosa West', 'Osun State'),
(604, 30, 'Aiyedaade', 'Osun State'),
(605, 30, 'Aiyedire', 'Osun State'),
(606, 30, 'Boluwaduro', 'Osun State'),
(607, 30, 'Boripe', 'Osun State'),
(608, 30, 'Ede North', 'Osun State'),
(609, 30, 'Ede South', 'Osun State'),
(610, 30, 'Ife Central', 'Osun State'),
(611, 30, 'Ife East', 'Osun State'),
(612, 30, 'Ife North', 'Osun State'),
(613, 30, 'Ife South', 'Osun State'),
(614, 30, 'Egbedore', 'Osun State'),
(615, 30, 'Ejigbo', 'Osun State'),
(616, 30, 'Ifedayo', 'Osun State'),
(617, 30, 'Ifelodun', 'Osun State'),
(618, 30, 'Ila', 'Osun State'),
(619, 30, 'Ilesa East', 'Osun State'),
(620, 30, 'Ilesa West', 'Osun State'),
(621, 30, 'Irepodun', 'Osun State'),
(622, 30, 'Irewole', 'Osun State'),
(623, 30, 'Isokan', 'Osun State'),
(624, 30, 'Iwo', 'Osun State'),
(625, 30, 'Obokun', 'Osun State'),
(626, 30, 'Odo Otin', 'Osun State'),
(627, 30, 'Ola Oluwa', 'Osun State'),
(628, 30, 'Olorunda', 'Osun State'),
(629, 30, 'Oriade', 'Osun State'),
(630, 30, 'Orolu', 'Osun State'),
(631, 30, 'Osogbo', 'Osun State'),
(632, 31, 'Afijio', 'Oyo State'),
(633, 31, 'Akinyele', 'Oyo State'),
(634, 31, 'Atiba', 'Oyo State'),
(635, 31, 'Atisbo', 'Oyo State'),
(636, 31, 'Egbeda', 'Oyo State'),
(637, 31, 'Ibadan North', 'Oyo State'),
(638, 31, 'Ibadan North-East', 'Oyo State'),
(639, 31, 'Ibadan North-West', 'Oyo State'),
(640, 31, 'Ibadan South-East', 'Oyo State'),
(641, 31, 'Ibadan South-West', 'Oyo State'),
(642, 31, 'Ibarapa Central', 'Oyo State'),
(643, 31, 'Ibarapa East', 'Oyo State'),
(644, 31, 'Ibarapa North', 'Oyo State'),
(645, 31, 'Ido', 'Oyo State'),
(646, 31, 'Irepo', 'Oyo State'),
(647, 31, 'Iseyin', 'Oyo State'),
(648, 31, 'Itesiwaju', 'Oyo State'),
(649, 31, 'Iwajowa', 'Oyo State'),
(650, 31, 'Kajola', 'Oyo State'),
(651, 31, 'Lagelu', 'Oyo State'),
(652, 31, 'Ogbomosho North', 'Oyo State'),
(653, 31, 'Ogbomosho South', 'Oyo State'),
(654, 31, 'Ogo Oluwa', 'Oyo State'),
(655, 31, 'Olorunsogo', 'Oyo State'),
(656, 31, 'Oluyole', 'Oyo State'),
(657, 31, 'Ona Ara', 'Oyo State'),
(658, 31, 'Orelope', 'Oyo State'),
(659, 31, 'Ori Ire', 'Oyo State'),
(660, 31, 'Oyo', 'Oyo State'),
(661, 31, 'Oyo East', 'Oyo State'),
(662, 31, 'Saki East', 'Oyo State'),
(663, 31, 'Saki West', 'Oyo State'),
(664, 31, 'Surulere', 'Oyo State'),
(665, 32, 'Bokkos', 'Plateau State'),
(666, 32, 'Barkin Ladi', 'Plateau State'),
(667, 32, 'Bassa', 'Plateau State'),
(668, 32, 'Jos East', 'Plateau State'),
(669, 32, 'Jos North', 'Plateau State'),
(670, 32, 'Jos South', 'Plateau State'),
(671, 32, 'Kanam', 'Plateau State'),
(672, 32, 'Kanke', 'Plateau State'),
(673, 32, 'Langtang South', 'Plateau State'),
(674, 32, 'Langtang North', 'Plateau State'),
(675, 32, 'Mangu', 'Plateau State'),
(676, 32, 'Mikang', 'Plateau State'),
(677, 32, 'Pankshin', 'Plateau State'),
(678, 32, 'Qua\'an Pan', 'Plateau State'),
(679, 32, 'Riyom', 'Plateau State'),
(680, 32, 'Shendam', 'Plateau State'),
(681, 32, 'Wase', 'Plateau State'),
(682, 33, 'Abua/Odual', 'Rivers State'),
(683, 33, 'Ahoada East', 'Rivers State'),
(684, 33, 'Ahoada West', 'Rivers State'),
(685, 33, 'Akuku-Toru', 'Rivers State'),
(686, 33, 'Andoni', 'Rivers State'),
(687, 33, 'Asari-Toru', 'Rivers State'),
(688, 33, 'Bonny', 'Rivers State'),
(689, 33, 'Degema', 'Rivers State'),
(690, 33, 'Eleme', 'Rivers State'),
(691, 33, 'Emuoha', 'Rivers State'),
(692, 33, 'Etche', 'Rivers State'),
(693, 33, 'Gokana', 'Rivers State'),
(694, 33, 'Ikwerre', 'Rivers State'),
(695, 33, 'Khana', 'Rivers State'),
(696, 33, 'Obio/Akpor', 'Rivers State'),
(697, 33, 'Ogba/Egbema/Ndoni', 'Rivers State'),
(698, 33, 'Ogu/Bolo', 'Rivers State'),
(699, 33, 'Okrika', 'Rivers State'),
(700, 33, 'Omuma', 'Rivers State'),
(701, 33, 'Opobo/Nkoro', 'Rivers State'),
(702, 33, 'Oyigbo', 'Rivers State'),
(703, 33, 'Port Harcourt', 'Rivers State'),
(704, 33, 'Tai', 'Rivers State'),
(705, 34, 'Binji', 'Sokoto State'),
(706, 34, 'Bodinga', 'Sokoto State'),
(707, 34, 'Dange Shuni', 'Sokoto State'),
(708, 34, 'Gada', 'Sokoto State'),
(709, 34, 'Goronyo', 'Sokoto State'),
(710, 34, 'Gudu', 'Sokoto State'),
(711, 34, 'Gwadabawa', 'Sokoto State'),
(712, 34, 'Illela', 'Sokoto State'),
(713, 34, 'Isa', 'Sokoto State'),
(714, 34, 'Kebbe', 'Sokoto State'),
(715, 34, 'Kware', 'Sokoto State'),
(716, 34, 'Rabah', 'Sokoto State'),
(717, 34, 'Sabon Birni', 'Sokoto State'),
(718, 34, 'Shagari', 'Sokoto State'),
(719, 34, 'Silame', 'Sokoto State'),
(720, 34, 'Sokoto North', 'Sokoto State'),
(721, 34, 'Sokoto South', 'Sokoto State'),
(722, 34, 'Tambuwal', 'Sokoto State'),
(723, 34, 'Tangaza', 'Sokoto State'),
(724, 34, 'Tureta', 'Sokoto State'),
(725, 34, 'Wamako', 'Sokoto State'),
(726, 34, 'Wurno', 'Sokoto State'),
(727, 34, 'Yabo', 'Sokoto State'),
(728, 35, 'Ardo Kola', 'Taraba State'),
(729, 35, 'Bali', 'Taraba State'),
(730, 35, 'Donga', 'Taraba State'),
(731, 35, 'Gashaka', 'Taraba State'),
(732, 35, 'Gassol', 'Taraba State'),
(733, 35, 'Ibi', 'Taraba State'),
(734, 35, 'Jalingo', 'Taraba State'),
(735, 35, 'Karim Lamido', 'Taraba State'),
(736, 35, 'Kumi', 'Taraba State'),
(737, 35, 'Lau', 'Taraba State'),
(738, 35, 'Sardauna', 'Taraba State'),
(739, 35, 'Takum', 'Taraba State'),
(740, 35, 'Ussa', 'Taraba State'),
(741, 35, 'Wukari', 'Taraba State'),
(742, 35, 'Yorro', 'Taraba State'),
(743, 35, 'Zing', 'Taraba State'),
(744, 36, 'Bade', 'Yobe State'),
(745, 36, 'Bursari', 'Yobe State'),
(746, 36, 'Damaturu', 'Yobe State'),
(747, 36, 'Fika', 'Yobe State'),
(748, 36, 'Fune', 'Yobe State'),
(749, 36, 'Geidam', 'Yobe State'),
(750, 36, 'Gujba', 'Yobe State'),
(751, 36, 'Gulani', 'Yobe State'),
(752, 36, 'Jakusko', 'Yobe State'),
(753, 36, 'Karasuwa', 'Yobe State'),
(754, 36, 'Machina', 'Yobe State'),
(755, 36, 'Nangere', 'Yobe State'),
(756, 36, 'Nguru', 'Yobe State'),
(757, 36, 'Potiskum', 'Yobe State'),
(758, 36, 'Tarmuwa', 'Yobe State'),
(759, 36, 'Yunusari', 'Yobe State'),
(760, 36, 'Yusufari', 'Yobe State'),
(761, 37, 'Anka', 'Zamfara State'),
(762, 37, 'Bakura', 'Zamfara State'),
(763, 37, 'Birnin Magaji/Kiyaw', 'Zamfara State'),
(764, 37, 'Bukkuyum', 'Zamfara State'),
(765, 37, 'Bungudu', 'Zamfara State'),
(766, 37, 'Gummi', 'Zamfara State'),
(767, 37, 'Gusau', 'Zamfara State'),
(768, 37, 'Kaura Namoda', 'Zamfara State'),
(769, 37, 'Maradun', 'Zamfara State'),
(770, 37, 'Maru', 'Zamfara State'),
(771, 37, 'Shinkafi', 'Zamfara State'),
(772, 37, 'Talata Mafara', 'Zamfara State'),
(773, 37, 'Chafe', 'Zamfara State'),
(774, 37, 'Zurmi', 'Zamfara State');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emal` varchar(30) NOT NULL,
  `prog` varchar(40) NOT NULL,
  `course` varchar(30) NOT NULL,
  `session` varchar(10) NOT NULL,
  `paymdate` varchar(30) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `emal`, `prog`, `course`, `session`, `paymdate`, `amount`) VALUES
(1, 'Yakubu Eriayo Joyful', 'eriyaks@gmail.com', 'ND full time', 'Computer Engineering', '2019/2020', 'Oct 22, 2019 08:22 pm', '1500'),
(2, 'Ajayi Taiwo Joshua', 'taiwo@gmail.com', 'HND Full Time', 'Business Administration', '2019/2020', 'Oct 22, 2019 10:23 pm', '1500'),
(3, 'Ogunjobi Jumoke Anu', 'jumoke@gmail.com', 'ND Part Time', 'Accountancy', '2019/2020', 'Oct 22, 2019 10:37 pm', '1500'),
(4, 'Ayodele Dorcas Oyindamola', 'ayodeledoc@gmail.com', 'ND Full Time', 'Science Laboratory Technology', '2019/2020', 'Oct 22, 2019 11:43 pm', '1500'),
(5, 'Babatunde Kayode', 'kayode@gmail.com', 'HND Full Time', 'Quantity Survey', '2019/2020', 'Oct 22, 2019 11:48 pm', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `states` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `states`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue  '),
(8, 'Borno'),
(9, 'Cross River  '),
(10, 'Delta'),
(11, 'Ebonyi '),
(12, ' Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT '),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina  '),
(22, 'Kebbi'),
(23, 'Kogi  '),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun  '),
(29, 'Ondo'),
(30, ' Osun'),
(31, 'Oyo'),
(32, 'Plateau '),
(33, 'Rivers   '),
(34, 'Sokoto '),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `subgrade`
--

CREATE TABLE `subgrade` (
  `id` int(11) NOT NULL,
  `resultid` int(11) NOT NULL,
  `subject1` varchar(30) NOT NULL,
  `gradn1` varchar(4) NOT NULL,
  `subject2` varchar(30) NOT NULL,
  `gradn2` varchar(4) NOT NULL,
  `subject3` varchar(30) NOT NULL,
  `gradn3` varchar(4) NOT NULL,
  `subject4` varchar(30) NOT NULL,
  `gradn4` varchar(4) NOT NULL,
  `subject5` varchar(30) NOT NULL,
  `gradn5` varchar(4) NOT NULL,
  `subject6` varchar(30) NOT NULL,
  `gradn6` varchar(4) NOT NULL,
  `subject7` varchar(30) NOT NULL,
  `gradn7` varchar(4) NOT NULL,
  `subject8` varchar(30) NOT NULL,
  `gradn8` varchar(4) NOT NULL,
  `subject9` varchar(30) NOT NULL,
  `gradn9` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subgrade`
--

INSERT INTO `subgrade` (`id`, `resultid`, `subject1`, `gradn1`, `subject2`, `gradn2`, `subject3`, `gradn3`, `subject4`, `gradn4`, `subject5`, `gradn5`, `subject6`, `gradn6`, `subject7`, `gradn7`, `subject8`, `gradn8`, `subject9`, `gradn9`) VALUES
(5, 0, 'English', 'B2', 'Mathematics', 'C5', 'Physics', 'B2', 'Chemistry', 'A1', 'Biology', 'B3', 'Geography', 'B2', 'Technical Drawing', 'B3', 'Civic Education', 'C4', 'Yoruba', 'C6'),
(6, 0, 'English', 'sele', 'Mathematics', 'sele', 'Government', 'sele', 'CRK', 'sele', 'Economics', 'sele', 'select', 'sele', 'select', 'sele', 'nil', 'nil', 'select', 'sele'),
(7, 0, 'English', 'A1', 'Mathematics', 'B3', 'Literature', 'C5', 'Economics', 'B2', 'Biology', 'A1', 'select', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil'),
(8, 0, 'English', 'A1', 'Mathematics', 'A1', 'Biology', 'A1', 'Physics', 'A1', 'Chemistry', 'A1', 'select', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil'),
(9, 0, 'English', 'B2', 'English', 'B2', 'Physics', 'B2', 'Chemistry', 'B2', 'Technical Drawing', 'B2', 'select', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil', 'nil');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjects` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subjects`) VALUES
(1, 'English'),
(2, 'Mathematics'),
(3, 'Physics'),
(4, 'Chemistry'),
(5, 'Biology'),
(6, 'Geography'),
(7, 'Further Maths'),
(8, 'Economics'),
(9, 'Technical Drawing'),
(10, 'Government'),
(11, 'Account'),
(12, 'Commerce'),
(13, 'Literature'),
(14, 'History'),
(15, 'Civic Education'),
(16, 'CRK'),
(17, 'Yoruba'),
(18, 'Hausa'),
(19, 'Igbo'),
(20, 'Agricultural Science'),
(21, 'Computer Studies');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardinfo`
--
ALTER TABLE `cardinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examdetails`
--
ALTER TABLE `examdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_year`
--
ALTER TABLE `exam_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jamb_records`
--
ALTER TABLE `jamb_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logger`
--
ALTER TABLE `logger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subgrade`
--
ALTER TABLE `subgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cardinfo`
--
ALTER TABLE `cardinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `examdetails`
--
ALTER TABLE `examdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_year`
--
ALTER TABLE `exam_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jamb_records`
--
ALTER TABLE `jamb_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logger`
--
ALTER TABLE `logger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subgrade`
--
ALTER TABLE `subgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
