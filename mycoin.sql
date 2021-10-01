-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 01, 2021 at 07:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `sn` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `investment` varchar(50) NOT NULL,
  `earns` varchar(50) NOT NULL,
  `withdraw` varchar(50) NOT NULL,
  `referer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `sn` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `public` varchar(1000) DEFAULT NULL,
  `private` varchar(1000) DEFAULT NULL,
  `redirect` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL,
  `ip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `reciverid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `broadcast` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isPub` tinyint(1) NOT NULL,
  `broadcastdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments_trasact`
--

CREATE TABLE `payments_trasact` (
  `id` int(11) NOT NULL,
  `txid` varchar(256) DEFAULT NULL,
  `addr` varchar(256) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL,
  `uid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `sn` int(11) NOT NULL,
  `mode` varchar(500) DEFAULT NULL,
  `Minimum` varchar(500) DEFAULT NULL,
  `Maximum` varchar(500) DEFAULT NULL,
  `Referral` varchar(500) DEFAULT NULL,
  `Duration` varchar(500) DEFAULT NULL,
  `Profit` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`sn`, `mode`, `Minimum`, `Maximum`, `Referral`, `Duration`, `Profit`) VALUES
(1, 'BEGINNER PLAN', '50', '500', '20', '4hrs', '30% + Investment'),
(2, 'PREMIUM PLAN', '50', '500', '10', '8hrs', '35% + Investment\r\n\r\n'),
(3, 'SILVER PLAN', '100', '1000', '15', '6hrs', '20% + Investment'),
(4, 'GOLD PLAN', '500', '500', '20', '4hrs', '30% + Investmen');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `uid` varchar(500) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `reference` varchar(400) DEFAULT NULL,
  `status` varchar(300) DEFAULT NULL,
  `trans` varchar(500) DEFAULT NULL,
  `transaction` varchar(255) DEFAULT NULL,
  `trxref` varchar(255) DEFAULT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `id` varchar(40) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `auth_token` varchar(1000) DEFAULT NULL,
  `reset_pass_token` varchar(500) DEFAULT NULL,
  `token_date` varchar(1000) DEFAULT NULL,
  `is_verify` tinyint(1) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `gender` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `id`, `email`, `password`, `country`, `auth_token`, `reset_pass_token`, `token_date`, `is_verify`, `name`, `picture`, `phone`, `gender`, `created_at`) VALUES
(1, '0649931636', 'riolandadedamola@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Unknown', '6mgyndle74pkqjzfc9s52wab81xuo@h3#ritv0', NULL, NULL, NULL, NULL, 'iMarket.png', '08149916721', NULL, '2021-10-01 00:04:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
