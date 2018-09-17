- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Current Database: `homestead`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `homestead` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */;

USE `homestead`;

--
-- Table structure for table `admin_menu`
--

DROP TABLE IF EXISTS `admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'Index','fa-bar-chart','/',NULL,NULL),(2,0,2,'Admin','fa-tasks','',NULL,NULL),(3,2,3,'Users','fa-users','auth/users',NULL,NULL),(4,2,4,'Roles','fa-user','auth/roles',NULL,NULL),(5,2,5,'Permission','fa-ban','auth/permissions',NULL,NULL),(6,2,6,'Menu','fa-bars','auth/menu',NULL,NULL),(7,2,7,'Operation log','fa-history','auth/logs',NULL,NULL);
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_operation_log`
--

DROP TABLE IF EXISTS `admin_operation_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_operation_log`
--

LOCK TABLES `admin_operation_log` WRITE;
/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
INSERT INTO `admin_operation_log` VALUES (1,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:05:49','2018-09-13 06:05:49'),(2,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:05:57','2018-09-13 06:05:57'),(3,1,'admin/auth/users','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:06:00','2018-09-13 06:06:00'),(4,1,'admin/auth/roles','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:06:02','2018-09-13 06:06:02'),(5,1,'admin/auth/permissions','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:06:03','2018-09-13 06:06:03'),(6,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:13:31','2018-09-13 06:13:31'),(7,1,'admin/auth/users','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:13:34','2018-09-13 06:13:34'),(8,1,'admin/auth/users','GET','192.168.10.1','[]','2018-09-13 06:13:38','2018-09-13 06:13:38'),(9,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:13:41','2018-09-13 06:13:41'),(10,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:13:43','2018-09-13 06:13:43'),(11,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:13:51','2018-09-13 06:13:51'),(12,1,'admin/auth/menu','GET','192.168.10.1','[]','2018-09-13 06:17:20','2018-09-13 06:17:20'),(13,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:17:27','2018-09-13 06:17:27'),(14,1,'admin/auth/users','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:17:52','2018-09-13 06:17:52'),(15,1,'admin/auth/users/1/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:17:55','2018-09-13 06:17:55'),(16,1,'admin/auth/users','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:17:58','2018-09-13 06:17:58'),(17,1,'admin/auth/roles','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:00','2018-09-13 06:18:00'),(18,1,'admin/auth/permissions','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:02','2018-09-13 06:18:02'),(19,1,'admin/auth/permissions/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:05','2018-09-13 06:18:05'),(20,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:18','2018-09-13 06:18:18'),(21,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:31','2018-09-13 06:18:31'),(22,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:36','2018-09-13 06:18:36'),(23,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:44','2018-09-13 06:18:44'),(24,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:52','2018-09-13 06:18:52'),(25,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:56','2018-09-13 06:18:56'),(26,1,'admin/auth/menu/1/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:18:59','2018-09-13 06:18:59'),(27,1,'admin/auth/menu','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:19:02','2018-09-13 06:19:02'),(28,1,'admin/auth/menu','GET','192.168.10.1','[]','2018-09-13 06:20:18','2018-09-13 06:20:18'),(29,1,'admin/auth/menu','GET','192.168.10.1','[]','2018-09-13 06:20:21','2018-09-13 06:20:21'),(30,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:20:22','2018-09-13 06:20:22'),(31,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:20:30','2018-09-13 06:20:30'),(32,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:20:49','2018-09-13 06:20:49'),(33,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:22:53','2018-09-13 06:22:53'),(34,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:24:46','2018-09-13 06:24:46'),(35,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:24:56','2018-09-13 06:24:56'),(36,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:25:35','2018-09-13 06:25:35'),(37,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:25:38','2018-09-13 06:25:38'),(38,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:26:22','2018-09-13 06:26:22'),(39,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:28:32','2018-09-13 06:28:32'),(40,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:29:03','2018-09-13 06:29:03'),(41,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:31:48','2018-09-13 06:31:48'),(42,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:31:57','2018-09-13 06:31:57'),(43,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:32:06','2018-09-13 06:32:06'),(44,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:32:27','2018-09-13 06:32:27'),(45,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:32:30','2018-09-13 06:32:30'),(46,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:35:16','2018-09-13 06:35:16'),(47,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:35:19','2018-09-13 06:35:19'),(48,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:36:40','2018-09-13 06:36:40'),(49,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:43:42','2018-09-13 06:43:42'),(50,1,'admin','GET','192.168.10.1','[]','2018-09-13 06:44:08','2018-09-13 06:44:08'),(51,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:44:12','2018-09-13 06:44:12'),(52,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 06:44:14','2018-09-13 06:44:14'),(53,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 06:44:29','2018-09-13 06:44:29'),(54,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 06:55:57','2018-09-13 06:55:57'),(55,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 06:56:26','2018-09-13 06:56:26'),(56,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 06:56:35','2018-09-13 06:56:35'),(57,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 06:56:43','2018-09-13 06:56:43'),(58,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:05:46','2018-09-13 07:05:46'),(59,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:05:48','2018-09-13 07:05:48'),(60,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:05:57','2018-09-13 07:05:57'),(61,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:06:01','2018-09-13 07:06:01'),(62,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:06:11','2018-09-13 07:06:11'),(63,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:06:24','2018-09-13 07:06:24'),(64,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:07:45','2018-09-13 07:07:45'),(65,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:08:17','2018-09-13 07:08:17'),(66,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:08:22','2018-09-13 07:08:22'),(67,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:21:40','2018-09-13 07:21:40'),(68,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:24:36','2018-09-13 07:24:36'),(69,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:24:56','2018-09-13 07:24:56'),(70,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:25:23','2018-09-13 07:25:23'),(71,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:25:26','2018-09-13 07:25:26'),(72,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:26:16','2018-09-13 07:26:16'),(73,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:26:19','2018-09-13 07:26:19'),(74,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:41:10','2018-09-13 07:41:10'),(75,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:41:23','2018-09-13 07:41:23'),(76,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:42:42','2018-09-13 07:42:42'),(77,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:45:03','2018-09-13 07:45:03'),(78,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:48:41','2018-09-13 07:48:41'),(79,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:48:44','2018-09-13 07:48:44'),(80,1,'admin','GET','192.168.10.1','[]','2018-09-13 07:48:50','2018-09-13 07:48:50'),(81,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:48:59','2018-09-13 07:48:59'),(82,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 07:50:59','2018-09-13 07:50:59'),(83,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:51:02','2018-09-13 07:51:02'),(84,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 07:51:07','2018-09-13 07:51:07'),(85,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:00:27','2018-09-13 08:00:27'),(86,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:09:54','2018-09-13 08:09:54'),(87,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:16:06','2018-09-13 08:16:06'),(88,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:26:33','2018-09-13 08:26:33'),(89,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:27:16','2018-09-13 08:27:16'),(90,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:28:18','2018-09-13 08:28:18'),(91,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 08:28:26','2018-09-13 08:28:26'),(92,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 08:28:35','2018-09-13 08:28:35'),(93,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 08:28:56','2018-09-13 08:28:56'),(94,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"_pjax\":\"#pjax-container\"}','2018-09-13 08:29:00','2018-09-13 08:29:00'),(95,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:29:02','2018-09-13 08:29:02'),(96,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"_pjax\":\"#pjax-container\"}','2018-09-13 08:29:31','2018-09-13 08:29:31'),(97,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:31:16','2018-09-13 08:31:16'),(98,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:47:38','2018-09-13 08:47:38'),(99,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:47:46','2018-09-13 08:47:46'),(100,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:48:05','2018-09-13 08:48:05'),(101,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:48:48','2018-09-13 08:48:48'),(102,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"}}','2018-09-13 08:51:10','2018-09-13 08:51:10'),(103,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"page\":\"3\",\"_pjax\":\"#pjax-container\"}','2018-09-13 08:51:14','2018-09-13 08:51:14'),(104,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"_pjax\":\"#pjax-container\",\"page\":\"1\"}','2018-09-13 08:51:17','2018-09-13 08:51:17'),(105,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"_pjax\":\"#pjax-container\",\"page\":\"1\",\"per_page\":\"50\"}','2018-09-13 08:51:19','2018-09-13 08:51:19'),(106,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"page\":\"1\",\"per_page\":\"50\"}','2018-09-13 08:52:29','2018-09-13 08:52:29'),(107,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"page\":\"1\",\"per_page\":\"50\"}','2018-09-13 08:54:52','2018-09-13 08:54:52'),(108,1,'admin/news','GET','192.168.10.1','{\"_sort\":{\"column\":\"id\",\"type\":\"desc\"},\"page\":\"1\",\"per_page\":\"50\"}','2018-09-13 08:55:16','2018-09-13 08:55:16'),(109,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 08:59:05','2018-09-13 08:59:05'),(110,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 08:59:41','2018-09-13 08:59:41'),(111,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:01:43','2018-09-13 09:01:43'),(112,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:04:05','2018-09-13 09:04:05'),(113,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:04:08','2018-09-13 09:04:08'),(114,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:04:16','2018-09-13 09:04:16'),(115,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:04:36','2018-09-13 09:04:36'),(116,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:06:04','2018-09-13 09:06:04'),(117,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:06:37','2018-09-13 09:06:37'),(118,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:06:39','2018-09-13 09:06:39'),(119,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:08:06','2018-09-13 09:08:06'),(120,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:08:09','2018-09-13 09:08:09'),(121,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:08:12','2018-09-13 09:08:12'),(122,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:08:31','2018-09-13 09:08:31'),(123,1,'admin/news/create','POST','192.168.10.1','{\"title\":null,\"director\":null,\"describe\":null,\"rate\":\"0\",\"released\":\"off\",\"_token\":\"d3UvFG9Rx4o9eHU1fiKziri2AzcGSpwvcdp45l0v\"}','2018-09-13 09:08:35','2018-09-13 09:08:35'),(124,1,'admin/news/create','POST','192.168.10.1','{\"title\":null,\"director\":null,\"describe\":null,\"rate\":\"0\",\"released\":\"off\",\"_token\":\"d3UvFG9Rx4o9eHU1fiKziri2AzcGSpwvcdp45l0v\"}','2018-09-13 09:08:39','2018-09-13 09:08:39'),(125,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:09:52','2018-09-13 09:09:52'),(126,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:11:04','2018-09-13 09:11:04'),(127,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:11:08','2018-09-13 09:11:08'),(128,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:11:10','2018-09-13 09:11:10'),(129,1,'admin/auth/logout','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:12:44','2018-09-13 09:12:44'),(130,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:12:54','2018-09-13 09:12:54'),(131,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:12:59','2018-09-13 09:12:59'),(132,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:13:02','2018-09-13 09:13:02'),(133,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:14:10','2018-09-13 09:14:10'),(134,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:14:12','2018-09-13 09:14:12'),(135,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:15:38','2018-09-13 09:15:38'),(136,1,'admin','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:15:41','2018-09-13 09:15:41'),(137,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:16:13','2018-09-13 09:16:13'),(138,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:16:15','2018-09-13 09:16:15'),(139,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:16:16','2018-09-13 09:16:16'),(140,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:16:49','2018-09-13 09:16:49'),(141,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:17:13','2018-09-13 09:17:13'),(142,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:18:33','2018-09-13 09:18:33'),(143,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:20:44','2018-09-13 09:20:44'),(144,1,'admin/news/1/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:20:45','2018-09-13 09:20:45'),(145,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:20:57','2018-09-13 09:20:57'),(146,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:21:01','2018-09-13 09:21:01'),(147,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:25:27','2018-09-13 09:25:27'),(148,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:25:43','2018-09-13 09:25:43'),(149,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:25:52','2018-09-13 09:25:52'),(150,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:26:13','2018-09-13 09:26:13'),(151,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:29:20','2018-09-13 09:29:20'),(152,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:29:42','2018-09-13 09:29:42'),(153,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:29:57','2018-09-13 09:29:57'),(154,1,'admin','GET','192.168.10.1','[]','2018-09-13 09:30:32','2018-09-13 09:30:32'),(155,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:30:33','2018-09-13 09:30:33'),(156,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:30:35','2018-09-13 09:30:35'),(157,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:30:44','2018-09-13 09:30:44'),(158,1,'admin/news/1/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:30:46','2018-09-13 09:30:46'),(159,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:32:00','2018-09-13 09:32:00'),(160,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:32:12','2018-09-13 09:32:12'),(161,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:33:14','2018-09-13 09:33:14'),(162,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:35:22','2018-09-13 09:35:22'),(163,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:37:11','2018-09-13 09:37:11'),(164,1,'admin/news/1/edit','GET','192.168.10.1','[]','2018-09-13 09:39:07','2018-09-13 09:39:07'),(165,1,'admin/news/create','POST','192.168.10.1','{\"title\":\"Assunta King\",\"director\":null,\"describe\":\"Dr.\",\"rate\":\"0\",\"released\":\"on\",\"_token\":\"ETozimrQzjQ6vPLk8G1xkbL0wVRcB6ORkqbxJoUB\"}','2018-09-13 09:39:21','2018-09-13 09:39:21'),(166,1,'admin/news/create','POST','192.168.10.1','{\"title\":null,\"director\":null,\"describe\":null,\"rate\":\"0\",\"released\":\"off\",\"_token\":\"ETozimrQzjQ6vPLk8G1xkbL0wVRcB6ORkqbxJoUB\",\"_previous_\":\"http:\\/\\/www.qiruitest.com\\/admin\\/news\\/1\\/edit\"}','2018-09-13 09:39:29','2018-09-13 09:39:29'),(167,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:39:51','2018-09-13 09:39:51'),(168,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:40:08','2018-09-13 09:40:08'),(169,1,'admin/news/1/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:40:11','2018-09-13 09:40:11'),(170,1,'admin/news/create','POST','192.168.10.1','{\"title\":\"Assunta King\",\"director\":null,\"describe\":\"Dr.\",\"rate\":\"0\",\"released\":\"off\",\"_token\":\"ETozimrQzjQ6vPLk8G1xkbL0wVRcB6ORkqbxJoUB\"}','2018-09-13 09:40:13','2018-09-13 09:40:13'),(171,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:40:28','2018-09-13 09:40:28'),(172,1,'admin/news/create','GET','192.168.10.1','[]','2018-09-13 09:42:22','2018-09-13 09:42:22'),(173,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:42:30','2018-09-13 09:42:30'),(174,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\",\"_export_\":\"page:1\"}','2018-09-13 09:42:44','2018-09-13 09:42:44'),(175,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:42:59','2018-09-13 09:42:59'),(176,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 09:43:04','2018-09-13 09:43:04'),(177,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 09:43:33','2018-09-13 09:43:33'),(178,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:06:27','2018-09-13 10:06:27'),(179,1,'admin/news/create','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:30','2018-09-13 10:06:30'),(180,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:32','2018-09-13 10:06:32'),(181,1,'admin/news/2/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:34','2018-09-13 10:06:34'),(182,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:36','2018-09-13 10:06:36'),(183,1,'admin/news/4/edit','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:40','2018-09-13 10:06:40'),(184,1,'admin/news','GET','192.168.10.1','{\"_pjax\":\"#pjax-container\"}','2018-09-13 10:06:42','2018-09-13 10:06:42'),(185,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:07:55','2018-09-13 10:07:55'),(186,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:08:25','2018-09-13 10:08:25'),(187,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:08:51','2018-09-13 10:08:51'),(188,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:09:50','2018-09-13 10:09:50'),(189,1,'admin/news','GET','192.168.10.1','[]','2018-09-13 10:10:05','2018-09-13 10:10:05'),(190,1,'admin/news','GET','192.168.10.1','{\"_export_\":\"page:1\"}','2018-09-13 10:10:29','2018-09-13 10:10:29');
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_permissions`
--

DROP TABLE IF EXISTS `admin_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_permissions`
--

DROP TABLE IF EXISTS `admin_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_users`
--

DROP TABLE IF EXISTS `admin_role_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-09-13 06:04:06','2018-09-13 06:04:06');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user_permissions`
--

DROP TABLE IF EXISTS `admin_user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$DyEHb6wZg339gZiTeskDXe7k3Ylaf8VGx1zbzGzKcsOyorFUPp6HW','Administrator',NULL,'gCvjDkD5atVUQZ7dPiwaOaURxfgkEh2eQ6ptlvNWnCMFqyQmlw92M20KGo7E','2018-09-13 06:04:06','2018-09-13 06:04:06');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型: 1 新闻, 2 产品, 3 其它',
  `title` varchar(256) NOT NULL DEFAULT '' COMMENT '标题',
  `alias` varchar(256) DEFAULT NULL DEFAULT '' COMMENT '副标题',
  `cover` varchar(256) DEFAULT NULL DEFAULT '' COMMENT '封面',
  `desc` varchar(400)  NOT NULL DEFAULT '' COMMENT '简要描述',
  `content` text NOT NULL  COMMENT '内容',
  `category_id` int(11) NOT NULL  DEFAULT '0' COMMENT '分类id',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文章状态: 0未发布，1已发布，2已下线，3已删除 ',
  `author_id` int(10) NOT NULL DEFAULT '0' COMMENT '作者id',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章内容';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT 0 COMMENT '父类id',
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '名称',
  `weight` int(10) NOT NULL DEFAULT 0 COMMENT '权重',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态，0正常;9删除; -1禁用;',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='栏目分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_04_173148_create_admin_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` int(10) unsigned NOT NULL,
  `describe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` tinyint(3) unsigned NOT NULL,
  `released` int(10) DEFAULT NULL,
  `release_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL COMMENT '标识Key',
  `pid` varchar(12) NOT NULL COMMENT '父推荐位id',
  `name` varchar(64) NOT NULL COMMENT '名称',
  `desc` varchar(256) NOT NULL COMMENT '描述',
  `cover` varchar(256) NOT NULL COMMENT '图片',
  `status` tinyint(1) NOT NULL COMMENT '状态，0正常;9删除;',
  `url` varchar(255) DEFAULT '' COMMENT 'url',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐位';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommend`
--

DROP TABLE IF EXISTS `recommend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_id` varchar(32) NOT NULL COMMENT '推荐位置',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '类型: 1 新闻, 2 产品, 3 其它',
  `itemid` int(10) NOT NULL COMMENT '对应id',
  `weight` int(10) NOT NULL COMMENT '权重',
  `title` varchar(128) NOT NULL COMMENT '标题',
  `intro` varchar(256) NOT NULL COMMENT '简介',
  `cover` varchar(256) NOT NULL COMMENT '图片',
  `target_url` varchar(256) NOT NULL COMMENT '链接',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='推荐位与资源的关联表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommend`
--

LOCK TABLES `recommend` WRITE;
/*!40000 ALTER TABLE `recommend` DISABLE KEYS */;
/*!40000 ALTER TABLE `recommend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2018-09-14  9:36:39