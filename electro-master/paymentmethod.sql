-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 04:01 AM
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
-- Database: `checkout`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`PaymentMID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `PaymentMID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
