-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2018 at 06:25 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgee_audit`
--
CREATE DATABASE IF NOT EXISTS `bgee_audit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bgee_audit`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

CREATE TABLE `failed_logins` (
  `id` int(20) NOT NULL COMMENT 'auto',
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL COMMENT 'the username used for logging in ',
  `password` varchar(255) NOT NULL COMMENT 'encrypted password used for logging in ',
  `user_agent` varchar(255) NOT NULL COMMENT 'contains browser info used to access the system',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name used to access the system',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the computer',
  `city_region` text COMMENT 'location of the user when accessing the system',
  `country` varchar(255) DEFAULT NULL COMMENT 'country from which the system was accessed',
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of access'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_logins`
--

INSERT INTO `failed_logins` (`id`, `user_id`, `username`, `password`, `user_agent`, `hostname`, `ipaddress`, `city_region`, `country`, `access_date`) VALUES
(1, 1, 'osborne.mordred@gmail.com', '$2y$10$iR5nohFRLQXTz3O8h2kGzOf1FV0/cAcdnQFGWaT25EDYtZULj5cPq', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-12-30 13:47:12'),
(2, 7, 'akosuapompey@maviscolaundry.com', '$2y$10$x.IZEqoTJ1eJp7fCxT5pi.jKequQMXW3KOWGs0clWECRv3dWU7nTi', 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', 'ip6-localhost', '::1', NULL, NULL, '2017-12-30 14:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `successful_logins`
--

CREATE TABLE `successful_logins` (
  `id` int(20) NOT NULL COMMENT 'auto generated id',
  `user_id` int(5) NOT NULL COMMENT 'auto generated id from users table',
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'time of login by user',
  `time_out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'time of logout by user',
  `online` int(1) NOT NULL DEFAULT '1' COMMENT 'online status of the user',
  `user_agent` varchar(255) NOT NULL COMMENT 'browser info of the user at the time of system access',
  `ipaddress` varchar(20) NOT NULL DEFAULT '0.0.0.0' COMMENT 'ip address of the user at the time of system access',
  `hostname` varchar(255) NOT NULL COMMENT 'computer name of the user at the time of system access',
  `city_region` text COMMENT 'city & region of the user at the time of system access',
  `country` varchar(255) DEFAULT NULL COMMENT 'country of the user at the time of system access'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `successful_logins`
--

INSERT INTO `successful_logins` (`id`, `user_id`, `time_in`, `time_out`, `online`, `user_agent`, `ipaddress`, `hostname`, `city_region`, `country`) VALUES
(1, 1, '2017-12-30 11:01:37', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(2, 1, '2017-12-30 11:04:07', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(3, 1, '2017-12-30 11:16:33', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(4, 1, '2017-12-30 12:48:41', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(5, 1, '2017-12-30 13:02:56', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(6, 1, '2017-12-30 13:15:54', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(7, 1, '2017-12-30 13:27:44', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(8, 1, '2017-12-30 14:11:46', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(9, 7, '2017-12-30 14:22:34', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(10, 7, '2017-12-30 14:27:01', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(11, 7, '2017-12-30 14:28:49', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(12, 7, '2017-12-30 14:43:19', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(13, 7, '2017-12-30 14:57:37', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(14, 7, '2017-12-30 14:59:51', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(15, 1, '2017-12-30 15:00:47', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(16, 1, '2017-12-30 15:16:17', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(17, 7, '2017-12-30 15:19:24', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(18, 1, '2017-12-30 15:19:29', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(19, 1, '2018-01-04 13:40:03', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(20, 1, '2018-01-04 21:45:41', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(21, 1, '2018-01-05 05:18:51', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux i686 (x86_64)) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 OPR/45.0.2552.898', '::1', 'ip6-localhost', NULL, NULL),
(22, 1, '2018-01-09 13:04:40', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36 OPR/50.0.2762.45', '::1', 'London', NULL, NULL),
(23, 1, '2018-01-09 13:04:36', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36 OPR/50.0.2762.45', '192.168.3.40', 'London', ',', NULL),
(24, 1, '2018-01-09 13:05:19', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.97 Safari/537.36 Vivaldi/1.94.1008.40', '192.168.3.24', 'NII-OFFICE', ',', NULL),
(25, 1, '2018-01-10 09:03:37', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36 OPR/50.0.2762.45', '::1', 'London', NULL, NULL),
(26, 1, '2018-01-10 14:38:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36 OPR/50.0.2762.45', '::1', 'London', NULL, NULL),
(27, 1, '2018-01-11 18:26:42', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36 OPR/50.0.2762.45', '::1', 'London', NULL, NULL),
(28, 1, '2018-01-11 18:27:02', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(29, 2, '2018-01-12 00:02:24', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.74', '41.57.208.74', 'Accra,Greater Accra Region', 'Ghana'),
(30, 2, '2018-01-12 00:02:34', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C153 Safari/604.1', '41.57.208.74', '41.57.208.74', 'Accra,Greater Accra Region', 'Ghana'),
(31, 2, '2018-01-12 07:29:06', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.57.217.52', '41.57.217.52', 'Accra,Greater Accra Region', 'Ghana'),
(32, 2, '2018-01-12 21:18:12', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.24', '41.57.208.24', 'Accra,Greater Accra Region', 'Ghana'),
(33, 2, '2018-04-29 00:09:50', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.88', '41.57.217.88', 'Accra,Greater Accra Region', 'Ghana'),
(34, 2, '2018-01-14 22:24:00', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.95', '41.57.217.95', 'Accra,Greater Accra Region', 'Ghana'),
(35, 1, '2018-01-15 11:49:27', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.222.232.246', '41.222.232.246', 'Accra,Greater Accra Region', 'Ghana'),
(36, 2, '2018-01-15 11:08:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.109', '41.57.217.109', 'Accra,Greater Accra Region', 'Ghana'),
(37, 2, '2018-01-15 11:56:50', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.222.232.246', '41.222.232.246', 'Accra,Greater Accra Region', 'Ghana'),
(38, 2, '2018-01-15 11:59:53', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.222.232.246', '41.222.232.246', 'Accra,Greater Accra Region', 'Ghana'),
(39, 1, '2018-01-15 17:00:57', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.109', '41.57.217.109', 'Accra,Greater Accra Region', 'Ghana'),
(40, 1, '2018-01-16 05:40:47', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', '41.57.217.40', '41.57.217.40', 'Accra,Greater Accra Region', 'Ghana'),
(41, 2, '2018-01-16 05:55:22', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.40', '41.57.217.40', 'Accra,Greater Accra Region', 'Ghana'),
(42, 2, '2018-01-16 13:01:34', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.222.232.246', '41.222.232.246', 'Accra,Greater Accra Region', 'Ghana'),
(43, 1, '2018-01-16 17:37:31', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.10', '41.57.217.10', 'Accra,Greater Accra Region', 'Ghana'),
(44, 1, '2018-01-16 17:38:05', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.10', '41.57.217.10', 'Accra,Greater Accra Region', 'Ghana'),
(45, 1, '2018-01-17 15:23:39', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.86', '41.57.208.86', 'Accra,Greater Accra Region', 'Ghana'),
(46, 2, '2018-01-17 17:42:44', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.86', '41.57.208.86', 'Accra,Greater Accra Region', 'Ghana'),
(47, 1, '2018-01-17 17:43:14', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.86', '41.57.208.86', 'Accra,Greater Accra Region', 'Ghana'),
(48, 1, '2018-01-17 17:43:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.86', '41.57.208.86', 'Accra,Greater Accra Region', 'Ghana'),
(49, 1, '2018-01-17 17:44:00', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.208.86', '41.57.208.86', 'Accra,Greater Accra Region', 'Ghana'),
(50, 2, '2018-01-17 21:59:55', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.57.217.63', '41.57.217.63', 'Accra,Greater Accra Region', 'Ghana'),
(51, 2, '2018-01-17 22:21:01', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.63', '41.57.217.63', 'Accra,Greater Accra Region', 'Ghana'),
(52, 1, '2018-01-17 22:41:52', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', '41.57.217.63', '41.57.217.63', 'Accra,Greater Accra Region', 'Ghana'),
(53, 1, '2018-01-18 05:06:02', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', '41.57.217.63', '41.57.217.63', 'Accra,Greater Accra Region', 'Ghana'),
(54, 2, '2018-01-18 10:28:38', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(55, 1, '2018-01-18 11:00:35', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(56, 1, '2018-01-18 17:19:15', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '154.160.1.161', '154.160.1.161', 'Accra,Greater Accra Region', 'Ghana'),
(57, 2, '2018-01-20 08:02:44', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.85', '41.57.217.85', 'Accra,Greater Accra Region', 'Ghana'),
(58, 1, '2018-01-20 19:14:12', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', '154.160.2.75', '154.160.2.75', 'Accra,Greater Accra Region', 'Ghana'),
(59, 1, '2018-01-20 19:20:20', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 OPR/43.0.2442.1144', '154.160.2.75', '154.160.2.75', 'Accra,Greater Accra Region', 'Ghana'),
(60, 2, '2018-01-21 13:09:58', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.57.217.62', '41.57.217.62', 'Accra,Greater Accra Region', 'Ghana'),
(61, 2, '2018-01-24 19:03:54', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.189.161.120', '41.189.161.120', 'Accra,Greater Accra Region', 'Ghana'),
(62, 2, '2018-01-24 19:04:16', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.189.163.62', '41.189.163.62', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(63, 2, '2018-01-25 19:05:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1', '41.189.163.52', '41.189.163.52', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(64, 1, '2018-01-27 15:05:15', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(65, 2, '2018-01-28 01:17:33', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '154.160.4.227', '154.160.4.227', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(66, 2, '2018-01-30 15:39:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Linux; Android 4.0.4; SmartTabII7 Build/IMM76D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166  Safari/535.19', '41.242.138.8', '41.242.138.8', 'Accra,Greater Accra Region', 'Ghana'),
(67, 1, '2018-01-30 15:48:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(68, 1, '2018-01-31 11:43:45', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(69, 1, '2018-02-01 07:39:06', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '138.197.174.111', '138.197.174.111', 'Toronto,Ontario', 'Canada'),
(70, 1, '2018-02-02 09:47:40', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(71, 1, '2018-02-02 12:48:36', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(72, 1, '2018-02-02 13:09:53', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36 OPR/50.0.2762.67', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(73, 1, '2018-02-02 14:02:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.242.136.5', '41.242.136.5', 'Accra,Greater Accra Region', 'Ghana'),
(74, 2, '2018-02-02 20:27:55', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_5 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/64.0.3282.112 Mobile/15D60 Safari/604.1', '154.160.7.219', '154.160.7.219', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(75, 1, '2018-02-02 23:32:13', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '138.197.172.126', '138.197.172.126', 'Toronto,Ontario', 'Canada'),
(76, 1, '2018-02-03 06:13:25', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_5 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/64.0.3282.112 Mobile/15D60 Safari/604.1', '154.160.2.245', '154.160.2.245', 'Accra,Greater Accra Region', 'Ghana'),
(77, 1, '2018-02-03 08:46:05', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36', '41.189.163.63', '41.189.163.63', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(78, 1, '2018-02-04 22:19:26', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_5 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/64.0.3282.112 Mobile/15D60 Safari/604.1', '41.189.161.118', '41.189.161.118', 'Accra,Greater Accra Region', 'Ghana'),
(79, 1, '2018-02-05 08:32:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_5 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/64.0.3282.112 Mobile/15D60 Safari/604.1', '41.189.161.124', '41.189.161.124', 'Accra,Greater Accra Region', 'Ghana'),
(80, 1, '2018-02-05 09:27:50', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(81, 1, '2018-02-06 21:23:30', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_5 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/64.0.3282.112 Mobile/15D60 Safari/604.1', '41.189.163.204', '41.189.163.204', 'Accra (Ashiedu Keteke),Greater Accra', 'Ghana'),
(82, 1, '2018-02-08 16:22:17', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(83, 2, '2018-02-11 12:20:53', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.189.161.102', '41.189.161.102', 'Accra,Greater Accra Region', 'Ghana'),
(84, 2, '2018-02-17 19:08:48', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.189.163.34', '41.189.163.34', 'Accra,Greater Accra Region', 'Ghana'),
(85, 2, '2018-02-18 15:41:02', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '41.189.163.59', '41.189.163.59', 'Accra,Greater Accra Region', 'Ghana'),
(86, 1, '2018-02-21 12:59:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36', '41.242.137.33', '41.242.137.33', 'Accra,Greater Accra Region', 'Ghana'),
(87, 2, '2018-02-23 14:24:33', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '154.160.0.77', '154.160.0.77', 'Accra,Greater Accra Region', 'Ghana'),
(88, 1, '2018-02-24 01:15:43', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(89, 1, '2018-02-24 07:15:39', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.167 Safari/537.36', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(90, 1, '2018-03-07 13:43:21', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(91, 1, '2018-03-07 13:43:27', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(92, 2, '2018-04-07 12:03:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(93, 2, '2018-04-09 08:17:39', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(94, 2, '2018-04-09 08:17:50', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(95, 2, '2018-04-11 17:58:54', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(96, 2, '2018-04-11 17:59:00', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(97, 2, '2018-04-11 17:59:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(98, 2, '2018-04-12 07:51:28', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Linux; Android 4.0.4; SmartTabII7 Build/IMM76D) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.166  Safari/535.19', '41.211.7.70', '41.211.7.70', 'Accra,Greater Accra Region', 'Ghana'),
(99, 2, '2018-04-14 05:01:24', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '154.160.4.199', '154.160.4.199', 'Accra,Greater Accra Region', 'Ghana'),
(100, 1, '2018-04-16 09:02:27', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(101, 1, '2018-04-24 10:23:03', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36 OPR/52.0.2871.64', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(102, 1, '2018-04-26 19:21:10', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36 OPR/52.0.2871.64', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(103, 1, '2018-04-26 19:44:57', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36 OPR/52.0.2871.64', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(104, 1, '2018-04-26 20:08:04', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36 OPR/52.0.2871.64', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(105, 1, '2018-04-27 09:08:04', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36 OPR/52.0.2871.64', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(106, 1, '2018-04-29 14:37:21', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(107, 1, '2018-05-01 08:28:58', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(108, 1, '2018-05-01 12:49:58', '0000-00-00 00:00:00', 0, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(109, 1, '2018-05-01 12:59:41', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(110, 1, '2018-05-01 21:47:41', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(111, 1, '2018-05-02 21:18:15', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(112, 1, '2018-05-03 20:04:21', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL),
(113, 1, '2018-05-07 18:40:38', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.162 Safari/537.36 OPR/52.0.2871.30', '::1', 'ip6-localhost', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sysaudit`
--

CREATE TABLE `sysaudit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `changeset` text NOT NULL,
  `session_login_id` bigint(20) NOT NULL,
  `session_fullname` varchar(800) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `successful_logins`
--
ALTER TABLE `successful_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sysaudit`
--
ALTER TABLE `sysaudit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `successful_logins`
--
ALTER TABLE `successful_logins`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id', AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `sysaudit`
--
ALTER TABLE `sysaudit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `bgee_db`
--
CREATE DATABASE IF NOT EXISTS `bgee_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bgee_db`;

-- --------------------------------------------------------

--
-- Table structure for table `blobs`
--

CREATE TABLE `blobs` (
  `id` bigint(20) NOT NULL COMMENT 'auto generated id',
  `file_path` text CHARACTER SET latin1 NOT NULL COMMENT 'physical location of blob',
  `user_id` bigint(20) NOT NULL COMMENT 'id of the user who uploaded the file',
  `date_of_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date the file was uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hr_company_document`
--

CREATE TABLE `hr_company_document` (
  `id` bigint(20) NOT NULL,
  `logo_id` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_company_info`
--

CREATE TABLE `hr_company_info` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone_1` varchar(20) NOT NULL,
  `telephone_2` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `residence_address` varchar(255) NOT NULL COMMENT 'physical location and street name where company is located',
  `website` varchar(100) NOT NULL COMMENT 'website of the comany',
  `mission` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `tin_number` varchar(50) NOT NULL,
  `date_of_commence` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_company_info`
--

INSERT INTO `hr_company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `tin_number`, `date_of_commence`) VALUES
(1, 'LAUNDRY APP', '0506139739', '0244949261', '', 'bgslaundry@gmail.com', 'BOX K47, OFANKOR - ACCRA', 'GROUND FLOOR - MR MEGA PLAZA. OFANKOR BARRIER - ACCRA.', 'www.bgslaundry.com', 'To Be Filled By The Company', 'To Be Filled By The Company', 'TN10245682-GA', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hr_departments`
--

CREATE TABLE `hr_departments` (
  `id` tinyint(2) NOT NULL,
  `parent_department` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` enum('active','suspended','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hr_departments`
--

INSERT INTO `hr_departments` (`id`, `parent_department`, `name`, `description`, `status`, `date_created`) VALUES
(1, 0, 'SYSTEM DEVELOPERS', 'THIS DEPARTMENTS ARE USED BY THE SYSTEM DEVELOPERS GROUP FOR THE MAINTENANCE OF THE SYSTEM VIA LOCAL OR REMOTELY. ', 'active', '2018-05-03 21:31:58'),
(2, 0, 'Administration', 'Pending Some Contrary Rabbit Up That The More Conditionally Ouch Confidently Far So Was Darn Logic Thus Dove The Juicily Because That Placed Otter.', 'active', '2018-05-03 21:40:32'),
(5, 2, 'Human Resource', 'Pending Some Contrary Rabbit Up That The More Conditionally Ouch Confidently Far So Was Darn Logic Thus Dove The Juicily Because That Placed Otter.', 'active', '2018-05-03 22:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_biodata`
--

CREATE TABLE `hr_employee_biodata` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `id_type` varchar(50) DEFAULT NULL,
  `id_number` varchar(50) DEFAULT NULL,
  `id_expiry_date` date DEFAULT NULL,
  `id_issue_date` date DEFAULT NULL,
  `id_card_photo_id` bigint(20) NOT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `postal_address` text,
  `social_security` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_branch` varchar(255) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `photo_id` bigint(20) DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `hr_employee_biodata`
--

INSERT INTO `hr_employee_biodata` (`id`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `id_type`, `id_number`, `id_expiry_date`, `id_issue_date`, `id_card_photo_id`, `marital_status`, `nationality`, `postal_address`, `social_security`, `bank_name`, `bank_branch`, `account_number`, `user_id`, `photo_id`, `status`, `created_date`) VALUES
(1, 'Claude', 'Nii', 'Nai', 'Male', NULL, NULL, NULL, NULL, NULL, 0, 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2018-01-09 11:48:33'),
(3, 'Daniella', '', 'Eshun', 'Female', NULL, NULL, NULL, NULL, NULL, 0, 'Married', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2018-01-11 13:06:57'),
(4, 'Bismark', '', 'Nana', 'Male', NULL, NULL, NULL, NULL, NULL, 0, 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2018-01-17 12:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_contact_info`
--

CREATE TABLE `hr_employee_contact_info` (
  `id` bigint(20) NOT NULL,
  `biodata_id` bigint(20) NOT NULL,
  `phone_number_1` varchar(25) CHARACTER SET utf8 NOT NULL,
  `phone_number_2` varchar(25) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `residence` text CHARACTER SET utf8 NOT NULL,
  `emergency_fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `emergency_relationship` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_occupation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_phone_1` varchar(20) CHARACTER SET utf8 NOT NULL,
  `emergency_phone_2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `emergency_residence` varchar(50) CHARACTER SET utf8 NOT NULL,
  `emergency_postal_addr` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_employee_contact_info`
--

INSERT INTO `hr_employee_contact_info` (`id`, `biodata_id`, `phone_number_1`, `phone_number_2`, `email`, `residence`, `emergency_fullname`, `emergency_relationship`, `emergency_occupation`, `emergency_phone_1`, `emergency_phone_2`, `emergency_residence`, `emergency_postal_addr`, `date_created`) VALUES
(1, 1, '0244444444', '0544444444', 'Claude@africaloop.com', 'Hse  No 12, Trade Fair Function.', 'Rebel Leader', 'Guardian', '', '0344444444', NULL, 'Dodowa', '', '2018-01-09 11:48:33'),
(2, 3, '0266666666', '0566666666', 'Daniella@gmailcom', 'Kasoa - Overhead', 'Guardian', 'Guardian', '', '0277777777', NULL, 'Kasoa - Kalabule', '', '2018-01-11 13:06:57'),
(3, 4, '1234567890', '', 'Watara@gmail.com', 'Taifa', '1234567890', 'Father', '', '1234567890', NULL, 'Taifa', '', '2018-01-17 17:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_other_info`
--

CREATE TABLE `hr_employee_other_info` (
  `id` int(11) NOT NULL,
  `biodata_id` varchar(20) NOT NULL,
  `salary` tinyint(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_work_info`
--

CREATE TABLE `hr_employee_work_info` (
  `id` bigint(20) NOT NULL,
  `biodata_id` bigint(20) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `position_id` tinyint(2) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `employment_type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `employment_startdate` date DEFAULT NULL,
  `work_email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `resume_id` int(20) DEFAULT NULL,
  `application_id` bigint(20) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_employee_work_info`
--

INSERT INTO `hr_employee_work_info` (`id`, `biodata_id`, `employee_id`, `position_id`, `department_id`, `employment_type`, `employment_startdate`, `work_email`, `resume_id`, `application_id`, `date_created`) VALUES
(1, 1, 'BG/EMP/001', 2, 1, '', NULL, NULL, NULL, 0, '2018-01-09 11:48:33'),
(2, 3, 'BG/EMP/002', 2, 1, '', NULL, NULL, NULL, 0, '2018-01-11 13:06:57'),
(3, 4, 'BG/EMP/003', 1, 1, '', NULL, NULL, NULL, 0, '2018-01-17 17:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_position` int(11) NOT NULL,
  `description` text,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`id`, `name`, `parent_position`, `description`, `status`) VALUES
(1, 'Administrator', 0, 'Head Of Administration', 'active'),
(2, 'Receptionist', 0, 'Welcomes All Guests', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_clients`
--

CREATE TABLE `laundry_clients` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `company` varchar(255) NOT NULL,
  `residence_address` text NOT NULL,
  `postal_address` text NOT NULL,
  `phone_number_1` varchar(20) NOT NULL,
  `phone_number_2` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sms_alert` tinyint(1) NOT NULL,
  `online_access` tinyint(1) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_clients`
--

INSERT INTO `laundry_clients` (`id`, `fullname`, `gender`, `company`, `residence_address`, `postal_address`, `phone_number_1`, `phone_number_2`, `email`, `sms_alert`, `online_access`, `status`, `date_created`) VALUES
(2, 'Hope Avalon', 'Male', 'Hackerton', 'Kaneshie', '', '0233333333', '0533333333', 'hopeavalon@hackerton.com', 1, 1, 'active', '2018-01-09 11:51:50'),
(3, 'Salama Jintey James', 'Male', 'Hackernoon', 'Kwabenya', '', '0222222222', '0522222222', 'jamessalama@hackernoon.com', 1, 1, 'active', '2018-01-09 11:53:58'),
(4, 'Evans Ofori Owusu', 'Male', '', 'Adenta Barrier', '', '0211111111', '0511111111', 'evansofori@gmail.com', 1, 0, 'active', '2018-01-09 11:55:12'),
(5, 'Ivan Pink', 'Male', 'Phalaa', 'Sonitra - Amasaman', '', '0255555555', '0255555555', 'ivanpink@gmail.com', 1, 0, 'active', '2018-01-09 11:57:51'),
(6, 'Barkson Saddam', 'Male', '', '14 Gurugu Street', 'GP2556', '0000000000', '', 'bark@gmail.com', 1, 1, 'active', '2018-01-15 07:10:43'),
(7, 'Bismark Offei', 'Male', 'Phalaa.com', 'Box Ta 353', 'Accra', '0245626487', '0245626487', 'wikills22@gmail.com', 1, 0, 'active', '2018-02-23 09:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_delivery_method`
--

CREATE TABLE `laundry_delivery_method` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_delivery_method`
--

INSERT INTO `laundry_delivery_method` (`id`, `location`, `duration`, `price`, `status`, `date_created`) VALUES
(1, 'Express Service (Outside Accra)', '1 ~ 3 Days', 20, 'active', '2017-12-27 19:46:23'),
(2, 'Express Service (Within Accra)', '0 ~ 1 Days', 15, 'active', '2017-12-27 19:46:57'),
(3, 'Regular (Outside Accra)', '5 ~ 7 Days', 15, 'active', '2017-12-27 19:51:11'),
(4, 'Regular (Within Accra)', '3 ~ 4 Days', 5, 'active', '2017-12-27 20:08:13'),
(5, 'Pickup (At Office)', 'At Users Discretion', 0, 'deleted', '2017-12-27 20:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_garments`
--

CREATE TABLE `laundry_garments` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_garments`
--

INSERT INTO `laundry_garments` (`id`, `name`, `description`, `status`, `date_created`) VALUES
(1, 'Nylon Cloths', 'All Types', 'active', '2017-12-27 20:11:24'),
(2, 'Pure Cotton Clothing', 'All Types', 'active', '2017-12-27 20:11:53'),
(3, 'Cotton / Polyesther Clothing', 'All Types', 'active', '2017-12-27 20:13:09'),
(4, 'Light Jeans', 'All Types', 'active', '2017-12-27 20:13:49'),
(5, 'Heavy Jeans', 'All Types', 'active', '2017-12-27 20:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order_balances`
--

CREATE TABLE `laundry_order_balances` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `balance_paid` double NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` enum('Pending','Paid') NOT NULL DEFAULT 'Pending',
  `payment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_order_balances`
--

INSERT INTO `laundry_order_balances` (`id`, `order_id`, `balance_paid`, `user_id`, `status`, `payment_date`) VALUES
(1, 8, 16, 2, 'Paid', '2018-04-09 04:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order_comments`
--

CREATE TABLE `laundry_order_comments` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_order_comments`
--

INSERT INTO `laundry_order_comments` (`id`, `order_id`, `user_id`, `comment`, `status`, `date_created`) VALUES
(1, 2, 1, 'process ASAP', 'active', '2018-01-16 12:48:19'),
(2, 3, 1, 'i tear the shada', 'active', '2018-01-20 14:01:37'),
(3, 8, 2, 'customer will come for item on Wednesday', 'active', '2018-04-07 08:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order_details`
--

CREATE TABLE `laundry_order_details` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `pricelist_ids` varchar(100) NOT NULL,
  `quantities` varchar(100) NOT NULL,
  `unit_prices` varchar(100) NOT NULL,
  `total_sums` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `service_status` varchar(255) NOT NULL,
  `status_change_userids` varchar(255) NOT NULL,
  `status_change_dates` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_order_details`
--

INSERT INTO `laundry_order_details` (`id`, `order_id`, `pricelist_ids`, `quantities`, `unit_prices`, `total_sums`, `description`, `service_status`, `status_change_userids`, `status_change_dates`, `date_created`) VALUES
(1, 1, '3', '5', '5', '25', '', '', '', '', '2017-12-30 15:03:27'),
(2, 2, '3', '4', '5', '20', '', '', '', '', '2018-01-09 12:08:03'),
(3, 3, '3|2', '60|5', '5|40', '300|40', '|5 Blankets', '', '', '', '2018-01-09 12:10:42'),
(4, 4, '2|3', '10|5', '40|5', '40|25', '10 kingsize pillow cases|', '', '', '', '2018-01-11 15:32:11'),
(5, 5, '3', '4', '5', '20', '', '', '', '', '2018-01-16 00:44:06'),
(6, 6, '5|7', '2|3', '30|15', '60|15', '|a', '', '', '', '2018-01-16 08:45:13'),
(7, 7, '3|6', '3|4', '5|10', '15|10', '|2 boxers, 2 singlets', '', '', '', '2018-01-20 13:57:14'),
(8, 8, '7', '2', '15', '15', 'jean', '', '', '', '2018-01-21 08:41:48'),
(9, 9, '5|7', '1|5', '30|15', '30|15', '|towel', '', '', '', '2018-02-23 09:27:58'),
(10, 10, '7', '1', '15', '15', 'blanket', '', '', '', '2018-04-07 08:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_orders`
--

CREATE TABLE `laundry_orders` (
  `id` bigint(20) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `total_cost` double NOT NULL,
  `amount_paid` double NOT NULL,
  `balance` double NOT NULL,
  `tax_id` int(11) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `processor_user_id` bigint(20) NOT NULL,
  `delivery_method_id` bigint(20) NOT NULL,
  `delivery_location` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('Pending','Processing','Dispatch','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `modified_by` bigint(20) NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `delivered_by` bigint(20) NOT NULL,
  `processing_stages` enum('Pending','Washing','Drying','Ironing','Ready For Dispatch') NOT NULL DEFAULT 'Pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_orders`
--

INSERT INTO `laundry_orders` (`id`, `order_number`, `total_cost`, `amount_paid`, `balance`, `tax_id`, `client_id`, `processor_user_id`, `delivery_method_id`, `delivery_location`, `due_date`, `status`, `modified_by`, `modified_date`, `delivered_by`, `processing_stages`, `date_created`) VALUES
(2, '46844374', 20, 20, 0, 1, 5, 1, 5, 'Pickup', '2018-01-12', 'Delivered', 1, '2018-01-18 17:19:57', 0, 'Pending', '2018-01-09 12:08:03'),
(3, '08547680', 355, 200, 155, 1, 2, 1, 2, 'Kaneshie First light', '2018-01-13', 'Dispatch', 2, '2018-01-28 01:18:23', 0, 'Pending', '2018-01-09 12:10:42'),
(4, '34616706', 65, 65, 0, 1, 3, 1, 5, 'pickup', '2018-01-13', 'Delivered', 1, '2018-01-18 17:20:21', 0, 'Pending', '2018-01-11 15:32:11'),
(5, '61591005', 20, 20, 0, 1, 2, 1, 5, 'Pickup', '2018-01-18', 'Delivered', 1, '2018-01-20 19:01:00', 0, 'Pending', '2018-01-16 00:44:06'),
(6, '00705567', 80, 10, 70, 1, 6, 2, 4, 'Asawasi', '2018-02-02', 'Dispatch', 2, '2018-04-07 12:04:52', 0, 'Pending', '2018-01-16 08:45:13'),
(7, '31945768', 40, 30, 10, 1, 4, 1, 2, 'Amasaman', '2018-01-21', 'Dispatch', 2, '2018-04-07 12:17:44', 0, 'Pending', '2018-01-20 13:57:14'),
(8, '96991535', 30, 14, 16, 1, 6, 2, 2, 'none', '2018-01-22', 'Dispatch', 2, '2018-02-23 14:30:12', 0, 'Pending', '2018-01-21 08:41:48'),
(9, '36579657', 50, 22, 28, 1, 7, 2, 4, 'taifa- Daavi', '2018-02-26', 'Dispatch', 2, '2018-04-07 12:18:05', 0, 'Pending', '2018-02-23 09:27:58'),
(10, '94202363', 20, 15, 5, 1, 6, 2, 4, 'taifa', '2018-04-09', 'Pending', 0, NULL, 0, 'Pending', '2018-04-07 08:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_prices`
--

CREATE TABLE `laundry_prices` (
  `id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `weight_id` bigint(20) NOT NULL,
  `garment_id` bigint(20) NOT NULL,
  `amount` float NOT NULL,
  `status` enum('active','inactive','deleted','') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_prices`
--

INSERT INTO `laundry_prices` (`id`, `service_id`, `weight_id`, `garment_id`, `amount`, `status`, `date_created`) VALUES
(1, 1, 3, 0, 25, 'active', '2017-12-28 04:55:04'),
(2, 1, 2, 0, 40, 'active', '2017-12-28 04:55:32'),
(3, 4, 0, 1, 5, 'active', '2017-12-28 04:56:21'),
(4, 2, 1, 5, 20, 'active', '2018-01-16 08:38:47'),
(5, 2, 2, 5, 30, 'active', '2018-01-16 08:39:17'),
(6, 1, 1, 5, 10, 'active', '2018-01-16 08:39:53'),
(7, 1, 2, 5, 15, 'active', '2018-01-16 08:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_services`
--

CREATE TABLE `laundry_services` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `code` char(2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive','deleted') CHARACTER SET utf8 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_services`
--

INSERT INTO `laundry_services` (`id`, `name`, `code`, `description`, `status`, `date_created`) VALUES
(1, 'Washing Only', 'WO', 'All items in this category are weighed', 'active', '2017-12-24 12:37:39'),
(2, 'Washing & Ironing', 'WI', 'Individual Items Are Charged Here', 'active', '2017-12-27 19:18:22'),
(3, 'Dry Cleaning', 'DC', 'Dry cleaning description', 'active', '2017-12-27 19:18:42'),
(4, 'Ironing', 'IR', 'Item Brought for ironing only', 'active', '2017-12-27 19:29:43'),
(5, 'Delivery', 'DL', 'Deliver washed items', 'active', '2018-01-15 07:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_weights`
--

CREATE TABLE `laundry_weights` (
  `id` bigint(20) NOT NULL,
  `service_type` bigint(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted','') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_weights`
--

INSERT INTO `laundry_weights` (`id`, `service_type`, `weight`, `description`, `status`, `date_created`) VALUES
(1, 1, '1 - 10 KG', '', 'active', '2017-12-27 19:30:48'),
(2, 1, '15 - 30 KG', '', 'active', '2017-12-27 19:33:34'),
(3, 3, '1 - 10 KG', 'Blowing With Dryer', 'deleted', '2017-12-27 19:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `tax_system`
--

CREATE TABLE `tax_system` (
  `id` int(11) NOT NULL,
  `value` float NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax_system`
--

INSERT INTO `tax_system` (`id`, `value`, `user_id`, `date_created`) VALUES
(1, 23.5, 1, '2017-12-30 15:03:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blobs`
--
ALTER TABLE `blobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_company_info`
--
ALTER TABLE `hr_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_departments`
--
ALTER TABLE `hr_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_employee_biodata`
--
ALTER TABLE `hr_employee_biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_number` (`id_number`,`social_security`,`account_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `hr_employee_contact_info`
--
ALTER TABLE `hr_employee_contact_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`biodata_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number_1` (`phone_number_1`);

--
-- Indexes for table `hr_employee_other_info`
--
ALTER TABLE `hr_employee_other_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_employee_work_info`
--
ALTER TABLE `hr_employee_work_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`biodata_id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `hr_position`
--
ALTER TABLE `hr_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `laundry_clients`
--
ALTER TABLE `laundry_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number_1` (`phone_number_1`);

--
-- Indexes for table `laundry_delivery_method`
--
ALTER TABLE `laundry_delivery_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_garments`
--
ALTER TABLE `laundry_garments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_order_balances`
--
ALTER TABLE `laundry_order_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_order_comments`
--
ALTER TABLE `laundry_order_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_order_details`
--
ALTER TABLE `laundry_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_prices`
--
ALTER TABLE `laundry_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_services`
--
ALTER TABLE `laundry_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `laundry_weights`
--
ALTER TABLE `laundry_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_system`
--
ALTER TABLE `tax_system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blobs`
--
ALTER TABLE `blobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id';
--
-- AUTO_INCREMENT for table `hr_company_info`
--
ALTER TABLE `hr_company_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hr_departments`
--
ALTER TABLE `hr_departments`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hr_employee_biodata`
--
ALTER TABLE `hr_employee_biodata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hr_employee_contact_info`
--
ALTER TABLE `hr_employee_contact_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr_employee_other_info`
--
ALTER TABLE `hr_employee_other_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hr_employee_work_info`
--
ALTER TABLE `hr_employee_work_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hr_position`
--
ALTER TABLE `hr_position`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laundry_clients`
--
ALTER TABLE `laundry_clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `laundry_delivery_method`
--
ALTER TABLE `laundry_delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laundry_garments`
--
ALTER TABLE `laundry_garments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laundry_order_balances`
--
ALTER TABLE `laundry_order_balances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laundry_order_comments`
--
ALTER TABLE `laundry_order_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laundry_order_details`
--
ALTER TABLE `laundry_order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `laundry_prices`
--
ALTER TABLE `laundry_prices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `laundry_services`
--
ALTER TABLE `laundry_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `laundry_weights`
--
ALTER TABLE `laundry_weights`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tax_system`
--
ALTER TABLE `tax_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;--
-- Database: `bgee_permissions`
--
CREATE DATABASE IF NOT EXISTS `bgee_permissions` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bgee_permissions`;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_tabs`
--

CREATE TABLE `dashboard_tabs` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(100) CHARACTER SET utf8 NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8 NOT NULL,
  `link` varchar(50) CHARACTER SET utf8 NOT NULL,
  `bg` varchar(50) CHARACTER SET utf8 NOT NULL,
  `privileges` varchar(255) CHARACTER SET utf8 NOT NULL,
  `system_type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_tabs`
--

INSERT INTO `dashboard_tabs` (`id`, `name`, `comment`, `icon`, `link`, `bg`, `privileges`, `system_type`, `status`) VALUES
(1, 'customers', 'Register New Employee', 'fa fa-street-view', 'customers', 'text-teal-400', 'can delete|can add|can edit', 'Human-Resource', 'active'),
(2, 'company', 'Organizational Structure', 'fa fa-institution', 'settings/company', 'text-teal-400', 'Can Create Company Profile|Can Edit Company Profile|Can Delete Company Profile', 'Human-Resource', 'active'),
(3, 'users', 'Add New / Manage User(s)', 'fa fa-users', 'administration/users', 'text-teal-400', 'All Users|Add New User', 'Administration', 'active'),
(4, 'permissions', 'Set Roles & Priv. For Users / Groups', 'fa fa-lock', 'administration/permissions', 'text-teal-400', 'All Roles|All Privileges|Set Role', 'Administration', 'active'),
(6, 'Reports', 'Main Audit System', 'fa fa-database', 'reports', 'text-teal-400', 'Can Access Department Audit|Can Access All Audit', 'Administration', 'active'),
(7, 'new registration', 'New Product / Category / Description', 'fa fa-plus', 'settings/new_registration', 'text-teal-400', 'Can Add Prod / Cat / Desc|Can Edit Prod / Cat / Desc|Can Delete Prod / Cat / Desc', 'Stores', 'active'),
(8, 'settings', 'For Administrators Only', 'fa fa-gears', 'settings/', 'text-teal-400', 'Can Activate / Deactivate System', 'Administration', 'active'),
(9, 'system settings', 'For Developers Only', 'fa fa-lock', 'system/settings', 'text-teal-400', '', 'Reserved', 'inactive'),
(10, 'sms', 'Send messages', 'fa fa-envelope', 'sms', 'text-teal-400', 'can delete|can edit|can add', 'Reserved', 'active'),
(13, 'statistics', 'Informational Statistics', 'fa fa-bar-chart', 'statistics', 'text-teal-400', '', 'General', 'active'),
(14, 'overview', 'All Services Made', 'fa fa-tasks', 'overview', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active'),
(15, 'inhouse', 'All Services Made', 'fa fa-inbox', 'inhouse', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active'),
(16, 'dispatch', 'All Services Made', 'fa fa-truck', 'dispatch', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_requests`
--

CREATE TABLE `password_reset_requests` (
  `id` int(11) NOT NULL,
  `requestor_user_id` int(11) NOT NULL,
  `password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `local_password_token` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `acceptor_user_id` int(11) DEFAULT NULL,
  `status` varchar(45) CHARACTER SET utf8 NOT NULL,
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles_privileges_group`
--

CREATE TABLE `roles_privileges_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'name of the group / predefined set of roles & privileges ',
  `roles` text NOT NULL COMMENT 'A set of predefined roles to set a user ',
  `privileges` text NOT NULL COMMENT 'A set of predefined privileges from roles',
  `description` varchar(255) DEFAULT NULL COMMENT 'A summary of text describing that position',
  `login_url` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active' COMMENT 'State of the group whether its active(1) or inactive(0)',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles_privileges_group`
--

INSERT INTO `roles_privileges_group` (`id`, `name`, `roles`, `privileges`, `description`, `login_url`, `status`, `date_created`) VALUES
(1, 'System Developer', 'statistics|overview|inhouse|dispatch|new registration|company|users|permissions|customers|reports|sms', '', 'Designers of this software', 'dashboard', 'active', '2017-10-16 17:42:32'),
(2, 'Administrator', '', '', 'Administrator Group', 'dashboard', 'active', '2017-10-16 17:42:32'),
(3, 'Reception', 'overview', '', 'Receptionist Group', 'overview', 'active', '2017-12-30 12:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles_privileges_user`
--

CREATE TABLE `roles_privileges_user` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL COMMENT 'Contains the id of the user',
  `custom_roles` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Exceptional/Added Roles of a user',
  `custom_privileges` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Permissible Actions on the Exceptional Roles assigned to the user',
  `group_id` int(11) NOT NULL COMMENT 'Contains the id of the group to which the user belongs to in roles & priviledges',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 DEFAULT 'active' COMMENT 'state of the user''s permissions.'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles_privileges_user`
--

INSERT INTO `roles_privileges_user` (`id`, `user_id`, `custom_roles`, `custom_privileges`, `group_id`, `status`) VALUES
(1, 1, '', '', 1, 'active'),
(2, 2, '', '', 1, 'active'),
(9, 7, '', '', 3, 'active'),
(10, 8, '', '', 2, 'active'),
(11, 9, '', '', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `default_passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `temp_employee_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `biodata_id` bigint(20) NOT NULL DEFAULT '0',
  `first_login` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempt` tinyint(1) NOT NULL DEFAULT '5',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `default_passwd`, `fullname`, `phone_number`, `temp_employee_id`, `biodata_id`, `first_login`, `login_attempt`, `status`, `created_by`, `date_created`) VALUES
(1, 'osborne.mordred@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Osborne Mordreds', '0541786220', 'KAD/SYS/1', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(2, 'wikills2k@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Bismark Offei ', '0245626487', 'KAD/SYS/2', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(7, 'Akosuapompey@maviscolaundry.com', '', '$2y$10$qdYdPNneNRwV6EJfj8oOY.NN6tXe.puxiu8Iu0coC0ubFDdBthmQ6', 'Akosua  Pompey', '', '', 1, 0, 5, 'active', 0, '2017-12-30 14:09:44'),
(8, 'Claude@africaloop.com', '', '$2y$10$SJ9epSqbPTOE1dZaGtcCZOZkhMOHOrfGYFAzwzVXK9YiT0e5kFD1y', 'Claude Nii Nai', '', '', 1, 0, 5, 'inactive', 0, '2018-01-17 17:38:37'),
(9, 'Watara@gmail.com', '', '$2y$10$R1kViRYSZQ37XsnREjvJxuCSuDtIZN6eo.wxl80ms.1iFcQ/1dMCy', 'Bismark  Nana', '', '', 4, 0, 5, 'active', 0, '2018-01-17 17:42:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_details`
--
CREATE TABLE `vw_user_details` (
`id` bigint(20)
,`username` varchar(255)
,`passwd` varchar(100)
,`fullname` varchar(255)
,`phone_number` varchar(25)
,`employee_id` varchar(50)
,`biodata_id` bigint(20)
,`first_login` tinyint(1)
,`login_attempt` tinyint(1)
,`status` enum('active','inactive','deleted','')
,`created_by` bigint(20)
,`date_created` timestamp
,`custom_roles` mediumtext
,`custom_privileges` mediumtext
,`group_id` varchar(11)
,`user_roles_status` varchar(8)
,`group_name` varchar(255)
,`group_roles` mediumtext
,`group_privileges` mediumtext
);

-- --------------------------------------------------------

--
-- Structure for view `vw_user_details`
--
DROP TABLE IF EXISTS `vw_user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details`  AS  select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`passwd` AS `passwd`,coalesce(convert((select concat(`bgee_db`.`hr_employee_biodata`.`first_name`,' ',`bgee_db`.`hr_employee_biodata`.`middle_name`,' ',`bgee_db`.`hr_employee_biodata`.`last_name`) from `bgee_db`.`hr_employee_biodata` where (`bgee_db`.`hr_employee_biodata`.`id` = `a`.`biodata_id`)) using utf8),`a`.`fullname`) AS `fullname`,coalesce((select `bgee_db`.`hr_employee_contact_info`.`phone_number_1` from `bgee_db`.`hr_employee_contact_info` where (`bgee_db`.`hr_employee_contact_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`phone_number`) AS `phone_number`,coalesce((select `bgee_db`.`hr_employee_work_info`.`employee_id` from `bgee_db`.`hr_employee_work_info` where (`bgee_db`.`hr_employee_work_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`temp_employee_id`) AS `employee_id`,`a`.`biodata_id` AS `biodata_id`,`a`.`first_login` AS `first_login`,`a`.`login_attempt` AS `login_attempt`,`a`.`status` AS `status`,`a`.`created_by` AS `created_by`,`a`.`date_created` AS `date_created`,coalesce(`b`.`custom_roles`,'') AS `custom_roles`,coalesce(`b`.`custom_privileges`,'') AS `custom_privileges`,coalesce(`b`.`group_id`,'') AS `group_id`,coalesce(`b`.`status`,'') AS `user_roles_status`,coalesce(`c`.`name`,'') AS `group_name`,coalesce(`c`.`roles`,'') AS `group_roles`,coalesce(`c`.`privileges`,'') AS `group_privileges` from (((`users` `a` left join `roles_privileges_user` `b` on((`a`.`id` = `b`.`user_id`))) left join `roles_privileges_group` `c` on((`b`.`group_id` = `c`.`id`))) left join `bgee_db`.`hr_employee_work_info` `d` on((`a`.`biodata_id` = `d`.`biodata_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_privileges_group`
--
ALTER TABLE `roles_privileges_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `roles_privileges_user`
--
ALTER TABLE `roles_privileges_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `password_reset_requests`
--
ALTER TABLE `password_reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles_privileges_group`
--
ALTER TABLE `roles_privileges_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles_privileges_user`
--
ALTER TABLE `roles_privileges_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;--
-- Database: `bgee_views`
--
CREATE DATABASE IF NOT EXISTS `bgee_views` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bgee_views`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_employee_details`
--
CREATE TABLE `vw_employee_details` (
`id` bigint(20)
,`first_name` varchar(100)
,`middle_name` varchar(50)
,`last_name` varchar(100)
,`fullname` varchar(252)
,`gender` varchar(20)
,`date_of_birth` date
,`residence_address` text
,`phone_number_1` varchar(25)
,`phone_number_2` varchar(25)
,`email` varchar(50)
,`emergency_fullname` varchar(255)
,`emergency_relationship` varchar(50)
,`emergency_occupation` varchar(50)
,`emergency_phone_1` varchar(20)
,`emergency_phone_2` varchar(20)
,`emergency_residence` varchar(50)
,`id_number` varchar(50)
,`id_expiry_date` date
,`id_issue_date` date
,`marital_status` varchar(50)
,`nationality` varchar(255)
,`postal_address` text
,`social_security` varchar(50)
,`bank_name` varchar(255)
,`bank_branch` varchar(255)
,`account_number` varchar(50)
,`user_id` bigint(20)
,`status` enum('active','inactive','deleted')
,`created_date` datetime
,`employment_type` varchar(50)
,`employment_startdate` date
,`employee_id` varchar(50)
,`work_email` varchar(50)
,`department` varchar(255)
,`position_id` tinyint(2)
,`current_position` varchar(50)
,`profile_photo` text
,`resume_file_path` text
,`application_file_path` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_hr_departments`
--
CREATE TABLE `vw_hr_departments` (
`id` tinyint(2)
,`parent_department` int(11)
,`name` varchar(255)
,`description` mediumtext
,`status` enum('active','suspended','deleted')
,`date_created` datetime
,`parent_department_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_clients`
--
CREATE TABLE `vw_laundry_clients` (
`id` bigint(20)
,`fullname` varchar(255)
,`gender` varchar(10)
,`company` varchar(255)
,`residence_address` text
,`postal_address` text
,`phone_number_1` varchar(20)
,`phone_number_2` varchar(20)
,`email` varchar(30)
,`sms_alert` tinyint(1)
,`online_access` tinyint(1)
,`status` enum('active','inactive','deleted')
,`date_created` datetime
,`pending_orders` bigint(21)
,`completed_orders` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_order_comments`
--
CREATE TABLE `vw_laundry_order_comments` (
`id` bigint(20)
,`order_id` bigint(20)
,`user_id` bigint(20)
,`comment` varchar(255)
,`status` enum('active','inactive')
,`date_created` datetime
,`commenter_fullname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_prices`
--
CREATE TABLE `vw_laundry_prices` (
`id` bigint(20)
,`service_id` bigint(20)
,`service_code` char(2)
,`service_name` varchar(150)
,`weight_id` varchar(20)
,`weight` varchar(20)
,`garment_id` varchar(20)
,`garment_name` varchar(50)
,`amount` float
,`status` enum('active','inactive','deleted','')
,`date_created` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_weights`
--
CREATE TABLE `vw_laundry_weights` (
`id` bigint(20)
,`service_type` bigint(20)
,`weight` varchar(20)
,`description` varchar(255)
,`status` enum('active','inactive','deleted','')
,`date_created` datetime
,`service` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orderlist_summary`
--
CREATE TABLE `vw_orderlist_summary` (
`id` bigint(20)
,`order_number` varchar(20)
,`total_cost` double
,`tax` float
,`amount_paid` double
,`previous_balance` double
,`balance_paid` double
,`total_amount_paid` double
,`balance` double
,`balance_received_by` varchar(255)
,`balance_payment_date` varchar(19)
,`client_id` bigint(20)
,`processor_user_id` bigint(20)
,`delivery_method_id` bigint(20)
,`delivery_location` varchar(255)
,`due_date` date
,`status` enum('Pending','Processing','Dispatch','Delivered','Cancelled')
,`modified_by` varchar(20)
,`modified_date` varchar(19)
,`total_comments` varbinary(21)
,`date_created` datetime
,`client_fullname` varchar(255)
,`client_company` varchar(255)
,`client_phone_no_1` varchar(20)
,`client_phone_no_2` varchar(20)
,`processor_name` varchar(255)
,`delivery_method` varchar(255)
,`delivery_cost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_details`
--
CREATE TABLE `vw_user_details` (
`id` bigint(20)
,`username` varchar(255)
,`passwd` varchar(100)
,`default_passwd` varchar(255)
,`fullname` varchar(255)
,`phone_number` varchar(25)
,`employee_id` varchar(50)
,`biodata_id` bigint(20)
,`first_login` tinyint(1)
,`login_attempt` tinyint(1)
,`status` enum('active','inactive','deleted','')
,`created_by` bigint(20)
,`date_created` timestamp
,`custom_roles` mediumtext
,`custom_privileges` mediumtext
,`group_id` varchar(11)
,`user_roles_status` varchar(8)
,`group_name` varchar(255)
,`group_roles` mediumtext
,`group_privileges` mediumtext
,`group_login_url` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_employee_details`
--
DROP TABLE IF EXISTS `vw_employee_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employee_details`  AS  select `a`.`id` AS `id`,`a`.`first_name` AS `first_name`,`a`.`middle_name` AS `middle_name`,`a`.`last_name` AS `last_name`,concat(`a`.`first_name`,' ',`a`.`middle_name`,' ',`a`.`last_name`) AS `fullname`,`a`.`gender` AS `gender`,`a`.`date_of_birth` AS `date_of_birth`,`g`.`residence` AS `residence_address`,`g`.`phone_number_1` AS `phone_number_1`,`g`.`phone_number_2` AS `phone_number_2`,`g`.`email` AS `email`,`g`.`emergency_fullname` AS `emergency_fullname`,`g`.`emergency_relationship` AS `emergency_relationship`,`g`.`emergency_occupation` AS `emergency_occupation`,`g`.`emergency_phone_1` AS `emergency_phone_1`,`g`.`emergency_phone_2` AS `emergency_phone_2`,`g`.`emergency_residence` AS `emergency_residence`,`a`.`id_number` AS `id_number`,`a`.`id_expiry_date` AS `id_expiry_date`,`a`.`id_issue_date` AS `id_issue_date`,`a`.`marital_status` AS `marital_status`,`a`.`nationality` AS `nationality`,`a`.`postal_address` AS `postal_address`,`a`.`social_security` AS `social_security`,`a`.`bank_name` AS `bank_name`,`a`.`bank_branch` AS `bank_branch`,`a`.`account_number` AS `account_number`,`a`.`user_id` AS `user_id`,`a`.`status` AS `status`,`a`.`created_date` AS `created_date`,`d`.`employment_type` AS `employment_type`,`d`.`employment_startdate` AS `employment_startdate`,`d`.`employee_id` AS `employee_id`,`d`.`work_email` AS `work_email`,`e`.`name` AS `department`,`f`.`id` AS `position_id`,`f`.`name` AS `current_position`,(select `bgee_db`.`blobs`.`file_path` from `bgee_db`.`blobs` where (`a`.`photo_id` = `bgee_db`.`blobs`.`id`)) AS `profile_photo`,(select `bgee_db`.`blobs`.`file_path` from `bgee_db`.`blobs` where (`d`.`resume_id` = `bgee_db`.`blobs`.`id`)) AS `resume_file_path`,(select `bgee_db`.`blobs`.`file_path` from `bgee_db`.`blobs` where (`d`.`application_id` = `bgee_db`.`blobs`.`id`)) AS `application_file_path` from (((((`bgee_db`.`hr_employee_biodata` `a` left join `bgee_db`.`hr_employee_other_info` `c` on((`a`.`id` = `c`.`biodata_id`))) left join `bgee_db`.`hr_employee_work_info` `d` on((`a`.`id` = `d`.`biodata_id`))) left join `bgee_db`.`hr_employee_contact_info` `g` on((`a`.`id` = `g`.`biodata_id`))) left join `bgee_db`.`hr_departments` `e` on((`d`.`department_id` = `e`.`id`))) left join `bgee_db`.`hr_position` `f` on((`d`.`position_id` = `f`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_hr_departments`
--
DROP TABLE IF EXISTS `vw_hr_departments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `vw_hr_departments`  AS  select `a`.`id` AS `id`,`a`.`parent_department` AS `parent_department`,`a`.`name` AS `name`,`a`.`description` AS `description`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,coalesce(`b`.`name`,'None') AS `parent_department_name` from (`bgee_db`.`hr_departments` `a` left join `bgee_db`.`hr_departments` `b` on((`a`.`parent_department` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_clients`
--
DROP TABLE IF EXISTS `vw_laundry_clients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_clients`  AS  select `a`.`id` AS `id`,`a`.`fullname` AS `fullname`,`a`.`gender` AS `gender`,`a`.`company` AS `company`,`a`.`residence_address` AS `residence_address`,`a`.`postal_address` AS `postal_address`,`a`.`phone_number_1` AS `phone_number_1`,`a`.`phone_number_2` AS `phone_number_2`,`a`.`email` AS `email`,`a`.`sms_alert` AS `sms_alert`,`a`.`online_access` AS `online_access`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,coalesce((select count(`bgee_db`.`laundry_orders`.`id`) from `bgee_db`.`laundry_orders` where ((`bgee_db`.`laundry_orders`.`client_id` = `a`.`id`) and (`bgee_db`.`laundry_orders`.`status` = 'pending'))),0) AS `pending_orders`,coalesce((select count(`bgee_db`.`laundry_orders`.`id`) from `bgee_db`.`laundry_orders` where ((`bgee_db`.`laundry_orders`.`client_id` = `a`.`id`) and (`bgee_db`.`laundry_orders`.`status` = 'delivered'))),0) AS `completed_orders` from `bgee_db`.`laundry_clients` `a` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_order_comments`
--
DROP TABLE IF EXISTS `vw_laundry_order_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_order_comments`  AS  select `a`.`id` AS `id`,`a`.`order_id` AS `order_id`,`a`.`user_id` AS `user_id`,`a`.`comment` AS `comment`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`fullname` AS `commenter_fullname` from (`bgee_db`.`laundry_order_comments` `a` left join `bgee_permissions`.`vw_user_details` `b` on((`a`.`user_id` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_prices`
--
DROP TABLE IF EXISTS `vw_laundry_prices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_prices`  AS  select `a`.`id` AS `id`,`a`.`service_id` AS `service_id`,`b`.`code` AS `service_code`,`b`.`name` AS `service_name`,coalesce(`a`.`weight_id`,'') AS `weight_id`,coalesce(`c`.`weight`,'') AS `weight`,coalesce(`a`.`garment_id`,'') AS `garment_id`,coalesce(`d`.`name`,'') AS `garment_name`,`a`.`amount` AS `amount`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created` from (((`bgee_db`.`laundry_prices` `a` left join `bgee_db`.`laundry_services` `b` on((`a`.`service_id` = `b`.`id`))) left join `bgee_db`.`laundry_weights` `c` on((`a`.`weight_id` = `c`.`id`))) left join `bgee_db`.`laundry_garments` `d` on((`a`.`garment_id` = `d`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_weights`
--
DROP TABLE IF EXISTS `vw_laundry_weights`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_weights`  AS  select `a`.`id` AS `id`,`a`.`service_type` AS `service_type`,`a`.`weight` AS `weight`,`a`.`description` AS `description`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`name` AS `service` from (`bgee_db`.`laundry_weights` `a` left join `bgee_db`.`laundry_services` `b` on((`a`.`service_type` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_orderlist_summary`
--
DROP TABLE IF EXISTS `vw_orderlist_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlist_summary`  AS  select `a`.`id` AS `id`,`a`.`order_number` AS `order_number`,`a`.`total_cost` AS `total_cost`,`f`.`value` AS `tax`,`a`.`amount_paid` AS `amount_paid`,`a`.`balance` AS `previous_balance`,coalesce(`e`.`balance_paid`,0) AS `balance_paid`,(`a`.`amount_paid` + coalesce(`e`.`balance_paid`,0)) AS `total_amount_paid`,coalesce((`a`.`balance` - `e`.`balance_paid`),`a`.`balance`) AS `balance`,coalesce((select `vw_user_details`.`fullname` from `bgee_permissions`.`vw_user_details` where (`vw_user_details`.`id` = `e`.`user_id`)),'') AS `balance_received_by`,coalesce(`e`.`payment_date`,'') AS `balance_payment_date`,`a`.`client_id` AS `client_id`,`a`.`processor_user_id` AS `processor_user_id`,`a`.`delivery_method_id` AS `delivery_method_id`,`a`.`delivery_location` AS `delivery_location`,`a`.`due_date` AS `due_date`,`a`.`status` AS `status`,coalesce(`a`.`modified_by`,'') AS `modified_by`,coalesce(`a`.`modified_date`,'') AS `modified_date`,coalesce((select count(`bgee_db`.`laundry_order_comments`.`comment`) from `bgee_db`.`laundry_order_comments` where (`bgee_db`.`laundry_order_comments`.`order_id` = `a`.`id`)),'') AS `total_comments`,`a`.`date_created` AS `date_created`,`b`.`fullname` AS `client_fullname`,coalesce(`b`.`company`,'') AS `client_company`,`b`.`phone_number_1` AS `client_phone_no_1`,`b`.`phone_number_2` AS `client_phone_no_2`,`c`.`fullname` AS `processor_name`,`d`.`location` AS `delivery_method`,`d`.`price` AS `delivery_cost` from (((((`bgee_db`.`laundry_orders` `a` left join `bgee_db`.`laundry_clients` `b` on((`a`.`client_id` = `b`.`id`))) left join `bgee_permissions`.`vw_user_details` `c` on((`a`.`processor_user_id` = `c`.`id`))) left join `bgee_db`.`laundry_delivery_method` `d` on((`a`.`delivery_method_id` = `d`.`id`))) left join `bgee_db`.`laundry_order_balances` `e` on((`a`.`id` = `e`.`order_id`))) left join `bgee_db`.`tax_system` `f` on((`a`.`tax_id` = `f`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_details`
--
DROP TABLE IF EXISTS `vw_user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details`  AS  select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`passwd` AS `passwd`,`a`.`default_passwd` AS `default_passwd`,coalesce(convert((select concat(`bgee_db`.`hr_employee_biodata`.`first_name`,' ',`bgee_db`.`hr_employee_biodata`.`middle_name`,' ',`bgee_db`.`hr_employee_biodata`.`last_name`) from `bgee_db`.`hr_employee_biodata` where (`bgee_db`.`hr_employee_biodata`.`id` = `a`.`biodata_id`)) using utf8),`a`.`fullname`) AS `fullname`,coalesce((select `bgee_db`.`hr_employee_contact_info`.`phone_number_1` from `bgee_db`.`hr_employee_contact_info` where (`bgee_db`.`hr_employee_contact_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`phone_number`) AS `phone_number`,coalesce((select `bgee_db`.`hr_employee_work_info`.`employee_id` from `bgee_db`.`hr_employee_work_info` where (`bgee_db`.`hr_employee_work_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`temp_employee_id`) AS `employee_id`,`a`.`biodata_id` AS `biodata_id`,`a`.`first_login` AS `first_login`,`a`.`login_attempt` AS `login_attempt`,`a`.`status` AS `status`,`a`.`created_by` AS `created_by`,`a`.`date_created` AS `date_created`,coalesce(`b`.`custom_roles`,'') AS `custom_roles`,coalesce(`b`.`custom_privileges`,'') AS `custom_privileges`,coalesce(`b`.`group_id`,'') AS `group_id`,coalesce(`b`.`status`,'') AS `user_roles_status`,coalesce(`c`.`name`,'') AS `group_name`,coalesce(`c`.`roles`,'') AS `group_roles`,coalesce(`c`.`privileges`,'') AS `group_privileges`,`c`.`login_url` AS `group_login_url` from (((`bgee_permissions`.`users` `a` left join `bgee_permissions`.`roles_privileges_user` `b` on((`a`.`id` = `b`.`user_id`))) left join `bgee_permissions`.`roles_privileges_group` `c` on((`b`.`group_id` = `c`.`id`))) left join `bgee_db`.`hr_employee_work_info` `d` on((`a`.`biodata_id` = `d`.`biodata_id`))) ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
