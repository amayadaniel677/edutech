-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: edutech
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  `price` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balance_detail`
--

DROP TABLE IF EXISTS `balance_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balance_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `amound_paid` int NOT NULL,
  `balances_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_balance_detail_balances1_idx` (`balances_id`),
  CONSTRAINT `fk_balance_detail_balances1` FOREIGN KEY (`balances_id`) REFERENCES `balances` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balance_detail`
--

LOCK TABLES `balance_detail` WRITE;
/*!40000 ALTER TABLE `balance_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `balance_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balances`
--

DROP TABLE IF EXISTS `balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_paid` int NOT NULL DEFAULT '0',
  `last_payment` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sales_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_balances_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_balances_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances`
--

LOCK TABLES `balances` WRITE;
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalities`
--

DROP TABLE IF EXISTS `modalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modalities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price_hour_student` int NOT NULL,
  `price_class_student` int NOT NULL,
  `status` set('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalities`
--

LOCK TABLES `modalities` WRITE;
/*!40000 ALTER TABLE `modalities` DISABLE KEYS */;
INSERT INTO `modalities` VALUES (1,'presencial',11000,20000,'active'),(2,'telepresencial',9000,21000,'active'),(3,'virtual',8000,22000,'active'),(4,'domicilio',20000,15000,'active');
/*!40000 ALTER TABLE `modalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `total_hours` int NOT NULL,
  `price_hour` int NOT NULL,
  `total_price` int NOT NULL,
  `payments_id` int NOT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_payment_history_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_payment_history_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_hours` int NOT NULL,
  `last_pay` datetime DEFAULT NULL,
  `people_id` int NOT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_payments_people1_idx` (`people_id`),
  CONSTRAINT `fk_payments_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,0,'1900-01-01 00:00:00',9,'active'),(2,0,'2024-06-02 00:00:00',3,'active'),(3,28,'2024-06-02 09:53:38',13,'active'),(4,0,'1900-01-01 00:00:00',45,'active'),(5,0,'1900-01-01 00:00:00',12,'active'),(6,17,'2024-05-17 00:00:00',40,'active');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(30) NOT NULL,
  `city` varchar(45) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `sex` set('M','F') DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dni_type` set('CC','TI','CE','RC','NA') DEFAULT 'NA',
  `dni` varchar(18) NOT NULL,
  `rol` set('administrador','docente','estudiante','superadmin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'resourceimgphotosUsersdefaultPhoto.png',
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (73,'0000000000','sogamoso','2024-01-01','cra 14 #17-42','M','kepler@gmail.com','Super','Admin','CC','0000000000','superadmin','$2y$10$ew3KHbTSOs.aBMlETeN9Se8/OJu0SB2tzglbQOKdDSPUDSEhsgs3a','resource/img/photosUsers/0000000000__1ce8749f-58d1-41b5-a584-08e564ece7ec.jpg','active');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people_area`
--

DROP TABLE IF EXISTS `people_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people_area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `areas_id` int NOT NULL,
  `people_id` int NOT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_people_area_areas1_idx` (`areas_id`),
  KEY `fk_people_area_people1_idx` (`people_id`),
  CONSTRAINT `fk_people_area_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `fk_people_area_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_area`
--

LOCK TABLES `people_area` WRITE;
/*!40000 ALTER TABLE `people_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `people_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recovery_tokens`
--

DROP TABLE IF EXISTS `recovery_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recovery_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(32) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recovery_tokens`
--

LOCK TABLES `recovery_tokens` WRITE;
/*!40000 ALTER TABLE `recovery_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `recovery_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remaining_units`
--

DROP TABLE IF EXISTS `remaining_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `remaining_units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_units` int NOT NULL,
  `attended_units` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remaining_units`
--

LOCK TABLES `remaining_units` WRITE;
/*!40000 ALTER TABLE `remaining_units` DISABLE KEYS */;
/*!40000 ALTER TABLE `remaining_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `date` datetime NOT NULL,
  `people_id` int NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `discount` int NOT NULL,
  `value_paid` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_people1_idx` (`people_id`),
  CONSTRAINT `fk_sales_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_sale`
--

DROP TABLE IF EXISTS `subject_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `total_quantity` int NOT NULL DEFAULT '0',
  `subjects_id` int NOT NULL,
  `sales_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  `quantity_type` set('horas','clases') NOT NULL,
  `modality` enum('presencial','telepresencial','virtual','domicilio','ninguna') NOT NULL DEFAULT 'ninguna',
  `remaining_units_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_sale_subjects1_idx` (`subjects_id`),
  KEY `fk_subject_sale_sales1_idx` (`sales_id`),
  KEY `fk_subject_sale_remaining_units1_idx` (`remaining_units_id`),
  CONSTRAINT `fk_subject_sale_remaining_units1` FOREIGN KEY (`remaining_units_id`) REFERENCES `remaining_units` (`id`),
  CONSTRAINT `fk_subject_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `fk_subject_sale_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_sale`
--

LOCK TABLES `subject_sale` WRITE;
/*!40000 ALTER TABLE `subject_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `areas_id` int NOT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  `photo` varchar(255) NOT NULL DEFAULT 'resource/img/photosSubjects/defaultPhoto.jpg',
  `topics` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_areas1_idx` (`areas_id`),
  CONSTRAINT `fk_subjects_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-03  8:33:20
