-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AuthKey`
--

DROP TABLE IF EXISTS `AuthKey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthKey` (
  `ID` varchar(0) DEFAULT NULL,
  `owner` varchar(0) DEFAULT NULL,
  `keyss` varchar(0) DEFAULT NULL,
  `datecreated` varchar(0) DEFAULT NULL,
  `dateexpired` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthKey`
--

LOCK TABLES `AuthKey` WRITE;
/*!40000 ALTER TABLE `AuthKey` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthKey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RekamMedis`
--

DROP TABLE IF EXISTS `RekamMedis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RekamMedis` (
  `ID` varchar(0) DEFAULT NULL,
  `userID` varchar(0) DEFAULT NULL,
  `Nama` varchar(0) DEFAULT NULL,
  `Tegangan` varchar(0) DEFAULT NULL,
  `mAs` varchar(0) DEFAULT NULL,
  `mGy` varchar(0) DEFAULT NULL,
  `OutputRadiasi` varchar(0) DEFAULT NULL,
  `Esak` varchar(0) DEFAULT NULL,
  `DAP` varchar(0) DEFAULT NULL,
  `imageName` varchar(0) DEFAULT NULL,
  `datecreated` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RekamMedis`
--

LOCK TABLES `RekamMedis` WRITE;
/*!40000 ALTER TABLE `RekamMedis` DISABLE KEYS */;
/*!40000 ALTER TABLE `RekamMedis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `ID` tinyint(4) DEFAULT NULL,
  `NIK` bigint(20) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `Role` tinyint(4) DEFAULT NULL,
  `Nama` varchar(13) DEFAULT NULL,
  `Umur` tinyint(4) DEFAULT NULL,
  `JK` tinyint(4) DEFAULT NULL,
  `Alamat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,1000000000000000,'$2y$10$nqV9t9D7.0vhieN4B1FD.uBO8O.H7.3S2.IRxhJAGAtDt6Xr8vj3W',1,'Administrator',0,0,'Rekam Medis');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(4) DEFAULT NULL,
  `seq` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('User',1);
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-22 15:26:14
