-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 03:55 AM
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
-- Database: `gadget_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(100) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `updated_at`) VALUES
(1, '2024-03-28 03:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `cart_id`, `product_id`, `quantity`) VALUES
(9, 1, 2, 1),
(12, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `payment_id` int(100) DEFAULT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `payment_id`, `amount`) VALUES
(1, 1, NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `quantity_available` int(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `quantity_available`, `brand`, `category_id`, `image_url`, `price`) VALUES
(1, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(2, 'handphone', 'I love you', 500, 'pineapple', 2, 'b.png', 7899),
(3, 'likuan', 'nn', 100, 'dddcdsvs', 2, 'product06.png', 100000),
(4, 'likuan', 'nn', 100, 'dddcdsvs', 2, 'product06.png', 100000),
(5, 'handphone', 'I love you', 500, 'pineapple', 2, 'b.png', 7899),
(6, 'handphone', 'I love you', 500, 'pineapple', 2, 'b.png', 7899),
(7, 'handphone', 'I love you', 500, 'pineapple', 2, 'b.png', 7899),
(8, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(9, 'handphone', 'I love you', 500, 'pineapple', 2, 'b.png', 7899),
(10, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(11, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(12, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(13, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(14, 'Computer', 'good', 100, 'apple', 1, 'product01.png', 100),
(15, 'tiang', 'good', 100, 'apple', 1, 'product09.png', 9999),
(16, 'kiongpeng', 'good', 100, 'apple', 1, 'product08.png', 8888),
(17, 'kiongpeng2', 'good', 100, 'apple', 1, 'product07.png', 888899),
(18, 'kiongpeng100', 'good', 100, 'apple', 1, 'product05.png', 8888),
(19, '1', '1', 1, '1', 1, 'IC_back.jpg', 1),
(20, '1', '1', 1, '1', 1, 'CamScanner 07-25-2023 21.32_4.jpg', 1),
(21, '2', '2', 2, '2', 3, 'test.png', 2),
(22, '2', '2', 2, '2', 3, 'test.png', 2),
(23, '1', '1', 1, '1', 1, 'test.png', 1),
(24, '1', '1', 1, '1', 1, 'test.png', 1),
(25, '1', '1', 1, '1', 1, 'test.png', 1),
(26, '1', '1', 1, '1', 1, 'test.png', 1),
(27, '1', '1', 1, '1', 1, 'test.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
