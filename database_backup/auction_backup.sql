-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: loginsystem
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.8-MariaDB
-- Date: Tue, 25 Jul 2023 15:28:43 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES ('kjk','sd@12','sdx'),('jfh','dhh@12','d9b4ed6292c18963ad8f7ccb7d6d4f92');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 2 row(s)
--

--
-- Table structure for table `users12`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users12` (
  `username` varchar(520) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phonenumber` bigint(50) NOT NULL,
  `birth` date NOT NULL,
  `gender1` varchar(20) NOT NULL,
  `add1` varchar(500) NOT NULL,
  `add2` varchar(500) NOT NULL,
  `coun1` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `postal` int(11) NOT NULL,
  `aname` varchar(500) NOT NULL,
  `anumber` int(11) NOT NULL,
  `acard` varchar(500) NOT NULL,
  `acvv` int(11) NOT NULL,
  `expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users12`
--

LOCK TABLES `users12` WRITE;
/*!40000 ALTER TABLE `users12` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users12` VALUES ('ankushhh','sdsd@12','75e99c5577f1fd503ceb3b9108e5fde9',884905453,'2000-02-02',' female','sdd','dd','America','sdd','sdd',524,'asdd',2452,'sddd',545,'2001-02-02');
/*!40000 ALTER TABLE `users12` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users12` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Tue, 25 Jul 2023 15:28:43 +0200
