-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sisplatdb
-- ------------------------------------------------------
-- Server version	5.6.15-log

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
-- Table structure for table `agente`
--

DROP TABLE IF EXISTS `agente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agente` (
  `id_agente` int(11) NOT NULL AUTO_INCREMENT,
  `agente` varchar(45) NOT NULL,
  `id_zona` int(11) NOT NULL,
  PRIMARY KEY (`id_agente`),
  KEY `fk_agente_zona_idx` (`id_zona`),
  CONSTRAINT `fk_agente_zona` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agente`
--

LOCK TABLES `agente` WRITE;
/*!40000 ALTER TABLE `agente` DISABLE KEYS */;
INSERT INTO `agente` VALUES (2,'Mayorista',3),(3,'Mayorista',2),(5,'Transportista',2),(6,'Transportista',3),(7,'Mayorista',4),(8,'Transportista',4),(9,'Productor',6),(10,'Transportista',6),(11,'Mayorista',6),(12,'Productor',7),(13,'Mayorista',7),(14,'Transportista',7),(15,'Productor',8),(16,'Mayorista',8),(17,'Transportista',8);
/*!40000 ALTER TABLE `agente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial_zona`
--

DROP TABLE IF EXISTS `historial_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial_zona` (
  `id_historial_zona` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `pesada` float NOT NULL,
  `cesta` float NOT NULL,
  `bolsa5` float NOT NULL,
  `bolsa10` float NOT NULL,
  `unidad` float NOT NULL,
  `radio` varchar(45) NOT NULL,
  `actual` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_historial_zona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial_zona`
--

LOCK TABLES `historial_zona` WRITE;
/*!40000 ALTER TABLE `historial_zona` DISABLE KEYS */;
/*!40000 ALTER TABLE `historial_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalidad`
--

DROP TABLE IF EXISTS `modalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalidad` (
  `id_modalidad` int(11) NOT NULL AUTO_INCREMENT,
  `modalidad` varchar(45) NOT NULL,
  PRIMARY KEY (`id_modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalidad`
--

LOCK TABLES `modalidad` WRITE;
/*!40000 ALTER TABLE `modalidad` DISABLE KEYS */;
INSERT INTO `modalidad` VALUES (1,'Pesada'),(3,'Unidad'),(4,'Contada'),(6,'Cesta');
/*!40000 ALTER TABLE `modalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion`
--

DROP TABLE IF EXISTS `operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion` (
  `id_operacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_agente` int(11) NOT NULL,
  `id_modalidad_compra` int(11) DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `id_modalidad_venta` int(11) NOT NULL,
  `precio_venta` float NOT NULL,
  `fecha` date NOT NULL,
  `actual` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_operacion`),
  KEY `fk_operacion_agente1_idx` (`id_agente`),
  KEY `fk_operacion_modalidad1_idx` (`id_modalidad_compra`),
  KEY `fk_operacion_modalidad2_idx` (`id_modalidad_venta`),
  CONSTRAINT `fk_operacion_modalidad1` FOREIGN KEY (`id_modalidad_compra`) REFERENCES `modalidad` (`id_modalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacion_agente1` FOREIGN KEY (`id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_operacion_modalidad2` FOREIGN KEY (`id_modalidad_venta`) REFERENCES `modalidad` (`id_modalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion`
--

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` VALUES (1,3,4,5000,3,8,'2015-07-01',1),(2,5,1,15000,4,5000,'2015-07-01',1),(3,2,4,6000,3,10,'2015-07-01',1),(4,6,1,16000,4,6000,'2015-07-01',1),(5,7,4,4500,3,7,'2015-07-01',1),(6,8,1,13000,4,4500,'2015-07-01',1),(7,9,NULL,NULL,1,13000,'2015-07-01',1),(8,11,6,1200,6,1400,'2015-07-01',1),(9,10,1,13000,6,1200,'2015-07-01',1),(10,12,NULL,NULL,1,15000,'2015-07-01',1),(11,13,6,1300,6,1500,'2015-07-01',1),(12,14,1,15000,6,1300,'2015-07-01',1),(13,15,NULL,NULL,1,16000,'2015-07-01',1),(14,16,6,1400,6,1600,'2015-07-01',1),(15,17,1,16000,6,1400,'2015-07-01',1);
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(45) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region_zona`
--

DROP TABLE IF EXISTS `region_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region_zona` (
  `id_region_zona` int(11) NOT NULL AUTO_INCREMENT,
  `id_zona` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  PRIMARY KEY (`id_region_zona`),
  KEY `fk_region_zona_zona1_idx` (`id_zona`),
  KEY `fk_region_zona_region1_idx` (`id_region`),
  CONSTRAINT `fk_region_zona_region1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_region_zona_zona1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id_zona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region_zona`
--

LOCK TABLES `region_zona` WRITE;
/*!40000 ALTER TABLE `region_zona` DISABLE KEYS */;
/*!40000 ALTER TABLE `region_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password_hash` varchar(60) DEFAULT NULL,
  `password_reset_token` varchar(60) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `id_estado_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,1,'admin','$2y$13$HuzA1s/scllg3Gfh8X8aQe8BlsmN7LvMUteiTVIwgXxKrm66yJ6LK',NULL,'v2eqtYWIWlnB2HBFvaW1TyLot2gekF05','admin@admin.com.ve',1429544945,1436630106,'admin','2015-06-16 15:48:31',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(45) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` VALUES (2,'ESOMERCASUR'),(3,'Metro'),(4,'Plataneros'),(6,'Sucre'),(7,'Francisco Javier Pulgar'),(8,'Colon');
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-11 11:38:49
