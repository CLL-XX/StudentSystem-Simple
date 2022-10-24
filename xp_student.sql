/*
SQLyog Ultimate v10.00 Beta1
MySQL - 8.0.30 : Database - phpsql
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpsql` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `phpsql`;

/*Table structure for table `xp_student` */

DROP TABLE IF EXISTS `xp_student`;

CREATE TABLE `xp_student` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `sname` varchar(30) NOT NULL COMMENT '学生姓名',
  `snum` int unsigned NOT NULL COMMENT '学号',
  `gender` tinyint unsigned DEFAULT '1' COMMENT '性别1男0女',
  `birth` int unsigned DEFAULT NULL COMMENT '出生日期时间戳',
  `tel` varchar(20) DEFAULT NULL COMMENT '电话存为varchar,这样可以存入以0开头的座机号码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

/*Data for the table `xp_student` */

insert  into `xp_student`(`id`,`sname`,`snum`,`gender`,`birth`,`tel`) values (1,'李白',71729601,1,814204800,'0552-74956656'),(2,'张学友',71729602,1,752083200,'15856269858'),(5,'周星驰',12345678,0,800035200,'13530629276');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
