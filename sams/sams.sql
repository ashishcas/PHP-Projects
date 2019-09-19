-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2019 at 01:12 PM
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
-- Database: `sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesid` varchar(100) NOT NULL,
  `ticketid` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `seatno` int(11) NOT NULL,
  `seat_type` varchar(100) NOT NULL,
  `showdate` date DEFAULT NULL,
  `sno` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `salesid`, `ticketid`, `dob`, `name`, `seatno`, `seat_type`, `showdate`, `sno`, `price`) VALUES
(1, 'satya123', 'NITR7133', '2019-03-27', 'ramu', 1, 'balcony', '2019-03-29', 1, 300),
(2, 'satya123', 'NITR3571', '2019-03-27', 'tyu', 10, 'balcony', '2019-03-30', 1, 200),
(3, 'satya123', 'NITR5155', '2019-03-27', 'naruto', 1, 'balcony', '2019-03-30', 2, 200),
(4, 'satya123', 'NITR9428', '2019-03-27', 'ramu', 2, 'balcony', '2019-03-31', 1, 100),
(5, 'satya123', 'NITR9428', '2019-03-27', 'ravi', 3, 'balcony', '2019-03-31', 1, 100),
(6, 'satya123', 'NITR7289', '2019-03-27', 'satwik', 5, 'balcony', '2019-03-31', 1, 100),
(7, 'satya123', 'NITR3916', '2019-03-27', 'surya', 3, 'ordinary', '2019-03-31', 1, 800),
(8, 'satya123', 'NITR2683', '2019-03-27', 'akashrdx', 6, 'balcony', '2019-03-31', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `salespersons`
--

DROP TABLE IF EXISTS `salespersons`;
CREATE TABLE IF NOT EXISTS `salespersons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salespersons`
--

INSERT INTO `salespersons` (`id`, `username`, `userid`, `password`) VALUES
(4, 'naruto', 'naruto123', '7b69ad8a8999d4ca7c42b8a729fb0ffd'),
(5, 'satya', 'satya123', '7b69ad8a8999d4ca7c42b8a729fb0ffd'),
(6, 'chima', 'dhoni98', '7b69ad8a8999d4ca7c42b8a729fb0ffd');

-- --------------------------------------------------------

--
-- Table structure for table `showdetails`
--

DROP TABLE IF EXISTS `showdetails`;
CREATE TABLE IF NOT EXISTS `showdetails` (
  `showid` varchar(100) NOT NULL,
  `showdate` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `no_ordinary_seats` int(5) NOT NULL,
  `no_balcony_seats` int(5) NOT NULL,
  `no_vip_seats` int(5) NOT NULL,
  `price_ordinary` int(5) NOT NULL,
  `price_balcony` int(5) NOT NULL,
  `sno` int(11) NOT NULL,
  PRIMARY KEY (`showid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showdetails`
--

INSERT INTO `showdetails` (`showid`, `showdate`, `start_at`, `end_at`, `no_ordinary_seats`, `no_balcony_seats`, `no_vip_seats`, `price_ordinary`, `price_balcony`, `sno`) VALUES
('first', '2019-03-30', '09:00:00', '10:00:00', 10, 20, 30, 100, 200, 2),
('music1', '2019-04-07', '11:00:00', '02:00:00', 60, 50, 15, 500, 1000, 1),
('SHOW1', '2019-03-31', '08:00:00', '10:00:00', 100, 100, 10, 800, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `showmanager`
--

DROP TABLE IF EXISTS `showmanager`;
CREATE TABLE IF NOT EXISTS `showmanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showmanager`
--

INSERT INTO `showmanager` (`id`, `username`, `password`) VALUES
(1, 'ashish', 'ashish'),
(2, 'naruto', '123456'),
(4, 'ashish', '7b69ad8a8999d4ca7c42b8a729fb0ffd');

-- --------------------------------------------------------

--
-- Table structure for table `show_details`
--

DROP TABLE IF EXISTS `show_details`;
CREATE TABLE IF NOT EXISTS `show_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `showdate` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `no_ordinary_seats` int(5) NOT NULL,
  `no_balcony_seats` int(5) NOT NULL,
  `no_vip_seats` int(5) NOT NULL,
  `price_ordinary` int(5) NOT NULL,
  `price_balcony` int(5) NOT NULL,
  `sno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_details`
--

INSERT INTO `show_details` (`id`, `showdate`, `start_at`, `end_at`, `no_ordinary_seats`, `no_balcony_seats`, `no_vip_seats`, `price_ordinary`, `price_balcony`, `sno`) VALUES
(3, '2019-03-24', '12:00:00', '02:00:00', 10, 10, 10, 600, 300, 1),
(4, '2019-05-12', '10:00:00', '10:00:00', 25, 35, 12, 500, 800, 1),
(5, '2019-03-30', '12:00:00', '02:00:00', 47, 45, 16, 900, 1900, 1),
(6, '2019-03-22', '00:10:00', '10:10:00', 12, 12, 11, 124, 145, 1),
(7, '2019-03-21', '10:10:00', '10:01:00', 24, 15, 5, 1000, 1500, 1),
(8, '2019-03-24', '12:00:00', '02:00:00', 25, 15, 10, 500, 800, 2),
(9, '2019-03-29', '04:00:00', '08:00:00', 45, 45, 5, 800, 1000, 1),
(10, '2019-03-28', '09:00:00', '12:00:00', 10, 10, 10, 110, 150, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
