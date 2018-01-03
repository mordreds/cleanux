-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 07:14 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgee_permissions`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_tabs`
--
ALTER TABLE `dashboard_tabs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
