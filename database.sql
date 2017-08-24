-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2017 at 02:06 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riktam`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `name` varchar(20) NOT NULL,
  `roll` bigint(20) NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `roll`, `age`, `city`, `phone`) VALUES
('akhil', 33, 12, 'ccc', 2267657575),
('ksjj', 44, 45, 'dd', 4512121212),
('lslsls', 47, 56, 'sssss', 8989898989),
('nnn', 55, 2, 'SSS', 9999999999),
('ddsad', 56, 12, 'eddd', 9999999999),
('akhil', 65, 45, 'jjj', 999999999),
('kikik', 99, 33, 'ssdss', 989898989),
('kkkk', 444, 55, 'ssss', 9966336699),
('KKKK', 454, 88, 'MDDM', 7777777777),
('dmdmdm', 588, 88, 'dddkdk', 9966996699),
('kkk', 789, 22, 'smsmsm', 8888888888),
('ss', 797, 12, 'jj', 25),
('mkskmskmskmsk', 4445, 44, 'amsndnsns', 6699669988),
('fgd', 5464, 244, 'rf', 4354765),
('sadaddssdd', 8989, 58, 'dsddss', 6699669966);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`roll`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
