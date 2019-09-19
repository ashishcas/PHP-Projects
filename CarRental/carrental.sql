-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2019 at 06:47 PM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('vikesh', '682');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `Vehicle_id` int(10) NOT NULL AUTO_INCREMENT,
  `License_no` varchar(20) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Year` date DEFAULT NULL,
  `Ctype` varchar(20) DEFAULT NULL,
  `Drate` int(10) DEFAULT NULL,
  `Wrate` int(10) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Vehicle_id`),
  UNIQUE KEY `License_no` (`License_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Cid` int(10) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Mobile` int(12) DEFAULT NULL,
  `Dno` int(10) DEFAULT NULL,
  `Vehicle_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`Cid`),
  KEY `Dno` (`Dno`),
  KEY `Vehicle_id` (`Vehicle_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cid`, `Fname`, `Lname`, `Mobile`, `Dno`, `Vehicle_id`) VALUES
(1, 'Naruto', 'Cas', 89193179, 12345, 145678),
(2, 'Naruto', 'Cas', 89193179, 12345, 145678);

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

DROP TABLE IF EXISTS `customer_service`;
CREATE TABLE IF NOT EXISTS `customer_service` (
  `Empid` int(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Mobile` int(12) DEFAULT NULL,
  PRIMARY KEY (`Empid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Mid` int(10) NOT NULL,
  `Mtype` varchar(20) DEFAULT NULL,
  `Discount` int(10) DEFAULT NULL,
  `Duration` varchar(10) DEFAULT NULL,
  `Cid` int(10) DEFAULT NULL,
  PRIMARY KEY (`Mid`),
  KEY `Cid` (`Cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
