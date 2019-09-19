-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2018 at 12:51 AM
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
-- Database: `feepayment`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `password`) VALUES
(1, 'tanay', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `january` varchar(100) NOT NULL,
  `jan` varchar(100) NOT NULL,
  `february` varchar(100) NOT NULL,
  `feb` varchar(100) NOT NULL,
  `march` varchar(100) NOT NULL,
  `mar` varchar(100) NOT NULL,
  `april` varchar(100) NOT NULL,
  `apr` varchar(100) NOT NULL,
  `may` varchar(100) NOT NULL,
  `mayd` varchar(100) NOT NULL,
  `june` varchar(100) NOT NULL,
  `jun` varchar(100) NOT NULL,
  `july` varchar(100) NOT NULL,
  `jul` varchar(100) NOT NULL,
  `august` varchar(100) NOT NULL,
  `aug` varchar(100) NOT NULL,
  `september` varchar(100) NOT NULL,
  `sep` varchar(100) NOT NULL,
  `october` varchar(100) NOT NULL,
  `oct` varchar(100) NOT NULL,
  `november` varchar(100) NOT NULL,
  `nov` varchar(100) NOT NULL,
  `december` varchar(100) NOT NULL,
  `deci` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `class`, `january`, `jan`, `february`, `feb`, `march`, `mar`, `april`, `apr`, `may`, `mayd`, `june`, `jun`, `july`, `jul`, `august`, `aug`, `september`, `sep`, `october`, `oct`, `november`, `nov`, `december`, `deci`) VALUES
(2, 'naruto', 'guitar', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '10000', ' ', '10000', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
