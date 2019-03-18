/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50723
Source Host           : localhost:3306
Source Database       : netconsu_user

Target Server Type    : MYSQL
Target Server Version : 50723
File Encoding         : 65001

Date: 2019-03-02 21:27:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES ('257', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:10;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550990940', '1550990940');
INSERT INTO `jobs` VALUES ('256', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:9;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '255', null, '1550990850', '1550990850');
INSERT INTO `jobs` VALUES ('258', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:11;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550991043', '1550991043');
INSERT INTO `jobs` VALUES ('259', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:12;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550991135', '1550991135');
INSERT INTO `jobs` VALUES ('260', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:13;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550991264', '1550991264');
INSERT INTO `jobs` VALUES ('261', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:14;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550991519', '1550991519');
INSERT INTO `jobs` VALUES ('262', 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"timeout\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendVerificationEmail\",\"command\":\"O:30:\\\"App\\\\Jobs\\\\SendVerificationEmail\\\":5:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\User\\\";s:2:\\\"id\\\";i:15;}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;}\"}}', '0', null, '1550992014', '1550992014');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_02_24_032502_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_02_24_033258_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('5', '2019_02_24_040726_create_user_table', '1');
INSERT INTO `migrations` VALUES ('6', '2019_02_24_043809_create_jobs_table', '2');
INSERT INTO `migrations` VALUES ('7', '2019_02_24_043822_create_failed_jobs_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', '2019-02-24 04:13:39', '2019-02-24 04:13:39', 'admin', 'Administrator');
INSERT INTO `roles` VALUES ('2', '2019-02-24 04:13:39', '2019-02-24 04:13:39', 'user', 'User');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '2', '1', '2019-02-24 04:13:39', '2019-02-24 04:13:39');
INSERT INTO `role_user` VALUES ('2', '1', '2', '2019-02-24 04:13:39', '2019-02-24 04:13:39');
INSERT INTO `role_user` VALUES ('3', '2', '3', '2019-02-24 04:14:18', '2019-02-24 04:14:18');
INSERT INTO `role_user` VALUES ('4', '2', '4', '2019-02-24 04:19:25', '2019-02-24 04:19:25');
INSERT INTO `role_user` VALUES ('5', '2', '5', '2019-02-24 04:22:46', '2019-02-24 04:22:46');
INSERT INTO `role_user` VALUES ('6', '2', '6', '2019-02-24 04:23:59', '2019-02-24 04:23:59');
INSERT INTO `role_user` VALUES ('7', '2', '7', '2019-02-24 04:26:04', '2019-02-24 04:26:04');
INSERT INTO `role_user` VALUES ('8', '2', '8', '2019-02-24 04:32:52', '2019-02-24 04:32:52');
INSERT INTO `role_user` VALUES ('9', '2', '9', '2019-02-24 06:47:29', '2019-02-24 06:47:29');
INSERT INTO `role_user` VALUES ('10', '2', '10', '2019-02-24 06:49:00', '2019-02-24 06:49:00');
INSERT INTO `role_user` VALUES ('11', '2', '11', '2019-02-24 06:50:43', '2019-02-24 06:50:43');
INSERT INTO `role_user` VALUES ('12', '2', '12', '2019-02-24 06:52:15', '2019-02-24 06:52:15');
INSERT INTO `role_user` VALUES ('13', '2', '13', '2019-02-24 06:54:24', '2019-02-24 06:54:24');
INSERT INTO `role_user` VALUES ('14', '2', '14', '2019-02-24 06:58:39', '2019-02-24 06:58:39');
INSERT INTO `role_user` VALUES ('15', '2', '15', '2019-02-24 07:06:54', '2019-02-24 07:06:54');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT '0',
  `email_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `id_nivel` int(11) NOT NULL DEFAULT '0',
  `sms_token` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_sms` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `tele_ppal` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'User', 'user@example.com', '$2y$10$uNwH4peNsgUoy.RY7KmGre/D7o1/sQIqZ939wI1MjHo88.bnvkRjm', 'DL1jnEvuvFSMr9vD9J4Lri39VWwLuvGJAKqv6GnOwxunvtCvMKHGLbTKmcJE', '2019-02-24 04:13:39', '2019-02-24 04:13:39', '0', null, 'user', '0', '0', null, '0', 'avatar.png', null, null);
INSERT INTO `users` VALUES ('2', 'Admin', 'admin@example.com', '$2y$10$ZQ9Di2gcAuv.RsvFxOnjX.CymmGopYPSkpMQnSt1g8uV1IR9QuyzW', 'ROT5ZL5E1UMkKkM8wTtwVuGejsQHQbr8cfU7G2rnRchwpa4SRErvFB5h9K0I', '2019-02-24 04:13:39', '2019-03-01 14:20:18', '0', null, 'admin', '1', '3', null, '0', 'admin-avatar-1551438724.jpg', '04162628486', 'muy cerka');
INSERT INTO `users` VALUES ('27', 'Gregory Jimenez', 'gregoryjimenez@gmail.com', '$2y$10$cabyyvyL.xuPT10ToILAl.cAeCZWwvIqvEBKVirDaoQzl6G3Ib/y.', 'HoYxl7KGqrwdfOX8KUajxR4pKqWtxCJIcsDMzPORppNXIfzyN1XdRx5XBbg7', '2019-02-28 10:41:46', '2019-03-01 14:41:57', '1', null, 'greg', '1', '0', null, '0', 'greg-avatar-1551431216.jpg', null, null);
INSERT INTO `users` VALUES ('33', 'Luz M. Lozada T.', 'luzmlozada@gmail.com', '$2y$10$PWt7H9OUQrdkbs6EuTRbUOvIU9h5Rbnen4fQ0FMkAgHHYBD5lS4jO', 'NSjtdku6qPSl8MkohSUOX73L31OBkhNftCS8xZWjSLYUySJJcX2aMUpjl5ql', '2019-03-01 16:20:48', '2019-03-01 16:23:40', '0', 'v6ABk2IVj5Hj9BxKGufBvIE21', '10774023', '1', '1', null, '0', '10774023-avatar-1551457390.jpg', '04141593333', 'la vega power');
