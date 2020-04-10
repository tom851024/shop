-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2020 at 05:05 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopData`
--

-- --------------------------------------------------------

--
-- Table structure for table `BackItem`
--

CREATE TABLE `BackItem` (
  `id` int(11) NOT NULL,
  `OrderId` varchar(40) NOT NULL,
  `CartId` int(20) NOT NULL,
  `MerId` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `Qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CartBuy`
--

CREATE TABLE `CartBuy` (
  `id` int(11) NOT NULL,
  `OrderId` varchar(40) NOT NULL,
  `UserId` int(10) NOT NULL,
  `MerId` int(10) NOT NULL,
  `MerName` text NOT NULL,
  `Price` int(30) NOT NULL,
  `Qty` int(5) NOT NULL,
  `Progress` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CartBuy`
--

INSERT INTO `CartBuy` (`id`, `OrderId`, `UserId`, `MerId`, `MerName`, `Price`, `Qty`, `Progress`) VALUES
(93, '1120200410011154', 11, 4, '電腦螢幕', 5000, 2, 0),
(94, '1120200410011154', 11, 1, 'computer 1', 30000, 5, 0),
(95, '1120200410011650', 11, 1, 'computer 1', 30000, 1, 5),
(96, '1120200410011650', 11, 4, '電腦螢幕', 5000, 2, 5),
(97, '1120200410011837', 11, 2, 'Laptop', 40000, 2, 4),
(98, '1120200410011837', 11, 4, '電腦螢幕', 5000, 6, 4),
(99, '1020200410021951', 10, 1, 'computer 1', 30000, 6, 6),
(100, '1020200410021951', 10, 4, '電腦螢幕', 5000, 5, 4),
(103, '1120200410011650', 11, 4, '電腦螢幕', 5000, 3, 2),
(104, '1120200410011650', 11, 1, 'computer 1', 30000, 1, 2),
(105, '1020200410021951', 10, 2, 'Laptop', 40000, 1, 2),
(106, '1020200410090408', 10, 1, 'computer 1', 30000, 3, 4),
(107, '1020200410090408', 10, 4, '電腦螢幕', 5000, 1, 4),
(108, '1020200410090408', 10, 4, '電腦螢幕', 5000, 1, 2),
(109, '1020200410090408', 10, 1, 'computer 1', 30000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Discount`
--

CREATE TABLE `Discount` (
  `id` int(11) NOT NULL,
  `Level` int(3) NOT NULL,
  `ReachGold` int(20) NOT NULL,
  `Discount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Discount`
--

INSERT INTO `Discount` (`id`, `Level`, `ReachGold`, `Discount`) VALUES
(4, 2, 5000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `Merchandise`
--

CREATE TABLE `Merchandise` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `ShortDes` text NOT NULL,
  `Description` text NOT NULL,
  `Price` int(30) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Merchandise`
--

INSERT INTO `Merchandise` (`id`, `Name`, `ShortDes`, `Description`, `Price`, `Qty`, `Status`) VALUES
(1, 'computer 1', 'this is first one', 'First computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer ', 30000, 100, 0),
(2, 'Laptop', 'this is a laptop', 'Second laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop ', 40000, 150, 0),
(3, 'XBOX1080', 'A video player', '1080 1080  1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 XXXXXX BBBBBBB', 9000, 300, 1),
(4, '電腦螢幕', '這是一個電腦螢幕', '這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕', 5000, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `OrderTable`
--

CREATE TABLE `OrderTable` (
  `id` int(11) NOT NULL,
  `OrderId` varchar(40) NOT NULL,
  `Total` int(30) NOT NULL,
  `RealPay` int(30) NOT NULL,
  `UserId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OrderTable`
--

INSERT INTO `OrderTable` (`id`, `OrderId`, `Total`, `RealPay`, `UserId`) VALUES
(1, '1120200410011154', 160000, 160000, 11),
(2, '1120200410011650', 85000, 85000, 11),
(3, '1120200410011837', 110000, 110000, 11),
(4, '1020200410021951', 285000, 285000, 10),
(5, '1020200410090408', 160000, 160000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `O_User`
--

CREATE TABLE `O_User` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(100) NOT NULL,
  `Auth` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `O_User`
--

INSERT INTO `O_User` (`id`, `UserName`, `Passwd`, `Auth`) VALUES
(1, 'boss', '123456', 1),
(2, 'hello', '654321', 2),
(3, 'god', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `id` int(11) NOT NULL,
  `UserId` int(3) NOT NULL,
  `Report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`id`, `UserId`, `Report`) VALUES
(1, 1, 'problem problem problem problem problem problem problem problem problem problem problem problem problem problem problem problem '),
(2, 7, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tmpShop`
--

CREATE TABLE `tmpShop` (
  `id` int(11) NOT NULL,
  `UserId` int(10) NOT NULL,
  `MerId` int(10) NOT NULL,
  `MerName` text NOT NULL,
  `Price` int(30) NOT NULL,
  `Qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tmpShop`
--

INSERT INTO `tmpShop` (`id`, `UserId`, `MerId`, `MerName`, `Price`, `Qty`) VALUES
(21, 2, 3, 'XBOX1080', 9000, 0),
(35, 1, 2, 'Laptop', 40000, 2),
(43, 8, 1, 'computer 1', 30000, 6),
(44, 8, 3, 'XBOX1080', 9000, 5),
(54, 11, 1, 'computer 1', 30000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(100) NOT NULL,
  `vty` int(1) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Phone` text,
  `Address` text,
  `Level` int(2) NOT NULL,
  `Gold` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `UserName`, `Passwd`, `vty`, `Name`, `Phone`, `Address`, `Level`, `Gold`) VALUES
(10, 'md5', '202cb962ac59075b964b07152d234b70', 0, 'md5', '09456123221', 'Taichung AC Road 456', 5, 120100),
(11, 'tom', 'b7f91ee1b94f1ed3dbb2959607f4b784', 0, 'tom', '09456789322', 'Taichung DFG Road 666', 5, 10000),
(12, 'boss', '698d51a19d8a121ce581499d7b701668', 0, '111', '111', '111', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BackItem`
--
ALTER TABLE `BackItem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CartBuy`
--
ALTER TABLE `CartBuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Discount`
--
ALTER TABLE `Discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Merchandise`
--
ALTER TABLE `Merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `OrderTable`
--
ALTER TABLE `OrderTable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `O_User`
--
ALTER TABLE `O_User`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmpShop`
--
ALTER TABLE `tmpShop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BackItem`
--
ALTER TABLE `BackItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `CartBuy`
--
ALTER TABLE `CartBuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `Discount`
--
ALTER TABLE `Discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Merchandise`
--
ALTER TABLE `Merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `OrderTable`
--
ALTER TABLE `OrderTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `O_User`
--
ALTER TABLE `O_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tmpShop`
--
ALTER TABLE `tmpShop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
