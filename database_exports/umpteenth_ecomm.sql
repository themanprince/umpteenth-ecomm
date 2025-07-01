-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2025 at 04:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umpteenth_ecomm`
--
CREATE DATABASE IF NOT EXISTS `umpteenth_ecomm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `umpteenth_ecomm`;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

DROP TABLE IF EXISTS `ordered_items`;
CREATE TABLE `ordered_items` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` float NOT NULL COMMENT 'what was the price of the product at the time of purchase',
  `quantity_purchased` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='this is a list of products ordered per each order';

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`order_id`, `product_id`, `price`, `quantity_purchased`) VALUES
(3, 10, 40000, 1),
(3, 11, 120000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone_number` text NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='for storing orders';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_name`, `customer_email`, `customer_address`, `customer_phone_number`, `is_completed`) VALUES
(1, 'prince', 'princeadigwe29@gmail.com', '190A Hospital Road', '', 0),
(2, '', '', '', '', 0),
(3, 'prince', 'princeadigwe29@gmail.com', '190A Hospital Road Ozoro, Delta State', '08037680836', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` text NOT NULL,
  `product_price` float NOT NULL,
  `product_description` text NOT NULL,
  `product_image_url` text NOT NULL,
  `product_quantity_avail` float NOT NULL,
  `is_hidden` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'From feature spec I got, Admin can choose to hide a product from appearing on Customers'' end'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image_url`, `product_quantity_avail`, `is_hidden`) VALUES
(2, 'democracy', 23, 'cost? lol', '../upload_dir/Web capture_16-6-2025_14338_prechitocollections.bumpa.shop.jpeg', 0, 1),
(4, 'Nigeria', 50, 'Sold', '../upload_dir/Dumebi_Deborah_Nwabueze_LGA_of_Identification_optimized_100.jpg', 1, 1),
(6, 'Random Product', 345, 'The Randomest of Products', '../upload_dir/Web capture_16-6-2025_2235_prechitocollections.bumpa.shop.jpeg', 23, 1),
(9, 'test', 231, 'a random product I created to test something', '../upload_dir/Web capture_16-6-2025_15333_prechitocollections.bumpa.shop.jpeg', 2, 0),
(10, 'semolina', 40000, 'not your regular swallow. contains proteins and is very rich in iron', '../upload_dir/Dumebi_Deborah_Nwabueze_LGA_of_Identification_optimized_100.jpg', 1, 0),
(11, 'Rice', 120000, 'Brand: mango, mass: 50kg, authentic rice', '../upload_dir/Screenshot_20241128-183350.jpg', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `ordered_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `ordered_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
