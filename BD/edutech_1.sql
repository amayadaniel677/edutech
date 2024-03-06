-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: edutech_1
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
  `price` int NOT NULL,
  `areascol` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'matematicas',22000,''),(2,'idiomas',15000,''),(3,'preicfes',15000,''),(4,'tati',15000,'');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `in_charge` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
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
  `student` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
  `id` int NOT NULL,
  `date` date NOT NULL,
  `total_hours` int NOT NULL,
  `price_hour` int NOT NULL,
  `total_price` int NOT NULL,
  `payments_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_history_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_payment_history_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `financial_report_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payments_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_payments_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
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
  `birthdate` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `sex` set('M','F') NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dni_type` set('CC','TI','CE','RC') NOT NULL,
  `dni` varchar(18) NOT NULL,
  `rol` set('administrador','docente','estudiante') NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'3123467006','sogamoso','2003-06-22','daniel alexander','M','amayadaniel677@gmail.com','Daniel Alexander','Amaya Acosta','CC','1006416081','administrador','$2y$10$McadeI0ofcN1H3JFCDsTkex0T18c5AvSPVTXkAq7lgX1FeP.YQvgK','resource/img/photosUsers/1006416081_IMG-20231125-WA0074.jpg'),(2,'111','ssss','1998-11-11','sss','M','fasdfqsdss@gmail','Pedro','Barrera','CC','123456789','estudiante','$2y$10$o1sn9O9dsaRCN8Hy18bNtuuI2NmRjUpesR7mkM0UC.GYBo5kZ0fsy','resource/img/photosUsers/defaultPhoto.jpg'),(3,'11111','ssss','1999-12-12','ssss','M','martingay@ggg','Martin','Nuñez','CC','12345','docente','$2y$10$wb1llnfX/CM8rpG56j2DfeHFUgzrN15EvKH9/NXQ5X03NrJpxYV8.','resource/img/fotosUsers/foto1.jpg'),(4,'3123467007','medellin','2000-06-01','secreta','M','amayadaniel677@gmail.com','Pablo','Escobar','CC','666','estudiante','$2y$10$CIut0FbRWDkrnB.wiiehRONTTzBhciVo.8c.2YtZeOjqUJlbELmOS','resource/img/photosUsers/defaultPhoto.jpg'),(5,'3122222','duitama','2000-11-11','fasdfsdfasdf','M','maluma@gmail.com','Maluma','Calvo','CC','000','estudiante','$2y$10$YkAAPNzQoDwEOqDOFM39Y.fz34CfTBzjQczcdUt6syOo3aMwmsYym','resource/img/photosUsers/defaultPhoto.jpg'),(6,'3123467007','sss','2000-11-11','ssss','M','111@fff','Añañin','Amaya','CC','111','estudiante','$2y$10$5Jzn6ryYckH7tLW2XYJy/ec9NSQRQkhwR8XD0IwbNry7Q.GzWKjvW','resource/img/photosUsers/defaultPhoto.jpg'),(7,'11','s','2000-11-11','s','M','pedro@gmail.com','A','S','CC','11111','estudiante','$2y$10$T45VP1hN88cymXYovVqnsOu0dQjpkKbrviJuFWseRjJkG4/j7xnoW','resource/img/photosUsers/defaultPhoto.jpg'),(8,'11','s','2000-11-11','s','M','pedro@gmail.com','A','S','CC','11111888','estudiante','$2y$10$S5OWkHFJXj2xkYdbH0PfGuHBYO9M3YUo.Qz0vVvi639Pe4uVhCNjC','resource/img/photosUsers/defaultPhoto.jpg'),(9,'3','ss','1190-11-11','sadfadf','M','333@gmail','Pirulo','Socrates','CC','333','estudiante','$2y$10$qTdxElh9CCc9X9HSjo9MqOq.bsMM.akd5fpsDp/04mVEsQh9cxOvq',''),(10,'222','duitama','1111-11-11','calle 2rq2r23','M','dd@gg','Sdfasdf','Sadfasdfs','CC','11','estudiante','$2y$10$9H8Z5u7xDl4ShwPU8zR.UeeQmQlvH/szXpMG63rwrMPQ05GIL/UWC','resource/img/photosUsers/11_-1_orig (2).jpeg'),(11,'22','ss','1111-11-11','222','M','aaa@ddd','Sss','Sss','CC','9','estudiante','$2y$10$ozztbdGuOfgvM/FWLYmDl.93BT.YJZcCJ9.LlIWTiGcyt9O9MUDfm','resource/img/photosUsers/9_Invitación Feliz Navidad elegante dorado negro.png'),(12,'22','s','1111-11-11','s','M','pedro@gmail.com','Pedro','Asdfasdf','CC','12','estudiante','$2y$10$oHzZQJUuTC76R6qisDqg6u1P6XsZa9itw06b5PSjXROPfwGFvTRwW','resource/img/photosUsers/12_Invitación Feliz Navidad elegante dorado negro.png'),(13,'322314566','sogamoso','2004-10-13','calle 2 #8','F','tati@gmail.com','Tatiana','Calderon','CC','1081394656','estudiante','$2y$10$vk3uEskR55w74TYS8Qki2es2FnIwHqWPlsPWO2U4KpUI9eFtsRCE.','resource/img/photosUsers/1081394656_IMG-20231127-WA0062 (1).jpg'),(14,'312346700777','sogamoso','1950-06-14','juan carlos','M','juan@gmail.com','Juan Carlos','Quintero Barrera','CC','1234567890','administrador','$2y$10$9KOhLR9kq.z42KEMOERVt.2du3lQQsJBpWz3xE9NBbhLVNu5Az3fa','resource/img/photosUsers/1234567890_IMG-20231125-WA0074.jpg');
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
  KEY `fk_people_area_areas1_idx` (`areas_id`),
  KEY `fk_people_area_people1_idx` (`people_id`),
  CONSTRAINT `fk_people_area_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `fk_people_area_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_area`
--

LOCK TABLES `people_area` WRITE;
/*!40000 ALTER TABLE `people_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `people_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people_group`
--

DROP TABLE IF EXISTS `people_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people_group` (
  `people_id` int NOT NULL,
  `groups_id` int NOT NULL,
  KEY `fk_people_group_people1_idx` (`people_id`),
  KEY `fk_people_group_groups1_idx` (`groups_id`),
  CONSTRAINT `fk_people_group_groups1` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `fk_people_group_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_group`
--

LOCK TABLES `people_group` WRITE;
/*!40000 ALTER TABLE `people_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `people_group` ENABLE KEYS */;
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
  `student` varchar(45) NOT NULL,
  `financial_report_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_sales_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
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
  `id` int NOT NULL,
  `price` int NOT NULL,
  `total_hours` int NOT NULL,
  `subjects_id` int NOT NULL,
  `sales_id` int NOT NULL,
  `remaining_hours` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_sale_subjects1_idx` (`subjects_id`),
  KEY `fk_subject_sale_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_subject_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `fk_subject_sale_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
  `schedule` varchar(45) NOT NULL,
  `areas_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_areas1_idx` (`areas_id`),
  CONSTRAINT `fk_subjects_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'calculo','calculo diferencial para universitarios','8 am',1),(2,'algebra','lineal y factorizacion','5 am',1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
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
  `finish_time` time NOT NULL,
  `groups_id` int NOT NULL,
  `payments_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tutorships_groups1_idx` (`groups_id`),
  KEY `fk_tutorships_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_tutorships_groups1` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`),
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

-- Dump completed on 2024-03-06  7:16:29
