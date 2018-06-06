-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: manage_system
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

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
-- Table structure for table `borrow_record`
--

DROP TABLE IF EXISTS `borrow_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrow_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `borrow_amount` varchar(50) NOT NULL DEFAULT '1',
  `has_returned` tinyint(1) NOT NULL DEFAULT '0',
  `return_time` datetime DEFAULT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `borrow_record_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`id`),
  CONSTRAINT `borrow_record_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrow_record`
--

LOCK TABLES `borrow_record` WRITE;
/*!40000 ALTER TABLE `borrow_record` DISABLE KEYS */;
INSERT INTO `borrow_record` VALUES (8,2,5,'23',1,'2017-05-28 17:32:34','2017-05-28 04:47:21'),(9,1,5,'2',1,'2017-06-07 22:59:39','2017-06-07 14:55:09'),(10,1,6,'1',1,'2017-06-08 12:47:39','2017-06-07 15:01:01'),(12,1,6,'1',1,'2017-06-08 12:47:35','2017-06-08 01:28:58'),(13,1,6,'1',1,'2017-06-08 12:47:32','2017-06-08 01:30:53'),(14,1,6,'1',1,'2017-06-08 12:47:27','2017-06-08 01:31:33'),(15,1,6,'1',1,'2017-06-08 12:47:22','2017-06-08 03:49:41'),(16,1,6,'1',1,'2017-06-08 12:47:17','2017-06-08 03:49:53'),(17,1,6,'1',1,'2017-06-08 12:47:03','2017-06-08 03:59:10'),(18,1,6,'1',1,'2017-06-08 12:46:22','2017-06-08 03:59:52'),(19,1,6,'1',1,'2017-06-08 16:13:08','2017-06-08 08:04:52'),(20,1,6,'1',1,'2017-06-08 16:13:04','2017-06-08 08:09:43'),(21,1,6,'13',1,'2017-06-08 16:13:01','2017-06-08 08:12:01'),(22,1,6,'6',1,'2017-06-20 11:34:25','2017-06-09 02:19:12'),(23,2,6,'4',1,'2017-06-20 11:34:18','2017-06-09 02:27:23'),(24,2,6,'8',1,'2017-06-20 11:34:12','2017-06-09 02:27:57'),(25,1,6,'1',1,'2017-06-20 11:34:08','2017-06-09 04:27:56'),(27,1,6,'1',1,'2017-06-20 11:34:03','2017-06-09 07:01:11'),(28,1,6,'1',1,'2017-06-20 11:33:59','2017-06-09 07:03:38'),(29,1,5,'1',1,'2017-06-19 15:29:50','2017-06-09 08:45:24'),(36,2,5,'2',1,'2017-06-20 11:22:55','2017-06-20 03:22:06'),(37,2,5,'2',1,'2017-06-20 11:22:51','2017-06-20 03:22:43'),(39,2,5,'2',1,'2017-06-23 11:32:11','2017-06-23 02:34:30'),(40,2,5,'5',1,'2017-06-23 13:08:35','2017-06-23 03:33:24'),(41,2,5,'2',2,NULL,'2017-06-23 05:10:33'),(43,2,5,'3',2,NULL,'2017-06-24 15:03:44');
/*!40000 ALTER TABLE `borrow_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_attribute`
--

DROP TABLE IF EXISTS `item_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_key` varchar(255) NOT NULL,
  `attribute_describe` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_attribute_attribute_key_uindex` (`attribute_key`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_attribute`
--

LOCK TABLES `item_attribute` WRITE;
/*!40000 ALTER TABLE `item_attribute` DISABLE KEYS */;
INSERT INTO `item_attribute` VALUES (1,'item_name','器材名称',1),(2,'item_type_id','器材种类',1),(11,'item_price','单价',1),(4,'amount','库存信息',1),(18,'item_describe','器材描述',1),(29,'item_need_return','是否需要归还',1);
/*!40000 ALTER TABLE `item_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_info`
--

DROP TABLE IF EXISTS `item_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) DEFAULT NULL,
  `item_type_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `item_price` int(11) NOT NULL COMMENT '单位分',
  `item_describe` varchar(50) NOT NULL DEFAULT '',
  `item_need_return` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_name` (`item_name`),
  KEY `item_type_id` (`item_type_id`),
  CONSTRAINT `item_info_ibfk_1` FOREIGN KEY (`item_type_id`) REFERENCES `type_info` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_info`
--

LOCK TABLES `item_info` WRITE;
/*!40000 ALTER TABLE `item_info` DISABLE KEYS */;
INSERT INTO `item_info` VALUES (1,'三极管',1,15,120,'','否'),(2,'焊枪',2,20,20000,'','是'),(3,'导线',1,30,3000,'','否'),(13,'面包板',2,123,123,'','是'),(16,'电磁炮',4,1,999999999,'','');
/*!40000 ALTER TABLE `item_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_info`
--

DROP TABLE IF EXISTS `type_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_type` (`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_info`
--

LOCK TABLES `type_info` WRITE;
/*!40000 ALTER TABLE `type_info` DISABLE KEYS */;
INSERT INTO `type_info` VALUES (1,'电子元件','2018-05-19 14:01:07'),(2,'工具','2018-05-19 14:01:07'),(4,'黑科技','2018-05-23 15:06:32');
/*!40000 ALTER TABLE `type_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'wuming',
  `student_id` varchar(50) NOT NULL DEFAULT '',
  `sex` varchar(50) NOT NULL DEFAULT '男',
  `email` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (4,5,'宋崔宁','3144438','男','','','2018-05-19 14:17:25'),(5,6,'赵阳','3144439','男','','','2018-05-19 14:17:25'),(22,8,'程胜平','3144417','男','','','2018-05-22 18:48:51'),(23,9,'刘海新','3144406','男','','','2018-05-22 18:55:09'),(24,10,'张磊','3144421','男','','','2018-05-25 14:07:01');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) CHARACTER SET gb2312 NOT NULL DEFAULT 'anonymous',
  `password` varchar(255) COLLATE gb2312_bin NOT NULL DEFAULT '',
  `role` varchar(50) CHARACTER SET gb2312 NOT NULL DEFAULT 'normaluser',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`role`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'liyang','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','manager','2018-05-19 14:01:07'),(5,'songhaha','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','normaluser','2018-05-19 14:01:07'),(6,'zhaoyang','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','normaluser','2018-05-19 14:01:07'),(8,'chengshengping','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','normaluser','2018-05-22 18:48:51'),(9,'liuhaixin','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','normaluser','2018-05-22 18:55:09'),(10,'zhanglei','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','normaluser','2018-05-25 14:07:01'),(11,'tangjing','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','manager','2018-05-25 15:18:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-06 18:05:00
