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

/*Table structure for table `accounttable` */

DROP TABLE IF EXISTS `accounttable`;

CREATE TABLE `accounttable` (
  `AccountId` int(6) NOT NULL auto_increment,
  `AccountNumber` varchar(50) default NULL,
  `FirstName` varchar(50) default NULL,
  `LastName` varchar(50) default NULL,
  `Email` varchar(200) default NULL,
  `Password` varchar(200) default NULL,
  `PhotoPath` varchar(500) default NULL,
  `AccountType` varchar(50) default NULL COMMENT 'Admin, Employee,Student, Depositor ',
  `IsActive` tinyint(1) NOT NULL,
  `RegisterDate` datetime default NULL,
  `WithdrawMethod` varchar(50) default NULL COMMENT 'Bank, Gryp, Other',
  `WithdrawMethodName` varchar(500) default NULL COMMENT 'Bank Name, Gryp Note, Other Note',
  PRIMARY KEY  (`AccountId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `accounttable` */

/*Table structure for table `categorytable` */

DROP TABLE IF EXISTS `categorytable`;

CREATE TABLE `categorytable` (
  `CategoryId` int(11) NOT NULL auto_increment,
  `CategoryName` varchar(200) default NULL,
  `CategoryType` varchar(50) NOT NULL COMMENT 'Activity/Event, News, Lesson,  ',
  PRIMARY KEY  (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `categorytable` */

/*Table structure for table `commentpostingtable` */

DROP TABLE IF EXISTS `commentpostingtable`;

CREATE TABLE `commentpostingtable` (
  `CommentId` int(11) NOT NULL auto_increment,
  `AccountId` int(11) default NULL,
  `Comment` text,
  `PostedDate` datetime default NULL,
  `CommentOn` varchar(50) default NULL COMMENT 'Page, Lesson, Event, News',
  `CommentOnId` int(11) default NULL COMMENT 'PageId, LessonId, EventId, NewsId',
  PRIMARY KEY  (`CommentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `commentpostingtable` */

/*Table structure for table `deposittable` */

DROP TABLE IF EXISTS `deposittable`;

CREATE TABLE `deposittable` (
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

/*Data for the table `deposittable` */

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

/*Table structure for table `posttable` */

DROP TABLE IF EXISTS `posttable`;

CREATE TABLE `posttable` (
  `PostId` int(11) NOT NULL auto_increment,
  `PostTitle` varchar(500) default NULL,
  `Post` text,
  `PostType` varchar(50) default NULL COMMENT 'Page, Lesson, News, Event, Media',
  `CreatedBy` int(11) default NULL,
  `CategoryId` int(11) default NULL,
  PRIMARY KEY  (`PostId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `posttable` */

/*Table structure for table `withdrawtable` */

DROP TABLE IF EXISTS `withdrawtable`;

CREATE TABLE `withdrawtable` (
  `WithdrawId` int(11) NOT NULL auto_increment,
  `WithdrawCode` varchar(5) default NULL COMMENT 'yymmxxx',
  `Principle` double default NULL,
  `Interest` double default NULL,
  `WithdrawDate` datetime NOT NULL COMMENT 'Date to calculate interest',
  `DepositId` int(11) default NULL,
  `RepaymentFeeRate` double default '11' COMMENT '11% of Interest',
  `CreatedBy` int(11) default NULL,
  `CreatedDate` datetime NOT NULL,
  PRIMARY KEY  (`WithdrawId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `withdrawtable` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
