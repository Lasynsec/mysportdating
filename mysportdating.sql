-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mysportdating
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `athletes`
--

DROP TABLE IF EXISTS `athletes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athletes` (
  `id_athletes` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(40) NOT NULL,
  PRIMARY KEY (`id_athletes`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athletes`
--

LOCK TABLES `athletes` WRITE;
/*!40000 ALTER TABLE `athletes` DISABLE KEYS */;
INSERT INTO `athletes` VALUES (1,'Michael','Jordan','jordan@Michael.com','Chicago'),(2,'John','Delsinger','delsinger@jean','London'),(3,'Eric','Cantona','cantona@eric','Manchester'),(4,'Donald','Reginald','reginbald@donald.com','Belfast'),(5,'Jean','Valgean','jeand@valgean.com','Paris');
/*!40000 ALTER TABLE `athletes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `athletes_sports`
--

DROP TABLE IF EXISTS `athletes_sports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `athletes_sports` (
  `id_athletes` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `skill_level` varchar(40) NOT NULL,
  PRIMARY KEY (`id_athletes`,`id_sport`),
  UNIQUE KEY `athletes_sports_id_athletes_uniq` (`id_athletes`),
  KEY `FK_nathletes_sports_id_sport` (`id_sport`),
  CONSTRAINT `FK_athletes_sports_id_athletes` FOREIGN KEY (`id_athletes`) REFERENCES `athletes` (`id_athletes`),
  CONSTRAINT `FK_nathletes_sports_id_sport` FOREIGN KEY (`id_sport`) REFERENCES `sports` (`id_sport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `athletes_sports`
--

LOCK TABLES `athletes_sports` WRITE;
/*!40000 ALTER TABLE `athletes_sports` DISABLE KEYS */;
INSERT INTO `athletes_sports` VALUES (1,2,'Pro'),(2,1,'Beginner'),(3,1,'Confirmed'),(4,6,'Beginner'),(5,3,'Pro');
/*!40000 ALTER TABLE `athletes_sports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sports` (
  `id_sport` int(11) NOT NULL AUTO_INCREMENT,
  `design` varchar(25) NOT NULL,
  PRIMARY KEY (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sports`
--

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;
INSERT INTO `sports` VALUES (1,'Football'),(2,'Basketball'),(3,'Boxing'),(4,'Tennis'),(5,'Rugby'),(6,'Judo');
/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-05 23:59:41
