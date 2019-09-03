-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 09:39 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lifesc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`uid` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`) VALUES
(1, 'admin', 'D!pter!s123');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `access_no` int(20) NOT NULL,
  `bot_name` varchar(30) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `long` varchar(20) NOT NULL,
  `lati` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `local_name` varchar(30) NOT NULL,
  `uses` varchar(300) NOT NULL,
  `record` varchar(30) NOT NULL,
  `f_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
`fam_id` int(11) NOT NULL,
  `fam_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`fam_id`, `fam_name`) VALUES
(1, 'Anemiaceae'),
(2, 'Apleniaceae'),
(3, 'Aspleniaceae'),
(4, 'Athyriaceae'),
(5, 'Blechnaceae'),
(6, 'Cibotiaceae'),
(7, 'Culcitaceae'),
(8, 'Cyatheaceae'),
(9, 'Cystodiaceae'),
(10, 'Cystopteridaceae'),
(11, 'Davalliaceae'),
(12, 'Dennstaedtiaceae'),
(13, 'Dicksoniaceae'),
(14, 'Diplaziopsidaceae'),
(15, 'Dipteridaceae'),
(16, 'Dryopteridacae'),
(17, 'Dryopteridaceae'),
(18, 'Equisetaceae'),
(19, 'Gleicheniaceae'),
(20, 'Hymenophyllaceae'),
(21, 'Hypodematiaceae'),
(22, 'Iso?taceae'),
(23, 'Lindsaeaceae'),
(24, 'Lomariopsidaceae'),
(25, 'Lonchitidaceae'),
(26, 'Loxsomataceae'),
(27, 'Lycopodiaceae'),
(28, 'Lygodiaceae'),
(29, 'Marattiaceae'),
(30, 'Marsileaceae'),
(31, 'Matoniaceae'),
(32, 'Metaxyaceae'),
(33, 'Nephrolepidaceae'),
(34, 'Oleandraceae'),
(35, 'Onocleaceae'),
(36, 'Ophioglossaceae'),
(37, 'Osmundaceae'),
(38, 'Plagiogyriaceae'),
(39, 'Polypodiaceae'),
(40, 'Psilotaceae'),
(41, 'Pteridaceae'),
(42, 'Rhachidosoraceae'),
(43, 'Saccolomataceae'),
(44, 'Salviniaceae'),
(45, 'Schizaeaceae'),
(46, 'Selaginellaceae'),
(47, 'Tectariaceae'),
(48, 'Thelypteridaceae'),
(49, 'Thyrsopteridaceae'),
(50, 'Woodsiaceae');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
`img_id` int(20) NOT NULL,
  `img_name` varchar(100) DEFAULT NULL,
  `img_path` varchar(500) NOT NULL,
  `img_type` varchar(500) NOT NULL,
  `access_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
 ADD PRIMARY KEY (`access_no`), ADD KEY `fk_family` (`f_id`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
 ADD PRIMARY KEY (`fam_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
 ADD PRIMARY KEY (`img_id`), ADD KEY `fk_image` (`access_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
MODIFY `img_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
ADD CONSTRAINT `fk_family` FOREIGN KEY (`f_id`) REFERENCES `family` (`fam_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
ADD CONSTRAINT `fk_image` FOREIGN KEY (`access_id`) REFERENCES `details` (`access_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
