-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 03:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderform_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `email_address` varchar(45) NOT NULL,
  `mobile_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_number`, `name`, `home_address`, `email_address`, `mobile_number`) VALUES
(5, 'MRKN-02-0002', 'Ryan', 'bulacan', 'ryan@gmail.com', '0999999998'),
(6, 'MRKN-02-0003', 'Aimer', 'laguna', 'aimer@gmail.com', '0999999997'),
(7, 'MRKN-2-1', 'Garcia', 'Marikina', 'marie1@gmail.com', '09999'),
(8, 'MRKN-2-5', 'Garcia', 'Marikina', 'marie1@gmail.com', '0999'),
(9, 'MRKN-2-5', 'Garcia', 'Marikina', 'marie1@gmail.com', '0999999'),
(10, 'MRKN-2-5', 'Garcia', 'Marikina', 'marie1@gmail.com', '099999'),
(11, 'MRKN-2-2', 'Garcia', 'Marikina', 'marie1@gmail.com', '09999');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_code` varchar(5) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `inventory_qty` varchar(11) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_code`, `item_name`, `unit`, `inventory_qty`, `item_description`, `price`) VALUES
(2, '0002', 'hammer', '', '100', 'for hammering', '100.00'),
(3, '0003', 'super glue', 'bottle', '200', 'sticks to whatever surface', '50.00'),
(4, '0005', 'Drill', 'piece', '50', 'can make holes', '250.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_amount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_number`, `order_number`, `order_date`, `order_amount`) VALUES
(3, 'MRKN-02-0001', 'MRKN-02-170121-0002', '2021-01-17 20:44:12', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `item_code` varchar(5) NOT NULL,
  `quantity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_number`, `item_code`, `quantity`) VALUES
(1, 'MRKN-02-170121-0001', '0001', '120.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
