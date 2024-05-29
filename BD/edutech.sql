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
  `status` set('active','inactive') DEFAULT 'active',
  `price` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Matematicas','active',0),(2,'Idiomas editado','active',0),(3,'preicfes','active',0),(4,'tati','active',0),(5,'Asfdasdf','active',0),(6,'Asfdasdf','active',0),(7,'Asfdasdf','active',0),(8,'Asfdasdf','active',0),(9,'Artes plasticas editadas','inactive',0),(10,'Artes','active',0),(11,'Artes','active',0),(12,'Mecanica','active',0),(13,'Calculos','active',0),(14,'Calculos','active',0);
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
INSERT INTO `balance_detail` VALUES (1,'2024-05-29',1000,2),(2,'2024-05-29',1000,2),(3,'2024-05-29',1000,2),(4,'2024-05-29',1000,2),(5,'2024-05-29',1000,2),(6,'2024-05-29',1000,2),(7,'2024-05-29',3000,2),(8,'2024-05-29',53000,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `balances`
--

LOCK TABLES `balances` WRITE;
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
INSERT INTO `balances` VALUES (1,100000,'2024-05-29','active',144),(2,266000,'2024-05-29','active',140);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
INSERT INTO `payment_history` VALUES (1,'1900-01-01',2,15000,30000,1,'active'),(2,'1900-01-01',2,15000,30000,1,'active'),(3,'1900-01-01',1,15000,15000,2,'active'),(4,'1900-01-01',1,15000,15000,2,'active'),(5,'1900-01-01',1,15000,15000,2,'active'),(6,'1900-01-01',1,15000,15000,2,'active'),(7,'1900-01-01',1,15000,15000,2,'active'),(8,'1900-01-01',6,15000,90000,3,'active'),(9,'1900-01-01',6,15000,90000,3,'active'),(10,'1900-01-01',1,10000,10000,5,'active'),(11,'1900-01-01',3,15000,45000,1,'active'),(12,'1900-01-01',2,15000,30000,1,'active'),(13,'1900-01-01',1,15000,15000,1,'active'),(14,'1900-01-01',40,15000,600000,1,'active'),(15,'1900-01-01',1,10000,10000,4,'active'),(16,'1900-01-01',10,15000,150000,2,'active'),(17,'1900-01-01',1,15000,15000,5,'active'),(18,'1900-01-01',1,1,1,2,'active'),(19,'2024-05-17',60,1500,90000,2,'active'),(20,'2024-05-17',3,20000,60000,6,'active');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,0,'1900-01-01',9,'active'),(2,191,'2024-05-17',3,'active'),(3,42,'1900-01-01',13,'active'),(4,0,'1900-01-01',45,'active'),(5,0,'1900-01-01',12,'active'),(6,17,'2024-05-17',40,'active');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (2,'111','ssss','1900-01-01','#eadadwwd -15','M','fasdfqsdss@gmail','Pedro','Barrera','CC','123456789','administrador','$2y$10$o1sn9O9dsaRCN8Hy18bNtuuI2NmRjUpesR7mkM0UC.GYBo5kZ0fsy','resource/img/photosUsers/defaultPhoto.jpg','active'),(3,'11111','Mongua','1900-01-01','ninguna','M','martingay@ggg','Tati','Nuñez','CC','12345','docente','$2y$10$wb1llnfX/CM8rpG56j2DfeHFUgzrN15EvKH9/NXQ5X03NrJpxYV8.','resource/img/fotosUsers/foto1.jpg','inactive'),(4,'3123467007','Medellin','1900-01-01','secreta','M','amayadaniel677@gmail.com','Pablo Emilio','Escobar','CC','666','estudiante','$2y$10$CIut0FbRWDkrnB.wiiehRONTTzBhciVo.8c.2YtZeOjqUJlbELmOS','resource/img/photosUsers/defaultPhoto.jpg','inactive'),(5,'3122222','duitama','1900-01-01','fasdfsdfasdf','M','maluma@gmail.com','Maluma','Calvo','CC','000','estudiante','$2y$10$YkAAPNzQoDwEOqDOFM39Y.fz34CfTBzjQczcdUt6syOo3aMwmsYym','resource/img/photosUsers/defaultPhoto.jpg','active'),(6,'3123467007','Sss','1900-01-01','ssss','M','111@fff','Añañin','Amaya','CC','111','estudiante','$2y$10$5Jzn6ryYckH7tLW2XYJy/ec9NSQRQkhwR8XD0IwbNry7Q.GzWKjvW','resource/img/photosUsers/defaultPhoto.jpg','inactive'),(7,'11','Ssss','1900-01-01','s','M','pedro@gmail.com','A','S','CC','11111','estudiante','$2y$10$T45VP1hN88cymXYovVqnsOu0dQjpkKbrviJuFWseRjJkG4/j7xnoW','resource/img/photosUsers/defaultPhoto.jpg','inactive'),(8,'11','S','1900-01-01','s','M','pedro@gmail.com','A','S','CC','11111888','estudiante','$2y$10$S5OWkHFJXj2xkYdbH0PfGuHBYO9M3YUo.Qz0vVvi639Pe4uVhCNjC','resource/img/photosUsers/defaultPhoto.jpg','active'),(9,'3','Ss','1900-01-01','sadfadf','M','333@gmail','Pirulo','Socrates','CC','333','docente','$2y$10$qTdxElh9CCc9X9HSjo9MqOq.bsMM.akd5fpsDp/04mVEsQh9cxOvq','','active'),(10,'222','duitama','1900-01-01','calle 2rq2r23','M','dd@gg','Sdfasdf','Sadfasdfs','CC','11','estudiante','$2y$10$9H8Z5u7xDl4ShwPU8zR.UeeQmQlvH/szXpMG63rwrMPQ05GIL/UWC','resource/img/photosUsers/11_-1_orig (2).jpeg','active'),(11,'22','ss','1900-01-01','222','M','aaa@ddd','Sss','Sss','CC','9','estudiante','$2y$10$ozztbdGuOfgvM/FWLYmDl.93BT.YJZcCJ9.LlIWTiGcyt9O9MUDfm','resource/img/photosUsers/9_Invitación Feliz Navidad elegante dorado negro.png','active'),(12,'22','s','1900-01-01','s','M','pedro@gmail.com','Pedro','Asdfasdf','CC','12','docente','$2y$10$oHzZQJUuTC76R6qisDqg6u1P6XsZa9itw06b5PSjXROPfwGFvTRwW','resource/img/photosUsers/12_Invitación Feliz Navidad elegante dorado negro.png','active'),(13,'322314566','Sogamoso','1900-01-01','calle 2 8','F','tati@gmail.com','Tatiana','Calderon','CC','1081394656','docente','$2y$10$vk3uEskR55w74TYS8Qki2es2FnIwHqWPlsPWO2U4KpUI9eFtsRCE.','resource/img/photosUsers/1081394656_IMG-20231127-WA0062 (1).jpg','active'),(14,'312346700777','sogamoso','1900-01-01','carrera 14 1b-113','M','juan@gmali.com','Juan Carlos','Quintero Barrera','CC','1234567890','administrador','$2y$10$zFvsqWeu7JclQ0Uu6fFGp.dn5BuXuaK1rJ6htMwFmz/wDalajtk9K','resource/img/photosUsers/1234567890_caballo.jpg','active'),(15,'3123467007','sogamoso','1900-01-01','carrera 14 1b','M','amayadaniel677@gmail.com','Daniel','Amaya','CC','1006416081','administrador','$2y$10$yQGjf0u6cyEy8XRBHMAlruXiCl3iPmwXUnEH/YFQty1MOolLc3R3a','resource/img/photosUsers/1006416018_IMG-20231125-WA0074.jpg','active'),(16,'1','1','1900-01-01','1','M','1@1','A','A','CC','1','administrador','$2y$10$0UYU42cV.E2WuOnLAOWp..ZtbbNCdc5BchyK0PriYIbVlvvZOQbYC','../resource/img/photosUsers/defaultPhoto.jpg','active'),(17,'2','2','1900-01-01','2','M','2@2','S','S','CC','2','administrador','$2y$10$coIGWyvP2l75b3E/VBNBH.9PNemZ/mM0NEhuNd95JXaFD9A/lFqTq','../resource/img/photosUsers/defaultPhoto.png','active'),(18,'3','3','1900-01-01','3','F','3@3','S','S','CC','3','administrador','$2y$10$WX787Au9XBT9nLqbXj7kRO6RLh4kBoFU0FQpP7reITB9NB0d8rCpe','resource/img/photosUsers/defaultPhoto.png','active'),(19,'123123123','sfsf','1900-01-01','asdfadfasd','','fawfasdf@asdfad','Asdfadfasd','Fasdfasd','CC','123123','administrador','$2y$10$5EbLM2ViRSZ9gAMyENM4l.ry77fBV8dBTHgG3iWowz5nzcM5KWx5.','resource/img/photosUsers/123123_-1_orig (2).jpeg','active'),(20,'123','ssss','1900-01-01','','','asfd@asdfas','asdf','asdfaf','NA','666666','estudiante','$2y$10$ADQPGFlDnRWUSYcR8/8DSeNQyDVBJP/BSv0xeh.kQpLZiLP.knCRy','resource/img/photosUsers/defaultPhoto.png','active'),(21,'3209498725','Duitama','1900-01-01','','','pedroa.barrera@outlook.com','pedro','barrera','NA','1052394795','estudiante','$2y$10$yQtgRGyGEReE1l8DQoqQJeZLk6XC7mzQBBu4zIe2BMSE4P6GsMsZO','resource/img/photosUsers/defaultPhoto.png','active'),(22,'23123','fasdf','1900-01-01','','','amayadaniel677@gmail.com','Daniel','asdf','NA','33333333333333','estudiante','$2y$10$S7Qxah9mnI1BxI74ebj2rOOX3gWCOc.l5RzjR7fr7ZOYn/9PM/6Sq','resource/img/photosUsers/defaultPhoto.png','active'),(23,'23123','asdfasd','1900-01-01','','','dfasdfa@asdff','adfasfas','fasdf','NA','2131232','estudiante','$2y$10$WGPNA0rsaiMsCjbgR.mIiOQJsZ26SgM/FDOGVfJcamn8JLf611BWa','resource/img/photosUsers/defaultPhoto.png','active'),(24,'331423','asdffa','1900-01-01','','','fadfaf@awfasdf','dddd','sdfaf','NA','112132312312','estudiante','$2y$10$1/I93y4GFo6OUTTsptcC/uVpdYEingG/tsEEiyfY6KZY3z7PRtr/m','resource/img/photosUsers/defaultPhoto.png','active'),(25,'1212312','asdf','1900-01-01','','','adf@asdfasdfadf','xsaas','asdfasdf','NA','1212312','estudiante','$2y$10$YARElQElMOPlD7SlpGypjuv7CkX34qPECJdcvKYE1De3y7mtiSG5a','resource/img/photosUsers/defaultPhoto.png','active'),(26,'3123467007','sogamoso','1900-01-01','','','amayadaniel677@gmail.com','Pedro','barrera','NA','101234141','estudiante','$2y$10$Pomrlha3wwEG7rsqAUESe.pt6jqZ5GYXaGeaLhYSuDoR3mtxetXgq','resource/img/photosUsers/defaultPhoto.png','active'),(27,'112132323','sss','1900-01-01','','','amayadaniel677@gmail.com','daniel','AMAYA','NA','1010101010','estudiante','$2y$10$/zOeFMTIdZahpPH7RkvWberDYf.nX/l448hZBvVUmhM/fIit7zwQ.','resource/img/photosUsers/defaultPhoto.png','active'),(28,'414213','sogamoso','1900-01-01','','','fasdfaf@fsadfaf','Daniel','Barrera','NA','202020','estudiante','$2y$10$8BjxHpJGZkAKJ/xNCR1a6OxkwbbayBivP3yDF/Om2e6JzfH.jesAu','resource/img/photosUsers/defaultPhoto.png','active'),(29,'3123333333','sogamoso','1900-01-01','','','usuarionuevo@gmail.com','Pedro','amaya','NA','1111111111','estudiante','$2y$10$tQcvlJiDxVDwm.OtpL53uuyNEKzsO6/U6kku3Fb7YfUcM484XNbze','resource/img/photosUsers/defaultPhoto.png','active'),(30,'312345555','tauramena','1900-01-01','','','oedritocomiopalitos@gmail.com','Pedro','palitos','NA','00000000','estudiante','$2y$10$ILFDqtvCBeHInmAED3sIcOdmdBJFuYhVe63esH0rnsb2aT29q4dg6','resource/img/photosUsers/defaultPhoto.png','active'),(31,'2333','FDS','1900-01-01','','','asdfasdfa@sd','jldfnadlkjf','1232131','NA','332233','estudiante','$2y$10$Ps5iFeBuxMX/BHP60DVI8utYUkBDpDbFCDbafgSCRAmODPtvrlgvm','resource/img/photosUsers/defaultPhoto.png','active'),(32,'222','ss','1900-01-01','','','02399320@dsdf','awerfuaowe','12mdsklds','NA','909','estudiante','$2y$10$cXB/YxiOhnNWYxbZoOIxIO11U/lujpd2G/3g2oYTDorahPlqI1bG.','resource/img/photosUsers/defaultPhoto.png','active'),(33,'332','ASDFAFAS','1900-01-01','','','ASDFA@FASDF','AWEFWEF','FWFASD','NA','32323','estudiante','$2y$10$95kTOf.iLHexlcf95l/w0e6B1gQIqMTsNYHwUsL4Ar4pfCfik2KMW','resource/img/photosUsers/defaultPhoto.png','active'),(34,'1','s','1900-01-01','','','s@s','s','s','NA','121','estudiante','$2y$10$cABu3HdH.Dh5P.Bf1qio7.8d4jIVcXl443Uy62wirnvRV81ITGD3m','resource/img/photosUsers/defaultPhoto.png','active'),(35,'12','d','1900-01-01','','','s@s','d','d','NA','119','estudiante','$2y$10$ARLtEknNilkgibORe3YCVu0XIpBv6tfeTan7vOOkIaKlLJXadKlKy','resource/img/photosUsers/defaultPhoto.png','active'),(36,'2','e','1900-01-01','','','w@w','a','d','NA','31','estudiante','$2y$10$g7O4FfYVL6LyB9B3Z59n1eWfmRHYZUTTvFypwVnWy89UPuo/TEJoi','resource/img/photosUsers/defaultPhoto.png','active'),(37,'0','0','1900-01-01','','','0@0','0','0','NA','0','estudiante','$2y$10$71M40shWgZb5JgEALcOxxu08ndM1tUj7RLsfmN8/6ZF4Czfr4h1PS','resource/img/photosUsers/defaultPhoto.png','active'),(38,'1','1','1900-01-01','','','1@1','Daniel ','Amaya','NA','666666666666','estudiante','$2y$10$1aA7MhknYEcjP.r4NHK3RelWEjR3NiCu/C6o5mF7f9LW55eP4/IvW','resource/img/photosUsers/defaultPhoto.png','active'),(39,'1','1','1900-01-01','','','1@1','d','d','NA','7773333','estudiante','$2y$10$.l64DoyrEaiEr7uEp2JCB.Mqv257yTt1b5dAp90X.N9x/c4V9/h4u','resource/img/photosUsers/defaultPhoto.png','active'),(40,'1','s','1900-01-01','s','M','1@1','Daniel','Amaya','CC','1111222233333','docente','$2y$10$.0.fK5.YX/9vLwepDsQz6uoC87HdG6D.LmtMo4o1Y6J7dcUSnhpyi','resource/img/photosUsers/defaultPhoto.png','active'),(41,'1','s','1900-01-01','s','M','1q@1','D','D','CC','667766','administrador','$2y$10$KC1paQ5z3ClCsXPG7Yf2Me7aFUfjspZfnrrfIMwLlSlHerTwx2CGa','resource/img/photosUsers/667766_Captura de pantalla 2024-03-16 133007.png','active'),(42,'11111111111','sogamoso','1900-01-01','carrera 134','M','we@www','Asfsf','Asdfasdf','CC','111111110','docente','$2y$10$L62r3zjNg9MG5BGU6fX0U.JHhPHjejCy88NzlsS4AratMXB2MKpXq','resource/img/photosUsers/111111110_Captura de pantalla 2023-12-16 052315.png','active'),(43,'88888','sogamoso','1900-01-01','pedro','M','adfsdfq@gmail','Pedro','Pablo','CC','88888','estudiante','$2y$10$xwZOgpZk8tQfH2YWfWaEQ.oTIzZECksyiJEt4sCssZgdFj7YjVsoC','resource/img/photosUsers/defaultPhoto.png','active'),(44,'12121212','1','1900-01-01','1','M','122@ss','123123','Asdfsdf','CC','1212121212','docente','$2y$10$sd9CYELlUJyFYeQ5sdqseuxSAYGbVRYnTEw2Utzg6fDuOAdsOpk8e','resource/img/photosUsers/defaultPhoto.png','active'),(45,'313','tauramena','1900-01-01','22ldfjsa','M','1@1','Daniel','Dd','CC','11212134','docente','$2y$10$7YkK3XwHsc20bHQYmx6XTelFBBpbVpSTu6qGEVDvKdjBy.ffSiq32','resource/img/photosUsers/11212134_Logo_fresas_arturo.png','active'),(46,'312312312','soga','1900-01-01','asfas','M','amayadaniel1@gmail.com','Daniel','Amaya','CC','909090','estudiante','$2y$10$seNhqWm4F79n7947nv4WEeeYrK4sbKLVhGlyRWo78oLdfcIo893o6','resource/img/photosUsers/defaultPhoto.png','active'),(47,'13132','sogamoso','1900-01-01','carrera 14','M','1@1','Daniel Alexander','Alsfkjanfl','CC','1006416','estudiante','$2y$10$fcPfzx3109Kg5zKWMbDwuekVyAj6wExZ0BzqoNmTdEZQMdI83fylS','resource/img/photosUsers/defaultPhoto.png','active'),(48,'313222222','sogamoso','1900-01-01','carrera 14 123','M','1@11','Daniel','Amaya','CC','1006415667','estudiante','$2y$10$04axp540s.Oi7JXBF4SEuOCtE0NnLN7vQjQop3ULJ7FrBZTSmuuH6','resource/img/photosUsers/defaultPhoto.png','active'),(49,'31233333','sogamoso','1900-01-01','','','liliana@gmail.com','fabian','sanabria','NA','000011100000','estudiante','$2y$10$WCG8EYqVurL6gzYlCQehX.1nWrP4phniNXH1dKaGtkkYdO/jIai6G','resource/img/photosUsers/defaultPhoto.png','active'),(50,'2222222222222222','sogamoso','1900-01-01','','','1@1','fabian','adfasdf','NA','1111010111','estudiante','$2y$10$8ihkau44MgA3VZ0FR6qHKuj8Y.uT9FHqvCV.GZqgM2f.rY5Oa5Fz6','resource/img/photosUsers/defaultPhoto.png','active'),(51,'3333554','sogamoso','1900-01-01','','','liliana@gmail.com','ssssssssssssssssssss','ddddddddddddddd|','NA','111111233344','estudiante','$2y$10$Tq33zHzhnVIavgTrMZEHue4PFlGNapBDwIzfxycAodUniTkAbL06S','resource/img/photosUsers/defaultPhoto.png','active'),(52,'31234444','sogamoso','1900-01-01','','','0@0','Daniel','sanabria','NA','00000000000','estudiante','$2y$10$e1KcTB7J9fJyWWdb1GR3x.2tFZhINl6c8H2B2qaIHb2xGE9pljmVG','resource/img/photosUsers/defaultPhoto.png','active'),(53,'123','sogamoso','1900-01-01','','','1@1','daniel','amaya','NA','23467889','estudiante','$2y$10$n4knYV2qaJ5K0q9059NcvOvKlvjFifcGw96xNG4H5B.B5X26Eaz9K','resource/img/photosUsers/defaultPhoto.png','active'),(54,'3103483353','sogamoso','1900-01-01','callejuelas','M','garcisces4r@gmail.com','Cesar Ferney','Garcia Patino','CC','1057978989','docente','$2y$10$XnMWQM5zfa7HPqHmeggnxOYVbKoOsdkZYkG5g8IVuKfCVLbz8dxAu','resource/img/photosUsers/defaultPhoto.png','inactive'),(55,'3116236828','sogamoso','1900-01-01','juan david','M','jv3834383@gmail.com','Juan David','Valenzuela Serrano','CC','1081512536','estudiante','$2y$10$1bF39IMP8tfS3K6pt4M/peJSu13gFs78O4HSX52cnVwfZGA9nbRPa','resource/img/photosUsers/defaultPhoto.png','active'),(56,'3123467007','sogamoso','1900-01-01','','','liliana@gmail.com','daniel ','amaya','NA','3004202400','estudiante','$2y$10$52TFLE3XBvfGah9O6SXpXOqpcB4TyfkGtFloqm57RaSSo16MKSZBG','resource/img/photosUsers/defaultPhoto.png','active'),(57,'3123467007','sogamoso','1900-01-01','','','1@1','ejemplo','apellido ejemplo','NA','30042024','estudiante','$2y$10$q7sH2zMOynQAgxATqitcw.a4bG0ylqfXV4mCUjmReCmA8Zo98TLum','resource/img/photosUsers/defaultPhoto.png','active'),(58,'3123467007','sogamoso','1900-01-01','','','1@1','ejemplo','ejemplo','NA','3004202411','estudiante','$2y$10$7.gJTGZa7ijOX78FUuM8W.G2bEtfTITOQXlGw6y6TiQeH7Hepfqfi','resource/img/photosUsers/defaultPhoto.png','active'),(59,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520241','estudiante','$2y$10$qaAyKvqc5c2JKWPPKCbrXucXTzaWKXd7xn.1ZIGJ9p.jt9L6qna9u','resource/img/photosUsers/defaultPhoto.png','active'),(60,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520242','estudiante','$2y$10$AdeNYeWTNYfj.HiHi19jKe5E0kQSflirijcoJz.S2oFygYR3OIwVa','resource/img/photosUsers/defaultPhoto.png','active'),(61,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520243','estudiante','$2y$10$NG5eC9ahwK9zK0wYqDHPQu3sQ8WCMbZq4kSts20tp2X6pR1I72y.G','resource/img/photosUsers/defaultPhoto.png','active'),(62,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520249','estudiante','$2y$10$kH56Iq2IpDMMK3hDLtmWIOFQCNl0HYUSc3Tb3YOiFMaexjoRKTGHC','resource/img/photosUsers/defaultPhoto.png','active'),(63,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520252','estudiante','$2y$10$rNfXU12YEvsCawyw.cWYZeEwFmEERy4.EfwCHCWRqQ71pAG8Wm40q','resource/img/photosUsers/defaultPhoto.png','active'),(64,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520262','estudiante','$2y$10$eCaBKw00tXuckQOhSstShuZ8FGDeiPFUPuIzCcxGrzhu50ZPmayHS','resource/img/photosUsers/defaultPhoto.png','active'),(65,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520248','estudiante','$2y$10$NumqaW2ma5TTC3Jww.EMSeo8BJjJdkpeB68t2F5MJH8xv48bWR5dy','resource/img/photosUsers/defaultPhoto.png','active'),(66,'3333333333','xd','1900-01-01','','','1@1','ddd','jjj','NA','020520240','estudiante','$2y$10$ShX/T19mpdLIh74ig39YfeWdUu5FEIOGRJklpgofECFqFhxl.5HWW','resource/img/photosUsers/defaultPhoto.png','inactive'),(67,'3123467007','sogamoso','1900-01-01','','','1@1','daniel','jlkj','NA','030520241','estudiante','$2y$10$WpzJkBGvly0UzZo4Yc3JeuB5tbgDoO.KisIlGdEUBdVY7y5PU08tu','resource/img/photosUsers/defaultPhoto.png','active'),(68,'3123467007','sogamoso','1900-01-01','','','1@1','ajax maldito','apellidos ajax','NA','030520242','estudiante','$2y$10$6T0fvH9FN4eExMCjAuzM8OnZM3f7xfVvU8BjjUY6voYWwqidt.KmK','resource/img/photosUsers/defaultPhoto.png','active'),(69,'3123467007','Sogamoso','1900-01-01','000','M','1@1','Tati','Con Capul','NA','030520244','estudiante','$2y$10$BLhUU3994sOyIiRi4WHIneKOy9MIi/CLvjZz3wn5ry.Y/ugY8bjFG','resource/img/photosUsers/defaultPhoto.png','active'),(70,'3123467007','sogamoso','2004-06-22','secreta','M','daamaya@unal.edu.co','Super','Administrador','CC','1234567891','superadmin','$2y$10$2VtbEeTOAK9QFirL8jWE2uxthaji361r97aZO8tq7OiTvZ7ohE7Sm','resource/img/photosUsers/defaultPhoto.png','active'),(71,'1234567890','ejem',NULL,'flkjasfd',NULL,'fasdf@asdfa','ejemplo n','ejemplo','NA','290520241','estudiante','$2y$10$vo90yuJ7qaby3eMOKnPeGebNTMVZVK2SBIE8qXe3nP0I3Z.Wpg8Au','resource/img/photosUsers/defaultPhoto.png','active');
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_area`
--

LOCK TABLES `people_area` WRITE;
/*!40000 ALTER TABLE `people_area` DISABLE KEYS */;
INSERT INTO `people_area` VALUES (1,3,4,'inactive'),(1,3,5,'inactive'),(1,3,6,'inactive'),(1,3,7,'inactive'),(1,3,8,'inactive'),(1,3,9,'inactive'),(1,3,10,'inactive'),(1,3,11,'inactive'),(2,45,12,'active'),(2,40,13,'active'),(2,40,14,'active'),(12,44,15,'inactive'),(12,40,16,'inactive'),(12,40,17,'inactive'),(12,40,18,'inactive'),(12,40,19,'inactive'),(12,40,20,'inactive'),(12,40,21,'inactive'),(12,40,22,'inactive'),(12,40,23,'inactive'),(12,40,24,'inactive'),(12,40,25,'inactive'),(12,40,26,'active'),(2,45,27,'active'),(2,45,28,'active'),(2,45,29,'active'),(1,3,30,'inactive'),(1,42,31,'inactive'),(1,40,32,'inactive'),(1,42,33,'inactive'),(1,3,34,'inactive'),(1,3,35,'inactive'),(1,3,36,'inactive'),(1,3,37,'inactive'),(1,3,38,'inactive'),(2,9,39,'active'),(1,3,40,'inactive'),(2,13,41,'active'),(3,9,42,'inactive'),(3,3,43,'active'),(13,13,44,'active'),(1,12,45,'active'),(1,13,46,'active'),(12,12,47,'active'),(12,54,48,'active');
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remaining_units`
--

LOCK TABLES `remaining_units` WRITE;
/*!40000 ALTER TABLE `remaining_units` DISABLE KEYS */;
INSERT INTO `remaining_units` VALUES (1,20,0),(2,10,0),(3,0,0),(4,6,0),(5,6,0),(6,6,0),(7,6,0),(8,0,0),(9,0,0),(10,0,0),(11,0,0),(12,0,0),(13,0,0),(14,0,0),(15,10,0),(16,0,0),(17,40,0),(18,11,0),(19,1,0),(20,10,0),(21,20,8),(22,0,0),(23,18,0),(24,4,0),(25,0,0),(26,0,0),(27,0,0),(28,0,0),(29,0,0),(30,0,0),(31,0,0),(32,0,0),(33,0,0),(34,0,0),(35,0,0),(36,0,0),(37,15,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (2,87000,'2024-03-07 00:00:00',4,'inactive',0,NULL),(3,87000,'2024-03-07 00:00:00',4,'inactive',0,NULL),(4,87000,'2024-03-07 00:00:00',4,'active',0,NULL),(5,100000,'2024-03-07 00:00:00',20,'inactive',0,NULL),(6,100000,'2024-03-07 00:00:00',20,'active',0,NULL),(7,100000,'2024-03-07 00:00:00',20,'active',0,NULL),(8,60000,'2024-03-07 00:00:00',21,'active',0,NULL),(9,109999,'2024-03-07 00:00:00',22,'active',0,NULL),(10,109999,'2024-03-07 00:00:00',22,'active',0,NULL),(76,43999,'2024-03-19 00:00:00',4,'active',0,NULL),(77,21889,'2024-03-19 00:00:00',38,'active',0,NULL),(78,329667,'2024-03-19 00:00:00',39,'active',0,NULL),(79,722221,'2024-04-02 00:00:00',5,'inactive',0,NULL),(82,40000,'2024-04-19 00:00:00',49,'active',0,NULL),(83,40000,'2024-04-19 00:00:00',49,'active',0,NULL),(84,50000,'2024-04-19 00:00:00',50,'active',0,NULL),(85,50000,'2024-04-19 00:00:00',50,'active',0,NULL),(86,50000,'2024-04-19 00:00:00',51,'active',0,NULL),(87,84000,'2024-04-22 00:00:00',52,'active',0,NULL),(88,110000,'2024-04-23 00:00:00',13,'active',0,NULL),(89,11000,'2024-04-24 00:00:00',53,'active',0,NULL),(90,11000,'2024-04-24 00:00:00',53,'active',0,NULL),(91,220000,'2024-04-30 00:00:00',56,'active',0,NULL),(92,220000,'2024-04-30 00:00:00',56,'active',0,NULL),(93,110000,'2024-04-30 00:00:00',57,'active',0,NULL),(94,110000,'2024-04-30 00:00:00',57,'active',0,NULL),(95,220000,'2024-04-30 00:00:00',58,'active',0,NULL),(96,220000,'2024-04-30 00:00:00',58,'active',0,NULL),(97,220000,'2024-04-30 00:00:00',58,'active',0,NULL),(98,110000,'2024-04-30 00:00:00',58,'active',0,NULL),(99,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(100,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(101,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(102,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(103,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(104,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(105,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(106,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(107,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(108,66000,'2024-05-02 00:00:00',59,'active',0,NULL),(109,33000,'2024-05-02 00:00:00',59,'active',0,NULL),(110,44000,'2024-05-02 00:00:00',59,'active',0,NULL),(111,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(112,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(113,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(114,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(115,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(116,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(117,110000,'2024-05-02 00:00:00',59,'active',0,NULL),(118,100000,'2024-05-02 00:00:00',59,'active',0,NULL),(119,200000,'2024-05-02 00:00:00',59,'active',0,NULL),(120,200000,'2024-05-02 00:00:00',59,'active',0,NULL),(121,200000,'2024-05-02 00:00:00',60,'active',0,NULL),(122,90000,'2024-05-02 00:00:00',59,'active',0,NULL),(123,110000,'2024-05-02 00:00:00',61,'active',0,NULL),(124,110000,'2024-05-02 00:00:00',61,'active',0,NULL),(125,110000,'2024-05-02 00:00:00',61,'active',0,NULL),(126,110000,'2024-05-02 00:00:00',61,'active',0,NULL),(127,11000,'2024-05-02 00:00:00',62,'active',0,NULL),(128,110000,'2024-05-02 00:00:00',62,'active',0,NULL),(129,11000,'2024-05-02 00:00:00',63,'active',0,NULL),(130,110000,'2024-05-02 00:00:00',64,'active',0,NULL),(131,110000,'2024-05-03 00:00:00',65,'active',0,NULL),(132,110000,'2024-05-03 00:00:00',66,'active',0,NULL),(133,110000,'2024-05-03 00:00:00',66,'active',0,NULL),(134,110000,'2024-05-03 00:00:00',66,'active',0,NULL),(135,110000,'2024-05-03 00:00:00',66,'active',0,NULL),(136,110000,'2024-05-03 00:00:00',66,'active',0,NULL),(137,242000,'2024-05-03 00:00:00',67,'active',0,NULL),(138,490000,'2024-05-03 00:00:00',68,'inactive',0,NULL),(139,556000,'2024-05-03 00:00:00',69,'inactive',0,NULL),(140,766000,'2024-05-17 00:00:00',21,'active',0,NULL),(141,854000,'2024-05-17 00:00:00',21,'active',0,NULL),(142,628000,'2024-05-17 00:00:00',21,'inactive',0,NULL),(143,9978000,'2024-05-17 00:00:00',21,'active',0,NULL),(144,135000,'2024-05-29 00:00:00',71,'active',0,100000);
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
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_sale`
--

LOCK TABLES `subject_sale` WRITE;
/*!40000 ALTER TABLE `subject_sale` DISABLE KEYS */;
INSERT INTO `subject_sale` VALUES (135,66000,6,1,106,'active','horas','presencial',3),(136,66000,6,1,107,'active','horas','presencial',3),(137,66000,6,1,108,'active','horas','presencial',3),(138,33000,3,2,109,'active','horas','presencial',8),(139,44000,4,3,110,'active','horas','presencial',9),(140,110000,10,4,111,'active','horas','presencial',10),(141,110000,10,4,112,'active','horas','presencial',10),(142,110000,10,4,113,'active','horas','presencial',10),(143,110000,10,6,114,'active','horas','presencial',11),(145,110000,10,8,116,'active','horas','presencial',12),(146,110000,10,9,117,'active','horas','presencial',13),(147,100000,5,1,118,'active','clases','presencial',14),(148,200000,10,1,119,'active','clases','presencial',14),(149,200000,10,1,120,'active','clases','presencial',14),(150,200000,10,1,121,'active','clases','presencial',15),(151,90000,10,1,122,'active','horas','telepresencial',16),(152,110000,10,1,123,'active','horas','presencial',17),(153,110000,10,1,124,'active','horas','presencial',17),(154,110000,10,1,125,'active','horas','presencial',17),(155,110000,10,1,126,'active','horas','presencial',17),(156,11000,1,1,127,'active','horas','presencial',18),(157,110000,10,1,128,'active','horas','presencial',18),(158,11000,1,2,129,'active','horas','presencial',19),(159,110000,10,1,130,'active','horas','presencial',20),(160,110000,10,1,131,'active','horas','presencial',21),(161,110000,10,1,132,'active','horas','presencial',22),(162,110000,10,1,133,'active','horas','presencial',22),(163,110000,10,1,134,'active','horas','presencial',22),(164,110000,10,1,135,'active','horas','presencial',22),(165,110000,10,1,136,'active','horas','presencial',22),(166,110000,10,1,137,'active','horas','presencial',23),(167,44000,4,2,137,'active','horas','presencial',24),(168,88000,8,1,137,'active','horas','presencial',23),(169,110000,10,1,138,'active','horas','presencial',25),(170,200000,10,1,138,'active','clases','presencial',26),(171,180000,20,1,138,'active','horas','telepresencial',27),(172,220000,20,1,139,'active','horas','presencial',28),(173,160000,20,2,139,'active','horas','virtual',29),(174,110000,10,7,139,'active','horas','presencial',30),(175,66000,6,1,139,'active','horas','presencial',28),(176,200000,10,1,106,'active','horas','presencial',NULL),(177,110000,10,1,141,'active','horas','presencial',31),(178,420000,20,13,141,'active','clases','telepresencial',32),(179,424000,53,15,141,'active','horas','virtual',33),(180,110000,10,1,142,'inactive','horas','presencial',31),(181,528000,24,2,142,'inactive','clases','virtual',34),(182,7326000,666,2,143,'active','horas','presencial',35),(183,2664000,333,2,143,'active','horas','virtual',36),(184,135000,15,1,144,'active','horas','telepresencial',37);
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'calculo','calculo diferencial para universitarios',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(2,'algebra','lineal y factorizacion',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(3,'Nombre Ejemplo','descripcion ejemplo',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(4,'Pruebanombre','pruebadescripcion',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(5,'Pruebashoy','deschoy',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(6,'Nombreultimo','descultimo',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(7,'Asdfsd58','dafsf58',2,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(8,'11:10nombre','11:10 desc',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(9,'Nombre 11:15','desc11:15',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(10,'11:18nombre','11:18 desc',1,'active','resource/img/photosSubjects/11:18nombre_Logo_fresas_arturo-removebg-preview.png',''),(11,'Asfdadfs','adsfadf',2,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(12,'Zsdfaf000','000',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(13,'11:46','11:46',2,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(14,'Adsfafd49','49',2,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(15,'53','53',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(16,'Adsfffadsfa 11:54','11:54',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(17,'Ejemplo 12:06','ejemplo 12:06',1,'active','resource/img/photosSubjects/Ejemplo_12:06_WhatsApp Image 2024-03-18 at 5.44.10 PM.jpeg',''),(18,'12:06 22','12:06 22 desc',1,'active','resource/img/photosSubjects/12:06_22_Logo_fresas_arturo-removebg-preview.png',''),(19,'12:07','12:07 edsss',1,'active','resource/img/photosSubjects/12:07_Logo_fresas_arturo.png',''),(20,'Xxx','xxxxxx',1,'active','resource/img/photosSubjects/Xxx_Logo_fresas_arturo-removebg-preview.png',''),(21,'Asdfasfd','asdfasdfxxxxx',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(22,'Ejemploconfoto','ejemploconfoto',2,'inactive','resource/img/photosSubjects/Ejemploconfoto_amor.jpg',''),(23,'Ejemplosinfoto','sinfoto',1,'active','resource/img/photosSubjects/defaultPhoto.jpg',''),(24,'Prueba','prueba Daniel',1,'active','resource/img/photosSubjects/defaultPhoto.jpg','uno, dos, tres'),(25,'Prueba2','prueba dos',1,'active','resource/img/photosSubjects/defaultPhoto.jpg','prueba');
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

-- Dump completed on 2024-05-29  8:34:15
