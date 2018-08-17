-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 06:47 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_login_failed`
--

CREATE TABLE `access_login_failed` (
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

-- --------------------------------------------------------

--
-- Table structure for table `access_login_successful`
--

CREATE TABLE `access_login_successful` (
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
-- Dumping data for table `access_login_successful`
--

INSERT INTO `access_login_successful` (`id`, `user_id`, `time_in`, `time_out`, `online`, `user_agent`, `ipaddress`, `hostname`, `city_region`, `country`) VALUES
(1, 1, '2018-08-04 00:05:40', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36', '::1', 'London', NULL, NULL),
(2, 1, '2018-08-04 00:22:20', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36', '::1', 'London', NULL, NULL),
(3, 1, '2018-08-04 00:30:49', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36', '::1', 'London', NULL, NULL),
(4, 1, '2018-08-04 00:36:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.84 Safari/537.36', '::1', 'London', NULL, NULL),
(5, 1, '2018-08-04 00:36:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(6, 1, '2018-08-08 09:11:47', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(7, 1, '2018-08-08 09:16:58', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(8, 1, '2018-08-08 13:58:12', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(9, 1, '2018-08-08 17:08:11', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(10, 1, '2018-08-08 17:10:23', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '192.168.3.40', 'London', ',', NULL),
(11, 1, '2018-08-08 17:11:48', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.183 Safari/537.36 Vivaldi/1.96.1147.64', '192.168.3.11', 'LAPTOP-PP1FHF0I', ',', NULL),
(12, 1, '2018-08-08 18:45:49', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '192.168.3.11', 'LAPTOP-PP1FHF0I', ',', NULL),
(13, 1, '2018-08-08 19:25:28', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '192.168.3.40', 'London', ',', NULL),
(14, 1, '2018-08-08 19:33:20', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '192.168.3.40', 'London', ',', NULL),
(15, 1, '2018-08-08 23:27:40', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(16, 1, '2018-08-09 09:42:45', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '192.168.3.40', 'London', ',', NULL),
(17, 1, '2018-08-09 10:14:12', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(18, 1, '2018-08-09 10:20:36', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(19, 1, '2018-08-09 10:34:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.183 Safari/537.36 Vivaldi/1.96.1147.52', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(20, 1, '2018-08-10 05:55:21', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.183 Safari/537.36 Vivaldi/1.96.1147.52', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(21, 1, '2018-08-10 07:31:15', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(22, 1, '2018-08-10 13:59:48', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(23, 1, '2018-08-10 16:09:29', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.4.162', '154.160.4.162', 'Accra,Greater Accra Region', 'Ghana'),
(24, 1, '2018-08-10 21:48:53', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.4.162', '154.160.4.162', 'Accra,Greater Accra Region', 'Ghana'),
(25, 1, '2018-08-11 07:45:49', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Linux; Android 4.4.2; T1-701u Build/HuaweiMediaPad) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.109 Safari/537.36', '41.66.199.84', '41.66.199.84', 'Accra,Greater Accra Region', 'Ghana'),
(26, 1, '2018-08-12 22:31:27', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '197.190.168.70', '197.190.168.70', 'Kumasi,Ashanti Region', 'Ghana'),
(27, 1, '2018-08-12 22:57:37', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Linux; Android 7.0; TECNO K7 Build/NRD90M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobile Safari/537.36', '197.191.127.252', '197.191.127.252', 'Accra (Osu Klottey),Greater Accra', 'Ghana'),
(28, 1, '2018-08-13 09:48:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(29, 1, '2018-08-13 17:32:42', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(30, 1, '2018-08-13 19:56:10', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.6.119', '154.160.6.119', 'Accra,Greater Accra Region', 'Ghana'),
(31, 1, '2018-08-14 05:38:14', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '41.215.171.151', '41.215.171.151', 'Accra,Greater Accra Region', 'Ghana'),
(32, 1, '2018-08-14 05:55:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.3.89', '154.160.3.89', 'Gawso,', 'Ghana'),
(33, 1, '2018-08-14 08:06:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(34, 1, '2018-08-14 10:17:13', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', '104.129.18.62', 'unassigned.quadranet.com', 'Atlanta,Georgia', 'United States'),
(35, 1, '2018-08-14 13:52:50', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(36, 1, '2018-08-15 11:45:22', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(37, 2, '2018-08-15 11:57:35', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(38, 1, '2018-08-16 19:39:09', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '41.215.163.6', '41.215.163.6', 'Accra,Greater Accra Region', 'Ghana'),
(39, 1, '2018-08-16 20:44:56', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.1.182', '154.160.1.182', 'Accra,Greater Accra Region', 'Ghana'),
(40, 1, '2018-08-16 20:45:09', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/66.0.3359.122 Mobile/15G77 Safari/604.1', '154.160.1.182', '154.160.1.182', 'Accra,Greater Accra Region', 'Ghana'),
(41, 1, '2018-08-17 00:32:17', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '41.215.163.6', '41.215.163.6', 'Accra,Greater Accra Region', 'Ghana'),
(42, 1, '2018-08-17 11:25:07', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(43, 1, '2018-08-17 12:19:46', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(44, 1, '2018-08-17 12:27:37', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15', '41.191.96.26', '41.191.96.26', 'Accra,Greater Accra Region', 'Ghana'),
(45, 1, '2018-08-17 12:32:34', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', '197.159.128.74', '197.159.128.74', 'Accra,Greater Accra Region', 'Ghana'),
(46, 1, '2018-08-17 13:54:22', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL),
(47, 1, '2018-08-17 15:02:24', '0000-00-00 00:00:00', 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0', '::1', 'London', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_password_reset_requests`
--

CREATE TABLE `access_password_reset_requests` (
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
-- Table structure for table `access_roles_privileges_group`
--

CREATE TABLE `access_roles_privileges_group` (
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
-- Dumping data for table `access_roles_privileges_group`
--

INSERT INTO `access_roles_privileges_group` (`id`, `name`, `roles`, `privileges`, `description`, `login_url`, `status`, `date_created`) VALUES
(1, 'SYSTEM', 'statistics|overview|inhouse|dispatch|Settings|company|users|permissions|customers|reports|sms', '', 'Designers of this software', 'dashboard', 'active', '2017-10-16 17:42:32'),
(2, 'RECEPTIONIST', 'statistics|overview|inhouse|dispatch', '', NULL, '', 'active', '2018-08-15 10:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `access_roles_privileges_user`
--

CREATE TABLE `access_roles_privileges_user` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL COMMENT 'Contains the id of the user',
  `custom_roles` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Exceptional/Added Roles of a user',
  `custom_privileges` text CHARACTER SET utf8 NOT NULL COMMENT 'Contains the Permissible Actions on the Exceptional Roles assigned to the user',
  `group_id` int(11) NOT NULL COMMENT 'Contains the id of the group to which the user belongs to in roles & priviledges',
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 DEFAULT 'active' COMMENT 'state of the user''s permissions.'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `access_roles_privileges_user`
--

INSERT INTO `access_roles_privileges_user` (`id`, `user_id`, `custom_roles`, `custom_privileges`, `group_id`, `status`) VALUES
(1, 1, '', '', 1, 'active'),
(2, 2, '', '', 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `access_sysaudit`
--

CREATE TABLE `access_sysaudit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `changeset` text NOT NULL,
  `session_login_id` bigint(20) NOT NULL,
  `session_fullname` varchar(800) NOT NULL,
  `entity` varchar(100) NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_users`
--

CREATE TABLE `access_users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(100) CHARACTER SET utf8 NOT NULL,
  `default_passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `temp_employee_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `biodata_id` bigint(20) NOT NULL DEFAULT '0',
  `demo_user_id` int(11) NOT NULL,
  `first_login` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempt` tinyint(1) NOT NULL DEFAULT '5',
  `online` tinyint(4) NOT NULL,
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `access_users`
--

INSERT INTO `access_users` (`id`, `username`, `passwd`, `default_passwd`, `fullname`, `phone_number`, `temp_employee_id`, `biodata_id`, `demo_user_id`, `first_login`, `login_attempt`, `online`, `status`, `created_by`, `date_created`) VALUES
(1, 'eahlijah@gmail.com', '$2y$10$O/swrfsJ6TbhtHiyzR7GmurgN4u49VcaMFzrOtZ9.3N511hoPhOVi', '', 'Edem Ahlijah', '023456789', 'KAD/SYS/001', 0, 0, 0, 5, 0, 'active', 0, '2018-07-03 15:59:37'),
(2, 'quuqubismark@yahoo.com', '', '$2y$10$k2DkumN0H4sXIKwK.C6Pr.VcBpYEmebFbxR1z/EW02SLRGG.K/ph2', 'BIAMARK  K', '', '', 3, 0, 0, 5, 0, 'active', 0, '2018-08-15 11:56:28'),
(3, 'wikills22@gmail.com', '$2y$10$BSmfg/t6.N12rVVdJmvk4ey62u98hwHcQ/zFZfkdi2rMMgIWKK/Be', '', 'Bismark Nana', 'bv', '', 0, 1, 0, 5, 0, 'active', 0, '2018-08-15 14:57:11'),
(4, 'bismarkoffei22@gmail.com', '$2y$10$FUkj8vCJlyE0vXlOQIk3kuYrFEqlxVI0FAFbXo7ugtvEfB5bSXbPK', '', 'Bismark Nana', 'bv', '', 0, 2, 0, 5, 0, 'active', 0, '2018-08-15 14:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `blobs`
--

CREATE TABLE `blobs` (
  `id` bigint(20) NOT NULL COMMENT 'auto generated id',
  `file_path` text CHARACTER SET latin1 NOT NULL COMMENT 'physical location of blob',
  `user_id` bigint(20) NOT NULL COMMENT 'id of the user who uploaded the file',
  `mime_type` int(11) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date the file was uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `demo_requests`
--

CREATE TABLE `demo_requests` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `expectations` text NOT NULL,
  `date_scheduled` datetime DEFAULT NULL,
  `feedback` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demo_requests`
--

INSERT INTO `demo_requests` (`id`, `first_name`, `last_name`, `email`, `contact`, `company_name`, `company_location`, `expectations`, `date_scheduled`, `feedback`, `date_created`) VALUES
(1, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:34:25'),
(2, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:35:49'),
(3, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:37:18'),
(4, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:39:31'),
(5, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:48:14'),
(6, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:53:41'),
(7, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:54:05'),
(8, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Test', NULL, NULL, '2018-08-17 14:56:05'),
(9, 'Osborne', 'Mordreds', 'osborne.mordred@gmail.com', '0541786220', 'Marksbon Limited', 'Taifa', 'Some Told Me About This Laundry System. So I Want To Give It A Try.', NULL, NULL, '2018-08-17 14:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `demo_request_userinfo`
--

CREATE TABLE `demo_request_userinfo` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `date_scheduled` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demo_request_userinfo`
--

INSERT INTO `demo_request_userinfo` (`id`, `first_name`, `last_name`, `email`, `contact`, `company_name`, `company_location`, `remarks`, `date_scheduled`, `date_created`) VALUES
(1, 'Bismark', 'Nana', 'wikills22@gmail.com', 'bv', 'OARB-Bank', 'Tiafa', '', NULL, '2018-08-15 10:57:11'),
(2, 'Bismark', 'Nana', 'bismarkoffei22@gmail.com', 'bv', 'OARB-Bank', 'Tiafa', '', NULL, '2018-08-15 10:59:00');

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
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `residence_address` varchar(255) NOT NULL COMMENT 'physical location and street name where company is located',
  `website` varchar(100) NOT NULL COMMENT 'website of the comany',
  `mission` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `gps_location` varchar(255) DEFAULT NULL,
  `tin_number` varchar(50) NOT NULL,
  `logo_id` int(11) NOT NULL,
  `date_of_commence` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `hr_company_info`
--

INSERT INTO `hr_company_info` (`id`, `name`, `telephone_1`, `telephone_2`, `fax`, `email`, `postal_address`, `residence_address`, `website`, `mission`, `vision`, `gps_location`, `tin_number`, `logo_id`, `date_of_commence`) VALUES
(1, 'BG\'S LAUNDRY', '0244000999', '0233888999', NULL, 'info@gblaundry.com', 'POSTAL ADDRES', 'OFANKOR', 'www.gbslaundry.com', 'MISSION STATEMENT', 'VISION STATEMAN', '', 'TN-12345678', 0, '0000-00-00');

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
(1, 0, 'SYSTEM', 'THIS DEPARTMENTS ARE USED BY THE SYSTEM DEVELOPERS GROUP FOR THE MAINTENANCE OF THE SYSTEM VIA LOCAL OR REMOTELY. ', 'active', '2018-05-03 21:31:58'),
(2, 0, 'OPERATIONS', 'Sees To The Overall Procedure Of The Laundry Process', 'active', '2018-08-04 00:49:44'),
(3, 2, 'FRONT DESK', 'All Personnel That Relatest To The Client', 'active', '2018-08-04 00:56:24'),
(4, 0, 'FINANCE', 'Controls All Finances Of The Business', 'active', '2018-08-04 00:59:05');

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
(1, 'Bismark', 'Atta Kwame', 'Offei', 'Male', NULL, NULL, NULL, NULL, NULL, 0, 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2018-08-04 02:09:47'),
(3, 'BIAMARK', '', 'K', 'Male', NULL, NULL, NULL, NULL, NULL, 0, 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2018-08-15 07:55:33');

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
(1, 1, '0233897468', '0240636911', 'Wikills22@gmail.com', 'Taifa', 'Osborne Mordreds', 'Guardian', '', '0541786220', NULL, 'Abelemkpe', '', '2018-08-04 02:09:47'),
(2, 3, '0245626487', '', 'quuqubismark@yahoo.com', 'Ashoman-Estate', '0245626487', 'Father', '', '0245626487', NULL, '0245626487', '', '2018-08-15 11:55:33');

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
(1, 1, 'BG/EMP/001', 6, 1, '', NULL, NULL, NULL, 0, '2018-08-04 02:09:47'),
(2, 3, 'BG/EMP/002', 6, 2, '', NULL, NULL, NULL, 0, '2018-08-15 11:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `hr_position`
--

CREATE TABLE `hr_position` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_position` int(11) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `description` text,
  `salary` int(11) NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hr_position`
--

INSERT INTO `hr_position` (`id`, `name`, `parent_position`, `department_id`, `description`, `salary`, `status`, `created_date`) VALUES
(1, 'SYSTEM', 0, 1, 'Developers Of the System', 0, 'active', '2018-05-08 11:04:04'),
(2, 'OPERATIONS MANAGER', 4, 2, 'Manage All Employees And Process Flow', 2000, 'active', '2018-08-04 01:07:23'),
(3, 'ACCOUNTANT', 4, 4, 'Controls All Financial Matters', 2500, 'active', '2018-08-04 01:08:51'),
(4, 'CEO', NULL, 2, 'Ceo', 1, 'active', '2018-08-04 01:09:19'),
(5, 'RECEPTIONIST', 2, 3, 'Recieves Client On First Counter', 700, 'active', '2018-08-04 01:32:48'),
(6, 'ADMIN', 2, 2, 'Super User Of The System And It Maintenance', 1500, 'active', '2018-08-04 01:36:57');

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
  `email_alert` tinyint(1) NOT NULL,
  `online_access` tinyint(1) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_clients`
--

INSERT INTO `laundry_clients` (`id`, `fullname`, `gender`, `company`, `residence_address`, `postal_address`, `phone_number_1`, `phone_number_2`, `email`, `sms_alert`, `email_alert`, `online_access`, `status`, `date_created`) VALUES
(1, 'Claude Nii Nai', 'Male', 'Africaloop Limited', 'Trade Fair - LA', 'Africaloop Postal Address', '0243223959', '0244444888', 'claude@africaloop.com', 1, 1, 1, 'active', '2018-08-08 09:14:48'),
(2, 'James Agaga', 'Male', 'WeBAD', 'Dome - Kwabenya', 'Dome', '0234897463', '', 'james@africaloop.com', 1, 1, 1, 'active', '2018-08-08 19:41:41'),
(3, 'Julius Tornyi', 'Male', 'WebAD', 'Taifa', 'Tema', '0541786220', '', 'julius@webad.com.gh', 1, 0, 0, 'active', '2018-08-08 19:47:06'),
(4, 'Bismark', 'Male', 'OARB-Bank', 'Taifa', 'box TA 353,Accra', '0000000000', '', 'bismarkoffei22@gmail.com', 1, 1, 1, 'active', '2018-08-09 06:43:23'),
(5, 'Eunice Asare-Owusu', 'Female', 'OARB-Bank', 'Ashoman-Estate', 'box TA 353,Accra', '1111111111', '', '', 1, 1, 1, 'active', '2018-08-10 10:06:37'),
(6, 'BisMarck', 'Male', 'Oarb', 'Aif', 'box ta tafa', '1234567890', '', 'quuqubismark@gmail', 0, 1, 1, 'active', '2018-08-11 04:16:43'),
(7, 'Nana', 'Male', 'BG', 'Burkina', 'Taifa’s', '0245626487', '', 'wikills22@gmail.com', 1, 1, 1, 'active', '2018-08-13 16:04:29'),
(8, 'Wisdom', 'Male', 'Sablah', 'Ct Loop', 'YK 1407, kanda', '0247173741', '', 'sablah247@gmail.com', 1, 0, 0, 'active', '2018-08-14 06:22:07');

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
(5, 'Pickup (At Office)', 'At Users Discretion', 0, 'deleted', '2017-12-27 20:08:58'),
(6, 'Pick Up (At Office)', 'Client\'s Own Time', 0, 'active', '2018-07-03 16:27:58');

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
-- Table structure for table `laundry_orders`
--

CREATE TABLE `laundry_orders` (
  `id` bigint(20) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `total_cost` double NOT NULL,
  `amount_paid` double NOT NULL,
  `change_paid` double DEFAULT NULL,
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
  `reason_for_cancel` varchar(255) NOT NULL,
  `delivered_by` bigint(20) NOT NULL,
  `processing_stages` enum('Pending','Washing','Drying','Ironing','Ready For Dispatch') NOT NULL DEFAULT 'Pending',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_orders`
--

INSERT INTO `laundry_orders` (`id`, `order_number`, `total_cost`, `amount_paid`, `change_paid`, `balance`, `tax_id`, `client_id`, `processor_user_id`, `delivery_method_id`, `delivery_location`, `due_date`, `status`, `modified_by`, `modified_date`, `reason_for_cancel`, `delivered_by`, `processing_stages`, `date_created`) VALUES
(1, '25835244', 15, 10, NULL, 5, 2, 1, 1, 4, 'Abelemkpe', '2018-08-10', 'Dispatch', 1, '2018-08-10 07:56:14', '', 0, 'Pending', '2018-08-08 10:39:55'),
(2, '05497071', 30, 20, NULL, 10, 2, 3, 1, 4, 'Abelemkpe', '2018-08-10', 'Dispatch', 1, '2018-08-10 07:56:02', '', 0, 'Pending', '2018-08-08 20:08:28'),
(3, '53618062', 60, 11, NULL, 49, 2, 4, 1, 6, 'Taifa', '2018-08-11', 'Dispatch', 1, '2018-08-10 14:09:30', '', 0, 'Pending', '2018-08-09 06:47:57'),
(4, '66814154', 20, 15, NULL, 5, 3, 4, 1, 4, 'Taifa', '2018-08-13', 'Delivered', 2, '2018-08-15 12:08:09', '', 0, 'Pending', '2018-08-10 03:36:40'),
(5, '76786381', 85, 16, NULL, 69, 3, 3, 1, 4, 'Taifa', '2018-08-13', 'Cancelled', 1, '2018-08-13 11:27:52', 'CANT PAY', 0, 'Pending', '2018-08-10 03:54:01'),
(6, '92114828', 45, 30, NULL, 15, 3, 5, 1, 6, 'Dome', '2018-08-12', 'Dispatch', 1, '2018-08-13 09:51:46', '', 0, 'Pending', '2018-08-10 10:08:07'),
(7, '38078637', 45, 44, NULL, 1, 3, 5, 1, 6, 'Taifa', '2018-08-14', 'Cancelled', 2, '2018-08-15 12:08:32', 'not available', 0, 'Pending', '2018-08-12 19:04:42'),
(8, '56771808', 230, 207, NULL, 23, 3, 7, 1, 4, 'Burkina', '2018-08-13', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-13 16:06:33'),
(9, '62684619', 15, 10, NULL, 5, 3, 7, 1, 6, 'Kumasi', '2018-08-14', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-14 01:59:40'),
(10, '46748868', 25, 50, NULL, -25, 3, 8, 1, 6, 'Osu', '2018-08-21', 'Delivered', 1, '2018-08-14 10:35:21', '', 0, 'Pending', '2018-08-14 06:27:40'),
(11, '32568699', 15, 20, 5, 0, 3, 1, 1, 6, 'Pickup', '2018-08-15', 'Dispatch', 2, '2018-08-15 12:09:20', '', 0, 'Pending', '2018-08-14 09:58:14'),
(12, '56705699', 60, 70, 10, 0, 3, 7, 1, 2, 'Taifa', '2018-08-16', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-15 07:49:29'),
(13, '97788347', 5, 10, 5, 0, 3, 7, 1, 6, 'Pickup', '2018-08-17', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-16 16:50:28'),
(14, '50557953', 105, 110, 5, 0, 3, 3, 1, 6, 'Pickup', '2018-08-20', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-17 08:22:38'),
(15, '96104292', 10, 10, 0, 0, 3, 3, 1, 6, 'pickup', '2018-08-18', 'Pending', 0, NULL, '', 0, 'Pending', '2018-08-17 15:03:59');

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
(1, 3, 49, 1, 'Paid', '2018-08-09 07:39:19'),
(2, 2, 10, 1, 'Paid', '2018-08-10 03:58:14'),
(3, 8, 23, 1, 'Paid', '2018-08-16 16:52:06');

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
  `status_change_dates` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laundry_order_details`
--

INSERT INTO `laundry_order_details` (`id`, `order_id`, `pricelist_ids`, `quantities`, `unit_prices`, `total_sums`, `description`, `service_status`, `status_change_userids`, `status_change_dates`) VALUES
(1, 1, '6', '7', '10', '10', 'T shirts', '', '', ''),
(2, 2, '7|3', '3|2', '15|5', '15|10', '2 blankets, 1 singlet|', '', '', ''),
(3, 3, '5|5', '1|1', '30|30', '30|30', '|', '', '', ''),
(4, 4, '7', '2', '15', '15', 'sweet', '', '', ''),
(5, 5, '8|8', '1|1', '45|35', '45|35', '|', '', '', ''),
(6, 6, '8', '1', '45', '45', '', '', '', ''),
(7, 7, '8', '1', '45', '45', '', '', '', ''),
(8, 8, '8', '5', '45', '225', '', '', '', ''),
(9, 9, '7', '1', '15', '15', 'Shirt', '', '', ''),
(10, 10, '3', '5', '5', '25', '', '', '', ''),
(11, 11, '3', '3', '5', '15', '', '', '', ''),
(12, 12, '8', '1', '45', '45', '', '', '', ''),
(13, 13, '3', '1', '5', '5', '', '', '', ''),
(14, 14, '6|3|3', '3|5|2', '10|5|35', '10|25|70', 'blankets||', '', '', ''),
(15, 15, '6', '1', '10', '10', 'test', '', '', '');

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
(1, 1, 3, 0, 25, 'deleted', '2017-12-28 04:55:04'),
(2, 1, 2, 0, 40, 'active', '2017-12-28 04:55:32'),
(3, 4, 0, 1, 5, 'active', '2017-12-28 04:56:21'),
(4, 2, 0, 5, 20, 'active', '2018-01-16 08:38:47'),
(5, 2, 2, 5, 30, 'deleted', '2018-01-16 08:39:17'),
(6, 1, 1, 0, 10, 'active', '2018-01-16 08:39:53'),
(7, 1, 2, 5, 15, 'active', '2018-01-16 08:40:15'),
(8, 2, 0, 3, 45, 'active', '2018-08-10 03:52:43'),
(9, 2, 0, 2, 35, 'active', '2018-08-10 03:52:55');

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
(2, 1, '15 - 30 KG', '', 'active', '2017-12-27 19:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings_dashboard_tabs`
--

CREATE TABLE `settings_dashboard_tabs` (
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
-- Dumping data for table `settings_dashboard_tabs`
--

INSERT INTO `settings_dashboard_tabs` (`id`, `name`, `comment`, `icon`, `link`, `bg`, `privileges`, `system_type`, `status`) VALUES
(1, 'customers', 'Register New Employee', 'fa fa-street-view', 'customers', 'text-teal-400', 'can delete|can add|can edit', 'Human-Resource', 'active'),
(2, 'company', 'Organizational Structure', 'fa fa-institution', 'settings/company', 'text-teal-400', 'Can Create Company Profile|Can Edit Company Profile|Can Delete Company Profile', 'Human-Resource', 'active'),
(3, 'users', 'Add New / Manage User(s)', 'fa fa-users', 'administration/users', 'text-teal-400', 'All Users|Add New User', 'Administration', 'active'),
(4, 'permissions', 'Set Roles & Priv. For Users / Groups', 'fa fa-lock', 'administration/permissions', 'text-teal-400', 'All Roles|All Privileges|Set Role', 'Administration', 'inactive'),
(6, 'Reports', 'Main Audit System', 'fa fa-database', 'reports', 'text-teal-400', 'Can Access Department Audit|Can Access All Audit', 'Administration', 'active'),
(7, 'Settings', 'New Product / Category / Description', 'fa fa-gears', 'settings/new_registration', 'text-teal-400', 'Can Add Prod / Cat / Desc|Can Edit Prod / Cat / Desc|Can Delete Prod / Cat / Desc', 'Stores', 'active'),
(8, 'settings', 'For Administrators Only', 'fa fa-gears', 'settings/', 'text-teal-400', 'Can Activate / Deactivate System', 'Administration', 'active'),
(9, 'system settings', 'For Developers Only', 'fa fa-lock', 'system/settings', 'text-teal-400', '', 'Reserved', 'inactive'),
(10, 'sms', 'Send messages', 'fa fa-envelope', 'sms', 'text-teal-400', 'can delete|can edit|can add', 'Reserved', 'inactive'),
(13, 'statistics', 'Informational Statistics', 'fa fa-bar-chart', 'statistics', 'text-teal-400', '', 'General', 'active'),
(14, 'overview', 'All Services Made', 'fa fa-tasks', 'overview', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active'),
(15, 'inhouse', 'All Services Made', 'fa fa-inbox', 'inhouse', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active'),
(16, 'dispatch', 'All Services Made', 'fa fa-truck', 'dispatch', 'text-teal-400', 'can delete|can add|can edit', 'oms', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tax_system`
--

CREATE TABLE `settings_tax_system` (
  `id` int(11) NOT NULL,
  `value` float NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings_tax_system`
--

INSERT INTO `settings_tax_system` (`id`, `value`, `user_id`, `date_created`) VALUES
(1, 2, 1, '2018-08-08 09:38:33'),
(2, 2.87, 1, '2018-08-08 09:42:18'),
(3, 0.25, 1, '2018-08-09 09:38:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_company_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_company_info` (
`id` bigint(20)
,`name` varchar(255)
,`telephone_1` varchar(20)
,`telephone_2` varchar(20)
,`fax` varchar(20)
,`email` varchar(255)
,`postal_address` varchar(255)
,`residence_address` varchar(255)
,`website` varchar(100)
,`mission` varchar(255)
,`vision` varchar(255)
,`gps_location` varchar(255)
,`tin_number` varchar(50)
,`logo_id` int(11)
,`date_of_commence` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_employee_details`
-- (See below for the actual view)
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
-- (See below for the actual view)
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
-- Stand-in structure for view `vw_hr_positions`
-- (See below for the actual view)
--
CREATE TABLE `vw_hr_positions` (
`id` tinyint(2)
,`name` varchar(50)
,`parent_position` int(11)
,`department_id` int(11)
,`description` text
,`salary` int(11)
,`status` enum('active','deleted')
,`created_date` datetime
,`department_name` varchar(255)
,`parent_position_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_clients`
-- (See below for the actual view)
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
,`total_balance` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_laundry_order_comments`
-- (See below for the actual view)
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
-- (See below for the actual view)
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
-- (See below for the actual view)
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
-- (See below for the actual view)
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
,`reason_for_cancel` varchar(255)
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
-- (See below for the actual view)
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
-- Structure for view `vw_company_info`
--
DROP TABLE IF EXISTS `vw_company_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_company_info`  AS  select `hr_company_info`.`id` AS `id`,`hr_company_info`.`name` AS `name`,`hr_company_info`.`telephone_1` AS `telephone_1`,`hr_company_info`.`telephone_2` AS `telephone_2`,`hr_company_info`.`fax` AS `fax`,`hr_company_info`.`email` AS `email`,`hr_company_info`.`postal_address` AS `postal_address`,`hr_company_info`.`residence_address` AS `residence_address`,`hr_company_info`.`website` AS `website`,`hr_company_info`.`mission` AS `mission`,`hr_company_info`.`vision` AS `vision`,`hr_company_info`.`gps_location` AS `gps_location`,`hr_company_info`.`tin_number` AS `tin_number`,`hr_company_info`.`logo_id` AS `logo_id`,`hr_company_info`.`date_of_commence` AS `date_of_commence` from `hr_company_info` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_employee_details`
--
DROP TABLE IF EXISTS `vw_employee_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_employee_details`  AS  select `a`.`id` AS `id`,`a`.`first_name` AS `first_name`,`a`.`middle_name` AS `middle_name`,`a`.`last_name` AS `last_name`,concat(`a`.`first_name`,' ',`a`.`middle_name`,' ',`a`.`last_name`) AS `fullname`,`a`.`gender` AS `gender`,`a`.`date_of_birth` AS `date_of_birth`,`g`.`residence` AS `residence_address`,`g`.`phone_number_1` AS `phone_number_1`,`g`.`phone_number_2` AS `phone_number_2`,`g`.`email` AS `email`,`g`.`emergency_fullname` AS `emergency_fullname`,`g`.`emergency_relationship` AS `emergency_relationship`,`g`.`emergency_occupation` AS `emergency_occupation`,`g`.`emergency_phone_1` AS `emergency_phone_1`,`g`.`emergency_phone_2` AS `emergency_phone_2`,`g`.`emergency_residence` AS `emergency_residence`,`a`.`id_number` AS `id_number`,`a`.`id_expiry_date` AS `id_expiry_date`,`a`.`id_issue_date` AS `id_issue_date`,`a`.`marital_status` AS `marital_status`,`a`.`nationality` AS `nationality`,`a`.`postal_address` AS `postal_address`,`a`.`social_security` AS `social_security`,`a`.`bank_name` AS `bank_name`,`a`.`bank_branch` AS `bank_branch`,`a`.`account_number` AS `account_number`,`a`.`user_id` AS `user_id`,`a`.`status` AS `status`,`a`.`created_date` AS `created_date`,`d`.`employment_type` AS `employment_type`,`d`.`employment_startdate` AS `employment_startdate`,`d`.`employee_id` AS `employee_id`,`d`.`work_email` AS `work_email`,`e`.`name` AS `department`,`f`.`id` AS `position_id`,`f`.`name` AS `current_position`,(select `blobs`.`file_path` from `blobs` where (`a`.`photo_id` = `blobs`.`id`)) AS `profile_photo`,(select `blobs`.`file_path` from `blobs` where (`d`.`resume_id` = `blobs`.`id`)) AS `resume_file_path`,(select `blobs`.`file_path` from `blobs` where (`d`.`application_id` = `blobs`.`id`)) AS `application_file_path` from (((((`hr_employee_biodata` `a` left join `hr_employee_other_info` `c` on((`a`.`id` = `c`.`biodata_id`))) left join `hr_employee_work_info` `d` on((`a`.`id` = `d`.`biodata_id`))) left join `hr_employee_contact_info` `g` on((`a`.`id` = `g`.`biodata_id`))) left join `hr_departments` `e` on((`d`.`department_id` = `e`.`id`))) left join `hr_position` `f` on((`d`.`position_id` = `f`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_hr_departments`
--
DROP TABLE IF EXISTS `vw_hr_departments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_hr_departments`  AS  select `a`.`id` AS `id`,`a`.`parent_department` AS `parent_department`,`a`.`name` AS `name`,`a`.`description` AS `description`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,coalesce(`b`.`name`,'None') AS `parent_department_name` from (`hr_departments` `a` left join `hr_departments` `b` on((`a`.`parent_department` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_hr_positions`
--
DROP TABLE IF EXISTS `vw_hr_positions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_hr_positions`  AS  select `a`.`id` AS `id`,`a`.`name` AS `name`,`a`.`parent_position` AS `parent_position`,`a`.`department_id` AS `department_id`,`a`.`description` AS `description`,`a`.`salary` AS `salary`,`a`.`status` AS `status`,`a`.`created_date` AS `created_date`,coalesce(`b`.`name`,'None') AS `department_name`,coalesce((select `hr_position`.`name` from `hr_position` where (`hr_position`.`id` = `a`.`parent_position`)),'None') AS `parent_position_name` from (`hr_position` `a` left join `hr_departments` `b` on((`a`.`department_id` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_clients`
--
DROP TABLE IF EXISTS `vw_laundry_clients`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_clients`  AS  select `a`.`id` AS `id`,`a`.`fullname` AS `fullname`,`a`.`gender` AS `gender`,`a`.`company` AS `company`,`a`.`residence_address` AS `residence_address`,`a`.`postal_address` AS `postal_address`,`a`.`phone_number_1` AS `phone_number_1`,`a`.`phone_number_2` AS `phone_number_2`,`a`.`email` AS `email`,`a`.`sms_alert` AS `sms_alert`,`a`.`online_access` AS `online_access`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,coalesce((select count(`laundry_orders`.`id`) from `laundry_orders` where ((`laundry_orders`.`client_id` = `a`.`id`) and (`laundry_orders`.`status` = 'pending'))),0) AS `pending_orders`,coalesce((select count(`laundry_orders`.`id`) from `laundry_orders` where ((`laundry_orders`.`client_id` = `a`.`id`) and (`laundry_orders`.`status` = 'delivered'))),0) AS `completed_orders`,coalesce((select sum(`vw_orderlist_summary`.`balance`) from `vw_orderlist_summary` where (`vw_orderlist_summary`.`client_id` = `a`.`id`)),0) AS `total_balance` from `laundry_clients` `a` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_order_comments`
--
DROP TABLE IF EXISTS `vw_laundry_order_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_order_comments`  AS  select `a`.`id` AS `id`,`a`.`order_id` AS `order_id`,`a`.`user_id` AS `user_id`,`a`.`comment` AS `comment`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`fullname` AS `commenter_fullname` from (`laundry_order_comments` `a` left join `vw_user_details` `b` on((`a`.`user_id` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_prices`
--
DROP TABLE IF EXISTS `vw_laundry_prices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_prices`  AS  select `a`.`id` AS `id`,`a`.`service_id` AS `service_id`,`b`.`code` AS `service_code`,`b`.`name` AS `service_name`,coalesce(`a`.`weight_id`,'') AS `weight_id`,coalesce(`c`.`weight`,'') AS `weight`,coalesce(`a`.`garment_id`,'') AS `garment_id`,coalesce(`d`.`name`,'') AS `garment_name`,`a`.`amount` AS `amount`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created` from (((`laundry_prices` `a` left join `laundry_services` `b` on((`a`.`service_id` = `b`.`id`))) left join `laundry_weights` `c` on((`a`.`weight_id` = `c`.`id`))) left join `laundry_garments` `d` on((`a`.`garment_id` = `d`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_laundry_weights`
--
DROP TABLE IF EXISTS `vw_laundry_weights`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_laundry_weights`  AS  select `a`.`id` AS `id`,`a`.`service_type` AS `service_type`,`a`.`weight` AS `weight`,`a`.`description` AS `description`,`a`.`status` AS `status`,`a`.`date_created` AS `date_created`,`b`.`name` AS `service` from (`laundry_weights` `a` left join `laundry_services` `b` on((`a`.`service_type` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_orderlist_summary`
--
DROP TABLE IF EXISTS `vw_orderlist_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlist_summary`  AS  select `a`.`id` AS `id`,`a`.`order_number` AS `order_number`,`a`.`total_cost` AS `total_cost`,`f`.`value` AS `tax`,`a`.`amount_paid` AS `amount_paid`,`a`.`balance` AS `previous_balance`,coalesce(`e`.`balance_paid`,0) AS `balance_paid`,(`a`.`amount_paid` + coalesce(`e`.`balance_paid`,0)) AS `total_amount_paid`,coalesce((`a`.`balance` - `e`.`balance_paid`),`a`.`balance`) AS `balance`,coalesce((select `vw_user_details`.`fullname` from `vw_user_details` where (`vw_user_details`.`id` = `e`.`user_id`)),'') AS `balance_received_by`,coalesce(`e`.`payment_date`,'') AS `balance_payment_date`,`a`.`client_id` AS `client_id`,`a`.`processor_user_id` AS `processor_user_id`,`a`.`delivery_method_id` AS `delivery_method_id`,`a`.`delivery_location` AS `delivery_location`,`a`.`due_date` AS `due_date`,`a`.`status` AS `status`,coalesce(`a`.`modified_by`,'') AS `modified_by`,coalesce(`a`.`modified_date`,'') AS `modified_date`,coalesce(`a`.`reason_for_cancel`,'') AS `reason_for_cancel`,coalesce((select count(`laundry_order_comments`.`comment`) from `laundry_order_comments` where (`laundry_order_comments`.`order_id` = `a`.`id`)),'') AS `total_comments`,`a`.`date_created` AS `date_created`,`b`.`fullname` AS `client_fullname`,coalesce(`b`.`company`,'') AS `client_company`,`b`.`phone_number_1` AS `client_phone_no_1`,`b`.`phone_number_2` AS `client_phone_no_2`,`c`.`fullname` AS `processor_name`,`d`.`location` AS `delivery_method`,`d`.`price` AS `delivery_cost` from (((((`laundry_orders` `a` left join `laundry_clients` `b` on((`a`.`client_id` = `b`.`id`))) left join `vw_user_details` `c` on((`a`.`processor_user_id` = `c`.`id`))) left join `laundry_delivery_method` `d` on((`a`.`delivery_method_id` = `d`.`id`))) left join `laundry_order_balances` `e` on((`a`.`id` = `e`.`order_id`))) left join `settings_tax_system` `f` on((`a`.`tax_id` = `f`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_user_details`
--
DROP TABLE IF EXISTS `vw_user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_details`  AS  select `a`.`id` AS `id`,`a`.`username` AS `username`,`a`.`passwd` AS `passwd`,`a`.`default_passwd` AS `default_passwd`,coalesce(convert((select concat(`hr_employee_biodata`.`first_name`,' ',`hr_employee_biodata`.`middle_name`,' ',`hr_employee_biodata`.`last_name`) from `hr_employee_biodata` where (`hr_employee_biodata`.`id` = `a`.`biodata_id`)) using utf8),`a`.`fullname`) AS `fullname`,coalesce((select `hr_employee_contact_info`.`phone_number_1` from `hr_employee_contact_info` where (`hr_employee_contact_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`phone_number`) AS `phone_number`,coalesce((select `hr_employee_work_info`.`employee_id` from `hr_employee_work_info` where (`hr_employee_work_info`.`biodata_id` = `a`.`biodata_id`)),`a`.`temp_employee_id`) AS `employee_id`,`a`.`biodata_id` AS `biodata_id`,`a`.`first_login` AS `first_login`,`a`.`login_attempt` AS `login_attempt`,`a`.`status` AS `status`,`a`.`created_by` AS `created_by`,`a`.`date_created` AS `date_created`,coalesce(`b`.`custom_roles`,'') AS `custom_roles`,coalesce(`b`.`custom_privileges`,'') AS `custom_privileges`,coalesce(`b`.`group_id`,'') AS `group_id`,coalesce(`b`.`status`,'') AS `user_roles_status`,coalesce(`c`.`name`,'') AS `group_name`,coalesce(`c`.`roles`,'') AS `group_roles`,coalesce(`c`.`privileges`,'') AS `group_privileges`,`c`.`login_url` AS `group_login_url` from (((`access_users` `a` left join `access_roles_privileges_user` `b` on((`a`.`id` = `b`.`user_id`))) left join `access_roles_privileges_group` `c` on((`b`.`group_id` = `c`.`id`))) left join `hr_employee_work_info` `d` on((`a`.`biodata_id` = `d`.`biodata_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_login_failed`
--
ALTER TABLE `access_login_failed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_login_successful`
--
ALTER TABLE `access_login_successful`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_password_reset_requests`
--
ALTER TABLE `access_password_reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_roles_privileges_group`
--
ALTER TABLE `access_roles_privileges_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `access_roles_privileges_user`
--
ALTER TABLE `access_roles_privileges_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_sysaudit`
--
ALTER TABLE `access_sysaudit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_users`
--
ALTER TABLE `access_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `blobs`
--
ALTER TABLE `blobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_requests`
--
ALTER TABLE `demo_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_request_userinfo`
--
ALTER TABLE `demo_request_userinfo`
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
-- Indexes for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
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
-- Indexes for table `settings_dashboard_tabs`
--
ALTER TABLE `settings_dashboard_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_tax_system`
--
ALTER TABLE `settings_tax_system`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_login_failed`
--
ALTER TABLE `access_login_failed`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto';

--
-- AUTO_INCREMENT for table `access_login_successful`
--
ALTER TABLE `access_login_successful`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id', AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `access_password_reset_requests`
--
ALTER TABLE `access_password_reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `access_roles_privileges_group`
--
ALTER TABLE `access_roles_privileges_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `access_roles_privileges_user`
--
ALTER TABLE `access_roles_privileges_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `access_sysaudit`
--
ALTER TABLE `access_sysaudit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `access_users`
--
ALTER TABLE `access_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blobs`
--
ALTER TABLE `blobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'auto generated id';

--
-- AUTO_INCREMENT for table `demo_requests`
--
ALTER TABLE `demo_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `demo_request_userinfo`
--
ALTER TABLE `demo_request_userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr_company_info`
--
ALTER TABLE `hr_company_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_departments`
--
ALTER TABLE `hr_departments`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hr_employee_biodata`
--
ALTER TABLE `hr_employee_biodata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr_employee_contact_info`
--
ALTER TABLE `hr_employee_contact_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr_employee_other_info`
--
ALTER TABLE `hr_employee_other_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr_employee_work_info`
--
ALTER TABLE `hr_employee_work_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hr_position`
--
ALTER TABLE `hr_position`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laundry_clients`
--
ALTER TABLE `laundry_clients`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laundry_delivery_method`
--
ALTER TABLE `laundry_delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `laundry_garments`
--
ALTER TABLE `laundry_garments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laundry_orders`
--
ALTER TABLE `laundry_orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `laundry_order_balances`
--
ALTER TABLE `laundry_order_balances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laundry_order_comments`
--
ALTER TABLE `laundry_order_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_order_details`
--
ALTER TABLE `laundry_order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `laundry_prices`
--
ALTER TABLE `laundry_prices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laundry_services`
--
ALTER TABLE `laundry_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laundry_weights`
--
ALTER TABLE `laundry_weights`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings_dashboard_tabs`
--
ALTER TABLE `settings_dashboard_tabs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings_tax_system`
--
ALTER TABLE `settings_tax_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
