-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 08, 2020 at 01:45 PM
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
-- Table structure for table `CartBuy`
--

CREATE TABLE `CartBuy` (
  `id` int(11) NOT NULL,
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

INSERT INTO `CartBuy` (`id`, `UserId`, `MerId`, `MerName`, `Price`, `Qty`, `Progress`) VALUES
(9, 8, 1, 'computer 1', 30000, 2, 1),
(10, 8, 3, 'XBOX1080', 9000, 5, 2),
(11, 7, 3, 'XBOX1080', 9000, 5, 4),
(12, 7, 1, 'computer 1', 30000, 6, 1),
(13, 7, 2, 'Laptop', 40000, 3, 1),
(14, 7, 3, 'XBOX1080', 9000, 5, 4),
(15, 7, 1, 'computer 1', 30000, 2, 0),
(16, 7, 1, 'computer 1', 30000, 6, 0),
(17, 7, 3, 'XBOX1080', 9000, 5, 0);

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
-- Table structure for table `O_User`
--

CREATE TABLE `O_User` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` int(20) NOT NULL,
  `Auth` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `O_User`
--

INSERT INTO `O_User` (`id`, `UserName`, `Passwd`, `Auth`) VALUES
(1, 'boss', 123456, 1),
(2, 'hello', 654321, 2);

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
(44, 8, 3, 'XBOX1080', 9000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passwd` varchar(20) NOT NULL,
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
(1, 'abc', '123', 0, 'abcabc', '09456123789', 'Taichung ABC Road 785', 1, 0),
(7, 'tom', '6605', 0, 'tom', '0926666677', 'Taichung TTT Road 999', 1, 0),
(8, 'new', '222', 0, 'newone', '09456789321', '台中 DFG Road 154', 1, 0),
(9, 'super', '9876', 0, 'Sssuper1', '09456123798', 'Taichung DFG Road 667', 2, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CartBuy`
--
ALTER TABLE `CartBuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Merchandise`
--
ALTER TABLE `Merchandise`
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
-- AUTO_INCREMENT for table `CartBuy`
--
ALTER TABLE `CartBuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Merchandise`
--
ALTER TABLE `Merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `O_User`
--
ALTER TABLE `O_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tmpShop`
--
ALTER TABLE `tmpShop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
