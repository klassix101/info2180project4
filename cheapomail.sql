-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2014 at 05:22 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapomail`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `read_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `date_stamp` date NOT NULL,
  `user_id` int(255) NOT NULL,
  `body` varchar(8000) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `recipient_ids` varchar(8000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `read_status`, `date_stamp`, `user_id`, `body`, `subject`, `recipient_ids`) VALUES
(47, 'no', '2014-12-13', 8, 'hello i have a complaint ', 'school', 'admin'),
(48, 'no', '2014-12-13', 8, 'remember me? ', 'school', 'amoy101'),
(49, 'no', '2014-12-13', 9, ' yes i do!', 'herb101', 'amoy101');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `username`) VALUES
(2, 'admin', 'user', 'admin', 'admin'),
(8, 'herb', 'mac', 'password', 'herb101'),
(9, 'amoy', 'mac', 'password', 'amoy101');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
