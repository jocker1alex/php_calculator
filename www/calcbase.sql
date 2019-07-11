-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 04:01 
-- Server version: 5.7.15
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calcbase`
--
CREATE DATABASE IF NOT EXISTS `calcbase` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `calcbase`;

-- User for `calcbase`
CREATE USER 'calcuser'@'localhost' IDENTIFIED BY 'CaLcUlAtOr';
GRANT SELECT, INSERT ON calcbase.* TO 'calcuser'@'localhost';
FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `calclog`
--

CREATE TABLE IF NOT EXISTS `calclog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formula` text NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calclog`
--

INSERT INTO `calclog` (`id`, `formula`, `result`) VALUES
(1, '5+6', '11'),
(2, '60/5*3+10', '46'),
(3, '9*5/0', 'Делить на ноль нельзя!'),
(4, '7+123-23', '107'),
(5, '9-1+0', '8'),
(6, '6*5/3', '10'),
(7, '2+2', '4'),
(8, '2/2-1', '0'),
(9, '7*9+3', '66'),
(10, '3/3-1', '0'),
(11, '89+12-3*24/6', '89'),
(12, '7*10', '70'),
(13, '9*6-2.2', '51.8'),
(14, '7+3', '10'),
(16, '8*8/64', '1'),
(17, '2+2/0', 'Делить на ноль нельзя!'),
(15, '8*9+3/2.2', '73.363636363636'),
(18, '3*5+15-30', '0'),
(19, '77777*999', '77699223'),
(20, '6-9*21', '-183'),
(21, '3.3+27.7/31-8', '-3.8064516129032'),
(22, '0', '0'),
(23, '0', '0'),
(24, '8/9+3*80-6*5', '210.88888888889'),
(25, '5+5-5', '5'),
(27, '8/9-6*1.2+43', '36.688888888889'),
(28, '20+3/0.0', 'Делить на ноль нельзя!'),
(29, '000+78-63+0/10', '15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
