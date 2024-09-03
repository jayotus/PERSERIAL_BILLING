-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 10:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `si_num` int(11) NOT NULL,
  `si_date` date DEFAULT NULL,
  `term` varchar(255) DEFAULT NULL,
  `sold_to` varchar(200) DEFAULT NULL,
  `tin` varchar(255) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `buss_style` varchar(250) NOT NULL,
  `particulars` varchar(250) NOT NULL,
  `vatable_sale` int(11) NOT NULL,
  `vat_exempt_sale` int(11) NOT NULL,
  `zero_rated_sale` int(11) NOT NULL,
  `total_sale` varchar(255) DEFAULT NULL,
  `vat` varchar(2555) DEFAULT NULL,
  `total_amount_payable` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perserial`
--

CREATE TABLE `perserial` (
  `id` int(11) NOT NULL,
  `copies` varchar(255) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `item_description` int(250) DEFAULT NULL,
  `unitprice` int(255) DEFAULT NULL,
  `total_price` int(255) DEFAULT NULL,
  `info_key` int(11) NOT NULL,
  `serial` int(100) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_2`
--

CREATE TABLE `sales_2` (
  `id` int(11) NOT NULL,
  `quantity` varchar(250) DEFAULT NULL,
  `units` varchar(255) DEFAULT NULL,
  `item_description` varchar(250) DEFAULT NULL,
  `unit_price` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `info_key` int(11) NOT NULL,
  `serial` int(100) DEFAULT NULL,
  `model` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perserial`
--
ALTER TABLE `perserial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_2`
--
ALTER TABLE `sales_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `perserial`
--
ALTER TABLE `perserial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_2`
--
ALTER TABLE `sales_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
