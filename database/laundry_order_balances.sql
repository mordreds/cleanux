-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2017 at 07:52 PM
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
(1, 20, 75, 1, 'Paid', '0000-00-00 00:00:00'),
(2, 11, 5, 1, 'Paid', '2017-12-11 19:50:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundry_order_balances`
--
ALTER TABLE `laundry_order_balances`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundry_order_balances`
--
ALTER TABLE `laundry_order_balances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
