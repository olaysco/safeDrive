-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 12:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `safedrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `activity_title` varchar(225) NOT NULL,
  `activity_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `user_id`, `activity_title`, `activity_time`) VALUES
(1, 'MTK-001', 'Logged Into System', '2018-02-26 11:57:51'),
(2, 'MTK-099', 'Logged Into System', '2018-02-26 11:58:25'),
(3, 'MTK-099', 'Logged Into System', '2018-02-26 15:54:44'),
(4, 'MTK-099', 'Logged Into System', '2018-02-26 22:42:41'),
(5, 'MTK-00', 'Logged Into System', '2018-02-26 22:50:13'),
(6, 'MTK-001', 'Logged Into System', '2018-02-26 22:52:38'),
(7, 'MTK-099', 'Logged Into System', '2018-02-27 06:02:15'),
(8, 'MTK-001', 'Logged Into System', '2018-02-27 11:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'IT'),
(2, 'NON-IT');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_pub_key` varchar(255) DEFAULT NULL,
  `file_pri_key` varchar(255) DEFAULT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_size` varchar(255) NOT NULL,
  `file_uploader_id` varchar(255) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `file_type` varchar(255) NOT NULL,
  `presence` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_pub_key`, `file_pri_key`, `date_uploaded`, `file_size`, `file_uploader_id`, `folder_id`, `file_type`, `presence`) VALUES
(31, 'whatslagos.jpg', NULL, 'olayiwola', '2018-02-24 16:37:51', '1227721', 'MTK-099', 1, 'jpg', 1),
(32, 'buffalo soldier.m4a', NULL, 'proper', '2018-02-25 13:58:51', '2676222', 'MTK-099', 0, 'm4a', 1),
(34, 'widget.js', NULL, 'peter', '2018-02-27 06:53:14', '15484', 'MTK-099', 0, 'js', 0),
(36, 'abcbank.png', NULL, 'popo', '2018-02-27 07:26:19', '14215', 'MTK-099', 2, 'png', 1),
(39, 'capture-1.png', NULL, 'pppp', '2018-02-27 10:16:15', '503230', 'MTK-099', 0, 'png', 1),
(40, 'olay.jpg', NULL, '', '2018-02-27 10:17:55', '1298013', 'MTK-099', 0, 'jpg', 1),
(41, 'bus import.png', NULL, 'prep', '2018-02-27 10:49:39', '13664', 'MTK-099', 2, 'png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IGN` varchar(200) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `department` int(10) DEFAULT NULL,
  `type` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `IGN`, `full_name`, `password`, `email`, `department`, `type`) VALUES
(1, 'MTK-099', 'Olayiwola Odunsi', 'olayiwola', 'olayiwolaodunsi@gmail.com', 2, 1),
(2, 'MTK-001', 'ADMINISTRATOR', 'admin_mtk', 'admin@mtk_drive.com', NULL, 0),
(4, 'MTK-00', 'joel Dare', 'olajoola', 'joel@mtkng.com', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
