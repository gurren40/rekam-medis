-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2019 at 08:35 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

--
-- Dumping data for table `AuthKey`
--

INSERT INTO `AuthKey` (`ID`, `owner`, `keyss`, `datecreated`, `dateexpired`) VALUES
(6, 1, 'XFkwtXrntDPlGlqJkeRrriNzecPeyOddtBHVQ1SHbyvGxLHC8FsWWFePmHKgnsNr', '2019-11-22', '2019-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `Data-User`
--

CREATE TABLE `Data-User` (
  `id` varchar(25) COLLATE utf8_bin NOT NULL,
  `nama-institusi` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama-sub-institusi` varchar(50) COLLATE utf8_bin NOT NULL,
  `kode-rumah-sakit` varchar(50) COLLATE utf8_bin NOT NULL,
  `jenis-institusi` varchar(50) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(50) COLLATE utf8_bin NOT NULL,
  `kota-kabupaten` varchar(50) COLLATE utf8_bin NOT NULL,
  `provinsi` varchar(50) COLLATE utf8_bin NOT NULL,
  `kode-pos` int(50) NOT NULL,
  `gelar` varchar(50) COLLATE utf8_bin NOT NULL,
  `gelar-lainnya` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama-awal` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama-akhir` varchar(50) COLLATE utf8_bin NOT NULL,
  `telpon-kantor` int(50) NOT NULL,
  `no-hp` int(50) NOT NULL,
  `fax` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `gelar-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `gelar-lainnya-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama-awal-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `nama-akhir-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `jabatan-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `telpon-kantor-akun` int(50) NOT NULL,
  `no-hp-akun` int(50) NOT NULL,
  `fax-akun` varchar(50) COLLATE utf8_bin NOT NULL,
  `email-akun` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Data-User`
--

INSERT INTO `Data-User` (`id`, `nama-institusi`, `nama-sub-institusi`, `kode-rumah-sakit`, `jenis-institusi`, `alamat`, `kota-kabupaten`, `provinsi`, `kode-pos`, `gelar`, `gelar-lainnya`, `nama-awal`, `nama-akhir`, `telpon-kantor`, `no-hp`, `fax`, `email`, `gelar-akun`, `gelar-lainnya-akun`, `nama-awal-akun`, `nama-akhir-akun`, `jabatan-akun`, `telpon-kantor-akun`, `no-hp-akun`, `fax-akun`, `email-akun`) VALUES
('5dd93bd52178e', 'asdf', 'asdf', '123', 'asdf', 'asdf', 'asdf', 'asdf', 123, 'asdf', 'asdf', 'asdf', 'asdf', 123, 123, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 123, 123, 'asdf', 'asdf'),
('5dd980d104e42', 'asdf', 'asdf', '123', 'asdf', 'asdf', 'asdf', 'asdf', 123, 'asdf', 'asdf', 'asdf', 'asdf', 123, 123, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 123, 123, 'asdf', 'asdf');

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
  `Alamat` text DEFAULT NULL,
  `data-user` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`ID`, `NIK`, `password`, `Role`, `Nama`, `Umur`, `JK`, `Alamat`, `data-user`) VALUES
(1, 1000000000000000, '$2y$10$nqV9t9D7.0vhieN4B1FD.uBO8O.H7.3S2.IRxhJAGAtDt6Xr8vj3W', 1, 'Administrator', 0, 0, 'Rekam Medis', NULL);

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
-- Indexes for table `Data-User`
--
ALTER TABLE `Data-User`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
