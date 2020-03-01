/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.11-MariaDB : Database - blood_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blood_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `blood_app`;

/*Table structure for table `blood_groups` */

DROP TABLE IF EXISTS `blood_groups`;

CREATE TABLE `blood_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blood_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blood_groups` */

insert  into `blood_groups`(`id`,`blood_name`,`created_at`,`updated_at`) values (1,'A+',NULL,NULL),(2,'A-',NULL,NULL),(3,'B+',NULL,NULL),(4,'B-',NULL,NULL),(5,'O+',NULL,NULL),(6,'O-',NULL,NULL),(7,'AB+',NULL,NULL),(8,'AB-',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
