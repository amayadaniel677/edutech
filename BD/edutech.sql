-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: edutech
-- ------------------------------------------------------
-- Server version	8.3.0

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
  `status` set('active','inactive') DEFAULT 'active',
  `price` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (15,'Ciencias Naturales','active',0),(16,'Matematicas','active',0),(17,'Ciencias Sociales','active',0),(18,'Humanidades','active',0);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attendance_date` date NOT NULL,
  `units_attended` int NOT NULL,
  `remaining_units_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendances_remaining_units1_idx` (`remaining_units_id`),
  CONSTRAINT `fk_attendances_remaining_units1` FOREIGN KEY (`remaining_units_id`) REFERENCES `remaining_units` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `balance_detail`
--

DROP TABLE IF EXISTS `balance_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balance_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amound_paid` int NOT NULL,
  `balances_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_balance_detail_balances1_idx` (`balances_id`),
  CONSTRAINT `fk_balance_detail_balances1` FOREIGN KEY (`balances_id`) REFERENCES `balances` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
  `total_paid` int DEFAULT '0',
  `last_payment` date DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `sales_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_balances_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_balances_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances`
--

LOCK TABLES `balances` WRITE;
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
INSERT INTO `balances` VALUES (3,20000,'2024-06-02','active',145),(4,50000,'2024-06-02','active',146);
/*!40000 ALTER TABLE `balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_order`
--

DROP TABLE IF EXISTS `detail_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_order` (
  `id` int NOT NULL,
  `price` int NOT NULL,
  `hours` int NOT NULL,
  `order_id` int NOT NULL,
  `subjects_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  `detail_ordercol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_order_order1_idx` (`order_id`),
  KEY `fk_detail_order_subjects1_idx` (`subjects_id`),
  CONSTRAINT `fk_detail_order_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `fk_detail_order_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_order`
--

LOCK TABLES `detail_order` WRITE;
/*!40000 ALTER TABLE `detail_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_report`
--

DROP TABLE IF EXISTS `financial_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financial_report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `earnings` int NOT NULL,
  `date` datetime NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_report`
--

LOCK TABLES `financial_report` WRITE;
/*!40000 ALTER TABLE `financial_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_report_has_sales`
--

DROP TABLE IF EXISTS `financial_report_has_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financial_report_has_sales` (
  `sales_id` int NOT NULL,
  `financial_report_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  KEY `fk_financial_report_has_sales_sales1_idx` (`sales_id`),
  KEY `fk_financial_report_has_sales_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_financial_report_has_sales_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`),
  CONSTRAINT `fk_financial_report_has_sales_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_report_has_sales`
--

LOCK TABLES `financial_report_has_sales` WRITE;
/*!40000 ALTER TABLE `financial_report_has_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_report_has_sales` ENABLE KEYS */;
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
  `price_teacher` int NOT NULL,
  `price_class_student` int NOT NULL,
  `status` set('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalities`
--

LOCK TABLES `modalities` WRITE;
/*!40000 ALTER TABLE `modalities` DISABLE KEYS */;
INSERT INTO `modalities` VALUES (1,'presencial',11000,11000,20000,'active'),(2,'telepresencial',9000,15000,21000,'active'),(3,'virtual',8000,10000,22000,'active'),(4,'domicilio',20000,12000,15000,'active');
/*!40000 ALTER TABLE `modalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `date` datetime NOT NULL,
  `people_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_order_people1_idx` (`people_id`),
  CONSTRAINT `fk_order_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_sale`
--

DROP TABLE IF EXISTS `package_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_sale` (
  `packages_id` int NOT NULL,
  `sales_id` int NOT NULL,
  KEY `fk_package_sale_packages1_idx` (`packages_id`),
  KEY `fk_package_sale_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_package_sale_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `fk_package_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_sale`
--

LOCK TABLES `package_sale` WRITE;
/*!40000 ALTER TABLE `package_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `package_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total_hours` int NOT NULL,
  `price_hour` int NOT NULL,
  `total_price` int NOT NULL,
  `payments_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_payment_history_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_payment_history_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
INSERT INTO `payment_history` VALUES (21,'2024-06-02',10,10000,100000,7,'active');
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
  `last_pay` date DEFAULT NULL,
  `people_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_payments_people1_idx` (`people_id`),
  CONSTRAINT `fk_payments_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (7,30,'2024-06-02',76,'active'),(8,50,NULL,73,'active');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_has_financial_report`
--

DROP TABLE IF EXISTS `payments_has_financial_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments_has_financial_report` (
  `payments_id` int NOT NULL,
  `financial_report_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  KEY `fk_payments_has_financial_report_payments1_idx` (`payments_id`),
  KEY `fk_payments_has_financial_report_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_payments_has_financial_report_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`),
  CONSTRAINT `fk_payments_has_financial_report_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_has_financial_report`
--

LOCK TABLES `payments_has_financial_report` WRITE;
/*!40000 ALTER TABLE `payments_has_financial_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_has_financial_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_students`
--

DROP TABLE IF EXISTS `payments_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments_students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `paid_amount` int NOT NULL,
  `sales_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payments_students_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_payments_students_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_students`
--

LOCK TABLES `payments_students` WRITE;
/*!40000 ALTER TABLE `payments_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_students` ENABLE KEYS */;
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
  `address` varchar(100) DEFAULT NULL,
  `sex` set('M','F') DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dni_type` set('CC','TI','CE','RC','NA') NOT NULL,
  `dni` varchar(18) NOT NULL,
  `rol` set('administrador','docente','estudiante','superadmin') NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` set('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (2,'111','ssss','1900-01-01','#eadadwwd -15','M','fasdfqsdss@gmail','Pedro','Barrera','CC','123456789','administrador','$2y$10$o1sn9O9dsaRCN8Hy18bNtuuI2NmRjUpesR7mkM0UC.GYBo5kZ0fsy','resource/img/photosUsers/defaultPhoto.jpg','active'),(14,'312346700777','sogamoso','1900-01-01','carrera 14 1b-113','M','juan@gmali.com','Juan Carlos','Quintero Barrera','CC','1234567890','administrador','$2y$10$zFvsqWeu7JclQ0Uu6fFGp.dn5BuXuaK1rJ6htMwFmz/wDalajtk9K','resource/img/photosUsers/1234567890_caballo.jpg','active'),(15,'3123467007','sogamoso','1900-01-01','carrera 14 1b','M','amayadaniel677@gmail.com','Daniel','Amaya','CC','1006416081','administrador','$2y$10$yQGjf0u6cyEy8XRBHMAlruXiCl3iPmwXUnEH/YFQty1MOolLc3R3a','resource/img/photosUsers/1006416018_IMG-20231125-WA0074.jpg','active'),(70,'3123467007','sogamoso','2004-06-22','secreta','M','daamaya@unal.edu.co','Super','Administrador','CC','1234567891','superadmin','$2y$10$2VtbEeTOAK9QFirL8jWE2uxthaji361r97aZO8tq7OiTvZ7ohE7Sm','resource/img/photosUsers/defaultPhoto.png','active'),(72,'3101234567','bogota','1994-03-04','10-10a-cr20','M','juan.rodriguez@example.com','Juan Sebastian','Rodriguez Perez','CC','1012345678','estudiante','NA','resource/img/photosUsers/1012345678_personaje2.jpg','active'),(73,'3112345678','medellin','2000-11-22','12-11-cr20','F','maria.lopez@example.com','Maria Fernanda','Lopez Garcia','CC','1023456789','docente','NA','resource/img/photosUsers/1023456789_personaje5.jpg','active'),(74,'3123456789','sogamoso','2003-10-17','8-11-cr11','M','luis.martinez@example.com','Luis Alberto','Martinez Torres','CC','1034567890','estudiante','NA','resource/img/photosUsers/1034567890_personaje3.jpg','inactive'),(75,'3134567890','duitama','1979-03-03','02-3a-cr9','M','catalina.gomez@example.com','Catalina','Gomez Ramirez','CC','1045678901','estudiante','NA','resource/img/photosUsers/1045678901_personaje6.jpg','active'),(76,'3145678901','duitama','1980-12-03','12-4-cra20','M','andres.castro@example.com','Andres Felipe','Castro Vargas','CC','1056789012','docente','NA','resource/img/photosUsers/1056789012_personaje1.jpg','active');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people_area`
--

DROP TABLE IF EXISTS `people_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people_area` (
  `areas_id` int NOT NULL,
  `people_id` int NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
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
INSERT INTO `people_area` VALUES (16,73,49,'active'),(15,76,50,'active');
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remaining_units`
--

LOCK TABLES `remaining_units` WRITE;
/*!40000 ALTER TABLE `remaining_units` DISABLE KEYS */;
INSERT INTO `remaining_units` VALUES (38,40,0),(39,8,0);
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
  `value_paid` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_people1_idx` (`people_id`),
  CONSTRAINT `fk_sales_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (145,440000,'2024-06-02 17:01:32',75,'active',0,20000),(146,156000,'2024-06-02 17:02:44',75,'active',20000,50000);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_package`
--

DROP TABLE IF EXISTS `subject_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_package` (
  `subjects_id` int NOT NULL,
  `packages_id` int NOT NULL,
  KEY `fk_subjects_has_packages_subjects1_idx` (`subjects_id`),
  KEY `fk_subjects_has_packages_packages1_idx` (`packages_id`),
  CONSTRAINT `fk_subjects_has_packages_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `fk_subjects_has_packages_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_package`
--

LOCK TABLES `subject_package` WRITE;
/*!40000 ALTER TABLE `subject_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_package` ENABLE KEYS */;
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
  `total_quantity` int DEFAULT '0',
  `subjects_id` int NOT NULL,
  `sales_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  `quantity_type` set('horas','clases') DEFAULT NULL,
  `modality` enum('presencial','telepresencial','virtual','domicilio','ninguna') DEFAULT 'ninguna',
  `remaining_units_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_sale_subjects1_idx` (`subjects_id`),
  KEY `fk_subject_sale_sales1_idx` (`sales_id`),
  KEY `fk_subject_sale_remaining_units1_idx` (`remaining_units_id`),
  CONSTRAINT `fk_subject_sale_remaining_units1` FOREIGN KEY (`remaining_units_id`) REFERENCES `remaining_units` (`id`),
  CONSTRAINT `fk_subject_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `fk_subject_sale_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_sale`
--

LOCK TABLES `subject_sale` WRITE;
/*!40000 ALTER TABLE `subject_sale` DISABLE KEYS */;
INSERT INTO `subject_sale` VALUES (185,440000,40,34,145,'active','horas','presencial',38),(186,176000,8,30,146,'active','clases','virtual',39);
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
  `status` set('active','inactive') DEFAULT 'active',
  `photo` varchar(255) NOT NULL DEFAULT 'resource/img/photosSubjects/defaultPhoto.jpg',
  `topics` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_areas1_idx` (`areas_id`),
  CONSTRAINT `fk_subjects_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (26,'Biología General','Introducción a los conceptos básicos de la biología, desde la estructura celular hasta la ecología.\r\n',15,'active','resource/img/photosSubjects/Biología_General_biologia_general.jpg','La célula y sus componentes,Genética y herencia, Evolución y biodiversidad, Ecología y medio ambiente, Métodos científicos en biología'),(27,'Química Básica','Estudio de los fundamentos de la química, incluyendo la estructura atómica y las reacciones químicas',15,'active','resource/img/photosSubjects/Química_Básica_quimica-basica.png','Estructura de la materia, Tabla periódica de los elementos, Enlaces químicos, Enlaces químicos,  Estequiometría, Ácidos, bases y pH'),(28,'Álgebra','Conceptos fundamentales del álgebra, incluyendo operaciones y ecuaciones.',16,'inactive','resource/img/photosSubjects/Álgebra_basico-em-algebra.jpg','Operaciones con números reales, Expresiones algebraicas, Ecuaciones y desigualdades, Funciones y gráficos, Polinomios y factorización, Sistemas de ecuaciones\r\nPolinomios y factorización, '),(29,'Geometría','Estudio de las propiedades y relaciones de puntos, líneas, superficies y sólidos.',16,'active','resource/img/photosSubjects/Geometría_geometria2.jpg','Fundamentos de geometría, Triángulos y congruencia, Teoremas de semejanza, Cuadriláteros y polígonos, Círculos y áreas, Volúmenes y superficies'),(30,'Historia Mundial','Recorrido por los eventos y civilizaciones más importantes de la historia mundial.',17,'active','resource/img/photosSubjects/Historia_Mundial_Curiosidades-de-historia-1920.jpg','Civilizaciones antiguas, Edad Media y Renacimiento, Revoluciones y cambios políticos, Guerras mundiales, Historia contemporánea, Movimientos sociales y culturales'),(31,'Geografía','Exploración de la geografía física y humana del planeta.',17,'active','resource/img/photosSubjects/Geografía_geografiajpg.jpg','Mapas y cartografía, Climas y biomas, Recursos naturales, Población y migración, Geografía económica, Problemas ambientales'),(32,'Literatura Universal','Estudio de obras literarias significativas de diferentes épocas y culturas',18,'active','resource/img/photosSubjects/Literatura_Universal_literatura.jpg','Literatura clásica, Literatura medieval y renacentista, Literatura moderna, Análisis de poesía, drama y narrativa, Autores y movimientos literarios, Crítica literaria'),(33,'Gramática','Desarrollo de habilidades gramaticales y de redacción.',18,'active','resource/img/photosSubjects/Gramática_gramatica.jpg','Partes de la oración, Concordancia y estructura de oraciones, Tiempos verbales, Redacción de ensayos y párrafos, Técnicas de revisión y edición, Estilo y coherencia en la escritura'),(34,'Álgebra Lineal','Este curso se centra en el estudio de vectores, matrices y transformaciones lineales. Es fundamental para muchas áreas de las matemáticas y las ciencias aplicadas.',16,'active','resource/img/photosSubjects/Álgebra_Lineal_miniatura15.png','Vectores y espacios vectoriales, Determinantes, Valores y vectores propios, Transformaciones lineales, Aplicaciones de álgebra lineal'),(35,'Ecuaciones Diferenciales','Este curso trata sobre la teoría y las aplicaciones de las ecuaciones diferenciales ordinarias, las cuales son esenciales en la modelación de fenómenos físicos y biológicos.',16,'active','resource/img/photosSubjects/Ecuaciones_Diferenciales_1n8Rv2eEVR0.png','Ecuaciones diferenciales de primer orden, Ecuaciones diferenciales de segundo orden y superiores, Series de Fourier, Transformada de Laplace, Sistemas de ecuaciones diferenciales'),(36,'Estadística Y Probabilidad','Este curso introduce los conceptos fundamentales de la estadística y la teoría de probabilidades, con aplicaciones en diversos campos como las ciencias sociales, la ingeniería y la biología.',16,'active','resource/img/photosSubjects/Estadística_Y_Probabilidad_Estadistica-y-Probabilidad-Rberny-2016-1.jpg','Conceptos básicos de probabilidad, Variables aleatorias y distribuciones de probabilidad, Teorema central del límite, Inferencia estadística');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trolley`
--

DROP TABLE IF EXISTS `trolley`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trolley` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `hours` int NOT NULL,
  `people_id` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subjects_id` int NOT NULL,
  `name_subject` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trolley_subjects1_idx` (`subjects_id`),
  CONSTRAINT `fk_trolley_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trolley`
--

LOCK TABLES `trolley` WRITE;
/*!40000 ALTER TABLE `trolley` DISABLE KEYS */;
/*!40000 ALTER TABLE `trolley` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutorships`
--

DROP TABLE IF EXISTS `tutorships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutorships` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `groups_id` int NOT NULL,
  `payments_id` int NOT NULL,
  `status` set('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `fk_tutorships_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_tutorships_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutorships`
--

LOCK TABLES `tutorships` WRITE;
/*!40000 ALTER TABLE `tutorships` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutorships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-03  8:05:03
