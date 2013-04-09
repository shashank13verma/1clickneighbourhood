-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: 1clickneighbourhood
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1-log

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
-- Table structure for table `add_details`
--

DROP TABLE IF EXISTS `add_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `interested_in_id` int(10) unsigned NOT NULL,
  `society_id` int(10) unsigned NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `interested_in_id` (`interested_in_id`),
  KEY `society_id` (`society_id`),
  CONSTRAINT `add_details_ibfk_4` FOREIGN KEY (`member_id`) REFERENCES `user_profile` (`email_address`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `add_details_ibfk_5` FOREIGN KEY (`interested_in_id`) REFERENCES `master_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `add_details_ibfk_6` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_details`
--

LOCK TABLES `add_details` WRITE;
/*!40000 ALTER TABLE `add_details` DISABLE KEYS */;
INSERT INTO `add_details` VALUES (1,1,31,1,'Tution for X,XI,XII PCM','Active','0000-00-00 00:00:00',NULL),(2,1,35,1,'Desktop for sale.Pentium IV Rs.8000','Active','0000-00-00 00:00:00',NULL),(3,3,39,1,'1bhk Flat for rent.','Active','0000-00-00 00:00:00',NULL),(4,4,34,2,'Demet Account, Share, mutual funds','Active','0000-00-00 00:00:00',NULL),(5,5,31,2,'Tution C, C++','Active','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `add_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block_master`
--

DROP TABLE IF EXISTS `block_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `block` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `society_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`),
  CONSTRAINT `block_master_ibfk_2` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_master`
--

LOCK TABLES `block_master` WRITE;
/*!40000 ALTER TABLE `block_master` DISABLE KEYS */;
INSERT INTO `block_master` VALUES (1,'A',1,'Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(2,'B',1,'Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(3,'C',1,'Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(4,'D',1,'Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(5,'E',1,'Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(6,'null',1,'Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `block_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `builder_details`
--

DROP TABLE IF EXISTS `builder_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `builder_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `country_id` int(10) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `builder_details_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `builder_details_ibfk_4` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `builder_details`
--

LOCK TABLES `builder_details` WRITE;
/*!40000 ALTER TABLE `builder_details` DISABLE KEYS */;
INSERT INTO `builder_details` VALUES (1,'Omaxe','A. Rangrajan','Udyog Vihar, Gurgaon','Gurgaon',5,1,'Active','2013-03-07 00:00:00'),(2,'BPTP','R Dasgupta','sec-62, noida','noida',4,1,'Active','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `builder_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complain` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `society_id` int(10) unsigned DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `society_id` (`society_id`),
  CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `validate_user` (`id`),
  CONSTRAINT `complain_ibfk_2` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complain`
--

LOCK TABLES `complain` WRITE;
/*!40000 ALTER TABLE `complain` DISABLE KEYS */;
/*!40000 ALTER TABLE `complain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'INDIA','Active');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flat_master`
--

DROP TABLE IF EXISTS `flat_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flat_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flat_floor_id` int(10) unsigned NOT NULL,
  `tower_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flat_floor_id` (`flat_floor_id`),
  KEY `tower_id` (`tower_id`),
  KEY `block_id` (`block_id`),
  CONSTRAINT `flat_master_ibfk_2` FOREIGN KEY (`tower_id`) REFERENCES `tower_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flat_master_ibfk_3` FOREIGN KEY (`block_id`) REFERENCES `block_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flat_master_ibfk_4` FOREIGN KEY (`flat_floor_id`) REFERENCES `master_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flat_master`
--

LOCK TABLES `flat_master` WRITE;
/*!40000 ALTER TABLE `flat_master` DISABLE KEYS */;
INSERT INTO `flat_master` VALUES (1,'One',11,1,1,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00'),(2,'Two',11,1,1,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00'),(3,'Three',12,1,1,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00'),(4,'Four',12,1,1,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00');
/*!40000 ALTER TABLE `flat_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_answer`
--

DROP TABLE IF EXISTS `forum_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_answer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `a_member_id` bigint(20) DEFAULT NULL,
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`a_id`),
  KEY `question_id` (`question_id`),
  KEY `a_member_id` (`a_member_id`),
  CONSTRAINT `forum_answer_ibfk_3` FOREIGN KEY (`question_id`) REFERENCES `forum_question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forum_answer_ibfk_4` FOREIGN KEY (`a_member_id`) REFERENCES `user_profile` (`email_address`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_answer`
--

LOCK TABLES `forum_answer` WRITE;
/*!40000 ALTER TABLE `forum_answer` DISABLE KEYS */;
INSERT INTO `forum_answer` VALUES (1,1,1,'nancy','yess','06/03/13 16:11:23'),(2,2,2,'gaurav','yessssssssssss','06/03/13 16:12:09'),(3,3,3,'shashank','yes','06/03/13'),(4,4,4,'shashank','Definately','06/03/13 16:52:40'),(4,5,4,'rahul','yup','06/03/13 16:54:41'),(2,24,2,'gaurav','ofcourse','02/04/13 05:28:40');
/*!40000 ALTER TABLE `forum_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_question`
--

DROP TABLE IF EXISTS `forum_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  CONSTRAINT `forum_question_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `user_profile` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_question`
--

LOCK TABLES `forum_question` WRITE;
/*!40000 ALTER TABLE `forum_question` DISABLE KEYS */;
INSERT INTO `forum_question` VALUES (1,1,'Oss Cube Training','Are you availing best from training?','nancy','06/03/13 03:59:04',25,0),(2,2,'Demo','Is forum feature is interesting?','rahul','06/03/13 05:15:48',5,0),(3,3,'Surprise test','IS this ok?','shahank verma','07/03/13 12:39:15',8,2),(4,4,'IPL','Is IPL is good for Economy','gaurav suman','29/03/13 03:13:20',0,0);
/*!40000 ALTER TABLE `forum_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_codes`
--

DROP TABLE IF EXISTS `master_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `master_code` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master_code_values` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code_order` int(10) unsigned NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_codes`
--

LOCK TABLES `master_codes` WRITE;
/*!40000 ALTER TABLE `master_codes` DISABLE KEYS */;
INSERT INTO `master_codes` VALUES (1,'BloodGroup','A+',1,'Active'),(2,'BloodGroup','A-',2,'Active'),(3,'BloodGroup','B+',3,'Active'),(4,'BloodGroup','B-',4,'Active'),(5,'BloodGroup','O+',5,'Active'),(6,'BloodGroup','O-',6,'Active'),(7,'BloodGroup','No',7,'Active'),(8,'Occupation','Service',1,'Active'),(9,'Occupation','Self-Employed',2,'Active'),(10,'Occupation','Others',3,'Active'),(11,'FlatFloor','1st',1,'Active'),(12,'FlatFloor','2nd',2,'Active'),(13,'FlatFloor','3rd',3,'Active'),(14,'FlatFloor','4th',4,'Active'),(15,'FlatFloor','5th',5,'Active'),(16,'FlatFloor','6th',6,'Active'),(17,'FlatFloor','7th',7,'Active'),(18,'FlatFloor','8th',8,'Active'),(19,'FlatFloor','9th',9,'Active'),(20,'FlatFloor','10th',10,'Active'),(21,'FlatFloor','11th',11,'Active'),(22,'FlatFloor','12th',12,'Active'),(23,'FlatFloor','13th',13,'Active'),(24,'FlatFloor','14th',14,'Active'),(25,'FlatFloor','15th',15,'Active'),(26,'FlatFloor','16th',16,'Active'),(27,'FlatFloor','17th',17,'Active'),(28,'FlatFloor','18th',18,'Active'),(29,'FlatFloor','19th',19,'Active'),(30,'FlatFloor','20th',20,'Active'),(31,'InterestedIn','Tutor',1,'Active'),(32,'InterestedIn','Event Planner',2,'Active'),(33,'InterestedIn','Travel Planner',3,'Active'),(34,'InterestedIn','Investment',4,'Active'),(35,'InterestedIn','Computer Accessories',5,'Active'),(36,'InterestedIn','Restaurants',6,'Active'),(37,'InterestedIn','Dietitian',7,'Active'),(38,'InterestedIn','Kids Corner',8,'Active'),(39,'InterestedIn','Buy Sell Rent',9,'Active'),(40,'InterestedIn','Hospitals',10,'Active'),(41,'InterestedIn','Doctors',11,'Active'),(42,'InterestedIn','Yoga',12,'Active'),(43,'InterestedIn','Others',13,'Active');
/*!40000 ALTER TABLE `master_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `society_id` int(10) unsigned NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scoiety_id` (`society_id`),
  CONSTRAINT `notice_ibfk_1` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (1,1,'You all are requested to submit society maintainance charge by 10 of every month.','Active','2013-04-02 08:32:35',NULL),(2,2,'Event Celebration','Active','2013-04-02 08:32:35',NULL);
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll`
--

DROP TABLE IF EXISTS `poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `topic` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll`
--

LOCK TABLES `poll` WRITE;
/*!40000 ALTER TABLE `poll` DISABLE KEYS */;
INSERT INTO `poll` VALUES (18,'what is my name','shashank','nancy','gaurav','','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(19,'what is my name','shashank','nancy','gaurav','','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll_details`
--

DROP TABLE IF EXISTS `poll_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pollid` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `society_id` int(11) unsigned NOT NULL,
  `answer` varchar(100) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`),
  KEY `user_id` (`user_id`,`society_id`),
  KEY `society_id` (`society_id`),
  CONSTRAINT `poll_details_ibfk_1` FOREIGN KEY (`pollid`) REFERENCES `poll` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `poll_details_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `validate_user` (`id`),
  CONSTRAINT `poll_details_ibfk_3` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_details`
--

LOCK TABLES `poll_details` WRITE;
/*!40000 ALTER TABLE `poll_details` DISABLE KEYS */;
INSERT INTO `poll_details` VALUES (28,19,3,1,'shashank','','0000-00-00 00:00:00'),(29,19,4,2,'gaurav','heelo','0000-00-00 00:00:00'),(30,18,2,1,'gaurav','','0000-00-00 00:00:00'),(31,19,2,1,'shashank','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `poll_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `society`
--

DROP TABLE IF EXISTS `society`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `society` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `builder_id` int(10) unsigned NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `country_id` int(10) NOT NULL,
  `pincode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `state_id` (`state_id`),
  KEY `builder_id` (`builder_id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `society_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `society_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `society_ibfk_5` FOREIGN KEY (`builder_id`) REFERENCES `builder_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society`
--

LOCK TABLES `society` WRITE;
/*!40000 ALTER TABLE `society` DISABLE KEYS */;
INSERT INTO `society` VALUES (1,'Rose Valley',1,'sec-8, Dwarka','New Delhi',3,1,'110045','Active','2013-03-07 00:00:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(2,'Lavanya City',2,'sec-14, noida','noida',4,1,'4564656','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `society` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `society_pics`
--

DROP TABLE IF EXISTS `society_pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `society_pics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `society_id` int(10) unsigned NOT NULL,
  `file_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_size` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `termscondition` enum('Yes','No') COLLATE utf8_unicode_ci DEFAULT 'Yes',
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `society_id` (`society_id`),
  CONSTRAINT `society_pics_ibfk_2` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `society_pics`
--

LOCK TABLES `society_pics` WRITE;
/*!40000 ALTER TABLE `society_pics` DISABLE KEYS */;
INSERT INTO `society_pics` VALUES (101,1,1,'1364735754_1.jpeg','10843','image/jpeg',NULL,'Yes','Active','0000-00-00 00:00:00',NULL),(102,1,1,'1364735853_1.jpeg','10843','image/jpeg',NULL,'Yes','Active','0000-00-00 00:00:00',NULL),(103,1,1,'1364736017_2.jpg','67404','image/jpeg','dasdasdasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(104,1,1,'1364736311_2.jpg','67404','image/jpeg','dasdasdasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(105,1,1,'1364736369_2.jpg','67404','image/jpeg','dasdasdasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(106,1,1,'1364736419_2.jpg','67404','image/jpeg','dasdasdasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(107,1,1,'1364736505_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(108,1,1,'1364736636_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(109,1,1,'1364737044_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(110,1,1,'1364737077_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(111,1,1,'1364737120_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(112,1,1,'1364737300_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(113,1,1,'1364737359_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(114,1,1,'1364737386_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(115,1,1,'1364737417_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(116,1,1,'1364737482_3.jpeg','4648','image/jpeg','','Yes','Active','0000-00-00 00:00:00',NULL),(117,1,1,'1364737503_2.jpg','67404','image/jpeg','asas','Yes','Active','0000-00-00 00:00:00',NULL),(118,1,1,'1364737621_2.jpg','67404','image/jpeg','asas','Yes','Active','0000-00-00 00:00:00',NULL),(119,1,1,'1364737628_2.jpg','67404','image/jpeg','wqwqw','Yes','Active','0000-00-00 00:00:00',NULL),(120,1,1,'1364737652_2.jpg','67404','image/jpeg','wqwqw','Yes','Active','0000-00-00 00:00:00',NULL),(121,1,1,'1364737724_2.jpg','67404','image/jpeg','wqwqw','Yes','Active','0000-00-00 00:00:00',NULL),(122,1,1,'1364737729_3.jpeg','4648','image/jpeg','sadasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(123,1,1,'1364737760_3.jpeg','4648','image/jpeg','sadasdasd','Yes','Active','0000-00-00 00:00:00',NULL),(124,1,1,'1364738121_url.png','1102757','image/png','hehhehee','Yes','Active','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `society_pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (3,'Delhi','Active'),(4,'Uttar Pradesh','Active'),(5,'Haryana','Active');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tower_master`
--

DROP TABLE IF EXISTS `tower_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tower_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tower` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `block_id` (`block_id`),
  CONSTRAINT `tower_master_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `block_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tower_master`
--

LOCK TABLES `tower_master` WRITE;
/*!40000 ALTER TABLE `tower_master` DISABLE KEYS */;
INSERT INTO `tower_master` VALUES (1,'1',1,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00','2013-03-07 00:00:00'),(2,'2',2,'Active','2013-03-06 18:30:00','2013-03-07 00:00:00','2013-03-07 00:00:00');
/*!40000 ALTER TABLE `tower_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` enum('Mr.','Mrs.','Dr.','Ms.') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Mr.',
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `email_address` bigint(20) NOT NULL,
  `flat_no_id` int(10) unsigned NOT NULL,
  `tower_id` int(10) unsigned NOT NULL,
  `block_id` int(10) unsigned NOT NULL,
  `society_id` int(10) unsigned NOT NULL,
  `occupation_id` int(10) unsigned NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `blood_group` enum('O+','A+','B+','AB+','O-','A-','B-','AB-') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flat_no_id` (`flat_no_id`),
  KEY `tower_id` (`tower_id`),
  KEY `block_id` (`block_id`),
  KEY `society_id` (`society_id`),
  KEY `occupation_id` (`occupation_id`),
  KEY `email_address` (`email_address`),
  CONSTRAINT `user_profile_ibfk_10` FOREIGN KEY (`block_id`) REFERENCES `block_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_profile_ibfk_11` FOREIGN KEY (`society_id`) REFERENCES `society` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_profile_ibfk_12` FOREIGN KEY (`occupation_id`) REFERENCES `master_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_profile_ibfk_7` FOREIGN KEY (`email_address`) REFERENCES `validate_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_profile_ibfk_8` FOREIGN KEY (`flat_no_id`) REFERENCES `flat_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_profile_ibfk_9` FOREIGN KEY (`tower_id`) REFERENCES `tower_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,'Ms.','Nancy','Mehta','Female',1,1,1,1,1,8,2147483647,1154541564,'1989-03-05','B+','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'Mr.','gaurav','Suman','Male',2,2,1,1,1,8,1201515454,2147483647,'1989-08-24','B+','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'Mr.','shashank','verma','Male',3,3,1,1,1,8,789784564,112454315,'1990-01-13','O+','Active','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'Mr.','Rahul','Ramachandran','Male',4,2,1,3,2,7,2147483647,2147483647,'1984-03-12','A-','Inactive','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,'Mr.','Chetan','Bhagat','Male',5,2,2,1,2,7,124678523,2147483647,'1981-03-08','A+','Inactive','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Employee'),(2,'RWA'),(3,'Residents');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validate_user`
--

DROP TABLE IF EXISTS `validate_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validate_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_type` int(10) NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type` (`user_type`),
  CONSTRAINT `validate_user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validate_user`
--

LOCK TABLES `validate_user` WRITE;
/*!40000 ALTER TABLE `validate_user` DISABLE KEYS */;
INSERT INTO `validate_user` VALUES (1,2,'nancy.mehta@osscube.com','12345',1,NULL,'2013-03-29 18:54:39',NULL,NULL),(2,3,'gaurav.suman@osscube.com','827ccb0eea8a706c4c34a16891f84e7b',1,NULL,'2013-03-29 18:54:39',NULL,NULL),(3,2,'shashank.verma@osscube.com','827ccb0eea8a706c4c34a16891f84e7b',1,NULL,'2013-03-29 18:54:39',NULL,NULL),(4,3,'abc@gmail.com','123',0,NULL,'2013-03-29 18:54:39',NULL,NULL),(5,2,'xyz@gmail.com','1234',0,NULL,'2013-03-29 18:54:39',NULL,NULL);
/*!40000 ALTER TABLE `validate_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-06 17:05:24
