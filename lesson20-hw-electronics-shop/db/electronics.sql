-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 12:27 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE IF NOT EXISTS `computers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'computer',
  `ram` varchar(100) NOT NULL DEFAULT 'N/A',
  `processor` varchar(100) NOT NULL DEFAULT 'N/A',
  `videocard` varchar(100) NOT NULL DEFAULT 'N/A',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`id`, `make`, `model`, `year`, `image`, `ram`, `processor`, `videocard`, `price`) VALUES
(1, 'Computer test make 1', 'computer test model 1', 2013, 'computer', 'test ram 1', 'test processor 1', 'test videocard 1', 500),
(2, 'Computer test make 2', 'computer test model 2', 2015, 'computer', 'test ram 2', 'test processor 2', 'test videocard 2', 600),
(3, 'Computer test make 3', 'computer test model 3', 2014, 'computer', 'test ram 3', 'test processor 3', 'test videocard 3', 500),
(4, 'Computer test make 4', 'computer test model 4', 2015, 'computer', 'test ram 4', 'test processor 4', 'test videocard 4', 600),
(5, 'Computer test make 5', 'computer test model 5', 2015, 'computer', 'test ram 5', 'test processor 5', 'test videocard 5', 400),
(13, 'Test Computer Make 6', 'Test Computer Model 6', 2015, 'computer', 'N/A', 'N/A', 'N/A', 390);

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE IF NOT EXISTS `printers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'N/A',
  `numPages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `make`, `model`, `year`, `image`, `type`, `numPages`, `price`) VALUES
(1, 'Test printer make 1', 'Test printer model 1', 2014, 'printer', 'color', 10000, 300),
(2, 'Test printer make 2', 'Test printer model 2', 2015, 'printer', 'color', 12000, 300),
(3, 'Test printer make 3', 'Test printer model 3', 2015, 'printer', 'black and white', 15000, 300),
(4, 'Test printer make 4', 'Test printer model 4', 2014, 'printer', 'color', 10000, 300),
(5, 'Test printer make 5', 'Test printer model 5', 2013, 'printer', 'black and white', 10000, 500);

-- --------------------------------------------------------

--
-- Table structure for table `routers`
--

CREATE TABLE IF NOT EXISTS `routers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `frequency` varchar(100) NOT NULL DEFAULT 'N/A',
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `routers`
--

INSERT INTO `routers` (`id`, `make`, `model`, `year`, `image`, `frequency`, `price`) VALUES
(1, 'Test router make 1', 'Test router model 1', 2015, 'router', 'test router frequency 1', 200),
(2, 'Test router make 2', 'Test router model 2', 2015, 'router', 'test router frequency 2', 200),
(3, 'Test router make 3', 'Test router model 3', 2015, 'router', 'test router frequency 3', 200),
(4, 'Test router make 4', 'Test router model 4', 2013, 'router', 'test router frequency 4', 300),
(5, 'Test router make 5', 'Test router model 5', 2015, 'router', 'test router frequency 5', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', 'user1'),
(2, 'user2', 'user2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
