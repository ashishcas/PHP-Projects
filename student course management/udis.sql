-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2019 at 03:18 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'satya', '55cc93e3bafad4631d4a62fa346c4da0');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `grade` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `cname`, `grade`) VALUES
(2, 'pav', 'course1', 7),
(3, 'pav', 'course3', 7),
(4, 'pav', 'course5', 7),
(5, 'pav', 'course6', 7),
(6, 'pav', 'course7', 7),
(7, 'pavan', 'course1', 0),
(8, 'pavan', 'course3', 0),
(9, 'pavan', 'course5', 0),
(10, 'pavan', 'course6', 0),
(11, 'pavan', 'course7', 0),
(12, 'dileep', 'course1', 8),
(13, 'dileep', 'course4', 6),
(14, 'dileep', 'course5', 9),
(15, 'dileep', 'course6', 7),
(16, 'dileep', 'course7', 9);

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

DROP TABLE IF EXISTS `funds`;
CREATE TABLE IF NOT EXISTS `funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `fdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `name`, `type`, `amount`, `fdate`) VALUES
(1, 'first', 'granted', 1000, '2019-04-24'),
(2, 'second ', 'granted', 2000, '2019-04-24'),
(3, 'third', 'withdrawal', 500, '2019-04-25'),
(4, 'Yearly fund', 'granted', 100000, '2019-04-25'),
(5, 'For new PC ', 'withdrawal', 60000, '2019-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `no` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `location`, `no`) VALUES
(1, 'PC with high RAM', 'Room - 105', '13'),
(2, 'Dell PCs', 'SW Lb-1', '100'),
(3, 'CPU', 'Room - 100', '26');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `fname`, `description`) VALUES
(1, 'first', 'satya', 'fvbnm,/                '),
(2, 'networks', 'ladi', 'this project is about decreasing traffic in networks                '),
(3, 'Load Balancing', 'Yaswanth', 'It is regarding cloud computing                '),
(4, 'GAIT', 'dileep', 'Detection of people using GAIT analysis             ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobileno` varchar(11) NOT NULL,
  `cgpa` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `userid`, `password`, `mobileno`, `cgpa`) VALUES
(1, 'satya', 'stya3456', '7b69ad8a8999d4ca7c42b8a729fb0ffd', '8919317997', 'check'),
(3, 'pavan', 'pavan123', '86da27c7ec5d6af005ded5f2c6d01fc3', '4567891230', 'check'),
(4, 'ashish', 'ashish123', 'e87161df44872ac7d77e97e779dabe51', '891931', 'check'),
(5, 'pavan', 'pavan159', '86da27c7ec5d6af005ded5f2c6d01fc3', '9437724618', 'check'),
(6, 'dileep', 'dileep123', '934b5e03c7dd8626a55185ab9090eeb4', '9059527527', 'check');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
