-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2020 at 05:47 PM
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
(36, '1120200414062239', 219, 2, 11, 2),
(37, '1220200414090411', 238, 4, 12, 1),
(38, '1220200414090411', 240, 4, 12, 1),
(40, '1220200414091226', 243, 4, 12, 1);

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
(271, '1820200415093948', 18, 2, 'Laptop', 40000, 1, 0),
(272, '1820200415093953', 18, 4, '電腦螢幕', 5000, 2, 0),
(273, '1920200415094117', 19, 3, 'XBOX1080', 9000, 2, 0),
(274, '1920200415094138', 19, 2, 'Laptop', 40000, 5, 0),
(275, '1920200415094207', 19, 4, '電腦螢幕', 5000, 1, 0),
(276, '1920200415094211', 19, 4, '電腦螢幕', 5000, 2, 0),
(277, '1920200415094547', 19, 4, '電腦螢幕', 5000, 2, 0),
(278, '1920200415094644', 19, 4, '電腦螢幕', 5000, 1, 0);

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
-- Table structure for table `Level`
--

CREATE TABLE `Level` (
  `id` int(11) NOT NULL,
  `ReachGold` int(20) NOT NULL,
  `TotalGold` int(20) NOT NULL,
  `RStatus` int(2) NOT NULL,
  `TStatus` int(2) NOT NULL,
  `Level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Level`
--

INSERT INTO `Level` (`id`, `ReachGold`, `TotalGold`, `RStatus`, `TStatus`, `Level`) VALUES
(8, 10000, 15000, 0, 1, 1);

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
(52, '1120200414081304', 6, 11, 0),
(53, '1120200414083553', 6, 11, 0),
(54, '1120200414084642', 6, 11, 0),
(55, '1120200414084723', 6, 11, 0),
(56, '1120200414084821', 6, 11, 0),
(57, '1220200414090411', 4, 12, 1),
(58, '1220200414091226', 4, 12, 0),
(59, '1220200414092537', 4, 12, 1),
(60, '1320200415014744', 4, 13, 0),
(61, '1320200415014805', 6, 13, 0),
(62, '1120200415034142', 6, 11, 0),
(63, '1120200415034208', 6, 11, 0),
(64, '1120200415054206', 5, 11, 0),
(65, '1620200415093204', 5, 16, 0),
(66, '1620200415093223', 5, 16, 0),
(67, '1620200415093318', 5, 16, 0),
(68, '1620200415093353', 5, 16, 0),
(69, '1620200415093441', 5, 16, 0),
(70, '1620200415093508', 5, 16, 0),
(71, '1620200415093522', 5, 16, 0),
(72, '1720200415093646', 5, 17, 0),
(73, '1720200415093651', 5, 17, 0),
(74, '1820200415093948', 5, 18, 0),
(75, '1820200415093953', 5, 18, 0),
(76, '1920200415094117', 5, 19, 0),
(77, '1920200415094138', 5, 19, 0),
(78, '1920200415094207', 5, 19, 0),
(79, '1920200415094211', 5, 19, 0);

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
(111, '1820200415093948', 40000, 40000, 0, 18, '123', '123'),
(112, '1820200415093953', 10000, 10000, 0, 18, '123', '123'),
(113, '1920200415094117', 18000, 18000, 0, 19, '123', '123'),
(114, '1920200415094138', 200000, 200000, 0, 19, '123', '123'),
(115, '1920200415094207', 5000, 5000, 0, 19, '123', '123'),
(116, '1920200415094211', 10000, 10000, 0, 19, '123', '123'),
(117, '1920200415094547', 10000, 5000, 5000, 19, '123', '123'),
(118, '1920200415094644', 5000, 0, 5000, 19, '123', '123');

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
(3, 'god', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'emp', 'c33367701511b4f6020ec61ded352059', 2);

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
(64, 11, 5000, '2020-04-14 08:13:04'),
(65, 11, 5000, '2020-04-14 08:35:53'),
(66, 11, -2000, '2020-04-14 08:39:36'),
(67, 11, -1000, '2020-04-14 16:43:38'),
(68, 11, 5000, '2020-04-14 08:46:42'),
(69, 11, -5000, '2020-04-14 08:46:48'),
(70, 11, 5000, '2020-04-14 08:47:23'),
(71, 11, 5000, '2020-04-14 16:48:21'),
(72, 11, -5000, '2020-04-14 16:49:34'),
(73, 12, 5000, '2020-04-14 17:04:11'),
(74, 12, 0, '2020-04-14 17:05:46'),
(75, 12, -5000, '2020-04-14 17:06:06'),
(76, 12, 5000, '2020-04-14 17:12:26'),
(77, 12, 0, '2020-04-14 17:12:51'),
(78, 12, 5000, '2020-04-14 17:18:56'),
(79, 12, 0, '2020-04-14 17:19:30'),
(80, 12, 5000, '2020-04-14 17:25:37'),
(81, 12, 0, '2020-04-14 17:26:19'),
(82, 12, 5000, '2020-04-14 17:26:35'),
(83, 12, -5000, '2020-04-14 17:27:54'),
(84, 12, 5000, '2020-04-14 17:28:09'),
(85, 12, 0, '2020-04-14 17:28:34'),
(86, 12, 9000, '2020-04-14 17:28:43'),
(87, 13, 5000, '2020-04-15 09:47:44'),
(88, 13, 0, '2020-04-15 09:47:52'),
(89, 13, 0, '2020-04-15 09:47:58'),
(90, 13, 5000, '2020-04-15 09:48:05'),
(91, 13, -1000, '2020-04-15 09:49:17'),
(92, 13, -9000, '2020-04-15 09:49:27'),
(93, 13, -9000, '2020-04-15 09:50:32'),
(94, 11, 0, '2020-04-15 10:39:25'),
(95, 11, 0, '2020-04-15 10:43:18'),
(96, 11, 5000, '2020-04-15 11:41:42'),
(97, 11, 5000, '2020-04-15 11:42:08'),
(98, 11, 1000, '2020-04-15 13:42:06'),
(99, 11, -10000, '2020-04-15 13:45:43'),
(100, 11, -30000, '2020-04-15 13:46:39'),
(101, 11, 0, '2020-04-15 16:09:19'),
(102, 16, 1000, '2020-04-15 17:32:04'),
(103, 16, 1000, '2020-04-15 17:32:23'),
(104, 16, 1000, '2020-04-15 17:33:18'),
(105, 16, 1000, '2020-04-15 17:33:53'),
(106, 16, 1000, '2020-04-15 17:34:41'),
(107, 16, 1000, '2020-04-15 17:35:08'),
(108, 16, 1000, '2020-04-15 17:35:22'),
(109, 17, 1000, '2020-04-15 17:36:46'),
(110, 17, 1000, '2020-04-15 17:36:51'),
(111, 18, 1000, '2020-04-15 17:39:48'),
(112, 18, 1000, '2020-04-15 17:39:53'),
(113, 19, 1000, '2020-04-15 17:41:17'),
(114, 19, 1000, '2020-04-15 17:41:38'),
(115, 19, 1000, '2020-04-15 17:42:07'),
(116, 19, 1000, '2020-04-15 17:42:11'),
(117, 19, -5000, '2020-04-15 17:45:47'),
(118, 19, -5000, '2020-04-15 17:46:44');

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

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `id` int(11) NOT NULL,
  `UserId` int(3) NOT NULL,
  `Report` text NOT NULL,
  `RoomId` varchar(40) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`id`, `UserId`, `Report`, `RoomId`, `Date`) VALUES
(6, 12, 'hello~~', '20200414175008', '2020-04-14 17:50:08'),
(7, 12, 'hello too~', '20200414175008', '2020-04-14 18:08:27'),
(8, 0, '0000aaaaaa', '20200414175008', '2020-04-14 00:00:00'),
(9, 0, 'yoyo~', '20200414175008', '2020-04-14 18:24:47'),
(10, 13, 'hey, this is a test!', '20200415085904', '2020-04-15 08:59:04'),
(11, 0, 'okok, i\'m ok', '20200415085904', '2020-04-15 09:06:55'),
(12, 13, 'yes, it is ok', '20200415085904', '2020-04-15 09:09:30');

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
(11, 'tom', 'b7f91ee1b94f1ed3dbb2959607f4b784', 0, 'tom', '09456789123', 'Taichung DFG Road 123', 4, 25000),
(12, 'boss', '698d51a19d8a121ce581499d7b701668', 0, '111', '111', '111', 2, 34000),
(13, 'md5', '1bc29b36f623ba82aaf6724fd3b16718', 0, 'Md5', '09456713654', 'Taichung EFR Road 514', 3, 0),
(18, 'level', 'c9e9a848920877e76685b2e4e76de38d', 0, '123', '123', '123', 2, 2000),
(19, 'lv2', '86674789d69da8edffc4b3ca45540e1b', 0, '123', '123', '123', 2, 30000);

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
-- Indexes for table `Level`
--
ALTER TABLE `Level`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `CartBuy`
--
ALTER TABLE `CartBuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
--
-- AUTO_INCREMENT for table `Discount`
--
ALTER TABLE `Discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Level`
--
ALTER TABLE `Level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Merchandise`
--
ALTER TABLE `Merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `OrderDiscount`
--
ALTER TABLE `OrderDiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `OrderTable`
--
ALTER TABLE `OrderTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `O_User`
--
ALTER TABLE `O_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Plate`
--
ALTER TABLE `Plate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `Reply`
--
ALTER TABLE `Reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tmpShop`
--
ALTER TABLE `tmpShop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
