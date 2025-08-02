-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (arm64)
--
-- Host: localhost    Database: bloggerj
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `posts_id` int NOT NULL,
  `avatar` longtext NOT NULL,
  `author` varchar(45) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_valid` tinyint(1) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id_idx` (`users_id`),
  KEY `comments_users_id_idx` (`posts_id`),
  CONSTRAINT `comments_posts_id` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `comments_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (6,1,2,'IMG-6800d360312623.61023779.jpg','blogger J','How to look for inspiration for new goals in life and remember to give yourself a break?','enim mi aenean mauris. Porta nisl a ultrices ut libero id. Gravida a mi neque, tristique justo, et pharetra. Laoreet nulla est nulla cras ac arcu sed mattis tristique. Morbi convallis suspendisse enim blandit massa. Cursus augue dui mattis morbi velit.','2025-06-05 14:32:28',1,'approuvé'),(8,1,2,'IMG-6800d360312623.61023779.jpg','blogger J','How to look for inspiration for new goals in life and remember to ','Les utilisateurs ont la possibilité de commenter mon blog. Donner un avis utile qui contribue à l\'amélioration du contenu du blog.','2025-06-20 09:45:14',1,'approuvé'),(9,1,1,'IMG-6800d360312623.61023779.jpg','blogger J','Single Project 3D Rendering of Human Sculpture','Les utilisateurs ont la possibilité de commenter mon blog. Donner un avis utile qui contribue à l\'amélioration du contenu du blog.','2025-07-31 15:21:53',1,'approuvé');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users_id` int NOT NULL,
  `author` varchar(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category` varchar(45) NOT NULL,
  `excerpt` varchar(45) NOT NULL,
  `content` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id_idx` (`users_id`),
  CONSTRAINT `users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'userback','Single Project 3D Rendering of Human Sculpture','Développement de sites web','Ultricies malldlldlldldlpwpppwpwp','Définissez l’image miniature de l\'article. De préférence en format 742 × 599. Seuls les fichiers image *.png, *.jpg et *.jpeg sont acceptés','IMG-6800d465617f92.73705836.jpg','2025-04-17 12:13:57',1,'Publié'),(2,1,'blogger J','How to look for inspiration for new goals in life and remember to ','Développement de sites web','Dolor laoreet fermentum lectus praesent ','Created with detailed research on a particular domain niche to fulfill all the required features, designs, and pages. You can also mix and match sections to create a website related to listing and directory','IMG-6849459218f1f7.33085538.png','2025-06-05 11:55:45',1,'Publié');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `image` longtext NOT NULL,
  `username` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrateur','IMG-6800d360312623.61023779.jpg','blogger J','Leleu','Justine','bloggerj@gmail.com','$2y$10$Gw6zYH2XOuRSjs3nvfcwHuSY.ygETgNH.6pdfWrCWBLx6DSZkah7u',1),(2,'administrateur','IMG-680a43a671c449.48942703.jpg','Admin','Admin','Admin','admin@gmail.com','$2y$10$MfVk1yGbdgJl/GcxSTGgquJM9jdDvZHllkx5nIMA4huMPdui17dQq',1),(3,'utilisateur','IMG-684bd3d08a4ab3.72446205.jpg','userblog','Donne','Johnny','userblog@gmail.com','$2y$10$YE939NJMj1WN8Ly.uKfuVOLEHSFFPYHP/OA8ybnyOkzjrWQUvu076',1);
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

-- Dump completed on 2025-08-02 12:50:09
