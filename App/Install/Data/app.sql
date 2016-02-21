-- MySQL dump 10.13  Distrib 5.7.10, for osx10.9 (x86_64)
--
-- Host: localhost    Database: app
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `app_admin`
--

DROP TABLE IF EXISTS `app_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_admin` (
  `id` varchar(36) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role_id` smallint(5) DEFAULT '0',
  `encrypt` varchar(6) DEFAULT NULL,
  `last_login_ip` varchar(15) DEFAULT NULL,
  `last_login_time` int(10) unsigned DEFAULT '0',
  `email` varchar(40) DEFAULT NULL,
  `real_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_admin`
--

LOCK TABLES `app_admin` WRITE;
/*!40000 ALTER TABLE `app_admin` DISABLE KEYS */;
INSERT INTO `app_admin` VALUES ('1','David','0b9e753c4f3f2ecfc171c527f9a96321',1,'gKkcJn','0.0.0.0',1456038485,'531381545@qq.com','');
/*!40000 ALTER TABLE `app_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_admin_log`
--

DROP TABLE IF EXISTS `app_admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_admin_log` (
  `id` varchar(36) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `http_user_agent` text NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_admin_log`
--

LOCK TABLES `app_admin_log` WRITE;
/*!40000 ALTER TABLE `app_admin_log` DISABLE KEYS */;
INSERT INTO `app_admin_log` VALUES ('E52B410A-872C-F95F-24C1-1A3FA4F42978','1','David','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 20:57:04','login'),('63047DF8-C96F-56FB-1960-1C2E60320773','1','David','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:00:55','login'),('5761A763-55F1-0DB4-5FFF-A947DC415E61','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:03:04','login'),('FCD36882-74A7-41E1-51AD-ABD576224E0A','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:06:09','login'),('F4244D2E-DBF0-2BA3-21AD-EC31B46FED5D','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:07:16','login'),('3139B658-0400-F49E-62B3-27D2DA4290C4','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:28:21','login'),('E4DD1024-25C8-A57F-40E0-360D5A6A23DB','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:40:25','login'),('3EA2989F-0EB5-D90E-3AEE-6DB1FE6E17AB','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:41:59','login'),('F0314DFE-E3E6-D66A-025E-B8003E9B419B','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:45:02','login'),('DF5C7A28-C9BF-1F4E-30B6-5A7D5B6CCBA9','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:46:56','login'),('14C21D9C-0D71-0DAA-9334-B4656025634A','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/601.2.7 (KHTML, like Gecko) Version/9.0.1 Safari/601.2.7','i7sqat60su4ho621va4itb9i26','0.0.0.0','2016-02-02 21:47:46','login'),('178AB0A4-660C-B18D-CD76-73BCA12C07B8','1','david','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:38.0) Gecko/20100101 Firefox/38.0','d2452rgvs5nfh14ct2q6lkk2h5','0.0.0.0','2016-02-21 15:08:05','login');
/*!40000 ALTER TABLE `app_admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_admin_role`
--

DROP TABLE IF EXISTS `app_admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_admin_role` (
  `roleid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`roleid`),
  KEY `listorder` (`listorder`),
  KEY `disabled` (`disabled`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_admin_role`
--

LOCK TABLES `app_admin_role` WRITE;
/*!40000 ALTER TABLE `app_admin_role` DISABLE KEYS */;
INSERT INTO `app_admin_role` VALUES (1,'超级管理员','超级管理员',99,0),(2,'普通用户','普通用户',0,0);
/*!40000 ALTER TABLE `app_admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_admin_role_priv`
--

DROP TABLE IF EXISTS `app_admin_role_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_admin_role_priv` (
  `roleid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `c` varchar(20) NOT NULL,
  `a` varchar(20) NOT NULL,
  KEY `roleid` (`roleid`,`c`,`a`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_admin_role_priv`
--

LOCK TABLES `app_admin_role_priv` WRITE;
/*!40000 ALTER TABLE `app_admin_role_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_admin_role_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_article`
--

DROP TABLE IF EXISTS `app_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uuid` varchar(40) NOT NULL,
  `title` varchar(80) NOT NULL DEFAULT '',
  `keywords` varchar(40) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `author` varchar(20) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`status`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_article`
--

LOCK TABLES `app_article` WRITE;
/*!40000 ALTER TABLE `app_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_category`
--

DROP TABLE IF EXISTS `app_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_category` (
  `catid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `catname` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `model` varchar(50) NOT NULL DEFAULT 'article' COMMENT '模型',
  `setting` text,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `ismenu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '前台显示',
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_category`
--

LOCK TABLES `app_category` WRITE;
/*!40000 ALTER TABLE `app_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_category_priv`
--

DROP TABLE IF EXISTS `app_category_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_category_priv` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `roleid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action` varchar(30) NOT NULL,
  KEY `catid` (`catid`,`roleid`,`is_admin`,`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_category_priv`
--

LOCK TABLES `app_category_priv` WRITE;
/*!40000 ALTER TABLE `app_category_priv` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_category_priv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_email`
--

DROP TABLE IF EXISTS `app_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_email` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(40) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(10) DEFAULT '0',
  `edittime` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_email`
--

LOCK TABLES `app_email` WRITE;
/*!40000 ALTER TABLE `app_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_member`
--

DROP TABLE IF EXISTS `app_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_member` (
  `memberid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL COMMENT '帐号',
  `head` varchar(255) DEFAULT NULL COMMENT '头像',
  `nick` varchar(50) DEFAULT NULL COMMENT '昵称',
  `gender` tinyint(1) DEFAULT '0' COMMENT '0:保密,1:男,2:女',
  `password` varchar(32) NOT NULL,
  `encrypt` varchar(6) NOT NULL,
  `typeid` smallint(5) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0' COMMENT '0:待认证1:已认证',
  `remark` text COMMENT '备注',
  `lastloginip` varchar(15) DEFAULT NULL,
  `lastlogintime` int(10) DEFAULT '0',
  `regip` varchar(15) NOT NULL,
  `regtime` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`memberid`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_member`
--

LOCK TABLES `app_member` WRITE;
/*!40000 ALTER TABLE `app_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_member_oauth`
--

DROP TABLE IF EXISTS `app_member_oauth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_member_oauth` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `memberid` int(11) NOT NULL COMMENT '本站用户id',
  `openid` varchar(50) NOT NULL DEFAULT '' COMMENT '唯一标识',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱',
  `nick` varchar(80) DEFAULT NULL COMMENT '昵称',
  `head` varchar(255) DEFAULT NULL COMMENT '用户图像',
  `gender` varchar(10) DEFAULT NULL COMMENT '性别',
  `link` varchar(255) DEFAULT NULL COMMENT '用户链接',
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '类型',
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_member_oauth`
--

LOCK TABLES `app_member_oauth` WRITE;
/*!40000 ALTER TABLE `app_member_oauth` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_member_oauth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_member_type`
--

DROP TABLE IF EXISTS `app_member_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_member_type` (
  `typeid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `listorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_member_type`
--

LOCK TABLES `app_member_type` WRITE;
/*!40000 ALTER TABLE `app_member_type` DISABLE KEYS */;
INSERT INTO `app_member_type` VALUES (1,'普通用户','本地用户',0,0);
/*!40000 ALTER TABLE `app_member_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_menu`
--

DROP TABLE IF EXISTS `app_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_menu` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `c` varchar(20) NOT NULL DEFAULT '',
  `a` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `display` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`),
  KEY `module` (`c`,`a`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_menu`
--

LOCK TABLES `app_menu` WRITE;
/*!40000 ALTER TABLE `app_menu` DISABLE KEYS */;
INSERT INTO `app_menu` VALUES (1,'我的面板',0,'Admin','top','',1,'1'),(2,'系统管理',0,'System','top','',2,'1'),(3,'前台管理',0,'Content','top','',3,'1'),(6,'安全记录',1,'Admin','userLeft','',0,'1'),(7,'登录日志',6,'Admin','loginLog','',1,'1'),(8,'删除登录日志',7,'Admin','loginLogDelete','',1,'1'),(9,'系统设置',2,'System','settingLeft','',1,'1'),(10,'系统设置',9,'System','setting','',1,'1'),(11,'菜单设置',9,'System','menuList','',2,'1'),(12,'查看列表',11,'System','menuViewList','',0,'1'),(13,'添加菜单',11,'System','menuAdd','',0,'1'),(14,'修改菜单',11,'System','menuEdit','',0,'1'),(15,'删除菜单',11,'System','menuDelete','',0,'1'),(16,'菜单排序',11,'System','menuOrder','',0,'1'),(17,'菜单导出',11,'System','menuExport','',0,'1'),(18,'菜单导入',11,'System','menuImport','',0,'1'),(19,'用户设置',2,'Admin','left','',2,'1'),(20,'用户管理',19,'Admin','memberList','',1,'1'),(21,'查看列表',20,'Admin','memberViewList','',0,'1'),(22,'添加用户',20,'Admin','memberAdd','',0,'1'),(23,'编辑用户',20,'Admin','memberEdit','',0,'1'),(24,'删除用户',20,'Admin','memberDelete','',0,'1'),(25,'角色管理',19,'Admin','roleList','',2,'1'),(26,'查看列表',25,'Admin','roleViewList','',0,'1'),(27,'添加角色',25,'Admin','roleAdd','',0,'1'),(28,'编辑角色',25,'Admin','roleEdit','',0,'1'),(29,'删除角色',25,'Admin','roleDelete','',0,'1'),(30,'角色排序',25,'Admin','roleOrder','',0,'1'),(31,'权限设置',25,'Admin','rolePermission','',0,'1'),(32,'栏目权限',25,'Admin','roleCategory','',0,'1'),(33,'系统记录',2,'System','recordLeft','',3,'1'),(34,'日志管理',33,'System','logList','',3,'1'),(35,'查看列表',34,'System','logViewList','',0,'1'),(36,'删除日志',34,'System','logDelete','',0,'1'),(37,'缓存管理',33,'System','fileList','',1,'1'),(38,'发布管理',3,'Content','left','',2,'1'),(39,'内容管理',38,'Content','index','',0,'1'),(40,'栏目管理',38,'Category','categoryList','',0,'1'),(41,'查看列表',40,'Category','categoryViewList','',0,'1'),(42,'添加栏目',40,'Category','categoryAdd','',0,'1'),(43,'编辑栏目',40,'Category','categoryEdit','',0,'1'),(44,'删除栏目',40,'Category','categoryDelete','',0,'1'),(45,'栏目排序',40,'Category','categoryOrder','',0,'1'),(46,'栏目导出',40,'Category','categoryExport','',0,'1'),(47,'栏目导入',40,'Category','categoryImport','',0,'1'),(48,'会员中心',3,'Member','left','',1,'1'),(49,'会员列表',48,'Member','memberList','',0,'1'),(50,'会员分类',48,'Member','typeList','',0,'1'),(51,'查看列表',49,'Member','memberViewList','',0,'1'),(52,'添加会员',49,'Member','memberAdd','',0,'1'),(53,'编辑用户',49,'Member','memberEdit','',0,'1'),(54,'删除用户',49,'Member','memberDelete','',0,'1'),(55,'用户详情',49,'Member','memberView','',0,'1'),(56,'添加分类',50,'Member','typeAdd','',0,'1'),(57,'编辑分类',50,'Member','typeEdit','',0,'1'),(58,'删除分类',50,'Member','typeDelete','',0,'1'),(59,'分类排序',50,'Member','typeOrder','',0,'1'),(60,'查看列表',50,'Member','typeViewList','',0,'1'),(61,'重置密码',20,'Admin','memberResetPassword','',0,'1'),(62,'重置密码',49,'Member','memberResetPassword','',0,'1'),(63,'邮件模版',9,'System','email','',3,'1'),(64,'模版添加',63,'System','emailAdd','',0,'1'),(65,'模版编辑',63,'System','emailEdit','',0,'1'),(66,'模版删除',63,'System','emailDelete','',0,'1'),(67,'模版列表',63,'System','emailList','',0,'1'),(68,'上传管理',38,'Storage','index','',0,'1'),(69,'数据管理',2,'Database','exportlist','',0,'1'),(70,'备份数据库',69,'Database','exportlist','',0,'1'),(71,'还原数据库',69,'Database','importlist','',0,'1');
/*!40000 ALTER TABLE `app_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_page`
--

DROP TABLE IF EXISTS `app_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_page` (
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uuid` varchar(40) NOT NULL,
  `title` varchar(160) NOT NULL,
  `keywords` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_page`
--

LOCK TABLES `app_page` WRITE;
/*!40000 ALTER TABLE `app_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_setting`
--

DROP TABLE IF EXISTS `app_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_setting` (
  `key` varchar(50) NOT NULL,
  `value` varchar(5000) DEFAULT '',
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_setting`
--

LOCK TABLES `app_setting` WRITE;
/*!40000 ALTER TABLE `app_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_times`
--

DROP TABLE IF EXISTS `app_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_times` (
  `user_name` char(40) NOT NULL,
  `ip` char(15) NOT NULL,
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `times` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_name`,`is_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_times`
--

LOCK TABLES `app_times` WRITE;
/*!40000 ALTER TABLE `app_times` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_times` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-21 15:59:17
