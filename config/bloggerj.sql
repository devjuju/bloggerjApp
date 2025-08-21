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
  `email` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_valid` tinyint(1) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id_idx` (`users_id`),
  KEY `comments_users_id_idx` (`posts_id`),
  CONSTRAINT `comments_posts_id` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (18,9,9,'IMG-689f3bb77e6d40.80760896.jpg','Lorep','loremipsum@gmail.com','ExpressFood','Miam ! Miam ça donne faim !','2025-08-21 08:29:19',1,'approuvé'),(19,12,15,'IMG-689f3fd3db1786.22547469.jpg','Johnyme','johnnyannonyme@gmail.com','Le festival des Films de Plein Air','Ce projet était très long à faire !','2025-08-21 08:31:38',0,'rejeté');
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
  `excerpt` varchar(250) NOT NULL,
  `content` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id_idx` (`users_id`),
  CONSTRAINT `users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (9,13,'blogger J','ExpressFood','Développement d\'applications web','Concevoir la solution technique d\'une application de restauration en ligne','Sur son application, ExpressFood propose à ses clients de commander un ou plusieurs plats et desserts. ExpressFood avait besoin que je conçois sa base de données. \r\n\r\nPour structurer ma réflexion, j\'ai utilisé UML et construis une suite de diagrammes afin de modéliser les besoins de l’application et le diagramme de classe pour modéliser les entités de l\'application. ','IMG-68a6265c048847.41766976.jpg','2025-08-16 11:48:37','2025-08-20 20:16:16',1,'Publié'),(14,13,'blogger J','Chalets et caviar','Développement de sites web','Intégration d\'un thème Wordpress pour un client','Cette agence possède une quinzaine de chalets de luxe à la vente et une vingtaine en location.\r\n\r\nCependant, elle ne possède pas encore de site web pour promouvoir la vente et la location de ses chalets. C’est pour cette raison qu’elle a fait appel à moi.','IMG-68a321493964e7.34763551.jpg','2025-08-18 14:49:13','2025-08-20 20:08:47',1,'Publié'),(15,13,'blogger J','Le festival des Films de Plein Air','Développement de sites web','L\'analyse des besoins d\'un client pour son festival de films','Jennifer Edwards est l\'organisatrice du festival des Films de Plein Air. Elle ambitionne de sélectionner et de projeter des films d\'auteur en plein air du 5 au 8 août au parc Monceau à Paris.\r\n\r\nEn tant que développeur, on m\'a demandé de lister les fonctionnalités dont a besoin la cliente et de proposer une solution technique adaptée. ','IMG-68a62afb3e40a5.87314238.jpg','2025-08-20 22:07:23','2025-08-20 20:20:04',1,'Publié');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'utilisateur','IMG-689f3bb77e6d40.80760896.jpg','Lorep','Ipsum','Lorem','loremipsum@gmail.com','$2y$10$guqTfU31jwoFe0O46h5wX.S0Mh/ss7uz76d8NFC8cl2C83R4IUaka',1),(12,'utilisateur','IMG-689f3fd3db1786.22547469.jpg','Johnyme','Anonyme','Johnny','johnnyannonyme@gmail.com','$2y$10$ZJpJShXgHHCvjJWtVkywlONmDIyx0zZBB7vyxJDIMuJQl/VOWLo2i',1),(13,'administrateur','IMG-689f40ce3cd321.83998336.jpg','blogger J','Leleu','Justine','bloggerj@gmail.com','$2y$10$m9t9Ei05MrA8NhPQeEqJ/uEtqVOFutLpwy2rG.YjPnqTEd5bsHEZm',1),(14,'administrateur','IMG-689f4403c3b037.19519263.jpg',' Admin',' Admin',' Admin','admin@gmail.com','$2y$10$SIwxmGQVC1tExMn.JBZ.3uL6EbCP08phiyq.OgFptNqQ7KfY7jSTW',1);
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

-- Dump completed on 2025-08-21  8:37:17
