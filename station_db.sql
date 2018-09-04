-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 11:25 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `station_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_mob` varchar(20) NOT NULL,
  `customer_emal` varchar(30) NOT NULL,
  `customer_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `customer_name`, `customer_mob`, `customer_emal`, `customer_type`) VALUES
(2, 'Asas Diaries Farm', '0718260898', 'info@asasgrp.co.tz', 'Creditor'),
(7, 'Bateluer Safaris Tours', '0764672261', 'info@bateluer.co.tz', 'Debtor');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_cost` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_name`, `product_cost`, `product_price`) VALUES
(3, 'Petrol', 2311, 2143),
(4, 'Diesel', 1945, 2045);

-- --------------------------------------------------------

--
-- Table structure for table `pump_tbl`
--

CREATE TABLE `pump_tbl` (
  `pump_id` int(11) NOT NULL,
  `pump_name` varchar(30) NOT NULL,
  `tank_name` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pump_tbl`
--

INSERT INTO `pump_tbl` (`pump_id`, `pump_name`, `tank_name`, `product_name`) VALUES
(3, 'DP-1', 'Tank-3', 'Diesel'),
(4, 'PP-1', 'Tank-1', 'Petrol'),
(7, 'PP-2', 'Tank-1', 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `readings_tbl`
--

CREATE TABLE `readings_tbl` (
  `SN` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Pump` varchar(10) NOT NULL,
  `Product` varchar(30) NOT NULL,
  `Tank` varchar(30) NOT NULL,
  `Read_O` int(11) NOT NULL,
  `Read_C` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Attendant` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `readings_tbl`
--

INSERT INTO `readings_tbl` (`SN`, `Date`, `Pump`, `Product`, `Tank`, `Read_O`, `Read_C`, `Quantity`, `Amount`, `Attendant`) VALUES
(13, '2018-08-15 05:21:17', 'PP-1', 'Petrol', 'Tank-1', 120, 195, 75, 160725, 'Admin'),
(24, '2018-08-15 09:50:58', 'DP-1', 'Diesel', 'Tank-3', 0, 709, 709, 1449905, 'Admin'),
(25, '2018-08-15 09:53:10', 'DP-1', 'Diesel', 'Tank-3', 709, 1200, 491, 1004095, 'Admin'),
(26, '2018-08-15 09:55:16', 'DP-1', 'Diesel', 'Tank-3', 1200, 1250, 50, 102250, 'Admin'),
(27, '2018-08-15 12:00:21', 'PP-1', 'Petrol', 'Tank-1', 195, 780, 585, 1253655, 'Admin'),
(28, '2018-08-15 17:05:51', 'PP-2', 'Diesel', 'Tank-1', 0, 349, 349, 713705, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tank_tbl`
--

CREATE TABLE `tank_tbl` (
  `tank_id` int(11) NOT NULL,
  `tank_name` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `capacity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tank_tbl`
--

INSERT INTO `tank_tbl` (`tank_id`, `tank_name`, `product_name`, `capacity`) VALUES
(1, 'Tank-1', 'Petrol', '2000 litres'),
(3, 'Tank-3', 'Diesel', '2500 litres');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(100) NOT NULL,
  `recovery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `user_name`, `pass_word`, `recovery`) VALUES
(1, 'Admin', 'test', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pump_tbl`
--
ALTER TABLE `pump_tbl`
  ADD PRIMARY KEY (`pump_id`);

--
-- Indexes for table `readings_tbl`
--
ALTER TABLE `readings_tbl`
  ADD PRIMARY KEY (`SN`);

--
-- Indexes for table `tank_tbl`
--
ALTER TABLE `tank_tbl`
  ADD PRIMARY KEY (`tank_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pump_tbl`
--
ALTER TABLE `pump_tbl`
  MODIFY `pump_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `readings_tbl`
--
ALTER TABLE `readings_tbl`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tank_tbl`
--
ALTER TABLE `tank_tbl`
  MODIFY `tank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
