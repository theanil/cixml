-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2011 at 04:51 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `extra` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `extra`) VALUES
(1, 'test1', 'new1', 'test1@example.com', 'annn@aaa.com'),
(2, 'test2', 'pass2', 'test2@example.com', ''),
(3, 'test3', 'pass3', 'test3@example.com', ''),
(4, 'test4', 'pass4', 'test4@example.com', ''),
(5, 'test5', 'pass5', 'test5@example.com', ''),
(6, 'test6', 'pass6', 'test6@example.com', ''),
(7, 'test7', 'pass7', 'test7@example.com', ''),
(8, 'test8', 'pass8', 'test8@example.com', ''),
(9, 'test9', 'pass9', 'test9@example.com', ''),
(10, 'test10', 'pass10', 'test10@example.com', ''),
(11, 'test11', 'pass11', 'test11@example.com', ''),
(12, 'test12', 'pass12', 'test12@example.com', ''),
(13, 'test13', 'pass13', 'test13@example.com', ''),
(14, 'test14', 'pass14', 'test14@example.com', ''),
(15, 'test15', 'pass15', 'test15@example.com', ''),
(16, 'test16', 'pass16', 'test16@example.com', ''),
(17, 'test17', 'pass17', 'test17@example.com', ''),
(18, 'test18', 'pass18', 'test18@example.com', ''),
(19, 'test19', 'pass19', 'test19@example.com', ''),
(20, 'test20', 'pass20', 'test20@example.com', ''),
(21, 'anil', 'anil123', 'anil@tendersinfo.com', 'annn@aaa.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
