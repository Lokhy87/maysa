/*M!999999\- enable the sandbox mode */
-- MariaDB dump 10.19  Distrib 10.11.18-MariaDB, for debian-linux-gnu (aarch64)
--
-- Host: localhost    Database: maysa
-- ------------------------------------------------------
-- Server version	10.11.18-MariaDB-ubu2204

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `complement`
--

DROP TABLE IF EXISTS `complement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `complement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complement`
--

LOCK TABLES `complement` WRITE;
/*!40000 ALTER TABLE `complement` DISABLE KEYS */;
INSERT INTO `complement` VALUES
(1,'Aromaterapia','Aceites esenciales premium','Selección de aromas exclusivos para potenciar la experiencia.',10.00),
(2,'Bebidas','Copa de cava','Copa de cava servida durante la experiencia.',12.00),
(3,'Bebidas','Botella de cava','Botella de cava premium para disfrutar en pareja.',35.00),
(4,'Bebidas','Botella de vino','Selección de vino para acompañar la experiencia.',30.00),
(5,'Instalaciones','Ducha privada','Acceso privado a ducha antes o después del masaje.',15.00),
(6,'Instalaciones','Bañera privada','Acceso exclusivo a bañera preparada para relajación.',40.00),
(7,'Regalos','Tarjeta regalo','Presentación premium para regalar una experiencia Maysa.',0.00),
(8,'Gourmet','Tabla gourmet','Selección de productos gourmet para complementar la experiencia.',25.00);
/*!40000 ALTER TABLE `complement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massage`
--

DROP TABLE IF EXISTS `massage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `massage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `position` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2D2C7269514956FD` (`collection_id`),
  CONSTRAINT `FK_2D2C7269514956FD` FOREIGN KEY (`collection_id`) REFERENCES `massage_collection` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massage`
--

LOCK TABLES `massage` WRITE;
/*!40000 ALTER TABLE `massage` DISABLE KEYS */;
INSERT INTO `massage` VALUES
(1,'Relax Massage','El arte de desconectar','Masaje relajante de cuerpo completo.','relaxMassage.png',1,1,1),
(2,'Moon Head Massage','Calma para la mente, equilibrio para el cuerpo.','Ritual enfocado en cabeza, cuello, hombros y brazos para aliviar la fatiga mental y favorecer la relajación.','moonHeadMassage.png',1,2,1),
(3,'Deep Tissue Massage','Recupera el equilibrio de tu cuerpo.','Masaje de presión profunda orientado a liberar tensiones musculares, mejorar la movilidad y favorecer la recuperación física.','deepTissueMassage.png',1,3,1),
(4,'Serenity Touch','Una experiencia diseñada para despertar los sentidos.','Experiencia envolvente con movimientos suaves, aceites aromáticos y una atmósfera preparada para favorecer el bienestar.','serenityMassage.png',1,1,2),
(5,'Velvet Touch','Relajación sin interrupciones.','Experiencia completa que combina masaje y acceso a habitación con cama para prolongar el bienestar y el confort.','velvetMassage.png',1,2,2),
(6,'Signature Maysa','La esencia de Maysa.','Experiencia insignia de Maysa con bienestar, atención personalizada y detalles premium.','signatureMassage.png',1,3,2),
(7,'Gold Experience','El lujo de dedicarte tiempo.','Experiencia premium acompañada de detalles exclusivos para disfrutar de bienestar en un ambiente sofisticado.','goldMassage.png',1,1,3),
(8,'Serenity Ritual','La calma que tu cuerpo necesita.','Experiencia completa que combina masaje y acceso privado a ducha para prolongar la sensación de bienestar.','serenityRitualMassage.png',1,2,3),
(9,'Moonlight Experience','Una experiencia creada para recordar.','Experiencia exclusiva que combina masaje, bañera privada y ambientación personalizada.','moonlightMassage.png',1,3,3),
(10,'Maysa Duo Experience','Compartir el bienestar.','Experiencia diseñada para disfrutar en pareja en un entorno exclusivo y cuidadosamente preparado.','maysaDuoMassage.png',1,1,4),
(11,'Royal Experience','Una experiencia reservada para quienes buscan lo extraordinario.','Dos profesionales coordinan cada movimiento para crear una experiencia envolvente y exclusiva.','royalMassage.png',1,2,4);
/*!40000 ALTER TABLE `massage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massage_collection`
--

DROP TABLE IF EXISTS `massage_collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `massage_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` longtext DEFAULT NULL,
  `icon` varchar(10) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massage_collection`
--

LOCK TABLES `massage_collection` WRITE;
/*!40000 ALTER TABLE `massage_collection` DISABLE KEYS */;
INSERT INTO `massage_collection` VALUES
(1,'Wellness Collection','Masajes enfocados en relajación y bienestar.','wellness',1),
(2,'Sensual Collection','Experiencias sensoriales diseñadas para despertar los sentidos.','sensual',2),
(3,'Luxury Collection','Experiencias premium con detalles exclusivos.','luxury',3),
(4,'Couples Collection','Experiencias diseñadas para compartir en pareja.','couples',4);
/*!40000 ALTER TABLE `massage_collection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `massage_price`
--

DROP TABLE IF EXISTS `massage_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `massage_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `duration` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `massage_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3668E64DE964225` (`massage_id`),
  CONSTRAINT `FK_3668E64DE964225` FOREIGN KEY (`massage_id`) REFERENCES `massage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `massage_price`
--

LOCK TABLES `massage_price` WRITE;
/*!40000 ALTER TABLE `massage_price` DISABLE KEYS */;
INSERT INTO `massage_price` VALUES
(1,30,50.00,1),
(2,60,95.00,1),
(3,30,40.00,2),
(4,60,75.00,2),
(5,30,70.00,3),
(6,60,130.00,3),
(7,30,80.00,4),
(8,60,150.00,4),
(9,60,110.00,5),
(10,90,190.00,5),
(11,60,140.00,6),
(12,90,220.00, 6),
(13,60,145.00,7),
(14,90,230.00,7),
(15,60,180.00,8),
(16,60,270.00,8),
(17,60,190.00,9),
(18,90,290.00,9),
(19,60,220.00,10),
(20,90,320.00,10),
(21,60,240.00,11),
(22,90,340.00,11);
/*!40000 ALTER TABLE `massage_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750` (`queue_name`,`available_at`,`delivered_at`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-27 15:36:09
