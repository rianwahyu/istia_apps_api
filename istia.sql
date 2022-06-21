-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 02:09 PM
-- Server version: 10.2.43-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rige4492_istia`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyticsItem`
--

CREATE TABLE `analyticsItem` (
  `id` int(11) NOT NULL,
  `itemID` varchar(15) NOT NULL,
  `variantID` varchar(50) NOT NULL,
  `vote` enum('Laris','Tidak Laris') NOT NULL,
  `analyticsDate` datetime DEFAULT NULL,
  `analyticsBy` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masterItem`
--

CREATE TABLE `masterItem` (
  `itemID` varchar(15) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemDescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterItem`
--

INSERT INTO `masterItem` (`itemID`, `itemName`, `itemDescription`) VALUES
('210002', 'Convers', 'Ini Sepatu Convers'),
('210001', 'Adidas', 'Ini Sepatu Adidas'),
('210003', 'Puma', 'Ini Sepatu Puma'),
('210004', 'Vans', 'Ini Sepatu Vans'),
('210005', 'Wakai', 'Ini Sepatu Wakai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fullname`, `username`, `password`, `role`, `createdDate`) VALUES
(1, 'Admin Tes', 'admin', 'admin123', 'Admin', '2021-11-23 11:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `variantItem`
--

CREATE TABLE `variantItem` (
  `variantID` varchar(50) NOT NULL,
  `itemID` varchar(15) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variantItem`
--

INSERT INTO `variantItem` (`variantID`, `itemID`, `color`, `size`, `price`) VALUES
('2100010003', '210001', 'Abu', '41', 130000),
('2100010002', '210001', 'Navy', '41', 155000),
('2100010001', '210001', 'Merah', '41', 175000),
('2100010004', '210001', 'Abu', '42', 175000),
('2100010005', '210001', 'Hitam', '42', 135000),
('2100010006', '210001', 'Abu', '42', 170000),
('2100010007', '210001', 'Abu', '41', 120000),
('2100010008', '210001', 'Abu', '43', 160000),
('2100010009', '210001', 'Putih', '43', 140000),
('2100010010', '210001', 'Putih', '40', 130000),
('2100010011', '210001', 'Abu', '41', 150000),
('2100010012', '210001', 'Abu', '43', 165000),
('2100010013', '210001', 'Hitam', '41', 100000),
('2100020001', '210002', 'Abu', '42', 120000),
('2100020002', '210002', 'Abu', '41', 130000),
('2100020003', '210002', 'Abu', '40', 110000),
('2100020004', '210002', 'Abu', '40', 120000),
('2100020005', '210002', 'Abu', '39', 120000),
('2100020006', '210002', 'Abu', '39', 130000),
('2100020007', '210002', 'Hitam', '43', 120000),
('2100020008', '210002', 'Hitam', '42', 120000),
('2100020009', '210002', 'Hitam', '40', 100000),
('2100020010', '210002', 'Hitam', '39', 100000),
('2100020011', '210002', 'Hitam', '39', 110000),
('2100020012', '210002', 'Hitam', '36', 100000),
('2100020013', '210002', 'Merah', '40', 120000),
('2100020014', '210002', 'Navy', '39', 120000),
('2100020015', '210002', 'Navy', '40', 110000),
('2100020016', '210002', 'Navy', '40', 120000),
('2100020017', '210002', 'Putih', '43', 130000),
('2100030001', '210003', 'Navy', '39', 150000),
('2100030002', '210003', 'Merah', '42', 150000),
('2100040001', '210004', 'Hitam', '43', 130000),
('2100040002', '210004', 'Hitam', '43', 120000),
('2100040003', '210004', 'Merah', '41', 210000),
('2100040004', '210004', 'Putih', '40', 120000),
('2100040005', '210004', 'Merah', '40', 120000),
('2100040006', '210004', 'Merah', '40', 190000),
('2100040007', '210004', 'Putih', '39', 120000),
('2100040008', '210004', 'Putih', '39', 120000),
('2100040009', '210004', 'Hitam', '39', 110000),
('2100050001', '210005', 'Hitam', '39', 80000),
('2100050002', '210005', 'Hitam', '40', 75000),
('2100050003', '210005', 'Merah', '41', 75000),
('2100050004', '210005', 'Merah', '41', 80000),
('2100050005', '210005', 'Navy', '40', 75000),
('2100050006', '210005', 'Navy', '40', 85000),
('2100050007', '210005', 'Navy', '41', 85000),
('2100050008', '210005', 'Navy', '41', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyticsItem`
--
ALTER TABLE `analyticsItem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterItem`
--
ALTER TABLE `masterItem`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `variantItem`
--
ALTER TABLE `variantItem`
  ADD PRIMARY KEY (`variantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyticsItem`
--
ALTER TABLE `analyticsItem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
