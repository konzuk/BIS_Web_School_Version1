/*
SQLyog Enterprise - MySQL GUI v6.5
MySQL - 5.0.45-community-nt : Database - bisloandatabase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

create database if not exists `bisloandatabase`;

USE `bisloandatabase`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `AccountId` int(6) NOT NULL auto_increment,
  `AccountNumber` varchar(50) default NULL,
  `FirstName` varchar(50) default NULL,
  `LastName` varchar(50) default NULL,
  `Email` varchar(200) default NULL,
  `Password` varchar(200) default NULL,
  `PhotoPath` varchar(500) default NULL,
  `AccountType` varchar(50) NOT NULL default 'User' COMMENT 'Admin, Employee,Student, Depositor ',
  `IsActive` tinyint(1) default NULL,
  `RegisterDate` datetime default NULL,
  `WithdrawMethod` varchar(50) default NULL COMMENT 'Bank, Gryp, Other',
  `WithdrawMethodName` varchar(500) default NULL COMMENT 'Bank Name, Gryp Note, Other Note',
  `PhoneNumber` varchar(50) default NULL,
  `UserName` varchar(50) NOT NULL,
  `AllowDelete` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`AccountId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `account` */

insert  into `account`(`AccountId`,`AccountNumber`,`FirstName`,`LastName`,`Email`,`Password`,`PhotoPath`,`AccountType`,`IsActive`,`RegisterDate`,`WithdrawMethod`,`WithdrawMethodName`,`PhoneNumber`,`UserName`,`AllowDelete`) values (1,'admin','admin','admin',NULL,'53c9bed922650a17de7907a71591fa00',NULL,'User',1,NULL,NULL,NULL,NULL,'admin',0),(3,'User','User','User',NULL,'b171d0d0674edadf2e2baf4425928d90',NULL,'User',NULL,NULL,NULL,NULL,NULL,'User',1),(4,'Bora','Bora','Lim',NULL,'b171d0d0674edadf2e2baf4425928d90',NULL,'User',NULL,NULL,NULL,NULL,NULL,'Bora',1),(5,'dd','dd','dd','dddd','dd',NULL,'User',NULL,NULL,NULL,NULL,'dddf','dd',1),(6,'asd','asd','asd','aaa55','ssa',NULL,'User',NULL,NULL,NULL,NULL,'aas','asd',1),(7,'bora1','bora',NULL,NULL,'161ebd7d45089b3446ee4e0d86dbcf92',NULL,'User',NULL,NULL,NULL,NULL,NULL,'bora1',1);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL auto_increment,
  `CategoryName` varchar(200) default NULL,
  `CategoryType` varchar(50) NOT NULL COMMENT 'Activity/Event, News, Lesson,  ',
  PRIMARY KEY  (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`CategoryId`,`CategoryName`,`CategoryType`) values (1,'Page','Page');

/*Table structure for table `commentposting` */

DROP TABLE IF EXISTS `commentposting`;

CREATE TABLE `commentposting` (
  `CommentId` int(11) NOT NULL auto_increment,
  `AccountId` int(11) default NULL,
  `Comment` text,
  `PostedDate` datetime default NULL,
  `CommentOn` varchar(50) default NULL COMMENT 'Page, Lesson, Event, News',
  `CommentOnId` int(11) default NULL COMMENT 'PageId, LessonId, EventId, NewsId',
  PRIMARY KEY  (`CommentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commentposting` */

/*Table structure for table `deposit` */

DROP TABLE IF EXISTS `deposit`;

CREATE TABLE `deposit` (
  `DepositId` int(11) NOT NULL auto_increment,
  `DepositNumber` varchar(5) NOT NULL COMMENT '00001',
  `DepositAmount` double default NULL,
  `InterestRate` double default '12',
  `DepositDate` datetime default NULL,
  `Duration` double default NULL,
  `DurationMode` varchar(1) NOT NULL default 'M' COMMENT 'M=Month, Y=Year',
  `Description` text,
  `AccountId` int(11) NOT NULL,
  PRIMARY KEY  (`DepositId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `deposit` */

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `MediaId` int(11) NOT NULL auto_increment,
  `MediaPath` text,
  `MediaType` varchar(50) default NULL COMMENT 'Video, MP3,',
  `Postid` int(11) default NULL,
  PRIMARY KEY  (`MediaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `media` */

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `PostId` int(11) NOT NULL auto_increment,
  `PostTitle` varchar(500) default NULL,
  `Post` text,
  `PostType` varchar(50) default NULL COMMENT 'Page, Lesson, News, Event, Media',
  `CreatedBy` int(11) default NULL,
  `CategoryId` int(11) default NULL,
  PRIMARY KEY  (`PostId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `post` */

insert  into `post`(`PostId`,`PostTitle`,`Post`,`PostType`,`CreatedBy`,`CategoryId`) values (1,'About Us','Page description go here','Page',1,1),(2,'Contact Us','Page description go here','Page',1,1);

/*Table structure for table `user_sessions` */

DROP TABLE IF EXISTS `user_sessions`;

CREATE TABLE `user_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_sessions` */

/*Table structure for table `withdraw` */

DROP TABLE IF EXISTS `withdraw`;

CREATE TABLE `withdraw` (
  `WithdrawId` int(11) NOT NULL auto_increment,
  `WithdrawCode` varchar(5) default NULL COMMENT 'yymmxxx',
  `Principle` double default NULL,
  `Interest` double default NULL,
  `WithdrawDate` datetime NOT NULL COMMENT 'Date to calculate interest',
  `DepositId` int(11) default NULL,
  `RepaymentFeeRate` double default '11' COMMENT '11% of Interest',
  `RepaymentFee` double default NULL,
  `CreatedBy` int(11) default NULL,
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY  (`WithdrawId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `withdraw` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
