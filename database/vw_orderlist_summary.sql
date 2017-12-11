-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 07:51 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Structure for view `vw_orderlist_summary`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlist_summary`  AS  select `a`.`id` AS `id`,`a`.`order_number` AS `order_number`,`a`.`total_cost` AS `total_cost`,`a`.`amount_paid` AS `amount_paid`,`a`.`balance` AS `previous_balance`,coalesce(`e`.`balance_paid`,0) AS `balance_paid`,coalesce((`a`.`balance` - `e`.`balance_paid`),`a`.`balance`) AS `balance`,coalesce((select `vw_user_details`.`fullname` from `bgee_permissions`.`vw_user_details` where (`vw_user_details`.`id` = `e`.`user_id`)),'') AS `balance_received_by`,coalesce(`e`.`payment_date`,'') AS `balance_payment_date`,`a`.`client_id` AS `client_id`,`a`.`processor_user_id` AS `processor_user_id`,`a`.`delivery_method_id` AS `delivery_method_id`,`a`.`due_date` AS `due_date`,`a`.`status` AS `status`,`a`.`processing_stages` AS `processing_stage`,`a`.`comment` AS `comment`,`a`.`date_created` AS `date_created`,`b`.`fullname` AS `client_fullname`,coalesce(`b`.`company`,'') AS `client_company`,`b`.`phone_number_1` AS `client_phone_no_1`,`b`.`phone_number_2` AS `client_phone_no_2`,`c`.`fullname` AS `processor_name`,`d`.`location` AS `delivery_location` from ((((`laundry_orders` `a` left join `laundry_clients` `b` on((`a`.`client_id` = `b`.`id`))) left join `bgee_permissions`.`vw_user_details` `c` on((`a`.`processor_user_id` = `c`.`id`))) left join `laundry_delivery_method` `d` on((`a`.`delivery_method_id` = `d`.`id`))) left join `laundry_order_balances` `e` on((`a`.`id` = `e`.`order_id`))) ;

--
-- VIEW  `vw_orderlist_summary`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
