-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 07:37 PM
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
(18, 'kiongpeng100', 'good', 100, 'apple', 1, 'product05.png', 8888);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(75) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `createdOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`, `dob`, `createdOn`) VALUES
(2, 'staff', 'staff@staff.com', '098f6bcd4621d373cade4e832627b4f6', '3/25/2024', '2024-03-25 07:49:41'),
(3, 'jun', 'jun@jun.com', '098f6bcd4621d373cade4e832627b4f6', '2018-07-20', '2024-03-25 16:31:14'),
(8, 'junsdf', 'junbo@efgmail.com', '098f6bcd4621d373cade4e832627b4f6', '1000-04-23', '2024-03-25 16:44:31'),
(10, 'dasf', 'junboyeqw@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '4422-03-21', '2024-03-25 10:55:11'),
(11, 'saf', 'jun4219676@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '0444-02-04', '2024-03-25 10:56:52'),
(12, 'saf', 'jun4219676@231com', '098f6bcd4621d373cade4e832627b4f6', '0444-02-04', '2024-03-25 10:57:21'),
(13, '312421', 'junb21@o5gmail.com', '098f6bcd4621d373cade4e832627b4f6', '0021-04-04', '2024-03-25 10:57:31'),
(14, 'test', 'ni@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2022-02-22', '2024-03-25 17:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(70) NOT NULL,
  `c_password` varchar(70) NOT NULL,
  `UserId` int(11) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `c_password`, `UserId`, `phone`, `address`, `city`, `zip`) VALUES
('test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '', 1, '0123456', 'kampar', '56', 41050),
('admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 2, '', '', '', NULL),
('123', '123@gmail.com', '202cb962ac59075b964b07152d234b70', '', 3, '15615616516', 'kampar jalan seksyen', 'Klang', 321421421),
('nono', 'utar@utar', '4b9362f1fc7ce97727ffbc183ffa27c2', '', 4, '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;