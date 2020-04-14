-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2020 at 04:14 PM
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

--
-- Dumping data for table `BackItem`
--

INSERT INTO `BackItem` (`id`, `OrderId`, `CartId`, `MerId`, `UserId`, `Qty`) VALUES
(34, '1120200414061028', 217, 3, 11, 1),
(36, '1120200414062239', 219, 2, 11, 2);

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
(218, '1120200414062239', 11, 3, 'XBOX1080', 9000, 1, 4),
(219, '1120200414062239', 11, 2, 'Laptop', 40000, 2, 5),
(220, '1120200414062239', 11, 3, 'XBOX1080', 9000, 1, 4),
(221, '1120200414062353', 11, 3, 'XBOX1080', 9000, 2, 4),
(222, '1120200414063615', 11, 3, 'XBOX1080', 9000, 2, 0),
(223, '1120200414064756', 11, 1, 'computer 1', 30000, 2, 4),
(224, '1120200414075932', 11, 1, 'computer 1', 30000, 4, 0),
(225, '1120200414080252', 11, 3, 'XBOX1080', 9000, 2, 0),
(226, '1120200414080405', 11, 3, 'XBOX1080', 9000, 2, 0),
(227, '1120200414080531', 11, 2, 'Laptop', 40000, 2, 0),
(228, '1120200414081013', 11, 3, 'XBOX1080', 9000, 1, 0),
(229, '1120200414081212', 11, 3, 'XBOX1080', 9000, 1, 0),
(230, '1120200414081255', 11, 1, 'computer 1', 30000, 5, 0),
(231, '1120200414081304', 11, 4, '電腦螢幕', 5000, 5, 0);

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
(4, 2, 10000, 5000),
(5, 1, 5000, 1000),
(6, 5, 10000, 5000);

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
(3, 'XBOX1080', 'A video player', '1080 1080  1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 XXXXXX BBBBBBB', 9000, 300, 0),
(4, '電腦螢幕', '這是一個電腦螢幕', '這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕', 5000, 200, 0),
(7, 'Unlimited blade', 'yoyo 123', 'abc def ghe', 2000, 300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `OrderDiscount`
--

CREATE TABLE `OrderDiscount` (
  `id` int(11) NOT NULL,
  `OrderId` varchar(40) NOT NULL,
  `DiscountId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OrderDiscount`
--

INSERT INTO `OrderDiscount` (`id`, `OrderId`, `DiscountId`, `UserId`, `Status`) VALUES
(47, '1120200414062239', 6, 11, 1),
(48, '1120200414062353', 6, 11, 0),
(49, '1120200414063615', 6, 11, 0),
(50, '1120200414064756', 6, 11, 0),
(51, '1120200414080405', 6, 11, 0),
(52, '1120200414081304', 6, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `OrderTable`
--

CREATE TABLE `OrderTable` (
  `id` int(11) NOT NULL,
  `OrderId` varchar(40) NOT NULL,
  `Total` int(30) NOT NULL,
  `RealPay` int(30) NOT NULL,
  `Plate` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `Address` text NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OrderTable`
--

INSERT INTO `OrderTable` (`id`, `OrderId`, `Total`, `RealPay`, `Plate`, `UserId`, `Address`, `Phone`) VALUES
(69, '1120200414062239', 98000, 98000, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(70, '1120200414062353', 18000, 18000, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(71, '1120200414063615', 18000, 18000, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(72, '1120200414064756', 60000, 60000, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(73, '1120200414080359', 0, 0, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(74, '1120200414080405', 18000, 18000, 0, 11, 'Taichung DFG Road 123', '09456789123'),
(75, '1120200414080531', 80000, 79000, 1000, 11, 'Taichung DFG Road 123', '09456789123'),
(76, '1120200414081212', 9000, 0, 9000, 11, 'Taichung DFG Road 123', '09456789123'),
(77, '1120200414081255', 150000, 149000, 1000, 11, 'Taichung DFG Road 123', '09456789123'),
(78, '1120200414081304', 25000, 25000, 0, 11, 'Taichung DFG Road 123', '09456789123');

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
-- Table structure for table `Plate`
--

CREATE TABLE `Plate` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ChangeGold` int(20) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Plate`
--

INSERT INTO `Plate` (`id`, `UserId`, `ChangeGold`, `Date`) VALUES
(63, 11, -1000, '2020-04-14 08:12:55'),
(64, 11, 5000, '2020-04-14 08:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `Reply`
--

CREATE TABLE `Reply` (
  `id` int(11) NOT NULL,
  `UserId` int(20) NOT NULL,
  `Reply` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reply`
--

INSERT INTO `Reply` (`id`, `UserId`, `Reply`, `Date`) VALUES
(3, 11, '1236548789', '2020-04-14'),
(4, 12, 'hello world\r\n123', '2020-04-14');

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
(2, 7, '123456'),
(3, 11, 'asdasdasdwsdaqd'),
(4, 12, 'hello');

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
(21, 2, 3, 'XBOX1080', 9000, 4),
(35, 1, 2, 'Laptop', 40000, 4),
(43, 8, 1, 'computer 1', 30000, 4),
(44, 8, 3, 'XBOX1080', 9000, 4),
(59, 10, 2, 'Laptop', 40000, 4);

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
(11, 'tom', 'b7f91ee1b94f1ed3dbb2959607f4b784', 0, 'tom', '09456789123', 'Taichung DFG Road 123', 5, 47000),
(12, 'boss', '698d51a19d8a121ce581499d7b701668', 0, '111', '111', '111', 3, 5000);

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
-- Indexes for table `OrderDiscount`
--
ALTER TABLE `OrderDiscount`
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
-- Indexes for table `Plate`
--
ALTER TABLE `Plate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Reply`
--
ALTER TABLE `Reply`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `CartBuy`
--
ALTER TABLE `CartBuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `Discount`
--
ALTER TABLE `Discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Merchandise`
--
ALTER TABLE `Merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `OrderDiscount`
--
ALTER TABLE `OrderDiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `OrderTable`
--
ALTER TABLE `OrderTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `O_User`
--
ALTER TABLE `O_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Plate`
--
ALTER TABLE `Plate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `Reply`
--
ALTER TABLE `Reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tmpShop`
--
ALTER TABLE `tmpShop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
