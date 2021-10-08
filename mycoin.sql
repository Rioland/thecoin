-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2021 at 03:46 PM
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

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`sn`, `id`, `balance`, `investment`, `earns`, `withdraw`, `referer`) VALUES
(1, '3461693015', '0.00067897', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `sn` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `method` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`sn`, `id`, `address`, `method`) VALUES
(1, '3461693015', '1qnnnsjjj356353652356237725353', 'BCH');

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

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`sn`, `name`, `public`, `private`, `redirect`) VALUES
(1, 'google', '818881695167-96f0chbv1pctnltdcf2n8kunrkctqei3.apps.googleusercontent.com', 'rdquOpaJHjbW3Qkbs-6tM97G', 'https://erect1.org/app/googleapi.php'),
(2, 'facebook', '2d86a2195bf92a7515065c69d1041221', '174465544659598', 'http://localhost/erect1/app/facebook.php'),
(3, 'stripe', NULL, 'sk_test_51JB7jpG61ITNwdfRCiJ1FMnTBU0wxdddK5tmKoE9oWuMI8AqjdFw0RY15h8Grag5sdNVwGHptd9iQM7dtjzfv0LL00TrMyEhXs', NULL),
(4, 'paystack', 'pk_test_99d69caec3f4f9bcf55f1f96a7c89a5653e2d80c', 'sk_test_98da44136d9c75dc67f3124016fdec282daf82bb', NULL),
(5, 'block', NULL, '6NRYdE4XdqnERd0heOsHl3Yda4gdUKQ8fL2jAJOuSx8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `btc_transaction`
--

CREATE TABLE `btc_transaction` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `satoshi` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `xpub` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `paid_satoshi` varchar(255) DEFAULT NULL,
  `date time` timestamp NOT NULL DEFAULT current_timestamp(),
  `myid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `btc_transaction`
--

INSERT INTO `btc_transaction` (`id`, `status`, `emailid`, `satoshi`, `description`, `xpub`, `timestamp`, `uuid`, `value`, `txid`, `currency`, `code`, `address`, `paid_satoshi`, `date time`, `myid`) VALUES
(1, '0', 'riolandadedamola@gmail.com', '3367354', NULL, 'xpub6DKXyh1nJgzt57LSv8239YUViJY6eMY6p7Z8jkaYr9z8qiccZaXo39BLdVim6zpRrjSMyLfCrqoxp9BXG39K7xdVhuvXcNjxNkE7NB1WJrQ', '1626823588', '8faa0efd25db45b88338', '1000', NULL, 'USD', 'Deposit', '19ChBRQQCvojfxomwG3f7HajqTzdHm2MZu', '0', '2021-07-28 13:36:44', '1'),
(2, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 19:03:58', '104752876112185585152'),
(3, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 19:07:46', '104752876112185585152'),
(4, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 19:08:14', '104752876112185585152'),
(5, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 19:09:18', '104752876112185585152'),
(6, '2', 'riolandadedamola@gmail.com', '24764', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627502275', 'c092e38675da42748808', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '16XJV8nQ24niec8eXQmCXjsm4RWk2XEJAa', '9876000', '2021-07-28 19:09:46', '104752876112185585152'),
(8, '1', 'riolandadedamola@gmail.com', '25238', '', 'xpub6Caq7RLvv1f4Gh9REASyrm7a1CMfBiZfkuPGtv5TL8n6mpURPu89K1E5t5dwzXuRfuJRZujZt9c2Kc7UZSfceHcay54sf4JrpnXwrC2dBBf', '1627520497', '005dabc2118b48c583c7', '10', 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'USD', 'Deposit', '184ejk3FRE193PWcvBb5EskDTfopwcQeen', '8000000000', '2021-07-29 00:02:30', '1');

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

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `address`, `price`, `status`, `uid`, `ip`) VALUES
(1, 'g7daugeH3NxcRZHNRrhjolSOI', '1NbodSdJCNp5FApUcnDaTDckfXTTkNkYr1', 100, -1, '3461693015', '::1'),
(2, 'IY9TcHpmIERDfrq7voCfcohx1', '1NbodSdJCNp5FApUcnDaTDckfXTTkNkYr1', 100, 2, '3461693015', '::1'),
(3, 'XDjQUBRIpa7N1K06xPQ11qLuo', '1NbodSdJCNp5FApUcnDaTDckfXTTkNkYr1', 100, 0, '3461693015', '::1'),
(4, 'ihVyGrLddDw1AlUIXyu1noRz1', '1NbodSdJCNp5FApUcnDaTDckfXTTkNkYr1', 100, -1, '3461693015', '::1'),
(5, '9wuDT9nAMcBeNQPyDmIJ6cdAr', '1NbodSdJCNp5FApUcnDaTDckfXTTkNkYr1', 100, -1, '3461693015', '::1');

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
  `country` varchar(1000) DEFAULT NULL,
  `auth_token` varchar(1000) DEFAULT NULL,
  `reset_pass_token` varchar(500) DEFAULT NULL,
  `token_date` varchar(1000) DEFAULT NULL,
  `is_verify` tinyint(1) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `gender` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_name` varchar(500) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `poster_code` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `id`, `email`, `password`, `country`, `auth_token`, `reset_pass_token`, `token_date`, `is_verify`, `name`, `picture`, `phone`, `gender`, `created_at`, `last_name`, `address1`, `address2`, `poster_code`, `state`, `city`) VALUES
(3, '3461693015', 'riolandadedamola@gmail.com', '1111111', 'Nigeria', '#4bkxi86up3@m1ysag7qedvf0925cjlrtownhz', NULL, NULL, NULL, 'Rioland', 'iMarket.png', '08149916721', 'male', '2021-10-01 13:21:56', 'Adedamola', 'no7 okeyimi street Ado Ekiti', 'Okeyinmi', '360211', 'Ekiti', 'Ado');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `sn` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amt` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
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
-- Indexes for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
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
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
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
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
