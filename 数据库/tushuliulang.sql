-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: tushuliulang
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `allbooks`
--

DROP TABLE IF EXISTS `allbooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `allbooks` (
  `CODE` char(30) DEFAULT NULL,
  `CODEINCODE` char(5) DEFAULT NULL,
  `OWNER` bigint(20) DEFAULT NULL,
  `DATEOFLEND` datetime DEFAULT NULL,
  `DATEOFRETURN` datetime DEFAULT NULL,
  `LENDER` bigint(20) DEFAULT NULL,
  `AVAILABLE` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `allbooks`
--

LOCK TABLES `allbooks` WRITE;
/*!40000 ALTER TABLE `allbooks` DISABLE KEYS */;
INSERT INTO `allbooks` VALUES ('1','1',201419630314,'2015-10-09 20:15:09','2015-12-09 20:15:09',201419630324,'false');
/*!40000 ALTER TABLE `allbooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `questionid` char(30) DEFAULT NULL,
  `answerid` char(30) DEFAULT NULL,
  `stu_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES ('1','1',201419630324,'2015-10-09 20:18:32'),('1','1',201419630324,'2015-10-09 20:21:47'),('2','1',201419630325,'2015-10-09 20:34:33');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_info`
--

DROP TABLE IF EXISTS `book_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_info` (
  `NAME` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `PRESS` char(50) CHARACTER SET utf8 DEFAULT NULL,
  `CODE` char(30) CHARACTER SET gb2312 DEFAULT NULL,
  `ISBN` char(20) CHARACTER SET gb2312 DEFAULT NULL,
  `READER_ID` bigint(20) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  `AVAILABLE` tinyint(1) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `intro` char(200) COLLATE utf8_bin DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_info`
--

LOCK TABLES `book_info` WRITE;
/*!40000 ALTER TABLE `book_info` DISABLE KEYS */;
INSERT INTO `book_info` VALUES ('新视野大学英语3',NULL,'1','978-7-5600-7305-7',NULL,NULL,1,NULL,NULL,1);
/*!40000 ALTER TABLE `book_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_share`
--

DROP TABLE IF EXISTS `book_share`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_share` (
  `OWNER` bigint(20) DEFAULT NULL,
  `BOOK_NAME` char(50) CHARACTER SET gb2312 DEFAULT NULL,
  `ISBN` char(20) CHARACTER SET gb2312 DEFAULT NULL,
  `CODE` char(30) CHARACTER SET gb2312 DEFAULT NULL,
  `CODEINCODE` char(5) CHARACTER SET gb2312 DEFAULT NULL,
  `NUMBER_ORDER` char(30) CHARACTER SET gb2312 DEFAULT NULL,
  `AVAILABLE` char(10) CHARACTER SET gb2312 DEFAULT NULL,
  `PHONE` bigint(20) DEFAULT NULL,
  `QQ` bigint(15) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment_total` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_share`
--

LOCK TABLES `book_share` WRITE;
/*!40000 ALTER TABLE `book_share` DISABLE KEYS */;
INSERT INTO `book_share` VALUES (201419630314,'新视野大学英语3','978-7-5600-7305-7','1','1','1','false',17816800000,0,'2015-10-09 20:06:26',1);
/*!40000 ALTER TABLE `book_share` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_share_comments`
--

DROP TABLE IF EXISTS `book_share_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_share_comments` (
  `NUMBER_ORDER` char(30) DEFAULT NULL,
  `CODE` char(30) DEFAULT NULL,
  `STU_ID` bigint(20) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_share_comments`
--

LOCK TABLES `book_share_comments` WRITE;
/*!40000 ALTER TABLE `book_share_comments` DISABLE KEYS */;
INSERT INTO `book_share_comments` VALUES ('1','1',201419630324,'2015-10-09 20:22:52');
/*!40000 ALTER TABLE `book_share_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `god`
--

DROP TABLE IF EXISTS `god`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `god` (
  `book` bigint(20) DEFAULT NULL,
  `book_share` bigint(20) DEFAULT NULL,
  `questions` bigint(20) DEFAULT NULL,
  `answers` bigint(20) DEFAULT NULL,
  `book_share_comment` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `god`
--

LOCK TABLES `god` WRITE;
/*!40000 ALTER TABLE `god` DISABLE KEYS */;
INSERT INTO `god` VALUES (1,1,2,2,1);
/*!40000 ALTER TABLE `god` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `stu_id` bigint(20) DEFAULT NULL,
  `password` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (201419630301,'123456'),(201419630302,'123456'),(201419630303,'123456'),(201419630304,'123456'),(201419630305,'123456'),(201419630306,'123456'),(201419630307,'123456'),(201419630308,'123456'),(201419630309,'123456'),(201419630310,'123456'),(201419630311,'123456'),(201419630312,'123456'),(201419630313,'123456'),(201419630314,'123456'),(201419630315,'123456'),(201419630316,'123456'),(201419630317,'123456'),(201419630318,'123456'),(201419630319,'123456'),(201419630320,'123456'),(201419630321,'123456'),(201419630322,'123456'),(201419630323,'123456'),(201419630324,'123456'),(201419630325,'123456'),(201419630326,'123456'),(201419630327,'123456'),(201419630201,'123456'),(201419630202,'123456'),(201419630203,'123456'),(201419630204,'123456'),(201419630205,'123456'),(201419630206,'123456'),(201419630207,'123456'),(201419630208,'123456'),(201419630209,'123456'),(201419630210,'123456'),(201419630211,'123456'),(201419630212,'123456'),(201419630213,'123456'),(201419630214,'123456'),(201419630215,'123456'),(201419630216,'123456'),(201419630217,'123456'),(201419630218,'123456'),(201419630219,'123456'),(201419630220,'123456'),(201419630221,'123456'),(201419630222,'123456'),(201419630223,'123456'),(201419630224,'123456'),(201419630225,'123456'),(201419630226,'123456');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `questionid` char(30) DEFAULT NULL,
  `stu_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `answers` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES ('1',201419630314,'2015-10-09 20:20:55',1),('2',201419630324,'2015-10-09 20:29:00',1);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_info`
--

DROP TABLE IF EXISTS `stu_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_info` (
  `STU_ID` bigint(20) DEFAULT NULL,
  `NAME` char(10) DEFAULT NULL,
  `USERNAME` char(10) DEFAULT NULL,
  `COLLEGE` char(10) DEFAULT NULL,
  `MAJOR` char(10) DEFAULT NULL,
  `CLASS` char(15) DEFAULT NULL,
  `GRADE` int(11) DEFAULT NULL,
  `motto` char(100) DEFAULT NULL,
  `PHONE` bigint(20) DEFAULT NULL,
  `EMAIL` char(50) CHARACTER SET gb2312 DEFAULT NULL,
  `SEX` char(1) DEFAULT NULL,
  `pic` char(200) DEFAULT NULL,
  `collection` bigint(20) NOT NULL DEFAULT '0',
  `lendinfo` bigint(20) NOT NULL DEFAULT '0',
  `borrow` bigint(20) NOT NULL DEFAULT '0',
  `lend` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_info`
--

LOCK TABLES `stu_info` WRITE;
/*!40000 ALTER TABLE `stu_info` DISABLE KEYS */;
INSERT INTO `stu_info` VALUES (201419630301,'鲍镕','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630302,'陈杭东','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630303,'胡凌云','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630304,'黄佳柔','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630305,'金霁康','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630306,'林玲','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630307,'刘渊','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630308,'吕元凯','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630309,'马炳文','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630310,'倪侃','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630311,'潘嘉诚','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630312,'潘行健','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630313,'庞晴晴','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630314,'汪京陆','啦啦','国际学院','','软工三班',2014,'啦啦啦啦啦',17816874920,'wjlwjl1996@outlook.com','男','',0,0,0,1),(201419630315,'汪子逸','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630316,'王晨曦','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630317,'吴丹妮','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630318,'吴学良','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630319,'项罗阳','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630320,'徐晨晨','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630321,'曾大建','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630322,'张家勋','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630323,'张仁豪','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630324,'张天鹏','汪京陆大帅哥','国际','','03',0,'我是gay',0,'','男','',1,0,1,0),(201419630325,'张政','汪京陆2号','哈佛','','04',4,'汪京陆是我的最爱',888888,'88@88.com','男','',0,0,0,0),(201419630326,'章欢龙','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630327,'朱晨恺','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630201,'曹洋','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630202,'陈昊','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630203,'陈伟涛','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630204,'陈央','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630205,'范洁','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630206,'高天宇','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630207,'何波','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630208,'胡静蕙','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630209,'胡逸伦','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630210,'胡宇超','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630211,'蒋子逸','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630212,'李赛聪','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630213,'李雄峰','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630214,'林俊毅','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630215,'罗齐铭','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630216,'潘富康','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630217,'邵波','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630218,'翁梁科','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630219,'吴伟','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630220,'徐浩麟','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630221,'杨毅廷','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630222,'杨震舜','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630223,'俞佳峰','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630224,'俞婧瑶','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0),(201419630225,'张林','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'男',NULL,0,0,0,0),(201419630226,'章雪丰','nobody',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'女',NULL,0,0,0,0);
/*!40000 ALTER TABLE `stu_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-09 20:43:37
