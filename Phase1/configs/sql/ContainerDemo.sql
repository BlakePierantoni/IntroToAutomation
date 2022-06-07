-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: ContainerDemo
-- ------------------------------------------------------
-- Server version	5.7.34-0ubuntu0.18.04.1

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
-- Table structure for table `car_demo`
--

DROP TABLE IF EXISTS `car_demo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_demo` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_make` varchar(100) NOT NULL,
  `car_model` varchar(40) NOT NULL,
  `car_year` int(11) NOT NULL,
  `car_color` varchar(10) DEFAULT NULL,
  `car_hp` int(5) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_demo`
--

LOCK TABLES `car_demo` WRITE;
/*!40000 ALTER TABLE `car_demo` DISABLE KEYS */;
INSERT INTO `car_demo` VALUES (1,'Chevrolet','Camaro SS',2018,'Black',465),(2,'Chevrolet','Corvette ZR1',2016,'Red',755),(3,'Cadallac','CTS-V',2019,'Black',640),(4,'Mercedes-Benz','C63 AMG',2021,'White',469),(5,'Nissan','GT-R',2021,'Grey',565),(6,'Ford','GT',2021,'Grey',647),(7,'Ford','Pinto',1971,'Brown',75),(8,'Ferrari','458 Italia',2015,'Red',562),(9,'Lamborghini','Diablo SV',1999,'Silver',530),(10,'Chevrolet','Camaro SS',1969,'Black',325);
/*!40000 ALTER TABLE `car_demo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-28 14:32:13
