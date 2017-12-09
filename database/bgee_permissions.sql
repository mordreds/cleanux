-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 08:35 AM
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
(5, 'Buck up', 'Backup All Data ', 'fa fa-database', '/back up', 'text-teal-400', 'Can Backup Data', 'Administration', 'active'),
(6, 'Reports', 'Main Audit System', 'fa fa-database', 'reports', 'text-teal-400', 'Can Access Department Audit|Can Access All Audit', 'Administration', 'active'),
(7, 'new registration', 'New Product / Category / Description', 'fa fa-plus', 'settings/new_registration', 'text-teal-400', 'Can Add Prod / Cat / Desc|Can Edit Prod / Cat / Desc|Can Delete Prod / Cat / Desc', 'Stores', 'active'),
(8, 'settings', 'For Administrators Only', 'fa fa-gears', 'settings/', 'text-teal-400', 'Can Activate / Deactivate System', 'Administration', 'active'),
(9, 'system settings', 'For Developers Only', 'fa fa-lock', 'system/settings', 'text-teal-400', '', 'Reserved', 'inactive'),
(10, 'install models', 'For Developers Only', 'fa fa-lock', 'system/settings', 'text-teal-400', '', 'Reserved', 'inactive'),
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

--
-- Dumping data for table `password_reset_requests`
--

INSERT INTO `password_reset_requests` (`id`, `requestor_user_id`, `password_token`, `local_password_token`, `acceptor_user_id`, `status`, `date_requested`) VALUES
(1, 1, NULL, NULL, NULL, 'Pending', '2017-09-12 08:10:00'),
(2, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 19:16:20'),
(3, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 19:52:49'),
(4, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:00:58'),
(5, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:01:45'),
(6, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:17:27'),
(7, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:33:39'),
(8, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:36:50'),
(9, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:37:50'),
(10, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:39:33'),
(11, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:40:41'),
(12, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 20:45:34'),
(13, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:12:05'),
(14, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:16:26'),
(15, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:17:56'),
(16, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:26:29'),
(17, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:32:03'),
(18, 1, NULL, NULL, NULL, 'Pending', '2017-09-11 22:34:04');

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
(1, 'System Developer', 'statistics|overview|inhouse|dispatch|new registration|company|users|permissions|customers|reports', '', 'Designers of this software', '', 'active', '2017-10-16 17:42:32'),
(2, 'Administrator', '', '', NULL, '', 'active', '2017-10-16 17:42:32'),
(3, 'Senior Staff', '', '', NULL, '', 'active', '2017-10-16 17:42:32'),
(4, 'Junior Staff', '', '', NULL, '', 'active', '2017-10-16 17:42:32'),
(5, 'Client', '', '', NULL, '', 'active', '2017-10-16 17:42:32');

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
(3, 3, '', '', 5, 'active'),
(4, 4, '', '', 5, 'active');

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
  `status` enum('active','inactive','deleted','') CHARACTER SET utf8 NOT NULL DEFAULT 'inactive',
  `created_by` bigint(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `default_passwd`, `fullname`, `phone_number`, `temp_employee_id`, `biodata_id`, `first_login`, `login_attempt`, `status`, `created_by`, `date_created`) VALUES
(1, 'osborne.mordred@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Osborne Mordreds', '0541786220', 'KAD/SYS/1', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(2, 'wikills2k@gmail.com', '$2y$10$GuOFXrr8Xdd5JFHD9vzm8.tUeafbhkUfvImwdDkswS8NJJOqzV3BC', '', 'Bismark Offei ', '0245626487', 'KAD/SYS/2', 0, 0, 5, 'active', 1, '2017-05-25 06:05:10'),
(3, 'evans@marksbon.com', '', '$2y$10$WxR9pcai8uwiHmsOPT.4NuN5HhCWV9aeRIkUo7oOJgyWw.O.FLkHy', 'Evans  Kwame Offori', '', '', 1, 0, 5, 'active', 0, '2017-10-20 09:49:42'),
(4, 'ike@marksbon.com', '', '$2y$10$9fYLtPVJu4AbtIUVh2JO7.iCBEJCY5SfG9DyU/0XhZKbx/W1pFTNC', 'Gyasi jon Nimako', '', '', 2, 0, 5, 'inactive', 0, '2017-10-27 09:59:17');

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
,`custom_roles` text
,`custom_privileges` text
,`group_id` varchar(11)
,`user_roles_status` varchar(8)
,`group_name` varchar(255)
,`group_roles` text
,`group_privileges` text
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `roles_privileges_group`
--
ALTER TABLE `roles_privileges_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles_privileges_user`
--
ALTER TABLE `roles_privileges_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
