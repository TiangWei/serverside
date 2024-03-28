-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 11:59 AM
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
(1, '2024-03-28 08:35:58');

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
(12, 1, 4, 1),
(0, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'laptop'),
(2, 'smartphone'),
(3, 'camera'),
(4, 'accessories');

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
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `PaymentMID` int(40) NOT NULL,
  `AccountNum` int(11) NOT NULL,
  `ExpirationDate` date NOT NULL,
  `SecurityCode` int(11) NOT NULL,
  `BankName` varchar(255) NOT NULL,
  `Pstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`PaymentMID`, `AccountNum`, `ExpirationDate`, `SecurityCode`, `BankName`, `Pstatus`) VALUES
(7, 1477, '2024-03-11', 12, '12', 'success'),
(8, 12, '2024-03-11', 12, '12', 'fail'),
(9, 12, '2024-03-11', 12, '12', 'success'),
(10, 12, '2024-03-11', 12, '12', 'success'),
(11, 13, '2024-03-11', 12, '12', 'pending'),
(12, 12, '2024-03-11', 12, '12', 'success'),
(13, 9999, '2024-03-11', 12, '12', 'pending'),
(14, 12, '2024-03-11', 12, '12', 'success'),
(15, 12, '2024-03-11', 12, '12', 'success'),
(16, 12, '2024-03-11', 12, '12', 'success'),
(17, 12, '2024-03-11', 12, '12', 'success'),
(18, 12, '2024-03-11', 12, '12', 'success'),
(19, 12, '2024-03-11', 12, '12', 'success'),
(21, 12, '2024-03-11', 12, '12', 'success'),
(22, 12, '2024-03-11', 12, '12', 'success'),
(23, 12, '2024-03-11', 12, '12', 'success'),
(24, 12, '2024-03-11', 12, '12', 'success'),
(25, 12, '2024-03-11', 12, '12', 'success'),
(27, 23, '2024-03-05', 23, '23', 'success');

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
(13, 'Asus Laptop', 'i7', 1000, 'Asus', 1, 'product01.png', 1999),
(14, 'Hp laptop ', 'i7', 100, 'HP', 1, 'product01.png', 1999),
(16, 'Acer laptop', 'i3', 100, 'Acer', 1, 'product08.png', 3999),
(17, 'samsung galaxy s3', '256gb', 100, 'samsung', 2, 'product07.png', 2999),
(18, 'basues earphone', 'clear/ loud', 100, 'basues', 4, 'product05.png', 1999),
(0, 'Samsung galaxy s4', '256gb', 1000, 'samsung', 2, 'product07.png', 3999),
(0, 'earphone', 'good sound', 100, 'basues', 4, 'earphone.jpg', 1000),
(0, 'Canon Camera s1', '1080px', 200, 'canon', 3, 'shop02.png', 2000),
(0, 'Asus Rog', 'I9 512ssd', 100, 'Asus', 1, 'product06.png', 3999),
(0, 'Samsung earphone K9', '100hz', 3000, 'samsung', 4, 'shop03.png', 599),
(0, 'Samsung Tablet s9', '1080 144hz', 1000, 'samsung', 2, 'product04.png', 1999),
(0, 'iphone 15', '3000 aamh', 1000, 'Apple', 2, 'iphone.jpg', 4999),
(0, 'Canon camera s9', '300hz', 500, 'Canon', 3, 'camera1.jpg', 8999),
(0, 'Insta X', 'Can shot high pixel photo', 5000, 'Insta', 3, 'camera2.jpg', 3499);

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
('nono', 'utar@utar', '4b9362f1fc7ce97727ffbc183ffa27c2', '', 4, '', '', '', NULL),
('user', 'user@user', 'ee11cbb19052e40b07aac0ca060c23ee', '', 5, '01156', 'ffdsaffdasf', 'fdsa', 566456),
('tt', 'tt@tt', 'accc9105df5383111407fd5b41255e23', '', 6, '012-0000000', 'tt', 'miri', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PaymentMID`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PaymentMID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
