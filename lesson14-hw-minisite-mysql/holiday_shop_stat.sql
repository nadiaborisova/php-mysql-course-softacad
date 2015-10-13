-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2015 at 01:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `holiday_shop_stat`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `page_visited` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `ip_address`, `date`, `page_visited`) VALUES
(1, '::1', '2015-10-12 20:01:51', '/lesson14-hw-minisite-mysql/index.php'),
(2, '::1', '2015-10-12 20:01:52', '/lesson14-hw-minisite-mysql/products.php'),
(3, '::1', '2015-10-12 20:01:54', '/lesson14-hw-minisite-mysql/about_us.php'),
(4, '::1', '2015-10-12 20:07:47', '/lesson14-hw-minisite-mysql/products.php'),
(5, '::1', '2015-10-12 20:07:48', '/lesson14-hw-minisite-mysql/index.php'),
(6, '::1', '2015-10-12 20:07:49', '/lesson14-hw-minisite-mysql/about_us.php'),
(7, '::1', '2015-10-12 20:07:49', '/lesson14-hw-minisite-mysql/about_us.php'),
(8, '::1', '2015-10-12 20:07:51', '/lesson14-hw-minisite-mysql/products.php'),
(9, '::1', '2015-10-12 20:07:52', '/lesson14-hw-minisite-mysql/about_us.php'),
(10, '::1', '2015-10-12 20:07:53', '/lesson14-hw-minisite-mysql/products.php'),
(11, '::1', '2015-10-12 20:07:54', '/lesson14-hw-minisite-mysql/index.php'),
(12, '::1', '2015-10-12 20:07:56', '/lesson14-hw-minisite-mysql/about_us.php'),
(13, '::1', '2015-10-12 20:07:56', '/lesson14-hw-minisite-mysql/products.php'),
(14, '::1', '2015-10-12 20:13:26', '/lesson14-hw-minisite-mysql/statistic.php'),
(15, '::1', '2015-10-12 20:14:28', '/lesson14-hw-minisite-mysql/statistic.php'),
(16, '::1', '2015-10-12 20:14:52', '/lesson14-hw-minisite-mysql/statistic.php'),
(17, '::1', '2015-10-12 20:16:08', '/lesson14-hw-minisite-mysql/statistic.php'),
(18, '::1', '2015-10-12 20:17:00', '/lesson14-hw-minisite-mysql/statistic.php'),
(62, '87.09.10.45', '2015-10-01 19:09:32', '/lesson14-hw-minisite-mysql/index.php'),
(63, '87.09.10.45', '2015-10-01 19:16:35', '/lesson14-hw-minisite-mysql/products.php'),
(64, '87.09.10.45', '2015-10-02 14:16:35', '/lesson14-hw-minisite-mysql/products.php'),
(65, '178.09.10.01', '2015-10-05 14:26:17', '/lesson14-hw-minisite-mysql/about_us.php'),
(66, '105.47.10.45', '2015-09-04 14:00:17', '/lesson14-hw-minisite-mysql/products.php'),
(67, '105.47.10.45', '2015-09-23 11:16:23', '/lesson14-hw-minisite-mysql/products.php'),
(68, '105.47.10.45', '2015-09-04 14:00:12', '/lesson14-hw-minisite-mysql/about_us.php'),
(69, '105.47.10.45', '2015-09-04 14:06:17', '/lesson14-hw-minisite-mysql/about_us.php'),
(70, '159.47.11.65', '2015-09-04 19:01:17', '/lesson14-hw-minisite-mysql/products.php'),
(71, '159.47.11.65', '2015-09-04 14:00:17', '/lesson14-hw-minisite-mysql/about_us.php'),
(230, '::1', '2015-10-13 12:50:27', '/lesson14-hw-minisite-mysql/login.php'),
(231, '::1', '2015-10-13 12:51:22', '/lesson14-hw-minisite-mysql/statistic.php'),
(232, '::1', '2015-10-13 12:51:25', '/lesson14-hw-minisite-mysql/login.php'),
(233, '::1', '2015-10-13 12:52:23', '/lesson14-hw-minisite-mysql/statistic.php'),
(234, '::1', '2015-10-13 12:52:31', '/lesson14-hw-minisite-mysql/login.php'),
(235, '::1', '2015-10-13 12:56:46', '/lesson14-hw-minisite-mysql/login.php'),
(236, '::1', '2015-10-13 12:56:46', '/lesson14-hw-minisite-mysql/statistic.php'),
(237, '::1', '2015-10-13 12:56:49', '/lesson14-hw-minisite-mysql/statistic.php'),
(238, '::1', '2015-10-13 12:57:54', '/lesson14-hw-minisite-mysql/statistic.php'),
(239, '127.0.0.1', '2015-10-13 12:58:30', '/lesson14-hw-minisite-mysql/statistic.php'),
(240, '127.0.0.1', '2015-10-13 12:58:45', '/lesson14-hw-minisite-mysql/login.php'),
(241, '127.0.0.1', '2015-10-13 12:58:52', '/lesson14-hw-minisite-mysql/statistic.php'),
(242, '127.0.0.1', '2015-10-13 12:58:58', '/lesson14-hw-minisite-mysql/login.php'),
(243, '127.0.0.1', '2015-10-13 12:58:58', '/lesson14-hw-minisite-mysql/statistic.php'),
(244, '127.0.0.1', '2015-10-13 12:59:11', '/lesson14-hw-minisite-mysql/login.php'),
(245, '127.0.0.1', '2015-10-13 12:59:11', '/lesson14-hw-minisite-mysql/statistic.php'),
(246, '::1', '2015-10-13 12:59:32', '/lesson14-hw-minisite-mysql/statistic.php'),
(247, '127.0.0.1', '2015-10-13 13:00:07', '/lesson14-hw-minisite-mysql/statistic.php'),
(248, '127.0.0.1', '2015-10-13 13:00:19', '/lesson14-hw-minisite-mysql/login.php'),
(249, '127.0.0.1', '2015-10-13 13:00:19', '/lesson14-hw-minisite-mysql/statistic.php'),
(250, '::1', '2015-10-13 13:00:27', '/lesson14-hw-minisite-mysql/statistic.php'),
(251, '127.0.0.1', '2015-10-13 13:01:19', '/lesson14-hw-minisite-mysql/statistic.php'),
(252, '127.0.0.1', '2015-10-13 13:01:26', '/lesson14-hw-minisite-mysql/login.php'),
(253, '::1', '2015-10-13 13:06:14', '/lesson14-hw-minisite-mysql/statistic.php'),
(254, '::1', '2015-10-13 13:08:31', '/lesson14-hw-minisite-mysql/statistic.php'),
(255, '::1', '2015-10-13 13:08:38', '/lesson14-hw-minisite-mysql/statistic.php'),
(256, '::1', '2015-10-13 13:11:43', '/lesson14-hw-minisite-mysql/statistic.php'),
(257, '::1', '2015-10-13 13:11:52', '/lesson14-hw-minisite-mysql/login.php'),
(258, '::1', '2015-10-13 13:11:52', '/lesson14-hw-minisite-mysql/statistic.php'),
(259, '::1', '2015-10-13 13:11:54', '/lesson14-hw-minisite-mysql/statistic.php'),
(260, '::1', '2015-10-13 13:13:24', '/lesson14-hw-minisite-mysql/statistic.php'),
(261, '::1', '2015-10-13 13:14:25', '/lesson14-hw-minisite-mysql/statistic.php'),
(262, '::1', '2015-10-13 13:14:44', '/lesson14-hw-minisite-mysql/statistic.php'),
(263, '::1', '2015-10-13 13:15:08', '/lesson14-hw-minisite-mysql/statistic.php'),
(264, '::1', '2015-10-13 13:15:15', '/lesson14-hw-minisite-mysql/statistic.php'),
(265, '::1', '2015-10-13 13:15:40', '/lesson14-hw-minisite-mysql/statistic.php'),
(266, '::1', '2015-10-13 13:15:45', '/lesson14-hw-minisite-mysql/products.php'),
(267, '::1', '2015-10-13 13:15:46', '/lesson14-hw-minisite-mysql/index.php'),
(268, '::1', '2015-10-13 13:15:47', '/lesson14-hw-minisite-mysql/about_us.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'user2', 'user2'),
(5, 'user3', 'user3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
