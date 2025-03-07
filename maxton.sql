/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.39 : Database - maxton
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`maxton` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `maxton`;

/*Table structure for table `auth_activation_attempts` */

DROP TABLE IF EXISTS `auth_activation_attempts`;

CREATE TABLE `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_activation_attempts` */

/*Table structure for table `auth_groups` */

DROP TABLE IF EXISTS `auth_groups`;

CREATE TABLE `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_groups` */

insert  into `auth_groups`(`id`,`name`,`description`) values 
(1,'superadmin','super admin'),
(2,'admin','admin'),
(3,'user','user');

/*Table structure for table `auth_groups_permissions` */

DROP TABLE IF EXISTS `auth_groups_permissions`;

CREATE TABLE `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_groups_permissions` */

insert  into `auth_groups_permissions`(`group_id`,`permission_id`) values 
(1,1);

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_groups_users` */

insert  into `auth_groups_users`(`group_id`,`user_id`) values 
(1,1),
(1,13),
(1,15),
(2,2),
(2,3),
(2,14),
(2,16),
(2,19),
(3,17),
(3,18);

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_logins` */

insert  into `auth_logins`(`id`,`ip_address`,`email`,`user_id`,`date`,`success`) values 
(1,'::1','ojifahru83@gmail.com',1,'2025-02-18 16:37:52',1),
(2,'::1','ojifahru8sfs3@gmail.com',NULL,'2025-02-18 16:38:26',0),
(3,'::1','ojifahrdfdsu83@gmail.com',NULL,'2025-02-18 16:43:43',0),
(4,'::1','ojifahrczdxczu83@gmail.com',NULL,'2025-02-18 16:47:27',0),
(5,'::1','ojifahru83@gmail.com',1,'2025-02-18 16:47:48',1),
(6,'::1','ojifahru83@gmail.com',1,'2025-02-18 18:33:05',1),
(7,'::1','ojifahru83@gmail.com',1,'2025-02-19 02:26:08',1),
(8,'::1','adsad',NULL,'2025-02-19 15:11:35',0),
(9,'::1','ojifahru83@gmail.com',1,'2025-02-19 15:11:42',1),
(10,'::1','ojifahru83@gmail.com',1,'2025-02-19 19:07:51',1),
(11,'::1','ojifahru83@gmail.com',NULL,'2025-02-20 02:40:17',0),
(12,'::1','ojifahru83@gmail.com',NULL,'2025-02-20 02:40:30',0),
(13,'::1','ojifahru83@gmail.com',NULL,'2025-02-20 02:40:55',0),
(14,'::1','hafis',NULL,'2025-02-20 02:40:59',0),
(15,'::1','ojifahru83@gmail.com',1,'2025-02-20 02:41:53',1),
(16,'::1','ojifahru83@gmail.com',1,'2025-02-20 02:50:28',1),
(17,'::1','ojifahru83@gmail.com',NULL,'2025-02-20 10:01:18',0),
(18,'::1','hafis21',NULL,'2025-02-20 10:01:41',0),
(19,'::1','ojifahru',NULL,'2025-02-20 10:01:54',0),
(20,'::1','ojifahru',NULL,'2025-02-20 10:02:28',0),
(21,'::1','ojifahru83@gmail.com',1,'2025-02-20 10:02:54',1),
(22,'::1','ojifahru83@gmail.com',29,'2025-02-20 10:03:54',1),
(23,'::1','ojifahru83@gmail.com',29,'2025-02-20 10:08:59',1),
(24,'::1','ojifahru',NULL,'2025-02-20 19:18:59',0),
(25,'::1','hafis',NULL,'2025-02-20 19:19:09',0),
(26,'::1','ojifahru83@gmail.com',29,'2025-02-20 19:19:50',1),
(27,'::1','ojifahru83@gmail.com',29,'2025-02-20 19:23:13',1),
(28,'::1','admin@example.com',37,'2025-02-20 19:29:58',1),
(29,'::1','admin',NULL,'2025-02-20 19:32:37',0),
(30,'::1','ojifahru83@gmail.com',29,'2025-02-20 19:32:41',1),
(31,'::1','ojifahru83@gmail.com',1,'2025-02-20 20:29:50',1),
(32,'::1','admin@mail.com',3,'2025-02-20 20:44:02',1),
(33,'::1','admin@mail.com',3,'2025-02-20 21:36:19',1),
(34,'::1','admin@mail.com',3,'2025-02-21 01:59:41',1),
(35,'::1','ojifahru',NULL,'2025-02-21 02:00:13',0),
(36,'::1','ojifahru',NULL,'2025-02-21 02:00:23',0),
(37,'::1','admin@mail.com',3,'2025-02-21 02:00:27',1),
(38,'::1','superadmin@mail.com',2,'2025-02-21 02:00:49',1),
(39,'::1','ojifahru',NULL,'2025-02-21 02:01:38',0),
(40,'::1','superadmin@mail.com',2,'2025-02-21 02:05:42',1),
(41,'::1','ojifahru83@gmail.com',1,'2025-02-21 02:22:47',1),
(42,'::1','admin@mail.com',3,'2025-02-21 02:42:07',1),
(43,'::1','admin@mail.com',3,'2025-02-21 02:58:15',1),
(44,'::1','ojifahru83@gmail.com',1,'2025-02-21 02:58:30',1),
(45,'::1','ojifahru83@gmail.com',1,'2025-02-21 10:39:25',1),
(46,'::1','ojifahru83@gmail.com',1,'2025-02-22 03:00:47',1),
(47,'::1','ojifahru83@gmail.com',1,'2025-02-22 05:47:33',1),
(48,'::1','ojifahru83@gmail.com',1,'2025-02-22 09:05:14',1),
(49,'::1','test@gmail.com',8,'2025-02-22 11:24:56',1),
(50,'::1','ojifahru83@gmail.com',1,'2025-02-22 13:26:45',1),
(51,'::1','admin@mail.com',3,'2025-02-22 18:04:42',1),
(52,'::1','ojifahru83@gmail.com',1,'2025-02-23 00:14:33',1),
(53,'::1','ojifahru83@gmail.com',1,'2025-02-23 12:29:09',1),
(54,'::1','ojifahru83@gmail.com',1,'2025-02-24 02:16:49',1),
(55,'::1','ojifahru83@gmail.com',1,'2025-02-24 13:04:49',1),
(56,'::1','ojifahru83@gmail.com',1,'2025-02-25 02:13:39',1),
(57,'::1','ojifahru83@gmail.com',1,'2025-02-25 03:29:28',1),
(58,'::1','ojifahru83@gmail.com',1,'2025-02-25 12:24:59',1),
(59,'::1','ojifahru83@gmail.com',1,'2025-02-25 14:59:41',1),
(60,'::1','ojifahru83@gmail.com',1,'2025-02-26 03:21:02',1),
(61,'::1','ojifahru83@gmail.com',1,'2025-02-26 11:08:13',1),
(62,'::1','ojifahru83@gmail.com',1,'2025-02-27 04:42:22',1),
(63,'::1','ojifahru83@gmail.com',1,'2025-02-27 14:14:57',1),
(64,'::1','ojifahru83@gmail.com',1,'2025-02-28 08:10:29',1),
(65,'::1','ojifahru83@gmail.com',1,'2025-03-03 18:50:06',1),
(66,'::1','ojifahru83@gmail.com',1,'2025-03-04 17:23:13',1),
(67,'::1','ojifahru83@gmail.com',1,'2025-03-04 19:51:11',1),
(68,'::1','ojifahru83@gmail.com',1,'2025-03-05 17:23:37',1),
(69,'::1','ojifahru',NULL,'2025-03-05 18:11:25',0),
(70,'::1','ojifahru83@gmail.com',1,'2025-03-05 18:11:32',1),
(71,'::1','admin@mail.com',3,'2025-03-05 18:12:10',1),
(72,'::1','admin',3,'2025-03-05 18:13:55',0),
(73,'::1','ojifahru83@gmail.com',1,'2025-03-05 18:14:05',1),
(74,'::1','admin@mail.com',3,'2025-03-05 19:02:26',1),
(75,'::1','test@example.com',13,'2025-03-06 11:37:23',1),
(76,'::1','admin@mail.com',3,'2025-03-06 11:40:10',1),
(77,'::1','admin@mail.com',3,'2025-03-06 13:49:50',1),
(78,'::1','ojifahru83@gmail.com',1,'2025-03-06 13:53:10',1);

/*Table structure for table `auth_permissions` */

DROP TABLE IF EXISTS `auth_permissions`;

CREATE TABLE `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_permissions` */

insert  into `auth_permissions`(`id`,`name`,`description`) values 
(1,'dashboard','dashboard');

/*Table structure for table `auth_reset_attempts` */

DROP TABLE IF EXISTS `auth_reset_attempts`;

CREATE TABLE `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_reset_attempts` */

/*Table structure for table `auth_tokens` */

DROP TABLE IF EXISTS `auth_tokens`;

CREATE TABLE `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_tokens` */

/*Table structure for table `auth_users_permissions` */

DROP TABLE IF EXISTS `auth_users_permissions`;

CREATE TABLE `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `auth_users_permissions` */

/*Table structure for table `board_committee` */

DROP TABLE IF EXISTS `board_committee`;

CREATE TABLE `board_committee` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `board_committee` */

insert  into `board_committee`(`id`,`name`,`institution`,`created_at`,`updated_at`) values 
(3,'Prof. Agung Dhamar Syakti ','Universitas Maritim Raja Ali Haji',NULL,NULL),
(4,'Prof. Akbar Tahir','Hasanuddin University',NULL,NULL),
(5,'Dr. Annya Requile','IMT Atlantique',NULL,NULL),
(6,'Prof. Dietrich G. Bengen','IPB University',NULL,NULL),
(7,'Prof. Geoff Jameson','Massey University',NULL,NULL),
(8,'Dr. Herve Boileau','Universite Savole Mont-Blanc',NULL,NULL),
(9,'Prof. Ian Gibson','University of Twente',NULL,NULL),
(10,'Prof. Indra Jaya','IPB University',NULL,NULL),
(11,'Prof. Indra P. Almanar','Universitas Maritim Raja Ali Haji',NULL,NULL),
(12,'Prof. Lu Wen Feng','National University Singapore',NULL,NULL),
(13,'Dr. Nuning Vita Hidayati','Jenderal Soedirman University',NULL,NULL),
(14,'Prof. Pierre Doumenq','Aix Marseille University',NULL,NULL),
(15,'Dr. Saifullah A.B. Jaaman','University Malaysia Trengganu',NULL,NULL),
(16,'Dr. Siswanto Rusdi','Director, The National Maritime Institute (NAMARIN)',NULL,NULL),
(17,'Prof. Tamiji Yamamoto','Hiroshima University',NULL,NULL),
(18,'Prof. Thierry Mare','Universite de Rennes 1',NULL,NULL);

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `document_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `document_file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `documents` */

insert  into `documents`(`id`,`document_name`,`document_file`,`created_at`,`updated_at`) values 
(7,'Submission Template','1740574871_c6e8f76c10cce4528259.pdf','2025-02-26 13:01:11','2025-02-26 13:01:11'),
(8,'Itinerary Schedule','1740576763_cedbfd4e5961cbc20cee.pdf','2025-02-26 13:32:43','2025-02-26 13:32:43');

/*Table structure for table `focuses` */

DROP TABLE IF EXISTS `focuses`;

CREATE TABLE `focuses` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `scope_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `focuses_scope_id_foreign` (`scope_id`),
  CONSTRAINT `focuses_scope_id_foreign` FOREIGN KEY (`scope_id`) REFERENCES `scopes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `focuses` */

insert  into `focuses`(`id`,`scope_id`,`name`,`created_at`,`updated_at`) values 
(56,22,'Remote Sensing',NULL,NULL),
(57,22,'Marine Acoustic',NULL,NULL),
(58,22,'Marine Engineering',NULL,NULL),
(59,22,'Marine Robotics and Digitalship Technology',NULL,NULL),
(60,22,'Ocean energy and seawater environmental',NULL,NULL),
(61,23,'Genetic',NULL,NULL),
(62,23,'Species',NULL,NULL),
(63,23,'Population',NULL,NULL),
(64,23,'Habitat',NULL,NULL),
(65,23,'Community',NULL,NULL),
(66,23,'Ecosystem diversity on all scales',NULL,NULL),
(67,24,'Gender',NULL,NULL),
(68,24,'Empowerment',NULL,NULL),
(69,24,'Policy',NULL,NULL),
(70,24,'Traditional Ecological Knowledge',NULL,NULL),
(71,25,'Marine Debris',NULL,NULL),
(72,25,'Plastic Pollution',NULL,NULL),
(73,25,'Ocean acidification',NULL,NULL),
(74,25,'Nutrient Pollution',NULL,NULL),
(75,25,'Toxicants',NULL,NULL),
(76,25,'Underwater Noise',NULL,NULL),
(77,26,'Aquaculture',NULL,NULL),
(78,26,'Ecotourism',NULL,NULL),
(79,26,'Traditional Fisheries',NULL,NULL),
(80,26,'Industry Fisheries',NULL,NULL),
(81,27,'Blue Economy, Vulnerability of Small Islands, and Climate Change',NULL,NULL),
(87,21,'Physical Oceanography',NULL,NULL),
(88,21,'Chemical Oceanography',NULL,NULL),
(89,21,'Biology Oceanography',NULL,NULL),
(90,21,'Geology Oceanograph',NULL,NULL),
(91,21,'Big Data Technology',NULL,NULL),
(92,21,'Machine Learning',NULL,NULL);

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `telepon1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `telepon2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `facebook` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `instagram` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `twitter` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `youtube` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `informasi` */

insert  into `informasi`(`id`,`alamat`,`email`,`telepon1`,`telepon2`,`facebook`,`instagram`,`twitter`,`youtube`,`linkedin`,`created_at`,`updated_at`) values 
(1,'alamat','email@univbatam.ac.id','082131341412','12311341234','http://facebook.com','http://instagram.com','http://x.com','http://youtube.com','http://linkedin.com',NULL,'2025-03-05 18:24:41');

/*Table structure for table `invited_speakers` */

DROP TABLE IF EXISTS `invited_speakers`;

CREATE TABLE `invited_speakers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `invited_speakers` */

insert  into `invited_speakers`(`id`,`name`,`description`,`image`,`created_at`,`updated_at`) values 
(7,'Francois Galgani','France','1740577478_712b8b5a683136e921cd.jpg','2025-02-26 13:44:39','2025-02-26 13:44:39'),
(8,'Hendri Dou','France','1740577509_a9ca284140c67b234f04.webp','2025-02-26 13:45:09','2025-02-26 13:45:09'),
(9,'Goib Wiranto','Indonesia','1740577530_6e993ddfc167ea16c146.webp','2025-02-26 13:45:30','2025-02-26 13:45:30'),
(10,'Hendra Kurniawan ','Kanazawa University, Japan','1740577558_3e78673a5e869578f44b.jpg','2025-02-26 13:45:58','2025-02-26 13:45:58'),
(11,'Pascal Wong Wah Chung','France','1740577580_8ad6cd61ba0ca3758ec2.jpg','2025-02-26 13:46:20','2025-02-26 13:46:20'),
(12,'John Kirby','USA','1740577602_edc9b9cfabae9249b8e5.webp','2025-02-26 13:46:42','2025-02-26 13:46:42');

/*Table structure for table `itinerary_schedule` */

DROP TABLE IF EXISTS `itinerary_schedule`;

CREATE TABLE `itinerary_schedule` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `itinerary_schedule` */

insert  into `itinerary_schedule`(`id`,`title`,`document`,`created_at`,`updated_at`) values 
(3,'Itinerary Schedule','Itinerary Schedule.pdf','2025-03-04 18:10:29','2025-03-04 18:10:29');

/*Table structure for table `keynote_speakers` */

DROP TABLE IF EXISTS `keynote_speakers`;

CREATE TABLE `keynote_speakers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keynote_speakers` */

insert  into `keynote_speakers`(`id`,`name`,`description`,`image`,`created_at`,`updated_at`) values 
(5,'Prabowo subianto','Presiden Republik Indonesia','1740568114_e5276fa1203196d0ff0a.jpg','2025-02-26 11:08:35','2025-02-26 11:08:35');

/*Table structure for table `logo` */

DROP TABLE IF EXISTS `logo`;

CREATE TABLE `logo` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `logo` */

insert  into `logo`(`id`,`name`,`path`,`created_at`,`updated_at`) values 
(1,'logo','1740278212_a22a725ef0a8b14686e4.png',NULL,NULL),
(2,'favicon','1740317578_6855392e41f668f25a63.png',NULL,'2025-02-23 13:32:59');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`version`,`class`,`group`,`namespace`,`time`,`batch`) values 
(1,'2017-11-20-223112','App\\Database\\Migrations\\CreateAuthTables','default','App',1739893572,1),
(2,'2017-11-20-223112','Myth\\Auth\\Database\\Migrations\\CreateAuthTables','default','Myth\\Auth',1739893573,1),
(5,'2025-02-22-053748','App\\Database\\Migrations\\Logo','default','App',1740234997,2),
(6,'2025-02-23-001617','App\\Database\\Migrations\\Informasi','default','App',1740270113,3),
(7,'2025-02-23-031913','App\\Database\\Migrations\\Sliders','default','App',1740280978,4),
(8,'2025-02-23-150900','App\\Database\\Migrations\\KeynoteSpeakers','default','App',1740323420,5),
(9,'2025-02-23-175123','App\\Database\\Migrations\\PlenarySpeakers','default','App',1740333137,6),
(10,'2025-02-24-021751','App\\Database\\Migrations\\InvitedSpeakers','default','App',1740363529,7),
(11,'2025-02-24-024642','App\\Database\\Migrations\\Timelines','default','App',1740365486,8),
(12,'2025-02-24-130940','App\\Database\\Migrations\\Topics','default','App',1740402639,9),
(13,'2025-02-25-144429','App\\Database\\Migrations\\Scope','default','App',1740494866,10),
(14,'2025-02-25-144437','App\\Database\\Migrations\\Focuses','default','App',1740494906,11),
(15,'2025-02-26-045719','App\\Database\\Migrations\\Documents','default','App',1740545966,12),
(16,'2025-02-26-060215','App\\Database\\Migrations\\BoardCommittee','default','App',1740549792,13),
(17,'2025-03-03-185103','App\\Database\\Migrations\\ItinerarySchedule','default','App',1741028007,14),
(18,'2025-03-04-181426','App\\Database\\Migrations\\SubmissionTemplate','default','App',1741112144,15);

/*Table structure for table `plenary_speakers` */

DROP TABLE IF EXISTS `plenary_speakers`;

CREATE TABLE `plenary_speakers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `plenary_speakers` */

insert  into `plenary_speakers`(`id`,`name`,`description`,`image`,`created_at`,`updated_at`) values 
(5,'Martin Henz','National University of Singapore(NUS), Singapore','1740577368_6c305ea5e1469564a343.jpg','2025-02-26 13:42:48','2025-02-26 13:42:48'),
(6,'Lawrence Manzano Liao','Hiroshima University, Japan','1740577409_0a675171bfa9b7052d05.webp','2025-02-26 13:43:29','2025-02-26 13:43:29'),
(7,'Prof. Dr. Omar Yaakob','Universiti Teknologi Malaysia (UTM), Malaysia','1740577439_c5444fd64901236f8602.webp','2025-02-26 13:43:59','2025-02-26 13:43:59');

/*Table structure for table `scopes` */

DROP TABLE IF EXISTS `scopes`;

CREATE TABLE `scopes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `scopes` */

insert  into `scopes`(`id`,`name`,`created_at`,`updated_at`) values 
(21,'Oceanography  ','2025-02-26 13:53:41','2025-03-04 19:48:00'),
(22,'Marine Technology','2025-02-26 13:54:35','2025-02-26 13:54:35'),
(23,'Marine Biodiversity and Conservation','2025-02-26 13:55:37','2025-02-26 13:55:37'),
(24,'Local Wisdom and Aquatic Governance','2025-02-26 13:56:15','2025-02-26 13:56:15'),
(25,'Marine Pollution ','2025-02-26 13:57:13','2025-02-26 13:57:13'),
(26,'Utilization of Marine Resources','2025-02-26 13:58:04','2025-02-26 13:58:04'),
(27,'Blue Economy, Vulnerability of Small Islands, and Climate Change','2025-02-26 13:58:16','2025-02-26 13:58:16');

/*Table structure for table `sliders` */

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sliders` */

insert  into `sliders`(`id`,`title`,`description`,`image`,`created_at`,`updated_at`) values 
(9,'slider 1','slider 1','1740331733_bd09ec901ade232174d0.jpg','2025-02-23 17:28:56','2025-02-25 02:15:49'),
(10,'Slider 2','slider 2','1740331802_5a7c8f21f465692b081d.jpg','2025-02-23 17:29:13','2025-02-25 03:33:19'),
(12,'slider 4','slider 4','1740451068_e8984fbffbfdf31f10a7.webp','2025-02-25 02:37:50','2025-02-25 02:37:50');

/*Table structure for table `submission_template` */

DROP TABLE IF EXISTS `submission_template`;

CREATE TABLE `submission_template` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `submission_template` */

insert  into `submission_template`(`id`,`title`,`document`,`created_at`,`updated_at`) values 
(2,'Submission Template','Manuscript Submission Template.docx','2025-03-04 18:41:11','2025-03-04 18:41:32');

/*Table structure for table `timelines` */

DROP TABLE IF EXISTS `timelines`;

CREATE TABLE `timelines` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `timelines` */

insert  into `timelines`(`id`,`title`,`date`,`description`,`created_at`,`updated_at`) values 
(11,'Abstract Submission Starts','2024-07-01','Abstract Submission Starts','2025-02-26 13:47:22','2025-02-26 13:47:22'),
(12,'Abstracts Submission Deadline','2024-09-12','Abstracts Submission Deadline','2025-02-26 13:47:48','2025-02-26 13:47:48'),
(13,'Abstracts Acceptance Notification','2024-09-19','Abstracts Acceptance Notification','2025-02-26 13:48:13','2025-02-26 13:48:13'),
(14,'Early Bird Registration','2024-09-20','Early Bird Registration','2025-02-26 13:48:31','2025-02-26 13:48:31'),
(15,'Full Paper Submission Deadline !','2024-09-26','Full Paper Submission Deadline !','2025-02-26 13:48:51','2025-02-26 13:48:51'),
(16,'Conference Day','2024-10-03','Conference Day','2025-02-26 13:49:06','2025-02-26 13:49:06');

/*Table structure for table `topics` */

DROP TABLE IF EXISTS `topics`;

CREATE TABLE `topics` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `topics` */

insert  into `topics`(`id`,`title`,`description`,`created_at`,`updated_at`) values 
(7,'Blue Economy','Blue Economy','2025-02-26 13:50:37','2025-02-26 13:50:37'),
(8,'Archipelagic Governance','Archipelagic Governance','2025-02-26 13:50:52','2025-02-26 13:50:52'),
(9,'Maritime Culture and Heritage','Maritime Culture and Heritage','2025-02-26 13:51:02','2025-02-26 13:51:02'),
(10,'Maritime Science and Technology','Maritime Science and Technology','2025-02-26 13:51:13','2025-02-26 13:51:13'),
(11,'Maritime Security and Geopolitics','Maritime Security and Geopolitics','2025-02-26 13:51:24','2025-02-26 13:51:24'),
(12,'Marine and Fisheries','Marine and Fisheries','2025-02-26 13:51:35','2025-02-26 13:51:35'),
(13,'Innovative Technology for Sustainable Development Goals(SDGs)','Innovative Technology for Sustainable Development Goals(SDGs)','2025-02-26 13:51:46','2025-02-26 13:51:46'),
(14,'Climate Change Initiative on Coastal and Marine Ecosystem','Climate Change Initiative on Coastal and Marine Ecosystem','2025-02-26 13:51:56','2025-02-26 13:51:56');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT 'default.png',
  `phone` varchar(255) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`email`,`username`,`password_hash`,`image`,`phone`,`reset_hash`,`reset_at`,`reset_expires`,`activate_hash`,`status`,`status_message`,`active`,`force_pass_reset`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'oji fahruroji','ojifahru83@gmail.com','ojifahru','$2y$10$UwTOd2UuwPNzRGpLBh.7XeM1lUVU5SLzki3X2KsppKVH5GedZSB9K','1741198248_74e66b9235edc2ea5d75.jpg','089638353603',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-02-20 20:34:04','2025-03-05 18:11:04',NULL),
(2,'superadmin','superadmin@mail.com','superadmin','$2y$10$FQZjXlWN6eTed12U.VkGS.Aqd9NpoVERkO52oIJT2lIe8ZWec1nTe','1740083726_48589fe2e8a8a4611398.png','08123456782232',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-02-20 20:35:26','2025-03-06 13:58:01',NULL),
(3,'admin','admin@mail.com','admin','$2y$10$8.bhutwsD8.sOU3AqMteZuphySTlmFh14f/5jmJa7kW6/fFPyyjWK','default.png','081234567831',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-02-20 20:36:03','2025-03-05 18:17:54',NULL),
(13,'test','test@example.com','test','$2y$10$POHqISQ4/tJY0ruSnSBRn.cjrYmsjzuAofH6fMUvIuCOzKqECeHDe','default.png','089638353605',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-05 19:03:20','2025-03-05 19:13:25',NULL),
(14,'test aja','apa@mail.com','testes','$2y$10$uJ4Gp2nDnDvboUrVcwrc4uc09cqJYtrk2Po.xW8nFf3fooIlHox0S','default.png','081234567812123',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-05 19:40:36','2025-03-05 20:01:00',NULL),
(15,'dwsdw','QWq@mail.com','dADad','$2y$10$.XOuPcSNJPnGM6r1.HmKXuXmgUd//j443TbeU2GqQ/NfaEntIxdpC','default.png','08686744023',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-05 19:41:51','2025-03-05 19:41:51',NULL),
(16,'dsadad','sada@mail.com','sdada','$2y$10$.CHCeJ4HWZfkeIJZrhGg5.RlB47FbkcL3OLu1KHo.yE9OVTnOz9.a','default.png','082342423423',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-05 21:27:29','2025-03-05 21:27:29',NULL),
(17,'fedef','adweq@mail.com','sdasdad','$2y$10$Zn7AL10PcII/7opwAHyhNurTxDBNon78CsS/196ixfvponv1bJn6K','default.png','09253452342',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-05 21:28:54','2025-03-05 21:28:54',NULL),
(18,'fszfsdf','sfafa@mail.com','sfsafsa','$2y$10$k2tzGpmZQZ8UEZVliUqNzO7k2x9FG7LAHChpZyHGtEtBOMduznQJK','default.png','08353453453',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-06 11:40:52','2025-03-06 11:40:52',NULL),
(19,'fhdghdf','fdsfsdf@mail.com','fszdfsdf','$2y$10$e4885vMG/YzkLbt/zVRD/ONShESlmSVVr3/W6a.FVIGxcBfQ7XrX2','default.png','034635363456',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2025-03-06 11:41:31','2025-03-06 11:41:31',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
