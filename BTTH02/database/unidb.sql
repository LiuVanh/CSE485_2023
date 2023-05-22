-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: uni
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendance` (
  `student_id` int DEFAULT NULL,
  `class_date` date DEFAULT NULL,
  `attendanceStatus` enum('Present','Absent','Late','Excused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Absent',
  `course_class_id` int DEFAULT NULL,
  KEY `student_id` (`student_id`),
  KEY `course_class_id` (`course_class_id`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`course_class_id`) REFERENCES `course_class` (`course_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,'2022-05-14','Excused',1),(2,'2022-11-14','Excused',3),(3,'2022-12-13','Excused',2),(4,'2023-04-28','Excused',4),(5,'2022-10-26','Excused',1),(6,'2022-04-03','Excused',5),(7,'2022-09-06','Present',5),(8,'2023-05-12','Late',3),(9,'2022-12-15','Present',5),(10,'2022-10-10','Excused',5);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_class`
--

DROP TABLE IF EXISTS `course_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_class` (
  `course_class_id` int NOT NULL,
  `Course_id` int DEFAULT NULL,
  `Instructor_id` int DEFAULT NULL,
  PRIMARY KEY (`course_class_id`),
  KEY `Course_id` (`Course_id`),
  KEY `Instructor_id` (`Instructor_id`),
  CONSTRAINT `course_class_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `course_class_ibfk_2` FOREIGN KEY (`Instructor_id`) REFERENCES `instructors` (`Instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_class`
--

LOCK TABLES `course_class` WRITE;
/*!40000 ALTER TABLE `course_class` DISABLE KEYS */;
INSERT INTO `course_class` VALUES (1,1,2),(2,1,5),(3,1,1),(4,4,1),(5,5,3);
/*!40000 ALTER TABLE `course_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_id` int NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Course_desc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_id_UNIQUE` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Incredible Mr. Limpet, The','Phasellus sit amet erat. Nulla tempus.'),(2,'Maria','Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),(3,'Chillers','Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.'),(4,'Stunt Squad','Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.'),(5,'Dog, The','In quis justo. Maecenas rhoncus aliquam lacus.');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructors` (
  `Instructor_id` int NOT NULL,
  `FullName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactInfo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Instructor_id`),
  UNIQUE KEY `Instructor_id_UNIQUE` (`Instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES (1,'Ardine Daldry','adaldry0@nba.com','945-504-4998'),(2,'Madel Jayme','mjayme1@wsj.com','318-659-9971'),(3,'Fifi Drewes','fdrewes2@friendfeed.com','923-381-1090'),(4,'Sasha Shreenan','sshreenan3@nymag.com','366-689-6166'),(5,'Borg Hendricks','bhendricks4@comsenz.com','843-730-9191');
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reports` (
  `Report_id` int NOT NULL,
  `ReportType` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Course_id` int DEFAULT NULL,
  `Student_id` int DEFAULT NULL,
  PRIMARY KEY (`Report_id`),
  KEY `Course_id` (`Course_id`),
  KEY `Student_id` (`Student_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `student_id` int NOT NULL,
  `FullName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `schoolYear` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_phase` int DEFAULT NULL,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`),
  KEY `index_name` (`student_id`),
  CONSTRAINT `students_chk_1` CHECK (((`semester_phase` = 1) or (`semester_phase` = 2)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Lisha Bonnick','lbonnick0@addtoany.com','286-147-0178','2022-06-09','K62','1',1,'59TH3'),(2,'Irita Coggles','icoggles1@ameblo.jp','524-407-6912','2023-04-04','K65','2',1,'59TH4'),(3,'Adelaida Lougheid','alougheid2@stumbleupon.com','805-486-9115','2023-04-21','K59','1',1,'59TH1'),(4,'Fancy Treasaden','ftreasaden3@hatena.ne.jp','574-536-3461','2022-12-26','K59','2',1,'58TH1'),(5,'Harley Hendrichs','hhendrichs4@hp.com','836-396-8729','2023-02-23','K62','2',1,'65TH3'),(6,'Lutero Lemoir','llemoir5@merriam-webster.com','959-248-6268','2022-03-28','K59','2',1,'65TH2'),(7,'Hurley Wilcocks','hwilcocks6@taobao.com','232-808-4961','2023-04-05','K59','2',1,'60TH1'),(8,'Eziechiele Laherty','elaherty7@shutterfly.com','414-360-9805','2022-08-07','K64','2',1,'62TH2'),(9,'Garvey Hanshawe','ghanshawe8@vk.com','148-788-4147','2022-10-26','K58','1',1,'64TH2'),(10,'Nona Rennles','nrennles9@huffingtonpost.com','922-268-1626','2023-02-03','K65','1',1,'59TH1');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `User_ID` int NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_Pw` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Role` enum('admin','Instructor','student') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
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

-- Dump completed on 2023-05-22 22:45:29
