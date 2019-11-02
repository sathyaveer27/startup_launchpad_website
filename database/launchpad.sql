-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: launchpad
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB-

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
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `projectid` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(500) DEFAULT NULL,
  `project_desc` varchar(500) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`projectid`),
  KEY `owner` (`owner`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (8,'MP','ths is a test',2,NULL),(9,'MP','ths is a test',2,NULL),(10,'','',2,NULL),(11,'Tet','Hello from other side',2,NULL),(12,'Tet','Hello from other side',2,NULL),(13,'Tet','Hello from other side',2,NULL),(14,'LOl','LOLOLOLOLOL',2,NULL),(15,'LOl','LOLOLOLOLOL',2,NULL),(16,'LOl','LOLOLOLOLOL',2,NULL),(17,'LOl','LOLOLOLOLOL',2,NULL),(18,'LOl','LOLOLOLOLOL',2,NULL),(19,'MP','Hello ngdnsfnndndnfn  doj oisdjg oij dsfoi gjoidsfjgd iooig sdoifjg iajoi gaoi gois oisaogosjfg ojdsfog jdfo j sodjf osdof gokd fog d ossdo hosdhons ohso nfonsodnh osndf hd osd ho',2,NULL),(20,'HAHA','ths is a test!YAAYY',2,'2017-10-20 11:49:44');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_livefeed`
--

DROP TABLE IF EXISTS `project_livefeed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_livefeed` (
  `projectid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `comment` text,
  `timestamp` datetime DEFAULT NULL,
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`commentid`),
  KEY `projectid` (`projectid`),
  KEY `userid` (`userid`),
  CONSTRAINT `project_livefeed_ibfk_1` FOREIGN KEY (`projectid`) REFERENCES `project` (`projectid`),
  CONSTRAINT `project_livefeed_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_livefeed`
--

LOCK TABLES `project_livefeed` WRITE;
/*!40000 ALTER TABLE `project_livefeed` DISABLE KEYS */;
INSERT INTO `project_livefeed` VALUES (19,2,'fssdf','2017-10-18 17:48:39',1),(19,2,'fssdf','2017-10-18 17:48:39',2),(19,2,'fssdf','2017-10-18 17:48:51',3),(19,2,'Whatsapp\r\n?','2017-10-18 17:48:58',4),(19,2,'Hello from nagpur\r\n','2017-10-21 09:05:19',5),(8,2,'This project is really good!','2017-10-21 21:29:45',6),(8,2,'Ohh aaisa h kya!\r\n','2017-10-21 21:30:01',7),(19,2,'','2017-10-21 22:23:49',8),(19,2,'','2017-10-21 22:24:31',9),(19,2,'','2017-10-21 22:24:33',10);
/*!40000 ALTER TABLE `project_livefeed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_statistics`
--

DROP TABLE IF EXISTS `project_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_statistics` (
  `projectid` int(11) DEFAULT NULL,
  `collection_deadline` date DEFAULT NULL,
  `gathered_amount` float DEFAULT NULL,
  `target_amount` float DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  KEY `projectid` (`projectid`),
  CONSTRAINT `project_statistics_ibfk_1` FOREIGN KEY (`projectid`) REFERENCES `project` (`projectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_statistics`
--

LOCK TABLES `project_statistics` WRITE;
/*!40000 ALTER TABLE `project_statistics` DISABLE KEYS */;
INSERT INTO `project_statistics` VALUES (18,'2017-10-20',0,6023420,'2017-10-19'),(19,'2017-10-20',0,6023420,'2017-10-19'),(20,'2017-10-20',0,45989,'2017-10-25');
/*!40000 ALTER TABLE `project_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promote`
--

DROP TABLE IF EXISTS `promote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promote` (
  `projectid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  KEY `projectid` (`projectid`),
  KEY `userid` (`userid`),
  CONSTRAINT `promote_ibfk_1` FOREIGN KEY (`projectid`) REFERENCES `project` (`projectid`),
  CONSTRAINT `promote_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promote`
--

LOCK TABLES `promote` WRITE;
/*!40000 ALTER TABLE `promote` DISABLE KEYS */;
INSERT INTO `promote` VALUES (19,4,10,'2017-10-19 09:45:49'),(19,4,62,'2017-10-21 09:07:59');
/*!40000 ALTER TABLE `promote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `userid` int(11) DEFAULT NULL,
  `creator` enum('y','n') DEFAULT NULL,
  `promoter` enum('y','n') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `wallet_balance` double DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'atharva','muley','ath@gmail.com','123456\n',NULL,NULL,NULL),(2,'atharva','muley','ath@ath.com','123456',55666937,NULL,NULL),(3,'Sath','kar','','123456.',673,'',0),(4,'Sath','kar','sath@sath.com','123456',1,'M',123456789);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-23 18:21:49
