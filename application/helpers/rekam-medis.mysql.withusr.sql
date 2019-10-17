-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2019 at 01:34 AM
-- Server version: 10.1.41-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekam-medis`
--

-- --------------------------------------------------------

--
-- Table structure for table `AuthKey`
--

CREATE TABLE `AuthKey` (
  `ID` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `keyss` varchar(64) NOT NULL,
  `datecreated` date DEFAULT NULL,
  `dateexpired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `RekamMedis`
--

CREATE TABLE `RekamMedis` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Tegangan` double DEFAULT NULL,
  `mAs` double DEFAULT NULL,
  `mGy` double DEFAULT NULL,
  `OutputRadiasi` double DEFAULT NULL,
  `Esak` double DEFAULT NULL,
  `DAP` double DEFAULT NULL,
  `imageName` varchar(70) DEFAULT 'none.jpg',
  `datecreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `ID` int(11) NOT NULL,
  `NIK` bigint(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Role` int(3) NOT NULL DEFAULT 0,
  `Nama` varchar(50) DEFAULT NULL,
  `Umur` int(3) DEFAULT NULL,
  `JK` tinyint(1) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AuthKey`
--
ALTER TABLE `AuthKey`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `keys` (`keyss`);

--
-- Indexes for table `RekamMedis`
--
ALTER TABLE `RekamMedis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AuthKey`
--
ALTER TABLE `AuthKey`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `RekamMedis`
--
ALTER TABLE `RekamMedis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- insert admin user
INSERT INTO `User` VALUES (1,1000000000000000,'$2y$10$nqV9t9D7.0vhieN4B1FD.uBO8O.H7.3S2.IRxhJAGAtDt6Xr8vj3W',1,'Administrator',0,0,'Rekam Medis');
