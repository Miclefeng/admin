-- MySQL dump 10.13  Distrib 5.7.19, for linux-glibc2.12 (x86_64)
--
-- Host: localhost    Database: admin
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'男鞋',3),(2,'女鞋',0),(3,'童鞋',0),(4,'休闲鞋',1),(5,'休闲鞋',2),(6,'布鞋',0),(7,'皮鞋',2);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firm`
--

DROP TABLE IF EXISTS `firm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `phone` char(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firm`
--

LOCK TABLES `firm` WRITE;
/*!40000 ALTER TABLE `firm` DISABLE KEYS */;
INSERT INTO `firm` VALUES (1,'泰安','泰安','18310087566','张尚尚');
/*!40000 ALTER TABLE `firm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_no` varchar(32) NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `sell` decimal(10,2) unsigned NOT NULL,
  `category` int(11) unsigned NOT NULL,
  `size` decimal(2,1) unsigned NOT NULL,
  `color` varchar(16) NOT NULL,
  `store` int(11) unsigned NOT NULL,
  `sold` int(11) unsigned NOT NULL,
  `firm` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no` (`goods_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `phone` char(11) NOT NULL,
  `goal` int(11) unsigned NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `brithday` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (26,'尹艳英','18764467256',219,'泰安',0),(27,'陈文娜','13455805690',148,'泰安',0),(28,'李静','18865480458',196,'泰安',0),(29,'郭冬梅','15753825593',25,'泰安',0),(30,'张翠','13705481462',152,'泰安',0),(31,'刘国栋','1',29,'鸡公煲',0),(32,'明海玉','15069823769',138,'泰安',0),(33,'武倩倩','18954893533',150,'泰安',0),(34,'王静','15953816155',150,'',0),(35,'张慧','13734419032',189,'泰安',0),(36,'刘继美','15588538188',89,'泰安',0),(37,'宋娟','15092852555',438,'泰安',0),(38,'单一雪','15805386997',344,'泰安',0),(39,'张宝城','15264883799',32,'泰安',0),(40,'赵美美','18653806337',176,'泰安',0),(41,'李鑫','18764890666',100,'泰安',0),(42,'王克华','13583891294',142,'泰安',0),(43,'邱西美','13468007933',0,'泰安',0),(44,'赵','18366628008',149,'泰安',0),(45,'陈清波','13954882127',97,'泰安',0),(46,'田女士','15854854854',120,'泰安',0),(47,'李女士','13581191836',240,'泰安',0),(48,'马秀如','18263826618',45,'泰安',0),(49,'吕婧','13176136995',25,'泰安',0),(50,'李春鹏','13305481767',240,'',0),(51,'贾先生','18953885037',400,'',0),(52,'彭鹏','18366655323',58,'泰安',0),(53,'叶剑','18660860527',120,'泰安',0),(54,'解','13805488564',170,'泰安',0),(55,'郭明月','13583883062',187,'泰安',0),(56,'黄振','18366630169',120,'泰安',0),(57,'徐聪','13668681358',187,'',0),(58,'王爱元','18254859663',197,'泰安',0),(59,'沈忠兰','15854856629',212,'泰安',0);
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

-- Dump completed on 2017-10-24 10:12:05
