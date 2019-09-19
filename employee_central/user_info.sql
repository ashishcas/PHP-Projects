-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2019 at 08:59 AM
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
-- Database: `synopsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `Gender`, `address`, `emp_id`, `email`, `mobile`, `password`) VALUES
(1, 'pritam', 'dutta', 'male', 'bangalore', '1234', 'pritam@gmail.com', '9749234301', 'pritam'),
(2, 'abhijit', 'haldar', 'male', 'purbasthali', '1235', 'abhijit@gmail.com', '9867543021', 'abhijit'),
(3, 'Tridip', 'Tiwary', 'male', 'Asansol', '1236', 'tridip@gmail.com', '0987654321', 'tridip'),
(5, 'chinmoy', 'Mahato', 'male', 'Bangalore', '12347', 'chinmoy@gmail.com', '1234567890', 'chinmoy'),
(6, 'Jaydeb', 'Mahato', 'male', 'Bangalore', '12348', 'jaydeb@gmail.com', '9856430212', 'jaydeb'),
(7, 'Archan', 'Ray', 'female', 'Bangalore', '12348', 'archan@gmail.com', '6243659807', 'archan'),
(8, 'Naruto', 'Cas', 'Male', 'Nit Rourkela', '122', 'narutocas143@gmail.com', '0891931799', 'ashish');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
