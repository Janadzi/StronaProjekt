-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: database_name
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

CREATE DATABASE project_page;
USE project_page;
--
-- Table structure for table `adres_agencji`
--

DROP TABLE IF EXISTS `adres_agencji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adres_agencji` (
  `Id_Adresu` int NOT NULL AUTO_INCREMENT,
  `Miejscowosc` varchar(60) DEFAULT NULL,
  `Ulica` varchar(60) DEFAULT NULL,
  `Nr_Budynku` varchar(4) DEFAULT NULL,
  `Godz_Otwarcia` varchar(5) DEFAULT NULL,
  `Godz_Zamknięcia` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Id_Adresu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adres_agencji`
--

LOCK TABLES `adres_agencji` WRITE;
/*!40000 ALTER TABLE `adres_agencji` DISABLE KEYS */;
/*!40000 ALTER TABLE `adres_agencji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotel` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(15) DEFAULT NULL,
  `Szczegóły` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klient`
--

DROP TABLE IF EXISTS `klient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `klient` (
  `Id_Klienta` int NOT NULL AUTO_INCREMENT,
  `Imię` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `NumerTelefonu` varchar(15) DEFAULT NULL,
  `Kod_pocztowy` varchar(5) DEFAULT NULL,
  `Miejscowość` varchar(60) DEFAULT NULL,
  `Ulica` varchar(60) DEFAULT NULL,
  `Nr_Budynku` varchar(4) DEFAULT NULL,
  `Nr_Mieszkania` varchar(4) DEFAULT NULL,
  `ID_Uzytkownika` int NOT NULL,
  PRIMARY KEY (`Id_Klienta`),
  UNIQUE KEY `ID_Uzytkownika` (`ID_Uzytkownika`)
) ENGINE=MyISAM AUTO_INCREMENT=3000007 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klient`
--

LOCK TABLES `klient` WRITE;
/*!40000 ALTER TABLE `klient` DISABLE KEYS */;
INSERT INTO `klient` VALUES (3000006,'sdzvfd','vcxzvdf','vfds@gdsbsd','1264',NULL,NULL,NULL,NULL,NULL,33);
/*!40000 ALTER TABLE `klient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kolejka_zapytan`
--

DROP TABLE IF EXISTS `kolejka_zapytan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kolejka_zapytan` (
  `id_zapytanie` int NOT NULL AUTO_INCREMENT,
  `Rodzaj` int NOT NULL,
  `Status` int NOT NULL,
  `Tresc` char(160) NOT NULL,
  PRIMARY KEY (`id_zapytanie`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kolejka_zapytan`
--

LOCK TABLES `kolejka_zapytan` WRITE;
/*!40000 ALTER TABLE `kolejka_zapytan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kolejka_zapytan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konta`
--

DROP TABLE IF EXISTS `konta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Login` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Haslo` varchar(60) DEFAULT NULL,
  `Przywilej` int NOT NULL,
  `Id_klienta` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_Login` (`Login`),
  KEY `Id_klienta` (`Id_klienta`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konta`
--

LOCK TABLES `konta` WRITE;
/*!40000 ALTER TABLE `konta` DISABLE KEYS */;
INSERT INTO `konta` VALUES (1,'admin','$2y$10$41y0T8772O9f5CHNk3N9iewyQ2Dn5X.kUBZ4bmrf0IZAkXjyU7S1C',1,NULL),(2,'pracownik_1','$2y$10$WasXGtvqUOxbS.NlZdJVYu2CchD8Cr/98meT1vdavn17oIeJhTDS.',2,NULL),(3,'klient_1','$2y$10$vr6UJOwnNmF0i8APE1stme9/D3vV/IZD6OpOjeVs0FLzEGAkvkhZe',3,NULL),(4,'gosc','$2y$10$m45IR16JG0KhyWys3WMbc.T2giLQeBp9ueuNEXzqeJrbMBiMoP5ma',4,NULL),(5,'miku','$2y$10$4eHkMZANq52jjOu6Dn6dre2lUpNYrVhj9GsDZE8k7aqVDRDzS0Nea',3,NULL),(6,'damianek','$2y$10$AoYK.X7S2vO/gqbxNZt6fO6ianoiOC6rTTKs0SzjDw1eRpSVVW8i.',3,NULL),(9,'liku','$2y$10$/pbgjwyOY98SzDUvA8tKkekPhc7Tt81.JL.rJtjeOy5HCCPcwGEvS',3,NULL),(13,'janadzi2','$2y$10$iFRmTuhbo/NUrLTXzVqMG.u.AkewBj4fZH09O9S/krM.UcwwR2dIu',3,NULL),(33,'aaa','$2y$10$WjSkHLYTh.fw43XjowVr/.h4oIpBSrqlVV4uNDwg69n9TmmJ6vFRu',3,NULL);
/*!40000 ALTER TABLE `konta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kraj`
--

DROP TABLE IF EXISTS `kraj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kraj` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kraj`
--

LOCK TABLES `kraj` WRITE;
/*!40000 ALTER TABLE `kraj` DISABLE KEYS */;
/*!40000 ALTER TABLE `kraj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oferta` (
  `Id_Oferty` int NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(50) DEFAULT NULL,
  `Kraj` int DEFAULT NULL,
  `Miejscowosc` varchar(60) DEFAULT NULL,
  `Cena` decimal(10,2) DEFAULT NULL,
  `Hotele` int DEFAULT NULL,
  `Wycieczki` int DEFAULT NULL,
  `Ocena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Oferty`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta`
--

LOCK TABLES `oferta` WRITE;
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pracownik`
--

DROP TABLE IF EXISTS `pracownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pracownik` (
  `Id_Pracownika` int NOT NULL AUTO_INCREMENT,
  `Imię` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Wydział` varchar(50) DEFAULT NULL,
  `Wynagrodzenie` int DEFAULT NULL,
  `Data_Zatrudnienia` date DEFAULT NULL,
  PRIMARY KEY (`Id_Pracownika`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pracownik`
--

LOCK TABLES `pracownik` WRITE;
/*!40000 ALTER TABLE `pracownik` DISABLE KEYS */;
/*!40000 ALTER TABLE `pracownik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uprawnienie`
--

DROP TABLE IF EXISTS `uprawnienie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uprawnienie` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Poziom_Uprawnienia` varchar(15) DEFAULT NULL,
  `Dozwolone_Operacje` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uprawnienie`
--

LOCK TABLES `uprawnienie` WRITE;
/*!40000 ALTER TABLE `uprawnienie` DISABLE KEYS */;
/*!40000 ALTER TABLE `uprawnienie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wycieczka`
--

DROP TABLE IF EXISTS `wycieczka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wycieczka` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(15) DEFAULT NULL,
  `Szczegóły` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wycieczka`
--

LOCK TABLES `wycieczka` WRITE;
/*!40000 ALTER TABLE `wycieczka` DISABLE KEYS */;
/*!40000 ALTER TABLE `wycieczka` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-06 18:06:18
