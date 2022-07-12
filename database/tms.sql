-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2022 at 03:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'b93939873fd4923043b9dec975811f66', '2017-05-13 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `UserEmail` varchar(100) DEFAULT NULL,
  `FromDate` varchar(100) DEFAULT NULL,
  `ToDate` varchar(100) DEFAULT NULL,
  `Comment` mediumtext DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`BookingId`, `PackageId`, `UserEmail`, `FromDate`, `ToDate`, `Comment`, `RegDate`, `status`, `CancelledBy`, `UpdationDate`) VALUES
(13, 7, 'ben@ben.com', '2022-05-09', '2022-05-09', 'ge', '2022-05-09 10:28:54', 1, NULL, '2022-05-09 10:46:29'),
(14, 7, 'yehez@yehez.com', '2022-05-14', '2022-05-14', 'Mau nginap', '2022-05-09 11:39:18', 2, 'a', '2022-05-09 11:46:59'),
(15, 12, 'yehez@yehez.com', '2022-05-09', '2022-05-09', 'asa', '2022-05-09 11:48:15', 1, NULL, '2022-05-09 11:49:21'),
(16, 7, 'yehez@yehez.com', '2022-05-09', '2022-05-10', '-', '2022-05-09 12:07:52', 0, NULL, NULL),
(17, 7, 'yehez@yehez.com', '2022-05-09', '2022-05-11', '-', '2022-05-09 12:31:07', 0, NULL, NULL),
(18, 7, 'tes@tes2.com', '2022-05-06', '2022-05-17', 'tes', '2022-05-15 00:45:54', 2, 'u', '2022-05-15 00:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbltourpackages`
--

CREATE TABLE `tbltourpackages` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(200) DEFAULT NULL,
  `PackageType` varchar(150) DEFAULT NULL,
  `PackageLocation` varchar(100) DEFAULT NULL,
  `PackagePrice` int(11) DEFAULT NULL,
  `PackageFetures` varchar(255) DEFAULT NULL,
  `PackageDetails` mediumtext DEFAULT NULL,
  `PackageImage` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltourpackages`
--

INSERT INTO `tbltourpackages` (`PackageId`, `PackageName`, `PackageType`, `PackageLocation`, `PackagePrice`, `PackageFetures`, `PackageDetails`, `PackageImage`, `Creationdate`, `UpdationDate`) VALUES
(7, 'Bukit Doa ', 'Personal', 'Huta Ginjang', 20000, 'banyak', 'baa', 'Bukit Doa3.jpeg', '2022-05-07 08:09:24', '2022-05-09 12:14:26'),
(12, 'Salib Kasih', NULL, 'Siatas Barita, Tarutung', 25000, 'Banyak', ' ans', 'Salib-Kasih.jpeg', '2022-05-09 10:50:15', NULL),
(13, 'Tugu Aritonang', NULL, 'Aritonang, Muara', 15000, 'bansa', 'sfas', 'Tugu-Toga-Aritonang.jpeg', '2022-05-09 10:50:44', NULL),
(14, 'Pulau Sibandang', NULL, 'Sibandang, Muara', 45000, 'sada', 'ada', 'Pulau-Sibandang.jpeg', '2022-05-09 10:51:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(10) DEFAULT NULL,
  `EmailId` varchar(70) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Password`, `RegDate`, `UpdationDate`) VALUES
(12, '12ben', '0219', 'ben@ben.com', '035c38b95750ab68cc7544f3f821e7f1', '2022-05-05 20:02:35', '2022-05-05 20:04:24'),
(13, 'yehez', '1234', 'yehez@yehez.com', 'b93939873fd4923043b9dec975811f66', '2022-05-09 11:31:21', NULL),
(14, 'tes', 'tess', 'tes1@tes.com ', 'b93939873fd4923043b9dec975811f66', '2022-05-09 11:32:58', NULL),
(15, 'eee', 'ee', 'ee@ee.com', 'f4808c7d4bc4a9afcd29272453dadef9', '2022-05-09 11:34:50', NULL),
(16, 'Ben', 'Ben', 'tes@tes2.com', 'b93939873fd4923043b9dec975811f66', '2022-05-14 20:54:57', '2022-05-14 23:33:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  ADD PRIMARY KEY (`PackageId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`),
  ADD KEY `EmailId_2` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbltourpackages`
--
ALTER TABLE `tbltourpackages`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
