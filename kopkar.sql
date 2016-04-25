-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 11:42 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopkar`
--
CREATE DATABASE IF NOT EXISTS `kopkar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kopkar`;

-- --------------------------------------------------------

--
-- Table structure for table `tblloan`
--

CREATE TABLE `tblloan` (
  `Nik` varchar(15) NOT NULL,
  `LoanDate` date NOT NULL,
  `LoanTenor` int(2) NOT NULL,
  `LoanInstallment` varchar(15) NOT NULL,
  `LoanRate` varchar(10) NOT NULL,
  `LoanValue` varchar(15) NOT NULL,
  `LoanStatus` varchar(10) DEFAULT NULL,
  `ResultName` int(2) NOT NULL,
  `CreatedBy` varchar(35) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedBy` varchar(35) DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblloan`
--

INSERT INTO `tblloan` (`Nik`, `LoanDate`, `LoanTenor`, `LoanInstallment`, `LoanRate`, `LoanValue`, `LoanStatus`, `ResultName`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
('123', '2016-04-24', 10, '-1000', '5', '10000', '2', 3, NULL, '2016-04-23 18:00:40', NULL, '0000-00-00 00:00:00'),
('12311', '2016-01-01', 12, '-508300', '5', '10100000', '2', 3, 'admin', '2016-04-23 17:26:38', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `Nik` varchar(15) NOT NULL,
  `LoanDate` date NOT NULL,
  `Tenor` int(2) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentValue` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`Nik`, `LoanDate`, `Tenor`, `PaymentDate`, `PaymentValue`) VALUES
('123', '2016-04-24', 1, '2016-04-23', '1000'),
('123', '2016-04-24', 2, '2016-04-23', '1000'),
('123', '2016-04-24', 3, '2016-04-23', '1000'),
('123', '2016-04-24', 4, '2016-04-23', '1000'),
('123', '2016-04-24', 5, '2016-04-23', '1000'),
('123', '2016-04-24', 6, '2016-04-23', '1000'),
('123', '2016-04-24', 7, '2016-04-23', '1000'),
('123', '2016-04-24', 8, '2016-04-23', '1000'),
('123', '2016-04-24', 9, '2016-04-23', '1000'),
('123', '2016-04-24', 10, '2016-04-23', '1000'),
('12311', '2016-01-01', 1, '2016-04-23', ''),
('12311', '2016-01-01', 2, '2016-04-23', '508300'),
('12311', '2016-01-01', 3, '2016-04-23', '508300'),
('12311', '2016-01-01', 4, '2016-04-23', '508300'),
('12311', '2016-01-01', 5, '2016-04-23', '508300'),
('12311', '2016-01-01', 6, '2016-04-23', '508300'),
('12311', '2016-01-01', 7, '0000-00-00', '-508300'),
('12311', '2016-01-01', 8, '0000-00-00', '-508300'),
('12311', '2016-01-01', 9, '0000-00-00', '-508300'),
('12311', '2016-01-01', 10, '0000-00-00', '-508300'),
('12311', '2016-01-01', 11, '0000-00-00', '-508300'),
('12311', '2016-01-01', 12, '0000-00-00', '-508300');

-- --------------------------------------------------------

--
-- Table structure for table `tblperson`
--

CREATE TABLE `tblperson` (
  `Nik` varchar(15) NOT NULL,
  `FullName` varchar(35) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` text,
  `Salary` varchar(15) NOT NULL,
  `CreatedBy` varchar(35) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT NULL,
  `UpdatedBy` varchar(35) DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblperson`
--

INSERT INTO `tblperson` (`Nik`, `FullName`, `Gender`, `Address`, `Salary`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
('123', 'syakur', 'L', NULL, '10000', NULL, NULL, NULL, NULL),
('12301', 'admin', 'L', 'DKI Jakarta', '0', NULL, NULL, NULL, NULL),
('12311', 'Mumud Halimudin', 'L', 'Majalengka', '4000000', NULL, NULL, NULL, NULL),
('12312', 'Linggo Gaggat Riyadi', 'L', 'DKI Jakarta', '4000000', NULL, NULL, NULL, NULL),
('14', '14', 'L', NULL, '100000', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `ResultId` int(11) NOT NULL,
  `ResultGroupId` varchar(10) NOT NULL,
  `ResultName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`ResultId`, `ResultGroupId`, `ResultName`) VALUES
(1, '1', 'Permintaan  masih dalam proses'),
(2, '1', 'Menunggu persetujuan atasan'),
(3, '2', 'Pengajuan telah disetujui'),
(4, '3', 'Tidak disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tblresultgroup`
--

CREATE TABLE `tblresultgroup` (
  `ResultGroupId` int(1) NOT NULL,
  `ResultGroupName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblresultgroup`
--

INSERT INTO `tblresultgroup` (`ResultGroupId`, `ResultGroupName`) VALUES
(1, 'Pending'),
(2, 'Approve'),
(3, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `Nik` int(15) NOT NULL,
  `UserPassword` varchar(50) NOT NULL,
  `UserLevel` varchar(10) NOT NULL,
  `UserEmail` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(35) DEFAULT NULL,
  `CreatedDate` timestamp NULL DEFAULT NULL,
  `UpdatedBy` varchar(35) DEFAULT NULL,
  `UpdatedDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`Nik`, `UserPassword`, `UserLevel`, `UserEmail`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(14, '123456', 'admin', NULL, NULL, NULL, NULL, NULL),
(123, '123123', 'admin', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblloan`
--
ALTER TABLE `tblloan`
  ADD PRIMARY KEY (`Nik`,`LoanDate`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`Nik`,`LoanDate`,`Tenor`);

--
-- Indexes for table `tblperson`
--
ALTER TABLE `tblperson`
  ADD PRIMARY KEY (`Nik`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`ResultId`);

--
-- Indexes for table `tblresultgroup`
--
ALTER TABLE `tblresultgroup`
  ADD PRIMARY KEY (`ResultGroupId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`Nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
