-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2020 at 09:36 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

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
(40, '1220200414091226', 243, 4, 12, 1),
(51, '2120200416100420', 354, 9, 21, 1),
(52, '2120200416100420', 353, 4, 21, 1),
(53, '2120200416100420', 355, 9, 21, 1),
(54, '2120200416100420', 356, 4, 21, 1);

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
(351, '2120200416100143', 21, 4, '電腦螢幕', 5000, 2, 4),
(352, '2120200416100315', 21, 3, 'XBOX1080', 9000, 2, 4),
(353, '2120200416100420', 21, 4, '電腦螢幕', 5000, 1, 5),
(354, '2120200416100420', 21, 9, 'gogogo', 1500, 1, 5),
(355, '2120200416100420', 21, 9, 'gogogo', 1500, 1, 5),
(356, '2120200416100420', 21, 4, '電腦螢幕', 5000, 1, 5),
(357, '1120200417005942', 11, 3, 'XBOX1080', 9000, 15, 0),
(358, '1120200417010028', 11, 3, 'XBOX1080', 9000, 10, 4),
(359, '1120200417010254', 11, 10, 'rare Diamond', 30000, 2, 0),
(360, '1120200417010439', 11, 1, 'computer 1', 30000, 2, 0),
(361, '1120200417010454', 11, 4, '電腦螢幕', 5000, 1, 0),
(362, '1120200417013341', 11, 4, '電腦螢幕', 5000, 1, 4),
(363, '1120200417013341', 11, 4, '電腦螢幕', 5000, 1, 6);

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
(8, 3, 20000, 15000),
(12, 0, 10000, 500),
(13, 4, 5000, 5000),
(14, 5, 10000, 5000);

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
(9, 10000, 20000, 1, 1, 1),
(10, 20000, 15000, 0, 1, 2),
(11, 10000, 20000, 1, 0, 3),
(12, 12000, 15000, 1, 1, 4);

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
(1, 'computer 1', 'this is first one', 'First computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer computer ', 30000, 98, 0),
(2, 'Laptop', 'this is a laptop', 'Second laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop laptop ', 40000, 150, 0),
(3, 'XBOX1080', 'A video player', '1080 1080  1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 1080 XXXXXX BBBBBBB', 9000, 290, 0),
(4, '電腦螢幕', '這是一個電腦螢幕', '這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕這是一個電腦螢幕', 5000, 197, 0),
(7, 'Unlimited blade', 'yoyo 123', 'abc def ghe', 2000, 300, 1),
(8, 'PS6', 'play ssss 6', 'it is a good video game', 15000, 200, 0),
(9, 'gogogo', 'go', 'gogogogogogogogogogogo', 1500, 1000, 0),
(10, 'rare Diamond', 'It\'s a rare diamond', 'super rare super rare  super rare  super rare  super rare  super rare ', 30000, 0, 0);

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
(79, '1920200415094211', 5, 19, 0),
(80, '1920200415094845', 4, 19, 0),
(81, '1920200415094852', 4, 19, 0),
(82, '1920200416025803', 5, 19, 0),
(83, '1920200416025803', 7, 19, 0),
(84, '1920200416025910', 4, 19, 1),
(85, '1920200416030139', 4, 19, 0),
(86, '1920200416030227', 5, 19, 0),
(87, '1920200416030227', 7, 19, 1),
(88, '1920200416030639', 5, 19, 0),
(89, '1920200416030639', 7, 19, 1),
(90, '1920200416031658', 4, 19, 1),
(91, '1920200416032212', 4, 19, 1),
(92, '2020200416034006', 5, 20, 0),
(93, '2020200416034932', 4, 20, 0),
(94, '2020200416040250', 4, 20, 0),
(95, '2020200416040308', 4, 20, 0),
(96, '2020200416040418', 4, 20, 0),
(97, '2020200416041607', 4, 20, 0),
(98, '2020200416064158', 8, 20, 1),
(99, '2020200416064235', 8, 20, 1),
(100, '2020200416064354', 8, 20, 1),
(101, '2120200416070809', 5, 21, 0),
(102, '2120200416071251', 4, 21, 1),
(103, '2120200416071903', 6, 21, 1),
(104, '2120200416093544', 4, 21, 0),
(105, '2120200416093544', 12, 21, 0),
(106, '2120200416093618', 12, 21, 0),
(107, '2120200416093736', 12, 21, 1),
(108, '2120200416093757', 9, 21, 0),
(109, '2120200416093812', 9, 21, 1),
(110, '2120200416094259', 9, 21, 1),
(111, '2120200416094259', 12, 21, 1),
(112, '2120200416094343', 9, 21, 1),
(113, '2120200416094343', 12, 21, 1),
(114, '2120200416094557', 9, 21, 1),
(115, '2120200416094557', 12, 21, 1),
(116, '2120200416094755', 9, 21, 0),
(117, '2120200416094755', 12, 21, 1),
(118, '2120200416095025', 9, 21, 0),
(119, '2120200416095025', 12, 21, 1),
(120, '2120200416095958', 9, 21, 0),
(121, '2120200416095958', 12, 21, 0),
(122, '2120200416100033', 9, 21, 0),
(123, '2120200416100033', 12, 21, 0),
(124, '2120200416100143', 9, 21, 1),
(125, '2120200416100143', 12, 21, 1),
(126, '2120200416100315', 9, 21, 1),
(127, '2120200416100315', 12, 21, 1),
(128, '2120200416100420', 9, 21, 1),
(129, '2120200416100420', 12, 21, 1),
(130, '1120200417010028', 9, 11, 1),
(131, '1120200417010028', 12, 11, 1),
(132, '1120200417010254', 9, 11, 0),
(133, '1120200417010254', 12, 11, 0),
(134, '1120200417013341', 13, 11, 1),
(135, '1120200417013341', 12, 11, 1);

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
  `UserName` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `OrderTable`
--

INSERT INTO `OrderTable` (`id`, `OrderId`, `Total`, `RealPay`, `Plate`, `UserId`, `UserName`, `Address`, `Phone`) VALUES
(170, '2120200416100143', 10000, 10000, 0, 21, 'abcaa', 'Taichung --AC Road 456', '0910101010'),
(171, '2120200416100315', 18000, 18000, 0, 21, 'abcaa', 'Taichung --AC Road 456', '0910101010'),
(172, '2120200416100420', 13000, 13000, 0, 21, 'abcaa', 'Taichung --AC Road 456', '0910101010'),
(173, '1120200417010028', 90000, 90000, 0, 11, 'tomtom', 'Taichung DFG Road 123', '09456789123'),
(174, '1120200417010254', 60000, 60000, 0, 11, 'tomtom', 'Taichung DFG Road 123', '09456789123'),
(175, '1120200417010439', 60000, 40000, 20000, 11, 'tomtom', 'Taichung DFG Road 123', '09456789123'),
(176, '1120200417010454', 5000, 0, 5000, 11, 'tomtom', 'Taichung DFG Road 123', '09456789123'),
(177, '1120200417013341', 10000, 10000, 0, 11, 'tomtom', 'Taichung DFG Road 123', '09456789123');

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
(4, 'emp', 'c33367701511b4f6020ec61ded352059', 2),
(5, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 2);

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
(118, 19, -5000, '2020-04-15 17:46:44'),
(119, 19, 5000, '2020-04-15 17:48:45'),
(120, 19, 5000, '2020-04-15 17:48:52'),
(121, 11, 0, '2020-04-16 08:58:02'),
(122, 11, -5000, '2020-04-16 08:58:15'),
(123, 11, 0, '2020-04-16 10:44:41'),
(124, 19, 6000, '2020-04-16 10:58:03'),
(125, 19, -6000, '2020-04-16 10:58:14'),
(126, 19, 5000, '2020-04-16 10:59:10'),
(127, 19, -5000, '2020-04-16 11:00:20'),
(128, 19, -5000, '2020-04-16 11:00:38'),
(129, 19, 5000, '2020-04-16 11:01:39'),
(130, 19, 6000, '2020-04-16 11:02:27'),
(131, 19, -5000, '2020-04-16 11:02:58'),
(132, 19, 0, '2020-04-16 11:05:45'),
(133, 19, 6000, '2020-04-16 11:06:39'),
(134, 19, -5000, '2020-04-16 11:07:11'),
(135, 19, 0, '2020-04-16 11:07:22'),
(136, 19, 0, '2020-04-16 11:14:34'),
(137, 19, 5000, '2020-04-16 11:16:58'),
(138, 19, -5000, '2020-04-16 11:17:07'),
(139, 19, 0, '2020-04-16 11:20:33'),
(140, 19, 5000, '2020-04-16 11:22:12'),
(141, 19, -5000, '2020-04-16 11:22:33'),
(142, 19, 0, '2020-04-16 11:23:23'),
(143, 19, 9000, '2020-04-16 11:23:40'),
(144, 20, 1000, '2020-04-16 11:40:06'),
(145, 20, 5000, '2020-04-16 11:49:32'),
(146, 20, 5000, '2020-04-16 12:02:50'),
(147, 20, 5000, '2020-04-16 12:03:08'),
(148, 20, 5000, '2020-04-16 12:04:18'),
(149, 20, 5000, '2020-04-16 12:16:07'),
(150, 11, 0, '2020-04-16 12:16:31'),
(151, 11, 0, '2020-04-16 12:21:52'),
(152, 11, 0, '2020-04-16 14:11:47'),
(153, 11, 0, '2020-04-16 14:15:09'),
(154, 11, 0, '2020-04-16 14:15:39'),
(155, 11, 80000, '2020-04-16 14:16:05'),
(156, 11, -24000, '2020-04-16 14:27:06'),
(157, 20, -26000, '2020-04-16 14:36:55'),
(158, 20, -26000, '2020-04-16 14:38:39'),
(159, 20, 0, '2020-04-16 14:41:15'),
(160, 20, 15000, '2020-04-16 14:41:58'),
(161, 20, -15000, '2020-04-16 14:42:13'),
(162, 20, 15000, '2020-04-16 14:42:35'),
(163, 20, -15000, '2020-04-16 14:43:16'),
(164, 20, 0, '2020-04-16 14:43:27'),
(165, 20, 15000, '2020-04-16 14:43:54'),
(166, 20, 0, '2020-04-16 14:44:30'),
(167, 20, 5000, '2020-04-16 14:44:47'),
(168, 20, -15000, '2020-04-16 14:45:00'),
(169, 20, 0, '2020-04-16 14:51:41'),
(170, 20, -3000, '2020-04-16 14:51:51'),
(171, 21, 1000, '2020-04-16 15:08:09'),
(172, 21, 0, '2020-04-16 15:10:45'),
(173, 21, 0, '2020-04-16 15:11:46'),
(174, 21, 18000, '2020-04-16 15:12:28'),
(175, 21, 5000, '2020-04-16 15:12:51'),
(176, 21, -5000, '2020-04-16 15:13:51'),
(177, 21, 0, '2020-04-16 15:17:38'),
(178, 21, 5000, '2020-04-16 15:19:03'),
(179, 21, -5000, '2020-04-16 15:19:34'),
(180, 21, -500, '2020-04-16 15:20:25'),
(181, 21, -15000, '2020-04-16 15:21:13'),
(182, 21, 5000, '2020-04-16 17:35:44'),
(183, 21, 500, '2020-04-16 17:35:44'),
(184, 21, 0, '2020-04-16 17:36:18'),
(185, 21, 500, '2020-04-16 17:36:18'),
(186, 21, 0, '2020-04-16 17:37:30'),
(187, 21, 0, '2020-04-16 17:37:36'),
(188, 21, 500, '2020-04-16 17:37:36'),
(189, 21, 100, '2020-04-16 17:37:57'),
(190, 21, 100, '2020-04-16 17:38:12'),
(191, 21, -100, '2020-04-16 17:42:23'),
(192, 21, -500, '2020-04-16 17:42:42'),
(193, 21, 100, '2020-04-16 17:42:59'),
(194, 21, 500, '2020-04-16 17:42:59'),
(195, 21, -600, '2020-04-16 17:43:09'),
(196, 21, 100, '2020-04-16 17:43:43'),
(197, 21, 500, '2020-04-16 17:43:43'),
(198, 21, -600, '2020-04-16 17:44:48'),
(199, 21, 15000, '2020-04-16 17:45:05'),
(200, 21, 100, '2020-04-16 17:45:57'),
(201, 21, 500, '2020-04-16 17:45:57'),
(202, 21, 0, '2020-04-16 17:46:38'),
(203, 21, -600, '2020-04-16 17:47:20'),
(204, 21, 100, '2020-04-16 17:47:55'),
(205, 21, 500, '2020-04-16 17:47:55'),
(206, 21, 0, '2020-04-16 17:48:26'),
(207, 21, -500, '2020-04-16 17:48:37'),
(208, 21, 1500, '2020-04-16 17:49:52'),
(209, 21, 100, '2020-04-16 17:50:25'),
(210, 21, 500, '2020-04-16 17:50:25'),
(211, 21, 0, '2020-04-16 17:51:09'),
(212, 21, 1500, '2020-04-16 17:51:22'),
(213, 21, -500, '2020-04-16 17:51:42'),
(214, 21, 0, '2020-04-16 17:52:03'),
(215, 21, 100, '2020-04-16 17:59:58'),
(216, 21, 500, '2020-04-16 17:59:58'),
(217, 21, 100, '2020-04-16 18:00:33'),
(218, 21, 500, '2020-04-16 18:00:33'),
(219, 21, 100, '2020-04-16 18:01:43'),
(220, 21, 500, '2020-04-16 18:01:43'),
(221, 21, -600, '2020-04-16 18:01:50'),
(222, 21, 100, '2020-04-16 18:03:15'),
(223, 21, 500, '2020-04-16 18:03:15'),
(224, 21, -600, '2020-04-16 18:03:38'),
(225, 21, 18000, '2020-04-16 18:03:50'),
(226, 21, 100, '2020-04-16 18:04:20'),
(227, 21, 500, '2020-04-16 18:04:20'),
(228, 21, 0, '2020-04-16 18:04:47'),
(229, 21, -500, '2020-04-16 18:04:51'),
(230, 21, -100, '2020-04-16 18:05:04'),
(231, 11, 100, '2020-04-17 09:00:28'),
(232, 11, 500, '2020-04-17 09:00:28'),
(233, 11, 100, '2020-04-17 09:02:54'),
(234, 11, 500, '2020-04-17 09:02:54'),
(235, 11, -20000, '2020-04-17 09:04:39'),
(236, 11, -5000, '2020-04-17 09:04:54'),
(237, 11, -600, '2020-04-17 09:06:11'),
(238, 11, 5000, '2020-04-17 09:33:41'),
(239, 11, 500, '2020-04-17 09:33:41'),
(240, 11, -500, '2020-04-17 09:34:16'),
(241, 11, 5000, '2020-04-17 09:34:28'),
(242, 11, -5000, '2020-04-17 09:34:43');

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
  `Title` text,
  `Report` text NOT NULL,
  `RoomId` varchar(40) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`id`, `UserId`, `Title`, `Report`, `RoomId`, `Date`) VALUES
(36, 11, 'test', 'this is a test', '20200417091847', '2020-04-17 09:18:47'),
(37, 0, NULL, 'yeayeayea', '20200417091847', '2020-04-17 09:23:08'),
(38, 11, '321456789', '1122334455', '20200417092755', '2020-04-17 09:27:55');

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
(21, 2, 3, 'XBOX1080', 9000, 30),
(35, 1, 2, 'Laptop', 40000, 4),
(43, 8, 1, 'computer 1', 30000, 3),
(44, 8, 3, 'XBOX1080', 9000, 30),
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
(11, 'tom', 'b7f91ee1b94f1ed3dbb2959607f4b784', 0, 'tomtom', '09456789123', 'Taichung DFG Road 123', 5, 51400),
(12, 'boss', '698d51a19d8a121ce581499d7b701668', 0, '111', '111', '111', 2, 34000),
(13, 'md5', '1bc29b36f623ba82aaf6724fd3b16718', 0, 'Md5', '09456713654', 'Taichung EFR Road 514', 3, 0),
(18, 'level', 'c9e9a848920877e76685b2e4e76de38d', 0, '123', '123', '123', 2, 2000),
(19, 'lv2', '86674789d69da8edffc4b3ca45540e1b', 0, '123', '123', '123', 2, 51000),
(20, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 0, 'tim', '0945213111', 'Taichung AC Road 123', 3, 2000),
(21, 'demo123', 'f3abb86bd34cf4d52698f14c0da1dc60', 0, 'abcaa', '0910101010', 'Taichung --AC Road 456', 4, 72500);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `CartBuy`
--
ALTER TABLE `CartBuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;
--
-- AUTO_INCREMENT for table `Discount`
--
ALTER TABLE `Discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `Level`
--
ALTER TABLE `Level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Merchandise`
--
ALTER TABLE `Merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `OrderDiscount`
--
ALTER TABLE `OrderDiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT for table `OrderTable`
--
ALTER TABLE `OrderTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `O_User`
--
ALTER TABLE `O_User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Plate`
--
ALTER TABLE `Plate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `Reply`
--
ALTER TABLE `Reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tmpShop`
--
ALTER TABLE `tmpShop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
