-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: shared_server
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-2

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
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `user_name` varchar(70) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `groupe_name` varchar(70) NOT NULL,
  `date_upload` date NOT NULL DEFAULT current_timestamp(),
  `description_file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES ('test','ajouter_ajouter.png','G1','2019-05-21','dsd'),('test','autre_new.png','G1','2019-05-21','kll'),('test','A installé.odt','G1','2019-05-22','dff'),('test','Sans nom 1.odt','G1','2019-05-22','fdfd'),('test','priere.jpg','G1','2019-05-22',''),('test','priere.jpg','G1','2019-05-22',''),('test','priere.jpg','G1','2019-05-22',''),('test','Binome.JPG','G1','2019-05-22','ssc'),('test','DSC_0001.JPG','G1','2019-05-22','xqqc'),('test','DSC_0001.JPG','G1','2019-05-22','nn'),('test','DSC_0004.JPG','G1','2019-05-22',''),('test','Manambintsoa_MIHAINGOHERILANTO[1].docx','G1','2019-05-22','gljlk'),('test','Manambintsoa_MIHAINGOHERILANTO[1].docx','G1','2019-05-22','gljlk'),('test','Sans nom 1.odt','G1','2019-05-22','wxwwwwwwwwwww'),('test','Sans nom 1.odt','G1','2019-05-22','wxwwwwwwwwwww'),('test','Sans nom 1.odt','G1','2019-05-22','wxwwwwwwwwwww'),('test','Sans nom 1.odt','G1','2019-05-22','ssc'),('test','f.txt','G1','2019-05-22',''),('test','episode6.py','G1','2019-05-22','hvhhv'),('test','episode6.py','G1','2019-05-22','hvhhv'),('test','Teste.py','G1','2019-05-22','jbhjh'),('test','Teste.py','G1','2019-05-22','jbhjh'),('test','Teste.py','G1','2019-05-22','jbhjh'),('test','Teste.py','G1','2019-05-22','jbhjh');
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-23 15:37:31
